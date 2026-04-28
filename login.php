<?php
session_start();
include "config/koneksi.php";

$error = "";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Data Tidak Boleh kosong";
    } else {
        $userquery = mysqli_fetch_array(mysqli_query($koneksi, 
        "SELECT * FROM users WHERE username = '$username'"));

        if ($userquery) {
            if ($userquery['password'] == $password) {

                // SET SESSION
                $_SESSION['role'] = $userquery['role'];
                $_SESSION['username'] = $username;

                // DEBUG (hapus nanti kalau sudah jalan)
                // var_dump($_SESSION); exit;

                if ($userquery['role'] == 'guru' || $userquery['role'] == 'siswa') {
                    if ($userquery['password'] == '1234') {
                        header("Location: index.php?page=ganti_password");
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
                exit; // WAJIB
            } else {
                $error = "Password salah";
            }
        } else {
            $error = "Login gagal";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

<div class="login-box">
<div class="card">
<div class="card-body login-card-body">

<p class="login-box-msg">Sign in</p>

<!-- ERROR -->
<?php if (!empty($error)) : ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form action="" method="post">
  <div class="input-group mb-3">
    <input type="text" name="username" class="form-control" placeholder="username">
  </div>

  <div class="input-group mb-3">
    <input type="password" name="password" class="form-control" placeholder="password">
  </div>

  <input type="submit" value="Login" class="btn btn-primary btn-block">

</form>

</div>
</div>
</div>

</body>
</html>