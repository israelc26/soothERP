
<?php

// *************************************************************************************************************
// CONTROLE DU THEME
// *************************************************************************************************************

// Variables nécessaires à l'affichage
$page_variables = array ("_ALERTES");
check_page_variables ($page_variables);


//******************************************************************
// Variables communes d'affichage
//******************************************************************




// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

?>
<p>&nbsp;</p>
<p>comptes bancaire (Ordre) </p>
<p>&nbsp; </p>
<?php 
foreach ($_ALERTES as $alerte => $value) {
	echo $alerte." => ".$value."<br>";
}
?>
<script type="text/javascript">
var erreur=false;
var texte_erreur = "";
<?php 
if (count($_ALERTES)>0) {
}
foreach ($_ALERTES as $alerte => $value) {

}

?>
if (erreur) {



}
else
{

window.parent.changed = false;

window.parent.page.traitecontent('compta_compte_bancaire_contact','compta_compte_bancaire_contact.php?ref_contact=<?php echo $_REQUEST["ref_contact_".$_REQUEST["id_compte_bancaire"]];?>','true','sub_content');

}
</script>