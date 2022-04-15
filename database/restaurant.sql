-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: hello
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `hello`
--

-- CREATE DATABASE /*!32312 IF NOT EXISTS*/ `hello` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

-- USE `hello`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `login` char(32) NOT NULL,
  `mdp` char(32) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `idCli` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(32) NOT NULL,
  `prenom` char(32) NOT NULL,
  `adresse` char(32) DEFAULT NULL,
  `tel` bigint(10) DEFAULT NULL,
  `cp` bigint(6) DEFAULT NULL,
  `mail` char(32) DEFAULT NULL,
  PRIMARY KEY (`idCli`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (11,'jean','jean','1 avenu Jean Jaurès',102030405,75000,'jean@hotmail.com'),(12,'Amarache','Yamarache2@hotmail.fr','91 Rue Léon Jacquin',770320788,77190,'Yamarache2@hotmail.fr'),(85,'bbbbbbbb','bssssssss','qqqqqqqq',6666666,66666,'azrav'),(101,'fatimata','sangare','dehors',444444444,4444444,'fatimata@abidjan.com0'),(102,'','','',0,0,''),(105,'taher','eaa','aaaaaaaaaa',5555555,55,'2000ee'),(106,'ema','le','eooe',6666,748541,'+96'),(107,'fatimata','sangare','dehors',0,0,'854'),(108,'jean','dupont','19 bd de l\'almont',752482921,77000,'zakinacercherif@gmail.com');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idCli` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `fk_commande_client` (`idCli`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idCli`) REFERENCES `client` (`idCli`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (61,101,'04.05.21 13:52:33'),(62,102,'04.05.21 14:58:09'),(63,105,'05.05.21 10:08:25'),(64,106,'05.05.21 11:04:12'),(65,107,'05.05.21 11:54:41'),(66,108,'01.04.22 16:12:35');
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `idProd` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prixProd` decimal(13,2) NOT NULL,
  `photo` longblob DEFAULT NULL,
  `categorie` smallint(6) DEFAULT NULL,
  `ingredient` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProd`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,'sushi saumon',2.00,'sushi-saumon.png',1,'riz'),(2,'Sushi crevette',2.00,'sushi-crevette.png',1,'riz,crevette'),(3,'Sushi saumon avocat',2.00,'sushi-saumon-avocat.png',1,''),(4,'Sushi saumon cheese',2.00,'sushi-saumon-cheese.png',1,''),(5,'Sushi tataki',2.00,'sushi-tataki.png',1,'saumon,riz'),(6,'Maki thon',1.50,'maki1.png',1,'riz,thon,avocat,algue,sesam'),(7,'Maki tempoura',1.50,'maki2.png',2,''),(8,'Maki avocat',1.50,'maki3.png',2,''),(9,'Maki tataki',1.50,'maki4.png',2,''),(11,'Maki vert',1.50,'maki5.png',2,''),(12,'Ceviche saumon',15.00,'ceviche-saumon.png',1,''),(13,'Chirashi salsa',13.00,'chirashi-salsa.png',1,''),(14,'Poke bowl',12.00,'poke-bowl.png',1,''),(15,'Poke ruby salmon',12.00,'poke-ruby-salmon.png',1,''),(16,'Sashimi bowl',12.00,'sashimi-bowl.png',1,''),(17,'Tartare saumon avocat',18.00,'tartare-saumon-avocat.png',1,'riz saumon avocat'),(18,'Tempura bowl',13.00,'tempura-bowl.png',1,'saumon riz'),(19,'Veggie bowl',11.00,'veggie-bowl.png',2,'saumon,riz'),(20,'Chirashi saumon',15.00,'chirashi-saumon.png',1,'saumon ');
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quantite`
--

DROP TABLE IF EXISTS `quantite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quantite` (
  `idCommande` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `qte_Commandee` int(11) NOT NULL,
  PRIMARY KEY (`idProd`,`idCommande`),
  KEY `fk_quantiter_commande` (`idCommande`),
  CONSTRAINT `fk_commande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  CONSTRAINT `fk_produit` FOREIGN KEY (`idProd`) REFERENCES `produit` (`idProd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quantite`
--

LOCK TABLES `quantite` WRITE;
/*!40000 ALTER TABLE `quantite` DISABLE KEYS */;
INSERT INTO `quantite` VALUES (61,1,1),(62,1,6),(61,2,1),(62,2,5),(63,2,1),(65,2,12),(61,3,1),(62,3,4),(63,3,1),(64,3,1),(65,3,4),(61,4,1),(62,4,3),(63,4,1),(64,4,1),(66,5,1),(64,7,1);
/*!40000 ALTER TABLE `quantite` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-15  0:23:10
