<?php

//  ******************************************************
// AFFICHAGE DES COMMANDES CLIENT(IMPRESSION ET ENVOIS)
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_commande_client_editing.inc.php");
?>