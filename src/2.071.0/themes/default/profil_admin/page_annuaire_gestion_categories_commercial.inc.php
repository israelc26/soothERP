<?php
//  ******************************************************
// CONTROLE DU THEME
//  ******************************************************
// Variables nécessaires à l'affichage
$page_variables = array ();
check_page_variables ($page_variables);

// AFFICHAGE
?>
<script type="text/javascript">
tableau_smenu[0] = Array("smenu_annuaire", "smenu_annuaire.php" ,"true" ,"sub_content", "Annuaire");
tableau_smenu[1] = Array('annuaire_gestion_categ_commercial','annuaire_gestion_categories_commercial.php',"true" ,"sub_content", "Gestion des catégories des Commerciaux");
update_menu_arbo();
</script>
<div class="emarge">

<p class="titre">Gestion des catégories des Commerciaux</p>
<div style="height:50px">
<table class="minimizetable">
<tr>
<td class="contactview_corps">
<div id="cat_commercial" style="padding-left:10px; padding-right:10px">

	
	<p>Ajouter une cat&eacute;gorie </p>
	
		<table>
		<tr>
			<td style="width:90%">
					<table>
					<tr class="smallheight">
						<td style="width:35%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:40%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:25%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
					</tr>	
					<tr>
						<td ><span class="labelled">Libell&eacute;:</span>
						</td>
						<td ><span class="labelled">Note:</span>
						</td>
						<td>&nbsp;
						</td>

					</tr>
				</table>
				</td>
				<td>
				</td>
			</tr>
		</table>
	<div class="caract_table">

		<table>
		<tr>
			<td style="width:90%">
				<form action="annuaire_gestion_categories_commercial_add.php" method="post" id="annuaire_gestion_categories_commercial_add" name="annuaire_gestion_categories_commercial_add" target="formFrame" >
				<table>
					<tr class="smallheight">
						<td style="width:35%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:40%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:25%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
					</tr>	
					<tr>
						<td>
						<input name="lib_commercial_categ" id="lib_commercial_categ" type="text" value=""  class="classinput_lsize"/>
						</td>
						<td>
							<textarea name="note" id="note" class="classinput_xsize"></textarea>
						</td>
						<td>
							<p style="text-align:center">
							<input name="ajouter" id="ajouter" type="image" src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-ajouter.gif" />
							</p>
						</td>
					</tr>
				</table>
				</form>
			</td>
			<td>
			</td>
		</tr>
	</table>
	</div>
	<br />
	<?php 
	if ($liste_categories) {
	?>
	<p>Liste des cat&eacute;gories </p>

		<table>
		<tr>
			<td style="width:90%">
					<table>
					<tr class="smallheight">
						<td style="width:35%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:40%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:25%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
					</tr>	
					<tr>
						<td ><span class="labelled">Libell&eacute;:</span>
						</td>
						<td ><span class="labelled">Note:</span>
						</td>
						<td>&nbsp;
						</td>
					</tr>
				</table>
			</td>
			<td>
			</td>
			</tr>
		</table>
	<?php 
	}
	foreach ($liste_categories as $liste_categorie) {
	?>
	<div class="caract_table" id="categories_commercial_table_<?php echo $liste_categorie->id_commercial_categ; ?>">

		<table>
		<tr>
			<td style="width:90%">
				<form action="annuaire_gestion_categories_commercial_mod.php" method="post" id="annuaire_gestion_categories_commercial_mod_<?php echo $liste_categorie->id_commercial_categ; ?>" name="annuaire_gestion_categories_commercial_mod_<?php echo $liste_categorie->id_commercial_categ; ?>" target="formFrame" >
				<table>
					<tr class="smallheight">
						<td><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:35%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:40%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
						<td style="width:25%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
					</tr>	
					<tr>
						<td style="text-align:center">
						<input name="defaut_commercial_categ_<?php echo $liste_categorie->id_commercial_categ; ?>"  type="checkbox" id="defaut_commercial_categ_<?php echo $liste_categorie->id_commercial_categ; ?>" value="1" <?php if ( $DEFAUT_ID_COMMERCIAL_CATEG == $liste_categorie->id_commercial_categ) { echo 'checked="checked"';} ?> alt="Catégorie par défaut" title="Catégorie par défaut" />
							
						</td>
						<td>
						<input id="lib_commercial_categ_<?php echo $liste_categorie->id_commercial_categ; ?>" name="lib_commercial_categ_<?php echo $liste_categorie->id_commercial_categ; ?>" type="text" value="<?php echo htmlentities($liste_categorie->lib_commercial_categ, ENT_QUOTES, "UTF-8"); ?>"  class="classinput_lsize"/>
			<input name="id_commercial_categ" id="id_commercial_categ" type="hidden" value="<?php echo $liste_categorie->id_commercial_categ; ?>" />
						</td>
						<td>
						<textarea id="note_<?php echo $liste_categorie->id_commercial_categ; ?>" name="note_<?php echo $liste_categorie->id_commercial_categ; ?>" class="classinput_xsize"><?php echo htmlentities($liste_categorie->note, ENT_QUOTES, "UTF-8"); ?></textarea>
						</td>
						<td>
							<p style="text-align:center">
								<input name="modifier" id="modifier" type="image" src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-modifier.gif" />
							</p>
						</td>
					</tr>
				</table>
				</form>
			</td>
			<td>
			<form method="post" action="annuaire_gestion_categories_commercial_sup.php" id="annuaire_gestion_categories_commercial_sup_<?php echo $liste_categorie->id_commercial_categ; ?>" name="annuaire_gestion_categories_commercial_sup_<?php echo $liste_categorie->id_commercial_categ; ?>" target="formFrame">
			<input name="id_commercial_categ" id="id_commercial_categ" type="hidden" value="<?php echo $liste_categorie->id_commercial_categ; ?>" />
		</form>
		<a href="#" id="link_annuaire_gestion_categories_commercial_sup_<?php echo $liste_categorie->id_commercial_categ; ?>"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/supprime.gif" border="0"></a>
		<script type="text/javascript">
		Event.observe("link_annuaire_gestion_categories_commercial_sup_<?php echo $liste_categorie->id_commercial_categ; ?>", "click",  function(evt){Event.stop(evt); alerte.confirm_supprimer('categories_commercial_sup', 'annuaire_gestion_categories_commercial_sup_<?php echo $liste_categorie->id_commercial_categ; ?>');}, false);
		</script>
			</td>
		</tr>
	</table>
	</div>
	<br />
	<?php
	}
	?>
</div>
</td>
</tr>
</table>

<SCRIPT type="text/javascript">
new Form.EventObserver('annuaire_gestion_categories_commercial_add', function(element, value){formChanged();});

<?php 
foreach ($liste_categories as $liste_categorie) {
	?>
		new Form.EventObserver('annuaire_gestion_categories_commercial_mod_<?php echo $liste_categorie->id_commercial_categ; ?>', function(element, value){formChanged();});
	<?php
}
?>

//on masque le chargement
H_loading();
</SCRIPT>
</div>
</div>