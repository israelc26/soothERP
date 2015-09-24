<?php
//  ******************************************************
// ACCUEIL DE L'UTILISATEUR ET REDIRECTION VERS L'ACCUEIL PAR DEFAUT
//  ******************************************************
require ("_dir.inc.php");
require ($DIR."_session.inc.php");

//  ******************************************************
// REDIRECTION VERS UNE AUTRE INTERFACE
//  ******************************************************
$redirection = $DEFAUT_INTERFACE;

if (isset($_REQUEST['id_interface'])) {
	if (isset($_SESSION[$_REQUEST['id_interface']])) {
		$redirection = $_SESSION[$_REQUEST['id_interface']]->getDossier();
	}
}

//  ******************************************************
// REDIRECTION
//  ******************************************************
header ("Location: ".$_ENV['CHEMIN_ABSOLU'].$CORE_REP.$DEFAUT_INTERFACE."");
exit();
?>