<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edition du document</title>
</head>

<frameset rows="32,*" frameborder="no" border="0" framespacing="0">
	<frame src="documents_editing_button.php?ref_doc=<?php echo $ref_doc; ?><?php 	if (isset($_REQUEST["code_pdf_modele"])) {echo "&code_pdf_modele=".$_REQUEST["code_pdf_modele"];}?><?php 	if (isset($_REQUEST["filigrane"])) {echo "&filigrane=".$_REQUEST["filigrane"];}?>" name="topediting" scrolling="No" noresize="noresize" id="topediting" title="topediting" />
	<frame src="documents_editing_print.php?<?php echo $ref_doc_url; ?><?php if (isset($_REQUEST["print"])) { ?>&print=1<?php } ?><?php 	if (isset($_REQUEST["code_pdf_modele"])) {echo "&code_pdf_modele=".$_REQUEST["code_pdf_modele"];}?><?php 	if (isset($_REQUEST["filigrane"])) {echo "&filigrane=".$_REQUEST["filigrane"];}?>" name="mainediting" id="mainediting" title="mainediting" />
</frameset>
<noframes><body>
</body>
</noframes></html>