<?php

//  ******************************************************
// DOSSIERS NECESSAIRES
//  ******************************************************
$CORE_REP					 = "core/";	// Emplacement des fichiers CORE de SoothERP
$CORE_DIR					 = $DIR . $CORE_REP;   // Localisation des fichiers CORE de SoothERP
$CONFIG_DIR					 = $DIR . "config/";   // Localisation des fichiers de configurations
$RESSOURCES_REP				 = "ressources/";  // Localisation des fichiers de ressources externes
$RESSOURCES_DIR				 = $DIR . $RESSOURCES_REP;  // Localisation des fichiers de ressources externes
$LIB_DIR					 = $CORE_DIR . "libcore/";
$LIB_DIR_EXT				 = $LIB_DIR . "3rd-party/";
$PLUGINS_REP				 = $RESSOURCES_REP . "plugins/";
$PLUGINS_DIR				 = $DIR . $PLUGINS_REP;
$FICHIERS_DIR				 = $RESSOURCES_DIR . "fichiers/";	// Localisation des fichiers de l'entreprise
$IMAGES_DIR					 = $FICHIERS_DIR . "images/";   // Localisation des fichiers d'image de l'entreprise
$MAIL_TEMPLATES_CSS_DIR		 = $FICHIERS_DIR . "mail_templates/css/";   // Localisation des fichiers css de modèles d'email
$MAIL_TEMPLATES_IMAGES_DIR	 = $FICHIERS_DIR . "mail_templates/images/";   // Localisation des fichiers d'image de modèles d'email
$GED_DIR					 = $FICHIERS_DIR . "ged/";   // Localisation des fichiers ged
$GED_TMP_DIR				 = $FICHIERS_DIR . "ged_tmp/";
$ARTICLES_IMAGES_DIR		 = $IMAGES_DIR . "articles/";   // Localisation des fichiers d'image des articles
$ARTICLES_MINI_IMAGES_DIR	 = $ARTICLES_IMAGES_DIR . "miniatures/"; // Localisation des fichiers d'image miniature des articles
$MODELES_DIR				 = $CORE_DIR . "modeles/";  // Localisation des fichiers des modèles
$ODS_MODELES_DIR			 = $MODELES_DIR . "modeles_ods/";  // Localisation des fichiers de modèles ODS
$PDF_MODELES_DIR			 = $MODELES_DIR . "modeles_pdf/";  // Localisation des fichiers de modèles PDF
$ECHANGE_DIR				 = $RESSOURCES_DIR . "echange/"; //emplacement des fichiers permettant les import exports
$MSG_MODELES_DIR			 = $MODELES_DIR . "modeles_msg/";  // Localisation des fichiers de modèles MSG
$TPL_MODELES_DIR			 = $MODELES_DIR . "modeles_tpl/";  // Localisation des fichiers de modèles TPL
//  ******************************************************
// CONFIGURATION SYSTEME DE L'APPLICATION
//  ******************************************************
$PROFILS_NECESSAIRES		 = array(1, 2, 3, 4, 5);
$TEST_SESSION_TIMER			 = 4;
$MODELE_SPE_DISPOACHAT		 = 1;
$MODELE_SPE_DISPOFAB		 = 2;
$MODELE_SPE_LIVRAISON		 = 3;
$MODELE_SPE_DEPLACEMENT		 = 4;
$MODELE_SPE_RETARDREG		 = 5;


//  ******************************************************
// MODES DE VENTE
//  ******************************************************
$BDD_MODE_VENTE = array("VPC", "VAC");



//  ******************************************************
// DONNEES RELATIVES AU CATALOGUE
//  ******************************************************
$BDD_MODELES = array('materiel', 'service', 'service_abo', 'service_conso');

$LIVRAISON_MODE_ART_CATEG	 = "";
$BASE_CALCUL_LIVRAISON		 = array("POIDS" => array("Poids", "Kg"), "PRIX" => array("Prix", ""), "QTE" => array("Quantité", ""), "COLIS" => array("Colis", ""));


//  ******************************************************
// DONNEES RELATIVES AU CATALOGUE
//  ******************************************************
//  ******************************************************
// DONNEES RELATIVES A LA GESTION DES TARIFS
//  ******************************************************
$CALCUL_TARIFS_NB_DECIMALS = 2;


//  ******************************************************
// DONNEES RELATIVES AUX REGLEMENTS
//  ******************************************************
$LC_S_ID_REGMT_MODE		 = 19;
$LC_E_ID_REGMT_MODE		 = 18;
$ESP_E_ID_REGMT_MODE	 = 1;
$CHQ_E_ID_REGMT_MODE	 = 2;
$CB_E_ID_REGMT_MODE		 = 3;
$VIR_E_ID_REGMT_MODE	 = 4;
$LCR_E_ID_REGMT_MODE	 = 5;
$PRB_E_ID_REGMT_MODE	 = 6;
$ESP_S_ID_REGMT_MODE	 = 7;
$CHQ_S_ID_REGMT_MODE	 = 8;
$CB_S_ID_REGMT_MODE		 = 9;
$VIR_S_ID_REGMT_MODE	 = 10;
$LCR_S_ID_REGMT_MODE	 = 11;
$PRB_S_ID_REGMT_MODE	 = 12;
$AVC_E_ID_REGMT_MODE	 = 13;
$AVF_S_ID_REGMT_MODE	 = 15;
$COMP_S_ID_REGMT_MODE	 = 14;
$COMP_E_ID_REGMT_MODE	 = 16;
$TPV_E_ID_REGMT_MODE	 = 17;
?>
