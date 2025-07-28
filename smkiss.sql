-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2022 pada 08.07
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bansos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktual`
--

CREATE TABLE `aktual` (
  `id` int(11) NOT NULL,
  `warga_id` int(11) UNSIGNED NOT NULL,
  `penilaian_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktual`
--

INSERT INTO `aktual` (`id`, `warga_id`, `penilaian_id`, `created_at`, `updated_at`) VALUES
(1, 63, 1, NULL, NULL),
(2, 87, 1, NULL, NULL),
(3, 99, 1, NULL, NULL),
(4, 25, 1, NULL, NULL),
(5, 97, 1, NULL, NULL),
(6, 103, 1, NULL, NULL),
(7, 53, 1, NULL, NULL),
(8, 15, 1, NULL, NULL),
(9, 22, 1, NULL, NULL),
(10, 4, 1, NULL, NULL),
(11, 60, 1, NULL, NULL),
(12, 26, 1, NULL, NULL),
(13, 32, 1, NULL, NULL),
(14, 50, 1, NULL, NULL),
(15, 21, 1, NULL, NULL),
(16, 69, 1, NULL, NULL),
(17, 8, 1, NULL, NULL),
(18, 1, 1, NULL, NULL),
(19, 84, 1, NULL, NULL),
(20, 58, 1, NULL, NULL),
(21, 3, 1, NULL, NULL),
(22, 33, 1, NULL, NULL),
(23, 47, 1, NULL, NULL),
(24, 74, 1, NULL, NULL),
(25, 101, 1, NULL, NULL),
(26, 75, 1, NULL, NULL),
(27, 94, 1, NULL, NULL),
(28, 85, 1, NULL, NULL),
(29, 102, 1, NULL, NULL),
(30, 6, 1, NULL, NULL),
(31, 56, 1, NULL, NULL),
(32, 10, 1, NULL, NULL),
(33, 67, 1, NULL, NULL),
(34, 105, 1, NULL, NULL),
(35, 23, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id` int(10) UNSIGNED NOT NULL,
  `cr_hasil` double NOT NULL,
  `penilaian_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id`, `cr_hasil`, `penilaian_id`, `created_at`, `updated_at`) VALUES
(1, 0.054, 1, '2022-06-13 18:10:54', '2022-06-13 18:10:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_detail`
--

CREATE TABLE `hasil_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `warga_id` int(10) UNSIGNED NOT NULL,
  `rank_hasil` int(11) NOT NULL,
  `bobot_hasil` double NOT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `hasil_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_detail`
--

INSERT INTO `hasil_detail` (`id`, `warga_id`, `rank_hasil`, `bobot_hasil`, `status`, `hasil_id`, `created_at`, `updated_at`) VALUES
(1, 63, 1, 4.298, '1', 1, NULL, '2022-06-14 01:11:56'),
(2, 87, 2, 4.158, '1', 1, NULL, '2022-06-14 01:11:56'),
(3, 99, 3, 4.07, '1', 1, NULL, '2022-06-14 01:11:56'),
(4, 25, 4, 3.842, '1', 1, NULL, '2022-06-14 01:11:56'),
(5, 97, 5, 3.744, '1', 1, NULL, '2022-06-14 01:11:56'),
(6, 103, 6, 3.716, '1', 1, NULL, '2022-06-14 01:11:56'),
(7, 53, 7, 3.702, '1', 1, NULL, '2022-06-14 01:11:56'),
(8, 15, 8, 3.628, '1', 1, NULL, '2022-06-14 01:11:56'),
(9, 22, 9, 3.53, '1', 1, NULL, '2022-06-14 01:11:56'),
(10, 4, 10, 3.442, '1', 1, NULL, '2022-06-14 01:11:56'),
(11, 60, 11, 3.442, '1', 1, NULL, '2022-06-14 01:11:56'),
(12, 26, 12, 3.376, '1', 1, NULL, '2022-06-14 01:11:56'),
(13, 32, 13, 3.302, '1', 1, NULL, '2022-06-14 01:11:56'),
(14, 18, 14, 3.288, '1', 1, NULL, '2022-06-14 01:11:56'),
(15, 21, 15, 3.274, '1', 1, NULL, '2022-06-14 01:11:56'),
(16, 69, 16, 3.274, '1', 1, NULL, '2022-06-14 01:11:56'),
(17, 8, 17, 3.228, '1', 1, NULL, '2022-06-14 01:11:56'),
(18, 1, 18, 3.214, '1', 1, NULL, '2022-06-14 01:11:56'),
(19, 84, 19, 3.186, '1', 1, NULL, '2022-06-14 01:11:56'),
(20, 11, 20, 3.154, '1', 1, NULL, '2022-06-14 01:11:56'),
(21, 23, 21, 3.074, '1', 1, NULL, '2022-06-14 01:11:56'),
(22, 33, 22, 3.06, '1', 1, NULL, '2022-06-14 01:11:56'),
(23, 34, 23, 3, '1', 1, NULL, '2022-06-14 01:11:56'),
(24, 74, 24, 3, '1', 1, NULL, '2022-06-14 01:11:56'),
(25, 101, 25, 3, '1', 1, NULL, '2022-06-14 01:11:56'),
(26, 75, 26, 2.986, '1', 1, NULL, '2022-06-14 01:11:56'),
(27, 94, 27, 2.986, '1', 1, NULL, '2022-06-14 01:11:56'),
(28, 58, 28, 2.972, '1', 1, NULL, '2022-06-14 01:11:56'),
(29, 102, 29, 2.948, '1', 1, NULL, '2022-06-14 01:11:56'),
(30, 6, 30, 2.94, '1', 1, NULL, '2022-06-14 01:11:56'),
(31, 56, 31, 2.898, '1', 1, NULL, '2022-06-14 01:11:56'),
(32, 70, 32, 2.898, '1', 1, NULL, '2022-06-14 01:11:56'),
(33, 67, 33, 2.814, '1', 1, NULL, '2022-06-14 01:11:56'),
(34, 88, 34, 2.814, '1', 1, NULL, '2022-06-14 01:11:56'),
(35, 95, 35, 2.814, '1', 1, NULL, '2022-06-14 01:11:56'),
(36, 27, 36, 2.786, '0', 1, NULL, '2022-06-14 01:11:56'),
(37, 57, 37, 2.772, '0', 1, NULL, '2022-06-14 01:11:56'),
(38, 85, 38, 2.772, '0', 1, NULL, '2022-06-14 01:11:56'),
(39, 76, 39, 2.712, '0', 1, NULL, '2022-06-14 01:11:56'),
(40, 93, 40, 2.684, '0', 1, NULL, '2022-06-14 01:11:56'),
(41, 30, 41, 2.66, '0', 1, NULL, '2022-06-14 01:11:56'),
(42, 62, 42, 2.6, '0', 1, NULL, '2022-06-14 01:11:56'),
(43, 96, 43, 2.6, '0', 1, NULL, '2022-06-14 01:11:56'),
(44, 36, 44, 2.586, '0', 1, NULL, '2022-06-14 01:11:56'),
(45, 61, 45, 2.558, '0', 1, NULL, '2022-06-14 01:11:56'),
(46, 7, 46, 2.506, '0', 1, NULL, '2022-06-14 01:11:56'),
(47, 13, 47, 2.498, '0', 1, NULL, '2022-06-14 01:11:56'),
(48, 41, 48, 2.498, '0', 1, NULL, '2022-06-14 01:11:56'),
(49, 35, 49, 2.432, '0', 1, NULL, '2022-06-14 01:11:56'),
(50, 20, 50, 2.372, '0', 1, NULL, '2022-06-14 01:11:56'),
(51, 43, 51, 2.344, '0', 1, NULL, '2022-06-14 01:11:56'),
(52, 47, 52, 2.344, '0', 1, NULL, '2022-06-14 01:11:56'),
(53, 77, 53, 2.344, '0', 1, NULL, '2022-06-14 01:11:56'),
(54, 59, 54, 2.312, '0', 1, NULL, '2022-06-14 01:11:56'),
(55, 86, 55, 2.312, '0', 1, NULL, '2022-06-14 01:11:56'),
(56, 83, 56, 2.284, '0', 1, NULL, '2022-06-14 01:11:56'),
(57, 91, 57, 2.284, '0', 1, NULL, '2022-06-14 01:11:56'),
(58, 104, 58, 2.284, '0', 1, NULL, '2022-06-14 01:11:56'),
(59, 100, 59, 2.27, '0', 1, NULL, '2022-06-14 01:11:57'),
(60, 39, 60, 2.218, '0', 1, NULL, '2022-06-14 01:11:57'),
(61, 72, 61, 2.158, '0', 1, NULL, '2022-06-14 01:11:57'),
(62, 92, 62, 2.158, '0', 1, NULL, '2022-06-14 01:11:57'),
(63, 24, 63, 2.144, '0', 1, NULL, '2022-06-14 01:11:57'),
(64, 54, 64, 2.144, '0', 1, NULL, '2022-06-14 01:11:57'),
(65, 2, 65, 2.13, '0', 1, NULL, '2022-06-14 01:11:57'),
(66, 52, 66, 2.056, '0', 1, NULL, '2022-06-14 01:11:57'),
(67, 82, 67, 2.056, '0', 1, NULL, '2022-06-14 01:11:57'),
(68, 38, 68, 2.004, '0', 1, NULL, '2022-06-14 01:11:57'),
(69, 80, 69, 2.004, '0', 1, NULL, '2022-06-14 01:11:57'),
(70, 10, 70, 1.944, '0', 1, NULL, '2022-06-14 01:11:57'),
(71, 42, 71, 1.944, '0', 1, NULL, '2022-06-14 01:11:57'),
(72, 5, 72, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(73, 12, 73, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(74, 50, 74, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(75, 51, 75, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(76, 64, 76, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(77, 65, 77, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(78, 71, 78, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(79, 73, 79, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(80, 105, 80, 1.93, '0', 1, NULL, '2022-06-14 01:11:57'),
(81, 17, 81, 1.87, '0', 1, NULL, '2022-06-14 01:11:57'),
(82, 40, 82, 1.87, '0', 1, NULL, '2022-06-14 01:11:57'),
(83, 31, 83, 1.842, '0', 1, NULL, '2022-06-14 01:11:57'),
(84, 16, 84, 1.716, '0', 1, NULL, '2022-06-14 01:11:57'),
(85, 44, 85, 1.716, '0', 1, NULL, '2022-06-14 01:11:57'),
(86, 45, 86, 1.716, '0', 1, NULL, '2022-06-14 01:11:57'),
(87, 46, 87, 1.716, '0', 1, NULL, '2022-06-14 01:11:57'),
(88, 49, 88, 1.716, '0', 1, NULL, '2022-06-14 01:11:57'),
(89, 81, 89, 1.716, '0', 1, NULL, '2022-06-14 01:11:57'),
(90, 89, 90, 1.716, '0', 1, NULL, '2022-06-14 01:11:57'),
(91, 19, 91, 1.656, '0', 1, NULL, '2022-06-14 01:11:57'),
(92, 55, 92, 1.642, '0', 1, NULL, '2022-06-14 01:11:57'),
(93, 78, 93, 1.642, '0', 1, NULL, '2022-06-14 01:11:57'),
(94, 29, 94, 1.502, '0', 1, NULL, '2022-06-14 01:11:57'),
(95, 37, 95, 1.502, '0', 1, NULL, '2022-06-14 01:11:57'),
(96, 48, 96, 1.502, '0', 1, NULL, '2022-06-14 01:11:57'),
(97, 79, 97, 1.502, '0', 1, NULL, '2022-06-14 01:11:57'),
(98, 14, 98, 1.428, '0', 1, NULL, '2022-06-14 01:11:57'),
(99, 66, 99, 1.428, '0', 1, NULL, '2022-06-14 01:11:57'),
(100, 90, 100, 1.428, '0', 1, NULL, '2022-06-14 01:11:57'),
(101, 98, 101, 1.428, '0', 1, NULL, '2022-06-14 01:11:57'),
(102, 3, 102, 1.214, '0', 1, NULL, '2022-06-14 01:11:57'),
(103, 68, 103, 1.214, '0', 1, NULL, '2022-06-14 01:11:57'),
(104, 9, 104, 1, '0', 1, NULL, '2022-06-14 01:11:57'),
(105, 28, 105, 1, '0', 1, NULL, '2022-06-14 01:11:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_aplikasi` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_konfigurasi` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama_aplikasi`, `keterangan`, `gambar_konfigurasi`, `created_by`, `facebook`, `instagram`, `youtube`, `email`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'Aplikasi Bansos', 'sistem pendukung keputusan penerima bansos fuzzy ahp', '1637120516-logo.png', 'Bima Ega', 'https://www.facebook.com/bimaega15', 'https://www.instagram.com/bimaega/', 'https://www.youtube.com/channel/UCBWfqsZQ85gIWevF9guEEyg', 'bimaega15@gmail.com', 'Medan, sumut', '082277506232', '2021-10-01 23:20:46', '2021-11-16 20:41:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_kriteria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode_kriteria`, `nama_kriteria`, `created_at`, `updated_at`) VALUES
(1, 'K001', 'pernikahan', NULL, NULL),
(2, 'K002', 'pekerjaan', NULL, NULL),
(3, 'K003', 'tanggungan keluarga', NULL, NULL),
(4, 'K004', 'umur', NULL, NULL),
(5, 'K005', 'pendidikan terakhir', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `aktivitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `users_id`, `aktivitas`, `created_at`, `updated_at`) VALUES
(1, 1, 'Berhasil login', NULL, NULL),
(2, 1, 'Berhasil login', NULL, NULL),
(3, 1, 'Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = 1', NULL, NULL),
(4, 1, 'Berhasil menambahkan data pengumuman dengan id = 1', NULL, NULL),
(5, 1, 'Berhasil logout', NULL, NULL),
(6, 1, 'Berhasil login', NULL, NULL),
(7, 1, 'Berhasil login', NULL, NULL),
(8, 1, 'Berhasil menambahkan data sub kriteria dengan id = 1', NULL, NULL),
(9, 1, 'Berhasil menambahkan data sub kriteria dengan id = 2', NULL, NULL),
(10, 1, 'Berhasil menambahkan data sub kriteria dengan id = 3', NULL, NULL),
(11, 1, 'Berhasil menambahkan data sub kriteria dengan id = 4', NULL, NULL),
(12, 1, 'Berhasil menambahkan data sub kriteria dengan id = 5', NULL, NULL),
(13, 1, 'Berhasil menghapus data sub kriteria dengan id = 6', NULL, NULL),
(14, 1, 'Berhasil menghapus data sub kriteria dengan id = 7', NULL, NULL),
(15, 1, 'Berhasil menghapus data sub kriteria dengan id = 8', NULL, NULL),
(16, 1, 'Berhasil menghapus data sub kriteria dengan id = 9', NULL, NULL),
(17, 1, 'Berhasil menghapus data sub kriteria dengan id = 10', NULL, NULL),
(18, 1, 'Berhasil menambahkan data sub kriteria dengan id = 1', NULL, NULL),
(19, 1, 'Berhasil menambahkan data sub kriteria dengan id = 2', NULL, NULL),
(20, 1, 'Berhasil menambahkan data sub kriteria dengan id = 3', NULL, NULL),
(21, 1, 'Berhasil menambahkan data sub kriteria dengan id = 5', NULL, NULL),
(22, 1, 'Berhasil menghapus data sub kriteria dengan id = 15', NULL, NULL),
(23, 1, 'Berhasil menambahkan data sub kriteria dengan id = 16', NULL, NULL),
(24, 1, 'Berhasil menambahkan data sub kriteria dengan id = 17', NULL, NULL),
(25, 1, 'Berhasil menambahkan data sub kriteria dengan id = 18', NULL, NULL),
(26, 1, 'Berhasil menambahkan data sub kriteria dengan id = 19', NULL, NULL),
(27, 1, 'Berhasil menambahkan data sub kriteria dengan id = 20', NULL, NULL),
(28, 1, 'Berhasil menambahkan data sub kriteria dengan id = 21', NULL, NULL),
(29, 1, 'Berhasil menambahkan data sub kriteria dengan id = 22', NULL, NULL),
(30, 1, 'Berhasil menambahkan data sub kriteria dengan id = 33', NULL, NULL),
(31, 1, 'Berhasil menghapus data sub kriteria dengan id = 23', NULL, NULL),
(32, 1, 'Berhasil menghapus data sub kriteria dengan id = 24', NULL, NULL),
(33, 1, 'Berhasil menghapus data sub kriteria dengan id = 25', NULL, NULL),
(34, 1, 'Berhasil menghapus data sub kriteria dengan id = 26', NULL, NULL),
(35, 1, 'Berhasil menghapus data sub kriteria dengan id = 27', NULL, NULL),
(36, 1, 'Berhasil menghapus data sub kriteria dengan id = 28', NULL, NULL),
(37, 1, 'Berhasil menambahkan data sub kriteria dengan id = 29', NULL, NULL),
(38, 1, 'Berhasil menambahkan data sub kriteria dengan id = 30', NULL, NULL),
(39, 1, 'Berhasil menambahkan data sub kriteria dengan id = 31', NULL, NULL),
(40, 1, 'Berhasil menambahkan data sub kriteria dengan id = 32', NULL, NULL),
(41, 1, 'Berhasil menambahkan data sub kriteria dengan id = 32', NULL, NULL),
(42, 1, 'Berhasil menambahkan data sub kriteria dengan id = 19', NULL, NULL),
(43, 1, 'Berhasil menghapus data kriteria dengan id = 1', NULL, NULL),
(44, 1, 'Berhasil menghapus data kriteria dengan id = 2', NULL, NULL),
(45, 1, 'Berhasil menghapus data kriteria dengan id = 3', NULL, NULL),
(46, 1, 'Berhasil menghapus data kriteria dengan id = 4', NULL, NULL),
(47, 1, 'Berhasil menghapus data kriteria dengan id = 5', NULL, NULL),
(48, 1, 'Berhasil menambahkan data kriteria dengan id = 6', NULL, NULL),
(49, 1, 'Berhasil mengubah data kriteria dengan id = 6', NULL, NULL),
(50, 1, 'Berhasil menambahkan data kriteria dengan id = 7', NULL, NULL),
(51, 1, 'Berhasil mengubah data kriteria dengan id = 7', NULL, NULL),
(52, 1, 'Berhasil mengubah data kriteria dengan id = 7', NULL, NULL),
(53, 1, 'Berhasil menghapus data kriteria dengan id = 7', NULL, NULL),
(54, 1, 'Berhasil menghapus data kriteria dengan id = 6', NULL, NULL),
(55, 1, 'Berhasil menghapus data kriteria dengan id = 8', NULL, NULL),
(56, 1, 'Berhasil menghapus data kriteria dengan id = 9', NULL, NULL),
(57, 1, 'Berhasil menghapus data kriteria dengan id = 10', NULL, NULL),
(58, 1, 'Berhasil menghapus data kriteria dengan id = 11', NULL, NULL),
(59, 1, 'Berhasil menghapus data kriteria dengan id = 12', NULL, NULL),
(60, 1, 'Berhasil menambahkan data sub kriteria dengan id = 46', NULL, NULL),
(61, 1, 'Berhasil menghapus data verifikasi dengan id = 1', NULL, NULL),
(62, 1, 'Berhasil menghapus data verifikasi dengan id = 2', NULL, NULL),
(63, 1, 'Berhasil menghapus data verifikasi dengan id = 3', NULL, NULL),
(64, 1, 'Berhasil menghapus data verifikasi dengan id = 4', NULL, NULL),
(65, 1, 'Berhasil menghapus data verifikasi dengan id = 5', NULL, NULL),
(66, 1, 'Berhasil menghapus data warga dengan id = 211', NULL, NULL),
(67, 1, 'Berhasil menghapus data warga dengan id = 212', NULL, NULL),
(68, 1, 'Berhasil menambahkan data warga dengan id = 106', NULL, NULL),
(69, 1, 'Berhasil menghapus data warga dengan id = 106', NULL, NULL),
(70, 1, 'Berhasil menambahkan data warga dengan id = 107', NULL, NULL),
(71, 1, 'Berhasil menghapus data warga dengan id = 107', NULL, NULL),
(72, 1, 'Berhasil menambahkan data warga dengan id = 106', NULL, NULL),
(73, 1, 'Berhasil menambahkan data warga dengan id = 106', NULL, NULL),
(74, 1, 'Berhasil menghapus data warga dengan id = 106', NULL, NULL),
(75, 1, 'Berhasil menambahkan data warga dengan id = 107', NULL, NULL),
(76, 1, 'Berhasil mengubah data warga dengan id = 107', NULL, NULL),
(77, 1, 'Berhasil mengubah data warga dengan id = 107', NULL, NULL),
(78, 1, 'Berhasil menghapus data warga dengan id = 107', NULL, NULL),
(79, 1, 'Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = 1', NULL, NULL),
(80, 1, 'Berhasil menambahkan data pengumuman dengan id = 1', NULL, NULL),
(81, 1, 'Berhasil logout', NULL, NULL),
(82, 1, 'Berhasil login', NULL, NULL),
(83, 1, 'Berhasil login', NULL, NULL),
(84, 1, 'Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = 2', NULL, NULL),
(85, 1, 'Berhasil mengubah data verifikasi dengan id = 1', NULL, NULL),
(86, 1, 'Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = 1', NULL, NULL),
(87, 1, 'Berhasil menghapus data pengumuman dengan id = 1', NULL, NULL),
(88, 1, 'Berhasil menambahkan data pengumuman dengan id = 2', NULL, NULL),
(89, 1, 'Berhasil login', NULL, NULL),
(90, 1, 'Berhasil login', NULL, NULL),
(91, 1, 'Berhasil login', NULL, NULL),
(92, 1, 'Berhasil login', NULL, NULL),
(93, 1, 'Berhasil login', NULL, NULL),
(94, 1, 'Berhasil logout', NULL, NULL),
(95, 1, 'Berhasil login', NULL, NULL),
(96, 1, 'Berhasil login', NULL, NULL),
(97, 1, 'Berhasil login', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `objektif`
--

CREATE TABLE `objektif` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_objektif` varchar(200) NOT NULL,
  `value_objektif` varchar(50) NOT NULL,
  `bobot_objektif` int(11) NOT NULL,
  `warga_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `objektif`
--

INSERT INTO `objektif` (`id`, `nama_objektif`, `value_objektif`, `bobot_objektif`, `warga_id`, `created_at`, `updated_at`) VALUES
(1, 'tanggungan keluarga', '4', 3, 1, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(2, 'pekerjaan', '1700000', 3, 1, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(3, 'umur', '52', 5, 1, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(4, 'tanggungan keluarga', '3', 3, 2, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(5, 'pekerjaan', '2000000', 3, 2, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(6, 'umur', '28', 1, 2, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(7, 'tanggungan keluarga', '2', 1, 3, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(8, 'pekerjaan', '2400000', 1, 3, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(9, 'umur', '35', 1, 3, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(10, 'tanggungan keluarga', '3', 3, 4, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(11, 'pekerjaan', '2000000', 3, 4, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(12, 'umur', '42', 3, 4, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(13, 'tanggungan keluarga', '2', 1, 5, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(14, 'pekerjaan', '2100000', 3, 5, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(15, 'umur', '45', 3, 5, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(16, 'tanggungan keluarga', '3', 3, 6, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(17, 'pekerjaan', '2300000', 1, 6, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(18, 'umur', '38', 3, 6, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(19, 'tanggungan keluarga', '1', 1, 7, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(20, 'pekerjaan', '1000000', 7, 7, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(21, 'umur', '27', 1, 7, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(22, 'tanggungan keluarga', '4', 3, 8, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(23, 'pekerjaan', '1800000', 3, 8, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(24, 'umur', '29', 1, 8, '2022-06-14 01:08:56', '2022-06-14 01:08:56'),
(25, 'tanggungan keluarga', '1', 1, 9, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(26, 'pekerjaan', '2500000', 1, 9, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(27, 'umur', '31', 1, 9, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(28, 'tanggungan keluarga', '2', 1, 10, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(29, 'pekerjaan', '2000000', 3, 10, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(30, 'umur', '28', 1, 10, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(31, 'tanggungan keluarga', '3', 3, 11, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(32, 'pekerjaan', '2600000', 1, 11, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(33, 'umur', '50', 5, 11, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(34, 'tanggungan keluarga', '2', 1, 12, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(35, 'pekerjaan', '2000000', 3, 12, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(36, 'umur', '45', 3, 12, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(37, 'tanggungan keluarga', '4', 3, 13, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(38, 'pekerjaan', '2300000', 1, 13, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(39, 'umur', '38', 3, 13, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(40, 'tanggungan keluarga', '2', 1, 14, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(41, 'pekerjaan', '2500000', 1, 14, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(42, 'umur', '42', 3, 14, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(43, 'tanggungan keluarga', '5', 5, 15, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(44, 'pekerjaan', '1700000', 3, 15, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(45, 'umur', '38', 3, 15, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(46, 'tanggungan keluarga', '2', 1, 16, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(47, 'pekerjaan', '2000000', 3, 16, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(48, 'umur', '29', 1, 16, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(49, 'tanggungan keluarga', '2', 1, 17, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(50, 'pekerjaan', '2500000', 1, 17, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(51, 'umur', '29', 1, 17, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(52, 'tanggungan keluarga', '3', 3, 18, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(53, 'pekerjaan', '1500000', 5, 18, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(54, 'umur', '35', 1, 18, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(55, 'tanggungan keluarga', '2', 1, 19, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(56, 'pekerjaan', '2300000', 1, 19, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(57, 'umur', '28', 1, 19, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(58, 'tanggungan keluarga', '2', 1, 20, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(59, 'pekerjaan', '1800000', 3, 20, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(60, 'umur', '39', 3, 20, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(61, 'tanggungan keluarga', '3', 3, 21, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(62, 'pekerjaan', '1650000', 5, 21, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(63, 'umur', '43', 3, 21, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(64, 'tanggungan keluarga', '2', 1, 22, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(65, 'pekerjaan', '1300000', 5, 22, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(66, 'umur', '46', 5, 22, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(67, 'tanggungan keluarga', '1', 1, 23, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(68, 'pekerjaan', '1200000', 5, 23, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(69, 'umur', '54', 5, 23, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(70, 'tanggungan keluarga', '1', 1, 24, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(71, 'pekerjaan', '2200000', 3, 24, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(72, 'umur', '55', 5, 24, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(73, 'tanggungan keluarga', '6', 5, 25, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(74, 'pekerjaan', '1900000', 3, 25, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(75, 'umur', '54', 5, 25, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(76, 'tanggungan keluarga', '1', 1, 26, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(77, 'pekerjaan', '1100000', 7, 26, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(78, 'umur', '48', 5, 26, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(79, 'tanggungan keluarga', '3', 3, 27, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(80, 'pekerjaan', '2200000', 3, 27, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(81, 'umur', '32', 1, 27, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(82, 'tanggungan keluarga', '2', 1, 28, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(83, 'pekerjaan', '2400000', 1, 28, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(84, 'umur', '31', 1, 28, '2022-06-14 01:08:57', '2022-06-14 01:08:57'),
(85, 'tanggungan keluarga', '1', 1, 29, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(86, 'pekerjaan', '2000000', 3, 29, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(87, 'umur', '28', 1, 29, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(88, 'tanggungan keluarga', '2', 1, 30, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(89, 'pekerjaan', '1500000', 5, 30, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(90, 'umur', '29', 1, 30, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(91, 'tanggungan keluarga', '3', 3, 31, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(92, 'pekerjaan', '2300000', 1, 31, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(93, 'umur', '32', 1, 31, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(94, 'tanggungan keluarga', '2', 1, 32, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(95, 'pekerjaan', '1500000', 5, 32, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(96, 'umur', '42', 3, 32, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(97, 'tanggungan keluarga', '3', 3, 33, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(98, 'pekerjaan', '1600000', 5, 33, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(99, 'umur', '41', 3, 33, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(100, 'tanggungan keluarga', '4', 3, 34, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(101, 'pekerjaan', '1800000', 3, 34, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(102, 'umur', '44', 3, 34, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(103, 'tanggungan keluarga', '1', 1, 35, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(104, 'pekerjaan', '1500000', 5, 35, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(105, 'umur', '39', 3, 35, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(106, 'tanggungan keluarga', '1', 1, 36, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(107, 'pekerjaan', '1800000', 3, 36, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(108, 'umur', '54', 5, 36, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(109, 'tanggungan keluarga', '2', 1, 37, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(110, 'pekerjaan', '2000000', 3, 37, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(111, 'umur', '28', 1, 37, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(112, 'tanggungan keluarga', '2', 1, 38, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(113, 'pekerjaan', '1600000', 5, 38, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(114, 'umur', '32', 1, 38, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(115, 'tanggungan keluarga', '2', 1, 39, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(116, 'pekerjaan', '1600000', 5, 39, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(117, 'umur', '32', 1, 39, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(118, 'tanggungan keluarga', '2', 1, 40, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(119, 'pekerjaan', '2400000', 1, 40, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(120, 'umur', '45', 3, 40, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(121, 'tanggungan keluarga', '4', 3, 41, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(122, 'pekerjaan', '2450000', 1, 41, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(123, 'umur', '44', 3, 41, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(124, 'tanggungan keluarga', '1', 1, 42, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(125, 'pekerjaan', '1800000', 3, 42, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(126, 'umur', '27', 1, 42, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(127, 'tanggungan keluarga', '3', 3, 43, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(128, 'pekerjaan', '1700000', 3, 43, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(129, 'umur', '32', 1, 43, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(130, 'tanggungan keluarga', '2', 1, 44, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(131, 'pekerjaan', '1900000', 3, 44, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(132, 'umur', '29', 1, 44, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(133, 'tanggungan keluarga', '2', 1, 45, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(134, 'pekerjaan', '2200000', 3, 45, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(135, 'umur', '29', 1, 45, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(136, 'tanggungan keluarga', '2', 1, 46, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(137, 'pekerjaan', '1700000', 3, 46, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(138, 'umur', '31', 1, 46, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(139, 'tanggungan keluarga', '3', 3, 47, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(140, 'pekerjaan', '2000000', 3, 47, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(141, 'umur', '34', 1, 47, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(142, 'tanggungan keluarga', '2', 1, 48, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(143, 'pekerjaan', '1800000', 3, 48, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(144, 'umur', '27', 1, 48, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(145, 'tanggungan keluarga', '1', 1, 49, '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(146, 'pekerjaan', '2200000', 3, 49, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(147, 'umur', '35', 1, 49, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(148, 'tanggungan keluarga', '2', 1, 50, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(149, 'pekerjaan', '2200000', 3, 50, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(150, 'umur', '37', 3, 50, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(151, 'tanggungan keluarga', '2', 1, 51, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(152, 'pekerjaan', '2000000', 3, 51, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(153, 'umur', '38', 3, 51, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(154, 'tanggungan keluarga', '4', 3, 52, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(155, 'pekerjaan', '2300000', 1, 52, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(156, 'umur', '37', 3, 52, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(157, 'tanggungan keluarga', '3', 3, 53, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(158, 'pekerjaan', '1500000', 5, 53, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(159, 'umur', '55', 5, 53, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(160, 'tanggungan keluarga', '2', 1, 54, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(161, 'pekerjaan', '1800000', 3, 54, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(162, 'umur', '46', 5, 54, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(163, 'tanggungan keluarga', '2', 1, 55, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(164, 'pekerjaan', '2400000', 1, 55, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(165, 'umur', '50', 5, 55, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(166, 'tanggungan keluarga', '5', 5, 56, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(167, 'pekerjaan', '2500000', 1, 56, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(168, 'umur', '52', 5, 56, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(169, 'tanggungan keluarga', '4', 3, 57, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(170, 'pekerjaan', '1900000', 3, 57, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(171, 'umur', '53', 5, 57, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(172, 'tanggungan keluarga', '5', 5, 58, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(173, 'pekerjaan', '1800000', 3, 58, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(174, 'umur', '33', 1, 58, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(175, 'tanggungan keluarga', '1', 1, 59, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(176, 'pekerjaan', '2500000', 1, 59, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(177, 'umur', '42', 3, 59, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(178, 'tanggungan keluarga', '3', 3, 60, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(179, 'pekerjaan', '2200000', 3, 60, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(180, 'umur', '40', 3, 60, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(181, 'tanggungan keluarga', '3', 3, 61, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(182, 'pekerjaan', '2000000', 3, 61, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(183, 'umur', '41', 3, 61, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(184, 'tanggungan keluarga', '2', 1, 62, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(185, 'pekerjaan', '2100000', 3, 62, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(186, 'umur', '35', 1, 62, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(187, 'tanggungan keluarga', '3', 3, 63, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(188, 'pekerjaan', '2000000', 3, 63, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(189, 'umur', '57', 7, 63, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(190, 'tanggungan keluarga', '2', 1, 64, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(191, 'pekerjaan', '1800000', 3, 64, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(192, 'umur', '40', 3, 64, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(193, 'tanggungan keluarga', '2', 1, 65, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(194, 'pekerjaan', '2200000', 3, 65, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(195, 'umur', '44', 3, 65, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(196, 'tanggungan keluarga', '1', 1, 66, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(197, 'pekerjaan', '2500000', 1, 66, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(198, 'umur', '43', 3, 66, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(199, 'tanggungan keluarga', '2', 1, 67, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(200, 'pekerjaan', '2100000', 3, 67, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(201, 'umur', '37', 3, 67, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(202, 'tanggungan keluarga', '2', 1, 68, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(203, 'pekerjaan', '2300000', 1, 68, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(204, 'umur', '33', 1, 68, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(205, 'tanggungan keluarga', '3', 3, 69, '2022-06-14 01:08:59', '2022-06-14 01:08:59'),
(206, 'pekerjaan', '1500000', 5, 69, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(207, 'umur', '42', 3, 69, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(208, 'tanggungan keluarga', '5', 5, 70, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(209, 'pekerjaan', '2300000', 1, 70, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(210, 'umur', '54', 5, 70, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(211, 'tanggungan keluarga', '2', 1, 71, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(212, 'pekerjaan', '1800000', 3, 71, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(213, 'umur', '44', 3, 71, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(214, 'tanggungan keluarga', '2', 1, 72, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(215, 'pekerjaan', '2000000', 3, 72, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(216, 'umur', '34', 1, 72, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(217, 'tanggungan keluarga', '1', 1, 73, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(218, 'pekerjaan', '1800000', 3, 73, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(219, 'umur', '36', 3, 73, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(220, 'tanggungan keluarga', '3', 3, 74, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(221, 'pekerjaan', '2000000', 3, 74, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(222, 'umur', '39', 3, 74, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(223, 'tanggungan keluarga', '4', 3, 75, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(224, 'pekerjaan', '2100000', 3, 75, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(225, 'umur', '56', 7, 75, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(226, 'tanggungan keluarga', '3', 3, 76, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(227, 'pekerjaan', '2300000', 1, 76, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(228, 'umur', '53', 5, 76, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(229, 'tanggungan keluarga', '4', 3, 77, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(230, 'pekerjaan', '1800000', 3, 77, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(231, 'umur', '37', 3, 77, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(232, 'tanggungan keluarga', '2', 1, 78, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(233, 'pekerjaan', '2500000', 1, 78, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(234, 'umur', '51', 5, 78, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(235, 'tanggungan keluarga', '1', 1, 79, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(236, 'pekerjaan', '1800000', 3, 79, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(237, 'umur', '29', 1, 79, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(238, 'tanggungan keluarga', '2', 1, 80, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(239, 'pekerjaan', '1200000', 5, 80, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(240, 'umur', '32', 1, 80, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(241, 'tanggungan keluarga', '2', 1, 81, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(242, 'pekerjaan', '2000000', 3, 81, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(243, 'umur', '31', 1, 81, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(244, 'tanggungan keluarga', '3', 3, 82, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(245, 'pekerjaan', '2400000', 1, 82, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(246, 'umur', '45', 3, 82, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(247, 'tanggungan keluarga', '3', 3, 83, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(248, 'pekerjaan', '2500000', 1, 83, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(249, 'umur', '32', 1, 83, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(250, 'tanggungan keluarga', '6', 5, 84, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(251, 'pekerjaan', '2000000', 3, 84, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(252, 'umur', '42', 3, 84, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(253, 'tanggungan keluarga', '3', 3, 85, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(254, 'pekerjaan', '1800000', 3, 85, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(255, 'umur', '53', 5, 85, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(256, 'tanggungan keluarga', '2', 1, 86, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(257, 'pekerjaan', '2500000', 1, 86, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(258, 'umur', '42', 3, 86, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(259, 'tanggungan keluarga', '3', 3, 87, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(260, 'pekerjaan', '1500000', 5, 87, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(261, 'umur', '43', 3, 87, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(262, 'tanggungan keluarga', '2', 1, 88, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(263, 'pekerjaan', '2000000', 3, 88, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(264, 'umur', '44', 3, 88, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(265, 'tanggungan keluarga', '2', 1, 89, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(266, 'pekerjaan', '2000000', 3, 89, '2022-06-14 01:09:00', '2022-06-14 01:09:00'),
(267, 'umur', '34', 1, 89, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(268, 'tanggungan keluarga', '2', 1, 90, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(269, 'pekerjaan', '2500000', 1, 90, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(270, 'umur', '36', 3, 90, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(271, 'tanggungan keluarga', '3', 3, 91, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(272, 'pekerjaan', '2400000', 1, 91, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(273, 'umur', '28', 1, 91, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(274, 'tanggungan keluarga', '2', 1, 92, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(275, 'pekerjaan', '2000000', 3, 92, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(276, 'umur', '33', 1, 92, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(277, 'tanggungan keluarga', '6', 5, 93, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(278, 'pekerjaan', '2400000', 1, 93, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(279, 'umur', '40', 3, 93, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(280, 'tanggungan keluarga', '3', 3, 94, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(281, 'pekerjaan', '2000000', 3, 94, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(282, 'umur', '36', 3, 94, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(283, 'tanggungan keluarga', '1', 1, 95, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(284, 'pekerjaan', '1800000', 3, 95, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(285, 'umur', '36', 3, 95, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(286, 'tanggungan keluarga', '2', 1, 96, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(287, 'pekerjaan', '1800000', 3, 96, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(288, 'umur', '35', 1, 96, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(289, 'tanggungan keluarga', '2', 1, 97, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(290, 'pekerjaan', '1500000', 5, 97, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(291, 'umur', '37', 3, 97, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(292, 'tanggungan keluarga', '2', 1, 98, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(293, 'pekerjaan', '2500000', 1, 98, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(294, 'umur', '39', 3, 98, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(295, 'tanggungan keluarga', '5', 5, 99, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(296, 'pekerjaan', '2200000', 3, 99, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(297, 'umur', '45', 3, 99, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(298, 'tanggungan keluarga', '3', 3, 100, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(299, 'pekerjaan', '2300000', 1, 100, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(300, 'umur', '46', 5, 100, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(301, 'tanggungan keluarga', '3', 3, 101, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(302, 'pekerjaan', '2000000', 3, 101, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(303, 'umur', '44', 3, 101, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(304, 'tanggungan keluarga', '2', 1, 102, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(305, 'pekerjaan', '1000000', 7, 102, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(306, 'umur', '30', 1, 102, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(307, 'tanggungan keluarga', '3', 3, 103, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(308, 'pekerjaan', '1500000', 5, 103, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(309, 'umur', '46', 5, 103, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(310, 'tanggungan keluarga', '4', 3, 104, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(311, 'pekerjaan', '2500000', 1, 104, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(312, 'umur', '35', 1, 104, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(313, 'tanggungan keluarga', '2', 1, 105, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(314, 'pekerjaan', '2000000', 3, 105, '2022-06-14 01:09:01', '2022-06-14 01:09:01'),
(315, 'umur', '39', 3, 105, '2022-06-14 01:09:01', '2022-06-14 01:09:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul_pengumuman` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_pengumuman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `status_pengumuman` enum('buka','tutup') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota_pengumuman` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penilaian_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul_pengumuman`, `keterangan_pengumuman`, `tanggal_pengumuman`, `status_pengumuman`, `kuota_pengumuman`, `penilaian_id`, `created_at`, `updated_at`) VALUES
(2, 'Pengumuman bantuan sosial', 'My pengumuman', '2022-06-07', 'buka', '35', 1, '2022-06-13 18:11:56', '2022-06-13 18:11:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal_penilaian` date NOT NULL,
  `judul_penilaian` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `tanggal_penilaian`, `judul_penilaian`, `users_id`, `created_at`, `updated_at`) VALUES
(1, '2021-11-01', 'Kuisioner Haris Munandar', 1, NULL, NULL),
(2, '2021-11-02', 'Kuisioner Dewi Aprianti', 1, NULL, NULL),
(3, '2021-11-03', 'Kuisioner Martina', 1, NULL, NULL),
(4, '2021-11-04', 'Kuisioner Aida fitri', 1, NULL, NULL),
(5, '2021-11-05', 'Kuisiner Sri Wahyuni', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_profile` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_profile` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nama_profile`, `jenis_kelamin`, `no_hp`, `alamat`, `gambar_profile`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'Bima Ega', 'L', '082277506232', 'my alamat', 'default.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_sub_kriteria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sub_kriteria` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_sub_kriteria` enum('1','3','5','7','9') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_sub_kriteria` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `kode_sub_kriteria`, `nama_sub_kriteria`, `bobot_sub_kriteria`, `keterangan_sub_kriteria`, `kriteria_id`, `created_at`, `updated_at`) VALUES
(1, 'S001', '<= 56000', '9', NULL, 2, NULL, NULL),
(2, 'S002', '<= 1120000', '7', NULL, 2, NULL, NULL),
(3, 'S003', '<= 1680000', '5', NULL, 2, NULL, NULL),
(4, 'S004', '<= 2240000', '3', NULL, 2, NULL, NULL),
(5, 'S005', '<= 2800000', '1', NULL, 2, NULL, NULL),
(6, 'S006', 'belum kawin', '1', NULL, 1, NULL, NULL),
(7, 'S007', 'kawin', '3', NULL, 1, NULL, NULL),
(8, 'S008', 'cerai hidup', '5', NULL, 1, NULL, NULL),
(9, 'S009', 'cerai mati', '7', NULL, 1, NULL, NULL),
(10, 'S010', '1-2', '1', NULL, 3, NULL, NULL),
(11, 'S011', '3-4', '3', NULL, 3, NULL, NULL),
(12, 'S012', '> 4', '5', NULL, 3, NULL, NULL),
(13, 'S013', '26 - 35', '1', NULL, 4, NULL, NULL),
(14, 'S014', '36 - 45', '3', NULL, 4, NULL, NULL),
(15, 'S015', '46 - 55', '5', NULL, 4, NULL, NULL),
(16, 'S016', '56 - 65', '7', NULL, 4, NULL, NULL),
(17, 'S017', '> 65', '9', NULL, 4, NULL, NULL),
(18, 'S018', 'slta/sederajat', '1', NULL, 5, NULL, NULL),
(19, 'S019', 'sltp/sederajat', '3', NULL, 5, NULL, NULL),
(20, 'S020', 'sd/sederajat', '5', NULL, 5, NULL, NULL),
(21, 'S021', 'tidak tamat', '7', NULL, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria_warga`
--

CREATE TABLE `sub_kriteria_warga` (
  `id` int(10) UNSIGNED NOT NULL,
  `warga_id` int(10) UNSIGNED NOT NULL,
  `sub_kriteria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_kriteria_warga`
--

INSERT INTO `sub_kriteria_warga` (`id`, `warga_id`, `sub_kriteria_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(2, 1, 19, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(3, 2, 6, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(4, 2, 18, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(5, 3, 7, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(6, 3, 18, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(7, 4, 7, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(8, 4, 20, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(9, 5, 7, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(10, 5, 18, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(11, 6, 7, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(12, 6, 20, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(13, 7, 6, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(14, 7, 18, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(15, 8, 7, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(16, 8, 20, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(17, 9, 6, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(18, 9, 18, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(19, 10, 6, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(20, 10, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(21, 11, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(22, 11, 20, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(23, 12, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(24, 12, 18, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(25, 13, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(26, 13, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(27, 14, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(28, 14, 18, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(29, 15, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(30, 15, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(31, 16, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(32, 16, 18, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(33, 17, 8, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(34, 17, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(35, 18, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(36, 18, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(37, 19, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(38, 19, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(39, 20, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(40, 20, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(41, 21, 8, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(42, 21, 18, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(43, 22, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(44, 22, 20, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(45, 23, 9, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(46, 23, 18, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(47, 24, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(48, 24, 18, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(49, 25, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(50, 25, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(51, 26, 6, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(52, 26, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(53, 27, 7, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(54, 27, 19, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(55, 28, 6, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(56, 28, 18, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(57, 29, 6, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(58, 29, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(59, 30, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(60, 30, 19, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(61, 31, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(62, 31, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(63, 32, 9, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(64, 32, 19, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(65, 33, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(66, 33, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(67, 34, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(68, 34, 19, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(69, 35, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(70, 35, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(71, 36, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(72, 36, 19, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(73, 37, 6, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(74, 37, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(75, 38, 6, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(76, 38, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(77, 39, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(78, 39, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(79, 40, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(80, 40, 19, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(81, 41, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(82, 41, 19, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(83, 42, 6, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(84, 42, 19, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(85, 43, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(86, 43, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(87, 44, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(88, 44, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(89, 45, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(90, 45, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(91, 46, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(92, 46, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(93, 47, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(94, 47, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(95, 48, 6, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(96, 48, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(97, 49, 7, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(98, 49, 18, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(99, 50, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(100, 50, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(101, 51, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(102, 51, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(103, 52, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(104, 52, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(105, 53, 9, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(106, 53, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(107, 54, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(108, 54, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(109, 55, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(110, 55, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(111, 56, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(112, 56, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(113, 57, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(114, 57, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(115, 58, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(116, 58, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(117, 59, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(118, 59, 20, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(119, 60, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(120, 60, 20, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(121, 61, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(122, 61, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(123, 62, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(124, 62, 20, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(125, 63, 9, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(126, 63, 20, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(127, 64, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(128, 64, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(129, 65, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(130, 65, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(131, 66, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(132, 66, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(133, 67, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(134, 67, 20, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(135, 68, 7, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(136, 68, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(137, 69, 8, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(138, 69, 18, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(139, 70, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(140, 70, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(141, 71, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(142, 71, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(143, 72, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(144, 72, 19, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(145, 73, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(146, 73, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(147, 74, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(148, 74, 19, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(149, 75, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(150, 75, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(151, 76, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(152, 76, 19, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(153, 77, 6, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(154, 77, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(155, 78, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(156, 78, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(157, 79, 6, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(158, 79, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(159, 80, 6, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(160, 80, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(161, 81, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(162, 81, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(163, 82, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(164, 82, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(165, 83, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(166, 83, 19, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(167, 84, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(168, 84, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(169, 85, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(170, 85, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(171, 86, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(172, 86, 20, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(173, 87, 8, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(174, 87, 20, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(175, 88, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(176, 88, 20, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(177, 89, 7, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(178, 89, 18, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(179, 90, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(180, 90, 18, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(181, 91, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(182, 91, 19, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(183, 92, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(184, 92, 19, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(185, 93, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(186, 93, 18, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(187, 94, 9, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(188, 94, 18, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(189, 95, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(190, 95, 20, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(191, 96, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(192, 96, 20, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(193, 97, 9, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(194, 97, 20, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(195, 98, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(196, 98, 18, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(197, 99, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(198, 99, 20, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(199, 100, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(200, 100, 18, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(201, 101, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(202, 101, 19, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(203, 102, 6, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(204, 102, 19, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(205, 103, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(206, 103, 19, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(207, 104, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(208, 104, 19, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(209, 105, 7, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(210, 105, 18, '2022-06-13 18:09:01', '2022-06-13 18:09:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forgot` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `status` enum('aktif','non aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `forgot`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin123', '$2y$10$q0.mec/jpLObbw/eZ4R8T.sl7C.SaY9NnAl8tlE6Z5/JPFq1ds6se', NULL, 'admin', 'aktif', 'EM8Cxbj9hV1HFRlSTxGW4LbUN8eCFHEzbUQ2U2MVuR8JsEwRpRIJXo9guKtJ', '2021-10-01 23:20:46', '2021-10-01 23:20:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi_data`
--

CREATE TABLE `verifikasi_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `judul_verifikasi` varchar(200) NOT NULL,
  `status_verifikasi` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `verifikasi_data`
--

INSERT INTO `verifikasi_data` (`id`, `tanggal`, `waktu`, `judul_verifikasi`, `status_verifikasi`, `created_at`, `updated_at`) VALUES
(1, '2021-11-01', '00:57:25', 'Verifikasi Bantuan Sosial Tunai 1', '1', NULL, '2022-06-14 01:10:54'),
(2, '2021-11-02', '00:57:25', 'Verifikasi Bantuan Sosial Tunai 2', '0', NULL, NULL),
(3, '2021-11-03', '00:57:25', 'Verifikasi Bantuan Sosial Tunai 3', '0', NULL, NULL),
(4, '2021-11-04', '00:57:25', 'Verifikasi Bantuan Sosial Tunai 4', '0', NULL, NULL),
(5, '2021-11-05', '00:57:25', 'Verifikasi Bantuan Sosial Tunai 5', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_warga` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_warga` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pernikahan_warga` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_warga` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilansuami_warga` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilanistri_warga` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilanpribadi_warga` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalpenghasilan_warga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggungan_warga` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_warga` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikanterakhir_warga` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi_data_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id`, `nama_warga`, `alamat_warga`, `pernikahan_warga`, `pekerjaan_warga`, `penghasilansuami_warga`, `penghasilanistri_warga`, `penghasilanpribadi_warga`, `totalpenghasilan_warga`, `tanggungan_warga`, `umur_warga`, `pendidikanterakhir_warga`, `verifikasi_data_id`, `created_at`, `updated_at`) VALUES
(1, 'sholiwaty', 'jl. cokroaminoto gg. durian lk. 6', 'kawin', 'mengurus rumah tangga', '1200000', '500000', '0', '1700000', '4', '52', 'sltp/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(2, 'faridah', 'jl. diponegoro', 'belum kawin', 'karyawan swasta', '0', '0', '2000000', '2000000', '3', '28', 'slta/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(3, 'listeria br situmorang', 'jl. diponegoro gg. perak', 'kawin', 'mengurus rumah tangga', '2000000', '400000', '0', '2400000', '2', '35', 'slta/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(4, 'nuraini', 'jl. malik ibrahim gg. jeruk', 'kawin', 'mengurus rumah tangga', '1500000', '500000', '0', '2000000', '3', '42', 'sd/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(5, 'siti aisyah lubis', 'jl. diponegoro gg. nenas lk. 6', 'kawin', 'mengurus rumah tangga', '1800000', '300000', '0', '2100000', '2', '45', 'slta/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(6, 'hasmiati', 'jl. hamka gg. senangin lk. 2', 'kawin', 'honorer', '1500000', '800000', '0', '2300000', '3', '38', 'sd/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(7, 'siti arfaina', 'jl. hamka lk. 2', 'belum kawin', 'karyawan swasta', '0', '0', '1000000', '1000000', '1', '27', 'slta/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(8, 'mardimin ', 'jl. kartini no. 29 lk. iv', 'kawin', 'pedagang', '1000000', '800000', '0', '1800000', '4', '29', 'sd/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(9, 'asni ati', 'jl. malik gg. baharu', 'belum kawin', 'karyawan swasta', '0', '0', '2500000', '2500000', '1', '31', 'slta/sederajat', 1, '2022-06-13 18:08:56', '2022-06-13 18:08:56'),
(10, 'erlina', 'jl. malik ibrahim gg. baharu', 'belum kawin', 'pedagang', '0', '0', '2000000', '2000000', '2', '28', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(11, 'misnah', 'jl. mangunkusoro lk. iv', 'kawin', 'pedagang', '1800000', '800000', '0', '2600000', '3', '50', 'sd/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(12, 'rusmina', 'jl. mas mansyur gg. kancil lk. iii', 'kawin', 'belum bekerja', '2000000', '0', '0', '2000000', '2', '45', 'slta/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(13, 'srikartini', 'jl. mas mansyur lk. iii', 'kawin', 'pedagang', '1500000', '800000', '0', '2300000', '4', '38', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(14, 'nurazlina', 'jl. wahidin gg. h. a. saleh no. 18a lk. 3', 'kawin', 'honorer', '2000000', '500000', '0', '2500000', '2', '42', 'slta/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(15, 'yumaini', 'jl. diponegoro gg. perak lk. 5', 'kawin', 'honorer', '1000000', '700000', '0', '1700000', '5', '38', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(16, 'anwar', 'jl. diponegoro gg. nangka', 'kawin', 'pedagang', '2000000', '0', '0', '2000000', '2', '29', 'slta/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(17, 'lili surabi', 'jl. cokroaminoto lk. 7', 'cerai hidup', 'karyawan swasta', '0', '2500000', '0', '2500000', '2', '29', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(18, 'ipah susilawati', 'jl. kartini gg. emas lk. 5', 'kawin', 'mengurus rumah tangga', '1000000', '500000', '0', '1500000', '3', '35', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(19, 'dewi saryani', 'jl. diponegoro gg. nangka', 'kawin', 'honorer', '1500000', '800000', '0', '2300000', '2', '28', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(20, 'juliawan silaban', 'jl. cokroaminoto lk. 7', 'kawin', 'belum bekerja', '1800000', '0', '0', '1800000', '2', '39', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(21, 'siti nurjannah br munthe', 'jl. kartini gg. emas lk. 5', 'cerai hidup', 'honorer', '0', '1650000', '0', '1650000', '3', '43', 'slta/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(22, 'erni johan', 'jl. diponegoro gg. nangka lk. 6', 'kawin', 'mengurus rumah tangga', '1000000', '300000', '0', '1300000', '2', '46', 'sd/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(23, 'siti halizah', 'jl. malik ibrahim lk. 6', 'cerai mati', 'buruh harian', '0', '1200000', '0', '1200000', '1', '54', 'slta/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(24, 'masitah', 'jl. kartini gg melati lk. iv', 'kawin', 'karyawan swasta', '1000000', '1200000', '0', '2200000', '1', '55', 'slta/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(25, 'juniar', 'jl. mangunsarkoro no. 26 lk. iv', 'kawin', 'mengurus rumah tangga', '1500000', '400000', '0', '1900000', '6', '54', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(26, 'sri novita dewi', 'jl. anwar gg mangga lk. 6', 'belum kawin', 'pedagang', '0', '0', '1100000', '1100000', '1', '48', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(27, 'ides lestiani', 'jl. malik ibrahim gg buntu lk. 7', 'kawin', 'belum bekerja', '2200000', '0', '0', '2200000', '3', '32', 'sltp/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(28, 'fadilah ', 'jl. hamka gg senangin lk. 2', 'belum kawin', 'wiraswasta', '0', '0', '2400000', '2400000', '2', '31', 'slta/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(29, 'inayah suriyani', 'jl. malik ibrahim gg buntu lk 7', 'belum kawin', 'pedagang', '0', '0', '2000000', '2000000', '1', '28', 'slta/sederajat', 1, '2022-06-13 18:08:57', '2022-06-13 18:08:57'),
(30, 'ade purwanti', 'jl. diponegoro gg pisang lk. 1', 'kawin', 'honorer', '1500000', '0', '0', '1500000', '2', '29', 'sltp/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(31, 'ekawati', 'jl. diponegoro gg perak lk 5', 'kawin', 'honorer', '1500000', '800000', '0', '2300000', '3', '32', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(32, 'zul sahyati', 'jl. a yani gg baharu lk 7', 'cerai mati', 'pedagang', '1500000', '0', '0', '1500000', '2', '42', 'sltp/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(33, 'sri astuti', 'jl. mangunsarkoro no. 27 lk. iv', 'kawin', 'buruh tani', '1000000', '600000', '0', '1600000', '3', '41', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(34, 'wagimin', 'jl. anwar gg mas', 'kawin', 'pedagang', '800000', '1000000', '0', '1800000', '4', '44', 'sltp/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(35, 'siti kholuah', 'jl. cokroaminoto gg kenangan lk. 4', 'kawin', 'belum bekerja', '1500000', '0', '0', '1500000', '1', '39', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(36, 'legiman', 'jl. diponegoro gg. buntu', 'kawin', 'mengurus rumah tangga', '1500000', '300000', '0', '1800000', '1', '54', 'sltp/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(37, 'erawati br ritonga', 'jl.diponegoro gg. nangka no.45', 'belum kawin', 'honorer', '0', '0', '2000000', '2000000', '2', '28', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(38, 'nurida', 'jl.diponegoro gg. nangka', 'belum kawin', 'pedagang', '0', '0', '1600000', '1600000', '2', '32', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(39, 'misdi ', 'jl. malik ibrahim gg. jeruk', 'kawin', 'mengurus rumah tangga', '1000000', '600000', '0', '1600000', '2', '32', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(40, 'aswati', 'jl.diponegoro gg. nangka', 'kawin', 'karyawan swasta', '1200000', '1200000', '0', '2400000', '2', '45', 'sltp/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(41, 'zulaikah', 'jl. malik ibrahim gg. jeruk', 'kawin', 'karyawan swasta', '1000000', '1450000', '0', '2450000', '4', '44', 'sltp/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(42, 'lely wardani', 'jl. mas mansyur gg. kancil lk. iii', 'belum kawin', 'honorer', '0', '0', '1800000', '1800000', '1', '27', 'sltp/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(43, 'efrida wati', 'jl. malik ibrahim gg. jeruk', 'kawin', 'belum bekerja', '1700000', '0', '0', '1700000', '3', '32', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(44, 'nana asmawati', 'jl. anwar gg. mas', 'kawin', 'mengurus rumah tangga', '1500000', '400000', '0', '1900000', '2', '29', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(45, 'nia kurniawati', 'jl.diponegoro gg. nangka', 'kawin', 'honorer', '1000000', '1200000', '0', '2200000', '2', '29', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(46, 'sukmawati', 'jl. mas mansyur no.9 lk. iii', 'kawin', 'mengurus rumah tangga', '1700000', '0', '0', '1700000', '2', '31', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(47, 'yanti', 'jl. mas mansyur lk. ix', 'kawin', 'wiraswasta', '2000000', '0', '0', '2000000', '3', '34', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(48, 'jumadi', 'jl.diponegoro gg. nangka', 'belum kawin', 'wiraswasta', '0', '0', '1800000', '1800000', '2', '27', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(49, 'wulansari', 'jl. malik ibrahim gg. jeruk', 'kawin', 'wiraswasta', '1200000', '1000000', '0', '2200000', '1', '35', 'slta/sederajat', 1, '2022-06-13 18:08:58', '2022-06-13 18:08:58'),
(50, 'ernawati', 'jl.diponegoro gg. durian lk. vi', 'kawin', 'pedagang', '1000000', '1200000', '0', '2200000', '2', '37', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(51, 'ika hardianti', 'jl. wahidin gg. h. a. saleh lk. 3', 'kawin', 'pedagang', '1000000', '1000000', '0', '2000000', '2', '38', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(52, 'suriadi', 'jl.diponegoro gg. nangka', 'kawin', 'pedagang', '1300000', '1000000', '0', '2300000', '4', '37', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(53, 'aji sugarwono', 'jl.diponegoro gg. nangka', 'cerai mati', 'wiraswasta', '1500000', '0', '0', '1500000', '3', '55', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(54, 'maraganti', 'jl. malik ibrahim gg. baharu', 'kawin', 'buruh', '1200000', '600000', '0', '1800000', '2', '46', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(55, 'bachtiar', 'jl. malik ibrahim gg. baharu no. 45 lk. 6', 'kawin', 'buruh', '1700000', '700000', '0', '2400000', '2', '50', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(56, 'nurlelawati', 'jl. wahidin no. 39 lk. 3', 'kawin', 'karyawan swasta', '1000000', '1500000', '0', '2500000', '5', '52', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(57, 'despayani', 'jl. malik ibrahim gg. rahmat', 'kawin', 'buruh tani', '900000', '1000000', '0', '1900000', '4', '53', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(58, 'semiati', 'jl. hamka gg. senangin lk. 2', 'kawin', 'pedagang', '1000000', '800000', '0', '1800000', '5', '33', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(59, 'mainar', 'jl. malik ibrahim gg. rahmat', 'kawin', 'pedagang', '1300000', '1200000', '0', '2500000', '1', '42', 'sd/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(60, 'kusuma ningsih', 'jl. hamka lk. 2', 'kawin', 'mengurus rumah tangga', '1700000', '500000', '0', '2200000', '3', '40', 'sd/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(61, 'nur azlina', 'jl.diponegoro gg. pisang', 'kawin', 'mengurus rumah tangga', '2000000', '0', '0', '2000000', '3', '41', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(62, 'marhan siregar', 'jl. malik ibrahim gg. buntu', 'kawin', 'wiraswasta', '1500000', '600000', '0', '2100000', '2', '35', 'sd/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(63, 'leily nuzulul aini', 'jl. malik ibrahim gg. buntu', 'cerai mati', 'wiraswasta', '2000000', '0', '0', '2000000', '3', '57', 'sd/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(64, 'sariyem', 'jl. hamka gg. senangin lk. 2', 'kawin', 'mengurus rumah tangga', '1800000', '0', '0', '1800000', '2', '40', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(65, 'noviyanti', 'jl. diponegoro gg. langsat', 'kawin', 'pedagang', '1000000', '1200000', '0', '2200000', '2', '44', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(66, 'ningsih wardani', 'jl. malik ibrahim gg. rahmat', 'kawin', 'pedagang', '1300000', '1200000', '0', '2500000', '1', '43', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(67, 'samsidar', 'jl. malik ibrahim gg. rahmat', 'kawin', 'karyawan swasta', '1300000', '800000', '0', '2100000', '2', '37', 'sd/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(68, 'nurhayati', 'jl. diponegoro gg. nangka', 'kawin', 'karyawan swasta', '1300000', '1000000', '0', '2300000', '2', '33', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(69, 'rusmiati', 'jl. malik ibrahim gg. rahmat', 'cerai hidup', 'pedagang', '0', '1500000', '0', '1500000', '3', '42', 'slta/sederajat', 1, '2022-06-13 18:08:59', '2022-06-13 18:08:59'),
(70, 'mardiyyah', 'jl.diponegoro gg. rambutan lk. vi', 'kawin', 'honorer', '1300000', '1000000', '0', '2300000', '5', '54', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(71, 'juliadi karim', 'jl.diponegoro gg. perak', 'kawin', 'mengurus rumah tangga', '1500000', '300000', '0', '1800000', '2', '44', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(72, 'burhanuddin', 'jl. malik ibrahim gg. rahmat', 'kawin', 'mengurus rumah tangga', '2000000', '0', '0', '2000000', '2', '34', 'sltp/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(73, 'desi anggraini', 'jl.diponegoro gg. nangka', 'kawin', 'mengurus rumah tangga', '1800000', '0', '0', '1800000', '1', '36', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(74, 'kartini br pane', 'jl. malik ibrahim gg. jeruk', 'kawin', 'belum bekerja', '2000000', '0', '0', '2000000', '3', '39', 'sltp/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(75, 'dini kasiani', 'jl.diponegoro gg. nangka', 'kawin', 'wiraswasta', '1300000', '800000', '0', '2100000', '4', '56', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(76, 'erdina sari', 'jl.diponegoro gg. rambutan lk. vi', 'kawin', 'wiraswasta', '1500000', '800000', '0', '2300000', '3', '53', 'sltp/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(77, 'eva laila', 'jl. cokroaminoto gg. kenanga', 'belum kawin', 'pedagang', '0', '0', '1800000', '1800000', '4', '37', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(78, 'sariyal', 'jl. hamka gg senangin lk. 2', 'kawin', 'honorer', '1500000', '1000000', '0', '2500000', '2', '51', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(79, 'zuhriah', 'jl. hamka gg senangin lk. 2', 'belum kawin', 'honorer', '0', '0', '1800000', '1800000', '1', '29', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(80, 'elviani', 'jl.diponegoro gg. nangka', 'belum kawin', 'wiraswasta', '0', '0', '1200000', '1200000', '2', '32', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(81, 'neni suliani', 'jl. cokroaminoto', 'kawin', 'mengurus rumah tangga', '2000000', '0', '0', '2000000', '2', '31', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(82, 'sugiman', 'jl.diponegoro gg.langsat', 'kawin', 'mengurus rumah tangga', '1800000', '600000', '0', '2400000', '3', '45', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(83, 'desi ratnasari', 'jl. malik ibrahim gg. buntu\'', 'kawin', 'honorer', '1000000', '1500000', '0', '2500000', '3', '32', 'sltp/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(84, 'julinar', 'jl. wahidin gg. h. a. saleh no. 70 lk. 3', 'kawin', 'wiraswasta', '2000000', '0', '0', '2000000', '6', '42', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(85, 'susilawati marpaung', 'jl.diponegoro gg. nangka', 'kawin', 'wiraswasta', '1800000', '0', '0', '1800000', '3', '53', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(86, 'pardiawan', 'jl. wahidin no. 20a lk. 3', 'kawin', 'buruh', '1500000', '1000000', '0', '2500000', '2', '42', 'sd/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(87, 'sri darma', 'jl. cokroaminoto gg kenangan lk. 4', 'cerai hidup', 'buruh', '0', '1500000', '0', '1500000', '3', '43', 'sd/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(88, 'wanti sulastri', 'jl.diponegoro gg. nangka', 'kawin', 'mengurus rumah tangga', '2000000', '0', '0', '2000000', '2', '44', 'sd/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(89, 'nur afifah', 'jl. wahidin no. 20a lk. 3', 'kawin', 'honorer', '1000000', '1000000', '0', '2000000', '2', '34', 'slta/sederajat', 1, '2022-06-13 18:09:00', '2022-06-13 18:09:00'),
(90, 'elis mardiana', 'jl. cokroaminoto gg kenangan lk. 4', 'kawin', 'pedagang', '1000000', '1500000', '0', '2500000', '2', '36', 'slta/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(91, 'erika ardiana', 'jl.diponegoro gg. nangka', 'kawin', 'mengurus rumah tangga', '2000000', '400000', '0', '2400000', '3', '28', 'sltp/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(92, 'sumantri', 'jl. kartini gg. emas lk. 5', 'kawin', 'mengurus rumah tangga', '2000000', '0', '0', '2000000', '2', '33', 'sltp/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(93, 'agus soleh', 'jl. mangunsarkoro no. 27 lk. iv', 'kawin', 'pedagang', '1800000', '600000', '0', '2400000', '6', '40', 'slta/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(94, 'rubiah', 'jl. cokroaminoto gg kenangan lk. 4', 'cerai mati', 'honorer', '2000000', '0', '0', '2000000', '3', '36', 'slta/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(95, 'kurniawan', 'jl. mangunsarkoro no. 27 lk. iv', 'kawin', 'buruh', '1200000', '600000', '0', '1800000', '1', '36', 'sd/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(96, 'yogi ardiansyah', 'jl. wahidin gg. h. a. saleh no. 18a lk. 3', 'kawin', 'buruh', '1200000', '600000', '0', '1800000', '2', '35', 'sd/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(97, 'sri ramahdani', 'jl.diponegoro gg. nangka', 'cerai mati', 'wiraswasta', '1500000', '0', '0', '1500000', '2', '37', 'sd/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(98, 'ardi syahputra', 'jl. kartini gg. emas lk. 5', 'kawin', 'wiraswasta', '1500000', '1000000', '0', '2500000', '2', '39', 'slta/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(99, 'sulastri', 'jl.diponegoro no. 5 gg. durian lk. vi', 'kawin', 'karyawan swasta', '1000000', '1200000', '0', '2200000', '5', '45', 'sd/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(100, 'nurhasanah ', 'jl. wahidin gg. h. a. saleh no. 18a lk. 3', 'kawin', 'buruh', '1500000', '800000', '0', '2300000', '3', '46', 'slta/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(101, 'rita', 'jl. cokroaminoto gg kenangan lk. 4', 'kawin', 'mengurus rumah tangga', '2000000', '0', '0', '2000000', '3', '44', 'sltp/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(102, 'chaduah siregar', 'jl. wahidin gg. h. a. saleh no. 18a lk. 3', 'belum kawin', 'honorer', '0', '0', '1000000', '1000000', '2', '30', 'sltp/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(103, 'fitri rahmayani', 'jl.diponegoro gg. nangka', 'kawin', 'belum bekerja', '1500000', '0', '0', '1500000', '3', '46', 'sltp/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(104, 'zubaidah ', 'jl. wahidin  no. 28 a lk. 3', 'kawin', 'karyawan swasta', '1500000', '1000000', '0', '2500000', '4', '35', 'sltp/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01'),
(105, 'erviana susi handayani', 'jl.diponegoro gg. langsat', 'kawin', 'mengurus rumah tangga', '1500000', '500000', '0', '2000000', '2', '39', 'slta/sederajat', 1, '2022-06-13 18:09:01', '2022-06-13 18:09:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktual`
--
ALTER TABLE `aktual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_id` (`penilaian_id`),
  ADD KEY `warga_id` (`warga_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil_detail`
--
ALTER TABLE `hasil_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`warga_id`),
  ADD KEY `hasil_id` (`hasil_id`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `objektif`
--
ALTER TABLE `objektif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`warga_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_penilaian_id_foreign` (`penilaian_id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriteria_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `sub_kriteria_warga`
--
ALTER TABLE `sub_kriteria_warga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriteria_warga_warga_id_foreign` (`warga_id`),
  ADD KEY `sub_kriteria_warga_sub_kriteria_id_foreign` (`sub_kriteria_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `verifikasi_data`
--
ALTER TABLE `verifikasi_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verifikasi_data_id` (`verifikasi_data_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktual`
--
ALTER TABLE `aktual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hasil_detail`
--
ALTER TABLE `hasil_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `objektif`
--
ALTER TABLE `objektif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria_warga`
--
ALTER TABLE `sub_kriteria_warga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `verifikasi_data`
--
ALTER TABLE `verifikasi_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aktual`
--
ALTER TABLE `aktual`
  ADD CONSTRAINT `aktual_ibfk_1` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aktual_ibfk_2` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_detail`
--
ALTER TABLE `hasil_detail`
  ADD CONSTRAINT `hasil_detail_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_detail_ibfk_2` FOREIGN KEY (`hasil_id`) REFERENCES `hasil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `objektif`
--
ALTER TABLE `objektif`
  ADD CONSTRAINT `objektif_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_penilaian_id_foreign` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriteria_warga`
--
ALTER TABLE `sub_kriteria_warga`
  ADD CONSTRAINT `sub_kriteria_warga_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_kriteria_warga_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`verifikasi_data_id`) REFERENCES `verifikasi_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
