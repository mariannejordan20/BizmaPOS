CREATE DATABASE  IF NOT EXISTS `1tdbsys` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `1tdbsys`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: 1tdbsys
-- ------------------------------------------------------
-- Server version 8.0.36

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
-- Table structure for table `paste_errors`
--

DROP TABLE IF EXISTS `paste_errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paste_errors` (
  `unitcode` text,
  `pname` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paste_errors`
--

LOCK TABLES `paste_errors` WRITE;
/*!40000 ALTER TABLE `paste_errors` DISABLE KEYS */;
INSERT INTO `paste_errors` VALUES ('U004','LTR');
/*!40000 ALTER TABLE `paste_errors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl1sales`
--

DROP TABLE IF EXISTS `tbl1sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl1sales` (
  `TransNo` text,
  `TransId` text,
  `MM` text,
  `DD` text,
  `YYYY` text,
  `WW` text,
  `Time` text,
  `SaleCounted` text,
  `ProdInputEType` text,
  `Operator` text,
  `Salesman` text,
  `ReadSQ` text,
  `Terminal` text,
  `ItemCode` text,
  `BarCode` text,
  `dtrg` text,
  `PName` text,
  `Serial` text,
  `category` text,
  `subcategory` bigint DEFAULT NULL,
  `sellerconc` text,
  `PCN` text,
  `OrderSaleTitleSerialNote` text,
  `CusId` text,
  `cusname` text,
  `Qty` text,
  `Unit` text,
  `alength` text,
  `awidth` text,
  `Warranty` text,
  `Cost` text,
  `totalCost` text,
  `Price` text,
  `DiscValue` text,
  `DiscDesc` text,
  `DiscAllEach` text,
  `DiscIDVerific` text,
  `DiscAmount` text,
  `DiscAddOverall` text,
  `TotalDiscount` text,
  `Profit` text,
  `TotalProfit` text,
  `TotalLineAmount` text,
  `Selltype` text,
  `Completed` text,
  `Lookup` text,
  `vrct` text,
  `siteNdev` text,
  `lodcounter` text,
  `lodctot` text,
  `jdone` text,
  `pckn` text,
  `chkorlsvisible` text,
  `Ldc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl1sales`
--

LOCK TABLES `tbl1sales` WRITE;
/*!40000 ALTER TABLE `tbl1sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl1sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl1salessum`
--

DROP TABLE IF EXISTS `tbl1salessum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl1salessum` (
  `Transno` text,
  `Transid` text,
  `mm` text,
  `dd` text,
  `WW` text,
  `ttime` text,
  `yyyy` text,
  `dtrg` text,
  `Operator` text,
  `salesman` text,
  `TID` text,
  `pcn` text,
  `cashsi` text,
  `chargesi` text,
  `ackrcpt` text,
  `cusidt` text,
  `cusname` text,
  `tSiteLocID` text,
  `tSiteLoc` text,
  `t_amount` text,
  `t_cost` text,
  `t_discount` text,
  `t_payable` text,
  `DiscIDVerific` text,
  `disctsline` text,
  `discName` text,
  `discValue` text,
  `discPercent` text,
  `t_paidAmount` text,
  `t_profit` text,
  `transtype` text,
  `transOutTypeVia` text,
  `transOutTypeThru` text,
  `PaymentMode` text,
  `PaymentDESC` text,
  `SaleCounted` text,
  `StatInputComplete` text,
  `Status` text,
  `Releaseddate` text,
  `releasedVia` text,
  `ReadSQ` text,
  `FullyPaidStat` text,
  `Notes` text,
  `VerifyBy` text,
  `releasedThru` text,
  `edited` text,
  `jdone` text,
  `tsslcount` text,
  `pdate` text,
  `ldct` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl1salessum`
--

LOCK TABLES `tbl1salessum` WRITE;
/*!40000 ALTER TABLE `tbl1salessum` DISABLE KEYS */;
INSERT INTO `tbl1salessum` VALUES ('Transno','Transid','mm','dd','WW','ttime','yyyy','dtrg','Operator','salesman','TID','pcn','cashsi','chargesi','ackrcpt','cusidt','cusname','tSiteLocID','tSiteLoc','t_amount','t_cost','t_discount','t_payable','DiscIDVerific','disctsline','discName','discValue','discPercent','t_paidAmount','t_profit','transtype','transOutTypeVia','transOutTypeThru','PaymentMode','PaymentDESC','SaleCounted','StatInputComplete','Status','Releaseddate','releasedVia','ReadSQ','FullyPaidStat','Notes','VerifyBy','releasedThru','edited','jdone','tsslcount','pdate','ldct');
/*!40000 ALTER TABLE `tbl1salessum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl1t`
--

DROP TABLE IF EXISTS `tbl1t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl1t` (
  `tSeq` int DEFAULT NULL,
  `tNoStart` text,
  `tCashiStart` text,
  `tChargeiStart` text,
  `tARiStart` text,
  `tNoCnow` text,
  `tCashiCnow` text,
  `tChargeiCnow` text,
  `tARiCnow` text,
  `StockInRR` int DEFAULT NULL,
  `saletoc` text,
  `pckn` int DEFAULT NULL,
  `ponum` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl1t`
--

LOCK TABLES `tbl1t` WRITE;
/*!40000 ALTER TABLE `tbl1t` DISABLE KEYS */;
INSERT INTO `tbl1t` VALUES (21,'0000000','0000000','0000000','0000000','0000011','0000000','0000000','0000000',1000001,'OPEN',0,100007);
/*!40000 ALTER TABLE `tbl1t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbladmitrepair`
--

DROP TABLE IF EXISTS `tbladmitrepair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbladmitrepair` (
  `claimstubno` text,
  `sqnumticket` text,
  `cusid` text,
  `tnotes` text,
  `tstaff` text,
  `InorOut` text,
  `tstatus` text,
  `t1` text,
  `t2` text,
  `t3` text,
  `t4` text,
  `t5` text,
  `t6` text,
  `t7` text,
  `status` text,
  `t8` text,
  `t9` text,
  `t10` text,
  `t11` text,
  `t12` text,
  `t13` text,
  `t14` text,
  `t15` text,
  `t16` text,
  `t17` text,
  `t18` text,
  `t19` text,
  `t20` text,
  `t21` text,
  `t22` text,
  `t23` text,
  `t24` text,
  `t25` text,
  `t26` text,
  `t27` text,
  `t28` text,
  `t29` text,
  `t30` text,
  `t31` text,
  `t32` text,
  `t33` text,
  `t34` text,
  `t35` text,
  `t36` text,
  `t37` text,
  `t38` text,
  `t39` text,
  `t40` text,
  `t41` text,
  `t42` text,
  `t43` text,
  `t44` text,
  `t45` text,
  `t46` text,
  `t47` text,
  `t48` text,
  `t49` text,
  `t50` text,
  `t51` text,
  `t52` text,
  `t53` text,
  `t54` text,
  `t55` text,
  `t56` text,
  `t57` text,
  `t58` text,
  `t59` text,
  `t60` text,
  `t61` text,
  `t62` text,
  `t63` text,
  `t64` text,
  `t65` text,
  `t66` text,
  `t67` text,
  `t68` text,
  `t69` text,
  `t70` text,
  `t71` text,
  `t72` text,
  `t73` text,
  `t74` text,
  `t75` text,
  `t76` text,
  `t77` text,
  `t78` text,
  `t79` text,
  `t80` text,
  `t81` text,
  `t82` text,
  `t83` text,
  `t84` text,
  `t85` text,
  `t86` text,
  `t87` text,
  `t88` text,
  `t89` text,
  `t90` text,
  `t91` text,
  `t92` text,
  `t93` text,
  `t94` text,
  `t95` text,
  `t96` text,
  `t97` text,
  `t98` text,
  `t99` text,
  `t100` text,
  `t101` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladmitrepair`
--

LOCK TABLES `tbladmitrepair` WRITE;
/*!40000 ALTER TABLE `tbladmitrepair` DISABLE KEYS */;
INSERT INTO `tbladmitrepair` VALUES ('claimstubno','sqnumticket','cusid','tnotes','tstaff','InorOut','tstatus','t1','t2','t3','t4','t5','t6','t7','status','t8','t9','t10','t11','t12','t13','t14','t15','t16','t17','t18','t19','t20','t21','t22','t23','t24','t25','t26','t27','t28','t29','t30','t31','t32','t33','t34','t35','t36','t37','t38','t39','t40','t41','t42','t43','t44','t45','t46','t47','t48','t49','t50','t51','t52','t53','t54','t55','t56','t57','t58','t59','t60','t61','t62','t63','t64','t65','t66','t67','t68','t69','t70','t71','t72','t73','t74','t75','t76','t77','t78','t79','t80','t81','t82','t83','t84','t85','t86','t87','t88','t89','t90','t91','t92','t93','t94','t95','t96','t97','t98','t99','t100','t101');
/*!40000 ALTER TABLE `tbladmitrepair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbladmitrepaircontent`
--

DROP TABLE IF EXISTS `tbladmitrepaircontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbladmitrepaircontent` (
  `SeQ` int DEFAULT NULL,
  `TktNo` int DEFAULT NULL,
  `Qty` int DEFAULT NULL,
  `Units` text,
  `ItemAndDescription` text,
  `Serials` text,
  `Problem` text,
  `Remarks` text,
  `Stat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladmitrepaircontent`
--

LOCK TABLES `tbladmitrepaircontent` WRITE;
/*!40000 ALTER TABLE `tbladmitrepaircontent` DISABLE KEYS */;
INSERT INTO `tbladmitrepaircontent` VALUES (65,1000007,1,'PCS','SAGH','FDJ','FK','LF','JL;'),(66,1000009,1,'PCS','LAPTOP LENOVO','1','ERROR DISPLAY','SORRY GUBA KO','SINGLE'),(67,1000009,2,'PCS','WIFI VENDO','2','LOST CONNECTION','CANT CONNECT PLS CHECK UR INTERNET CONNECTION','DOUBLE KILL'),(68,1000011,1,'PCS','ASBFJ','DGAD','SFHF','FH','HSF'),(69,1000012,1,'PCS','VENDO','1','NO WIFI','PLS UR CHK','SSGDGF'),(70,1000013,2,'PCS','CP','3','NO DISPLAY','FHJK','DFGHIJ'),(71,1000015,1,'PCS','PC','2','NO DISPLAY','SJHJHG','DGKHK'),(72,1000016,2,'PCS','PC','SDF','SDG','SDG','SDG'),(73,1000017,1,'GRM','JHF','J','FD','KD','DN'),(75,1000018,5,'PCS','GH','HJ','DFGH','FDGH','TYU'),(76,1000019,1,'SET','H','F','M','M','C'),(77,1000019,2,'PCS','XN','MG','C','SF','G'),(78,1000020,2,'GRM','SDGSD','SM','SFS','DGM','NSF'),(79,1000021,12,'PCS','GSG','SG','SDG','SDG','GSD'),(81,1000022,3,'PCS','SBS','SBD','SDB','SDB','SD'),(82,1000023,1,'PCS','WEGW','WG','WR','WH','HW'),(84,1000034,1,'PCS','SD','GS','FJK','LHK','HL'),(85,1000035,1,'PCS','AGA','SH','FGH','FGHF','GFH'),(86,1000036,1,'PCS','SGD','SGS','SDGD','SG','SDG'),(87,1000037,12,'PCS','AGA','SDGS','SHS','SHD','HSD'),(88,1000037,1,'PCS','SSJ','SFJK','DSFJDGKL','AHSJDKFH','SDHDK'),(89,1000038,1,'PCS','CPU','2','NO DISPLAY','ERROR','NAAAAA'),(90,1000039,1,'PCS','WATER VENDO','3','DI MO AGAS','GUBA','NA'),(91,1000040,1,'PCS','MONITOR','1','CRACK SCREEN','WAY TAW','NA'),(93,1000041,1,'PCS','SVD','SDV','SDV','VSV','SV'),(94,1000042,2,'PCS','SAKONG GINAMOS','2','DI MAHUROT','MAO LAGI','OH'),(96,1000043,1,'PCS','YAHONG','1','NALUMPING','OH LAGI','WALA'),(97,1000045,6,'PCS','HGGG','775657','FG','FG','HGH'),(98,1000045,7,'PCS','FDF','FGF','ESD','DSFS','FSD'),(99,1000072,3,'PCS','FERI','FEFE','WERA','AWRT','AWAW'),(100,1000073,4,'PCS','AWR','AWW','DDD','AW','AW'),(101,1000075,44,'PCS','QWQ','QWQW','QWQW','QWQW','QWQW'),(102,1000008,11,'KLS','SSS','SQSQ','SAS','SA','SA');
/*!40000 ALTER TABLE `tbladmitrepaircontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblbillingselected`
--

DROP TABLE IF EXISTS `tblbillingselected`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblbillingselected` (
  `tSeq` text,
  `customer` text,
  `transid` text,
  `orderdate` text,
  `deliverydate` text,
  `t_amount` text,
  `t_paidamount` text,
  `t_payable` text,
  `salesman` text,
  `operator` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbillingselected`
--

LOCK TABLES `tblbillingselected` WRITE;
/*!40000 ALTER TABLE `tblbillingselected` DISABLE KEYS */;
INSERT INTO `tblbillingselected` VALUES ('ï»¿tSeq','customer','transid','orderdate','deliverydate','t_amount','t_paidamount','t_payable','salesman','operator');
/*!40000 ALTER TABLE `tblbillingselected` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcategory` (
  `unitcode` text,
  `pname` text,
  `AmtSold` double DEFAULT NULL,
  `pft` double DEFAULT NULL,
  `temsold` double DEFAULT NULL,
  `tempft` double DEFAULT NULL,
  `prodn` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategory`
--

LOCK TABLES `tblcategory` WRITE;
/*!40000 ALTER TABLE `tblcategory` DISABLE KEYS */;
INSERT INTO `tblcategory` VALUES ('C001','OTHERS',0,0,0,0,''),('C002','PI STOCKS',0,0,0,0,''),('C003','SERVICES',0,0,0,0,''),('C004','GROCERIES',0,0,510,60,''),('C005','HARDWARE',0,0,0,0,''),('C006','FOOD',0,0,0,0,'');
/*!40000 ALTER TABLE `tblcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcconcern`
--

DROP TABLE IF EXISTS `tblcconcern`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcconcern` (
  `sqnum` int DEFAULT NULL,
  `branch` int DEFAULT NULL,
  `mm` text,
  `dd` text,
  `yyyy` int DEFAULT NULL,
  `time` text,
  `cusid` text,
  `cusname` text,
  `ctype` text,
  `CVIA` text,
  `RRMA` text,
  `intension` text,
  `addinfo` text,
  `message` text,
  `response` text,
  `status` text,
  `remarks` text,
  `techsales` text,
  `invnumber` text,
  `ratings` text,
  `comment` text,
  `staff` text,
  `dateComp` text,
  `dateAct` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcconcern`
--

LOCK TABLES `tblcconcern` WRITE;
/*!40000 ALTER TABLE `tblcconcern` DISABLE KEYS */;
INSERT INTO `tblcconcern` VALUES (1000002,101,'01','07',2022,'02:42 AM','C100001','SUKI','Supplier','Call','N','----','----','s','s','Pending','1','1','1','U','1','1 1. 1','01/07/2023','01/07/2023'),(1000003,101,'01','07',2023,'03:10 AM','C100001','SUKI','Customer','Call','N','Complain','Request','','','Pending','','','','U','','1 1. 1','01/07/2023','01/07/2023'),(1000004,101,'01','07',2023,'03:13 AM','C100003','HELO WORLD','Customer','Call','N','Complain','Under Warranty','','','Pending','','','','U','','1 1. 1','01/07/2023','01/07/2023'),(1000005,101,'01','07',2023,'03:36 AM','C100001','SUKI','Customer','Call','N','Tech Support','Under Warranty','','','Pending','','','','U','','1 1. 1','01/07/2023','01/07/2023'),(1000006,101,'01','07',2023,'04:30 AM','C100003','HELO WORLD','Customer','Call','N','Tech Support','Under Warranty','GUN UB LLC ANG LOCATION','','Pending','','','','U','','1 1. 1','01/07/2023','01/07/2023');
/*!40000 ALTER TABLE `tblcconcern` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcconcern_back`
--

DROP TABLE IF EXISTS `tblcconcern_back`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcconcern_back` (
  `sqnum` int DEFAULT NULL,
  `cusid` text,
  `cusname` text,
  `ctype` text,
  `intension` text,
  `addinfo` text,
  `message` text,
  `response` text,
  `status` text,
  `remarks` text,
  `techsales` text,
  `invnumber` text,
  `ratings` text,
  `comment` text,
  `staff` text,
  `dateComp` text,
  `dateAct` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcconcern_back`
--

LOCK TABLES `tblcconcern_back` WRITE;
/*!40000 ALTER TABLE `tblcconcern_back` DISABLE KEYS */;
INSERT INTO `tblcconcern_back` VALUES (1000001,'01773','JENNIFE MORANTE','Customer','Complain','Under Warranty','hdd problem low health','','On Going','','','','U','','DARWIN','09/04/2018','09/04/2018'),(1000002,'01778','CARLITO S. GUMIA','Customer','Complain','Under Warranty','dota problem mo error while nag update','','Ok / Solved','','john gil castro','','U','','DARWIN','09/04/2018','09/04/2018'),(1000003,'01351','JOSELITO MAHINAY','Customer','Complain','Under Warranty','mo kalit lag shutdown','','Ok / Solved','','roel inso','','U','','C Admin','09/04/2018','09/04/2018'),(1000004,'00852','RECHABELLE ROJAS','Customer','Complain','Request','ang duha ka unit di mo sulod sa windows, (windows failed to start a recent hardware or software change might be the cause)\nang isa pod ka unit ilisanan ug power supply, warranty pa.','','Pending','','','','U','','C Admin','09/05/2018','09/05/2018'),(1000005,'00836','JEROME Y. CABASAN','Customer','Complain','Under Warranty','biostar ang display,\n','wednesday morning','Pending','','','','U','','C Admin','09/05/2018','09/05/2018'),(1000006,'01662','MA. MARGOX CHEER Q. LEONARDO','Customer','Complain','Tech Support','log,, daw kaayo\npc1-4','','Pending','','','','U','','DARWIN','09/05/2018','09/05/2018');
/*!40000 ALTER TABLE `tblcconcern_back` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomer`
--

DROP TABLE IF EXISTS `tblcustomer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcustomer` (
  `cseq` int DEFAULT NULL,
  `cusid` text,
  `idnum` text,
  `barcode` int DEFAULT NULL,
  `name` text,
  `tlspent` int DEFAULT NULL,
  `address` text,
  `TIN` text,
  `person` text,
  `contact` text,
  `tdesc` text,
  `terms` text,
  `note` text,
  `type` int DEFAULT NULL,
  `dateregister` text,
  `tlpoints` int DEFAULT NULL,
  `widrawnpnt` int DEFAULT NULL,
  `lastvisit` text,
  `tltrans` int DEFAULT NULL,
  `tlpftg` text,
  `temsold` text,
  `tempft` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomer`
--

LOCK TABLES `tblcustomer` WRITE;
/*!40000 ALTER TABLE `tblcustomer` DISABLE KEYS */;
INSERT INTO `tblcustomer` VALUES (115,'C100000','C100000',100000,'WALK-IN',1,'PH','#','#','#','ONSPOT','CASH','#',1,'10/6/2023 6:06:54 PM',1,0,'10/6/2023 6:06:54 PM',1,'','','');
/*!40000 ALTER TABLE `tblcustomer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldefectform`
--

DROP TABLE IF EXISTS `tbldefectform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldefectform` (
  `transno` int DEFAULT NULL,
  `INSDate` text,
  `dateenc` text,
  `rrno` int DEFAULT NULL,
  `suppliercode` text,
  `pqty` int DEFAULT NULL,
  `punit` text,
  `sqty` int DEFAULT NULL,
  `itemcode` int DEFAULT NULL,
  `bcode` int DEFAULT NULL,
  `desc` text,
  `sunit` text,
  `cost` int DEFAULT NULL,
  `markup` double DEFAULT NULL,
  `munit` text,
  `selling` double DEFAULT NULL,
  `Totalselling` double DEFAULT NULL,
  `totalcostamount` int DEFAULT NULL,
  `complete` int DEFAULT NULL,
  `Cashier_ID` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldefectform`
--

LOCK TABLES `tbldefectform` WRITE;
/*!40000 ALTER TABLE `tbldefectform` DISABLE KEYS */;
INSERT INTO `tbldefectform` VALUES (14340,'032119','03/21/2019',11111899,'',10,'PCS',10,1111111,1111111,'RED HORSE 1000ML','PCS',68,85,'Amt',85,850,680,1,'CRIS'),(14341,'032119','03/21/2019',11111899,'',10,'PCS',10,1111113,1111113,'KUTSARA','PCS',34,40.8,'Amt',40.8,408,340,1,'CRIS'),(14342,'032119','03/21/2019',11111899,'',10,'PCS',10,1111112,1111112,'BASO','PCS',60,72,'Amt',72,720,600,1,'CRIS'),(14343,'032119','03/21/2019',11111899,'',6,'PCS',20,1111111,1111111,'RED HORSE 1000ML','PCS',68,85,'Amt',85,1700,1360,1,'CRIS'),(14344,'032119','03/21/2019',11111899,'',67,'PCS',232,1111113,1111113,'KUTSARA','PCS',34,40.8,'Amt',40.8,9465.6,7888,1,'CRIS'),(14345,'032119','03/21/2019',11111899,'',2,'PCS',3,1111113,1111113,'KUTSARA','PCS',34,40.8,'Amt',40.8,122.4,102,1,'CRIS');
/*!40000 ALTER TABLE `tbldefectform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldefectives`
--

DROP TABLE IF EXISTS `tbldefectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldefectives` (
  `transno` text,
  `StckInRegNo` text,
  `endate` text,
  `drdate` text,
  `rrno` text,
  `itemcode` text,
  `products` text,
  `serialno` text,
  `Cost` text,
  `rmarkup` text,
  `rmt` text,
  `SellPrice` text,
  `Wmarkup` text,
  `wmt` text,
  `wsale` text,
  `status` text,
  `sdate` text,
  `supplier` text,
  `customer` text,
  `Receiptnum` text,
  `soldprice` text,
  `remarks` text,
  `Cashier_ID` text,
  `P_Unit` text,
  `warranty` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldefectives`
--

LOCK TABLES `tbldefectives` WRITE;
/*!40000 ALTER TABLE `tbldefectives` DISABLE KEYS */;
INSERT INTO `tbldefectives` VALUES ('transno','StckInRegNo','endate','drdate','rrno','itemcode','products','serialno','Cost','rmarkup','rmt','SellPrice','Wmarkup','wmt','wsale','status','sdate','supplier','customer','Receiptnum','soldprice','remarks','Cashier_ID','P_Unit','warranty');
/*!40000 ALTER TABLE `tbldefectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldefecttranslist`
--

DROP TABLE IF EXISTS `tbldefecttranslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldefecttranslist` (
  `transno` text,
  `rrno` text,
  `rdate` text,
  `drno` text,
  `drdate` text,
  `supplier` text,
  `totalamount` text,
  `remark` text,
  `AS1` text,
  `BS2` text,
  `CS3` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldefecttranslist`
--

LOCK TABLES `tbldefecttranslist` WRITE;
/*!40000 ALTER TABLE `tbldefecttranslist` DISABLE KEYS */;
INSERT INTO `tbldefecttranslist` VALUES ('transno','rrno','rdate','drno','drdate','supplier','totalamount','remark','AS1','BS2','CS3');
/*!40000 ALTER TABLE `tbldefecttranslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldiscounts`
--

DROP TABLE IF EXISTS `tbldiscounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldiscounts` (
  `unitcode` text,
  `pname` text,
  `value` int DEFAULT NULL,
  `type` text,
  `applyto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldiscounts`
--

LOCK TABLES `tbldiscounts` WRITE;
/*!40000 ALTER TABLE `tbldiscounts` DISABLE KEYS */;
INSERT INTO `tbldiscounts` VALUES ('D01','SENIOR',20,'%','ALL'),('D02','PWD',10,'%','ALL'),('D03','WHOLESALE',5,'%','ALL'),('D04','SUKI',20,'AMT','ALL'),('D05','SUBSIDY',33,'AMT','ALL');
/*!40000 ALTER TABLE `tbldiscounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbleditdeletedlogs`
--

DROP TABLE IF EXISTS `tbleditdeletedlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbleditdeletedlogs` (
  `Auto` int DEFAULT NULL,
  `DateAct` text,
  `TimeAct` text,
  `FormDone` text,
  `ActionDetails` text,
  `RecordsOf` text,
  `Person` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbleditdeletedlogs`
--

LOCK TABLES `tbleditdeletedlogs` WRITE;
/*!40000 ALTER TABLE `tbleditdeletedlogs` DISABLE KEYS */;
INSERT INTO `tbleditdeletedlogs` VALUES (1,'11/07/2023','9:06:19 AM','Sales','Change/Edit Customer','Trans# : 0000001 From C100005 to ROSEMAR CO.','AD1001 | 1 1. 1'),(2,'11/07/2023','9:07:23 AM','Sales','Change/Edit Salesman','Trans# : 0000001 From CA1003 to CA1002','AD1001 | 1 1. 1'),(3,'11/07/2023','9:44:22 AM','Sales','Change/Edit Table/Site','Trans# : 0000001 From T000 to T002 COTTAGE 1','AD1001 | 1 1. 1'),(4,'11/07/2023','9:46:42 AM','Sales','Change/Edit Table/Site','Trans# : 0000001 From T002 to T001 TABLE 1','AD1001 | 1 1. 1'),(5,'11/16/2023','1:53:07 AM','Sales','Change/Edit Customer','Trans# : 0000057 From C100004 to C100003 COLONADE MALL','AD1001 | 1 1. 1'),(6,'11/16/2023','1:53:18 AM','Sales','Change/Edit Customer','Trans# : 0000057 From C100003 to C100003 COLONADE MALL','AD1001 | 1 1. 1'),(7,'11/18/2023','12:55:39 PM','Sales','Cancel and Refund','Trans# : 0000140C100000 WALK-IN','AD1001 | 1 1. 1'),(8,'11/19/2023','12:36:33 PM','Sales','Cancel and Refund','Trans# : 0000002C100000 WALK-IN','AD1001 | 1 1. 1'),(9,'11/22/2023','6:00:04 PM','Sales','Cancel and Refund','Trans# : 0000002C100000 WALK-IN','AD1001 | 1 1. 1'),(10,'11/24/2023','11:02:18 AM','Data Deletion && Repair Snippet','Delete 1 exact Trans # 0000003','System','AD1001 | 1 1. 1');
/*!40000 ALTER TABLE `tbleditdeletedlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblexpense`
--

DROP TABLE IF EXISTS `tblexpense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblexpense` (
  `SeQ` text,
  `tid` text,
  `operator` text,
  `lblExTransNo` text,
  `txtamountR` text,
  `cboPurpose` text,
  `txtFundReceiver` text,
  `txtrequester` text,
  `txtapprovedby` text,
  `txExDesc` text,
  `txtPurOrAmt` text,
  `txtfareShipping` text,
  `txtOtherExp` text,
  `txtRecievedBy` text,
  `txtInspectedBy` text,
  `lblActualTotalAmt` text,
  `txtORno` text,
  `txtSupplier` text,
  `txtReceivedRemarks` text,
  `mm` text,
  `dd` text,
  `yyyy` text,
  `ttime` text,
  `ww` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblexpense`
--

LOCK TABLES `tblexpense` WRITE;
/*!40000 ALTER TABLE `tblexpense` DISABLE KEYS */;
INSERT INTO `tblexpense` VALUES ('SeQ','tid','operator','lblExTransNo','txtamountR','cboPurpose','txtFundReceiver','txtrequester','txtapprovedby','txExDesc','txtPurOrAmt','txtfareShipping','txtOtherExp','txtRecievedBy','txtInspectedBy','lblActualTotalAmt','txtORno','txtSupplier','txtReceivedRemarks','mm','dd','yyyy','ttime','ww');
/*!40000 ALTER TABLE `tblexpense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpaymentlogs`
--

DROP TABLE IF EXISTS `tblpaymentlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpaymentlogs` (
  `Transno` int DEFAULT NULL,
  `x1` int DEFAULT NULL,
  `r1` int DEFAULT NULL,
  `Transid` text,
  `TID` int DEFAULT NULL,
  `SalesMan` text,
  `pcnterminal` text,
  `cusidt` text,
  `cusname` text,
  `paidamount` int DEFAULT NULL,
  `PaymentMode` text,
  `PaymentDESC` text,
  `mm` int DEFAULT NULL,
  `dd` int DEFAULT NULL,
  `yyyy` int DEFAULT NULL,
  `WW` int DEFAULT NULL,
  `dtrg` int DEFAULT NULL,
  `time` text,
  `cashier` text,
  `readsq` text,
  `payreceiver` text,
  `SaleCounted` int DEFAULT NULL,
  `tendered` int DEFAULT NULL,
  `transtype` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpaymentlogs`
--

LOCK TABLES `tblpaymentlogs` WRITE;
/*!40000 ALTER TABLE `tblpaymentlogs` DISABLE KEYS */;
INSERT INTO `tblpaymentlogs` VALUES (394,0,0,'0000001',101,'NO1000','DESKTOP-H3M02A3','C100000','WALK-IN',3100,'CASH','ONSPOT',11,23,2023,47,112323,'11:18:47 AM','AD1001','N','AD1001',1,3100,'SALES'),(395,0,0,'0000004',101,'NO1000','DESKTOP-U0VFTFO','C100000','WALK-IN',80,'CASH','ONSPOT',11,24,2023,47,112423,'10:54:33 AM','AD1001','N','AD1001',1,80,'SALES'),(396,0,0,'0000005',101,'NO1000','DESKTOP-U0VFTFO','C100000','WALK-IN',80,'CASH','ONSPOT',11,24,2023,47,112423,'10:57:54 AM','AD1001','N','AD1001',1,80,'SALES'),(397,0,0,'0000006',101,'NO1000','DESKTOP-U0VFTFO','C100000','WALK-IN',25,'CASH','ONSPOT',11,24,2023,47,112423,'11:00:18 AM','AD1001','N','AD1001',1,25,'SALES'),(398,0,0,'0000007',101,'NO1000','DESKTOP-U0VFTFO','C100000','WALK-IN',325,'CASH','ONSPOT',11,24,2023,47,112423,'11:07:35 AM','AD1001','N','AD1001',1,325,'SALES'),(399,0,0,'0000008',101,'NO1000','DESKTOP-U0VFTFO','C100000','WALK-IN',25,'CASH','ONSPOT',11,24,2023,47,112423,'11:14:13 AM','AD1001','N','AD1001',1,25,'SALES'),(400,0,0,'0000009',101,'NO1000','DESKTOP-U0VFTFO','C100000','WALK-IN',25,'BANK2BANK','1224556',11,24,2023,47,112423,'11:15:25 AM','AD1001','N','AD1001',1,30,'SALES'),(401,0,0,'0000011',101,'NO1000','DESKTOP-536IVOG','C100000','WALK-IN',703,'CASH','ONSPOT',1,5,2024,1,10524,'11:09:53 PM','AD1001','N','AD1001',1,1000,'SALES');
/*!40000 ALTER TABLE `tblpaymentlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpaytype`
--

DROP TABLE IF EXISTS `tblpaytype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpaytype` (
  `seq` int DEFAULT NULL,
  `unitcode` text,
  `pname` text,
  `tlamt` text,
  `temamt` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpaytype`
--

LOCK TABLES `tblpaytype` WRITE;
/*!40000 ALTER TABLE `tblpaytype` DISABLE KEYS */;
INSERT INTO `tblpaytype` VALUES (17,'P001','CASH','',0),(18,'P002','GCASH','',0),(19,'P003','BANK2BANK','',0),(20,'P004','CHECK','',0);
/*!40000 ALTER TABLE `tblpaytype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpaytypedesc`
--

DROP TABLE IF EXISTS `tblpaytypedesc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpaytypedesc` (
  `unitcode` text,
  `pname` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpaytypedesc`
--

LOCK TABLES `tblpaytypedesc` WRITE;
/*!40000 ALTER TABLE `tblpaytypedesc` DISABLE KEYS */;
INSERT INTO `tblpaytypedesc` VALUES ('D001','ONSPOT'),('D002','BDO'),('D003','LBC'),('D004','30 DAYS');
/*!40000 ALTER TABLE `tblpaytypedesc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpricedefault`
--

DROP TABLE IF EXISTS `tblpricedefault`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpricedefault` (
  `pSeq` int DEFAULT NULL,
  `retail` int DEFAULT NULL,
  `wsale` int DEFAULT NULL,
  `promo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpricedefault`
--

LOCK TABLES `tblpricedefault` WRITE;
/*!40000 ALTER TABLE `tblpricedefault` DISABLE KEYS */;
INSERT INTO `tblpricedefault` VALUES (21,30,20,10);
/*!40000 ALTER TABLE `tblpricedefault` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprodbcodealign`
--

DROP TABLE IF EXISTS `tblprodbcodealign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblprodbcodealign` (
  `DefaultChoice` int DEFAULT NULL,
  `Title` text,
  `Left` int DEFAULT NULL,
  `Right` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprodbcodealign`
--

LOCK TABLES `tblprodbcodealign` WRITE;
/*!40000 ALTER TABLE `tblprodbcodealign` DISABLE KEYS */;
INSERT INTO `tblprodbcodealign` VALUES (2,'JAS AGRIVET',0,0);
/*!40000 ALTER TABLE `tblprodbcodealign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproduct` (
  `No` int DEFAULT NULL,
  `r1` int DEFAULT NULL,
  `del` int DEFAULT NULL,
  `pcode` text,
  `bcode` text,
  `pname` text,
  `p_unit` text,
  `category` text,
  `subCategory` text,
  `sellerConc` text,
  `WARRANTY` text,
  `cost` int DEFAULT NULL,
  `rmarkup` int DEFAULT NULL,
  `rmt` text,
  `sellprice` int DEFAULT NULL,
  `wmarkup` int DEFAULT NULL,
  `wmt` text,
  `wprice` int DEFAULT NULL,
  `pmarkup` int DEFAULT NULL,
  `pmt` text,
  `pprice` int DEFAULT NULL,
  `pft` int DEFAULT NULL,
  `st_amt` int DEFAULT NULL,
  `ptype` text,
  `clevel` int DEFAULT NULL,
  `s_in` int DEFAULT NULL,
  `s_sold` int DEFAULT NULL,
  `inv_out` int DEFAULT NULL,
  `s_avail` int DEFAULT NULL,
  `sLavl` int DEFAULT NULL,
  `InvenDate` int DEFAULT NULL,
  `reorder` int DEFAULT NULL,
  `dateregister` text,
  `WQT1` int DEFAULT NULL,
  `WQT2` int DEFAULT NULL,
  `WQT3` int DEFAULT NULL,
  `WP1` int DEFAULT NULL,
  `WP2` int DEFAULT NULL,
  `WP3` int DEFAULT NULL,
  `PQ1` int DEFAULT NULL,
  `PQ2` int DEFAULT NULL,
  `PQ3` int DEFAULT NULL,
  `PP1` int DEFAULT NULL,
  `PP2` int DEFAULT NULL,
  `PP3` int DEFAULT NULL,
  `tmpsq` int DEFAULT NULL,
  `rctvisible` int DEFAULT NULL,
  `invAble` int DEFAULT NULL,
  `qpick` int DEFAULT NULL,
  `qsort` int DEFAULT NULL,
  `mavl` int DEFAULT NULL,
  `supp` text,
  `o2prep` int DEFAULT NULL,
  `orels` int DEFAULT NULL,
  `binv` int DEFAULT NULL,
  `einv` int DEFAULT NULL,
  `ssale` int DEFAULT NULL,
  `ssin` int DEFAULT NULL,
  `ssout` int DEFAULT NULL,
  `lodcounter` int DEFAULT NULL,
  `chkIncPack` int DEFAULT NULL,
  `ckLoadCounter` int DEFAULT NULL,
  `chkorlsvisible` int DEFAULT NULL,
  `xport` text,
  `xport1` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproduct`
--

LOCK TABLES `tblproduct` WRITE;
/*!40000 ALTER TABLE `tblproduct` DISABLE KEYS */;
INSERT INTO `tblproduct` VALUES (91901,0,0,'000000','000000','SERVICES CHARGE','-','SERVICES','-','S001','N/A',0,0,'0',0,0,'0',0,0,'0',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-22-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91902,0,0,'000001','000001','INTEGRATED STREET LAMP 100W','PCS','SOLAR LAMPS','-','S001','N/A',0,-100,'%',0,-100,'%',0,-100,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91903,0,0,'000002','000002','RICE 1KL','KLS','GROCERIES','-','S001','N/A',50,10,'%',55,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91904,0,0,'000003','000003','NATURES SPRING 500ML','PCS','GROCERIES','-','S001','N/A',20,25,'%',25,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91905,0,0,'000004','000004','BURGER DELIGHT','PCS','FOOD','-','S001','N/A',40,25,'%',50,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91906,0,0,'000005','000005','CHEESE BURGER','PCS','FOOD','-','S001','N/A',20,50,'%',30,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91907,0,0,'000006','000006','CHEESE HOTDOG','PCS','FOOD','-','S001','N/A',30,33,'%',40,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91908,0,0,'000007','000007','DOUBLE BURGER','PCS','FOOD','-','S001','N/A',140,7,'%',150,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91909,0,0,'000008','000008','FOOT LONG','PCS','FOOD','-','S001','N/A',70,14,'%',80,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91910,0,0,'000009','000009','HOT DOG DELIGHT','PCS','FOOD','-','S001','N/A',60,33,'%',80,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91911,0,0,'000010','000010','CHEESE HOTDOG DELIGHT','PCS','FOOD','-','S001','N/A',130,8,'%',140,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,1,0,0,1,1,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91912,0,0,'000011','000011','TAPA EXPRESS','PCS','FOOD','-','S001','N/A',110,5,'%',115,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-23-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91913,0,0,'000012','000012','HOTDOG EXPRESS','PCS','FOOD','-','S001','N/A',80,13,'%',90,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91914,0,0,'000013','000013','LANCHEON MEAT EXPRESS','PCS','FOOD','-','S001','N/A',115,4,'%',120,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91915,0,0,'000014','000014','PAN CAKE','PCS','FOOD','-','S001','N/A',30,33,'%',40,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91916,0,0,'000015','000015','MIRINDA','PCS','DRINKS','-','S001','N/A',15,20,'%',18,0,'%',15,0,'%',15,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91917,0,0,'000016','000016','PEPSI 8OZ','PCS','DRINKS','-','S001','N/A',15,20,'%',18,0,'%',15,0,'%',15,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91918,0,0,'000017','000017','PEPSI 12OZ','PCS','DRINKS','-','S001','N/A',50,20,'%',60,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91919,0,0,'000018','000018','STING','PCS','DRINKS','-','S001','N/A',20,50,'%',30,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'11-24-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91920,0,0,'000019','000019','RED VELVET MOCHA','PCS','GROCERIES','-','S001','N/A',0,-100,'%',80,-100,'%',0,-100,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'12-11-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91921,0,0,'000020','000020','COOKIES AND CREAM MILKTEA MEDIUM','PCS','GROCERIES','-','S001','N/A',0,-100,'%',80,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'12-11-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91922,0,0,'000021','000021','ROYAL','PCS','GROCERIES','-','S001','N/A',0,-100,'%',20,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'12-11-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91923,0,0,'000022','000022','AMERICANO COFFEE 120Z','PCS','GROCERIES','-','S001','N/A',0,-100,'%',90,-100,'%',0,-100,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'12-11-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'',''),(91924,0,0,'000023','000023','MOCHA COFFEE 120Z','PCS','GROCERIES','-','S001','N/A',0,-100,'%',95,0,'%',0,0,'%',0,0,0,'NO SERIAL',0,0,0,0,0,0,0,0,'12-11-2023',0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,50,1,'-',0,0,0,0,0,0,0,0,0,0,1,'','');
/*!40000 ALTER TABLE `tblproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprodzpack`
--

DROP TABLE IF EXISTS `tblprodzpack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblprodzpack` (
  `auto` text,
  `del` text,
  `pcode` text,
  `bcode` text,
  `pname` text,
  `price` text,
  `T1` text,
  `T2` text,
  `T3` text,
  `T4` text,
  `T5` text,
  `T6` text,
  `T7` text,
  `T8` text,
  `T9` text,
  `T10` text,
  `T11` text,
  `T12` text,
  `L1` text,
  `L2` text,
  `L3` text,
  `L4` text,
  `L5` text,
  `L6` text,
  `L7` text,
  `L8` text,
  `L9` text,
  `L10` text,
  `L11` text,
  `L12` text,
  `dateregister` text,
  `Q1` text,
  `Q2` text,
  `Q3` text,
  `Q4` text,
  `Q5` text,
  `Q6` text,
  `Q7` text,
  `Q8` text,
  `Q9` text,
  `Q10` text,
  `Q11` text,
  `Q12` text,
  `v1` text,
  `v2` text,
  `v3` text,
  `v4` text,
  `v5` text,
  `v6` text,
  `v7` text,
  `v8` text,
  `v9` text,
  `v10` text,
  `v11` text,
  `v12` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `o5` text,
  `o6` text,
  `o7` text,
  `o8` text,
  `o9` text,
  `o10` text,
  `o11` text,
  `o12` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprodzpack`
--

LOCK TABLES `tblprodzpack` WRITE;
/*!40000 ALTER TABLE `tblprodzpack` DISABLE KEYS */;
INSERT INTO `tblprodzpack` VALUES ('auto','del','pcode','bcode','pname','price','T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12','L1','L2','L3','L4','L5','L6','L7','L8','L9','L10','L11','L12','dateregister','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11','Q12','v1','v2','v3','v4','v5','v6','v7','v8','v9','v10','v11','v12','o1','o2','o3','o4','o5','o6','o7','o8','o9','o10','o11','o12');
/*!40000 ALTER TABLE `tblprodzpack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblreading`
--

DROP TABLE IF EXISTS `tblreading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblreading` (
  `nos` int DEFAULT NULL,
  `CdateStart` text,
  `cpreviouscash` int DEFAULT NULL,
  `cashinitial` int DEFAULT NULL,
  `startcash` int DEFAULT NULL,
  `tlendcash` int DEFAULT NULL,
  `DateEndRead` int DEFAULT NULL,
  `TerminalIDstart` int DEFAULT NULL,
  `terminalIDread` text,
  `CashierSales` int DEFAULT NULL,
  `RcvCashAmt` int DEFAULT NULL,
  `GRevenue` int DEFAULT NULL,
  `Cashier` text,
  `OIC` text,
  `ReadSQ` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblreading`
--

LOCK TABLES `tblreading` WRITE;
/*!40000 ALTER TABLE `tblreading` DISABLE KEYS */;
INSERT INTO `tblreading` VALUES (35,'11/23/2023 11:13:51 AM',0,0,0,0,0,101,'-',0,0,0,'AD1001','lblOIC',0);
/*!40000 ALTER TABLE `tblreading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblresetdatabase`
--

DROP TABLE IF EXISTS `tblresetdatabase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblresetdatabase` (
  `MyUnknownColumn` text,
  `esc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblresetdatabase`
--

LOCK TABLES `tblresetdatabase` WRITE;
/*!40000 ALTER TABLE `tblresetdatabase` DISABLE KEYS */;
INSERT INTO `tblresetdatabase` VALUES ('RETURNS  is resette',' by:  CHRISTOPHER  on  5/1/2019 10:07:04 PM'),('All Entry  is resette',' by:  CHRISTOPHER  on  5/1/2019 @ 10:07:08 PM'),('All Entry  is resette',' by:  1  on  3/5/2020 @ 4:11:51 AM'),('All Entry  is resette',' by:  1  on  3/22/2020 @ 7:26:50 AM'),('Stock In  is resette',' by:  1  on  3/22/2020 7:26:53 AM'),('All Entry  is resette',' by:  1  on  3/22/2020 @ 7:26:57 AM'),('All Entry  is resette',' by:  1  on  4/5/2020 @ 6:26:08 AM'),('All Entry  is resette',' by:  1  on  4/28/2020 @ 8:44:11 PM'),('All Entry  is resette',' by:  1  on  4/28/2020 @ 9:35:38 PM'),('All Entry  is resette',' by:  1  on  4/29/2020 @ 3:57:53 PM'),('All Entry  is resette',' by:  1  on  5/3/2020 @ 4:28:17 PM'),('All Entry  is resette',' by:  1  on  5/5/2020 @ 2:45:11 AM'),('All Entry  is resette',' by:  1  on  5/9/2020 @ 10:24:18 PM'),('All Entry  is resette',' by:  1  on  5/9/2020 @ 10:28:58 PM'),('All Entry  is resette',' by:  1  on  5/9/2020 @ 11:53:09 PM'),('All Entry  is resette',' by:  1  on  5/12/2020 @ 2:42:31 AM'),('All Entry  is resette',' by:  1  on  5/12/2020 @ 2:49:02 AM'),('Stock In  is resette',' by:  1  on  9/7/2020 7:30:18 PM'),('Pro','ucts w/ Serials  is resette'),('All Entry  is resette',' by:  1  on  9/7/2020 @ 7:30:26 PM'),('All Entry  is resette',' by:  1  on  3/7/2021 @ 3:35:12 AM'),('All Entry  is resette',' by:  1  on  3/7/2021 @ 3:42:43 AM'),('All Entry  is resette',' by:  1  on  3/7/2021 @ 3:48:43 AM'),('All Entry  is resette',' by:  1  on  3/8/2021 @ 7:53:55 AM'),('All Entry  is resette',' by:  1  on  3/8/2021 @ 8:00:26 AM'),('All Entry  is resette',' by:  1  on  3/8/2021 @ 8:37:52 AM'),('All Entry  is resette',' by:  1  on  3/8/2021 @ 9:00:18 AM'),('Stock In  is resette',' by:  1 1. 1  on  12/29/2021 2:09:17 AM'),('Items Pro','ucts  is resette'),('Pro','ucts w/ Serials  is resette'),('C&ontacts  is resette',' by:  1 1. 1  on  12/29/2021 2:09:30 AM'),('CUSTOMER  is resette',' by:  1 1. 1  on  12/29/2021 2:09:33 AM'),('RETURNS  is resette',' by:  1 1. 1  on  12/29/2021 2:09:34 AM'),('All Entry  is resette',' by:  1 1. 1  on  12/29/2021 @ 2:09:37 AM'),('Items Pro','ucts  is resette'),('Items Pro','ucts  is resette'),('Items Pro','ucts  is resette'),('Pro','ucts w/ Serials  is resette'),('Items Pro','ucts  is resette'),('Items Pro','ucts  is resette'),('C&ontacts  is resette',' by:  1 1. 1  on  12/29/2021 2:59:39 AM'),('All Entry  is resette',' by:  CRIS B. BALC  on  4/17/2022 @ 2:38:25 AM'),('All Entry  is resette',' by:  CRIS B. BALC  on  4/17/2022 @ 3:50:36 AM'),('All Entry  is resette',' by:  CRIS B. BALC  on  4/17/2022 @ 9:33:17 PM'),('All Entry  is resette',' by:  CRIS B. BALC  on  4/17/2022 @ 9:33:26 PM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/13/2022 @ 2:16:18 PM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/16/2022 @ 4:33:08 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/22/2022 @ 6:34:35 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/22/2022 @ 6:38:01 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/23/2022 @ 3:06:31 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/25/2022 @ 6:51:05 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/25/2022 @ 7:36:31 PM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/25/2022 @ 7:36:35 PM'),('Stock In  is resette',' by:  1  on  4/11/2020 9:55:58 AM'),('All Entry  is resette',' by:  1  on  4/26/2020 @ 9:47:37 AM'),('All Entry  is resette',' by:  1  on  4/26/2020 @ 10:33:29 AM'),('All Entry  is resette',' by:  1  on  4/26/2020 @ 11:05:09 AM'),('All Entry  is resette',' by:  1  on  4/26/2020 @ 12:06:39 PM'),('All Entry  is resette',' by:  1  on  4/26/2020 @ 1:05:59 PM'),('All Entry  is resette',' by:  1  on  4/26/2020 @ 1:22:21 PM'),('All Entry  is resette',' by:  C A'),('STOCK IN  is resette',' by:  C A'),('All Entry  is resette',' by:  C A'),('All Entry  is resette',' by:  C A'),('All Entry  is resette',' by:  C A'),('All Entry  is resette',' by:  C A'),('All Entry  is resette',' by:  C A'),('All Entry  is resette',' by:  C A'),('ITEMS  is resette',' by:  CRIS  on  02/23/2019 2:00:47 PM'),('STOCK IN  is resette',' by:  CRIS  on  02/24/2019 3:52:36 PM'),('All Entry  is resette',' by:  CRIS  on  02/24/2019 @ 3:52:51 PM'),('All Entry  is resette',' by:  CRIS  on  02/24/2019 @ 3:53:01 PM'),('C&ontacts  is resette',' by:  CRIS  on  02/28/2019 8:47:33 AM'),('Stock In  is resette',' by:  CRIS  on  3/19/2019 1:21:01 AM'),('All Entry  is resette',' by:  CRIS  on  3/19/2019 @ 1:21:06 AM'),('Items Pro','ucts  is resette'),('Pro','ucts w/ Serials  is resette'),('Stock In  is resette',' by:  CRIS  on  3/21/2019 12:07:17 AM'),('All Entry  is resette',' by:  CRIS  on  3/21/2019 @ 12:07:42 AM'),('All Entry  is resette',' by:  CRIS  on  3/21/2019 @ 12:07:47 AM'),('Pro','ucts w/ Serials  is resette'),('All Entry  is resette',' by:  CRIS  on  4/4/2019 @ 5:17:36 PM'),('Stock In  is resette',' by:  CRIS  on  4/4/2019 5:17:37 PM'),('Items Pro','ucts  is resette'),('Pro','ucts w/ Serials  is resette'),('C&ontacts  is resette',' by:  CRIS  on  4/4/2019 5:17:42 PM'),('CUSTOMER  is resette',' by:  CRIS  on  4/4/2019 5:17:47 PM'),('RETURNS  is resette',' by:  CRIS  on  4/4/2019 5:17:48 PM'),('All Entry  is resette',' by:  CRIS  on  4/4/2019 @ 5:17:50 PM'),('C&ontacts  is resette',' by:  CRIS  on  4/4/2019 11:52:41 PM'),('Items Pro','ucts  is resette'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/21/2019 @ 4:49:43 AM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/21/2019 @ 4:49:48 AM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/19/2019 @ 9:02:32 PM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/19/2019 @ 11:26:10 PM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/19/2019 @ 11:26:14 PM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/20/2019 @ 3:58:25 AM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/20/2019 @ 3:58:26 AM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/20/2019 @ 5:06:30 AM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/20/2019 @ 5:33:30 AM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/20/2019 @ 5:41:32 AM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/23/2019 @ 6:08:26 AM'),('All Entry  is resette',' by:  CHRISTOPHER  on  4/23/2019 @ 6:42:54 AM'),('Stock In  is resette',' by:  CHRISTOPHER  on  5/1/2019 10:06:53 PM'),('Pro','ucts w/ Serials  is resette'),('C&ontacts  is resette',' by:  CHRISTOPHER  on  5/1/2019 10:07:00 PM'),('CUSTOMER  is resette',' by:  CHRISTOPHER  on  5/1/2019 10:07:03 PM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/25/2022 @ 8:32:00 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/26/2022 @ 2:10:16 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/26/2022 @ 3:02:58 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  5/27/2022 @ 5:50:22 PM'),('All Sales Entry  is resette',' by:  User Name  on  5/29/2022 @ 7:52:22 PM'),('All Sales Entry  is resette',' by:  User Name  on  6/2/2022 @ 5:08:17 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  6/7/2022 @ 5:42:58 PM'),('All Sales Entry  is resette',' by:  User Name  on  6/8/2022 @ 4:18:13 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  6/8/2022 @ 10:36:01 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  6/15/2022 @ 11:50:28 AM'),('All Sales Entry  is resette',' by:  User Name  on  6/29/2022 @ 11:20:59 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  7/1/2022 @ 6:52:37 AM'),('All Sales Entry  is resette',' by:  User Name  on  7/8/2022 @ 10:34:16 AM'),('All Sales Entry  is resette',' by:  User Name  on  7/16/2022 @ 7:19:51 AM'),('All Sales Entry  is resette',' by:  User Name  on  7/21/2022 @ 4:16:40 AM'),('All Sales Entry  is resette',' by:  User Name  on  7/24/2022 @ 7:44:30 PM'),('All Sales Entry  is resette',' by:  User Name  on  7/30/2022 @ 1:18:42 AM'),('All Sales Entry  is resette',' by:  User Name  on  7/30/2022 @ 2:00:14 AM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/5/2022 @ 1:43:29 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  8/5/2022 @ 1:56:51 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/7/2022 @ 1:32:23 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/7/2022 @ 2:59:33 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/7/2022 @ 3:13:47 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/7/2022 @ 3:27:05 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/7/2022 @ 3:32:37 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/7/2022 @ 4:27:47 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/7/2022 @ 4:27:49 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/8/2022 @ 2:35:14 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  8/8/2022 @ 6:25:59 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/8/2022 @ 9:42:01 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/9/2022 @ 12:53:31 AM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/9/2022 @ 2:07:00 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  8/9/2022 @ 8:00:01 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/10/2022 @ 9:49:08 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/12/2022 @ 3:38:49 AM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  8/16/2022 @ 2:22:56 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/18/2022 @ 4:23:31 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/19/2022 @ 4:27:09 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  8/19/2022 @ 11:41:47 PM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  8/29/2022 @ 12:42:48 PM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  8/29/2022 @ 1:10:50 PM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  8/29/2022 @ 9:56:46 PM'),('All Sales Entry  is resette',' by:  CRIS B. BALC  on  9/5/2022 @ 10:36:43 AM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  9/20/2022 @ 12:25:49 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/4/2022 @ 11:39:13 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/6/2022 @ 12:55:09 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/6/2022 @ 3:18:30 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/6/2022 @ 6:47:52 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/7/2022 @ 7:07:40 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/8/2022 @ 7:20:59 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/8/2022 @ 7:43:18 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/8/2022 @ 7:49:20 AM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  10/12/2022 @ 10:38:03 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 1:30:11 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 1:31:24 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 1:37:49 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 2:59:47 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 3:22:38 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:17:24 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:22:51 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:22:55 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:23:11 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:29:35 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:30:06 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:31:30 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:31:50 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:34:26 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 4:52:49 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 5:19:21 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 5:45:22 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 5:47:56 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 5:49:53 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 5:50:01 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 5:50:14 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 5:55:16 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:21:55 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:22:02 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:22:44 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:22:55 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:25:18 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:26:29 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:28:38 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:29:53 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:30:53 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:32:07 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:34:23 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:36:11 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:37:57 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:39:45 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:39:58 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:40:12 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:43:55 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:44:29 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:44:41 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:46:56 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:48:08 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:48:42 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:51:11 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:53:57 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:54:23 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:54:40 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:56:34 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:56:43 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:57:13 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:59:17 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 6:59:28 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 7:01:45 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 7:01:56 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 7:02:15 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 7:02:33 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 7:10:08 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/15/2022 @ 7:11:53 AM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  10/16/2022 @ 4:05:38 AM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  10/16/2022 @ 4:05:43 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/17/2022 @ 10:50:05 AM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  10/20/2022 @ 11:32:15 AM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  10/23/2022 @ 2:55:50 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/23/2022 @ 4:23:25 PM'),('All Sales Entry  is resette',' by:  NO CASHIER  on  10/26/2022 @ 5:20:07 AM'),('All Sales Entry  is resette',' by:  ADMIN  on  10/26/2022 @ 5:25:03 AM'),('Transaction Re-','ate  is '),('Transaction Re-','ate  is '),('Transaction Re-','ate  is '),('Transaction Re-','ate  is '),('Transaction Re-','ate  is '),('All Sales Entry  is resette',' by:  1 1. 1  on  10/28/2022 @ 11:52:42 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/28/2022 @ 11:52:55 PM'),('Transaction Re-','ate  is '),('Transaction Re-','ate  is '),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/4/2022 @ 5:38:26 PM'),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/4/2022 @ 5:38:28 PM'),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/4/2022 @ 5:38:29 PM'),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/4/2022 @ 5:38:29 PM'),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/4/2022 @ 5:38:30 PM'),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/4/2022 @ 5:38:32 PM'),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/4/2022 @ 5:38:33 PM'),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/4/2022 @ 5:55:26 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2022 @ 5:41:15 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2022 @ 8:15:10 AM'),('Last Month Sales Entry  is resette',' by:  1 1. 1  on  11/5/2022 @ 8:24:05 AM'),('Last Month Sales Entry  is resette',' by:  NO CASHIER  on  11/7/2022 @ 11:33:33 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/11/2022 @ 2:00:45 AM'),('All Sales Entry  is resette',' by:  ELJOHN F. GREGORIO  on  12/6/2022 @ 2:42:30 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/14/2022 @ 2:36:07 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/14/2022 @ 5:59:25 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/14/2022 @ 5:59:31 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/14/2022 @ 6:11:05 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/14/2022 @ 9:21:53 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/14/2022 @ 9:28:14 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/14/2022 @ 9:28:27 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/14/2022 @ 11:28:34 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/29/2022 @ 10:22:17 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  12/31/2022 @ 8:42:28 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/2/2023 @ 1:31:31 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/2/2023 @ 2:16:26 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/8/2023 @ 6:00:41 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/9/2023 @ 4:21:47 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/9/2023 @ 5:44:34 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/9/2023 @ 5:50:16 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/9/2023 @ 7:00:04 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/10/2023 @ 2:09:15 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/11/2023 @ 4:09:27 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/19/2023 @ 11:36:54 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/20/2023 @ 2:39:43 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/20/2023 @ 2:44:36 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  1/24/2023 @ 11:05:18 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  2/25/2023 @ 2:19:29 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  2/28/2023 @ 10:16:48 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  3/9/2023 @ 2:28:45 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  3/15/2023 @ 11:30:48 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  3/21/2023 @ 5:17:57 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  3/22/2023 @ 5:09:42 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  3/28/2023 @ 1:47:18 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  4/29/2023 @ 2:20:03 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/1/2023 @ 2:39:59 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/5/2023 @ 10:01:04 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 9:53:21 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 9:57:30 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 10:56:24 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 11:18:07 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 11:22:03 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 12:06:57 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 12:10:24 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 1:59:27 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/6/2023 @ 3:48:22 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/8/2023 @ 11:17:33 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/9/2023 @ 10:00:11 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/10/2023 @ 12:37:15 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/15/2023 @ 2:54:32 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/15/2023 @ 2:57:35 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/16/2023 @ 1:22:19 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/16/2023 @ 1:24:49 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/16/2023 @ 1:25:37 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/17/2023 @ 9:52:22 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/17/2023 @ 10:44:53 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/18/2023 @ 9:48:30 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/20/2023 @ 4:16:57 PM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/22/2023 @ 10:08:28 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/22/2023 @ 3:40:29 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/22/2023 @ 3:47:26 PM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/23/2023 @ 9:42:35 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/23/2023 @ 4:27:57 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/25/2023 @ 8:57:50 AM'),('All Sales Entry  is resette',' by:  EMELYN A. ARNEJO  on  5/25/2023 @ 9:53:11 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/25/2023 @ 11:18:00 PM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/25/2023 @ 11:32:20 PM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/25/2023 @ 11:43:26 PM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/25/2023 @ 11:45:01 PM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/26/2023 @ 11:49:37 PM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/27/2023 @ 12:01:04 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  5/27/2023 @ 10:19:34 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/27/2023 @ 10:58:49 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/27/2023 @ 11:13:54 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/27/2023 @ 11:19:12 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/27/2023 @ 11:25:35 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/27/2023 @ 11:38:06 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/27/2023 @ 11:38:41 AM'),('All Sales Entry  is resette',' by:  JADELINE D. ANGTUD  on  5/27/2023 @ 11:50:40 AM'),('All Sales Entry  is resette',' by:  CRISAN  T. GARCIA  on  5/27/2023 @ 11:51:51 AM'),('Transaction Re-','ate  is '),('All Sales Entry  is resette',' by:  1 1. 1  on  6/7/2023 @ 1:38:17 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/14/2023 @ 5:29:46 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/19/2023 @ 1:45:38 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/23/2023 @ 6:31:18 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/23/2023 @ 6:31:22 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/23/2023 @ 11:59:49 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/26/2023 @ 5:21:21 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/26/2023 @ 11:45:56 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/27/2023 @ 1:18:43 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/27/2023 @ 1:26:38 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/29/2023 @ 12:03:06 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/29/2023 @ 12:48:43 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/29/2023 @ 5:23:10 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/30/2023 @ 2:54:38 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  6/30/2023 @ 3:33:52 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/2/2023 @ 2:38:25 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/2/2023 @ 2:40:13 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/2/2023 @ 5:33:42 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/3/2023 @ 2:47:16 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/3/2023 @ 2:47:19 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/3/2023 @ 5:06:09 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/3/2023 @ 5:06:13 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/4/2023 @ 1:11:45 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/4/2023 @ 4:19:00 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/4/2023 @ 4:28:48 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/4/2023 @ 7:28:24 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/4/2023 @ 11:34:26 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/5/2023 @ 2:51:35 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/8/2023 @ 7:50:35 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/8/2023 @ 7:50:40 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/8/2023 @ 10:33:34 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/8/2023 @ 2:21:50 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/8/2023 @ 4:13:47 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/8/2023 @ 4:14:07 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/9/2023 @ 11:12:08 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/10/2023 @ 12:32:50 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/10/2023 @ 2:43:49 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/10/2023 @ 6:19:18 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/10/2023 @ 6:22:58 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/11/2023 @ 12:45:45 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/11/2023 @ 12:45:50 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/11/2023 @ 12:59:28 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/12/2023 @ 10:45:20 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/12/2023 @ 10:45:24 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/16/2023 @ 2:05:00 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/17/2023 @ 10:50:41 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/18/2023 @ 11:48:17 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/18/2023 @ 2:37:06 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/18/2023 @ 2:37:10 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 1:23:25 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 1:23:28 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 1:39:30 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 1:44:12 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 1:52:21 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 2:05:33 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 2:09:27 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 2:18:40 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 2:24:00 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 2:39:16 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 3:27:12 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/19/2023 @ 3:55:18 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/20/2023 @ 1:50:13 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/20/2023 @ 1:53:54 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/20/2023 @ 12:39:12 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/20/2023 @ 12:46:02 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/20/2023 @ 12:58:32 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/22/2023 @ 1:23:33 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/22/2023 @ 1:37:37 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/22/2023 @ 6:23:47 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/22/2023 @ 8:05:00 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/22/2023 @ 9:36:44 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/24/2023 @ 5:09:14 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/24/2023 @ 5:18:42 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/24/2023 @ 6:19:24 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/24/2023 @ 9:11:39 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/24/2023 @ 2:08:13 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/26/2023 @ 12:09:19 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/26/2023 @ 1:37:00 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/26/2023 @ 10:18:04 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/27/2023 @ 11:10:48 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/27/2023 @ 11:10:52 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/27/2023 @ 11:18:46 AM'),('All Sales Entry  is resette',' by:  ADMIN  on  7/27/2023 @ 11:53:11 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  7/27/2023 @ 12:10:49 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/7/2023 @ 11:55:48 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/7/2023 @ 11:55:52 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/7/2023 @ 12:02:45 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 11:11:57 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 11:53:04 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/16/2023 @ 12:30:21 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/19/2023 @ 2:43:03 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 7:25:33 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 7:41:03 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 9:38:50 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 9:50:18 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 10:00:44 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 10:06:15 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 10:12:16 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/9/2023 @ 10:34:32 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/14/2023 @ 1:52:46 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/16/2023 @ 3:02:49 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/10/2023 @ 1:52:13 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/10/2023 @ 1:52:17 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/12/2023 @ 8:57:57 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/14/2023 @ 1:02:23 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  8/14/2023 @ 1:09:07 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  16/09/2023 @ 4:09:10 pm'),('All Sales Entry  is resette',' by:  1 1. 1  on  16/09/2023 @ 4:09:16 pm'),('All Sales Entry  is resette',' by:  1 1. 1  on  9/30/2023 @ 3:28:19 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/1/2023 @ 1:48:04 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/1/2023 @ 6:03:46 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/1/2023 @ 7:18:53 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/2/2023 @ 2:48:15 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/2/2023 @ 2:48:19 PM'),('All Sales Entry  is resette',' by:  ADMIN  on  10/3/2023 @ 10:53:00 PM'),('All Sales Entry  is resette',' by:  ADMIN  on  10/3/2023 @ 10:53:06 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/4/2023 @ 12:45:25 PM'),('All Sales Entry  is resette',' by:  ADMIN  on  10/4/2023 @ 10:39:10 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 1:00:29 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 1:00:33 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 2:40:38 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 4:00:19 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 4:30:31 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 5:45:01 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 8:06:23 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 9:23:14 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 10:13:01 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 10:43:39 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 11:13:37 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/5/2023 @ 11:37:23 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/6/2023 @ 1:56:26 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/6/2023 @ 4:14:10 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/6/2023 @ 6:06:51 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/7/2023 @ 12:22:15 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/7/2023 @ 12:29:49 AM'),('All Sales Entry  is resette',' by:  ADMIN  on  10/8/2023 @ 2:32:52 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/8/2023 @ 3:11:50 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/23/2023 @ 12:12:03 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/23/2023 @ 3:05:07 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  10/23/2023 @ 3:07:28 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/2/2023 @ 12:27:16 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/2/2023 @ 4:00:59 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/3/2023 @ 5:14:06 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/4/2023 @ 3:10:13 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/4/2023 @ 3:13:32 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 12:42:50 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 12:46:56 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 12:49:57 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:07:26 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:09:52 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:23:58 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:26:22 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:27:38 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:33:06 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:34:26 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:35:28 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:37:44 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:38:44 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:40:48 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:43:17 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 6:59:58 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 7:04:41 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 7:12:28 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 7:45:35 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 7:50:27 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 7:56:18 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 7:56:21 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:07:08 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:07:12 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:07:16 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:11:33 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:15:12 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:17:12 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:17:15 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:17:59 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:18:04 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:28:12 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/5/2023 @ 8:36:06 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/6/2023 @ 1:28:15 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/6/2023 @ 2:26:40 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/6/2023 @ 2:35:37 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/6/2023 @ 2:37:58 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/6/2023 @ 2:43:32 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/7/2023 @ 12:25:27 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/7/2023 @ 12:44:18 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/7/2023 @ 12:44:22 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 9:56:39 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 9:56:50 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 10:16:23 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 10:38:51 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 10:40:11 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 10:41:32 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 10:51:52 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 10:51:55 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 11:05:02 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/9/2023 @ 10:39:22 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/10/2023 @ 9:53:57 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/15/2023 @ 6:58:12 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/15/2023 @ 10:21:34 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/16/2023 @ 2:09:06 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/19/2023 @ 12:31:37 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/19/2023 @ 12:31:46 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/20/2023 @ 5:51:37 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/20/2023 @ 5:52:08 AM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/22/2023 @ 3:51:46 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/22/2023 @ 3:52:05 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/22/2023 @ 6:39:26 PM'),('All Sales Entry  is resette',' by:  1 1. 1  on  11/22/2023 @ 6:39:41 PM');
/*!40000 ALTER TABLE `tblresetdatabase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblreturn2supp`
--

DROP TABLE IF EXISTS `tblreturn2supp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblreturn2supp` (
  `transno` text,
  `dateenc` text,
  `rrno` text,
  `pqty` text,
  `punit` text,
  `sqty` text,
  `itemcode` text,
  `desc` text,
  `sunit` text,
  `complete` text,
  `Cashier_ID` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblreturn2supp`
--

LOCK TABLES `tblreturn2supp` WRITE;
/*!40000 ALTER TABLE `tblreturn2supp` DISABLE KEYS */;
INSERT INTO `tblreturn2supp` VALUES ('transno','dateenc','rrno','pqty','punit','sqty','itemcode','desc','sunit','complete','Cashier_ID');
/*!40000 ALTER TABLE `tblreturn2supp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblreturn2supplist`
--

DROP TABLE IF EXISTS `tblreturn2supplist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblreturn2supplist` (
  `transno` text,
  `rrno` text,
  `rdate` text,
  `drno` text,
  `drdate` text,
  `supplier` text,
  `totitems` text,
  `remark` text,
  `cashier_id` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblreturn2supplist`
--

LOCK TABLES `tblreturn2supplist` WRITE;
/*!40000 ALTER TABLE `tblreturn2supplist` DISABLE KEYS */;
INSERT INTO `tblreturn2supplist` VALUES ('transno','rrno','rdate','drno','drdate','supplier','totitems','remark','cashier_id');
/*!40000 ALTER TABLE `tblreturn2supplist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrfc`
--

DROP TABLE IF EXISTS `tblrfc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrfc` (
  `transno` text,
  `transid` text,
  `qty` text,
  `pcode` text,
  `desc` text,
  `price` text,
  `amount` text,
  `mm` text,
  `dd` text,
  `yyyy` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrfc`
--

LOCK TABLES `tblrfc` WRITE;
/*!40000 ALTER TABLE `tblrfc` DISABLE KEYS */;
INSERT INTO `tblrfc` VALUES ('transno','transid','qty','pcode','desc','price','amount','mm','dd','yyyy');
/*!40000 ALTER TABLE `tblrfc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrts`
--

DROP TABLE IF EXISTS `tblrts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrts` (
  `transno` text,
  `transid` text,
  `qty` text,
  `pcode` text,
  `desc` text,
  `price` text,
  `amount` text,
  `mm` text,
  `dd` text,
  `yyyy` text,
  `supp` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrts`
--

LOCK TABLES `tblrts` WRITE;
/*!40000 ALTER TABLE `tblrts` DISABLE KEYS */;
INSERT INTO `tblrts` VALUES ('transno','transid','qty','pcode','desc','price','amount','mm','dd','yyyy','supp');
/*!40000 ALTER TABLE `tblrts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsales`
--

DROP TABLE IF EXISTS `tblsales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsales` (
  `Seqn` int DEFAULT NULL,
  `x1` int DEFAULT NULL,
  `r1` int DEFAULT NULL,
  `transno` int DEFAULT NULL,
  `TransId` text,
  `MM` int DEFAULT NULL,
  `DD` int DEFAULT NULL,
  `YYYY` int DEFAULT NULL,
  `WW` int DEFAULT NULL,
  `Time` text,
  `SaleCounted` int DEFAULT NULL,
  `ProdInputEType` int DEFAULT NULL,
  `Operator` text,
  `Salesman` text,
  `ReadSQ` text,
  `Terminal` int DEFAULT NULL,
  `ItemCode` text,
  `BarCode` text,
  `dtrg` int DEFAULT NULL,
  `PName` text,
  `Serial` text,
  `category` text,
  `subcategory` text,
  `sellerconc` text,
  `PCN` text,
  `OrderSaleTitleSerialNote` text,
  `CusId` text,
  `cusname` text,
  `Qty` int DEFAULT NULL,
  `Unit` text,
  `alength` int DEFAULT NULL,
  `awidth` int DEFAULT NULL,
  `Warranty` text,
  `Cost` double DEFAULT NULL,
  `totalCost` double DEFAULT NULL,
  `Price` text,
  `DiscValue` double DEFAULT NULL,
  `DiscDesc` text,
  `DiscAllEach` text,
  `DiscIDVerific` text,
  `DiscAmount` double DEFAULT NULL,
  `DiscAddOverall` double DEFAULT NULL,
  `TotalDiscount` double DEFAULT NULL,
  `Profit` text,
  `TotalProfit` text,
  `TotalLineAmount` text,
  `Selltype` text,
  `Completed` int DEFAULT NULL,
  `Lookup` int DEFAULT NULL,
  `vrct` int DEFAULT NULL,
  `siteNdev` text,
  `lodcounter` int DEFAULT NULL,
  `lodctot` int DEFAULT NULL,
  `jdone` int DEFAULT NULL,
  `pckn` int DEFAULT NULL,
  `chkorlsvisible` int DEFAULT NULL,
  `Ldc` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsales`
--

LOCK TABLES `tblsales` WRITE;
/*!40000 ALTER TABLE `tblsales` DISABLE KEYS */;
INSERT INTO `tblsales` VALUES (703,0,1,534,'0000001',11,23,2023,47,'11:16:37 AM',1,1,'AD1001','NO1000','N',101,'000001','000001',112323,'INTEGRATED STREET LAMP 100W --(LESS SUKI DISC 70-AMT-ALL 70 x 2 = 70.00) IDV:1 --(LESS SUKI DISC 140-AMT-ALL 140 x 2 = 140.00) IDV:0','X','SOLAR LAMPS','-','S001','DESKTOP-H3M02A3','','C100000','WALK-IN',2,'PCS',1,1,'N/A',0,0,'1,620.00',140,'AMT','ALL','0',140,0,140,'1,480.00','2,960.00','3,100.00','R',1,0,1,'NONE',0,0,0,0,1,0),(705,0,2,540,'0000004',11,24,2023,47,'10:54:23 AM',1,1,'AD1001','NO1000','N',101,'000003','000003',112423,'NATURES SPRING 500ML','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'PCS',0,0,'N/A',20,20,'25.00',0,'%','All','',0,0,0,'5.00','5.00','25.00','R',1,0,1,'NONE',0,0,0,0,1,0),(706,0,2,541,'0000004',11,24,2023,47,'10:54:27 AM',1,1,'AD1001','NO1000','N',101,'000002','000002',112423,'RICE 1KL','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'KLS',0,0,'N/A',50,50,'55.00',0,'%','All','',0,0,0,'5.00','5.00','55.00','R',1,0,1,'NONE',0,0,0,0,1,1),(707,0,2,542,'0000005',11,24,2023,47,'10:57:36 AM',1,1,'AD1001','NO1000','N',101,'000003','000003',112423,'NATURES SPRING 500ML','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'PCS',1,1,'N/A',20,20,'25.00',0,'%','All','',0,0,0,'5.00','5.00','25.00','R',1,0,1,'NONE',0,0,0,0,1,0),(708,0,2,543,'0000005',11,24,2023,47,'10:57:46 AM',1,1,'AD1001','NO1000','N',101,'000002','000002',112423,'RICE 1KL','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'KLS',0,0,'N/A',50,50,'55.00',0,'%','All','',0,0,0,'5.00','5.00','55.00','R',1,0,1,'NONE',0,0,0,0,1,1),(709,0,2,544,'0000006',11,24,2023,47,'11:00:12 AM',1,1,'AD1001','NO1000','N',101,'000003','000003',112423,'NATURES SPRING 500ML','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'PCS',1,1,'N/A',20,20,'25.00',0,'%','All','',0,0,0,'5.00','5.00','25.00','R',1,0,1,'NONE',0,0,0,0,1,0),(710,0,2,545,'0000007',11,24,2023,47,'11:07:03 AM',1,1,'AD1001','NO1000','N',101,'000003','000003',112423,'NATURES SPRING 500ML','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'PCS',0,0,'N/A',20,20,'25.00',0,'%','All','',0,0,0,'5.00','5.00','25.00','R',1,0,1,'NONE',0,0,0,0,1,0),(711,0,2,546,'0000007',11,24,2023,47,'11:07:09 AM',1,1,'AD1001','NO1000','N',101,'000003','000003',112423,'NATURES SPRING 500ML','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'PCS',0,0,'N/A',20,20,'25.00',0,'%','All','',0,0,0,'5.00','5.00','25.00','R',1,0,1,'NONE',0,0,0,0,1,0),(712,0,2,547,'0000007',11,24,2023,47,'11:07:30 AM',1,1,'AD1001','NO1000','N',101,'000002','000002',112423,'RICE 1KL','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',5,'KLS',0,0,'N/A',50,250,'55.00',0,'%','All','',0,0,0,'5.00','25.00','275.00','R',1,0,1,'NONE',0,0,0,0,1,1),(713,0,0,548,'0000008',11,24,2023,47,'11:14:01 AM',1,1,'AD1001','NO1000','N',101,'000003','000003',112423,'NATURES SPRING 500ML','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'PCS',1,1,'N/A',20,20,'25.00',0,'%','All','',0,0,0,'5.00','5.00','25.00','R',1,0,1,'NONE',0,0,0,0,1,0),(714,0,0,549,'0000009',11,24,2023,47,'11:14:56 AM',1,1,'AD1001','NO1000','N',101,'000003','000003',112423,'NATURES SPRING 500ML','X','GROCERIES','-','S001','DESKTOP-U0VFTFO','','C100000','WALK-IN',1,'PCS',0,0,'N/A',20,20,'25.00',0,'%','All','',0,0,0,'5.00','5.00','25.00','R',1,0,1,'NONE',0,0,0,0,1,0),(715,0,0,551,'0000011',1,5,2024,1,'11:07:29 PM',1,1,'AD1001','NO1000','N',101,'000015','000015',10524,'MIRINDA','X','DRINKS','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',1,1,'N/A',15,15,'18.00',0,'%','All','',0,0,0,'3.00','3.00','18.00','R',1,0,1,'NONE',0,0,0,0,1,0),(716,0,0,552,'0000011',1,5,2024,1,'11:07:29 PM',1,1,'AD1001','NO1000','N',101,'000007','000007',10524,'DOUBLE BURGER','X','FOOD','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',0,0,'N/A',140,140,'150.00',0,'%','All','',0,0,0,'10.00','10.00','150.00','R',1,0,1,'NONE',0,0,0,0,1,0),(717,0,0,553,'0000011',1,5,2024,1,'11:07:31 PM',1,1,'AD1001','NO1000','N',101,'000005','000005',10524,'CHEESE BURGER','X','FOOD','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',0,0,'N/A',20,20,'30.00',0,'%','All','',0,0,0,'10.00','10.00','30.00','R',1,0,1,'NONE',0,0,0,0,1,0),(718,0,0,554,'0000011',1,5,2024,1,'11:07:31 PM',1,1,'AD1001','NO1000','N',101,'000004','000004',10524,'BURGER DELIGHT','X','FOOD','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',0,0,'N/A',40,40,'50.00',0,'%','All','',0,0,0,'10.00','10.00','50.00','R',1,0,1,'NONE',0,0,0,0,1,0),(719,0,0,555,'0000011',1,5,2024,1,'11:07:32 PM',1,1,'AD1001','NO1000','N',101,'000011','000011',10524,'TAPA EXPRESS','X','FOOD','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',0,0,'N/A',110,110,'115.00',0,'%','All','',0,0,0,'5.00','5.00','115.00','R',1,0,1,'NONE',0,0,0,0,1,0),(720,0,0,556,'0000011',1,5,2024,1,'11:07:32 PM',1,1,'AD1001','NO1000','N',101,'000018','000018',10524,'STING','X','DRINKS','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',0,0,'N/A',20,20,'30.00',0,'%','All','',0,0,0,'10.00','10.00','30.00','R',1,0,1,'NONE',0,0,0,0,1,0),(721,0,0,557,'0000011',1,5,2024,1,'11:07:32 PM',1,1,'AD1001','NO1000','N',101,'000022','000022',10524,'AMERICANO COFFEE 120Z','X','GROCERIES','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',0,0,'N/A',0,0,'90.00',0,'%','All','',0,0,0,'90.00','90.00','90.00','R',1,0,1,'NONE',0,0,0,0,1,0),(722,0,0,558,'0000011',1,5,2024,1,'11:07:32 PM',1,1,'AD1001','NO1000','N',101,'000020','000020',10524,'COOKIES AND CREAM MILKTEA MEDIUM','X','GROCERIES','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',0,0,'N/A',0,0,'80.00',0,'%','All','',0,0,0,'80.00','80.00','80.00','R',1,0,1,'NONE',0,0,0,0,1,0),(723,0,0,559,'0000011',1,5,2024,1,'11:07:33 PM',1,1,'AD1001','NO1000','N',101,'000010','000010',10524,'CHEESE HOTDOG DELIGHT','X','FOOD','-','S001','DESKTOP-536IVOG','','C100000','WALK-IN',1,'PCS',0,0,'N/A',130,130,'140.00',0,'%','All','',0,0,0,'10.00','10.00','140.00','R',1,0,1,'NONE',0,0,0,0,1,0);
/*!40000 ALTER TABLE `tblsales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsalessum`
--

DROP TABLE IF EXISTS `tblsalessum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsalessum` (
  `Transno` int DEFAULT NULL,
  `x1` text,
  `r1` text,
  `Transid` text,
  `mm` int DEFAULT NULL,
  `dd` int DEFAULT NULL,
  `WW` int DEFAULT NULL,
  `ttime` text,
  `yyyy` int DEFAULT NULL,
  `dtrg` int DEFAULT NULL,
  `Operator` text,
  `salesman` text,
  `TID` int DEFAULT NULL,
  `pcn` text,
  `cashsi` text,
  `chargesi` text,
  `ackrcpt` text,
  `cusidt` text,
  `cusname` text,
  `tSiteLocID` text,
  `tSiteLoc` text,
  `t_amount` text,
  `t_cost` double DEFAULT NULL,
  `t_discount` double DEFAULT NULL,
  `t_payable` text,
  `DiscIDVerific` text,
  `disctsline` int DEFAULT NULL,
  `discName` text,
  `discValue` text,
  `discPercent` text,
  `t_paidAmount` text,
  `t_profit` int DEFAULT NULL,
  `transtype` text,
  `transOutTypeVia` text,
  `transOutTypeThru` text,
  `PaymentMode` text,
  `PaymentDESC` text,
  `SaleCounted` text,
  `StatInputComplete` text,
  `Status` text,
  `Releaseddate` text,
  `releasedVia` text,
  `ReadSQ` text,
  `FullyPaidStat` text,
  `Notes` text,
  `VerifyBy` text,
  `releasedThru` text,
  `edited` int DEFAULT NULL,
  `jdone` int DEFAULT NULL,
  `tsslcount` int DEFAULT NULL,
  `pdate` int DEFAULT NULL,
  `ldct` int DEFAULT NULL,
  `tredithistory` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsalessum`
--

LOCK TABLES `tblsalessum` WRITE;
/*!40000 ALTER TABLE `tblsalessum` DISABLE KEYS */;
INSERT INTO `tblsalessum` VALUES (425,'0','0','0000001',11,23,47,'11:16:37 AM',2023,112323,'AD1001','NO1000',101,'DESKTOP-H3M02A3','-','-','-','C100000','WALK-IN','T000','NONE','3,240.00',0,0,'3,100.00','',140,'','','','3,100.00',3100,'Out\'RS','PICKUP','INSTORE','CASH','ONSPOT','1','2','ToVerify','112323','PICKUP','N','Y','','-','INSTORE',0,0,0,112323,0,''),(426,'','','0000002',11,23,47,'3:52:50 PM',2023,112323,'AD1001','NO1000',101,'DESKTOP-U0VFTFO','-','-','-','C100000','WALK-IN','T000','NONE','0.00',0,0,'0.00','',0,'','','','0.00',0,'-','-','-','CASH','ONSPOT','V','','Void','Not Yet','-','N','N','','-','-',0,0,0,0,0,''),(428,'0','0','0000004',11,24,47,'10:54:23 AM',2023,112423,'AD1001','NO1000',101,'DESKTOP-U0VFTFO','-','-','-','C100000','WALK-IN','T000','NONE','80.00',70,0,'80.00','',0,'','','','80.00',10,'Out\'RS','PICKUP','INSTORE','CASH','ONSPOT','1','2','ToVerify','112423','PICKUP','N','Y','','-','INSTORE',0,0,0,112423,1,''),(429,'0','0','0000005',11,24,47,'10:57:36 AM',2023,112423,'AD1001','NO1000',101,'DESKTOP-U0VFTFO','-','-','-','C100000','WALK-IN','T000','NONE','80.00',70,0,'80.00','',0,'','','','80.00',10,'Out\'RS','PICKUP','INSTORE','CASH','ONSPOT','1','2','ToVerify','112423','PICKUP','N','Y','','-','INSTORE',0,0,0,112423,1,''),(430,'0','0','0000006',11,24,47,'11:00:12 AM',2023,112423,'AD1001','NO1000',101,'DESKTOP-U0VFTFO','-','-','-','C100000','WALK-IN','T000','NONE','25.00',20,0,'25.00','',0,'','','','25.00',5,'Out\'RS','PICKUP','INSTORE','CASH','ONSPOT','1','2','ToVerify','112423','PICKUP','N','Y','','-','INSTORE',0,0,0,112423,0,''),(431,'0','0','0000007',11,24,47,'11:07:03 AM',2023,112423,'AD1001','NO1000',101,'DESKTOP-U0VFTFO','-','-','-','C100000','WALK-IN','T000','NONE','325.00',290,0,'325.00','',0,'','','','325.00',35,'Out\'RS','PICKUP','INSTORE','CASH','ONSPOT','1','2','ToVerify','112423','PICKUP','N','Y','','-','INSTORE',0,0,0,112423,1,''),(432,'0','0','0000008',11,24,47,'11:14:01 AM',2023,112423,'AD1001','NO1000',101,'DESKTOP-U0VFTFO','-','-','-','C100000','WALK-IN','T000','NONE','25.00',20,0,'25.00','',0,'','','','25.00',5,'Out\'RS','PICKUP','INSTORE','CASH','ONSPOT','1','2','ToVerify','112423','PICKUP','N','Y','','-','INSTORE',0,0,0,112423,0,''),(433,'0','0','0000009',11,24,47,'11:14:56 AM',2023,112423,'AD1001','NO1000',101,'DESKTOP-U0VFTFO','-','-','-','C100000','WALK-IN','T000','NONE','25.00',20,0,'25.00','',0,'','','','25.00',5,'Out\'RS','PICKUP','INSTORE','BANK2BANK','1224556','1','2','ToVerify','112423','PICKUP','N','Y','','-','INSTORE',0,0,0,112423,0,''),(434,'','','0000010',11,24,47,'11:15:49 AM',2023,112423,'AD1001','NO1000',101,'DESKTOP-U0VFTFO','-','-','-','C100000','WALK-IN','T000','NONE','25.00',20,0,'25.00','',0,'','','','0.00',5,'-','-','-','CASH','ONSPOT','V','','Void','Not Yet','-','N','N','','-','-',0,0,0,0,0,''),(435,'0','0','0000011',1,5,1,'11:07:29 PM',2024,10524,'AD1001','NO1000',101,'DESKTOP-536IVOG','-','-','-','C100000','WALK-IN','T000','NONE','703.00',475,0,'703.00','',0,'','','','703.00',228,'Out\'RS','PICKUP','INSTORE','CASH','ONSPOT','1','2','ToVerify','010524','PICKUP','N','N','','-','INSTORE',0,0,0,10524,0,'');
/*!40000 ALTER TABLE `tblsalessum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsaleszsumrpt`
--

DROP TABLE IF EXISTS `tblsaleszsumrpt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsaleszsumrpt` (
  `dmy` text,
  `yyyy` int DEFAULT NULL,
  `dname` text,
  `descrip` text,
  `sales` text,
  `cost` text,
  `revenue` text,
  `paid` text,
  `receivable` text,
  `expense` text,
  `profit` text,
  `remarks` text,
  `discount` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsaleszsumrpt`
--

LOCK TABLES `tblsaleszsumrpt` WRITE;
/*!40000 ALTER TABLE `tblsaleszsumrpt` DISABLE KEYS */;
INSERT INTO `tblsaleszsumrpt` VALUES ('01',2023,'JAN','','-','-','-','-','-','-','-','-','-'),('02',2023,'FEB','','-','-','-','-','-','-','-','-','-'),('03',2023,'MAR','','-','-','-','-','-','-','-','-','-'),('04',2023,'APR','','-','-','-','-','-','-','-','-','-'),('05',2023,'MAY','','-','-','-','-','-','-','-','-','-'),('06',2023,'JUN','','-','-','-','-','-','-','-','-','-'),('07',2023,'JUL','','-','-','-','-','-','2110','-2110','Negative','-'),('08',2023,'AUG','','99964.08','-','99964.08','99964.08','-','-','99964.08','Good','-'),('09',2023,'SEP','','-','-','-','-','-','-','-','-','-'),('10',2023,'OCT','','-','-','-','-','-','-','-','-','-'),('11',2023,'NOV','','-','-','-','-','-','-','-','-','-'),('12',2023,'DEC','','-','-','-','-','-','-','-','-','-');
/*!40000 ALTER TABLE `tblsaleszsumrpt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsellerconc`
--

DROP TABLE IF EXISTS `tblsellerconc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsellerconc` (
  `seq` int DEFAULT NULL,
  `unitcode` text,
  `pname` text,
  `AmtSold` text,
  `pft` text,
  `temsold` text,
  `tempft` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsellerconc`
--

LOCK TABLES `tblsellerconc` WRITE;
/*!40000 ALTER TABLE `tblsellerconc` DISABLE KEYS */;
INSERT INTO `tblsellerconc` VALUES (11,'S001','MAINSTORE','','','',''),(12,'S002','SELLER 2','','','','');
/*!40000 ALTER TABLE `tblsellerconc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsetupnsettings`
--

DROP TABLE IF EXISTS `tblsetupnsettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsetupnsettings` (
  `SeQ` int DEFAULT NULL,
  `TerminalID` int DEFAULT NULL,
  `UFS` int DEFAULT NULL,
  `OperationMode` text,
  `compname` text,
  `branch` text,
  `address` text,
  `address2` text,
  `VatNo` text,
  `contact` text,
  `contact2` text,
  `email` text,
  `PCName` text,
  `SerialNo` int DEFAULT NULL,
  `LogInTimes` int DEFAULT NULL,
  `DateReg` text,
  `active` text,
  `Sellpricing` text,
  `fusesameitems` int DEFAULT NULL,
  `autoqty` text,
  `showOnscreenkb` text,
  `showTopSelling` text,
  `defcategory` text,
  `deftaxDesc` text,
  `deftax` int DEFAULT NULL,
  `defprinter` int DEFAULT NULL,
  `printer1` text,
  `printer2` text,
  `retail` int DEFAULT NULL,
  `wholesale` int DEFAULT NULL,
  `WholSQPT` int DEFAULT NULL,
  `WholSEnable` int DEFAULT NULL,
  `promotion` int DEFAULT NULL,
  `AllowSOevenNoStock` int DEFAULT NULL,
  `T1` text,
  `T2` text,
  `T3` text,
  `T4` text,
  `T5` text,
  `T6` text,
  `Receipt58mmLogo` text,
  `CAdEdDel1` int DEFAULT NULL,
  `CAdEdDel2` int DEFAULT NULL,
  `CAdEdDel3` int DEFAULT NULL,
  `CDash1` int DEFAULT NULL,
  `CDash2` int DEFAULT NULL,
  `CDash3` int DEFAULT NULL,
  `CGenSet1` int DEFAULT NULL,
  `CGenSet2` int DEFAULT NULL,
  `CGenSet3` int DEFAULT NULL,
  `CSalesT1` int DEFAULT NULL,
  `CSalesT2` int DEFAULT NULL,
  `CSalesT3` int DEFAULT NULL,
  `CSellO1` int DEFAULT NULL,
  `CSellO2` int DEFAULT NULL,
  `CSellO3` int DEFAULT NULL,
  `CSaleRpt1` int DEFAULT NULL,
  `CSaleRpt2` int DEFAULT NULL,
  `CSaleRpt3` int DEFAULT NULL,
  `CStockN1` int DEFAULT NULL,
  `CStockN2` int DEFAULT NULL,
  `CStockN3` int DEFAULT NULL,
  `CProdL1` int DEFAULT NULL,
  `CProdL2` int DEFAULT NULL,
  `CProdL3` int DEFAULT NULL,
  `CInv1` int DEFAULT NULL,
  `CInv2` int DEFAULT NULL,
  `CInv3` int DEFAULT NULL,
  `CHisLog1` int DEFAULT NULL,
  `CHisLog2` int DEFAULT NULL,
  `CHisLog3` int DEFAULT NULL,
  `AccessPKey` int DEFAULT NULL,
  `RChkEnableAutoAddSvs` int DEFAULT NULL,
  `RtxtSerChrgeVal` int DEFAULT NULL,
  `RCboSerChrgePercent` text,
  `RCboSerChrgeAplyTo` text,
  `RtxtAdOnSvsChrgAutoBcode` text,
  `SRcptNcopies` int DEFAULT NULL,
  `S2RcptNcopies` int DEFAULT NULL,
  `S3RcptNcopies` int DEFAULT NULL,
  `RImgMDILogo` text,
  `RImgOI` text,
  `RImgLogin` text,
  `showstockavl` int DEFAULT NULL,
  `F1` text,
  `F2` text,
  `F3` text,
  `F4` text,
  `F5` text,
  `F6` text,
  `printer3` text,
  `ShowWnP` int DEFAULT NULL,
  `hscren` text,
  `salescontw` text,
  `salesconth` text,
  `chkdispole` int DEFAULT NULL,
  `chkdualm` int DEFAULT NULL,
  `chkcashdr` int DEFAULT NULL,
  `lstvfontsz` int DEFAULT NULL,
  `chkinvevryshift` int DEFAULT NULL,
  `dispoleport` int DEFAULT NULL,
  `Rprodschfont` int DEFAULT NULL,
  `Rcustableuserfont` int DEFAULT NULL,
  `Rorderlistfont` int DEFAULT NULL,
  `cborctt` text,
  `cbojobort` text,
  `cbodelt` text,
  `chkEnANSC` int DEFAULT NULL,
  `cbotyft` text,
  `cbonoteft` text,
  `cboClaimStub` text,
  `chkSaveEvrPunch` int DEFAULT NULL,
  `chkViewCostPft1` int DEFAULT NULL,
  `chkViewCostPft2` int DEFAULT NULL,
  `chkViewCostPft3` int DEFAULT NULL,
  `chkViewSalesAmt1` int DEFAULT NULL,
  `chkViewSalesAmt2` int DEFAULT NULL,
  `chkViewSalesAmt3` int DEFAULT NULL,
  `chkEditPriceSO1` int DEFAULT NULL,
  `chkEditPriceSO2` int DEFAULT NULL,
  `chkEditPriceSO3` int DEFAULT NULL,
  `chkgivediscount1` int DEFAULT NULL,
  `chkgivediscount2` int DEFAULT NULL,
  `chkgivediscount3` int DEFAULT NULL,
  `ChkFCusNameInput` int DEFAULT NULL,
  `ChkStknCostInput` int DEFAULT NULL,
  `showwarningtleft` int DEFAULT NULL,
  `BakWholeEnable` int DEFAULT NULL,
  `BakWholeDrive` text,
  `BakSaleLEnable` int DEFAULT NULL,
  `BakSaleLDrive` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsetupnsettings`
--

LOCK TABLES `tblsetupnsettings` WRITE;
/*!40000 ALTER TABLE `tblsetupnsettings` DISABLE KEYS */;
INSERT INTO `tblsetupnsettings` VALUES (65,101,1,'SERVER','XYZ CORPORATION','XYZ PH BRANCH','XYZ TRADE CENTER','NEAR XXXXX','111-222-333','091234567890','(032) 123 4567','xyz@email.com.ph','WIN-U3HIEV3OMIR',75988931,1,'01-25-2024','Y','Wholesale',0,'N','N','N','GROCERIES','[+] add',0,1,'XP-58','Microsoft XPS Document Writer',0,0,12,0,0,1,'Bizmatech Corporation','M.C. Briones St., Guizo, Mandaue','Cebu Ph, 6014','E-mail : bizmatech@yahoo.com.ph','09255282333 / (032) 517 4174','09255282333 / (032) 517 4174','None',0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,0,1,0,0,0,1,0,1,0,0,0,123,0,10,'AMT','ALL','OSC',1,1,1,'Default','D:\\BizPOSKTV\\Utilities\\CSLogos\\SalesInt125.gif','D:\\BizPOSKTV\\Utilities\\CSLogos\\Login1224.gif',0,'Bizmatech Corporation','M.C. Briones St., Guizo, Mandaue','Cebu Ph, 6014','E-mail : bizmatech@yahoo.com.ph','09255282333 / (032) 517 4174','09255282333 / (032) 517 4174','XP-58',0,'NTS','<','^',0,0,0,14,0,2,13,13,13,'R E C E I P T','JOB ORDER','DELIVERY RECEIPT',1,'Thank You. Come Again !','THIS DOCUMENT IS NOT VALID FOR CLAIM OF INPUT TAXES. PLS ASK CASHIERS FOR OFFICIAL RECEIPT','CLAIM SLIP',0,1,1,0,1,1,0,1,0,0,1,0,0,1,1,10,1,'C',0,'E');
/*!40000 ALTER TABLE `tblsetupnsettings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsinventory`
--

DROP TABLE IF EXISTS `tblsinventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsinventory` (
  `transno` int DEFAULT NULL,
  `StckInRegNo` int DEFAULT NULL,
  `endate` text,
  `drdate` text,
  `rrno` text,
  `itemcode` text,
  `products` text,
  `serialno` int DEFAULT NULL,
  `Cost` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `sdate` text,
  `supplier` text,
  `customer` int DEFAULT NULL,
  `Receiptnum` int DEFAULT NULL,
  `soldprice` int DEFAULT NULL,
  `remarks` text,
  `Cashier_ID` text,
  `P_Unit` text,
  `warranty` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsinventory`
--

LOCK TABLES `tblsinventory` WRITE;
/*!40000 ALTER TABLE `tblsinventory` DISABLE KEYS */;
INSERT INTO `tblsinventory` VALUES (1,1,'05/08/2023','05/08/2023','-','000007','MEDICOL',12345,0,1,'','-',0,0,0,'>','','PCS','1 YEAR');
/*!40000 ALTER TABLE `tblsinventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsiteloc`
--

DROP TABLE IF EXISTS `tblsiteloc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsiteloc` (
  `unitcode` text,
  `IO` int DEFAULT NULL,
  `pname` text,
  `transid` int DEFAULT NULL,
  `price` text,
  `status` text,
  `checkin` int DEFAULT NULL,
  `chkIndate` int DEFAULT NULL,
  `checkout` int DEFAULT NULL,
  `chkOutdate` int DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsiteloc`
--

LOCK TABLES `tblsiteloc` WRITE;
/*!40000 ALTER TABLE `tblsiteloc` DISABLE KEYS */;
INSERT INTO `tblsiteloc` VALUES ('T000',0,'NONE',0,'','VACANT',0,0,0,0,''),('T001',0,'TABLE 1',0,'','VACANT',0,0,0,0,''),('T002',0,'COTTAGE 1',0,'','VACANT',0,0,0,0,'');
/*!40000 ALTER TABLE `tblsiteloc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsiterooms`
--

DROP TABLE IF EXISTS `tblsiterooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsiterooms` (
  `unitcode` text,
  `IO` int DEFAULT NULL,
  `pname` text,
  `transid` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `status` text,
  `checkin` int DEFAULT NULL,
  `chkIndate` int DEFAULT NULL,
  `checkout` int DEFAULT NULL,
  `chkOutdate` int DEFAULT NULL,
  `notes` text,
  `transeq` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsiterooms`
--

LOCK TABLES `tblsiterooms` WRITE;
/*!40000 ALTER TABLE `tblsiterooms` DISABLE KEYS */;
INSERT INTO `tblsiterooms` VALUES ('R001',0,'ROOM A',0,200,'VACANT',0,0,0,0,'-',0),('R002',0,'ROOM 2',0,600,'VACANT',0,0,0,0,'-',0),('R003',0,'ROOM C',0,900,'VACANT',0,0,0,0,'-',0),('R004',0,'ROOM D',0,399,'VACANT',0,0,0,0,'-',0),('R005',0,'ROOM K',0,78,'VACANT',0,0,0,0,'-',0),('R006',0,'ROOM F',0,700,'VACANT',0,0,0,0,'-',0),('R007',0,'ROOM G',0,766,'VACANT',0,0,0,0,'-',0),('R008',0,'ROOM H',0,566,'VACANT',0,0,0,0,'-',0),('R009',0,'ROOM I',0,766,'VACANT',0,0,0,0,'-',0),('R010',0,'ROOM J',0,800,'VACANT',0,0,0,0,'-',0),('R011',0,'ROOM H',0,122,'VACANT',0,0,0,0,'-',0),('R012',0,'ROOM I',0,950,'VACANT',0,0,0,0,'-',0),('R013',0,'ROOM X',0,799,'VACANT',0,0,0,0,'-',0),('R014',0,'ROOM L',0,200,'VACANT',0,0,0,0,'-',0),('R015',0,'ROOM M',0,89,'VACANT',0,0,0,0,'-',0),('R016',0,'ROOM N',0,234,'VACANT',0,0,0,0,'-',0),('R017',0,'ROOM O',0,98,'VACANT',0,0,0,0,'-',0),('R018',0,'ROOM P',0,80,'VACANT',0,0,0,0,'-',0),('R019',0,'ROOM Q',0,150,'VACANT',0,0,0,0,'-',0),('R020',0,'ROOM R',0,80,'VACANT',0,0,0,0,'-',0),('R021',0,'ROOM S',0,750,'VACANT',0,0,0,0,'-',0),('R022',0,'ROOM S',0,299,'VACANT',0,0,0,0,'-',0),('R023',0,'ROOM T',0,344,'VACANT',0,0,0,0,'-',0),('R024',0,'ROOM U2',0,800,'VACANT',0,0,0,0,'-',0),('R025',0,'ROOM W',0,0,'VACANT',0,0,0,0,'-',0);
/*!40000 ALTER TABLE `tblsiterooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstockin`
--

DROP TABLE IF EXISTS `tblstockin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstockin` (
  `SeQ` int DEFAULT NULL,
  `x1` int DEFAULT NULL,
  `r1` int DEFAULT NULL,
  `INSDate` text,
  `MM` text,
  `DD` text,
  `YYYY` int DEFAULT NULL,
  `drno` text,
  `rrno` int DEFAULT NULL,
  `drdate` text,
  `suppliercode` text,
  `pqty` int DEFAULT NULL,
  `punit` text,
  `purPName` text,
  `purprice` int DEFAULT NULL,
  `purTamount` double DEFAULT NULL,
  `sqty` int DEFAULT NULL,
  `alength` text,
  `awidth` text,
  `itemcode` text,
  `bcode` text,
  `pname` text,
  `sunit` text,
  `serial` text,
  `cost` int DEFAULT NULL,
  `rmarkup` double DEFAULT NULL,
  `rmt` text,
  `sellprice` int DEFAULT NULL,
  `WMarkup` int DEFAULT NULL,
  `wmt` text,
  `wprice` int DEFAULT NULL,
  `pmarkup` int DEFAULT NULL,
  `pmt` text,
  `pprice` double DEFAULT NULL,
  `Totalselling` double DEFAULT NULL,
  `totalcostamount` double DEFAULT NULL,
  `complete` int DEFAULT NULL,
  `encoder` text,
  `rptDescSerial` text,
  `receivingstore` text,
  `SNYN` text,
  `Terminal` int DEFAULT NULL,
  `ReadSQ` text,
  `WQT1` int DEFAULT NULL,
  `WQT2` int DEFAULT NULL,
  `WQT3` int DEFAULT NULL,
  `WP1` int DEFAULT NULL,
  `WP2` int DEFAULT NULL,
  `WP3` int DEFAULT NULL,
  `PQ1` int DEFAULT NULL,
  `PQ2` int DEFAULT NULL,
  `PQ3` int DEFAULT NULL,
  `PP1` int DEFAULT NULL,
  `PP2` int DEFAULT NULL,
  `PP3` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstockin`
--

LOCK TABLES `tblstockin` WRITE;
/*!40000 ALTER TABLE `tblstockin` DISABLE KEYS */;
INSERT INTO `tblstockin` VALUES (4,0,0,'010524','01','05',2024,'-',1000001,'01/05/2024','-',1,'PCS','CHEESE HOTDOG DELIGHT',130,130,1,'','','000010','000010','CHEESE HOTDOG DELIGHT','PCS','-',130,7.692307692308,'%',140,0,'%',0,0,'%',0,140,130,1,'1 1. 1','CHEESE HOTDOG DELIGHT','XYZ CORPORATION XYZ PH BRANCH','N',101,'N',0,0,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `tblstockin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstockinlist`
--

DROP TABLE IF EXISTS `tblstockinlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstockinlist` (
  `transno` int DEFAULT NULL,
  `x1` int DEFAULT NULL,
  `r1` int DEFAULT NULL,
  `rrno` int DEFAULT NULL,
  `rdate` text,
  `drno` text,
  `drdate` text,
  `supplier` text,
  `totalamount` double DEFAULT NULL,
  `remark` text,
  `ReceivingStore` text,
  `orderedby` text,
  `receivedby` text,
  `ModeOfPayment` text,
  `TermsOfpayment` text,
  `PaymentStatus` text,
  `AS1` text,
  `BS2` text,
  `CS3` text,
  `paidvia` text,
  `paiddate` text,
  `paiddesc` double DEFAULT NULL,
  `mm` text,
  `dd` text,
  `yyyy` int DEFAULT NULL,
  `tTime` text,
  `dtrg` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstockinlist`
--

LOCK TABLES `tblstockinlist` WRITE;
/*!40000 ALTER TABLE `tblstockinlist` DISABLE KEYS */;
INSERT INTO `tblstockinlist` VALUES (3,0,0,1000001,'01/05/2024','-','1/5/2024','-',130,'>>','','P-MNGER','W-MNGER','CASH','ONSPOT','Unpaid','','','','Not Yet','00/00/0000',0,'01','05',2024,'11:07:00 PM','');
/*!40000 ALTER TABLE `tblstockinlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstockout`
--

DROP TABLE IF EXISTS `tblstockout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstockout` (
  `SeQ` text,
  `x1` text,
  `r1` text,
  `StockOutType` text,
  `ToutDate` text,
  `dateenc` text,
  `TransRrno` text,
  `suppliercode` text,
  `sqty` text,
  `itemcode` text,
  `bcode` text,
  `pname` text,
  `sunit` text,
  `cost` text,
  `addCharges` text,
  `TotalLineCost` text,
  `encoderid` text,
  `readsq` text,
  `mm` text,
  `dd` text,
  `yyyy` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstockout`
--

LOCK TABLES `tblstockout` WRITE;
/*!40000 ALTER TABLE `tblstockout` DISABLE KEYS */;
INSERT INTO `tblstockout` VALUES ('SeQ','x1','r1','StockOutType','ToutDate','dateenc','TransRrno','suppliercode','sqty','itemcode','bcode','pname','sunit','cost','addCharges','TotalLineCost','encoderid','readsq','mm','dd','yyyy');
/*!40000 ALTER TABLE `tblstockout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstockoutsum`
--

DROP TABLE IF EXISTS `tblstockoutsum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstockoutsum` (
  `transno` text,
  `x1` text,
  `r1` text,
  `StockOutKind` text,
  `TransRefNumbr` text,
  `OutDate` text,
  `Consignee` text,
  `requestCheckby` text,
  `approvedby` text,
  `totalCost` text,
  `remark` text,
  `mm` text,
  `dd` text,
  `yyyy` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstockoutsum`
--

LOCK TABLES `tblstockoutsum` WRITE;
/*!40000 ALTER TABLE `tblstockoutsum` DISABLE KEYS */;
INSERT INTO `tblstockoutsum` VALUES ('transno','x1','r1','StockOutKind','TransRefNumbr','OutDate','Consignee','requestCheckby','approvedby','totalCost','remark','mm','dd','yyyy');
/*!40000 ALTER TABLE `tblstockoutsum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstockpur`
--

DROP TABLE IF EXISTS `tblstockpur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstockpur` (
  `SeQ` int DEFAULT NULL,
  `x1` int DEFAULT NULL,
  `r1` int DEFAULT NULL,
  `StockOutType` text,
  `ToutDate` text,
  `dateenc` text,
  `TransRrno` int DEFAULT NULL,
  `suppliercode` text,
  `sqty` int DEFAULT NULL,
  `itemcode` text,
  `bcode` text,
  `pname` text,
  `sunit` text,
  `cost` int DEFAULT NULL,
  `addCharges` text,
  `TotalLineCost` int DEFAULT NULL,
  `encoderid` text,
  `readsq` text,
  `mm` int DEFAULT NULL,
  `dd` int DEFAULT NULL,
  `yyyy` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstockpur`
--

LOCK TABLES `tblstockpur` WRITE;
/*!40000 ALTER TABLE `tblstockpur` DISABLE KEYS */;
INSERT INTO `tblstockpur` VALUES (66,0,0,'P.O.','11/20/2023','11/20/2023',100001,'C100001',1,'000034','000034','FITA RED','PCS',0,'',0,'AD1001','N',11,20,2023),(67,0,0,'P.O.','11/20/2023','11/20/2023',100001,'C100001',1,'000042','000042','BFAST TOCINO','PCS',34,'',34,'AD1001','N',11,20,2023),(68,0,0,'P.O.','11/21/2023','11/21/2023',100002,'C100002',1,'000042','000042','BFAST TOCINO','PCS',89,'',89,'AD1001','N',11,21,2023),(69,0,0,'P.O.','11/21/2023','11/21/2023',100002,'C100002',1,'000043','000043','HOTDOG RED','PCS',90,'',90,'AD1001','N',11,21,2023),(70,0,0,'P.O.','11/21/2023','11/21/2023',100002,'C100002',1,'000039','000039','LUNCHEON MEAT','PCS',78,'',78,'AD1001','N',11,21,2023),(71,0,0,'P.O.','11/21/2023','11/21/2023',100003,'C100005',1,'000013','000013','MD 1','PCS',0,'',0,'AD1001','N',11,21,2023),(72,0,0,'P.O.','11/21/2023','11/21/2023',100003,'C100005',1,'000024','000024','GT GATORADE','PCS',0,'',0,'AD1001','N',11,21,2023),(73,0,0,'P.O.','11/21/2023','11/21/2023',100004,'C100001',1,'000013','000013','MD 1','PCS',0,'',0,'AD1001','N',11,21,2023),(74,0,0,'P.O.','11/21/2023','11/21/2023',100004,'C100001',1,'000024','000024','GT GATORADE','PCS',9,'',9,'AD1001','N',11,21,2023),(75,0,0,'P.O.','11/21/2023','11/21/2023',100005,'C100004',1,'000134','000134','SAMPLE','PCS',34,'',34,'AD1001','N',11,21,2023),(76,0,0,'P.O.','11/21/2023','11/21/2023',100005,'C100004',1,'000020','000020','ST STING','PCS',34,'',34,'AD1001','N',11,21,2023),(77,0,0,'P.O.','11/21/2023','11/21/2023',100006,'-',1,'000014','000014','MD 2','PCS',78,'',78,'AD1001','N',11,21,2023),(78,0,0,'P.O.','11/22/2023','11/22/2023',100007,'-',1,'000013','000013','MD 1','PCS',34,'',34,'AD1001','N',11,22,2023),(79,0,0,'P.O.','11/22/2023','11/22/2023',100007,'-',1,'000020','000020','ST STING','PCS',344,'',344,'AD1001','N',11,22,2023);
/*!40000 ALTER TABLE `tblstockpur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstockpursum`
--

DROP TABLE IF EXISTS `tblstockpursum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstockpursum` (
  `transno` int DEFAULT NULL,
  `x1` int DEFAULT NULL,
  `r1` int DEFAULT NULL,
  `TransRefNumbr` int DEFAULT NULL,
  `OutDate` text,
  `StockOutKind` text,
  `Consignee` text,
  `SuppId` text,
  `requestCheckby` text,
  `approvedby` text,
  `totalCost` double DEFAULT NULL,
  `remark` text,
  `mm` int DEFAULT NULL,
  `dd` int DEFAULT NULL,
  `yyyy` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstockpursum`
--

LOCK TABLES `tblstockpursum` WRITE;
/*!40000 ALTER TABLE `tblstockpursum` DISABLE KEYS */;
INSERT INTO `tblstockpursum` VALUES (38,0,0,100001,'11/20/2023','P.O.','SUKI','','P-MNGER','W-MNGER',34,'',11,20,2023),(39,0,0,100002,'11/21/2023','P.O.','ROSEMAR CO.','','P-MNGER','W-MNGER',257,'',11,21,2023),(40,0,0,100003,'11/21/2023','P.O.','TYRONIAN GROUP','','P-MNGER','W-MNGER',0,'',11,21,2023),(41,0,0,100004,'11/21/2023','P.O.','SUKI','C100002','P-MNGER','W-MNGER',9,'',11,21,2023),(42,0,0,100005,'11/21/2023','P.O.','NASA','C100004','P-MNGER','W-MNGER',68,'',11,21,2023),(43,0,0,100006,'11/21/2023','P.O.','-','-','P-MNGER','W-MNGER',78,'',11,21,2023),(44,0,0,100007,'11/22/2023','P.O.','-','-','P-MNGER','W-MNGER',378,'',11,22,2023);
/*!40000 ALTER TABLE `tblstockpursum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubcategory`
--

DROP TABLE IF EXISTS `tblsubcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsubcategory` (
  `unitcode` text,
  `pname` text,
  `AmtSold` double DEFAULT NULL,
  `PFT` double DEFAULT NULL,
  `temsold` text,
  `tempft` text,
  `prodn` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubcategory`
--

LOCK TABLES `tblsubcategory` WRITE;
/*!40000 ALTER TABLE `tblsubcategory` DISABLE KEYS */;
INSERT INTO `tblsubcategory` VALUES ('SC001','-',0,0,'','','');
/*!40000 ALTER TABLE `tblsubcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblunit`
--

DROP TABLE IF EXISTS `tblunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblunit` (
  `unitcode` text,
  `pname` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblunit`
--

LOCK TABLES `tblunit` WRITE;
/*!40000 ALTER TABLE `tblunit` DISABLE KEYS */;
INSERT INTO `tblunit` VALUES ('U001','PCS'),('U002','BOX'),('U003','KLS'),('U004','LTR'),('U005','SET'),('U006','CTN'),('U007','PCK'),('U008','LOD'),('U009','CUP'),('U010','SLC'),('U011','T/O'),('U012','WHL'),('U013','BTL');
/*!40000 ALTER TABLE `tblunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbluser` (
  `UseQ` int DEFAULT NULL,
  `userid` text,
  `name` text,
  `LastN` text,
  `Mi` text,
  `username` text,
  `password` text,
  `level` int DEFAULT NULL,
  `rights` text,
  `datereg` text,
  `amtsold` int DEFAULT NULL,
  `gpft` int DEFAULT NULL,
  `exp` int DEFAULT NULL,
  `netpft` int DEFAULT NULL,
  `temsold` text,
  `tempft` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser`
--

LOCK TABLES `tbluser` WRITE;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` VALUES (329,'AD1001','1','1','1','1','z',0,'Admin','10/6/2023',0,0,0,0,'0','0'),(332,'CA1004','JAYMAR','LADAC','R','JAYMAR','ZAKI2023',2,'Cashier','11/22/2023',0,0,0,0,'',''),(328,'NO1000','NONE','-','-','NONE','123456789',3,'H-Stylist','10/6/2023',0,0,0,0,'950','950');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblvoidlogs`
--

DROP TABLE IF EXISTS `tblvoidlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblvoidlogs` (
  `nos` int DEFAULT NULL,
  `Date` text,
  `TerminalID` int DEFAULT NULL,
  `TransNo` text,
  `CusName` text,
  `tsiteloc` text,
  `SalesAmt` int DEFAULT NULL,
  `salesman` text,
  `Cashier` text,
  `VoidOIC` text,
  `Reason` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblvoidlogs`
--

LOCK TABLES `tblvoidlogs` WRITE;
/*!40000 ALTER TABLE `tblvoidlogs` DISABLE KEYS */;
INSERT INTO `tblvoidlogs` VALUES (1,'11/23/2023 4:15:40 PM',101,'','X-AUT','X-AUT',0,'NO1000','AD1001','lblOIC','Void All Unfinished Transactions'),(2,'11/24/2023 11:48:29 AM',101,'','X-AUT','X-AUT',0,'NO1000','AD1001','lblOIC','Void All Unfinished Transactions');
/*!40000 ALTER TABLE `tblvoidlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzaddonselectprint`
--

DROP TABLE IF EXISTS `tblzaddonselectprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzaddonselectprint` (
  `TransNo` text,
  `TransId` text,
  `Terminal` text,
  `ItemCode` text,
  `BarCode` text,
  `InvsBatchdtCode` text,
  `PName` text,
  `Serial` text,
  `PCN` text,
  `OrderSaleTitleSerialNote` text,
  `CusId` text,
  `Qty` text,
  `Unit` text,
  `Warranty` text,
  `Cost` text,
  `totalCost` text,
  `Price` text,
  `DiscValue` text,
  `DiscDesc` text,
  `DiscAllEach` text,
  `DiscIDVerific` text,
  `DiscAmount` text,
  `DiscAddOverall` text,
  `TotalDiscount` text,
  `Profit` text,
  `TotalProfit` text,
  `TotalLineAmount` text,
  `Selltype` text,
  `Completed` text,
  `Lookup` text,
  `MM` text,
  `DD` text,
  `YYYY` text,
  `Time` text,
  `SaleCounted` text,
  `ProdInputEType` text,
  `Operator` text,
  `Salesman` text,
  `ReadSQ` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzaddonselectprint`
--

LOCK TABLES `tblzaddonselectprint` WRITE;
/*!40000 ALTER TABLE `tblzaddonselectprint` DISABLE KEYS */;
INSERT INTO `tblzaddonselectprint` VALUES ('TransNo','TransId','Terminal','ItemCode','BarCode','InvsBatchdtCode','PName','Serial','PCN','OrderSaleTitleSerialNote','CusId','Qty','Unit','Warranty','Cost','totalCost','Price','DiscValue','DiscDesc','DiscAllEach','DiscIDVerific','DiscAmount','DiscAddOverall','TotalDiscount','Profit','TotalProfit','TotalLineAmount','Selltype','Completed','Lookup','MM','DD','YYYY','Time','SaleCounted','ProdInputEType','Operator','Salesman','ReadSQ');
/*!40000 ALTER TABLE `tblzaddonselectprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzcashinandout`
--

DROP TABLE IF EXISTS `tblzcashinandout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzcashinandout` (
  `SeQ` int DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  `TypeKind` text,
  `FROM` text,
  `RECEIVER` text,
  `TID` int DEFAULT NULL,
  `Operator` text,
  `MM` int DEFAULT NULL,
  `DD` int DEFAULT NULL,
  `YYYY` int DEFAULT NULL,
  `Time` text,
  `NoteRemark` text,
  `ww` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzcashinandout`
--

LOCK TABLES `tblzcashinandout` WRITE;
/*!40000 ALTER TABLE `tblzcashinandout` DISABLE KEYS */;
INSERT INTO `tblzcashinandout` VALUES (435,3100,'SALES PAYMENT','C100000','AD1001',101,'AD1001',11,23,2023,'11:18:47 AM','Note','47'),(436,80,'SALES PAYMENT','C100000','AD1001',101,'AD1001',11,24,2023,'10:54:33 AM','Note','47'),(437,80,'SALES PAYMENT','C100000','AD1001',101,'AD1001',11,24,2023,'10:57:54 AM','Note','47'),(438,25,'SALES PAYMENT','C100000','AD1001',101,'AD1001',11,24,2023,'11:00:18 AM','Note','47'),(439,2000,'CASHOUT','OWNER','AD1001',101,'AD1001',11,24,2023,'11:05:25 AM','Notes :\n',''),(440,325,'SALES PAYMENT','C100000','AD1001',101,'AD1001',11,24,2023,'11:07:35 AM','Note','47'),(441,25,'SALES PAYMENT','C100000','AD1001',101,'AD1001',11,24,2023,'11:14:13 AM','Note','47'),(442,703,'SALES PAYMENT','C100000','AD1001',101,'AD1001',1,5,2024,'11:09:53 PM','Note','1');
/*!40000 ALTER TABLE `tblzcashinandout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzcashinnoutreset`
--

DROP TABLE IF EXISTS `tblzcashinnoutreset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzcashinnoutreset` (
  `Seq` text,
  `DateAct` text,
  `TimeAct` text,
  `blnceAmt` text,
  `operator` text,
  `sf` text,
  `salespay` text,
  `othercin` text,
  `exv` text,
  `salerefund` text,
  `withdrawals` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzcashinnoutreset`
--

LOCK TABLES `tblzcashinnoutreset` WRITE;
/*!40000 ALTER TABLE `tblzcashinnoutreset` DISABLE KEYS */;
INSERT INTO `tblzcashinnoutreset` VALUES ('Seq','DateAct','TimeAct','blnceAmt','operator','sf','salespay','othercin','exv','salerefund','withdrawals');
/*!40000 ALTER TABLE `tblzcashinnoutreset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzcdraweropenhistory`
--

DROP TABLE IF EXISTS `tblzcdraweropenhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzcdraweropenhistory` (
  `SeQ` text,
  `Transid` text,
  `TID` text,
  `mm` text,
  `dd` text,
  `yyyy` text,
  `time` text,
  `cashier` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzcdraweropenhistory`
--

LOCK TABLES `tblzcdraweropenhistory` WRITE;
/*!40000 ALTER TABLE `tblzcdraweropenhistory` DISABLE KEYS */;
INSERT INTO `tblzcdraweropenhistory` VALUES ('SeQ','Transid','TID','mm','dd','yyyy','time','cashier');
/*!40000 ALTER TABLE `tblzcdraweropenhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzdeliveryopt`
--

DROP TABLE IF EXISTS `tblzdeliveryopt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzdeliveryopt` (
  `unitcode` text,
  `pname` text,
  `AmtSold` text,
  `pft` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzdeliveryopt`
--

LOCK TABLES `tblzdeliveryopt` WRITE;
/*!40000 ALTER TABLE `tblzdeliveryopt` DISABLE KEYS */;
INSERT INTO `tblzdeliveryopt` VALUES ('D001','INSTORE','',''),('D002','COD','',''),('D003','MEETUP','',''),('D004','SHIPMENT','','');
/*!40000 ALTER TABLE `tblzdeliveryopt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzexpensecategory`
--

DROP TABLE IF EXISTS `tblzexpensecategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzexpensecategory` (
  `unitcode` text,
  `pname` text,
  `AmtSold` text,
  `pft` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzexpensecategory`
--

LOCK TABLES `tblzexpensecategory` WRITE;
/*!40000 ALTER TABLE `tblzexpensecategory` DISABLE KEYS */;
INSERT INTO `tblzexpensecategory` VALUES ('EX0001','OTHERS','',''),('EX0002','ELECTRIC BILL','',''),('EX0003','WATER BILL','',''),('EX0004','RENTAL','',''),('EX0005','SALARY','',''),('EX0006','OFFICE SUPPLIES','0.00',''),('EX0007','TRAVEL EXP.','0.00',''),('EX0008','SNACKS','0.00','');
/*!40000 ALTER TABLE `tblzexpensecategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzlodcounter`
--

DROP TABLE IF EXISTS `tblzlodcounter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzlodcounter` (
  `SeQ` text,
  `transid` text,
  `Amount` text,
  `TypeKind` text,
  `FROM` text,
  `RECEIVER` text,
  `TID` text,
  `Operator` text,
  `MM` text,
  `DD` text,
  `YYYY` text,
  `Time` text,
  `NoteRemark` text,
  `ww` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzlodcounter`
--

LOCK TABLES `tblzlodcounter` WRITE;
/*!40000 ALTER TABLE `tblzlodcounter` DISABLE KEYS */;
INSERT INTO `tblzlodcounter` VALUES ('SeQ','transid','Amount','TypeKind','FROM','RECEIVER','TID','Operator','MM','DD','YYYY','Time','NoteRemark','ww');
/*!40000 ALTER TABLE `tblzlodcounter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzmultipay`
--

DROP TABLE IF EXISTS `tblzmultipay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzmultipay` (
  `seq` text,
  `transno` text,
  `customer` text,
  `payable` text,
  `paidby` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzmultipay`
--

LOCK TABLES `tblzmultipay` WRITE;
/*!40000 ALTER TABLE `tblzmultipay` DISABLE KEYS */;
INSERT INTO `tblzmultipay` VALUES ('seq','transno','customer','payable','paidby');
/*!40000 ALTER TABLE `tblzmultipay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblznotes`
--

DROP TABLE IF EXISTS `tblznotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblznotes` (
  `txttitle1` text,
  `txttitle2` text,
  `txttitle3` text,
  `txtnote1` text,
  `txtnote2` text,
  `txtnote3` text,
  `txtadminjobs` text,
  `txtmarketing` text,
  `txtproduction` text,
  `txtsupport` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblznotes`
--

LOCK TABLES `tblznotes` WRITE;
/*!40000 ALTER TABLE `tblznotes` DISABLE KEYS */;
INSERT INTO `tblznotes` VALUES ('Announcement','Priority','To Do','Meeting will be weekends','Be honest and Sell More!','We are Excited And Happy!','','','','');
/*!40000 ALTER TABLE `tblznotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu`
--

DROP TABLE IF EXISTS `tblzphotomenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu`
--

LOCK TABLES `tblzphotomenu` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu` DISABLE KEYS */;
INSERT INTO `tblzphotomenu` VALUES ('000001','D:\\BizPos60\\Utilities\\Final Menu\\1.bmp','000002','D:\\BizPos60\\Utilities\\Final Menu\\2.bmp','000003','D:\\BizPos60\\Utilities\\Final Menu\\3.bmp','000004','D:\\BizPos60\\Utilities\\Final Menu\\4.bmp','000005','D:\\BizPos60\\Utilities\\Final Menu\\5.bmp','000006','D:\\BizPos60\\Utilities\\Final Menu\\6.bmp','000007','D:\\BizPos60\\Utilities\\Final Menu\\7.bmp','000008','D:\\BizPos60\\Utilities\\Final Menu\\8.bmp','000009','D:\\BizPos60\\Utilities\\Final Menu\\9.bmp','000009','D:\\BizPos60\\Utilities\\Final Menu\\10.bmp','000010','D:\\BizPos60\\Utilities\\Final Menu\\11.bmp','000012','D:\\BizPos60\\Utilities\\Final Menu\\12.bmp','000013','D:\\BizPos60\\Utilities\\Final Menu\\13.bmp','000014','D:\\BizPos60\\Utilities\\Final Menu\\14.bmp','000015','D:\\BizPos60\\Utilities\\Final Menu\\15.bmp','000014','>','000014','>','>','>','>','>','>','>','>','>','Men&u 1','Men&u 2','Men&u 3','Men&u 4','Men&u 5','','',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu0btn`
--

DROP TABLE IF EXISTS `tblzphotomenu0btn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu0btn` (
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `mnu13` text,
  `mnu14` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu0btn`
--

LOCK TABLES `tblzphotomenu0btn` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu0btn` DISABLE KEYS */;
INSERT INTO `tblzphotomenu0btn` VALUES ('M&enu 1','M&enu 2','M&enu 3','M&enu 4','M&enu 5','M&enu 6','M&enu 7','M&enu 8','M&enu 9','M&enu 10','M&enu 11','M&enu 12','M&enu 13','M&enu 14',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu0btn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu1`
--

DROP TABLE IF EXISTS `tblzphotomenu1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu1` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu1`
--

LOCK TABLES `tblzphotomenu1` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu1` DISABLE KEYS */;
INSERT INTO `tblzphotomenu1` VALUES ('000004','D:\\For restaurant PIC\\BURGER DELIGHT.jpg','000005','D:\\For restaurant PIC\\CHEESE BUGRER DELIGHT.jpg','000007','D:\\For restaurant PIC\\DOUBLE BURGER DELIGHT.jpg','>','','000015','D:\\For restaurant PIC\\MIRINDA.jpg','000017','D:\\For restaurant PIC\\PEPSI 12OZ.jpg','000016','D:\\For restaurant PIC\\PEPSI 8OZ.jpg','000008','D:\\For restaurant PIC\\FOOTLONG.jpg','000010','D:\\For restaurant PIC\\CHEESE HOTDOG DELIGHT.jpg','000011','D:\\For restaurant PIC\\TAPA EXPRESS.jpg','>','>','000018','D:\\For restaurant PIC\\STING.jpg','000020','E:\\cookies-and-cream-milk.jpg','000019','E:\\red-velvet-milk-tea.jpg','000012','D:\\For restaurant PIC\\HOTDOG EXPRESS.jpg','000013','D:\\For restaurant PIC\\LUNCHEON MEAT EXPRESS.jpg','000014','D:\\For restaurant PIC\\PANCAKE.jpg','>','>','000021','E:\\royal-slim-1-300x300-1.jpg','000022','E:\\coffee pic\\americano.jpg','000023','E:\\coffee pic\\mocha.jpg','M&enu 1','M&enu 2','M&enu 3','M&enu 4','M&enu 5','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu10`
--

DROP TABLE IF EXISTS `tblzphotomenu10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu10` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu10`
--

LOCK TABLES `tblzphotomenu10` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu10` DISABLE KEYS */;
INSERT INTO `tblzphotomenu10` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','BURGERS','HOTDOG','BREAKFAST MEAL','BEVERAGES','FROZEN FOOD','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu11`
--

DROP TABLE IF EXISTS `tblzphotomenu11`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu11` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu11`
--

LOCK TABLES `tblzphotomenu11` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu11` DISABLE KEYS */;
INSERT INTO `tblzphotomenu11` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','BURGERS','HOTDOG','BREAKFAST MEAL','BEVERAGES','FROZEN FOOD','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu11` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu12`
--

DROP TABLE IF EXISTS `tblzphotomenu12`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu12` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu12`
--

LOCK TABLES `tblzphotomenu12` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu12` DISABLE KEYS */;
INSERT INTO `tblzphotomenu12` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','BURGERS','HOTDOG','BREAKFAST MEAL','BEVERAGES','FROZEN FOOD','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu12` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu13`
--

DROP TABLE IF EXISTS `tblzphotomenu13`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu13` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu13`
--

LOCK TABLES `tblzphotomenu13` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu13` DISABLE KEYS */;
INSERT INTO `tblzphotomenu13` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','BURGERS','HOTDOG','BREAKFAST MEAL','BEVERAGES','FROZEN FOOD','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu13` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu14`
--

DROP TABLE IF EXISTS `tblzphotomenu14`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu14` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` text,
  `sdwp` text,
  `sempt` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu14`
--

LOCK TABLES `tblzphotomenu14` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu14` DISABLE KEYS */;
INSERT INTO `tblzphotomenu14` VALUES ('Pbcode1','ppath1','Pbcode2','ppath2','Pbcode3','ppath3','Pbcode4','ppath4','Pbcode5','ppath5','Pbcode6','ppath6','Pbcode7','ppath7','Pbcode8','ppath8','Pbcode9','ppath9','Pbcode10','ppath10','Pbcode11','ppath11','Pbcode12','ppath12','Pbcode13','ppath13','Pbcode14','ppath14','Pbcode15','ppath15','Pbcode16','ppath16','Pbcode17','ppath17','Pbcode18','ppath18','Pbcode19','ppath19','Pbcode20','ppath20','Pbcode21','ppath21','mnu1','mnu2','mnu3','mnu4','mnu5','mnu6','mnu7','mnu8','mnu9','mnu10','mnu11','mnu12','ssrp','sdwp','sempt');
/*!40000 ALTER TABLE `tblzphotomenu14` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu2`
--

DROP TABLE IF EXISTS `tblzphotomenu2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu2` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu2`
--

LOCK TABLES `tblzphotomenu2` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu2` DISABLE KEYS */;
INSERT INTO `tblzphotomenu2` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','M&enu 1','M&enu 2','M&enu 3','M&enu 4','M&enu 5','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu3`
--

DROP TABLE IF EXISTS `tblzphotomenu3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu3` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu3`
--

LOCK TABLES `tblzphotomenu3` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu3` DISABLE KEYS */;
INSERT INTO `tblzphotomenu3` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','M&enu 1','M&enu 2','M&enu 3','M&enu 4','M&enu 5','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu4`
--

DROP TABLE IF EXISTS `tblzphotomenu4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu4` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu4`
--

LOCK TABLES `tblzphotomenu4` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu4` DISABLE KEYS */;
INSERT INTO `tblzphotomenu4` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','M&enu 1','M&enu 2','M&enu 3','M&enu 4','M&enu 5','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu5`
--

DROP TABLE IF EXISTS `tblzphotomenu5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu5` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu5`
--

LOCK TABLES `tblzphotomenu5` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu5` DISABLE KEYS */;
INSERT INTO `tblzphotomenu5` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','M&enu 1','M&enu 2','M&enu 3','M&enu 4','M&enu 5','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu6`
--

DROP TABLE IF EXISTS `tblzphotomenu6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu6` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu6`
--

LOCK TABLES `tblzphotomenu6` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu6` DISABLE KEYS */;
INSERT INTO `tblzphotomenu6` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','BURGERS','HOTDOG','BREAKFAST MEAL','BEVERAGES','FROZEN FOOD','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu7`
--

DROP TABLE IF EXISTS `tblzphotomenu7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu7` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu7`
--

LOCK TABLES `tblzphotomenu7` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu7` DISABLE KEYS */;
INSERT INTO `tblzphotomenu7` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','BURGERS','HOTDOG','BREAKFAST MEAL','BEVERAGES','FROZEN FOOD','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu7` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu8`
--

DROP TABLE IF EXISTS `tblzphotomenu8`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu8` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu8`
--

LOCK TABLES `tblzphotomenu8` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu8` DISABLE KEYS */;
INSERT INTO `tblzphotomenu8` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','BURGERS','HOTDOG','BREAKFAST MEAL','BEVERAGES','FROZEN FOOD','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu8` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzphotomenu9`
--

DROP TABLE IF EXISTS `tblzphotomenu9`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzphotomenu9` (
  `Pbcode1` text,
  `ppath1` text,
  `Pbcode2` text,
  `ppath2` text,
  `Pbcode3` text,
  `ppath3` text,
  `Pbcode4` text,
  `ppath4` text,
  `Pbcode5` text,
  `ppath5` text,
  `Pbcode6` text,
  `ppath6` text,
  `Pbcode7` text,
  `ppath7` text,
  `Pbcode8` text,
  `ppath8` text,
  `Pbcode9` text,
  `ppath9` text,
  `Pbcode10` text,
  `ppath10` text,
  `Pbcode11` text,
  `ppath11` text,
  `Pbcode12` text,
  `ppath12` text,
  `Pbcode13` text,
  `ppath13` text,
  `Pbcode14` text,
  `ppath14` text,
  `Pbcode15` text,
  `ppath15` text,
  `Pbcode16` text,
  `ppath16` text,
  `Pbcode17` text,
  `ppath17` text,
  `Pbcode18` text,
  `ppath18` text,
  `Pbcode19` text,
  `ppath19` text,
  `Pbcode20` text,
  `ppath20` text,
  `Pbcode21` text,
  `ppath21` text,
  `mnu1` text,
  `mnu2` text,
  `mnu3` text,
  `mnu4` text,
  `mnu5` text,
  `mnu6` text,
  `mnu7` text,
  `mnu8` text,
  `mnu9` text,
  `mnu10` text,
  `mnu11` text,
  `mnu12` text,
  `ssrp` int DEFAULT NULL,
  `sdwp` int DEFAULT NULL,
  `sempt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzphotomenu9`
--

LOCK TABLES `tblzphotomenu9` WRITE;
/*!40000 ALTER TABLE `tblzphotomenu9` DISABLE KEYS */;
INSERT INTO `tblzphotomenu9` VALUES ('>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','>','BURGERS','HOTDOG','BREAKFAST MEAL','BEVERAGES','FROZEN FOOD','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu','M&enu',1,1,1);
/*!40000 ALTER TABLE `tblzphotomenu9` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzquickpicks`
--

DROP TABLE IF EXISTS `tblzquickpicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzquickpicks` (
  `Seq` text,
  `sorter` text,
  `pcode` text,
  `bcode` text,
  `pname` text,
  `NosClick` text,
  `price` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzquickpicks`
--

LOCK TABLES `tblzquickpicks` WRITE;
/*!40000 ALTER TABLE `tblzquickpicks` DISABLE KEYS */;
INSERT INTO `tblzquickpicks` VALUES ('Seq','sorter','pcode','bcode','pname','NosClick','price');
/*!40000 ALTER TABLE `tblzquickpicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzquota`
--

DROP TABLE IF EXISTS `tblzquota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzquota` (
  `DSales` int DEFAULT NULL,
  `DRevnue` int DEFAULT NULL,
  `DNetpft` int DEFAULT NULL,
  `MSales` int DEFAULT NULL,
  `MRevnue` int DEFAULT NULL,
  `MNetpft` int DEFAULT NULL,
  `YSales` int DEFAULT NULL,
  `YRevnue` int DEFAULT NULL,
  `YNetpft` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzquota`
--

LOCK TABLES `tblzquota` WRITE;
/*!40000 ALTER TABLE `tblzquota` DISABLE KEYS */;
INSERT INTO `tblzquota` VALUES (35000,4000,3000,500000,250000,100000,10000,10000,5000);
/*!40000 ALTER TABLE `tblzquota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblzvaluedemonation`
--

DROP TABLE IF EXISTS `tblzvaluedemonation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblzvaluedemonation` (
  `seq` int DEFAULT NULL,
  `branch` text,
  `dte` text,
  `tme` text,
  `total1` text,
  `qty1` int DEFAULT NULL,
  `total2` text,
  `qty2` int DEFAULT NULL,
  `total3` text,
  `qty3` int DEFAULT NULL,
  `total4` double DEFAULT NULL,
  `qty4` int DEFAULT NULL,
  `total5` double DEFAULT NULL,
  `qty5` int DEFAULT NULL,
  `total6` double DEFAULT NULL,
  `qty6` int DEFAULT NULL,
  `total7` double DEFAULT NULL,
  `qty7` int DEFAULT NULL,
  `total8` double DEFAULT NULL,
  `qty8` int DEFAULT NULL,
  `total9` double DEFAULT NULL,
  `qty9` int DEFAULT NULL,
  `total10` double DEFAULT NULL,
  `qty10` int DEFAULT NULL,
  `total11` double DEFAULT NULL,
  `qty11` int DEFAULT NULL,
  `total12` double DEFAULT NULL,
  `qty12` int DEFAULT NULL,
  `total13` double DEFAULT NULL,
  `qty13` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblzvaluedemonation`
--

LOCK TABLES `tblzvaluedemonation` WRITE;
/*!40000 ALTER TABLE `tblzvaluedemonation` DISABLE KEYS */;
INSERT INTO `tblzvaluedemonation` VALUES (34,'XYZ PH BRANCH','01/17/2023','02:50 PM','5,000.00',5,'2,000.00',4,'600.00',3,200,2,200,4,100,5,60,6,15,3,4,4,2.25,3,0.5,2,0.3,3,0.2,4),(35,'XYZ PH BRANCH','01/17/2023','02:53 PM','0.00',0,'0.00',0,'0.00',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0.05,1),(36,'XYZ PH BRANCH','01/17/2023','02:57 PM','2,000.00',2,'1,500.00',3,'8,600.00',43,200,2,150,3,860,43,30,3,15,3,4,4,3.75,5,1.5,6,0.4,4,0.15,3),(37,'XYZ PH BRANCH','01/17/2023','02:57 PM','2,000.00',2,'1,500.00',3,'8,600.00',43,200,2,150,3,860,43,30,3,15,3,4,4,3.75,5,1.5,6,0.4,4,0.15,3),(38,'XYZ PH BRANCH','01/17/2023','03:23 PM','1,000.00',1,'0.00',0,'0.00',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `tblzvaluedemonation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbyloginlog`
--

DROP TABLE IF EXISTS `tbyloginlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbyloginlog` (
  `SeQ` int DEFAULT NULL,
  `UserID` text,
  `UserN` text,
  `logT` text,
  `level` text,
  `TID` int DEFAULT NULL,
  `dd` text,
  `mm` int DEFAULT NULL,
  `yyyy` int DEFAULT NULL,
  `time` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbyloginlog`
--

LOCK TABLES `tbyloginlog` WRITE;
/*!40000 ALTER TABLE `tbyloginlog` DISABLE KEYS */;
INSERT INTO `tbyloginlog` VALUES (338,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'10:56:37 PM'),(339,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'11:12:09 PM'),(340,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:01:40 AM'),(341,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:02:57 AM'),(342,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:06:21 AM'),(343,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:09:33 AM'),(344,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:30:11 AM'),(345,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:45:00 AM'),(346,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:04:11 AM'),(347,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:22:35 AM'),(348,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'03:25:31 AM'),(349,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'03:28:48 AM'),(350,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'03:32:04 AM'),(351,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'03:44:18 AM'),(352,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:54:50 AM'),(353,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:57:03 AM'),(354,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'04:03:48 AM'),(355,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'04:09:00 AM'),(356,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:15:59 AM'),(357,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:17:51 AM'),(358,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:23:51 AM'),(359,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'04:25:16 AM'),(360,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:25:52 AM'),(361,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:27:50 AM'),(362,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:31:17 AM'),(363,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'12:17:26 PM'),(364,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'12:18:04 PM'),(365,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'12:22:29 PM'),(366,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'12:25:42 PM'),(367,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'12:49:08 PM'),(368,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'12:54:29 PM'),(369,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'01:09:43 PM'),(370,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'01:17:58 PM'),(371,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'01:21:39 PM'),(372,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'01:26:37 PM'),(373,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'01:41:53 PM'),(374,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'01:46:59 PM'),(266,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'09:47:17 AM'),(229,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'06:07:20 PM'),(230,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'06:07:42 PM'),(231,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'10:47:54 PM'),(232,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'10:51:23 PM'),(233,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'10:53:24 PM'),(234,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:28:11 PM'),(235,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:29:34 PM'),(236,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:32:52 PM'),(237,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:34:22 PM'),(238,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:35:53 PM'),(239,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:38:04 PM'),(240,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:40:10 PM'),(241,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:44:16 PM'),(242,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',10,2023,'11:45:42 PM'),(243,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:02:58 AM'),(244,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:10:55 AM'),(245,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:18:53 AM'),(246,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:23:59 AM'),(247,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:27:14 AM'),(248,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:28:26 AM'),(249,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:29:37 AM'),(250,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:30:07 AM'),(251,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:45:33 AM'),(252,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:03:39 AM'),(253,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:19:38 AM'),(254,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:25:35 AM'),(255,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:30:52 AM'),(256,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:34:07 AM'),(257,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:38:25 AM'),(258,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:48:38 AM'),(259,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:00:46 AM'),(260,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:03:03 AM'),(261,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:03:58 AM'),(262,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:22:49 AM'),(263,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:27:33 AM'),(264,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:29:18 AM'),(265,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:34:38 AM'),(267,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'10:53:13 AM'),(268,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'10:56:14 AM'),(269,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'10:56:43 AM'),(270,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'10:57:51 AM'),(271,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'10:58:18 AM'),(272,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'11:00:55 AM'),(273,'AD1001','1 1. 1','OFF L1','0 | Admin',101,'07',10,2023,'11:00:56 AM'),(274,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'11:17:55 AM'),(275,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'11:18:15 AM'),(276,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'11:18:18 AM'),(277,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'11:18:19 AM'),(278,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'11:18:25 AM'),(279,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'07',10,2023,'11:18:28 AM'),(280,'AD1001','ADMIN','OUT M1','0 | ADMIN',101,'07',10,2023,'11:19:55 AM'),(281,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'11:19:59 AM'),(282,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'11:25:39 AM'),(283,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'11:25:45 AM'),(284,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'11:25:49 AM'),(285,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'11:28:10 AM'),(286,'CA1003','C C. C','OUT M1','2 | Cashier',101,'07',10,2023,'11:29:06 AM'),(287,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'11:29:08 AM'),(288,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:06:05 PM'),(289,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'12:06:12 PM'),(290,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'12:06:16 PM'),(291,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:11:25 PM'),(292,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'12:11:33 PM'),(293,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'12:11:36 PM'),(294,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:48:29 PM'),(295,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:57:36 PM'),(296,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'12:59:54 PM'),(297,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'07',10,2023,'01:01:50 PM'),(298,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:03:36 PM'),(299,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:06:01 PM'),(300,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:07:08 PM'),(301,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:09:40 PM'),(302,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:11:46 PM'),(303,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:36:14 PM'),(304,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:40:37 PM'),(305,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:41:01 PM'),(306,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:44:11 PM'),(307,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'01:45:35 PM'),(308,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'01:45:44 PM'),(309,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:50:19 PM'),(310,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'01:50:39 PM'),(311,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'01:50:43 PM'),(312,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'01:55:03 PM'),(313,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'01:56:09 PM'),(314,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'01:56:12 PM'),(315,'CA1003','C C. C','OUT M1','2 | Cashier',101,'07',10,2023,'02:02:33 PM'),(316,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:02:35 PM'),(317,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'07',10,2023,'02:05:23 PM'),(318,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:07:33 PM'),(319,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'02:07:35 PM'),(320,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'02:07:38 PM'),(321,'CA1003','C C. C','OUT M1','2 | Cashier',101,'07',10,2023,'02:10:04 PM'),(322,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'07',10,2023,'02:10:09 PM'),(323,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'02:51:25 PM'),(324,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'03:19:59 PM'),(325,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'03:32:39 PM'),(326,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'03:40:24 PM'),(327,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'03:40:27 PM'),(328,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'03:40:29 PM'),(329,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'03:43:47 PM'),(330,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'03:46:02 PM'),(331,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'03:46:05 PM'),(332,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'03:46:08 PM'),(333,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'03:47:43 PM'),(334,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'03:49:53 PM'),(335,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',10,2023,'10:43:10 PM'),(336,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'07',10,2023,'10:44:23 PM'),(337,'CA1003','C C. C','IN-UP','2 | Cashier',101,'07',10,2023,'10:44:27 PM'),(375,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'01:53:12 PM'),(376,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'01:59:15 PM'),(377,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'02:05:25 PM'),(378,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'02:19:06 PM'),(379,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'02:32:30 PM'),(380,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'02:33:13 PM'),(381,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:39:54 PM'),(382,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'02:42:25 PM'),(383,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'02:43:55 PM'),(384,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:48:12 PM'),(385,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'02:55:39 PM'),(386,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'02:58:39 PM'),(387,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:10:08 PM'),(388,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'03:10:54 PM'),(389,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:12:22 PM'),(390,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:25:25 PM'),(391,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:29:46 PM'),(392,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'03:31:09 PM'),(393,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:34:07 PM'),(394,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:35:00 PM'),(395,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:44:54 PM'),(396,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:51:28 PM'),(397,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'03:53:52 PM'),(398,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:57:05 PM'),(399,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'03:59:03 PM'),(400,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'04:02:54 PM'),(401,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:06:01 PM'),(402,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:11:35 PM'),(403,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:12:40 PM'),(404,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'04:14:45 PM'),(405,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:16:18 PM'),(406,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'04:18:04 PM'),(407,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:27:34 PM'),(408,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'04:29:52 PM'),(409,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:31:45 PM'),(410,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',10,2023,'04:36:12 PM'),(411,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:46:13 PM'),(412,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'08',10,2023,'04:56:04 PM'),(413,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'09',10,2023,'03:49:44 PM'),(414,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'09',10,2023,'03:50:30 PM'),(415,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'03:03:32 PM'),(416,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'04:04:14 PM'),(417,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'04:45:28 PM'),(418,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'04:47:02 PM'),(419,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'05:20:13 PM'),(420,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'05:21:49 PM'),(421,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'06:14:25 PM'),(422,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'06:16:02 PM'),(423,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'06:18:42 PM'),(424,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'06:29:15 PM'),(425,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'06:33:40 PM'),(426,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'06:36:24 PM'),(427,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'06:38:38 PM'),(428,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'09:10:50 PM'),(429,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',10,2023,'09:13:13 PM'),(430,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'22',10,2023,'12:26:37 PM'),(431,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'12:56:05 PM'),(432,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'01:25:23 PM'),(433,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'01:36:35 PM'),(434,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'01:49:52 PM'),(435,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'04:31:44 PM'),(436,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'04:32:39 PM'),(437,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'22',10,2023,'04:33:57 PM'),(438,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'04:36:16 PM'),(439,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'22',10,2023,'04:56:19 PM'),(440,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'04:58:25 PM'),(441,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'05:05:20 PM'),(442,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'11:00:09 PM'),(443,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'11:11:16 PM'),(444,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'11:19:09 PM'),(445,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'11:24:56 PM'),(446,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'11:42:52 PM'),(447,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'11:45:26 PM'),(448,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',10,2023,'11:50:18 PM'),(449,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:08:32 AM'),(450,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:09:56 AM'),(451,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:11:16 AM'),(452,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:11:55 AM'),(453,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:12:17 AM'),(454,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:13:27 AM'),(455,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:20:51 AM'),(456,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:24:44 AM'),(457,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:26:47 AM'),(458,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'12:35:09 AM'),(459,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'01:18:17 AM'),(460,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'01:20:07 AM'),(461,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'01:26:13 AM'),(462,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'23',10,2023,'01:29:36 AM'),(463,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'01:34:56 AM'),(464,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'01:42:32 AM'),(465,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'23',10,2023,'01:45:01 AM'),(466,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:47:01 AM'),(467,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:47:59 AM'),(468,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:48:44 AM'),(469,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:49:57 AM'),(470,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:50:19 AM'),(471,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:59:20 AM'),(472,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:04:52 AM'),(473,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:05:21 AM'),(474,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:07:14 AM'),(475,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:07:44 AM'),(476,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:19:25 AM'),(477,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:26:29 AM'),(478,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:28:37 AM'),(479,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:33:47 AM'),(480,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'23',10,2023,'03:49:44 AM'),(481,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:57:28 AM'),(482,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'03:59:23 AM'),(483,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:01:33 AM'),(484,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:04:17 AM'),(485,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:19:05 AM'),(523,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:06:22 PM'),(524,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:09:17 PM'),(525,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'08:11:16 PM'),(526,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:12:31 PM'),(527,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'08:13:39 PM'),(528,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:18:56 PM'),(529,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:26:36 PM'),(530,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:28:04 PM'),(531,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:29:32 PM'),(532,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'08:31:29 PM'),(533,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:34:04 PM'),(534,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'08:36:59 PM'),(535,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:39:21 PM'),(536,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:40:24 PM'),(537,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:41:03 PM'),(538,'-','-','OFF L1','-',101,'01',11,2023,'08:41:43 PM'),(539,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:42:15 PM'),(540,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:43:48 PM'),(541,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:46:05 PM'),(542,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'08:47:57 PM'),(543,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:52:54 PM'),(544,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'09:04:29 PM'),(545,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'09:05:04 PM'),(546,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'09:07:17 PM'),(547,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'09:09:27 PM'),(548,'AD1001','ADMIN','EXT AP','0 | ADMIN',101,'01',11,2023,'09:19:05 PM'),(549,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'09:19:20 PM'),(550,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'09:27:27 PM'),(551,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'09:41:29 PM'),(552,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'10:01:19 PM'),(553,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'10:03:36 PM'),(554,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'10:28:08 PM'),(555,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'10:39:01 PM'),(556,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'10:41:29 PM'),(557,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'10:50:29 PM'),(558,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'11:02:13 PM'),(559,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'11:20:16 PM'),(708,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:10:36 PM'),(709,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:13:12 PM'),(710,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:14:11 PM'),(711,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:57:54 PM'),(712,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:00:37 PM'),(713,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:11:28 PM'),(714,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:29:14 PM'),(715,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:30:48 PM'),(716,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:41:58 PM'),(717,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:52:26 PM'),(718,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:55:17 PM'),(719,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'05:10:35 PM'),(720,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'05:18:10 PM'),(721,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'05:45:48 PM'),(722,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'05:49:26 PM'),(723,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'05:53:38 PM'),(724,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'05:54:39 PM'),(725,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'05:56:05 PM'),(726,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'10:36:12 PM'),(727,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'10:40:00 PM'),(728,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'10:40:55 PM'),(729,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'11:43:45 PM'),(730,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'11:47:58 PM'),(731,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:31:56 AM'),(732,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:39:30 AM'),(733,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:41:58 AM'),(734,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:43:33 AM'),(735,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:44:43 AM'),(736,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:49:19 AM'),(737,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:58:38 AM'),(738,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:03:36 AM'),(739,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:06:47 AM'),(740,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:10:04 AM'),(741,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:17:51 AM'),(742,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:22:33 AM'),(743,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:30:07 AM'),(744,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:41:34 AM'),(486,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'23',10,2023,'04:25:14 AM'),(487,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:27:44 AM'),(488,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:29:01 AM'),(489,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:47:38 AM'),(490,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:56:06 AM'),(491,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:56:59 AM'),(492,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'04:59:00 AM'),(493,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'05:01:05 AM'),(494,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'01:26:42 PM'),(495,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'01:33:40 PM'),(496,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:11:50 PM'),(497,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:13:02 PM'),(498,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'02:26:45 PM'),(499,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',10,2023,'05:51:31 PM'),(500,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'26',10,2023,'08:23:40 PM'),(501,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'26',10,2023,'09:35:39 PM'),(502,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'03:34:06 PM'),(503,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'03:41:54 PM'),(504,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'03:45:45 PM'),(505,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'04:07:36 PM'),(506,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'04:08:15 PM'),(507,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'04:09:35 PM'),(508,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'04:10:55 PM'),(509,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'04:16:30 PM'),(510,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'04:17:04 PM'),(511,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'04:30:35 PM'),(512,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'04:31:27 PM'),(513,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'05:24:42 PM'),(514,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'05:44:38 PM'),(515,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'05:59:15 PM'),(516,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'06:47:32 PM'),(517,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'06:54:18 PM'),(518,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'06:55:15 PM'),(519,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'06:57:24 PM'),(520,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:01:25 PM'),(521,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'08:02:37 PM'),(522,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'08:04:40 PM'),(560,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'01',11,2023,'11:22:28 PM'),(561,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'01',11,2023,'11:35:13 PM'),(562,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:00:25 AM'),(563,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:03:17 AM'),(564,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:06:19 AM'),(565,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:09:21 AM'),(566,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:11:55 AM'),(567,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:14:18 AM'),(568,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'02',11,2023,'12:19:48 AM'),(569,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:22:39 AM'),(570,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:26:23 AM'),(571,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:27:33 AM'),(572,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:32:41 AM'),(573,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:41:25 AM'),(574,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:43:05 AM'),(575,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:44:20 AM'),(576,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'12:57:05 AM'),(577,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'01:05:29 AM'),(578,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'01:14:54 AM'),(579,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'01:21:42 AM'),(580,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'01:42:40 AM'),(581,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'01:50:41 AM'),(582,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'01:54:55 AM'),(583,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'02:02:24 AM'),(584,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'02',11,2023,'02:37:59 AM'),(585,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'02',11,2023,'02:40:51 AM'),(586,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'02:45:16 AM'),(587,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'02:50:52 AM'),(588,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'02',11,2023,'02:56:34 AM'),(589,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'02',11,2023,'03:00:18 AM'),(590,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:03:03 AM'),(591,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:08:35 AM'),(592,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:09:34 AM'),(593,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:19:34 AM'),(594,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:31:31 AM'),(595,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:33:57 AM'),(596,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:37:26 AM'),(745,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:48:58 AM'),(746,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:54:24 AM'),(747,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:58:22 AM'),(748,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:00:36 AM'),(749,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:03:35 AM'),(750,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:11:40 AM'),(751,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:27:28 AM'),(752,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:41:48 AM'),(753,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:43:51 AM'),(754,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:48:04 AM'),(755,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:50:20 AM'),(756,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:54:22 AM'),(757,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:55:49 AM'),(758,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'09:57:14 AM'),(759,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:02:30 AM'),(760,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:04:30 AM'),(761,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:16:31 AM'),(762,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:17:58 AM'),(763,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:23:02 AM'),(764,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:32:49 AM'),(765,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:41:12 AM'),(766,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:45:14 AM'),(767,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:48:28 AM'),(768,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:05:50 AM'),(769,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:07:58 AM'),(770,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:09:57 AM'),(771,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:15:12 AM'),(772,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:19:37 AM'),(773,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:21:28 AM'),(774,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:21:48 AM'),(775,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:24:49 AM'),(776,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:27:53 AM'),(777,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:29:06 AM'),(778,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:30:22 AM'),(779,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:30:50 AM'),(780,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:32:35 AM'),(781,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:36:28 AM'),(597,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:42:45 AM'),(598,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:49:09 AM'),(599,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:56:38 AM'),(600,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:58:21 AM'),(601,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:00:38 AM'),(602,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:01:40 AM'),(603,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:12:42 AM'),(604,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:17:33 AM'),(605,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:21:53 AM'),(606,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:24:09 AM'),(607,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:26:47 AM'),(608,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:27:45 AM'),(609,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:28:27 AM'),(610,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:42:23 AM'),(611,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:49:09 AM'),(612,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:51:28 AM'),(613,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:54:37 AM'),(614,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:56:16 AM'),(615,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:58:06 AM'),(616,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:59:31 AM'),(617,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'01:31:22 PM'),(618,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:42:29 PM'),(619,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'03:54:21 PM'),(620,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:10:21 PM'),(621,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:17:45 PM'),(622,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:21:14 PM'),(623,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:37:06 PM'),(624,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:39:12 PM'),(625,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:41:30 PM'),(626,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:43:29 PM'),(627,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:48:53 PM'),(628,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:50:27 PM'),(629,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:56:26 PM'),(630,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'02',11,2023,'04:58:37 PM'),(631,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'10:30:39 AM'),(632,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'11:06:53 AM'),(633,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'11:07:59 AM'),(782,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:39:33 AM'),(783,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:42:18 AM'),(784,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:45:41 AM'),(785,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:52:18 AM'),(786,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:28:55 PM'),(787,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:30:32 PM'),(788,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:36:20 PM'),(789,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:42:08 PM'),(790,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'05',11,2023,'12:42:33 PM'),(791,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:42:38 PM'),(792,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:46:48 PM'),(793,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:47:15 PM'),(794,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:49:51 PM'),(795,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:50:07 PM'),(796,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'12:56:28 PM'),(797,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:02:21 PM'),(798,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:04:50 PM'),(799,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:09:54 PM'),(800,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:13:05 PM'),(801,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:16:36 PM'),(802,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:22:32 PM'),(803,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:25:42 PM'),(804,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:26:55 PM'),(805,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:48:46 PM'),(806,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'01:51:33 PM'),(807,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'02:04:52 PM'),(808,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'02:12:13 PM'),(809,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'02:26:20 PM'),(810,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'02:40:41 PM'),(811,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'02:42:11 PM'),(812,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'02:44:46 PM'),(813,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'02:55:30 PM'),(814,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'02:58:18 PM'),(815,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:01:42 PM'),(816,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:08:59 PM'),(817,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:23:41 PM'),(818,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:24:53 PM'),(634,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'11:11:05 AM'),(635,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'11:51:08 AM'),(636,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'01:57:20 PM'),(637,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:00:08 PM'),(638,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:01:59 PM'),(639,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:05:30 PM'),(640,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:07:12 PM'),(641,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:11:39 PM'),(642,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:15:37 PM'),(643,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:16:55 PM'),(644,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:19:33 PM'),(645,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'02:38:23 PM'),(646,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'03:51:01 PM'),(647,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'04:45:21 PM'),(648,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'04:47:34 PM'),(649,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'04:57:15 PM'),(650,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'04:59:55 PM'),(651,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'03',11,2023,'05:14:24 PM'),(652,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'05:14:30 PM'),(653,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'05:33:45 PM'),(654,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'03',11,2023,'10:47:19 PM'),(655,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'03',11,2023,'10:55:08 PM'),(656,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'01:08:43 AM'),(657,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'01:11:19 AM'),(658,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'01:12:14 AM'),(659,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'04',11,2023,'01:34:13 AM'),(660,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'01:43:20 AM'),(661,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:05:24 AM'),(662,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:08:34 AM'),(663,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:18:17 AM'),(664,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:31:57 AM'),(665,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:37:48 AM'),(666,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:05:48 AM'),(667,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:11:13 AM'),(668,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:24:12 AM'),(669,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:26:33 AM'),(670,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:31:13 AM'),(819,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:28:49 PM'),(820,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:36:54 PM'),(821,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:47:38 PM'),(822,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:49:30 PM'),(823,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'03:52:25 PM'),(824,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:08:12 PM'),(825,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:13:04 PM'),(826,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:13:44 PM'),(827,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:16:41 PM'),(828,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:18:46 PM'),(829,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:20:06 PM'),(830,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:33:21 PM'),(831,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:34:48 PM'),(832,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:38:15 PM'),(833,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:40:46 PM'),(834,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:42:14 PM'),(835,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:48:34 PM'),(836,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:52:34 PM'),(837,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:55:20 PM'),(838,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:56:54 PM'),(839,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'04:58:32 PM'),(840,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:01:39 PM'),(841,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:04:29 PM'),(842,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:05:46 PM'),(843,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:08:36 PM'),(844,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:10:09 PM'),(845,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:12:24 PM'),(846,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:13:52 PM'),(847,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:16:16 PM'),(848,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:17:19 PM'),(849,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:20:36 PM'),(850,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:24:19 PM'),(851,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:25:50 PM'),(852,'-','-','OFF L1','-',101,'05',11,2023,'05:26:30 PM'),(853,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:27:38 PM'),(854,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:28:15 PM'),(855,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:30:00 PM'),(671,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:32:28 AM'),(672,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:42:57 AM'),(673,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:09:03 AM'),(674,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:10:22 AM'),(675,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:12:14 AM'),(676,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:13:33 AM'),(677,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:14:23 AM'),(678,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:18:54 AM'),(679,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:20:25 AM'),(680,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:26:50 AM'),(681,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'04:33:06 AM'),(682,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'11:24:51 AM'),(683,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'11:33:08 AM'),(684,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'11:46:29 AM'),(685,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'11:49:17 AM'),(686,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'11:50:16 AM'),(687,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:12:36 PM'),(688,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:18:15 PM'),(689,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:26:47 PM'),(690,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:29:45 PM'),(691,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:30:57 PM'),(692,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:32:19 PM'),(693,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:33:03 PM'),(694,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:33:47 PM'),(695,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:38:37 PM'),(696,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:41:15 PM'),(697,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:43:20 PM'),(698,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'12:47:09 PM'),(699,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'01:04:15 PM'),(700,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'01:17:29 PM'),(701,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'01:53:04 PM'),(702,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'01:55:37 PM'),(703,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:16:34 PM'),(704,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:27:33 PM'),(705,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:31:30 PM'),(706,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'02:59:59 PM'),(707,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'04',11,2023,'03:03:35 PM'),(856,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:33:00 PM'),(857,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:34:09 PM'),(858,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:36:28 PM'),(859,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:39:03 PM'),(860,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:40:41 PM'),(861,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:42:28 PM'),(862,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:43:15 PM'),(863,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:44:59 PM'),(864,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:45:40 PM'),(865,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:46:18 PM'),(866,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:52:36 PM'),(867,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:55:44 PM'),(868,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'05:57:17 PM'),(869,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:06:48 PM'),(870,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:07:15 PM'),(871,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:07:35 PM'),(872,'-','-','OFF L1','-',101,'05',11,2023,'06:10:00 PM'),(873,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:10:13 PM'),(874,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:23:49 PM'),(875,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:24:07 PM'),(876,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:26:10 PM'),(877,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:27:29 PM'),(878,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:32:56 PM'),(879,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:34:15 PM'),(880,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:35:19 PM'),(881,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:37:23 PM'),(882,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:38:23 PM'),(883,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:39:40 PM'),(884,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:40:31 PM'),(885,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:41:12 PM'),(886,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:43:03 PM'),(887,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:43:44 PM'),(888,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:59:20 PM'),(889,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'06:59:47 PM'),(890,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:00:15 PM'),(891,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:04:57 PM'),(892,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:40:28 PM'),(893,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:44:45 PM'),(894,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:45:20 PM'),(895,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:47:19 PM'),(896,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:49:56 PM'),(897,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:50:18 PM'),(898,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:50:42 PM'),(899,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:51:20 PM'),(900,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:53:03 PM'),(901,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:54:59 PM'),(902,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:56:05 PM'),(903,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'07:56:36 PM'),(904,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:00:00 PM'),(905,'-','-','OFF L1','-',101,'05',11,2023,'08:06:31 PM'),(906,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:06:56 PM'),(907,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:07:29 PM'),(908,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:11:10 PM'),(909,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:11:48 PM'),(910,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:14:57 PM'),(911,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:16:27 PM'),(912,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:17:00 PM'),(913,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:17:46 PM'),(914,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:18:19 PM'),(915,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:27:51 PM'),(916,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:28:36 PM'),(917,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:35:57 PM'),(918,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:36:32 PM'),(919,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'05',11,2023,'08:41:28 PM'),(920,'AD1001','1 1. 1','OFF L1','0 | Admin',101,'05',11,2023,'08:41:29 PM'),(921,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'08:43:33 PM'),(922,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:40:43 PM'),(923,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:41:55 PM'),(924,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:42:37 PM'),(925,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'10:50:30 PM'),(926,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:53:29 PM'),(927,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:54:52 PM'),(928,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:55:30 PM'),(929,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:56:55 PM'),(930,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:58:23 PM'),(931,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',11,2023,'11:58:48 PM'),(932,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:02:54 AM'),(933,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:08:48 AM'),(934,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:10:33 AM'),(935,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:12:19 AM'),(936,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:14:35 AM'),(937,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:16:17 AM'),(938,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:18:26 AM'),(939,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:19:01 AM'),(940,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:21:34 AM'),(941,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:23:05 AM'),(942,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:23:54 AM'),(943,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:25:57 AM'),(944,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:37:09 AM'),(945,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'12:37:33 AM'),(946,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'01:19:21 AM'),(947,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'01:23:19 AM'),(948,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'01:28:35 AM'),(949,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'06',11,2023,'02:18:25 AM'),(950,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:18:32 AM'),(951,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:26:29 AM'),(952,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:26:59 AM'),(953,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:30:18 AM'),(954,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:35:26 AM'),(955,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:35:54 AM'),(956,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:38:18 AM'),(957,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:43:21 AM'),(958,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:43:46 AM'),(959,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:47:13 AM'),(960,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:50:52 AM'),(961,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:58:01 AM'),(962,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'02:59:29 AM'),(963,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'03:06:18 AM'),(964,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'03:14:59 AM'),(965,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'03:16:24 AM'),(966,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'03:19:09 AM'),(967,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'03:02:49 PM'),(968,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'04:31:21 PM'),(969,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'04:32:58 PM'),(970,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'04:34:20 PM'),(971,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'04:35:02 PM'),(972,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'04:38:23 PM'),(973,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'04:41:30 PM'),(974,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'04:45:53 PM'),(975,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'04:47:01 PM'),(976,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'10:43:42 PM'),(977,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'10:52:10 PM'),(978,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'10:56:01 PM'),(979,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'10:57:32 PM'),(980,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'11:05:45 PM'),(981,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'11:22:54 PM'),(982,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'11:26:46 PM'),(983,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'11:36:52 PM'),(984,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'06',11,2023,'11:44:09 PM'),(985,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'12:25:05 AM'),(986,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'12:26:55 AM'),(987,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'12:44:04 AM'),(988,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'12:44:48 AM'),(989,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'07',11,2023,'12:46:45 AM'),(990,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'12:47:06 AM'),(991,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'07',11,2023,'12:47:18 AM'),(992,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'07:09:33 AM'),(993,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'07',11,2023,'07:09:46 AM'),(994,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'07:30:36 AM'),(995,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'07:31:13 AM'),(996,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'07:43:27 AM'),(997,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'07:52:26 AM'),(998,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'07:52:52 AM'),(999,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'07:56:36 AM'),(1000,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'08:01:17 AM'),(1001,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'08:02:03 AM'),(1002,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'08:05:20 AM'),(1003,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'08:06:14 AM'),(1004,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'08:12:45 AM'),(1005,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'08:13:30 AM'),(1006,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'08:24:43 AM'),(1007,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'09:05:45 AM'),(1008,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'09:24:42 AM'),(1009,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'09:43:42 AM'),(1010,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'09:45:44 AM'),(1011,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'09:48:52 AM'),(1012,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'09:50:38 AM'),(1013,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'10:11:47 AM'),(1014,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'10:12:50 AM'),(1015,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'10:16:58 AM'),(1016,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'10:19:17 AM'),(1017,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'10:20:56 AM'),(1018,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'11:12:12 AM'),(1019,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'11:34:07 AM'),(1020,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'11:42:28 AM'),(1021,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'01:30:17 PM'),(1022,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'01:38:42 PM'),(1023,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'07',11,2023,'01:47:45 PM'),(1024,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'01:47:51 PM'),(1025,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'01:52:21 PM'),(1026,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'01:58:38 PM'),(1027,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'02:04:02 PM'),(1028,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'02:14:39 PM'),(1029,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'02:18:39 PM'),(1030,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'02:43:04 PM'),(1031,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'03:13:17 PM'),(1032,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'03:21:56 PM'),(1033,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'03:27:35 PM'),(1034,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'04:09:01 PM'),(1035,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'04:36:34 PM'),(1036,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'04:40:44 PM'),(1037,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'04:46:00 PM'),(1038,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'04:46:36 PM'),(1039,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'04:57:41 PM'),(1040,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:04:24 PM'),(1041,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:08:32 PM'),(1042,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:10:38 PM'),(1043,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:13:21 PM'),(1044,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:15:17 PM'),(1045,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:16:51 PM'),(1046,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:20:58 PM'),(1047,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:24:23 PM'),(1048,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:26:45 PM'),(1049,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:29:07 PM'),(1050,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'05:51:21 PM'),(1051,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'07',11,2023,'06:26:43 PM'),(1052,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'10:52:54 PM'),(1053,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'11:33:19 PM'),(1054,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'11:40:05 PM'),(1055,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',11,2023,'11:53:08 PM'),(1056,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:17:03 AM'),(1057,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:25:35 AM'),(1058,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:28:41 AM'),(1059,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:31:36 AM'),(1060,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:33:51 AM'),(1061,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:36:08 AM'),(1062,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:37:32 AM'),(1063,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:44:32 AM'),(1064,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:48:19 AM'),(1065,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:52:39 AM'),(1066,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:55:20 AM'),(1067,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:58:20 AM'),(1068,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'01:02:23 AM'),(1069,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:12:35 PM'),(1070,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:16:32 PM'),(1071,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:30:12 PM'),(1072,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:39:30 PM'),(1073,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'12:43:39 PM'),(1074,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'02:10:13 PM'),(1075,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'02:21:39 PM'),(1076,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'02:24:09 PM'),(1077,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'02:34:09 PM'),(1078,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'02:36:14 PM'),(1079,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'02:38:44 PM'),(1080,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'02:42:42 PM'),(1081,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'02:49:45 PM'),(1082,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'03:10:18 PM'),(1083,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'03:10:46 PM'),(1084,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'03:25:23 PM'),(1085,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'03:30:20 PM'),(1086,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'03:48:10 PM'),(1087,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'03:49:44 PM'),(1088,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'08',11,2023,'03:55:08 PM'),(1089,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'03:58:59 PM'),(1090,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'04:08:58 PM'),(1091,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'04:09:41 PM'),(1092,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'04:12:05 PM'),(1093,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'04:14:20 PM'),(1094,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'08',11,2023,'04:37:11 PM'),(1095,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:39:55 AM'),(1096,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:55:52 AM'),(1097,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:57:11 AM'),(1098,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:02:41 AM'),(1099,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:16:05 AM'),(1100,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:17:22 AM'),(1101,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:19:18 AM'),(1102,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:27:40 AM'),(1103,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:34:52 AM'),(1104,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:35:30 AM'),(1105,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:36:13 AM'),(1106,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:37:43 AM'),(1107,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:38:35 AM'),(1108,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:39:54 AM'),(1109,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:41:22 AM'),(1110,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:41:55 AM'),(1111,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:47:13 AM'),(1112,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:51:39 AM'),(1113,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:52:17 AM'),(1114,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:59:00 AM'),(1300,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'12:27:10 PM'),(1301,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'11',11,2023,'12:27:28 PM'),(1302,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'12:36:14 PM'),(1303,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'01:02:14 PM'),(1304,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'11',11,2023,'01:07:03 PM'),(1305,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'02:39:02 PM'),(1306,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'02:45:30 PM'),(1307,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'02:58:51 PM'),(1308,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'03:08:00 PM'),(1309,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'03:11:01 PM'),(1310,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'03:16:18 PM'),(1311,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'12:39:43 PM'),(1312,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'12:52:08 PM'),(1313,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'12:56:47 PM'),(1314,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'12:59:14 PM'),(1315,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'01:00:51 PM'),(1316,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'01:02:31 PM'),(1317,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'01:05:17 PM'),(1318,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'01:06:16 PM'),(1319,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'01:09:36 PM'),(1320,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'01:44:04 PM'),(1321,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'02:08:33 PM'),(1322,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'02:18:44 PM'),(1323,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'02:20:38 PM'),(1324,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'02:26:59 PM'),(1325,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'02:38:54 PM'),(1326,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'02:59:37 PM'),(1327,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'03:18:15 PM'),(1328,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'13',11,2023,'03:39:25 PM'),(1329,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'05:53:04 AM'),(1330,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'05:59:46 AM'),(1331,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'06:01:04 AM'),(1332,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'06:06:53 AM'),(1333,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'06:08:20 AM'),(1334,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'15',11,2023,'06:08:49 AM'),(1335,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'06:10:19 AM'),(1336,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'06:39:12 AM'),(1115,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'11:02:38 AM'),(1116,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'11:05:43 AM'),(1117,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'11:18:47 AM'),(1118,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'11:31:42 AM'),(1119,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'11:45:14 AM'),(1120,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'12:41:48 PM'),(1121,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'12:48:00 PM'),(1122,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'12:52:28 PM'),(1123,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'02:53:20 PM'),(1124,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'03:00:54 PM'),(1125,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'03:34:58 PM'),(1126,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'03:37:32 PM'),(1127,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'03:46:16 PM'),(1128,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'03:49:42 PM'),(1129,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'03:53:20 PM'),(1130,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'03:56:06 PM'),(1131,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'03:57:57 PM'),(1132,'-','-','OFF L1','-',101,'09',11,2023,'04:00:42 PM'),(1133,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'04:46:55 PM'),(1134,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'04:53:54 PM'),(1135,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'04:59:45 PM'),(1136,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'05:03:40 PM'),(1137,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'05:27:53 PM'),(1138,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'09',11,2023,'05:28:17 PM'),(1139,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'05:28:24 PM'),(1140,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:14:53 PM'),(1141,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:36:31 PM'),(1142,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:37:49 PM'),(1143,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:39:05 PM'),(1144,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:40:47 PM'),(1145,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:43:52 PM'),(1146,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:46:51 PM'),(1147,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:49:43 PM'),(1148,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'06:57:37 PM'),(1149,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'07:10:45 PM'),(1150,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'07:13:53 PM'),(1151,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'08:21:07 PM'),(1152,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'08:24:16 PM'),(1153,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'08:30:52 PM'),(1154,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'08:41:35 PM'),(1155,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'08:45:12 PM'),(1156,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'08:54:19 PM'),(1157,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'09',11,2023,'08:56:06 PM'),(1158,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'08:56:11 PM'),(1159,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:00:11 PM'),(1160,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:07:56 PM'),(1161,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:10:26 PM'),(1162,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:20:06 PM'),(1163,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:21:54 PM'),(1164,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:25:57 PM'),(1165,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:32:39 PM'),(1166,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:35:41 PM'),(1167,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:38:42 PM'),(1168,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:41:38 PM'),(1169,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'09:52:05 PM'),(1170,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:03:35 PM'),(1171,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:21:27 PM'),(1172,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:39:01 PM'),(1173,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:39:46 PM'),(1174,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'09',11,2023,'10:53:23 PM'),(1175,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:27:36 AM'),(1176,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:37:11 AM'),(1177,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'12:37:55 AM'),(1178,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:40:16 AM'),(1179,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'12:43:27 AM'),(1180,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:47:37 AM'),(1181,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:48:50 AM'),(1182,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'12:49:21 AM'),(1183,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:54:03 AM'),(1184,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:59:19 AM'),(1185,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:03:57 AM'),(1186,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:08:21 AM'),(1187,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:10:29 AM'),(1188,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'01:10:45 AM'),(1337,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'06:57:25 AM'),(1338,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'06:58:45 AM'),(1339,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'07:05:03 AM'),(1340,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'07:09:46 AM'),(1341,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'07:39:42 AM'),(1342,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'07:44:27 AM'),(1343,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'07:51:43 AM'),(1344,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'07:59:54 AM'),(1345,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:18:56 AM'),(1346,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:21:05 AM'),(1347,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:23:54 AM'),(1348,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:29:01 AM'),(1349,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:33:32 AM'),(1350,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:50:32 AM'),(1351,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:53:52 AM'),(1352,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:58:38 AM'),(1353,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:17:19 AM'),(1354,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:20:24 AM'),(1355,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:21:55 AM'),(1356,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:39:49 AM'),(1357,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:41:55 AM'),(1358,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:43:14 AM'),(1359,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:45:24 AM'),(1360,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:50:00 AM'),(1361,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:59:37 AM'),(1362,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:06:47 AM'),(1363,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:21:17 AM'),(1364,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:22:01 AM'),(1365,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:25:57 AM'),(1366,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:29:10 AM'),(1367,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:33:45 AM'),(1368,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:55:04 AM'),(1369,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:57:20 AM'),(1370,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:07:05 AM'),(1371,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:16:30 AM'),(1372,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:32:05 AM'),(1373,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'12:02:14 PM'),(1189,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:10:51 AM'),(1190,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:26:19 AM'),(1191,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:28:50 AM'),(1192,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'01:29:06 AM'),(1193,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:29:09 AM'),(1194,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'01:31:27 AM'),(1195,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:31:32 AM'),(1196,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:35:18 AM'),(1197,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'01:35:29 AM'),(1198,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:35:33 AM'),(1199,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'10',11,2023,'01:36:27 AM'),(1200,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:36:43 AM'),(1201,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'01:37:18 AM'),(1202,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:38:48 AM'),(1203,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:41:55 AM'),(1204,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:48:43 AM'),(1205,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:06:30 AM'),(1206,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:09:39 AM'),(1207,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:12:00 AM'),(1208,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'02:12:11 AM'),(1209,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:12:42 AM'),(1210,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'02:14:47 AM'),(1211,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:16:20 AM'),(1212,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:17:29 AM'),(1213,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'02:18:21 AM'),(1214,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:18:59 AM'),(1215,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'02:22:15 AM'),(1216,'AD1001','1 1. 1','OFF L1','0 | Admin',101,'10',11,2023,'02:22:37 AM'),(1217,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:34:59 AM'),(1218,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'10',11,2023,'02:36:07 AM'),(1219,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:36:10 AM'),(1220,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:41:45 AM'),(1221,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:00:54 AM'),(1222,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:18:01 AM'),(1223,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:24:18 AM'),(1224,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:37:37 AM'),(1225,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:42:03 AM'),(1374,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'12:08:00 PM'),(1375,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'12:19:50 PM'),(1376,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'12:30:38 PM'),(1377,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'12:39:03 PM'),(1378,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'12:48:03 PM'),(1379,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:05:24 PM'),(1380,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:16:53 PM'),(1381,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:20:55 PM'),(1382,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:22:04 PM'),(1383,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:34:25 PM'),(1384,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:37:57 PM'),(1385,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:46:29 PM'),(1386,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:52:02 PM'),(1387,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'01:53:57 PM'),(1226,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:47:36 AM'),(1227,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:50:34 AM'),(1228,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:55:09 AM'),(1229,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'03:57:36 AM'),(1230,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'09:36:01 AM'),(1231,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'09:52:24 AM'),(1232,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'09:54:39 AM'),(1233,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:02:37 AM'),(1234,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:04:17 AM'),(1235,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:06:59 AM'),(1236,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:08:46 AM'),(1237,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:15:44 AM'),(1238,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:19:37 AM'),(1239,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:24:09 AM'),(1240,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:35:19 AM'),(1241,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:36:53 AM'),(1242,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:42:16 AM'),(1243,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:45:39 AM'),(1244,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:49:52 AM'),(1245,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'10:54:03 AM'),(1246,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:02:15 AM'),(1247,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:03:45 AM'),(1248,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:04:59 AM'),(1249,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:09:35 AM'),(1250,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:10:56 AM'),(1251,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:13:40 AM'),(1252,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:16:53 AM'),(1253,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:26:07 AM'),(1254,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:31:51 AM'),(1255,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:32:26 AM'),(1256,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:35:29 AM'),(1257,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'11:36:08 AM'),(1258,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:36:29 PM'),(1259,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'12:52:34 PM'),(1260,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:02:38 PM'),(1261,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:06:52 PM'),(1262,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:12:01 PM'),(1263,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:14:09 PM'),(1264,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:16:26 PM'),(1265,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:18:30 PM'),(1266,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:19:24 PM'),(1267,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:20:09 PM'),(1268,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:20:46 PM'),(1269,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:22:17 PM'),(1270,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:27:17 PM'),(1271,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:28:15 PM'),(1272,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:32:05 PM'),(1273,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:32:28 PM'),(1274,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:34:55 PM'),(1275,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:39:28 PM'),(1276,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:51:15 PM'),(1277,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:54:34 PM'),(1278,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'01:56:14 PM'),(1279,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:02:16 PM'),(1280,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:03:39 PM'),(1281,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:05:17 PM'),(1282,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:09:22 PM'),(1283,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:19:46 PM'),(1284,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:32:09 PM'),(1285,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:34:27 PM'),(1286,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:35:50 PM'),(1287,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:36:37 PM'),(1288,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:38:45 PM'),(1289,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:39:28 PM'),(1290,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'10',11,2023,'02:42:15 PM'),(1291,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'10:26:56 AM'),(1292,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'10:35:44 AM'),(1293,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'11:01:07 AM'),(1294,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'11:07:10 AM'),(1295,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'11:13:52 AM'),(1296,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'11:21:55 AM'),(1297,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'11:27:58 AM'),(1298,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'12:06:12 PM'),(1299,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',11,2023,'12:13:37 PM'),(1388,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'02:23:19 PM'),(1389,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'02:40:34 PM'),(1390,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'03:24:53 PM'),(1391,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'07:48:08 PM'),(1392,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'07:55:33 PM'),(1393,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'15',11,2023,'07:57:45 PM'),(1394,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:12:38 PM'),(1395,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:15:46 PM'),(1396,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:20:58 PM'),(1397,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:27:07 PM'),(1398,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'08:38:52 PM'),(1399,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:17:38 PM'),(1400,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:18:37 PM'),(1401,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:27:05 PM'),(1402,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:30:28 PM'),(1403,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'09:41:29 PM'),(1404,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'15',11,2023,'09:51:16 PM'),(1405,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:07:00 PM'),(1406,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:14:08 PM'),(1407,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:24:39 PM'),(1408,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'15',11,2023,'10:25:02 PM'),(1409,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'10:36:47 PM'),(1410,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'15',11,2023,'10:38:30 PM'),(1411,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:01:39 PM'),(1412,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:03:59 PM'),(1413,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'15',11,2023,'11:05:51 PM'),(1414,'AD1001','1 1. 1','OFF L1','0 | Admin',101,'15',11,2023,'11:06:46 PM'),(1415,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:13:11 PM'),(1416,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'15',11,2023,'11:14:08 PM'),(1417,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:20:28 PM'),(1418,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'15',11,2023,'11:21:07 PM'),(1419,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:31:53 PM'),(1420,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'15',11,2023,'11:32:49 PM'),(1421,'AD1001','1 1. 1','OFF L1','0 | Admin',101,'15',11,2023,'11:33:52 PM'),(1422,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:42:49 PM'),(1423,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'15',11,2023,'11:43:21 PM'),(1424,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:43:25 PM'),(1425,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:53:56 PM'),(1426,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'15',11,2023,'11:58:42 PM'),(1427,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:02:14 AM'),(1428,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:05:07 AM'),(1429,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:10:36 AM'),(1430,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:35:51 AM'),(1431,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:53:20 AM'),(1432,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:55:11 AM'),(1433,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:57:55 AM'),(1434,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:59:17 AM'),(1435,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:01:12 AM'),(1436,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:08:47 AM'),(1437,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:10:42 AM'),(1438,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:14:20 AM'),(1439,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:30:04 AM'),(1440,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:40:14 AM'),(1441,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:50:34 AM'),(1442,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:08:03 AM'),(1443,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:10:24 AM'),(1444,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:17:40 AM'),(1445,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:21:03 AM'),(1446,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:35:27 AM'),(1447,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:37:07 AM'),(1485,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:39:42 PM'),(1486,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:42:32 PM'),(1487,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:45:05 PM'),(1488,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:48:03 PM'),(1489,'-','-','OFF L1','-',101,'16',11,2023,'05:05:09 PM'),(1490,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'05:06:55 PM'),(1491,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'05:14:23 PM'),(1492,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'09:51:50 PM'),(1493,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'09:56:16 PM'),(1494,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'01:48:56 AM'),(1495,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'01:51:30 AM'),(1496,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'01:56:46 AM'),(1497,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'01:59:14 AM'),(1498,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:02:57 AM'),(1499,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:03:39 AM'),(1500,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:04:18 AM'),(1501,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:05:25 AM'),(1502,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:07:33 AM'),(1503,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:14:26 AM'),(1504,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:22:47 AM'),(1505,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:23:35 AM'),(1506,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:26:53 AM'),(1507,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'17',11,2023,'02:27:15 AM'),(1508,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:28:05 AM'),(1509,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'17',11,2023,'02:29:49 AM'),(1510,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:33:15 AM'),(1511,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:39:32 AM'),(1512,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:46:17 AM'),(1513,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:53:04 AM'),(1514,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'10:02:01 AM'),(1515,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:51:15 PM'),(1516,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'17',11,2023,'02:54:25 PM'),(1517,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'02:57:40 PM'),(1518,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:00:12 PM'),(1519,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:00:59 PM'),(1520,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:01:16 PM'),(1521,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:03:21 PM'),(1522,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:04:47 PM'),(1523,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:07:46 PM'),(1524,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:38:38 PM'),(1525,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:43:00 PM'),(1526,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:45:52 PM'),(1527,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:47:41 PM'),(1528,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'03:48:48 PM'),(1529,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'04:32:28 PM'),(1530,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'04:42:59 PM'),(1531,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:03:30 PM'),(1532,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'17',11,2023,'05:04:39 PM'),(1533,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:13:44 PM'),(1534,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:15:05 PM'),(1535,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:18:28 PM'),(1536,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:23:30 PM'),(1537,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:25:14 PM'),(1538,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:28:10 PM'),(1539,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:31:30 PM'),(1540,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:47:51 PM'),(1541,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:53:34 PM'),(1542,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:57:29 PM'),(1543,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'05:58:40 PM'),(1544,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:03:19 PM'),(1545,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:09:52 PM'),(1546,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:10:33 PM'),(1547,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:45:37 PM'),(1548,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:51:00 PM'),(1549,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:52:57 PM'),(1550,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:56:18 PM'),(1551,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:58:02 PM'),(1552,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:59:05 PM'),(1553,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'06:59:45 PM'),(1554,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'07:01:44 PM'),(1555,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'07:03:42 PM'),(1556,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'07:05:48 PM'),(1557,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'07:22:28 PM'),(1558,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'07:38:26 PM'),(1559,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'07:43:10 PM'),(1560,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'07:49:17 PM'),(1561,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'07:55:30 PM'),(1562,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'08:41:25 PM'),(1563,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'17',11,2023,'08:48:32 PM'),(1564,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'08:54:51 PM'),(1565,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'08:55:40 PM'),(1566,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'08:58:36 PM'),(1567,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'09:00:08 PM'),(1568,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'09:01:04 PM'),(1569,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'09:02:10 PM'),(1570,'-','-','OFF L1','-',101,'17',11,2023,'09:02:59 PM'),(1571,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'09:52:53 PM'),(1448,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:01:03 AM'),(1449,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:09:17 AM'),(1450,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:15:49 AM'),(1451,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:27:09 AM'),(1452,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:28:44 AM'),(1453,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:32:10 AM'),(1454,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:40:44 AM'),(1455,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:45:51 AM'),(1456,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:49:50 AM'),(1457,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'03:50:26 AM'),(1458,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'16',11,2023,'08:36:04 AM'),(1459,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'08:40:25 AM'),(1460,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'08:46:51 AM'),(1461,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'16',11,2023,'08:50:42 AM'),(1462,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'08:51:01 AM'),(1463,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'16',11,2023,'08:51:25 AM'),(1464,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'08:56:01 AM'),(1465,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'08:56:35 AM'),(1466,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'09:02:03 AM'),(1467,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'09:06:58 AM'),(1468,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'09:14:40 AM'),(1469,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'09:22:00 AM'),(1470,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'09:24:40 AM'),(1471,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'09:38:39 AM'),(1472,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'10:01:26 AM'),(1473,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'10:04:34 AM'),(1474,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'10:15:39 AM'),(1475,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'10:47:53 AM'),(1476,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'10:51:23 AM'),(1477,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'12:59:14 PM'),(1478,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:14:58 PM'),(1479,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'16',11,2023,'01:22:07 PM'),(1480,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:37:18 PM'),(1481,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'01:43:40 PM'),(1482,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:02:10 PM'),(1483,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'16',11,2023,'02:11:02 PM'),(1484,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'16',11,2023,'02:15:11 PM'),(1572,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'10:59:44 PM'),(1573,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'11:11:51 PM'),(1574,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'11:23:05 PM'),(1575,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'11:25:21 PM'),(1576,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'17',11,2023,'11:26:55 PM'),(1577,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'17',11,2023,'11:35:20 PM'),(1578,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:13:00 AM'),(1579,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'11:38:45 AM'),(1580,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'11:47:29 AM'),(1581,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'12:27:58 PM'),(1582,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'12:36:06 PM'),(1583,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'12:39:02 PM'),(1584,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'12:43:22 PM'),(1585,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'12:52:57 PM'),(1586,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'12:57:49 PM'),(1587,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'01:55:06 PM'),(1588,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:00:08 PM'),(1589,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:08:15 PM'),(1590,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:10:56 PM'),(1591,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:12:44 PM'),(1592,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:14:13 PM'),(1593,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:14:59 PM'),(1594,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:16:37 PM'),(1595,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:22:16 PM'),(1596,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:24:01 PM'),(1597,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'18',11,2023,'02:26:56 PM'),(1598,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:26:59 PM'),(1599,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:27:49 PM'),(1600,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:28:46 PM'),(1601,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:30:34 PM'),(1602,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:32:15 PM'),(1603,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:34:50 PM'),(1604,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'02:36:09 PM'),(1605,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'03:26:26 PM'),(1606,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'03:43:35 PM'),(1607,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'03:45:53 PM'),(1608,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'03:52:33 PM'),(1609,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'04:15:33 PM'),(1610,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:14:08 PM'),(1611,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:15:01 PM'),(1612,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:15:22 PM'),(1613,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:16:50 PM'),(1614,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:21:23 PM'),(1615,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:27:01 PM'),(1616,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:31:00 PM'),(1617,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:34:19 PM'),(1618,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:38:04 PM'),(1619,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:39:03 PM'),(1620,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:39:56 PM'),(1621,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:52:44 PM'),(1622,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'05:55:59 PM'),(1623,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'06:06:20 PM'),(1624,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'06:23:49 PM'),(1625,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'06:29:43 PM'),(1626,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'06:38:02 PM'),(1627,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'06:40:25 PM'),(1628,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'06:45:38 PM'),(1629,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'07:01:35 PM'),(1630,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'07:13:38 PM'),(1631,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'07:19:30 PM'),(1632,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'07:24:44 PM'),(1633,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'07:32:36 PM'),(1634,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'07:35:33 PM'),(1635,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'07:44:10 PM'),(1636,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'18',11,2023,'08:48:24 PM'),(1637,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'12:31:12 PM'),(1638,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'12:32:09 PM'),(1639,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'12:39:37 PM'),(1640,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'12:57:23 PM'),(1641,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'12:59:50 PM'),(1642,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'01:00:39 PM'),(1643,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'01:01:54 PM'),(1644,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'01:05:06 PM'),(1645,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'01:11:09 PM'),(1646,'-','-','OFF L1','-',101,'19',11,2023,'01:36:20 PM'),(1647,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'02:02:53 PM'),(1648,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'02:14:09 PM'),(1649,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'02:14:35 PM'),(1650,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'02:25:37 PM'),(1651,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'02:51:45 PM'),(1652,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'02:53:56 PM'),(1653,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:01:28 PM'),(1654,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:06:56 PM'),(1655,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:09:53 PM'),(1656,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:15:23 PM'),(1657,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:18:49 PM'),(1658,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:24:55 PM'),(1659,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:31:00 PM'),(1660,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:41:12 PM'),(1661,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:49:19 PM'),(1662,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:49:59 PM'),(1663,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:51:14 PM'),(1664,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'03:51:51 PM'),(1665,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'04:00:32 PM'),(1666,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'04:04:33 PM'),(1667,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'04:14:31 PM'),(1668,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'04:15:29 PM'),(1669,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'04:21:34 PM'),(1670,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'05:10:25 PM'),(1671,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'19',11,2023,'05:12:30 PM'),(1672,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'05:46:42 PM'),(1673,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'05:53:14 PM'),(1674,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'05:53:39 PM'),(1675,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'05:57:33 PM'),(1676,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'05:59:40 PM'),(1677,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'06:03:42 PM'),(1678,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'06:19:39 PM'),(1679,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'06:27:29 PM'),(1680,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:36:50 PM'),(1681,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:44:25 PM'),(1682,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:46:22 PM'),(1683,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:49:23 PM'),(1684,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:50:48 PM'),(1685,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:52:43 PM'),(1686,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:54:39 PM'),(1687,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:55:57 PM'),(1688,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:56:50 PM'),(1689,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'07:58:05 PM'),(1690,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'08:03:14 PM'),(1691,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'08:04:49 PM'),(1692,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'08:07:08 PM'),(1693,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'08:08:49 PM'),(1694,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'19',11,2023,'08:14:43 PM'),(1695,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:12:14 AM'),(1696,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:14:20 AM'),(1697,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:16:19 AM'),(1698,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:18:32 AM'),(1699,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:22:38 AM'),(1700,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:25:33 AM'),(1701,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:29:34 AM'),(1702,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:33:29 AM'),(1703,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:38:15 AM'),(1704,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:39:11 AM'),(1705,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:45:56 AM'),(1706,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:04:02 AM'),(1707,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:07:18 AM'),(1708,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:18:54 AM'),(1709,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:23:36 AM'),(1710,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:24:30 AM'),(1711,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:24:53 AM'),(1712,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:26:46 AM'),(1713,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:30:40 AM'),(1714,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:34:05 AM'),(1715,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:35:22 AM'),(1716,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:38:07 AM'),(1717,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:40:42 AM'),(1718,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:43:22 AM'),(1719,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:46:54 AM'),(1720,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:48:27 AM'),(1721,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:51:15 AM'),(1722,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'03:00:08 AM'),(1723,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'03:03:32 AM'),(1724,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'03:14:16 AM'),(1725,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'03:17:43 AM'),(1726,'-','-','OFF L1','-',101,'20',11,2023,'04:38:50 AM'),(1727,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'04:41:25 AM'),(1728,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'04:46:26 AM'),(1729,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'04:49:35 AM'),(1730,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'04:51:57 AM'),(1731,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:03:28 AM'),(1732,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:11:03 AM'),(1733,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:11:44 AM'),(1734,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:13:04 AM'),(1735,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:18:27 AM'),(1736,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:28:28 AM'),(1737,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:32:07 AM'),(1738,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:34:51 AM'),(1739,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:36:09 AM'),(1740,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:38:25 AM'),(1741,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:45:09 AM'),(1742,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:47:43 AM'),(1743,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:50:24 AM'),(1744,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:51:28 AM'),(1745,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:51:57 AM'),(1746,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:52:22 AM'),(1747,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:54:31 AM'),(1748,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'05:59:35 AM'),(1749,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:10:09 AM'),(1750,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:15:28 AM'),(1751,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:18:46 AM'),(1752,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:19:37 AM'),(1753,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:22:06 AM'),(1754,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:25:47 AM'),(1755,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:35:21 AM'),(1756,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:37:16 AM'),(1757,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:40:35 AM'),(1758,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:41:51 AM'),(1759,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:46:02 AM'),(1760,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:48:16 AM'),(1761,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:53:47 AM'),(1762,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:55:17 AM'),(1763,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:00:08 AM'),(1764,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:01:30 AM'),(1765,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:05:51 AM'),(1766,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:06:17 AM'),(1767,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:08:09 AM'),(1768,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:09:12 AM'),(1769,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'20',11,2023,'07:11:41 AM'),(1770,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:11:48 AM'),(1771,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:16:38 AM'),(1772,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:18:01 AM'),(1773,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:19:33 AM'),(1774,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:20:34 AM'),(1775,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:21:38 AM'),(1776,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:26:55 AM'),(1777,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:32:16 AM'),(1778,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:34:05 AM'),(1779,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:40:51 AM'),(1780,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:42:13 AM'),(1781,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:43:50 AM'),(1782,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:48:19 AM'),(1783,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:51:38 AM'),(1784,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:52:57 AM'),(1785,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:55:07 AM'),(1786,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'07:56:56 AM'),(1787,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'08:06:13 AM'),(1788,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'08:08:50 AM'),(1789,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'08:13:19 AM'),(1790,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:01:20 PM'),(1791,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:03:03 PM'),(1792,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:04:57 PM'),(1793,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:08:58 PM'),(1794,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:17:47 PM'),(1795,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:18:13 PM'),(1796,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:21:28 PM'),(1797,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:41:21 PM'),(1798,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:51:09 PM'),(1799,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'12:56:13 PM'),(1800,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:30:36 PM'),(1801,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:45:09 PM'),(1802,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'01:52:55 PM'),(1803,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:06:01 PM'),(1804,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:10:28 PM'),(1805,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:23:29 PM'),(1806,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:40:18 PM'),(1807,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:43:23 PM'),(1808,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:45:10 PM'),(1809,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:50:16 PM'),(1810,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'02:58:12 PM'),(1811,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'03:03:36 PM'),(1812,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'06:09:43 PM'),(1813,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'20',11,2023,'10:02:26 PM'),(1814,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'20',11,2023,'10:02:39 PM'),(1815,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'08:54:45 AM'),(1816,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'09:25:49 AM'),(1817,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'09:28:25 AM'),(1818,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'09:32:34 AM'),(1819,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'09:34:45 AM'),(1820,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'10:14:43 AM'),(1821,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'12:17:13 PM'),(1822,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'12:17:47 PM'),(1823,'AD1001','1 1. 1','EXT AP','0 | Admin',101,'21',11,2023,'12:18:27 PM'),(1824,'-','-','OFF L1','-',101,'21',11,2023,'12:28:57 PM'),(1825,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'12:29:48 PM'),(1826,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'12:32:26 PM'),(1827,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'12:35:58 PM'),(1828,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:05:43 PM'),(1829,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:06:56 PM'),(1830,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:09:19 PM'),(1831,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:12:13 PM'),(1832,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:19:26 PM'),(1833,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:22:44 PM'),(1834,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:28:17 PM'),(1835,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:31:00 PM'),(1836,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:38:50 PM'),(1837,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'01:41:12 PM'),(1838,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'02:43:34 PM'),(1839,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'02:46:51 PM'),(1840,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'03:26:23 PM'),(1841,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'03:28:27 PM'),(1842,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'03:39:59 PM'),(1843,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'03:50:49 PM'),(1844,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'03:54:03 PM'),(1845,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:03:04 PM'),(1846,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:09:51 PM'),(1847,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:13:42 PM'),(1848,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:18:15 PM'),(1849,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:25:15 PM'),(1850,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:40:01 PM'),(1851,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:47:46 PM'),(1852,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:51:46 PM'),(1853,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'04:55:42 PM'),(1854,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'05:35:15 PM'),(1855,'-','-','OFF L1','-',101,'21',11,2023,'06:08:43 PM'),(1856,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'06:41:29 PM'),(1857,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'06:57:13 PM'),(1858,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'07:01:05 PM'),(1859,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'07:17:19 PM'),(1860,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'07:19:20 PM'),(1861,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'08:31:06 PM'),(1862,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'08:48:13 PM'),(1863,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'09:03:27 PM'),(1864,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'09:30:44 PM'),(1865,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'09:33:12 PM'),(1866,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'11:23:21 PM'),(1867,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'11:38:52 PM'),(1868,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'11:44:36 PM'),(1869,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'21',11,2023,'11:57:36 PM'),(1870,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:10:51 AM'),(1871,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:14:54 AM'),(1872,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:17:36 AM'),(1873,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:20:02 AM'),(1874,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:39:49 AM'),(1875,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'01:03:37 AM'),(1876,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'11:21:00 AM'),(1877,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'11:34:30 AM'),(1878,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'11:41:35 AM'),(1879,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'11:59:57 AM'),(1880,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:17:17 PM'),(1881,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:25:56 PM'),(1882,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:27:25 PM'),(1883,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:34:40 PM'),(1884,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:35:41 PM'),(1885,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:38:11 PM'),(1886,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:45:42 PM'),(1887,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:58:22 PM'),(1888,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'12:59:34 PM'),(1889,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'01:01:07 PM'),(1890,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'01:02:21 PM'),(1891,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'01:06:33 PM'),(1892,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'01:10:16 PM'),(1893,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'01:17:36 PM'),(1894,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:17:02 PM'),(1895,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:18:53 PM'),(1896,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:19:45 PM'),(1897,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:21:11 PM'),(1898,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:22:47 PM'),(1899,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'22',11,2023,'03:28:07 PM'),(1900,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:28:42 PM'),(1901,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'22',11,2023,'03:29:37 PM'),(1902,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:29:45 PM'),(1903,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:31:41 PM'),(1904,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:33:34 PM'),(1905,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'22',11,2023,'03:34:51 PM'),(1906,'-','-','OFF L1','-',101,'22',11,2023,'03:44:38 PM'),(1907,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:46:55 PM'),(1908,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'22',11,2023,'03:48:21 PM'),(1909,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:49:00 PM'),(1910,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'03:51:04 PM'),(1911,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'04:02:29 PM'),(1912,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'22',11,2023,'04:06:05 PM'),(1913,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'04:08:37 PM'),(1914,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'22',11,2023,'04:09:08 PM'),(1915,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'22',11,2023,'05:45:27 PM'),(1916,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'22',11,2023,'05:45:58 PM'),(1917,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'05:46:23 PM'),(1918,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'22',11,2023,'05:46:34 PM'),(1919,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'05:47:08 PM'),(1920,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'22',11,2023,'06:17:42 PM'),(1921,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'06:18:20 PM'),(1922,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'22',11,2023,'06:21:37 PM'),(1923,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'06:21:44 PM'),(1924,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'22',11,2023,'06:28:18 PM'),(1925,'CA1004','JAYMAR R. LADAC','IN-UP','2 | Cashier',101,'22',11,2023,'06:28:29 PM'),(1926,'CA1004','JAYMAR R. LADAC','OUT M1','2 | Cashier',101,'22',11,2023,'06:34:30 PM'),(1927,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'06:34:42 PM'),(1928,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'22',11,2023,'06:35:17 PM'),(1929,'CA1004','JAYMAR R. LADAC','IN-UP','2 | Cashier',101,'22',11,2023,'06:36:14 PM'),(1930,'CA1004','JAYMAR R. LADAC','OUT M1','2 | Cashier',101,'22',11,2023,'06:37:15 PM'),(1931,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'06:37:22 PM'),(1932,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'22',11,2023,'06:40:58 PM'),(1933,'-','-','OFF L1','-',101,'22',11,2023,'06:42:21 PM'),(1934,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'22',11,2023,'06:47:23 PM'),(1935,'AD1001','1 1. 1','OUT M1','0 | Admin',101,'22',11,2023,'06:48:12 PM'),(1936,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',11,2023,'11:13:37 AM'),(1937,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',11,2023,'11:22:55 AM'),(1938,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',11,2023,'11:31:24 AM'),(1939,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',11,2023,'11:33:47 AM'),(1940,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',11,2023,'11:42:28 AM'),(1941,'-','-','OFF L1','-',101,'23',11,2023,'03:41:09 PM'),(1942,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'23',11,2023,'03:42:22 PM'),(1943,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'23',11,2023,'03:43:21 PM'),(1944,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'23',11,2023,'03:47:22 PM'),(1945,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'23',11,2023,'04:12:36 PM'),(1946,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'23',11,2023,'04:14:17 PM'),(1947,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'23',11,2023,'04:14:38 PM'),(1948,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'23',11,2023,'04:25:56 PM'),(1949,'-','-','OFF L1','-',101,'23',11,2023,'04:27:03 PM'),(1950,'-','-','OFF L1','-',101,'23',11,2023,'04:27:29 PM'),(1951,'-','-','OFF L1','-',101,'24',11,2023,'10:43:33 AM'),(1952,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'10:43:59 AM'),(1953,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'10:44:11 AM'),(1954,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'10:44:26 AM'),(1955,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'10:49:41 AM'),(1956,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'10:50:53 AM'),(1957,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'10:52:01 AM'),(1958,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'10:55:09 AM'),(1959,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'10:57:27 AM'),(1960,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'10:58:27 AM'),(1961,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'10:58:57 AM'),(1962,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'11:09:55 AM'),(1963,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'11:11:37 AM'),(1964,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'11:13:05 AM'),(1965,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'11:13:46 AM'),(1966,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'11:16:06 AM'),(1967,'-','-','OFF L1','-',101,'24',11,2023,'11:16:21 AM'),(1968,'-','-','OFF L1','-',101,'24',11,2023,'11:43:37 AM'),(1969,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'11:45:29 AM'),(1970,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'11:47:00 AM'),(1971,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'11:47:41 AM'),(1972,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'11:48:02 AM'),(1973,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'11:49:10 AM'),(1974,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',11,2023,'11:45:56 PM'),(1975,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'23',11,2023,'11:46:32 PM'),(1976,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',11,2023,'11:46:51 PM'),(1977,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'23',11,2023,'11:47:34 PM'),(1978,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'23',11,2023,'11:47:48 PM'),(1979,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'12:07:30 AM'),(1980,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'12:07:42 AM'),(1981,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'12:07:49 AM'),(1982,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'12:08:23 AM'),(1983,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'12:08:37 AM'),(1984,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'12:09:26 AM'),(1985,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'12:09:36 AM'),(1986,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'24',11,2023,'12:10:28 AM'),(1987,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'24',11,2023,'12:13:23 AM'),(1988,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',12,2023,'12:46:58 AM'),(1989,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'11',12,2023,'12:59:54 AM'),(1990,'EC8008','NO CASHIER','IN-UP','0 | Cashier',101,'11',12,2023,'01:30:38 AM'),(1991,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',12,2023,'01:30:50 AM'),(1992,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'11',12,2023,'01:40:28 AM'),(1993,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'11',12,2023,'01:40:42 AM'),(1994,'EC8008','NO CASHIER','OFF M1','0 | Cashier',101,'11',12,2023,'01:50:00 AM'),(1995,'-','-','OFF L1','-',101,'05',1,2024,'11:03:58 PM'),(1996,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'05',1,2024,'11:04:11 PM'),(1997,'AD1001','ADMIN','IN-AC','0 | ADMIN',101,'12',1,2024,'05:48:56 PM'),(1998,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'07',12,2023,'11:54:49 AM'),(1999,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'25',1,2024,'02:26:57 PM'),(2000,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'25',1,2024,'02:31:19 PM'),(2001,'-','-','OFF L1','-',101,'25',1,2024,'02:31:32 PM'),(2002,'AD1001','1 1. 1','IN-UP','0 | Admin',101,'25',1,2024,'02:32:30 PM');
/*!40000 ALTER TABLE `tbyloginlog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;