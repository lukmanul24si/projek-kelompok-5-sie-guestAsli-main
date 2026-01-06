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


-- Dumping database structure for laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;

-- Dumping structure for table laravel.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cache: ~0 rows (approximately)

-- Dumping structure for table laravel.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laravel.detail_pesanan
CREATE TABLE IF NOT EXISTS `detail_pesanan` (
  `detail_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pesanan_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `harga_satuan` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_pesanan_pesanan_id_foreign` (`pesanan_id`),
  KEY `detail_pesanan_produk_id_foreign` (`produk_id`),
  CONSTRAINT `detail_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE,
  CONSTRAINT `detail_pesanan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.detail_pesanan: ~0 rows (approximately)

-- Dumping structure for table laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravel.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.jobs: ~0 rows (approximately)

-- Dumping structure for table laravel.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.job_batches: ~0 rows (approximately)

-- Dumping structure for table laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~19 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_user_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_10_15_001420_create_pelanggan_table', 1),
	(5, '2025_10_21_085641_create_umkm_table', 1),
	(6, '2025_10_28_103313_create_sessions_table', 1),
	(7, '2025_11_05_005731_create_products_table', 1),
	(8, '2025_11_12_013301_create_warga_table', 1),
	(9, '2025_11_12_023136_add_status_to_produk_table', 1),
	(10, '2025_11_26_105734_add_profile_picture_to_users_table', 1),
	(11, '2025_11_26_110605_add_files_to_pelanggan_table', 1),
	(12, '2025_11_26_113808_update_gender_column_in_pelanggan_table', 1),
	(13, '2025_12_09_121333_add_role_column_on_users_table', 1),
	(14, '2025_12_15_120000_create_pesanan_table', 1),
	(15, '2025_12_15_120100_create_detail_pesanan_table', 1),
	(16, '2025_12_15_120200_create_ulasan_produk_table', 1),
	(17, '2014_10_12_100000_create_password_resets_table', 2),
	(18, '2025_11_18_091742_create_reservations_table', 2),
	(19, '2025_11_26_061954_add_bukti_bayar_to_reservations_table', 2);

-- Dumping structure for table laravel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_resets: ~0 rows (approximately)

-- Dumping structure for table laravel.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `pelanggan_id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pelanggan_id`),
  UNIQUE KEY `pelanggan_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.pelanggan: ~1 rows (approximately)
INSERT INTO `pelanggan` (`pelanggan_id`, `first_name`, `last_name`, `birthday`, `gender`, `email`, `phone`, `files`, `created_at`, `updated_at`) VALUES
	(2, 'Asep', 'Human', '2006-03-18', 'Laki-laki', 'opul@gmail.coom', '808967678', NULL, '2025-12-31 21:23:53', '2025-12-31 21:24:13');

-- Dumping structure for table laravel.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `pesanan_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor_pesanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warga_id` bigint unsigned NOT NULL,
  `total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'baru',
  `alamat_kirim` text COLLATE utf8mb4_unicode_ci,
  `rt` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_bayar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pesanan_id`),
  UNIQUE KEY `pesanan_nomor_pesanan_unique` (`nomor_pesanan`),
  KEY `pesanan_warga_id_foreign` (`warga_id`),
  CONSTRAINT `pesanan_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`warga_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.pesanan: ~0 rows (approximately)

-- Dumping structure for table laravel.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `produk_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `umkm_id` bigint unsigned NOT NULL,
  `nama_produk` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(15,2) NOT NULL,
  `stok` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`produk_id`),
  KEY `produk_umkm_id_foreign` (`umkm_id`),
  CONSTRAINT `produk_umkm_id_foreign` FOREIGN KEY (`umkm_id`) REFERENCES `umkm` (`umkm_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.produk: ~1 rows (approximately)
INSERT INTO `produk` (`produk_id`, `umkm_id`, `nama_produk`, `deskripsi`, `harga`, `stok`, `status`, `foto_produk`, `created_at`, `updated_at`) VALUES
	(2, 2, 'Nasi Goreng', NULL, 12000.00, 100, 'aktif', NULL, '2025-12-31 21:31:44', '2025-12-31 21:31:52');

-- Dumping structure for table laravel.reservations
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.reservations: ~0 rows (approximately)

-- Dumping structure for table laravel.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('3vrChFRaQ1iypQy3TzqBzexLlVo3vaQhye7qsu23', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOVNvR1dEUGpsRlRvS3ZHSXVFb2JkSWNkT0lwNWtuc2I1S2pZWVhyViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRoIjtzOjU6InJvdXRlIjtzOjQ6ImF1dGgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTA6Imxhc3RfbG9naW4iO086MjU6IklsbHVtaW5hdGVcU3VwcG9ydFxDYXJib24iOjM6e3M6NDoiZGF0ZSI7czoyNjoiMjAyNi0wMS0wNSAxMTo0OTowMi41ODc5ODgiO3M6MTM6InRpbWV6b25lX3R5cGUiO2k6MztzOjg6InRpbWV6b25lIjtzOjM6IlVUQyI7fX0=', 1767615030),
	('qGQAHeqGZQc3fGXskj7KV08cfcgHmuR0iMA7ePfN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicEc4NGlsRVFwWlpGZldNT0ppUnVaSmFsanRUeWZvZVlZUlFUVG4xRyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi93YXJnYSI7czo1OiJyb3V0ZSI7czoxNzoiYWRtaW4ud2FyZ2EuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTA6Imxhc3RfbG9naW4iO086MjU6IklsbHVtaW5hdGVcU3VwcG9ydFxDYXJib24iOjM6e3M6NDoiZGF0ZSI7czoyNjoiMjAyNi0wMS0wMSAwNDoxODoxOS40NTQyNzIiO3M6MTM6InRpbWV6b25lX3R5cGUiO2k6MztzOjg6InRpbWV6b25lIjtzOjM6IlVUQyI7fX0=', 1767242719);

-- Dumping structure for table laravel.ulasan_produk
CREATE TABLE IF NOT EXISTS `ulasan_produk` (
  `ulasan_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `produk_id` bigint unsigned NOT NULL,
  `warga_id` bigint unsigned NOT NULL,
  `rating` tinyint unsigned NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ulasan_id`),
  KEY `ulasan_produk_produk_id_foreign` (`produk_id`),
  KEY `ulasan_produk_warga_id_foreign` (`warga_id`),
  CONSTRAINT `ulasan_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE,
  CONSTRAINT `ulasan_produk_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`warga_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.ulasan_produk: ~0 rows (approximately)

-- Dumping structure for table laravel.umkm
CREATE TABLE IF NOT EXISTS `umkm` (
  `umkm_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_usaha` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik_warga_id` bigint unsigned NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `logo_foto_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`umkm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.umkm: ~1 rows (approximately)
INSERT INTO `umkm` (`umkm_id`, `nama_usaha`, `pemilik_warga_id`, `alamat`, `rt`, `rw`, `kategori`, `kontak`, `deskripsi`, `logo_foto_usaha`, `created_at`, `updated_at`) VALUES
	(2, 'Warung Tegal', 11, 'jl limbungan', '11', '12', 'Kecil', '871987291', 'Menjual berbagai Makanan', 'umkm/1767241588_afe620b0-ee96-4eab-be91-3139c9c1d538.jpg', '2025-12-31 21:26:29', '2025-12-31 21:30:40');

-- Dumping structure for table laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `first_name`, `email`, `password`, `role`, `created_at`, `updated_at`, `profile_picture`) VALUES
	(1, 'Admin', 'admin@gmail.com', '$2y$12$La0b7Gspm/LqVEMq6ugtnuoFBhuNAy29IgjOpxkcx2S1PfWXpTBDm', 'Super Admin', '2025-12-29 06:11:52', '2025-12-29 06:11:52', NULL),
	(2, 'Opul Manusia', 'naufal24si@yahoo.com', '$2y$12$s5fDer0BN68jgNK0Ru./feZ2K1pbCvAh3NUxMKV6uh/3bS9c0BXAa', 'Super Admin', '2025-12-29 07:07:00', '2025-12-31 21:31:05', NULL);

-- Dumping structure for table laravel.warga
CREATE TABLE IF NOT EXISTS `warga` (
  `warga_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`warga_id`),
  UNIQUE KEY `warga_no_ktp_unique` (`no_ktp`),
  UNIQUE KEY `warga_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.warga: ~2 rows (approximately)
INSERT INTO `warga` (`warga_id`, `no_ktp`, `nama`, `jenis_kelamin`, `agama`, `pekerjaan`, `telp`, `email`) VALUES
	(1, '1212121', 'asdasdasdas', 'Laki-laki', 'Islam', 'dsadasdas', '23123123', 'rewrwe@gmail.com'),
	(2, '534634', 'asdasdasdas', 'Laki-laki', 'Islam', 'Islam', '23123123', 'sdksldk@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
