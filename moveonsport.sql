-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla moveonsport.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.cache: ~102 rows (aproximadamente)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-prevent_duplicate_044ef6c81913a55b96d5019e9df6ea7c', 'b:1;', 1774150510),
	('laravel-cache-prevent_duplicate_063b01063df03968a5772be5dcfd97ae', 'b:1;', 1774139788),
	('laravel-cache-prevent_duplicate_091fcca306964ca206dbb7bc2450fc8c', 'b:1;', 1774143200),
	('laravel-cache-prevent_duplicate_0cdba6d4ba11a64db7c74f4d258d5af1', 'b:1;', 1774139786),
	('laravel-cache-prevent_duplicate_1407cd8b552497ce3a50a1c483a7061c', 'b:1;', 1774146007),
	('laravel-cache-prevent_duplicate_1476b00ee316f81692c927c2d9a57325', 'b:1;', 1774142876),
	('laravel-cache-prevent_duplicate_148d55c69aadb48e77b7603f84739913', 'b:1;', 1774147457),
	('laravel-cache-prevent_duplicate_149fd19c1516bc11b3b5e187faa0ecc2', 'b:1;', 1774142961),
	('laravel-cache-prevent_duplicate_173658edbf44fdf089e17253c8b1cf0a', 'b:1;', 1774140508),
	('laravel-cache-prevent_duplicate_17804cfe2d17c07f2a84bb722c41de25', 'b:1;', 1774222374),
	('laravel-cache-prevent_duplicate_188b6d3f9043fcc725f6212c77b4cf80', 'b:1;', 1774148549),
	('laravel-cache-prevent_duplicate_188d2232c504216afb912c583929d40d', 'b:1;', 1774208729),
	('laravel-cache-prevent_duplicate_190122b7d93604e6bdbb56422bdea4df', 'b:1;', 1774149564),
	('laravel-cache-prevent_duplicate_190f75ae0febdf2366e23af03137c796', 'b:1;', 1774147358),
	('laravel-cache-prevent_duplicate_19b36354ae06206a9f7c01e4877ee1f1', 'b:1;', 1774222060),
	('laravel-cache-prevent_duplicate_1ea1d34c1d72eed59aef61fa4f61873c', 'b:1;', 1774147827),
	('laravel-cache-prevent_duplicate_1eb747ef96acfabe8fdfda4aabb4272f', 'b:1;', 1774156877),
	('laravel-cache-prevent_duplicate_1f074c0ffe42866a63e5ee5bc2bd00d5', 'b:1;', 1774140986),
	('laravel-cache-prevent_duplicate_1ff0e193e1927a715ff02f280a378821', 'b:1;', 1774222088),
	('laravel-cache-prevent_duplicate_2070bb65e8f3a7154905433d2bc660e7', 'b:1;', 1774147247),
	('laravel-cache-prevent_duplicate_309c5f3200cdbf535ea27242b940d795', 'b:1;', 1774220556),
	('laravel-cache-prevent_duplicate_3c32ff6169e96159b92d1b4adc0f6f6e', 'b:1;', 1774149726),
	('laravel-cache-prevent_duplicate_446959170232fa5b93e6aea2ba4c1707', 'b:1;', 1774149491),
	('laravel-cache-prevent_duplicate_4698b2f8f0b041511ae8957b25a3e1f2', 'b:1;', 1774148452),
	('laravel-cache-prevent_duplicate_4cf9708706692d884f971c7a919d5c03', 'b:1;', 1774147744),
	('laravel-cache-prevent_duplicate_4d2cdffad2360c51e62b553ec3f9d0b2', 'b:1;', 1774140635),
	('laravel-cache-prevent_duplicate_4f7d9796061b7e21dfdb9b3c243fc984', 'b:1;', 1774146467),
	('laravel-cache-prevent_duplicate_538c1a9d2f13eac7cf5bb0638f810930', 'b:1;', 1774144653),
	('laravel-cache-prevent_duplicate_54b89f93f992e28a74a315b142449ac9', 'b:1;', 1774147155),
	('laravel-cache-prevent_duplicate_5b69c8bae6e20ceb419daa62181a4647', 'b:1;', 1774222355),
	('laravel-cache-prevent_duplicate_5e47c5c84c84be7ec862ea0046bc3bde', 'b:1;', 1774148264),
	('laravel-cache-prevent_duplicate_5f1735eed803c0d7ad389655adfe248e', 'b:1;', 1774220172),
	('laravel-cache-prevent_duplicate_600f07c05b7e0deaac5ddb17706dd1e0', 'b:1;', 1774149996),
	('laravel-cache-prevent_duplicate_65ce5b0e5e76ab67a76e06a8a4d40452', 'b:1;', 1774143085),
	('laravel-cache-prevent_duplicate_67c03f886f4c74e0c2b189f1580e157c', 'b:1;', 1774149867),
	('laravel-cache-prevent_duplicate_67e1edf6dd7336513fcfab973890f84a', 'b:1;', 1774146105),
	('laravel-cache-prevent_duplicate_69ab0540b9932ae0f5fe34a2cf48558c', 'b:1;', 1774139765),
	('laravel-cache-prevent_duplicate_6c68fcdfe8ad34eda2b24659efc16a37', 'b:1;', 1774150229),
	('laravel-cache-prevent_duplicate_6db5854ebc977e533dd160520a149033', 'b:1;', 1774148060),
	('laravel-cache-prevent_duplicate_6f55ed996f8061f25cb758e148ef3f03', 'b:1;', 1774223478),
	('laravel-cache-prevent_duplicate_6f8af7222904aa0b6beffc6b33bb3b38', 'b:1;', 1774144731),
	('laravel-cache-prevent_duplicate_70639e0ed4f1a95ec9725e86a9d3dbdd', 'b:1;', 1774139780),
	('laravel-cache-prevent_duplicate_729ffd75723911f5f12d272a54b1676e', 'b:1;', 1774222083),
	('laravel-cache-prevent_duplicate_74cc60c62405b8f832ffcc1878df232d', 'b:1;', 1774139783),
	('laravel-cache-prevent_duplicate_7963e57350b1e80398c5cabb1fb7641d', 'b:1;', 1774219897),
	('laravel-cache-prevent_duplicate_7c883efdc8e2f368492c9b0555a7a947', 'b:1;', 1774140753),
	('laravel-cache-prevent_duplicate_8036f77ecea195b32823984eee51779c', 'b:1;', 1774223435),
	('laravel-cache-prevent_duplicate_806a400ee6b702d493eb470e6ca11e2e', 'b:1;', 1774146551),
	('laravel-cache-prevent_duplicate_81430fbee8455dba770e993d8810ae86', 'b:1;', 1774149633),
	('laravel-cache-prevent_duplicate_84b2d2d632782785e2c9f24c8d70de90', 'b:1;', 1774148365),
	('laravel-cache-prevent_duplicate_865e259ae8dcf330aa94bd27eec532d1', 'b:1;', 1774149215),
	('laravel-cache-prevent_duplicate_88cbaa4cb1dd30cbb5a36037b1509c68', 'b:1;', 1774222364),
	('laravel-cache-prevent_duplicate_8c5386ea7ca34036e21c78028959f122', 'b:1;', 1774223448),
	('laravel-cache-prevent_duplicate_8d79b6dc6224538019449db576259805', 'b:1;', 1774060569),
	('laravel-cache-prevent_duplicate_9382bd5684947fff8a7270f4c3ee509c', 'b:1;', 1774149798),
	('laravel-cache-prevent_duplicate_9429704dc14af7e19188a217df55c2ea', 'b:1;', 1774222079),
	('laravel-cache-prevent_duplicate_94774f0869c85ff6e26cb7e0d7152f2f', 'b:1;', 1774147958),
	('laravel-cache-prevent_duplicate_98eb4fb01d5d96883db9d04d72b9ebb2', 'b:1;', 1774146387),
	('laravel-cache-prevent_duplicate_998c36d13bc903ea599a7977a4dedece', 'b:1;', 1774229448),
	('laravel-cache-prevent_duplicate_9a03cf9acffcb9bccce9a70b1b3c5fe4', 'b:1;', 1774140045),
	('laravel-cache-prevent_duplicate_9a4053880ffab5d98e5552770ca2d963', 'b:1;', 1774219918),
	('laravel-cache-prevent_duplicate_a0651ba99febaa1ccc3ad0c5b645653e', 'b:1;', 1774145668),
	('laravel-cache-prevent_duplicate_a756cf7514b690e8e8d3193620c52f34', 'b:1;', 1774150048),
	('laravel-cache-prevent_duplicate_a9854e5629ec05e3602c525e2d209d04', 'b:1;', 1774147587),
	('laravel-cache-prevent_duplicate_b0782ba774ccc5a299c2bc59f2c47923', 'b:1;', 1774144419),
	('laravel-cache-prevent_duplicate_b38e90131b53428cebe3ea158f5d09aa', 'b:1;', 1774149395),
	('laravel-cache-prevent_duplicate_b60926d4539cef40718d81b7465ff586', 'b:1;', 1774148809),
	('laravel-cache-prevent_duplicate_b86ab10dbb0c0bd8011ee3d71bdeb3f9', 'b:1;', 1774222063),
	('laravel-cache-prevent_duplicate_ba52e743a651f4e1bf70bbaf075c27a0', 'b:1;', 1774139775),
	('laravel-cache-prevent_duplicate_bc2ed46e8fdb6a072791bce1b0ee1ac2', 'b:1;', 1774143311),
	('laravel-cache-prevent_duplicate_bc6cfad8531623410815f449835ff7d8', 'b:1;', 1774144527),
	('laravel-cache-prevent_duplicate_c0b95c5a1b8a9029a30d60b6b6caf632', 'b:1;', 1774148118),
	('laravel-cache-prevent_duplicate_c232e6ad3e714231b7471f268c09e2d7', 'b:1;', 1774147671),
	('laravel-cache-prevent_duplicate_c33d9455a5e75aad34c3cfd5d5bfda2f', 'b:1;', 1774150436),
	('laravel-cache-prevent_duplicate_ca4c5057ebb21b217b16e09c19640266', 'b:1;', 1774149305),
	('laravel-cache-prevent_duplicate_cdbb7b4f4a3389fb60c62f1637cff133', 'b:1;', 1774222241),
	('laravel-cache-prevent_duplicate_ce6afcbf870f18097ad804a13087b20a', 'b:1;', 1774147891),
	('laravel-cache-prevent_duplicate_cf10b494e1f41c83ae87a02cbeed253a', 'b:1;', 1774208587),
	('laravel-cache-prevent_duplicate_cf3792c55f64221cd6070a3a3a333abb', 'b:1;', 1774139771),
	('laravel-cache-prevent_duplicate_d126923c415a6ae7229c195e1ab47eb1', 'b:1;', 1774221740),
	('laravel-cache-prevent_duplicate_d28be9f31b0287d17375283d3adc2977', 'b:1;', 1774149936),
	('laravel-cache-prevent_duplicate_d753162f5bcaa0594b482ed8551afcb7', 'b:1;', 1774150350),
	('laravel-cache-prevent_duplicate_d7ad59697bf6609f23df3d119d6df9a1', 'b:1;', 1774222071),
	('laravel-cache-prevent_duplicate_d8721aa27d727b6b2093504607b1cc51', 'b:1;', 1774139778),
	('laravel-cache-prevent_duplicate_ddfd59465e34671295c8ec8cc7b543c3', 'b:1;', 1774219817),
	('laravel-cache-prevent_duplicate_e162b565c34bc6de1f9519dbbdfee56b', 'b:1;', 1774222089),
	('laravel-cache-prevent_duplicate_e25346624c245fd4ee7b8c29a183f30a', 'b:1;', 1774144286),
	('laravel-cache-prevent_duplicate_e563df83251f6b8ff2b522c3fad366c4', 'b:1;', 1774220415),
	('laravel-cache-prevent_duplicate_e597bd5df076a06026510caf15d7dbd8', 'b:1;', 1774147043),
	('laravel-cache-prevent_duplicate_e5f2d0da551e3503c3cf953113fd049f', 'b:1;', 1774140874),
	('laravel-cache-prevent_duplicate_e891f940b58dac8fb1decd968a00d1a4', 'b:1;', 1774222096),
	('laravel-cache-prevent_duplicate_ebf5f86e0b70d56824e800a63780e37f', 'b:1;', 1774221691),
	('laravel-cache-prevent_duplicate_eca9c32dc1c9a39a9c221711adb8cdeb', 'b:1;', 1774146662),
	('laravel-cache-prevent_duplicate_ee7737e7c8774c28ce9a4541c23d4d7b', 'b:1;', 1774146934),
	('laravel-cache-prevent_duplicate_ef607355ef68d5ccb9fc2ecf66e422e0', 'b:1;', 1774139776),
	('laravel-cache-prevent_duplicate_ef7e6b608478297d827a97418e6a5ef5', 'b:1;', 1774150129),
	('laravel-cache-prevent_duplicate_f36eb4d01f3ab8ddde367ea3ebffdc0b', 'b:1;', 1774143768),
	('laravel-cache-prevent_duplicate_f3d98e778ac7669be5828838b4b9911d', 'b:1;', 1774222085),
	('laravel-cache-prevent_duplicate_f74abcbf937dacf83c29b977aa6108c4', 'b:1;', 1774148927),
	('laravel-cache-prevent_duplicate_f7b53d563384665fbe937fd6ae4ad820', 'b:1;', 1774220308),
	('laravel-cache-prevent_duplicate_ff7e74d4b21579de75c9124452ceb9d3', 'b:1;', 1774145883),
	('laravel-cache-prevent_duplicate_ffe39d12eddf7fa654ac955f9197226d', 'b:1;', 1774222087);

-- Volcando estructura para tabla moveonsport.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla moveonsport.carritos
CREATE TABLE IF NOT EXISTS `carritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `prenda_id` bigint(20) unsigned NOT NULL,
  `talla` varchar(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carritos_user_id_foreign` (`user_id`),
  KEY `carritos_prenda_id_foreign` (`prenda_id`),
  CONSTRAINT `carritos_prenda_id_foreign` FOREIGN KEY (`prenda_id`) REFERENCES `prendas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carritos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.carritos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla moveonsport.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `prenda_id` bigint(20) unsigned NOT NULL,
  `comentario` text NOT NULL,
  `calificacion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentarios_user_id_foreign` (`user_id`),
  KEY `comentarios_prenda_id_foreign` (`prenda_id`),
  CONSTRAINT `comentarios_prenda_id_foreign` FOREIGN KEY (`prenda_id`) REFERENCES `prendas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.comentarios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla moveonsport.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla moveonsport.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla moveonsport.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla moveonsport.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.migrations: ~26 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_02_26_005911_create_prendas_table', 1),
	(5, '2026_02_26_011539_add_role_to_users_table', 1),
	(6, '2026_02_26_011920_create_carritos_table', 1),
	(7, '2026_02_26_020558_add_profile_photo_to_users_table', 1),
	(8, '2026_03_09_164149_add_recovery_fields_to_users_table', 1),
	(9, '2026_03_10_183329_add_stock_to_prendas_table', 1),
	(10, '2026_03_10_185451_modify_prices_in_prendas_table', 1),
	(11, '2026_03_13_165815_add_tipo_to_prendas_table', 1),
	(12, '2026_03_15_225537_create_orders_table', 1),
	(13, '2026_03_15_225547_create_order_items_table', 1),
	(14, '2026_03_15_225625_create_orders_table', 2),
	(15, '2026_03_15_225626_create_order_items_table', 3),
	(16, '2026_03_15_232319_add_status_to_users_table', 3),
	(17, '2026_03_15_235953_add_2fa_to_users_table', 3),
	(18, '2026_03_19_020928_fix_orders_and_order_items_tables', 4),
	(19, '2026_03_19_044009_add_tenis_to_categoria_enum_in_prendas_table', 5),
	(20, '2026_03_19_045535_create_prenda_tallas_table', 6),
	(21, '2026_03_19_045801_add_talla_to_carritos_table', 7),
	(22, '2026_03_19_181204_migrate_tenis_category_to_subcategory', 8),
	(23, '2026_03_19_192634_update_orders_table_for_transfer_flow', 9),
	(24, '2026_03_19_195514_add_rechazado_to_orders_table', 10),
	(25, '2026_03_20_020416_create_comentarios_table', 11),
	(26, '2026_03_22_044600_create_variantes_producto_table', 12);

-- Volcando estructura para tabla moveonsport.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(255) NOT NULL,
  `estado_pago` enum('pendiente_pago','pendiente_verificacion','pagado','cancelado','rechazado') DEFAULT 'pendiente_pago',
  `referencia_bancaria` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `comprobante_pago` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.orders: ~16 rows (aproximadamente)
INSERT INTO `orders` (`id`, `user_id`, `total`, `metodo_pago`, `estado_pago`, `referencia_bancaria`, `payment_id`, `comprobante_pago`, `created_at`, `updated_at`) VALUES
	(1, 2, 499.98, 'transferencia', 'pagado', 'ORD-31WCZDUN', NULL, 'comprobantes/bqAXjlT51VRAHZPFtqqU6N18wgcWFjklYJy9UzB4.png', '2026-03-19 08:13:01', '2026-03-20 01:51:50'),
	(2, 2, 300.00, 'stripe', 'pagado', NULL, 'cs_test_a17NmBgsqN7jlaoetHxiYDhiAiLmA9fRQePBP0Eh3HkeaaGroMjR5I0MpM', NULL, '2026-03-19 09:48:59', '2026-03-19 09:50:32'),
	(3, 2, 499.98, 'paypal', 'pendiente_pago', NULL, '0VE61288HV101692R', NULL, '2026-03-19 09:50:52', '2026-03-19 09:50:56'),
	(4, 1, 4959.88, 'transferencia', 'pendiente_pago', 'ORD-AX6JNGKM', NULL, NULL, '2026-03-20 01:16:19', '2026-03-20 01:16:19'),
	(5, 2, 899.90, 'transferencia', 'pendiente_verificacion', 'ORD-7XH3PGW5', NULL, 'comprobantes/5IlELthmAKHOnfUGYukzTNaT4D0k0xWQi08bD5pP.png', '2026-03-20 01:33:01', '2026-03-20 02:07:14'),
	(6, 1, 499.98, 'transferencia', 'pendiente_pago', 'ORD-ONKU3SCE', NULL, 'comprobantes/0mgE8s6FpGNR2n3RyjHNaLGLy7TdF95g6ZKcyXxI.png', '2026-03-20 01:48:51', '2026-03-20 01:51:41'),
	(7, 2, 1200.00, 'transferencia', 'pagado', 'ORD-QAJGWSXD', NULL, 'comprobantes/rNr5vTm4CkA2YY79qabZUQzmPlcgrPheWIs8IGFG.png', '2026-03-20 01:50:02', '2026-03-20 01:51:12'),
	(8, 2, 399.92, 'transferencia', 'pendiente_verificacion', 'ORD-UYLBYCXF', NULL, 'comprobantes/hAUj22GYnIHkF40jlsUL3U6sVAfhIQ4E3vV2CXQ7.png', '2026-03-20 01:57:56', '2026-03-20 02:07:25'),
	(9, 2, 380.00, 'transferencia', 'pendiente_verificacion', 'ORD-UM0SJVTA', NULL, 'comprobantes/uVS7gn1NeBbwWHUo63OegVGkhed2wsG7BbbjqZXp.png', '2026-03-20 02:04:14', '2026-03-20 02:07:05'),
	(10, 2, 800.00, 'transferencia', 'pagado', 'ORD-Z1E4CH1J', NULL, 'comprobantes/k9oYomLTKnEe6VQ8nJhA3oXFY2pd0FECaZc0q25J.png', '2026-03-20 08:08:00', '2026-03-20 08:08:54'),
	(11, 2, 300.00, 'stripe', 'pagado', NULL, 'cs_test_a1pIjasot0yItv1BwnB8BdjbjM2vTR5PYha6HnbWkpruBJbO4SMVoG3C6n', NULL, '2026-03-20 08:19:45', '2026-03-20 08:21:08'),
	(14, 1, 1299.00, 'transferencia', 'pendiente_pago', 'ORD-CDGRUSJO', NULL, NULL, '2026-03-23 01:43:04', '2026-03-23 01:43:04'),
	(15, 1, 2100.00, 'stripe', 'pendiente_pago', NULL, 'cs_test_b1tiRu4UWwDNFLG07sxqsTvCwnPNBSTg2MTR8VEB6QoQ57jNNxrA24rT5F', NULL, '2026-03-23 05:31:13', '2026-03-23 05:31:25'),
	(16, 1, 2100.00, 'stripe', 'pagado', NULL, 'cs_test_b14aE1lnUlSNWJ1GxwboIzSIdeQEpboftANF5D0N3O9tmZLixkJzeORnTd', NULL, '2026-03-23 05:31:21', '2026-03-23 05:31:52'),
	(17, 2, 1299.00, 'stripe', 'pendiente_pago', NULL, 'cs_test_a1ND8rNN1kp9PqnEuNJ6GBc0UDEyBitFpdEybeHHWrLzVmNOoqPNAq6NaZ', NULL, '2026-03-23 05:32:41', '2026-03-23 05:32:42'),
	(18, 2, 1299.00, 'paypal', 'pagado', NULL, '54H976950J4862012', NULL, '2026-03-23 05:32:51', '2026-03-23 05:33:44');

-- Volcando estructura para tabla moveonsport.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `prenda_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `talla` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_prenda_id_foreign` (`prenda_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_prenda_id_foreign` FOREIGN KEY (`prenda_id`) REFERENCES `prendas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.order_items: ~7 rows (aproximadamente)
INSERT INTO `order_items` (`id`, `order_id`, `prenda_id`, `cantidad`, `precio`, `talla`, `created_at`, `updated_at`) VALUES
	(21, 14, 53, 1, 1299.00, NULL, '2026-03-23 01:43:04', '2026-03-23 01:43:04'),
	(22, 15, 65, 1, 1050.00, NULL, '2026-03-23 05:31:13', '2026-03-23 05:31:13'),
	(23, 15, 65, 1, 1050.00, 'G', '2026-03-23 05:31:13', '2026-03-23 05:31:13'),
	(24, 16, 65, 1, 1050.00, NULL, '2026-03-23 05:31:21', '2026-03-23 05:31:21'),
	(25, 16, 65, 1, 1050.00, 'G', '2026-03-23 05:31:21', '2026-03-23 05:31:21'),
	(26, 17, 53, 1, 1299.00, NULL, '2026-03-23 05:32:41', '2026-03-23 05:32:41'),
	(27, 18, 53, 1, 1299.00, NULL, '2026-03-23 05:32:51', '2026-03-23 05:32:51');

-- Volcando estructura para tabla moveonsport.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla moveonsport.prendas
CREATE TABLE IF NOT EXISTS `prendas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_venta` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `precio_compra` decimal(10,2) NOT NULL DEFAULT 0.00,
  `talla` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria` enum('hombre','mujer','accesorios') NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.prendas: ~58 rows (aproximadamente)
INSERT INTO `prendas` (`id`, `nombre`, `descripcion`, `precio_venta`, `stock`, `precio_compra`, `talla`, `color`, `imagen`, `categoria`, `tipo`, `created_at`, `updated_at`) VALUES
	(11, 'Playera Shadow Stealth', 'Diseño sólido en azul marino, ideal para entrenar.60% algodón + 40% PET (Reciclados)', 748.90, 10, 374.50, 'CH, M, G', 'Azul Marino', 'prendas/VcO4mRLnEFx2JKgVR98L8mnxXshVPk6Atm6OtgWo.png', 'hombre', 'Playeras', '2026-03-22 06:48:25', '2026-03-22 06:48:25'),
	(12, 'Playera verde ecológica', 'Tonos verdes vibrantes con patrones geométricos.\r\n60% algodón + 40% PET (Reciclados)', 948.89, 10, 474.50, 'CH, M, G, XG', 'Verde', 'prendas/N0oIAH5bVKUyBhc7DWHlY3bt8rkKHpeLDqAujAgU.png', 'hombre', 'Playeras', '2026-03-22 06:50:32', '2026-03-22 06:50:32'),
	(13, 'Shadow Grid Tee', 'Playera técnica en color gris carbón con paneles laterales negros. Cuenta con un gráfico frontal geométrico de líneas blancas que forman un patrón de cuadrícula y logotipo blanco mate. Fabricada en tela transpirable de alto rendimiento.', 760.00, 7, 380.00, 'CH, M, G', 'Gris', 'prendas/2w0ReaLyZdmB9MmRpOlX7l4y630HIHJOsAZksiDc.png', 'hombre', 'Playeras', '2026-03-22 06:52:30', '2026-03-22 06:52:30'),
	(14, 'Playera Slate Cyber-Grid', 'Diseño vibrante con corona rojo borgoña, paneles superiores naranjas y paneles laterales negros con costuras de contraste amarillas. Logotipo blanco mate. Fabricada en tela transpirable de alto rendimiento.', 684.95, 5, 342.50, 'CH, M, G', 'Roja con franjas negras y naranja', 'prendas/gzSh92pJXknJzQAYGFD1Qf24ip3InNO57vLmPK9z.png', 'hombre', 'Playeras', '2026-03-22 06:54:31', '2026-03-22 06:54:31'),
	(15, 'Playera  Deep Cobalt Neon', 'Estética ciberdeportiva con corona azul marino profundo, paneles laterales negros y costuras de contraste en verde lima vibrante. Logotipo blanco mate. Fabricada en tela transpirable de alto rendimiento.', 749.00, 6, 374.50, 'CH, M, G', 'Azul con franjas negras', 'prendas/COLKdttA3bec5ASHXkMlQX1t6uDfqI7QIRw7yxw5.png', 'hombre', 'Playeras', '2026-03-22 06:56:23', '2026-03-22 06:56:23'),
	(16, 'Playera Purple Nitro', 'Degradados púrpuras y rosas de textura suave.\r\n60% algodón + 40% PET (Reciclados)', 909.99, 10, 455.00, 'CH, M, G', 'Morado', 'prendas/KoVGaH7wzUwGNfdwdqekfQ2JcDVnbMBV2Pjx7bgA.png', 'mujer', 'Playeras', '2026-03-22 07:27:53', '2026-03-22 07:27:53'),
	(17, 'Playera Scarlet Core Essential', 'Color rojo intenso, resistente para actividad física.\r\n60% algodón + 40% PET (Reciclados)', 694.93, 6, 347.50, 'CH, M, G', 'Rojo', 'prendas/vnMxIHKp84zhNlAIQ4PSFSwEYYKobLXXigkNkRqU.png', 'mujer', 'Playeras', '2026-03-22 07:29:18', '2026-03-22 07:29:18'),
	(18, 'Playera Arctic Blue Strike', 'Base oscura con detalles en celeste, versátil y cómoda.\r\n60% algodón + 40% PET (Reciclados)', 879.96, 7, 440.00, 'CH, M, G', 'Celeste', 'prendas/OxATsSKsFelQ7dlSeOYASwojRsZ1wOqqejtwgqL7.png', 'mujer', 'Playeras', '2026-03-22 07:31:22', '2026-03-22 07:31:22'),
	(19, 'Playera Emerald Fusion', 'Degradados púrpuras y rosas de textura suave.\r\n60% algodón + 40% PET (Reciclados)', 919.98, 5, 460.00, 'CH, M', 'Verde', 'prendas/yNIfWoNnDYfoNhUQKa55Bg7VKhxYggefIO3ks43W.png', 'mujer', 'Playeras', '2026-03-22 07:33:17', '2026-03-22 07:33:17'),
	(20, 'Playera Striker Obsidian', 'Color rojo intenso, resistente para actividad física.\r\n60% algodón + 40% PET (Reciclados)', 884.98, 8, 442.98, 'CH, M, G', 'Negro', 'prendas/iIuTztqCM6ngmwfEW7eknJVW9A9KXbGIjjtxz9fz.png', 'mujer', 'Playeras', '2026-03-22 07:35:08', '2026-03-22 07:35:08'),
	(21, 'Playera  Cobalt Shadow', 'Base oscura con detalles en celeste, versátil y cómoda.\r\n60% algodón + 40% PET (Reciclados)', 849.97, 9, 425.00, 'CH, M, G, XG', 'Azul Bajo', 'prendas/Nqj3HVGsR3KDPtA5Bd06klzB7iggd9wBUz1af6Hy.png', 'mujer', 'Playeras', '2026-03-22 07:42:45', '2026-03-22 07:42:45'),
	(22, 'Lavender Frost Track Jacket', 'Ligera con tecnología térmica de baja densidad, ideal para calentamientos en climas frescos.\r\n60% algodón + 40% PET (Reciclados)', 1150.00, 8, 575.00, 'CH, M, G, XG', 'Morada con gris', 'prendas/4dqznWT2jDAjo3z6fgl4x6qUPl8D6cQFKBolOG18.png', 'hombre', 'Sudaderas', '2026-03-22 07:51:23', '2026-03-22 07:51:23'),
	(23, 'Crimson Slate Commander', 'Estructura ergonómica con paneles laterales de ventilación y puños elásticos reforzados para mayor durabilidad\r\n.60% algodón + 40% PET (Reciclados)', 1280.00, 10, 640.00, 'CH, M, G, XG', 'Rojo con gris', 'prendas/vGC2Rd6BAYFIwrMc0aN22EV8h4loSsAChOKW5gjR.png', 'hombre', 'Sudaderas', '2026-03-22 07:53:36', '2026-03-22 07:53:36'),
	(24, 'Ruby Stealth Pro', 'Capa exterior repelente al agua y costuras planas de seguridad para evitar rozaduras durante el movimiento intenso.\r\n60% algodón + 40% PET (Reciclados)', 1195.00, 10, 598.00, 'CH, M, G, XG', 'Roja', 'prendas/SbhMsGJkDGwpV0XTP8OuGupe2ZzDPAfNkSNtv0NV.png', 'mujer', 'Sudaderas', '2026-03-22 07:55:24', '2026-03-22 07:55:24'),
	(25, 'Midnight Amethyst Long Sleeve', 'Tejido elástico en cuatro direcciones con compresión ligera para optimizar la circulación durante el ejercicio.\r\n60% algodón + 40% PET (Reciclados)', 785.00, 8, 392.50, 'CH, M, G, XG', 'Morado fuerte', 'prendas/41N57uKqGICzfwaEjrNbq8b2w2LKeKUluyL34HpL.png', 'hombre', 'Playeras', '2026-03-22 07:57:30', '2026-03-22 07:57:30'),
	(26, 'Royal Azure Track Jacket', 'Cierre completo con acabado satinado técnico y bolsillos laterales ocultos para un perfil aerodinámico.\r\n60% algodón + 40% PET (Reciclados)', 1180.00, 11, 590.00, 'CH, M, G, XG', 'Azul Fuerte', 'prendas/t1FXcwtRt50ukPKCCdlKwKNeP7xIj5MVs3Cm6iYy.png', 'mujer', 'Sudaderas', '2026-03-22 08:14:25', '2026-03-22 08:14:25'),
	(27, 'Rose Quartz Elements', 'Confeccionada con fibra transpirable de secado rápido, ideal tanto para entrenamiento funcional como para uso casual.\r\n60% algodón + 40% PET (Reciclados)', 1210.00, 10, 605.00, 'CH, M, G', 'Rosa Pastel', 'prendas/kZTRDZ3O5aZI1Nn8vvy9nKYOsinTOTGlKqy6EdBY.png', 'mujer', 'Sudaderas', '2026-03-22 08:18:00', '2026-03-22 08:18:00'),
	(28, 'Navy Stealth Short', 'Diseñado para el máximo confort y durabilidad. Composición: 60% algodón + 40% PET (Reciclados). Ideal para un rendimiento sostenible.', 680.00, 12, 340.00, 'CH, M, G, XG', 'Azul Marino', 'prendas/GPfW5rGGI4uJCVcA29qUj12MhTS4vXgwuVGXEUdL.png', 'hombre', 'Pans y Short', '2026-03-22 08:20:04', '2026-03-22 08:20:04'),
	(29, 'Burgundy Commander Short', 'Estructura ligera y transpirable. Composición: 60% algodón + 40% PET (Reciclados). La mezcla perfecta entre suavidad natural y resistencia técnica.', 680.00, 12, 340.00, 'CH, M, G, XG', 'Rojo', 'prendas/95n0mjW5KXPNZ6iUH5TdR7kx64aETijEC4lRNtK0.png', 'hombre', 'Pans y Short', '2026-03-22 08:21:42', '2026-03-22 08:21:42'),
	(30, 'Forest Prime Short', 'Cintura elástica ergonómica. Composición: 60% algodón + 40% PET (Reciclados). Moda deportiva consciente con el medio ambiente.', 680.00, 10, 340.00, 'CH, M, G, XG', 'Verde', 'prendas/VoRO0bURmG87piFrCZjMM1afRTHml0jwYtk8MrnV.png', 'hombre', 'Pans y Short', '2026-03-22 08:26:24', '2026-03-22 08:26:24'),
	(31, 'Charcoal Grip Short', 'Construcción de alto rendimiento para entrenamientos pesados. Composición: 60% algodón + 40% PET (Reciclados). Máxima resistencia con impacto ambiental mínimo.', 680.00, 10, 340.00, 'CH, M, G, XG', 'Gris', 'prendas/KHjHRRgteG0QL0Cg5fGqH0g9zxTeNi7NEXxMo6Fk.png', 'hombre', 'Pans y Short', '2026-03-22 08:27:44', '2026-03-22 08:27:44'),
	(32, 'Blue Lightning Tech', 'Tejido ultraligero que permite una ventilación constante. Composición: 60% algodón + 40% PET (Reciclados). Comodidad superior para el día a día o el gym.', 680.00, 10, 340.00, 'CH, M, G, XG', 'Celeste', 'prendas/LDsPzuNNwanpL3FubpKbHnXiy7PmEI0mJXXRBPQB.png', 'hombre', 'Pans y Short', '2026-03-22 08:29:08', '2026-03-22 08:29:08'),
	(33, 'Pink Chaos Strike', 'Diseño asimétrico de edición limitada. Composición: 60% algodón + 40% PET (Reciclados). Estilo disruptivo sin sacrificar la sostenibilidad.', 720.00, 10, 360.00, 'CH, M, G, XG', 'Rosa Fuerte', 'prendas/Q87dH0uiQE0907lf8ei4tPXNASKGxkI6D61puFI8.png', 'mujer', 'Pans y Short', '2026-03-22 08:30:59', '2026-03-22 08:30:59'),
	(34, 'Cobalt Track Jogger', 'Un diseño clásico y versátil para calentamientos o uso diario.\r\n·70% poliéster reciclado (PET)\r\n30% algodón reciclado', 1480.00, 15, 740.00, 'CH, M, G, XG', 'Azul Fuerte', 'prendas/8diV0Laz84T8YYFkcEaWvrr7ANz7bBpCR302EWfp.png', 'hombre', 'Pans y Short', '2026-03-22 08:35:31', '2026-03-22 08:35:31'),
	(35, 'Crimson Commander Jogger', 'Una pieza declaración de intenciones, ideal para un look dinámico y potente.Materiales:\r\n·70% poliéster reciclado (PET)\r\n·30% algodón reciclado', 1550.00, 15, 775.00, 'CH, M, G, XG', 'Rojo', 'prendas/Yo1RK30X4VKxubWmJ69eAcKpC1MVDXL6c27iACef.png', 'hombre', 'Pans y Short', '2026-03-22 08:37:20', '2026-03-22 08:37:20'),
	(36, 'Slate Stealth Jogger', 'Con paneles laterales negros que estilizan y costuras reforzadas para un estilo más táctico.Materiales:\r\n·70% poliéster reciclado (PET)\r\n30% algodón reciclado', 1510.00, 10, 755.00, 'CH, M, G, XG', 'Gris', 'prendas/jpXek0byGEuBY9mCfssKQTuR1RsdefIrzej62b7d.png', 'mujer', 'Pans y Short', '2026-03-22 08:39:12', '2026-03-22 08:39:12'),
	(37, 'Jogger - Urban Shadow Model', 'Mezcla de grises técnicos con paneles de contraste negros y logo blanco.\r\nMateriales:\r\n·70% poliéster reciclado (PET)\r\n30% algodón reciclado', 1050.00, 10, 525.00, 'CH, M, G, XG', 'Gris', 'prendas/IKFJlo40cAVDoaazEX1nAixeXm0gIe80taWizMdQ.png', 'hombre', 'Pans y Short', '2026-03-22 08:40:44', '2026-03-22 08:40:44'),
	(38, 'Toasted Adventure', 'Base color rojo borgoña intenso con paneles laterales en color arena y acentos marrón tierra. Logo blanco.\r\nMateriales:\r\n·70% poliéster reciclado (PET)\r\n·30% algodón reciclado', 1120.00, 12, 560.00, 'CH, M, G, XG', 'Rojo', 'prendas/VjzN8dcc0i2AKmRLsvyhjiD9Tbwta0Zj15wIbpzF.png', 'hombre', 'Pans y Short', '2026-03-22 08:42:35', '2026-03-22 08:42:35'),
	(39, 'Night Emerald', 'Base negro mate profundo con paneles laterales de contraste en verde esmeralda y oliva. Logo blanco.\r\nMateriales:\r\n·70% poliéster reciclado (PET)\r\n30% algodón reciclado', 1180.00, 10, 590.00, 'CH, M, G, XG', 'Verde', 'prendas/L801G9s9YnMohrXtc8BTvgUZe7VwlVDkEB2UgtDi.png', 'mujer', 'Pans y Short', '2026-03-22 08:44:14', '2026-03-22 08:44:14'),
	(40, 'Ice Phantom', 'Base color blanco nítido con franjas laterales y pretina de contraste en gris carbón. Incluye logo negro de zorro y cordón blanco.\r\nMateriales:\r\n·70% poliéster reciclado (PET)\r\n30% algodón reciclado', 1080.00, 10, 540.00, 'CH, M, G, XG', 'Blanco', 'prendas/iQe2v68RVPXplUdUSnAuhA6BDmwKAaWmMQ7fsoc0.png', 'mujer', 'Pans y Short', '2026-03-22 08:46:24', '2026-03-22 08:46:24'),
	(41, 'Onyx Stryker', 'Base color negro profundo con franjas laterales y pretina de contraste en gris carbón. Incluye logo blanco de zorro y cordón negro.\r\nMateriales:\r\n·70% poliéster reciclado (PET)\r\n·30% algodón reciclado', 1210.00, 10, 605.00, 'CH, M, G, XG', 'Negro', 'prendas/9XphOUrgRyFXTr4xLiYDWe61wFYpbECotC1dlFxU.png', 'mujer', 'Pans y Short', '2026-03-22 08:47:48', '2026-03-22 08:47:48'),
	(42, 'Onyx Stryker', 'Base color negro profundo con franjas laterales y pretina de contraste en gris carbón. Incluye logo blanco de zorro y cordón negro.\r\nMateriales:\r\n·70% poliéster reciclado (PET)\r\n·30% algodón reciclado', 1210.00, 10, 605.00, 'CH, M, G, XG', 'Negro', 'prendas/DovYzz8n4N40KxJgnueOMAyrdas6AgTWYXnv0F5Q.png', 'hombre', 'Pans y Short', '2026-03-22 08:49:01', '2026-03-22 08:49:01'),
	(43, 'Panda Spirit Cap', 'Base de corona blanca con visera negra de contraste. Logotipo negro mate. Fabricada con 100% algodón reciclado y visera reforzada con PET reciclado.', 1150.00, 20, 575.00, 'N/A', 'Blanca con negro', 'prendas/7GHHNyo627zfzltXkqoqHIhL3qgAetxRacIoWku7.png', 'accesorios', 'Gorras', '2026-03-22 08:50:24', '2026-03-22 08:50:24'),
	(44, 'Crimson Net Cap', 'Corona color borgoña intenso con panel trasero de malla negra para transpirabilidad. Visera negra y logotipo negro mate. Fabricada con 100% algodón reciclado y visera reforzada con PET reciclado.', 1280.00, 20, 640.00, 'N/A', 'Vino con negro', 'prendas/1zgMeBA3BiDl63CAyUnLFjA4PEiSuohufNQA4S8x.png', 'accesorios', 'Gorras', '2026-03-22 08:51:28', '2026-03-22 08:51:28'),
	(45, 'Snow Stealth Cap', 'Diseño monocromático totalmente blanco. Logotipo blanco mate para un efecto sutil. Fabricada con 100% algodón reciclado y visera reforzada con PET reciclado.', 1090.00, 20, 545.00, 'N/A', 'Blanca', 'prendas/DbD2KZhE2OEcnfFVKo2Lkb4VNybHtlAe0hbutlDk.png', 'accesorios', 'Gorras', '2026-03-22 08:52:35', '2026-03-22 08:52:35'),
	(46, 'Dark Forest Net Cap', 'Corona verde bosque oscuro con panel trasero de malla negra. Visera verde oscuro y logotipo negro mate. Fabricada con 100% algodón reciclado y visera reforzada con PET reciclado.', 1250.00, 20, 625.00, 'N/A', 'Gris con verde', 'prendas/dZldi57WbvE9HNhVzGufXQ5BFFjEKzlG4rvDvxPK.png', 'accesorios', 'Gorras', '2026-03-22 08:54:17', '2026-03-22 08:54:17'),
	(47, 'Onyx MST Cap', 'Gorra totalmente negra. Cuenta con el logotipo negro mate en el frente y la sigla "MST" bordada en hilo blanco/plata en el panel lateral. Fabricada con 100% algodón reciclado y visera reforzada con PET reciclado.', 1290.00, 20, 645.00, 'N/A', 'Negro', 'prendas/A4V8VoE1KX39Y9pmIKUJ82Ppl4RJIwRZ1gXIoSUd.png', 'accesorios', 'Gorras', '2026-03-22 08:55:15', '2026-03-22 08:55:15'),
	(48, 'Pure White Runner', 'Calzado deportivo íntegramente en color blanco con suela ergonómica a tono y logotipo lateral en contraste negro.', 1090.00, 16, 545.00, '24, 25, 26, 27', 'Blanco', 'prendas/qHbXw7RNd5BLRvaiBz6jiP235qQlROpoXYqZgnNS.png', 'mujer', 'Tenis', '2026-03-22 08:57:41', '2026-03-23 05:00:12'),
	(49, 'Cobalt Velocity', 'Diseño en azul cobalto vibrante con suela blanca y detalles de logotipo en negro mate.', 1150.00, 16, 575.00, '24, 25, 26, 27', 'Azul Fuerte', 'prendas/nhnzFz6YSUHIpnnrJBdhRsNlji9HBAkZcO34sdzH.png', 'hombre', 'Tenis', '2026-03-22 08:59:22', '2026-03-23 04:58:25'),
	(50, 'Purple Ultra', 'Base color púrpura intenso con detalles de costuras y líneas de diseño resaltadas, suela blanca y logotipo negro.', 1220.00, 17, 610.00, '23,5, 24, 24,5, 25', 'Purpura', 'prendas/4xzmJsWKBq4wBnw8BbpsU0Lds88gRQICwrZ2t0nF.png', 'mujer', 'Tenis', '2026-03-22 09:00:49', '2026-03-23 05:21:28'),
	(51, 'Teniss A12', 'Materiales:\r\n·Upper: PET reciclado\r\n·Plantilla: espuma reciclada\r\n·Suela: caucho natural + reciclado', 1220.00, 17, 610.00, '24, 25, 26, 27', 'Verde', 'prendas/bLl30wbc0ilsJr3SrDdRATsUSbGvNpY8l6ZYh69B.png', 'hombre', 'Tenis', '2026-03-22 09:02:26', '2026-03-23 05:02:34'),
	(52, 'Tennis Beinch', 'Material: PET reciclado + caucho natural reforzado\r\nDescripción: Alto rendimiento deportivo.', 1099.00, 20, 550.00, '23,5, 24, 24,5, 25, 25,5', 'Beige', 'prendas/67EU1k5DFbpfATxFzI9loAr1nrRqogGn5SNMKI32.png', 'mujer', 'Tenis', '2026-03-22 09:13:34', '2026-03-23 05:22:17'),
	(53, 'Tenis premium eco', 'Material: PET reciclado + espuma premium\r\n Descripción: Más comodidad.', 1299.00, 20, 649.99, 'CH, M, G, XG', 'Negro', 'prendas/hOwgBSFiNRynf1nq4cs1XYpr2u9YW8V4ARojoJOK.png', 'hombre', 'Tenis', '2026-03-22 09:15:02', '2026-03-22 09:15:02'),
	(54, 'Tenis premium eco', 'Material: PET reciclado + espuma premium\r\nDescripción: Más comodidad.', 1299.00, 20, 650.00, '23,5, 24, 24,5, 25, 25,3, 26', 'Negro', 'prendas/IKtgJnUle73EqH3NYSJrOMRHgvqHom49GQh86Ede.png', 'mujer', 'Tenis', '2026-03-22 09:16:32', '2026-03-23 04:50:14'),
	(55, 'Navy Flare Bottle', 'Botella en azul marino mate con una franja diagonal naranja vibrante y logotipo de zorro en gris. Tapa de seguridad con cordón de agarre.', 1050.00, 10, 525.00, 'N/A', 'Azul con estampado naranja', 'prendas/gS9A8WP1vNYlVAbhPjDxIYh6x5V1QmJiRxoa6Ykv.png', 'accesorios', 'Botellas', '2026-03-22 09:18:08', '2026-03-22 09:18:08'),
	(56, 'Silver Cyan Bottle', 'Cuerpo en color plata metálico con una banda diagonal en azul cian texturizado. Incluye pitillo/popote integrado en la tapa y logotipo en gris.', 1120.00, 10, 560.00, 'N/A', 'Gris con estampado celeste', 'prendas/lwo9XfAbz7px6I3LmbJiRuAzVK6pIXv3PCWs6tVt.png', 'accesorios', 'Botellas', '2026-03-22 09:19:21', '2026-03-22 09:19:21'),
	(57, 'Carbon Crimson Bottle', 'Acabado negro mate con una franja diagonal en rojo profundo. Diseño ergonómico con logotipo de zorro en gris y tapón de rosca reforzado.', 1080.00, 10, 540.00, 'N/A', 'Negro con estampado rojo', 'prendas/ghx56eIsto2lJF5X8oLICB5cDanbDiCaDRM6gKqr.png', 'accesorios', 'Botellas', '2026-03-22 09:20:30', '2026-03-22 09:20:30'),
	(58, 'Stealth Onyx Bottle', 'Diseño minimalista totalmente en negro mate con el logotipo de zorro en gris al centro. Estética limpia y profesional con tapa de alta resistencia.', 1020.00, 10, 510.00, 'N/A', 'Negro', 'prendas/EZe3WKdoGnPeUtCNpwlV6qcGDVCVri9NldyC5oAA.png', 'accesorios', 'Botellas', '2026-03-22 09:22:03', '2026-03-22 09:22:03'),
	(59, 'Shadow Stealth Duffle', 'Bolsa de lona técnica en negro mate profundo con paneles frontales y laterales de contraste en negro satinado. Cuenta con un gran compartimento principal, compartimento para calzado ventilado y bolsillo lateral de acceso rápido. Logotipo blanco mate. Fabricada en tela transpirable de alto rendimiento.', 1090.00, 10, 545.00, 'N/A', 'Negro', 'prendas/KMPKNJmqmpnZxBUHYt7TXrAOwnbNv1bssJdGqzUO.png', 'accesorios', 'Mochilas', '2026-03-22 09:23:15', '2026-03-22 09:23:15'),
	(60, 'Glacier Rush Duffle', 'Diseño limpio y moderno en blanco nítido con corona de contraste en gris carbón y paneles laterales grises. Presenta costuras de contraste en verde lima vibrante y logotipo blanco mate. Ofrece organización interna avanzada y bolsillo frontal de acceso rápido. Fabricada en poliéster de alta resistencia.', 1180.00, 10, 590.00, 'N/A', 'Gris', 'prendas/I3hv6GFhPS6qBcYfJJCVBSFA4Ksqj6uuuckJPbID.png', 'accesorios', 'Mochilas', '2026-03-22 09:24:24', '2026-03-22 09:24:24'),
	(61, 'Azure Velocity Pack', 'Mochila técnica en azul marino profundo con paneles frontales y laterales de contraste en azul cian vibrante. Cuenta con múltiples compartimentos, funda para laptop acolchada y panel trasero transpirable. Logotipo blanco mate. Fabricada en poliéster de alta resistencia.', 1050.00, 10, 525.00, 'N/A', 'azul', 'prendas/xgKEA5D5l7zKH18bkFrgAnCmEfrKUwGnhN9z3xxy.png', 'accesorios', 'Mochilas', '2026-03-22 09:25:33', '2026-03-22 09:25:33'),
	(62, 'Onyx Strike Pack', 'Diseño sigiloso con corona negra mate y paneles laterales negros brillantes. Presenta costuras de contraste en verde lima vibrante y logotipo blanco mate. Ofrece organización interna avanzada y bolsillo frontal de acceso rápido. Fabricada en tela transpirable de alto rendimiento.', 1150.00, 10, 575.00, 'N/A', 'Negro', 'prendas/ak8jUblLyL02TQ4OWRcAAIL4kODxlAxdR7ZXHGJs.png', 'accesorios', 'Mochilas', '2026-03-22 09:26:33', '2026-03-22 09:26:33'),
	(63, 'Cyber Surge Pack', 'Estética ciberdeportiva con corona azul marino profundo, paneles laterales negros y costuras de contraste en verde lima vibrante. Incluye correas de compresión laterales, sistema de sujeción para bastones y logotipo blanco mate. Fabricada en tela transpirable de alto rendimiento.', 1220.00, 10, 610.00, 'N/A', 'Negra', 'prendas/MhLYGWAHm7s7YY4wS6Qk7aPY1el9aGhPPUKQ0YeC.png', 'accesorios', 'Mochilas', '2026-03-22 09:27:25', '2026-03-22 09:27:25'),
	(64, 'Heritage Cobalt Pack', 'Diseño clásico y atemporal con corona azul marino profundo y detalles en cuero marrón tostado. Cuenta con un patrón de cuadrícula sutil en el panel frontal y paneles laterales de contraste en azul cian. Ofrece organización interna premium y logotipo blanco mate. Fabricada en tela transpirable de alto rendimiento.', 1290.00, 10, 645.00, 'N/A', 'Azul', 'prendas/Ps8DVTLGZ23SYdgT4Nj1OEwx0PPT2LF97B7gD0CT.png', 'accesorios', 'Mochilas', '2026-03-22 09:28:46', '2026-03-22 09:28:46'),
	(65, 'Navy Training Set', 'Conjunto de dos piezas en azul marino profundo. Incluye playera de corte atlético con cuello redondo y shorts de compresión a tono, ambos con el logotipo en contraste.', 1050.00, 10, 525.00, 'CH, M, G, XG', 'Azul Marino', 'prendas/rq6XEVJUAwZpicBcBJxq3IBU96cQDj20QdG03udc.png', 'mujer', 'Conjuntos', '2026-03-22 09:30:26', '2026-03-22 09:30:26'),
	(66, 'White Cloud Hoodie Set', 'Conjunto deportivo femenino en color blanco puro. Compuesto por una sudadera ligera con cierre frontal, capucha y bolsillos laterales, acompañada de shorts deportivos a juego.', 1180.00, 10, 590.00, 'CH, M, G, XG', 'Blanco', 'prendas/gjnkS5Mz434wL8hpUqDxeK2BP7vIRTcHLOuoqjIu.png', 'mujer', 'Conjuntos', '2026-03-22 09:32:27', '2026-03-22 09:32:27'),
	(67, 'Pure Snow Tracksuit', 'Traje de entrenamiento completo en blanco nítido. Incluye chamarra con cremallera y pants de corte ajustado con puños elásticos, diseñados para un look limpio y profesional.', 1250.00, 10, 625.00, 'CH, M, G, XG', 'Blanco', 'prendas/0rUgyqnxnp8PUe9O9ae9AQSYLNQ8VUPPZYd8OlWe.png', 'hombre', 'Conjuntos', '2026-03-22 09:33:53', '2026-03-22 09:33:53'),
	(68, 'Cyber Neo Tracksuit', 'Conjunto técnico en gris carbón con gráficos dinámicos en azul neón y verde lima. Chamarra con detalles de alta visibilidad y pants con paneles laterales a juego.', 1290.00, 10, 645.00, 'CH, M, G, XG', 'Gris', 'prendas/UzBJV2I58PtUaDFPxPGVFlRqbAuIzSJxHzq4K0hk.png', 'hombre', 'Conjuntos', '2026-03-22 09:35:07', '2026-03-22 09:35:07');

-- Volcando estructura para tabla moveonsport.prenda_tallas
CREATE TABLE IF NOT EXISTS `prenda_tallas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prenda_id` bigint(20) unsigned NOT NULL,
  `talla` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prenda_tallas_prenda_id_foreign` (`prenda_id`),
  CONSTRAINT `prenda_tallas_prenda_id_foreign` FOREIGN KEY (`prenda_id`) REFERENCES `prendas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.prenda_tallas: ~161 rows (aproximadamente)
INSERT INTO `prenda_tallas` (`id`, `prenda_id`, `talla`, `stock`, `created_at`, `updated_at`) VALUES
	(18, 11, 'CH', 3, '2026-03-22 06:48:25', '2026-03-22 06:48:25'),
	(19, 11, 'M', 4, '2026-03-22 06:48:25', '2026-03-22 06:48:25'),
	(20, 11, 'G', 0, '2026-03-22 06:48:25', '2026-03-22 06:48:25'),
	(21, 12, 'CH', 2, '2026-03-22 06:50:32', '2026-03-22 06:50:32'),
	(22, 12, 'M', 3, '2026-03-22 06:50:32', '2026-03-22 06:50:32'),
	(23, 12, 'G', 3, '2026-03-22 06:50:32', '2026-03-22 06:50:32'),
	(24, 12, 'XG', 2, '2026-03-22 06:50:32', '2026-03-22 06:50:32'),
	(25, 13, 'CH', 3, '2026-03-22 06:52:30', '2026-03-22 06:52:30'),
	(26, 13, 'M', 3, '2026-03-22 06:52:30', '2026-03-22 06:52:30'),
	(27, 13, 'G', 0, '2026-03-22 06:52:30', '2026-03-22 06:52:30'),
	(28, 14, 'CH', 2, '2026-03-22 06:54:31', '2026-03-22 06:54:31'),
	(29, 14, 'M', 2, '2026-03-22 06:54:31', '2026-03-22 06:54:31'),
	(30, 14, 'G', 1, '2026-03-22 06:54:31', '2026-03-22 06:54:31'),
	(31, 15, 'CH', 2, '2026-03-22 06:56:23', '2026-03-22 06:56:23'),
	(32, 15, 'M', 2, '2026-03-22 06:56:23', '2026-03-22 06:56:23'),
	(33, 15, 'G', 0, '2026-03-22 06:56:23', '2026-03-22 06:56:23'),
	(34, 16, 'CH', 3, '2026-03-22 07:27:53', '2026-03-22 07:27:53'),
	(35, 16, 'M', 0, '2026-03-22 07:27:53', '2026-03-22 07:27:53'),
	(36, 16, 'G', 3, '2026-03-22 07:27:53', '2026-03-22 07:27:53'),
	(37, 17, 'CH', 2, '2026-03-22 07:29:18', '2026-03-22 07:29:18'),
	(38, 17, 'M', 2, '2026-03-22 07:29:18', '2026-03-22 07:29:18'),
	(39, 17, 'G', 0, '2026-03-22 07:29:18', '2026-03-22 07:29:18'),
	(40, 18, 'CH', 2, '2026-03-22 07:31:22', '2026-03-22 07:31:22'),
	(41, 18, 'M', 3, '2026-03-22 07:31:22', '2026-03-22 07:31:22'),
	(42, 18, 'G', 2, '2026-03-22 07:31:22', '2026-03-22 07:31:22'),
	(43, 19, 'CH', 2, '2026-03-22 07:33:17', '2026-03-22 07:33:17'),
	(44, 19, 'M', 3, '2026-03-22 07:33:17', '2026-03-22 07:33:17'),
	(45, 20, 'CH', 3, '2026-03-22 07:35:08', '2026-03-22 07:35:08'),
	(46, 20, 'M', 3, '2026-03-22 07:35:08', '2026-03-22 07:35:08'),
	(47, 20, 'G', 2, '2026-03-22 07:35:08', '2026-03-22 07:35:08'),
	(48, 21, 'CH', 3, '2026-03-22 07:42:45', '2026-03-22 07:42:45'),
	(49, 21, 'M', 3, '2026-03-22 07:42:45', '2026-03-22 07:42:45'),
	(50, 21, 'G', 2, '2026-03-22 07:42:45', '2026-03-22 07:42:45'),
	(51, 21, 'XG', 1, '2026-03-22 07:42:45', '2026-03-22 07:42:45'),
	(52, 22, 'CH', 2, '2026-03-22 07:51:23', '2026-03-22 07:51:23'),
	(53, 22, 'M', 2, '2026-03-22 07:51:23', '2026-03-22 07:51:23'),
	(54, 22, 'G', 2, '2026-03-22 07:51:23', '2026-03-22 07:51:23'),
	(55, 22, 'XG', 0, '2026-03-22 07:51:23', '2026-03-22 07:51:23'),
	(56, 23, 'CH', 2, '2026-03-22 07:53:36', '2026-03-22 07:53:36'),
	(57, 23, 'M', 3, '2026-03-22 07:53:36', '2026-03-22 07:53:36'),
	(58, 23, 'G', 3, '2026-03-22 07:53:36', '2026-03-22 07:53:36'),
	(59, 23, 'XG', 2, '2026-03-22 07:53:36', '2026-03-22 07:53:36'),
	(60, 24, 'CH', 3, '2026-03-22 07:55:24', '2026-03-22 07:55:24'),
	(61, 24, 'M', 3, '2026-03-22 07:55:24', '2026-03-22 07:55:24'),
	(62, 24, 'G', 2, '2026-03-22 07:55:24', '2026-03-22 07:55:24'),
	(63, 24, 'XG', 2, '2026-03-22 07:55:24', '2026-03-22 07:55:24'),
	(64, 25, 'CH', 2, '2026-03-22 07:57:30', '2026-03-22 07:57:30'),
	(65, 25, 'M', 0, '2026-03-22 07:57:30', '2026-03-22 07:57:30'),
	(66, 25, 'G', 2, '2026-03-22 07:57:30', '2026-03-22 07:57:30'),
	(67, 25, 'XG', 1, '2026-03-22 07:57:30', '2026-03-22 07:57:30'),
	(68, 26, 'CH', 3, '2026-03-22 08:14:25', '2026-03-22 08:14:25'),
	(69, 26, 'M', 3, '2026-03-22 08:14:25', '2026-03-22 08:14:25'),
	(70, 26, 'G', 3, '2026-03-22 08:14:25', '2026-03-22 08:14:25'),
	(71, 26, 'XG', 0, '2026-03-22 08:14:25', '2026-03-22 08:14:25'),
	(72, 27, 'CH', 3, '2026-03-22 08:18:00', '2026-03-22 08:18:00'),
	(73, 27, 'M', 4, '2026-03-22 08:18:00', '2026-03-22 08:18:00'),
	(74, 27, 'G', 3, '2026-03-22 08:18:00', '2026-03-22 08:18:00'),
	(75, 28, 'CH', 4, '2026-03-22 08:20:04', '2026-03-22 08:20:04'),
	(76, 28, 'M', 4, '2026-03-22 08:20:04', '2026-03-22 08:20:04'),
	(77, 28, 'G', 2, '2026-03-22 08:20:04', '2026-03-22 08:20:04'),
	(78, 28, 'XG', 0, '2026-03-22 08:20:04', '2026-03-22 08:20:04'),
	(79, 29, 'CH', 3, '2026-03-22 08:21:42', '2026-03-22 08:21:42'),
	(80, 29, 'M', 4, '2026-03-22 08:21:42', '2026-03-22 08:21:42'),
	(81, 29, 'G', 3, '2026-03-22 08:21:42', '2026-03-22 08:21:42'),
	(82, 29, 'XG', 2, '2026-03-22 08:21:42', '2026-03-22 08:21:42'),
	(83, 30, 'CH', 3, '2026-03-22 08:26:24', '2026-03-22 08:26:24'),
	(84, 30, 'M', 3, '2026-03-22 08:26:24', '2026-03-22 08:26:24'),
	(85, 30, 'G', 2, '2026-03-22 08:26:24', '2026-03-22 08:26:24'),
	(86, 30, 'XG', 2, '2026-03-22 08:26:24', '2026-03-22 08:26:24'),
	(87, 31, 'CH', 3, '2026-03-22 08:27:44', '2026-03-22 08:27:44'),
	(88, 31, 'M', 3, '2026-03-22 08:27:44', '2026-03-22 08:27:44'),
	(89, 31, 'G', 2, '2026-03-22 08:27:44', '2026-03-22 08:27:44'),
	(90, 31, 'XG', 2, '2026-03-22 08:27:44', '2026-03-22 08:27:44'),
	(91, 32, 'CH', 3, '2026-03-22 08:29:08', '2026-03-22 08:29:08'),
	(92, 32, 'M', 4, '2026-03-22 08:29:08', '2026-03-22 08:29:08'),
	(93, 32, 'G', 2, '2026-03-22 08:29:08', '2026-03-22 08:29:08'),
	(94, 32, 'XG', 1, '2026-03-22 08:29:08', '2026-03-22 08:29:08'),
	(95, 33, 'CH', 3, '2026-03-22 08:30:59', '2026-03-22 08:30:59'),
	(96, 33, 'M', 4, '2026-03-22 08:30:59', '2026-03-22 08:30:59'),
	(97, 33, 'G', 2, '2026-03-22 08:30:59', '2026-03-22 08:30:59'),
	(98, 33, 'XG', 1, '2026-03-22 08:30:59', '2026-03-22 08:30:59'),
	(99, 34, 'CH', 4, '2026-03-22 08:35:31', '2026-03-22 08:35:31'),
	(100, 34, 'M', 4, '2026-03-22 08:35:31', '2026-03-22 08:35:31'),
	(101, 34, 'G', 4, '2026-03-22 08:35:31', '2026-03-22 08:35:31'),
	(102, 34, 'XG', 3, '2026-03-22 08:35:31', '2026-03-22 08:35:31'),
	(103, 35, 'CH', 4, '2026-03-22 08:37:20', '2026-03-22 08:37:20'),
	(104, 35, 'M', 4, '2026-03-22 08:37:20', '2026-03-22 08:37:20'),
	(105, 35, 'G', 4, '2026-03-22 08:37:20', '2026-03-22 08:37:20'),
	(106, 35, 'XG', 3, '2026-03-22 08:37:20', '2026-03-22 08:37:20'),
	(107, 36, 'CH', 3, '2026-03-22 08:39:12', '2026-03-22 08:39:12'),
	(108, 36, 'M', 3, '2026-03-22 08:39:12', '2026-03-22 08:39:12'),
	(109, 36, 'G', 2, '2026-03-22 08:39:12', '2026-03-22 08:39:12'),
	(110, 36, 'XG', 2, '2026-03-22 08:39:12', '2026-03-22 08:39:12'),
	(111, 37, 'CH', 3, '2026-03-22 08:40:44', '2026-03-22 08:40:44'),
	(112, 37, 'M', 3, '2026-03-22 08:40:44', '2026-03-22 08:40:44'),
	(113, 37, 'G', 2, '2026-03-22 08:40:44', '2026-03-22 08:40:44'),
	(114, 37, 'XG', 2, '2026-03-22 08:40:44', '2026-03-22 08:40:44'),
	(115, 38, 'CH', 4, '2026-03-22 08:42:35', '2026-03-22 08:42:35'),
	(116, 38, 'M', 4, '2026-03-22 08:42:35', '2026-03-22 08:42:35'),
	(117, 38, 'G', 2, '2026-03-22 08:42:35', '2026-03-22 08:42:35'),
	(118, 38, 'XG', 2, '2026-03-22 08:42:35', '2026-03-22 08:42:35'),
	(119, 39, 'CH', 3, '2026-03-22 08:44:14', '2026-03-22 08:44:14'),
	(120, 39, 'M', 3, '2026-03-22 08:44:14', '2026-03-22 08:44:14'),
	(121, 39, 'G', 2, '2026-03-22 08:44:14', '2026-03-22 08:44:14'),
	(122, 39, 'XG', 2, '2026-03-22 08:44:14', '2026-03-22 08:44:14'),
	(123, 40, 'CH', 3, '2026-03-22 08:46:24', '2026-03-22 08:46:24'),
	(124, 40, 'M', 3, '2026-03-22 08:46:24', '2026-03-22 08:46:24'),
	(125, 40, 'G', 2, '2026-03-22 08:46:24', '2026-03-22 08:46:24'),
	(126, 40, 'XG', 2, '2026-03-22 08:46:24', '2026-03-22 08:46:24'),
	(127, 41, 'CH', 3, '2026-03-22 08:47:48', '2026-03-22 08:47:48'),
	(128, 41, 'M', 4, '2026-03-22 08:47:48', '2026-03-22 08:47:48'),
	(129, 41, 'G', 2, '2026-03-22 08:47:48', '2026-03-22 08:47:48'),
	(130, 41, 'XG', 1, '2026-03-22 08:47:48', '2026-03-22 08:47:48'),
	(131, 42, 'CH', 3, '2026-03-22 08:49:01', '2026-03-22 08:49:01'),
	(132, 42, 'M', 3, '2026-03-22 08:49:01', '2026-03-22 08:49:01'),
	(133, 42, 'G', 2, '2026-03-22 08:49:01', '2026-03-22 08:49:01'),
	(134, 42, 'XG', 2, '2026-03-22 08:49:01', '2026-03-22 08:49:01'),
	(135, 48, 'CH', 4, '2026-03-22 08:57:41', '2026-03-22 08:57:41'),
	(136, 48, 'M', 4, '2026-03-22 08:57:41', '2026-03-22 08:57:41'),
	(137, 48, 'G', 4, '2026-03-22 08:57:41', '2026-03-22 08:57:41'),
	(138, 48, 'XG', 4, '2026-03-22 08:57:41', '2026-03-22 08:57:41'),
	(139, 49, 'CH', 4, '2026-03-22 08:59:22', '2026-03-22 08:59:22'),
	(140, 49, 'M', 4, '2026-03-22 08:59:22', '2026-03-22 08:59:22'),
	(141, 49, 'G', 4, '2026-03-22 08:59:22', '2026-03-22 08:59:22'),
	(142, 49, 'XG', 4, '2026-03-22 08:59:22', '2026-03-22 08:59:22'),
	(143, 50, 'CH', 4, '2026-03-22 09:00:49', '2026-03-22 09:00:49'),
	(144, 50, 'M', 5, '2026-03-22 09:00:49', '2026-03-22 09:00:49'),
	(145, 50, 'G', 4, '2026-03-22 09:00:49', '2026-03-22 09:00:49'),
	(146, 50, 'XG', 4, '2026-03-22 09:00:49', '2026-03-22 09:00:49'),
	(147, 51, 'CH', 4, '2026-03-22 09:02:26', '2026-03-22 09:02:26'),
	(148, 51, 'M', 5, '2026-03-22 09:02:26', '2026-03-22 09:02:26'),
	(149, 51, 'G', 4, '2026-03-22 09:02:26', '2026-03-22 09:02:26'),
	(150, 51, 'XG', 4, '2026-03-22 09:02:26', '2026-03-22 09:02:26'),
	(151, 52, 'CH', 5, '2026-03-22 09:13:34', '2026-03-22 09:13:34'),
	(152, 52, 'M', 5, '2026-03-22 09:13:34', '2026-03-22 09:13:34'),
	(153, 52, 'G', 5, '2026-03-22 09:13:34', '2026-03-22 09:13:34'),
	(154, 52, 'XG', 5, '2026-03-22 09:13:34', '2026-03-22 09:13:34'),
	(155, 53, 'CH', 1, '2026-03-22 09:15:02', '2026-03-22 09:15:02'),
	(156, 53, 'M', 1, '2026-03-22 09:15:02', '2026-03-22 09:15:02'),
	(157, 53, 'G', 1, '2026-03-22 09:15:02', '2026-03-22 09:15:02'),
	(158, 53, 'XG', 1, '2026-03-22 09:15:02', '2026-03-22 09:15:02'),
	(159, 54, 'CH', 5, '2026-03-22 09:16:32', '2026-03-22 09:16:32'),
	(160, 54, 'M', 5, '2026-03-22 09:16:32', '2026-03-22 09:16:32'),
	(161, 54, 'G', 5, '2026-03-22 09:16:32', '2026-03-22 09:16:32'),
	(162, 54, 'XG', 5, '2026-03-22 09:16:32', '2026-03-22 09:16:32'),
	(163, 65, 'CH', 3, '2026-03-22 09:30:26', '2026-03-22 09:30:26'),
	(164, 65, 'M', 3, '2026-03-22 09:30:26', '2026-03-22 09:30:26'),
	(165, 65, 'G', 0, '2026-03-22 09:30:26', '2026-03-23 05:31:21'),
	(166, 65, 'XG', 2, '2026-03-22 09:30:26', '2026-03-22 09:30:26'),
	(167, 66, 'CH', 3, '2026-03-22 09:32:27', '2026-03-22 09:32:27'),
	(168, 66, 'M', 3, '2026-03-22 09:32:27', '2026-03-22 09:32:27'),
	(169, 66, 'G', 2, '2026-03-22 09:32:27', '2026-03-22 09:32:27'),
	(170, 66, 'XG', 2, '2026-03-22 09:32:27', '2026-03-22 09:32:27'),
	(171, 67, 'CH', 3, '2026-03-22 09:33:53', '2026-03-22 09:33:53'),
	(172, 67, 'M', 3, '2026-03-22 09:33:53', '2026-03-22 09:33:53'),
	(173, 67, 'G', 2, '2026-03-22 09:33:53', '2026-03-22 09:33:53'),
	(174, 67, 'XG', 2, '2026-03-22 09:33:53', '2026-03-22 09:33:53'),
	(175, 68, 'CH', 3, '2026-03-22 09:35:07', '2026-03-22 09:35:07'),
	(176, 68, 'M', 3, '2026-03-22 09:35:07', '2026-03-22 09:35:07'),
	(177, 68, 'G', 2, '2026-03-22 09:35:07', '2026-03-22 09:35:07'),
	(178, 68, 'XG', 2, '2026-03-22 09:35:07', '2026-03-22 09:35:07');

-- Volcando estructura para tabla moveonsport.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('w4OwVS7cntQqBv0W8eUaZWigpvoJRgSFuO6QDB40', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSXVVeEt0UnRwSGtoMWMzdHRWYk1adUFEUG90YkJVdXdwSEd4dnBDUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9tb3Zlb25zcG9ydC50ZXN0L2xvZ2luIjtzOjU6InJvdXRlIjtzOjU6ImxvZ2luIjt9czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNDoiaHR0cDovL21vdmVvbnNwb3J0LnRlc3QvIjt9fQ==', 1774229450);

-- Volcando estructura para tabla moveonsport.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `codigo_recuperacion` varchar(6) DEFAULT NULL,
  `expira_codigo` timestamp NULL DEFAULT NULL,
  `two_factor_code` varchar(255) DEFAULT NULL,
  `two_factor_expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_photo`, `role`, `status`, `remember_token`, `created_at`, `updated_at`, `codigo_recuperacion`, `expira_codigo`, `two_factor_code`, `two_factor_expires_at`) VALUES
	(1, 'Miriam', 'mj8934557@gmail.com', NULL, '$2y$12$YlJPoSc3Da3err6N.UHL1OVpNwhHQT.ja9AVhGlFXG7LBpjjgql0i', 'profiles/sK2uHfOJ5RBxNTjO1PSAEXRP6lbOpLcX7a2y5Q1Z.png', 'admin', 'inactivo', NULL, '2026-03-18 08:18:36', '2026-03-23 05:51:15', NULL, NULL, NULL, NULL),
	(2, 'Noemi', 'miriamjuarez1321@gmail.com', NULL, '$2y$12$91eiLXAoESTfqAyE1QcQ3egQoKn.gi33ExhIYAHNeP4JTVJpKn9.q', 'profiles/zal1d9lSEEcPIlw6PgJYnfEai9r3DcgqQilEi6ge.jpg', 'user', 'activo', NULL, '2026-03-18 08:18:59', '2026-03-23 05:50:32', NULL, NULL, NULL, NULL);

-- Volcando estructura para tabla moveonsport.variantes_producto
CREATE TABLE IF NOT EXISTS `variantes_producto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prenda_id` bigint(20) unsigned NOT NULL,
  `tipo` varchar(255) NOT NULL DEFAULT 'numero',
  `valor` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `variantes_producto_prenda_id_foreign` (`prenda_id`),
  CONSTRAINT `variantes_producto_prenda_id_foreign` FOREIGN KEY (`prenda_id`) REFERENCES `prendas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla moveonsport.variantes_producto: ~31 rows (aproximadamente)
INSERT INTO `variantes_producto` (`id`, `prenda_id`, `tipo`, `valor`, `stock`, `created_at`, `updated_at`) VALUES
	(7, 53, 'numero', '23,5', 5, '2026-03-22 11:21:14', '2026-03-22 11:21:14'),
	(8, 53, 'numero', '24', 5, '2026-03-22 11:21:14', '2026-03-22 11:21:14'),
	(9, 53, 'numero', '25', 5, '2026-03-22 11:21:14', '2026-03-22 11:21:14'),
	(10, 53, 'numero', '25,5', 5, '2026-03-22 11:21:14', '2026-03-22 11:21:14'),
	(11, 54, 'numero', '23,5', 5, '2026-03-23 04:50:14', '2026-03-23 04:50:14'),
	(12, 54, 'numero', '24', 5, '2026-03-23 04:50:14', '2026-03-23 04:50:14'),
	(13, 54, 'numero', '24,5', 4, '2026-03-23 04:50:14', '2026-03-23 04:50:14'),
	(14, 54, 'numero', '25', 4, '2026-03-23 04:50:14', '2026-03-23 04:50:14'),
	(15, 54, 'numero', '25,3', 1, '2026-03-23 04:50:14', '2026-03-23 04:50:14'),
	(16, 54, 'numero', '26', 1, '2026-03-23 04:50:14', '2026-03-23 04:50:14'),
	(31, 49, 'numero', '24', 4, '2026-03-23 04:58:25', '2026-03-23 04:58:25'),
	(32, 49, 'numero', '25', 4, '2026-03-23 04:58:25', '2026-03-23 04:58:25'),
	(33, 49, 'numero', '26', 4, '2026-03-23 04:58:25', '2026-03-23 04:58:25'),
	(34, 49, 'numero', '27', 4, '2026-03-23 04:58:25', '2026-03-23 04:58:25'),
	(35, 48, 'numero', '24', 4, '2026-03-23 05:00:12', '2026-03-23 05:00:12'),
	(36, 48, 'numero', '25', 4, '2026-03-23 05:00:12', '2026-03-23 05:00:12'),
	(37, 48, 'numero', '26', 4, '2026-03-23 05:00:12', '2026-03-23 05:00:12'),
	(38, 48, 'numero', '27', 4, '2026-03-23 05:00:12', '2026-03-23 05:00:12'),
	(39, 51, 'numero', '24', 4, '2026-03-23 05:02:34', '2026-03-23 05:02:34'),
	(40, 51, 'numero', '25', 5, '2026-03-23 05:02:34', '2026-03-23 05:02:34'),
	(41, 51, 'numero', '26', 4, '2026-03-23 05:02:34', '2026-03-23 05:02:34'),
	(42, 51, 'numero', '27', 4, '2026-03-23 05:02:34', '2026-03-23 05:02:34'),
	(43, 50, 'numero', '23,5', 4, '2026-03-23 05:21:28', '2026-03-23 05:21:28'),
	(44, 50, 'numero', '24', 4, '2026-03-23 05:21:28', '2026-03-23 05:21:28'),
	(45, 50, 'numero', '24,5', 4, '2026-03-23 05:21:28', '2026-03-23 05:21:28'),
	(46, 50, 'numero', '25', 2, '2026-03-23 05:21:28', '2026-03-23 05:21:28'),
	(47, 52, 'numero', '23,5', 4, '2026-03-23 05:22:17', '2026-03-23 05:22:17'),
	(48, 52, 'numero', '24', 4, '2026-03-23 05:22:17', '2026-03-23 05:22:17'),
	(49, 52, 'numero', '24,5', 4, '2026-03-23 05:22:17', '2026-03-23 05:22:17'),
	(50, 52, 'numero', '25', 4, '2026-03-23 05:22:17', '2026-03-23 05:22:17'),
	(51, 52, 'numero', '25,5', 4, '2026-03-23 05:22:17', '2026-03-23 05:22:17');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
