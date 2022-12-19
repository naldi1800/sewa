<?php
    if($_GET['id'])
        \App\Model\Peminjaman::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=home&c=index");
    exit;