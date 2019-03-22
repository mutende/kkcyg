-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: groupweb
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(10) NOT NULL,
  `F_name` varchar(50) NOT NULL,
  `pass` varchar(75) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`Id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;  
/*ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;*/
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'elvis','Elvis Mutende','$2y$10$JfsNYDtv9Y9V/O40PrywSOUioEhCpox4xkfvEdGWghzaxJfFPpTli','2018-12-11'),(3,'ian','Elvis 2','$2y$10$9mngBgeV.6YL//RtfW5hqe6raidZZVvOMfySWPiRz5RQj.nMGFmDS','2018-12-21');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_dt_tm` datetime NOT NULL,
  `nm` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phoneNo` varchar(13) NOT NULL,
  `comments` varchar(500) NOT NULL,
  PRIMARY KEY (`c_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci; 
/*ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;*/
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'2018-12-31 17:15:23','John Wetende','johnwetende@gmail.com','+254716171819','Whatever you are doing guys is really awesome, just keep up. Big Up. Whatever you are doing guys is really awesome, just keep up. Big Up.'),(2,'2018-12-31 17:43:16','Jane Gathungu','jg@yahoo.com','123456789101','wow this is awsome guys');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dt_tm` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci; 
/*ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;*/
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'elvis',717796059,'elvismutende@gmail.com','2018-12-21 17:30:36','Test','This post tests what i have been doing today. please support the shieet',''),(2,'ian',717796059,'elvismutende@gmail.com','2018-12-22 18:41:46','We Love Kakamega','Kakamega is one of the county that has greatest climate for agriculture, we encourage our people to be active in farming. let me assure our people that agriculture will change their lives.','');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'groupweb'
--

--
-- Dumping routines for database 'groupweb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-01  8:45:13
