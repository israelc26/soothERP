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
<p>comptes tpe (modifier) </p>
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

window.parent.changed = false;

window.parent.page.traitecontent('compta_compte_tpe','compta_compte_tpes.php?id_magasin=<?php echo $_REQUEST["id_magasin_".$_REQUEST["id_compte_tpe"]]?>','true','sub_content');

}
</script>