<?php
//  ******************************************************
// NEWS SoothERP PROFIL COLLAB
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_news_lmb.inc.php");

?>