<?php
session_start();
include 'db.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['profile_picture'] = $user['profile_picture']; // Menyimpan foto profil di sesi
        // Set session untuk menunjukkan login berhasil
        $_SESSION['login_success'] = true;
        header("Location: login.php"); // Mencegah multiple redirects
        exit;
    } else {
        $error = "Username atau kata sandi salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Forum Komunitas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <style>
        body {
            background: linear-gradient(to top, black, blue); /* Gradien horizontal */
        }
        h2 {
            margin-top: 2%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php include 'header.php'; ?>

        <h2>Login</h2>

        <form action="login.php" method="POST" class="login-form">
            <label for="username">Nama Pengguna:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <?php if (isset($_SESSION['profile_picture'])): ?>
            <div class="user-profile">
                <img src="<?= htmlspecialchars($_SESSION['profile_picture']) ?>" alt="Foto Profil" class="user-avatar">
                <p>Selamat datang kembali, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
            </div>
        <?php endif; ?>

        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

        <?php include 'footer.php'; ?>
    </div>

    <!-- Script SweetAlert dan Redirect -->
    <script src="assets/js/sweetalert2.min.js"></script>
    <script>
        <?php if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true): ?>
            Swal.fire({
                icon: 'success',
                title: 'Login Berhasil',
                text: 'Selamat datang, <?= htmlspecialchars($_SESSION['username']) ?>!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'topics.php';
            });
            <?php unset($_SESSION['login_success']); // Clear session flag ?>
        <?php elseif (isset($error)): ?>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '<?= htmlspecialchars($error) ?>',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    </script>
</body>
</html>
