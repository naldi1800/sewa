<?php
    if($_GET['id'])
        \App\Model\Peminjaman::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=peminjaman&c=index");
    exit;