<?php
//  ******************************************************
// AFFICHAGE DE L'EDITION (IMPRESSION ET ENVOIS) D'UNE STATISTIQUE
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_stats_editing.inc.php");
?>