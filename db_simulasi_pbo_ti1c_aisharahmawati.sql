-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 02:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1c_aisharahmawati`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMKN 2 Bandung', '78.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMAN 3 Yogyakarta', '92.25', '250000.00', 'Reguler', 'Kedokteran', 'Kampus Kota', NULL, NULL, NULL, NULL),
(4, 'Dedi Dermawan', 'SMAN 1 Surabaya', '80.00', '250000.00', 'Reguler', 'Teknik Sipil', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 5 Semarang', '88.75', '250000.00', 'Reguler', 'Akuntansi', 'Kampus Kota', NULL, NULL, NULL, NULL),
(6, 'Fajar Sidik', 'SMKN 1 Malang', '79.50', '250000.00', 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Gutawa', 'SMA Kristen Petra', '95.00', '250000.00', 'Reguler', 'Farmasi', 'Kampus Kota', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 1 Medan', '88.00', '150000.00', 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMAN 2 Padang', '86.50', '150000.00', 'Prestasi', 'Ilmu Komunikasi', 'Kampus Kota', 'Debat Bahasa Inggris', 'Provinsi', NULL, NULL),
(10, 'Joko Widodo', 'SMAN 4 Surakarta', '89.00', '150000.00', 'Prestasi', 'Hukum', 'Kampus Utama', 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
(11, 'Kartika Sari', 'SMAN 1 Denpasar', '91.00', '150000.00', 'Prestasi', 'Arsitektur', 'Kampus Utama', 'Futsal', 'Provinsi', NULL, NULL),
(12, 'Luthfi Hasan', 'MAN 1 Makassar', '87.20', '150000.00', 'Prestasi', 'Sistem Informasi', 'Kampus Utama', 'Tahfidz Al-Quran', 'Nasional', NULL, NULL),
(13, 'Mega Utami', 'SMAN 3 Balikpapan', '84.50', '150000.00', 'Prestasi', 'Psikologi', 'Kampus Kota', 'Penyanyi Solo', 'Kabupaten', NULL, NULL),
(14, 'Naufal Abdi', 'SMAN 8 Jakarta', '93.00', '150000.00', 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Olimpiade Fisika', 'Internasional', NULL, NULL),
(15, 'Oki Setiana', 'SMAN 1 Palembang', '82.00', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-990/IK/2026', 'Kementerian Perhubungan'),
(16, 'Putra Pratama', 'SMKN 1 Purwokerto', '85.00', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-112/IK/2026', 'Badan Siber dan Sandi Negara'),
(17, 'Qori Sandioriva', 'SMAN 2 Bogor', '80.50', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-404/IK/2026', 'Kementerian Dalam Negeri'),
(18, 'Rian Perdana', 'SMAN 1 Pontianak', '87.80', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-756/IK/2026', 'Badan Pusat Statistik'),
(19, 'Siti Nurhaliza', 'SMAN 1 Banjarmasin', '89.10', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-202/IK/2026', 'Kementerian Keuangan'),
(20, 'Taufik Hidayat', 'SMAN 1 Cirebon', '83.40', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-883/IK/2026', 'Kementerian Intelijen Negara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
