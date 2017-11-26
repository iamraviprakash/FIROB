-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: firob
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `question_no` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(20) NOT NULL,
  `category` varchar(3) NOT NULL DEFAULT 'E-I',
  PRIMARY KEY (`question_no`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'1,2,3','E-I'),(2,'1,2,3,4','W-C'),(3,'1,2,3,4','E-I'),(4,'1,2','E-A'),(5,'1,2,3,4','E-I'),(6,'1,2,3,4','W-C'),(7,'1,2,3','E-I'),(8,'1,2','E-A'),(9,'1,2','E-I'),(10,'1,2,3','W-C'),(11,'1,2','E-I'),(12,'1','E-A'),(13,'1,2','E-I'),(14,'1,2,3','W-C'),(15,'1','E-I'),(16,'1','E-I'),(17,'1,2','E-A'),(18,'1,2,3','W-C'),(19,'4,5,6','E-A'),(20,'1,2,3','W-C'),(21,'1,2','E-A'),(22,'1,2,3,4','W-C'),(23,'1,2','E-A'),(24,'1,2,3','W-C'),(25,'4,5,6','E-A'),(26,'1,2,3','W-C'),(27,'1,2','E-A'),(28,'1,2','W-I'),(29,'1,2','W-A'),(30,'1,2,3','E-C'),(31,'1,2','W-I'),(32,'1,2','W-A'),(33,'1,2,3','E-C'),(34,'1,2','W-I'),(35,'5,6','W-A'),(36,'1,2','E-C'),(37,'1','W-I'),(38,'1,2','W-A'),(39,'1','W-I'),(40,'5,6','W-A'),(41,'1,2,3,4','E-C'),(42,'1,2','W-I'),(43,'1','W-A'),(44,'1,2,3','E-C'),(45,'1,2','W-I'),(46,'5,6','W-A'),(47,'1,2,3','E-C'),(48,'1,2','W-I'),(49,'1,2','W-A'),(50,'1,2','E-C'),(51,'1,2','W-I'),(52,'5,6','W-A'),(53,'1,2','E-C'),(54,'1,2','E-C');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `E_I` int(11) NOT NULL,
  `W_C` int(11) NOT NULL,
  `E_A` int(11) NOT NULL,
  `W_I` int(11) NOT NULL,
  `W_A` int(11) NOT NULL,
  `E_C` int(11) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `fk_results_users` (`user_id`),
  CONSTRAINT `fk_results_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (3,'c',5,9,7,9,5,9),(4,'a',5,9,7,9,5,9),(5,'b',5,9,7,9,5,9),(6,'d',5,9,7,9,5,9),(7,'e',5,9,7,9,5,9);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userAnswer`
--

DROP TABLE IF EXISTS `userAnswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userAnswer` (
  `user_id` varchar(20) NOT NULL,
  `user_answer` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_userAnswer_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userAnswer`
--

LOCK TABLES `userAnswer` WRITE;
/*!40000 ALTER TABLE `userAnswer` DISABLE KEYS */;
INSERT INTO `userAnswer` VALUES ('a','1,1,5,1,1,1,4,1,1,1,3,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1'),('b','1,1,5,1,1,1,4,1,1,1,3,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1'),('c','1,1,5,1,1,1,4,1,1,1,3,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1'),('d','1,1,5,1,1,1,4,1,1,1,3,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1'),('e','1,1,5,1,1,1,4,1,1,1,3,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1');
/*!40000 ALTER TABLE `userAnswer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_org` varchar(150) NOT NULL,
  `entryDate` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('a','a','a','2017-10-13'),('b','a','a','2017-10-13'),('c','a','a','2017-10-13'),('d','a','a','2017-10-13'),('e','k','a','2017-10-13');
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

-- Dump completed on 2017-10-19  9:11:49
