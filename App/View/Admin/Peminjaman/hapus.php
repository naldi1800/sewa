<?php
    if(isset($_GET['id'])){
        \App\Model\Peminjaman::Delete($link, $_GET['id']);
        \App\Model\Barang::UpdateStok($link, $_GET['idb'], 1, true);
    }

    header("location: " . BASEURL . "/index.php?page=peminjaman&c=index");
    exit;