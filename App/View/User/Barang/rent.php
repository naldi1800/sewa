<?php

use App\Contorller\Fungsi;
use App\Model\Barang;
use App\Model\Peminjaman;

if (isset($_POST['rent'])) {
    Peminjaman::Insert($link, $_POST);
    header("Location: index.php?page=barang&c=index");
    exit;
}

?>

<h2 class="h2 mb-4 text-center">
    Detail Barang
</h2>
<?php


!isset($_GET['id']) ? header("Location: index.php?page=barang&c=index") : "";
$id = $_GET['id'];
$data = Barang::GetWithId($link, $id);
?>

<div class="row justify-content-center">
    <div class="card col-5">
        <div class="card-body">
            <div class="card-title text-center fw-bold fs-4"><?= $data['nama_barang'] ?></div>
            <div class="card-text col fs-5">
                <div class="col row">
                    <div class="col-4">
                        Harga Asli
                    </div>
                    <div class="col-auto">
                        : <?= Fungsi::Rupiah($data['harga_sewa']) ?>
                    </div>
                </div>
                <div class="col row">
                    <div class="col-4">
                        Diskon
                    </div>
                    <div class="col-auto">
                        : <?= $data['diskon'] ?>%
                    </div>
                </div>
                <div class="col row">
                    <div class="col-4">
                        Harga
                    </div>
                    <div class="col-auto">
                        : <?= Fungsi::Rupiah($data['harga_sewa'] - ($data['harga_sewa'] * ($data['diskon'] / 100))) ?>
                    </div>
                </div>
                <div class="col row">
                    <div class="col-4">
                        Barang Tersedia
                    </div>
                    <div class="col-auto">
                        : <?= $data['stok'] ?>
                    </div>
                </div>
                <div class="col-12 row justify-content-center">
                    <a href="?page=profil&c=index" class="btn btn-secondary col-3 m-1">
                        Cancel
                    </a>
                    <form method="post" class="col-4 m-1">
                        <input type="text" hidden name="id" value="<?= $id ?>" >
                        <input type="text" hidden name="harga_sewa" value="<?= $data['harga_sewa'] ?>" >
                        <input type="text" hidden name="diskon" value="<?= $data['diskon'] ?>" >
                        <button class="btn btn-success col-12" name="rent">
                            Rent
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>