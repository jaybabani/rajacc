<?php 
session_start();
include '../../common/define.php';
include ROOT_DIR . '/lib/connection.php';
include ROOT_DIR . '/lib/variables.php';


// include("../../lib/connection.php");
// include("../../lib/variables.php");

// print_r($_POST);
// die;
$adminemail = trim($_POST['adminusername']);
$adminpassword = trim($_POST['adminpassword']); 
$adminpassword = md5($adminpassword);

$result1 = $conn->query(" SELECT * FROM $table_users_backend WHERE username='".$adminemail."' and password ='".$adminpassword."' ");
$count = mysqli_num_rows($result1);
if($count == 1)
{
$cat=mysqli_fetch_array($result1);
$_SESSION["adminuserId"] = $cat['userId'];
$_SESSION["adminusername"] = $cat['username'];
$_SESSION["displayname"] = $cat['displayName'];
$_SESSION["usertype"] = $cat['usertype'];

$datetime = date("Y-m-d H:i:s");
$ip = getRealIpAddr();
$userId = $cat['userId'];
$mac = "";
$query = "INSERT INTO $table_ip (ip,mac,userId,logged_on,sessionid) VALUES ('".$ip."','".$mac."','".$userId."','".$datetime."','".session_id()."') ";
// echo $query;
$conn->query($query);
// if($conn->query($query)){
//   echo "insert success";
// } else {
//   echo "FAIL";
// }

// die;
echo "<script type='text/javascript'>
window.location='".ROOT_PATH."/index.php';
</script>";

}

else if($adminemail==NULL || $adminpassword==NULL || $adminemail== "" || $adminpassword== "") 
{
	$msg='Username or password is empty';
	echo "<script type='text/javascript'>window.location='".ROOT_PATH."/modules/login/login.php?msg=".$msg."'</script>";
	die();
}

 else {
	$msg='Wrong username or password';
	echo "<script type='text/javascript'>window.location='".ROOT_PATH."/modules/login/login.php?msg=".$msg."'</script>";
	// echo "<script type='text/javascript'>
	// window.location='".ROOT_PATH."/modules/login/login.php'.'?msg=$msg';
	// </script>";
	die();
}


function getRealIpAddr()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
  //check ip from share internet
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  //to check ip is pass from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

?>
