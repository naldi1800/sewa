<?php
    if(isset($_GET['id'])){
        \App\Model\Barang::Delete($link, $_GET['id']);
        
    }

    header("location: " . BASEURL . "/index.php?page=barang&c=index");
    exit;