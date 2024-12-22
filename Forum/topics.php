<?php
// Memulai sesi dan memeriksa apakah pengguna sudah login
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Menambahkan topik baru jika form dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_topic'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    $image_path = null;

    // Proses pengunggahan gambar
    if (isset($_FILES['topic_image']) && $_FILES['topic_image']['error'] == 0) {
        $image_tmp_name = $_FILES['topic_image']['tmp_name'];
        $image_name = $_FILES['topic_image']['name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Verifikasi ekstensi file gambar
        if (in_array(strtolower($image_extension), $allowed_extensions)) {
            // Tentukan lokasi penyimpanan gambar
            $image_folder = 'uploads/';
            $image_new_name = uniqid() . '.' . $image_extension;
            $image_full_path = $image_folder . $image_new_name;

            // Pindahkan file gambar ke folder tujuan
            if (move_uploaded_file($image_tmp_name, $image_full_path)) {
                $image_path = $image_full_path; // Simpan path gambar
            }
        }
    }

    // Menyimpan topik baru ke database, termasuk path gambar jika ada
    $stmt = $pdo->prepare("INSERT INTO topics (user_id, title, content, photo, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$user_id, $title, $content, $image_path]);
}

// Menambahkan balasan jika form dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reply_content']) && isset($_POST['topic_id'])) {
    $content = $_POST['reply_content'];
    $topic_id = $_POST['topic_id'];
    $user_id = $_SESSION['user_id'];

    // Menyimpan balasan ke database
    $stmt = $pdo->prepare("INSERT INTO replies (user_id, topic_id, parent_reply_id, content, created_at) 
                                    VALUES (?, ?, NULL, ?, NOW())");
    $stmt->execute([$user_id, $topic_id, $content]);

    // Redirect kembali ke halaman topik setelah balasan berhasil ditambahkan
    header("Location: topics.php?id=$topic_id");
    exit;
}

// Mengedit balasan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_reply_id'])) {
    $edit_reply_id = $_POST['edit_reply_id'];
    $new_content = $_POST['edit_content'];

    // Update balasan
    $stmt = $pdo->prepare("UPDATE replies SET content = ? WHERE id = ?");
    $stmt->execute([$new_content, $edit_reply_id]);
}

// Menghapus balasan
if (isset($_GET['delete_reply_id'])) {
    $delete_reply_id = $_GET['delete_reply_id'];

    // Hapus balasan
    $stmt = $pdo->prepare("DELETE FROM replies WHERE id = ?");
    $stmt->execute([$delete_reply_id]);

    // Redirect kembali ke halaman topik
    header("Location: topics.php");
    exit;
}

// Menghapus topik jika ada parameter delete_topic_id
if (isset($_GET['delete_topic_id'])) {
    $delete_topic_id = $_GET['delete_topic_id'];

    // Mengambil path gambar terkait jika ada
    $stmt = $pdo->prepare("SELECT photo FROM topics WHERE id = ?");
    $stmt->execute([$delete_topic_id]);
    $topic = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika ada gambar, hapus file gambar
    if ($topic && $topic['photo']) {
        unlink($topic['photo']);
    }

    // Menghapus balasan yang terkait dengan topik
    $stmt = $pdo->prepare("DELETE FROM replies WHERE topic_id = ?");
    $stmt->execute([$delete_topic_id]);

    // Menghapus topik itu sendiri
    $stmt = $pdo->prepare("DELETE FROM topics WHERE id = ?");
    $stmt->execute([$delete_topic_id]);

    // Redirect ke halaman utama setelah penghapusan
    header("Location: topics.php");
    exit;
}

// Mengambil daftar topik beserta nama pengguna dari database
$stmt = $pdo->query("
    SELECT topics.*, users.username AS user_name, users.profile_picture AS profile_picture
    FROM topics
    JOIN users ON topics.user_id = users.id
    ORDER BY topics.created_at DESC
");
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Forum Komunitas - Topik</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        body {
            background: linear-gradient(to top, black, blue); /* Gradien horizontal */
        }
        .topic-image {
            width: 100%;
            align-items: center;
            height: 250px;
            position: relative;
        }
        button {
            background-color: #ff4d4f;  /* Warna latar belakang */
            color: white;  /* Warna teks */
            padding: 10px 20px;  /* Padding vertikal dan horizontal */
            border: none;  /* Menghilangkan border default */
            border-radius: 5px;  /* Menambahkan sudut melengkung */
            font-size: 16px;  /* Ukuran font */
            cursor: pointer;  /* Menampilkan kursor pointer saat hover */
            transition: background-color 0.3s ease;  /* Efek transisi pada perubahan warna */
        }

        /* Efek saat hover */
        button:hover {
            background-color: #d9363e;  /* Mengubah warna latar belakang saat hover */
        }

        .hapus-topik {
            margin-left: 130px;
        }
        .konten {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <header style="background: linear-gradient(to top, black, blue);">
            <img 
                class="img img-circle" 
                style="width: 70px; height:70px; margin-right: 360px;"
                src="img/ub.png" 
                alt="foto"
                >
                <h1 style="margin-top: -60px; ">Forum Komunitas</h1>
                <nav>
                    <a href="logout.php">Logout</a> |
                    <a href="profile.php">Profile</a>
                </nav>
            </header>
        <hr>

        <!-- Form untuk membuat topik baru -->
        <form method="POST" enctype="multipart/form-data" style="margin-top: 10px;">
        <h2>Tambahkan Topik</h2>
            <input type="hidden" name="new_topic" value="1">
            <label>Judul Topik:</label>
            <input type="text" maxlength="25" name="title" required>
            <label>Konten:</label>
            <textarea name="content" maxlength="100" required></textarea>
            <label>Foto:</label>
            <input type="file" name="topic_image" accept="image/*">
            <button type="submit">Buat Topik</button>
        </form>

        <!-- Menampilkan daftar topik dan nama pengguna yang membuat topik -->
        <h2>Topik Terkini</h2>
        <?php if (!empty($topics)): ?>
            <?php foreach ($topics as $topic): ?>
                <div class="topic">
                    <h3><?= htmlspecialchars($topic['title']) ?></h3>
                    <div class="user-info">
                        <img src="<?= htmlspecialchars($topic['profile_picture']) ?>" alt="Foto Profil" class="user-avatar">
                        <p><?= htmlspecialchars($topic['user_name']) ?></p>

                        <!-- Tombol Hapus Topik hanya untuk pengguna yang membuat topik -->
                        <?php if ($topic['user_id'] == $_SESSION['user_id']): ?>
                            <a href="topics.php?delete_topic_id=<?= $topic['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus topik ini?');">
                                <button class="hapus-topik">Hapus</button>
                            </a>
                        <?php endif; ?>
                    </div>
                    <p class="konten"><?= htmlspecialchars($topic['content']) ?></p>
                    <?php if ($topic['photo']): ?>
                        <div class="topic-image">
                            <img src="<?= htmlspecialchars($topic['photo']) ?>" alt="Gambar Topik" class="topic-image">
                        </div>
                    <?php endif; ?>
                    <small>Diposting pada: <?= htmlspecialchars($topic['created_at']) ?></small>


                    <!-- Menampilkan balasan untuk topik ini -->
                    <?php
                    // Mengambil balasan untuk topik ini dan nama pengguna yang membalas
                    $stmt = $pdo->prepare("
                        SELECT replies.*, users.username AS user_name, users.profile_picture AS profile_picture
                        FROM replies
                        JOIN users ON replies.user_id = users.id
                        WHERE replies.topic_id = ? AND replies.parent_reply_id IS NULL
                        ORDER BY replies.created_at ASC
                    ");
                    $stmt->execute([$topic['id']]);
                    $replies = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="replies">
                        <?php if (!empty($replies)): ?>
                            <h4>Balasan:</h4>
                            <?php foreach ($replies as $reply): ?>
                                <div class="reply">
                                    <div class="user-info">
                                        <img src="<?= htmlspecialchars($reply['profile_picture']) ?>" alt="Foto Profil" class="user-avatar">
                                        <p><strong><?= htmlspecialchars($reply['user_name']) ?>:</strong> <?= htmlspecialchars($reply['content']) ?></p>
                                    </div>
                                    <small>Diposting pada: <?= htmlspecialchars($reply['created_at']) ?></small>
                                
                                    <!-- Tombol Edit dan Hapus hanya untuk balasan yang dibuat oleh pengguna yang sedang login -->
                                    <?php if ($reply['user_id'] == $_SESSION['user_id']): ?>
                                        <!-- Edit Balasan -->
                                        <form method="POST">
                                            <input type="hidden" name="edit_reply_id" value="<?= $reply['id'] ?>">
                                            <textarea name="edit_content" required><?= htmlspecialchars($reply['content']) ?></textarea>
                                            <button type="submit">Edit</button>
                                        </form>

                                        <!-- Hapus Balasan -->
                                        <a href="topics.php?delete_reply_id=<?= $reply['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus balasan ini?');">
                                            <button>Hapus</button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <!-- Form untuk menambah balasan -->
                        <form method="POST">
                            <input type="hidden" name="topic_id" value="<?= $topic['id'] ?>">
                            <textarea name="reply_content" required placeholder="Tulis balasan Anda..."></textarea>
                            <button type="submit">Balas</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
