<?php
//  ******************************************************
// SUPPRESSION D'UNE TACHE
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST["id_tache"])) {
//maj de la tache
$tache = new tache ($_REQUEST["id_tache"]);
$tache->delete_tache();
}

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_planning_taches_sup.inc.php");

?>