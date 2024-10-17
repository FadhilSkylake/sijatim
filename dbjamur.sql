-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dbjamur
CREATE DATABASE IF NOT EXISTS `dbjamur` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbjamur`;

-- Dumping structure for table dbjamur.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table dbjamur.migrations: ~7 rows (approximately)
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2024-09-10-035602', 'App\\Database\\Migrations\\Pemesanan', 'default', 'App', 1727245324, 1),
	(2, '2024-09-25-132035', 'App\\Database\\Migrations\\Users', 'default', 'App', 1727245324, 1),
	(3, '2024-09-28-055623', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1727503001, 2),
	(4, '2024-10-07-015000', 'App\\Database\\Migrations\\Pesanan', 'default', 'App', 1728266210, 3),
	(7, '2024-10-07-015744', 'App\\Database\\Migrations\\CreateDetailPesananTable', 'default', 'App', 1728268131, 4),
	(8, '2024-10-07-033446', 'App\\Database\\Migrations\\CreateOrdersTable', 'default', 'App', 1728272197, 5),
	(9, '2024-10-07-033459', 'App\\Database\\Migrations\\CreateOrderItemsTable', 'default', 'App', 1728272197, 5);

-- Dumping structure for table dbjamur.news
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(50) DEFAULT NULL,
  `isi_berita` text,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbjamur.news: ~0 rows (approximately)
INSERT INTO `news` (`id_news`, `judul_berita`, `isi_berita`) VALUES
	(1, 'Yogi Kawin', 'Yogi kawin dengan tiang listrik'),
	(2, 'Yogi Kawin', 'Yogi kawin dengan tiang listrik'),
	(3, 'jhsfdjsahf', 'mhfsaaesfesad'),
	(4, 'test', 'test');

-- Dumping structure for table dbjamur.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `berat_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stok_barang` int NOT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table dbjamur.produk: ~0 rows (approximately)
INSERT INTO `produk` (`id_produk`, `nama_barang`, `harga_barang`, `berat_barang`, `stok_barang`) VALUES
	(13, 'Jamur', '23', '23', 23);

-- Dumping structure for table dbjamur.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','konsumen') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'konsumen',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table dbjamur.users: ~4 rows (approximately)
INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'fadhil', 'fadhil1023@gmail.com', '$2y$10$S3H.idhZf2G7JmBqyIFFPuQyRMLwQP7BNDJ7uWV8CIf5lzU.h3gwe', 'konsumen', NULL, NULL),
	(2, 'reggi33', 'regii@gmail.com', '$2y$10$Bg8eqXxDSeX2OHgbuu4VZ.Me8P2QTZovHaGwhhWVDaQrkkT9vqkUu', 'konsumen', NULL, NULL),
	(4, 'regggy', 'bebek123@gmail.com', '$2y$10$fSywhJBMXEt8h173nrKdEeXFxS16P28jc2zQ0yx.bxPQaBzTn13iy', 'konsumen', NULL, NULL),
	(6, 'bebek sinjay', 'sinjay@gmail.com', '$2y$10$dM5AM3dmG387hqy3.sgun.vbCpI3csak8U3Im62Jo/yWfjWZv25DG', 'admin', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
