-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: cinema
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `acteur`
--

DROP TABLE IF EXISTS `acteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acteur` (
  `ida` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(140) DEFAULT NULL,
  `prenom` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`ida`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acteur`
--

LOCK TABLES `acteur` WRITE;
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` VALUES (1,'James','McAvoy'),(2,'Anya','Taylor-Joy'),(3,'hugh','Jackman'),(4,'Patrick','Sewart'),(5,'Ryan','Gosling'),(6,'Emma','Stone'),(7,'Dev','Patel'),(8,'Rooney','Mara'),(9,'Jane','Fonda'),(10,'Ugo','Tognazzi'),(11,'Ivana','Raquero'),(12,'Sergi','Lopez'),(13,'',''),(14,'',''),(15,'Jamie','Dornan'),(16,'Dakota','Johnson'),(17,'Sacha','Baron '),(18,'Mark','Strong'),(19,'',''),(20,'',''),(21,'MÃ©liÃ¨s','Georges'),(22,'Bernon','Bleuette'),(23,'Sheridan','Kelly'),(24,'Morrow','Kirby'),(25,'Hanks','Tom'),(26,'Duncan','Michael-Clarke'),(27,'McDowell','Malcolm'),(28,'Magee','Patrick'),(29,'Hiiragi','Rumi'),(30,'Irino','Miyu'),(31,'Hanks','Tom'),(32,'Sinise','Gary');
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `film`
--

DROP TABLE IF EXISTS `film`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `film` (
  `idf` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(140) DEFAULT NULL,
  `lien` varchar(250) DEFAULT NULL,
  `realisateur` varchar(140) DEFAULT NULL,
  `synopsis` text,
  `affiche` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film`
--

LOCK TABLES `film` WRITE;
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` VALUES (1,'La la land','https://www.youtube.com/embed/0pdqf4P9MB8','Damien Chazelle','lalaland.png','http://fr.web.img2.acsta.net/r_1024_576/pictures/16/11/10/13/52/169386.jpg','2017-01-25'),(2,'Logan','https://www.youtube.com/embed/Div0iP65aZo','James Mangold','logan.png','http://fr.web.img4.acsta.net/r_1920_1080/pictures/17/01/19/16/02/513278.jpg','2017-03-01'),(3,'split','https://www.youtube.com/embed/84TouqfIsiI','M. Night Shyamalan','split.png','http://fr.web.img6.acsta.net/r_1920_1080/pictures/16/12/09/09/51/046535.jpg','2017-02-22'),(4,'Lion','https://www.youtube.com/embed/-RNI9o06vqo','Garth Davis','lion.png','http://fr.web.img3.acsta.net/r_1920_1080/pictures/17/01/25/09/36/363964.jpg','2017-02-22'),(5,'Barbarella','https://www.youtube.com/embed/0Xo6FaypcpY','Roger Vadim','barbarella.png','http://fr.web.img3.acsta.net/r_1024_576/medias/nmedia/18/65/94/13/18898367.jpg','1968-10-25'),(6,'Le Labyrinthe de Pan','https://www.youtube.com/embed/GqHW3CyI7co','Guillermo del Toro','labyrinthe.png','http://fr.web.img6.acsta.net/r_1024_576/medias/nmedia/18/36/23/74/18680999.jpg','2006-11-01'),(7,'Cinquante Nuances de Grey','https://www.youtube.com/embed/lmtwxHr8t8w',' Sam Taylor-Johnson ','nuances.png','http://fr.web.img6.acsta.net/r_1920_1080/pictures/14/11/14/11/08/371396.jpg','2015-02-11'),(8,'Grimsby','https://www.youtube.com/embed/wB0BvZgYKdY','Louis Leterrier','grimsby.png','http://fr.web.img5.acsta.net/r_1920_1080/pictures/16/02/08/10/19/306648.jpg','2016-04-13'),(9,'Voyage dans la lune','https://www.youtube.com/embed/s5x_M_vcNVY','Georges MÃ©lies','voyage.png','https://doctorofmoviesdotcom.files.wordpress.com/2013/04/le-voyage-dans-la-lune.jpg','1902-01-01'),(10,'barbie casse noisette','https://www.youtube.com/embed/GYkPzg2s8rQ','Owen Hurley','barbie.png','http://ekladata.com/3piMwl7bXTWyl_RSa6FaR4LBlaE.jpg','2001-01-01'),(11,'La Ligne verte','https://www.youtube.com/embed/mccs8Ql8m8o','Frank Darabont','ligne_verte.png','http://fr.web.img4.acsta.net/r_1920_1080/medias/nmedia/18/66/15/78/19254683.jpg','2000-03-01'),(12,'Orange mÃ©canique','https://www.youtube.com/embed/Tys3BFPmxIg','Stanley Kubrick','orange_mecanique.png','http://fr.web.img6.acsta.net/r_1920_1080/medias/nmedia/18/36/25/34/18465555.jpg','1972-04-21'),(13,'Le voyage de Chihiro','https://www.youtube.com/embed/5-cro68n7CE',' Hayao Miyazaki ','voyage_chichiro.png','http://fr.web.img6.acsta.net/r_1920_1080/medias/nmedia/00/02/36/71/chihiro.jpg','2002-04-10'),(14,'Forest Gump','https://www.youtube.com/embed/vhbOdIJyalo',' Robert Zemeckis ','forrest_gump.png','http://fr.web.img4.acsta.net/r_1920_1080/pictures/15/10/13/15/12/514297.jpg','1994-10-04');
/*!40000 ALTER TABLE `film` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `film_acteur`
--

DROP TABLE IF EXISTS `film_acteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `film_acteur` (
  `ida` int(11) NOT NULL,
  `idf` int(11) NOT NULL,
  KEY `ida` (`ida`),
  KEY `idf` (`idf`),
  CONSTRAINT `film_acteur_ibfk_1` FOREIGN KEY (`ida`) REFERENCES `acteur` (`ida`),
  CONSTRAINT `film_acteur_ibfk_2` FOREIGN KEY (`idf`) REFERENCES `film` (`idf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film_acteur`
--

LOCK TABLES `film_acteur` WRITE;
/*!40000 ALTER TABLE `film_acteur` DISABLE KEYS */;
INSERT INTO `film_acteur` VALUES (6,1),(5,1),(3,2),(4,2),(1,3),(2,3),(7,4),(8,4),(9,5),(10,5),(11,6),(12,6),(15,7),(16,7),(17,8),(18,8),(21,9),(22,9),(23,10),(24,10),(25,11),(26,11),(27,12),(28,12),(29,13),(30,13),(31,14),(32,14);
/*!40000 ALTER TABLE `film_acteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste`
--

DROP TABLE IF EXISTS `liste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste` (
  `idu` int(11) NOT NULL,
  `idf` int(11) NOT NULL,
  `voir` tinyint(1) NOT NULL DEFAULT '0',
  `revoir` tinyint(1) NOT NULL DEFAULT '0',
  `decouvrir` tinyint(1) NOT NULL DEFAULT '0',
  KEY `idu` (`idu`),
  KEY `idf` (`idf`),
  CONSTRAINT `liste_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `utilisateur` (`idu`),
  CONSTRAINT `liste_ibfk_2` FOREIGN KEY (`idf`) REFERENCES `film` (`idf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste`
--

LOCK TABLES `liste` WRITE;
/*!40000 ALTER TABLE `liste` DISABLE KEYS */;
INSERT INTO `liste` VALUES (1,8,0,0,1),(4,2,0,1,0),(5,4,1,0,0),(5,4,0,1,0),(5,4,0,0,1),(6,8,1,0,0),(6,6,0,1,0),(1,5,0,0,1),(1,3,1,0,0),(1,3,0,0,1),(7,11,1,0,0),(1,3,0,1,0),(8,2,1,0,0),(8,2,1,0,0),(8,2,1,0,0),(8,2,1,0,0),(8,2,1,0,0),(8,2,1,0,0),(8,2,1,0,0),(8,2,1,0,0),(8,3,1,0,0),(8,3,0,1,0),(8,3,0,0,1),(4,1,1,0,0),(4,6,0,1,0),(4,4,1,0,0),(4,4,0,1,0),(4,4,0,0,1),(4,3,1,0,0),(4,3,0,0,1),(4,3,0,1,0),(1,3,1,0,0);
/*!40000 ALTER TABLE `liste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notation`
--

DROP TABLE IF EXISTS `notation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notation` (
  `idf` int(11) NOT NULL,
  `excellent` int(11) NOT NULL DEFAULT '0',
  `bon` int(11) DEFAULT '0',
  `moyen` int(11) DEFAULT '0',
  `bof` int(11) DEFAULT '0',
  `mediocre` int(11) DEFAULT '0',
  KEY `idf` (`idf`),
  CONSTRAINT `notation_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `film` (`idf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notation`
--

LOCK TABLES `notation` WRITE;
/*!40000 ALTER TABLE `notation` DISABLE KEYS */;
INSERT INTO `notation` VALUES (8,2,0,0,1,4),(11,1,0,0,0,0),(1,1,0,0,0,1),(12,1,0,0,0,0),(10,0,0,0,0,1),(5,1,0,0,0,0),(3,1,0,0,0,0),(6,1,0,0,1,0),(7,0,0,0,0,1),(9,1,0,0,0,0),(4,1,0,0,0,0),(13,2,1,0,0,0),(2,0,0,0,0,1),(14,0,0,0,0,0);
/*!40000 ALTER TABLE `notation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `mdp` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'Binard','Benjamin',NULL,'benji','coucou'),(2,'Juillet','Mathilde','mathilde.juillet@gmail.com','MathJ','def'),(3,'test','Titouan','titouan@gmail.com','Titi','echo'),(4,'Admin','Admin','admin@mechanique.com','Admin','Admin'),(5,'Tiff','Tiff','tiff@rvj.com','Tiff-tiff','google'),(6,'test','test','test@test.com','test','echo'),(7,'Marine','Marine','marine@isen.com','mar','mar'),(8,'bb','bb','ben@gg.com','bb','bb');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-14 17:19:07
