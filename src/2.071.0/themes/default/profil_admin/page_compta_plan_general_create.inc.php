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


<div style="font-weight:bolder; border-bottom:1px solid #000000;">Ajout d'un compte au plan comptable général </div><br />
<br />

<div>
	<div>

	<table style="width:100%">
	<tr>
		<td style="width:95%">
			<form action="compta_plan_general_add.php" method="post" id="compta_plan_general_add" name="compta_plan_general_add" target="formFrame" >
			<table style="width:100%">
				<tr class="smallheight">
					<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
					<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
					</tr>	
				<tr>
					<td style="text-align:left">Numéro du compte					</td>
					<td style="text-align:left"><input name="numero_compte" id="numero_compte" type="text" value=""  class="classinput_xsize"/></td>
					</tr>
				<tr>
					<td style="text-align:left">&nbsp;</td>
					<td style="text-align:left">					</td>
					</tr>
				<tr>
					<td style="text-align:left">Libellé du compte </td>
					<td style="text-align:left">
					<input name="lib_compte" id="lib_compte" type="text" value=""  class="classinput_xsize"/>					</td>
					</tr>
				<tr>
					<td style="text-align:left">&nbsp;</td>
					<td style="text-align:left">&nbsp;</td>
					</tr>
				<tr>
					<td style="text-align:left">Ins&eacute;rer ce compte dans le plan comptable de l'entreprise 					</td>
					<td style="text-align:left"><span style="text-align:center">
						<input name="favori" id="favori" type="checkbox" value="1"  />
					</span> </td>
					</tr>
				<tr>
					<td style="text-align:left">					</td>
					<td style="text-align:left">			&nbsp;		</td>
					</tr>
				<tr>
					<td style="text-align:left">					</td>
					<td style="text-align:left"><span style="text-align:center">
						<input name="ajouter" id="ajouter" type="image" src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-ajouter.gif" />
					</span> </td>
					</tr>
			</table>
			</form>
		</td>
		<td>
		</td>
	</tr>
</table>
</div>

<script type="text/javascript">
new Form.EventObserver('compta_plan_general_add', function(){formChanged();});
//on masque le chargement
H_loading();
</SCRIPT>
</div>