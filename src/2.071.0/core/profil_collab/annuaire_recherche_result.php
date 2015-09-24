<?php
//  ******************************************************
// [ADMINISTRATEUR] RECHERCHE D'UNE FICHE DE CONTACT
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



//  ******************************************************
// TRAITEMENTS
//  ******************************************************

	// *************************************************
// Profils à afficher
$profils = array();
foreach ($_SESSION['profils'] as $profil) {
	if ($profil->getActif() != 1) { continue; }
	$profils[] = $profil;
}
unset ($profil);


// *************************************************
// Données pour le formulaire && la requete
$form['page_to_show'] = $search['page_to_show'] = 1;
if (isset($_REQUEST['page_to_show'])) {
	$form['page_to_show'] = $_REQUEST['page_to_show'];
	$search['page_to_show'] = $_REQUEST['page_to_show'];
}
$form['fiches_par_page'] = $search['fiches_par_page'] = $ANNUAIRE_RECHERCHE_SHOWED_FICHES;
if (isset($_REQUEST['fiches_par_page'])) {
	$form['fiches_par_page'] = $_REQUEST['fiches_par_page'];
	$search['fiches_par_page'] = $_REQUEST['fiches_par_page'];
}
$form['orderby'] = $search['orderby'] = "nom";
if (isset($_REQUEST['orderby'])) {
	$form['orderby'] = $_REQUEST['orderby'];
	$search['orderby'] = $_REQUEST['orderby'];
}
$form['orderorder'] = $search['orderorder'] = "ASC";
if (isset($_REQUEST['orderorder'])) {
	$form['orderorder'] = $_REQUEST['orderorder'];
	$search['orderorder'] = $_REQUEST['orderorder'];
}
$nb_fiches = 0;

$form['nom'] = "";
if (isset($_REQUEST['nom'])) {
	$form['nom'] = trim(urldecode($_REQUEST['nom']));
	$search['nom'] = trim(urldecode($_REQUEST['nom']));
}
$form['id_profil'] = 0;
if (isset($_REQUEST['id_profil'])) {
	$form['id_profil'] = $_REQUEST['id_profil'];
	$search['id_profil'] = $_REQUEST['id_profil'];
}


// *************************************************
// Résultat de la recherche
$fiches = array();
if (isset($_REQUEST['recherche'])) {
	// Préparation de la requete
	$query_join 	= "";
	$query_where 	= "date_archivage IS NULL";
	$query_limit	= (($search['page_to_show']-1)*$search['fiches_par_page']).", ".$search['fiches_par_page'];

	
	// Nom
	if ($search['nom']) {
		$libs = explode (" ", $search['nom']);
		if ($query_where) { $query_where .= " && "; }
		$query_where 	.= " ( ";
		for ($i=0; $i<count($libs); $i++) {
			$lib = trim($libs[$i]);
			$query_where 	.= " nom LIKE '%".addslashes($lib)."%' "; 
			if ( isset($libs[$i+1]) ) { $query_where 	.= " && "; }
		}
		$query_where 	.= " ) ";
	}
	// Profils
	if ($search['id_profil'] != "ALL") { 
		$query_join 	.= " LEFT JOIN annuaire_profils ap ON a.ref_contact = ap.ref_contact "; 
		if($search['id_profil']){
			if ($query_where) { $query_where .= " && "; }
			$query_where 	.= "ap.id_profil = '".$search['id_profil']."'";
		}else{
			if ($query_where) { $query_where .= " && "; }
			$query_where 	.= "ap.id_profil is null";
		}
	}

	$query = "SELECT a.ref_contact,  nom, lib_civ_court, ad.id_type_adresse,
								 text_adresse, ad.code_postal, ad.ville, ad.ordre, 
								 tel1, tel2, fax, email, co.ordre, co.id_type_coordonnee, si.id_type_site_web,
								 url, si.ordre
					FROM annuaire a 
						LEFT JOIN civilites c ON a.id_civilite = c.id_civilite 
						LEFT JOIN adresses ad ON a.ref_contact = ad.ref_contact
						LEFT JOIN coordonnees co ON a.ref_contact = co.ref_contact && co.ordre = 1
						LEFT JOIN sites_web si ON a.ref_contact = si.ref_contact  && si.ordre = 1
						".$query_join."
					WHERE ".$query_where." 
					GROUP BY a.ref_contact
					ORDER BY ".$search['orderby']." ".$search['orderorder'].", ad.ordre ASC, co.ordre ASC, si.ordre ASC
					LIMIT ".$query_limit;
	
	
	$resultat = $bdd->query($query);
	while ($fiche = $resultat->fetchObject()) { $fiches[] = $fiche; }		
	
	//echo nl2br ($query);
	unset ($fiche, $resultat, $query);
	
	$ref_user = $_SESSION['user']->getRef_user();
	$droitsVoirAdresses = getDroitVoirAdresse($ref_user);
	$droitsVoirCoord = getDroitVoirCoordonnees($ref_user);
	$droitsVoirSite = getDroitVoirSiteWeb($ref_user);
	
	//_vardump($fiches);
	//Gestion des droits affichage addresse------------------------------
	if(count($droitsVoirAdresses)>0){
		if($droitsVoirAdresses[0] != "ALL"){
			for($i=0;$i<count($fiches);$i++){
				if($fiches[$i]->id_type_adresse != "" && $fiches[$i]->id_type_adresse != 0){
					if (!in_array($fiches[$i]->id_type_adresse,$droitsVoirAdresses)){
						$fiches[$i]->text_adresse = "";
						$fiches[$i]->code_postal = "";
						$fiches[$i]->ville = "";
					}
				}
			}
		}
	}else{
		for($i=0;$i<count($fiches);$i++){
			if($fiches[$i]->id_type_adresse != "" && $fiches[$i]->id_type_adresse != 0){
				$fiches[$i]->text_adresse = "";
				$fiches[$i]->code_postal = "";
				$fiches[$i]->ville = "";
			}
		}		
	}
	//FIN Gestion des droits affichage addresse---------------------------
	//Gestion des droits affichage coordonnees----------------------------
	if(count($droitsVoirCoord)>0){
		if($droitsVoirCoord[0] != "ALL"){
			for($i=0;$i<count($fiches);$i++){
				if($fiches[$i]->id_type_coordonnee != "" && $fiches[$i]->id_type_coordonnee != 0){
					if (!in_array($fiches[$i]->id_type_coordonnee,$droitsVoirCoord)){
						$fiches[$i]->tel1 = "";
						$fiches[$i]->tel2 = "";
						$fiches[$i]->fax = "";
						$fiches[$i]->email = "";
					}
				}
			}
		}
	}else{
		for($i=0;$i<count($fiches);$i++){
			if($fiches[$i]->id_type_coordonnee != "" && $fiches[$i]->id_type_coordonnee != 0){
				$fiches[$i]->tel1 = "";
				$fiches[$i]->tel2 = "";
				$fiches[$i]->fax = "";
				$fiches[$i]->email = "";
			}
		}		
	}
	//FIN Gestion des droits affichage coordonnees-----------------------
	//Gestion des droits affichage site web------------------------------
	if(count($droitsVoirSite)>0){
		if($droitsVoirSite[0] != "ALL"){
			for($i=0;$i<count($fiches);$i++){
				if($fiches[$i]->id_type_site_web != "" && $fiches[$i]->id_type_site_web != 0){
					if (!in_array($fiches[$i]->id_type_site_web,$droitsVoirSite)){
						$fiches[$i]->url = "";
					}
				}
			}
		}
	}else{
		for($i=0;$i<count($fiches);$i++){
			if($fiches[$i]->id_type_site_web != "" && $fiches[$i]->id_type_site_web != 0){
				$fiches[$i]->url = "";
			}
		}		
	}
	//FIN Gestion des droits affichage site web---------------------------
	
	
	// Comptage des résultats
	$query = "SELECT COUNT(a.ref_contact) nb_fiches
						FROM annuaire a 
							".$query_join."
						WHERE ".$query_where."
						GROUP BY a.ref_contact";
	$resultat = $bdd->query($query);
	$result = $resultat->fetchAll();
	$nb_fiches = count($result);
	//echo "<br><hr>".nl2br ($query);
	unset ($result, $resultat, $query);


}


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_recherche_result.inc.php");

?>