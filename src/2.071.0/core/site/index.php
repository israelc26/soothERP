<?php
//  ******************************************************
// ACCUEIL DU VISITEUR
//  ******************************************************

$_INTERFACE['MUST_BE_LOGIN'] = 0;

require ("__dir.inc.php");
require ($DIR."_session.inc.php");

  	header ("Location: __user_login.php");
  	exit();

?>