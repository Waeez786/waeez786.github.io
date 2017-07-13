<?php
require_once("/include/functions.php");
session_start(); 
if (logged_in()==true){
header('Location:dashboard.php');
}
?>


<?php
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


} else {
  // get the login url   
  $authUrl = $client->createAuthUrl();
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> !-->
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="style/loginbtn.css" />
<link rel="stylesheet" href="style/footer.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel="icon" type="image/icon" href="">
<script>
function search()
{
	  window.location.href= "#popupLogin";
};
</script>
<style>
.ui-select{
	width:120px;
	margin:0 auto;
	display:inline-block;
}
.ui-btn{
	margin:0;
	position:static;
}
.ui-btn-inline {
	 vertical-align:top;
 }

.ui-input-text{
  width:80%; 
  margin:0 auto;
}	
.ui-btn-inline
{
  vertical-align:center;
}
.ui-btn{
  padding:7px;
}  
</style>
</head>
<body>
<div id="bg">
<div id="logo">
<logo>myTextbooks</logo>
</div>
<!--<br><br><br><br>!-->
<h1>Buy or Sell your used textbooks online</h1>
<!-- 
 <select name="select-choice-a" id="select-choice-a" " data-native-menu="false">
                <option>College</option>
                <option value="standard">Standard: 7 day</option>
                <option value="rush">Rush: 3 days</option>
                <option value="express">Express: next day</option>
                <option value="overnight">Overnight</option>
            </select>
			<select name="select-choice-a" id="select-choice-b" " data-native-menu="false">
                <option>Course</option>
                <option value="a">Standard: 7 day</option>
                <option value="v">Rush: 3 days</option>
                <option value="d">Express: next day</option>
                <option value="d">Overnight</option>
            </select>
		
<input type="button" style="color:white;" data-inline="true" value="Search">
!-->	
<a  href="#searchbox" data-rel="popup" data-position-to="window"><input type="text" id="search_dummy" style="width:80%;" placeholder="Search for textbooks.."></a>	
<div data-role="popup" id="searchbox" data-overlay-theme="a" class="ui-corner-all">
						</div>



<h2>Sell your used textbooks in 3 easy steps</h2>
<div id="step"><p style="font-size:20pt;margin:0;color:white;font-weight:bold;font-family:logofont;display:inline-block;margin-right:5px;">Step 1 :  </p><a href="fbconfig.php"> <button class="loginBtn loginBtn--facebook">Continue with Facebook</button></a><a href="<?php echo $authUrl; ?>"><button class="loginBtn loginBtn--google">Continue with Google  </button></a></div><br>



<div id="step"><p style="font-size:20pt;margin:0;color:white;font-weight:bold;font-family:logofont;display:inline-block;margin-right:5px;">Step 2 :</p><p style="color:white;font-size:20pt;margin:0;font-weight:bold;font-family:headingfont;display:inline-block;"> Enter details of your books, course and college</p></div><br>
<div id="step"><p style="font-size:20pt;margin:0;color:white;font-weight:bold;font-family:logofont;display:inline-block;margin-right:5px;">Step 3 :</p><p style="color:white;font-size:20pt;margin:0;font-weight:bold;font-family:headingfont;display:inline-block;"> And you're done! Just relax while buyers contact you</p></div>
<br><br>
</div>



<footer class="footer-distributed">

			<div class="footer-left">

				

				<p class="footer-links">
					<a href="#">Home</a> 
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">myTextbooks &copy; 2017</p>
			</div>

			<div class="footer-center">

			

				<div>
					<i class="fa fa-phone"></i>
					<p>+91 8951938540</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@mytextbooks.in">support@mytextbooks.in</a></p>
				</div>

			</div>

			<div class="footer-right">


				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
</div>
</div>

</body>
</html>