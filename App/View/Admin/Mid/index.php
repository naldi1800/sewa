<h2 class="h2 text-center">
   MID TEST (192218)
</h2>
<a href="?page=mid&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
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

        use App\Model\Mid;

        $i = 0;
        $datas = Mid::GetAll($link);
        if($datas != null):
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
                        <a href="?page=mid&c=ubah&id=<?= $data['id'] ?>" class="text-center btn btn-info">
                            Edit
                        </a>
                        <a href="?page=mid&c=hapus&id=<?= $data['id'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach;else: ?>
            <tr>
                <td colspan="6" class="text-center">
                    Data Masih Kosong
                </td>
            </tr>
            <?php endif; ?>
    </tbody>
</table>