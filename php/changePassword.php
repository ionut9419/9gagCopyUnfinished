<?php
    session_start();
    $_SESSION['error'] = null;
    $_SESSION['success'] = null;
    require_once('data.php');
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_errno) die($connection->connect_error);
    header("Location: password.php");
    
        if((!isset($_POST['oldpassword']) || $_POST['oldpassword'] == "") &&
           (!isset($_POST['newpassword']) || $_POST['newpassword'] == "") &&
           (!isset($_POST['newpasswordretype']) || $_POST['newpasswordretype'] == "")){
           
            
        }
        else if((!isset($_POST['oldpassword']) || $_POST['oldpassword'] == "") &&
                (!isset($_POST['newpassword']) || $_POST['newpassword'] == "") &&
                (isset($_POST['newpasswordretype']) && $_POST['newpasswordretype'] != "")){
            
            $_SESSION['error'] = "New passwords don't match.";
            
        }
        else if((!isset($_POST['oldpassword']) || $_POST['oldpassword'] == "") &&
                (isset($_POST['newpassword']) && $_POST['newpassword'] != "") &&
                (!isset($_POST['newpasswordretype']) || $_POST['newpasswordretype'] == "")){
            
            $_SESSION['error'] = "New passwords don't match.";
        }
        else if((!isset($_POST['oldpassword']) || $_POST['oldpassword'] == "") &&
                (isset($_POST['newpassword']) && $_POST['newpassword'] != "") &&
                (isset($_POST['newpasswordretype']) && $_POST['newpasswordretype'] != "")){
                    
                if($_POST['newpassword'] === $_POST['newpasswordretype']){
                    $_SESSION['error'] = "The old password is incorrect.";
                }else{
                    $_SESSION['error'] = "New passwords don't match.";
                }
                
                    
            }
        else if((isset($_POST['oldpassword']) && $_POST['oldpassword'] != "") &&
                (!isset($_POST['newpassword']) || $_POST['newpassword'] == "") &&
                (!isset($_POST['newpasswordretype']) || $_POST['newpasswordretype'] == "")){
            
            if($_COOKIE['password'] === $_POST['oldpassword']){
                $_SESSION['error'] = "The password field is required.";
            }else{
                $_SESSION['error'] = "The old password is incorrect.";
            }
            
            
        }
        else if((isset($_POST['oldpassword']) && $_POST['oldpassword'] != "") &&
                (!isset($_POST['newpassword']) || $_POST['newpassword'] == "") &&
                (isset($_POST['newpasswordretype']) && $_POST['newpasswordretype'] != "")){
            
            $_SESSION['error'] = "New passwords don't match.";
            
        }
        else if((isset($_POST['oldpassword']) && $_POST['oldpassword'] != "") &&
                (isset($_POST['newpassword']) && $_POST['newpassword'] != "") &&
                (!isset($_POST['newpasswordretype']) || $_POST['newpasswordretype'] == "")){
            
            $_SESSION['error'] = "New passwords don't match.";
        }
        else{
            if($_POST['newpassword'] === $_POST['newpasswordretype']){
                if($_COOKIE['password'] === $_POST['oldpassword']){
                    
                    $query = "UPDATE members SET password='{$_POST['newpassword']}' WHERE password='{$_POST['oldpassword']}'";
                    $connection->query($query);
                    setcookie('password', $_POST['newpassword'], time() + (86400 * 30), "/");
                    $_SESSION['success'] = true;
                    
                }else{
                    $_SESSION['error'] = "The old password is incorrect.";
                }
            }else{
                $_SESSION['error'] = "New passwords don't match.";
            }
        }
        
        $connection->close();
?>