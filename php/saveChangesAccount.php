<?php
    session_start();
    require_once('data.php');
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_errno) die($connection->connect_error);
    header('Location: account.php');
//    $_POST['enableDisableUpvote'] = $_COOKIE['hideUpvotes'];
    $_SESSION['error'] = null;
    if(($_POST['accountUsername'] !== $_COOKIE['username']) && $_POST['accountUsername'] != ""){
        $accountUsername = $_POST['accountUsername'];
        if(preg_match('/[^a-z0-9_]/', $accountUsername)){
            $_SESSION['error'] = "Username must contain alpha-numeric"
                    . " characters and underscore only.";
        }else{
            $query = "UPDATE members set username='{$accountUsername}' where email='{$_COOKIE['email']}'";
            $connection->query($query);
            setcookie('username', $accountUsername, time() + (86400 * 30), "/");
        }
    }
    if($_POST['showNSFW'] !== $_COOKIE['showNSFW']){
        $showNSFW = $_POST['showNSFW'];
        $query = "UPDATE members set show_nsfw='{$showNSFW}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('showNSFW', $showNSFW, time() + (86400 * 30), "/");
    }
    if($_COOKIE['hideUpvotes'] == "on" && $_POST['enableDisableUpvote'] == null){
        $hideUpvotes = "off";
        $query = "UPDATE members set hide_upvotes='{$hideUpvotes}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('hideUpvotes', 'off', time() + (86400 * 30), "/");
//        error_log($_POST['enableDisableUpvote'], 3, "../logs.txt");
    }else if($_COOKIE['hideUpvotes'] == "off" && $_POST['enableDisableUpvote'] != null){
        $hideUpvotes = "on";
        $query = "UPDATE members set hide_upvotes='{$hideUpvotes}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('hideUpvotes', $hideUpvotes, time() + (86400 * 30), "/");
//        error_log($_POST['enableDisableUpvote'], 3, "../logs.txt");
    }else{
        
    }
    
    $connection->close();
?>