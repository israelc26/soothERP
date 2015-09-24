<?php

// ***********************************************************************************************************
// journal des tresorerie pour rapprochement bancaire
// ***********************************************************************************************************

// Variables nécessaires à l'affichage
$page_variables = array ("_ALERTES", "fiches");
check_page_variables ($page_variables);




	
// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************
// ------------------------------------------------------------------------
// barre_navigation
// ------------------------------------------------------------------------
function barre_navigation($nbtotal,
                          $nbenr, 
                          $cfg_nbres_ppage, 
                          $debut, 
													$cfg_nb_pages,
                          $idformtochange,
													$fonctiontolauch)
													
{
	// --------------------------------------------------------------------
	global $cfg_nb_pages; // Nb de n° de pages affichées dans la barre
global $DIR;
	$barre= "";	$lien_on 	= "&nbsp;<a href='#' id='link_pagi_{cible}'>{lien}</a>&nbsp;
								<script type='text/javascript'>
								Event.observe('link_pagi_{cible}', 'click',  function(evt){Event.stop(evt); $(\"{idchange}\").value={cibleb}; {fonctionlauch};}, false);
								</script>";
	$lien_off = "&nbsp;{lien}&nbsp;";
	// --------------------------------------------------------------------
    

	// début << .
	// --------------------------------------------------------------------
	if ($debut >= $cfg_nbres_ppage)
	{
		$cible = 1;
		$image = image_html(  $DIR.$_SESSION['theme']->getDir_gtheme().'images/gauche_on.gif');
		$lien = str_replace('{lien}', $image.$image, $lien_on);
		$lien = str_replace('{cible}', $cible-1, $lien);
		$lien = str_replace('{cibleb}', $cible, $lien);
		$lien = str_replace('{fonctionlauch}', $fonctiontolauch, $lien);
		$lien = str_replace('{idchange}', $idformtochange, $lien);
	}
	else
	{
		$image = image_html(  $DIR.$_SESSION['theme']->getDir_gtheme().'images/gauche_off.gif');
		$lien = str_replace('{lien}', $image.$image, $lien_off);
	}
	$barre .= $lien."&nbsp;<strong>&middot;</strong>";


	// précédent < .
	// --------------------------------------------------------------------
	if ($debut >= $cfg_nbres_ppage)
	{
		$cible = ($nbenr-1);
		$image = image_html(  $DIR.$_SESSION['theme']->getDir_gtheme().'images/gauche_on.gif');
		$lien = str_replace('{lien}', $image, $lien_on);
		$lien = str_replace('{cible}', $cible, $lien);
		$lien = str_replace('{cibleb}', $cible, $lien);
		$lien = str_replace('{fonctionlauch}', $fonctiontolauch, $lien);
		$lien = str_replace('{idchange}', $idformtochange, $lien);
	}
	else
	{
		$image = image_html(  $DIR.$_SESSION['theme']->getDir_gtheme().'images/gauche_off.gif');
		$lien = str_replace('{lien}', $image, $lien_off);
	}
	$barre .= $lien."&nbsp;<B>&middot;</B>";
    

	// pages 1 . 2 . 3 . 4 . 5 . 6 . 7 . 8 . 9 . 10
	// -------------------------------------------------------------------

	if ($debut >= ($cfg_nb_pages * $cfg_nbres_ppage))
	{
		$cpt_fin = ($debut / $cfg_nbres_ppage) + 1;
		$cpt_deb = $cpt_fin - $cfg_nb_pages + 1;
	}
	else
	{
		$cpt_deb = 1;
        
		$cpt_fin = (int)($nbtotal / $cfg_nbres_ppage);
		if (($nbtotal % $cfg_nbres_ppage) != 0) $cpt_fin++;
        
		if ($cpt_fin > $cfg_nb_pages) $cpt_fin = $cfg_nb_pages;
	}

	for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++)
	{
		if ($cpt == ($debut / $cfg_nbres_ppage) + 1)
		{
				$barre .= "<A CLASS='off'>&nbsp;".$cpt."&nbsp;</A> ";
		}
		else
		{				$barre .= "<a href='#' id='link_txt_".$cpt."";
				$barre .= "'>&nbsp;".$cpt."&nbsp;</a>
								<script type='text/javascript'>
								Event.observe('link_txt_".$cpt."', 'click',  function(evt){Event.stop(evt); $(\"".$idformtochange."\").value=".$cpt."; ".$fonctiontolauch.";}, false);
								</script>";
		}
	}
    

	// suivant . >
	// --------------------------------------------------------------------
	if ($debut + $cfg_nbres_ppage < $nbtotal)
	{
		$cible = ($nbenr+1);
		$image = image_html(  $DIR.$_SESSION['theme']->getDir_gtheme().'images/droite_on.gif');
		$lien = str_replace('{lien}', $image, $lien_on);
		$lien = str_replace('{cible}', $cible, $lien);
		$lien = str_replace('{cibleb}', $cible, $lien);
		$lien = str_replace('{fonctionlauch}', $fonctiontolauch, $lien);
		$lien = str_replace('{idchange}', $idformtochange, $lien);
	}
	else
	{
		$image = image_html(  $DIR.$_SESSION['theme']->getDir_gtheme().'images/droite_off.gif');
		$lien = str_replace('{lien}', $image, $lien_off);
	}
	$barre .= "&nbsp;<B>&middot;</B>".$lien;

	// fin . >>
	// --------------------------------------------------------------------
	$fin = ($nbtotal - ($nbtotal % $cfg_nbres_ppage));
	if (($nbtotal % $cfg_nbres_ppage) == 0) $fin = $fin - $cfg_nbres_ppage;

	if ($fin != $debut)
	{
		$cible = (int)($nbtotal/$cfg_nbres_ppage)+1;
		$image = image_html(  $DIR.$_SESSION['theme']->getDir_gtheme().'images/droite_on.gif');
		$lien = str_replace('{lien}', $image.$image, $lien_on);
		$lien = str_replace('{cible}', $cible+1, $lien);
		$lien = str_replace('{cibleb}', $cible, $lien);
		$lien = str_replace('{fonctionlauch}', $fonctiontolauch, $lien);
		$lien = str_replace('{idchange}', $idformtochange, $lien);
	}
	else
	{
		$image = image_html(  $DIR.$_SESSION['theme']->getDir_gtheme().'images/droite_off.gif');
		$lien = str_replace('{lien}', $image.$image, $lien_off);
	}
	$barre .= "<B>&middot;</B>&nbsp;".$lien;
	return($barre);
}
// ------------------------------------------------------------------------
// image_html          
// ------------------------------------------------------------------------
function image_html($img)
{
    return '<img src="'.$img.'"    border="0" >';
}

//
//
//création de la barre de nav
//
//

	$cfg_nb_pages = 10;
	$barre_nav = "";
	$debut =(($form['page_to_show']-1)*$form['fiches_par_page']);
	
if (isset($search['date_exercice'])) {

	$barre_nav .= barre_navigation($nb_fiches, $form['page_to_show'], 
                                       $form['fiches_par_page'], 
                                       $debut, $cfg_nb_pages,
                                       'page_to_show_s',
																			 'page.compta_compte_bancaire_rapprochement_journal_result ()');
	} else {

	$barre_nav .= barre_navigation($nb_fiches, $form['page_to_show'], 
                                       $form['fiches_par_page'], 
                                       $debut, $cfg_nb_pages,
                                       'page_to_show_s',
																			 'page.compta_compte_bancaire_rapprochement_journal_result ()');
}



// Affichage des erreurs
foreach ($_ALERTES as $alerte => $value) {
	echo $alerte." => ".$value."<br>";
}

// Affichage des résultats
?><br />

<div id="affresult">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="text-align:left;">R&eacute;sultat de la recherche :</td>
		<td id="nvbar"><?php echo $barre_nav;?></td>
		<td style="text-align:right;">R&eacute;ponse <?php echo $debut+1?> &agrave; <?php echo $debut+count($fiches)?> sur <?php echo $nb_fiches?></td>
	</tr>
</table>



</div>
<div   class="mt_size_optimise">
<table width="97%"  border="0" cellspacing="0" cellpadding="0" id="tableresult">
	<tr class="colorise0">
		<td style="width:10%; text-align:center">Date</td>
		<td style="width:10%; text-align:center">Cpte</td>
		<td style="text-align:center">Libellé</td>
		<td style="width:12%; text-align:right; padding-right:10px">Montant</td>
		<td style="width:5%"></td>
		<td style="width:10%; text-align:right; padding-right:10px"></td>
	</tr>
<?php 
$solde_page = 0;
$colorise=0;
foreach ($fiches as $fiche) {
	$colorise++;
	$class_colorise= ($colorise % 2)? 'colorise1' : 'colorise2';

	?>
	<tr class="<?php  echo  $class_colorise?>">
		<td style="text-align:center; font-weight:bolder">
			<?php	if (isset($fiche->date_operation) ) { echo date_Us_to_Fr($fiche->date_operation); } ?>
		</td>
		<td style="text-align:center; font-weight:bolder">
			<span>
			<?php	if (isset($fiche->numero_compte) ) { echo $fiche->numero_compte; }	?>
			</span>
		</td>
		<td style="text-align:left;  padding-right:10px; font-weight:bolder">
			<span>
			<?php	if (isset($fiche->libelle)) { echo $fiche->libelle; }?>
			</span>
		</td>
		<td style="text-align:right; padding-left:10px; padding-right:10px">
			<span>
			<?php	
			if (isset($fiche->montant_rapproche)) { 
				echo number_format(abs($fiche->montant)-abs($fiche->montant_rapproche), $TARIFS_NB_DECIMALES, ".", ""	)."&nbsp;".$MONNAIE[1].'&nbsp;/&nbsp;'; 
			}	
			if (isset($fiche->montant)) { 
				echo number_format(abs($fiche->montant), $TARIFS_NB_DECIMALES, ".", ""	)."&nbsp;".$MONNAIE[1]; 
			}
			?>
			</span>
		</td>
		<td style="text-align:center; font-weight:bolder">
		<a href="#" id="link_view__<?php echo $colorise;?>" style="display:block; width:100%">
		<?php 
			if ($fiche->id_operation_type != 5 && $fiche->id_operation_type != 6) {
				?>
				<img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-pdf.gif"/>
			<?php } else { ?>
				<span>voir
				</span>
			<?php
			} 
		?>
		</a>
		<script type="text/javascript">
			Event.observe("link_view__<?php echo $colorise;?>", "click",  function(evt){
			Event.stop(evt);
			
			<?php 
			switch ($fiche->id_operation_type) { 
				case 1: case 2:?>
				page.verify("compta_depot_caisse_imprimer", "compta_depot_caisse_imprimer.php?id_caisse=<?php echo $fiche->id_compte_caisse;?>&id_compte_caisse_depot=<?php echo $fiche->ref_operation; ?>", "true", "_blank");
				<?php
				break;
				case 3: case 4:?>
				page.verify("compta_retrait_bancaire_caisse_imprimer", "compta_retrait_bancaire_caisse_imprimer.php?id_caisse=<?php echo $fiche->id_compte_caisse;?>&id_compte_caisse_retrait=<?php echo $fiche->ref_operation; ?>", "true", "_blank");
				<?php
				break;
				case 5: case 6:?>
				page.traitecontent('compta_reglements_edition','compta_reglements_edition.php?ref_reglement=<?php echo $fiche->ref_operation;?>','true','edition_reglement');
			$("edition_reglement").show();
			$("edition_reglement_iframe").show();
				<?php
				break;
				case 7: case 8:?>
				page.verify("compta_tp_telecollecte_imprimer", "compta_tp_telecollecte_imprimer.php?id_compte_tp=<?php echo $fiche->id_compte_tp; ?>&tp_type=<?php echo $fiche->tp_type;?>&id_compte_tp_telecollecte=<?php echo $fiche->ref_operation; ?>", "true", "_blank");
				<?php
				break;
				case 9: case 10:?>
				page.verify("compta_transfert_caisse_imprimer", "compta_transfert_caisse_imprimer.php?id_caisse=<?php echo $fiche->id_compte_caisse;?>&id_compte_caisse_transfert=<?php echo $fiche->ref_operation; ?>", "true", "_blank");
				<?php
				break;
			} 
			?>
			}, false);
			</script>
		</td>
		<td>
		
		<span id="do_rap_<?php echo $fiche->id_operation?>" style="cursor:pointer; float:right">Rapprocher</span>
		<script type="text/javascript">
		Event.observe('do_rap_<?php echo $fiche->id_operation;?>', 'click',  function(evt){
			Event.stop(evt); 
			$("titre_alert").innerHTML = 'Confirmation du rapprochement';
			$("texte_alert").innerHTML = 'Confirmer le  rapprochement avec l\'opération';
			$("bouton_alert").innerHTML = '<input type="submit" name="bouton1" id="bouton1" value="Confirmer" /><input type="submit" id="bouton0" name="bouton0" value="Annuler" />';
				
			show_pop_alerte ();
			
			$("bouton0").onclick= function () {
			hide_pop_alerte ();
			}
			
			$("bouton1").onclick= function () {
			hide_pop_alerte ();	
			var AppelAjax = new Ajax.Request(
								"compta_compte_bancaire_rapprochement_add.php", 
								{
								parameters: {id_compte_bancaire_move: '<?php echo $_REQUEST["id_compte_bancaire_move"]?>', id_compte_bancaire: '<?php echo $_REQUEST["id_compte_bancaire"];?>', date_move: '<?php echo $_REQUEST["date_move"];?>', id_operation: '<?php echo $fiche->id_operation;?>'},
								evalScripts:true, 
								onLoading:S_loading, onException: function () {S_failure();},
								onSuccess: function (requester){
								requester.responseText.evalScripts();
								H_loading();
								}
								}
								);
			
			}
		}, false);
		</script>
		</td>
		</tr>
		
		<?php
	}
	?>
</table>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
</div>



<SCRIPT type="text/javascript">

//on masque le chargement
H_loading();
</SCRIPT>