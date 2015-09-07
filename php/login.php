<?php
    session_start();
    require_once('data.php');
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_errno) die($connection->connect_error);
    header("Location: ../index.php");
    if(isset($_POST['loginWithEmail']) && $_POST['loginWithEmail'] != "" &&
       isset($_POST['loginWithPass']) && $_POST['loginWithPass'] != ""){
        
        $email = $_POST['loginWithEmail'];
        $password = $_POST['loginWithPass'];
        
        $query = "SELECT * from members where email='{$email}'";
        $result = $connection->query($query);
        $rowNo = $result->num_rows;
        if($rowNo != 0){
            $query = "SELECT * from members where password='{$password}'";
            $result2 = $connection->query($query);
            $rowNo = $result2->num_rows;
            if($rowNo != 0){
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $fullname = $row['full_name'];
                $email = $row['email'];
                $password = $row['password'];
                $avatar = $row['avatar'];
                $description = $row['description'];
                $facebook = $row['facebook'];
                $googleplus = $row['google_plus'];
                $showNSFW = $row['show_nsfw'];
                $hideUpvotes = $row['hide_upvotes'];
                $myPostsUpvoted = $row['my_posts_upvoted'];
                $newsProductsFeatures = $row['news_products_features'];
                $thingsMissed = $row['things_missed'];
                $advertisementCheckbox = $row['advertisement_checkbox'];
                $researchSurveys = $row['research_surveys'];
                $peopleSuggestions = $row['people_suggestions'];
                setcookie("loggedIn", true, time() + (86400 * 30), "/");
                setcookie("username", $username, time() + (86400 * 30), "/");
                setcookie("fullname", $fullname, time() + (86400 * 30), "/");
                setcookie("email", $email, time() + (86400 * 30), "/");
                setcookie("password", $password, time() + (86400 * 30), "/");
                setcookie("avatar", $avatar, time() + (86400 * 30), "/");
                setcookie("description", $description, time() + (86400 * 30), "/");
                setcookie("facebook", $facebook, time() + (86400 * 30), "/");
                setcookie("google+", $googleplus, time() + (86400 * 30), "/");
                setcookie("showNSFW", $showNSFW, time() + (86400 * 30), "/");
                setcookie("hideUpvotes", $hideUpvotes, time() + (86400 * 30), "/");
                setcookie('myPostsUpvoted', $myPostsUpvoted, time() + (86400 * 30), "/");
                setcookie("newsProductsFeatures", $newsProductsFeatures, time() + (86400 * 30), "/");
                setcookie("thingsMissed", $thingsMissed, time() + (86400 * 30), "/");
                setcookie("advertisementCheckbox", $advertisementCheckbox, time() + (86400 * 30), "/");
                setcookie("researchSurveys", $researchSurveys, time() + (86400 *30), "/");
                setcookie("peopleSuggestions", $peopleSuggestions, time() + (86400 * 30), "/");
//                if($hideUpvotes != null){
//                    setcookie("hideUpvotes", $hideUpvotes, time() + (86400 * 30), "/");
//                }else{
//                    setcookie('hideUpvotes', 'undefined', time() + (86400 * 30), "/");
//                }
                if(isset($row['gender']) && $row['gender'] != ""){
                    $gender = $row['gender'];
                    setcookie('gender', $gender, time() + (86400 * 30), "/");
                }else{
                    setcookie('gender', 'undefined', time() + (86400 * 30), "/");
                }
                if(isset($row['birthday']) && $row['birthday'] != ""){
                    $birthday = $row['birthday'];
                    setcookie('birthday', $birthday, time() + (86400 * 30), "/");
                }else{
                    setcookie('birthday', 'undefined', time() + (86400 * 30), "/");
                }
                if(isset($row['country']) && $row['country'] != ""){
                    $country = $row['country'];
                    setcookie('country', $country, time() + (86400 * 30), "/");
                }else{
                    setcookie('country', 'undefined', time() + (86400 * 30), "/");
                }
            }
            else{
                $_SESSION['error'] = "Wrong Username/Email and password combination.";
                header("Location: loginErrorPage.php");
                $connection->close();
                exit();
            }
        }else{
            $_SESSION['error'] = "Wrong Username/Email and password combination.";
            header("Location: loginErrorPage.php");
            $connection->close();
            exit();
        }
        
    }else{
        $_SESSION['error'] = "Wrong Username/Email and password combination.";
        header("Location: loginErrorPage.php");
        $connection->close();
        exit();
    }
   
?>