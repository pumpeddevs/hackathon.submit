# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.20)
# Database: instructme
# Generation Time: 2014-12-08 03:15:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table im_scenes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `im_scenes`;

CREATE TABLE `im_scenes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `stage` int(11) DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8_unicode_ci,
  `problem` text COLLATE utf8_unicode_ci,
  `answer` text COLLATE utf8_unicode_ci,
  `assets` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `im_scenes` WRITE;
/*!40000 ALTER TABLE `im_scenes` DISABLE KEYS */;

INSERT INTO `im_scenes` (`id`, `stage`, `subject`, `intro`, `problem`, `answer`, `assets`)
VALUES
	(1,1,'Variables and Data Types','<p>Variables are containers used for storing data values.\nA variable can store different data types like\nnumbers, strings, boolean and more. For now we will focus on these three.</p>\n<p>A number can be a decimal or whole number\nA string or text is a series of characters.\nBooleans can only have two values which are true or false.</p>\n\n<strong>Variables can be declared like these:</strong>\n\n<pre class=\"prettyprint\">\nvar number   = 22;\nvar someText = \"A text\";\nvar isNew    = true;\n</pre>\n\nVariables are widely used in every programming language\nso it\\\'s important to know when and how to use them.\n\n<strong>Exercise:</strong>\n\n<p>Your mother asked you to buy a red apple to a store near\nfrom your house, she gave you a budget of 4 bucks. Now\nstore the values to its appropriate variable.</p>','var apple; // should be string\nvar isStoreNear;\nvar budget;',NULL,NULL);

/*!40000 ALTER TABLE `im_scenes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
