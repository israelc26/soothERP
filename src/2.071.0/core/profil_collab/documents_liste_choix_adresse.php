<?php
//  ******************************************************
// AFFICHAGE D'UNE LISTE DE COORDONNEES
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");





//  ******************************************************
// TRAITEMENTS
//  ******************************************************

// Controle

$contact = new contact ($_REQUEST['ref_contact']);


if ($contact->getRef_contact()) {

// Préparations des variables d'affichage
$adresses = $contact->getAdresses();

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_documents_liste_choix_adresse.inc.php");
}
?>