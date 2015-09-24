<?php

// *************************************************************************************************************
// CONTROLE DU THEME
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

<div class="emarge" style="text-align:right" >
    <br />
    <br />
    <br />
    <br />
    <div style="width:92px;">&nbsp;</div>
    <div class="titre" style="text-align:left; padding-left:130px;" >Situation Clients</div>


    <div style="height:50px">

        <table cellpadding="0" cellspacing="0" class="adm_tbl">
            <tr>
                <td rowspan="2" style="width:280px; height:50px">
                    <div style="position:relative; top:-35px; left:-35px; width:92px; border:1px solid #999999; background-color:#FFFFFF; text-align:center">
                        <img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bouton-livre.jpg" />				</div>
                    <span style="width:35px">
                        <img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="280px" height="20px" id="imgsizeform"/>				</span>			</td>
                <td colspan="2"><span style="width:47%; height:50px"><br />
                        <br />
                        <br />
                </td>
            </tr>
            <tr>
                <td style="text-align:left;" valign="top">
                    <img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="20px" /><br />

                    <div style="-moz-border-radius:5px 5px 5px 5px; width:80%; background-color: #e0eafa; text-align: left; font-weight: bolder; color:#002673"><span style="padding-left:40px">Bon de livraison non facturés</span></div><br />

                    <span class="titre_smenu_page" id="compta_livraisons_client_nonfacturees" style="padding-left:100px;cursor:pointer"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce.png" align="absmiddle" />&nbsp;&nbsp;Facturer les bons de livraisons</span><br /><br /><br />

                    <div style="-moz-border-radius:5px 5px 5px 5px; width:80%; background-color: #e0eafa; text-align: left; font-weight: bolder; color:#002673"><span style="padding-left:40px">Factures non réglées</span></div><br />

                    <span class="titre_smenu_page" id="compta_factures_client_nonreglees" style="padding-left:100px;cursor:pointer"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce.png" align="absmiddle" />&nbsp;&nbsp;Factures non réglées </span><br /><br />

                    <span class="titre_smenu_page" id="compta_factures_client_non_editees" style="padding-left:100px;cursor:pointer"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce.png" align="absmiddle" />&nbsp;&nbsp;Factures non éditées, procéder à l'envoi initial</span><br /><br />

                    <span class="titre_smenu_page" id="compta_factures_client_a_relancer" style="padding-left:100px;cursor:pointer"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce.png" align="absmiddle" />&nbsp;&nbsp;Factures à relancer</span><br /><br />


                    <span class="titre_smenu_page" id="compta_factures_client_contentieux" style="padding-left:100px;cursor:pointer"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce.png" align="absmiddle" />&nbsp;&nbsp;Factures en contentieux</span><br /><br />

                    <div style="-moz-border-radius:5px 5px 5px 5px; width:80%; background-color: #e0eafa; text-align: left; font-weight: bolder; color:#002673"><span style="padding-left:40px">Eléments Comptable</span></div><br />

                    <span class="titre_smenu_page" id="compte_client_extrait" style="padding-left:100px;cursor:pointer"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce.png" align="absmiddle" />&nbsp;&nbsp;Grand Livre Client</span><br /><br />

                    <?php if($COMPTA_GEST_PRELEVEMENTS): ?>
                    <span class="titre_smenu_page" id="compte_client_prelevements" style="padding-left:100px;cursor:pointer"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/puce.png" align="absmiddle" />&nbsp;&nbsp;G&eacute;rer les autorisations de traites et de pr&eacute;l&egrave;vement</span><br /><br />
                        <?php endif; ?>
                </td>
                <td></td>

            </tr>
        </table>
    </div>
    <SCRIPT type="text/javascript">

        Event.observe('compta_livraisons_client_nonfacturees', "click", function(evt){
            page.verify('compta_livraisons_client_nonfacturees','compta_livraisons_client_nonfacturees.php','true','sub_content');
            Event.stop(evt);
        });
        Event.observe('compta_factures_client_nonreglees', "click", function(evt){
            page.verify('compta_factures_client_nonreglees','compta_factures_client_nonreglees.php','true','sub_content');
            Event.stop(evt);
        });
        Event.observe('compta_factures_client_non_editees', "click", function(evt){
            page.verify('compta_factures_client_non_editees','compta_factures_client_non_editees.php','true','sub_content');
            Event.stop(evt);
        });
        Event.observe('compta_factures_client_a_relancer', "click", function(evt){
            page.verify('compta_factures_client_a_relancer','compta_factures_client_a_relancer.php','true','sub_content');
            Event.stop(evt);
        });
        Event.observe('compta_factures_client_contentieux', "click", function(evt){
            page.verify('compta_factures_client_contentieux','compta_factures_client_contentieux.php','true','sub_content');
            Event.stop(evt);
        });
        Event.observe('compte_client_extrait', "click", function(evt){
            page.verify('compte_client_extrait','compte_client_journal.php','true','sub_content');
            Event.stop(evt);
        });
        
        <?php if($COMPTA_GEST_PRELEVEMENTS): ?>
        Event.observe('compte_client_prelevements', "click", function(evt){
            page.verify('compta_gest_prelevements','compta_gest_prelevements.php','true','sub_content');
            Event.stop(evt);
        });
        <?php endif; ?>

        //on masque le chargement
        H_loading();
    </SCRIPT>
</div>


