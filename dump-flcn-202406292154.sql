-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: ec2-3-111-168-165.ap-south-1.compute.amazonaws.com    Database: flcn
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `appinfo`
--

DROP TABLE IF EXISTS `appinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appinfo` (
  `id` int DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstno` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appinfo`
--

LOCK TABLES `appinfo` WRITE;
/*!40000 ALTER TABLE `appinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `appinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appuser`
--

DROP TABLE IF EXISTS `appuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appuser` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_logedin` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastlogin_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastlogin_from` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appuser`
--

LOCK TABLES `appuser` WRITE;
/*!40000 ALTER TABLE `appuser` DISABLE KEYS */;
INSERT INTO `appuser` VALUES ('A01','admin','9876543210','admin@gmail.com',NULL,'$2y$12$XRs1JWhO1e.RsFQ9z6UJyO2unrAvsbInAVh9/bzaRdPTQWOpepzsi','ST',NULL,'1',NULL,NULL,'2024-06-27 18:03:41','127.0.0.1'),('ST_7130','test',NULL,'user@gmail.com',NULL,'$2y$12$RS8GfpUp7onEiYfU9I.cfOMP870KWpH/uiqY9IhYwhcVU.Q8ZDYpa','ST',NULL,'1',NULL,NULL,'2024-06-27 18:03:41','127.0.0.1'),('ST_9437','Satam Kundu',NULL,'satamkundu67@gmail.com',NULL,'$2y$12$AFDQntjfWUXZlrSGExpXr./j2.O8H1LrVAu9I4cKTBweM5wW.vnqe','ST',NULL,'1',NULL,NULL,'2024-06-27 18:03:41',NULL);
/*!40000 ALTER TABLE `appuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('act_users','i:20;',2034269742),('itemlist','O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:16:\"App\\Models\\Items\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"item\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:5:\"itmid\";i:2;s:4:\"name\";s:3:\"la3\";s:9:\"accessary\";s:27:\"N/A,power cord,charger3,bag\";s:8:\"complain\";s:25:\"N/A,no power,keybord3,ram\";s:4:\"make\";s:13:\"hp,dell3,acer\";s:7:\"remarks\";s:4:\"kk3e\";}s:11:\"\0*\0original\";a:6:{s:5:\"itmid\";i:2;s:4:\"name\";s:3:\"la3\";s:9:\"accessary\";s:27:\"N/A,power cord,charger3,bag\";s:8:\"complain\";s:25:\"N/A,no power,keybord3,ram\";s:4:\"make\";s:13:\"hp,dell3,acer\";s:7:\"remarks\";s:4:\"kk3e\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:4:\"name\";i:2;s:9:\"accessary\";i:3;s:8:\"complain\";i:4;s:4:\"make\";i:5;s:7:\"remarks\";i:6;s:6:\"status\";i:7;s:10:\"created_by\";i:8;s:10:\"created_at\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:16:\"App\\Models\\Items\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"item\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:5:\"itmid\";i:3;s:4:\"name\";s:4:\"moni\";s:9:\"accessary\";s:27:\"N/A,Powercord,Cabble,khgcyu\";s:8:\"complain\";s:35:\"N/A,No Power,Broken LED, hehfgjdcvh\";s:4:\"make\";s:18:\"LG,Samsung,Philips\";s:7:\"remarks\";s:4:\"test\";}s:11:\"\0*\0original\";a:6:{s:5:\"itmid\";i:3;s:4:\"name\";s:4:\"moni\";s:9:\"accessary\";s:27:\"N/A,Powercord,Cabble,khgcyu\";s:8:\"complain\";s:35:\"N/A,No Power,Broken LED, hehfgjdcvh\";s:4:\"make\";s:18:\"LG,Samsung,Philips\";s:7:\"remarks\";s:4:\"test\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:4:\"name\";i:2;s:9:\"accessary\";i:3;s:8:\"complain\";i:4;s:4:\"make\";i:5;s:7:\"remarks\";i:6;s:6:\"status\";i:7;s:10:\"created_by\";i:8;s:10:\"created_at\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:16:\"App\\Models\\Items\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"item\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:5:\"itmid\";i:4;s:4:\"name\";s:6:\"Laptop\";s:9:\"accessary\";s:27:\"N/A,BAG, Charger,Power cord\";s:8:\"complain\";s:18:\"N/A,Other,No Power\";s:4:\"make\";s:19:\"HP,Lenovo,Dell,Acer\";s:7:\"remarks\";N;}s:11:\"\0*\0original\";a:6:{s:5:\"itmid\";i:4;s:4:\"name\";s:6:\"Laptop\";s:9:\"accessary\";s:27:\"N/A,BAG, Charger,Power cord\";s:8:\"complain\";s:18:\"N/A,Other,No Power\";s:4:\"make\";s:19:\"HP,Lenovo,Dell,Acer\";s:7:\"remarks\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:4:\"name\";i:2;s:9:\"accessary\";i:3;s:8:\"complain\";i:4;s:4:\"make\";i:5;s:7:\"remarks\";i:6;s:6:\"status\";i:7;s:10:\"created_by\";i:8;s:10:\"created_at\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:16:\"App\\Models\\Items\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"item\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:5:\"itmid\";i:5;s:4:\"name\";s:4:\"SMPS\";s:9:\"accessary\";s:3:\"N/A\";s:8:\"complain\";s:12:\"N/A,No Power\";s:4:\"make\";s:23:\"Foxin,HP,Zebronics,Dell\";s:7:\"remarks\";N;}s:11:\"\0*\0original\";a:6:{s:5:\"itmid\";i:5;s:4:\"name\";s:4:\"SMPS\";s:9:\"accessary\";s:3:\"N/A\";s:8:\"complain\";s:12:\"N/A,No Power\";s:4:\"make\";s:23:\"Foxin,HP,Zebronics,Dell\";s:7:\"remarks\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:4:\"name\";i:2;s:9:\"accessary\";i:3;s:8:\"complain\";i:4;s:4:\"make\";i:5;s:7:\"remarks\";i:6;s:6:\"status\";i:7;s:10:\"created_by\";i:8;s:10:\"created_at\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',2034782193),('total_client','i:20;',2034269742);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `due_ammount` double DEFAULT NULL,
  `gst` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `client_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES ('C_1317','Test user 2','9609434312','tanumoy@gmail.com',NULL,1,NULL,NULL,NULL,NULL,NULL,'2024-06-17 23:03:46'),('C_1376','gyt','7278654654',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-24 19:11:53'),('C_1463','nkjvby','9609423311',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:44:30'),('C_1736','kk','9609960941',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-24 19:03:38'),('C_2125','Crompton ','9609960944','uuuuuj@gmail.com','llkjg jhjfu',1,2342,'12ABCCE3456F7Z8',NULL,'fhghg','A01','2024-06-20 17:08:28'),('C_2909','Test user','9609960933','kc.techsmart@gmail.com','ll',1,NULL,NULL,'jb123',NULL,'A01','2024-06-17 17:59:38'),('C_2941','Suman','9609960937','rr@email.com','gsts',1,NULL,NULL,NULL,NULL,'A01','2024-06-18 23:13:43'),('C_3022','gchdyhdt','7278654456',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-24 19:24:11'),('C_3140','Suman 2','9069123111',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:19:21'),('C_3762','Sumantest','9069123123','rr@email.com',NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:18:03'),('C_3810','Kusthhh','7897897890','kustav.2314500426@mujonline.ed','kdnvkdnv',1,NULL,NULL,NULL,'new user stauts1',NULL,'2024-06-17 23:43:30'),('C_3974','ggg','9789789870',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-21 00:13:47'),('C_4179','hjvj','9609423377',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:43:47'),('C_4646','Kustav','9609434311','cldddn@gmail.com','kdnvkdnv',1,NULL,'12ABCDE3456F7Z8',NULL,NULL,NULL,'2024-06-17 23:09:22'),('C_4973','sumana','9609960935','rr@email.com','gsts',1,NULL,NULL,NULL,NULL,'A01','2024-06-18 23:16:36'),('C_5360','Crompton Fan Pvt.','9609123123',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:17:21'),('C_5620','Suman das','9609960966','rr@email.com','gsts',1,NULL,'12ABCDE3456F7Z8',NULL,NULL,'A01','2024-06-18 23:18:40'),('C_5758','Suman 3','9069432234',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:23:34'),('C_6445','snhgfyu','9609423341',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:42:53'),('C_6718','wmwx','9609434388','kj@gmail.com',NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:31:20'),('C_7501','Kustaee Chatterjee','7278654657','kustav@live.com','Building no 1240',1,NULL,NULL,NULL,NULL,'A01','2024-06-24 19:12:39'),('C_8073','BTN Techno','9609960900','rr@email.com','gsts',1,NULL,NULL,NULL,NULL,'A01','2024-06-19 23:48:52'),('C_8327','Kustagg','9609423342',NULL,NULL,1,0,NULL,NULL,NULL,'A01','2024-06-20 17:41:31'),('C_8849','amit','8435123123',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-24 23:14:26'),('C_9647','mm','7897897827',NULL,NULL,1,NULL,NULL,NULL,NULL,'A01','2024-06-20 17:35:09');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finish_product`
--

DROP TABLE IF EXISTS `finish_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `finish_product` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `finish_product_ibfk_1` (`created_by`),
  CONSTRAINT `finish_product_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finish_product`
--

LOCK TABLES `finish_product` WRITE;
/*!40000 ALTER TABLE `finish_product` DISABLE KEYS */;
INSERT INTO `finish_product` VALUES ('F_2768','gnhg','2024-06-23 03:17:15','KG','A01',NULL,'1','mmm ,');
/*!40000 ALTER TABLE `finish_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_gst_goods_history`
--

DROP TABLE IF EXISTS `invoice_gst_goods_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_gst_goods_history` (
  `id` int NOT NULL,
  `entry_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `HSN` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cgst` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sgst` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_amount` double DEFAULT NULL,
  `total_ammount` double DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`entry_id`),
  KEY `entry_id` (`entry_id`),
  KEY `product` (`product`),
  CONSTRAINT `invoice_gst_goods_history_ibfk_1` FOREIGN KEY (`entry_id`) REFERENCES `invoice_gst_goods_main` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `invoice_gst_goods_history_ibfk_2` FOREIGN KEY (`product`) REFERENCES `product_bill` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_gst_goods_history`
--

LOCK TABLES `invoice_gst_goods_history` WRITE;
/*!40000 ALTER TABLE `invoice_gst_goods_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_gst_goods_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_gst_goods_main`
--

DROP TABLE IF EXISTS `invoice_gst_goods_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_gst_goods_main` (
  `id` int NOT NULL,
  `invoice_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refjob` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inovice_date` date DEFAULT NULL,
  `gross_amount` double DEFAULT NULL,
  `cgst_amount` double DEFAULT NULL,
  `ssgst_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `invoice_gst_goods_main_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `invoice_gst_goods_main_ibfk_2` FOREIGN KEY (`to`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_gst_goods_main`
--

LOCK TABLES `invoice_gst_goods_main` WRITE;
/*!40000 ALTER TABLE `invoice_gst_goods_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_gst_goods_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_gst_srv_history`
--

DROP TABLE IF EXISTS `invoice_gst_srv_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_gst_srv_history` (
  `id` int NOT NULL,
  `entry_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `HSN` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cgst` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sgst` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_amount` double DEFAULT NULL,
  `total_ammount` double DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`entry_id`),
  KEY `entry_id` (`entry_id`),
  KEY `product` (`product`),
  CONSTRAINT `invoice_gst_srv_history_ibfk_1` FOREIGN KEY (`entry_id`) REFERENCES `invoice_gst_srv_main` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `invoice_gst_srv_history_ibfk_2` FOREIGN KEY (`product`) REFERENCES `product_bill` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_gst_srv_history`
--

LOCK TABLES `invoice_gst_srv_history` WRITE;
/*!40000 ALTER TABLE `invoice_gst_srv_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_gst_srv_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_gst_srv_main`
--

DROP TABLE IF EXISTS `invoice_gst_srv_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_gst_srv_main` (
  `id` int NOT NULL,
  `invoice_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refjob` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inovice_date` date DEFAULT NULL,
  `gross_amount` double DEFAULT NULL,
  `cgst_amount` double DEFAULT NULL,
  `ssgst_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `refjob` (`refjob`),
  KEY `to` (`to`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `invoice_gst_srv_main_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `invoice_gst_srv_main_ibfk_2` FOREIGN KEY (`to`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `invoice_gst_srv_main_ibfk_3` FOREIGN KEY (`refjob`) REFERENCES `job` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_gst_srv_main`
--

LOCK TABLES `invoice_gst_srv_main` WRITE;
/*!40000 ALTER TABLE `invoice_gst_srv_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_gst_srv_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_kancha_history`
--

DROP TABLE IF EXISTS `invoice_kancha_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_kancha_history` (
  `id` int NOT NULL,
  `entry_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `total_ammount` double DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`entry_id`),
  KEY `entry_id` (`entry_id`),
  CONSTRAINT `invoice_kancha_history_ibfk_1` FOREIGN KEY (`entry_id`) REFERENCES `invoice_kancha_main` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_kancha_history`
--

LOCK TABLES `invoice_kancha_history` WRITE;
/*!40000 ALTER TABLE `invoice_kancha_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_kancha_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_kancha_main`
--

DROP TABLE IF EXISTS `invoice_kancha_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_kancha_main` (
  `id` int NOT NULL,
  `invoice_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refjob` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inovice_date` date DEFAULT NULL,
  `gross_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `invoice_kancha_main_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `invoice_kancha_main_ibfk_2` FOREIGN KEY (`to`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_kancha_main`
--

LOCK TABLES `invoice_kancha_main` WRITE;
/*!40000 ALTER TABLE `invoice_kancha_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_kancha_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accessary` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (2,'la3','N/A,power cord,charger3,bag','N/A,no power,keybord3,ram','hp,dell3,acer','kk3e',1,NULL,'2024-06-20 15:37:21'),(3,'moni','N/A,Powercord,Cabble,khgcyu','N/A,No Power,Broken LED, hehfgjdcvh','LG,Samsung,Philips','test',1,'ST_7130','2024-06-20 16:13:35'),(4,'Laptop','N/A,BAG, Charger,Power cord','N/A,Other,No Power','HP,Lenovo,Dell,Acer',NULL,1,'A01','2024-06-20 17:11:54'),(5,'SMPS','N/A','N/A,No Power','Foxin,HP,Zebronics,Dell',NULL,1,'A01','2024-06-24 19:34:02');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `echarge` double DEFAULT NULL,
  `assigned` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clid` (`clid`),
  KEY `assigned` (`assigned`),
  CONSTRAINT `job_ibfk_1` FOREIGN KEY (`assigned`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `job_ibfk_2` FOREIGN KEY (`clid`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES ('FLCN/23-24/JB/00001','C_4646','Ready for delivery',1000,'ST_9437','LED broken need to replace'),('FLCN/23-24/JB/00002','C_4646','Open',1000,NULL,'Keyboard issue'),('FLCN/23-24/JB/00003','C_4646','Open',1000,NULL,'Keyboard issue'),('FLCN/23-24/JB/00004','C_4646','Assigned',1000,'ST_9437','Keyboard issue'),('FLCN/23-24/JB/00005','C_8327','Open',2000,NULL,'kk');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_comment`
--

DROP TABLE IF EXISTS `job_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_comment` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jbid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usid` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jbid` (`jbid`),
  KEY `usid` (`usid`),
  CONSTRAINT `job_comment_ibfk_1` FOREIGN KEY (`usid`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `job_comment_ibfk_2` FOREIGN KEY (`jbid`) REFERENCES `job` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_comment`
--

LOCK TABLES `job_comment` WRITE;
/*!40000 ALTER TABLE `job_comment` DISABLE KEYS */;
INSERT INTO `job_comment` VALUES (1,'FLCN/23-24/JB/00001','A01','App','Job Created','2024-06-27 21:59:29'),(2,'FLCN/23-24/JB/00002','A01','App','Job Created','2024-06-27 22:04:13'),(3,'FLCN/23-24/JB/00003','A01','App','Job Created','2024-06-27 22:07:15'),(4,NULL,'A01','User','test comment','2024-06-27 23:08:16'),(5,NULL,'A01','User','test comment','2024-06-27 23:08:36'),(6,NULL,'A01','User','test comment','2024-06-27 23:11:44'),(7,'FLCN/23-24/JB/00001','A01','User','test comment','2024-06-27 23:14:42'),(8,'FLCN/23-24/JB/00001','A01','User','Changed Status to Pending approval','2024-06-28 00:09:56'),(9,'FLCN/23-24/JB/00001','A01','User','Changed Status to Hold','2024-06-28 00:11:48'),(10,'FLCN/23-24/JB/00001','A01','User','Changed Status to Pending item','2024-06-28 00:12:41'),(11,'FLCN/23-24/JB/00001','A01','User','Changed Status to Pending approval','2024-06-28 00:12:59'),(12,'FLCN/23-24/JB/00001','A01','User','Changed Status to Assign','2024-06-28 00:13:14'),(13,'FLCN/23-24/JB/00001','A01','User','Changed Status to Assign','2024-06-28 00:13:55'),(14,'FLCN/23-24/JB/00001','A01','User','Job Assigned to ST_9437','2024-06-28 00:15:25'),(15,'FLCN/23-24/JB/00004','A01','App','Job Created','2024-06-28 00:23:18'),(16,'FLCN/23-24/JB/00004','A01','User','hbh','2024-06-28 00:23:44'),(17,'FLCN/23-24/JB/00004','A01','User','Changed Status to Pending approval','2024-06-28 00:23:58'),(18,'FLCN/23-24/JB/00004','A01','User','Job Assigned to ST_9437','2024-06-28 00:24:15'),(19,'FLCN/23-24/JB/00005','A01','App','Job Created','2024-06-29 21:41:35'),(20,'FLCN/23-24/JB/00001','A01','User','Changed Status to Ready for delivery','2024-06-29 21:44:55');
/*!40000 ALTER TABLE `job_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_item`
--

DROP TABLE IF EXISTS `job_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jobid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snno` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proprty` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accessary` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobid` (`jobid`),
  KEY `item` (`item`),
  CONSTRAINT `job_item_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_item`
--

LOCK TABLES `job_item` WRITE;
/*!40000 ALTER TABLE `job_item` DISABLE KEYS */;
INSERT INTO `job_item` VALUES (17,'FLCN/23-24/JB/00001','moni','Philips','E220','wwe21',NULL,'Cabble','No Power, Broken LED',NULL),(18,'FLCN/23-24/JB/00002','Laptop','HP','E220','wwe21',NULL,'BAG, Charger','No Power',NULL),(19,'FLCN/23-24/JB/00003','moni','LG','E220','wwe21',NULL,'Cabble','Broken LED',NULL),(20,'FLCN/23-24/JB/00004','moni','LG','E220','wwe21',NULL,'Powercord','Broken LED',NULL),(21,'FLCN/23-24/JB/00005','moni','Samsung','ff hb','hvgj',NULL,'khgcyu','Broken LED',NULL);
/*!40000 ALTER TABLE `job_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leadger_sc`
--

DROP TABLE IF EXISTS `leadger_sc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leadger_sc` (
  `id` int NOT NULL,
  `clid` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_amomount` double DEFAULT NULL,
  `truns_ammount` double DEFAULT NULL,
  `mode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refno` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `clid` (`clid`),
  CONSTRAINT `leadger_sc_ibfk_1` FOREIGN KEY (`clid`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leadger_sc`
--

LOCK TABLES `leadger_sc` WRITE;
/*!40000 ALTER TABLE `leadger_sc` DISABLE KEYS */;
/*!40000 ALTER TABLE `leadger_sc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000001_create_cache_table',1),(2,'0001_01_01_000002_create_jobs_table',1),(3,'2024_06_16_111613_create_appinfo_table',1),(4,'2024_06_16_111613_create_appuser_table',1),(5,'2024_06_16_111613_create_client_table',1),(6,'2024_06_16_111613_create_invoice_gst_goods_history_table',1),(7,'2024_06_16_111613_create_invoice_gst_goods_main_table',1),(8,'2024_06_16_111613_create_invoice_gst_srv_history_table',1),(9,'2024_06_16_111613_create_invoice_gst_srv_main_table',1),(10,'2024_06_16_111613_create_invoice_kancha_history_table',1),(11,'2024_06_16_111613_create_invoice_kancha_main_table',1),(12,'2024_06_16_111613_create_item_table',1),(13,'2024_06_16_111613_create_job_comment_table',1),(14,'2024_06_16_111613_create_job_item_table',1),(15,'2024_06_16_111613_create_job_table',1),(16,'2024_06_16_111613_create_leadger_sc_table',1),(17,'2024_06_16_111613_create_product_bill_table',1),(18,'2024_06_16_111613_create_sd_payment_entry_table',1),(19,'2024_06_16_111613_create_secuence_table',1),(20,'2024_06_16_111616_add_foreign_keys_to_client_table',1),(21,'2024_06_16_111616_add_foreign_keys_to_invoice_gst_goods_history_table',1),(22,'2024_06_16_111616_add_foreign_keys_to_invoice_gst_goods_main_table',1),(23,'2024_06_16_111616_add_foreign_keys_to_invoice_gst_srv_history_table',1),(24,'2024_06_16_111616_add_foreign_keys_to_invoice_gst_srv_main_table',1),(25,'2024_06_16_111616_add_foreign_keys_to_invoice_kancha_history_table',1),(26,'2024_06_16_111616_add_foreign_keys_to_invoice_kancha_main_table',1),(27,'2024_06_16_111616_add_foreign_keys_to_item_table',1),(28,'2024_06_16_111616_add_foreign_keys_to_job_comment_table',1),(29,'2024_06_16_111616_add_foreign_keys_to_job_item_table',1),(30,'2024_06_16_111616_add_foreign_keys_to_job_table',1),(31,'2024_06_16_111616_add_foreign_keys_to_leadger_sc_table',1),(32,'2024_06_16_111616_add_foreign_keys_to_product_bill_table',1),(33,'2024_06_16_111616_add_foreign_keys_to_sd_payment_entry_table',1),(34,'2024_06_22_150848_create_supplier_table',2),(35,'2024_06_22_154217_create_supplier_table',3),(36,'2024_06_22_154301_add_foreign_keys_to_supplier',4),(37,'2024_06_22_165131_alter_supplier_table',5),(38,'2024_06_22_165825_alter_supplier_table_nullable',6),(39,'2024_06_22_230547_raw_product_table',7),(40,'2024_06_22_235128_alter_rawproduct_table',8),(41,'2024_06_23_025210_finish_product_table',9),(42,'2024_06_23_025339_fk_finish_product_table',9),(43,'2024_06_23_025347_fk_raw_product_table',9),(44,'2024_06_26_222041_alter_tablejobitem',10),(45,'2024_06_26_223143_alter_tablejobitem2',11),(46,'2024_06_26_223313_alter_tablejobitem2',11),(47,'2024_06_27_212747_alter_tablejobcomment',12),(48,'2024_06_27_214111_alter_tablejob',13),(49,'2024_06_27_215734_alter_tablejobcomment',14),(50,'2024_06_28_000603_alter_tablejob',15),(51,'2024_06_28_000917_alter_tablejobcomment',16);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_bill`
--

DROP TABLE IF EXISTS `product_bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_bill` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HSN` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cgst` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sgst` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `product_bill_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_bill`
--

LOCK TABLES `product_bill` WRITE;
/*!40000 ALTER TABLE `product_bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raw_product`
--

DROP TABLE IF EXISTS `raw_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `raw_product` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_product_ibfk_1` (`created_by`),
  CONSTRAINT `raw_product_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raw_product`
--

LOCK TABLES `raw_product` WRITE;
/*!40000 ALTER TABLE `raw_product` DISABLE KEYS */;
INSERT INTO `raw_product` VALUES ('S_5494','hh','2024-06-23 02:20:07','KG','A01',NULL,'1','tttttm,,ggttg'),('S_6285','kk','2024-06-23 19:00:42','Gram','A01',NULL,'1','ljkkk'),('S_6816','mm','2024-06-23 19:01:12','ML','A01',NULL,'1','uuuu'),('S_7593','kk','2024-06-23 19:00:16','ML','A01',NULL,'1','kjjkn'),('S_8555','ghv','2024-06-23 18:56:27','Gram','A01',NULL,'1','hjg');
/*!40000 ALTER TABLE `raw_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_payment_entry`
--

DROP TABLE IF EXISTS `sd_payment_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sd_payment_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double DEFAULT NULL,
  `mode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hisamount` double DEFAULT NULL,
  `curamount` double DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `sd_payment_entry_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_payment_entry`
--

LOCK TABLES `sd_payment_entry` WRITE;
/*!40000 ALTER TABLE `sd_payment_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_payment_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secuence`
--

DROP TABLE IF EXISTS `secuence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secuence` (
  `id` int NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sno` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secuence`
--

LOCK TABLES `secuence` WRITE;
/*!40000 ALTER TABLE `secuence` DISABLE KEYS */;
INSERT INTO `secuence` VALUES (1,'job','FLCN/23-24/JB','5',NULL,1,'2024-06-23 18:06:35');
/*!40000 ALTER TABLE `secuence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('NT0wd75m7kFKdjBq8nyeTMRl4GtmO1aqwgTIitwP','A01','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibEQ4WTFhcW55TzRoSW5STE5YY2RxZVd5WnNqRVA1WnJuUVFtOXNRMiI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjM6IkEwMSI7fQ==',1719676023),('pWYzPloaJF1NLQibwgmf39Anqw6zvpLM6TfJ4q2b','A01','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoia2pDaXFzVkd6WDA2dU9Wcjdya3FFaWpTbGpoSlNsV2VaNzd0aTBjdCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vbG9jYWxob3N0OjgwODAvbGlzdGpvYiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjM6IkEwMSI7fQ==',1719514457),('XxpXZmVHL8tkZmYfoKZqeex8LrPWo5MySLXYiZve','A01','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidEVkVnAycm81RTVZSG9HV0JUTmx5MVFoc0U3Rkl1RnlmZVFVbm1xMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjM6IkEwMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9saXN0am9iIjt9fQ==',1719677720);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `due_ammount` double DEFAULT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_ibfk_1` (`created_by`),
  CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `appuser` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES ('C_6821','test igiug','8900089798','test@gmail.com','Test gyfuuv','2024-06-22 17:01:49','A01',1,2000,NULL,'Test'),('C_7013','nb k','9609323232','dd@gmail.com','kkk','2024-06-22 17:03:19','A01',1,NULL,'22AAAAA0000A1Z3','hhhg'),('S_1963','Kustav Chatterjee','9808535712','kustav@live.com','Building no 1240','2024-06-22 22:57:25','A01',1,NULL,NULL,NULL),('S_9437','jg','9609423311','demo@live.com','vgvgv','2024-06-22 17:07:34','A01',1,NULL,NULL,'hhkj jj hh nhh j u'),('S_9778','Kustav Chatterjee','9808535766','kustav@live.com','Building no 1240','2024-06-23 01:04:18','A01',1,NULL,'22ABBAA0000A1Z5','f');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'flcn'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-29 21:55:03
