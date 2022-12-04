/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : spkeputusan

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 21/07/2022 11:25:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alternatif
-- ----------------------------
DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE `alternatif`  (
  `id_alternatif` int NOT NULL AUTO_INCREMENT,
  `kd_alternatif` int NOT NULL,
  `nama_alternatif` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nilai_alternatif` float NOT NULL,
  `id_keputusan` int NOT NULL,
  `id_user` int NOT NULL,
  `nisn_alternatif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk_alternatif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tglLahir_alternatif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas_alternatif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jurusan_alternatif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahunMasuk_alternatif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_alternatif`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alternatif
-- ----------------------------
INSERT INTO `alternatif` VALUES (0, 4, 'ojan', 0, 30, 1, '123 ', 'Laki-Laki', '1996-10-12', 'XII', 'Teknik Komputer dan Jaringan', '2023');
INSERT INTO `alternatif` VALUES (9, 0, 'Titik Temu', 0, 20, 5, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (13, 1, 'Lombongo', 0.535832, 23, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (14, 2, 'Puncak Hutan Pinus Dulamayo', 0.783333, 23, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (15, 3, 'Pulau Diyonumo', 0.83958, 23, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (16, 4, 'Pulau Cinta', 0.818331, 23, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (17, 1, 'Abdurrafi Yahya', 0.28196, 25, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (18, 2, 'Guntur Prakoso', 0.469934, 25, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (19, 3, 'Akil Niode', 1.4098, 25, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (20, 1, 'Reonaldi Patalangi', 0.876786, 26, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (21, 2, 'Zulhair Zidan', 0.777032, 26, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (22, 3, 'Mawan', 0.573891, 26, 7, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (23, 1, 'sda', 0, 21, 5, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (24, 1, 'Pantai Botutonuo', 0.662829, 27, 8, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (25, 2, 'Puncak Hutan Pinus Dulamayo', 0.850564, 27, 8, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (26, 3, 'Pantai Kurenai', 0.62453, 27, 8, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (27, 1, 'Eka Lestari', 0.369444, 28, 1, '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (28, 2, 'leo', 0.738889, 28, 1, '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (29, 3, 'dinda', 0.121111, 28, 1, '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (30, 1, 'Eka Lestari', 0.936608, 30, 1, '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (31, 2, 'aprilia', 0.59681, 30, 1, '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (32, 3, 'diah ayu', 0.841353, 30, 1, '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (33, 1, 'eka sayang', 0.878118, 31, 1, '111', 'Perempuan', '2022-04-07', 'XII', 'Teknik pengelasan', '2015');
INSERT INTO `alternatif` VALUES (34, 2, 'rio', 0.632789, 31, 1, '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (35, 3, 'sandy', 1, 31, 1, '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (37, 5, 'Anefia', 0, 30, 1, '1234321', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `alternatif` VALUES (38, 4, 'Reza Fabriza Lesmanaaa', 0, 31, 1, '123123', 'Perempuan', '2022-07-27', 'XII', 'Tata Busana', NULL);
INSERT INTO `alternatif` VALUES (39, 6, 'Joni pake i', 0, 30, 1, '987', 'Laki-Laki', '2017-06-13', 'XI', 'Tata Busana', '2015');
INSERT INTO `alternatif` VALUES (42, 1, 'Amarizky Yoga Pratama', 0, 0, 1, '987654321', 'Laki-Laki', '2022-07-27', 'XII', 'Tata Busana', '2015');
INSERT INTO `alternatif` VALUES (43, 1, 'Dimas Azrial Akbar', 0, 0, 1, '987654432', 'Laki-Laki', '2017-06-13', 'XI', 'Tata Busana', '2015');
INSERT INTO `alternatif` VALUES (68, 7, 'Black', 0, 30, 1, '123456', 'Laki-Laki', '2022-07-27', 'XII', 'Tata Busana', '2015');
INSERT INTO `alternatif` VALUES (69, 7, 'white', 0, 30, 1, '1234567', 'Perempuan', '2017-06-13', 'X', 'Tata Busana', '2015');

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `id_kriteria` int NOT NULL AUTO_INCREMENT,
  `kd_kriteria` int NOT NULL,
  `nama_kriteria` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `atribut` enum('keuntungan','biaya','','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bobot_kriteria` float NOT NULL,
  `id_keputusan` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_kriteria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 93 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES (42, 1, 'Jarak', '', 0.210109, 20, 5);
INSERT INTO `kriteria` VALUES (43, 2, 'Harga', '', 0.548816, 20, 5);
INSERT INTO `kriteria` VALUES (44, 3, 'Ketenaran', '', 0.241075, 20, 5);
INSERT INTO `kriteria` VALUES (47, 1, 'Jarak', '', 0.481481, 22, 5);
INSERT INTO `kriteria` VALUES (48, 4, 'Biaya', '', 0, 20, 5);
INSERT INTO `kriteria` VALUES (49, 2, 'Biaya', '', 0.314815, 22, 5);
INSERT INTO `kriteria` VALUES (50, 3, 'Fasilitas', '', 0.203704, 22, 5);
INSERT INTO `kriteria` VALUES (58, 2, 'Jarak dengan pusat kota', 'keuntungan', 0.224988, 23, 7);
INSERT INTO `kriteria` VALUES (59, 3, 'Biaya', '', 0.320839, 23, 7);
INSERT INTO `kriteria` VALUES (60, 1, 'Fasilitas', '', 0.454173, 23, 7);
INSERT INTO `kriteria` VALUES (61, 1, 'Ganteng', '', 0.128524, 25, 7);
INSERT INTO `kriteria` VALUES (63, 2, 'Keuangan', 'keuntungan', 0.186451, 25, 7);
INSERT INTO `kriteria` VALUES (64, 3, 'Karisma', 'keuntungan', 0.207829, 25, 7);
INSERT INTO `kriteria` VALUES (65, 4, 'Rajin Ibadah', 'keuntungan', 0.27303, 25, 7);
INSERT INTO `kriteria` VALUES (66, 5, 'Nyaman', 'keuntungan', 0.204166, 25, 7);
INSERT INTO `kriteria` VALUES (71, 1, 'Kelincahan', 'keuntungan', 0.374529, 26, 7);
INSERT INTO `kriteria` VALUES (72, 2, 'Kekuatan', 'keuntungan', 0.300446, 26, 7);
INSERT INTO `kriteria` VALUES (73, 3, 'Mental Pemain', 'keuntungan', 0.0785983, 26, 7);
INSERT INTO `kriteria` VALUES (74, 4, 'Harga', 'biaya', 0.246426, 26, 7);
INSERT INTO `kriteria` VALUES (75, 1, 'Jarak', 'keuntungan', 0.75094, 27, 8);
INSERT INTO `kriteria` VALUES (76, 2, 'Biaya Masuk', 'biaya', 0.24906, 27, 8);
INSERT INTO `kriteria` VALUES (77, 1, 'nilai', 'keuntungan', 0.533333, 28, 1);
INSERT INTO `kriteria` VALUES (79, 3, 'organisasi', 'keuntungan', 0.205556, 28, 1);
INSERT INTO `kriteria` VALUES (81, 4, 'prestasi', 'keuntungan', 0, 28, 1);
INSERT INTO `kriteria` VALUES (82, 1, 'Nilai rata-rata raport', 'keuntungan', 0.505165, 30, 1);
INSERT INTO `kriteria` VALUES (83, 2, 'Nilai US', 'keuntungan', 0.229519, 30, 1);
INSERT INTO `kriteria` VALUES (84, 3, 'Prestasi', 'keuntungan', 0.111711, 30, 1);
INSERT INTO `kriteria` VALUES (85, 4, 'Organisasi', 'keuntungan', 0.0661655, 30, 1);
INSERT INTO `kriteria` VALUES (86, 5, 'Sikap', 'keuntungan', 0.0437197, 30, 1);
INSERT INTO `kriteria` VALUES (87, 6, 'Kehadiran', 'keuntungan', 0.0437197, 30, 1);
INSERT INTO `kriteria` VALUES (90, 1, 'tanggung jawab', 'keuntungan', 0.681633, 31, 1);
INSERT INTO `kriteria` VALUES (91, 2, 'jujur', 'keuntungan', 0.236394, 31, 1);
INSERT INTO `kriteria` VALUES (92, 3, 'disiplin', 'keuntungan', 0.0819731, 31, 1);

-- ----------------------------
-- Table structure for pendukung_keputusan
-- ----------------------------
DROP TABLE IF EXISTS `pendukung_keputusan`;
CREATE TABLE `pendukung_keputusan`  (
  `id_keputusan` int NOT NULL AUTO_INCREMENT,
  `nama_keputusan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` int NOT NULL,
  `status` enum('belum','terisi','','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `konsis` enum('konsisten','tidak','','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_keputusan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pendukung_keputusan
-- ----------------------------
INSERT INTO `pendukung_keputusan` VALUES (21, 'Pemain Terbaik', 'Mencari pemain sepak bola terbaik BASICA FC', 5, 'terisi', 'konsisten');
INSERT INTO `pendukung_keputusan` VALUES (23, 'Tempat Wisata', 'Menentukan tempat wisata terbaik di kota Gorontalo', 7, 'terisi', 'konsisten');
INSERT INTO `pendukung_keputusan` VALUES (25, 'Gebetan Terbaik', 'Menentukan siapakah gebetan terbaik yang pantas dijadikan pacars', 7, 'terisi', 'konsisten');
INSERT INTO `pendukung_keputusan` VALUES (26, 'Pemain Terbaik 2', '', 7, 'terisi', 'konsisten');
INSERT INTO `pendukung_keputusan` VALUES (27, 'Tempat Wisata Gorontalo', 'tempat wisata di provinsi gorontalo', 8, 'terisi', 'konsisten');
INSERT INTO `pendukung_keputusan` VALUES (30, 'lulusan terbaik', 'Menentukan siswa lulusan terbaik', 1, 'terisi', 'konsisten');
INSERT INTO `pendukung_keputusan` VALUES (31, 'karyawan terbaik', 'Menentukan karyawan terbaik', 1, 'terisi', 'konsisten');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `peran` enum('user','admin','','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
