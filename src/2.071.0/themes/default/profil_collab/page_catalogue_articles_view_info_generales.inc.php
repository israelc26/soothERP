<?php

// *************************************************************************************************************
// VISUALISATION D'UN ARTICLE onglet info_generales
// *************************************************************************************************************

// Variables nécessaires à l'affichage
$page_variables = array ();
check_page_variables ($page_variables);


//******************************************************************
// Variables communes d'affichage
//******************************************************************




// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

?>
<script type="text/javascript" language="javascript">
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 20px;">
		<tr>
			<td style="width:10px;">&nbsp;</td>
			<td rowspan="2" style="width:35%">
			<input type="hidden" name="ref_art_categ" id="ref_art_categ" value="<?php echo $article->getRef_art_categ ();?>" />
			
<form action="catalogue_articles_view_valide.php?ref_article=<?php echo $article->getRef_article();?>&step=2" target="formFrame" method="post" name="article_view_2" id="article_view_2">

		<?php if($GESTION_REF_INTERNE ||$GESTION_CONSTRUCTEUR ){?>
			<table style="width:95%" border="0" id="view_info_step2" class="art_new_info">
				<tr class="smallheight">
					<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
				</tr>
					<?php if($GESTION_REF_INTERNE){?>
				<tr>
					<td class="labelled_text">R&eacute;f&eacute;rence Interne: </td>
					<td>
					<a href="#" id="link_show_ref_interne" class="modif_textarea3">
					<?php echo ($article->getRef_interne ());?>
					</a>
					<script type="text/javascript">
					Event.observe("link_show_ref_interne", "click",  function(evt){Event.stop(evt); showform('edit_info_step2', 'view_info_step2'); $("edit_etape_2").hide(); $("bt_etape_2").show();}, false);
					</script>
					
					</td>
				</tr>
					<?php }?>
					<?php if($GESTION_CONSTRUCTEUR ){?>
				<tr style="visibility:<?php if($_SESSION['user']->check_permission ("22",$CONSTRUCTEUR_ID_PROFIL)){echo "visible";}else{echo "hidden";} ?>">
					<td class="labelled_text">Constructeur:</td>
					<td>
					<a href="#" id="link_show_constructeur_liste" class="modif_textarea3">
					<?php foreach ($constructeurs_liste as $constructeur_liste) {
			 if ($article->getRef_constructeur() == $constructeur_liste->ref_contact) {echo  ($constructeur_liste->nom);}
			  }?>
					</a>
					<script type="text/javascript">
					Event.observe("link_show_constructeur_liste", "click",  function(evt){Event.stop(evt); showform('edit_info_step2', 'view_info_step2'); $("edit_etape_2").hide(); $("bt_etape_2").show();}, false);
					</script>
				
					</td>
				</tr>
					<?php }?>
					<?php if($GESTION_CONSTRUCTEUR){?>
				<tr style="visibility:<?php if($_SESSION['user']->check_permission ("22",$CONSTRUCTEUR_ID_PROFIL)){echo "visible";}else{echo "hidden";} ?>">
					<td class="labelled_text">R&eacute;f&eacute;rence constructeur:</td>
					<td>
					<a href="#" id="link_show_ref_eom" class="modif_textarea3">
					<?php echo ($article->getRef_eom ());?>
					</a>
					<script type="text/javascript">
					Event.observe("link_show_ref_eom", "click",  function(evt){Event.stop(evt); showform('edit_info_step2', 'view_info_step2'); $("edit_etape_2").hide(); $("bt_etape_2").show();}, false);
					</script>
					</td>
				</tr>
					<?php }?>
			</table>
			
			<table style="width:95%; display:none;" border="0" id="edit_info_step2" class="art_new_info">
				<tr class="smallheight">
					<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
				</tr>
					<?php if($GESTION_REF_INTERNE){?>
				<tr>
					<td class="labelled_text">R&eacute;f&eacute;rence Interne: </td>
					<td>
					<input type="text" name="ref_interne" id="ref_interne" value="<?php echo ($article->getRef_interne ());?>"  class="classinput_xsize"/>
					</td>
				</tr>
					<?php }?>
					<?php if($GESTION_CONSTRUCTEUR){?>
				<tr style="visibility:<?php if($_SESSION['user']->check_permission ("22",$CONSTRUCTEUR_ID_PROFIL)){echo "visible";}else{echo "hidden";} ?>">
					<td class="labelled_text">Constructeur:</td>
					<td>
						<select name="ref_constructeur" id="ref_constructeur" class="classinput_xsize">
						<option value=""></option>
						<?php 
						foreach ($constructeurs_liste as $constructeur_liste) {
							?>
							<option value="<?php echo $constructeur_liste->ref_contact;?>" <?php if ($article->getRef_constructeur() == $constructeur_liste->ref_contact) {echo 'selected="selected"';}?>><?php echo  ($constructeur_liste->nom);?></option>
							<?php 
						}
						?>
						</select>
					</td>
				</tr>
					<?php }?>
					<?php if($GESTION_CONSTRUCTEUR){?>
				<tr style="visibility:<?php if($_SESSION['user']->check_permission ("22",$CONSTRUCTEUR_ID_PROFIL)){echo "visible";}else{echo "hidden";} ?>">
					<td class="labelled_text">R&eacute;f&eacute;rence constructeur:</td>
					<td>
						<input type="text" name="ref_oem" id="ref_oem" value="<?php echo ($article->getRef_eom ());?>"  class="classinput_xsize"/>
					</td>
				</tr>
					<?php }?>
			</table><br />
		<?php }?>

			<table style="width:95%" border="0" cellspacing="0" cellpadding="0">
				<tr class="smallheight">
					<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					<td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
				</tr>
				<tr>
					<td class="labelled_bold" >Description courte:</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" class="labelled_text">
				<textarea name="desc_courte" rows="4" class="classinput_xsize" style="width:100%" id="desc_courte"><?php echo str_replace("&curren;", "&euro;", ($article->getDesc_courte ()));?></textarea>
					<script type="text/javascript">
					Event.observe("desc_courte", "focus",  function(evt){Event.stop(evt); <?php if($GESTION_REF_INTERNE ||$GESTION_CONSTRUCTEUR ){?>showform('edit_info_step2', 'view_info_step2');<?php } ?>  $("edit_etape_2").hide(); $("bt_etape_2").show();}, false);
					</script>
					</td>
				</tr>
			</table><br />

			<div id="show_desc_longue" style="cursor:pointer; font-size:11px; float:left; width:70%; color:#002673">Editer ou consulter la description longue</div>
				<div style="text-align:right; padding-right:20px">
				<a href="#" id="bt_etape_2" style="display:none"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-valider.gif" /></a>
				<a href="#" id="edit_etape_2" ><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-modifier.gif" /></a>
				</div>
				<img id="print_article" src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-pdf.gif" style="cursor:pointer"/><br />
					<script type="text/javascript">
					Event.observe("edit_etape_2", "focus",  function(evt){Event.stop(evt); showform('edit_info_step2', 'view_info_step2'); $("edit_etape_2").hide(); $("bt_etape_2").show();}, false);
					</script>
          
      <table style="width:95%" border="0" cellspacing="0" cellpadding="0">
        <tr class="smallheight">
          <td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
          <td style="width:50%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
        </tr>
        <tr>
          <td class="labelled_bold" >Mots clés : </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="labelled_text">
        <textarea name="tags" rows="4" class="classinput_xsize" style="width:100%" id="tags"><?php echo str_replace("&curren;", "&euro;", (implode(";", $article->getTags ())));?></textarea>
          <script type="text/javascript">
          Event.observe("tags", "focus",  function(evt){Event.stop(evt); <?php if($GESTION_REF_INTERNE ||$GESTION_CONSTRUCTEUR ){?>showform('edit_info_step2', 'view_info_step2');<?php } ?>  $("edit_etape_2").hide(); $("bt_etape_2").show();}, false);
          </script>
          </td>
        </tr>
      </table><br />
          
</form>
			
			
			<br />
				<div id="modele_info" style="width:95%"  class="art_new_info">
					<?php include $DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_view_modele_".$art_categs->getModele().".inc.php" ?>
				</div><br />

			<?php 
			if (count($caracs)) {
				?>
			<table style="width:95%" border="0" cellpadding="0" cellspacing="0" class="art_new_info">
				<tr class="smallheight" >
					<td style="width:50%; "><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					<td style="width:50%; "><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
				</tr>
				
				<tr>
					<td class="labelled_bold">
					
					Caract&eacute;ristiques
					
					</td>
					<td >
					</td>
				</tr>
				<tr>
					<td colspan="2" class="labelled_text">
					<table style="width:100%;">
					<?php 
						$ref_carac_groupe=NULL;
						$ligne_general	=	1;
						$serialisation_carac	=	0;
						foreach ($caracs as $carac) {
							if ($ref_carac_groupe!=$carac->ref_carac_groupe) {
								$ligne_general	=	0;
								$ref_carac_groupe	=	$carac->ref_carac_groupe;
								?>
					</table>
					<table style="width:100%;" border="0" >
						<tr>
							<td colspan="2" class="labelled_bold" style="border-bottom:1px solid #00336c">
							<?php echo ($carac->lib_carac_groupe); ?>
							</td>
						</tr>
					</table>
					<table style="width:100%;">
					<?php
				} else if ($ligne_general) {
							$ligne_general	=	0;
					?>
					</table>
					<table style="width:100%;" border="0" >	
					<tr>
					<td colspan="2" class="labelled_bold" style="border-bottom:1px solid #00336c">
					G&eacute;n&eacute;ral:
					</td>
					</tr>
					</table>
					<table style="width:100%;" border="0" >
								<?php
							}
						?>
					<tr>
					<td style="width:20%;">
					<?php echo ($carac->lib_carac); ?>
					</td>
					
							<td style="width:30%;" >
							<?php 
							$tmp_art_caracs	=	$article->getCaracs();
								foreach ($tmp_art_caracs as $tmp_art_carac) { 
									if ($tmp_art_carac->ref_carac==$carac->ref_carac){echo ($tmp_art_carac->valeur);}
								}
							?> <?php echo ($carac->unite); ?>
							</td>
				
							
						</tr>
						<?php
						$serialisation_carac	+=	1;
						}
						?>
					</table>
					</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td></td>
					<td >
						<div style="text-align:right; padding-right:0px">			
						<a href="#" id="edit_etape_4" ><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-modifier.gif" /></a>
						</div>
					</td>
				</tr>
			</table>
				<?php
			}
			?>
<?php
if ($article->getVariante() == 1 && is_object($article_master)) {
	?><br />

	<div class="link_to_master" id="goto_master" style="width:95%">Accéder à l'article parent à l'origine de cette variante</div>
	<script type="text/javascript">
	Event.observe('goto_master', "click", function(evt){
		page.verify("catalogue_articles_view",'index.php#'+escape('catalogue_articles_view.php?ref_article=<?php echo $article_master->getRef_article ();?>'), "true", "_blank");
	});
	</script>
	<?php
}
?>
			</td>
			<td style="width:35%; vertical-align:top; text-align:left;">
			
				<div id="tarifs_visu_ht" class="art_new_info" style="display:<?php if ($DEFAUT_APP_TARIFS_CLIENT != "HT") { echo "none";}?> ">
				
				<table style="width:100%; cursor:pointer;" id="switch_ht_ttc" cellpadding="0" cellspacing="0" border="0">
				<tr><td style="padding-left:10px; font-weight:bolder;">
				Tarifs HT
				</td></tr>
				</table>
				<table style="width:100%; cursor:pointer" cellpadding="0" cellspacing="0" border="0" id="tab_tarifs">
				<tr><td>
				<?php
                                if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
                                        $taxes = get_article_taxes($article->getRef_article());
                                    $montant_taxe =0;
                                    if(count($taxes)>0){
                                        foreach($taxes as $taxe)
                                        {
                                            $montant_taxe += $taxe->montant_taxe;
                                        }
                                    }
                                    }

				// liste des tarifs HT
				foreach ($tarifs_liste as $tarif_liste) {
					if ($tarif_liste->id_tarif == $_SESSION['magasin']->getId_tarif()) {
					?>
					<table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="text-align:left; padding-left:10px; width:50%; border-top:1px solid #FFFFFF; vertical-align:middle">
						<?php echo ($tarif_liste->lib_tarif); ?>
						</td>
						<td style=" border-top:1px solid #FFFFFF; text-align:right">
						<?php	
						$countnb_tarif=0;
						foreach ($liste_tarifs as $tarifs) {
							if ($tarif_liste->id_tarif == $tarifs->id_tarif) {
								$countnb_tarif ++;
							}
						}
						foreach ($liste_tarifs as $tarifs) {
							if ($tarif_liste->id_tarif == $tarifs->id_tarif) {
								?>
								<table>
								<tr>
								<?php
								if ($countnb_tarif == 1) {
									if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
									?>
									<td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht+$montant_taxe, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left;"><div style="display:inline; width:100%">&nbsp;</div></td>
                                                                        <?php } else { ?>
                                                                        <td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left;"><div style="display:inline; width:100%">&nbsp;</div></td>
                                                                        <?php }

									
									
								} else {

                                                                        if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
									?>
									<td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht+$montant_taxe, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td>
									<td style="width:50%; text-align:left; font-weight:bolder"><div style="display:inline; width:100%"> par <?php echo $tarifs->indice_qte;?></div></td>
									<?php } else { ?>
                                                                        <td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td>
									<td style="width:50%; text-align:left; font-weight:bolder"><div style="display:inline; width:100%"> par <?php echo $tarifs->indice_qte;?></div></td>
                                                                        <?php }
								} 
								?>
								</tr>
								</table>
								<?php
							}
							?>
							<?php
						}
						?>
						</td>
						</tr>
					</table>
					<?php
					}
				}
				$first_tarif = 1;
				foreach ($tarifs_liste as $tarif_liste) {
					if ($tarif_liste->id_tarif == $_SESSION['magasin']->getId_tarif()) {continue;}
					?>
					<?php if ($first_tarif == 1) {?><div id="unshow_tarif" style="display:none"><?php }?>
					<table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="text-align:left; padding-left:10px; width:50%; border-top:1px solid #FFFFFF; vertical-align:middle">
						<?php echo ($tarif_liste->lib_tarif); ?>
						</td>
						<td style=" border-top:1px solid #FFFFFF; text-align:right">
						<?php	
						$countnb_tarif=0;
						foreach ($liste_tarifs as $tarifs) {
							if ($tarif_liste->id_tarif == $tarifs->id_tarif) {
								$countnb_tarif ++;
							}
						}
						foreach ($liste_tarifs as $tarifs) {
							if ($tarif_liste->id_tarif == $tarifs->id_tarif) {
								?>
								<table>
								<tr>
								<?php
								if ($countnb_tarif == 1) {
									if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
									?>
									<td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht+$montant_taxe, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left;"><div style="display:inline; width:100%">&nbsp;</div></td>
									<?php } else { ?>
                                                                        <td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left;"><div style="display:inline; width:100%">&nbsp;</div></td>
                                                                        <?php }
								} else {
									if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
									?>
									<td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht+$montant_taxe, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left; font-weight:bolder"><div style="display:inline; width:100%"> par <?php echo $tarifs->indice_qte;?></div></td>
									<?php } else { ?>
                                                                        <td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left; font-weight:bolder"><div style="display:inline; width:100%"> par <?php echo $tarifs->indice_qte;?></div></td>
                                                                        <?php }
								} 
								?>
								</tr>
								</table>
								<?php
							}
							?>
							<?php
						}
						$first_tarif++;
						?>
						</td>
						</tr>
					</table>
					<?php 
				}
				?>
				</div>
				</td>
				</tr>
				</table>
				</div>
				
				<div id="tarifs_visu_ttc" class="art_new_info" style="display:<?php if ($DEFAUT_APP_TARIFS_CLIENT != "TTC") { echo "none";}?> ">
				
				<table style="width:100%; cursor:pointer; " id="switch_ttc_ht" cellpadding="0" cellspacing="0" border="0">
				<tr><td style="padding-left:10px; font-weight:bolder;">
				Tarifs TTC
				</td></tr>
				</table>
				<table style="width:100%; cursor:pointer" cellpadding="0" cellspacing="0" border="0" id="tab_tarifs_ttc">
				<tr><td>
				<?php
                                 

				// liste des tarifs ttc
				foreach ($tarifs_liste as $tarif_liste) {
					if ($tarif_liste->id_tarif == $_SESSION['magasin']->getId_tarif()) {
					?>
					<table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="text-align:left; padding-left:10px; width:50%; border-top:1px solid #FFFFFF; vertical-align:middle">
						<?php echo ($tarif_liste->lib_tarif); ?>
						</td>
						<td style=" border-top:1px solid #FFFFFF; text-align: right;">
						<?php
                                               						$countnb_tarif=0;
						foreach ($liste_tarifs as $tarifs) {
							if ($tarif_liste->id_tarif == $tarifs->id_tarif) {
								$countnb_tarif ++;
							}
						}
						foreach ($liste_tarifs as $tarifs) {
							if ($tarif_liste->id_tarif == $tarifs->id_tarif) {
								?>
								<table>
								<tr>
								<?php
								if ($countnb_tarif == 1) {
                                                                    if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
									?>
									<td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht*(1+$tva_article/100)+$montant_taxe, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left;"><div style="display:inline; width:100%">&nbsp;</div></td>
									
                                                                        <?php } else { ?>
                                                                        <td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht*(1+$tva_article/100), $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left;"><div style="display:inline; width:100%">&nbsp;</div></td>
                                                                        <?php }
								} else {
                                                                    if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
									?>
									<td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht*(1+$tva_article/100)+$montant_taxe, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left; font-weight:bolder"><div style="display:inline; width:100%"> par <?php echo $tarifs->indice_qte;?></div></td>
									<?php } else { ?>
                                                                       <td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht*(1+$tva_article/100), $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left; font-weight:bolder"><div style="display:inline; width:100%"> par <?php echo $tarifs->indice_qte;?></div></td>
                                                                        <?php }
								} 
								?>
								</tr>
								</table>
								<?php
							}
							?>
							<?php
						}
						?>
						</td>
						</tr>
					</table>
					<?php
					}
				}
				$first_tarif = 1;
				foreach ($tarifs_liste as $tarif_liste) {
					if ($tarif_liste->id_tarif == $_SESSION['magasin']->getId_tarif()) {continue;}
					?>
					<?php if ($first_tarif == 1) {?><div id="unshow_tarif_ttc" style="display:none"><?php }?>
					<table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="text-align:left; padding-left:10px; width:50%; border-top:1px solid #FFFFFF; vertical-align:middle">
						<?php echo ($tarif_liste->lib_tarif); ?>
						</td>
						<td style=" border-top:1px solid #FFFFFF; text-align:right">
						<?php	
						$countnb_tarif=0;
						foreach ($liste_tarifs as $tarifs) {
							if ($tarif_liste->id_tarif == $tarifs->id_tarif) {
								$countnb_tarif ++;
							}
						}
						foreach ($liste_tarifs as $tarifs) {
							if ($tarif_liste->id_tarif == $tarifs->id_tarif) {
								?>
								<table>
								<tr>
								<?php
								if ($countnb_tarif == 1) {
									 if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
									?>
									<td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht*(1+$tva_article/100)+$montant_taxe, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left;"><div style="display:inline; width:100%">&nbsp;</div></td>
									<?php } else { ?>
                                                                        <td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht*(1+$tva_article/100), $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left;"><div style="display:inline; width:100%">&nbsp;</div></td>
                                                                         <?php }
								} else {
									if(isset($TAXE_IN_PU) && $TAXE_IN_PU ==0){
									?>
									<td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht*(1+$tva_article/100)+$montant_taxe, $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left; font-weight:bolder"><div style="display:inline; width:100%"> par <?php echo $tarifs->indice_qte;?></div></td>
									<?php } else { ?>
                                                                        <td style="text-align:right; font-weight:bolder"><div style=""><?php echo (number_format($tarifs->pu_ht*(1+$tva_article/100), $TARIFS_NB_DECIMALES, ".", ""	))."&nbsp;".$MONNAIE[2];?></div></td><td style="width:50%; text-align:left; font-weight:bolder"><div style="display:inline; width:100%"> par <?php echo $tarifs->indice_qte;?></div></td>
                                                                        <?php }
								} 
								?>
								</tr>
								</table>
								<?php
							}
							?>
							<?php
						}
						$first_tarif++;
						?>
						</td>
						</tr>
					</table>
					<?php 
				}
				?>
				</div>
				</td>
				</tr>
				</table>
				</div>
				<br />
			
			
				<?php
				//liste des stocks
				if (isset($stocks_liste[$_SESSION['magasin']->getId_stock()]) && $art_categs->getModele() == "materiel" && $article->getVariante() != 2 && $GESTION_STOCK) {
					?>
				<table style="width:100%; cursor:pointer" class="art_new_info" cellpadding="0" cellspacing="0" border="0">
				<tr><td>
					<table style="width:100%;" cellpadding="0" cellspacing="0" border="0" id="tab_stocks_<?php echo $_SESSION['magasin']->getId_stock() ;?>">
					<tr>
						<td style="text-align:left; padding-left:10px; width:50%;">
						<div>
						<?php echo ($stocks_liste[$_SESSION['magasin']->getId_stock()]->getLib_stock()); ?>
						</div>
						</td>
						<td style="text-align:center">
						<table style="width:100%;">
						<tr>
						<td style="text-align:center; font-weight:bolder;">
						<div>
						<?php	
						if (isset($art_stocks[$_SESSION['magasin']->getId_stock()])) {
							?>
							<?php echo $art_stocks[$_SESSION['magasin']->getId_stock()]->qte ;?>
							<?php
						} else {
							echo "0";
						}
						?>
						</div>
						</td>
						</tr>
						</table>
						<script type="text/javascript">
							Event.observe('tab_stocks_<?php echo $_SESSION['magasin']->getId_stock() ;?>', "click", function(evt){
								view_menu_1('gest_stock', 'menu_3', array_menu_v_article);
								set_tomax_height('gest_stock' , -32); 
							});
						</script>
						</td>
					</tr>
					</table>
				</div>
				</td>
				</tr>
				</table>
					<?php					
				}
				?>
				<br />
			</td>
			<td style="width:25%; text-align:right;">
			<?php 
			if (isset($images[0])) {
				?>
				<img src="<?php echo $ARTICLES_MINI_IMAGES_DIR.$images[0]->lib_file;?>" />
				<?php
			} else {
				?>
				<img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/no_pict.gif" width="211" height="154" />
				<?php
			}
			?>
			</td>
			<td style="width:10px;">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" style="text-align:left; vertical-align:top; color:#00336c"><br />
			
			<?php
			$first_docs = 0;
			if (count($art_docs )) {
				?>
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr >
					<td style="width:35px;"><div style="height:9px; border-bottom:1px solid #00336c">&nbsp;</div></td>
					<td style=" width:85px; font-weight:bolder; color:#00336c; font-size:14px; padding-left:3px; padding-right:3px">DOCUMENTS</td>
					<td ><div style="height:9px; border-bottom:1px solid #00336c">&nbsp;</div></td>
				</tr>
			</table>
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="smallheight" >
					<td style="width:85px;"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					<td style="width:35px;"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					<td style=""><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					<td style="width:150px;"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					<td style="width:18px;"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
				</tr>
				<tr style="">
					<td style=" text-align:left; padding-left:5px; font-weight:bolder">Date</td>
					<td style=" text-align:center; padding-left:5px; font-weight:bolder">Qt&eacute;</td>
					<td style=" text-align:left; padding-left:5px; font-weight:bolder">Document</td>
					<td style=" text-align:left; padding-left:5px; font-weight:bolder">Etat</td>
					<td></td>
				</tr>
				</table>
			<div class="art_new_info" >
				<?php
				foreach ($art_docs as $art_doc) {
					$id_type_groupe = $art_doc->id_type_groupe;
					if ( ($_SESSION['user']->check_permission ("25", $art_doc->id_type_doc) && $id_type_groupe==1) || ($_SESSION['user']->check_permission ("28", $art_doc->id_type_doc) && $id_type_groupe==2) || ($_SESSION['user']->check_permission ("31", $art_doc->id_type_doc) && $id_type_groupe==3)){
					?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="smallheight" >
						<td style="width:85px;"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
						<td style="width:35px;"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
						<td style=""><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
						<td style="width:150px;"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
						<td style="width:18px;"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" height="1" id="imgsizeform"/></td>
					</tr>
					<tr id="open_doc_<?php echo ($art_doc->ref_doc);?>" style="cursor:pointer; color:#002673">
						<td style=" border-bottom:1px solid #FFFFFF; text-align:left; padding-left:5px">
						<?php echo date_Us_to_Fr($art_doc->date_creation);?>
						</td>
						<td style="  border-bottom:1px solid #FFFFFF; text-align:center; padding-left:5px">
						<?php echo number_format($art_doc->qte, 2, ".", ""	);?>
						</td>
						<td style=" border-bottom:1px solid #FFFFFF; text-align:left; padding-left:5px">
							<?php echo ($art_doc->ref_doc);?> - <?php echo (substr($art_doc->nom_contact, 0, 16)); if (count($art_doc->nom_contact)>16) {echo "...";}?>
						</td>
						<td style=" border-bottom:1px solid #FFFFFF; text-align:left; padding-left:5px">
							<?php echo ($art_doc->lib_etat_doc);?>
						</td>
						<td style=" border-bottom:1px solid #FFFFFF; text-align:center; ">
						<a href="documents_editing.php?ref_doc=<?php echo $art_doc->ref_doc?>&print=1" target="edition" ><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-pdf.gif" alt="pdf" title="pdf"/></a>
						</td>
					</tr>
					</table>
						<script type="text/javascript">
							Event.observe('open_doc_<?php echo ($art_doc->ref_doc);?>', "click", function(evt){ open_doc("<?php echo ($art_doc->ref_doc);?>"); });
						</script>
					<?php 
					$first_docs ++;
				}
				}
				?>
			</div>
			<br />
			<div id="show_all_docs"  class="link_to_doc_fromart" style="float:right">&gt;&gt; Consulter l'ensemble des documents concernant cet article </div>
			<?php } ?>
			<br />
		</td>
		<td>&nbsp;</td>
	</tr>
</table>
	
<SCRIPT type="text/javascript">


Event.observe('switch_ttc_ht', "click", function(evt){
	$("tarifs_visu_ttc").toggle();
	$("tarifs_visu_ht").toggle();
});
Event.observe('switch_ht_ttc', "click", function(evt){
	$("tarifs_visu_ttc").toggle();
	$("tarifs_visu_ht").toggle();
});

Event.observe('tab_tarifs', "click", function(evt){
	$("unshow_tarif").toggle();
	$("unshow_tarif_ttc").toggle();
});
Event.observe('tab_tarifs_ttc', "click", function(evt){
	$("unshow_tarif").toggle();
	$("unshow_tarif_ttc").toggle();
});


//fonction de validation de l'étape 2
function valide_etape_2() {
		submitform ("article_view_2"); 
}

Event.observe($("bt_etape_2"), "click", function(evt){Event.stop(evt); valide_etape_2 ();});

<?php 
if (count($caracs)) {
	?>
	Event.observe($("edit_etape_4"), "click", function(evt){Event.stop(evt); show_view_categ_carac();});
	<?php
}
?>
<?php
if (count($art_docs )) {
	?>
Event.observe('show_all_docs', "click", function(evt){
	page.verify("document_recherche","documents_recherche.php?ref_article_docsearch=<?php echo $article->getRef_article ();?>", "true", "sub_content");
});
	<?php 
}
?>

Event.observe('show_desc_longue', "click", function(evt){
	page.verify("catalogue_articles_view_description","catalogue_articles_view_description.php?ref_article=<?php echo $article->getRef_article ();?>", "true", "_blank");
});


Event.observe('print_article', "click", function(evt){
	page.verify("catalogue_articles_editing","catalogue_articles_editing.php?ref_article=<?php echo $article->getRef_article ();?>", "true", "_blank");
});

//on masque le chargement
H_loading();
</SCRIPT>