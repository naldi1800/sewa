<h2 class="h2 text-center">
    Data Selesai
</h2>



<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr class="text-center align-middle">
            <th>NO</th>
            <th>Nama Barang</th>
            <th>NIK</th>
            <th>Nama Pelanggan</th>
            <th>Harga Total</th>
            <th>Denda</th>
            <th>Keterangan</th>
            <th>Tanggal Pengembalian</th>

        </tr>
    </thead>
    <tbody>
        <?php

        use App\Contorller\Fungsi;
        use App\Model\Peminjaman;
        use App\Model\Selesai;

        $datas = Selesai::GetAll($link);
        $no = 0;
        foreach ($datas as $data) :
            $no++;
        ?>
            <tr class="text-center align-middle">
                <td width="5%" class="text-center"><?= $no ?></td>
                <td width="15%"><?= $data['nama_barang'] ?></td>
                <td width="15%"><?= $data['nik'] ?></td>
                <td width="15%"><?= $data['namalengkap'] ?></td>
                <td width="10%"><?= Fungsi::Rupiah($data['harga_sewa'] - ($data['harga_sewa'] * ($data['diskon']  / 100))) ?></td>
                <td width="15%" class=""><?= Fungsi::Rupiah($data['denda']) ?></td>
                <td width="10%"><?= $data['keterangan'] ?></td>
                <td width="15%" class=""><?= $data['createtime'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>