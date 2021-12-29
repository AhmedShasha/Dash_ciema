<?php

if (array_key_exists("login", $_SESSION)) {
    header("location: dashboard.php");
    exit();
} else {

    header("Location: logout.php");
    exit();
}
