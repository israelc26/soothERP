<?php
//  ******************************************************
// [ADMINISTRATEUR] AFFICHAGE D'UNE LISTE DE COORDONNEES
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");





//  ******************************************************
// TRAITEMENTS
//  ******************************************************


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_documents_liste_choix_adresse_stocks.inc.php");

?>