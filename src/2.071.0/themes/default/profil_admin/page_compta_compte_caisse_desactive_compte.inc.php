
<?php

//  ******************************************************
// CONTROLE DU THEME
//  ******************************************************

// Variables nécessaires à l'affichage
$page_variables = array ("_ALERTES");
check_page_variables ($page_variables);


// ***********
// Variables communes d'affichage
// ***********




//  ******************************************************
// AFFICHAGE
//  ******************************************************

?><script type="text/javascript">
var erreur=false;
var caisse_fonds_present = false;
var texte_erreur = "";
<?php 
if (count($_ALERTES)>0) {
}
foreach ($_ALERTES as $alerte => $value) {
	if ($alerte=="caisse_fonds_present") {
		echo "caisse_fonds_present=true;";
		echo "erreur=true;\n";
	}
	
}

?>
if (erreur) {
	

	
	if (caisse_fonds_present) {
$("actif_<?php echo $_REQUEST['id_compte_caisse']?>").checked="checked";
		texte_erreur += "Votre caisse contient actuellement des fonds.<br/> Veuillez depuis l'interface collaborateur procéder à un transfert entre caisse ou à une remise en banque avant d'inactiver la caisse ";
	} 
	alerte.alerte_erreur ('Inactivation impossible', texte_erreur,'<input type="submit" id="bouton0" name="bouton0" value="Ok" />');



}
else
{

changed = false;


}
</script>