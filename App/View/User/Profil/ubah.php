<?php

use App\Model\User;


if (isset($_POST["ubah"])) {
    User::Update($link,  $_POST['id_user'],  $_POST);
    header("Location: index.php?page=profil&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = User::GetWithId($link, $id);
?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Edit Profile
        </h2>
        <form class="row g-3 needs-validation p-3" method="post" enctype="multipart/form-data" novalidate>
            <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $data['id_user'] ?>" hidden>
            <div class="col-md-6">
                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                <input type="text" class="form-control" value="<?= $data['nik'] ?>" id="nik" name="nik" minlength="16" maxlength="16" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter at least 3 letters
                </div>
            </div>
            <div class="col-md-6">
                <label for="namalengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" value="<?= $data['namalengkap'] ?>" id="namalengkap" name="namalengkap" minlength="3" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter at least 3 letters
                </div>
            </div>
            <div class="col-md-4">
                <label for="tanggallahir" class="form-label">Tangggal Lahir</label>
                <input type="date" class="form-control" value="<?= $data['tanggallahir'] ?>" id="tanggallahir" name="tanggallahir" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the tanggal lahir
                </div>
            </div>
            <div class="col-md-4">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" value="<?= $data['alamat'] ?>" id="alamat" name="alamat" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the alamat
                </div>
            </div>
            <div class="col-md-4">
                <label for="notelp" class="form-label">No telephone</label>
                <input type="text" class="form-control" value="<?= $data['notelp'] ?>" id="notelp" name="notelp" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the no telephone
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="ubah">Save</button>
            </div>
        </form>
    </div>

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
<?php
} else {
    header("Location: " . BASEURL . "/index.php?page=profil&c=index");
    exit;
}
?>