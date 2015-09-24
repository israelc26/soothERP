<?php
//  ******************************************************
// PANNEAU AFFICHE EN BAS DE L'INTERFACE DE CAISSE
//  ******************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ("_session.inc.php");

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
$form['fiches_par_page'] = $search['fiches_par_page'] = 18;
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

//$form['id_profil'] = 4;
//$search['id_profil'] = 4;



// *************************************************
// Résultat de la recherche
$clients = array();
if (isset($_REQUEST['recherche'])) {
	// Préparation de la requete
	$query_join 	= "";
	$query_where 	= "";
	$query_limit	= (($search['page_to_show']-1)*$search['fiches_par_page']).", ".$search['fiches_par_page'];
	
	// Nom
	if ($search['nom']) {
		$libs = explode (" ", $search['nom']);
		$query_where .= " && ( ";
		for ($i=0; $i<count($libs); $i++) {
			$lib = trim($libs[$i]);
			$query_where 	.= " a.nom LIKE '%".addslashes($lib)."%' "; 
			if ( isset($libs[$i+1]) ) { $query_where 	.= " && "; }
		}
		$query_where 	.= " ) ";
	}


	// Recherche
	
	$query = "SELECT a.ref_contact, a.nom
						FROM annuaire a 
						LEFT JOIN annuaire_profils ap ON a.ref_contact = ap.ref_contact
						WHERE a.date_archivage IS NULL && 
									ap.id_profil = '4' 
									".$query_where."
						ORDER BY a.".$search['orderby']." ".$search['orderorder']."";
						//LIMIT ".$query_limit;
	
	//echo "<br/><hr/><br/>".nl2br($query)."<br/><hr/><br/>";
	
	$resultat = $bdd->query($query);
	while ($client = $resultat->fetchObject()) { $clients[] = new contact($client->ref_contact); }
	unset ($fiche, $resultat, $query);
	
	// Comptage des résultats
	$query = "SELECT COUNT(a.ref_contact) nb_fiches
						FROM annuaire a 
						LEFT JOIN annuaire_profils ap ON a.ref_contact = ap.ref_contact
						WHERE a.date_archivage IS NULL && 
									ap.id_profil = '4' ".$query_where."
						GROUP BY a.ref_contact";
	
	
	//echo "<br/><hr/><br/>".nl2br($query)."<br/><hr/><br/>";
	
	$resultat = $bdd->query($query);
	while ($result = $resultat->fetchObject()) { $nb_fiches += $result->nb_fiches; }
	unset ($result, $resultat, $query);
}


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_caisse_panneau_recherche_client_result.inc.php");

?>

<?php
/*
//  ******************************************************
// PANNEAU AFFICHE EN BAS DE L'INTERFACE DE CAISSE
//  ******************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ("_session.inc.php");


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
$form['fiches_par_page'] = $search['fiches_par_page'] = 12;
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

//$form['id_profil'] = 4;
//$search['id_profil'] = 4;



// *************************************************
// Résultat de la recherche
$fiches = array();
if (isset($_REQUEST['recherche'])) {
	// Préparation de la requete
	$query_join 	= " LEFT JOIN annuaire_profils ap ON a.ref_contact = ap.ref_contact ";
	$query_where 	= "date_archivage IS NULL && ap.id_profil = '4'";
	$query_limit	= (($search['page_to_show']-1)*$search['fiches_par_page']).", ".$search['fiches_par_page'];
	
	// Nom
	if ($search['nom']) {
		$libs = explode (" ", $search['nom']);
		$query_where .= " && ( ";
		for ($i=0; $i<count($libs); $i++) {
			$lib = trim($libs[$i]);
			$query_where 	.= " nom LIKE '%".addslashes($lib)."%' "; 
			if ( isset($libs[$i+1]) ) { $query_where 	.= " && "; }
		}
		$query_where 	.= " ) ";
	}


	// Recherche
	
	$query = "SELECT a.ref_contact, nom, lib_civ_court,
									 text_adresse, ad.code_postal, ad.ville, ad.ordre, 
									 tel1, tel2, fax, email, co.ordre,
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
	
	//echo "<br/><hr/><br/>".nl2br($query)."<br/><hr/><br/>";
	
	$resultat = $bdd->query($query);
	while ($fiche = $resultat->fetchObject()) { $fiches[] = $fiche; }
	unset ($fiche, $resultat, $query);
	
	// Comptage des résultats
	$query = "SELECT COUNT(a.ref_contact) nb_fiches
						FROM annuaire a 
							".$query_join."
						WHERE ".$query_where."
						GROUP BY a.ref_contact";
	
	//echo "<br/><hr/><br/>".nl2br($query)."<br/><hr/><br/>";
	
	$resultat = $bdd->query($query);
	while ($result = $resultat->fetchObject()) { $nb_fiches += $result->nb_fiches; }
	unset ($result, $resultat, $query);
}


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_caisse_panneau_recherche_client_result.inc.php");
*/
?>