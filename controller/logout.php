<?php

     
    if (isset($_COOKIE['uid'])) {
        unset($_COOKIE['uid']); 
        setcookie('uid', null, -1, '/'); 
  
    }
    session_unset();
    session_destroy();
 header("Location:signin.php");
 ?>