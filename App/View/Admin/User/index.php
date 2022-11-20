<h2 class="h2 text-center">
    User
</h2>
<!-- <a href="?page=barang&c=tambah" class="btn btn-outline-success mb-3">Tambah</a> -->
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>NIK</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php

        use App\Model\User;

        $i = 0;
        $datas = User::GetAll($link);
        if($datas != null):
        foreach ($datas as $data) :
            $i++;
        ?>
            <tr>
                <td width="5%" class="text-center"><?= $i ?></td>
                <td width="35%" class="text-center"><?= $data['Username'] ?></td>
                <td width="35%" class="text-center"><?= $data['namalengkap'] ?></td>
                <td width="15%" class="text-center"><?= $data['nik'] ?></td>
                <td width="15%" class="text-center"><?= $data['tanggallahir'] ?></td>
                <td width="15%" class="text-center"><?= $data['alamat'] ?></td>
                <td width="15%" class="text-center"><?= $data['notelp'] ?></td>
                <td width="15%" class="text-center"><?= $data['email'] ?></td>
                <!-- <td width="15%" class="">
                    <center>
                        <a href="?page=barang&c=ubah&id=<?= $data['id_user'] ?>" class="text-center btn btn-info">
                            Edit
                        </a>
                        <a href="?page=barang&c=hapus&id=<?= $data['id_user'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td> -->
            </tr>
            <?php endforeach;else: ?>
            <tr>
                <td colspan="8" class="text-center">
                    Data Masih Kosong
                </td>
            </tr>
            <?php endif; ?>
    </tbody>
</table>