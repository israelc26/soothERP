<div>
    <a href="#" id="link_close_pop_up_commerciaux_det" style="float:right">
        <img src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/supprime.gif" border="0">
    </a>
    <script type="text/javascript">
        Event.observe("link_close_pop_up_commerciaux_det", "click",  function(evt){Event.stop(evt); $("pop_up_bonus").hide();}, false);
    </script><br />

    <table width="100%" border="0" cellspacing="4" cellpadding="2">
        <tr>
            <td colspan="2" style="width:15%; font-style: italic; font-weight: bold;">Créer un bonus / malus</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="width:15%">
                <span class="labelled">Commercial:</span>
            </td>
            <td style="width:45%">
                <select  name="ref_commercial" id="ref_commercial" class="classinput_xsize">
                    <?php foreach($commerciaux as $commercial){ ?>
                    <option value="<?php echo $commercial->ref_contact; ?>"><?php echo $commercial->nom ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <span class="labelled">Libellé:</span>
            </td>
            <td>
                <input type="text" name="lib_bonus" id="lib_bonus" class="classinput_xsize" />
            </td>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td>
                <span class="labelled">Description:</span>
            </td>
            <td>
                <textarea name="desc_bonus" id="desc_bonus" class="classinput_xsize"></textarea>
            </td>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td>
                <span class="labelled">Montant +/-:</span>
            </td>
            <td>
                <input type="text" name="montant" id="montant" class="classinput_xsize" />
            </td>
            <td>¤</td>
        </tr>
        <tr>
            <td>
                <input name="submit_a" id="submit_a" type="image" src="<?php echo $DIR.$_SESSION['theme']->getDir_gtheme()?>images/bt-ajouter.gif" />
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <script type="text/javascript">
        Event.observe('submit_a', "click", function(evt){
            compta_bonus_commerciaux_add();
            Event.stop(evt);
            $("pop_up_bonus").hide();
        });
    </script>
</div>