CREATE DATABASE  IF NOT EXISTS `adriana_ortiz` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `adriana_ortiz`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: adriana_ortiz
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `allies`
--

DROP TABLE IF EXISTS `allies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `allies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allies`
--

LOCK TABLES `allies` WRITE;
/*!40000 ALTER TABLE `allies` DISABLE KEYS */;
INSERT INTO `allies` VALUES (1,6,NULL,NULL,NULL),(2,6,NULL,NULL,NULL);
/*!40000 ALTER TABLE `allies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `gallery_id` bigint unsigned DEFAULT NULL,
  `video_gallery_id` bigint unsigned DEFAULT NULL,
  `slug` varchar(245) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `image` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_seo` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_category_id_foreign` (`category_id`),
  KEY `articles_gallery_id_foreign` (`gallery_id`),
  KEY `articles_video_gallery_id_foreign` (`video_gallery_id`),
  CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `articles_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE SET NULL,
  CONSTRAINT `articles_video_gallery_id_foreign` FOREIGN KEY (`video_gallery_id`) REFERENCES `video_galleries` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,8,NULL,NULL,'11','2023-06-27','202306270358554.png',NULL,'2023-06-27 15:54:35','2023-08-16 15:10:59','2023-08-16 15:10:59'),(2,8,NULL,NULL,'22','2023-06-27','202306270358466.png',NULL,'2023-06-27 15:54:54','2023-08-16 15:10:57','2023-08-16 15:10:57'),(3,8,NULL,NULL,'33','2023-06-27','202306270358397.png',NULL,'2023-06-27 15:55:03','2023-08-16 15:10:55','2023-08-16 15:10:55'),(4,8,NULL,NULL,'44','2023-06-27','202306270358306.png',NULL,'2023-06-27 15:55:15','2023-08-16 15:10:27','2023-08-16 15:10:27'),(5,8,NULL,NULL,'57','2023-06-27','202306270433506.png',NULL,'2023-06-27 18:41:10','2023-08-16 15:10:24','2023-08-16 15:10:24'),(6,8,NULL,NULL,'sluggg','2023-06-30',NULL,NULL,'2023-06-30 16:07:46','2023-08-16 15:09:50','2023-08-16 15:09:50'),(7,12,NULL,NULL,'enfrentatusmiedos','2023-07-11','202307110345371.png',NULL,'2023-07-11 15:45:37','2023-08-29 10:50:08','2023-08-29 10:50:08'),(8,8,NULL,NULL,'lorem','2023-08-01','202308170848153.png',NULL,'2023-08-17 08:48:15','2023-08-29 10:50:10','2023-08-29 10:50:10'),(9,8,NULL,NULL,'-1','2023-08-04','202308170850192.png',NULL,'2023-08-17 08:50:19','2023-08-29 10:50:05','2023-08-29 10:50:05'),(10,8,NULL,NULL,'-2','2023-08-17','202308170858580.png',NULL,'2023-08-17 08:58:58','2023-08-29 10:50:02','2023-08-29 10:50:02'),(11,12,NULL,NULL,'-3','2024-02-02',NULL,NULL,'2024-02-02 22:52:53','2024-02-02 22:52:53',NULL);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position` int NOT NULL DEFAULT '0',
  `parent` int NOT NULL DEFAULT '0',
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int NOT NULL DEFAULT '0',
  `show_delete` int NOT NULL DEFAULT '1',
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (5,0,0,'service',NULL,0,1,0,'2023-06-06 16:49:30','2023-06-06 16:49:30',NULL),(6,0,0,'service',NULL,0,1,0,'2023-06-06 16:49:46','2023-06-06 16:49:46',NULL),(7,0,0,'content',NULL,0,1,0,'2023-06-06 20:20:21','2023-08-28 11:11:14','2023-08-28 11:11:14'),(8,0,0,'article',NULL,0,1,0,'2023-06-27 15:54:19','2023-06-27 15:54:19',NULL),(9,0,0,'content',NULL,0,1,0,'2023-07-11 15:05:55','2023-07-11 15:05:55',NULL),(10,0,0,'content',NULL,0,1,0,'2023-07-11 15:12:44','2023-07-11 15:12:44',NULL),(11,0,0,'article',NULL,0,1,0,'2023-07-11 15:39:16','2023-07-11 15:39:16',NULL),(12,0,0,'article',NULL,0,1,0,'2023-07-11 15:39:43','2023-07-11 15:39:43',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configsites`
--

DROP TABLE IF EXISTS `configsites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configsites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configsites`
--

LOCK TABLES `configsites` WRITE;
/*!40000 ALTER TABLE `configsites` DISABLE KEYS */;
INSERT INTO `configsites` VALUES (1,'title_meta','Adriana Ortiz - Terapeuta y Coach Integral','es','2023-06-07 21:01:12','2023-09-28 16:58:41'),(2,'title_meta',NULL,'en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(3,'keywords_meta','Terapeuta Armenia,Coach Integral,Terapeutas en Armenia,Coach en Eje CAfetero','es','2023-06-07 21:01:12','2023-09-28 16:58:41'),(4,'keywords_meta',NULL,'en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(5,'description_meta','Viniste a ser feliz, no te distraigas!','es','2023-06-07 21:01:12','2023-09-28 16:58:41'),(6,'description_meta',NULL,'en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(7,'facebook',NULL,'es','2023-06-07 21:01:12','2023-09-28 16:58:41'),(8,'facebook',NULL,'en','2023-06-07 21:01:12','2023-09-28 16:58:41'),(9,'instagram',NULL,'es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(10,'instagram',NULL,'en','2023-06-07 21:01:12','2023-09-28 16:58:42'),(11,'twitter',NULL,'es','2023-06-07 21:01:12','2023-09-28 16:58:41'),(12,'twitter',NULL,'en','2023-06-07 21:01:12','2023-09-28 16:58:41'),(13,'youtube',NULL,'es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(14,'youtube',NULL,'en','2023-06-07 21:01:12','2023-09-28 16:58:42'),(15,'email','unencuentrodealmas@adrianaortizrojas.com','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(16,'email','adriana@test.com','en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(17,'phone','3168715725','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(18,'phone','3123456788','en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(19,'whatsapp','3168715725','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(20,'whatsapp',NULL,'en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(21,'city','Armenia','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(22,'city','Armenia','en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(23,'address','Cra 17 # 21Norte 05 Consultorio 101','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(24,'address','Cra 17 Calle 10 N Edificio Adriana','en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(25,'analytics','G-LF3FXQ0RT8','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(26,'analytics','G-LF3FXQ0RT8','en','2023-06-07 21:01:12','2023-09-28 16:58:42'),(27,'template_color','#35D0A9','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(28,'template_color','#35D0A9','en','2023-06-07 21:01:12','2023-09-28 16:58:42'),(29,'latitude','4.9842412512187035','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(30,'latitude',NULL,'en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(31,'longitude','-74.88281250000001','es','2023-06-07 21:01:12','2023-09-28 16:58:42'),(32,'longitude',NULL,'en','2023-06-07 21:01:12','2023-06-07 21:01:12'),(33,'linkedin','https://www.linkedin.com/in/adriana-ortiz-rojas-45463b80','es',NULL,'2023-09-28 16:58:41'),(34,'image1',NULL,'es',NULL,NULL),(35,'image2',NULL,'es',NULL,NULL),(36,'image3',NULL,'es',NULL,NULL),(37,'image4',NULL,'es',NULL,NULL),(38,'icono-1','202308280957313.png','es','2023-06-26 21:47:47','2023-08-28 09:57:32'),(39,'icono-1','202306260447471.png','en','2023-06-26 21:47:47','2023-06-26 21:47:47'),(40,'icono-4','202308280957313.png','es','2023-06-26 21:49:09','2023-08-28 09:57:32'),(41,'icono-4','202306260449097.png','en','2023-06-26 21:49:09','2023-06-26 21:49:09'),(42,'icono-2','202309281158150.png','es','2023-06-26 21:57:33','2023-09-28 16:58:15'),(43,'icono-2','202306260457330.png','en','2023-06-26 21:57:33','2023-06-26 21:57:33'),(44,'icono-3','202308280957311.png','es','2023-06-26 21:57:33','2023-08-28 09:57:32'),(45,'icono-3','202306260457330.png','en','2023-06-26 21:57:33','2023-06-26 21:57:33'),(46,'icon-description-1','Terapia Reiki','es','2023-06-26 21:59:20','2023-09-28 16:58:42'),(47,'icon-description-1','Descripcion 1','en','2023-06-26 21:59:20','2023-06-26 21:59:20'),(48,'icon-description-2','Eneagrama de la Personalidad','es','2023-06-26 21:59:20','2023-09-28 16:58:42'),(49,'icon-description-2','Descripcion 2','en','2023-06-26 21:59:20','2023-06-26 21:59:20'),(50,'icon-description-3','Programación NeuroLingüística','es','2023-06-26 21:59:20','2023-09-28 16:58:42'),(51,'icon-description-3','Descripcion 3','en','2023-06-26 21:59:20','2023-06-26 21:59:20'),(52,'icon-description-4','Descodificación Biológica y Emocional','es','2023-06-26 21:59:20','2023-09-28 16:58:42'),(53,'icon-description-4','Descripcion 4','en','2023-06-26 21:59:20','2023-06-26 21:59:20'),(54,'title-offers','Estoy aquí para ayudarte!','es','2023-06-26 22:09:12','2023-09-28 16:58:42'),(55,'title-offers','Titulo','en','2023-06-26 22:09:12','2023-06-26 22:09:12'),(56,'description-offers','Hola! Bienvenido a UN ENCUENTRO DE ALMAS, con más de 10 años de experiencia al servicio de la humanidad, acompañando en procesos de empoderamiento personal y equilibrio emocional.  Te invito a sanar tus heridas y salir de las crisis que te bloquean y paralizan.  Experimenta una manera diferente de vivir más plenamente y en armonía.  \"Viniste a ser feliz, no te distraigas\"','es','2023-06-26 22:09:12','2023-09-28 16:58:42'),(57,'description-offers','Entradilla','en','2023-06-26 22:09:12','2023-06-26 22:09:12'),(58,'parallax-title','Bienvenido a este espacio','es','2023-06-27 13:47:04','2023-09-28 16:58:42'),(59,'parallax-title','Titulo','en','2023-06-27 13:47:04','2023-06-27 13:47:04'),(60,'parallax-description','Soy BioPsicoTerapeuta por elección y  pasión desde hace más de 10 años.  Mi formación inicial fue como Profesional en Instrumentación Quirúrgica y mi propósito de vida me llevó a seguir al servicio de la humanidad.  Me formé como Terapeuta Transpersonal, realizo acompañamientos desde el alma con una escucha plena y consciente para ayudar al consultante a Darse Cuenta de sus conflictos y desde allí iniciar procesos de sanación.  Especialista  en Descodificación Biológica y Emocional, Hipnosis Clínica Reparadora, Terapia de Parejas, Terapia Infantil y de Adolescente, Terapia Reiki, Tarot Terapéutico, Terapia de Ángeles y actualmente curso estudios en PNL.   Acompaño en procesos de duelo, empoderamiento personal e inteligencia emocional.','es','2023-06-27 13:47:04','2023-09-28 16:58:42'),(61,'parallax-description','Entradilla','en','2023-06-27 13:47:04','2023-06-27 13:47:04'),(62,'parallax-image','202308280959576.png','es','2023-06-27 13:54:51','2023-08-28 09:59:59'),(63,'parallax-image','202306270854514.png','en','2023-06-27 13:54:51','2023-06-27 13:54:51'),(64,'parallax-signature','202308260712474.png','es','2023-06-27 13:54:51','2023-08-26 07:12:48'),(65,'parallax-signature','202306270854510.png','en','2023-06-27 13:54:51','2023-06-27 13:54:51'),(66,'question_1','¿Cuánto tiempo dura una sesión terapéutica?','es','2023-06-28 15:06:31','2023-09-28 16:58:42'),(67,'question_1','Pregunta 1','en','2023-06-28 15:06:31','2023-06-28 15:06:31'),(68,'answer_1','Son sesiones de mínimo una hora dependiendo del proceso de cada uno, tiempo recomendado para el desarrollo de una sesión.','es','2023-06-28 15:06:31','2023-09-28 16:58:42'),(69,'answer_1','Respuesta 1','en','2023-06-28 15:06:31','2023-06-28 15:06:31'),(70,'question_2','¿Cuántas sesiones tiene un proceso psicoterapéutico?','es','2023-06-28 15:06:31','2023-09-28 16:58:42'),(71,'question_2','Pregunta 2','en','2023-06-28 15:06:31','2023-06-28 15:06:31'),(72,'answer_2','El número de terapias depende la complejidad de cada caso y el compromiso del paciente','es','2023-06-28 15:06:31','2023-09-28 16:58:42'),(73,'answer_2','Respuesta 2','en','2023-06-28 15:06:31','2023-06-28 15:06:31'),(74,'question_3','¿Quiénes pueden tomar terapia?','es','2023-06-28 15:06:31','2023-09-28 16:58:42'),(75,'question_3','Pregunta 3','en','2023-06-28 15:06:31','2023-06-28 15:06:31'),(76,'answer_3','Desde niños, adolescentes, adultos y adultos mayores en situaciones de crisis o empoderamiento personal.','es','2023-06-28 15:06:31','2023-09-28 16:58:42'),(77,'answer_3','Respuesta 3','en','2023-06-28 15:06:31','2023-06-28 15:06:31'),(78,'question_4','¿En qué modalidad puedo tomar la terapia?','es','2023-06-28 15:06:31','2023-09-28 16:58:42'),(79,'question_4','Pregunta 4','en','2023-06-28 15:06:31','2023-06-28 15:06:31'),(80,'answer_4','Pueden tomar la terapia en modalidad virtual o presencial.','es','2023-06-28 15:06:31','2023-09-28 16:58:42'),(81,'answer_4','Respuesta 4','en','2023-06-28 15:06:31','2023-06-28 15:06:31'),(82,'faq_title','Preguntas Frecuentes','es','2023-06-28 15:58:49','2023-09-28 16:58:42'),(83,'faq_title','Preguntas frecuentes','en','2023-06-28 15:58:49','2023-06-28 15:58:49'),(84,'faq_description',NULL,'es','2023-06-28 15:58:49','2023-09-28 16:58:42'),(85,'faq_description','Exercitation cupim ex, short ribs cow in ullamco corned beef veniam kevin. Eu frankfurter ham hock ball tip reprehenderit adipisicing ipsum jerky tenderloin aliquip.','en','2023-06-28 15:58:49','2023-06-28 15:58:49'),(86,'video_gallery_id','5','es','2023-06-28 16:13:45','2023-09-28 16:58:41'),(87,'video_gallery_id','3','en','2023-06-28 16:13:45','2023-06-28 16:13:45'),(88,'contact-title','¿Conversamos?','es','2023-06-28 21:31:06','2023-09-28 16:58:42'),(89,'contact-title','¿Conversamos?','en','2023-06-28 21:31:06','2023-06-28 21:31:06'),(90,'contact-description','Deseas alcanzar tus sueños, tener una vida sana y abundante, bienestar emocional, empoderamiento personal y vivir plenamente? Contáctame!','es','2023-06-28 21:31:06','2023-09-28 16:58:42'),(91,'contact-description','Exercitation cupim ex, short ribs cow in ullamco corned beef veniam kevin. Eu frankfurter ham hock ball tip reprehenderit adipisicing ipsum','en','2023-06-28 21:31:06','2023-06-28 21:31:06'),(92,'banner','202307110436262.png','es','2023-07-11 16:36:27','2023-07-11 16:36:27'),(93,'banner','202307110436262.png','en','2023-07-11 16:36:27','2023-07-11 16:36:27'),(94,'icon','202307110436262.png','es','2023-07-11 16:36:27','2023-07-11 16:36:27'),(95,'icon','202307110436262.png','en','2023-07-11 16:36:27','2023-07-11 16:36:27'),(96,'article-title','Un Encuentro de Almas','es','2023-08-01 10:03:15','2023-09-28 16:58:42'),(97,'article-title','Titulo Articulos','en','2023-08-01 10:03:15','2023-08-01 10:03:15'),(98,'article-description',NULL,'es','2023-08-01 10:03:15','2023-09-28 16:58:42'),(99,'article-description','Exercitation cupim ex, short ribs cow in ullamco corned beef veniam kevin. Eu frankfurter ham hock ball tip reprehenderit adipisicing ipsum jerky tenderloin aliquip. Exercitation cupim ex, short ribs cow in ullamco corned beef veniam kevin. Eu frankfurter ham hock ball tip reprehenderit adipisicing ipsum jerky tenderloin aliquip. Exercitation cupim ex, short ribs cow in ullamco corned beef veniam kevin. Eu frankfurter ham hock ball tip reprehenderit adipisicing ipsum jerky tenderloin aliquip.','en','2023-08-01 10:03:15','2023-08-01 10:03:15');
/*!40000 ALTER TABLE `configsites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `gallery_id` bigint unsigned DEFAULT NULL,
  `video_gallery_id` bigint unsigned DEFAULT NULL,
  `show_delete` int NOT NULL DEFAULT '1',
  `slug` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_seo` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contents_category_id_foreign` (`category_id`),
  KEY `contents_gallery_id_foreign` (`gallery_id`),
  KEY `contents_video_gallery_id_foreign` (`video_gallery_id`),
  CONSTRAINT `contents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `contents_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE SET NULL,
  CONSTRAINT `contents_video_gallery_id_foreign` FOREIGN KEY (`video_gallery_id`) REFERENCES `video_galleries` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (5,9,NULL,NULL,0,'Política Datos Personales',NULL,NULL,'2023-06-06 20:20:36','2023-07-11 15:08:04',NULL),(6,7,NULL,NULL,1,'slug2',NULL,NULL,'2023-06-07 15:03:41','2023-08-28 11:08:23','2023-08-28 11:08:23'),(7,7,NULL,NULL,1,'slug3',NULL,NULL,'2023-06-07 15:08:26','2023-08-28 11:11:03','2023-08-28 11:11:03'),(8,7,NULL,7,1,'1',NULL,NULL,'2023-06-07 15:14:11','2023-08-28 11:11:06','2023-08-28 11:11:06'),(9,10,7,10,1,'quien-es-adriana',NULL,NULL,'2023-07-11 15:17:06','2023-07-24 16:43:23',NULL),(10,10,NULL,NULL,1,'-1',NULL,NULL,'2023-09-22 17:22:42','2023-09-27 19:05:22','2023-09-27 19:05:22');
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_service` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (246,'Sesión de una hora',7,'2023-08-28 15:34:34','2023-08-28 15:34:34'),(247,'Actividades Practicas',7,'2023-08-28 15:34:34','2023-08-28 15:34:34'),(248,'Sesiones compartidas',6,'2023-08-28 15:44:44','2023-08-28 15:44:44'),(249,'Actividades practicas',6,'2023-08-28 15:44:44','2023-08-28 15:44:44'),(250,'Sesión de una hora',6,'2023-08-28 15:44:44','2023-08-28 15:44:44'),(252,'Sesión de una hora',8,'2023-08-28 15:45:24','2023-08-28 15:45:24'),(253,'Actividades practicas',8,'2023-08-28 15:45:24','2023-08-28 15:45:24'),(254,'Sesión de una hora',9,'2023-09-22 20:51:12','2023-09-22 20:51:12'),(257,'Sesión de una hora',11,'2023-09-28 17:03:13','2023-09-28 17:03:13'),(258,'Actividades Prácticas',11,'2023-09-28 17:03:13','2023-09-28 17:03:13');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_galleries`
--

DROP TABLE IF EXISTS `file_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `file_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_galleries`
--

LOCK TABLES `file_galleries` WRITE;
/*!40000 ALTER TABLE `file_galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint unsigned NOT NULL,
  `filename` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `files_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `file_galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Gallery','2023-06-06 15:03:03','2023-06-06 15:03:03',NULL),(2,'Gallery','2023-06-06 20:51:31','2023-06-06 20:51:31',NULL),(3,'Gallery','2023-06-06 20:54:06','2023-06-06 20:54:06',NULL),(4,'Gallery','2023-06-26 18:20:01','2023-06-26 18:20:01',NULL),(5,'Gallery','2023-06-28 21:27:48','2023-06-28 21:27:48',NULL),(6,'Gallery','2023-07-11 15:19:20','2023-07-11 15:19:20',NULL),(7,'Gallery','2023-07-24 16:43:21','2023-07-24 16:43:21',NULL),(8,'Gallery','2023-09-22 17:22:09','2023-09-22 17:22:09',NULL),(9,'Gallery','2023-09-27 00:08:51','2023-09-27 00:08:51',NULL),(10,'Gallery','2023-09-27 19:00:10','2023-09-27 19:00:10',NULL),(11,'Gallery','2023-09-27 19:03:01','2023-09-27 19:03:01',NULL),(12,'Gallery','2023-09-27 19:35:31','2023-09-27 19:35:31',NULL),(13,'Gallery','2023-09-27 19:49:59','2023-09-27 19:49:59',NULL),(14,'Gallery','2023-09-27 19:56:05','2023-09-27 19:56:05',NULL),(15,'Gallery','2024-01-10 21:48:56','2024-01-10 21:48:56',NULL),(16,'Gallery','2024-01-10 21:49:55','2024-01-10 21:49:55',NULL),(17,'Gallery','2024-01-10 21:58:05','2024-01-10 21:58:05',NULL),(18,'Gallery','2024-02-02 23:36:27','2024-02-02 23:36:27',NULL);
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint unsigned NOT NULL,
  `filename` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_images_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (1,1,'202306061003047.png',0,'2023-06-06 15:03:04','2023-06-06 15:03:04'),(2,1,'202306061003094.png',0,'2023-06-06 15:03:09','2023-06-06 15:03:09'),(3,2,'202306060351316.png',0,'2023-06-06 20:51:31','2023-06-06 20:51:31'),(4,3,'202306060354063.png',0,'2023-06-06 20:54:06','2023-06-06 20:54:06'),(5,3,'202306060417141.png',1,'2023-06-06 21:17:14','2023-06-06 21:28:20'),(6,3,'202306060425593.png',2,'2023-06-06 21:25:59','2023-06-06 21:28:20'),(8,5,'202306280427488.png',0,'2023-06-28 21:27:48','2023-06-28 21:27:48'),(19,14,'202309270256060.png',0,'2023-09-27 19:56:09','2023-09-27 19:56:09'),(24,7,'202401100431370.png',0,'2024-01-10 21:31:38','2024-01-10 21:31:38');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_articles`
--

DROP TABLE IF EXISTS `info_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `article_id` bigint unsigned NOT NULL,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_meta` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_meta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_meta` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_articles_article_id_foreign` (`article_id`),
  CONSTRAINT `info_articles_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_articles`
--

LOCK TABLES `info_articles` WRITE;
/*!40000 ALTER TABLE `info_articles` DISABLE KEYS */;
INSERT INTO `info_articles` VALUES (1,1,'es','PRUEBA 1','PRUEBA 1','<p>PRUEBA 1</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>PRUEBA 1</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><span style=\"font-family:Comic Sans MS,cursive\">PRUEBA 1</span></strong></p>',NULL,NULL,NULL,'2023-06-27 15:54:35','2023-06-27 20:58:55'),(2,1,'en','PRUEBA 1','PRUEBA 1','<p>PRUEBA 1</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>PRUEBA 1</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><span style=\"font-family:Comic Sans MS,cursive\">PRUEBA 1</span></strong></p>',NULL,NULL,NULL,'2023-06-27 15:54:35','2023-06-27 15:54:35'),(3,2,'es','PRUEBA 2','PRUEBA 2','<p>PRUEBA 2</p>\r\n\r\n<p>PRUEBA 2</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u>PRUEBA 2</u></p>',NULL,NULL,NULL,'2023-06-27 15:54:54','2023-06-27 20:58:46'),(4,2,'en','PRUEBA 2','PRUEBA 2','<p>PRUEBA 2</p>\r\n\r\n<p>PRUEBA 2</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u>PRUEBA 2</u></p>',NULL,NULL,NULL,'2023-06-27 15:54:54','2023-06-27 15:54:54'),(5,3,'es','PRUEBA 3','PRUEBA 3','<p>PRUEBA 3PRUEBA 3PRUEBA 3</p>',NULL,NULL,NULL,'2023-06-27 15:55:03','2023-06-27 20:58:39'),(6,3,'en','PRUEBA 3','PRUEBA 3','<p>PRUEBA 3PRUEBA 3PRUEBA 3</p>',NULL,NULL,NULL,'2023-06-27 15:55:03','2023-06-27 15:55:03'),(7,4,'es','PRUEBA 4','PRUEBA 4','<p>PRUEBA 4</p>\r\n\r\n<p><span style=\"font-family:Georgia,serif\">PRUEBA 4</span></p>\r\n\r\n<p>PRUEBA 4</p>\r\n\r\n<p><strong>PRUEBA 4PRUEBA 4</strong></p>',NULL,NULL,NULL,'2023-06-27 15:55:15','2023-06-27 20:58:30'),(8,4,'en','PRUEBA 4','PRUEBA 4','<p>PRUEBA 4</p>\r\n\r\n<p><span style=\"font-family:Georgia,serif\">PRUEBA 4</span></p>\r\n\r\n<p>PRUEBA 4</p>\r\n\r\n<p><strong>PRUEBA 4PRUEBA 4</strong></p>',NULL,NULL,NULL,'2023-06-27 15:55:15','2023-06-27 15:55:15'),(9,5,'es','Prueba 5','Prueba 5','<p>Prueba 5Prueba 5Prueba 5Prueba 5</p>',NULL,NULL,NULL,'2023-06-27 18:41:10','2023-06-30 16:07:00'),(10,5,'en','Prueba 5','Prueba 5','<p>Prueba 5Prueba 5Prueba 5Prueba 5</p>',NULL,NULL,NULL,'2023-06-27 18:41:10','2023-06-27 18:41:10'),(11,6,'es','Prueba SLug','Slugggg',NULL,NULL,NULL,NULL,'2023-06-30 16:07:46','2023-06-30 16:07:46'),(12,6,'en','Prueba SLug','Slugggg',NULL,NULL,NULL,NULL,'2023-06-30 16:07:46','2023-06-30 16:07:46'),(13,7,'es','Enfrenta tus miedos','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500','<h2>&iquest;Qu&eacute; es Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>\r\n\r\n<h2>&iquest;Por qu&eacute; lo usamos?</h2>\r\n\r\n<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una b&uacute;squeda de &quot;Lorem Ipsum&quot; va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a trav&eacute;s de los a&ntilde;os, algunas veces por accidente, otras veces a prop&oacute;sito (por ejemplo insert&aacute;ndole humor y cosas por el estilo).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&iquest;De d&oacute;nde viene?</h2>\r\n\r\n<p>Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl&acute;sica de la literatura del Latin, que data del a&ntilde;o 45 antes de Cristo, haciendo que este adquiera mas de 2000 a&ntilde;os de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontr&oacute; una de las palabras m&aacute;s oscuras de la lengua del lat&iacute;n, &quot;consecteur&quot;, en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del lat&iacute;n, descubri&oacute; la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de &quot;de Finnibus Bonorum et Malorum&quot; (Los Extremos del Bien y El Mal) por Cicero, escrito en el a&ntilde;o 45 antes de Cristo. Este libro es un tratado de teor&iacute;a de &eacute;ticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, viene de una linea en la secci&oacute;n 1.10.32</p>\r\n\r\n<p>El trozo de texto est&aacute;ndar de Lorem Ipsum usado desde el a&ntilde;o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de &quot;de Finibus Bonorum et Malorum&quot; por Cicero son tambi&eacute;n reproducidas en su forma original exacta, acompa&ntilde;adas por versiones en Ingl&eacute;s de la traducci&oacute;n realizada en 1914 por H. Rackham.</p>\r\n\r\n<h2>&iquest;D&oacute;nde puedo conseguirlo?</h2>\r\n\r\n<p>Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayor&iacute;a sufri&oacute; alteraciones en alguna manera, ya sea porque se le agreg&oacute; humor, o palabras aleatorias que no parecen ni un poco cre&iacute;bles. Si vas a utilizar un pasaje de Lorem Ipsum, necesit&aacute;s estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el &uacute;nico generador verdadero (v&aacute;lido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del lat&iacute;n, combinadas con estructuras muy &uacute;tiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estar&aacute; libre de repeticiones, humor agregado o palabras no caracter&iacute;sticas del lenguaje, etc.</p>',NULL,NULL,NULL,'2023-07-11 15:45:37','2023-07-11 15:45:37'),(14,7,'en','Enfrenta tus miedos','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500','<h2>&iquest;Qu&eacute; es Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>\r\n\r\n<h2>&iquest;Por qu&eacute; lo usamos?</h2>\r\n\r\n<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una b&uacute;squeda de &quot;Lorem Ipsum&quot; va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a trav&eacute;s de los a&ntilde;os, algunas veces por accidente, otras veces a prop&oacute;sito (por ejemplo insert&aacute;ndole humor y cosas por el estilo).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&iquest;De d&oacute;nde viene?</h2>\r\n\r\n<p>Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl&acute;sica de la literatura del Latin, que data del a&ntilde;o 45 antes de Cristo, haciendo que este adquiera mas de 2000 a&ntilde;os de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontr&oacute; una de las palabras m&aacute;s oscuras de la lengua del lat&iacute;n, &quot;consecteur&quot;, en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del lat&iacute;n, descubri&oacute; la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de &quot;de Finnibus Bonorum et Malorum&quot; (Los Extremos del Bien y El Mal) por Cicero, escrito en el a&ntilde;o 45 antes de Cristo. Este libro es un tratado de teor&iacute;a de &eacute;ticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, viene de una linea en la secci&oacute;n 1.10.32</p>\r\n\r\n<p>El trozo de texto est&aacute;ndar de Lorem Ipsum usado desde el a&ntilde;o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de &quot;de Finibus Bonorum et Malorum&quot; por Cicero son tambi&eacute;n reproducidas en su forma original exacta, acompa&ntilde;adas por versiones en Ingl&eacute;s de la traducci&oacute;n realizada en 1914 por H. Rackham.</p>\r\n\r\n<h2>&iquest;D&oacute;nde puedo conseguirlo?</h2>\r\n\r\n<p>Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayor&iacute;a sufri&oacute; alteraciones en alguna manera, ya sea porque se le agreg&oacute; humor, o palabras aleatorias que no parecen ni un poco cre&iacute;bles. Si vas a utilizar un pasaje de Lorem Ipsum, necesit&aacute;s estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el &uacute;nico generador verdadero (v&aacute;lido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del lat&iacute;n, combinadas con estructuras muy &uacute;tiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estar&aacute; libre de repeticiones, humor agregado o palabras no caracter&iacute;sticas del lenguaje, etc.</p>',NULL,NULL,NULL,'2023-07-11 15:45:37','2023-07-11 15:45:37'),(15,8,'es','Lorem Ipsum','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat molestie erat. Maecenas efficitur est elit, non ultrices dolor vehicula vitae. Sed sit amet efficitur odio. Quisque vitae commodo urna, vel vehicula leo. Donec vitae dolor non dolor feugiat iaculis. Suspendisse bibendum eu arcu eu hendrerit. Mauris lacinia felis eu euismod viverra. Phasellus et metus sed leo fermentum accumsan sit amet id purus. In euismod odio sem, eu consectetur nisl venenatis at. Donec id elementum odio, eu luctus sem.</p>\r\n\r\n<p>Quisque id metus in nibh pellentesque molestie a vitae diam. Curabitur nibh neque, convallis ut ultrices eget, posuere facilisis nulla. Integer et ipsum elit. Etiam orci dui, posuere eu hendrerit id, suscipit venenatis leo. Vivamus volutpat sapien ac est finibus facilisis. Cras ante elit, fermentum sit amet laoreet sed, pharetra at eros. Maecenas aliquet, nisl eget pretium aliquet, eros nibh posuere turpis, ut finibus odio lectus et libero.</p>',NULL,NULL,NULL,'2023-08-17 08:48:15','2023-08-17 08:48:33'),(16,8,'en','Lorem Ipsum','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat molestie erat. Maecenas efficitur est elit, non ultrices dolor vehicula vitae. Sed sit amet efficitur odio. Quisque vitae commodo urna, vel vehicula leo. Donec vitae dolor non dolor feugiat iaculis. Suspendisse bibendum eu arcu eu hendrerit. Mauris lacinia felis eu euismod viverra. Phasellus et metus sed leo fermentum accumsan sit amet id purus. In euismod odio sem, eu consectetur nisl venenatis at. Donec id elementum odio, eu luctus sem.</p>\r\n\r\n<p>Quisque id metus in nibh pellentesque molestie a vitae diam. Curabitur nibh neque, convallis ut ultrices eget, posuere facilisis nulla. Integer et ipsum elit. Etiam orci dui, posuere eu hendrerit id, suscipit venenatis leo. Vivamus volutpat sapien ac est finibus facilisis. Cras ante elit, fermentum sit amet laoreet sed, pharetra at eros. Maecenas aliquet, nisl eget pretium aliquet, eros nibh posuere turpis, ut finibus odio lectus et libero.</p>',NULL,NULL,NULL,'2023-08-17 08:48:15','2023-08-17 08:48:15'),(17,9,'es','Lorem ipsum dolor sit amet consectetur adipiscing elit','aenean urna quis at senectus rutrum felis tempor integer ante. Suscipit faucibus pharetra arcu netus malesuada neque turpis sociis etiam ad, lacinia sodales dignissim rhoncus semper ridiculus lobortis rutrum elementum, sollicitudin in condimentum at tempus libero eu odio porta. Lobortis curae mauris','<p>Interdum quisque nullam a erat ut eu mus, scelerisque porttitor sodales augue eleifend ultrices dictum hac, lobortis rhoncus torquent luctus congue cum habitant, elementum integer condimentum fermentum faucibus nisl. Sociis enim placerat lacinia nunc suspendisse etiam curae aptent, lectus blandit ornare duis montes morbi quam tempor, felis faucibus vehicula elementum ultricies curabitur tortor. Potenti etiam tristique montes volutpat ridiculus congue luctus quisque purus, duis penatibus dignissim vehicula parturient donec dui blandit ut, suspendisse iaculis cras rhoncus aenean gravida neque bibendum. Urna at curabitur convallis diam ultricies primis quisque nibh donec rhoncus, sapien et arcu sem ad mauris taciti quam tempus eleifend, cubilia fermentum platea pharetra hendrerit dui a euismod class.</p>',NULL,NULL,NULL,'2023-08-17 08:50:19','2023-08-17 08:50:19'),(18,9,'en','Lorem ipsum dolor sit amet consectetur adipiscing elit','aenean urna quis at senectus rutrum felis tempor integer ante. Suscipit faucibus pharetra arcu netus malesuada neque turpis sociis etiam ad, lacinia sodales dignissim rhoncus semper ridiculus lobortis rutrum elementum, sollicitudin in condimentum at tempus libero eu odio porta. Lobortis curae mauris','<p>Interdum quisque nullam a erat ut eu mus, scelerisque porttitor sodales augue eleifend ultrices dictum hac, lobortis rhoncus torquent luctus congue cum habitant, elementum integer condimentum fermentum faucibus nisl. Sociis enim placerat lacinia nunc suspendisse etiam curae aptent, lectus blandit ornare duis montes morbi quam tempor, felis faucibus vehicula elementum ultricies curabitur tortor. Potenti etiam tristique montes volutpat ridiculus congue luctus quisque purus, duis penatibus dignissim vehicula parturient donec dui blandit ut, suspendisse iaculis cras rhoncus aenean gravida neque bibendum. Urna at curabitur convallis diam ultricies primis quisque nibh donec rhoncus, sapien et arcu sem ad mauris taciti quam tempus eleifend, cubilia fermentum platea pharetra hendrerit dui a euismod class.</p>',NULL,NULL,NULL,'2023-08-17 08:50:19','2023-08-17 08:50:19'),(19,10,'es','Slug','Slug SLug','<p>Slug</p>',NULL,NULL,NULL,'2023-08-17 08:58:59','2023-08-17 08:58:59'),(20,10,'en','Slug','Slug SLug','<p>Slug</p>',NULL,NULL,NULL,'2023-08-17 08:58:59','2023-08-17 08:58:59'),(21,11,'es','PSICOSOMÁTICA CLÍNICA','La Psicosomática Clínica no se especializa en una rama de la medicina o de la psicología, ya que pone más bien en relieve una nueva manera de ver el funcionamiento en general de los seres humanos.  El propósito es comprender la influencia que las emociones ejercen sobre el cuerpo.','<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><strong>La Psicosom&aacute;tica Clinica: &iquest;Para qui&eacute;n y para qu&eacute;?</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">La Psicosom&aacute;tica Cl&iacute;nica no se especializa en ninguna rama de la medicina o la psicolog&iacute;a, ya que pone m&aacute;s bien en relieve una nueva manera de ver el funcionamiento general de los seres humanos. &nbsp;Por esto, interviene en muchos &aacute;mbitos y toma<em>&nbsp;</em>progresivamente lugar tanto en la medicina como en las ciencias humanas.&nbsp;</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Esta discipina se dirige a todo el mundo en general, pero est&aacute;&nbsp;destinada especialmente a todas las perosnas que deseen explorar su propia historia y aquella de sus ancestros para poner en evidencia ciertos factores&nbsp;ps&iacute;quicos que pueden estar al origen de una problem&aacute;tica f&iacute;sica o mental, o que puede influenciarlos fuertemente.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Su campo de acci&oacute;n abarca&nbsp;tambi&eacute;n los <em>Trastornos de Comportamiento</em> y los <em>Cuestionamientos Existenciales.</em> &nbsp;Finalmente, y en cierta medida, es &uacute;til en la prevenci&oacute;n, antes que aparezcan los malestares del cuerpo y el esp&iacute;ritu.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><strong>La Psicosom&aacute;tica Cl&iacute;nca: &iquest;De qu&eacute; se inspira?</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Varias disciplinas se asocian para construir la Psicosom&aacute;tica Cl&iacute;nica, &eacute;stas pertenecen tanto a las ciencias ps&iacute;quicas y humanas como a la medicina en un sentido amplio.&nbsp;</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><strong>A nivel m&eacute;dico:&nbsp;</strong></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">La Biolog&iacute;a, la biof&iacute;sica y la bioqu&iacute;mica</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">La Anatom&iacute;a que decscribe la estructura del ser humano</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">La Semiolog&iacute;a, que es el estudio de los signos cl&iacute;nicos</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">La Fsiolog&iacute;a y la Fsiopatolog&iacute;a</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">La Histolog&iacute;a y la Histopatolog&iacute;a</span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Todas nos ayudar&aacute;n a formular hip&oacute;tesis acerca de los significados psicosom&aacute;ticos de los signos cl&iacute;nicos.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><strong>A nivel ps&iacute;quico</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><u><em>Sigmund Freud</em></u>, el gran maestro de la disciplina, est&aacute; representado por el se&ntilde;or Incosnciente.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><em><u>C. G Jung</u></em>, ha estudiado especialmente nuestro funcionamiento arquet&iacute;pico en relaci&oacute;n con una interdependencia de todas las especies vivientes entre ellas y el universo, llev&aacute;ndolos a la noci&oacute;n fundamental de inconsciente colectivo.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><u><em>W. G. Groddeck</em></u>, el psicoanalista salvaje es considerado como el padre de la psicsom&aacute;tica.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><u><em>Hamer,</em></u> con la Nueva Medicina Germ&aacute;nica de donde sale directamente la Descodificaci&oacute;n Biol&oacute;gica.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><u><em>Marc Fl&eacute;chet,</em></u> psic&oacute;logo que puso en evidencia dos nociones: por una parte la existencia del funcionamiento c&iacute;clico inconsciente: los&nbsp;<strong>Ciclos Biol&oacute;gicos Memorizados&nbsp;</strong>y por otra parte, planteo toda una serie de reflexiones a prop&oacute;sito de nuestra gestaci&oacute;n, del entorno emocional, ps&iacute;quico y de los eventos sucedidos cuando estamos en el vientre de nuestra madre: el&nbsp;<strong>Proyecto Sentido Gestacional.</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><em>La Psicogenealog&iacute;a o el Transgeneracional</em>, que estudia las posibles influencias de la historia familiar sobre varias generaciones, pudiendo programar ciertas enfermedades.&nbsp;</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><strong>Una enfermedad nunca aparece por azar.</strong> La Psicosom&aacute;tica Cl&iacute;nica explora la historia general de la persona y aquella de sus ancestros para buscar diferentes factores espec&iacute;ficos y determinantes, especialmente problem&aacute;ticos, capaces de intervenir en su activaci&oacute;n y en su programaci&oacute;n de una manera a menudo inconsciente.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">De una menera general, la enfermedad est&aacute; estrechamente relacionada con una o varias emociones reprimidas y reducidas al silencio despu&eacute;s de su construcci&oacute;n. &nbsp;Estas emociones no expresadas con el tiempo indicado, y a&uacute;n activas hoy, han sido imprimidas, en nuestro diario &iacute;ntimo por nosotros mismos desde nuestro nacimiento o mucho antes, por nuestros ancestros.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">La Psicosom&aacute;tica Cl&iacute;nica puede ser comparada a la de un rayo l&aacute;ser que puede abrir el cerrojo de nuestra caja fuerte interior en donde est&aacute;n reprimidas las emociones que acompa&ntilde;an los episodios desestabilizadores de nuestra historia. &nbsp;Su puesta en evidencia y el acompa&ntilde;amiento terap&eacute;utico individualizado facilitan su emergencia en la consciencia.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Finalmante, autorizarse en plena consciencia a retomar nuestro presente, aceptando con serenidad lo que no se pudo aceptar en nuestro pasado, representa el&nbsp;camino m&aacute;s corto de la paz interior que nos conduce hacia el de la mejora y hasta el del restablecimiento.&nbsp;</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><strong>Esta herramiente terap&eacute;utica no reemplaza ning&uacute;n tratamiento medico.</strong> &nbsp;Recuerda todo es un conjunto y cada uno aporta sus conocimientos en pro de la recuperaci&oacute;n o mejor&iacute;a en la calidad de vida del ser humano.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Si esta informaci&oacute;n es &uacute;til para ti y deseas profundizar en ella para mejorar algun aspecto de tu vida o de tu salud, es el momento de buscar acompa&ntilde;amiento y aqu&iacute; estoy para guiarte en el proceso.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Agenda nuestro encuentro Terap&eacute;utico!</span></span></p>',NULL,NULL,NULL,'2024-02-02 22:52:53','2024-02-03 00:01:10'),(22,11,'en','PSICOSOMATICA CLINICA','La Psicosomática Clínica no se especializa en una rama de la medicina o de la psicología, ya que pone más bien en relieve una nueva manera de ver el funcionamiento en general de los seres humanos.  El propósito es comprender la influencia que las emociones ejercen sobre el cuerpo.','<p><strong>La Psicosom&aacute;tica Clinica: &iquest;Para qui&eacute;n y para qu&eacute;?</strong></p>\r\n\r\n<p>La psicosom&aacute;tica cl&iacute;nica no se especializa en ninguna rama de la medicina o la psicolog&iacute;a, ya que pone mas bien en relieve una nueva manera de ver el funcionamiento general de los seres humanos. &nbsp;Por esto, interviene en muchos &aacute;mbitos y toma<em>&nbsp;</em>progresivamente lugar tanto en la medicina como en las ciencias humanas.&nbsp;</p>\r\n\r\n<p>Esta discipina se dirige a todo el mundo en general, pero est&aacute;&nbsp;destinada especialmente a todas las perosnas que deseen explorar su propia historia y aquella de sus ancestros para poner en evidencia ciertos factores ciertos factores ps&iacute;quicos que pueden estar al origen de una problem&aacute;tica f&iacute;sica o mental, o que puede influenciarlos fuertemente.</p>\r\n\r\n<p>Su campo de acci&oacute;n abarca abarca tambi&eacute;n los Trastornos de Compportamiento y los cuestionamientos existenciales. &nbsp;Finalmente, y en cierta medida, es &uacute;til en la prevenci&oacute;n, antes que aparezcan los malestares del cuerpo y el esp&iacute;ritu.</p>\r\n\r\n<p><strong>La Psicosom&aacute;tica Cl&iacute;nca: &iquest;De qu&eacute; se inspira?</strong></p>\r\n\r\n<p>Varias disciplinas se asocian para construir la Psicosom&aacute;tica Cl&iacute;nica, &eacute;stas pertenecen tanto a las ciencias ps&iacute;quicas y humanas como a la medicina en un sentido amplio, convencional o no. &nbsp;</p>\r\n\r\n<p><strong>A nivel m&eacute;dico:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>La Biolog&iacute;a, la biof&iacute;sica y la bioqu&iacute;mica</li>\r\n	<li>La anatom&iacute;a que decscribe la estructura del ser humano</li>\r\n	<li>La semiolog&iacute;a, que es el estudio de los signos cl&iacute;nicos</li>\r\n	<li>La fisiolog&iacute;a y la fisiopatolog&iacute;a</li>\r\n	<li>La histolog&iacute;a y la histopatolog&iacute;a</li>\r\n</ul>\r\n\r\n<p>Todas nos ayudar&aacute;n a formular hip&oacute;tesis acerca de los significados psicosom&aacute;ticos de los signos cl&iacute;nicos.</p>\r\n\r\n<p><strong>A nivel ps&iacute;quico</strong></p>\r\n\r\n<p>Sigmund Freud, el gran maestro de la disciplina, est&aacute; representado por el se&ntilde;or Incosnciente.</p>\r\n\r\n<p>C. G Jung, ha estudiado especialmente nuestro funcionamiento arquet&iacute;pico en relaci&oacute;n con una interdependencia de todas las especies vivientes entre ellas y el universo, llev&aacute;ndolos a la noci&oacute;n fundamental de inconsciente colectivo.</p>\r\n\r\n<p>W. G. Groddeck, el psicoanalista salvaje es considerado como el padre de la psicsom&aacute;tica.</p>\r\n\r\n<p>Hamer, con la Nueva Medicina Germ&aacute;nica de donde sale directamente la Descodificaci&oacute;n Biol&oacute;gica.</p>\r\n\r\n<p>Marc Fl&eacute;chet, psic&oacute;logo que puso en evidencia dos nociones: por una parte la existencia del funcionamiento c&iacute;clico inconsciente: los&nbsp;<strong>Ciclos Biol&oacute;gicos Memorizados&nbsp;</strong>y por otra parte, planteo toda una serie de reflexiones a prop&oacute;sito de nuestra gestaci&oacute;n, del entorno emocional, ps&iacute;quico y de los eventos sucedidos cuando estamos en el vientre de nuestra madre: el&nbsp;<strong>Proyecto Sentido Gestacional.</strong></p>\r\n\r\n<p>La Psicogenealog&iacute;a o el Transgeneracional, que estudia las posibles influencias de la historia familiar sobre varias generaciones, pudiendo programar ciertas enfermedades.&nbsp;</p>\r\n\r\n<p>Una enfermedad nunca aparece por azar. La Psicosom&aacute;tica Cl&iacute;nica explora la historia general de la persona y aquella de sus ancestros para buscar diferentes factores espec&iacute;ficos y determinantes, especialmente problem&aacute;ticos, capaces de intervenir en su activaci&oacute;n y en su programaci&oacute;n de una manera a menudo inconsciente</p>',NULL,NULL,NULL,'2024-02-02 22:52:53','2024-02-02 22:52:53');
/*!40000 ALTER TABLE `info_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_categories`
--

DROP TABLE IF EXISTS `info_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `info_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_categories`
--

LOCK TABLES `info_categories` WRITE;
/*!40000 ALTER TABLE `info_categories` DISABLE KEYS */;
INSERT INTO `info_categories` VALUES (9,5,'Principal servicios','es','2023-06-06 16:49:30','2023-06-06 16:49:30'),(10,5,'Principal servicios','en','2023-06-06 16:49:30','2023-06-06 16:49:30'),(11,6,'Secundaria Servicios','es','2023-06-06 16:49:46','2023-06-06 16:49:46'),(12,6,'Secundaria Servicios','en','2023-06-06 16:49:46','2023-06-06 16:49:46'),(13,7,'w','es','2023-06-06 20:20:21','2023-06-06 20:20:21'),(14,7,'w','en','2023-06-06 20:20:21','2023-06-06 20:20:21'),(15,8,'Principal','es','2023-06-27 15:54:19','2023-06-27 15:54:19'),(16,8,'Principal','en','2023-06-27 15:54:20','2023-06-27 15:54:20'),(17,9,'Política Datos','es','2023-07-11 15:05:55','2023-07-11 15:05:55'),(18,9,'Política Datos','en','2023-07-11 15:05:55','2023-07-11 15:05:55'),(19,10,'Sobre Adriana','es','2023-07-11 15:12:44','2023-07-11 15:12:44'),(20,10,'Sobre Adriana','en','2023-07-11 15:12:44','2023-07-11 15:12:44'),(21,11,'Lecturas para el Alma','es','2023-07-11 15:39:16','2023-07-11 15:39:16'),(22,11,'Lecturas para el Alma','en','2023-07-11 15:39:16','2023-07-11 15:39:16'),(23,12,'Sanación emocional','es','2023-07-11 15:39:43','2023-07-11 15:39:43'),(24,12,'Sanación emocional','en','2023-07-11 15:39:43','2023-07-11 15:39:43');
/*!40000 ALTER TABLE `info_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_contents`
--

DROP TABLE IF EXISTS `info_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content_id` bigint unsigned NOT NULL,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_meta` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_meta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_meta` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_contents_content_id_foreign` (`content_id`),
  CONSTRAINT `info_contents_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_contents`
--

LOCK TABLES `info_contents` WRITE;
/*!40000 ALTER TABLE `info_contents` DISABLE KEYS */;
INSERT INTO `info_contents` VALUES (9,5,'es','Política de Tratamiento de Datos Personales','<p><strong>OBJETIVOS GENERALES</strong></p>\r\n\r\n<p>La presente pol&iacute;tica de protecci&oacute;n de datos personales se crea para garantizar la reserva de la informaci&oacute;n y la seguridad sobre el tratamiento que se dar&aacute; a todas las bases de datos y/o archivos que contengan datos personales de consultantes, proveedores y terceros, de quienes Psicoterapeuta Adriana Ortiz ha obtenido legalmente informaci&oacute;n y se ejecuta para ajustarse al marco legal que busca con esta, la protecci&oacute;n de datos personales de las partes involucradas.</p>\r\n\r\n<p><strong>RESPONSABLE DEL TRATAMIENTO DE DATOS PERSONALES</strong></p>\r\n\r\n<p><strong>Encargado del Tratamiento:</strong>&nbsp;Adriana Ortiz Rojas<br />\r\n<strong>Correo electr&oacute;nico:</strong>&nbsp;unencuentrodealmas@adrianaortizrojas.com&nbsp;<br />\r\n<strong>Celular:</strong>&nbsp;<a href=\"tel:(57) 316 8715725\">(57) 316 8715725</a></p>\r\n\r\n<p><strong>MARCO LEGAL</strong></p>\r\n\r\n<p>Constituci&oacute;n Pol&iacute;tica, art&iacute;culo 15 Y 20<br />\r\nLey 1581 de 2012.<br />\r\nReglamentario parcial 1377 de 2013.</p>\r\n\r\n<p><strong>DEFINICIONES</strong></p>\r\n\r\n<p><strong>Aviso de privacidad:</strong>&nbsp;comunicaci&oacute;n verbal o escrita generada por el Responsable, dirigida al titular para el tratamiento de sus datos personales, mediante la cual se le informa acerca de la existencia de las pol&iacute;ticas de tratamiento de informaci&oacute;n que le ser&aacute;n aplicables, la forma de acceder a las mismas y las finalidades del tratamiento que se pretende dar a los datos personales.<br />\r\n<strong>Base de datos:</strong>&nbsp;conjunto organizado de datos personales que sea objeto de tratamiento.<br />\r\n<strong>Dato personal:</strong>&nbsp;cualquier informaci&oacute;n vinculada o que pueda asociarse a una o varias personas determinadas o determinable (dato p&uacute;blico, dato semi-privado, dato privado y dato privado sensible).<br />\r\n<strong>Responsable del tratamiento:</strong>&nbsp;persona natural o jur&iacute;dica, p&uacute;blica o privada, que por s&iacute; misma o en asocio con otros, decida sobre la base de datos y/o el tratamiento de datos.<br />\r\n<strong>Encargado del tratamiento:</strong>&nbsp;persona natural o jur&iacute;dica, p&uacute;blica o privada, que por s&iacute; misma o en asocio con otros, realice el tratamiento de datos personales por cuenta del responsable del tratamiento.<br />\r\n<strong>Titular:</strong>&nbsp;persona natural cuyos datos personales sean objeto de tratamiento.<br />\r\n<strong>Tratamiento:</strong>&nbsp;cualquier operaci&oacute;n o conjunto de operaciones sobre datos personales, tales como la recolecci&oacute;n, almacenamiento, uso, circulaci&oacute;n o supresi&oacute;n.</p>\r\n\r\n<p><strong>PRINCIPIOS</strong></p>\r\n\r\n<p>La pol&iacute;tica de privacidad, protecci&oacute;n y tratamiento de datos personales se regir&aacute; bajo los siguientes principios:</p>\r\n\r\n<p><strong>Legalidad en materia de tratamiento de datos:</strong>&nbsp;el tratamiento a que se refiere la presente ley es una actividad reglada que debe sujetarse a lo establecido en ella y en las dem&aacute;s disposiciones que la desarrolle.<br />\r\n<strong>Veracidad o calidad:</strong>&nbsp;la informaci&oacute;n sujeta a tratamiento debe ser veraz, completa, exacta, actualizada, comprobable y comprensible. Se proh&iacute;be el tratamiento de datos parciales, incompletos, fraccionados o que induzcan a error.<br />\r\n<strong>Principio de transparencia:</strong>&nbsp;en el tratamiento debe garantizarse el derecho del titular a obtener del responsable del tratamiento o del encargado del tratamiento, en cualquier momento y sin restricciones, informaci&oacute;n acerca de la existencia de datos que le concierna.<br />\r\n<strong>Finalidad:</strong>&nbsp;el tratamiento debe obedecer a una finalidad leg&iacute;tima de acuerdo con la Constituci&oacute;n y la Ley, la cual debe ser informada al titular.<br />\r\n<strong>Libertad:</strong>&nbsp;el tratamiento s&oacute;lo puede ejercerse con el consentimiento, previo, expreso e informado del titular.<br />\r\nLos datos personales no podr&aacute;n ser obtenidos o divulgados sin previa autorizaci&oacute;n, o en ausencia de mandato legal o judicial que releve el consentimiento.<br />\r\n<strong>Acceso y circulaci&oacute;n restringida:</strong>&nbsp;el tratamiento se sujeta a los l&iacute;mites que se derivan de la naturaleza de los datos personales, de las disposiciones de la presente ley y la Constituci&oacute;n. En este sentido, el tratamiento s&oacute;lo podr&aacute; hacerse por personas autorizadas por el titular y/o por las personas previstas en la presente ley.<br />\r\n<strong>Seguridad:</strong>&nbsp;la informaci&oacute;n sujeta a tratamiento por el responsable del tratamiento o encargado del tratamiento a que se refiere la presente ley, se deber&aacute; manejar con las medidas t&eacute;cnicas, humanas y administrativas que sean necesarias para otorgar seguridad a los registros evitando su adulteraci&oacute;n, p&eacute;rdida, consulta, uso o acceso no autorizado o fraudulento.<br />\r\n<strong>Confidencialidad:</strong>&nbsp;todas las personas que intervengan en el tratamiento de datos personales que no tengan la naturaleza de p&uacute;blicos est&aacute;n obligadas a garantizar la reserva de la informaci&oacute;n, inclusive despu&eacute;s de finalizada su relaci&oacute;n con alguna de las labores que comprende el tratamiento, pudiendo s&oacute;lo realizar suministro o comunicaci&oacute;n de datos personales cuando ello corresponda al desarrollo de las actividades autorizadas en la presente ley y en los t&eacute;rminos de la misma.</p>\r\n\r\n<p><strong>TRATAMIENTO Y FINALIDAD</strong></p>\r\n\r\n<p>Para dar cumplimiento a lo definido en la Ley 1581 de 2012, el Decreto reglamentario 1377 de 2013 Psic&oacute;loga Lorena Aunta le informa que los datos personales que usted suministre en virtud de la atenci&oacute;n psicol&oacute;gica e interdisciplinaria, ser&aacute;n tratados mediante el uso y mantenimiento de medidas de seguridad t&eacute;cnicas, f&iacute;sicas y<br />\r\nadministrativas a fin de impedir que terceros no autorizados accedan a los mismos, lo anterior de conformidad a lo definido en la presente ley, el desarrollo de las funciones propias del actuar en salud.</p>\r\n\r\n<p>Se recogen sus datos los cuales ser&aacute;n usados para:</p>\r\n\r\n<p>a) Actividades de operaci&oacute;n y registro de consultantes y solicitantes<br />\r\nb) Atender cualquier tipo de tr&aacute;mite o servicio que usted solicite o requiera<br />\r\nc) Cumplir las funciones establecidas en la presente ley y dem&aacute;s leyes subsidiarias.<br />\r\nd) El fortalecimiento de las relaciones con los consultantes, proveedores y terceros mediante el env&iacute;o de informaci&oacute;n relevante<br />\r\ne) Para la atenci&oacute;n de peticiones, quejas y reclamos (PQR&rsquo;s).<br />\r\nf) Para actividades administrativas, comerciales, promocionales, informativas, de mercadeo, ventas, estad&iacute;sticas, de investigaci&oacute;n y dem&aacute;s prop&oacute;sitos comerciales que no infrinjan la legislaci&oacute;n vigente en Colombia.</p>\r\n\r\n<p><strong>CALIDAD DE LOS DATOS</strong></p>\r\n\r\n<p>En el momento de proporcionar informaci&oacute;n a Psicoterapeuta Adriana Ortiz, ninguna de las partes interesadas podr&aacute; manipular la identidad o los datos de otras personas, a esto se adiciona, que en todo momento se deber&aacute; tener en cuenta que s&oacute;lo se puede circunscribir datos correspondientes a su propia identidad los cuales deben ser apropiados, oportunos, actuales y aut&eacute;nticos. Quien suministre informaci&oacute;n incorrecta, simulada, o de terceras personas, ser&aacute; el &uacute;nico responsable frente a cualquier da&ntilde;o que llegare a causar a terceros o a Psicoterapeuta Adriana Ortiz por el uso de datos personales impropios o cuando haciendo referencia a sus propios datos, incluya informaci&oacute;n errada, falsa, desactualizada, impropia o impertinente.</p>\r\n\r\n<p><strong>DERECHOS DE LOS TITULARES DE LOS DATOS PERSONALES</strong></p>\r\n\r\n<p>Usted podr&aacute; ejercer los derechos que la Ley prev&eacute;; es preciso mencionar que el ejercicio de sus derechos (rechazar o revocar) no impide el ejercicio de otro derecho y que cualquier modificaci&oacute;n al presente aviso, le ser&aacute; notificado a trav&eacute;s de los medios que disponga la atenci&oacute;n particular.</p>\r\n\r\n<p><strong>PROCEDIMIENTO PARA CONSULTAS O RECLAMOS</strong></p>\r\n\r\n<p>Si alg&uacute;n titular desea recibir cualquier tipo informaci&oacute;n, hacer un requerimiento sobre sus datos, o hacer cualquier solicitud relacionada con la protecci&oacute;n de sus datos personales, puede contactar a Psicoterapeuta Adriana Ortiz por medio del correo electr&oacute;nico unencuentrodealmas@adrianaortizrojas.com&nbsp;o comunicarse al celular <a href=\"tel:(57) 316 8715725\">(57) 316 8715725</a>, refiriendo la identificaci&oacute;n del titular, la descripci&oacute;n de los hechos que dan lugar al reclamo, la direcci&oacute;n o medio a trav&eacute;s del cual desea obtener su respuesta, y si fuere el caso, acompa&ntilde;ando los documentos de soporte que se quieran hacer valer.</p>\r\n\r\n<p>El solicitante recibir&aacute; por escrito una respuesta de Psicoterapeuta Adriana Ortiz, dentro de los 10 d&iacute;as h&aacute;biles siguientes contados a partir de la fecha en que ha tenido conocimiento de su solicitud. Si por alguna raz&oacute;n no pudiere cumplir con este plazo para solucionar la solicitud, en dicha respuesta se informar&aacute; los motivos y el procedimiento a seguir.</p>\r\n\r\n<p>Actualizada el 26 de Agosto de 2023</p>\r\n\r\n<p><strong>ADRIANA ORTIZ</strong><br />\r\n<strong>Psicoterapeuta</strong></p>',NULL,NULL,NULL,'2023-06-06 20:20:36','2023-08-29 09:59:22'),(10,5,'en','wqeqwe','<p>qweqweqweqweqwe</p>',NULL,NULL,NULL,'2023-06-06 20:20:36','2023-06-06 20:20:36'),(11,6,'es','qwdqw','<p>dqwdwqd</p>',NULL,NULL,NULL,'2023-06-07 15:03:41','2023-06-07 15:03:41'),(12,6,'en','qwdqw','<p>dqwdwqd</p>',NULL,NULL,NULL,'2023-06-07 15:03:41','2023-06-07 15:03:41'),(13,7,'es','wqdqwd','<p>wqdqwd</p>',NULL,NULL,NULL,'2023-06-07 15:08:26','2023-06-29 19:20:33'),(14,7,'en','slugggg','<p>qwdqwdqwd</p>',NULL,NULL,NULL,'2023-06-07 15:08:26','2023-06-07 15:08:26'),(15,8,'es','wqeqweq','<p>qweqweqweqweqwe</p>',NULL,NULL,NULL,'2023-06-07 15:14:11','2023-06-29 19:20:18'),(16,8,'en','wqeqwe','<p>qweqweqweqweqwe</p>',NULL,NULL,NULL,'2023-06-07 15:14:11','2023-06-07 15:14:11'),(17,9,'es','Conoce un poquito de mi','<h1 style=\"text-align:center\"><strong><span style=\"font-size:24px\">Qui&eacute;n es Adriana Ortiz?</span></strong></h1>\r\n\r\n<p>Soy <strong>BioPsicoTerapeuta</strong> por elecci&oacute;n y&nbsp; pasi&oacute;n desde hace m&aacute;s de 10 a&ntilde;os.&nbsp; Inici&eacute;&nbsp;como Profesional en Instrumentaci&oacute;n Quir&uacute;rgica y mi prop&oacute;sito de vida me&nbsp;llev&oacute;&nbsp;a seguir al servicio de la humanidad desde otro lugar.</p>\r\n\r\n<p>Me form&eacute; como <strong>Terapeuta Transpersonal </strong>lo cual me permite&nbsp;acompa&ntilde;ar a los pacientes&nbsp;desde el alma, con una escucha plena y consciente para guiarles a&nbsp;Darse Cuenta de sus conflictos, heridas y traumas&nbsp;y iniciando desde all&iacute;&nbsp;procesos de sanaci&oacute;n.&nbsp;</p>\r\n\r\n<p>Realic&eacute;&nbsp;estudios en<strong> Descodificaci&oacute;n Biol&oacute;gica y Emocional, Hipnosis Cl&iacute;nica Reparadora,&nbsp;Terapia de Parejas, Terapia Infantil y de Adolescente, Psicosom&aacute;tica Cl&iacute;nica, Terapia Reiki, Tarot Terap&eacute;utico, Terapia de &Aacute;ngeles</strong> y actualmente curso&nbsp;estudios en <strong>PNL</strong>.&nbsp;</p>\r\n\r\n<p>Acompa&ntilde;ante en procesos de duelo, empoderamiento personal e inteligencia emocional.&nbsp;Apasionada por la lectura, el aprendizaje, el conocimiento, los chocolates, el amor, la vida y la felicidad.&nbsp;</p>\r\n\r\n<p>Esposa del amor de mi&nbsp;vida Mauricio, madre de dos hermosos hijos Gabriela y Juan Pablo,&nbsp;hija de Rosalba y Jorge, hermana de Andres, Ana y Carolina que me&nbsp;acompa&ntilde;a desde el cielo.&nbsp;</p>\r\n\r\n<p><span style=\"font-size:22px\"><em><strong>Amiga de todos, amante a la vida y terapeuta del coraz&oacute;n!</strong></em></span></p>',NULL,NULL,NULL,'2023-07-11 15:17:06','2024-01-10 21:31:41'),(18,9,'en','Conoce un poquito de mi','<h1 style=\"text-align:center\"><strong><span style=\"font-size:24px\">Qui&eacute;n es Adriana Ortiz?</span></strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Soy <strong>BioPsicoTerapeuta</strong> por elecci&oacute;n y&nbsp; pasi&oacute;n desde hace m&aacute;s de 10 a&ntilde;os.&nbsp; Inici&eacute;&nbsp;como Profesional en Instrumentaci&oacute;n Quir&uacute;rgica y mi prop&oacute;sito de vida me&nbsp;lleva a seguir al servicio de la humanidad.&nbsp;</p>\r\n\r\n<p>Me form&eacute; como <strong>Terapeuta Transpersonal</strong>, realizando acompa&ntilde;amientos desde el alma con una escucha plena y consciente para ayudar al consultante a Darse Cuenta de sus conflictos y desde all&iacute; iniciar procesos de sanaci&oacute;n.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Con <strong>estudios en Descodificaci&oacute;n Biol&oacute;gica y Emocional, Hipnosis Cl&iacute;nica Reparadora, especialista en Terapia de Parejas, Terapia Infantil y de Adolescente. Terapia Reiki, Tarot Terap&eacute;utico, Terapia de &Aacute;ngeles</strong> y actualmente cursa estudios en <strong>PNL</strong>.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Acompa&ntilde;ante en procesos de duelo, empoderamiento personal e inteligencia emocional.&nbsp;Apasionada por la lectura, el aprendizaje, el conocimiento, los chocolates, el amor, la vida y la felicidad.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Esposa del amor de su vida Mauricio, madre de dos hermosos hijos Gabriela y Juan Pablo,&nbsp;hija de Rosalba y Jorge, hermana de Andres, Ana y Carolina que la acompa&ntilde;a desde el cielo.&nbsp;</p>\r\n\r\n<p><span style=\"font-size:22px\"><em><strong>Amiga de todos, amante a la vida y terapeuta del coraz&oacute;n!</strong></em></span></p>',NULL,NULL,NULL,'2023-07-11 15:17:06','2023-07-11 15:17:06'),(19,10,'es','ENEAGRAMA DE LA PERSONALIDAD','<p style=\"text-align:justify\">La palabra <em><strong>ENEAGRAMA&nbsp;</strong></em>significa <em>&quot;nueve lineas&quot;</em> que corresponde a <em>9 Eneatipos de la Personalidad.</em>&nbsp; Principalmente porque describe, a grandes rasgos, nueve tipos de personalidad, cada uno de los cuales cuenta con su propio &quot;Modelo Mental&quot;. &nbsp;Es decir el esqueleto psicol&oacute;gico desde el que se originan los pensamientos y desde donde se instalan las creencias, los valores, las prioridades y las aspiraciones&nbsp;que constituyen nuestra personalidad.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Al descrubrir los motivadores de vida naturales, esos que defiendes sin saber y que te generan felicidad, podr&aacute;s derribar limiaciones, eliminar miedos,&nbsp;&nbsp;explorar m&aacute;s aspectos de tu personalidad que te permiten evolucionar como ser humano.</p>\r\n\r\n<p style=\"text-align:justify\">Trabaja los <strong>3 CEREBROS</strong> que son <em>instintivo, emocional y mental</em>. &nbsp;Podr&aacute;s descrubrir cual es tu dominancia y empoderar tu verdadera esencia.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>EL&nbsp;ENEAGRAMA</strong> divide los 9 Eneatipos en 3 Triadas:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong>Instintivo</strong>&nbsp;lo comanda la Neocorteza&nbsp;y es el encargado de la <strong>ACCI&Oacute;N</strong></li>\r\n	<li style=\"text-align:justify\"><strong>Emocional</strong> lo comanda el Sistema L&iacute;mbico y es el encargado de las <strong>EMOCIONES Y SENTIMIENTOS,&nbsp;</strong>es el sentir.</li>\r\n	<li style=\"text-align:justify\"><strong>Mental</strong> comandado por el Sistema Reptil y es el encargado del <strong>CONOCIMIENTO Y SABER</strong>, es intelectual.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Cuentas con un lado luz y un lado sombra de los 3 cerebros y tienes un cerebro que te domina.</p>\r\n\r\n<p style=\"text-align:justify\">Lo ideal es tener un equilibrio en el manejo de tus 3 cerebros, aprender a manejar el lado sombra y empoderar el lado luz del cerebro dominante.</p>\r\n\r\n<p style=\"text-align:justify\">Esta herramienta se&nbsp;convierte en un GPS de vida, &nbsp;para que&nbsp;potencies tus habilidades, descrubras tus limitaciones y bloqueos, sanes las heridas de tu infancia y comprendas cual es la motivci&oacute;n de estar en esta vida.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>',NULL,NULL,NULL,'2023-09-22 17:22:42','2023-09-27 19:03:10'),(20,10,'en','ENEAGRAMA DE LA PERSONALIDAD','<p>La palabra <em><strong>ENEAGRAMA&nbsp;</strong></em>significa <em>&quot;nueve lineas&quot;</em> que corresponde a <em>9 Eneatipos de la Personalidad.</em>&nbsp; Principalmente porque describe, a grandes rasgos, nueve tipos de personalidad, cada uno de los cuales cuenta con su propio &quot;Modelo Mental&quot;. &nbsp;Es decir el esqueleto psicol&oacute;gico desde el que se originan los pensamientos y desde donde se instalan las creencias, los valores, las prioridades y las aspiraciones&nbsp;que constituyen nuestra personalidad.&nbsp;</p>\r\n\r\n<p>Al descrubrir los motivadores de vida naturales, esos que defiendes sin saber y que te generan felicidad, podr&aacute;s derribar limiaciones, eliminar miedos,&nbsp;&nbsp;explorar m&aacute;s aspectos de tu personalidad que te permiten evolucionar como ser humano.</p>\r\n\r\n<p>Trabaja los <strong>3 CEREBROS</strong> que son <em>instintivo, emocional y mental</em>. &nbsp;Podr&aacute;s descrubrir cual es tu dominancia y empoderar tu verdadera esencia.</p>\r\n\r\n<p><strong>EL&nbsp;ENEAGRAMA</strong> divide los 9 Eneatipos en 3 Triadas:</p>\r\n\r\n<ul>\r\n	<li><strong>Instintivo</strong>&nbsp;lo comanda la Neocorteza&nbsp;y es el encargado de la <strong>ACCI&Oacute;N</strong></li>\r\n	<li><strong>Emocional</strong> lo comanda el Sistema L&iacute;mbico y es el encargado de las <strong>EMOCIONES Y SENTIMIENTOS,&nbsp;</strong>es el sentir.</li>\r\n	<li><strong>Mental</strong> comandado por el Sistema Reptil y es el encargado del <strong>CONOCIMIENTO Y SABER</strong>, es intelectual.</li>\r\n</ul>\r\n\r\n<p>Cuentas con un lado luz y un lado sombra de los 3 cerebros y tienes un cerebro que te domina.</p>\r\n\r\n<p>Lo ideal es tener un equilibrio en el manejo de tus 3 cerebros, aprender a manejar el lado sombra y empoderar el lado luz del cerebro dominante.</p>\r\n\r\n<p>Esta herramienta se&nbsp;convierte en un GPS de vida, &nbsp;para que&nbsp;potencies tus habilidades, descrubras tus limitaciones y bloqueos, sanes las heridas de tu infancia y comprendas cual es la motivci&oacute;n de estar en esta vida.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>',NULL,NULL,NULL,'2023-09-22 17:22:42','2023-09-22 17:22:42');
/*!40000 ALTER TABLE `info_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_files`
--

DROP TABLE IF EXISTS `info_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `file_id` bigint unsigned NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_files_file_id_foreign` (`file_id`),
  CONSTRAINT `info_files_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_files`
--

LOCK TABLES `info_files` WRITE;
/*!40000 ALTER TABLE `info_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `info_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_gallery_images`
--

DROP TABLE IF EXISTS `info_gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_gallery_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_image_id` bigint unsigned NOT NULL,
  `title` varchar(240) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(240) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_gallery_images_gallery_image_id_foreign` (`gallery_image_id`),
  CONSTRAINT `info_gallery_images_gallery_image_id_foreign` FOREIGN KEY (`gallery_image_id`) REFERENCES `gallery_images` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_gallery_images`
--

LOCK TABLES `info_gallery_images` WRITE;
/*!40000 ALTER TABLE `info_gallery_images` DISABLE KEYS */;
INSERT INTO `info_gallery_images` VALUES (1,1,NULL,NULL,'es','2023-06-06 15:03:04','2023-06-06 15:03:04'),(2,1,NULL,NULL,'en','2023-06-06 15:03:04','2023-06-06 15:03:04'),(3,2,NULL,NULL,'es','2023-06-06 15:03:09','2023-06-06 15:03:09'),(4,2,NULL,NULL,'en','2023-06-06 15:03:09','2023-06-06 15:03:09'),(5,3,NULL,'Prueba de Gallerys','es','2023-06-06 20:51:31','2023-06-06 20:51:43'),(6,3,NULL,NULL,'en','2023-06-06 20:51:31','2023-06-06 20:51:31'),(7,4,'qwfqwf','qwfqwfqwfq','es','2023-06-06 20:54:06','2023-06-06 21:28:20'),(8,4,NULL,NULL,'en','2023-06-06 20:54:06','2023-06-06 20:54:06'),(9,5,NULL,NULL,'es','2023-06-06 21:17:14','2023-06-06 21:17:14'),(10,5,NULL,NULL,'en','2023-06-06 21:17:14','2023-06-06 21:17:14'),(11,6,NULL,NULL,'es','2023-06-06 21:25:59','2023-06-06 21:25:59'),(12,6,NULL,NULL,'en','2023-06-06 21:25:59','2023-06-06 21:25:59'),(15,8,NULL,NULL,'es','2023-06-28 21:27:48','2023-06-28 21:27:48'),(16,8,NULL,NULL,'en','2023-06-28 21:27:48','2023-06-28 21:27:48'),(37,19,NULL,NULL,'es','2023-09-27 19:56:09','2023-09-27 19:56:09'),(38,19,NULL,NULL,'en','2023-09-27 19:56:09','2023-09-27 19:56:09'),(47,24,NULL,NULL,'es','2024-01-10 21:31:38','2024-01-10 21:31:38'),(48,24,NULL,NULL,'en','2024-01-10 21:31:38','2024-01-10 21:31:38');
/*!40000 ALTER TABLE `info_gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_services`
--

DROP TABLE IF EXISTS `info_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint unsigned NOT NULL,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_hour` double DEFAULT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_meta` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_meta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_meta` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_services_service_id_foreign` (`service_id`),
  CONSTRAINT `info_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_services`
--

LOCK TABLES `info_services` WRITE;
/*!40000 ALTER TABLE `info_services` DISABLE KEYS */;
INSERT INTO `info_services` VALUES (11,6,'es','Terapia de Pareja',NULL,'Es una terapia enfocada en la escucha atenta y consciente de los miembros de la pareja, se brindan herramientas que les ayudaran a una mejor convivencia, modificar sus actitudes y renovar sus acuerdos para que tomen consciencia de la relación de pareja que quieren construir.','<p style=\"text-align:justify\">La Terapia de Pareja es un espacio para orientar a las personas que componen una relacion&nbsp;a&nbsp;comprender las criris o conflictos nacidos en el seno de la relaci&oacute;n amorosa.</p>\r\n\r\n<p style=\"text-align:justify\">Una pareja est&aacute; conformada por dos personas felices comprometidas a construir&nbsp;una relacion de pareja. Lo ideal es que la relaci&oacute;n este basada desde&nbsp;los valores de cada uno,&nbsp;pero muchas veces se atraen desde los vacios que conllevan a la decepci&oacute;n con el tiempo, pues las expectativas que generalmente son bastante altas los llevan a la frustraci&oacute;n generando m&aacute;s dolor sobre sus&nbsp;heridas de la infancia desconcidas&nbsp;muchas veces por cada uno.&nbsp;&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">El objetivo es ofrecer herramientas, habilidades, estrategias emocionales y conductuales&nbsp;que gu&iacute;en a cada uno como alternativa para hacerlo diferente, romper paradigmas dolorosos del sistema familiar que por lealtad inconsciente tienden a repetir los modelos de pareja de cada uno aprendi&oacute; y desde all&iacute; cambiar los comportamientos que conllevan a la violencia y al drama del cual urge salir.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>',NULL,NULL,NULL,'2023-06-06 16:50:58','2023-08-28 15:44:44'),(12,6,'en','PRUEBA 1',120000,'FEWFWE','<p>WFEFWEF</p>',NULL,NULL,NULL,'2023-06-06 16:50:58','2023-06-06 16:50:58'),(13,7,'es','Terapia Individual',NULL,'Es un espacio donde encontrarás el apoyo que necesitas cuando has  experimentado traumas en algunas de las etapas de tu vida, bloqueos emocionales, adicciones, entre otras. Mejorar tu bienestar mental, físico, emocional y espiritual.','<p style=\"text-align:justify\">La Terapia Individual es un espacio para ti donde podr&aacute;s comprender tus estados emocionales, tus comportamientos y situaciones de la vida que muchas veces por patrones de repetici&oacute;n entras en un bucle de emociones sin encontar la&nbsp;salida.</p>\r\n\r\n<p style=\"text-align:justify\">Es un espacio de total confidencialidad, empat&iacute;a, comprensi&oacute;n y contensi&oacute;n generando en ti&nbsp;mayor seguridad para la toma de tus&nbsp;decisiones&nbsp;que te&nbsp;permitir&aacute; sentirte&nbsp;cada vez mejor contigo&nbsp;mismo, mejorando tus conductas, cambiando tus creencias y la manera en que te relacionas con los dem&aacute;s.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">La Terapia Individual de centra en las siguientes situaciones:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Ansiedad</li>\r\n	<li style=\"text-align:justify\">Inseguridad</li>\r\n	<li style=\"text-align:justify\">Depresi&oacute;n</li>\r\n	<li style=\"text-align:justify\">Miedos y Fobias</li>\r\n	<li style=\"text-align:justify\">Autoestima y Autoconocimiento</li>\r\n	<li style=\"text-align:justify\">Estancamiento personal, emocional, relacional, laboral...</li>\r\n	<li style=\"text-align:justify\">Duelos</li>\r\n	<li style=\"text-align:justify\">S&iacute;ntomas y Enfermedades</li>\r\n	<li style=\"text-align:justify\">Entre otras...</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>',NULL,NULL,NULL,'2023-06-06 16:54:58','2023-08-28 15:34:34'),(14,7,'en','PRUEBA 12',122222,'2e','<p>12e12e12e</p>',NULL,NULL,NULL,'2023-06-06 16:54:58','2023-06-06 16:54:58'),(15,8,'es','Descodificación Biológica y Emocional',NULL,'Comprender ante la aparición de algún síntoma o enfermedad la vivencia de una situación traumática con una gran carga de estrés. Es el camino directo de las emociones para descubrir los conflictos biológicos.','<p style=\"text-align:justify\">La <strong>Descodificaci&oacute;n Biol&oacute;gica y Emocional&nbsp;</strong>es una terapia donde se brinda&nbsp;acompa&ntilde;amiento para identiicar los bloqueos emocionales causados por traumas experimentados en diferentes etapas de la vida, los cuales fueron vividos de manera dram&aacute;tica, sorpresivamente y en soledad.</p>\r\n\r\n<p style=\"text-align:justify\">En este enfoque de la enfermedad se considera como un c&oacute;digo de&nbsp;transcripci&oacute;n de una historia que se expresa en forma de s&iacute;ntoma y se codifica toda la informaci&oacute;n que hay en nuestros sentidos como olores, sabores, im&aacute;genes, sonidos y sensaciones, emociones., etc. &nbsp;Toda esta informaci&oacute;n es guardada en el incosnciente y se dispara&nbsp;por una vivencia silimar en alg&uacute;n momento de la vida representada en una enfermedad.</p>\r\n\r\n<p style=\"text-align:justify\">Para comprenderlo implica reconocer&nbsp;qu&eacute; conflictos emocionales se vivieron en un estado de&nbsp;estr&eacute;s y c&oacute;mo afectaron&nbsp;al cuerpo cuando no se descarga el estr&eacute;s acumulado. Su origen se encuentra en la Medicina Germanica descubierta por el Dr. Hamer&nbsp;llamandolas as&iacute; las&nbsp;<strong>5 Leyes Biologicas de Hammer. &nbsp;</strong>Estas&nbsp;5 Leyes maravillosas del Dr. HAMER, forman un modelo cient&iacute;fico que muestran de manera precisa la conexi&oacute;n entre la psique, el cerebro y los cambios del cuerpo.</p>\r\n\r\n<p style=\"text-align:justify\">La Descodificaci&oacute;n Biol&oacute;gica&nbsp;utiliza&nbsp;el camino directo de las emociones para descubrir los conflictos biol&oacute;gicos. La base est&aacute; en comprender que siempre antes de la aparici&oacute;n de un s&iacute;ntoma f&iacute;sico o ps&iacute;quico&nbsp;la persona ha vivido un conflicto biol&oacute;gico llamado tambi&eacute;n <strong>Bioshok.</strong>&nbsp;&Eacute;ste se define como una situaci&oacute;n vivida en soledad, inesperada, dram&aacute;tica, sin soluci&oacute;n y sin expresi&oacute;n.</p>\r\n\r\n<p style=\"text-align:justify\">Si el s&iacute;ntoma existe es porque&nbsp;responde a una necesidad concreta no resuelta.&nbsp; Cada conflicto o problema esta conectado a un &oacute;rgano espec&iacute;fico&nbsp;en el cuerpo el cual va a generar un s&iacute;ntoma, ya que &eacute;ste necesita una salida.&nbsp;Las patolog&iacute;as, enfermedades o s&iacute;ntomas&nbsp;no aparecen en contra de nuestra vida, aparecen para permitirnos compender cu&aacute;l es el ecosistema en el que vivimos y por qu&eacute; es &uacute;til el s&iacute;ntoma.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Descodificar es, en realidad,</strong>&nbsp;<strong>aprender a hablar el idioma del cuerpo</strong>. Entender que cada s&iacute;ntoma viene de una historia, de una memoria familiar representada en una enfermdead o comportamiento. Escuchar el cuerpo, abrazar el&nbsp;s&iacute;ntoma y aceptar el proceso es la mejor manera de sanar.</p>\r\n\r\n<p style=\"text-align:justify\">Esta t&eacute;cnica <strong>no sustituye ning&uacute;n tratamiento m&eacute;dico,&nbsp;</strong>es una herramienta en el proceso de sanaci&oacute;n.</p>',NULL,NULL,NULL,'2023-08-02 16:27:23','2023-08-28 15:45:24'),(16,8,'en','Descodificación Biológica y Emocional',120000,'Comprender ante la aparición de algún síntoma o enfermedad la vivencia de una situación traumática con una gran carga de estrés. Es el camino directo de las emociones para descubrir los conflictos biológicos.','<p style=\"text-align:justify\">La Descodificaci&oacute;n Biol&oacute;gica es un acompa&ntilde;amiento emocional que nos permite ver c&oacute;mo hemos vivido los problemas que se nos han presentado en la vida a trav&eacute;s de los&nbsp;<a href=\"https://institutoangeleswolder.com/diccionario-emocional/#s\">s&iacute;ntomas</a>&nbsp;que tenemos, los bloqueos y/o los l&iacute;mites f&iacute;sicos en nuestra existencia.</p>\r\n\r\n<p style=\"text-align:justify\">Implica comprender qu&eacute; conflictos emocionales vivimos cuando estamos en estr&eacute;s y c&oacute;mo afecta al cuerpo cuando no descargamos el estr&eacute;s acumulado. Su origen se encuentra en las&nbsp;<strong><a href=\"https://institutoangeleswolder.com/las-5-leyes-la-biologia/\">5 leyes biol&oacute;gicas</a></strong>&nbsp;y se trata de un acompa&ntilde;amiento emocional que no suple ninguna otra pr&aacute;ctica m&eacute;dica ni psicol&oacute;gica, pero s&iacute; complementa.</p>\r\n\r\n<p style=\"text-align:justify\">La&nbsp;<a href=\"https://www.youtube.com/watch?v=yWvqs0SP9iY\" rel=\"noreferrer noopener\" target=\"_blank\">Descodificaci&oacute;n Biol&oacute;gica</a>&nbsp;utiliza&nbsp;<strong>el camino directo de las emociones para descubrir los conflictos biol&oacute;gicos</strong>. La base est&aacute; en comprender que siempre antes de la aparici&oacute;n de un s&iacute;ntoma -sea f&iacute;sico o un problema en nuestra existencia- la persona ha vivido un conflicto biol&oacute;gico, Dirk Hamer Symptom o&nbsp;<strong><a href=\"https://institutoangeleswolder.com/diccionario-emocional/#b\">bioshock</a></strong>. &Eacute;ste se define como una situaci&oacute;n vivida en soledad, inesperada, dram&aacute;tica, sin soluci&oacute;n y sin expresi&oacute;n.</p>\r\n\r\n<p style=\"text-align:justify\">Si el s&iacute;ntoma existe es porque&nbsp;<strong>responde a una necesidad concreta</strong>. Cada conflicto o problema tiene un &oacute;rgano espec&iacute;fico en el cuerpo en el que va a exteriorizarse, ya que&nbsp;<strong>necesita una salida</strong>.&nbsp;Las patolog&iacute;as y las limitaciones de vida no son algo que est&aacute; en nuestra contra, sino elementos que nos permiten comprender cu&aacute;l es el ecosistema en el que vivimos y por qu&eacute; es &uacute;til el s&iacute;ntoma. Para la Descodificaci&oacute;n Biol&oacute;gica,&nbsp;<strong>el cuerpo est&aacute; de nuestra parte.</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Descodificar es, en realidad,</strong>&nbsp;<strong>aprender a hablar el idioma del cuerpo</strong>. Entender que cada s&iacute;ntoma tiene una palabra y una funci&oacute;n; y es en base a esa funci&oacute;n y utilidad que los descodificadores biol&oacute;gicos vamos a buscar en la etapa biogr&aacute;fica de la persona cu&aacute;les son los momentos a los que el s&iacute;ntoma est&aacute; brindando una&nbsp;<a href=\"https://institutoangeleswolder.com/diccionario-emocional/#s\">soluci&oacute;n</a>.</p>\r\n\r\n<p style=\"text-align:justify\"><em>Es importante comprender las emociones no procesadas, no expresadas y reprimidas porque van a generar un fuerte estr&eacute;s dentro de nuestro organismo.</em></p>',NULL,NULL,NULL,'2023-08-02 16:27:23','2023-08-02 16:27:23'),(17,9,'es','Terapia Reiki',NULL,'Terapia de sanacion alternativa para equilibrar la energía y armonizar el área mental, emocional o física que por estrés o enfermedades hayan sido afectadas.','<h3 style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>&iquest;Qu&eacute; es el Reiki?</strong></span></h3>\r\n\r\n<p>Reiki es una palabra Japonesa que signiica energ&iacute;a universal. &nbsp;<em>Rei </em>significa universal y se refiere a la parte espiritual y <em>Ki&nbsp;</em>es la energ&iacute;a vital individual que rodea nuestros cuerpos, manteni&eacute;ndolos vivos.</p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Ventajas y Beneficios</strong></span></p>\r\n\r\n<p>Es una t&eacute;cnica segura, al alcance de todos, sin efectos secundarios ni contraindicaciones, siendo compatible con cualquier tipo de terapia o tratamiento.</p>\r\n\r\n<p>Equilibra los 7 Chakras principales que est&aacute;n localizados desde la base de la columna a la parte superior de la cabeza. Alivia rapidamente dolores f&iacute;sicos, sirve para la relajaci&oacute;n que promueve la curaci&oacute;n, reduce&nbsp;el estr&eacute;s, la fatiga cr&oacute;nica, equilibra los cuerpos f&iacute;sico, mental y espiritual lo que permite restablecer la salud y la armon&iacute;a.</p>',NULL,NULL,NULL,'2023-08-02 16:33:13','2023-09-22 20:51:12'),(18,9,'en','Terapia Reiki',NULL,'Terapia de sanacion alternativa para equilibrar la energía y armonizar el área mental, emocional o física que por estrés o enfermedades hayan sido afectadas.','<h3 style=\"text-align:justify\">&iquest;Qu&eacute; es?</h3>\r\n\r\n<p style=\"text-align:justify\">La terapia Reiki es un tipo de terapia energ&eacute;tica en la que la &ldquo;energ&iacute;a vital universal&rdquo; se canaliza hacia el paciente a trav&eacute;s del tacto y la intenci&oacute;n positiva.</p>\r\n\r\n<p style=\"text-align:justify\">Reiki se origin&oacute; de los monjes budistas. &ldquo;Rei&rdquo; significa &ldquo;esp&iacute;ritu universal&rdquo; y &ldquo;ki&rdquo; significa &ldquo;energ&iacute;a vital&rdquo;. Reiki se denomina terapia de medicina energ&eacute;tica porque los practicantes creen que puede mejorar el flujo y el equilibrio de la energ&iacute;a. Se cree que los desequilibrios o alteraciones energ&eacute;ticas provocan enfermedades.</p>\r\n\r\n<p style=\"text-align:justify\">Las personas usan la terapia de Reiki para el dolor, el estr&eacute;s, la fatiga, la depresi&oacute;n, la ansiedad y muchas otras condiciones, pero no existe una buena evidencia cient&iacute;fica que respalde estos usos.</p>',NULL,NULL,NULL,'2023-08-02 16:33:13','2023-08-02 16:33:13'),(19,10,'es','Eneagrama de la Personalidad',NULL,NULL,'<p>La palabra <em><strong>ENEAGRAMA&nbsp;</strong></em>significa <em>&quot;nueve lineas&quot;</em> que corresponde a <em>9 Eneatipos de la Personalidad.</em>&nbsp; Principalmente porque describe, a grandes rasgos, nueve tipos de personalidad, cada uno de los cuales cuenta con su propio &quot;Modelo Mental&quot;. &nbsp;Es decir el esqueleto psicol&oacute;gico desde el que se originan los pensamientos y desde donde se instalan las creencias, los valores, las prioridades y las aspiraciones&nbsp;que constituyen nuestra personalidad.&nbsp;</p>\r\n\r\n<p>Al descrubrir los motivadores de vida naturales, esos que defiendes sin saber y que te generan felicidad, podr&aacute;s derribar limiaciones, eliminar miedos,&nbsp;&nbsp;explorar m&aacute;s aspectos de tu personalidad que te permiten evolucionar como ser humano.</p>\r\n\r\n<p>Trabaja los <strong>3 CEREBROS</strong> que son <em>instintivo, emocional y mental</em>. &nbsp;Podr&aacute;s descrubrir cual es tu dominancia y empoderar tu verdadera esencia.</p>\r\n\r\n<p><strong>EL&nbsp;ENEAGRAMA</strong> divide los 9 Eneatipos en 3 Triadas:</p>\r\n\r\n<ul>\r\n	<li><strong>Instintivo</strong>&nbsp;lo comanda la Neocorteza&nbsp;y es el encargado de la <strong>ACCI&Oacute;N</strong></li>\r\n	<li><strong>Emocional</strong> lo comanda el Sistema L&iacute;mbico y es el encargado de las <strong>EMOCIONES Y SENTIMIENTOS,&nbsp;</strong>es el sentir.</li>\r\n	<li><strong>Mental</strong> comandado por el Sistema Reptil y es el encargado del <strong>CONOCIMIENTO Y SABER</strong>, es intelectual.</li>\r\n</ul>\r\n\r\n<p>Cuentas con un lado luz y un lado sombra de los 3 cerebros y tienes un cerebro que te domina.</p>\r\n\r\n<p>Lo ideal es tener un equilibrio en el manejo de tus 3 cerebros, aprender a manejar el lado sombra y empoderar el lado luz del cerebro dominante.</p>\r\n\r\n<p>Esta herramienta se&nbsp;convierte en un GPS de vida, &nbsp;para que&nbsp;potencies tus habilidades, descrubras tus limitaciones y bloqueos, sanes las heridas de tu infancia y comprendas cual es la motivci&oacute;n de estar en esta vida.</p>',NULL,NULL,NULL,'2023-09-22 20:41:57','2023-09-22 20:41:57'),(20,10,'en','Eneagrama de la Personalidad',NULL,NULL,'<p>La palabra <em><strong>ENEAGRAMA&nbsp;</strong></em>significa <em>&quot;nueve lineas&quot;</em> que corresponde a <em>9 Eneatipos de la Personalidad.</em>&nbsp; Principalmente porque describe, a grandes rasgos, nueve tipos de personalidad, cada uno de los cuales cuenta con su propio &quot;Modelo Mental&quot;. &nbsp;Es decir el esqueleto psicol&oacute;gico desde el que se originan los pensamientos y desde donde se instalan las creencias, los valores, las prioridades y las aspiraciones&nbsp;que constituyen nuestra personalidad.&nbsp;</p>\r\n\r\n<p>Al descrubrir los motivadores de vida naturales, esos que defiendes sin saber y que te generan felicidad, podr&aacute;s derribar limiaciones, eliminar miedos,&nbsp;&nbsp;explorar m&aacute;s aspectos de tu personalidad que te permiten evolucionar como ser humano.</p>\r\n\r\n<p>Trabaja los <strong>3 CEREBROS</strong> que son <em>instintivo, emocional y mental</em>. &nbsp;Podr&aacute;s descrubrir cual es tu dominancia y empoderar tu verdadera esencia.</p>\r\n\r\n<p><strong>EL&nbsp;ENEAGRAMA</strong> divide los 9 Eneatipos en 3 Triadas:</p>\r\n\r\n<ul>\r\n	<li><strong>Instintivo</strong>&nbsp;lo comanda la Neocorteza&nbsp;y es el encargado de la <strong>ACCI&Oacute;N</strong></li>\r\n	<li><strong>Emocional</strong> lo comanda el Sistema L&iacute;mbico y es el encargado de las <strong>EMOCIONES Y SENTIMIENTOS,&nbsp;</strong>es el sentir.</li>\r\n	<li><strong>Mental</strong> comandado por el Sistema Reptil y es el encargado del <strong>CONOCIMIENTO Y SABER</strong>, es intelectual.</li>\r\n</ul>\r\n\r\n<p>Cuentas con un lado luz y un lado sombra de los 3 cerebros y tienes un cerebro que te domina.</p>\r\n\r\n<p>Lo ideal es tener un equilibrio en el manejo de tus 3 cerebros, aprender a manejar el lado sombra y empoderar el lado luz del cerebro dominante.</p>\r\n\r\n<p>Esta herramienta se&nbsp;convierte en un GPS de vida, &nbsp;para que&nbsp;potencies tus habilidades, descrubras tus limitaciones y bloqueos, sanes las heridas de tu infancia y comprendas cual es la motivci&oacute;n de estar en esta vida.</p>',NULL,NULL,NULL,'2023-09-22 20:41:57','2023-09-22 20:41:57'),(21,11,'es','Eneagrama de la Personalidad',NULL,'La palabra ENEAGRAMA significa \"nueve lineas\" que corresponde a 9 Eneatipos de la Personalidad.  Principalmente porque describe, a grandes rasgos, nueve tipos de personalidad, cada uno de los cuales cuenta con su propio \"Modelo Mental\".','<p>Es decir el esqueleto psicol&oacute;gico desde el que se originan los pensamientos y desde donde se instalan las creencias, los valores, las prioridades y las aspiraciones&nbsp;que constituyen nuestra personalidad.&nbsp;</p>\r\n\r\n<p>Al descrubrir los motivadores de vida naturales, esos que defiendes sin saber y que te generan felicidad, podr&aacute;s derribar limiaciones, eliminar miedos,&nbsp;&nbsp;explorar m&aacute;s aspectos de tu personalidad que te permiten evolucionar como ser humano.</p>\r\n\r\n<p>Trabaja los <strong>3 CEREBROS</strong> que son <em>instintivo, emocional y mental</em>. &nbsp;Podr&aacute;s descrubrir cual es tu dominancia y empoderar tu verdadera esencia.</p>\r\n\r\n<p><strong>EL&nbsp;ENEAGRAMA</strong> divide los 9 Eneatipos en 3 Triadas:</p>\r\n\r\n<ul>\r\n	<li><strong>Instintivo</strong>&nbsp;lo comanda la Neocorteza&nbsp;y es el encargado de la <strong>ACCI&Oacute;N</strong></li>\r\n	<li><strong>Emocional</strong> lo comanda el Sistema L&iacute;mbico y es el encargado de las <strong>EMOCIONES Y SENTIMIENTOS,&nbsp;</strong>es el sentir.</li>\r\n	<li><strong>Mental</strong> comandado por el Sistema Reptil y es el encargado del <strong>CONOCIMIENTO Y SABER</strong>, es intelectual.</li>\r\n</ul>\r\n\r\n<p>Cuentas con un lado luz y un lado sombra de los 3 cerebros y tienes un cerebro que te domina.</p>\r\n\r\n<p>Lo ideal es tener un equilibrio en el manejo de tus 3 cerebros, aprender a manejar el lado sombra y empoderar el lado luz del cerebro dominante.</p>\r\n\r\n<p>Esta herramienta se&nbsp;convierte en un GPS de vida, &nbsp;para que&nbsp;potencies tus habilidades, descrubras tus limitaciones y bloqueos, sanes las heridas de tu infancia y comprendas cual es la motivci&oacute;n de estar en esta vida.</p>\r\n\r\n<p>&nbsp;</p>',NULL,NULL,NULL,'2023-09-22 20:49:32','2023-09-28 17:03:13'),(22,11,'en','Eneagrama de la Personalidad',NULL,NULL,'<p>La palabra <em><strong>ENEAGRAMA&nbsp;</strong></em>significa <em>&quot;nueve lineas&quot;</em> que corresponde a <em>9 Eneatipos de la Personalidad.</em>&nbsp; Principalmente porque describe, a grandes rasgos, nueve tipos de personalidad, cada uno de los cuales cuenta con su propio &quot;Modelo Mental&quot;. &nbsp;Es decir el esqueleto psicol&oacute;gico desde el que se originan los pensamientos y desde donde se instalan las creencias, los valores, las prioridades y las aspiraciones&nbsp;que constituyen nuestra personalidad.&nbsp;</p>\r\n\r\n<p>Al descrubrir los motivadores de vida naturales, esos que defiendes sin saber y que te generan felicidad, podr&aacute;s derribar limiaciones, eliminar miedos,&nbsp;&nbsp;explorar m&aacute;s aspectos de tu personalidad que te permiten evolucionar como ser humano.</p>\r\n\r\n<p>Trabaja los <strong>3 CEREBROS</strong> que son <em>instintivo, emocional y mental</em>. &nbsp;Podr&aacute;s descrubrir cual es tu dominancia y empoderar tu verdadera esencia.</p>\r\n\r\n<p><strong>EL&nbsp;ENEAGRAMA</strong> divide los 9 Eneatipos en 3 Triadas:</p>\r\n\r\n<ul>\r\n	<li><strong>Instintivo</strong>&nbsp;lo comanda la Neocorteza&nbsp;y es el encargado de la <strong>ACCI&Oacute;N</strong></li>\r\n	<li><strong>Emocional</strong> lo comanda el Sistema L&iacute;mbico y es el encargado de las <strong>EMOCIONES Y SENTIMIENTOS,&nbsp;</strong>es el sentir.</li>\r\n	<li><strong>Mental</strong> comandado por el Sistema Reptil y es el encargado del <strong>CONOCIMIENTO Y SABER</strong>, es intelectual.</li>\r\n</ul>\r\n\r\n<p>Cuentas con un lado luz y un lado sombra de los 3 cerebros y tienes un cerebro que te domina.</p>\r\n\r\n<p>Lo ideal es tener un equilibrio en el manejo de tus 3 cerebros, aprender a manejar el lado sombra y empoderar el lado luz del cerebro dominante.</p>\r\n\r\n<p>Esta herramienta se&nbsp;convierte en un GPS de vida, &nbsp;para que&nbsp;potencies tus habilidades, descrubras tus limitaciones y bloqueos, sanes las heridas de tu infancia y comprendas cual es la motivci&oacute;n de estar en esta vida.</p>\r\n\r\n<p>&nbsp;</p>',NULL,NULL,NULL,'2023-09-22 20:49:32','2023-09-22 20:49:32'),(23,12,'es','ENEAGRAMA DE LA PERSONALIDAD',NULL,NULL,'<p style=\"text-align:justify\">La palabra <em><strong>ENEAGRAMA&nbsp;</strong></em>significa <em>&quot;nueve lineas&quot;</em> que corresponde a <em>9 Eneatipos de la Personalidad.</em>&nbsp; Principalmente porque describe, a grandes rasgos, nueve tipos de personalidad, cada uno de los cuales cuenta con su propio &quot;Modelo Mental&quot;. &nbsp;Es decir el esqueleto psicol&oacute;gico desde el que se originan los pensamientos y desde donde se instalan las creencias, los valores, las prioridades y las aspiraciones&nbsp;que constituyen nuestra personalidad.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Al descrubrir los motivadores de vida naturales, esos que defiendes sin saber y que te generan felicidad, podr&aacute;s derribar limiaciones, eliminar miedos,&nbsp;&nbsp;explorar m&aacute;s aspectos de tu personalidad que te permiten evolucionar como ser humano.</p>\r\n\r\n<p style=\"text-align:justify\">Trabaja los <strong>3 CEREBROS</strong> que son <em>instintivo, emocional y mental</em>. &nbsp;Podr&aacute;s descrubrir cual es tu dominancia y empoderar tu verdadera esencia.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>EL&nbsp;ENEAGRAMA</strong> divide los 9 Eneatipos en 3 Triadas:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\"><strong>Instintivo</strong>&nbsp;lo comanda la Neocorteza&nbsp;y es el encargado de la <strong>ACCI&Oacute;N</strong></li>\r\n	<li style=\"text-align: justify;\"><strong>Emocional</strong> lo comanda el Sistema L&iacute;mbico y es el encargado de las <strong>EMOCIONES Y SENTIMIENTOS,&nbsp;</strong>es el sentir.</li>\r\n	<li style=\"text-align: justify;\"><strong>Mental</strong> comandado por el Sistema Reptil y es el encargado del <strong>CONOCIMIENTO Y SABER</strong>, es intelectual.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Cuentas con un lado luz y un lado sombra de los 3 cerebros y tienes un cerebro que te domina.</p>\r\n\r\n<p style=\"text-align:justify\">Lo ideal es tener un equilibrio en el manejo de tus 3 cerebros, aprender a manejar el lado sombra y empoderar el lado luz del cerebro dominante.</p>\r\n\r\n<p style=\"text-align:justify\">Esta herramienta se&nbsp;convierte en un GPS de vida, &nbsp;para que&nbsp;potencies tus habilidades, descrubras tus limitaciones y bloqueos, sanes las heridas de tu infancia y comprendas cual es la motivci&oacute;n de estar en esta vida.</p>\r\n\r\n<p>&nbsp;</p>',NULL,NULL,NULL,'2023-09-27 19:04:22','2023-09-27 19:04:22'),(24,12,'en','ENEAGRAMA DE LA PERSONALIDAD',NULL,NULL,'<p style=\"text-align:justify\">La palabra <em><strong>ENEAGRAMA&nbsp;</strong></em>significa <em>&quot;nueve lineas&quot;</em> que corresponde a <em>9 Eneatipos de la Personalidad.</em>&nbsp; Principalmente porque describe, a grandes rasgos, nueve tipos de personalidad, cada uno de los cuales cuenta con su propio &quot;Modelo Mental&quot;. &nbsp;Es decir el esqueleto psicol&oacute;gico desde el que se originan los pensamientos y desde donde se instalan las creencias, los valores, las prioridades y las aspiraciones&nbsp;que constituyen nuestra personalidad.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Al descrubrir los motivadores de vida naturales, esos que defiendes sin saber y que te generan felicidad, podr&aacute;s derribar limiaciones, eliminar miedos,&nbsp;&nbsp;explorar m&aacute;s aspectos de tu personalidad que te permiten evolucionar como ser humano.</p>\r\n\r\n<p style=\"text-align:justify\">Trabaja los <strong>3 CEREBROS</strong> que son <em>instintivo, emocional y mental</em>. &nbsp;Podr&aacute;s descrubrir cual es tu dominancia y empoderar tu verdadera esencia.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>EL&nbsp;ENEAGRAMA</strong> divide los 9 Eneatipos en 3 Triadas:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\"><strong>Instintivo</strong>&nbsp;lo comanda la Neocorteza&nbsp;y es el encargado de la <strong>ACCI&Oacute;N</strong></li>\r\n	<li style=\"text-align: justify;\"><strong>Emocional</strong> lo comanda el Sistema L&iacute;mbico y es el encargado de las <strong>EMOCIONES Y SENTIMIENTOS,&nbsp;</strong>es el sentir.</li>\r\n	<li style=\"text-align: justify;\"><strong>Mental</strong> comandado por el Sistema Reptil y es el encargado del <strong>CONOCIMIENTO Y SABER</strong>, es intelectual.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Cuentas con un lado luz y un lado sombra de los 3 cerebros y tienes un cerebro que te domina.</p>\r\n\r\n<p style=\"text-align:justify\">Lo ideal es tener un equilibrio en el manejo de tus 3 cerebros, aprender a manejar el lado sombra y empoderar el lado luz del cerebro dominante.</p>\r\n\r\n<p style=\"text-align:justify\">Esta herramienta se&nbsp;convierte en un GPS de vida, &nbsp;para que&nbsp;potencies tus habilidades, descrubras tus limitaciones y bloqueos, sanes las heridas de tu infancia y comprendas cual es la motivci&oacute;n de estar en esta vida.</p>\r\n\r\n<p>&nbsp;</p>',NULL,NULL,NULL,'2023-09-27 19:04:22','2023-09-27 19:04:22'),(25,13,'es','PNL',NULL,'PROGRAMACION NEUROLINGÜISTICA','<h2 style=\"text-align:justify\">Programaci&oacute;n Neuroling&uuml;&iacute;stica</h2>\r\n\r\n<p style=\"text-align:justify\">Programaci&oacute;n Neuroling&uuml;&iacute;stica es una metodolog&iacute;a que puede ser usada en cualquier &aacute;rea de la vida, logrando cambios significativos e importantes de bienestar y &eacute;xito, &nbsp;creada por John Grinder &nbsp;(Ling&uuml;ista) y Richard Bandler (Matem&aacute;tico) en el a&ntilde;o de 1974.</p>\r\n\r\n<p style=\"text-align:justify\">La P.N.L. brinda &nbsp;un conjunto de herramientas poderosas que permite que la persona que entra en contacto con ellas logre conectar con ese gigante que tiene dentro y lograr una transformaci&oacute;n eficaz y muy profunda en muy poco tiempo en todas las &aacute;reas de su vida.</p>',NULL,NULL,NULL,'2024-01-10 21:42:37','2024-01-10 21:42:47'),(26,13,'en','PNL',NULL,'PROGRAMACION NEUROLINGÜISTICA','<h2 style=\"text-align:justify\">Programaci&oacute;n Neuroling&uuml;&iacute;stica</h2>\r\n\r\n<p style=\"text-align:justify\">Programaci&oacute;n Neuroling&uuml;&iacute;stica es una metodolog&iacute;a que puede ser usada en cualquier &aacute;rea de la vida, logrando cambios significativos e importantes de bienestar y &eacute;xito, &nbsp;creada por John Grinder &nbsp;(Ling&uuml;ista) y Richard Bandler (Matem&aacute;tico) en el a&ntilde;o de 1974.</p>\r\n\r\n<p style=\"text-align:justify\">La P.N.L. brinda &nbsp;un conjunto de herramientas poderosas que permite que la persona que entra en contacto con ellas logre conectar con ese gigante que tiene dentro y lograr una transformaci&oacute;n eficaz y muy profunda en muy poco tiempo en todas las &aacute;reas de su vida.</p>',NULL,NULL,NULL,'2024-01-10 21:42:37','2024-01-10 21:42:37');
/*!40000 ALTER TABLE `info_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_slide_images`
--

DROP TABLE IF EXISTS `info_slide_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_slide_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slide_image_id` bigint unsigned NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_slide_images_slide_image_id_foreign` (`slide_image_id`),
  CONSTRAINT `info_slide_images_slide_image_id_foreign` FOREIGN KEY (`slide_image_id`) REFERENCES `slide_images` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_slide_images`
--

LOCK TABLES `info_slide_images` WRITE;
/*!40000 ALTER TABLE `info_slide_images` DISABLE KEYS */;
INSERT INTO `info_slide_images` VALUES (27,17,NULL,NULL,NULL,'es','2023-08-23 12:25:42','2023-08-23 12:25:42'),(28,17,NULL,NULL,NULL,'en','2023-08-23 12:25:42','2023-08-23 12:25:42'),(33,20,NULL,NULL,NULL,'es','2024-01-10 20:53:28','2024-01-10 20:53:28'),(34,20,NULL,NULL,NULL,'en','2024-01-10 20:53:28','2024-01-10 20:53:28'),(41,24,NULL,NULL,NULL,'es','2024-01-10 21:10:07','2024-01-10 21:10:07'),(42,24,NULL,NULL,NULL,'en','2024-01-10 21:10:07','2024-01-10 21:10:07'),(47,27,NULL,NULL,NULL,'es','2024-01-10 21:12:50','2024-01-10 21:12:50'),(48,27,NULL,NULL,NULL,'en','2024-01-10 21:12:50','2024-01-10 21:12:50');
/*!40000 ALTER TABLE `info_slide_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_users`
--

DROP TABLE IF EXISTS `info_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `cellphone` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_users`
--

LOCK TABLES `info_users` WRITE;
/*!40000 ALTER TABLE `info_users` DISABLE KEYS */;
INSERT INTO `info_users` VALUES (1,3,'2330296','3105455109','yulima','2024-02-19 17:43:43','2024-02-19 17:43:43');
/*!40000 ALTER TABLE `info_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_videos`
--

DROP TABLE IF EXISTS `info_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint unsigned NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_videos_video_id_foreign` (`video_id`),
  CONSTRAINT `info_videos_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_videos`
--

LOCK TABLES `info_videos` WRITE;
/*!40000 ALTER TABLE `info_videos` DISABLE KEYS */;
INSERT INTO `info_videos` VALUES (1,1,NULL,'es','2023-06-28 16:06:08','2023-06-28 16:06:08'),(2,1,NULL,'en','2023-06-28 16:06:08','2023-06-28 16:06:08'),(3,2,NULL,'es','2023-06-28 16:07:47','2023-06-28 16:07:47'),(4,2,NULL,'en','2023-06-28 16:07:47','2023-06-28 16:07:47'),(5,3,NULL,'es','2023-06-28 16:09:36','2023-06-28 16:09:36'),(6,3,NULL,'en','2023-06-28 16:09:36','2023-06-28 16:09:36'),(7,4,NULL,'es','2023-06-28 16:13:43','2023-06-28 16:13:43'),(8,4,NULL,'en','2023-06-28 16:13:43','2023-06-28 16:13:43'),(9,5,NULL,'es','2023-06-28 16:18:53','2023-06-28 16:18:53'),(10,5,NULL,'en','2023-06-28 16:18:53','2023-06-28 16:18:53'),(15,8,NULL,'es','2023-06-28 16:23:26','2023-06-28 16:23:26'),(16,8,NULL,'en','2023-06-28 16:23:26','2023-06-28 16:23:26'),(17,9,NULL,'es','2023-06-28 16:23:35','2023-06-28 16:23:35'),(18,9,NULL,'en','2023-06-28 16:23:35','2023-06-28 16:23:35'),(27,14,NULL,'es','2023-06-28 16:34:31','2023-06-28 16:34:31'),(28,14,NULL,'en','2023-06-28 16:34:31','2023-06-28 16:34:31'),(29,15,NULL,'es','2023-06-28 16:35:38','2023-06-28 16:35:38'),(30,15,NULL,'en','2023-06-28 16:35:38','2023-06-28 16:35:38');
/*!40000 ALTER TABLE `info_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_10_11_150149_create_permission_tables',1),(5,'2019_10_15_112952_create_categories_table',1),(6,'2019_10_15_113303_create_galleries_table',1),(7,'2019_10_15_113901_create_slides_table',1),(8,'2019_10_15_114304_create_files_table',1),(9,'2019_10_15_115351_create_videos_table',1),(10,'2019_10_15_115617_create_configsites_table',1),(11,'2019_10_15_115724_create_subscribers_table',1),(12,'2019_10_15_115802_create_contents_table',1),(13,'2019_10_15_141023_create_services_table',1),(14,'2019_10_15_141247_create_articles_table',1),(26,'2019_10_15_141250_create_locations_table',2),(27,'2023_06_01_154321_create_service_contact_table',2),(33,'2023_06_06_151719_create_allies_table',3),(34,'2023_06_06_163611_create_testimony_table',4),(35,'2023_06_07_094954_create_posts_table',4),(36,'2023_06_26_181654_create_features_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` int unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(1,'App\\Models\\User',2),(1,'App\\Models\\User',3);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_contact`
--

DROP TABLE IF EXISTS `service_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_contact` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_service` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_contact`
--

LOCK TABLES `service_contact` WRITE;
/*!40000 ALTER TABLE `service_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_contacts`
--

DROP TABLE IF EXISTS `service_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_service` int NOT NULL,
  `comment` varchar(345) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_contacts`
--

LOCK TABLES `service_contacts` WRITE;
/*!40000 ALTER TABLE `service_contacts` DISABLE KEYS */;
INSERT INTO `service_contacts` VALUES (4,'Santiago','absolutnft@gmail.com','3226486094',6,NULL,'2023-06-06 16:51:15','2023-06-06 16:51:15',NULL),(5,'Santiago','absolutnft@gmail.com','3226486094',7,NULL,'2023-06-06 16:54:37','2023-06-06 16:56:23',NULL),(6,'Santiago','absolutnft@gmail.com','2323r',7,'pollo','2023-06-06 16:57:16','2023-06-06 20:07:15',NULL),(7,'Santiago','sgallego1022@cue.edu.co','3226486094',6,'Holaaa','2023-08-01 11:51:54','2023-08-01 11:51:54',NULL),(8,'Test HOME','catalinarincong@gmail.com','300000000',9,'TEST MSJ HOME','2023-08-02 16:46:29','2023-08-02 16:46:29',NULL),(9,'Santiago Gallego Gil','santyago1027@gmail.com','3226486094',9,'Prueba Correos 1','2023-08-03 14:01:59','2023-08-03 14:01:59',NULL),(10,'Santiago Gallego Gil','absolutnft@gmail.com','3226486094',6,'TEst 2 Emails','2023-08-03 14:05:40','2023-08-03 14:05:40',NULL),(11,'Santiago Gallego Gil','absolutnft@gmail.com','3226486094',6,'asdasdasd','2023-08-03 14:07:05','2023-08-03 14:07:05',NULL),(12,'Santiago Gallego Gil','absolutnft@gmail.com','3226486094',6,'rhthtr','2023-08-03 14:08:52','2023-08-03 14:08:52',NULL),(13,'Test HOME','catalina@rhiss.net','300000000',7,'kjbxvknslkvnsvlka lknalkfnldkvslkndlknsknvdl kdsk vsmkslnkl nslk sflkn slknslk sdlkvn','2023-08-11 14:41:52','2023-08-11 14:41:52',NULL),(14,'Mauricio','7gracias@gmail.com','3162222200',7,'Te necesito!!!!','2023-08-28 11:04:53','2023-08-28 11:04:53',NULL),(15,'CATALINA RINCON G','catalina@rhiss.net','300000000',9,'ESTE MENSAJE ES DE PRUEBA FORMULARIO CONTACTENOS DESDE HOME. POR FAVOR CONFIRMAR LA RECEPCIÓN DE ESTE MAIL.','2023-08-31 09:31:54','2023-08-31 09:31:54',NULL),(16,'TEST Servicio','catalina@rhiss.net','300000002',7,'ESTE MENSAJE ES DE PRUEBA FORMULARIO DE CONTACTO DESDE SERVICIO. POR FAVOR CONFIRMAR LA RECEPCION DE ESTE MAIL','2023-08-31 09:33:27','2023-08-31 09:33:27',NULL),(17,'Santiago Gallego Gil','sgallego1022@cue.edu.co','3226486094',9,'Esto es una prueba de correos, por favor ignorar','2023-08-31 09:37:40','2023-08-31 09:37:40',NULL),(18,'Santiago Gallego Gil','sgallego1022@cue.edu.co','3226486094',9,'Esto es una prueba de correos, por favor ignorar','2023-08-31 09:38:35','2023-08-31 09:38:35',NULL),(19,'Santiago Gallego Gil','sgallego1022@cue.edu.co','3226486094',9,'Esto es una prueba de correos, por favor ignorar','2023-08-31 09:40:25','2023-08-31 09:40:25',NULL),(20,'Santiago Gallego Gil','sgallego1022@cue.edu.co','3226486094',9,'Esto es una prueba de correos, por favor ignorar','2023-08-31 09:45:07','2023-08-31 09:45:07',NULL),(21,'Santiago Gallego Gil','sgallego1022@cue.edu.co','3226486094',8,'Esto es una prueba de correos, por favor ignorar','2023-08-31 09:46:53','2023-08-31 09:46:53',NULL),(22,'Adriana','adri.ortiz.r@hotmail.com','3168715725',9,'Hola!','2023-09-05 04:08:04','2023-09-05 04:08:04',NULL),(23,'Santiago Gallego Gil','sgallego1022@cue.edu.co','3226486094',9,'21412412412412','2023-09-06 13:41:06','2023-09-06 13:41:06',NULL),(24,'Santiago Gallego Gil','sgallego1022@cue.edu.co','3226486094',6,'qg33qbh23h32g2q3v23f','2023-09-06 13:43:30','2023-09-06 13:43:30',NULL),(25,'Test HOME','catalina@rhiss.net','300000000',8,'Mail 2. Prueba form contáctenos desde HOME. Sept 6 2023','2023-09-06 13:52:47','2023-09-06 13:52:47',NULL),(26,'TEST Servicio','catalina@rhiss.net','300000000',6,'Mail 3. Prueba form contáctenos desde servicio. Sept 6 2023','2023-09-06 13:53:24','2023-09-06 13:53:24',NULL),(27,'Santiago Gallego Gil','sgallego1022@cue.edu.co','3226486094',8,'Decododododoododododo','2023-09-06 14:13:48','2023-09-06 14:13:48',NULL),(28,'Test HOME','catalina@rhiss.net','300000001',6,'Mail 1: prueba form contáctenos HOME. Sep 6','2023-09-06 14:21:02','2023-09-06 14:21:02',NULL),(29,'TEST Servicio','catalina@rhiss.net','300000002',6,'Mail 1: prueba form contáctenos servicios. Sep 6','2023-09-06 14:21:32','2023-09-06 14:21:32',NULL),(30,'Lorena','lrosasco64@hotmail.com','3105544812',7,'Hola! Estoy interesada en realizar terapia contigo, me gustaría saber los precios de las sesiones. Ya has tratado a unos familiares mios y me recomendaron tus servicios. Gracias!','2023-12-26 01:11:20','2023-12-26 01:11:20',NULL),(31,'MariatefOZ','innescandice@gmail.com','86913872667',8,'<a href=https://www.mistralbg.com/pochivki-italia>Почивки в Италия</a> в определени места на отлични цени и условия. \r\nИзбери ваканция в Сицилия, Пулия, Римини, Кампания, Тоскана, Сардиния, Лигурия. <b>Резервирайте вашата ваканция в Италия с Мистрал Травел!</b>','2024-01-29 08:44:40','2024-01-29 08:44:40',NULL);
/*!40000 ALTER TABLE `service_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `gallery_id` bigint unsigned DEFAULT NULL,
  `video_gallery_id` bigint unsigned DEFAULT NULL,
  `image` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_seo` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(245) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `featured` int NOT NULL DEFAULT '0',
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_category_id_foreign` (`category_id`),
  KEY `services_gallery_id_foreign` (`gallery_id`),
  KEY `services_video_gallery_id_foreign` (`video_gallery_id`),
  CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `services_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE SET NULL,
  CONSTRAINT `services_video_gallery_id_foreign` FOREIGN KEY (`video_gallery_id`) REFERENCES `video_galleries` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (6,5,NULL,NULL,'202308280344431.png',NULL,'test-slug',1,'2023-06-06 16:50:58','2023-08-28 15:44:44',NULL,0,1),(7,6,4,NULL,'202308280334346.png',NULL,'serviciote-54',0,'2023-06-06 16:54:58','2023-08-28 15:34:34',NULL,1,1),(8,NULL,NULL,NULL,'202308280345231.png',NULL,'1',4,'2023-08-02 16:27:23','2023-11-29 00:05:18',NULL,1,1),(9,NULL,NULL,NULL,'202308280345064.png',NULL,'1-1',3,'2023-08-02 16:33:13','2024-01-10 21:40:30','2024-01-10 21:40:30',0,1),(10,NULL,NULL,NULL,NULL,NULL,'1-2',4,'2023-09-22 20:41:57','2023-09-22 20:43:46','2023-09-22 20:43:46',0,1),(11,NULL,14,NULL,'202309270255431.png',NULL,'eneagrama',2,'2023-09-22 20:49:32','2023-11-29 00:05:18',NULL,1,1),(12,NULL,NULL,NULL,NULL,NULL,'-1',0,'2023-09-27 19:04:22','2023-09-27 19:05:05','2023-09-27 19:05:05',0,1),(13,NULL,NULL,NULL,NULL,NULL,'-2',0,'2024-01-10 21:42:37','2024-01-10 21:42:37',NULL,0,1);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide_images`
--

DROP TABLE IF EXISTS `slide_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slide_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slide_id` bigint unsigned NOT NULL,
  `filename` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slide_images_slide_id_foreign` (`slide_id`),
  CONSTRAINT `slide_images_slide_id_foreign` FOREIGN KEY (`slide_id`) REFERENCES `slides` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide_images`
--

LOCK TABLES `slide_images` WRITE;
/*!40000 ALTER TABLE `slide_images` DISABLE KEYS */;
INSERT INTO `slide_images` VALUES (17,1,'202308231225412.png',NULL,1,'2023-08-23 12:25:42','2023-08-23 13:12:52'),(20,1,'202401100353283.png',NULL,0,'2024-01-10 20:53:28','2024-01-10 20:53:28'),(24,1,'202401100410065.png',NULL,0,'2024-01-10 21:10:07','2024-01-10 21:10:07'),(27,1,'202401100412491.png',NULL,0,'2024-01-10 21:12:50','2024-01-10 21:12:50');
/*!40000 ALTER TABLE `slide_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (1,'main',NULL,NULL,NULL);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonies`
--

DROP TABLE IF EXISTS `testimonies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_service` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonies`
--

LOCK TABLES `testimonies` WRITE;
/*!40000 ALTER TABLE `testimonies` DISABLE KEYS */;
INSERT INTO `testimonies` VALUES (1,'Cliente 1','202306280945083.png','Nam mollis magna id turpis aliquet, et gravida sapien dignissim. Sed vitae ultrices risus.Nam mollis magna id turpis aliquet, et gravida sapien dignissim. Sed vitae ultrices risus.Nam mollis magna id',7,'2023-06-28 13:41:04','2023-08-29 11:05:58','2023-08-29 11:05:58'),(2,'Cliente 2','202306280945008.png','Nam mollis magna id turpis aliquet, et gravida sapien dignissim. Sed vitae ultrices risus. Fusce pharetra mi nec nunc laoreet, vitae finibus orci finibus. Nulla a orci non ex venenatis laoreet',7,'2023-06-28 13:43:11','2023-08-29 11:05:56','2023-08-29 11:05:56'),(3,'Cliente 3','202306280934475.png','Fusce pharetra mi nec nunc laoreet, vitae finibus orci finibus. Nulla a orci non ex venenatis laoreet Nam mollis magna id turpis aliquet, et gravida sapien dignissim. Sed vitae ultrices risus.',6,'2023-06-28 13:43:25','2023-08-29 11:05:54','2023-08-29 11:05:54'),(4,'Juan Pérez','202307110354262.png','Contar con el apoyo de Adriana ha sido maravilloso para mi proceso. Su profesionalismo y experiencia hacen que se construya desde la confianza para abrir los sentimientos y emociones.',6,'2023-07-11 15:54:26','2023-08-29 11:05:51','2023-08-29 11:05:51'),(5,'María Camila',NULL,'Gracias a la terapia logré descubrir el motivo de mi enfermedad.  La manera como se abordan los síntomas en terapia es maravillosa. Totalmente recomendado, gracias por la Atencion y la escucha.',8,'2023-08-29 11:12:33','2023-08-29 11:12:33',NULL),(6,'Victoria Restrepo',NULL,'Adri estoy inmensamente agradecida contigo de la mujer versión mejorada que soy hoy, es en parte gracias a ti por tu apoyo, escucha y guía. Un abrazo!',8,'2023-10-30 02:11:15','2023-10-30 02:29:54',NULL);
/*!40000 ALTER TABLE `testimonies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','admin@rhiss.net',NULL,'$2y$10$bq7r/UNP5EbBTBVenbVwh.AmTCj9wf11quxSEiJshpehs72/wgFPq','QuamPQ6prvcXEAfbZAUdfcpg7pXvOn1p3w7G0E6bT3jy1jr8cmHF6gS7klkS',NULL,NULL),(2,'Soporte','soporte@rhiss.net',NULL,'$2y$10$/cZxjQ1IR6ehZMzNi6i7s.C5ioiyRi.Jn6l0TUw9OJi/yxRvxDpn.','2Khla7fOO3Agt8ZycGSlec27LUB0ZHr372w0ebhfkULcnyfZiKn9jJyxotAh',NULL,NULL),(3,'nabnxnx','mhuh@gmail.com',NULL,NULL,NULL,'2024-02-19 22:43:43','2024-02-19 23:04:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_galleries`
--

DROP TABLE IF EXISTS `video_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `video_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_galleries`
--

LOCK TABLES `video_galleries` WRITE;
/*!40000 ALTER TABLE `video_galleries` DISABLE KEYS */;
INSERT INTO `video_galleries` VALUES (1,'Video Gallery','2023-06-28 16:06:07','2023-06-28 16:06:07',NULL),(2,'Video Gallery','2023-06-28 16:09:36','2023-06-28 16:09:36',NULL),(3,'Video Gallery','2023-06-28 16:13:43','2023-06-28 16:13:43',NULL),(4,'Video Gallery','2023-06-28 16:18:53','2023-06-28 16:18:53',NULL),(5,'Video Gallery','2023-06-28 16:19:43','2023-06-28 16:19:43',NULL),(6,'Video Gallery','2023-06-28 16:23:26','2023-06-28 16:23:26',NULL),(7,'Video Gallery','2023-06-28 16:23:35','2023-06-28 16:23:35',NULL),(8,'Video Gallery','2023-06-28 16:34:31','2023-06-28 16:34:31',NULL),(9,'Video Gallery','2023-06-28 16:35:38','2023-06-28 16:35:38',NULL),(10,'Video Gallery','2023-07-11 15:18:54','2023-07-11 15:18:54',NULL);
/*!40000 ALTER TABLE `video_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint unsigned NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `videos_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `video_galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,1,'http://img.youtube.com/vi/fCx_sg_7naQ/0.jpg','fCx_sg_7naQ','https://www.youtube.com/watch?v=fCx_sg_7naQ','youtube',0,'2023-06-28 16:06:08','2023-06-28 16:06:08'),(2,1,'http://img.youtube.com/vi/CEuQR5hoBJs/0.jpg','CEuQR5hoBJs','https://www.youtube.com/watch?v=CEuQR5hoBJs','youtube',0,'2023-06-28 16:07:47','2023-06-28 16:07:47'),(3,2,'http://img.youtube.com/vi/CEuQR5hoBJs/0.jpg','CEuQR5hoBJs','https://www.youtube.com/watch?v=CEuQR5hoBJs','youtube',0,'2023-06-28 16:09:36','2023-06-28 16:09:36'),(4,3,'http://img.youtube.com/vi/CEuQR5hoBJs/0.jpg','CEuQR5hoBJs','https://www.youtube.com/watch?v=CEuQR5hoBJs','youtube',0,'2023-06-28 16:13:43','2023-06-28 16:13:43'),(5,4,'http://img.youtube.com/vi/CEuQR5hoBJs/0.jpg','CEuQR5hoBJs','https://www.youtube.com/watch?v=CEuQR5hoBJs','youtube',0,'2023-06-28 16:18:53','2023-06-28 16:18:53'),(8,6,'http://img.youtube.com/vi/CEuQR5hoBJs/0.jpg','CEuQR5hoBJs','https://www.youtube.com/watch?v=CEuQR5hoBJs','youtube',0,'2023-06-28 16:23:26','2023-06-28 16:23:26'),(9,7,'http://img.youtube.com/vi/CEuQR5hoBJs/0.jpg','CEuQR5hoBJs','https://www.youtube.com/watch?v=CEuQR5hoBJs','youtube',0,'2023-06-28 16:23:35','2023-06-28 16:23:35'),(14,8,'http://img.youtube.com/vi/xN8ENrfE-TY/0.jpg','xN8ENrfE-TY','https://www.youtube.com/watch?v=xN8ENrfE-TY','youtube',0,'2023-06-28 16:34:31','2023-06-28 16:34:31'),(15,9,'http://img.youtube.com/vi/xN8ENrfE-TY/0.jpg','xN8ENrfE-TY','https://www.youtube.com/watch?v=xN8ENrfE-TY','youtube',0,'2023-06-28 16:35:38','2023-06-28 16:35:38');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'adriana_ortiz'
--

--
-- Dumping routines for database 'adriana_ortiz'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-22 17:02:00
