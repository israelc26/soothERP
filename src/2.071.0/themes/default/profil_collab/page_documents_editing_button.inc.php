<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Document sans titre</title>
        <SCRIPT LANGUAGE="JavaScript">

            function PopupCentrer(page, largeur, hauteur, optionsi) {
                var top = (screen.height - hauteur) / 2;
                var left = (screen.width - largeur) / 2;
                window.open(page, "", "top=" + top + ",left=" + left + ",width=" + largeur + ",height=" + hauteur + "," + optionsi);
            }
        </SCRIPT>
        <style type="text/css">
            <!--
            body {
                margin: 5px;
            }
            img {
                border:0px;
            }
            -->
        </style>
    </head>

    <body>
        <table cellpadding="0" border="0" cellspacing="0">
            <tr>
                <?php
                foreach ($editions_modes as $edition_mode) {

                    switch ($edition_mode->id_edition_mode) {

                        //impression
                        case "1":
                            ?>
                            <td style="padding-right:10px">
                                <a href="documents_editing_print.php?ref_doc=<?php echo $_REQUEST['ref_doc']; ?>&mode_edition=<?php echo $edition_mode->id_edition_mode; ?>&print=1<?php
                                if (isset($_REQUEST["code_pdf_modele"])) {
                                    echo "&code_pdf_modele=" . $_REQUEST["code_pdf_modele"];
                                }
                                ?><?php
                                if (isset($_REQUEST["filigrane"])) {
                                    echo "&filigrane=" . $_REQUEST["filigrane"];
                                }
                                ?>" target="mainediting" >
                                    <img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/bt-imprimer.gif" alt="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" title="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" />	</a>
                            </td>
                            <?php
                            break;

                        //envois par email
                        case "2":
                            ?>
                            <td style="padding-right:10px">
                                <a href='javascript:PopupCentrer("documents_editing_email.php?ref_doc=<?php echo $_REQUEST['ref_doc']; ?>&mode_edition=<?php echo $edition_mode->id_edition_mode; ?><?php
                                if (isset($_REQUEST["code_pdf_modele"])) {
                                    echo "&code_pdf_modele=" . $_REQUEST["code_pdf_modele"];
                                }
                                ?><?php
                                if (isset($_REQUEST["filigrane"])) {
                                    echo "&filigrane=" . $_REQUEST["filigrane"];
                                }
                                ?>",780,550,"menubar=no,statusbar=no,scrollbars=yes,resizable=yes")'  >
                                    <img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/bt-email.gif" alt="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" title="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" />	</a>
                            </td>
                            <?php
                            break;


                        //envois par fax
                        case "3":
                            ?>
                            <td style="padding-right:10px">
                                <a href='javascript:PopupCentrer("documents_editing_fax.php?ref_doc=<?php echo $_REQUEST['ref_doc']; ?>&mode_edition=<?php echo $edition_mode->id_edition_mode; ?><?php
                                if (isset($_REQUEST["code_pdf_modele"])) {
                                    echo "&code_pdf_modele=" . $_REQUEST["code_pdf_modele"];
                                }
                                ?><?php
                                if (isset($_REQUEST["filigrane"])) {
                                    echo "&filigrane=" . $_REQUEST["filigrane"];
                                }
                                ?>",500,350,"menubar=no,statusbar=no,scrollbars=auto")'  >
                                    <img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/bt-fax.gif" alt="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" title="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" />	</a>
                            </td>
                            <?php
                            break;

                            //envois par courrier
//	case "4":
                            ?>
                        <!--	<a href="documents_editing_courrier.php?ref_doc=<?php echo $_REQUEST['ref_doc']; ?>&mode_edition=<?php echo $edition_mode->id_edition_mode; ?>" target="_blank" >
                            <img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/bt-courrier.gif" alt="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" title="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" />	</a>-->
                            <?php
//	break;
                            //envois par fax
//	case "5":
                            ?>
                        <!--	<a href="documents_editing_courrierar.php?ref_doc=<?php echo $_REQUEST['ref_doc']; ?>&mode_edition=<?php echo $edition_mode->id_edition_mode; ?>" target="_blank" >
                            <img src="<?php echo $DIR . $_SESSION['theme']->getDir_gtheme() ?>images/bt-courrier_ar.gif" alt="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" title="<?php echo htmlentities($edition_mode->lib_edition_mode, ENT_QUOTES, "UTF-8"); ?>" />	</a>-->
                        <?php
//	break;
                    }
                }

                if (isset($liste_modeles_pdf_valides) && count($liste_modeles_pdf_valides) > 1) {
                    ?>
                    <td style="padding-right:10px">
                        <form method="post" action="documents_editing.php" id="change_code_pdf_modele" target="_top" >
                            <input type="hidden" name="ref_doc" value="<?php echo $_REQUEST['ref_doc']; ?>" />
                            <select name="code_pdf_modele" onchange="document.getElementById('change_code_pdf_modele').submit();" >
                                <?php
                                foreach ($liste_modeles_pdf_valides as $modele_pdf) {
                                    ?>
                                    <option value="<?php echo $modele_pdf->code_pdf_modele; ?>" <?php
                                    if (isset($_REQUEST["code_pdf_modele"]) && $_REQUEST["code_pdf_modele"] == $modele_pdf->code_pdf_modele) {
                                        echo "selected='selected'";
                                    }
                                    ?>><?php echo $modele_pdf->lib_modele; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                            <?php
                            if (isset($_REQUEST["filigrane"])) {
                                echo '<input type="hidden" name="filigrane" value="' . $_REQUEST["filigrane"] . '" />';
                            }
                            ?>
                        </form>
                    </td>
                    <?php
                }


                if (isset($filigrane_pdf) && count($filigrane_pdf) > 0) {
                    ?>
                    <td style="padding-right:10px">
                        <form method="post" action="documents_editing.php" id="filigrane_pdf" target="_top" >
                            <input type="hidden" name="ref_doc" value="<?php echo $_REQUEST['ref_doc']; ?>" />
                            <select name="filigrane" onchange="document.getElementById('filigrane_pdf').submit();" >
                                <option value="" >Pas de filigrane</option>
                                <?php
                                foreach ($filigrane_pdf as $fili) {
                                    ?>
                                    <option value="<?php echo addslashes($fili->lib_filigrane); ?>" <?php
                                    if (isset($_REQUEST["filigrane"]) && $_REQUEST["filigrane"] == addslashes($fili->lib_filigrane)) {
                                        echo "selected='selected'";
                                    }
                                    ?> ><?php echo $fili->lib_filigrane; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                            <?php
                            if (isset($_REQUEST["code_pdf_modele"])) {
                                echo '<input type="hidden" name="code_pdf_modele" value="' . $_REQUEST["code_pdf_modele"] . '" />';
                            }
                            ?>
                        </form>
                    </td>
                    <td style="padding-left:30px">
                        <a href="http://www.lundimatin.fr" target="_blank" rel="noreferrer"><img src="<?php echo $FICHIERS_DIR; ?>images/powered_by_lundimatin.png" height="30"/></a>
                        <a href="http://www.sootherp.fr" target="_blank" rel="noreferrer"><img src="<?php echo $FICHIERS_DIR; ?>images/powered_by_lundimatin.png" width="120"/></a>
                    </td>
                    <?php
                }
                ?> 
            </tr>
        </table>
    </body>
</html>
