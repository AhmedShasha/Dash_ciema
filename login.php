<?php
require_once 'session.php';
$exTitle = "LogIn";

if (array_key_exists("login", $_SESSION)) {
    header("location: index.php");
    exit();
}

if ($_POST) {
    if (/*$resp->isValid() ==*/false) {
        $_SESSION["error"] = "Invalid CAPTCHA verification. ";
    } else {
        $_SESSION['login'] = true;
        $add = $core->getuser($_POST);

        if (!$add) {
            $_SESSION["error"] = $core->getError() ? $core->getError() : "Could not signin";
        } else {
            $log = $add[0];
            $_SESSION["services"] = $add[0];
            $_SESSION["projects"] = $add[0];
            $_SESSION["clients"] = $add[0];
            $_SESSION["abouts"] = $add[0];

            header("location: dashboard.php");
            exit();
            unset($_POST);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include 'out-head.php'; ?>

</head>

<body class="L_body">
    <div class="L_container ">
        <?php include("inc-error.php"); ?>
        <div class="row">
            <div class="span12 col-md-12">
                <form class="form-horizontal" action="" id="contactform" method="POST">
                    <div class="login-wrap">
                        <div class="login-html">
                            <div style="width: fit-content; margin: auto;">
                                <label class="lable tSignIn">Sign-In</label>
                            </div>
                            <div class="login-form ">
                                <div class="group">
                                    <label for="username" class="label">Username or Email</label>
                                    <input id="username" type="text" class="input" name="username">
                                </div>
                                <div class="group">
                                    <label for="password" class="label">Password</label>
                                    <input id="password" type="password" class="input" data-type="password" name="password">
                                </div>
                                <div class="hr"></div>
                                <div class="clearfix"></div>
                                <div class="group row buttons">
                                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                                        <input type="submit" class="button" value="LogIn">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                                        <a href="signup.php">
                                            <input type="button" class="button" value="Sign Up">
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