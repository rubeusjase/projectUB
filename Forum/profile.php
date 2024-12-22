<?php
session_start();
include 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Arahkan ke halaman login jika belum login
    exit;
}

// Ambil data pengguna berdasarkan session user_id
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT username, email, profile_picture FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Jika data pengguna tidak ditemukan, logout dan arahkan ke halaman login
if (!$user) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Ambil data pengguna untuk ditampilkan
$username = htmlspecialchars($user['username']);
$email = htmlspecialchars($user['email']);
$profile_picture = $user['profile_picture'] ? $user['profile_picture'] : 'default_profile.jpg'; // Menampilkan foto profil atau gambar default
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Forum</title>
    <link rel="stylesheet" href="styles.css">
    <style>

        body {
            min-height: 100vh;
            background: linear-gradient(to bottom, #000428, #004683);
        }

        .container {
            background: rgba(0, 0, 0, 0.4); /* Transparansi hitam */
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px); /* Efek blur latar belakang */
        }

        .container .row .col-lg-4 {
            display: flex;
            justify-content: center;
        }

        .card {
            position: relative;
            padding: 0;
            margin: 0 !important;
            border-radius: 20px;
            overflow: hidden;
            max-width: 280px;
            max-height: 340px;
            cursor: pointer;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);

        }

        .card .card-image {
            width: 100%;
            max-height: 340px;
        }

        .card .card-image img {
            width: 100%;
            max-height: 340px;
            object-fit: cover;
        }

        .card .card-content {
            position: absolute;
            bottom: -180px;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            min-height: 80px;
            width: 100%;
            transition: bottom .4s ease-in;
            box-shadow: 0 -10px 10px rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card:hover .card-content {
            bottom: 0px;
        }

        .card:hover .card-content h4,
        .card:hover .card-content h5 {
            transform: translateY(10px);
            opacity: 1;
        }

        .card .card-content h4,
        .card .card-content h5 {
            font-size: 1.1rem;
            text-transform: uppercase;
            text-align: center;
            transition: 0.8s;
            font-weight: 500;
            opacity: 0;
            transform: translateY(-40px);
            transition-delay: 0.2s;
            color: #fff;
        }

        .card .card-content h5 {
            transition: 0.5s;
            font-weight: 200;
            font-size: 0.8rem;
        }

        @media(max-width: 991.5px) {
        .container {
            margin-top: 20px;
        }

        .container .row .col-lg-4 {
            margin: 20px 0px;
        }
        }
        .draw-border {
        box-shadow: inset 0 0 0 4px #58cdd1;
        color: #58afd1;
        -webkit-transition: color 0.25s 0.0833333333s;
        transition: color 0.25s 0.0833333333s;
        position: relative;
        }

        .draw-border::before,
        .draw-border::after {
        border: 0 solid transparent;
        box-sizing: border-box;
        content: '';
        pointer-events: none;
        position: absolute;
        width: 0rem;
        height: 0;
        bottom: 0;
        right: 0;
        }

        .draw-border::before {
        border-bottom-width: 4px;
        border-left-width: 4px;
        }

        .draw-border::after {
        border-top-width: 4px;
        border-right-width: 4px;
        }

        .draw-border:hover {
        color: #ffe593;
        }

        .draw-border:hover::before,
        .draw-border:hover::after {
        border-color: #eb196e;
        -webkit-transition: border-color 0s, width 0.25s, height 0.25s;
        transition: border-color 0s, width 0.25s, height 0.25s;
        width: 100%;
        height: 100%;
        }

        .draw-border:hover::before {
        -webkit-transition-delay: 0s, 0s, 0.25s;
        transition-delay: 0s, 0s, 0.25s;
        }

        .draw-border:hover::after {
        -webkit-transition-delay: 0s, 0.25s, 0s;
        transition-delay: 0s, 0.25s, 0s;
        }

        .btn {
        background: none;
        border: none;
        cursor: pointer;
        line-height: 1.5;
        font: 700 1.2rem 'Roboto Slab', sans-serif;
        padding: 0.75em 2em;
        letter-spacing: 0.05rem;
        margin: 1em;
        width: 13rem;
        margin-left: 125px;
        }

        .btn:focus {
        outline: 2px dotted #55d7dc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card p-0">
                    <div class="card-image">
                        <img src="<?php echo $profile_picture; ?>" alt="Profile Picture">
                    </div>
                    <div class="card-content d-flex flex-column align-items-center">
                        <h4 class="pt-2"><?php echo $username; ?></h4>
                        <h5> <?php echo $email; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn draw-border" onclick="goToTopics()">Topik</button>
        <button class="btn draw-border" onclick="logout()">Logout</button>
    </div>

    <script>
        // Function to redirect to the topics page
        function goToTopics() {
            window.location.href = 'topics.php'; // Redirect to topics.php
        }
    </script>
    <script>
        // Function to redirect to the topics page
        function logout() {
            window.location.href = 'logout.php'; // Redirect to topics.php
        }
    </script>

</body>
</html>
