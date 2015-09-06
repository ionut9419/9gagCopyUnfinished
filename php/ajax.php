<?php
    session_start();
    require_once('data.php');
    if($_POST['action'] == 'call-this'){
        $avatar = substr($avatars[rand(0, 102)], 3);
        $advert = array('avatar' => $avatar);
//        error_log("Mr Bombastic", 3, "../logs.txt");
        $_SESSION['avatar'] = $avatar;
//        error_log($_SESSION['avatar'], 3, "../logs.txt");
        echo json_encode($advert);
    }
    if($_POST['action'] == 'countryAjax'){
        $advert = array('countryAj' => $_COOKIE['country']);
        echo json_encode($advert);
    }
   
?>