<?php
require_once 'session.php';
$exTitle = "Update Twsef Type";


if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}

$desc["id"] = $_GET["id"];
$desczz = $core->getDesc($desc);

if ($desczz) {
    $desc = $desczz[0];
}

if ($_POST) {

    if (/*$resp->isValid() == */false) {
        $_SESSION["error"] = "Invalid CAPTCHA verification. ";
    } else {

        $_POST["id"] = $_GET["id"];
        $add = $core->updateDesc($_POST);

        if (!$add) {
            $_SESSION["error"] = $core->getError();
        } else {
            $_SESSION["success"] = "Twsef type successfully Updated";
            $desc["id"] = $_GET["id"];
            $desczz = $core->getDesc($desc);
            if ($desczz) {
                $desc = $desczz[0];
            }
            header("location: AddDesc.php");
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
        <div class="card rounded">
            <h4 class="card-title bg-info text-white rounded p-2">Update Twsef Type</h4>

            <div class="card-body rounded">
                <form action="" method="POST" enctype="multipart/form-data" class="row">

                    <div class="form-groub col-md-4 col-sm-4 mt-2">
                    <label for="التوصيف">Twsef type :</label>
                        <input type="text" class="form-control" id="التوصيف" name="التوصيف" placeholder="نوع التوصيف" value="<?= $desczz[0]['التوصيف'] ?>" required>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 text-right">
                        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-edit mr-1"></i> Update</button>
                        <a href="AddDesc.php" class="btn btn-danger mt-3"><i class="fas fa-times mr-1"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>