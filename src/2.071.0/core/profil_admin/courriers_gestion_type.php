<?php
//  ******************************************************
// GESTION DES COURRIERS
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$infos_tc_et_mp	= infos_types_courrier_et_modele_de_pdf();


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_courriers_gestion_type.inc.php");

?>