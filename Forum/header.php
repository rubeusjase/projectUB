<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Komunitas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
</head>
<style>
    header {
        background: linear-gradient(to top, black, blue); /* Gradien horizontal */
    }
    nav a {
        color: white;
        text-decoration: none;
        margin: 0 5px;
        cursor: pointer;
    }
</style>
<body>
    <div class="container">
        <header>
        <img 
            class="img img-circle" 
            style="width: 70px; height:70px; margin-right: 360px;"
            src="img/ub.png" 
            alt="foto"
            >
            <h1 style="margin-top: -60px; ">Forum Komunitas</h1>
            <nav>
                <a href="logout.php">Logout</a> |
                <a id="profile-link">Profile</a>
            </nav>
        </header>
        <hr>

        <script src="assets/js/sweetalert2.min.js"></script>
        <script>
        // Cek status login (contoh simulasi)
        const isLoggedIn = false; // Ganti dengan logika backend jika diperlukan

        // Tambahkan event listener untuk tombol "Profile"
        document.getElementById("profile-link").addEventListener("click", function(event) {
            if (!isLoggedIn) {
                event.preventDefault(); // Mencegah navigasi ke halaman profile
                Swal.fire({
                    icon: 'warning',
                    title: 'Akses Ditolak',
                    text: 'Anda harus login terlebih dahulu untuk mengakses profil!',
                    confirmButtonText: 'OK'
                });
            } else {
                // Redirect jika pengguna sudah login (ganti dengan URL profil sebenarnya)
                window.location.href = "profile.php";
            }
        });
    </script>
</body>
</html>
