<?php
session_start();

// Auth Guard
if (isset($_SESSION['info']) && $_SESSION['info'] == 'sukses') {
    header('Location: index.php');
    exit();
}

$login_status = ''; // Untuk menyimpan status login
if (isset($_SESSION['login_status'])) {
    $login_status = $_SESSION['login_status'];
    unset($_SESSION['login_status']); // Menghapus flash message setelah ditampilkan
}

function testinput($n)
{
    $hsl = trim($n);
    $hsl = stripslashes($hsl);
    $hsl = htmlspecialchars($hsl);
    return $hsl;
}

if (isset($_POST['email'])) {
    include_once('./services/authservice.php');
    $auth = new AuthService();

    $uname = testinput($_POST['email']);
    $upass = testinput($_POST['password']);

if ($auth->CekLogin($uname, $upass) == 'Sukses') {
    $_SESSION['info'] = 'sukses';
    header('Location: ' . $_SERVER['PHP_SELF'] . '?login=success');
    exit();
} else {
    $_SESSION['login_status'] = 'failed'; // Status untuk toast gagal
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link href="img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

<body style="background: url(img/background.jpg); background-size: cover;">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body">
                    <div class="container">
                        <h1 class="text-center h4 text-gray-900">Login</h1>
                        <div class="col-lg-10 mx-auto">
                            <div class="p-2 text-center">
                                <form class="user" id="flogin" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-user btn-primary btn-block" type="submit" name="input">Login</button>
                                    <hr>
                                    <a href="#" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="#" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert Script -->
    <script src="js/sweetalert2.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            const loginStatus = urlParams.get("login");

            if (loginStatus === "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: 'Selamat datang!',
                    confirmButtonText: 'Lanjutkan',
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        history.replaceState(null, null, window.location.pathname);
                        window.location.href = "index.php";
                    }
                });
            }

            const failedStatus = "<?php echo $login_status; ?>";
            if (failedStatus === "failed") {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: 'Email atau password salah!',
                    confirmButtonText: 'Coba Lagi'
                });
            }
        });
    </script>
</body>

</html>
