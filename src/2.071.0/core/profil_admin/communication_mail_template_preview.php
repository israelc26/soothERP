<?php
//  ******************************************************
// PREVIEW DE MODELE DE MAIL
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

$mail_template = new mail_template ($_REQUEST['id_mail_template']);




//  ******************************************************
// AFFICHAGE
//  ******************************************************
include ($DIR.$_SESSION['theme']->getDir_theme()."page_communication_mail_template_preview.inc.php");

?>