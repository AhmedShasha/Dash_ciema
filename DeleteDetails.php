<?php
require 'Model/core.php';
require 'session.php';

if (!array_key_exists("login", $_SESSION) || !array_key_exists("id", $_GET)) {
    header("location: logout.php");
    exit();
}

$id = $_POST['delete'];
$core = new core();
if (array_key_exists('delete', $_POST) && !empty($_POST['delete'])) {
    # code...

    $query = "DELETE FROM `التفاصيل` WHERE id = $id";

    if (mysqli_query($core->dbConnection, $query)) {

        $_SESSION["success"] = "Details successfully Deleted";

        header('Location: AllDetails.php');
    }else{
        $this->setError("Can't Delete This Racord");
        return false;
    }
}
