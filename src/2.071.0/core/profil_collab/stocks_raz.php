<?php
//  ******************************************************
// REMISE A ZERO D'UN STOCK
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

$stock = $_SESSION['stocks'][$_REQUEST["id_stock"]];

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_stocks_raz.inc.php");

?>