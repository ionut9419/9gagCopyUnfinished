<?php
    session_start();
    require_once('data.php');
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_errno) die($connection->connect_error);
    header("Location: notifications.php");
    
    if($_COOKIE['myPostsUpvoted'] == "on" && $_POST['myPostsUpvoted'] == null){
        $myPostsUpvoted = "off";
        $query = "UPDATE members set my_posts_upvoted='{$myPostsUpvoted}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie("myPostsUpvoted", $myPostsUpvoted, time() + (86400 * 30), "/");
    }else if($_COOKIE['myPostsUpvoted'] == "off" && $_POST['myPostsUpvoted'] != null){
        $myPostsUpvoted = "on";
        $query = "UPDATE members set my_posts_upvoted='{$myPostsUpvoted}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie("myPostsUpvoted", $myPostsUpvoted, time() + (86400 * 30), "/");
    }else{
        
    }
    
    if($_COOKIE['newsProductsFeatures'] == "on" && $_POST['newsProductsFeatures'] == null){
        $newsProductsFeatures = "off";
        $query = "UPDATE members set news_products_features='{$newsProductsFeatures}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie("newsProductsFeatures", $newsProductsFeatures, time() + (86400 * 30), "/");
    }else if($_COOKIE['newsProductsFeatures'] == "off" && $_POST['newsProductsFeatures'] != null){
        $newsProductsFeatures = "on";
        $query = "UPDATE members set news_products_features='{$newsProductsFeatures}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie("newsProductsFeatures", $newsProductsFeatures, time() + (86400 * 30), "/");
    }else{
        
    }
    
    if($_COOKIE['thingsMissed'] == "on" && $_POST['thingsMissed'] == null){
        $thingsMissed = "off";
        $query = "UPDATE members set things_missed='{$thingsMissed}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie("thingsMissed", $thingsMissed, time() + (86400 * 30), "/");
    }else if($_COOKIE['thingsMissed'] == "off" && $_POST['thingsMissed'] != null){
        $thingsMissed = "on";
        $query = "UPDATE members set things_missed='{$thingsMissed}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('thingsMissed', $thingsMissed, time() + (86400 * 30), "/");
    }else{
        
    }
    
    if($_COOKIE['advertisementCheckbox'] == "on" && $_POST['advertisementCheckbox'] == null){
        $advertisementCheckbox = "off";
        $query = "UPDATE members set advertisement_checkbox='{$advertisementCheckbox}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('advertisementCheckbox', $advertisementCheckbox, time() + (86400 * 30), "/");
    }else if($_COOKIE['advertisementCheckbox'] == "off" && $_POST['advertisementCheckbox'] != null){
        $advertisementCheckbox = "on";
        $query = "UPDATE members set advertisement_checkbox='{$advertisementCheckbox}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('advertisementCheckbox', $advertisementCheckbox, time() + (86400 * 30), "/");
    }else{
        
    }
    
    if($_COOKIE['researchSurveys'] == "on" && $_POST['researchSurveys'] == null){
        $researchSurveys = "off";
        $query = "UPDATE members set research_surveys='{$researchSurveys}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie('researchSurveys', $researchSurveys, time() + (86400 * 30), "/");
    }else if($_COOKIE['researchSurveys'] == "off" && $_POST['researchSurveys'] != null){
        $researchSurveys = "on";
        $query = "UPDATE members set research_surveys='{$researchSurveys}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie("researchSurveys", $researchSurveys, time() + (86400 * 30), "/");
    }else{
        
    }
    
    if($_COOKIE['peopleSuggestions'] == "on" && $_POST['peopleSuggestions'] == null){
        $peopleSuggestions = "off";
        $query = "UPDATE members set people_suggestions='{$peopleSuggestions}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie("peopleSuggestions", $peopleSuggestions, time() + (86400 * 30), "/");
    }else if($_COOKIE['peopleSuggestions'] == "off" && $_POST['peopleSuggestions'] != null){
        $peopleSuggestions = "on";
        $query = "UPDATE members set people_suggestions='{$peopleSuggestions}' where email='{$_COOKIE['email']}'";
        $connection->query($query);
        setcookie("peopleSuggestions", $peopleSuggestions, time() + (86400 * 30), "/");
    }else{
        
    }
    
    $connection->close();
?>