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
<p>enregistrement brouillon newsletter </p>
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

?>
if (erreur) {
	
}
else
{
window.parent.alerte.alerte_erreur ('Enregistrement du brouillon', 'Le brouillon a été bien été enregistré','<input type="submit" id="bouton0" name="bouton0" value="Ok" />');

window.parent.changed = false;
}
</script>