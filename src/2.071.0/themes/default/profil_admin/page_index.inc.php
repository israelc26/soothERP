<?php
// *************************************************************************************************************
// CONTROLE DU THEME
// *************************************************************************************************************
// Variables nécessaires à l'affichage
$page_variables = array();
check_page_variables($page_variables);


//******************************************************************
// Variables communes d'affichage
//******************************************************************
// tableau du menu principal
$menu1 = array(
    array('default_content', 'accueil.php', 'true', 'sub_content', 'Interface administrateur',
        array(
            array('separateur', '', 'true', 'sub_content', 'Paramétrage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'),
            array('smenu_entreprise', 'smenu_entreprise.php', 'true', 'sub_content', 'Entreprise'),
            array('smenu_annuaire', 'smenu_annuaire.php', 'true', 'sub_content', 'Annuaire'),
            array('smenu_catalogue', 'smenu_catalogue.php', 'true', 'sub_content', 'Catalogue'),
            array('smenu_comptabilite', 'smenu_comptabilite.php', 'true', 'sub_content', 'Comptabilité'),
            array('smenu_affichage', 'smenu_affichage.php', 'true', 'sub_content', 'Affichage'),
            array('separateur', '', 'true', '', ''),
            array('separateur', '', 'true', 'sub_content', 'Gestion'),
            array('smenu_utilisateurs', 'smenu_utilisateurs.php', 'true', 'sub_content', 'Utilisateurs'),
            array('smenu_site_internet', 'smenu_site_internet.php', 'true', 'sub_content', 'Interfaces'),
            array('smenu_communication', 'smenu_communication.php', 'true', 'sub_content', 'Communication'),
            array('separateur', '', 'true', '', ''),
            array('separateur', '', 'true', 'sub_content', 'Système'),
            array('smenu_secusys', 'smenu_secusys.php', 'true', 'sub_content', 'Sécurité du système'),
            array('smenu_maintenance', 'smenu_maintenance.php', 'true', 'sub_content', 'Maintenance'),
            array('smenu_transfert_donnees', 'smenu_transfert_donnees.php', 'true', 'sub_content', 'Transfert de données'),
            array('smenu_gestion_modules', 'smenu_gestion_modules.php', 'true', 'sub_content', 'Gestion des modules'),
//			array('separateur', '', 'true', '', ''),
//			array('import_maj_serveur','import_maj_serveur.php','true','sub_content','Mise à jour')
        )
    )
);

// recherche de la page retour (si existe) ou affichage page default[0]
$default_page = $menu1[0];

if (isset($_REQUEST['page_from']) && !substr_count($_REQUEST['page_from'], $CORE_DIR . "profil_collab/") && $_REQUEST['page_from'] != "profil_admin/") {
    $default_page = array('page_depart', str_replace("&page_from=", "", str_replace("&uncache=1", "", str_replace("?", "", str_replace($_SESSION['user']->getProfil_dir(), "", $_REQUEST['page_from'])))), 'true', 'sub_content');
}

// AFFICHAGE
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Interface d'administration de SoothERP</title>
        <link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_common_style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_annuaire_style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>mini_moteur.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>annuaire_modif_fiche.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_formulaire.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_art_categ.css" rel="stylesheet" type="text/css" />
        <?php
        if (isset($modules)) {
            foreach ($modules as $module) {
                if (isset(${$module}['css_admin'])) {
                    foreach (${$module}['css_admin'] as $css_mod) {
                        ?><link href="<?php echo $css_mod; ?>" rel="stylesheet" type="text/css" />
                        <?php
                    }
                }
            }
        }
        ?>


        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>prototype.js"/></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>selectupdater.js"></script>
        <?php
        if (isset($modules)) {
            foreach ($modules as $module) {
                if (isset(${$module}['js_admin'])) {
                    foreach (${$module}['js_admin'] as $js_mod) {
                        ?><script src="<?php echo $js_mod; ?>"/></script>
                        <?php
                    }
                }
            }
        }
        ?>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_tab_alerte.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_row_menu.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_main_menu.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_mini_moteur.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_tarifs_categ.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_taxes_import.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compte_bancaire.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compte_caisse.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compte_tpe.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compte_cb.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_annuaire.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_catalogue_client.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_import.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_stocks.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_art_categ.js" type=text/javascript></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_formulaire.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>swfobject.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_general-admin.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_newsletter.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_systeme.js"></script>
        <script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compta_export.js"></script>

        <!-- Modification éffectuée par Yves Bourvon -->
        <!-- On teste l'abscence de valeur FALSE car retour glob() imprévisible si array vide (Système serveur dépendant) -->
        <?php
        if (glob($PLUGINS_DIR . $_SESSION['theme']->getDir_theme() . "javascript/*.js") != false) {
            foreach (glob($PLUGINS_DIR . $_SESSION['theme']->getDir_theme() . "javascript/*.js") as
                        $filejs) {
                ?>
                                <script src="<?php echo $filejs ?>"></script>
                <?php
            }
        }
        ?>
        <!--fin de modif-->	

        <script type="text/javascript"> 
        <!--/*--><![CDATA[//><!--

        //vérif d'état du log de session

        function verif_session() {
            $("code_relogin").value="";
            var AppelAjax = new Ajax.Request(
                "<?php echo $DIR; ?>session_test.php", 
                {
                    evalScripts:true, 
                    onSuccess: function (requester){
                        if ((requester.responseText != "ok") && ( requester.responseText != "Serveur en cours de maintenance")) {
                            ask_login(requester.responseText);
                        } else  {
                            setTimeout ("verif_session()", tempo_session);
                        }
                    }
                }
        );
        }

        function close_ask_login() {
			var AppelAjax = new Ajax.Request(
                "<?php echo $DIR; ?>session_test.php", 
                {
                    evalScripts:true, 
                    onSuccess: function (requester){ if (requester.responseText=="ok") { restart_session(); } }
                }
            );
        }

        function ask_login(requete) {
            $("alert_pop_up").style.display = "block";
            $("framealert").style.display = "block";
            $("alert_fin_session").style.display = "block";
			var AppelAjax = new Ajax.Updater(
                "alert_fin_session_content",
                "<?php echo $DIR; ?>session_user_login.php", 
                    {
                    evalScripts:true, 
                    onLoading:S_loading, onException: function (){S_failure();}, 
                    onComplete:showResponse
                    }
            );
        }

        function restart_session() {
                $("alert_pop_up").style.display = "none";
                $("framealert").style.display = "none";
                $("alert_fin_session").style.display = "none";
                verif_session();

        }
		
        //changement de magasin
        function session_change_magasin (id_magasin) {	
            var AppelAjax = new Ajax.Request(
                "<?php echo $CORE_DIR; ?>site/__session_change_magasin.php?id_magasin="+id_magasin,
                    {
                    evalScripts:true, 
                    onSuccess: function (requester){}
                    }
            );
	
	<?php foreach ($_SESSION['magasins'] as $magasin) { ?>
        if (id_magasin == <?php echo $magasin->getId_magasin(); ?>) {
            $("img_option_info_magasin_<?php echo $magasin->getId_magasin(); ?>").src = "<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/actuel.gif";
        } else {
            $("img_option_info_magasin_<?php echo $magasin->getId_magasin(); ?>").src = "<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/blank.gif";
        }
    <?php } ?>
        }
		
        //------------------------------------
        // initialisation
        //-------------------------------------

        var default_show_id = "<?php echo $default_page[0] ?>";
        var default_show_url = "<?php echo $default_page[1] ?>";
        var default_show_refresh = "<?php echo $default_page[2] ?>";
        var default_show_target = "<?php echo $default_page[3] ?>";
        var changed = false;
        var global_tab = new Array();
        var menu_id =  new Array();
        var tarifs_nb_decimales = <?php echo $TARIFS_NB_DECIMALES; ?>;
        var calcul_tarifs_nb_decimales = <?php echo $CALCUL_TARIFS_NB_DECIMALS; ?>;
        var monnaie_html = "<?php echo $MONNAIE[1]; ?>";
        //var pour limiter le nombre de caracteres par ligne et le nombre de lignes dans un champ textarea
        var limite_car = 38;
        var limite_line_a = 2;
        var limite_line_b = 3;
        var limite_line_c = 5;
        //directories
        var dirtheme = "<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>";
        //historique
        var historique = new Array();
        var historique_request = new Array();
        historique_request[0] = new Array();
        historique_request[1] = new Array();
        historique_request[2] = new Array();
        historique_request[3] = new Array();
        var uncache = false;
        var tableau_smenu = new Array();
        tableau_smenu[0] = new Array();
        tableau_smenu[1] = new Array();

//require _general-admin.js

	<?php $i = 0; foreach ($menu1 as $smenu) { ?>
        menu_id[<?php echo $i ?>]="<?php echo $smenu[0] ?>";
    <?php $i++; } ?>
            //lancement proto de chargement de contenu 	
            var page= new appelpage("sub_content");
	
            //lancement proto des alertes
            var alerte= new alerte_message();

        function initEventHandlers() {

<?php
if (!strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') && !strpos($_SERVER['HTTP_USER_AGENT'], 'Iceweasel') && !strpos($_SERVER['HTTP_USER_AGENT'], 'Epiphany') && !strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')) {
    ?>alerte.confirm_supprimer("alert_nav","");
<?php } ?>
        hashListener.init();
            //observateurs du menu principal
<?php $i = 0; foreach ($menu1 as $smenu) { ?>
            Event.observe('table_<?php echo $smenu[0] ?>', 'mouseover', function(){montre("smenu<?php echo $i ?>","<?php echo $smenu[0] ?>"); $("option_info_smenu").hide();}, false);
            Event.observe('link_<?php echo $smenu[0] ?>', 'mouseover',  function(){changeclassname ('link_<?php echo $smenu[0] ?>', 'item_hover');}, false);
            Event.observe('link_<?php echo $smenu[0] ?>', 'mouseout',  function(){changeclassname ('link_<?php echo $smenu[0] ?>', 'item');}, false);
            Event.observe('link_<?php echo $smenu[0] ?>', 'click',  function(evt){ Event.stop(evt); page.verify('<?php echo $smenu[0] ?>','<?php echo $smenu[1] ?>','<?php echo $smenu[2] ?>','<?php echo $smenu[3] ?>'); montre('','<?php echo $smenu[0] ?>');}, false);

<?php $i++; }

$i = 0;
foreach ($menu1 as $smenu) {
    if (isset($smenu[5])) {
        ?>
            Event.observe('sub_content', 'mouseover',  function(){ montre('','<?php echo $smenu[0] ?>'); $("option_info_smenu").hide();}, false);
            Event.observe('option_info', 'mouseover',  function(){ montre('','<?php echo $smenu[0] ?>');}, false);
            Event.observe('option_info_smenu', 'mouseover',  function(){ montre('','<?php echo $smenu[0] ?>');}, false);
            Event.observe('table_smenu<?php echo $i ?>', 'mouseover',  function(){montre('smenu<?php echo $i ?>','<?php echo $smenu[0] ?>');}, false);
            Event.observe('table_smenu<?php echo $i ?>', 'mouseover',  function(){changeclassname ('link_<?php echo $smenu[0] ?>', 'item_hover'); $("option_info_smenu").hide();}, false);
            Event.observe('table_smenu<?php echo $i ?>', 'mouseout',  function(){montre('','<?php echo $smenu[0] ?>');}, false);
            Event.observe('table_smenu<?php echo $i ?>', 'mouseout',  function(){changeclassname ('link_<?php echo $smenu[0] ?>', 'item');}, false);
        <?php foreach ($smenu[5] as $ssmenu) { ?>
            Event.observe('<?php echo $ssmenu[0] ?>', 'click',  function(evt){ Event.stop(evt); page.verify('<?php echo $ssmenu[0] ?>','<?php echo $ssmenu[1] ?>','<?php echo $ssmenu[2] ?>','<?php echo $ssmenu[3] ?>'); montre('','<?php echo $smenu[0] ?>'); }, false);
            <?php
        }
    }

    $i++;
}
?>
            //Construction et placement des éléments du menu principal
            construct_menu ();
	
            //bouton refresh
            Event.observe('refresh_content', 'click',  function(evt){ Event.stop(evt); refresh_sub_content (); return_to_page = "";}, false);
            Event.observe('refresh_content_alert_onException', 'click',  function(evt){ Event.stop(evt); refresh_sub_content ();
                $("alert_pop_up").style.display = "none";
                $("framealert").style.display = "none";
                $("alert_onException").style.display = "none";
                return_to_page = "";
            }, false);
            Event.observe('norefresh_content_alert_onException', 'click',  function(evt){ Event.stop(evt);
                $("alert_pop_up").style.display = "none";
                $("framealert").style.display = "none";
                $("alert_onException").style.display = "none";
            }, false);
            //mise à hauteur des éléments principaux
            setsize_to_element ();
            set_tomax_height('sub_content' , -20);
            // mise à la bonne largeur du sub_content
            set_size_to_sub_content ();
            //observateur de resize pour mise à hauteur des éléments principaux
            Event.observe(window, "resize", function() {setsize_to_element(); set_tomax_height('sub_content' , -20); set_size_to_sub_content ();}, false);
	
            //lancement de la page par défaut
            page.verify('<?php echo $default_page[0] ?>','<?php echo $default_page[1] ?>','<?php echo $default_page[2] ?>','<?php echo $default_page[3] ?>');
	
        }

        var tempo_session=<?php echo round($USER_SESSION_LT / $TEST_SESSION_TIMER); ?>000;
        // verif de validité session
        setTimeout ("verif_session()", tempo_session);

        Event.observe(window, "load", initEventHandlers, false);
        //--><!]]>
        </script>
    </head>

    <body class="admin" style="background-image: url(<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/profil_admin/main_content_bg.gif); background-repeat:repeat-x; background-attachment:fixed">
        <div id="grand_contener">
            <div id="bgmain_menu" class="<?php echo $_SESSION['interfaces'][$_INTERFACE['ID_INTERFACE']]->getLib_interface(); ?>"></div>

            <iframe id="framealert" frameborder="0" scrolling="no" src="about:blank"></iframe>
            <div id="menu" style="z-index:300">
				
                <?php
//nouvelle maj dispo
// if (isset($_SESSION['NEW_MAJ_DISPO']) && $_SESSION['NEW_MAJ_DISPO'] != "0") { 
                ?>
                <!--
                <img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme(); ?>/images/maj_dispo.gif" alt="Nouvelle version de SoothERP disponible !" title="Nouvelle version de SoothERP disponible !" id="id_new_maj_dispo" style="cursor:pointer" />
                    <script type="text/javascript">
                        Event.observe("id_new_maj_dispo", "click", function() {	page.verify('import_maj_serveur','import_maj_serveur.php','true','sub_content');}, false);
                
                    </script>
                -->
				
                <?php
#}
                $i = 0; foreach ($menu1 as $smenu) { ?>
                <div style="position:absolute; top:0px; left:0px; display:none;" id="<?php echo $smenu[0] ?>">
                    <table border="0" cellpadding="0" cellspacing="0" id="table_<?php echo $smenu[0] ?>"><tr><td>
                            <a id="link_<?php echo $smenu[0] ?>"  class="item" href="#"><?php echo $smenu[4] ?></a>
                    </td></tr></table>	
                </div>
                <?php $i++; } ?>
                <div style="position:absolute; top:0px; left:185px;" id="menu_arbo">
                    <table border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:middle; line-height:22px; height:22px; cursor:pointer">
                                <span id="smenu_arbo_display"></span> <span id="ssmenu_arbo_display"></span>
                            </td></tr></table>	
                    <script type="text/javascript">
                        Event.observe('smenu_arbo_display', 'click',  function(evt){ Event.stop(evt); page.verify(tableau_smenu[0][0],tableau_smenu[0][1],tableau_smenu[0][2],tableau_smenu[0][3]);}, false);
                        Event.observe('ssmenu_arbo_display', 'click',  function(evt){ Event.stop(evt); page.verify(tableau_smenu[1][0],tableau_smenu[1][1],tableau_smenu[1][2],tableau_smenu[1][3]);}, false);
                    </script>
                </div>
				
                <?php $i = 0; foreach ($menu1 as $smenu) { if (isset($smenu[5])) { ?>
				<div style="position:absolute; top:22px; left:0px; display:none; z-index:300; filter:Alpha(opacity=90);" id="smenu<?php echo $i ?>">
					<table border="0" cellpadding="0" cellspacing="0"  class="subitem" id="table_smenu<?php echo $i ?>">
						<tr>
							<td>
								<table  border="0" cellpadding="0" cellspacing="0" >
								<?php foreach ($smenu[5] as $ssmenu) { ?>
									<tr>
										<?php if ($ssmenu[4] == "") { ?>
										<td style="line-height:3px; height:3px">
											<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/separateur.gif" width="100%" height="3px" />
											<span class="subitem"  id="<?php echo $ssmenu[0] ?>"></span>
										<?php } else { if ($ssmenu[0] == "separateur") { ?>
										<td>
											<span><strong><?php echo $ssmenu[4] ?></strong></span>
										<?php } else { ?>
										<td>
											<a class="subitem"  id="<?php echo $ssmenu[0] ?>"  href="#"><?php echo $ssmenu[4] ?></a>
										<?php } } ?>
										</td></tr>			
										<?php } ?>
								</table>
							</td>
						</tr>
					</table>
				<?php } ?>
				</div>
                <?php $i++; } ?>
            </div>
			<div id="right_content" style="display:none">
				<div id="user"><?php echo $_SESSION['user']->getRef_user() ?></div>
				<div id="deco"><a href="<?php echo $CORE_DIR ?>site/__session_stop.php">D&eacute;connexion</a></div>
				<div></div>
			</div>
			<table cellspacing="0" cellpadding="0" border="0" style="margin-top:22px;">
				<tr>
					<td style="width:3%">&nbsp;</td>
					<td style="width:100%;">
						<div id="sub_content"></div>
					</td>
					<td style="width:3%">&nbsp;</td>
				</tr>
			</table>
			<div style="display:block; float:right; position:absolute; bottom:0px; right:0px; z-index:500">
				<!--<a href="http://www.sootherp.fr" target="_blank" rel="noreferrer"><img src="<?php echo $FICHIERS_DIR; ?>images/powered_by_sootherp.png" width="120"/></a><br />-->
				<span style="color: #888; font-size: 11px; position:absolute; bottom:4px; right:130px;">SoothERP,&nbsplogiciel&nbspde&nbspgestion&nbspd'entreprise&nbspopen&nbspsource&nbspet&nbspgratuit&nbsp<a href="http://www.sootherp.fr" style="color: #888;text-decoration: none;" target="_blank">http://www.sootherp.fr</a></span>				
				<a href="http://www.lundimatin.fr" target="_blank" rel="noreferrer"><img src="<?php echo $FICHIERS_DIR; ?>images/powered_by_lundimatin.png" width="120"/></a>
			</div>
			<div  style="display:block; float:right; position:absolute; top:0px; right:25px; z-index:500">
				<table border="0" cellpadding="0" cellspacing="0" id="option_info">
					<tr><td>
							<a id="link_option_info"  class="item" href="#"> Options </a>
						</td></tr>
				</table>
				<div style="position:absolute; width:220px; top:22px; right:-30px; display:none; z-index:300; filter:Alpha(opacity=90);" id="option_info_smenu">
					<table border="0" cellpadding="0" cellspacing="0"  class="subitem" id="option_info_stable" ><tr><td>
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
								<tr><td><a class="subitem"  id="interface_en_cours" href="#"><strong>Interface en cours</strong></a></td></tr>
							</table>
                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
							<?php
							foreach ($profils_allowed as $id_profil =>
										$profil) {
								foreach ($_SESSION['interfaces'] as
											$id_interface => $interface) {
									if ($interface->getId_profil() == $id_profil) {
										if ($id_interface == 52) {
											$destination = "_blank";
										} else {
											$destination = "_top";
										}
										?>
                                <tr><td>
										<a class="subitem"  id="option_info_interface_<?php echo $id_interface; ?>"  href="#">
											<script type="text/javascript">
											Event.observe('option_info_interface_<?php echo $id_interface; ?>', 'click',  function(evt){
												Event.stop(evt);
												window.open ("<?php echo $_ENV['CHEMIN_ABSOLU'] . $CORE_REP . $_SESSION['interfaces'][$id_interface]->getDossier() ?>", "<?php echo $destination; ?>");
												}, false);
											</script>
											<img src="<?php
											if ($id_interface == $_SESSION['user']->getId_interface()) {
												echo $DIR . $_SESSION['theme']->getDir_gtheme() . 'images/actuel.gif';
											} else {
												echo $DIR . $_SESSION['theme']->getDir_gtheme() . 'images/blank.gif';
											}
											?>" width="15px" height="15px"/>
										<?php echo $_SESSION['interfaces'][$id_interface]->getLib_interface() ?>
										</a>
							</td></tr>			
                            <?php } } } ?>
                            </table>
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
								<tr><td style="line-height:3px; height:3px">
										<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/separateur.gif" width="100%" height="3px" />
									</td></tr>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
								<tr><td>
										<a class="subitem"  id="magasin_en_cours" href="#"><strong>Magasin en cours</strong></a>
									</td></tr>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
							<?php foreach ($_SESSION['magasins'] as $magasin) { ?>
								<tr><td>
										<a class="subitem"  id="option_info_magasin_<?php echo $magasin->getId_magasin(); ?>"  href="#">
											<img src="<?php
											if ($magasin->getId_magasin() == $_SESSION['magasin']->getId_magasin()) {
												echo $DIR . $_SESSION['theme']->getDir_gtheme() . 'images/actuel.gif';
											} else {
												echo $DIR . $_SESSION['theme']->getDir_gtheme() . 'images/blank.gif';
											}
											?>" width="15px" height="15px" id="img_option_info_magasin_<?php echo $magasin->getId_magasin(); ?>"/>
									    <?php echo htmlentities($magasin->getLib_magasin(), ENT_QUOTES, "UTF-8"); ?> </a>
								</td></tr>			
								<?php } ?>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
								<tr><td style="line-height:3px; height:3px">
										<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/separateur.gif" width="100%" height="3px" />
								</td></tr>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
								<tr><td>
										<a class="subitem"  id="option_info_deconnexion"  href="#">D&eacute;connexion</a>
								</td></tr>
							</table>
                    </td></tr></table>
                </div>
			<script type="text/javascript">
			// gestion evenement menu option
				Event.observe('option_info', 'mouseover', function(){$("option_info_smenu").show();}, false);
				Event.observe('link_option_info', 'mouseover',  function(){changeclassname ('link_option_info', 'item_hover');}, false);
				Event.observe('link_option_info', 'mouseout',  function(){changeclassname ('link_option_info', 'item');}, false);
				Event.observe('link_option_info', 'click',  function(evt){Event.stop(evt); }, false);
				Event.observe('option_info_smenu', 'mouseover',  function(){$("option_info_smenu").show();}, false);
				Event.observe('option_info_smenu', 'mouseover',  function(){changeclassname ('link_option_info', 'item_hover');}, false);
				Event.observe('option_info_smenu', 'mouseout',  function(){$("option_info_smenu").hide();}, false);
				Event.observe('option_info_smenu', 'mouseout',  function(){changeclassname ('link_option_info', 'item');}, false);
				Event.observe('option_info_smenu', 'click',  function(evt){Event.stop(evt); $("option_info_smenu").hide(); changeclassname ('link_option_info', 'item');}, false);
				
<?php foreach ($_SESSION['magasins'] as $magasin) { ?>
				Event.observe('option_info_magasin_<?php echo $magasin->getId_magasin(); ?>', 'click',  function(evt){Event.stop(evt); session_change_magasin ("<?php echo $magasin->getId_magasin(); ?>");}, false);
<?php } ?>
				Event.observe('option_info_deconnexion', 'click',  function(evt){Event.stop(evt); window.open ("<?php echo $CORE_DIR; ?>site/__session_stop.php", "_top");}, false);
			</script>
			</div>
		<?php if ($AFFICHE_DEBUG) { ?>
			<div  style="display:block; float:right; position:absolute; top:0px; right:115px; z-index:500; width:10px">
				<table border="0" cellpadding="0" cellspacing="0" style="width:100%"><tr><td>
						<a id="toggle_debug_iframe"  href="#">D</a>
				</td></tr></table>
			<script type="text/javascript">
			Event.observe('toggle_debug_iframe', 'click',  function(evt){Event.stop(evt); $('formFrame').toggle();}, false);
			</script>
			</div>
			<?php } ?>

			<div id="refresh_content">
				<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/actualiser_adm.gif" align="top" />
			</div>
			<div id="load_show" style="visibility:hidden; line-height:22px; height:22px;">
				<div id="boxcontent">
					<strong>Chargement en cours</strong>
				</div>

				<script type="text/javascript">
					// <![CDATA[

			swfobject.embedSWF("<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/waiting.swf", "boxcontent", "142", "15", "9.0.0", "expressInstall.swf", false,{wmode: "transparent", quality: "high", allowScriptAccess: "always"}, {id: "swf_waiting"});

					// ]]>
				</script>
			</div>

			<iframe id="framemenu" frameborder="0" scrolling="no" src="about:blank"></iframe>

			<div id="alert_pop_up">
			</div>

			<div id="alert_pop_up_tab" class="alert_pop_up_tab">
				<div  id="titre_alert">
				</div>
				<div id="texte_alert">
				</div>		
				<div id="bouton_alert"><input type="submit" name="bouton1" id="bouton1" value="Supprimer" /><input type="submit" id="bouton0" name="bouton0" value="Retour" />
				</div>
			</div>
			<div id="alert_fin_session" class="alert_pop_up_tab">
				<div  id="alert_fin_session_content">
					<table cellpadding=0 cellspacing=0 border=0 style="width:100%; text-align:center">
						<tr><td>
								<form action ="<?php echo $_ENV['CHEMIN_ABSOLU']; ?>session_user_valid.php" method=POST name="form_login_inc" target="formFrame">
									<input type=hidden name="page_from" value="">
									<input type=hidden name="id_profil" value="<?php echo $_SESSION['user']->getId_profil(); ?>">
									<input type=hidden name="try" id="try" value="1">
									<table width="100%" cellpadding=0 cellspacing=0 border=0 align="center">
										<tr>
											<td colspan="2" style="text-align:center; font-weight:bolder; line-height:20px; height:20px; border-bottom:1px solid #000000;">

												<a href="#" id="close_ask_login"><img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/supprime.gif" border="0" style="float:right"></a>
												Veuillez vous r&eacute;identifier
											</td>
										</tr>
										<tr>
											<td style="text-align: right"><?php echo "" ?></td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td style="text-align: right">Utilisateur : </td>
											<td>
												<?php echo htmlentities($_SESSION['user']->getContactName(), ENT_QUOTES, "UTF-8"); ?>
												<br />
												<?php echo htmlentities($_SESSION['user']->getPseudo(), ENT_QUOTES, "UTF-8"); ?>
												<input type="hidden" name='login' size=25 value="<?php echo $_SESSION['user']->getRef_user() ?>"/>
											</td>
										</tr>
										<tr>
											<td style="text-align: right"> Mot de passe : </td>
											<td><input type=password name="code"  id="code_relogin" size=25 value="" />		</td>
										</tr>
										<tr>
											<td colspan=2 align="center"><div id="session_user_message" style="font:1em Arial, Helvetica, sans-serif; color:#FF0000; font-weight:bolder"></div><br/><input type="submit" name="submit" value="Valider" />		</td>
										</tr>
										<tr>
											<td colspan=2 align="right">	
												<a href="#" onclick="window.open ('<?php echo $CORE_DIR; ?>site/__session_stop.php', '_top');" style="text-decoration:none">Quitter</a>

												<script type="text/javascript">
												Event.observe("close_ask_login", "click",  function(evt){Event.stop(evt); close_ask_login();}, false);
												</script>
											</td>
										</tr>
									</table>
								</form>
						</td></tr>
					</table>
				</div>
			</div>
			<div id="alert_onException" class="alert_pop_up__exception_tab">
				<div  id="alert_onException_content">
					<table cellpadding=0 cellspacing=0 border=0 style="width:100%; text-align:center">
						<tr><td>
							<table width="100%" cellpadding=0 cellspacing=0 border=0 align="center">
								<tr>
									<td colspan="2" style="text-align:center; font-weight:bolder; line-height:20px; height:20px;  border-bottom:1px solid #000000;">Erreur de connexion au serveur </td>
								</tr>
								<tr>
									<td style="text-align: right">&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: center; font-size:10px"><p>La connexion au serveur semble interrompue. <br />Il se peut que  votre derni&egrave;re action n&rsquo;ait pas &eacute;t&eacute; enregistr&eacute;e. <br /><br />Nous vous recommandons de rafra&icirc;chir la page sur laquelle  vous travaillez ou de revalider votre derni&egrave;re action, afin de v&eacute;rifier si  toutes les donn&eacute;es ont bien &eacute;t&eacute; transmises.</p></td>
								</tr>
								<tr>
									<td style="text-align: right">&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td colspan=2 align="center"><input type="submit" name="refresh_content_alert_onException" id="refresh_content_alert_onException" value="Rafra&icirc;chir la page" />
										<input type="button" name="norefresh_content_alert_onException" id="norefresh_content_alert_onException" value="Continuer sans rafra&icirc;chir" /></td></tr>
								<tr>
									<td colspan=2 align="right">	</td>
								</tr>
							</table>
						</td></tr>
					</table>
				</div>
			</div>

<iframe src="about:blank" style="display:none ; right: 0px; position: absolute; top: 0px; height:0px;z-index:231;width:0; height: 0;" id="historiqueFrame" name="historiqueFrame"></iframe>
<iframe src="about:blank" style="display: none; right: 15%; position: absolute; top: 50px; height:80%;z-index:231;width:70%;background-color: white;" scrolling="auto" id="formFrame" name="formFrame"></iframe>

        </div>
		<script type="text/javascript">
		</script>
    </body>
</html>