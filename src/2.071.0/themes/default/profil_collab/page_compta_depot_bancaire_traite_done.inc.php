<?php

// *************************************************************************************************************
// Remise en banque depuis la caisse (ou dépot bancaire depuis la caisse)
// *************************************************************************************************************

// Variables nécessaires à l"affichage
$page_variables = array ();
check_page_variables ($page_variables);

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

?>
<script type="text/javascript">

	
</script>
<div class="emarge"><br />

<iframe frameborder="0" scrolling="no" src="about:_blank" id="edition_reglement_iframe" class="edition_reglement_iframe" style="display:none"></iframe>
<div id="edition_reglement" class="edition_reglement" style="display:none">
</div>
<div class="titre" style="width:60%; padding-left:140px">Remise en banque de traites effectuée
</div>


<div class="emarge" style="text-align:right" >
<div  id="corps_gestion_caisses">
<table width="950px" height="350px" border="0" align="right" cellpadding="0" cellspacing="0" >
	<tr>
	<td rowspan="2" style="width:50px; height:50px; background-color:#FFFFFF">
		<div style="position:relative; top:-35px; left:-35px; width:105px; border:1px solid #999999; background-color:#FFFFFF; text-align:center">
		<img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/ico_caisse.jpg" />				</div>
		<span style="width:35px">
		<img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="50px" height="20px" id="imgsizeform"/>				</span>			
	</td>
	<td colspan="2" style="width:85%; background-color:#FFFFFF" >
	
	<br />
	<br />
	<br />
		
	
	<div  ><br />

	
	<span id="link_retour_caisse" class="grey_caisse" ><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce_bleue.gif"  style="padding-right:10px; float:left" vspace="3" /> Retour au Tableau de bord</span><br /><br />


	<span id="print_rapport" class="grey_caisse" ><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce_bleue.gif"  style="padding-right:10px; float:left" vspace="3" />Impression de la remise en banque</span><br />

	</div>
	
<script type="text/javascript">
Event.observe("link_retour_caisse", "click",  function(evt){Event.stop(evt); page.verify('compta_compte_bancaire_gestion2','compta_compte_bancaire_gestion2.php?id_compte_bancaire=2','true','sub_content');}, false);
Event.observe("print_rapport", "click",  function(evt){Event.stop(evt); 
page.verify("compta_depot_caisse_imprimer", "compta_depot_caisse_imprimer.php?id_caisse=<?php echo $_REQUEST["id_caisse"];?>&id_compte_caisse_depot=<?php echo $_REQUEST["id_compte_caisse_depot"];?>", "true", "_blank");
}, false);
</script>


	</div>


			</td>
		</tr>
</table>
</div>
</div>
</div>
<SCRIPT type="text/javascript">


//on masque le chargement
H_loading();
</SCRIPT>