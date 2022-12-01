<?php

use App\Model\User;


if (isset($_POST["ubah"])) {
    User::UpdatePassword($link,  $_POST['id_user'],  $_POST);
    header("Location: index.php?page=profil&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
?>
    <div class="col-lg-4 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Edit Password
        </h2>
        <form class="row g-3 needs-validation p-3" method="post" enctype="multipart/form-data" novalidate>
            <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $id ?>" hidden>
            <div class="col-md-12">
                <label for="oldpass" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="oldpass" name="oldpass" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter at least 3 letters
                </div>
            </div>
            <div class="col-md-12">
                <label for="newpass" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newpass" name="newpass"  required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter at least 3 letters
                </div>
            </div>
            <div class="col-md-12">
                <label for="repass" class="form-label">Repeat New Passord</label>
                <input type="password" class="form-control" id="repass" name="repass" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the tanggal lahir
                </div>
            </div>
            <div class="col-12 justify-content-center">
                <button class="btn btn-primary col-12" type="submit" name="ubah">Save</button>
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