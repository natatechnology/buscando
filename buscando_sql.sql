-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para buscando
CREATE DATABASE IF NOT EXISTS `buscando` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `buscando`;

-- Volcando estructura para tabla buscando.desaparecidos
CREATE TABLE IF NOT EXISTS `desaparecidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `publicado_por` int NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_residencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discapacidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ultimo_avistamiento` date NOT NULL,
  `nombre_contacto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_contacto` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_contacto` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ult_actualizacion_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `soft_delete` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla buscando.desaparecidos: ~3 rows (aproximadamente)
DELETE FROM `desaparecidos`;
INSERT INTO `desaparecidos` (`id`, `publicado_por`, `foto`, `nombre`, `fecha_nacimiento`, `sexo`, `direccion_residencia`, `discapacidad`, `ultimo_avistamiento`, `nombre_contacto`, `telefono_contacto`, `whatsapp_contacto`, `ult_actualizacion_id`, `created_at`, `updated_at`, `soft_delete`) VALUES
	(1, 1, 'storage/fotos/OfFKdwSCBnATDJs2DNyrBDXiACLYGU6xLtk3tl1r.png', 'Juan Perez', '1992-02-10', 'H', 'Santo Domingo, Republica Dominicana', '["2","3"]', '2024-06-12', 'Mario Perez', '8095442222', '8095445555', 1, '2024-06-16 03:07:49', '2024-06-22 10:27:27', '2024-06-22 10:27:27'),
	(2, 1, 'storage/fotos/r8FG9lKqJZRRuCcVN6KVzC69i0Knu26EzwgnRs8T.png', 'Mercedes Rodriguez', '1996-12-15', 'M', 'Bonao, Republica Dominicana', '["2"]', '2024-06-10', 'Maria Rodriguez', '8095445555', '8095445555', 1, '2024-06-16 04:16:17', '2024-06-22 16:41:57', NULL),
	(3, 2, 'storage/fotos/CuYSLsKMkeD3UwUNlIa9dGvfTgO8BNS7axR85KXt.jpg', 'Elon Musk Perez', '1989-03-15', 'H', 'San Juan de la Magúana', '["2","3"]', '2024-06-19', 'Julio Perez', '8095445555', '8095445555', 2, '2024-06-22 16:28:38', '2024-06-22 16:33:01', '2024-06-22 16:33:01');

-- Volcando estructura para tabla buscando.discapacidades
CREATE TABLE IF NOT EXISTS `discapacidades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ult_actualizacion_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `soft_delete` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla buscando.discapacidades: ~5 rows (aproximadamente)
DELETE FROM `discapacidades`;
INSERT INTO `discapacidades` (`id`, `nombre`, `ult_actualizacion_id`, `created_at`, `updated_at`, `soft_delete`) VALUES
	(1, 'Discapacidad visual', 1, NULL, NULL, NULL),
	(2, 'Discapacidad auditiva', 1, NULL, NULL, NULL),
	(3, 'Discapacidad motora', 1, NULL, NULL, NULL),
	(4, 'Discapacidad intelectual', 1, NULL, NULL, NULL),
	(5, 'Discapacidad psicosocial', 1, NULL, NULL, NULL);

-- Volcando estructura para tabla buscando.discapacidads
CREATE TABLE IF NOT EXISTS `discapacidads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ult_actualizacion_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `soft_delete` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla buscando.discapacidads: ~5 rows (aproximadamente)
DELETE FROM `discapacidads`;
INSERT INTO `discapacidads` (`id`, `nombre`, `ult_actualizacion_id`, `created_at`, `updated_at`, `soft_delete`) VALUES
	(1, 'Discapacidad visual', 1, '2024-06-15 04:00:00', NULL, NULL),
	(2, 'Discapacidad auditiva', 1, '2024-06-15 04:00:00', NULL, NULL),
	(3, 'Discapacidad motora', 1, '2024-06-15 04:00:00', NULL, NULL),
	(4, 'Discapacidad intelectual', 1, '2024-06-15 04:00:00', NULL, NULL),
	(5, 'Discapacidad psicosocial', 1, '2024-06-15 04:00:00', NULL, NULL);

-- Volcando estructura para tabla buscando.failed_jobs
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

-- Volcando datos para la tabla buscando.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;

-- Volcando estructura para tabla buscando.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla buscando.migrations: ~8 rows (aproximadamente)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2014_10_12_000000_create_users_table', 1),
	(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(7, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(10, '2024_06_15_134326_create_sessions_table', 1),
	(14, '2024_06_15_022525_create_desaparecidos_table', 2),
	(15, '2024_06_15_224047_create_discapacidads_table', 2);

-- Volcando estructura para tabla buscando.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla buscando.password_reset_tokens: ~0 rows (aproximadamente)
DELETE FROM `password_reset_tokens`;

-- Volcando estructura para tabla buscando.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla buscando.personal_access_tokens: ~0 rows (aproximadamente)
DELETE FROM `personal_access_tokens`;

-- Volcando estructura para tabla buscando.sessions
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

-- Volcando datos para la tabla buscando.sessions: ~3 rows (aproximadamente)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('pCMNo8zCm2lfQval5oDYcvstFfVcYuId4aXQWH0g', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkZkRVo3MDVvdzVrcHpybUUxTzNqUHU4bkdUU2VJNlJqeGg0R2xlViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9idXNjYW5kby50ZXN0Ijt9fQ==', 1719037965),
	('tqaGAdmsUAsDT9wfpnLog09fbhynn1PIhwBUnJ2N', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaFZKR2Z5eGtpdDlTV0RET0RsNzhFbURSa0RQNmVzT0tHRHdlbk1wcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9idXNjYW5kby50ZXN0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQvRkwyU2hWWEZxNXJaU1huU3VodnplSlZvMXc1MUFhS1o1UXBrRkliaWNXLkhzVkxCL1NVYSI7fQ==', 1719060378);

-- Volcando estructura para tabla buscando.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `rol` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `soft_delete` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla buscando.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `rol`, `updated_by`, `created_at`, `updated_at`, `soft_delete`) VALUES
	(1, 'Natanael Capellan', 'natanaelcapellang@gmail.com', NULL, '$2y$12$/FL2ShVXFq5rZSXnSuhvzeJVo1w51AaKZ5QpkFIbicW.HsVLB/SUa', NULL, NULL, NULL, 'CGauKs1Cl0L1MR6j0YFli6r8UQzeR5G8vzZF29ralOCGvIjqBGN4dJ4Bh95a', NULL, NULL, NULL, NULL, NULL, '2024-06-15 17:45:04', '2024-06-15 17:45:04', NULL),
	(2, 'Juan Perez', 'juan@perez.com', NULL, '$2y$12$0t9LN0tFUAY850833bFVKuZqZpOBCFh1ms2zddlYKp/SCU5oQZ7r2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-22 16:26:44', '2024-06-22 16:26:44', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
