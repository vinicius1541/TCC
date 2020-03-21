CREATE DATABASE  IF NOT EXISTS `odonto_monicao` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `odonto_monicao`;
-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: odonto_monicao
-- ------------------------------------------------------
-- Server version	8.0.12

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
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `funcionarios` (
  `funcionario_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `celular` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `dtEntrada` datetime NOT NULL,
  `dtSaida` datetime DEFAULT NULL,
  PRIMARY KEY (`funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (1,'Root','0','0','0','','nothing to show',1,'2020-03-18 14:35:46',NULL),(2,'Vinicius Bernardo','09823461902','147485670','41987482415','vinicius-bernado2011@hotmail.com','Rua Giacomo Lafaiete M. Bassi',1,'2020-03-18 17:14:13',NULL),(4,'Pedro Figur','0987654321','123456789','12345678','pfigur@gmail.com','Desconhecido',1,'2020-03-18 22:01:55',NULL),(5,'jonas ricardo','12345987692','137564530','987612345','ricardo@gmail.com','Rua carlos fernandes da costa, 1330',1,'2020-03-20 19:11:22',NULL),(6,'Lucas Alfredo de Lima','09812345678','1234567890','4187654312','limalucas@hotmail.com','Rua Gilberto de Assis',1,'2020-03-20 19:30:50',NULL),(7,'','','','','','',1,'2020-03-21 15:16:08',NULL);
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivelacesso`
--

DROP TABLE IF EXISTS `nivelacesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nivelacesso` (
  `nivelacesso_id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_nome` varchar(32) NOT NULL,
  PRIMARY KEY (`nivelacesso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivelacesso`
--

LOCK TABLES `nivelacesso` WRITE;
/*!40000 ALTER TABLE `nivelacesso` DISABLE KEYS */;
INSERT INTO `nivelacesso` VALUES (0,'NEGADO'),(1,'Funcionario'),(2,'Admin');
/*!40000 ALTER TABLE `nivelacesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `nivelacesso_id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `login_UNIQUE` (`usuario`),
  KEY `fk_usuarios_nivelacesso_idx` (`nivelacesso_id`),
  KEY `fk_usuarios_func_idx` (`funcionario_id`),
  CONSTRAINT `fk_usuarios_func` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`funcionario_id`),
  CONSTRAINT `fk_usuarios_nivelacesso` FOREIGN KEY (`nivelacesso_id`) REFERENCES `nivelacesso` (`nivelacesso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'root','f9f7670ee37d626fbfd346eb5f93c98f',1,2,1),(2,'viniciusm','f9f7670ee37d626fbfd346eb5f93c98f',1,1,2),(4,'pfigur','827ccb0eea8a706c4c34a16891f84e7b',1,2,4),(5,'jric','81dc9bdb52d04dc20036dbd8313ed055',1,1,5),(6,'lalima','827ccb0eea8a706c4c34a16891f84e7b',1,2,6);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-21 17:41:55
