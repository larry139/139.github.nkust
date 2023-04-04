
<!DOCTYPE html>
<?php
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Motion_Detection </title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./index.css">


<script>
        
        function validateForm() {
       
            var password = document.forms["registerForm"]["password"].value;
            var password_check = document.forms["registerForm"]["password_check"].value;
            
            if(password.length<4){
                alert("密碼長度不足");
                return false;
            }   
                 
            if (password != password_check) {
                alert("請確認密碼是否輸入正確");
                return false;
            }
        }
        
</script>

</head>
<body>

<div class="container">
        <div class="login-container">
            <input id="item-1" type="radio" name="item" class="sign-in" checked><label for="item-1" class="item">Sign In</label>
            <input id="item-2" type="radio" name="item" class="sign-up"><label for="item-2" class="item">Sign Up</label>
            <div class="login-form">
<!-----------------登入----------------------------------------->

                <div class="sign-in-htm">
                <form action = "check.php" method ="post">
                    <div class="group">
                        <input placeholder="E-mail" name ="email" id="email" type="text" class="input" required>
                    </div>

                    <div class="group">
                        <input placeholder="Password" name = "users_pwd" id="password" type="password" class="input" data-type="password" required>
                    </div>


                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    
                    <div class="hr"></div>
                    <div class="footer">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </form>    
                </div>
<!-----------------註冊----------------------------------------->
                <div class="sign-up-htm">

                <form name="registerForm" method="post" action="register.php" onsubmit="return validateForm()">
                    <div class="group">
                        <input placeholder="Username" name = "username" id="user" type="text" class="input" required>
                    </div>

                    <div class="group">
                        <input placeholder="Email adress" name = "email" id="email" type="text" class="input" required>
                    </div>

                    <div class="group">
                        <input placeholder="Password" name = "password"id="password" type="password" class="input" data-type="password" required>
                    </div>
                    <div class="group">
                        <input placeholder="Repeat password" name = "password_check" id="password_check" type="password" class="input" data-type="password" required>
                    </div>

                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="footer">
                        <label for="item-1">Already have an account?</a>
                    </form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


