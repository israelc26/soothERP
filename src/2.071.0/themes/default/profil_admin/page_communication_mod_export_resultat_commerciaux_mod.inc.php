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

?>
<p>&nbsp;</p>
<p>gestion stats type MOD </p>
<p>&nbsp; </p>
<?php 
foreach ($_ALERTES as $alerte => $value) {
	echo $alerte." => ".$value."<br>";
}
?>
<script type="text/javascript">
var erreur=false;
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

window.parent.page.verify('communication_mod_export_resultat_commerciaux','communication_mod_export_resultat_commerciaux.php','true','sub_content');

}
</script>