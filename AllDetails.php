<?php
require_once 'session.php';
$exTitle = "Details";

if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}


$count = array("count" => true);
$counter = $core->getDetails($count);

$detail = array();
$details = $core->getDetails($detail);

$desczz = $core->getDesc($detail);
$clients = $core->getClients($detail);
$matrials = $core->getMatrials($detail);
$shifts = $core->getShifts($detail);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include 'in-head.php'; ?>
</head>

<body>
    <div class="DashboardContainer">
        <?php include("inc-error.php"); ?>
        <div class="row text-justify text-center mb-4">
            <div class="col-md-6 col-sm-6">
                <h3 name="count">
                    Number of Details : <? print($counter) ?>
                </h3>
            </div>
            <div class="col-md-6 col-sm-6 m-auto ">
                <a href="AddDetails.php" class="btn btn-success btn-sm  "><i class="fa fa-plus mr-1"></i> Add Details</a>
            </div>
        </div>
        <div class="table-responsive-md">

            <table class="table table-hover" style="margin: auto;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الشهر</th>
                        <th scope="col">اليوم</th>
                        <th scope="col">الاسبوع</th>
                        <th scope="col">التاريخ</th>

                        <th scope="col">
                            الوردية
                            <a href="AddShift.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                        </th>

                        <th scope="col">
                            رقم امر التوريد
                        </th>

                        <th scope="col">
                            العميل
                            <a href="AddClients.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                        </th>

                        <th scope="col">
                            التوصيف
                            <a href="" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                        </th>

                        <th scope="col">الكثافه المطلوب</th>
                        <th scope="col">الكميه المقبولة م3</th>
                        <th scope="col">الكميه المرفوضة م3</th>
                        <th scope="col">الكميه المصنعة م3</th>
                        <th scope="col">معدل الجودة</th>
                        <th scope="col">نسبه المرفوض</th>


                        <th scope="col">شطره</th>



                        <th scope="col">كسر زوايا </th>

                        <th scope="col">خشونه</th>



                        <th scope="col">الابعاد</th>



                        <th scope="col">رايش</th>



                        <th scope="col">حروقات / تعرجات</th>


                        <th scope="col">الكثافه الفعلية</th>

                        <th scope="col">
                            نوع الخامه
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                        </th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php

                foreach ($details as $index => $value) {
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
                                $value['الشهر']
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['اليوم']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['الاسبوع']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['التاريخ']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['الورديات']['النوع']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['العملاء']['رقم_التوريد']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['العملاء']['العميل']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['التوصيف']['التوصيف']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['الكثافه_المطلوب']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['الكميه_المقبولة_م3']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['الكميه_المرفوضة_م3']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['الكميه_المصنعة_م3']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['معدل_الجودة']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['نسبه_المرفوض']
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['كيمة_شطرة_م3']
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['كمية_كسر_زوايام3']
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['كمية_الخشونه_م3']
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['كمية_الابعاد_م3']
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['كمية_رايش_م3']
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['كمية_حروقات_تعرجات_م3']
                                ?>
                            </td>


                            <td>
                                <?=
                                $value['الكثافه_الفعلية']
                                ?>
                            </td>

                            <td>
                                <?=
                                $value['الخامات']['النوع']
                                ?>
                            </td>

                            <td style="width: 185px;">

                                <a href="UpdateDetails.php?id=<?= $value['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit mr-1"></i>Edit</a>

                                <form action="DeleteDetails.php?id=<?= $value['id'] ?>" method="POST" style="display:inline-block;">
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