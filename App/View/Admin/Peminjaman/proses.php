<?php

use App\Contorller\Fungsi;
use App\Model\Peminjaman;
use App\Model\Selesai;

!isset($_GET['p']) ? header("Location: index.php?page=peminjaman&c=index") : "";
$data['id_sewa'] = $_GET['id'];
$data['denda'] = "0";
$data['id_barang'] = $_GET['idb'];

if ($_GET['p'] == "Returned") {
    $pe = Peminjaman::GetWithId($link, $_GET['id']);
    $cek = Fungsi::getReturnTimeEnded($pe['returntime']);
    if ($cek[0]) {
        $data['denda'] = (int) $cek[1] * 1000;
    }
    
    Selesai::Insert($link, $data);
}
// var_dump($data); 
Peminjaman::UpdateProgres($link, $_GET['id'], $_GET['p']);
header("Location: index.php?page=peminjaman&c=index");
exit;
