<?php
//  ******************************************************
// historique des controle de la caisse
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$compte_caisse	= new compte_caisse($_REQUEST["id_caisse"]);


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compta_controle_caisse_historique.inc.php");

?>