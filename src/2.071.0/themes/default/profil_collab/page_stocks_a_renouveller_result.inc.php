<?php

// *************************************************************************************************************
// CONTROLE DU THEME
// *************************************************************************************************************

// Variables nécessaires à l'affichage
$page_variables = array ("_ALERTES", "fiches", "form['page_to_show']", "form['fiches_par_page']", "nb_fiches", "form['orderby']", "form['orderorder']");
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
	
	$barre_nav .= barre_navigation($nb_fiches, $form['page_to_show'], 
                                       $form['fiches_par_page'], 
                                       $debut, $cfg_nb_pages,
                                       'page_to_show_s',
																			 'stock_a_renouveller()');



// Affichage des erreurs
foreach ($_ALERTES as $alerte => $value) {
	echo $alerte." => ".$value."<br>";
}

// Affichage des résultats
?><br />
<div   class="mt_size_optimise">

<div id="affresult">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="text-align:left;">R&eacute;sultat de la recherche :</td>
		<td id="nvbar"><?php echo $barre_nav;?></td>
		<td style="text-align:right;">R&eacute;ponse <?php echo $debut+1?> &agrave; <?php echo $debut+count($fiches)?> sur <?php echo $nb_fiches?></td>
	</tr>
</table>



</div>

<table width=""  border="0" cellspacing="0" cellpadding="0" id="tableresult">
	<tr class="colorise0">
		<td style="width:120px">
			<div style="width:120px">
			<a href="#"  id="order_simple_ref">R&eacute;f&eacute;rence
			</a>
			</div>
		</td>
		<td style="width:280px" >
			<div style="width:280px">
			<a href="#"  id="order_simple_lib">Libell&eacute;
			</a>
			</div>
		</td>
			<td style="width:15%; text-align:center">En stock</td>
			<td style="width:15%; text-align:center">R&eacute;serv&eacute;</td>
			<td style="width:15%; text-align:center">Reappro</td>
			<td style="width:15%; text-align:center">Minima</td>
			<td style="width:15%; text-align:center">A Commander</td>
			<td style="width:15%;text-align:center">
			</td>
	</tr>
<?php 
$colorise=0;
foreach ($fiches as $fiche) {
$colorise++;
$class_colorise= ($colorise % 2)? 'colorise1' : 'colorise2';
?>
<tr class="<?php  echo  $class_colorise?>" id="result_renouv_stock_<?php echo htmlentities($fiche->ref_article, ENT_QUOTES, "UTF-8")?>">
	<td class="reference">
		<a  href="#" id="link_art_ref_<?php echo htmlentities($fiche->ref_article, ENT_QUOTES, "UTF-8")?>" style="display:block; width:100%">
		<?php	if ($fiche->ref_interne!="") { echo htmlentities($fiche->ref_interne, ENT_QUOTES, "UTF-8")."&nbsp;";}else{ echo htmlentities($fiche->ref_article, ENT_QUOTES, "UTF-8")."&nbsp;";}?><br />
		<?php	if ($fiche->ref_oem) { echo htmlentities($fiche->ref_oem, ENT_QUOTES, "UTF-8")."&nbsp;";}?>		
		</a>
		<script type="text/javascript">
		Event.observe("link_art_ref_<?php echo htmlentities($fiche->ref_article, ENT_QUOTES, "UTF-8")?>", "click",  function(evt){Event.stop(evt); page.verify('catalogue_articles_view','index.php#'+escape('catalogue_articles_view.php?ref_article=<?php echo htmlentities($fiche->ref_article, ENT_QUOTES, "UTF-8")?>'),'true','_blank');
		}, false);
		</script>
	</td>
	<td>
		<a  href="#" id="link_art_lib_<?php echo htmlentities($fiche->ref_article, ENT_QUOTES, "UTF-8")?>" style="display:block; width:100%">
		
		<span class=""><?php echo nl2br(htmlentities($fiche->lib_article, ENT_QUOTES, "UTF-8"))?></span>
		</a>
		<script type="text/javascript">
		Event.observe("link_art_lib_<?php echo htmlentities($fiche->ref_article, ENT_QUOTES, "UTF-8")?>", "click",  function(evt){Event.stop(evt); page.verify('catalogue_articles_view','index.php#'+escape('catalogue_articles_view.php?ref_article=<?php echo htmlentities($fiche->ref_article, ENT_QUOTES, "UTF-8")?>'),'true','_blank');
		}, false);
		</script>
	</td>
			<td style="text-align:center">
			<a href="#" id="aff_resume_stock_<?php echo ($fiche->ref_article);?>">
			<span >
				<?php
				if ($fiche->lot != 2 && $fiche->modele == "materiel") {
					if (isset($fiche->qte)) {
						echo qte_format($fiche->qte); 
					} else { 
						echo "0";
					}
				} else {
					echo "N/A";
				}
				?>
				</span>
			</a>
			<script type="text/javascript">
			Event.observe("aff_resume_stock_<?php echo ($fiche->ref_article);?>", "click", function(evt){show_resume_stock_all("<?php echo $fiche->ref_article;?>", evt); Event.stop(evt);}, false);
			</script>
			</td>
		<td style="text-align:center">
		<?php	
			if (isset($fiche->stocks_rsv) ) {
					if (!isset($fiche->stocks_rsv["qte_livree"])) {$fiche->stocks_rsv["qte_livree"] = 0 ;}
					if (!isset($fiche->stocks_rsv["qte"])) {$fiche->stocks_rsv["qte"] = 0 ;}
					echo qte_format($fiche->stocks_rsv["qte"] - $fiche->stocks_rsv["qte_livree"]) ;
			
				
			} else {
				echo "0";
			}
			?>
		</td>
		<td style="text-align:center">
		<?php	
			if (isset($fiche->stocks_cdf)) {
					if (!isset($fiche->stocks_cdf["qte_recue"])) {$fiche->stocks_cdf["qte_recue"] = 0 ;}
					if (!isset($fiche->stocks_cdf["qte"])) {$fiche->stocks_cdf["qte"] = 0 ;}
					echo qte_format($fiche->stocks_cdf["qte"] - $fiche->stocks_cdf["qte_recue"]) ;
				
			} else {
				echo "0";
			}
			?>
		</td>
			<td style="text-align:center">
			<?php 
				if (isset($fiche->seuil_alerte)) {
					echo ($fiche->seuil_alerte);
				}
			?>
			</td>
			<td style="text-align:center; font-weight:bolder">
			<?php
				if ((isset($fiche->seuil_alerte) && isset($fiche->qte) && ($fiche->qte < $fiche->seuil_alerte)) || (isset($fiche->seuil_alerte) && !isset($fiche->qte) )) { 
					if (!isset($fiche->qte) || $fiche->qte < 0) {$fiche->qte=0;}
						echo  qte_format($fiche->seuil_alerte-$fiche->qte);
				}
				?>
			</td>
			<td style="text-align:center">
			<?php if ($fiche->date_fin_dispo >= date("Y-m-d H:i:s")) {?>
			<span style="cursor:pointer" id="fin_dispo_<?php echo ($fiche->ref_article);?>" name="fin_dispo_<?php echo ($fiche->ref_article);?>" >Fin de vie</span>
			
			<script type="text/javascript">
			Event.observe("fin_dispo_<?php echo ($fiche->ref_article);?>", "click", function(evt){
				Event.stop(evt);
				fin_dispo("<?php echo $fiche->ref_article;?>", "result_renouv_stock_");
			}, false);
			</script>
			<?php }?>
			</td>
	</tr>
	
<?php
}
?></table>

<div id="affresult">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="text-align:left;">R&eacute;sultat de la recherche :</td>
		<td id="nvbar"><?php echo str_replace("link_", "link2_",$barre_nav);?></td>
		<td style="text-align:right;">R&eacute;ponse <?php echo $debut+1?> &agrave; <?php echo $debut+count($fiches)?> sur <?php echo $nb_fiches?></td>
	</tr>
</table>


</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</div>



<iframe frameborder="0" scrolling="no" src="about:_blank" id="resume_stock_iframe" class="resume_stock_iframe"></iframe>
<div id="resume_stock" class="resume_stock">
</div>
<SCRIPT type="text/javascript">

Event.observe("order_simple_ref", "click",  function(evt){Event.stop(evt); $('orderby_s').value='ref_interne'; $('orderorder_s').value='<?php if ($form['orderorder']=="ASC" && $form['orderby']=="ref_interne") {echo "DESC";} else {echo "ASC";}?>'; stock_a_renouveller();}, false);
Event.observe("order_simple_lib", "click",  function(evt){Event.stop(evt); $('orderby_s').value='lib_article'; $('orderorder_s').value='<?php if ($form['orderorder']=="ASC" && $form['orderby']=="lib_article") {echo "DESC";} else {echo "ASC";}?>'; stock_a_renouveller();}, false);


//on masque le chargement
H_loading();
</SCRIPT>