<h2 class="h2 text-center">
   Data Barang
</h2>
<a href="?page=barang&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga Sewa</th>
            <th>Diskon</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        use App\Model\Barang;

        $i = 0;
        $datas = Barang::GetAll($link);
        foreach ($datas as $data) :
            $i++;
        ?>
            <tr>
                <td width="5%" class="text-center"><?= $i ?></td>
                <td width="35%" class="text-center"><?= $data['nama_barang'] ?></td>
                <td width="15%" class="text-center"><?= $data['harga_sewa'] ?></td>
                <td width="15%" class="text-center"><?= $data['diskon'] ?></td>
                <td width="15%" class="text-center"><?= $data['stok'] ?></td>
                <td width="15%" class="">
                    <center>
                        <a href="?page=barang&c=ubah&id=<?= $data['id_barang'] ?>" class="text-center btn btn-info">
                            Edit
                        </a>
                        <a href="?page=barang&c=hapus&id=<?= $data['id_barang'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>