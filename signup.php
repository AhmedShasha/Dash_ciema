<?php

require 'session.php';
$exTitle = "SignUp";

if (array_key_exists("login", $_SESSION)) {
    $_SESSION["error"] = "Please, Logout before Sign-up for a new account";
    header("location: index.php");
    exit();
}

if ($_POST) {
    if (/*$resp->isValid() ==*/false) {
        $_SESSION["error"] = "Invalid CAPTCHA verification. ";
    } else {
        $_POST["code"] = session_id();
        $add = $core->addUser($_POST);
        if (!$add) {
            $_SESSION["error"] = $core->getError();
        } else {
            $_user = $_POST;

            $_SESSION["success"] = "Account successfully created.";

            $success = true;
            unset($_POST);
            session_regenerate_id();
            
            header("location: dashboard.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'out-head.php' ?>

</head>

<body>
    <div class="L_container">
        <?php include("inc-error.php"); ?>
        <div class="row">
            <div class="span12 col-md-12">
                <form class="form-horizontal" action="" id="contactform" method="POST">
                    <div class="login-wrap">
                        <div class="login-html signup-html">
                            <div style="width: fit-content; margin: auto;">
                                <label class="lable tSignIn">Sign-Up</label>
                            </div>
                            <div class="login-form signup-form">
                                <div class="group">
                                    <label for="username" class="label">Username</label>
                                    <input id="username" type="text" class="input" name="username" value="<?php if (array_key_exists("username", $_POST)) print $_POST["username"]; ?>">
                                    <div class="validation">
                                    </div>
                                </div>
                                <div class="group">
                                    <label for="email" class="label">Email</label>
                                    <input id="email" type="text" class="input" name="email" value="<?php if (array_key_exists("email", $_POST)) print $_POST["email"]; ?>">
                                </div>
                                <div class="group">
                                    <label for="password" class="label">Password</label>
                                    <input id="password" type="password" class="input" data-type="password" name="password">
                                </div>
                                <div class="group">
                                    <label for="password2" class="label">Confirmed Password</label>
                                    <input id="password2" type="password" class="input" data-type="password" name="password2">
                                </div>
                                <div class="hr"></div>
                                <div class="clearfix"></div>
                                <div class="group row buttons">
                                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                                        <input type="submit" class="button" value="Sign Up">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                                        <a href="login.php">
                                            <input type="button" class="button" value="LogIn">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>