<?php
    unset($_COOKIE['username']);
    unset($_COOKIE['fullname']);
    unset($_COOKIE['email']);
    unset($_COOKIE['password']);
    unset($_COOKIE['avatar']);
    unset($_COOKIE['description']);
    unset($_COOKIE['facebook']);
    unset($_COOKIE['google+']);
    unset($_COOKIE['showNSFW']);
    unset($_COOKIE['hideUpvotes']);
    setcookie('loggedIn', false, time() + (86400 * 30), '/');
    setcookie('username', null, -1, "/");
    setcookie('fullname', null, -1, '/');
    setcookie('email', null, -1, '/');
    setcookie('password', null, -1, '/');
    setcookie('avatar', null, -1, '/');
    setcookie('description', null, -1, "/");
    setcookie('facebook', null, -1, "/");
    setcookie('google+', null, -1, "/");
    setcookie('showNSFW', null, -1, "/");
    setcookie('hideUpvotes', null, -1, "/");
    
     if(isset($_COOKIE['gender']) && $_COOKIE['gender'] != ""){
         unset($_COOKIE['gender']);
         setcookie('gender', null, -1, "/");
     }
    
     if(isset($_COOKIE['birthday']) && $_COOKIE['birthday'] != ""){
        unset($_COOKIE['birthday']);
        setcookie('birthday', null, -1, "/");
     }
    
     if(isset($_COOKIE['country']) && $_COOKIE['country'] != ""){
         unset($_COOKIE['country']);
         setcookie('country', null, -1, "/");
     }
    
    header('Location: ../index.php');
?>