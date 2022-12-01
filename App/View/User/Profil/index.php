<h3 class="text-center col-12 mb-4">
    Profile
</h3>
<div class="row col-12 justify-content-center">
    <div class="col-5 border border-primary border-2 rounded-3 p-2">
        <?php

        use App\Model\User;

        $data = User::GetWithId($link, $_SESSION['USER']['id']);

        if ($data != null) :
        ?>
            <div class="row col-12">
                <span class="col-4">NIK</span>
                <span class="col-1 text-end">:</span>
                <span class="col-auto"><?= $data['nik'] ?></span>
            </div>
            <div class="row col-12">
                <span class="col-4">Username</span>
                <span class="col-1 text-end">:</span>
                <span class="col-auto"><?= $data['Username'] ?></span>
            </div>
            <div class="row col-12">
                <span class="col-4">Nama Lengkap</span>
                <span class="col-1 text-end">:</span>
                <span class="col-auto"><?= $data['namalengkap'] ?></span>
            </div>
            <div class="row col-12">
                <span class="col-4">Tanggal Lahir</span>
                <span class="col-1 text-end">:</span>
                <span class="col-auto"><?= $data['tanggallahir'] ?></span>
            </div>
            <div class="row col-12">
                <span class="col-4">Alamat</span>
                <span class="col-1 text-end">:</span>
                <span class="col-auto"><?= $data['alamat'] ?></span>
            </div>
            <div class="row col-12">
                <span class="col-4">No Telp</span>
                <span class="col-1 text-end">:</span>
                <span class="col-auto"><?= $data['notelp'] ?></span>
            </div>
            <div class="row col-12">
                <span class="col-4">E-mail</span>
                <span class="col-1 text-end">:</span>
                <span class="col-auto"><?= $data['email'] ?></span>
            </div>
            <div class="row col-12s mt-4 justify-content-center">
                <a href="?page=profil&c=ubah&id=<?= $data['id_user'] ?>" class="col-3 btn btn-primary">Edit Profile</a>
                <div class="col-1"></div>
                <a href="?page=profil&c=password&id=<?= $data['id_user'] ?>" class="col-3 btn btn-primary">Edit Password</a>
            </div>
        <?php endif; ?>
    </div>
</div>