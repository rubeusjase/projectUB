<?php
// Konfigurasi koneksi ke database
$host = 'localhost';
$dbname = 'frontend';
$dbuser = 'root';
$dbpass = ''; // Sesuaikan dengan password database Anda

// Membuat koneksi ke database menggunakan PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Proses registrasi setelah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input (contoh sederhana)
    if (empty($fullname) || empty($email) || empty($password)) {
        $error = "Semua kolom harus diisi!";
    } else {
        // Hashing password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Menyimpan data ke database
        try {
            $sql = "INSERT INTO tb_user (fullname, email, password) VALUES (:fullname, :email, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            if ($stmt->execute()) {
                // Redirect ke halaman login setelah registrasi berhasil
                header("Location: login.php");
                exit; // Hentikan eksekusi agar redirect berjalan
            } else {
                $error = "Gagal melakukan registrasi.";
            }
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: url(img/background.jpg); background-size: cover;">
    <div class="row justify-content-center">
        <div class="bg-white my-2">
            <!-- Nested Row within Card Body -->
            <div class="container">
                <div class="col-lg-15 d-none "></div>
                <div class="col-lg-15">
                    <div class="p-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="register.php" method="POST">
                            <div class="form-group row">
                                <label for="fullname"></label>
                                <input type="text" class="form-control form-control-user" name="fullname" id="fullname"
                                    placeholder="Full Name" >
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" name="email" class="form-control form-control-user" id="email"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <label for="password"></label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="password" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block" type="submit">Register Account</button>
                            <hr>
                            <a href="#" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.php">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.php">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
