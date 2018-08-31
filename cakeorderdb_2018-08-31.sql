# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: cakeorderdb
# Generation Time: 2018-08-31 10:09:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `parent`, `created_at`, `updated_at`)
VALUES
	(1,'Birthday Cake','0','2018-08-03 05:44:45','2018-08-03 05:44:45'),
	(2,'Anniversary Cake','0','2018-08-03 05:44:55','2018-08-03 05:44:55'),
	(3,'Chocolate Cake','0','2018-08-03 05:45:02','2018-08-03 05:45:02'),
	(4,'Blackberry Cake','0','2018-08-03 05:45:13','2018-08-03 05:45:13');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_product`;

CREATE TABLE `category_product` (
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `category_product_product_id_foreign` (`product_id`),
  KEY `category_product_category_id_foreign` (`category_id`),
  CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_product` WRITE;
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;

INSERT INTO `category_product` (`product_id`, `category_id`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL),
	(2,1,NULL,NULL),
	(3,1,NULL,NULL);

/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;

INSERT INTO `customers` (`id`, `name`, `phone`, `location`, `address`, `created_at`, `updated_at`)
VALUES
	(1,'thura','09403488850',NULL,'Sanchaung','2018-08-03 06:01:43','2018-08-03 06:01:43'),
	(2,'thura','mgaungthurawin@gmail.com',NULL,'Sanchaung','2018-08-13 11:26:18','2018-08-13 11:26:18'),
	(3,'test','test@gmail.com','SANCHAUNG','blah blah','2018-08-13 13:23:37','2018-08-13 13:23:37');

/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_01_20_092729_categries_table',1),
	(4,'2018_01_22_104558_create_product_table',1),
	(5,'2018_01_24_041417_product_category',1),
	(6,'2018_01_25_103235_create_order_table',1),
	(7,'2018_03_02_053124_create_customer_tables',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `order_status` tinyint(1) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `order_id`, `product_id`, `customer_id`, `order_status`, `created_at`, `updated_at`)
VALUES
	(1,'531533278138',1,1,0,'2018-08-03 06:35:38','2018-08-03 06:35:38'),
	(2,'571533278207',1,1,0,'2018-08-03 06:36:47','2018-08-03 06:36:47'),
	(3,'751533278258',1,1,0,'2018-08-03 06:37:38','2018-08-03 06:37:38'),
	(4,'101533359097',2,1,0,'2018-08-04 05:04:57','2018-08-04 05:04:57'),
	(5,'931533359556',2,1,0,'2018-08-04 05:12:36','2018-08-04 05:12:36'),
	(6,'471533359819',2,1,0,'2018-08-04 05:16:59','2018-08-04 05:16:59'),
	(7,'341533359849',2,1,0,'2018-08-04 05:17:29','2018-08-04 05:17:29'),
	(8,'111533359959',2,1,0,'2018-08-04 05:19:19','2018-08-04 05:19:19'),
	(9,'691533359996',2,1,0,'2018-08-04 05:19:56','2018-08-04 05:19:56'),
	(10,'601533360010',2,1,0,'2018-08-04 05:20:10','2018-08-04 05:20:10'),
	(11,'201533360153',2,1,0,'2018-08-04 05:22:33','2018-08-04 05:22:33'),
	(12,'811533360265',2,1,0,'2018-08-04 05:24:25','2018-08-04 05:24:25'),
	(13,'481533360555',2,1,0,'2018-08-04 05:29:15','2018-08-04 05:29:15'),
	(14,'871533360625',2,1,0,'2018-08-04 05:30:25','2018-08-04 05:30:25'),
	(15,'401533360678',2,1,0,'2018-08-04 05:31:18','2018-08-04 05:31:18'),
	(16,'551533360694',2,1,0,'2018-08-04 05:31:34','2018-08-04 05:31:34'),
	(17,'261533360747',2,1,0,'2018-08-04 05:32:27','2018-08-04 05:32:27'),
	(18,'671533360761',2,1,0,'2018-08-04 05:32:41','2018-08-04 05:32:41'),
	(19,'161533360771',2,1,0,'2018-08-04 05:32:51','2018-08-04 05:32:51'),
	(20,'241533360808',2,1,0,'2018-08-04 05:33:28','2018-08-04 05:33:28'),
	(21,'991533360875',2,1,0,'2018-08-04 05:34:35','2018-08-04 05:34:35'),
	(22,'171533360901',2,1,0,'2018-08-04 05:35:01','2018-08-04 05:35:01'),
	(23,'101533361242',2,1,0,'2018-08-04 05:40:42','2018-08-04 05:40:42'),
	(24,'571533361251',2,1,0,'2018-08-04 05:40:51','2018-08-04 05:40:51'),
	(25,'131533361316',2,1,0,'2018-08-04 05:41:56','2018-08-04 05:41:56'),
	(26,'631533361438',2,1,0,'2018-08-04 05:43:58','2018-08-04 05:43:58'),
	(27,'291533361513',1,1,0,'2018-08-04 12:15:13','2018-08-04 12:15:13'),
	(28,'361533361531',1,1,0,'2018-08-04 12:15:31','2018-08-04 12:15:31'),
	(29,'481533361546',1,1,0,'2018-08-04 12:15:46','2018-08-04 12:15:46'),
	(30,'551533361570',1,1,0,'2018-08-04 12:16:10','2018-08-04 12:16:10'),
	(31,'811533361676',1,1,1,'2018-08-04 12:17:56','2018-08-04 12:31:13'),
	(32,'121533361686',1,1,1,'2018-08-04 12:18:06','2018-08-04 12:31:20'),
	(33,'241534136178',2,2,0,'2018-08-13 11:26:18','2018-08-13 11:26:18'),
	(34,'801534143217',3,3,0,'2018-08-13 13:23:37','2018-08-13 13:23:37'),
	(35,'141534309449',2,3,0,'2018-08-15 11:34:09','2018-08-15 11:34:09'),
	(36,'501534917580',1,1,0,'2018-08-22 12:29:40','2018-08-22 12:29:40'),
	(37,'501534917580',2,1,0,'2018-08-22 12:29:40','2018-08-22 12:29:40'),
	(38,'511534917657',1,1,0,'2018-08-22 12:30:57','2018-08-22 12:30:57'),
	(39,'511534917657',2,1,0,'2018-08-22 12:30:57','2018-08-22 12:30:57'),
	(40,'751534917715',1,1,0,'2018-08-22 12:31:55','2018-08-22 12:31:55'),
	(41,'751534917715',2,1,0,'2018-08-22 12:31:55','2018-08-22 12:31:55'),
	(42,'871534917769',1,1,0,'2018-08-22 12:32:49','2018-08-22 12:32:49'),
	(43,'871534917769',2,1,0,'2018-08-22 12:32:49','2018-08-22 12:32:49'),
	(44,'671535169074',1,3,0,'2018-08-25 10:21:14','2018-08-25 10:21:14'),
	(45,'671535169074',2,3,0,'2018-08-25 10:21:14','2018-08-25 10:21:14'),
	(46,'641535169100',1,3,0,'2018-08-25 10:21:40','2018-08-25 10:21:40'),
	(47,'641535169100',2,3,0,'2018-08-25 10:21:40','2018-08-25 10:21:40'),
	(48,'361535169132',1,3,0,'2018-08-25 10:22:12','2018-08-25 10:22:12'),
	(49,'361535169132',2,3,0,'2018-08-25 10:22:12','2018-08-25 10:22:12'),
	(50,'681535169148',1,3,0,'2018-08-25 10:22:28','2018-08-25 10:22:28'),
	(51,'681535169148',2,3,0,'2018-08-25 10:22:28','2018-08-25 10:22:28'),
	(52,'471535169172',1,3,0,'2018-08-25 10:22:52','2018-08-25 10:22:52'),
	(53,'471535169172',2,3,0,'2018-08-25 10:22:52','2018-08-25 10:22:52'),
	(54,'761535169190',1,3,0,'2018-08-25 10:23:10','2018-08-25 10:23:10'),
	(55,'761535169190',2,3,0,'2018-08-25 10:23:10','2018-08-25 10:23:10'),
	(56,'381535169202',1,3,0,'2018-08-25 10:23:22','2018-08-25 10:23:22'),
	(57,'381535169202',2,3,0,'2018-08-25 10:23:22','2018-08-25 10:23:22'),
	(58,'881535171931',1,1,0,'2018-08-25 11:08:51','2018-08-25 11:08:51'),
	(59,'881535171931',2,1,0,'2018-08-25 11:08:51','2018-08-25 11:08:51'),
	(60,'881535171931',3,1,0,'2018-08-25 11:08:51','2018-08-25 11:08:51'),
	(61,'591535708272',2,1,0,'2018-08-31 16:07:52','2018-08-31 16:07:52'),
	(62,'591535708272',1,1,0,'2018-08-31 16:07:52','2018-08-31 16:07:52'),
	(63,'601535708341',2,1,0,'2018-08-31 16:09:01','2018-08-31 16:09:01'),
	(64,'421535708480',2,1,0,'2018-08-31 16:11:20','2018-08-31 16:11:20'),
	(65,'371535708663',3,1,0,'2018-08-31 16:14:23','2018-08-31 16:14:23');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `weigh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `title`, `price`, `stock`, `description`, `weigh`, `image`, `created_at`, `updated_at`)
VALUES
	(1,'Blackberry flavor cake',5000,99994,NULL,'small','images/1533286298.bbcake.jpg','2018-08-03 08:51:38','2018-08-04 12:18:06'),
	(2,'Blackberry flavor cake',5500,99965,NULL,'medium','images/1533286325.bbcake.jpg','2018-08-03 08:52:05','2018-08-15 11:34:09'),
	(3,'Blackberry flavor cake',6000,99999,NULL,'big','images/1533286349.bbcake.jpg','2018-08-03 08:52:29','2018-08-13 13:23:37');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'thura','mgaungthurawin@gmail.com','$2y$10$J4zhp1V1oN5ox0K5MG/wGOSYRxC7Y4yO1GRVCUZzGIgDqsrPhrnLK',1,'9SqLsx604nSttbiE2WTwTx8zTLGBtboHwjKb46zHOcwJqwDOj9dTCZHizQH3','2018-08-03 05:44:30','2018-08-03 05:44:30');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
