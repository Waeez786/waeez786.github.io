<?php
require_once ('include/functions.php');
require_once ('include/db-const.php');
	
session_start(); 
if (logged_in()==false){
header('Location:index.php');
}
$datetime = date("Y-m-d H:i:s"); 	
require_once __DIR__.'/gplus-lib/vendor/autoload.php';

const CLIENT_ID = '248087812732-j7vl34nhn6nck3c2n6j2d0i26qpudf8r.apps.googleusercontent.com';
const CLIENT_SECRET = 'y7-b_40y7Zz0sweWdHKLas4_';
const REDIRECT_URI = 'http://localhost/mytextbooks/dashboard.php';


$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);


if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $me = $plus->people->get('me');

  // Get User data
  $_SESSION['GID'] = $me['id'];
  $_SESSION['FULLNAME'] =  $me['displayName'];
  $_SESSION['EMAIL'] =  $me['emails'][0]['value'];
  $_SESSION['DP'] = $me['image']['url'];
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
  $datetime = date("Y-m-d H:i:s"); 
  $email = $_SESSION['EMAIL'];
  $fullname = $_SESSION['FULLNAME'];
  $gid = $_SESSION['GID'];
  $dp =   $_SESSION['DP'];
  $sql = "SELECT * from users WHERE email = '{$email}' LIMIT 1";
  $result = $mysqli->query($sql);
  $n = $result->num_rows;
  if ($n==1)
  { 
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $id = $row['id'];
	$_SESSION['id'] = $id;
    $sql = "UPDATE `users` SET `gid` = '{$gid}', `dp` = '{$dp}', `modified` = '{$datetime}' WHERE `users`.`id` = {$id}";
	$result = $mysqli->query($sql);
 }
  else if($n==0)
  {
	  $sql = "INSERT INTO `users` (`id`,`gid`,`fullname`,`email`,`dp`,`created`,`modified`) VALUES (NULL,'{$gid}','{$fullname}','{$email}','{$dp}','{$datetime}','{$datetime}')";
      $result = $mysqli->query($sql);
      $sql = "SELECT * FROM users WHERE email LIKE {$email} LIMIT 1";
      $result = $mysqli->query($sql);
	  $row = $result->fetch_array(MYSQLI_ASSOC);
	  $id = $row['id'];
	  $_SESSION['id'] = $id;
  }
}
else{
	$id = $_SESSION['id'];
	$dp = $_SESSION['DP'];
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
	$sql = "SELECT * from users WHERE id = '{$id}' LIMIT 1";
  $result = $mysqli->query($sql);
  $n = $result->num_rows;
  echo $n;
  if ($n==1)
  { 
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $id = $row['id'];
	$_SESSION['id'] = $id;
    $sql = "UPDATE `users` SET  `dp` = '{$dp}', `modified` = '{$datetime}' WHERE `users`.`id` = {$id}";
	$result = $mysqli->query($sql);
  }
 }
?>
<!doctype html>
<html>
  <head>
    <title></title>

 </head>
  <body>


  <h1>Hello <?php echo $_SESSION['FULLNAME']; ?></h1>



	<img src="<?php echo $_SESSION['DP']; ?>">

<?php //echo  $_SESSION['FBID']; ?>
<?php echo $_SESSION['FULLNAME']; ?>
<?php echo $_SESSION['EMAIL']; ?>
<a href="logout.php">Logout</a>
  
	
	
  </body>
</html>
