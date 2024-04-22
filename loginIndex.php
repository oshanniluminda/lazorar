<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Site</title>

    <link rel="stylesheet" href="loginStyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>

    <div class="container">
        <div class="form-container">
            <div class="signin-signup">
                <form action="login.php" class="sign-in-form" method="POST">
                    <h2 class="title">Sign-In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email" name="email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <input type="submit" value="Login" class="btn solid" name="login">


                </form>
                <form action="signin.php" method="POST" class="sign-up-form">
                    <h2 class="title">Sign-Up</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" id="username" name="username"
                            onkeyup="validateUserName()">
                        <p id="username-error"> </p>
                    </div>
                    <span id="uerror" style="color:red;"></span>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" id="email" name="email" onkeyup="validateEmail()">
                        <div class="errorLog">
                            <p id="email-error"> </p>
                        </div>
                    </div>
                    <span id="emailerror" style="color:red;"></span>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="password"
                            onkeyup="validatePassword()">
                        <p id="password-error"> </p>
                    </div>
                    <span id="passerror" style="color:red; text-align:center;"></span>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" id="comfirm-password"
                            onkeyup="validateComfirmPassword()">
                        <p id="com-password-error"> </p>
                    </div>
                    <span id="pass2error" style="color:red;"></span>

                    <input type="submit" value="Sign up" class="btn solid" onclick="return validateForm()"
                        name="signUp">

                    <p id="submit-error"> </p>

                </form>
            </div>
        </div>

        <div class="panel-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New Here </h3>
                    <p> Welcome to our community! We can't wait to see what amazing experiences await you here. Happy
                        exploring!</p>
                    <button class="btn transparent" id="sign-up-btn">Sign Up</button>
                </div>

                <img src="image/svg/login.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One Of Us</h3>
                    <p>
                        Welcome back, valued member! It's fantastic to see you here once again. </p>
                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                </div>

                <img src="image/svg/login2.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="loginScript.js"></script>
</body>

</html>