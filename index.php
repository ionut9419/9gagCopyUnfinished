<?php session_start(); 
    require_once('php/data.php');
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
        <link rel='stylesheet' type='text/css' href='css/style.css'/>
        <link rel='short icon' type='image/png' href='http://assets-9gag-fun.9cache.com/s/fab0aa49/e1375e5b204d31167ab97ea56690ba6aa362c85f/static/dist/core/img/favicon_v2.png'/>
        <script src='js/script.js' type='text/javascript'></script>
        <script src="js/jquery.js" type="text/javascript"></script>
    </head>
    <body id="body">
        <div id='header'>
             <div id='menu'>
            <div id='image'>
                <a href='index.php'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/9GAG_new_logo.svg/2000px-9GAG_new_logo.svg.png' width='40' height='40'/></a>
            </div>
            <ul id='firstList'>
                <li><a href='#' id='hot'>Hot</a></li>
                <li><a href='#'>Trending</a></li>
                <li><a href='#'>Fresh</a></li>
                <li><a href='javascript:void(0);' onclick="getSectionMenu()">Sections<img src="http://www.ceylondtours.com/images/icon/arrow.png" width="10" height="10"/></a></li>
            </ul>
            <ul id='secondList'>
                <li><a href='#'>Video</a></li>
                <li><a href='#'>Cosplay</a></li>
                <li><a href='#'>Girl</a></li>
                <li><a href='#'>Comic</a></li>
                <li><a href='#'>NSFW</a></li>
                <li><a href='#'>GIF</a></li>
                <li><a href='#'>WTF</a></li>
                <li><a href='#'>Geeky</a></li>
                <li><a href='#'>Meme</a></li>
                <li><a href='#'>ಠ_ಠ</a></li>
                <li><a href='#'>👉 FREE Games</a></li>
            </ul>
                 <ul id="secondList">
                <li><a href="javascript:void(0);" onmouseover="morph()" onmouseout="morphBack()" onclick="getSearchBox()">
                                <img src="http://png-5.findicons.com/files/icons/2427/retina/64/magnifier.png" width="20" height="20" id="magnifier"/>
                    </a></li>
            </ul>
            <ul id="thirdList">
                <li><a href="javascript:void(0);" id="login" onclick="getLoginPrompt()">Log in</a><li>
                    <li id="signupLi"><a href="javascript:void(0);" id="signupButton" onclick='getSignupPrompt()'>Sign up</a></li>
            </ul>
            <?php
                if(isset($_COOKIE['loggedIn']) && $_COOKIE['loggedIn'] == true){
                    //error_log('True', 3, 'logs.txt');
                    echo <<<_END
                    <script>
                        document.getElementById('login').style.visibility = "hidden";
                        document.getElementById('signupButton').style.visibility = "hidden";
                    </script>
                    <div id='notifications' onmouseover='morphBell()' onmouseout='morphBellBack()' onclick='getNotificationsPopUp()'>
                    <img src='http://flaticons.net/icons/Science%20and%20Technology/Bell.png' width='15' height='15' id='bell'/>
                    </div>
                    <div id='avatarDiv' onclick='getAvatarMenu()'>
                        <img src='
_END;
            $query = "SELECT * from members where full_name='" . $_COOKIE['fullname'] . "';";
            $result = $connection->query($query);
            $rowNo = $result->num_rows;
            if($rowNo != 0){
                $row = $result->fetch_assoc();
                $avatar = $row['avatar'];
                echo $avatar;
                //error_log($avatar, 3, 'logs.txt');
                echo <<<_END
                ' width='35' height='35' />
                </div>
            <div id='submitButtonDiv'>
                <a href='javascript:void(0);' id='submitButton' onclick='getSubmitButtonMenu()'>Submit</a>
            </div>
_END;
            }
                }else{
                   // error_log('False', 3, 'logs.txt');
                    echo <<< _END
                    <script>
                        document.getElementById('login').style.visibility = "visible";
                        document.getElementById('signupButton').style.visibility = "visible";
                        document.getElementById('notifications').style.visibility = "hidden";
                        document.getElementById('avatarDiv').style.visibility = "hidden";
                        document.getElementById('submitButtonDiv').style.visibility = "hidden";
                    </script>
_END;
                }
            ?>
        </div>
        </div>
        <div id='content'>
        <br/><br/><br/><br/><br/>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        <span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span><span>Content to be replaced</span>
        </div>
        <div id='popUps'>
        <div id="loginPopUp">
            <form action='php/login.php' method='POST'>
            <a href="javascript:void(0);" id="closeButton" onclick="hideLoginPrompt()"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-close-128.png" width="18" height="18"/></a>
            <h1>Login</h1>
            <p>Connect with a social network</p>
            <br/>
            <a href="#" id="facebook">
                <img src="http://lakemacholidayparks.com.au/wp-content/uploads/2014/09/facebook-icon.png" width="30" height="30"/>
                Facebook</a>
            <a href="#" id="google">
                <img src="http://icons.iconarchive.com/icons/danleech/simple/1024/google-plus-icon.png" width="30" height="30"/>
                Google</a>
            <br/><br/><br/>
            <hr/>
            <p>Log in with your email address</p>
            <label for="email">Email</label><br/>
            <input type="text" id="loginWithEmail" name="loginWithEmail" class='textInput'/><br/><br/>
            <label for="password">Password</label><br/>
            <input type="password" id="loginWithPass" name="loginWithPass" class='textInput'/><br/><br/>
            <input type='submit' value='Log in' class='blueButton'/>
<!--            <a href="#" id="loginButton">Log in</a>-->
            <a href="#" id="forgotPassword">Forgot Password</a>
            </form>
        </div>
        <div id='signupPopUp'>
            <a href="javascript:void(0);" id="closeButton" onclick="hideSignupPrompt()"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-close-128.png" width="18" height="18"/></a>
            <h1>Hey there!</h1>
            <p>9GAG is your best source of fun. Share anything you find interesting, get real
            responses from people all over the world, and discover what makes you laugh.</p>
            <br/>
            <a href='#' id='facebook'>
                <img src='http://lakemacholidayparks.com.au/wp-content/uploads/2014/09/facebook-icon.png' width='30' height='30'/>
                Facebook</a>
            <a href='#' id='google'>
                <img src='http://icons.iconarchive.com/icons/danleech/simple/1024/google-plus-icon.png' width='30' height='30'/>
                Google</a>
            <br/><br/>
            <hr/>
            <p>Sign up with your <a href='javascript:void(0);' class='signupLink' onclick="getEmailRegistration()">Email Address</a></p>
            <p>Have an account? <a href='javascript:void(0);' class='signupLink' onclick="getLoginPrompt()">Login</a></p>
        </div>
            <input type="text" id="searchbox" name="searchbox" value="Type to search..."/>
                <div id="emailRegistrationPopUp">
                <form action='php/registration.php' method='POST'>
                <a href="javascript:void(0);" id="closeButton" onclick="hideEmailRegistration()"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-close-128.png" width="18" height="18"/></a>
                <h1>Become a member</h1>
                <label for="fullname">Full Name</label>
                <br/>
                <input type="text" id="fullname" name="fullname"/>
                <br/><br/>
                <label for="email">Email Address</label>
                <br/>
                <input type="email" id="email" name="email"/>
                <br/><br/>
                <label for="password">Password</label>
                <br/>
                <input type="password" id="password" name="password"/>
                <br/><br/><br/>
                <!--<a href="php/registration.php" id="signupButton">Sign up</a>-->
                <input type='submit' value='Sign up' id='signupButton'/>
                </form>
            </div>
            <div id="sections">
                <ul>
                    <li>NSFW</li>  
                    <li>WTF</li>
                    <li>GIF</li>
                    <li>Geeky</li>
                    <li>Meme</li>
                    <li>Cute</li>
                    <li>Comic</li>
                    <li>Cosplay</li>
                    <li>Food</li>
                    <li>Girl</li>
                    <li>Timely</li>
                    <li>Design</li>
                </ul>
            </div>
            <div id='mobilePopUp'>
                <h1>Get the app</h1>
                <p>9GAG goes wherever you go. Download 9GAG on your device.</p><br/>
                <a href='https://itunes.apple.com/app/9gag/id545551605?mt=8' id='ios'><img src='https://upload.wikimedia.org/wikipedia/ro/e/e5/Apple_Logo.png' width='30' height='30'/>iOS</a><br/><br/><br/><br/>
                <a href='https://play.google.com/store/apps/details?id=com.ninegag.android.app' id='android'><img src='https://java.sogeti.nl/JavaBlog/wp-content/uploads/2009/04/android_icon_256.png' width='30' height='30'/>Android</a><br/><br/><br/>
                <a href='#' id='later' onclick="exitMobile()">I'll get it later</a>
            </div>
            <?php
                if(isset($_SESSION['freshMember']) && $_SESSION['freshMember'] == true){
                    echo <<<_END
                <script>
                document.getElementById('content').style.opacity = "0.5";
                document.getElementById('content').style.background = "rgba(0, 0, 0, 0.7)";                
                document.getElementById('mobilePopUp').style.visibility = "visible";
                </script>
_END;
                    $_SESSION['freshMember'] = false;
                }
            ?>
            <div id="notificationsPopUp">
                <h3>Activities</h3>
                <hr/>
                <p>You don't have any notification yet.</p>
                <hr/>
                <a href="javascript:void(0);" style="display: block;text-decoration:none;"><div>See all</div></a>
            </div>
            <div id='avatarMenu'>
                <ul>
                    <a href="php/overview.php"><li>My Profile</li></a>
                    <a href='php/account.php'><li>Settings</li></a>
                    <a href='javascript:void(0);' onclick="submitLogoffForm()"><li>Logout</li></a>
                    <form action="php/logedoff.php" method="POST" id="logoffForm">
                    </form>
                    
                </ul>
            </div>
            <div id='submitButtonMenu'>
                <ul>
                    <li>Add from URL</li>
                    <li>Upload image</li>
                    <li>Make a meme</li>
                </ul>
            </div>
        </div>
    </body>
</html>
