<?php require_once __DIR__ . '/../../shafy/logics/config/global.php';
// if (!isset($_SESSION['partner_logged_in'])) {
//     header('Location: ./login.php');
//     exit;
// } ?>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <title><?= isset($title) ? $title . ' - ' : '' ?>SportEase Partner</title>
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;600;700&display=swap" rel="stylesheet">
        <link href="../shafy/css/style.css" rel="stylesheet">
        <link href="../favicon.ico" rel="shortcut icon" type="image/x-icon">
    </head>

    <body class="body_light">
        <div class="sidebar">
            <div class="sidebar__header"><a class="sidebar__brand" href="./dashboard.php"><img alt="SportEase" src="../shafy/img/sportease.png"></a><button class="sidebar__toggler"><img alt="Menu" src="../shafy/img/icons/menu.png"></button></div>
            <nav class="sidebar__body">
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="../../gor/admin/index_admin.php"><img alt="Dashboard" src="../shafy/img/icons/home-black.png"> Dashboard</a></li>
                    <li class="sidebar__menu-item"><a class="sidebar__menu-link sidebar__menu-link_collapse" href="javascript:void(0)"><img alt="Dashboard" src="../shafy/img/icons/document-black.png"> Kategori Lapangan<img alt="See" src="../shafy/img/icons/chevron-right-black.png"></a>
                        <ul class="sidebar__menu-list">
                            <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="./sports-arenas-create.php">Add New</a></li>
                            <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="../../gor/admin/adminCatUpdater.php">All Category</a></a></li>
                        </ul>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__menu-link sidebar__menu-link_collapse" href="javascript:void(0)"><img alt="Dashboard" src="../shafy/img/icons/copy-document-black.png"> Lapangan <img alt="See" src="../shafy/img/icons/chevron-right-black.png"></a>
                        <ul class="sidebar__menu-list">
                            <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="./fields-create.php">Add New</a></li>
                            <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="../../gor/admin/adminFieldUpdater.php">Semua Lapangan</a></li>
                        </ul>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__menu-link sidebar__menu-link_collapse" href="javascript:void(0)"><img alt="Dashboard" src="../shafy/img/icons/flame-black.png"> Transactions <img alt="See" src="../shafy/img/icons/chevron-right-black.png"></a>
                        <ul class="sidebar__menu-list">
                            <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="../../gor/admin/adminRentManager.php">All Transactions</a></li>
                            <!-- <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="./transactions-history.php">History</a></li> -->
                        </ul>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__menu-link sidebar__menu-link_collapse" href="javascript:void(0)"><img alt="Dashboard" src="../shafy/img/icons/flame-black.png"> Report <img alt="See" src="../shafy/img/icons/chevron-right-black.png"></a>
                        <ul class="sidebar__menu-list">
                            <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="../../gor/admin/adminStatisticRent.php">Statistic Bulanan</a></li>
                            <!-- <li class="sidebar__menu-item"><a class="sidebar__menu-link" href="./transactions-history.php">History</a></li> -->
                        </ul>
                    </li>
                </ul><a class="sidebar__cta" href="../../gor/logout.php">Logout<img alt="See" src="../shafy/img/icons/arrow-right-light.png"></a>
            </nav>
        </div>



