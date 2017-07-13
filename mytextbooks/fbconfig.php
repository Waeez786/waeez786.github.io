<?php
require_once ('include/functions.php');
require_once ('include/db-const.php');

session_start();
// added in v4.0.0
require_once 'include/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1063401350463721','0e40456864a7c47a7e29b7c798541e2f' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://localhost/mytextbooks/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?fields=id,name,email' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
		$_SESSION['DP'] = "https://graph.facebook.com/".$fbid."/picture";
    /* ---- header location after session ----*/
	
	
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
   $sql = "UPDATE `users` SET `fullname` = '{$fullname}', `fbid` = '{$fbid}', `dp` = '{$dp}', `modified` = '{$datetime}' WHERE `users`.`id` = $id";
	$result = $mysqli->query($sql);
 }
  else if($n==0)
  {
	  $sql = "INSERT INTO `users` (`id`,`fbid`,`fullname`,`email`,`dp`,`created`,`modified`) VALUES (NULL,'{$gid}','{$fullname}','{$email}','{$dp}','{$datetime}','{$datetime}')";
      $result = $mysqli->query($sql);
      $sql = "SELECT * FROM users WHERE email LIKE {$email} LIMIT 1";
      $result = $mysqli->query($sql);
	  
	  $id = $result['id'];
	  $_SESSION['id'] = $id;
  }
	
	
	
	
  header("Location: dashboard.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl."email");
}
?>