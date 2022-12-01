<?php

use App\Model\User;  //Class login
use App\Contorller\Alert; //Class Alert

if (isset($_POST['signup'])) {
    $cek = User::Insert($link, $_POST);
    header("Location: index.php?page=home&c=index");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL ?>/TP/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 -->
    <link href="<?= BASEURL ?>/TP/Select2/css/select2.min.css" rel="stylesheet" />
    <script src="<?= BASEURL ?>/TP/Select2/js/select2.min.js"></script>

    <!-- Dselect -->
    <script src="<?= BASEURL ?>/TP/dselect.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="TP/Login/css/style.css">

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


    <title>Login</title>
</head>

<script>
    function valid() {


        var p = document.getElementById('pass').value;
        var r = document.getElementById('repass').value;
        if (p != r) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Your password not same',
            });
            return false;
        }
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Success to create account',
        });
    }
</script>

<body>
    <div class="container-fluid">
        <div class=" shadow p-3 mb-5 mt-2 bg-light rounded">
            <?= \App\Contorller\Alert::Get(); ?>
            <!-- <button onclick="Swal.fire('ada ja');"> TEs</button> -->
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h1 class="heading-section">Sign Up</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="wrap d-md-flex">

                                <div class="login-wrap p-4 p-lg-5 order-md-last">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <h3 class="" id="ket">Create Account</h3>
                                            <h6 class="mb-4">
                                                Input your Username, Email and your Password. already account?
                                                <a href="login.php">login</a>
                                            </h6>
                                        </div>
                                    </div>
                                    <form method="post" class="signin-form" onsubmit="return valid();">
                                        <div class="form-group mb-3">
                                            <label class="label" for="user" id="labeluser">Username</label>
                                            <input name="user" id="user" type="text" class="form-control" placeholder="Username" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="pass">Email</label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="pass">Password</label>
                                            <input name="pass" id="pass" type="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="repass">Re Password</label>
                                            <input name="repass" id="repass" type="password" class="form-control" placeholder="Re Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="signup" class="form-control btn submit px-3" style="background-color: blue; color: white;">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <img src="<?= BASEURL ?>/App/Image/logo.png" class="col-6 p-4 p-lg-5  d-flex align-items-center">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="<?= BASEURL ?>/TP/js/bootstrap.bundle.min.js"></script>
    <script src="TP/Login/js/jquery.min.js"></script>
    <script src="TP/Login/js/popper.js"></script>
    <script src="TP/Login/js/bootstrap.min.js"></script>
    <script src="TP/Login/js/main.js"></script>
    <!-- <script src="<?= BASEURL ?>/TP/swal/sweetalert2.all.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>