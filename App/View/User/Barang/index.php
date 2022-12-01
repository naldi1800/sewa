<h2 class="h2 text-center">
    Product
</h2>

<div class="row row-cols-4">
    <?php

    use App\Model\Barang;
    use App\Contorller\Fungsi;

    $i = 0;
    $datas = Barang::GetAll($link);
    // for ($i = 1; $i < 10; $i++) :
    foreach ($datas as $data) :
        $i++;
    ?>
        <div class="col p-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $data['nama_barang'] ?></h5>
                    <p class="card-text text-danger text-end col-12 p-2 fs-4">
                        <?=
                        $data['diskon'] != 0
                            ? Fungsi::Rupiah($data['harga_sewa'] - ($data['harga_sewa'] * ($data['diskon'] / 100))) . "<span class='text-decoration-line-through fs-6 text-start ms-1 align-top'>" . Fungsi::Rupiah($data['harga_sewa']) . "</span>"
                            : Fungsi::Rupiah($data['harga_sewa'])
                        ?>
                    </p>
                    <a <?= $data['stok']  ?> href="?page=barang&c=rent&id=<?= $data['id_barang'] ?>" class="btn btn-secondary text-uppercase col-12">rent</a>
                </div>
            </div>
        </div>
    <?php endforeach; //endfor; 
    ?>
</div>