<?php
//  ******************************************************
// CONFIG DE RECHERCHE CONTACT
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

$liste_recherche=charge_recherche_type("1");
$parent='contact';
$idtype='1';
$titre='de contact';

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_recherche.inc.php");

?>