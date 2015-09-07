<?php
    session_start();
//    if($_SESSION['error'] != ""){
//        $_SESSION['error'] = null;
//    }
    require_once('data.php');
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_errno){
        die($connection->connect_error);
    }
//    strlen($_POST['password']) < 6
    header("Location: ../index.php");
    $errorArray = array();
    if(isset($_POST['fullname']) && $_POST['fullname'] != "" &&
       isset($_POST['email']) && $_POST['email'] != "" &&
       isset($_POST['password']) && $_POST['password'] != ""){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $email = strtolower($email);
        $username = substr($email, 0, strpos($email, '@'));
        if(preg_match('/[^a-z0-9A-Z_]+/',$username)){
            $username = preg_replace('/[^a-z0-9A-Z_]+/', "", $username);
//            error_log($username, 3, '../logs.txt');
        }
        $temp = strtolower($username);
        $username = substr($temp, 0, 14);
        
        $password = $_POST['password'];
        $avatar = substr($avatars[rand(0, 102)], 3);
//        error_log($avatar, 3, '../logs.txt');
        $query = "SELECT * from members where email='{$email}'";
            $result = $connection->query($query);
            $rowNo = $result->num_rows;
            if($rowNo != 0){
                $_SESSION['error'] = "You are already a member. Please sign in";
                header("Location: signupErrorPage.php");
                $connection->close();
                exit();
            }
            if(strlen($password) < 6){
                $_SESSION['error'] = "There is a problem with your password."
                        . " Your password must be at least 6 characters"
                        . " long and must not contain invalid characters.";
                header("Location: signupErrorPage.php");
                $connection->close();
                exit();
            }
        $query = "insert into members"
                . " (username, full_name, email, password, avatar, description, facebook, google_plus, show_nsfw, hide_upvotes, my_posts_upvoted, news_products_features, things_missed, advertisement_checkbox, research_surveys, people_suggestions) "
                . "values ('$username', '$fullname', '$email', '$password', '$avatar', 'My Funny Collection', 'not connected', 'not connected', 'off', 'off', 'on', 'on', 'on', 'on', 'on', 'on');";
        $connection->query($query);
        $_SESSION['freshMember'] = true;
        setcookie("loggedIn", true, time() + (86400 * 30), "/");
        setcookie('username', $username, time() + (86400 * 30), "/");
        setcookie('fullname', $fullname, time() + (86400 * 30), "/");
        setcookie('email', $email, time() + (86400 * 30), "/");
        setcookie('password', $password, time() + (86400 * 30), "/");
        setcookie('avatar', $avatar, time() + (86400 * 30), "/");
        setcookie('description', "My Funny Collection", time() + (86400 * 30), "/");
        setcookie('facebook', "not connected", time() + (86400 * 30), "/");
        setcookie('google+', "not connected", time() + (86400 * 30), "/");
        setcookie('showNSFW', "off", time() + (86400 * 30), "/");
        setcookie('hideUpvotes', "off", time() + (86400 * 30), "/");
        setcookie('gender', 'undefined', time() + (86400 * 30), "/");
        setcookie('birthday', 'undefined', time() + (86400 * 30), "/");
        setcookie('country', 'undefined', time() + (86400 * 30), "/");
        setcookie('myPostsUpvoted', 'on', time() + (86400 * 30), "/");
        setcookie('newsProductsFeatures', 'on', time() + (86400 * 30), "/");
        setcookie('thingsMissed', 'on', time() + (86400 * 30), "/");
        setcookie('advertisementCheckbox', 'on', time() + (86400 * 30), "/");
        setcookie('researchSurveys', 'on', time() + (86400 * 30), "/");
        setcookie('peopleSuggestions', 'on', time() + (86400 * 30), "/");
//        $fullname = str_replace(' ', '', $fullname);
//        $fullname = strtolower($fullname);
//        $old_umask = umask(0);
//        mkdir('/opt/lampp/htdocs/9gag/php/u/' . $fullname, 0777);
//        fopen('/opt/lampp/htdocs/9gag/php/u/' . $fullname . '/overview.php', 'w');
//        mkdir('/opt/lampp/htdocs/9gag/php/u/' . $fullname . '/posts', 0777);
//        fopen('/opt/lampp/htdocs/9gag/php/u/' . $fullname . '/posts/posts.php', 'w');
//        mkdir('/opt/lampp/htdocs/9gag/php/u/' . $fullname . '/likes', 0777);
//        fopen('/opt/lampp/htdocs/9gag/php/u/' . $fullname . '/likes/likes.php', 'w');
//        mkdir('/opt/lampp/htdocs/9gag/php/u/' . $fullname . '/comments', 0777);
//        fopen('/opt/lampp/htdocs/9gag/php/u/' . $fullname . '/comments/comments.php', 'w');
//        umask($old_umask);
    }else {
        if(!isset($_POST['fullname']) || $_POST['fullname'] == ""){
            $_SESSION['error'] = "Please enter your full name";
            header("Location: signupErrorPage.php");
            $connection->close();
            exit();
        }else if(!isset($_POST['password']) || $_POST['password'] == ""){
                $_SESSION['error'] = "There is a problem with your password."
                        . " Your password must be at least 6 characters long"
                        . " and must not contain invalid characters.";
                header("Location: signupErrorPage.php");
                $connection->close();
                exit();
            }else if(!isset($_POST['email']) || $_POST['email'] == ""){
                $_SESSION['error'] = "The email address is invalid.";
                header("Location: signupErrorPage.php");
                $connection->close();
                exit();
            }
        }
    
    
    
?>