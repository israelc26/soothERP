<?php
//  ******************************************************
// STOCK A RENOUVELER
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

if (isset($_REQUEST["id_stock"])) {
	$stock	= $_SESSION['stocks'][$_REQUEST["id_stock"]];
}

$stocks_liste = $_SESSION['stocks'];
//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_stocks_a_renouveller.inc.php");

?>