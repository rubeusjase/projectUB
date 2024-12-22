-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2024 pada 14.47
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frontend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel2`
--

CREATE TABLE `artikel2` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel2`
--

INSERT INTO `artikel2` (`id`, `judul`, `deskripsi`, `dibuat_pada`, `foto`) VALUES
(5, 'Kesehatan Mental Pada Remaja', 'Kesehatan mental pada remaja adalah aspek penting dalam perkembangan psikologis dan emosional mereka. Pada masa remaja, individu mengalami berbagai perubahan fisik, emosional, dan sosial yang dapat mempengaruhi kondisi mental mereka. Perhatian terhadap kesehatan mental remaja sangat diperlukan karena mereka rentan mengalami berbagai tantangan yang dapat memengaruhi kesejahteraan psikologis mereka.', '2024-11-20 05:29:33', 'pngtree-system-error-red-screen-alert-image_934143.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel3`
--

CREATE TABLE `artikel3` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel3`
--

INSERT INTO `artikel3` (`id`, `judul`, `deskripsi`, `dibuat_pada`, `foto`) VALUES
(5, 'Kesehatan mental Usia Dini', 'Kesehatan mental pada usia dini adalah fondasi penting untuk perkembangan emosional, sosial, dan kognitif anak. Usia dini, terutama dari lahir hingga sekitar 6 tahun, adalah masa kritis dalam pembentukan otak, kepribadian, dan hubungan sosial. Perhatian terhadap kesehatan mental anak pada tahap ini membantu mencegah gangguan psikologis di masa depan serta mendukung tumbuh kembang yang optimal.', '2024-11-20 05:38:19', 'Screenshot 2024-03-30 090542.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `judul`, `deskripsi`, `foto`) VALUES
(50, 'Kesehatan mental', 'Kesehatan mental merujuk pada kesejahteraan psikologis dan emosional seseorang. Ini mencakup cara kita berpikir, merasa, berperilaku, dan berinteraksi dengan orang lain. Kesehatan mental yang baik memungkinkan individu untuk mengelola stres, menjalani kehidupan sehari-hari dengan produktif, dan berfungsi dengan baik dalam masyarakat.', 'artikel1.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `specialist` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT 'noimage.png',
  `tanggal_dibuat` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `specialist`, `deskripsi`, `foto`, `tanggal_dibuat`) VALUES
(72, 'Gilang Dwi Hermawan', 'Gigi', 'Dokter Gigi', 'Logo.png', '2024-11-20 01:45:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `judul`, `deskripsi`, `created_at`) VALUES
(3, 'Why Choose Mind Care Hub ?', 'MindCareHub adalah sebuah layanan atau platform yang berfokus pada kesehatan mental, di mana pengguna dapat mengakses berbagai sumber daya seperti konseling, terapi, atau informasi tentang menjaga kesehatan mental.', '2024-11-18 15:04:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `jam_operasional` varchar(100) NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `alamat`, `email`, `nomor_telepon`, `jam_operasional`, `dibuat_pada`) VALUES
(2, 'Malang', 'mindcarehub@example.com', '087654321967', 'senin - selasa jam 9 pagi - 9 malam', '2024-11-19 10:07:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan1`
--

CREATE TABLE `pertanyaan1` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan1`
--

INSERT INTO `pertanyaan1` (`id`, `pertanyaan`, `jawaban`, `deskripsi`, `tanggal_dibuat`) VALUES
(19, 'Mengapa kesehatan mental penting?', 'Kesehatan mental sangat penting karena memengaruhi cara kita berpikir, merasakan, dan bertindak. Ini juga berpengaruh pada hubungan sosial, pekerjaan, dan cara kita mengatasi tantangan hidup. Kesehatan mental yang baik dapat membantu kita untuk lebih resilien, sementara gangguan kesehatan mental dapat mengganggu kualitas hidup.', 'Kesehatan mental merujuk pada kondisi psikologis dan emosional seseorang. Ini mencakup cara kita berpikir, merasa, berinteraksi dengan orang lain, dan menangani stres serta tantangan hidup sehari-hari. Kesehatan mental yang baik memungkinkan seseorang untuk menjalani kehidupan yang produktif dan berfungsi dengan baik dalam masyarakat.', '2024-11-18 15:19:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan2`
--

CREATE TABLE `pertanyaan2` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan2`
--

INSERT INTO `pertanyaan2` (`id`, `pertanyaan`, `jawaban`, `tanggal_dibuat`) VALUES
(5, 'Apa saja tanda-tanda seseorang mengalami gangguan kesehatan mental?', 'Beberapa tanda gangguan kesehatan mental meliputi perasaan cemas atau tertekan yang berlebihan, kesulitan tidur, perubahan drastis dalam pola makan, perasaan putus asa, kehilangan minat pada aktivitas yang biasanya menyenankan, atau menarik diri dari interaksi sosial. Tanda lainnya termasuk perubahan suasana hati yang ekstrem atau perilaku yang merusak diri sendiri.', '2024-11-18 15:20:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan3`
--

CREATE TABLE `pertanyaan3` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan3`
--

INSERT INTO `pertanyaan3` (`id`, `pertanyaan`, `jawaban`, `tanggal_dibuat`) VALUES
(3, 'Apakah gangguan kesehatan mental dapat disembuhkan?', 'Banyak gangguan kesehatan mental dapat dikelola dengan bantuan profesional, seperti psikoterapi, konseling, atau pengobatan. Dengan dukungan yang tepat, individu yang mengalami gangguan kesehatan mental bisa merasa lebih baik dan memiliki kualitas hidup yang lebih baik.', '2024-11-18 15:21:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `fullname`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123', 'admin@gmail.com', '2024-11-20 09:06:08', '2024-11-20 09:06:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel2`
--
ALTER TABLE `artikel2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel3`
--
ALTER TABLE `artikel3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan1`
--
ALTER TABLE `pertanyaan1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan2`
--
ALTER TABLE `pertanyaan2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan3`
--
ALTER TABLE `pertanyaan3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel2`
--
ALTER TABLE `artikel2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `artikel3`
--
ALTER TABLE `artikel3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan1`
--
ALTER TABLE `pertanyaan1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan2`
--
ALTER TABLE `pertanyaan2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan3`
--
ALTER TABLE `pertanyaan3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
