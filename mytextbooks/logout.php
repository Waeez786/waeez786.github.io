<?php 
session_start();
$_SESSION = array();    
        // destroy the session cookie
        if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-50000, '/');
        }    
        // destroy the session
        session_destroy();
header("Location: index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
