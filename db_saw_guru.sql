-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2026 at 05:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_02_04_083225_create_admin__models_table', 1),
(5, '2021_02_05_014359_create_guru__models_table', 2),
(6, '2021_02_05_022635_create_sekolah__models_table', 3),
(8, '2021_02_05_082018_create_kriteria__models_table', 4),
(9, '2021_02_06_023932_create_kriteria__penilaian__models_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_notelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_notelp`, `admin_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$fYM.8LZ/fQhA.5hBAwUVBe2rgmmf.0rAkUiTL5kEEVYRvk7GfiPRW', '0238423742', 'admin', NULL, NULL, NULL),
(4, 'superadmin', 'superadmin@gmail.com', '$2y$10$aQcLh8RMYmkDjxRK4IonQOu5x85ILBUmLS..3I0m6YE7JTRmJ7KxC', '082313', 'Superadmin', '2021-04-28 21:50:33', '2021-04-28 21:51:55', NULL),
(5, 'Matthew Horn', 'juri1@gmail.com', '$2y$10$C20dhOcRE00rQWKQ1VeFguvM5.Jqssv4kYUcrGhHg26ixQlyzyh02', '23123', 'Juri', '2021-04-28 21:52:23', '2021-04-28 21:52:23', NULL),
(6, 'Alfonso Anthony', 'juri2@gmail.com', '$2y$10$8JKtJ/airXtBhRePCay94ujvKs8arK5A4yHIQAdClIENx2uCPmTIK', '123132', 'Juri', '2021-04-29 19:14:09', '2021-04-29 19:14:09', NULL),
(7, 'Gareth Mullen1', 'juri3@gmail.com', '$2y$10$hnNR.cWmZiZbNvKIpOrZlOB5RPfCSYFZKqV735lYRjER.SC32yUrS', '08898078', 'Juri', '2021-05-03 01:14:25', '2021-05-03 01:14:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `guru_nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_tgl_lahir` date NOT NULL,
  `guru_jekel` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_notelp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`guru_id`, `sekolah_id`, `guru_nip`, `guru_nama`, `guru_tgl_lahir`, `guru_jekel`, `guru_email`, `guru_notelp`, `guru_alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1', 'Ailen Rossa Nanda, M.Pd', '1991-02-19', 'Wanita', 'ailen@gmail.com', '0812345678', '<p>Tilkam</p>', '2021-02-04 21:05:09', '2021-02-04 21:05:09', NULL),
(2, 2, '2', 'Debby Yola Cristy, S.Si', '1992-05-25', 'Wanita', 'debby@gmail.com', '08342323888', '<p>padang</p>', '2021-02-04 21:09:08', '2021-02-04 21:09:08', NULL),
(3, 3, '3', 'Elkhiyami, S.Pd, M.Si', '1990-07-07', 'Pria', 'elkhi@gmail.com', '085467845', '<p>padang</p>', '2021-02-04 21:10:01', '2021-02-04 21:10:01', NULL),
(4, 4, '4', 'Efi Yanti, S.Pd', '1988-11-09', 'Wanita', 'efi@gmail.com', '0823123123', '<p>padang</p>', '2021-02-04 21:16:05', '2021-02-04 21:16:05', NULL),
(5, 5, '5', 'Gusni Delfi, S.Pd', '1987-12-16', 'Wanita', 'gusni@gmail.com', '08234234234', '<p>padang</p>', '2021-02-04 21:18:06', '2021-02-04 21:18:06', NULL),
(6, 6, '6', 'Nursyamsi, S.Pd', '1978-12-12', 'Wanita', 'nursyamsi@gmail.com', '08123467865', '<p>padang</p>', '2021-02-04 21:19:28', '2021-02-04 21:19:28', NULL),
(7, 7, '7', 'Rita Susanti, S.Pd, M.Pd', '1988-05-08', 'Wanita', 'rita@gmail.com', '081456765574', '<p>padang</p>', '2021-02-04 21:20:50', '2021-02-04 21:20:50', NULL),
(8, 8, '8', 'Susi Mustika, S.Pd', '1978-01-01', 'Wanita', 'susi@gmail.com', '0853536567', '<p>padang</p>', '2021-02-04 21:22:28', '2021-02-04 21:22:28', NULL),
(9, 9, '9', 'Yelisda B NST', '1975-06-06', 'Pria', 'yelisda@gmail.com', '08543235678', '<p>padang</p>', '2021-02-04 21:24:04', '2021-02-04 21:24:04', NULL),
(13, 2, '13', 'Incididunt lorem dol', '2013-08-20', 'Wanita', 'gaqopew@mailinator.com', '34345', '<p>sdf</p>', '2021-04-28 20:21:46', '2021-04-28 20:21:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria_bobot` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kriteria_id`, `kriteria_nama`, `kriteria_bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Portofolio', 0.25, '2021-02-05 03:08:55', '2021-02-05 03:10:58', NULL),
(2, 'Presentasi Best Practice', 0.25, '2021-02-05 03:09:27', '2021-02-05 03:09:27', NULL),
(3, 'Wawancara', 0.25, '2021-02-05 03:09:50', '2021-02-05 03:09:50', NULL),
(4, 'Tes Tertulis', 0.25, '2021-02-05 03:10:09', '2021-02-05 03:10:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `penilaian_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `penilaian_portofolio` int(11) NOT NULL,
  `penilaian_presentasi` int(11) NOT NULL,
  `penilaian_wawancara` int(11) NOT NULL,
  `penilaian_tes_tulis` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`penilaian_id`, `guru_id`, `penilaian_portofolio`, `penilaian_presentasi`, `penilaian_wawancara`, `penilaian_tes_tulis`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 80, 80, 75, 51, '2021-02-05 21:31:14', '2021-02-05 21:31:14', NULL),
(2, 2, 72, 70, 70, 51, '2021-02-05 21:31:55', '2021-04-28 20:19:57', NULL),
(3, 3, 80, 70, 70, 45, '2021-02-05 21:32:19', '2021-04-28 20:13:17', NULL),
(4, 4, 70, 75, 70, 46, '2021-02-05 21:33:09', '2021-02-05 21:49:48', NULL),
(5, 5, 70, 70, 75, 58, '2021-02-05 21:33:47', '2021-02-05 21:33:47', NULL),
(7, 7, 70, 70, 65, 51, '2021-02-05 21:34:57', '2021-02-05 21:34:57', NULL),
(8, 8, 75, 75, 70, 46, '2021-02-05 21:35:45', '2021-04-28 20:19:36', NULL),
(11, 6, 87, 76, 67, 89, '2021-04-28 20:06:57', '2021-04-28 20:13:47', NULL),
(12, 9, 50, 56, 76, 34, '2021-04-28 20:08:47', '2021-04-28 20:13:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `sekolah_id` bigint(20) UNSIGNED NOT NULL,
  `sekolah_npsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekolah_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`sekolah_id`, `sekolah_npsn`, `sekolah_nama`, `sekolah_alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '123456', 'SMAN 2 TILKAM', '<p>TILKAM</p>', '2021-02-04 20:06:46', '2021-04-28 19:15:05', NULL),
(2, '123457', 'SMAS ISLAM CENDIKIA', '<p>CENDIKIA</p>', '2021-02-04 20:07:27', '2021-02-04 20:07:27', NULL),
(3, '123458', 'SMAN 2 PARIAMAN', '<p>PARIAMAN</p>', '2021-02-04 20:08:00', '2021-02-04 20:08:00', NULL),
(4, '123459', 'SMAN 1 TILKAM', '<p>TILKAM</p>', '2021-02-04 20:08:41', '2021-02-04 20:08:41', NULL),
(5, '1234510', 'SMAN 1 MATUR', '<p>MATUR</p>', '2021-02-04 20:09:36', '2021-02-04 20:09:36', NULL),
(6, '1234511', 'SMAN 1 TUJUH KOTO', '<p>TUJUH KOTO</p>', '2021-02-04 20:10:34', '2021-02-04 20:10:34', NULL),
(7, '1234512', 'SMAN 1 TJ RAYA', '<p>TJ RAYA</p>', '2021-02-04 20:11:17', '2021-02-04 20:11:17', NULL),
(8, '1234513', 'SMAN 5 PARIAMAN', '<p>PARIAMAN</p>', '2021-02-04 20:11:46', '2021-02-04 20:11:46', NULL),
(9, '1234514', 'SMAN 2 GN. TULEH', '<p>GN. TULEH</p>', '2021-02-04 20:12:27', '2021-02-04 20:12:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`sekolah_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `guru_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `kriteria_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `penilaian_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `sekolah_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
