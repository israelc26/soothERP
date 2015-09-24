<?php
// *************************************************************************************************************
// PAGE INDEX DU PROFIL COLLAB
// *************************************************************************************************************
// Variables nécessaires à l'affichage
$page_variables = array();
check_page_variables($page_variables);


//******************************************************************
// Variables communes d'affichage
//******************************************************************
// tableau du menu principal
$menu1 = array(
	array('default_content', 'accueil.php', 'true', 'sub_content', 'Bureau'),
	array('annuaire_content', '', 'false', '', 'Annuaire',
		array(
			array('annuaire_recherche', 'annuaire_recherche.php', 'true', 'sub_content', 'Recherche'),
			array('separateur', '', 'true', '', ''),
			array('annuaire_nouvelle_fiche', 'annuaire_nouvelle_fiche.php', 'true', 'sub_content', 'Nouvelle fiche')
		)
	),
	array('catalogue_content', '', 'false', '', 'Catalogue',
		array(
			array('catalogue_recherche', 'catalogue_recherche.php', 'true', 'sub_content', 'Recherche')
		)
	)
);



//modules

if (isset($modules)) {

	foreach ($modules as $module) {
		if (isset(${$module}['menu_collab'])) {
			if (!isset($menu_modules)) {
				$menu_modules = array('modules', '', 'false', '', 'Modules', array());
			}
			foreach (${$module}['menu_collab'] as $menu_mod) {
				array_push($menu_modules[5], $menu_mod);
			}
		}
	}

	if (isset($menu_modules)) {
		$menu1[] = $menu_modules;
	}
}

// recherche de la page retour (si existe) ou affichage page default [0]
$default_page = $menu1[0];

if (isset($_REQUEST['page_from']) && !substr_count($_REQUEST['page_from'], $CORE_DIR . "profil_admin/") && $_REQUEST['page_from'] != "profil_collab/") {

	$default_page = array('page_depart', str_replace("&page_from=", "", str_replace("&uncache=1", "", str_replace("?", "", str_replace($_SESSION['user']->getProfil_dir(), "", $_REQUEST['page_from'])))), 'true', 'sub_content');
}


// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_common_style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_annuaire_style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_formulaire.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>mini_moteur.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_articles.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_documents.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>annuaire_modif_fiche.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $DIR . $_SESSION['theme']->getDir_css() ?>_small_wysiwyg.css" rel="stylesheet" type="text/css" />
		<?php
		if (isset($modules)) {
			foreach ($modules as $module) {
				if (isset(${$module}['css_comm'])) {
					foreach (${$module}['css_comm'] as $css_mod) {
						?><link href="<?php echo $css_mod; ?>" rel="stylesheet" type="text/css" />
						<?php
					}
				}
			}
		}
		?>

		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>prototype.js"/></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>scriptaculous/scriptaculous.js?load=effects,dragdrop"/></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>selectupdater.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>import_tarifs_fournisseur_csv.js"></script>
		<?php
		if (isset($modules)) {
			foreach ($modules as $module) {
				if (isset(${$module}['js_comm'])) {
					foreach (${$module}['js_comm'] as $js_mod) {
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
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_articles.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_documents.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compte_bancaire.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compte_caisse.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compte_tpe.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compte_cb.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_taches.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_compta.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_stock.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_tarifs.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_small_wysiwyg.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_annuaire.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_formulaire.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>swfobject.js"></script>
		<script src="<?php echo $DIR . $_SESSION['theme']->getDir_js() ?>_general.js"></script>

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
		if (requester.responseText!="ok") {
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
		onSuccess: function (requester){
		if (requester.responseText=="ok") {
		restart_session();
		}
		}
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
		onLoading:S_loading, onException: function () {S_failure();}, 
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
		onSuccess: function (requester){
		}
		}
		);

<?php
foreach ($_SESSION['magasins'] as $magasin) {
	?>
			if (id_magasin == <?php echo $magasin->getId_magasin(); ?>) {
			$("img_option_info_magasin_<?php echo $magasin->getId_magasin(); ?>").src = "<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/actuel.gif";
			} else {
			$("img_option_info_magasin_<?php echo $magasin->getId_magasin(); ?>").src = "<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/blank.gif";
			}
	<?php
}
?>
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
		var last_parent_doc_line = "";
		var tarifs_nb_decimales = <?php echo $TARIFS_NB_DECIMALES; ?>;
		var calcul_tarifs_nb_decimales = <?php echo $CALCUL_TARIFS_NB_DECIMALS; ?>;
		var monnaie_html = "<?php echo $MONNAIE[1]; ?>";
		//var pour limiter le nombre de caracteres par ligne et le nombre de lignes dans un champ textarea
		var limite_car = 38;
		var limite_line_a = 2;
		var limite_line_b = 3;
		var limite_line_c = 5;
		//variable indiquant la recherche rapide d'article pour un document pour retour si un seul résultat trouve
		var from_rapide_search = "";
		//blocage de modification à certains champs d'un document
		var quantite_locked = false;
		//passage par un règlement rapide (pour retourner à l'onglet principale du document aprés un règlement rapide
		var reglement_rapide = false;
		//directories
		var dirtheme = "<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>";
		//historique
		var historique = new Array();
		var historique_request = new Array();
		historique_request[0] = new Array();
		historique_request[1] = new Array();
		historique_request[2] = new Array();
		historique_request[3] = new Array();
		historique_request[4] = new Array();
		historique_request[5] = new Array();
		historique_request[6] = new Array();
		historique_request[7] = new Array();
		historique_request[8] = new Array();
		//total d'un document négatif ?
		var montant_total_neg = false;
		//variable d'attente du nombre de ligne à inserer depuis un document
		var wait_for_x_line_doc = 0;
		//nombre de lignes chargées
		var loaded_line_doc = 0;
		//nombre maximale de ligne de sn affichées
		var doc_aff_qte_sn = <?php echo $DOC_AFF_QTE_SN; ?>;
		//gestion des stocks
		var gestion_stock = <?php echo $GESTION_STOCK; ?>;
		//page de retour aprés création d'un contact (si vide ouverture de la visualisation du contact)
		return_to_page = "";
		//dernière_ref_doc_line insérée dans un doc par recher rapide
		var last_ssearch_ref_doc_line = "";
		var uncache = false;
<?php $i = 0;
foreach ($menu1 as $smenu) {
	?>	
			menu_id[<?php echo $i ?>]="<?php echo $smenu[0] ?>";
	<?php $i++;
}
?>
		//lancement proto de chargement de contenu
		//require _general.js	
		var page= new appelpage("sub_content");

		//lancement proto des alertes
		//require _general.js
		var alerte= new alerte_message();
		var editeur= new HTML_wysiwyg();

		function initEventHandlers() {


<?php
if (!strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') && !strpos($_SERVER['HTTP_USER_AGENT'], 'Iceweasel') && !strpos($_SERVER['HTTP_USER_AGENT'], 'Epiphany')) {
	?>alerte.confirm_supprimer("alert_nav","");
	<?php
}
?>
		hashListener.init();
		//observateurs du menu principal
		//require _general.js
<?php
$i = 0;
foreach ($menu1 as $smenu) {
	?>	
			Event.observe('table_<?php echo $smenu[0] ?>', 'mouseover', function(){montre("smenu<?php echo $i ?>","<?php echo $smenu[0] ?>"); $("option_info_smenu").hide();}, false);
			Event.observe('link_<?php echo $smenu[0] ?>', 'mouseover',  function(){changeclassname ('link_<?php echo $smenu[0] ?>', 'item_hover');}, false);
			Event.observe('link_<?php echo $smenu[0] ?>', 'mouseout',  function(){changeclassname ('link_<?php echo $smenu[0] ?>', 'item');}, false);
			Event.observe('link_<?php echo $smenu[0] ?>', 'click',  function(evt){ Event.stop(evt); page.verify('<?php echo $smenu[0] ?>','<?php echo $smenu[1] ?>','<?php echo $smenu[2] ?>','<?php echo $smenu[3] ?>'); return_to_page = "";}, false);
	<?php
	$i++;
}

$i = 0;
foreach ($menu1 as $smenu) {
	if (isset($smenu[5])) {
		?>
				Event.observe('sub_content', 'mouseover',  function(){ montre('','<?php echo $smenu[0] ?>'); $("option_info_smenu").hide();}, false);
				Event.observe('option_info', 'mouseover',  function(){ montre('','<?php echo $smenu[0] ?>');}, false);
				Event.observe('option_info_smenu', 'mouseover',  function(){montre('','<?php echo $smenu[0] ?>');}, false);
				Event.observe('table_smenu<?php echo $i ?>', 'mouseover',  function(){montre('smenu<?php echo $i ?>','<?php echo $smenu[0] ?>');}, false);
				Event.observe('table_smenu<?php echo $i ?>', 'mouseover',  function(){changeclassname ('link_<?php echo $smenu[0] ?>', 'item_hover'); $("option_info_smenu").hide();}, false);
				Event.observe('table_smenu<?php echo $i ?>', 'mouseout',  function(){montre('','<?php echo $smenu[0] ?>');}, false);
				Event.observe('table_smenu<?php echo $i ?>', 'mouseout',  function(){changeclassname ('link_<?php echo $smenu[0] ?>', 'item'); }, false);
		<?php
		foreach ($smenu[5] as $ssmenu) {
			?>
					Event.observe('<?php echo $ssmenu[0] ?>', 'click',  function(evt){ Event.stop(evt); page.verify('<?php echo $ssmenu[0] ?>','<?php echo $ssmenu[1] ?>','<?php echo $ssmenu[2] ?>','<?php echo $ssmenu[3] ?>'); montre('','<?php echo $smenu[0] ?>'); return_to_page = "";}, false);
			<?php
		}
	}

	$i++;
}
?>
		//Construction et placement des éléments du menu principal
		//require _general.js
		//construct_menu ();

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
		//require _general.js
		setsize_to_element ();
		set_tomax_height('sub_content' , -20);
		// mise à la bonne largeur du sub_content
		set_size_to_sub_content ();

		//waiting..fermeture au clic

		Event.observe($("wait_calcul_content"), "click", function() {
		$("wait_calcul_content").style.display= "none";
		}, false);
		//observateur de resize pour mise à hauteur des éléments principaux
		Event.observe(window, "resize", function() {setsize_to_element(); set_tomax_height('sub_content' , -20); set_size_to_sub_content ();}, false);

		//lancement de la page par défaut
		//require _general.js

		page.verify('<?php echo $default_page[0] ?>','<?php echo $default_page[1] ?>','<?php echo $default_page[2] ?>','<?php echo $default_page[3] ?>');

		}

		var tempo_session=<?php echo $USER_SESSION_LT / $TEST_SESSION_TIMER; ?>000;
		// verif de validité session
		setTimeout ("verif_session()", tempo_session);

		Event.observe(window, "load", initEventHandlers, false);
		//--><!]]>
		</script>
	</head>

	<body style="background-image: url(<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/main_content_bg.gif); background-repeat:repeat-x; background-attachment:fixed">
		<div id="grand_contener">
			<div id="bgmain_menu" class="<?php echo $_SESSION['interfaces'][$_INTERFACE['ID_INTERFACE']]->getLib_interface(); ?>"></div>
			<iframe id="framealert" frameborder="0" scrolling="no" src="about:blank"></iframe>
			<div id="menu" style="z-index:300">
				<?php
				//nouvelle maj dispo
//if (isset($_SESSION['NEW_MAJ_DISPO']) && $_SESSION['NEW_MAJ_DISPO'] != "0") {                
				?>
				<!--
				<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme(); ?>/images/maj_dispo.gif" alt="Nouvelle version de SoothERP disponible !" title="Nouvelle version de SoothERP disponible !" />
				-->
				<?php
//}
				$i = 0;
				foreach ($menu1 as $smenu) {
					?>
					<div style="position:absolute; top:0px; left:0px; display:none;" id="<?php echo $smenu[0] ?>">
						<table border="0" cellpadding="0" cellspacing="0" id="table_<?php echo $smenu[0] ?>"><tr><td>
									<a id="link_<?php echo $smenu[0] ?>"  class="item" href="#"><?php echo $smenu[4] ?></a>
								</td></tr></table>	
					</div>
					<?php
					$i++;
				}
				$i = 0;
				foreach ($menu1 as $smenu) {
					if (isset($smenu[5])) {
						?>
						<div style="position:absolute; top:22px; left:0px; display:none;z-index:300; filter:Alpha(opacity=90);" id="smenu<?php echo $i ?>">
							<table border="0" cellpadding="0" cellspacing="0"  class="subitem" id="table_smenu<?php echo $i ?>">
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" >
												<?php
												foreach ($smenu[5] as $ssmenu) {
													?>
												<tr>
			<?php
			if ($ssmenu[0] == "separateur") {
				?>
														<td style="line-height:3px; height:3px">
															<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/separateur.gif" width="100%" height="3px" />
															<span class="subitem"  id="<?php echo $ssmenu[0] ?>"></span>
															<?php
														} else {
															if ($ssmenu[0] == "zero" || $ssmenu[1] == "") {
																if ($ssmenu[0] == "zero") {
																	?>
																	<td style="line-height:5px; height:5px">
																		<span  id="<?php echo $ssmenu[0] ?>"  href="#"><?php echo $ssmenu[4] ?></span>
						<?php
					} else {
						?>
																		<td style="padding-left:3px">
																			<span  id="<?php echo $ssmenu[0] ?>"  href="#"><strong><?php echo $ssmenu[4] ?></strong></span>
																			<?php
																		}
																	} else {
																		?>
																		<td>
																			<a class="subitem"  id="<?php echo $ssmenu[0] ?>"  href="#"><?php echo $ssmenu[4] ?></a>
																			<?php
																		}
																	}
																	?>
																</td></tr>			
			<?php
		}
		?>
															</table>
														</td>
														</tr>
														</table>
														<?php
													}
													?>
													</div>
													<?php
													$i++;
												}
												?>
												</div>
												<div id="right_content"  style="display:none">
													<div id="user"><?php echo $_SESSION['user']->getRef_user() ?></div>
													<div id="deco"><a href="<?php echo $CORE_DIR ?>site/__session_stop.php">D&eacute;connexion</a></div>
													<div></div>
												</div>
												<table cellspacing="0" cellpadding="0" border="0" style="margin-top:22px;">
													<tr>
														<td style="width:3%">&nbsp;</td>
														<td>
															<div id="sub_content"></div>
														</td>
														<td style="width:3%">&nbsp;</td>
													</tr>
												</table>
												</div>
												<div  style="display:block; float:right; position:absolute; top:0px; right:25px; z-index:500">
													<table border="0" cellpadding="0" cellspacing="0" id="option_info"><tr><td>
																<a id="link_option_info"  class="item" href="#"> Options </a>
															</td></tr></table>
													<div style="position:absolute; width:180px; top:22px; right:-26px; display:none; z-index:300; filter:Alpha(opacity=90);" id="option_info_smenu">
														<table border="0" cellpadding="0" cellspacing="0"  class="subitem" id="option_info_stable" >
															<tr>
																<td>
																	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
																		<tr><td style="padding-left:3px">
																				<span class=""  id="interface_en_cours" href="#"><strong>Interface en cours</strong></span>
																			</td></tr>
																	</table>
																	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
<?php
foreach ($profils_allowed as $id_profil => $profil) {
	?>
																			<tr><td>
																					<a class="subitem"  id="option_info_profil_<?php echo $id_profil; ?>"  href="#">
																						<img src="<?php
																						if ($id_profil == $_SESSION['user']->getId_profil()) {
																							echo $DIR . $_SESSION['theme']->getDir_gtheme() . 'images/actuel.gif';
																						} else {
																							echo $DIR . $_SESSION['theme']->getDir_gtheme() . 'images/blank.gif';
																						}
																						?>" width="15px" height="15px"/>
																			<?php echo $_SESSION['profils'][$profil]->getLib_profil() ?>
																					</a>
																				</td></tr>			
	<?php
}
?>
																	</table>
																	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
																		<tr><td style="line-height:3px; height:3px">
																				<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/separateur.gif" width="100%" height="3px" />
																			</td></tr>
																	</table>
																	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
																		<tr><td style="padding-left:3px">
																				<span class=""  id="magasin_en_cours" href="#"><strong>Magasin en cours</strong></span>
																			</td></tr>
																	</table>
																	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
<?php
foreach ($_SESSION['magasins'] as $magasin) {
	?>
																			<tr><td>
																					<a class="subitem"  id="option_info_magasin_<?php echo $magasin->getId_magasin(); ?>"  href="#">
																						<img src="<?php
																						if ($magasin->getId_magasin() == $_SESSION['magasin']->getId_magasin()) {
																							echo $DIR . $_SESSION['theme']->getDir_gtheme() . 'images/actuel.gif';
																						} else {
																							echo $DIR . $_SESSION['theme']->getDir_gtheme() . 'images/blank.gif';
																						}
																						?>" width="15px" height="15px" id="img_option_info_magasin_<?php echo $magasin->getId_magasin(); ?>"/>
																			<?php echo htmlentities($magasin->getLib_magasin(), ENT_QUOTES, "UTF-8") ?> </a>
																				</td></tr>			
	<?php
}
?>
																	</table>
																	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
																		<tr><td style="line-height:3px; height:3px">
																				<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/separateur.gif" width="100%" height="3px" />
																			</td></tr>
																	</table>



																	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
																		<tr><td>
																				<a class="subitem"  id="option_info_licence"  href="#">Licence</a>
																			</td></tr>
																	</table>
																	<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
																		<tr><td>
																				<a class="subitem"  id="option_info_assistance"  href="#">Assistance</a>
																			</td></tr>
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
																</td>
															</tr>
														</table>
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
<?php
foreach ($profils_allowed as $id_profil => $profil) {
	?>
														Event.observe('option_info_profil_<?php echo $id_profil; ?>', 'click',  function(evt){Event.stop(evt);   window.open ("<?php echo $CORE_DIR; ?>site/__user_choix_profil.php?id_profil=<?php echo $id_profil; ?>", "_top");}, false);
	<?php
}

foreach ($_SESSION['magasins'] as $magasin) {
	?>
														Event.observe('option_info_magasin_<?php echo $magasin->getId_magasin(); ?>', 'click',  function(evt){Event.stop(evt); 
														session_change_magasin ("<?php echo $magasin->getId_magasin(); ?>");}, false);
	<?php
}
?>
													Event.observe('option_info_licence', 'click',  function(evt){Event.stop(evt);  window.open ("<?php echo $DIR; ?>__licence.rtf", "_blank");}, false);
													Event.observe('option_info_assistance', 'click',  function(evt){Event.stop(evt);  window.open ("http://community.sootherp.fr/", "_blank");}, false);
													Event.observe('option_info_deconnexion', 'click',  function(evt){Event.stop(evt);  window.open ("<?php echo $CORE_DIR; ?>site/__session_stop.php", "_top");}, false);

													</script>
												</div>
<?php if ($AFFICHE_DEBUG) { ?>
													<div  style="display:block; float:right; position:absolute; top:0px; right:115px; z-index:500; width:10px">
														<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
															<tr><td>
																	<a id="toggle_debug_iframe"  href="#">D</a>
																</td></tr>
														</table>
														<script type="text/javascript">
														Event.observe('toggle_debug_iframe', 'click',  function(evt){Event.stop(evt); $('formFrame').toggle();}, false);
														</script>
													</div>
<?php } ?>

												<div id="refresh_content">
													<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/actualiser.gif" align="top" alt="Actualiser" title="Actualiser" />
												</div>
												<div id="load_show" style=" visibility:hidden; line-height:22px; height:22px;">
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

												<div id="wait_calcul_content" style="display:none" class="alert_wait_calcul">
													<div style="text-align:center; font:16px bolder Arial, Helvetica, sans-serif">
														<img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/wait_calcul.gif" alt="" />
													</div>
												</div>


												<div id="alert_pop_up">
												</div>

												<div id="alert_pop_up_tab" class="alert_pop_up_tab">
													<div  id="titre_alert"></div>
													<div id="texte_alert"></div>		
													<div id="bouton_alert"><input type="submit" name="bouton1" id="bouton1" value="Supprimer" /><input type="submit" id="bouton0" name="bouton0" value="Retour" />
													</div>
												</div>
												<div id="alert_fin_session" class="alert_pop_up_tab">
													<div  id="alert_fin_session_content">
														<table cellpadding=0 cellspacing=0 border=0 style="width:100%; text-align:center">
															<tr>
																<td>
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
																							<td style="text-align: right"> Utilisateur : </td>
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
																					</td>
																					</tr>
																					</table>
																					</div>
																					</div>

																					<div id="alert_onException" class="alert_pop_up__exception_tab">
																						<div  id="alert_onException_content">
																							<table cellpadding=0 cellspacing=0 border=0 style="width:100%; text-align:center">
																								<tr>
																									<td>
																										<table width="100%" cellpadding=0 cellspacing=0 border=0 align="center">
																											<tr>
																												<td colspan="2" style="text-align:center; font-weight:bolder; line-height:20px; height:20px;  border-bottom:1px solid #000000;">Erreur de connexion au serveur </td>
																											</tr>
																											<tr>
																												<td style="text-align: right">&nbsp;</td>
																												<td>&nbsp;</td>
																											</tr>
																											<tr>
																												<td colspan="2" style="text-align: center; font-size:10px"><p>La connexion au serveur semble interrompue. <br />
																														Il se peut que  votre derni&egrave;re action n&rsquo;ait pas &eacute;t&eacute; enregistr&eacute;e. <br /><br />

																														Nous vous recommandons de rafra&icirc;chir la page sur laquelle  vous travaillez ou de revalider votre derni&egrave;re action, afin de v&eacute;rifier si  toutes les donn&eacute;es ont bien &eacute;t&eacute; transmises.</p></td>
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
																									</td>
																								</tr>
																							</table>
																						</div>
																					</div>
																					<iframe src="about:blank" style="display: none; right: 0px; position: absolute; top: 0px; height:0px;z-index:231;width:0;" id="historiqueFrame" name="historiqueFrame"></iframe>
																					<iframe src="about:blank" style="display: none; right: 15%; position: absolute; top:50px; height:450px;z-index:231;width:50%;" scrolling="auto" id="formFrame" name="formFrame"></iframe>

																					</div>
																					<script type="text/javascript"></script>
																					</body>
																					</html>
