<?php
//  ******************************************************
// Modes de livraisons
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$codes_promo = code_promo::charger_codes_promo();


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_codes_promo.inc.php"); 

?>