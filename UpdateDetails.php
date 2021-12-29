<?php
require_once 'session.php';
$exTitle = "Update Details";

$detail["id"] = $_GET["id"];
$details = $core->getDetails($detail);

if ($details) {
    $detail = $details[0];
}
$details_arr = array();

$desczz = $core->getDesc($details_arr);
$clients = $core->getClients($details_arr);
$matrials = $core->getMatrials($details_arr);
$shifts = $core->getShifts($details_arr);
if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}

if ($_POST) {

    if (/*$resp->isValid() == */false) {
        $_SESSION["error"] = "Invalid CAPTCHA verification. ";
    } else {
        //Captcha is valid
        
        $_POST["id"] = $_GET["id"];

        $add = $core->updateDetails($_POST);
        $_POST["control"] = $_SESSION["control"]["id"];

        if (!$add) {

            $_SESSION["error"] = $core->getError();
        } else {
            $_SESSION["success"] = "Details successfully Updated";

            $detail["id"] = $_GET["id"];
            $details = $core->getDetails($detail);
            if ($details) {
                $detail = $details[0];
            }
            header("location: AllDetails.php");
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
            <h4 class="card-title bg-info text-white rounded p-2">Update Details</h4>

            <div class="card-body rounded">
                <form action="" method="POST" enctype="multipart/form-data" class="row">

                    <div class="form-groub col-md-2 col-sm-2">
                        <label for="الشهر">Month:</label>
                        <select name="الشهر" id="الشهر" class="form-control">
                            <option value="<?= $detail['الشهر'] ?>"><?= $detail['الشهر'] ?></option>
                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                <option value="<?= $i ?>">
                                    <?= $i ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-groub col-md-2 col-sm-2">

                        <label for="اليوم">Day:</label>
                        <select name="اليوم" id="اليوم" class="form-control">
                            <option value="<?= $detail['اليوم'] ?>"><?= $detail['اليوم'] ?></option>
                            <option value="السبت">
                                السبت</option>
                            <option value="الاحد">
                                الاحد</option>
                            <option value="الاثنين">
                                الاثنين</option>
                            <option value="الثلاثاء">
                                الثلاثاء</option>
                            <option value="الاربعاء">
                                الاربعاء</option>
                            <option value="الخميس">
                                الخميس</option>

                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-2">
                        <label for="الاسبوع">Week:</label>
                        <select name="الاسبوع" id="الاسبوع" class="form-control">
                            <option value="<?= $detail['الاسبوع'] ?>"><?= $detail['الاسبوع'] ?></option>
                            <?php for ($i = 1; $i <= 52; $i++) { ?>
                                <option value="<?= 'w' . $i ?>">
                                    <?= 'w' . $i ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-2">
                        <label for="التاريخ">Date:</label>
                        <input type="date" class="form-control " id="التاريخ" name="التاريخ" value="<?= $detail['التاريخ'] ?>">
                    </div>

                    <div class="form-group col-md-2 col-sm-2">
                        <label for="id_الورديه">Shift:</label>
                        <select name="id_الورديه" id="id_الورديه" class="form-control">
                            <option value="<?= $detail['الورديات']['id'] ?>"><?= $detail['الورديات']['النوع'] ?></option>
                            <?php foreach ($shifts as $shift) { ?>
                                <option value="<?= $shift['id'] ?>">
                                    <?= $shift['النوع'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-2">
                        <label for="id_العميل">Client:</label>
                        <select name="id_العميل" id="id_العميل" class="form-control">
                            <option value="<?= $detail['العملاء']['id'] ?>"><?= $detail['العملاء']['العميل'] ?></option>
                            <?php foreach ($clients as $client) { ?>
                                <option value="<?= $client['id'] ?>">
                                    <?= $client['العميل'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>



                    <div class="form-groub col-md-2 col-sm-2">
                        <label for="الكثافه_المطلوب">
                            الكثافه المطلوب:</label>
                        <input type="text" class="form-control" id="الكثافه_المطلوب" name="الكثافه_المطلوب" placeholder="الكثافه المطلوب" value="<?= $detail['الكثافه_المطلوب'] ?>" required>
                    </div>

                    <div class="form-groub col-md-2 col-sm-2">
                        <label for="الكميه_المقبولة_م3">
                            الكميه المقبولة م3:</label>
                        <input type="number" class="form-control accept" id="الكميه_المقبولة_م3" name="الكميه_المقبولة_م3" placeholder="الكميه المقبولة م3" step="0.1" value="<?= $detail['الكميه_المقبولة_م3'] ?>" required>
                    </div>

                    <div class="form-groub col-md-2 col-sm-2">
                        <label for="الكميه_المرفوضة_م3">
                            الكميه المرفوضة م3:</label>
                        <input type="number" class="form-control refused" id="الكميه_المرفوضة_م3" name="الكميه_المرفوضة_م3" placeholder="الكميه المرفوضة م3" step="0.1" value="<?= $detail['الكميه_المرفوضة_م3'] ?>" required>
                    </div>

                    <div class="form-groub col-md-2 col-sm-2">
                        <label for="الكميه_المصنعة_م3">
                            الكميه المصنعة م3:</label>
                        <input type="number" class="form-control total" id="الكميه_المصنعة_م3" name="الكميه_المصنعة_م3" placeholder="الكميه المصنعة م3" step="0.1" value="<?= $detail['الكميه_المصنعة_م3'] ?>" required>
                    </div>

                    <div class="form-groub col-md-2 col-sm-2">
                        <label for="معدل_الجودة">
                            % معدل الجودة:</label>
                        <span type="number" class="form-control acceptRatio" id="معدل_الجودة" name="معدل_الجودة" placeholder="% معدل الجودة" required><?= $detail['معدل_الجودة'] ?></span>
                    </div>

                    <div class="form-groub col-md-2 col-sm-2">
                        <label for="نسبه_المرفوض">
                            % نسبة المرفوض:</label>
                        <span type="number" class="form-control refuseRatio" id="نسبه_المرفوض" name="نسبه_المرفوض" placeholder="% نسبه المرفوض" required><?= $detail['نسبه_المرفوض'] ?></span>
                    </div>

                    <div class="border border-primary col-md-9" style="margin: 35px 0 25px;">
                        <div class="row m-auto p-auto " style="padding-top: 10px;">

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="كيمة_شطرة_م3">
                                    كمية تالف الشطرة م3:
                                </label>
                                <input type="number" class="form-control" id="كيمة_شطرة_م3" name="كيمة_شطرة_م3" placeholder="كمية تالف الشطرةم3" value="<?= $detail['كيمة_شطرة_م3'] ?>">
                            </div>

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="كمية_كسر_زوايام3">
                                    كمية تالف كسر زوايا م3:
                                </label>
                                <input type="number" class="form-control" id="كمية_كسر_زوايام3" name="كمية_كسر_زوايام3" value="<?= $detail['كمية_كسر_زوايام3'] ?>" placeholder="كمية كسر زوايا م3">
                            </div>

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="كمية_الخشونه_م3">
                                    كمية تالف الخشونه م3:
                                </label>
                                <input type="number" class="form-control" id="كمية_الخشونه_م3" name="كمية_الخشونه_م3" value="<?= $detail['كمية_الخشونه_م3'] ?>" placeholder="كمية الخشونه م3">
                            </div>

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="كمية_الابعاد_م3">
                                    كمية تالف الابعاد م3:
                                </label>
                                <input type="number" class="form-control" id="كمية_الابعاد_م3" name="كمية_الابعاد_م3" value="<?= $detail['كمية_الابعاد_م3'] ?>" placeholder="كمية الابعاد م3">
                            </div>

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="كمية_رايش_م3">
                                    كمية تالف رايش م3:
                                </label>
                                <input type="number" class="form-control" id="كمية_رايش_م3" name="كمية_رايش_م3" value="<?= $detail['كمية_رايش_م3'] ?>" placeholder="كمية رايش م3">
                            </div>

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="كمية_حروقات_تعرجات_م3">
                                    كمية حروقات-تعرجات م3:
                                </label>
                                <input type="number" class="form-control" id="كمية_حروقات_تعرجات_م3" name="كمية_حروقات_تعرجات_م3" value="<?= $detail['كمية_حروقات_تعرجات_م3'] ?>" placeholder="كمية حروقات تعرجات م3">
                            </div>

                        </div>
                    </div>

                    <div class="form-groub col-md-2 col-sm-2 m-auto">

                        <div class="form-group ">
                            <label for="id_التوصيف">Twsef:</label>
                            <select name="id_التوصيف" id="id_التوصيف" class="form-control">
                                <option value="<?= $detail['التوصيف']['id'] ?>"><?=$detail['التوصيف']['التوصيف']?></option>
                                <?php foreach ($desczz as $desc) { ?>
                                    <option value="<?= $desc['id'] ?>">
                                        <?= $desc['التوصيف'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-groub ">
                            <label for="الكثافه_الفعلية">
                                الكثافه الفعلية:</label>
                            <input type="text" class="form-control" id="الكثافه_الفعلية" name="الكثافه_الفعلية"
                            value="<?= $detail['الكثافه_الفعلية'] ?>" placeholder="الكثافه الفعلية" required>
                        </div>

                        <div class="form-groub ">
                            <label for="id_الخامه">
                                الخامة :</label>
                            <select name="id_الخامه" id="id_الخامه" class="form-control">
                                <option value="<?=$detail['الخامات']['id']?>"><?=$detail['الخامات']['النوع']?></option>
                                <?php foreach ($matrials as $matrial) { ?>
                                    <option value="<?= $matrial['id'] ?>">
                                        <?= $matrial['النوع'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group col-md-12 col-sm-12 text-right">
                        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-plus mr-1"></i> Update</button>
                        <a href="AllDetails.php" class="btn btn-danger mt-3"><i class="fas fa-times mr-1"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/dashboard.js"></script>

</body>

</html>