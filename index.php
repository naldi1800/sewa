<?php

session_start();
ob_start();
require_once "App/Controller/config.php";  // MEMANGGIL KONEKSI
require_once "App/init.php"; // MEMANGGIL SEMUA MODEL
date_default_timezone_set("Asia/Ujung_pandang"); 

//CONTENT Require Page
$page = isset($_GET['page']) ? $_GET['page'] : "Home";
$content = isset($_GET['c']) ? $_GET['c'] : "index";

$page = ucfirst($page);

if (!isset($_SESSION['isLogin'])) {
    header("Location: login.php");
    exit;
} else if (isset($_SESSION['ADMIN'])) {
    require_once "App/View/Admin/TP/header.php"; // REQUIRE Header Page Admin
    require_once "App/View/Admin/$page/$content.php"; // REQUIRE Content Page Admin
    require_once "App/View/Admin/TP/footer.php"; // REQUIRE Footer Page Admin
} else if (isset($_SESSION['USER'])){
    require_once "App/View/User/TP/header.php"; // REQUIRE Header Page Admin
    require_once "App/View/User/$page/$content.php"; // REQUIRE Content Page Admin
    require_once "App/View/User/TP/footer.php"; // REQUIRE Footer Page Admin
}
