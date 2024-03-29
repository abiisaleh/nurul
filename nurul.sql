-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: nurul
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_activation_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_activation_attempts`
--

LOCK TABLES `auth_activation_attempts` WRITE;
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups`
--

LOCK TABLES `auth_groups` WRITE;
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` VALUES (1,'admin','kelola data'),(2,'masyarakat','pengunjung sistem'),(3,'kepala','kepala bagian');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_permissions`
--

LOCK TABLES `auth_groups_permissions` WRITE;
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_users` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (1,1),(2,2),(2,3),(2,4),(2,6),(2,7),(3,5);
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','admin',NULL,'2023-04-19 06:47:47',0),(2,'::1','admin',NULL,'2023-04-28 00:05:01',0),(3,'::1','admin',NULL,'2023-04-28 00:05:31',0),(4,'::1','admin',NULL,'2023-04-28 00:05:45',0),(5,'::1','admin',NULL,'2023-04-28 00:06:59',0),(6,'::1','admin',NULL,'2023-04-28 00:07:09',0),(7,'::1','admin',NULL,'2023-04-28 00:07:31',0),(8,'::1','admin',NULL,'2023-04-28 00:07:48',0),(9,'::1','admin',NULL,'2023-04-28 00:08:02',0),(10,'::1','admin',NULL,'2023-04-28 00:08:20',0),(11,'::1','admin@demo.com',1,'2023-04-28 12:18:22',1),(12,'::1','admin',NULL,'2023-04-28 12:32:54',0),(13,'::1','admin@demo.com',1,'2023-04-28 12:33:06',1),(14,'::1','nurul',2,'2023-04-28 12:46:13',0),(15,'::1','nurul@demo.com',2,'2023-04-28 12:46:46',1),(16,'::1','nurul@demo.com',2,'2023-04-28 12:50:08',1),(17,'::1','nurul@demo.com',2,'2023-04-28 23:16:49',1),(18,'::1','admin@demo.com',1,'2023-04-28 23:17:11',1),(19,'::1','admin@demo.com',1,'2023-04-28 23:30:53',1),(20,'::1','nurul@demo.com',2,'2023-04-29 00:19:28',1),(21,'::1','admin@demo.com',1,'2023-04-29 00:36:59',1),(22,'::1','nurul@demo.com',2,'2023-04-29 00:42:20',1),(23,'::1','admin@demo.com',1,'2023-04-29 00:44:02',1),(24,'::1','nurul',NULL,'2023-04-29 06:56:04',0),(25,'::1','nurul@demo.com',2,'2023-04-29 06:56:13',1),(26,'::1','admin@demo.com',1,'2023-04-29 07:02:50',1),(27,'::1','abiisaleh',3,'2023-04-29 07:23:53',0),(28,'::1','abiisaleh',3,'2023-04-29 07:24:11',0),(29,'::1','abi@demo.com',3,'2023-04-29 07:36:06',1),(30,'::1','ismyismy',NULL,'2023-04-29 07:42:56',0),(31,'::1','ismy@demo.com',4,'2023-04-29 07:43:03',1),(32,'127.0.0.1','admin',NULL,'2023-05-08 06:58:02',0),(33,'127.0.0.1','admin',NULL,'2023-05-08 06:58:13',0),(34,'127.0.0.1','admin',NULL,'2023-05-08 06:58:32',0),(35,'127.0.0.1','nurul',NULL,'2023-05-08 06:58:50',0),(36,'127.0.0.1','admin',NULL,'2023-05-08 06:58:57',0),(37,'127.0.0.1','admin',NULL,'2023-05-08 06:59:20',0),(38,'127.0.0.1','admin',NULL,'2023-05-08 06:59:25',0),(39,'127.0.0.1','admin',NULL,'2023-05-08 06:59:36',0),(40,'127.0.0.1','admin',NULL,'2023-05-08 06:59:45',0),(41,'127.0.0.1','admin',NULL,'2023-05-08 07:00:01',0),(42,'127.0.0.1','admin',NULL,'2023-05-08 07:00:14',0),(43,'127.0.0.1','admin',NULL,'2023-05-08 07:02:53',0),(44,'127.0.0.1','admin',NULL,'2023-05-08 07:03:33',0),(45,'127.0.0.1','admin',NULL,'2023-05-08 07:03:41',0),(46,'127.0.0.1','admin',NULL,'2023-05-08 07:04:08',0),(47,'127.0.0.1','admin',NULL,'2023-05-08 07:04:18',0),(48,'127.0.0.1','admin',NULL,'2023-05-09 01:15:49',0),(49,'127.0.0.1','admin',NULL,'2023-05-09 01:15:58',0),(50,'127.0.0.1','admin',NULL,'2023-05-09 01:16:05',0),(51,'127.0.0.1','admin@demo.com',1,'2023-05-09 01:16:17',1),(52,'127.0.0.1','nurul@demo.com',2,'2023-05-09 01:18:56',1),(53,'127.0.0.1','admin@demo.com',1,'2023-05-09 01:32:44',1),(54,'127.0.0.1','admin@demo.com',1,'2023-05-10 22:35:19',1),(55,'127.0.0.1','admin@demo.com',1,'2023-05-12 07:16:37',1),(56,'127.0.0.1','admin',NULL,'2023-05-17 04:12:37',0),(57,'127.0.0.1','admin',NULL,'2023-05-17 04:14:05',0),(58,'127.0.0.1','admin',NULL,'2023-05-17 04:14:12',0),(59,'127.0.0.1','admin',NULL,'2023-05-17 04:14:18',0),(60,'127.0.0.1','admin@demo.com',1,'2023-05-17 04:14:59',1),(61,'127.0.0.1','abi@demo.com',3,'2023-05-17 06:56:40',1),(62,'127.0.0.1','admin@demo.com',1,'2023-05-17 07:10:04',1),(63,'127.0.0.1','abiisaleh',NULL,'2023-05-20 02:09:11',0),(64,'127.0.0.1','abiisaleh',NULL,'2023-05-20 02:09:21',0),(65,'127.0.0.1','abi@demo.com',3,'2023-05-20 02:09:33',1),(66,'127.0.0.1','admin',NULL,'2023-05-20 02:59:57',0),(67,'127.0.0.1','admin@demo.com',1,'2023-05-20 03:00:07',1),(68,'127.0.0.1','abi@demo.com',3,'2023-05-20 03:00:42',1),(69,'127.0.0.1','admin',NULL,'2023-05-21 01:51:54',0),(70,'127.0.0.1','admin@demo.com',1,'2023-05-21 01:52:00',1),(71,'127.0.0.1','master',NULL,'2023-05-24 09:46:01',0),(72,'127.0.0.1','master@email.com',5,'2023-05-24 09:46:13',1),(73,'127.0.0.1','master',NULL,'2023-05-24 09:54:42',0),(74,'127.0.0.1','master@email.com',5,'2023-05-24 09:54:48',1),(75,'192.168.1.5','admin@demo.com',1,'2023-05-24 12:23:23',1),(76,'127.0.0.1','admin@demo.com',1,'2023-05-27 00:49:15',1),(77,'127.0.0.1','master',NULL,'2023-05-27 00:55:46',0),(78,'127.0.0.1','master@email.com',5,'2023-05-27 00:55:55',1),(79,'127.0.0.1','master',NULL,'2023-05-27 07:20:15',0),(80,'127.0.0.1','master',NULL,'2023-05-27 07:20:23',0),(81,'127.0.0.1','master@email.com',5,'2023-05-27 07:20:33',1),(82,'127.0.0.1','master@email.com',5,'2023-05-28 12:31:43',1),(83,'127.0.0.1','abi@demo.com',3,'2023-06-06 00:25:56',1),(84,'127.0.0.1','abiisaleh',NULL,'2023-06-06 01:06:14',0),(85,'127.0.0.1','abi@demo.com',3,'2023-06-06 01:06:23',1),(86,'127.0.0.1','admin@demo.com',1,'2023-06-08 22:19:52',1),(87,'127.0.0.1','kepala',NULL,'2023-06-08 22:21:16',0),(88,'127.0.0.1','master@email.com',5,'2023-06-08 22:21:21',1),(89,'127.0.0.1','abi@demo.com',3,'2023-06-08 22:45:50',1),(90,'127.0.0.1','admin@demo.com',1,'2023-06-08 22:52:02',1),(91,'127.0.0.1','abi@demo.com',3,'2023-06-08 22:54:04',1),(92,'127.0.0.1','admin@demo.com',1,'2023-06-08 23:04:03',1),(93,'127.0.0.1','abiisaleh',NULL,'2023-06-09 00:00:09',0),(94,'127.0.0.1','abi@demo.com',3,'2023-06-09 00:00:16',1),(95,'127.0.0.1','abiisaleh',NULL,'2023-06-13 08:42:56',0),(96,'127.0.0.1','abi@demo.com',3,'2023-06-13 08:43:05',1),(97,'127.0.0.1','abi@demo.com',3,'2023-06-16 23:21:52',1),(98,'127.0.0.1','master@email.com',5,'2023-06-16 23:22:10',1),(99,'127.0.0.1','admin@demo.com',1,'2023-06-16 23:22:50',1),(100,'127.0.0.1','master@email.com',5,'2023-06-16 23:28:41',1),(101,'127.0.0.1','master@email.com',5,'2023-06-16 23:33:55',1),(102,'127.0.0.1','admin@demo.com',1,'2023-06-16 23:36:10',1),(103,'127.0.0.1','abi@demo.com',3,'2023-06-16 23:46:41',1),(104,'127.0.0.1','admin@demo.com',1,'2023-06-17 00:04:11',1),(105,'127.0.0.1','admin@demo.com',1,'2023-06-17 01:14:18',1),(106,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:20:35',1),(107,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:24:33',1),(108,'127.0.0.1','master@email.com',5,'2023-06-17 02:24:58',1),(109,'127.0.0.1','master@email.com',5,'2023-06-17 02:30:21',1),(110,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:31:07',1),(111,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:32:44',1),(112,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:40:36',1),(113,'127.0.0.1','admin',NULL,'2023-06-17 02:41:30',0),(114,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:41:37',1),(115,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:41:58',1),(116,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:42:55',1),(117,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:43:34',1),(118,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:44:05',1),(119,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:44:33',1),(120,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:45:20',1),(121,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:45:40',1),(122,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:47:26',1),(123,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:47:44',1),(124,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:47:54',1),(125,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:48:52',1),(126,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:49:21',1),(127,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:49:33',1),(128,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:49:53',1),(129,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:50:27',1),(130,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:50:54',1),(131,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:51:04',1),(132,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:51:17',1),(133,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:51:52',1),(134,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:52:02',1),(135,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:52:17',1),(136,'127.0.0.1','master@email.com',5,'2023-06-17 02:52:41',1),(137,'127.0.0.1','admin@demo.com',1,'2023-06-17 02:53:12',1),(138,'127.0.0.1','admin@demo.com',1,'2023-06-17 05:59:58',1),(139,'127.0.0.1','master@email.com',5,'2023-06-17 06:01:21',1),(140,'127.0.0.1','riskaasari27@gmail.com',6,'2023-06-17 06:09:44',1),(141,'127.0.0.1','iy',NULL,'2023-06-20 11:55:23',0),(142,'127.0.0.1','admin',NULL,'2023-06-20 11:55:32',0),(143,'127.0.0.1','admin',NULL,'2023-06-20 11:55:38',0),(144,'127.0.0.1','admin@demo.com',1,'2023-06-20 11:55:46',1),(145,'127.0.0.1','master@email.com',5,'2023-06-20 11:56:14',1),(146,'127.0.0.1','abi@demo.com',3,'2023-06-20 14:44:07',1),(147,'127.0.0.1','master@email.com',5,'2023-06-21 08:44:13',1),(148,'127.0.0.1','ismi',NULL,'2023-07-11 02:58:06',0),(149,'127.0.0.1','ismy',NULL,'2023-07-11 02:58:45',0),(150,'127.0.0.1','ismy',NULL,'2023-07-11 02:58:57',0),(151,'127.0.0.1','abiisaleh',NULL,'2023-07-11 02:59:09',0),(152,'127.0.0.1','abiisaleh',NULL,'2023-07-11 02:59:16',0),(153,'127.0.0.1','abiisaleh',NULL,'2023-07-11 02:59:24',0),(154,'127.0.0.1','abiisaleh',NULL,'2023-07-11 02:59:30',0),(155,'127.0.0.1','abiisaleh',NULL,'2023-07-11 02:59:44',0),(156,'127.0.0.1','abi@demo.com',3,'2023-07-11 03:00:30',1),(157,'127.0.0.1','ismy@demo.com',4,'2023-07-11 03:01:26',1),(158,'127.0.0.1','nurul',NULL,'2023-07-11 03:02:18',0),(159,'127.0.0.1','riskaasari27@gmail.com',6,'2023-07-11 03:02:24',1),(160,'127.0.0.1','admin',NULL,'2023-07-13 01:36:43',0),(161,'127.0.0.1','admin@demo.com',1,'2023-07-13 01:36:50',1),(162,'127.0.0.1','abisaleh',NULL,'2023-07-13 01:50:25',0),(163,'127.0.0.1','abi@demo.com',3,'2023-07-13 01:50:30',1),(164,'127.0.0.1','admin@demo.com',1,'2023-07-14 09:34:39',1),(165,'127.0.0.1','admin',NULL,'2023-07-16 02:42:28',0),(166,'127.0.0.1','admin@demo.com',1,'2023-07-16 02:43:24',1),(167,'127.0.0.1','abi@demo.com',3,'2023-07-16 03:11:42',1),(168,'127.0.0.1','abi@demo.com',3,'2023-07-18 05:09:11',1),(169,'127.0.0.1','master',NULL,'2023-07-18 05:13:17',0),(170,'127.0.0.1','master@email.com',5,'2023-07-18 05:13:40',1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions`
--

LOCK TABLES `auth_permissions` WRITE;
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_reset_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_reset_attempts`
--

LOCK TABLES `auth_reset_attempts` WRITE;
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_tokens`
--

LOCK TABLES `auth_tokens` WRITE;
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_users_permissions` (
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_users_permissions`
--

LOCK TABLES `auth_users_permissions` WRITE;
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ebook`
--

DROP TABLE IF EXISTS `ebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ebook` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `rilis` date NOT NULL,
  `fk_kategori` int unsigned NOT NULL,
  `stok` int DEFAULT '10',
  `waktu_peminjaman` int DEFAULT '7',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ebook`
--

LOCK TABLES `ebook` WRITE;
/*!40000 ALTER TABLE `ebook` DISABLE KEYS */;
INSERT INTO `ebook` VALUES (13,'Buku Ajar Bahasa Tobati Bagi Pemula','Dinas Pendidikan dan Kebudayaan Kota Jayapur','Dinas Pendidikan dan Kebudayaan Kota Jayapur','2018-06-01',3,5,3),(14,'Peningkatan Keterampilan Menulis Teks Eksplanasi Siswa Di Kabupaten Jayapura','Normawati','Balai Bahasa Papua','2018-10-01',3,10,7),(15,'Cerita Rakyat Nabire','Siswanto Asmabuassape','Balai Bahasa Papua','2018-11-01',1,10,7),(16,'Kumpulan Cerita Rakyat Papua','Supriyanto Widodo','Balai Bahasa Papua','2018-06-09',1,10,7),(17,'Tingkat Apresiasi Sastra Siswa SD di Kabupaten Merauke','Sri Yono','Balai Bahasa Papua','2023-06-01',3,10,7),(20,'Buku Testing','Abi Saleh','asdas','2011-01-01',1,10,7);
/*!40000 ALTER TABLE `ebook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'sosial'),(3,'ilmu pengetahuan'),(5,'teknologi'),(6,'sains'),(7,'pengembangan diri'),(8,'novel');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masyarakat`
--

DROP TABLE IF EXISTS `masyarakat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `masyarakat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` text,
  `telp` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `fk_user` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masyarakat`
--

LOCK TABLES `masyarakat` WRITE;
/*!40000 ALTER TABLE `masyarakat` DISABLE KEYS */;
INSERT INTO `masyarakat` VALUES (13,'Nurul Rosidaniah','Wanita','Entrop','082238204778','1997-09-10',2),(14,'Muhamad abi saleh','Pria','Kotaraja','082238204776','1999-09-06',3),(16,'Ismy suci ramadhani','Wanita','Abepura','082238204775','1997-01-08',4),(19,'Nila','Pria',NULL,'','0000-00-00',6),(20,'rahman','Pria',NULL,'','0000-00-00',7);
/*!40000 ALTER TABLE `masyarakat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2023-01-19-031620','App\\Database\\Migrations\\Ebook','default','App',1679802312,1),(2,'2023-01-19-035553','App\\Database\\Migrations\\Kategori','default','App',1679802312,1),(3,'2023-01-19-042046','App\\Database\\Migrations\\Masyarakat','default','App',1679802312,1),(4,'2023-01-19-042105','App\\Database\\Migrations\\Peminjaman','default','App',1679802312,1),(5,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1681885395,2),(8,'2017-11-20-223112','App\\Database\\Migrations\\CreateAuthTables','default','App',1686264062,3),(9,'2023-06-08-223156','App\\Database\\Migrations\\Stok','default','App',1686264062,3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peminjaman` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('pinjam','selesai') NOT NULL DEFAULT 'pinjam',
  `fk_masyarakat` int unsigned NOT NULL,
  `fk_ebook` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjaman_fk_masyarakat_foreign` (`fk_masyarakat`),
  KEY `peminjaman_fk_ebook_foreign` (`fk_ebook`),
  CONSTRAINT `peminjaman_fk_ebook_foreign` FOREIGN KEY (`fk_ebook`) REFERENCES `ebook` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peminjaman_fk_masyarakat_foreign` FOREIGN KEY (`fk_masyarakat`) REFERENCES `masyarakat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (1,'2023-07-13','2023-07-16','selesai',14,13),(2,'2023-07-13','2023-07-20','pinjam',14,14),(3,'2023-07-13','2023-07-20','pinjam',14,15),(4,'2023-07-16','2023-07-16','selesai',14,13),(5,'2023-07-16','2023-07-16','selesai',14,13),(6,'2023-07-16','2023-07-16','selesai',14,13),(7,'2023-07-16','2023-07-16','selesai',14,13),(8,'2023-07-16','2023-07-16','selesai',14,13),(9,'2023-07-16','2023-07-16','selesai',14,13),(10,'2023-07-18','2023-07-18','selesai',14,13),(11,'2023-07-18','2023-07-18','selesai',14,13),(12,'2023-07-18','2023-07-21','pinjam',14,13);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@demo.com','admin','$2y$10$6QT4AyORcAVf/zFPCU23r.JCh20Me3hsS7JagKKMcdacrH1TA7bZi',NULL,NULL,NULL,'f204980958ec0511abbc4f1a776495ff',NULL,NULL,1,0,'2023-04-28 12:11:36','2023-04-28 12:11:36',NULL),(2,'nurul@demo.com','nurul','$2y$10$fIidJMnFXWC0on2FkmX6UuuoQtol6qhKLtPnnEJm9erW8SCESBT1m',NULL,NULL,NULL,'104d2214dd2da7aedafecbbf6ac575b8',NULL,NULL,1,0,'2023-04-28 12:44:51','2023-04-28 12:44:51',NULL),(3,'abi@demo.com','abiisaleh','$2y$10$8ORQREQpt1y3pIVifESZIuWujx7VMICDmrtTV4A4MUa.45SztODze',NULL,NULL,NULL,'9ca2d684ab1d01f07b5c7b9d22de1d91',NULL,NULL,1,0,'2023-04-29 07:18:26','2023-07-11 03:00:20',NULL),(4,'ismy@demo.com','ismy','$2y$10$NDb42.Kzjd.qtKg7M53GxONSAFDYDMYu.kZMwn4RQ.7/GG.V1vQcm',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-04-29 07:42:47','2023-07-11 03:01:16',NULL),(5,'master@email.com','master','$2y$10$jSr1l9jWaNRk4o48vsRzTOsUGy/DTiyhAyEo2.onO0BXQXvIrJXI2',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-05-24 09:45:40','2023-05-24 09:45:40',NULL),(6,'riskaasari27@gmail.com','Nila','$2y$10$WMkldbtA9z4ByS1R0ogaeuMtYVvqV4dNmNaXtpViz7p5oWErjOngO',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-06-17 06:09:32','2023-07-11 03:02:13',NULL),(7,'rahmanfazrin1@gmail.com','rahman','$2y$10$83ab8cT8/PHzbtmkT7HZy.JpmXY.j/xYj2QrFphuxfbwiwLm79jkW',NULL,NULL,NULL,'2dc5c150056f432c40505fb9486d702b',NULL,NULL,0,0,'2023-07-11 02:57:23','2023-07-11 02:57:23',NULL);
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

-- Dump completed on 2023-07-18 14:17:00
