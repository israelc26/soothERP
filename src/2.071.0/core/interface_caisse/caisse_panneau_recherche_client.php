<?php
//  ******************************************************
// PANNEAU AFFICHE EN BAS DE L'INTERFACE DE CAISSE
//  ******************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ("_session.inc.php");

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_caisse_panneau_recherche_client.inc.php");

?>