<?php
//  ******************************************************
// IMPORT FICHIER ANNUAIRE CSV ETAPE 3 (après correspondance des colonnes et des valeurs du fichier)
//  ******************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$import_annuaire = new import_annuaire_csv(); 
$import_annuaire->maj_etape(3);
if (file_exists("import_cop.csv"))
    unlink("import_cop.csv");
//  ******************************************************
// AFFICHAGE
//  ******************************************************
include ("themes/page_import_annuaire_csv_step3.inc.php");

?>