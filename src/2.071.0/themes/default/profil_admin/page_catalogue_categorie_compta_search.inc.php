<?php

//  ******************************************************
// CONTROLE DU THEME
//  ******************************************************

// Variables nécessaires à l'affichage
$page_variables = array ();
check_page_variables ($page_variables);



//  ******************************************************
// AFFICHAGE
//  ******************************************************


// Formulaire de recherche
?>



<div style="font-weight:bolder; border-bottom:1px solid #000000;">Modification du numéro de compte </div>
<div>
<div>
	<table style="width:97%">
		<tr class="smallheight">
			<td style="width:5%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
			<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
			<td style="width:40%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
			<td style="width:5%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
		</tr>
		<tr>
			<td></td>
			<td>&nbsp;			</td>
			<td>					</td>
			<td></td>
		</tr>
		<tr>
			<td>					</td>
			<td>
			<strong>Recherche par mot clef:</strong>			</td>
			<td>
			<img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/ico_recherche.gif" id="search_compte_kw" style="cursor:pointer; float:right"/>
			<input type="text" name="cpe_search_lib" id="cpe_search_lib" value=""   class="classinput_lsize"/>
			<script type="text/javascript">
			Event.observe("search_compte_kw", "click",  function(evt){
				Event.stop(evt);
				load_result_plan_compte_recherche("kw", $("cpe_search_lib").value,  "compte_tva_search_result.php");
			}, false);
			
			</script>					</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>&nbsp;			</td>
			<td>					</td>
			<td></td>
		</tr>
		<tr>
			<td>					</td>
			<td>
			<strong>Recherche par num&eacute;ro de compte:</strong>			</td>
			<td>
			<img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/ico_recherche.gif" id="search_compte_num" style="cursor:pointer; float:right"/>
			<input type="text" name="cpe_search_num" id="cpe_search_num" value=""   class="classinput_lsize"/>
			<script type="text/javascript">
			Event.observe("search_compte_num", "click",  function(evt){
				Event.stop(evt);
				load_result_plan_compte_recherche("num", $("cpe_search_num").value,  "compte_tva_search_result.php?&indent=<?php echo $_REQUEST['indent'];?>");
			}, false);
			
			</script>					</td>
			<td>					</td>
		</tr>
		<tr>
			<td></td>
			<td>&nbsp;			</td>
			<td>					</td>
			<td></td>
		</tr>
		<tr>
			<td>&nbsp;			</td>
			<td colspan="2">
					<img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/ico_recherche.gif" id="search_compte_fav" style="cursor:pointer; float:right"/>
					<strong>Recherche à partir de la liste de Favoris</strong>
					<script type="text/javascript">
			Event.observe("search_compte_fav", "click",  function(evt){
				Event.stop(evt);
				load_result_plan_compte_recherche("fav", "1",  "compte_tva_search_result.php?&indent=<?php echo $_REQUEST['indent'];?>");
			}, false);
			
						</script>							</td>
			<td>					</td>
		</tr>
		<tr>
			<td></td>
			<td>&nbsp;</td>
			<td>					</td>
			<td></td>
		</tr>
		<tr>
			<td>					</td>
			<td>Sélectionnez un résultat et validez:			</td>
			<td>					</td>
			<td>					</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2">
			<div id="result_search_compte" style="height:190px; width:450px; background-color:#FFFFFF; border:1px solid #aaaaaa; overflow:auto;"></div>			</td>
			<td></td>
		</tr>
		<tr>
			<td>			</td>
			<td colspan="2">
				<input name="valider" id="valider" type="image" src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-valider.gif" />
						
				<form method="post" action="catalogue_categorie_compta_numero_mod.php" id="catalogue_categorie_compta_numero_mod" name="catalogue_categorie_compta_numero_mod" target="formFrame">
				<input type="hidden" name="retour_value" id="retour_value" value=""  />
				<input type="hidden" name="retour_lib" id="retour_lib" value=""  />
				<?php if (isset($_REQUEST["ref_art_categ"])) { ?>
				<input type="hidden" id="retour_ref_art_categ" name="retour_ref_art_categ" value="<?php echo $_REQUEST["ref_art_categ"];?>"  />
				<?php } ?>
				</form>
				<script type="text/javascript">
				Event.observe("valider", "click",  function(evt){
					Event.stop(evt);
					if ($("retour_value").value == "") {
						$("numero_compte_compta_art_categ").innerHTML = "...";
						$("numero_compte_compta_art_categ").title = "Sélectionnez un n° de compte";
					} else {
						$("numero_compte_compta_art_categ").innerHTML = $("retour_value").value;
						$("numero_compte_compta_art_categ").title = $("retour_lib").value;
					}
					$("catalogue_categorie_compta_numero_mod").submit();
					close_compta_plan_mini_moteur();
				}, false);
				</script>
			</td>
			<td></td>
		</tr>
	</table>
</div>
</div>

<script type="text/javascript">
//observer le retour chariot lors de la saisie du code barre pour lancer la recherche
function send_if_Key_RETURN (evt, type) {

	var id_field = Event.element(evt);
	var field_value = id_field.value;
	var key = evt.which || evt.keyCode; 
	switch (key) {   
	case Event.KEY_RETURN:     
			Event.stop(evt);
			load_result_plan_compte_recherche(type, field_value,  "catalogue_categorie_compta_search_result.php?&indent=<?php echo $_REQUEST['indent'];?>");
	break;   
	}
}

Event.observe('cpe_search_num', "keypress", function(evt){send_if_Key_RETURN (evt, "num");});
Event.observe('cpe_search_lib', "keypress", function(evt){send_if_Key_RETURN (evt, "kw");});
//on masque le chargement
H_loading();
</SCRIPT>
</div>