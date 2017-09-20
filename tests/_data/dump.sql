-- MySQL dump 10.13  Distrib 5.7.19, for osx10.11 (x86_64)
--
-- Host: localhost    Database: dcas_l55_refactor
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_lines`
--

DROP TABLE IF EXISTS `language_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language_lines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `language_lines_group_index` (`group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_lines`
--

LOCK TABLES `language_lines` WRITE;
/*!40000 ALTER TABLE `language_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `language_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lern_exceptions`
--

DROP TABLE IF EXISTS `lern_exceptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lern_exceptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `status_code` int(11) NOT NULL DEFAULT '0',
  `line` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trace` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lern_exceptions`
--

LOCK TABLES `lern_exceptions` WRITE;
/*!40000 ALTER TABLE `lern_exceptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `lern_exceptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_04_09_062329_create_revisions_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2015_08_25_172600_create_settings_table',1),(5,'2016_03_17_000000_create_lern_tables',1),(6,'2016_03_27_000000_add_user_data_and_url_to_lern_tables',1),(7,'2016_06_01_000001_create_oauth_auth_codes_table',1),(8,'2016_06_01_000002_create_oauth_access_tokens_table',1),(9,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(10,'2016_06_01_000004_create_oauth_clients_table',1),(11,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(12,'2017_08_30_221625_create_cache_table',1),(13,'2017_08_30_222130_create_notifications_table',1),(14,'2017_08_30_222247_create_failed_jobs_table',1),(15,'2017_08_30_222311_create_jobs_table',1),(16,'2017_08_30_222314_create_sessions_table',1),(17,'2017_09_06_211054_entrust_setup_tables',1),(18,'2014_10_12_200000_add_username_to_users_table',2),(19,'2016_05_31_124502_create_scheduled_events_table',3),(20,'2017_09_10_033025_create_tag_tables',4),(21,'2017_09_10_033356_create_language_lines_table',5),(22,'2017_09_10_193000_add_is_admin_to_users_table',6),(23,'2017_09_10_193858_add_is_disabled_to_users_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Datacenter Automation Suite Personal Access Client','osyxv5e2ovQrPPcK8b1wGmjnp4hdB6lVISxVeGyv','http://localhost',1,0,0,'2017-09-06 22:33:10','2017-09-06 22:33:10'),(2,NULL,'Datacenter Automation Suite Password Grant Client','8jcfd6SJoaL7VpoidnxFTcwW6cqqnCWw5LcR8twF','http://localhost',0,1,0,'2017-09-06 22:33:10','2017-09-06 22:33:10');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2017-09-06 22:33:10','2017-09-06 22:33:10');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('sarah@sarahrenner.work','$2y$10$VifSo0nG1Oivc.5Do3H3Xej3.R.Vm7KRsaMIwtW08ixP21aNyOPMm','2017-09-09 02:30:01');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revisions`
--

DROP TABLE IF EXISTS `revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revisions`
--

LOCK TABLES `revisions` WRITE;
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
INSERT INTO `revisions` VALUES (1,'App\\User',1,NULL,'created_at',NULL,'2017-09-06 17:33:34','2017-09-06 22:33:34','2017-09-06 22:33:34'),(2,'App\\User',1,1,'remember_token',NULL,'RJt6GVUdY9XRSWmlftm1eOCizcxEDf3qRiyZ7SmQNTKG7qGc7ju6oMTBU2t4','2017-09-06 23:22:01','2017-09-06 23:22:01'),(3,'App\\User',1,1,'remember_token','RJt6GVUdY9XRSWmlftm1eOCizcxEDf3qRiyZ7SmQNTKG7qGc7ju6oMTBU2t4','6TtQfqCqTjwHDlPNsGyhDBPSKp9Lm6gStgeHZMMUNil02UobTmXdhkwDV7aA','2017-09-07 01:04:34','2017-09-07 01:04:34'),(4,'App\\User',1,1,'remember_token','6TtQfqCqTjwHDlPNsGyhDBPSKp9Lm6gStgeHZMMUNil02UobTmXdhkwDV7aA','rAu6RKTom0nYptcD8aZOvRmY0zoZTiI6VGWrt40FceQtBXq74hNf1w7CI8c3','2017-09-07 01:31:38','2017-09-07 01:31:38'),(5,'App\\User',1,1,'remember_token','rAu6RKTom0nYptcD8aZOvRmY0zoZTiI6VGWrt40FceQtBXq74hNf1w7CI8c3','BWwAGWfxIweIQmAAt8FxmRjxaIp86cMj6jw1LeJ7FRgCi6GbV8FmSUOCTUBT','2017-09-07 06:58:47','2017-09-07 06:58:47'),(6,'App\\User',1,1,'remember_token','BWwAGWfxIweIQmAAt8FxmRjxaIp86cMj6jw1LeJ7FRgCi6GbV8FmSUOCTUBT','YjUOkCZJuyu25kSrfNizPTY6nRn3hh9NH1hScPRGgZG0UAIDZFHa0djmSOn0','2017-09-07 06:59:47','2017-09-07 06:59:47'),(7,'App\\User',1,1,'remember_token','YjUOkCZJuyu25kSrfNizPTY6nRn3hh9NH1hScPRGgZG0UAIDZFHa0djmSOn0','knTrs1wLspPetaHoUFoVzwW15eO0Pr0tEipucVXAelOC2RKK1YDaNhdI0o47','2017-09-07 07:15:47','2017-09-07 07:15:47'),(8,'App\\User',1,1,'remember_token','knTrs1wLspPetaHoUFoVzwW15eO0Pr0tEipucVXAelOC2RKK1YDaNhdI0o47','IH0P4itQnca6bTZAXcPmA7xutiGhQCq0ij1yEjTzLw0XCDsRgxmCPqokLlH2','2017-09-07 07:18:32','2017-09-07 07:18:32'),(9,'App\\User',1,1,'remember_token','IH0P4itQnca6bTZAXcPmA7xutiGhQCq0ij1yEjTzLw0XCDsRgxmCPqokLlH2','6YoOFNJhUr2xnJ9Y6w2quT05JeGntON7FHCuFwzvEVOZGQNVY2SxW6pbeFXw','2017-09-07 07:20:08','2017-09-07 07:20:08'),(10,'App\\User',1,NULL,'username',NULL,'srenner','2017-09-09 01:52:01','2017-09-09 01:52:01'),(11,'App\\User',1,1,'remember_token','6YoOFNJhUr2xnJ9Y6w2quT05JeGntON7FHCuFwzvEVOZGQNVY2SxW6pbeFXw','OFQzDzk3DwKrLAAJ1TlnSyWygWK5OeKYkSJ3gCBR96llG6SFG7mN5FjHyFEH','2017-09-09 02:00:58','2017-09-09 02:00:58'),(12,'App\\User',1,1,'remember_token','OFQzDzk3DwKrLAAJ1TlnSyWygWK5OeKYkSJ3gCBR96llG6SFG7mN5FjHyFEH','z6c2uDjoeOQBsH9wgYIMf9XRyaan3h9ni8flyvqPFBnorB0ug7nfW2XJqh1T','2017-09-09 02:09:17','2017-09-09 02:09:17'),(13,'App\\User',1,1,'remember_token','z6c2uDjoeOQBsH9wgYIMf9XRyaan3h9ni8flyvqPFBnorB0ug7nfW2XJqh1T','zgEx3I7wIon3MBI7Dkd34Xdyfm2z3hx4DOH5dNhMRotT0zXhdeVGpLOHoTYN','2017-09-09 02:20:47','2017-09-09 02:20:47'),(14,'App\\User',1,1,'remember_token','','jvO7GjssL2RVJozI8zREvsQeo7MA0pwnOIfgPGzN2w1ySLiZrpbR0jmqZv6U','2017-09-10 01:34:10','2017-09-10 01:34:10'),(15,'App\\User',101,NULL,'created_at',NULL,'2017-09-10 19:34:28','2017-09-11 00:34:28','2017-09-11 00:34:28'),(16,'App\\User',102,NULL,'created_at',NULL,'2017-09-10 19:37:30','2017-09-11 00:37:30','2017-09-11 00:37:30'),(17,'App\\User',103,NULL,'created_at',NULL,'2017-09-10 19:42:01','2017-09-11 00:42:01','2017-09-11 00:42:01'),(18,'App\\User',10,NULL,'deleted_at',NULL,'2017-09-11 17:12:02','2017-09-11 22:12:02','2017-09-11 22:12:02'),(19,'App\\User',10,NULL,'updated_at','2017-09-10 19:11:35','2017-09-11 17:12:02','2017-09-11 22:12:07','2017-09-11 22:12:07'),(20,'App\\User',10,NULL,'deleted_at',NULL,'2017-09-11 17:12:02','2017-09-11 22:12:07','2017-09-11 22:12:07');
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheduled_events`
--

DROP TABLE IF EXISTS `scheduled_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scheduled_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `command` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `output` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scheduled_events_command_index` (`command`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheduled_events`
--

LOCK TABLES `scheduled_events` WRITE;
/*!40000 ALTER TABLE `scheduled_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `scheduled_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1pDbOpkRTzm5wDHMHfQD4PxeHNCEXKqQgNljtqVp',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieWZkQ29Ha3lGQXBTZGdqVk5JRGlsM2d2QXVrOHA1cDRFTXRUN0VaaSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1504737263),('5AqgDU1ZqcGOZvvrzIpacaazpifenhRN6EYliz1g',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','YTo2OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiVEZqMFpreTNqMVo2b2VlazVBWVJrdW5XOEdFNExVeG56ZFQ2dHNBbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9kY2FzLWw1NS1yZWZhY3Rvci5kZXYvbG9naW4iO31zOjE4OiJmbGFzaF9ub3RpZmljYXRpb24iO2E6MDp7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzg6Imh0dHA6Ly9kY2FzLWw1NS1yZWZhY3Rvci5kZXYvZGFzaGJvYXJkIjt9czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9fQ==',1504741781),('HuSe5SwCdR8g4wo4ZyoLewIy9W69684MsKI5fV4z',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTzQ1U3QyN3ZwUTlMeks4ejhQSG5IM0tHZWJEOTdBMk1NejRDS3g2UiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9kY2FzLWw1NS1yZWZhY3Rvci5kZXYvZGFzaGJvYXJkIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxODoiZmxhc2hfbm90aWZpY2F0aW9uIjthOjA6e31zOjIyOiJQSFBERUJVR0JBUl9TVEFDS19EQVRBIjthOjA6e319',1504744495);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taggables`
--

DROP TABLE IF EXISTS `taggables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taggables` (
  `tag_id` int(10) unsigned NOT NULL,
  `taggable_id` int(10) unsigned NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `taggables_tag_id_foreign` (`tag_id`),
  CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taggables`
--

LOCK TABLES `taggables` WRITE;
/*!40000 ALTER TABLE `taggables` DISABLE KEYS */;
/*!40000 ALTER TABLE `taggables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` json NOT NULL,
  `slug` json NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_disabled` tinyint(1) NOT NULL DEFAULT '0',
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  FULLTEXT KEY `users_index` (`name`,`email`,`stripe_id`,`card_brand`,`card_last_four`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sarah Renner','srenner','sarah@sarahrenner.work','$2y$10$GWZ4v/CGwT.5DwfDOKepXeP6IH39AbTAl9Esjdyy8IvWN8r41P42m',1,0,NULL,NULL,NULL,NULL,'','2017-09-06 22:33:34','2017-09-09 01:52:00',NULL),(2,'Deron Williamson','clementina.rempel','obashirian@gmail.com','$2y$10$zAdltJMljqZIQVX/BVrTuuRtwrb7ahiv1Z1VUt73kE9GM0qZMkZJ2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:34','2017-09-11 00:11:34',NULL),(3,'Prof. Freddy Stracke','velma.koelpin','labadie.josephine@gmail.com','$2y$10$ZYMcZGpAac.Bzip/I9E0TOzI7lw/aZHIq.dRJoiE5tkmbitWV/HKq',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:35','2017-09-11 00:11:35',NULL),(4,'Prof. Jayce Mayert','therese.gottlieb','vlarson@mccullough.com','$2y$10$BLS9I.ThY.CCDuZrdJd2MurCY7vt1HWX4pL7Zl2WqKGJBBd/6pHe2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:35','2017-09-11 00:11:35',NULL),(5,'Hilbert Casper','lottie.davis','eric.bailey@smitham.info','$2y$10$sPjEaxjLhKkm/Xhv8A6IGeT2bW7.rxCVegEzZsx5Iz23xWgsdAGn.',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:35','2017-09-11 00:11:35',NULL),(6,'Savanah Feil','shanahan.wyman','kelley.dickens@yahoo.com','$2y$10$CmHmvyKC./53dL.jNxibSuTyTogjCpvTIFjrZZ2Z5beTjWnA1YrWW',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:35','2017-09-11 00:11:35',NULL),(7,'Mr. Myron Schaden II','morar.maximillian','jchamplin@hotmail.com','$2y$10$jl7amM8cmfaKJZfNDSqvguO94UHe4azI6vk0RZ4LE8QR1.3Sa9Z4u',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:35','2017-09-11 00:11:35',NULL),(8,'Mr. Leo Effertz DDS','hane.maybell','damian.johns@yahoo.com','$2y$10$Wuzyg.jQVJVQ1GUgFx/G6eoofThYGEO/98Qte9CiDMq5ktFYp7oXa',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:35','2017-09-11 00:11:35',NULL),(9,'Marlene Cremin','patsy.lakin','johnson.charlie@medhurst.com','$2y$10$L9La2b6lC1BzEICXWfzCNOiwUTawngNGjbpKBQKlERkw9wOVn0xm2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:35','2017-09-11 00:11:35',NULL),(10,'Lorena Will Sr.','gnader','bschiller@johnston.com','$2y$10$a8D1vsh4bx56EDXq9PlwKudT.kjWH7r0ca/SNfEkCxUjvHLL0DkK.',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:35','2017-09-11 22:12:02','2017-09-11 22:12:02'),(11,'Keon Gleason','mosciski.lisa','andreane.okuneva@haley.info','$2y$10$/IzA3BERJGty7viN7WCjOuypcv94R6Tr3Vktc1cWq6cvDXWowROK6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:36','2017-09-11 00:11:36',NULL),(12,'Gladyce Green','ferry.sebastian','murphy.fredrick@bartell.com','$2y$10$/mtZOYWXzPuFomW0pzxGie0lQZE9TSQcxSXkefibUoRihfhM13Sc2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:36','2017-09-11 00:11:36',NULL),(13,'Dr. Rupert Schowalter DDS','johns.herman','kpaucek@gmail.com','$2y$10$9XFwOt8zk3XWQa5XxScet./3uFe26bro3ltCHyn5oCOsbivH0oZma',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:36','2017-09-11 00:11:36',NULL),(14,'Omer Stoltenberg','laura68','bernice.herzog@yahoo.com','$2y$10$lMAyxPQRYf6KCUASApct3O7UufRMFvAz1MOEN6PFPngZdcE3FqomO',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:36','2017-09-11 00:11:36',NULL),(15,'Ollie Christiansen','orunte','leo.daugherty@hotmail.com','$2y$10$xlTGZAmjdENhRZjM.IHVnewi565opc5N3yReK30/7401sfrl/EyW.',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:36','2017-09-11 00:11:36',NULL),(16,'Torey Strosin','qjohnson','dario02@hotmail.com','$2y$10$1gkiAEX.KAZl088X715ccuEqwdbnKuCpOpKD/.1m0CqsGi.M65.p.',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:36','2017-09-11 00:11:36',NULL),(17,'Dusty Lang','kuhlman.shanny','mcglynn.eveline@prohaska.com','$2y$10$Vn7AeK.bW1yPlAVgV8BN7ONeigJKrQ5U5Mvc8PtuS9PHozAkggMB2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:36','2017-09-11 00:11:36',NULL),(18,'Hubert Marquardt','ibreitenberg','vruecker@marquardt.net','$2y$10$hud691AhJT/yunWGfovekuykuBcW0HiAIV6O99fYHdnNXE6Ite37G',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:36','2017-09-11 00:11:36',NULL),(19,'Luella Hegmann I','jules41','andrew.schneider@gmail.com','$2y$10$NkJhyqmi9oEv/hG2CBAWsuq15McAbNEUpTYdCcnfBdl7eD3L1HPDm',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(20,'Anne Collier','christa21','zhoppe@hand.org','$2y$10$KcjTN1Miur5EzOUbPsUXRO09u9l.0EAn0PflUE8HFvBJwM2SSApaO',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(21,'Wilford Lockman','schowalter.dangelo','jmurazik@gmail.com','$2y$10$8nCBnfA.IXHh1RQGw.Ztr.hEWlwy75Bhr//imtQRmtkQ3qW.z1Lg6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(22,'Elyse Miller','retta62','art55@boyle.com','$2y$10$IWFy4Yuh8hdtSWMSuCjc5ea4leMnhocIcHFWXWrIO4g7xNnpy.K9G',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(23,'Dr. Keshawn O\'Reilly V','britchie','mccullough.bianka@bayer.org','$2y$10$CMwnCOyUjoGmgF0gMfLZleOphuDgSFcHlwAdhToBz9BH2opGYydeK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(24,'Ahmed Kihn','arnulfo06','brice11@kub.biz','$2y$10$QRPbllAeA6ttrz.ByvAxzO8/G9w3FboiiZZGBUFCP.pVON4B7jPhu',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(25,'Prof. Melyna Gottlieb','xbednar','milo.heathcote@conn.com','$2y$10$sagF4SBrkqwh3EHza3u70.02V2D0MFMbKLoM99tqtk9cVvceJ1V/e',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(26,'Sandrine Runolfsson','eva.sipes','fabian.barrows@yahoo.com','$2y$10$icbQ0eaNnQvf4Nn47Mr2keT3kEVAFWqwZSBft0rd9Fw/8GdOyTZr.',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(27,'Hayley Mueller','julia.davis','mills.reanna@larson.com','$2y$10$o26ukqtBDObRCQgHa2lbX.rf2SEMMX0BR4CyXCFNC6RurE.f8vdWi',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:37','2017-09-11 00:11:37',NULL),(28,'Dr. Hobart Wyman','jakubowski.ray','gislason.kenny@hotmail.com','$2y$10$fYZxpaYP3hspg4nRiBCdEeEDzT760QgCYST9B9PwPp7lSPriPY1J6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:38','2017-09-11 00:11:38',NULL),(29,'Mr. Stanley Schowalter','forest54','trever45@toy.com','$2y$10$ZLO56VaB0cqmvqJMStVGjOhtyUPFGCueqldAtPLtQdV6bddbI8D3a',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:38','2017-09-11 00:11:38',NULL),(30,'Myah Quigley','saige.beer','raymundo62@vonrueden.com','$2y$10$gALAWeey.Fih6thyEHRode2szgJsUAQDn1OeRlgLB7IZzgMiPEpsy',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:38','2017-09-11 00:11:38',NULL),(31,'Marcel Jaskolski','homenick.katelyn','daryl.rodriguez@gmail.com','$2y$10$ebNnWlLSPJc8Mx9Rn3gnNu6r3XDSFrnUT1JcvbAVxiFbKUso9LIpa',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:38','2017-09-11 00:11:38',NULL),(32,'Prof. Kristin Fadel V','connelly.thad','wilbert.cormier@gmail.com','$2y$10$9hjxQ7fYvJkrFc0pQCHUPuFEgiJBUBV3zGgImo.5tIa6A7yI6HRie',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:38','2017-09-11 00:11:38',NULL),(33,'Sage Lehner IV','orville39','qorn@mitchell.com','$2y$10$7WvfQVrqpJcH2bKXE1EHhOuBmWh05VOH8ZZOMDRYEAYlKruj1yApO',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:38','2017-09-11 00:11:38',NULL),(34,'Marion Ebert','tokeefe','jude13@davis.com','$2y$10$xTmq7lUacjl7ZcP9B4hxwee4h12ReH4H33SnwBsfTq4BDjodQd08a',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(35,'Rodrigo Borer','pedro12','erica.boehm@gmail.com','$2y$10$ryc8ckQ1u06aSOLjlJOcQuR4L/7hY9qLYlHAHHgSaPzqJ663WOP3y',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(36,'Ryan Schiller PhD','fisher.christine','asha.oconner@tromp.com','$2y$10$Uwp8tpk0rsBsigNJIWRJe.8AIR001S99gb3T3UC87tuzIcv6u2sU2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(37,'Melissa Frami DVM','howell18','grunte@gmail.com','$2y$10$TZUHsDQ4Jeqbu35kdYTBEe9auwhoYy1lUV7BniuCo/kl8yg9GWsU6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(38,'Prof. Bella Haley DVM','brent10','fmills@connelly.net','$2y$10$zGam11KDElWMpmu2hbgIY.2dTFZOaE7FlXL/Kd3BIFfo6F7L0u6bC',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(39,'Kari Quitzon','emely31','schuster.reba@bernhard.net','$2y$10$5VF.O9HdFz8b65j1vNPNlurVq5sOfObuMTm/ae25Nrt3nWCk1L3vi',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(40,'Angela Olson','hstanton','noemy.mante@gmail.com','$2y$10$qfX6vvYtr6dxVpcA6jct2OzOErCLeRL8Ia1NRX0wv3ksrsK3yroMG',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(41,'Olin Braun','pouros.elaina','lukas.balistreri@yahoo.com','$2y$10$LRokWBEGnKFR/gvcmBQTYOC2UHncLCemQ3OMVi2loxa3ih5CV.9R6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(42,'Savannah Waelchi','ora.howell','melisa.considine@yahoo.com','$2y$10$AezisJf0zpEvw9ml8L9eR.5iOMra.OyygmgzNz3YZT1yWdB3j5/DO',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:39','2017-09-11 00:11:39',NULL),(43,'Tad Emmerich','monserrate98','bechtelar.shanny@cartwright.com','$2y$10$z6K4GId2.k7Snk5pqNfc.ODcXb3.FmxSs63T.BEzfi52ywyrvIHUy',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(44,'Coleman Stokes','eleonore.paucek','ila.conroy@cassin.com','$2y$10$rj4uRc1K/zl0ZV.YrCBSK.SkujI5A51VsKzR4YZDPMzDx17pbFkn6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(45,'Valentin Glover','boehm.novella','kattie.tremblay@gmail.com','$2y$10$.0FwDu2L.UcIO77yEUBEZu6j8o1ZJF2G7gG/ldduaY6sUUnsKHkyK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(46,'Dr. Telly Conroy I','dennis.turcotte','mstanton@dicki.com','$2y$10$g1CYF6YiZ/I6YTAmyxqYA.nwBRsLbE1NI06JAxXPoB77TIyjfDbNK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(47,'Joy Konopelski III','goodwin.watson','lowe.idell@hotmail.com','$2y$10$NyRPo8NRG0jJqInUaf83uOcUCfpj5vxjDUhgXDzRoomttJyi5otSu',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(48,'Miss Ophelia Towne','maudie27','tlebsack@hotmail.com','$2y$10$CYDh5PMsoCsD3IOZ29bsde6u3nWHaFhAJPMcA62YJPTUiVcnsxw2W',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(49,'Ole Tromp','heathcote.corine','vvonrueden@yahoo.com','$2y$10$LI.IGXaCWeBEEjWNHrNbv.m1wUbVX6lZh7LUwCggNaTrlJHFsBTPC',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(50,'Christ Paucek','gene69','arthur.wisozk@yahoo.com','$2y$10$LHCBQ81IE8z/vEv4Fxj8qudJup3Pj.qECA/ptk4RW4YE2w4hBtqEW',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(51,'Tara Spencer','eugene.satterfield','frida45@gmail.com','$2y$10$HRRyJD8dob0NtjiBv6SSGujEaS4fkOJWlpSFaRii.ExIUdT8ilL9m',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(52,'Tiana Hagenes','wkeebler','wintheiser.frederick@gmail.com','$2y$10$Pa2tzmPx6UqCQDZ2FOSqOeN2waGBR9ABsXqCd5R52SS.UIWrkkkna',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:40','2017-09-11 00:11:40',NULL),(53,'Adell Price','bogan.jewell','tstamm@yahoo.com','$2y$10$C5q44IrE2AlPUFgLcGEYyuxw9eDOKE8aEPJq0my6TXPZgrOqmhz2i',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(54,'Loraine Haley','janie68','john12@stanton.com','$2y$10$MyDlR98wUzah52cUlAWiUueRAqHEGY5IFdz/FVIlea.4B1lqD8yBy',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(55,'Virginie Pagac IV','koelpin.elisa','hharris@gmail.com','$2y$10$2ZU8FgQXjqf27FnaEvaNOu8m/qpQuP23qOIqq2FSPlE2qrZMWjfYu',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(56,'Bartholome Lakin Sr.','greenholt.tommie','leann36@hauck.com','$2y$10$y8yLSaG1L2ptNrvuRl9lVuphE.mn/WARH4mejRYLKSko7zFoaH2U6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(57,'Ebba Kessler MD','mya30','heaney.estelle@hane.com','$2y$10$UdiCsuFdMba/viDHeOj.Juo8Campo8rgvvktntjEc5zvQ335/R0vK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(58,'Sherwood Terry','rashawn.mayert','miles83@hotmail.com','$2y$10$UPXrBfazpgbukApNcZrA.uPIPL2cqpVO2zaWyEnw2GrVZbmCvo4oC',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(59,'Dr. Tomasa Gislason','tremaine.kovacek','tschoen@toy.com','$2y$10$rfbDlzTEPJ8s5oXWMpZdquIJr.8tm4Y77UdbMJStanryvcND.E2jG',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(60,'Pietro Sporer','leif39','oswaldo52@hotmail.com','$2y$10$UacttOpRJCxuxdVDwXBWqeRdcXXqn1k0fjeIhWPLuwnPncQDrugGS',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(61,'Mrs. Pattie Hodkiewicz','ykuhic','glang@gmail.com','$2y$10$R/pJRqqUUtx5CtIml0p8tOzoxw/3qdEmPieYWkuft32cXeEhegmSa',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(62,'Eveline Willms III','horace.block','bgorczany@zemlak.org','$2y$10$1ChpQvCEDqk5It8T7Ajan.6p6uV4U7NwXKojQ9wDzuOfIQKR7bHLe',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:41','2017-09-11 00:11:41',NULL),(63,'Miss Zetta Blanda','writchie','mona.herzog@yahoo.com','$2y$10$KnyY8OInaEBsjfBFzDqDDOTi5FBxw1BANXI7fcptO.SZEUjaNIDI6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(64,'Prof. Randy Reichel DVM','kohler.jazmin','mcummings@leffler.info','$2y$10$KN3jLPqr5Jha9uZM8v2taeN9MYdYHWByYdxU9ky/X2x62vFHCd.XW',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(65,'Shawna Hoeger','smonahan','lhirthe@haley.com','$2y$10$FviunuOnFRT9qSw8E9n7Q.pCUx0MC.EKX6HnznLEEzAqYnf5hZafG',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(66,'Ewell Osinski I','barry50','kira.hessel@gmail.com','$2y$10$09HegSYXLUGVNUKzHGOs3OvrxXKxZTpOhxPpieKxa647grRuVahJe',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(67,'Ms. Marcella Connelly III','flossie09','kling.tyra@ruecker.com','$2y$10$J3L2stpCVRw6KyCzCZRGPuMdOzL/.ejpJT4IgpbDrgeZ7iUIfHvUK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(68,'Dahlia Effertz','pmetz','fpaucek@brekke.biz','$2y$10$Wtpiloz6kE2DFF5EFPfLQuppYJRFaya0hl5Nuvc.UwNhgI3CFTILS',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(69,'Dr. Jeremy Turcotte','ywyman','leone.hoeger@hotmail.com','$2y$10$Ptj6RWclTRrBpf7E4PIK7.ekzk2jzBoqrSUrHazDey5zPQU5BPLxO',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(70,'Kenton Rempel','bstanton','hailie84@beier.com','$2y$10$YrpvaA721x1HVQwFfyGsS.2nlTFPTmy1XBQAEM939KmWVB5UwCvva',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(71,'Kirsten Hackett','ddooley','reed13@hotmail.com','$2y$10$jF0P5LwZRk0rxT0ekQD0IOkoriAS8ehFkZsAwxs84PlTCfr4vqMYy',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:42','2017-09-11 00:11:42',NULL),(72,'Prof. Shawn Carter','francisca.stehr','janis.gulgowski@corkery.com','$2y$10$9s4H5UwcocWzKPh7jjzVqOytFCnZEEpq8vK.NiFmDiY3RpoUGRIpC',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:43','2017-09-11 00:11:43',NULL),(73,'Trevor Greenfelder','cristina.king','zulauf.constance@gmail.com','$2y$10$xQNjuDYqUwtuuEEsUiZ9yOo6.maJrrH.3mDYSoITUO.w4qnPLFX9G',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:43','2017-09-11 00:11:43',NULL),(74,'Melba Vandervort','borer.lavinia','freichert@batz.net','$2y$10$yaYLVmY1.vyEoPm02CBNw.6wCa/HIvEZRX59tsU9ZkYfGFyI2n04q',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:43','2017-09-11 00:11:43',NULL),(75,'Rick Schuppe','dillan.connelly','carlotta66@hirthe.org','$2y$10$WRxxiSHhk1t6Zb.3mk9SD.mtUMMJqlN3afsZdSXxdwx7SvuzFslDG',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:43','2017-09-11 00:11:43',NULL),(76,'Mr. Osborne Toy I','dcrona','krystina57@gmail.com','$2y$10$OQSpszw0v2yHtRQoRFyMnu0kWtYe7RvU5m9t9i69j9x8z8jYjj2lW',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:43','2017-09-11 00:11:43',NULL),(77,'Jordon Balistreri','dario.kunde','ukling@hotmail.com','$2y$10$BYUcCZKNcXNdQW3zqWCnyeK69AcJ.YMEyskmc6P2xAzY80W/DtOiW',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:43','2017-09-11 00:11:43',NULL),(78,'Simone Tillman','hschultz','thomas31@oreilly.com','$2y$10$16J2c4DAYU6EonEQHuuvfOn5aVH8FEfWM971eGk8TF3PD1izor3F2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:43','2017-09-11 00:11:43',NULL),(79,'Bria Lang MD','dejon80','mschmeler@boehm.com','$2y$10$TiIaNS0r.dJ.8qsyyjjwIehKPEhi7MYFlOSomSZ5PpIBl48znuntS',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:43','2017-09-11 00:11:43',NULL),(80,'Bridget Vandervort','brolfson','dante00@konopelski.net','$2y$10$w.4D1KjfvXl3ncLJ18DV7e9P8dHL5tm5gdneEjaqkW7MaCN7ZhMDK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:44','2017-09-11 00:11:44',NULL),(81,'Deangelo Legros','blanda.brandt','ikuhn@treutel.com','$2y$10$/tCkYzZ9lU97yZedqJ.Zcun6YomBotsJsi/h4.lqxgSE.ATtbLBI2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:44','2017-09-11 00:11:44',NULL),(82,'Isabel Erdman','littel.penelope','robert57@ohara.com','$2y$10$yVDHPgb/1NbW1N6kpjObzOwN1ybltnElzsEmH9n6RnKdJs9SMmqvm',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:44','2017-09-11 00:11:44',NULL),(83,'Vicenta Rodriguez','nwiegand','myrtie.stroman@gmail.com','$2y$10$mKGqSX52c2wDvrlnetTk8.686Eyv3jPxeu9ejEXMXGYTmXjHdChZm',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:44','2017-09-11 00:11:44',NULL),(84,'Sadie Bogisich','jason.becker','kmurphy@hotmail.com','$2y$10$UyzzV0dhC6TRJiymvo46Q.8/wlJE/lfaMn11j8QG1lpZ0o/XNm8k2',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:44','2017-09-11 00:11:44',NULL),(85,'Glenda Pouros I','wiegand.aniyah','marcos.bradtke@gmail.com','$2y$10$KiWuXa26afJhj6t4VBOct.fGsCe06XLcEy/Nd58rmQfKCgDkOuuK.',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:45','2017-09-11 00:11:45',NULL),(86,'Ms. Effie Keebler III','lgoodwin','franco13@hotmail.com','$2y$10$zLQI2F/60xfYK8RYdUEjGeanloiPdoaZubRffIIHx6bhWaVHrXTK6',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:45','2017-09-11 00:11:45',NULL),(87,'Tyrel Bauch II','katlyn80','fleannon@hotmail.com','$2y$10$OYbwo7uMONyr60BzdbHmAuh9FPzGQNeUuGV3YLPJ7CVRGw3dtictK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:45','2017-09-11 00:11:45',NULL),(88,'Sage Ward','issac79','bins.chesley@blanda.com','$2y$10$NBAXRAbToVX94dtrPyBMH.Zk0whIR0TlvcXobDdLxtcgD.lM8axCK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:45','2017-09-11 00:11:45',NULL),(89,'Prof. Lavonne Bauch','qturcotte','wiley.lindgren@hotmail.com','$2y$10$z8r/Zq5N4FBIv2cQgLfD7.LzMDfcvVSMwdFV8U5P7G/no/oX2ye7y',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:45','2017-09-11 00:11:45',NULL),(90,'Kobe Rutherford','rickey36','keebler.nicholaus@gmail.com','$2y$10$weholFLQq7ev8yChN5qRXeAG26I1w/6JF3NE/5aXDknmq/fd0EGVK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:45','2017-09-11 00:11:45',NULL),(91,'Ms. Twila Heller','daniella30','hackett.laron@hegmann.net','$2y$10$EH.sR95qDZEZrFKTgIWzceIro6Cnkz77kKeJorJITOYUD5T6oXlcO',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:45','2017-09-11 00:11:45',NULL),(92,'Wilhelm Rosenbaum V','clarkin','fbrakus@hudson.biz','$2y$10$IT4s0FXye9N00OzbwQ0tnufb3GFcSekPe/oOMFvkGn2J62iUdOr42',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:46','2017-09-11 00:11:46',NULL),(93,'Elmore West II','luettgen.elian','nya.lemke@gmail.com','$2y$10$8hbcqVQXqm6SzfLUTuzyx.s7EvG9i/c3.lVHqZGtWhMGS1JhXa8aq',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:46','2017-09-11 00:11:46',NULL),(94,'Dr. Demond Barrows III','aiden.conroy','sylvia84@gmail.com','$2y$10$GfjIQFH69607XvmnFdm75OjHWxAuSslI8sgOZUdSi/5gMbgAgRbHu',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:46','2017-09-11 00:11:46',NULL),(95,'Lucious Fahey','chaz42','sam83@swaniawski.org','$2y$10$vJ0EKkbAb3ZTueO1LixG4ufkXMFoAaEks54XidH7tNfJA0YBw6CzK',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:47','2017-09-11 00:11:47',NULL),(96,'Imelda Klein Sr.','fermin.gottlieb','lulu.haag@gmail.com','$2y$10$YDk.Bbe6m4ZFeJZfwpllKOsE0S5XP8aerwTEYJ0NNsxg5eU7pRI2a',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:47','2017-09-11 00:11:47',NULL),(97,'Mara Orn II','robel.bert','dora93@hotmail.com','$2y$10$JiniKOh/VEcQLBnTL6IGKuBRhSliRi4BdW7Q9MJwBRFd./.fPoHOu',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:47','2017-09-11 00:11:47',NULL),(98,'Alta Swift','pblanda','kyleigh.zemlak@hotmail.com','$2y$10$khSfP27bVCSHvyomHnLF/ODe68bT411Vmz3eItTZKkNwwEcZ4SsAC',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:47','2017-09-11 00:11:47',NULL),(99,'Trevion Jacobi MD','cecil86','xcormier@daugherty.com','$2y$10$HcEmJw2bfz3Gh2nMyTy63.7TmJge2vYJjBXZkDZP1BNSyZZxjtScW',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:48','2017-09-11 00:11:48',NULL),(100,'Ezequiel Beatty I','piper.padberg','kemard@gmail.com','$2y$10$uAlNu.UANloGPjN8.kbW7.jmRhtLWKQsdlQU.IiVWkB117UNF/YUa',0,0,NULL,NULL,NULL,NULL,NULL,'2017-09-10 00:11:48','2017-09-11 00:11:48',NULL),(101,'Icie Haley','ziemann.peyton','ybode@example.net','$2y$10$2xEU3j/NJyeYdQM4uS2.p.xCiOBM6Z8fQMYEdrqXOutiLbHvbH06y',0,0,NULL,NULL,NULL,NULL,'piM1uXU2ScHhaPVddxU6EDfwM','2017-09-11 00:34:28','2017-09-11 00:34:28',NULL),(102,'Aric Brakus','zwilkinson','cabernathy@example.org','$2y$10$uZc9.nWEl4JsKDDvibTGPuv0TW621ApcPrgvdrvQRDVIYUBN8dD2S',1,0,NULL,NULL,NULL,NULL,'amFu6ykO2JePsump7FIDBwWDM','2017-09-11 00:37:30','2017-09-11 00:37:30',NULL),(103,'Braulio Nolan','marcelo36','maudie55@example.org','$2y$10$bkcnuo2ZN26IgvxvOsuKZ.QjiqANEZCb9QeMHHvd4RjGKBZR9lS1y',0,1,NULL,NULL,NULL,NULL,NULL,'2017-09-11 00:42:01','2017-09-11 00:42:01',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-18 18:39:27
