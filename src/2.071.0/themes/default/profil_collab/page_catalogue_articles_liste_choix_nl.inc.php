
<div style="height:200px; padding-right:3px;">
<ul class="complete_adresse">
<?php
$i=0;
foreach ($choix_sns as  $choix_sn=>$cpt) {
	?>
	<li class="complete_coordonnee" id="li_choix_sn_<?php echo $_REQUEST["input"]?>_<?php echo $i;?>">
	<?php
	if ($choix_sn != "") {
		?>
		<?php echo  htmlentities($choix_sn." (".$cpt.")", ENT_QUOTES, "UTF-8")?><br />
		<?php 
	}
	?>
	</li>
	<?php 
	$i++;
}?>
</ul>

<script type="text/javascript">
<?php
$i=0;
foreach ($choix_sns as $choix_sn=>$cpt) {
	?>
	
	Event.observe("li_choix_sn_<?php echo $_REQUEST["input"]?>_<?php echo $i;?>", "mouseout",  function(){changeclassname ("li_choix_sn_<?php echo $_REQUEST["input"]?>_<?php echo $i;?>", "complete_coordonnee");}, false);
	
	Event.observe("li_choix_sn_<?php echo $_REQUEST["input"]?>_<?php echo $i;?>", "mouseover",  function(){changeclassname ("li_choix_sn_<?php echo $_REQUEST["input"]?>_<?php echo $i;?>", "complete_coordonnee_hover");}, false);
	
	Event.observe("li_choix_sn_<?php echo $_REQUEST["input"]?>_<?php echo $i;?>", "click",  function(){
	$("<?php echo $_REQUEST["input"]?>").value = "<?php echo  htmlentities($choix_sn, ENT_QUOTES, "UTF-8")?>";
	$("<?php echo $_REQUEST["input2"]?>").value = "<?php echo  htmlentities($cpt, ENT_QUOTES, "UTF-8")?>";
	$("<?php echo $_REQUEST["input"]?>").focus();
	delay_close ("<?php echo $_REQUEST["choix_sn"]?>","<?php echo $_REQUEST["iframe_choix_sn"]?>" );
	}, false);
	
	<?php 
	$i++;
} 
 ?>
</script>
</div>