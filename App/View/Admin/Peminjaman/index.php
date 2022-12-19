<h2 class="h2 text-center">
    Data Peminjaman
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

        $datas = Peminjaman::GetAll($link);
        $no = 0;
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
                            <a onclick="confirm('Yakin ?')" href="?page=peminjaman&c=proses&idb=<?= $data['id_barang'] ?>&id=<?= $data['id_sewa'].'&p=Confirmation' ?>" class="text-center btn btn-success">
                                Konfirmasi
                            </a>
                        <?php elseif ($data['keterangan'] == "Confirmation") : ?>
                            <a onclick="confirm('Yakin ?')" href="?page=peminjaman&c=proses&idb=<?= $data['id_barang'] ?>&id=<?= $data['id_sewa'].'&p=Delivery' ?>" class="text-center btn btn-success">
                                Kirim
                            </a>
                        <?php elseif ($data['keterangan'] == "Delivery") : ?>
                            <a onclick="confirm('Yakin ?')" href="?page=peminjaman&c=proses&idb=<?= $data['id_barang'] ?>&id=<?= $data['id_sewa'].'&p=Arrived' ?>" class="text-center btn btn-success">
                                Sampai
                            </a>
                        <?php elseif ($data['keterangan'] == "Arrived") : ?>
                            <a onclick="confirm('Yakin ?')" href="?page=peminjaman&c=proses&idb=<?= $data['id_barang'] ?>&id=<?= $data['id_sewa'].'&p=Returned' ?>" class="text-center btn btn-success">
                                Kembali
                            </a>
                        <?php endif; ?>

                        <a onclick="confirm('Yakin ?')" href="?page=peminjaman&c=hapus&id=<?= $data['id_sewa'] ?>&idb=<?= $data['id_barang'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>