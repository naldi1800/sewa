<h2 class="h2 text-center">
    Data Barang Yang Dipinjam
</h2>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr class="text-center align-middle">
            <th>NO</th>
            <th>Nama Barang</th>
            <th>NIK</th>
            <th>Nama Pelanggan</th>
            <th>Harga Satuan</th>
            <th>Diskon</th>
            <th>Harga Total</th>
            <th>Keterangan</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <?php

        use App\Contorller\Fungsi;
        use App\Model\Peminjaman;

        $datas = Peminjaman::GetAllWithUserId($link, $_SESSION['USER']['id']);
        $no = 0;
        if ($datas != null) :
            foreach ($datas as $data) :
                $no++;
        ?>
                <tr class="text-center align-middle">
                    <td width="5%" class="text-center"><?= $no ?></td>
                    <td width="15%"><?= $data['nama_barang'] ?></td>
                    <td width="15%"><?= $data['nik'] ?></td>
                    <td width="15%"><?= $data['namalengkap'] ?></td>
                    <td width="10%"><?= Fungsi::Rupiah($data['harga_sewa']) ?></td>
                    <td width="5%"><?= $data['diskon'] ?></td>
                    <td width="10%"><?= Fungsi::Rupiah($data['harga_sewa'] - ($data['harga_sewa'] * ($data['diskon']  / 100))) ?></td>
                    <td width="10%"><?= $data['keterangan'] ?></td>

                    <td width="15%" class="">
                        <center>
                            <?php if ($data['keterangan'] == "Waiting") : ?>
                                <a onclick="confirm('Yakin ?')" href="?page=home&c=hapus&id=<?= $data['id_sewa'] ?>&idb=<?= $data['id_barang'] ?>" class="text-center btn btn-danger">
                                    Batalkan
                                </a>
                            <?php else : ?>
                                Tidak dapat dibatalkan lagi
                            <?php endif; ?>


                        </center>
                    </td>
                </tr>
            <?php endforeach;
        else : ?>
            <tr>
                <td class="text-center" colspan="9">Data Kosong</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>