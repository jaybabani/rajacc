<?php
session_start();
include '../../common/define.php';
include ROOT_DIR . '/lib/connection.php';
include ROOT_DIR . '/lib/variables.php';

// print_r($_POST);
// die;
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$password = md5($password);

$result1 = $conn->query(" SELECT * FROM $table_users WHERE username='" . $username . "' and password ='" . $password . "' AND active = 'yes' ");
$count = mysqli_num_rows($result1);
if ($count == 1) {
  $cat = mysqli_fetch_array($result1);
  $_SESSION["user_id"] = $cat['id'];
  $_SESSION["username"] = $cat['username'];
  $_SESSION["name"] = $cat['name'];
  $_SESSION["usertype"] = $cat['usertype'];

  $datetime = date("Y-m-d H:i:s");
  $ip = getRealIpAddr();
  $userId =  $cat['id'];
  $mac = "";
  $query = "INSERT INTO $table_ip (ip,mac,userId,logged_on,sessionid) VALUES ('" . $ip . "','" . $mac . "','" . $userId . "','" . $datetime . "','" . session_id() . "') ";
  // echo $query;
  $conn->query($query);

  // find user acl list and store in session here.

  if ($_SESSION["usertype"] == "admin") {

    $_SESSION['acl'] = array(
      "index",
      "symbols-read",
      "symbols-update",
      "symbols-create",
      "symbols-delete",
      "users-read",
      "users-update",
      "users-create",
      "users-delete",
      "user_roles-read",
      "user_roles-update",
      "user_roles-create",
      "user_roles-delete",
    );
  }

  if ($_SESSION["usertype"] == "viewer") {
    $_SESSION['acl'] = array();
  }

  // die;
  echo "<script type='text/javascript'>window.location='" . ROOT_PATH . "/index.php';</script>";
}

//
else if ($username == NULL || $password == NULL || $username == "" || $password == "") {
  $msg = 'Username or password is empty';
  echo "<script type='text/javascript'>window.location='" . ROOT_PATH . "/modules/login/login.php?msg=" . $msg . "'</script>";
  die();
}

//
else {
  $msg = 'Wrong username or password';
  echo "<script type='text/javascript'>window.location='" . ROOT_PATH . "/modules/login/login.php?msg=" . $msg . "'</script>";
  die();
}


function getRealIpAddr()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
  //check ip from share internet
  {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  //to check ip is pass from proxy
  {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
?>