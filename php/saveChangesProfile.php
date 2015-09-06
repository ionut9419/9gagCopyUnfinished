<?php
    session_start();
    require_once('data.php');
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_errno) die($connection->connect_error);
    header("Location: profile.php");
    $_SESSION['error'] = null;
    if($_SESSION['avatar'] != ""){
        setcookie('avatar', $_SESSION['avatar'], time() + (86400 * 30), "/");
        $query = "UPDATE members SET avatar='{$_SESSION['avatar']}' WHERE email='{$_COOKIE['email']}'";
        $connection->query($query);
    }
    if(($_POST['yourName'] !== $_COOKIE['fullname']) && $_POST['yourName'] != ""){
        setcookie('fullname', $_POST['yourName'], time() + (86400 * 30), "/");
        $query = "UPDATE members SET full_name='{$_POST['yourName']}' WHERE email='{$_COOKIE['email']}'";
        $connection->query($query);
    }
    if($_POST['gender'] != null){
        setcookie('gender', $_POST['gender'], time() + (86400 * 30), "/");
        $query = "UPDATE members SET gender='{$_POST['gender']}' WHERE email='{$_COOKIE['email']}'";
        $connection->query($query);
    }
    
    if(!isset($_POST['yearInput']) || $_POST['yearInput'] == "" ||
            !isset($_POST['monthInput']) || $_POST['monthInput'] == "" ||
            !isset($_POST['dayInput']) || $_POST['dayInput'] == ""){
        $_SESSION['error'] = "Invalid date.";
    }
    else if($_POST['yearInput'] < 1900 || $_POST['yearInput'] > 9999 ||
            $_POST['monthInput'] < 1 || $_POST['monthInput'] > 12 ||
            $_POST['dayInput'] < 1 || $_POST['dayInput'] > 31){
        $_SESSION['error'] = "Invalid date.";
    }else if(preg_match('/[^0-9]+/', $_POST['yearInput']) ||
             preg_match('/[^0-9]+/', $_POST['monthInput']) ||
             preg_match('/[^0-9]+/', $_POST['dayInput'])){
        
        $_SESSION['error'] = "Invalid date.";
        
    }
    else{
        $query = "UPDATE members SET "
                . "birthday=DATE(STR_TO_DATE('{$_POST['yearInput']}/{$_POST['monthInput']}/{$_POST['dayInput']}', '%Y/%m/%d')) "
                . "where email='{$_COOKIE['email']}'";
        $connection->query($query);
        $query = "SELECT * from members where email='{$_COOKIE['email']}'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        $birthday = $row['birthday'];
        setcookie('birthday', $birthday, time() + (86400 * 30), "/");
    }
    
    if(isset($_POST['country']) && $_POST['country'] != ""){
        setcookie('country', $_POST['country'], time() + (86400 * 30), "/");
        $query = "UPDATE members SET country='{$_POST['country']}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
//        error_log($_COOKIE['country'], 3, "../logs.txt");
    }
    
    if(($_POST['description'] !== $_COOKIE['description']) && isset($_POST['description']) && $_POST['description'] != ""){
        $description = $_POST['description'];
        $query = "UPDATE members set description='{$description}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('description', $description, time() + (86400 * 30), "/");
//        error_log($_POST['description'], 3, "../logs.txt");
    }else{
        $query = "UPDATE members set description=' ' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('description', " ", time() + (86400 * 30), "/");
    }
    
    $connection->close();
?>