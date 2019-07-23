-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: vendor_management_system
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.16-MariaDB

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
-- Table structure for table `dtbcatalog`
--

DROP TABLE IF EXISTS `dtbcatalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtbcatalog` (
  `catalogId` int(11) NOT NULL AUTO_INCREMENT,
  `vendorId` varchar(5) NOT NULL,
  `name` varchar(45) NOT NULL,
  `file` varchar(100) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`catalogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtbcatalog`
--

LOCK TABLES `dtbcatalog` WRITE;
/*!40000 ALTER TABLE `dtbcatalog` DISABLE KEYS */;
/*!40000 ALTER TABLE `dtbcatalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtbcategory`
--

DROP TABLE IF EXISTS `dtbcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtbcategory` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtbcategory`
--

LOCK TABLES `dtbcategory` WRITE;
/*!40000 ALTER TABLE `dtbcategory` DISABLE KEYS */;
INSERT INTO `dtbcategory` VALUES (1,'PIPING',0),(2,'ELECTRICAL',0),(3,'CIVIL',0),(4,'TOOLS',0),(23,'SEWA EQUIPMENT',0),(24,'AUTOMOTIVE',0);
/*!40000 ALTER TABLE `dtbcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtbinfo`
--

DROP TABLE IF EXISTS `dtbinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtbinfo` (
  `infoId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  `logoFull` text NOT NULL,
  PRIMARY KEY (`infoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtbinfo`
--

LOCK TABLES `dtbinfo` WRITE;
/*!40000 ALTER TABLE `dtbinfo` DISABLE KEYS */;
INSERT INTO `dtbinfo` VALUES (1,'CV. TRUST JAYA','TRJ','JL. RAYA INDONESIA','(62-21)888332','(62-21)885','budi@gmail.com','logo.png','logo-full.png');
/*!40000 ALTER TABLE `dtbinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtbusers`
--

DROP TABLE IF EXISTS `dtbusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtbusers` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1= aktif, 2= tidak aktif',
  `delete` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtbusers`
--

LOCK TABLES `dtbusers` WRITE;
/*!40000 ALTER TABLE `dtbusers` DISABLE KEYS */;
INSERT INTO `dtbusers` VALUES (1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3',1,0),(2,'Budi','budi','00dfc53ee86af02e742515cdcf075ed3',2,0);
/*!40000 ALTER TABLE `dtbusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtbvendor`
--

DROP TABLE IF EXISTS `dtbvendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtbvendor` (
  `vendorId` varchar(5) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` tinytext NOT NULL,
  `address` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `catalog` varchar(50) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`vendorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtbvendor`
--

LOCK TABLES `dtbvendor` WRITE;
/*!40000 ALTER TABLE `dtbvendor` DISABLE KEYS */;
INSERT INTO `dtbvendor` VALUES ('CTJ',3,'CV TRUST JAYA123','PENYEWAAN BARANG-BARANG ELECTRICT123','JL RAYA PONDOK123','089998089890A','0821982892A','CTJ@GMAIL.COM','999182923637A','inquiry_64.png',0),('HMI',24,'HYUNDAI MOBIL INDONESIA','VENDOR MOBIL OPERASIONAL','JL TEUKU NYAK ARIEF','0877777777','089999999','SALES@HYUNDAIMOBIL.C','123123-345345-345345','download.png',0),('HNK',23,'HAFIS NURYATAMA KONTRUKSIPOI','SEWA CRANE','AAA','111','111','HNK@GMAIL.COME','1','',0),('MMA',1,'PT MITRA MAKMUR ANGKASA123','PERUSAHAAN TOOLS123','JL RAYA KAPUK 123','08777123','08888123','MITRA123@GMAIL.COMET','2','',0),('SLA',1,'SINAR LAUT ABADI','JUAL PIPA','JL RAYA LAGI','0877777','0866666','sla@gmail.com','3','',0),('TM',4,'TERUS MAJU','JUAL ALAT BANGUNAN','JL RAYA','08777','08999','TM@GMAIL.COM','4','',0),('TMO',2,'TERUS MAJU OKE','JUAL ALAT BANGUNAN','JL RAYA','08777','08999','tm@gmail.com','5','',0);
/*!40000 ALTER TABLE `dtbvendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtremail`
--

DROP TABLE IF EXISTS `dtremail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtremail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendorId` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `sendFrom` varchar(45) NOT NULL,
  `sendTo` varchar(45) NOT NULL,
  `sendCc` varchar(45) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `delete` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtremail`
--

LOCK TABLES `dtremail` WRITE;
/*!40000 ALTER TABLE `dtremail` DISABLE KEYS */;
INSERT INTO `dtremail` VALUES (11,'SLA','2019-07-20','sales@gmail.com','dyanzzz@gmail.com','','Note untuk PT xxx','<p>Dear.</p><p>Mohon untuk mengirimkan daftar harga yang lebih detail</p>','',0,0),(12,'SLA','2019-07-20','sales@gmail.com','sla@gmail.com','poi@tre','poi','<p>poi</p>','',0,0),(13,'SLA','2019-07-20','sales@gmail.com','tm@gmail.com','poi@tre','tre','<p><b>tre</b></p>','',0,0),(14,'SLA','2019-07-20','sales@gmail.com','TM@GMAIL.COM','aasdasd@q','asd','<p>asd</p>','',0,0),(15,'HNK','2019-07-23','budi@gmail.com','HNK@GMAIL.COME','budi@gmail.om','tes','<p>tes aja</p>','',0,0),(16,'HNK','2019-07-23','budi@gmail.com','HNK@GMAIL.COME','asd','asd','<p>asd</p>','',0,0),(17,'TM','2019-07-23','budi@gmail.com','TM@GMAIL.COM','asd','asd','<p>asd</p>','',0,0),(18,'TM','2019-07-23','budi@gmail.com','TM@GMAIL.COM','asd','asd','<p>asd</p>','inquiry_5121.png',0,0),(19,'HMI','2019-07-23','budi@gmail.com','SALES@HYUNDAIMOBIL.Com','anwar@gmail.com','minta catalog mobil hyundai','<p>dear hyundai</p><p>saya minta catalog mobil hyundai tucson dan kona sebagai perbandingan.</p><p>mohon dikirimkan juga price list lieasing</p><p><br></p><p>regards</p><p>budi</p>','business2.png',0,0),(20,'CTJ','2019-07-23','budi@gmail.com','dyanzzz@gmail.com','','tes','<p>tes</p>','',0,0),(21,'HMI','2019-07-23','budi@gmail.com','dyanzzz@gmail.com','','tes aja','<p>tes aja</p>','',0,0),(22,'HMI','2019-07-23','budi@gmail.com','dyanzzz@gmail.com','','tes aja','<p>tes aja</p>','',0,0),(23,'MMA','2019-07-23','anto@gmail.com','dyanzzz@gmail.com','dian.trib@gmail.com','Tes lagi aja ke gmail','<p>Tes lagi aja ke gmail<br></p>','package_512.png',0,0);
/*!40000 ALTER TABLE `dtremail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtrproject`
--

DROP TABLE IF EXISTS `dtrproject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtrproject` (
  `projectId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`projectId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtrproject`
--

LOCK TABLES `dtrproject` WRITE;
/*!40000 ALTER TABLE `dtrproject` DISABLE KEYS */;
/*!40000 ALTER TABLE `dtrproject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtrprojectvendor`
--

DROP TABLE IF EXISTS `dtrprojectvendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtrprojectvendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `vendorId` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtrprojectvendor`
--

LOCK TABLES `dtrprojectvendor` WRITE;
/*!40000 ALTER TABLE `dtrprojectvendor` DISABLE KEYS */;
/*!40000 ALTER TABLE `dtrprojectvendor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-23 23:26:37
