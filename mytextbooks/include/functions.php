<?php
    require_once("/include/db-const.php");
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    function logged_in () 
	{
        if((array_key_exists('FBID',$_SESSION)) || array_key_exists('GID',$_SESSION))
		{
            return true;
        } else 
		{
            return false;
        }
    }
 	
	 function sanitizeString($var)
	 { 
     	 global $mysqli;
		 $var = strip_tags($var);
		 $var = htmlentities($var);
		 $var = stripslashes($var);
		 return $mysqli->real_escape_string($var);  
	}
?>