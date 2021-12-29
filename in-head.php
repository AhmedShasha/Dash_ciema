<?php
$str = "";
$title = "Dash";
$alt = $title;

if (@$exTitle) $title = $alt . "-$exTitle";
?>

<!------ Include the above in your HEAD tag ---------->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <title> <?php print $title; ?></title>

</head>

<body>

    <!--===============================================
                      HEADER , NAVBAR
    ===============================================-->

    <header class="navbar navbar-expand-sm bg-dark navbar-dark mb-0">
        <div class="hamburger">
            <div class="cta">
                <div class="toggle-btn type14"></div>
            </div>
        </div>
    </header>
    <nav class="side-bar-warp">
        <div class="sidebar-menu small-side-bar flowHide">

            <ul class="navbar-nav " style="margin: 10px;">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <span class="sidebar-icon"><i class="fas fa-th-large"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="AllDetails.php">
                        <span class="sidebar-icon"><i class="fas fa-folder-open"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Details</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="AddClients.php">
                        <span class="sidebar-icon"><i class="fas fa-users"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Clients</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="AddShift.php">
                        <span class="sidebar-icon"><i class="fas fa-exchange-alt"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Shift</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="AddDesc.php">
                        <span class="sidebar-icon"><i class="fas fa-sticky-note"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Twsef</span>
                    </a>
                </li>

                

                <li class="nav-item">
                    <a class="nav-link" href="AddMatrials.php">
                        <span class="sidebar-icon"><i class="fas fa-dolly-flatbed"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Matrials</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <span class="sidebar-icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/navbar.js"></script>
    <script src="assets/js/all.min.js"></script>
</body>

</html>