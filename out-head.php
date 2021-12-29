<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/normalize.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Update title to includes from another class-->
    <?php
    $str = "";
    $title = "Dash";

    $alt = $title;
    $alt_ar = "";


    if (@$exTitle) $title =  $alt . "-$exTitle";

    ?>
    <title> <?php print $title; ?></title>
</head>

<body class="L_body">

</body>

</html>