-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: icr
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `_prisma_migrations`
--

DROP TABLE IF EXISTS `_prisma_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `_prisma_migrations` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checksum` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finished_at` datetime(3) DEFAULT NULL,
  `migration_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci,
  `rolled_back_at` datetime(3) DEFAULT NULL,
  `started_at` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `applied_steps_count` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_prisma_migrations`
--

LOCK TABLES `_prisma_migrations` WRITE;
/*!40000 ALTER TABLE `_prisma_migrations` DISABLE KEYS */;
INSERT INTO `_prisma_migrations` VALUES ('5c22b27d-12df-4e4e-a247-44da1b3c2d31','3e295253f9d06289c3ff679983d5cdc06a78933427342e158da075fb45eb7f22','2023-08-22 18:33:42.800','20230822183342_init',NULL,NULL,'2023-08-22 18:33:42.756',1),('978ae50b-907b-47ea-8dd1-aac13f6ba828','5468930d725a82833b2d92bfe674167aef5e4a5e04b62dcbcc6e6faa10d903f9','2023-08-22 18:05:09.829','20230822180509_init',NULL,NULL,'2023-08-22 18:05:09.785',1),('cfa34025-298a-4b44-b2fa-33809be6f00e','86c3eaecedf98fac70d063282b6491cdb1536c42954bf92c07dec664ef66092e','2023-08-22 18:26:31.237','20230822182631_init',NULL,NULL,'2023-08-22 18:26:31.061',1);
/*!40000 ALTER TABLE `_prisma_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `idcomments` bigint NOT NULL,
  `text` varchar(1500) DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `post_id` bigint DEFAULT NULL,
  `time` bigint DEFAULT NULL,
  `score` int DEFAULT '0',
  PRIMARY KEY (`idcomments`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (234234234,'Is cool',0,1271372577228,1692906228,0),(162523306464,'tttest',0,1271372577228,1692951109,0),(242094169031,'aer',0,1271372577228,1692966217,5),(353826782826,'aeteatea',0,1271372577228,1692951114,0),(470644033422,'aeraer',0,1271372577228,1692964149,0),(489267363295,'aeraerea',0,1271372577228,1692966655,5),(1344213567654,'teaet',0,1271372577228,1692964191,2),(1569380092893,'aereareaear',0,1271372577228,1692966659,5);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flights` (
  `flights_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loc_a` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loc_b` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airport_a` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airport_b` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_flights` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `time_flight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reactions` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `type_class` int DEFAULT '0',
  `stars` int DEFAULT '0',
  `seats` int DEFAULT '0',
  PRIMARY KEY (`flights_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flights`
--

LOCK TABLES `flights` WRITE;
/*!40000 ALTER TABLE `flights` DISABLE KEYS */;
INSERT INTO `flights` VALUES (0,'Russia','Belgrade','Moskow','Serbia Airport','Russia Airport','Best food in the plane','all','A',900,'14/12/2023',0,0,0,0,0),(1,'Egypt','Belgrade','Giza','Serbia Airport','Egypt Airport','Best destination for your wakation','all','B',1500,'03/02/2023',0,0,0,0,0),(2,'France','Belgrade','Paris','Serbia Airport','Paris Airport','aaear','al','B',100,'15/09/2024',0,0,0,0,0);
/*!40000 ALTER TABLE `flights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journal`
--

DROP TABLE IF EXISTS `journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `journal` (
  `rezerved_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `time` int NOT NULL,
  `flight_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal`
--

LOCK TABLES `journal` WRITE;
/*!40000 ALTER TABLE `journal` DISABLE KEYS */;
/*!40000 ALTER TABLE `journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rezerved`
--

DROP TABLE IF EXISTS `rezerved`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rezerved` (
  `rezerved_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `time` int NOT NULL,
  `flight_id` int NOT NULL,
  `time_end` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_start` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `airport_a` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `airport_b` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seats` int DEFAULT '0',
  `status` int DEFAULT '0',
  PRIMARY KEY (`rezerved_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rezerved`
--

LOCK TABLES `rezerved` WRITE;
/*!40000 ALTER TABLE `rezerved` DISABLE KEYS */;
INSERT INTO `rezerved` VALUES (253924299300,116534295215520,1692828662,0,'2023-08-25','2023-08-28','Argentina',NULL,1,0),(763465762642,0,1692828742,1,'2023-08-25','2023-08-27','Honduras',NULL,7,0),(1271372577228,0,1692906228,0,'2023-08-25','2023-09-01','Croatia',NULL,8,2),(1339077977783,0,1692892513,2,'2023-08-25','2023-08-28','Saint Lucia',NULL,5,1),(1642112354950,0,1692899335,1,'2023-08-29','2023-09-20','Angola',NULL,9,0);
/*!40000 ALTER TABLE `rezerved` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint NOT NULL,
  `date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint NOT NULL,
  `plane_best` int NOT NULL,
  `login_history` int NOT NULL,
  `admin` int NOT NULL DEFAULT '0',
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_key` (`id`),
  UNIQUE KEY `user_phone_key` (`phone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,NULL,'Pera','pera@test.com','123','Belgrade',34234234,0,0,0,'Per3'),(116534295215520,NULL,'pera@test.com','pera@test1.com','123','f3a3f',4234134,0,0,0,NULL),(1175428756773614,NULL,'pera@test.com','pera@test2.com','123','rearearea',342234242343,0,0,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-25 14:40:36
