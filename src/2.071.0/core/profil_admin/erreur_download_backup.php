<?php
//  ******************************************************
// ERREUR DE DOWNLOAD DE FICHIER BACKUP
//  ******************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_erreur_download_backup.inc.php");

?>