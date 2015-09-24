<?php

// *************************************************************************************************************
// AFFICHAGE DU CHOIX DES CAISSES
// *************************************************************************************************************

// Variables nécessaires à l"affichage
$page_variables = array ();
check_page_variables ($page_variables);

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************
?>
<div class="emarge"><br />
    <p class="titre">Gestion des autorisations de traites non acceptées et de prélevements</p>
    <!-- Popups -->
    <!-- Créer x balises div cachés pour x popups, puis apeller la page de contenu via AJAX ? -->
    <?php include $DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_recherche_mini.inc.php" //mini_moteur contact?>
    <?php echo Helper::createPopup("pop_up_prelev",array("style_popup"=>"width: 600px; min-height: 250px;")); ?>
    <?php echo Helper::createPopup("pop_up_piecej_add",array("style_popup"=>"width: 50%; height: 350px;")); ?>
    <?php echo Helper::createPopup("pop_up_traitena",array("style_popup"=>"width: 600px; min-height: 250px;")); ?>
    <?php echo Helper::createPopup("pop_up_piecej_add",array("style_popup"=>"width: 50%; height: 350px;")); ?>
    <!-- fin popups -->
    <div id="recherche" class="corps_moteur">
        <table style="width:97%">
            <tr class="smallheight">
                <td style="width:2%">&nbsp;</td>
                <td style="width:15%">&nbsp;</td>
                <td style="width:30%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
                <td style="width:10%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
                <td style="width:20%">&nbsp;</td>
                <td style="width:20%"><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
                <td style="width:3%">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="font-style : italic ; font-weight:bold">Critères d'affichage</td>
                <td></td>
                <td></td>
                <td style="font-style : italic; font-weight:bold">Actions</td>
                <td></td>
                <td>&nbsp;</td>
            </tr>
            <tr class="smallheight">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
                <td><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
                <td>&nbsp;</td>
                <td><img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/blank.gif" width="100%" height="1" id="imgsizeform"/></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <span class="labelled_text">Nom du client:</span>
                </td>
                <td>
                    <?php echo Helper::createInputAnnu("search_client","Tous",array("filtres"=>"lib=Client")); ?>
                </td>
                <td></td>
                <td>
                    <input type="button" id="compta_gest_prelev_add" value="Enregistrer une nouvelle autorisation de prélevement" />
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <span class="labelled_text">Catégorie du client:</span>
                </td>
                <td>
                    <select id="id_categ_client" name="id_categ_client" class="classinput_xsize">
                        <option value="all"> Toutes </option>
                        <?php foreach($categs_client as $categ){ ?>
                        <option value="<?php echo $categ->id_client_categ ?>"><?php echo $categ->lib_client_categ ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>&nbsp;</td>
                <td><input type="button" id="compta_gest_traitena_add" value="Enregistrer une nouvelle autorisation de traite" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <span class="labelled_text">Numéro du compte:</span>
                </td>
                <td>
                    <input id="num_compte_search" name="num_compte_search" type="text" class="classinput_xsize" />
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <input id="search_prelevs" name="search_prelevs" type="image" src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-rechercher.gif" style="float:left" />
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7" id="resultats">
                    
                </td>
            </tr>
        </table>
    </div>
</div>


<script type="text/javascript">
    Event.observe('compta_gest_prelev_add', "click", function(evt){
        $("pop_up_prelev").style.display = "block";
        page.traitecontent('pop_up_prelev_content_up','compta_gest_prelevements_add.php','true','pop_up_prelev_content_up');
        Event.stop(evt);
    });

    Event.observe('compta_gest_traitena_add', "click", function(evt){
        $("pop_up_traitena").style.display = "block";
        page.traitecontent('pop_up_traiten_content_up','compta_gest_traitena_add.php','true','pop_up_traitena_content_up');
        Event.stop(evt);
    });

    Event.observe('search_prelevs', "click", function(evt){
        compta_prelevements_result();
        Event.stop(evt);
    });
    compta_prelevements_result();


    //centrage de la pop up comm
    centrage_element("pop_up_prelev");
    centrage_element("pop_up_mini_moteur");
    centrage_element("pop_up_mini_moteur_iframe");
    centrage_element("pop_up_piecej_add");

    Event.observe(window, "resize", function(evt){
        centrage_element("pop_up_prelev");
        centrage_element("pop_up_mini_moteur_iframe");
        centrage_element("pop_up_mini_moteur");
        centrage_element("pop_up_piecej_add");
    });

centrage_element("pop_up_traitena");
    centrage_element("pop_up_mini_moteur");
    centrage_element("pop_up_mini_moteur_iframe");
    centrage_element("pop_up_piecej_add");

    Event.observe(window, "resize", function(evt){
        centrage_element("pop_up_traitena");
        centrage_element("pop_up_mini_moteur_iframe");
        centrage_element("pop_up_mini_moteur");
        centrage_element("pop_up_piecej_add");
    });

    //on masque le chargement
    H_loading();
</script>