<?php
//  ******************************************************
// suppression d'un taux de TVA
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

if (isset($_REQUEST["id_tva"])) {
	del_tva ($_REQUEST["id_tva"]);
}
//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_configuration_tva_sup.inc.php");

?>