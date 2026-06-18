<?php
session_start();
// session_destroy();
include '../../common/define.php';
include ROOT_DIR . '/lib/connection.php';
include ROOT_DIR . '/lib/variables.php';
?>

<?php //include("../../lib/auth.php"); 
?>

<?php

// update logout time of the sessionid
$datetime = date("Y-m-d H:i:s");
$conn->query("UPDATE  $table_ip SET loggedout_on='" . $datetime . "' WHERE sessionid='" . session_id() . "' AND userId='" . $_SESSION["adminuserId"] . "' ");

// if (isset($_SESSION["id"])) {
  session_destroy();
// }


echo "<script type='text/javascript'> window.top.location='".ROOT_PATH."/modules/login/login.php'; </script>";
?>