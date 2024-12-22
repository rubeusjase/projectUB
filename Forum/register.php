<?php
session_start();
include 'db.php';

$registration_success = false;
$username_taken = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $photo = $_FILES['photo'] ?? null;

    // Validasi foto
    $profile_picture = null;
    if ($photo && $photo['error'] == 0) {
        $profile_picture = 'uploads/' . basename($photo['name']);
        move_uploaded_file($photo['tmp_name'], $profile_picture);
    }

    try {
        // Periksa apakah username sudah ada
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $existing_user = $stmt->fetch();

        if ($existing_user) {
            $username_taken = true;
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Masukkan data pengguna baru ke database
            $stmt = $pdo->prepare("INSERT INTO users (username, password, email, profile_picture) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $hashed_password, $email, $profile_picture]);

            $registration_success = true;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Forum</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <style>
        body {
            background: linear-gradient(to top, black, blue); /* Gradien horizontal */
        }
        h2{
            margin-top: 2%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
    <?php include 'header.php'; ?>
        <h2>Register</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="photo">Foto Profil:</label>
            <input type="file" name="photo" id="photo" accept="image/*" onchange="previewImage()"><br>
            <!-- Tambahkan elemen untuk menampilkan gambar -->
            <img id="preview" src="#" alt="Preview Foto" style="display:none; width: 100px; height: auto; margin-top: 10px; border-radius: 50%;"> 

            <button type="submit">Daftar</button>
        </form>
        <?php include 'footer.php'; ?>
    </div>

    <script>
    function previewImage() {
        const file = document.getElementById('photo').files[0];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.style.display = 'block'; // Menampilkan gambar setelah diupload
        };
        
        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // SweetAlert JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($username_taken): ?>
            Swal.fire({
                icon: 'error',
                title: 'Username sudah digunakan',
                text: 'Silakan pilih username lain.',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        <?php elseif ($registration_success): ?>
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil',
                text: 'Silakan login untuk melanjutkan.',
                showConfirmButton: false,
                timer: 3000
            }).then(function() {
                window.location.href = 'login.php';
            });
        <?php endif; ?>
    });
    </script>

    <script src="assets/js/sweetalert2.min.js"></script>
</body>
</html>
