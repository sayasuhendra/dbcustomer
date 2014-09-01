-- MySQL dump 10.13  Distrib 5.6.20, for Linux (x86_64)
--
-- Host: localhost    Database: dbcustomer
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `adsls`
--

DROP TABLE IF EXISTS `adsls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adsls` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costumercircuit_id` bigint(18) DEFAULT NULL,
  `lastmile_id` bigint(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adsls`
--

LOCK TABLES `adsls` WRITE;
/*!40000 ALTER TABLE `adsls` DISABLE KEYS */;
/*!40000 ALTER TABLE `adsls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backhauls`
--

DROP TABLE IF EXISTS `backhauls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backhauls` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `circuitidbackhaul` bigint(18) DEFAULT NULL,
  `lokasixconnect` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namavendor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `switchterkoneksi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `portterkoneksi` bigint(18) DEFAULT NULL,
  `bandwidth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `circuitidbackhaul` (`circuitidbackhaul`),
  KEY `switchterkoneksi` (`switchterkoneksi`),
  KEY `namavendor` (`namavendor`),
  CONSTRAINT `backhauls_ibfk_2` FOREIGN KEY (`switchterkoneksi`) REFERENCES `backhaulswitches` (`nama`) ON UPDATE CASCADE,
  CONSTRAINT `backhauls_ibfk_3` FOREIGN KEY (`namavendor`) REFERENCES `vendors` (`nama`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backhauls`
--

LOCK TABLES `backhauls` WRITE;
/*!40000 ALTER TABLE `backhauls` DISABLE KEYS */;
INSERT INTO `backhauls` VALUES (14,1,NULL,'MAXINDO, PT.','JKT.CYB.SW2 (SW-JKT04)',20,'1','Mbps','2012-01-01','2014-08-19 21:12:46','2014-08-19 21:12:46'),(15,2,NULL,'FIBER MEDIA INDONESIA, PT. (FMI)','JKT.DR3.SW2 (SW-JKT02)',6,'1','Mbps','2012-01-01','2014-08-19 21:13:27','2014-08-19 21:13:27'),(16,370019593076,NULL,'TELKOM CISC','JKT.APJ.SW1 (SW-JKT07)',7,'3','Mbps','2012-01-01','2014-08-19 21:14:50','2014-08-19 21:14:50'),(17,370019593078,'','TELKOM CISC','JKT.DR3.SW2 (SW-JKT02)',20,'1','Mbps','2013-01-01','2014-08-19 21:15:52','2014-08-19 21:16:07'),(18,470011506328,NULL,'TELKOM DIVES','JKT.CYB.SW1 (SW-JKT03)',19,'100','Mbps','2012-01-01','2014-08-20 00:08:33','2014-08-20 00:08:33'),(19,47001080006416405,'','TELKOM DIVES','JKT.CYB.SW2 (SW-JKT04)',14,'30','Mbps','2012-01-01','2014-08-20 00:09:54','2014-08-25 19:59:35'),(20,3,NULL,'SKYREACH, PT.','JKT.APJ.SW1 (SW-JKT07)',7,'1','Mbps','2012-01-01','2014-08-20 00:11:04','2014-08-20 00:11:04'),(21,4,NULL,'ARTATEL, PT.','JKT.APJ.SW1 (SW-JKT07)',18,'1','Mbps','2012-01-01','2014-08-20 00:12:02','2014-08-20 00:12:02'),(22,5,NULL,'ARTATEL, PT.','JKT.APJ.SW1 (SW-JKT07)',20,'1','Mbps','2012-01-01','2014-08-20 00:12:22','2014-08-20 00:12:22'),(23,6,NULL,'JATAKOM, PT.','JKT.APJ.SW1 (SW-JKT07)',22,'1','Mbps','2012-01-01','2014-08-20 00:12:52','2014-08-20 00:12:52'),(24,7,NULL,'SKYLINE SEMESTA, PT.','JKT.DR3.SW2 (SW-JKT02)',12,'1','Mbps','2012-01-01','2014-08-20 00:13:44','2014-08-20 00:13:44'),(25,8,'','INDONUSA/IPSTAR','JKT.CYB.SW2 (SW-JKT04)',5,'2','Mbps','2012-01-01','2014-08-20 00:14:21','2014-08-25 20:05:37'),(26,9,NULL,'I4TE, PT.','JKT.CYB.SW1 (SW-JKT03)',20,'1','Mbps','2012-01-01','2014-08-20 00:14:42','2014-08-20 00:14:42'),(27,10,NULL,'DATA UTAMA, PT.','JKT.CYB.SW2 (SW-JKT04)',5,'1','Mbps','2012-01-01','2014-08-20 00:15:11','2014-08-20 00:15:11'),(28,11,NULL,'MEDIA LINTAS DATA, PT.','JKT.DR3.SW2 (SW-JKT02)',10,'1','Mbps','2012-01-01','2014-08-20 00:16:05','2014-08-20 00:16:05'),(29,12,NULL,'INDOSAT, PT.','JKT.CYB.SW1 (SW-JKT03)',10,'1','Mbps','2012-01-01','2014-08-20 00:16:30','2014-08-20 00:16:30'),(30,13,NULL,'INDOSAT, PT.','JKT.CYB.SW2 (SW-JKT04)',18,'1','Mbps','2012-01-01','2014-08-20 00:17:04','2014-08-20 00:17:04'),(31,14,NULL,'HYPERNET, PT.','JKT.CYB.SW1 (SW-JKT03)',11,'1','Mbps','2012-01-01','2014-08-20 00:17:35','2014-08-20 00:17:35'),(32,15,NULL,'NAP INFO, PT.','JKT.CYB.SW1 (SW-JKT03)',9,'1','Mbps','2012-01-01','2014-08-20 00:18:05','2014-08-20 00:18:05'),(33,16,NULL,'DATAFRAME/Citinet','JKT.CYB.SW2 (SW-JKT04)',4,'1','Mbps','2012-01-01','2014-08-20 00:18:31','2014-08-20 00:18:31'),(35,17,NULL,'MORATEL, PT.','JKT.DR3.SW2 (SW-JKT02)',8,'1','Mbps','2012-01-01','2014-08-20 00:19:12','2014-08-20 00:19:12'),(36,18,NULL,'CYBER Plus, PT.','JKT.CYB.SW2 (SW-JKT04)',4,'1','Mbps','2012-01-01','2014-08-20 00:19:40','2014-08-20 00:19:40'),(38,19,NULL,'DATA UTAMA, PT.','JKT.APJ.SW1 (SW-JKT07)',14,'1','Mbps','2012-01-01','2014-08-20 00:20:26','2014-08-20 00:20:26'),(39,20,NULL,'ISATNET, PT.','JKT.CYB.SW1 (SW-JKT03)',8,'100','Mbps','2012-01-01','2014-08-20 00:21:00','2014-08-20 00:21:00'),(40,21,NULL,'GAX','JKT.APJ.SW1 (SW-JKT07)',28,'100','Mbps','2012-01-01','2014-08-20 00:21:22','2014-08-20 00:21:22'),(41,22,NULL,'MLINK, PT.','SW5-BTM',8,'1','Mbps','2012-01-01','2014-08-20 00:22:00','2014-08-20 00:22:00'),(42,23,NULL,'SUMBER DATA INDONESIA, PT. (SDI)','JKT.APJ.SW1 (SW-JKT07)',11,'150','Mbps','2012-01-01','2014-08-20 00:22:20','2014-08-20 00:22:20');
/*!40000 ALTER TABLE `backhauls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backhaulswitches`
--

DROP TABLE IF EXISTS `backhaulswitches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backhaulswitches` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jumlahportfo` bigint(18) DEFAULT NULL,
  `jumlahportrj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backhaulswitches`
--

LOCK TABLES `backhaulswitches` WRITE;
/*!40000 ALTER TABLE `backhaulswitches` DISABLE KEYS */;
INSERT INTO `backhaulswitches` VALUES (1,'JKT.DR3.SW1 (SW-JKT01)','WS-C2970G-24T-E',0,'24','Jakarta','IDC Duren 3','2014-08-10 13:55:08','2014-08-19 02:07:19'),(2,'JKT.DR3.SW2 (SW-JKT02)','WS-C2970G-24T-E',0,'24','Jakarta','IDC Duren 3','2014-08-13 22:15:26','2014-08-18 20:29:12'),(3,'JKT.CYB.SW1 (SW-JKT03)','WS-C2970G-24T-E',0,'24','Jakarta','Cyber lantai 7','2014-08-13 22:18:14','2014-08-18 20:26:50'),(4,'JKT.CYB.SW2 (SW-JKT04)','WS-C2970G-24T-E',0,'24','Jakarta','Cyber lantai 7','2014-08-13 22:18:58','2014-08-18 20:27:11'),(5,'JKT.SBP.SW1 (SW-JKT06)','WS-C2970G-24TS-E',4,'24','Jakarta','SBP Lantai 6','2014-08-13 22:19:41','2014-08-18 20:29:39'),(6,'JKT.APJ.SW1 (SW-JKT07)','WS-C2970G-24TS-E',4,'24','Jakarta','APJII Lantai 1','2014-08-13 22:20:27','2014-08-13 22:21:40'),(7,'JKT.DR3.SW3 (SW-JKT08)','WS-C2970G-24TS-E',4,'24','Jakarta','IDC Duren 3','2014-08-13 22:21:11','2014-08-18 20:29:26'),(8,'JKT.CDC.SW1','WS-C2960G-24TC-L',4,'20','Jakarta','CDC Lantai 1','2014-08-13 22:22:18','2014-08-13 22:22:18'),(9,'JKT.DR3.SW3 (SW-CONTENT)','HP 2510-B24 J9019B',2,'24','Jakarta','IDC Duren 3','2014-08-13 22:23:07','2014-08-13 22:23:07'),(10,'SW5-BTM','WS-C2970G-24TS-E',4,'24','Batam','Grapen Lt.7','2014-08-13 22:23:59','2014-08-13 22:23:59'),(11,'SW-CORE-BTM-GRAPEN','HP 2510-B24 J9019B',2,'24','Batam','Grapen Lt.4','2014-08-13 22:24:31','2014-08-13 22:24:31'),(12,'SBP-BTM-2','Summit 48si',2,'48','Batam','Poltek Lt.3','2014-08-13 22:25:03','2014-08-13 22:25:03'),(13,'SBP-4-BTM','Summit 48si',2,'48','Batam','Poltek Lt.9','2014-08-13 22:25:27','2014-08-13 22:25:27'),(14,'PROCURVE J9449A','1810G - 8 GE',0,'8','Batam','POP-BCM BTM','2014-08-13 22:25:55','2014-08-13 22:25:55'),(15,'SGP.EQ6.SW1 (SW-SG01)','WS-C3750G-12S',12,'0','Singapore','SG Equinix Lt.6','2014-08-13 22:26:45','2014-08-13 22:26:45'),(16,'SGP.EQ3.SW1 (SW-SG02)','WS-C3750G-12S',0,'12','Singapore','Equinix Lt.3','2014-08-13 22:27:28','2014-08-13 22:29:26'),(17,'SGP.EQ3.SW2 (SW-SG03)','WS-C2970G-24TS-E',4,'24','Singapore','Equinix Lt.3','2014-08-13 22:28:04','2014-08-13 22:28:04');
/*!40000 ALTER TABLE `backhaulswitches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biayabackhaulvendors`
--

DROP TABLE IF EXISTS `biayabackhaulvendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biayabackhaulvendors` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `nrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `circuitidbackhaul` bigint(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `circuitidbackhaul` (`circuitidbackhaul`),
  CONSTRAINT `biayabackhaulvendors_ibfk_2` FOREIGN KEY (`circuitidbackhaul`) REFERENCES `backhauls` (`circuitidbackhaul`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biayabackhaulvendors`
--

LOCK TABLES `biayabackhaulvendors` WRITE;
/*!40000 ALTER TABLE `biayabackhaulvendors` DISABLE KEYS */;
INSERT INTO `biayabackhaulvendors` VALUES (10,'1','1','IDR',1,'2014-08-19 21:12:46','2014-08-19 21:12:46'),(11,'1','1','IDR',2,'2014-08-19 21:13:27','2014-08-19 21:13:27'),(12,'1','1','IDR',370019593076,'2014-08-19 21:14:50','2014-08-19 21:14:50'),(13,'1','1','IDR',370019593078,'2014-08-19 21:15:52','2014-08-19 21:16:07'),(14,'1','1','IDR',470011506328,'2014-08-20 00:08:33','2014-08-20 00:08:33'),(15,'1','1','IDR',47001080006416405,'2014-08-20 00:09:54','2014-08-25 19:59:35'),(16,'1','1','IDR',3,'2014-08-20 00:11:04','2014-08-20 00:11:04'),(17,'1','1','IDR',4,'2014-08-20 00:12:02','2014-08-20 00:12:02'),(18,'1','1','IDR',5,'2014-08-20 00:12:22','2014-08-20 00:12:22'),(19,'1','1','IDR',6,'2014-08-20 00:12:52','2014-08-20 00:12:52'),(20,'1','1','IDR',7,'2014-08-20 00:13:44','2014-08-20 00:13:44'),(21,'1','1','IDR',8,'2014-08-20 00:14:21','2014-08-25 20:05:37'),(22,'1','1','IDR',9,'2014-08-20 00:14:42','2014-08-20 00:14:42'),(23,'1','1','IDR',10,'2014-08-20 00:15:11','2014-08-20 00:15:11'),(24,'1','1','IDR',11,'2014-08-20 00:16:05','2014-08-20 00:16:05'),(25,'1','1','IDR',12,'2014-08-20 00:16:30','2014-08-20 00:16:30'),(26,'1','1','IDR',13,'2014-08-20 00:17:04','2014-08-20 00:17:04'),(27,'1','1','IDR',14,'2014-08-20 00:17:35','2014-08-20 00:17:35'),(28,'1','1','IDR',15,'2014-08-20 00:18:05','2014-08-20 00:18:05'),(29,'1','1','IDR',16,'2014-08-20 00:18:31','2014-08-20 00:18:31'),(30,'1','1','IDR',17,'2014-08-20 00:19:12','2014-08-20 00:19:12'),(31,'1','1','IDR',18,'2014-08-20 00:19:40','2014-08-20 00:19:40'),(32,'1','1','IDR',19,'2014-08-20 00:20:26','2014-08-20 00:20:26'),(33,'1','1','IDR',20,'2014-08-20 00:21:00','2014-08-20 00:21:00'),(34,'1','1','IDR',21,'2014-08-20 00:21:22','2014-08-20 00:21:22'),(35,'1','1','IDR',22,'2014-08-20 00:22:00','2014-08-20 00:22:00'),(36,'1','1','IDR',23,'2014-08-20 00:22:20','2014-08-20 00:22:20');
/*!40000 ALTER TABLE `biayabackhaulvendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biayacostumercircuits`
--

DROP TABLE IF EXISTS `biayacostumercircuits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biayacostumercircuits` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `nrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costumercircuit_id` bigint(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biayacostumercircuits`
--

LOCK TABLES `biayacostumercircuits` WRITE;
/*!40000 ALTER TABLE `biayacostumercircuits` DISABLE KEYS */;
/*!40000 ALTER TABLE `biayacostumercircuits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biayalastmilevendors`
--

DROP TABLE IF EXISTS `biayalastmilevendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biayalastmilevendors` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `nrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `circuitidlastmile` bigint(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `circuitidlastmile` (`circuitidlastmile`),
  CONSTRAINT `biayalastmilevendors_ibfk_1` FOREIGN KEY (`circuitidlastmile`) REFERENCES `lastmiles` (`circuitidlastmile`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biayalastmilevendors`
--

LOCK TABLES `biayalastmilevendors` WRITE;
/*!40000 ALTER TABLE `biayalastmilevendors` DISABLE KEYS */;
INSERT INTO `biayalastmilevendors` VALUES (1,'1000000','2000000','IDR',45678910,'2014-08-10 14:10:47','2014-08-20 21:13:49');
/*!40000 ALTER TABLE `biayalastmilevendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactvendors`
--

DROP TABLE IF EXISTS `contactvendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactvendors` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `cp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bagian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kawasan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_id` bigint(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactvendors`
--

LOCK TABLES `contactvendors` WRITE;
/*!40000 ALTER TABLE `contactvendors` DISABLE KEYS */;
INSERT INTO `contactvendors` VALUES (1,'Orang Teknis','Teknis','NOC','Jakarta Pusat','34535324','teknis@telkom.com','baik',1,'2014-08-10 13:50:47','2014-08-10 13:50:47'),(2,'Bu Nuril','Billing','Account Manager','Jakarta Pusat','085617081945','nuril@telkom.com','ramah',1,'2014-08-10 13:50:47','2014-08-10 13:50:47'),(3,'','Teknis','','','','','',2,'2014-08-13 21:28:44','2014-08-13 21:28:44'),(4,'Bastian','Billing','Sales','PIK','021-46223398','bastian@maxindo.net.id','',2,'2014-08-13 21:28:44','2014-08-13 21:28:44'),(5,'','Teknis','','','','','',3,'2014-08-13 21:31:27','2014-08-13 21:31:27'),(6,'Nita','Billing','','','+6221-7599 7997','nita@fibermedia.co.id','',3,'2014-08-13 21:31:27','2014-08-13 21:31:27'),(8,'Fajar Fatahillah','Marketing','Account Manager','','0816783508 / 085716700598','','',8,'2014-08-21 20:29:32','2014-08-21 20:29:32'),(9,'Fachry Assegaff','Marketing','Account Manager','','08176028036','fachry_assegaff@biznetnetworks.com','',28,'2014-08-21 20:31:26','2014-08-21 20:31:26'),(10,'Ronald','Marketing','Account Manager','Bekasi','085780706452','','',23,'2014-08-21 20:32:24','2014-08-21 20:32:24'),(11,'Ike','Marketing','Account Manager','Surabaya','08165454128','ikesby@datautama.net.id','',15,'2014-08-21 20:33:14','2014-08-21 20:33:14'),(12,'Fahmi','Marketing','Account Manager','','085717631083','fahmi@citinet.co.id','',20,'2014-08-21 20:34:25','2014-08-21 20:34:25'),(13,'Ibu Ari','Marketing','Account Manager','','0231 - 5482715','','',25,'2014-08-21 20:35:32','2014-08-21 20:35:32'),(14,'Harjoni','Marketing','Account Manager','Grogol','62 31 847 6651','harjoni@hyper.net.id','',18,'2014-08-21 20:37:18','2014-08-21 20:37:18'),(15,'Marsyal','Marketing','Account Manager','Jakarta','0816 - 901990','marsyal.kanadian@indosat.com','',17,'2014-08-21 20:39:19','2014-08-21 20:39:19'),(16,'Ibu Leli','Marketing','Account Manager','','021-33353731 / 021-7803155  ','','',9,'2014-08-21 20:40:46','2014-08-25 19:45:52'),(17,'Ari','','Manager','','08111178787','','',9,'2014-08-21 20:41:08','2014-08-21 20:41:08'),(18,'Koko','','','','0813-1578-7778','koko@medialintas.com','',16,'2014-08-21 20:43:44','2014-08-21 20:43:44'),(19,'Erik','','','','0853-1221-1223','erik@medialintas.com','',16,'2014-08-21 20:44:20','2014-08-21 20:44:20'),(20,'Erni','Marketing','Account Manager','','08121399121','erni@moratelindo.co.id','',22,'2014-08-21 20:46:07','2014-08-21 20:46:07'),(21,'imam rahadian','NOC','','','022-61158436 ','imamr@skyline.net.id','',11,'2014-08-21 20:47:48','2014-08-21 20:47:48'),(22,'Rudi','','','','021-45848392','rudy@skyreach.co.id','',6,'2014-08-21 20:48:55','2014-08-21 20:48:55'),(23,'Veni','Marketing','Account Manager','','021-46223355','retaildivision@tachyon.net.id','',10,'2014-08-21 20:49:42','2014-08-21 20:49:42'),(24,'Pak Yani','','','','021-25675011 / 25675019 / 25675017','ahmad_yani68@telkom.co.id','',4,'2014-08-21 20:50:35','2014-08-21 20:50:35'),(25,'Irfan','','','','021-25675011 / 25675019 / 25675017','irfanmauln@gmail.com','',4,'2014-08-21 20:50:57','2014-08-21 20:50:57'),(26,'Ibu Nunik','Marketing','Account Manager','','021-70787557','nurlaila@telkom.co.id','',5,'2014-08-21 20:51:47','2014-08-21 20:51:47'),(27,'Ibu Yanti','Sales','','','(0341) 404826','yanti@cims.co.id','',36,'2014-08-22 02:07:58','2014-08-22 02:17:17'),(28,'','Billing','','','','','',36,'2014-08-22 02:07:58','2014-08-22 02:07:58');
/*!40000 ALTER TABLE `contactvendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costumercircuitperangkats`
--

DROP TABLE IF EXISTS `costumercircuitperangkats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costumercircuitperangkats` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `namaperangkat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serialnumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pemilik` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costumercircuit_id` bigint(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costumercircuitperangkats`
--

LOCK TABLES `costumercircuitperangkats` WRITE;
/*!40000 ALTER TABLE `costumercircuitperangkats` DISABLE KEYS */;
/*!40000 ALTER TABLE `costumercircuitperangkats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costumercircuits`
--

DROP TABLE IF EXISTS `costumercircuits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costumercircuits` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `circuitid` bigint(18) DEFAULT NULL,
  `namasite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `layanan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bandwidth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namavendor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `circuitidlastmile` bigint(18) DEFAULT NULL,
  `customer_id` bigint(18) DEFAULT NULL,
  `circuitidbackhaul` bigint(18) DEFAULT NULL,
  `activated_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `namavendor` (`namavendor`),
  KEY `circuitidlastmile` (`circuitidlastmile`),
  KEY `circuitidbackhaul` (`circuitidbackhaul`),
  CONSTRAINT `costumercircuits_ibfk_1` FOREIGN KEY (`namavendor`) REFERENCES `vendors` (`nama`) ON UPDATE CASCADE,
  CONSTRAINT `costumercircuits_ibfk_2` FOREIGN KEY (`circuitidlastmile`) REFERENCES `lastmiles` (`circuitidlastmile`) ON UPDATE CASCADE,
  CONSTRAINT `costumercircuits_ibfk_4` FOREIGN KEY (`circuitidbackhaul`) REFERENCES `backhauls` (`circuitidbackhaul`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costumercircuits`
--

LOCK TABLES `costumercircuits` WRITE;
/*!40000 ALTER TABLE `costumercircuits` DISABLE KEYS */;
/*!40000 ALTER TABLE `costumercircuits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customercontacts`
--

DROP TABLE IF EXISTS `customercontacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customercontacts` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `cp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bagian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactable_id` bigint(18) DEFAULT NULL,
  `contactable_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customercontacts`
--

LOCK TABLES `customercontacts` WRITE;
/*!40000 ALTER TABLE `customercontacts` DISABLE KEYS */;
INSERT INTO `customercontacts` VALUES (1,'Mr. X','Teknis','Manager','1234556','manager@expereo.com','Ramah',1,'Customer','2014-08-10 13:46:54','2014-08-10 13:46:54'),(2,'Mr. Y','Billing','Manager','123412','billing@expereo.com','Susah dihubungi',1,'Customer','2014-08-10 13:46:54','2014-08-10 13:46:54');
/*!40000 ALTER TABLE `customercontacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` bigint(18) DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamatnpwp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `register_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `customerid` (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,1,'Expereo','Singapore','Platinum','123.456.789','Singapore','Susah dihubungi','2012-01-01','2014-08-10 13:46:54','2014-08-10 13:46:54');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lastmiles`
--

DROP TABLE IF EXISTS `lastmiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lastmiles` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `circuitidlastmile` bigint(18) DEFAULT NULL,
  `vlanid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vlanname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipaddressptp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blockippubliccustomer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `layanan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bandwidth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` date DEFAULT NULL,
  `kawasan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namavendor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_id` bigint(18) DEFAULT NULL,
  `circuitidbackhaul` bigint(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `circuitidlastmile` (`circuitidlastmile`),
  KEY `namavendor` (`namavendor`),
  KEY `circuitidbackhaul` (`circuitidbackhaul`),
  CONSTRAINT `lastmiles_ibfk_3` FOREIGN KEY (`namavendor`) REFERENCES `vendors` (`nama`) ON UPDATE CASCADE,
  CONSTRAINT `lastmiles_ibfk_4` FOREIGN KEY (`circuitidbackhaul`) REFERENCES `backhauls` (`circuitidbackhaul`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lastmiles`
--

LOCK TABLES `lastmiles` WRITE;
/*!40000 ALTER TABLE `lastmiles` DISABLE KEYS */;
INSERT INTO `lastmiles` VALUES (1,45678910,'718','Aker','','','Layer 2','6','Mbps','Aktif','2013-07-18','Batam','Bebas kasih komeng','TELKOM DIVES',1,370019593076,'2014-08-10 14:10:47','2014-08-20 21:13:49');
/*!40000 ALTER TABLE `lastmiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_04_30_170459_create_users_table',1),('2014_05_05_140100_create_profiles_table',1),('2014_07_07_091857_create_vendors_table',1),('2014_07_07_093322_create_customers_table',1),('2014_07_07_093344_create_costumercircuits_table',1),('2014_07_07_093408_create_customercontacts_table',1),('2014_07_07_093438_create_adsls_table',1),('2014_07_07_093524_create_biayacostumercircuits_table',1),('2014_07_07_093552_create_costumercircuitperangkats_table',1),('2014_07_07_093612_create_lastmiles_table',1),('2014_07_07_093702_create_backhauls_table',1),('2014_07_07_093739_create_backhaulswitches_table',1),('2014_07_07_093755_create_contactvendors_table',1),('2014_07_07_093814_create_biayalastmilevendors_table',1),('2014_07_07_093829_create_biayabackhaulvendors_table',1),('2014_07_08_020233_create_asals_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `twitter_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'suhendra','sayasuhendra@gmail.com','$2y$10$6yerqgKoDUL0M1gcJ8h1neAhx8YBNSlOOlvpMDolVgftZOJaq/9q6','OhFDKMFZdPaHhfx3Cbdx03cdhBwg6aJpFQZWRmFuC5DYX6bJyaGKTcnBPPvg','2014-07-09 17:20:11','2014-08-25 20:39:17'),(2,'firman','firman@sbp.net.id','$2y$10$Pg2lEClvU09lRoEm2UZHMeILZWCrY7EnMraC0oeodcNTIDjDgIwsi','18VAABT9iFESbCgKk99mOzwHUHfH2LAw2ZGikBRzQ2HPgFiQQlrLlQiopDqi','2014-08-12 20:45:23','2014-08-25 19:57:29'),(3,'Eka Mustika','eka@sbp.net.id','$2y$10$5qj5ysY4RIE4es41hOPL6.SaFY4mB.tx.3hJNWuIc.rRBH4gWgnSG','DCmwmtR0blzci2OS44ECptlLVzvIXJrvzRi7pltloQUZNIA0ACxFCM7Fy6eZ','2014-08-21 01:41:30','2014-08-21 01:56:52'),(4,'hardi','hardi@sbp.net.id','$2y$10$KgoFROjmo1pHOPopQlkA5uGktilYjMohzwc/GV8AP/M2pwubKnNMC','5aHERxdb5j3Z2bclCT5s4NUT9iVUsL1DlckYalbNZS1kJpflr2gM5Me1FIe2','2014-08-21 21:09:40','2014-08-22 02:54:22'),(7,'wena','wena@sbp.net.id','$2y$10$FGkJMnMALQwDPWBcSO6aYua93AlyV1Yvnv1D3XN15TOXhiQZNi6q6','qKOFmjnY7ojTUfmXDZmml49AziDVx5NWtqVF0J11HkPy4dZqB0yZCXa1cAhB','2014-08-25 19:52:27','2014-08-25 23:15:42'),(8,'budiarto','budiarto@sbp.net.id','$2y$10$0PKncW1f5eKLvZ1/7cWRZOQKP6ScpK/SUrdDdyEoOtlmklMrWFvHe','hZRDrM24j06n9BFhmRFnwprZmuzPApCsYPxI5W6wYON16BRdvMVMCUZpH1vb','2014-08-25 19:53:01','2014-08-25 21:03:19'),(9,'prasetyo','prasetyo@sbp.net.id','$2y$10$J.1cfb5YUhiIde/hDxvlpOA8zdW/Zml0Xq.RJNjxr3iv1H70OvZo6','6hkYJeaNUm296g5KScRows7tHRoRAgnI6S5Jl6QRN0rkgc8m31EnosVcS1V0','2014-08-25 19:53:42','2014-08-25 20:04:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamatnpwp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'TELKOM DIVES','Jln. Kebon Sirih','123.456.789','Jln. Kebon Sirih','ramah','2014-08-10 13:50:47','2014-08-14 12:31:31'),(2,'MAXINDO, PT.','Jl. Ruko Cordoba Blok H No. 77, Pantai Indah Kapuk, Jakarta, 14460','','','','2014-08-13 21:28:44','2014-08-25 21:09:14'),(3,'FIBER MEDIA INDONESIA, PT. (FMI)','Talavera Office Park 28th FloorJl. Letjen TB Simatupang Cilandak Barat Jakarta','','','','2014-08-13 21:31:27','2014-08-25 21:07:27'),(4,'TELKOM CISC','Kebon Sirih','','','','2014-08-13 21:52:13','2014-08-13 21:52:13'),(5,'TELKOM DBS','Kebon Sirih','','','','2014-08-13 21:52:33','2014-08-13 21:52:33'),(6,'SKYREACH, PT.','Gading Bukit Indah Blok H #24\r\nKelapa Gading - Jakarta 14240','','','','2014-08-13 21:52:53','2014-08-25 21:12:29'),(7,'INFRACOM, PT.','6th - Floor Plaza Kelapa Dua\r\nJl. Panjang Arteri Kelapa Dua No. 29 Jakarta Barat\r\n11550, Indonesia','','','','2014-08-13 21:53:05','2014-08-25 21:08:55'),(8,'ARTATEL, PT.','Komplek Fatmawati Mas Blok B1/114 \r\nJl RS Fatmawati no 20, Jakarta Selatan 12430  Telp. 021.7590 9999 (hunting)','','','','2014-08-13 21:53:21','2014-08-25 21:22:45'),(9,'JATAKOM, PT.','Jakarta','','','','2014-08-13 21:53:30','2014-08-25 21:09:08'),(10,'TACHYON','Jl Raya Darmawangsa II Bl F/41\r\nDKI Jakarta','','','','2014-08-13 21:53:44','2014-08-13 21:53:44'),(11,'SKYLINE SEMESTA, PT.','Jl Kebon Jati, Luxor Permai Kav. 24 Bandung, Indonesia\r\nTelp: (022) 423 9760/ Fax : (022) 420 1768','','','','2014-08-13 21:53:56','2014-08-25 21:11:44'),(12,'INDONUSA/IPSTAR','Plaza Kelapa Dua – 6th Floor\r\nJl. Panjang Arteri Kelapa Dua no.29\r\nJakarta Barat – 11550','','','','2014-08-13 21:54:08','2014-08-13 21:54:08'),(13,'MEDIANUSA, PT.','Graha Pena 4th Floor Suite# 3A-11, BATAM, 29643\r\nTelepon: 0778-468817/18/19','','','','2014-08-13 21:54:19','2014-08-25 21:09:53'),(14,'I4TE, PT.','Wisma Millenia 4th floor\r\nJl. MT. Haryono Kav. 16\r\nJakarta 12810 Indonesia','','','','2014-08-13 21:54:36','2014-08-25 21:07:58'),(15,'DATA UTAMA, PT.','Wisma Dharmala / Intiland Tower\r\nLantai 8 Ruang 6B dan Lantai 3\r\nJl. Panglima Sudirman No. 101 - 103\r\nSurabaya 60271','','','','2014-08-13 21:54:58','2014-08-25 21:06:11'),(16,'MEDIA LINTAS DATA, PT.','Menara Jamsostek, \r\nMenara Selatan Lt. 6 Jl. Jend Gatot Subroto Kav 38 \r\nJakarta - Indonesia 12710','','','','2014-08-13 21:55:27','2014-08-25 21:09:48'),(17,'INDOSAT, PT.','Jl.Medan Merdeka Selatan','','','','2014-08-13 21:55:44','2014-08-25 21:08:30'),(18,'HYPERNET, PT.','GRAHA HYPER\r\nJl. Makaliwe Raya No. 24 - 24A, Grogol Petamburan\r\nJakarta - 11450 Ph. +62 21 5694 9988','','','','2014-08-13 21:55:57','2014-08-25 21:07:45'),(19,'NAP INFO, PT.','Annex Building Suite 101 AB\r\nPlaza Kuningan Jl. H.R. Rasuna Said Kav C 11 - 14\r\nJakarta 12940','','','','2014-08-13 21:56:17','2014-08-25 21:10:35'),(20,'DATAFRAME/Citinet','Jakarta','','','','2014-08-13 21:56:26','2014-08-13 21:56:26'),(21,'SKYMEDIA, PT.','Jakarta','','','','2014-08-13 21:56:39','2014-08-25 21:12:11'),(22,'MORATEL, PT.','Grha 9 Building - Jl. Panataran No. 9, Proklamasi, Jakarta Pusat 10320\r\nPhone : +6221-3199 8600','','','','2014-08-13 21:56:52','2014-08-25 21:10:15'),(23,'CYBER Plus, PT.','Rukan Griya Alifa Blok B # 3  \r\nJl. Pulo Ribung Raya (Taman Galaxy)\r\nBekasi - Jawa Barat  Indonesia - 17148','','','','2014-08-13 21:57:10','2014-08-25 21:05:58'),(24,'TNC','alamat','','','','2014-08-13 21:57:26','2014-08-13 21:57:26'),(25,'ELNUS, PT.','unknown','','','','2014-08-13 21:57:37','2014-08-25 21:06:35'),(26,'ISATNET, PT.','Jl. Daan Mogot 1 No.34\r\nTanjung Duren, Jakarta Barat, 11470','','','','2014-08-13 21:57:51','2014-08-25 21:09:02'),(27,'GAX','Singapore','','','','2014-08-13 21:58:03','2014-08-13 21:58:03'),(28,'BIZNET, PT.','MidPlaza 2, Lantai 8Jl. Jend. Sudirman 10-11Jakarta 10220 - Indonesia','','','','2014-08-13 21:58:14','2014-08-25 21:05:38'),(29,'INDONET, PT.','Rumah Indonet Jl. Rempoa Raya No. 11Ciputat – Tangerang SelatanBanten 15412 Indonesia','','','','2014-08-13 21:58:31','2014-08-25 21:08:12'),(30,'APLIKANUSA LINTASARTA, PT.','Gedung Menara Thamrin Lt. 19 Jl. MH Thamrin kav. 3 Jakarta Pusat','','','','2014-08-13 21:58:50','2014-08-25 21:05:01'),(31,'MLINK, PT.','Graha BIP 9th FloorJl. Jend. Gatot Subroto Kav. 23Jakarta 12930','','','','2014-08-13 21:59:05','2014-08-25 21:09:58'),(32,'MEDIA AKSES, PT.','Cyber Building 5th FloorJl. Kuningan Barat No. 8Jakarta 12710','','','','2014-08-13 21:59:18','2014-08-25 21:09:19'),(33,'PASIFIC LINK, PT.','Graha Surveyor Indonesiad/h Gdg. Adhi Graha Lt. 3 (Suite 303)Jl. Jend. Gatot Subroto Kav. 56Jakarta','','','','2014-08-13 21:59:28','2014-08-25 21:10:40'),(34,'WANXP','Jl Juanda Gg Sumber No 1B - (Belakang Hotel Mahkota) \r\nPekanbaru, Riau 28000','','','','2014-08-13 21:59:39','2014-08-13 21:59:39'),(35,'SUMBER DATA INDONESIA, PT. (SDI)','Jl.Raya Pondok Gede No.48B Lubang Buaya Cipayung Jakarta Timur 13810 Phone : +6221 8778 7171 ','','','','2014-08-13 22:00:19','2014-08-25 21:11:18'),(36,'CITRA MEDIA SOLUSINDO, PT.','Jl.Soekarno Hatta Ruko Soekarno Hatta Indah Blok E-08 MALANG','','','','2014-08-22 02:07:58','2014-08-25 21:05:47');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-26 15:10:42
