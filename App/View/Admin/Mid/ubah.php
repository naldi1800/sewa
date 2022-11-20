<?php

use App\Model\Mid;

if (isset($_POST["ubah"])) {
    Mid::Update($link,  $_POST['id_barang'],  $_POST);
    header("Location: index.php?page=mid&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Mid::GetWithId($link, $id);
?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Form Ubah Barang
        </h2>
        <form class="row g-3 needs-validation p-3" method="post" enctype="multipart/form-data" novalidate>
            <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?= $data['id'] ?>" hidden>
            <div class="col-md-12">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" value="<?= $data['nama_barang'] ?>" id="nama_barang" name="nama_barang" minlength="3" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter at least 3 letters
                </div>
            </div>
            <div class="col-md-4">
                <label for="harga_sewa" class="form-label">Harga Sewa</label>
                <input type="text" class="form-control" value="<?= $data['harga_sewa'] ?>" id="harga_sewa" name="harga_sewa" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the Harga
                </div>
            </div>
            <div class="col-md-4">
                <label for="diskon" class="form-label">Diskon</label>
                <input type="number" class="form-control" value="<?= $data['diskon'] ?>" id="diskon" min="0" max="100" name="diskon" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the Diskon
                </div>
            </div>
            <div class="col-md-4">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" value="<?= $data['stok'] ?>" id="stok" min="0" name="stok" disabled>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the Stok
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
    header("Location: " . BASEURL . "/index.php?page=barang&c=index");
    exit;
}
?>