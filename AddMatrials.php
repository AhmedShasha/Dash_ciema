<?php
require_once 'session.php';
$exTitle = "Add Damage";


if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}
$count = array("count" => true);
$counter = $core->getMatrials($count);

$matrial = array();
$matrials = $core->getMatrials($matrials);

if ($_POST) {

    if (/*$resp->isValid() == */false) {
        $_SESSION["error"] = "Invalid CAPTCHA verification. ";
    } else {
        //Captcha is valid
        $add = $core->addMatrials($_POST);
        $_POST["control"] = $_SESSION["control"]["id"];

        if (!$add) {
            $_SESSION["error"] = $core->getError();
        } else {
            $_SESSION["success"] = "New Matrial type successfully created";

            header("location: AddMatrials.php");
            exit();
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
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <?php include 'in-head.php'; ?>
</head>

<body>
    <div class="DashboardContainer">
        <?php include("inc-error.php"); ?>

        <div class="card rounded mb-4">
            <h4 class="card-title bg-info text-white rounded p-2">Add Matrilas</h4>

            <div class="card-body rounded">
                <form action="" method="POST" enctype="multipart/form-data" class="row">

                    <div class="form-groub col-md-4 col-sm-4">
                        <label for="النوع">Name Of Matrial :</label>
                        <input type="text" class="form-control" id="النوع" name="النوع" placeholder="الخامة" 
                            value="<?php if (array_key_exists("النوع", $_POST)) print $_POST["النوع"]; ?>" required>
                    </div>
                    
                    <div class="form-group col-md-12 col-sm-12 text-right">
                        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-plus mr-1"></i> Add</button>
                        <a href="AllDetails.php" class="btn btn-danger mt-3"><i class="fas fa-arrow-left mr-1"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row text-justify text-center mb-4">
            <div class="col-md-6 col-sm-6">
                <h3 name="count">
                    Number of Matrials : <? print($counter) ?>
                </h3>
            </div>
        </div>
        <div class="table-responsive-md">

            <table class="table table-hover" style="margin: auto;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">النوع</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php

                foreach ($matrials as $index => $value) {
                ?>
                    <tbody class="thead-light">
                        <tr>
                            <td>
                                <?=
                                $index + 1
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['النوع']
                                ?>
                            </td>
                            
                            <td style="width: 185px;">

                                <a href="UpdateMatrials.php?id=<?= $value['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit mr-1"></i>Edit</a>

                                <form action="DeleteMatrials.php?id=<?= $value['id'] ?>" method="POST" style="display:inline-block;">
                                    <button type="submit" value="<?= $value['id'] ?>" name="delete" class="btn btn-danger btn-sm delete" onclick="return confirm('Are you sure you want to delete this Service ?!')">
                                        <i class="fa fa-trash mr-1"></i>Delete</button>
                                </form>
                            </td>

                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>


    </div>
</body>

</html>