<?php session_start(); 
    require_once('data.php');
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_errno) die($connection->connect_error);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                echo $_COOKIE['fullname'];
            ?>
            - 9GAG
        </title>
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
                $avatar = "../" . $row['avatar'];
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
                    //error_log('False', 3, 'logs.txt');
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
        <br/><br/>
        <div id='settingsTabs'>
            <ul>
                <a href='account.php'><li>Account</li></a>
                <a href='password.php'><li>Password</li></a>
                <a href='profile.php'><li>Profile</li></a>
                <a href='notifications.php'><li id='differentLI'>Notifications</li></a>
            </ul>
        </div>
        <div class='settingsContentClass'>
            <form action='saveChangesNotifications.php' method='POST'>
            <h1 class='headerClass'>Notifications</h1>
            <div class='settingsNotificationsGrayBox'>
                <h3>Activity related to you and your posts</h3>
                <hr/><br/>
                <input type='checkbox'  id='myPostsUpvoted' name='myPostsUpvoted'/>
                <label for='postsAreUpvoted'>My posts are upvoted</label>
            </div><br/><br/>
            <div class='settingsNotificationsGrayBox'>
                <h3>Updates from 9GAG</h3>
                <hr/><br/>
                <input type='checkbox' id='newsProductsFeatures' name='newsProductsFeatures'/><label>News about 9GAG products and features</label><br/><br/>
                <input type='checkbox' id='thingsMissed' name='thingsMissed'/><label>Things I missed since I last visited 9GAG</label><br/><br/>
                <input type='checkbox' id='advertisementCheckbox' name='advertisementCheckbox'/><label>News about 9GAG on partner products and services</label><br/><br/>
                <input type='checkbox' id='researchSurveys' name='researchSurveys'/><label>Participation in 9GAG research surveys</label><br/><br/>
                <input type='checkbox' id='peopleSuggestions' name='peopleSuggestions'/><label>Suggestions about people I maybe interested in</label><br/><br/>
                <?php
                    if($_COOKIE['myPostsUpvoted'] == "on"){
                        echo <<<_END
                        <script>
                            document.getElementById('myPostsUpvoted').checked = true;
                        </script>
_END;
                    }
                    if($_COOKIE['myPostsUpvoted'] == "off"){
                        echo <<<_END
                        <script>
                            document.getElementById('myPostsUpvoted').checked = false;
                        </script>
_END;
                    }
                    if($_COOKIE['newsProductsFeatures'] == "on"){
                        echo <<<_END
                        <script>
                            document.getElementById('newsProductsFeatures').checked = true;
                        </script>
_END;
                    }
                    if($_COOKIE['newsProductsFeatures'] == "off"){
                        echo <<<_END
                        <script>
                            document.getElementById('newsProductsFeatures').checked = false;
                        </script>
_END;
                    }
                    if($_COOKIE['thingsMissed'] == "on"){
                        echo <<<_END
                        <script>
                            document.getElementById('thingsMissed').checked = true;
                        </script>
_END;
                    }
                    if($_COOKIE['thingsMissed'] == "off"){
                        echo <<<_END
                        <script>
                            document.getElementById('thingsMissed).checked = false;
                        </script>
_END;
                    }
                    if($_COOKIE['advertisementCheckbox'] == "on"){
                        echo <<<_END
                        <script>
                            document.getElementById('advertisementCheckbox').checked = true;
                        </script>
_END;
                    }
                    if($_COOKIE['advertisementCheckbox'] == "off"){
                        echo <<<_END
                        <script>
                            document.getElementById('advertisementCheckbox').checked = false;
                        </script>
_END;
                    }
                    if($_COOKIE['researchSurveys'] == "on"){
                        echo <<<_END
                        <script>
                            document.getElementById('researchSurveys').checked = true;
                        </script>
_END;
                    }
                    if($_COOKIE['researchSurveys'] == "off"){
                        echo <<<_END
                        <script>
                            document.getElementById('researchSurveys').checked = false;
                        </script>
_END;
                    }
                    if($_COOKIE['peopleSuggestions'] == "on"){
                        echo <<<_END
                        <script>
                            document.getElementById('peopleSuggestions').checked = true;
                        </script>
_END;
                    }
                    if($_COOKIE['peopleSuggestions'] == "off"){
                        echo <<<_END
                        <script>
                            document.getElementById('peopleSuggestions').checked = false;
                        </script>
_END;
                    }
                ?>
            </div><br/><br/><br/>
            <!--<a href='javascript:void(0);' class='blueButton'>Save Changes</a>-->
                <input type='submit' value='Save Changes' class='blueButton'/>
            </form>
            <br/><br/><br/><br/><br/>
        </div>
        <div class='settingsFooter'>
            <ul>
                <a href='javascript:void(0);'><li>Advertise</li></a>
                <a href='javascript:void(0);'><li>Contacts</li></a>
                <a href='javascript:void(0);'><li>Privacy</li></a>
                <a href='javascript:void(0);'><li>Terms</li></a>
                <li id='copyrightLI'>9GAG &copy; 2015</li>
            </ul>
        </div>
        </div>
        <div id='popUps'>
            <input type="text" id="searchbox" name="searchbox" value="Type to search..."/>
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
            <div id="notificationsPopUp">
                <h3>Activities</h3>
                <hr/>
                <p>You don't have any notification yet.</p>
                <hr/>
                <a href="javascript:void(0);" style="display: block;text-decoration:none;"><div>See all</div></a>
            </div>
            <div id='avatarMenu'>
                <ul>
                    <a href="overview.php"><li>My Profile</li></a>
                    <a href='account.php'><li>Settings</li></a>
                    <a href='javascript:void(0);' onclick="submitLogoffForm()"><li>Logout</li></a>
                    <form action="logedoff.php" method="POST" id="logoffForm">
                    </form>
                    
                </ul>
            </div>
            <div id='submitButtonMenu'>
                <ul>
                    <li>Add from URL</li>
                    <li>Upload image</li>
                    <a href='http://memeful.com/generator?ref=9gag'><li>Make a meme</li></a>
                </ul>
            </div>
        </div>
    </body>
</html>
