/*
 Navicat Premium Data Transfer

 Source Server         : my_local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : kepegawaian

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 28/07/2025 12:39:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for aktual
-- ----------------------------
DROP TABLE IF EXISTS `aktual`;
CREATE TABLE `aktual`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `warga_id` int UNSIGNED NOT NULL,
  `penilaian_id` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penilaian_id`(`penilaian_id` ASC) USING BTREE,
  INDEX `warga_id`(`warga_id` ASC) USING BTREE,
  CONSTRAINT `aktual_ibfk_1` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `aktual_ibfk_2` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aktual
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for hasil
-- ----------------------------
DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cr_hasil` double NOT NULL,
  `penilaian_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (1, 0.054, 1, '2022-06-13 18:10:54', '2022-06-13 18:10:54');

-- ----------------------------
-- Table structure for hasil_detail
-- ----------------------------
DROP TABLE IF EXISTS `hasil_detail`;
CREATE TABLE `hasil_detail`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `warga_id` int UNSIGNED NOT NULL,
  `rank_hasil` int NOT NULL,
  `bobot_hasil` double NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `hasil_id` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `warga_id`(`warga_id` ASC) USING BTREE,
  INDEX `hasil_id`(`hasil_id` ASC) USING BTREE,
  CONSTRAINT `hasil_detail_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hasil_detail_ibfk_2` FOREIGN KEY (`hasil_id`) REFERENCES `hasil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 106 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil_detail
-- ----------------------------

-- ----------------------------
-- Table structure for konfigurasi
-- ----------------------------
DROP TABLE IF EXISTS `konfigurasi`;
CREATE TABLE `konfigurasi`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_konfigurasi` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of konfigurasi
-- ----------------------------
INSERT INTO `konfigurasi` VALUES (1, 'Aplikasi Penjurusan', 'sistem pendukung keputusan penjurusan minat siswa methode fuzzy logic', '1637120516-logo.png', 'Bima Ega', 'https://www.facebook.com/bimaega15', 'https://www.instagram.com/bimaega/', 'https://www.youtube.com/channel/UCBWfqsZQ85gIWevF9guEEyg', 'bimaega15@gmail.com', 'Medan, sumut', '082277506232', '2021-10-01 23:20:46', '2021-11-16 20:41:56');

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES (1, 'K001', 'pernikahan', NULL, NULL);
INSERT INTO `kriteria` VALUES (2, 'K002', 'pekerjaan', NULL, NULL);
INSERT INTO `kriteria` VALUES (3, 'K003', 'tanggungan keluarga', NULL, NULL);
INSERT INTO `kriteria` VALUES (4, 'K004', 'umur', NULL, NULL);
INSERT INTO `kriteria` VALUES (5, 'K005', 'pendidikan terakhir', NULL, NULL);

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int UNSIGNED NOT NULL,
  `aktivitas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `log_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `log_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES (1, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (2, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (3, 1, 'Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = 1', NULL, NULL);
INSERT INTO `log` VALUES (4, 1, 'Berhasil menambahkan data pengumuman dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (5, 1, 'Berhasil logout', NULL, NULL);
INSERT INTO `log` VALUES (6, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (7, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (8, 1, 'Berhasil menambahkan data sub kriteria dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (9, 1, 'Berhasil menambahkan data sub kriteria dengan id = 2', NULL, NULL);
INSERT INTO `log` VALUES (10, 1, 'Berhasil menambahkan data sub kriteria dengan id = 3', NULL, NULL);
INSERT INTO `log` VALUES (11, 1, 'Berhasil menambahkan data sub kriteria dengan id = 4', NULL, NULL);
INSERT INTO `log` VALUES (12, 1, 'Berhasil menambahkan data sub kriteria dengan id = 5', NULL, NULL);
INSERT INTO `log` VALUES (13, 1, 'Berhasil menghapus data sub kriteria dengan id = 6', NULL, NULL);
INSERT INTO `log` VALUES (14, 1, 'Berhasil menghapus data sub kriteria dengan id = 7', NULL, NULL);
INSERT INTO `log` VALUES (15, 1, 'Berhasil menghapus data sub kriteria dengan id = 8', NULL, NULL);
INSERT INTO `log` VALUES (16, 1, 'Berhasil menghapus data sub kriteria dengan id = 9', NULL, NULL);
INSERT INTO `log` VALUES (17, 1, 'Berhasil menghapus data sub kriteria dengan id = 10', NULL, NULL);
INSERT INTO `log` VALUES (18, 1, 'Berhasil menambahkan data sub kriteria dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (19, 1, 'Berhasil menambahkan data sub kriteria dengan id = 2', NULL, NULL);
INSERT INTO `log` VALUES (20, 1, 'Berhasil menambahkan data sub kriteria dengan id = 3', NULL, NULL);
INSERT INTO `log` VALUES (21, 1, 'Berhasil menambahkan data sub kriteria dengan id = 5', NULL, NULL);
INSERT INTO `log` VALUES (22, 1, 'Berhasil menghapus data sub kriteria dengan id = 15', NULL, NULL);
INSERT INTO `log` VALUES (23, 1, 'Berhasil menambahkan data sub kriteria dengan id = 16', NULL, NULL);
INSERT INTO `log` VALUES (24, 1, 'Berhasil menambahkan data sub kriteria dengan id = 17', NULL, NULL);
INSERT INTO `log` VALUES (25, 1, 'Berhasil menambahkan data sub kriteria dengan id = 18', NULL, NULL);
INSERT INTO `log` VALUES (26, 1, 'Berhasil menambahkan data sub kriteria dengan id = 19', NULL, NULL);
INSERT INTO `log` VALUES (27, 1, 'Berhasil menambahkan data sub kriteria dengan id = 20', NULL, NULL);
INSERT INTO `log` VALUES (28, 1, 'Berhasil menambahkan data sub kriteria dengan id = 21', NULL, NULL);
INSERT INTO `log` VALUES (29, 1, 'Berhasil menambahkan data sub kriteria dengan id = 22', NULL, NULL);
INSERT INTO `log` VALUES (30, 1, 'Berhasil menambahkan data sub kriteria dengan id = 33', NULL, NULL);
INSERT INTO `log` VALUES (31, 1, 'Berhasil menghapus data sub kriteria dengan id = 23', NULL, NULL);
INSERT INTO `log` VALUES (32, 1, 'Berhasil menghapus data sub kriteria dengan id = 24', NULL, NULL);
INSERT INTO `log` VALUES (33, 1, 'Berhasil menghapus data sub kriteria dengan id = 25', NULL, NULL);
INSERT INTO `log` VALUES (34, 1, 'Berhasil menghapus data sub kriteria dengan id = 26', NULL, NULL);
INSERT INTO `log` VALUES (35, 1, 'Berhasil menghapus data sub kriteria dengan id = 27', NULL, NULL);
INSERT INTO `log` VALUES (36, 1, 'Berhasil menghapus data sub kriteria dengan id = 28', NULL, NULL);
INSERT INTO `log` VALUES (37, 1, 'Berhasil menambahkan data sub kriteria dengan id = 29', NULL, NULL);
INSERT INTO `log` VALUES (38, 1, 'Berhasil menambahkan data sub kriteria dengan id = 30', NULL, NULL);
INSERT INTO `log` VALUES (39, 1, 'Berhasil menambahkan data sub kriteria dengan id = 31', NULL, NULL);
INSERT INTO `log` VALUES (40, 1, 'Berhasil menambahkan data sub kriteria dengan id = 32', NULL, NULL);
INSERT INTO `log` VALUES (41, 1, 'Berhasil menambahkan data sub kriteria dengan id = 32', NULL, NULL);
INSERT INTO `log` VALUES (42, 1, 'Berhasil menambahkan data sub kriteria dengan id = 19', NULL, NULL);
INSERT INTO `log` VALUES (43, 1, 'Berhasil menghapus data kriteria dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (44, 1, 'Berhasil menghapus data kriteria dengan id = 2', NULL, NULL);
INSERT INTO `log` VALUES (45, 1, 'Berhasil menghapus data kriteria dengan id = 3', NULL, NULL);
INSERT INTO `log` VALUES (46, 1, 'Berhasil menghapus data kriteria dengan id = 4', NULL, NULL);
INSERT INTO `log` VALUES (47, 1, 'Berhasil menghapus data kriteria dengan id = 5', NULL, NULL);
INSERT INTO `log` VALUES (48, 1, 'Berhasil menambahkan data kriteria dengan id = 6', NULL, NULL);
INSERT INTO `log` VALUES (49, 1, 'Berhasil mengubah data kriteria dengan id = 6', NULL, NULL);
INSERT INTO `log` VALUES (50, 1, 'Berhasil menambahkan data kriteria dengan id = 7', NULL, NULL);
INSERT INTO `log` VALUES (51, 1, 'Berhasil mengubah data kriteria dengan id = 7', NULL, NULL);
INSERT INTO `log` VALUES (52, 1, 'Berhasil mengubah data kriteria dengan id = 7', NULL, NULL);
INSERT INTO `log` VALUES (53, 1, 'Berhasil menghapus data kriteria dengan id = 7', NULL, NULL);
INSERT INTO `log` VALUES (54, 1, 'Berhasil menghapus data kriteria dengan id = 6', NULL, NULL);
INSERT INTO `log` VALUES (55, 1, 'Berhasil menghapus data kriteria dengan id = 8', NULL, NULL);
INSERT INTO `log` VALUES (56, 1, 'Berhasil menghapus data kriteria dengan id = 9', NULL, NULL);
INSERT INTO `log` VALUES (57, 1, 'Berhasil menghapus data kriteria dengan id = 10', NULL, NULL);
INSERT INTO `log` VALUES (58, 1, 'Berhasil menghapus data kriteria dengan id = 11', NULL, NULL);
INSERT INTO `log` VALUES (59, 1, 'Berhasil menghapus data kriteria dengan id = 12', NULL, NULL);
INSERT INTO `log` VALUES (60, 1, 'Berhasil menambahkan data sub kriteria dengan id = 46', NULL, NULL);
INSERT INTO `log` VALUES (61, 1, 'Berhasil menghapus data verifikasi dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (62, 1, 'Berhasil menghapus data verifikasi dengan id = 2', NULL, NULL);
INSERT INTO `log` VALUES (63, 1, 'Berhasil menghapus data verifikasi dengan id = 3', NULL, NULL);
INSERT INTO `log` VALUES (64, 1, 'Berhasil menghapus data verifikasi dengan id = 4', NULL, NULL);
INSERT INTO `log` VALUES (65, 1, 'Berhasil menghapus data verifikasi dengan id = 5', NULL, NULL);
INSERT INTO `log` VALUES (66, 1, 'Berhasil menghapus data warga dengan id = 211', NULL, NULL);
INSERT INTO `log` VALUES (67, 1, 'Berhasil menghapus data warga dengan id = 212', NULL, NULL);
INSERT INTO `log` VALUES (68, 1, 'Berhasil menambahkan data warga dengan id = 106', NULL, NULL);
INSERT INTO `log` VALUES (69, 1, 'Berhasil menghapus data warga dengan id = 106', NULL, NULL);
INSERT INTO `log` VALUES (70, 1, 'Berhasil menambahkan data warga dengan id = 107', NULL, NULL);
INSERT INTO `log` VALUES (71, 1, 'Berhasil menghapus data warga dengan id = 107', NULL, NULL);
INSERT INTO `log` VALUES (72, 1, 'Berhasil menambahkan data warga dengan id = 106', NULL, NULL);
INSERT INTO `log` VALUES (73, 1, 'Berhasil menambahkan data warga dengan id = 106', NULL, NULL);
INSERT INTO `log` VALUES (74, 1, 'Berhasil menghapus data warga dengan id = 106', NULL, NULL);
INSERT INTO `log` VALUES (75, 1, 'Berhasil menambahkan data warga dengan id = 107', NULL, NULL);
INSERT INTO `log` VALUES (76, 1, 'Berhasil mengubah data warga dengan id = 107', NULL, NULL);
INSERT INTO `log` VALUES (77, 1, 'Berhasil mengubah data warga dengan id = 107', NULL, NULL);
INSERT INTO `log` VALUES (78, 1, 'Berhasil menghapus data warga dengan id = 107', NULL, NULL);
INSERT INTO `log` VALUES (79, 1, 'Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = 1', NULL, NULL);
INSERT INTO `log` VALUES (80, 1, 'Berhasil menambahkan data pengumuman dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (81, 1, 'Berhasil logout', NULL, NULL);
INSERT INTO `log` VALUES (82, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (83, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (84, 1, 'Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = 2', NULL, NULL);
INSERT INTO `log` VALUES (85, 1, 'Berhasil mengubah data verifikasi dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (86, 1, 'Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = 1', NULL, NULL);
INSERT INTO `log` VALUES (87, 1, 'Berhasil menghapus data pengumuman dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (88, 1, 'Berhasil menambahkan data pengumuman dengan id = 2', NULL, NULL);
INSERT INTO `log` VALUES (89, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (90, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (91, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (92, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (93, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (94, 1, 'Berhasil logout', NULL, NULL);
INSERT INTO `log` VALUES (95, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (96, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (97, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (98, 1, 'Berhasil login', NULL, NULL);
INSERT INTO `log` VALUES (99, 1, 'Berhasil menghapus data verifikasi dengan id = 1', NULL, NULL);
INSERT INTO `log` VALUES (100, 1, 'Berhasil menghapus data verifikasi dengan id = 5', NULL, NULL);
INSERT INTO `log` VALUES (101, 1, 'Berhasil menghapus data verifikasi dengan id = 4', NULL, NULL);
INSERT INTO `log` VALUES (102, 1, 'Berhasil menghapus data verifikasi dengan id = 3', NULL, NULL);
INSERT INTO `log` VALUES (103, 1, 'Berhasil menghapus data verifikasi dengan id = 2', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for objektif
-- ----------------------------
DROP TABLE IF EXISTS `objektif`;
CREATE TABLE `objektif`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_objektif` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `value_objektif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bobot_objektif` int NOT NULL,
  `warga_id` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `warga_id`(`warga_id` ASC) USING BTREE,
  CONSTRAINT `objektif_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 316 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of objektif
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pengumuman
-- ----------------------------
DROP TABLE IF EXISTS `pengumuman`;
CREATE TABLE `pengumuman`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_pengumuman` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_pengumuman` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `status_pengumuman` enum('buka','tutup') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota_pengumuman` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penilaian_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pengumuman_penilaian_id_foreign`(`penilaian_id` ASC) USING BTREE,
  CONSTRAINT `pengumuman_penilaian_id_foreign` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengumuman
-- ----------------------------
INSERT INTO `pengumuman` VALUES (2, 'Pengumuman bantuan sosial', 'My pengumuman', '2022-06-07', 'buka', '35', 1, '2022-06-13 18:11:56', '2022-06-13 18:11:56');

-- ----------------------------
-- Table structure for penilaian
-- ----------------------------
DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal_penilaian` date NOT NULL,
  `judul_penilaian` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penilaian_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `penilaian_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penilaian
-- ----------------------------
INSERT INTO `penilaian` VALUES (1, '2021-11-01', 'Kuisioner Haris Munandar', 1, NULL, NULL);
INSERT INTO `penilaian` VALUES (2, '2021-11-02', 'Kuisioner Dewi Aprianti', 1, NULL, NULL);
INSERT INTO `penilaian` VALUES (3, '2021-11-03', 'Kuisioner Martina', 1, NULL, NULL);
INSERT INTO `penilaian` VALUES (4, '2021-11-04', 'Kuisioner Aida fitri', 1, NULL, NULL);
INSERT INTO `penilaian` VALUES (5, '2021-11-05', 'Kuisiner Sri Wahyuni', 1, NULL, NULL);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_profile` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_profile` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `users_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `profile_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `profile_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (1, 'Bima Ega', 'L', '082277506232', 'my alamat', 'default.png', 1, NULL, NULL);

-- ----------------------------
-- Table structure for sub_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `sub_kriteria`;
CREATE TABLE `sub_kriteria`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_sub_kriteria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sub_kriteria` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_sub_kriteria` enum('1','3','5','7','9') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_sub_kriteria` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kriteria_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sub_kriteria_kriteria_id_foreign`(`kriteria_id` ASC) USING BTREE,
  CONSTRAINT `sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_kriteria
-- ----------------------------
INSERT INTO `sub_kriteria` VALUES (1, 'S001', '<= 56000', '9', NULL, 2, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (2, 'S002', '<= 1120000', '7', NULL, 2, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (3, 'S003', '<= 1680000', '5', NULL, 2, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (4, 'S004', '<= 2240000', '3', NULL, 2, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (5, 'S005', '<= 2800000', '1', NULL, 2, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (6, 'S006', 'belum kawin', '1', NULL, 1, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (7, 'S007', 'kawin', '3', NULL, 1, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (8, 'S008', 'cerai hidup', '5', NULL, 1, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (9, 'S009', 'cerai mati', '7', NULL, 1, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (10, 'S010', '1-2', '1', NULL, 3, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (11, 'S011', '3-4', '3', NULL, 3, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (12, 'S012', '> 4', '5', NULL, 3, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (13, 'S013', '26 - 35', '1', NULL, 4, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (14, 'S014', '36 - 45', '3', NULL, 4, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (15, 'S015', '46 - 55', '5', NULL, 4, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (16, 'S016', '56 - 65', '7', NULL, 4, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (17, 'S017', '> 65', '9', NULL, 4, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (18, 'S018', 'slta/sederajat', '1', NULL, 5, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (19, 'S019', 'sltp/sederajat', '3', NULL, 5, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (20, 'S020', 'sd/sederajat', '5', NULL, 5, NULL, NULL);
INSERT INTO `sub_kriteria` VALUES (21, 'S021', 'tidak tamat', '7', NULL, 5, NULL, NULL);

-- ----------------------------
-- Table structure for sub_kriteria_warga
-- ----------------------------
DROP TABLE IF EXISTS `sub_kriteria_warga`;
CREATE TABLE `sub_kriteria_warga`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `warga_id` int UNSIGNED NOT NULL,
  `sub_kriteria_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sub_kriteria_warga_warga_id_foreign`(`warga_id` ASC) USING BTREE,
  INDEX `sub_kriteria_warga_sub_kriteria_id_foreign`(`sub_kriteria_id` ASC) USING BTREE,
  CONSTRAINT `sub_kriteria_warga_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sub_kriteria_warga_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 211 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_kriteria_warga
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `forgot` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `level` enum('admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `status` enum('aktif','non aktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$12$Eb2iBTTabWyNpVrPBufY9eYfb2gR6kux02tGgbrTtEbaczIT0WrxK', NULL, 'admin', 'aktif', 'EM8Cxbj9hV1HFRlSTxGW4LbUN8eCFHEzbUQ2U2MVuR8JsEwRpRIJXo9guKtJ', '2021-10-01 23:20:46', '2021-10-01 23:20:46');

-- ----------------------------
-- Table structure for verifikasi_data
-- ----------------------------
DROP TABLE IF EXISTS `verifikasi_data`;
CREATE TABLE `verifikasi_data`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `judul_verifikasi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status_verifikasi` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of verifikasi_data
-- ----------------------------

-- ----------------------------
-- Table structure for warga
-- ----------------------------
DROP TABLE IF EXISTS `warga`;
CREATE TABLE `warga`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_warga` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_warga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pernikahan_warga` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_warga` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilansuami_warga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penghasilanistri_warga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penghasilanpribadi_warga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `totalpenghasilan_warga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggungan_warga` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_warga` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikanterakhir_warga` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi_data_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `verifikasi_data_id`(`verifikasi_data_id` ASC) USING BTREE,
  CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`verifikasi_data_id`) REFERENCES `verifikasi_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 106 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warga
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
