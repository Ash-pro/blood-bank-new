-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for almosafer
CREATE DATABASE IF NOT EXISTS `almosafer` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `almosafer`;

-- Dumping structure for table almosafer.aboutus_pages
CREATE TABLE IF NOT EXISTS `aboutus_pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.aboutus_pages: ~0 rows (approximately)
/*!40000 ALTER TABLE `aboutus_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `aboutus_pages` ENABLE KEYS */;

-- Dumping structure for table almosafer.advertisements
CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.advertisements: ~2 rows (approximately)
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
INSERT INTO `advertisements` (`id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'ذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص\r\n                                العربى، حيث\r\n                                يمكنك\r\n                                أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها\r\n                                التطبيق. إذا\r\n                                كنت\r\n                                تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد', '2020-12-03 11:14:30', '2020-12-03 11:14:30');
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;

-- Dumping structure for table almosafer.advertisement_items
CREATE TABLE IF NOT EXISTS `advertisement_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.advertisement_items: ~4 rows (approximately)
/*!40000 ALTER TABLE `advertisement_items` DISABLE KEYS */;
INSERT INTO `advertisement_items` (`id`, `name`, `description`, `photo`, `created_at`, `updated_at`) VALUES
	(5, 'Advertisement 2', 'Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2\r\nertisemen44 2 Advertisemen44 2', 'images/sw3qEEEVnty5z5CZwlYU1Nc8XOI7EtnmLcZvptfh.gif', '2020-12-03 13:06:05', '2020-12-05 18:41:23'),
	(7, 'Advertisement 41', 'Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2\r\nertisemen44 2 Advertisemen44 2', 'images/o403ufALxmo7bjsSN4kyq5nFPSe5kWNmWrkfyWk7.gif', '2020-12-05 17:00:25', '2020-12-05 18:41:18'),
	(10, 'Ahmad', 'Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2 Advertisemen44 2\r\nertisemen44 2 Advertisemen44 2', 'images/QF5MiMAkcPYrWFoxsuqOzGmudQ2ZIjXOXaC1XK5x.png', '2020-12-05 18:33:24', '2020-12-05 19:13:50');
/*!40000 ALTER TABLE `advertisement_items` ENABLE KEYS */;

-- Dumping structure for table almosafer.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(4, 'General Description General Description General Description General Description General Description', NULL, '2020-12-05 19:12:08', '2020-12-05 19:12:08');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table almosafer.consultation_requests
CREATE TABLE IF NOT EXISTS `consultation_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.consultation_requests: ~5 rows (approximately)
/*!40000 ALTER TABLE `consultation_requests` DISABLE KEYS */;
INSERT INTO `consultation_requests` (`id`, `name`, `email`, `number`, `created_at`, `updated_at`) VALUES
	(18, 'admin11', 'asasasas@xc', 'qwq', '2020-12-04 16:18:41', '2020-12-04 16:18:41'),
	(19, 'ahmad', 'ahmad@gmail.com', '12233344', '2020-12-05 15:36:04', '2020-12-05 15:36:04'),
	(20, 'ee', 'a@a.com', '12345555', '2020-12-05 17:37:24', '2020-12-05 17:37:24'),
	(27, 'ahmad', 'a@a.comq', '12345555', '2020-12-05 19:01:07', '2020-12-05 19:01:07'),
	(28, 'ibr', 'ibr@ibr.com', '1234564.', '2020-12-05 19:07:13', '2020-12-05 19:07:13'),
	(29, 'ahmad', 'ahmad111@gmail.com', '12345555', '2020-12-05 19:11:06', '2020-12-05 19:11:06');
/*!40000 ALTER TABLE `consultation_requests` ENABLE KEYS */;

-- Dumping structure for table almosafer.contact_pages
CREATE TABLE IF NOT EXISTS `contact_pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.contact_pages: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_pages` ENABLE KEYS */;

-- Dumping structure for table almosafer.contact_us
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contact_description` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callUs1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callUs2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.contact_us: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` (`id`, `contact_description`, `address`, `mail1`, `mail2`, `callUs1`, `callUs2`, `created_at`, `updated_at`) VALUES
	(3, 'Contact Us Contact Us Contact Us Contact Us Contact Us Contact UsContact Us Contact Us Contact Us Contact Us Contact Us Contact Us \r\nContact Us Contact Us Contact Us Contact Us Contact Us Contact Us', 'Turkey- Istanbul', 'mail1@mail1.com', 'mail2@mail2.com', '05900000000000', '05900000000000', '2020-12-05 17:03:48', '2020-12-05 17:03:48');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;

-- Dumping structure for table almosafer.donations
CREATE TABLE IF NOT EXISTS `donations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_Donation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_piece` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anther_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `senderUser_id` bigint(20) unsigned NOT NULL,
  `needleUser_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donations_senderuser_id_foreign` (`senderUser_id`),
  KEY `donations_needleuser_id_foreign` (`needleUser_id`),
  CONSTRAINT `donations_needleuser_id_foreign` FOREIGN KEY (`needleUser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `donations_senderuser_id_foreign` FOREIGN KEY (`senderUser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.donations: ~0 rows (approximately)
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;

-- Dumping structure for table almosafer.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table almosafer.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.migrations: ~19 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_08_16_142227_create_categories_table', 1),
	(5, '2020_08_19_160621_laratrust_setup_tables', 1),
	(6, '2020_08_19_160837_laratrust_setup_teams', 1),
	(7, '2020_08_31_093132_create_sub_categories_table', 1),
	(8, '2020_08_31_093334_create_aboutus_pages_table', 1),
	(9, '2020_08_31_093425_create_contact_pages_table', 1),
	(10, '2020_08_31_093436_create_posts_table', 1),
	(11, '2020_09_12_152739_create_donations_table', 1),
	(12, '2020_09_12_224531_create_user_information_table', 1),
	(13, '2020_09_12_224555_create_donation_details_table', 1),
	(14, '2020_12_01_003659_create_consultation_requests_table', 1),
	(15, '2020_12_01_020815_create_service_items_table', 1),
	(16, '2020_12_01_030347_create_advertisements_table', 1),
	(17, '2020_12_01_030720_create_advertisement_items_table', 1),
	(18, '2020_12_02_200856_create_who_are_wes_table', 1),
	(19, '2020_12_02_210403_create_contact_us_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table almosafer.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table almosafer.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.permissions: ~52 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'create_users', 'Create Users', 'Create Users', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(2, 'read_users', 'Read Users', 'Read Users', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(3, 'update_users', 'Update Users', 'Update Users', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(4, 'delete_users', 'Delete Users', 'Delete Users', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(5, 'create_categories', 'Create Categories', 'Create Categories', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(6, 'read_categories', 'Read Categories', 'Read Categories', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(7, 'update_categories', 'Update Categories', 'Update Categories', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(8, 'delete_categories', 'Delete Categories', 'Delete Categories', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(9, 'create_sub_categories', 'Create Sub_categories', 'Create Sub_categories', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(10, 'read_sub_categories', 'Read Sub_categories', 'Read Sub_categories', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(11, 'update_sub_categories', 'Update Sub_categories', 'Update Sub_categories', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(12, 'delete_sub_categories', 'Delete Sub_categories', 'Delete Sub_categories', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(13, 'create_posts', 'Create Posts', 'Create Posts', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(14, 'read_posts', 'Read Posts', 'Read Posts', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(15, 'update_posts', 'Update Posts', 'Update Posts', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(16, 'delete_posts', 'Delete Posts', 'Delete Posts', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(17, 'create_roles', 'Create Roles', 'Create Roles', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(18, 'read_roles', 'Read Roles', 'Read Roles', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(19, 'update_roles', 'Update Roles', 'Update Roles', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(20, 'delete_roles', 'Delete Roles', 'Delete Roles', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(21, 'create_settings', 'Create Settings', 'Create Settings', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(22, 'read_settings', 'Read Settings', 'Read Settings', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(23, 'update_settings', 'Update Settings', 'Update Settings', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(24, 'delete_settings', 'Delete Settings', 'Delete Settings', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(25, 'create_donations', 'Create Donations', 'Create Donations', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(26, 'read_donations', 'Read Donations', 'Read Donations', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(27, 'update_donations', 'Update Donations', 'Update Donations', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(28, 'delete_donations', 'Delete Donations', 'Delete Donations', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(29, 'create_consultation_requests', 'Create Consultation_requests', 'Create Consultation_requests', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(30, 'read_consultation_requests', 'Read Consultation_requests', 'Read Consultation_requests', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(31, 'update_consultation_requests', 'Update Consultation_requests', 'Update Consultation_requests', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(32, 'delete_consultation_requests', 'Delete Consultation_requests', 'Delete Consultation_requests', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(33, 'create_serviceItem', 'Create ServiceItem', 'Create ServiceItem', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(34, 'read_serviceItem', 'Read ServiceItem', 'Read ServiceItem', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(35, 'update_serviceItem', 'Update ServiceItem', 'Update ServiceItem', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(36, 'delete_serviceItem', 'Delete ServiceItem', 'Delete ServiceItem', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(37, 'create_advertisement', 'Create Advertisement', 'Create Advertisement', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(38, 'read_advertisement', 'Read Advertisement', 'Read Advertisement', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(39, 'update_advertisement', 'Update Advertisement', 'Update Advertisement', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(40, 'delete_advertisement', 'Delete Advertisement', 'Delete Advertisement', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(41, 'create_advertisementItem', 'Create AdvertisementItem', 'Create AdvertisementItem', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(42, 'read_advertisementItem', 'Read AdvertisementItem', 'Read AdvertisementItem', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(43, 'update_advertisementItem', 'Update AdvertisementItem', 'Update AdvertisementItem', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(44, 'delete_advertisementItem', 'Delete AdvertisementItem', 'Delete AdvertisementItem', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(45, 'create_WhoAreWe', 'Create WhoAreWe', 'Create WhoAreWe', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(46, 'read_WhoAreWe', 'Read WhoAreWe', 'Read WhoAreWe', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(47, 'update_WhoAreWe', 'Update WhoAreWe', 'Update WhoAreWe', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(48, 'delete_WhoAreWe', 'Delete WhoAreWe', 'Delete WhoAreWe', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(49, 'create_contact_us', 'Create Contact_us', 'Create Contact_us', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(50, 'read_contact_us', 'Read Contact_us', 'Read Contact_us', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(51, 'update_contact_us', 'Update Contact_us', 'Update Contact_us', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(52, 'delete_contact_us', 'Delete Contact_us', 'Delete Contact_us', '2020-12-02 21:20:54', '2020-12-02 21:20:54');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table almosafer.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.permission_role: ~59 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(51, 1),
	(52, 1),
	(37, 4),
	(38, 4),
	(39, 4),
	(40, 4),
	(41, 4),
	(42, 4),
	(43, 4),
	(44, 4);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table almosafer.permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) unsigned DEFAULT NULL,
  UNIQUE KEY `permission_user_user_id_permission_id_user_type_team_id_unique` (`user_id`,`permission_id`,`user_type`,`team_id`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  KEY `permission_user_team_id_foreign` (`team_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.permission_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;

-- Dumping structure for table almosafer.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table almosafer.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'Super Admin', 'Super Admin', '2020-12-02 21:20:53', '2020-12-02 21:20:53'),
	(2, 'admin', 'Admin', 'Admin', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(3, 'user', 'User', 'User', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(4, 'Advertisement', NULL, NULL, '2020-12-04 14:38:13', '2020-12-04 14:38:13');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table almosafer.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) unsigned DEFAULT NULL,
  UNIQUE KEY `role_user_user_id_role_id_user_type_team_id_unique` (`user_id`,`role_id`,`user_type`,`team_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_team_id_foreign` (`team_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.role_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`, `team_id`) VALUES
	(1, 1, 'App\\User', NULL),
	(2, 2, 'App\\User', NULL),
	(4, 2, 'App\\User', NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table almosafer.service_items
CREATE TABLE IF NOT EXISTS `service_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.service_items: ~5 rows (approximately)
/*!40000 ALTER TABLE `service_items` DISABLE KEYS */;
INSERT INTO `service_items` (`id`, `icon`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(7, 'images/LY0mcqLArPjn24SRdKg4i62tqIVX5Dvji9yBC5ru.png', 'السيــاحــة', 'السيــاحــة السيــاحــة السيــاحــة السيــاحــة السيــاحــةالسيــاحــة  السيــاحــة السيــاحــة  السيــاحــة\r\nالسيــاحــة السيــاحــة السيــاحــة السيــاحــة السيــاحــةالسيــاحــة  السيــاحــة السيــاحــة  السيــاحــة السيــاحــة السيــاحــة السيــاحــة السيــاحــة السيــاحــةالسيــاحــة  السيــاحــة السيــاحــة  السيــاحــة', '2020-12-03 12:19:05', '2020-12-03 12:19:05'),
	(8, 'images/CSqSzxW3Ks7NfCyPpP2B4VTRliF1pRVU8CowFyss.png', 'تـأجيـر السيــارات', 'تـأجيـر السيــارات تـأجيـر السيــارات تـأجيـر السيــارات تـأجيـر السيــارات تـأجيـر السيــارات تـأجيـر السيــارات تـأجيـر السيــارات تـأجيـر السيــارات تـأجيـر السيــارات تـأجيـر السيــارات', '2020-12-03 12:19:31', '2020-12-03 12:19:31'),
	(9, 'images/KLFdvTwnwHO6mJlLaS0PSCEFcxXESCBdtyIrNRDe.png', 'الإقامات و الـتامين الصحي و تأمين السيارات', 'الإقامات و الـتامين الصحي و تأمين السيارات الإقامات و الـتامين الصحي و تأمين السيارات الإقامات و الـتامين الصحي و تأمين السيارات الإقامات و الـتامين الصحي و تأمين السيارات', '2020-12-03 12:20:04', '2020-12-03 12:20:04'),
	(12, 'images/GkobELmWHTQ4RQ5oGrS0iSpBZ3BHpQFEZ3Hqn31V.png', 'سيارات', 'سيارات سيارات سيارات سيارات سيارات سيارات سيارات سيارات سيارات سيارات سيارات سيارات سيارات سيارات\r\nسيارات سيارات سيارات سيارات سيارات سيارات سيارات', '2020-12-05 15:35:43', '2020-12-05 15:35:43');
/*!40000 ALTER TABLE `service_items` ENABLE KEYS */;

-- Dumping structure for table almosafer.sub_categories
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.sub_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;

-- Dumping structure for table almosafer.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teams_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.teams: ~0 rows (approximately)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Dumping structure for table almosafer.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` bigint(20) DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `provider_id`, `provider`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'super_admin@super.com', '2020-12-02 21:20:54', '$2y$10$AlnpwNETp.7nqosxQLleVO2U.l8GRZL4M68tMoVLzA4CsduifBtjW', NULL, NULL, NULL, NULL, '5Ruoa90EgzsfB1YBAEMuiWAwFlCPtYZPO5EnaoMkgtdRUmGuqqLAoCskeKUa', '2020-12-02 21:20:54', '2020-12-02 21:20:54'),
	(2, 'Ahmad', 'Ahmad@gmail.com', NULL, '$2y$10$G1zyhuueUJDkAtBzSfl2n.WlFgZvRem7Cr2l9VGIhUm0yri5l201y', NULL, NULL, NULL, NULL, NULL, '2020-12-04 14:37:00', '2020-12-04 14:38:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table almosafer.user_information
CREATE TABLE IF NOT EXISTS `user_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_donation` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.user_information: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_information` ENABLE KEYS */;

-- Dumping structure for table almosafer.who_are_wes
CREATE TABLE IF NOT EXISTS `who_are_wes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `general_description` text COLLATE utf8mb4_unicode_ci,
  `team_description` text COLLATE utf8mb4_unicode_ci,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table almosafer.who_are_wes: ~0 rows (approximately)
/*!40000 ALTER TABLE `who_are_wes` DISABLE KEYS */;
INSERT INTO `who_are_wes` (`id`, `general_description`, `team_description`, `youtube_link`, `photo1`, `photo2`, `created_at`, `updated_at`) VALUES
	(9, 'ذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النصq\r\n                                العربى، حيث\r\n                                يمكنك\r\n                                أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها\r\n                                التطبيق. إذا\r\n                                كنت\r\n                                تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقراq\r\n\r\n\r\nت كما تريد', 'ذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص\r\n                                العربى، حيث\r\n                                يمكنك\r\n                                أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها\r\n                                التطبيق. إذا\r\n                                كنت\r\n                                تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرا\r\n\r\n\r\nت كما تريد', 'https://www.youtube.com/watch?v=8ihN9XbNVnk', 'images/quRC4HKN58qBaVNHIKN5Tbt4CU4YgLg1mzU7GmWF.png', 'images/TqHJPGgyGLCSbUnqzSTEWVdWvBYVkxwmZ9Etf3wB.png', '2020-12-04 16:01:41', '2020-12-05 19:15:09');
/*!40000 ALTER TABLE `who_are_wes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
