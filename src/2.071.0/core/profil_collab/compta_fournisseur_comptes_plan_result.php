<?php
//  ******************************************************
// ACCUEIL COMPTA FOURNISSEUR COMPTEES DU PLAN 
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



if (!$_SESSION['user']->check_permission ("13")) {
	//on indique l'interdiction et on stop le script
	echo "<br /><span style=\"font-weight:bolder;color:#FF0000;\">Vos droits  d'accés ne vous permettent pas de visualiser ce type de page</span>";
	exit();
}
// *************************************************
// Données pour le formulaire et la recherche
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
$nb_fiches = 0;
$form['orderby'] = $search['orderby'] = "nom";
if (isset($_REQUEST['orderby'])) {
	$form['orderby'] = $_REQUEST['orderby'];
	$search['orderby'] = $_REQUEST['orderby'];
}
$form['orderorder'] = $search['orderorder'] = "DESC";
if (isset($_REQUEST['orderorder'])) {
	$form['orderorder'] = $_REQUEST['orderorder'];
	$search['orderorder'] = $_REQUEST['orderorder'];
}

$form['nom'] = "";
if (isset($_REQUEST['nom'])) {
	$form['nom'] = trim(urldecode($_REQUEST['nom']));
	$search['nom'] = trim(urldecode($_REQUEST['nom']));
}

$form['id_categorie'] = "";
if (isset($_REQUEST['id_categorie']) && $_REQUEST['id_categorie']) {
	$form['id_categorie'] = trim(urldecode($_REQUEST['id_categorie']));
	$search['id_categorie'] = trim(urldecode($_REQUEST['id_categorie']));
}

$form['id_profil'] = 0;
$form['id_fournisseur_categ'] = "";
if (isset($_REQUEST['id_profil'])) {
	$form['id_profil'] = $_REQUEST['id_profil'];
	$search['id_profil'] = $_REQUEST['id_profil'];
	
	if ($FOURNISSEUR_ID_PROFIL == $_REQUEST['id_profil']) {
	
		if (isset($_REQUEST['id_fournisseur_categ'])) {
			$form['id_fournisseur_categ'] = $_REQUEST['id_fournisseur_categ'];
			$search['id_fournisseur_categ'] = $_REQUEST['id_fournisseur_categ'];
		}
	}
}
//chargement de la liste des fournisseurs et des informations de plan comptable associées
$fiches = array();
if (isset($_REQUEST['recherche'])) {
	// Préparation de la requete
	$query_select 	= "";
	$query_join 	= "";
	$query_join_count 	= "";
	$query_where 	= " 1 ";
	$query_limit	= (($search['page_to_show']-1)*$search['fiches_par_page']).", ".$search['fiches_par_page'];

	// Nom
	if ($search['nom']) {
			if ($query_where) { $query_where .= " && "; }
		$libs = explode (" ", $search['nom']);
		$query_where 	.= " ( ";
		for ($i=0; $i<count($libs); $i++) {
			$lib = trim($libs[$i]);
			$query_where 	.= " nom LIKE '%".addslashes($lib)."%' "; 
			if ( isset($libs[$i+1]) ) { $query_where 	.= " && "; }
		}
		$query_where 	.= " ) ";
	}
	//id_categorie
	if (isset($search['id_categorie'])) {
		if ($query_where) { $query_where .= " && "; }
		$query_where	.= "id_categorie = '".addslashes($search['id_categorie'])."'";
	}
	// Profils
	if ($search['id_profil']) { 
		
		if (isset($search['id_fournisseur_categ']) && $search['id_fournisseur_categ']) { 
			if ($query_where) { $query_where .= " && "; }
			$query_where 	.= " af.id_fournisseur_categ = '".$search['id_fournisseur_categ']."'";
		}
		
		
	}
	$query = "SELECT  af.ref_fournisseur, af.defaut_numero_compte,
										a.nom ,
										pc.lib_compte as defaut_lib_compte,
										fc.defaut_numero_compte as categ_defaut_numero_compte,
										pc2.lib_compte as categ_defaut_lib_compte
									 ".$query_select."
										
						FROM annu_fournisseur af
							LEFT JOIN annuaire a ON a.ref_contact = af.ref_fournisseur
							LEFT JOIN plan_comptable pc ON pc.numero_compte = defaut_numero_compte
							LEFT JOIN fournisseurs_categories fc ON fc.id_fournisseur_categ = af.id_fournisseur_categ
							LEFT JOIN plan_comptable pc2 ON pc2.numero_compte = fc.defaut_numero_compte
							".$query_join."
						WHERE ".$query_where." 
						ORDER BY ".$search['orderby']." ".$search['orderorder']."
						LIMIT ".$query_limit;
	$resultat = $bdd->query($query);
	while ($fiche = $resultat->fetchObject()) {$fiches[] = $fiche; }
	//echo nl2br ($query);
	unset ($fiche, $resultat, $query);

	// Comptage des résultats
	$query = "SELECT af.ref_fournisseur
						FROM annu_fournisseur af 
							LEFT JOIN annuaire a ON a.ref_contact = af.ref_fournisseur
							LEFT JOIN plan_comptable pc ON pc.numero_compte = defaut_numero_compte
							LEFT JOIN fournisseurs_categories fc ON fc.id_fournisseur_categ = af.id_fournisseur_categ
							LEFT JOIN plan_comptable pc2 ON pc2.numero_compte = fc.defaut_numero_compte
							".$query_join_count."
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

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compta_fournisseur_comptes_plan_result.inc.php");

?>