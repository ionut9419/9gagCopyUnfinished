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
        <script src="../js/jquery.js" type="text/javascript"></script>
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
                    <form action='login.php' method='POST'>
                    <h1>Login</h1>
            <p class='simpleParagraph'>Connect with a social network</p>
            <br/>
            <a href="#" id="facebook">
                <img src="http://lakemacholidayparks.com.au/wp-content/uploads/2014/09/facebook-icon.png" width="30" height="30"/>
                Facebook</a>
            <a href="#" id="google">
                <img src="http://icons.iconarchive.com/icons/danleech/simple/1024/google-plus-icon.png" width="30" height="30"/>
                Google</a>
            <br/><br/><br/>
            <hr/>
            <p class='simpleParagraph'>Log in with your email address</p>
            <label for="email" class='labelClass'>Email</label><br/>
            <input type="text" id="loginWithEmail" name="loginWithEmail" class='textInput'/><br/><br/>
            <label for="password" class='labelClass'>Password</label><br/>
            <input type="password" id="loginWithPass" name="loginWithPass" class='textInput'/><br/>
            <?php
                echo <<<_END
            <p class='errorParagraph'>{$_SESSION['error']}</p><br/>
_END;
            $_SESSION['error'] = null;
            ?>
            <input type='submit' value='Log in' class='blueButton'/>
<!--            <a href="#" id="loginButton">Log in</a>-->
            <a href="#" id="forgotPassword">Forgot Password</a>
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