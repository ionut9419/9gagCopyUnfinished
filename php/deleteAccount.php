<?php session_start();?>
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
        <div id="content">
            <br/>
            <div class="errorContent">
                    <h1>Are you sure you want to delete your account?</h1>
                    <?php
                        echo <<<_END
                    <p class='simpleParagraph'>This will delete your account {$_COOKIE['username']} and all of its content.</p>
_END
                    ?><br/>         
                    <a href="../index.php" class="blueButton">No, I dont want to do that</a><br/><br/>
                    <a href="javascript:void(0);" onclick="getDeleteAccountPopUp()" class="simpleParagraph" style="text-decoration: none;">I want to delete my account</a>
            </div>
        </div>
        <div id="popUps">
            <div id="deleteAccountPopUp">
                <form action="deleteAccountProcess.php" method="POST">
                <hr/>
                <br/><br/>
                <label for="password" class="labelClass">Enter Password</label><br/>
                <input type="password" class="textInput" id="passwordInputForDelete" name="passwordInputForDelete"/><br/>
                <?php
                    if(isset($_SESSION['error'])){
                        echo <<<_END
                        <p class='errorParagraph'>{$_SESSION['error']}</p>
                        <script>
                            getDeleteAccountPopUp();
                        </script>
_END;
                        $_SESSION['error'] = null;
                    }
                ?>
                <br/><br/>
                <input type="submit" value="Delete my 9GAG account" class="blueButton"/>
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