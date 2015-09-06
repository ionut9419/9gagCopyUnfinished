<?php session_start(); 
    require_once('data.php');
//    if(isset($_GET['logoff'])){
//        $_COOKIE['loggedIn'] = false;
//        $_GET['logoff'] = null;
//    }
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_errno) die($connection->connect_error);
    //$_COOKIE['loggedIn'] = false;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>9GAG - Why So Serious?</title>
        <link rel='stylesheet' type='text/css' href='../css/style.css'/>
        <link rel='short icon' type='image/png' href='http://assets-9gag-fun.9cache.com/s/fab0aa49/e1375e5b204d31167ab97ea56690ba6aa362c85f/static/dist/core/img/favicon_v2.png'/>
        <script src='../js/script.js' type='text/javascript'></script>
        <script src='../js/jquery.js' type='text/javascript'></script>
    </head>
    <body id="body">
             <div id='header'>
                <div id='menu'>
            <div id='image'>
                <a href='../index.php'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/9GAG_new_logo.svg/2000px-9GAG_new_logo.svg.png' width='40' height='40'/></a>
            </div>
        </div>
            </div>
        <div id='content'>
            <br/>
                <div class="errorContent">
                    <form action='registration.php' method='POST'>
                    <h1>Become a member</h1>
                    <label for='fullname' class='labelClass'>Full Name</label><br/>
                    <input type='text' class='textInput' id='fullname' name='fullname'/><br/><br/>
                    <label for='email' class='labelClass'>Email Address</label><br/>
                    <input type='email' class='textInput' id='email' name='email'/><br/><br/>
                    <label for='password' class='labelClass'>Password</label><br/>
                    <input type='password' class='textInput' id='password' name='password'/><br/>
<!--                    <p id='errorParagraph'></p><br/><br/>-->
                    <?php
                        echo <<<_END
                    <p class='errorParagraph'>{$_SESSION['error']}</p><br/><br/>
                    
_END;
                    ?>
                    <input type='submit' value='Sign up' id='signupButton'/><br/><br/>
                    </form>
            </div>
        </div>
            <br/><br/><br/>
            <div class='settingsFooter'>
            <ul>
                <a href='javascript:void(0);'><li>Advertise</li></a>
                <a href='javascript:void(0);'><li>Contacts</li></a>
                <a href='javascript:void(0);'><li>Privacy</li></a>
                <a href='javascript:void(0);'><li>Terms</li></a>
                <li id='copyrightLI'>9GAG &copy; 2015</li>
            </ul>
        </div>
        </body>
        </html>