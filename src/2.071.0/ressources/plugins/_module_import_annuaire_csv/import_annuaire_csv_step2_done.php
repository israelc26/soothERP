<?php
//  ******************************************************
// IMPORT FICHIER ANNUAIRE CSV
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

ini_set("memory_limit","40M");
if (isset($_REQUEST["total_import"])) {
	$GLOBALS['_INFOS']['total_import'] = $_REQUEST["total_import"];
}

if (isset($_REQUEST["count_import"])) {
	$GLOBALS['_INFOS']['count_import'] = $_REQUEST["count_import"];
}

if (isset($_REQUEST['first_import']) && $_REQUEST['first_import'] != 0)
    {
       if (file_exists("retour_import.csv"))
           unlink("retour_import.csv");
    }
$import_annuaire = new import_annuaire_csv(); 

$dao_csv_import_annu_ligne = new import_annuaire_csv_ligne();
$lignes = $dao_csv_import_annu_ligne->readAll();

$query = "SELECT id_colonne, champ_equivalent FROM csv_import_annu_cols ";
$resultat = $bdd->query ($query);
$array_retour = array();
while ($tmp = $resultat->fetchObject()) {
	$i=0;
	$query2 = "SELECT id_ligne  FROM csv_import_annu_lines WHERE id_colonne = " . $tmp->id_colonne ; 
	$resultat2 = $bdd->query ($query2);
	while ($tmp2 = $resultat2->fetchObject()) {
		$array_retour[$i][$tmp->id_colonne] = $tmp2->id_ligne;
		$i++;
	}
	unset ($query2, $resultat2, $tmp2);
}
//traitement de la liste des infos sélectionnées
$liste_rec = array();
$nb_fiches = 50;

if (!isset($GLOBALS['_INFOS']["total_import"])) {
	$GLOBALS['_INFOS']['total_import'] = count($array_retour);
}
if (count($array_retour) < $nb_fiches) {$nb_fiches = count($array_retour);}

for ($i = 0; $i < $nb_fiches; $i++) {
	$liste_rec[] = $i;
}

		$liste_ligne = array();
for($j=0; $j < count($array_retour); $j++) {
	if (in_array($j, $liste_rec)) {
		foreach ($array_retour[$j] as $id_ligne) {
			$liste_ligne[] = $id_ligne;
		}
	}

}
// recherche id ayant id_pays comme valeur correspondante
$import_annuaire->create($liste_ligne, "import_cop.csv");
//reste t'il des lignes?
$lignes = $dao_csv_import_annu_ligne->readAll();

include ("themes/page_import_annuaire_csv_step2_done.inc.php");

?>
