            var x = -1;
            var y = -1;
            var z = -1;
            var alfa = -1;
            var beta = -1;
            var gamma = -1;
            var delta = -1;
            var teta = -1;
            var lambda = -1;
            var kappa = -1;
            var sigma = -1;
            function morph(){
                document.getElementById('magnifier').src = "https://9to5google.files.wordpress.com/2011/12/google-search-magnifier-icon.png";
            }
            
            function morphBack(){
                document.getElementById('magnifier').src = "http://png-5.findicons.com/files/icons/2427/retina/64/magnifier.png";
            }
            function morphBell(){
                document.getElementById('notifications').style.background = "white";
                document.getElementById('bell').src = "http://iconshow.me/media/images/ui/ios7-icons/png/256/bell.png";
            }
            function morphBellBack(){
                document.getElementById('notifications').style.background = "#1E2227";
                document.getElementById('bell').src = "http://flaticons.net/icons/Science%20and%20Technology/Bell.png";
            }
            function getLoginPrompt(){
                if(x == 1){
                    hideLoginPrompt();
                    return;
                }
                if(y == 1){
                    hideSignupPrompt();
                }
                if(z == 1){
                    hideSearchBox();
                }
                if(alfa == 1){
                    hideSectionMenu();
                }
                document.getElementById('loginPopUp').style.visibility = "visible";
                document.getElementById('body').style.overflowY = "hidden";
                document.getElementById('content').style.opacity = "0.5";
                document.getElementById('content').style.background = "rgba(0,0,0,0.6)";
                x = x * -1;
            }
            function hideLoginPrompt(){
                if(x == -1){
                    getLoginPrompt();
                    return;
                }
                document.getElementById('loginPopUp').style.visibility = "hidden";
                document.getElementById('body').style.overflowY = "visible";
                document.getElementById('content').style.opacity = "1";
                document.getElementById('content').style.background = "white";
                x = x * -1;
            }
            function getSignupPrompt(){
                if(y == 1){
                    hideSignupPrompt();
                    return;
                }
                if(x == 1){
                    hideLoginPrompt();
                }
                if(z == 1){
                    hideSearchBox();
                }
                if(alfa == 1){
                    hideSectionMenu();
                }
                document.getElementById('signupPopUp').style.visibility = "visible";
                document.getElementById('body').style.overflowY = "hidden";
                document.getElementById('content').style.opacity = "0.5";
                document.getElementById('content').style.background = "rgba(0,0,0,0.6)";
                y = y * -1;
            }
            function hideSignupPrompt(){
                if(y == -1){
                    getSignupPrompt();
                    return;
                }
                document.getElementById('signupPopUp').style.visibility = "hidden";
                document.getElementById('body').style.overflowY = "visible";
                document.getElementById('content').style.opacity = "1";
                document.getElementById('content').style.background = "white";
                y = y * -1;
            }
            function getSearchBox(){
                if(z == 1){
                    hideSearchBox();
                    return;
                }
                if(x == 1){
                    hideLoginPrompt();
                }
                if(y == 1){
                    hideSignupPrompt();
                }
                if(alfa == 1){
                    hideSectionMenu();
                }
                if(beta == 1){
                    hideNotificationsPopUp();
                }
                if(gamma == 1){
                    hideAvatarMenu();
                }
                if(delta == 1){
                    hideSubmitButtonMenu();
                }
                document.getElementById('searchbox').style.visibility = "visible";
                z = z * -1;
            }
            function hideSearchBox(){
                if(z == -1){
                    getSearchBox();
                    return;
                }
                document.getElementById('searchbox').style.visibility = "hidden";
                z = z * -1;
            }
            function getEmailRegistration(){
                document.getElementById('signupPopUp').style.visibility = "hidden";
                document.getElementById('emailRegistrationPopUp').style.visibility = "visible";
            }
            function hideEmailRegistration(){
                document.getElementById('emailRegistrationPopUp').style.visibility = "hidden";
                document.getElementById('content').style.opacity = "1";
                document.getElementById('content').style.background = "white";
                document.getElementById('body').style.overflowY = "visible";
            }
            function getSectionMenu(){
                if(alfa == 1){
                    hideSectionMenu();
                    return;
                }
                if(x == 1){
                    hideLoginPrompt();
                }
                if(y == 1){
                    hideSignupPrompt();
                }
                if(z == 1){
                    hideSearchBox();
                }
                if(beta == 1){
                    hideNotificationsPopUp();
                }
                if(gamma == 1){
                    hideAvatarMenu();
                }
                if(delta == 1){
                    hideSubmitButtonMenu();
                }
                document.getElementById('sections').style.visibility = "visible";
                alfa = alfa * -1;
            }
            function hideSectionMenu(){
                if(alfa == -1){
                    getSectionMenu();
                    return;
                }
                document.getElementById('sections').style.visibility = "hidden";
                alfa = alfa * -1;
            }
            function exitMobile(){
                document.getElementById('content').style.opacity = '1';
                document.getElementById('content').style.background = "white";
                document.getElementById('mobilePopUp').style.visibility = "hidden";
            }
            function getNotificationsPopUp(){
                if(beta == 1){
                    hideNotificationsPopUp();
                    return;
                }
                if(z == 1){
                    hideSearchBox();
                }
                if(alfa == 1){
                    hideSectionMenu();
                }
                if(gamma == 1){
                    hideAvatarMenu();
                }
                if(delta == 1){
                    hideSubmitButtonMenu();
                }
                document.getElementById('notificationsPopUp').style.visibility = "visible";
                beta = beta * -1;
            }
            function hideNotificationsPopUp(){
                if(beta == -1){
                    getNotificationsPopUp();
                    return;
                }
                document.getElementById('notificationsPopUp').style.visibility = "hidden";
                beta = beta * -1;
            }
            function getAvatarMenu(){
                if(gamma == 1){
                    hideAvatarMenu();
                    return;
                }
                if(z == 1){
                    hideSearchBox();
                }
                if(alfa == 1){
                    hideSectionMenu();
                }
                if(beta == 1){
                    hideNotificationsPopUp();
                }
                if(delta == 1){
                    hideSubmitButtonMenu();
                }
                document.getElementById('avatarMenu').style.visibility = "visible";
                gamma = gamma * -1;
            }
            function hideAvatarMenu(){
                if(gamma == -1){
                    getAvatarMenu();
                    return;
                }
                document.getElementById('avatarMenu').style.visibility = "hidden";
                gamma = gamma * -1;
            }
            function getSubmitButtonMenu(){
                if(delta == 1){
                    hideSubmitButtonMenu();
                    return;
                }
                if(z == 1){
                    hideSearchBox();
                }
                if(alfa == 1){
                    hideSectionMenu();
                }
                if(beta == 1){
                    hideNotificationsPopUp();
                }
                if(gamma == 1){
                    hideAvatarMenu();
                }
                document.getElementById('submitButtonMenu').style.visibility = "visible";
                delta = delta * -1;
            }
            function hideSubmitButtonMenu(){
                if(delta == -1){
                    getSubmitButtonMenu();
                    return;
                }
                document.getElementById('submitButtonMenu').style.visibility = "hidden";
                delta = delta * -1;
            }
            function submitLogoffForm(){
                document.getElementById('logoffForm').submit();
            }
            function getConfirmationBox(){
                if(teta == 1){
                    hideConfirmationBox();
                    return;
                }
                document.getElementById('settingsModifiedConfirmation').style.visibility = "visible";
                teta = teta * -1;
            }
            function hideConfirmationBox(pressedCloseButton){
                if(teta == -1){
                    getConfirmationBox();
                    return;
                }
                document.getElementById('settingsModifiedConfirmation').style.visibility = "hidden";
                if(pressedCloseButton == true){
                    
                }else{
                    teta = teta * -1;
                }   
            }
            function getDeleteAccountPopUp(){
                if(lambda == 1){
                    hideDeleteAccountPopUp();
                    return;
                }
                document.getElementById('deleteAccountPopUp').style.visibility = "visible";
                lambda = lambda * -1;
            }
            function hideDeleteAccountPopUp(){
                if(lambda == -1){
                    getDeleteAccountPopUp();
                    return;
                }
                document.getElementById('deleteAccountPopUp').style.visibility = "hidden";
                lambda = lambda * -1;
            }
            function getPostFunURL(){
                if(kappa == 1){
                    hidePostFunURL();
                    return;
                }
                document.getElementById('postAFunURL').style.visibility = "visible";
                document.getElementById('body').style.overflowY = "hidden";
                document.getElementById('content').style.opacity = "0.5";
                document.getElementById('content').style.background = "rgba(0, 0, 0, 0.6)";
                kappa = kappa * -1;
            }
            function hidePostFunURL(){
                if(kappa == -1){
                    getPostFunURL();
                    return;
                }
                document.getElementById('postAFunURL').style.visibility = "hidden";
                document.getElementById('body').style.overflowY = "visible";
                document.getElementById('content').style.opacity = "1";
                document.getElementById('content').style.background = "white";
                kappa = kappa * -1;
            }
            function getPostFunFile(){
                if(sigma == 1){
                    hidePostFunFile();
                    return;
                }
                document.getElementById('postAFunFile').style.visibility = "visible";
                document.getElementById('body').style.overflowY = "hidden";
                document.getElementById('content').style.opacity = "0.5";
                document.getElementById('content').style.background = "rgba(0, 0, 0, 0.6)";
                sigma = sigma * -1;
            }
            function hidePostFunFile(){
                if(sigma == -1){
                    getPostFunFile();
                    return;
                }
                document.getElementById('postAFunFile').style.visibility = "hidden";
                document.getElementById('body').style.overflowY = "visible";
                document.getElementById('content').style.opacity = "1";
                document.getElementById('content').style.background = "white";
                sigma = sigma * -1;
            }