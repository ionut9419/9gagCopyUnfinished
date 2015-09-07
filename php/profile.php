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
        <script src='../js/jquery.js' type='text/javascript'></script>
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
            $query = "SELECT * from members where email='{$_COOKIE['email']}';";
            $result = $connection->query($query);
            $rowNo = $result->num_rows;
            if($rowNo != 0){
                $row = $result->fetch_assoc();
                $avatar = '../' . $row['avatar'];
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
                <a href='profile.php'><li id='differentLI'>Profile</li></a>
                <a href='notifications.php'><li>Notifications</li></a>
            </ul>
        </div>
        <div class='settingsContentClass'>
            <form action='saveChangesProfile.php' method='POST'>
            <h1 class='headerClass'>Profile</h1>
            <label for='avatarProfile' class='labelClass'>Avatar</label><br/>
            <?php
            $avatar =  '../' . $_COOKIE['avatar'];
            //error_log("{$avatar}", 3, '../logs.txt');
                echo <<<_END
            <img src='{$avatar}' width='75' height='75' id='settingsProfileAvatar'/>
_END;
            ?>
            <div id='settingsBrowseDiv'>
            <input type='file' accept='.jpg, .gif, .png'/><br/>
            <span>JPG, GIF or PNG, Max size: 2MB</span><br/>
            <a href='javascript:void(0);' class='blueLink' id='randomAvatar'>Random</a>
            </div>
            <br/><br/>
            <label for='yourName' class='labelClass'>Your Name</label><br/>
            <?php
                echo <<<_END
            <input type='text' class='textInput' value='{$_COOKIE['fullname']}' name='yourName' maxlength='20'/><br/>
_END;
            ?>
            <span>This is the name that will be visible to other users on 9GAG.</span><br/><br/>
            <label for='settingsProfileGender' class='labelClass'>Gender</label><br/>
            
            <select name='gender'>
                <option>Unspecified</option>
                <option>Select Gender...</option>
                <option value='Female' id='femaleGender'>Female</option>
                <option value='Male' id='maleGender'>Male</option>
            </select><br/><br/>
            <?php
                    if($_COOKIE['gender'] == "Male"){
//                        error_log($_COOKIE['gender'], 3, "../logs.txt");
                        echo <<<_END
                        <script>
                            document.getElementById('maleGender').selected = true;
                        </script>
_END;
                    }else if($_COOKIE['gender'] == "Female"){
//                        error_log($_COOKIE['gender'], 3, "../logs.txt");
                        echo <<<_END
                        <script>
                            document.getElementById('femaleGender').selected = true;
                        </script>
_END;
                    }
                ?>
            <label for='settingsProfileBirthday' class='labelClass'>Birthday</label><br/>
            <?php
                    $query = "select extract(year from birthday) as year from members where email='{$_COOKIE['email']}'";
                    $result = $connection->query($query);
                    echo <<<_END
                    <input type='text' id='yearInput' placeholder='YYYY' name='yearInput' value="
_END;
                    if($result->num_rows != 0){
                        $row = $result->fetch_assoc();
                        echo <<<_END
{$row['year']}"/>
                       <input type='text' id='monthInput' placeholder='MM' name='monthInput' value="
_END;
                         $query = "select extract(month from birthday) as month from members where email='{$_COOKIE['email']}'";
                         $result = $connection->query($query);
                         if($result->num_rows != 0){
                             $row = $result->fetch_assoc();
                             echo <<<_END
{$row['month']}"/>
                       <input type='text' id='dayInput' placeholder='DD' name='dayInput' value="
_END;
                        $query = "select extract(day from birthday) as day from members where email='{$_COOKIE['email']}'";
                        $result = $connection->query($query);
                        if($result->num_rows != 0){
                            $row = $result->fetch_assoc();
//                            error_log($_COOKIE['email'], 3, "../logs.txt");
                            echo <<<_END
{$row['day']}"/><br/><br/>
_END;
                        }else{
                            echo <<<_END
                            "/><br/><br/>
_END;
                        }
                         }else{
                            echo <<<_END
                             "/>
                             <input type='text' id='dayInput' placeholder='DD' name='dayInput'/><br/><br/>
_END;
                         }
//                    $query = "select extract(day from birthday) from members where email='{$_COOKIE['email']}'";
                    }else{
                        echo <<<_END
                        "/>
                        <input type='text' id='monthInput' placeholder='MM' name='monthInput'/>
                        <input type='text' id='dayInput' placeholder='DD' name='dayInput'/><br/><br/>
_END;
                    }
                   if(isset($_SESSION['error']) && $_SESSION['error'] != ""){
                       echo <<<_END
                    <p class='errorParagraph'>{$_SESSION['error']}</p><br/>
_END;
                    $_SESSION['error'] = null;
                   }
            ?>
            
            <label for='settingsProfileCountry' class='labelClass'>Country</label><br/>
            <select name="country" id="country">
                <option value=''></option>
                <option value='Afghanistan' id="Afghanistan">Afghanistan</option>
                <option value='Albania' id="Albania">Albania</option>
                <option value='Algeria' id='Algeria'>Algeria</option>
                <option value='Andorra'id="Andorra">Andorra</option>
                <option value='Angola' id="Angola">Angola</option>
                <option value='Antigua and Barbuda' id="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value='Argentina' id="Argentina">Argentina</option>
                <option value='Armenia' id="Armenia">Armenia</option>
                <option value='Aruba' id="Aruba">Aruba</option>
                <option value='Australia' id="Australia">Australia</option>
                <option value='Austria' id="Austria">Austria</option>
                <option value='Azerbaijan' id="Azerbaijan">Azerbaijan</option>
                <option value='Bahamas' id="Bahamas">Bahamas</option>
                <option value='Bahrain' id="Bahrain">Bahrain</option>
                <option value='Bangladesh' id="Bangladesh">Bangladesh</option>
                <option value='Barbados' id="Barbados">Barbados</option>
                <option value='Belarus' id="Belarus">Belarus</option>
                <option value='Belgium' id="Belgium">Belgium</option>
                <option value='Belize' id="Belize">Belize</option>
                <option value='Benin' id="Benin">Benin</option>
                <option value='Bhutan' id="Bhutan">Bhutan</option>
                <option value='Bolivia' id="Bolivia">Bolivia</option>
                <option value='Bosnia and Herzegovina' id="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value='Botswana' id="Botswana">Botswana</option>
                <option value='Brazil' id="Brazil">Brazil</option>
                <option value='Brunei' id="Brunei">Brunei</option>
                <option value='Bulgaria' id="Bulgaria">Bulgaria</option>
                <option value='Burkina Faso' id="Burkina Faso">Burkina Faso</option>
                <option value='Burma' id="Burma">Burma</option>
                <option value='Burundi' id="Burundi">Burundi</option>
                <option value='Cabo Verde' id='Cabo Verde'>Cabo Verde</option>
                <option value='Cambodia' id="Cambodia">Cambodia</option>
                <option value='Cameroon' id="Cameroon">Cameroon</option>
                <option value='Canada' id="Canada">Canada</option>
                <option value='Cape Verde' id="Cape Verde">Cape Verde</option>
                <option value='Central African Republic' id="Central African Republic">Central African Republic</option>
                <option value='Chad' id="Chad">Chad</option>
                <option value='Chile' id="Chile">Chile</option>
                <option value='China' id="China">China</option>
                <option value='Colombia' id="Colombia">Colombia</option>
                <option value='Comoros' id="Comoros">Comoros</option>
                <option value='Congo' id="Congo">Congo</option>
                <option value='Costa Rica' id="Costa Rica">Costa Rica</option>
                <option value="Cote d'Ivoire" id="Cote d\'Ivoire">Cote d'Ivoire</option>
                <option value='Croatia' id='Croatia'>Croatia</option>
                <option value='Cuba' id='Cuba'>Cuba</option>
                <option value='Curacao' id='Curacao'>Curacao</option>
                <option value='Cyprus' id='Cyprus'>Cyprus</option>
                <option value='Czech Republic' id='Czech Republic'>Czech Republic</option>
                <option value='Denmark' id='Denmark'>Denmark</option>
                <option value='Djibouti' id='Djibouti'>Djibouti</option>
                <option value='Dominica' id='Dominica'>Dominica</option>
                <option value='Dominican Republic' id='Dominican Republic'>Dominican Republic</option>
                <option value='Ecuador' id='Ecuador'>Ecuador</option>
                <option value='Egypt' id='Egypt'>Egypt</option>
                <option value='El Salvador' id='El Salvador'>El Salvador</option>
                <option value='Equatorial Guinea' id='Equatorial Guinea'>Equatorial Guinea</option>
                <option value='Eritrea' id='Eritrea'>Eritrea</option>
                <option value='Estonia' id='Estonia'>Estonia</option>
                <option value='Ethiopia' id='Ethiopia'>Ethiopia</option>
                <option value='Fiji' id='Fiji'>Fiji</option>
                <option value='Finland' id='Finland'>Finland</option>
                <option value='France' id='France'>France</option>
                <option value='Gabon' id='Gabon'>Gabon</option>
                <option value='Gambia' id='Gambia'>Gambia</option>
                <option value='Georgia' id='Georgia'>Georgia</option>
                <option value='Germany' id='Germany'>Germany</option>
                <option value='Ghana' id='Ghana'>Ghana</option>
                <option value='Greece' id='Greece'>Greece</option>
                <option value='Grenada' id='Grenada'>Grenada</option>
                <option value='Guatemala' id='Guatemala'>Guatemala</option>
                <option value='Guinea' id='Guinea'>Guinea</option>
                <option value='Guinea-Bissau' id='Guinea-Bissau'>Guinea-Bissau</option>
                <option value='Guyana' id='Guyana'>Guyana</option>
                <option value='Haiti' id='Haiti'>Haiti</option>
                <option value='Holy See' id='Holy See'>Holy See</option>
                <option value='Honduras' id='Honduras'>Honduras</option>
                <option value='Hong Kong' id='Hong Kong'>Hong Kong</option>
                <option value='Hungary' id='Hungary'>Hungary</option>
                <option value='Iceland' id='Iceland'>Iceland</option>
                <option value='India' id='India'>India</option>
                <option value='Indonesia' id='Indonesia'>Indonesia</option>
                <option value='Iran' id='Iran'>Iran</option>
                <option value='Iraq' id='Iraq'>Iraq</option>
                <option value='Ireland' id='Ireland'>Ireland</option>
                <option value='Israel' id='Israel'>Israel</option>
                <option value='Italy' id='Italy'>Italy</option>
                <option value='Jamaica' id='Jamaica'>Jamaica</option>
                <option value='Japan' id='Japan'>Japan</option>
                <option value='Jordan' id='Jordan'>Jordan</option>
                <option value='Kazakhstan' id='Kazakhstan'>Kazakhstan</option>
                <option value='Kenya' id='Kenya'>Kenya</option>
                <option value='Kiribati' id='Kiribati'>Kiribati</option>
                <option value='Kuwait' id='Kuwait'>Kuwait</option>
                <option value='Kyrgyzstan' id='Kyrgyzstan'>Kyrgyzstan</option>
                <option value='Laos' id='Laos'>Laos</option>
                <option value='Latvia' id='Latvia'>Latvia</option>
                <option value='Lebanon' id='Lebanon'>Lebanon</option>
                <option value='Lesotho' id='Lesotho'>Lesotho</option>
                <option value='Liberia' id='Liberia'>Liberia</option>
                <option value='Libya' id='Libya'>Libya</option>
                <option value='Liechtenstein' id='Liechtenstein'>Liechtenstein</option>
                <option value='Lithuania' id='Lithuania'>Lithuania</option>
                <option value='Luxembourg' id='Luxembourg'>Luxembourg</option>
                <option value='Macau' id='Macau'>Macau</option>
                <option value='Macedonia' id='Macedonia'>Macedonia</option>
                <option value='Madagascar' id='Madagascar'>Madagascar</option>
                <option value='Malawi' id='Malawi'>Malawi</option>
                <option value='Malaysia' id='Malaysia'>Malaysia</option>
                <option value='Maldives' id='Maldives'>Maldives</option>
                <option value='Mali' id='Mali'>Mali</option>
                <option value='Malta' id='Malta'>Malta</option>
                <option value='Marshall Islands' id='Marshall Islands'>Marshall Islands</option>
                <option value='Mauritania' id='Mauritania'>Mauritania</option>
                <option value='Mauritius' id='Mauritius'>Mauritius</option>
                <option value='Mexico' id='Mexico'>Mexico</option>
                <option value='Micronesia' id='Micronesia'>Micronesia</option>
                <option value='Moldova' id='Moldova'>Moldova</option>
                <option value='Monaco' id='Monaco'>Monaco</option>
                <option value='Mongolia' id='Mongolia'>Mongolia</option>
                <option value='Montenegro' id='Montenegro'>Montenegro</option>
                <option value='Morocco' id='Morocco'>Morocco</option>
                <option value='Mozambique' id='Mozambique'>Mozambique</option>
                <option value='Namibia' id='Namibia'>Namibia</option>
                <option value='Nauru' id='Nauru'>Nauru</option>
                <option value='Nepal' id='Nepal'>Nepal</option>
                <option value='Netherlands' id='Netherlands'>Netherlands</option>
                <option value='Netherlands Antilles' id='Netherlands Antilles'>Netherlands Antilles</option>
                <option value='New Zealand' id='New Zealand'>New Zealand</option>
                <option value='Nicaragua' id='Nicaragua'>Nicaragua</option>
                <option value='Niger' id='Niger'>Niger</option>
                <option value='Nigeria' id='Nigeria'>Nigeria</option>
                <option value='Norway' id='Norway'>Norway</option>
                <option value='Oman' id='Oman'>Oman</option>
                <option value='Pakistan' id='Pakistan'>Pakistan</option>
                <option value='Palau' id='Palau'>Palau</option>
                <option value='Palestinian Territories' id='Palestinian Territories'>Palestinian Territories</option>
                <option value='Panama' id='Panama'>Panama</option>
                <option value='Papua New Guinea' id='Papua New Guinea'>Papua New Guinea</option>
                <option value='Paraguay' id='Paraguay'>Paraguay</option>
                <option value='Peru' id='Peru'>Peru</option>
                <option value='Philippines' id='Philippines'>Philippines</option>
                <option value='Poland' id='Poland'>Poland</option>
                <option value='Portugal' id='Portugal'>Portugal</option>
                <option value='Qatar' id='Qatar'>Qatar</option>
                <option value='Republic of Korea' id='Republic of Korea'>Republic of Korea</option>
                <option value='Romania' id="Romania">Romania</option>
                <option value='Russia' id='Russia'>Russia</option>
                <option value='Rwanda' id='Rwanda'>Rwanda</option>
                <option value='Saint Kitts and Nevis' id='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
                <option value='Saint Lucia' id='Saint Lucia'>Saint Lucia</option>
                <option value='Saint Vincent and the Grenadines' id='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option>
                <option value='Samoa' id='Samoa'>Samoa</option>
                <option value='San Marino' id='San Marino'>San Marino</option>
                <option value='Sao Tome and Principe' id='Sao Tome and Principe'>Sao Tome and Principe</option>
                <option value='Saudi Arabia' id='Saudi Arabia'>Saudi Arabia</option>
                <option value='Senegal' id='Senegal'>Senegal</option>
                <option value='Serbia' id='Serbia'>Serbia</option>
                <option value='Seychelles' id='Seychelles'>Seychelles</option>
                <option value='Sierra Leone' id='Sierra Leone'>Sierra Leone</option>
                <option value='Singapore' id='Singapore'>Singapore</option>
                <option value='Sint Maarten' id='Sint Maarten'>Sint Maarten</option>
                <option value='Slovakia' id='Slovakia'>Slovakia</option>
                <option value='Slovenia' id='Slovenia'>Slovenia</option>
                <option value='Solomon Islands' id='Solomon Islands'>Solomon Islands</option>
                <option value='Somalia' id='Somalia'>Somalia</option>
                <option value='South Africa' id='South Africa'>South Africa</option>
                <option value='Spain' id='Spain'>Spain</option>
                <option value='Sri Lanka' id='Sri Lanka'>Sri Lanka</option>
                <option value='Sudan' id='Sudan'>Sudan</option>
                <option value='Suriname' id='Suriname'>Suriname</option>
                <option value='Swaziland' id='Swaziland'>Swaziland</option>
                <option value='Sweden' id='Sweden'>Sweden</option>
                <option value='Switzerland' id='Switzerland'>Switzerland</option>
                <option value='Syria' id='Syria'>Syria</option>
                <option value='Taiwan' id='Taiwan'>Taiwan</option>
                <option value='Tajikistan' id='Tajikistan'>Tajikistan</option>
                <option value='Tanzania' id='Tanzania'>Tanzania</option>
                <option value='Thailand' id='Thailand'>Thailand</option>
                <option value='Timor-Leste' id='Timor-Leste'>Timor-Leste</option>
                <option value='Togo' id='Togo'>Togo</option>
                <option value='Tonga' id='Tonga'>Tonga</option>
                <option value='Trinidad and Tobago' id='Trinidad and Tobago'>Trinidad and Tobago</option>
                <option value='Tunisia' id='Tunisia'>Tunisia</option>
                <option value='Turkey' id='Turkey'>Turkey</option>
                <option value='Turkmenistan' id='Turkmenistan'>Turkmenistan</option>
                <option value='Tuvalu' id='Tuvalu'>Tuvalu</option>
                <option value="Uganda" id='Uganda'>Uganda</option>
                <option value="Ukraine" id='Ukraine'>Ukraine</option>
                <option value="United Arab Emirates" id='United Arab Emirates'>United Arab Emirates</option>
                <option value="United Kingdom" id='United Kingdom'>United Kingdom</option>
                <option value='United States' id='United States'>United States</option>
                <option value="Uruguay" id='Uruguay'>Uruguay</option>
                <option value="Uzbekistan" id='Uzbekistan'>Uzbekistan</option>
                <option value="Vanuatu" id='Vanuatu'>Vanuatu</option>
                <option value="Venezuela" id='Venezuela'>Venezuela</option>
                <option value="Vietnam" id='Vietnam'>Vietnam</option>
                <option value="Yemen" id='Yemen'>Yemen</option>
                <option value="Zambia" id='Zambia'>Zambia</option>
                <option value="Zimbabwe" id='Zimbabwe'>Zimbabwe</option>
            </select>
            <br/>
            <span>Tell us where you're from so we can provide better service for you.</span><br/><br/>
            <label for='aboutYou' class='labelClass'>Tell people who you are</label><br/>
            <textarea rows="5" cols='50' class='textInput'  style='resize:none;' id='description' name='description' ><?php echo $_COOKIE['description']?></textarea><br/><br/>
            <label for='socialNetworks' class='labelClass'>Social Networks</label><br/>
            <div class='settingsSocialNetworkDiv'><div class='settingsSocialNetworkLayout1'>Facebook not connected</div> <div class='settingsSocialNetworkLayout2'><a href='javascript:void(0);' class='blueButton'>Connect Now</a></div></div>
            <div class='settingsSocialNetworkDiv'><div class='settingsSocialNetworkLayout1'>Google+ not connected</div> <div class='settingsSocialNetworkLayout2'><a href='javascript:void(0);' class='blueButton'>Connect Now</a></div></div><br/><br/>
<!--            <a href='javascript:void(0);' class='blueButton'>Save Changes</a>-->
            <input type='submit' class='blueButton' value='Save Changes' id="saveChangesButton"/>
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
                    <a href="http://memeful.com/generator?ref=9gag"><li>Make a meme</li></a>
                </ul>
            </div>
        </div>
        <script>
            $(document).ready(function(){
               $('#randomAvatar').click(function(){
                   $.ajax({
                      type: "POST",
                      url: 'ajax.php',
                      data: {action: 'call-this'},
                      dataType: 'json',
                      success: function(result){
                          document.getElementById('settingsProfileAvatar').src = '../' + result['avatar'];
                      }
                   });
               });
               
               $.ajax({
                  type: "POST",
                  url: 'ajax.php',
                  data: {action: 'countryAjax'},
                  dataType: 'json',
                  success: function(result){
                      var country = document.getElementById('country');
                      var countryAJAX = result['countryAj'];
                      for(i = 0;i < country.length;i++){
                          if(country.options[i].value == countryAJAX){
                              document.getElementById(country.options[i].id).selected = "true";
                              break;
                          }
                      }
                  }
               });
               
            });
            
        </script>
    </body>
</html>
