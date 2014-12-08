# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.20)
# Database: instructme
# Generation Time: 2014-12-08 04:32:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table im_level
# ------------------------------------------------------------

DROP TABLE IF EXISTS `im_level`;

CREATE TABLE `im_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table im_stages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `im_stages`;

CREATE TABLE `im_stages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `stage_no` int(11) DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8_unicode_ci,
  `problem` text COLLATE utf8_unicode_ci,
  `answer` text COLLATE utf8_unicode_ci,
  `assets` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `im_stages` WRITE;
/*!40000 ALTER TABLE `im_stages` DISABLE KEYS */;

INSERT INTO `im_stages` (`id`, `stage_no`, `subject`, `intro`, `problem`, `answer`, `assets`)
VALUES
	(1,1,'Variables and Data Types','<p>Variables are containers used for storing data values.\nA variable can store different data types like\nnumbers, strings, boolean and more. For now we will focus on these three.</p>\n<p>A number can be a decimal or whole number\nA string or text is a series of characters.\nBooleans can only have two values which are true or false.</p>\n\n<strong>Variables can be declared like these:</strong>\n\n<pre class=\"prettyprint\">\nvar number   = 22;\nvar someText = \"A text\";\nvar isNew    = true;\n</pre>\n\nVariables are widely used in every programming language\nso it\\\'s important to know when and how to use them.\n\n<strong>Exercise:</strong>\n\n<p>Your mother asked you to buy a red apple to a store near\nfrom your house, she gave you a budget of 4 bucks. Now\nstore the values to its appropriate variable.</p>','var apple; // should be string\nvar isStoreNear;\nvar budget;',NULL,NULL);

/*!40000 ALTER TABLE `im_stages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table im_score
# ------------------------------------------------------------

DROP TABLE IF EXISTS `im_score`;

CREATE TABLE `im_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `start_time` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempt` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table im_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `im_user`;

CREATE TABLE `im_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `im_user` WRITE;
/*!40000 ALTER TABLE `im_user` DISABLE KEYS */;

INSERT INTO `im_user` (`id`, `email`, `token`)
VALUES
	(1,'kenneth.apol@gmail.com','CAALn5FZCw4DEBALKxtcpWTsaKm8bnCH9LpkWbzC9Q7DLLj2iQaS0sVEVHyAAKpEtUUzs82cGm6F9drfwc14vb9A87WRwlxdo7BL2OmFSrDW1wjFpBfgN5hI1x60kjSWobVCjgxz7ztoZCg8Jcl9X0tAk196Kx5JZAK0n4FXPZCmdiILVR9mv9wHfYfEQjhXYMIzK15S23kgfVzPwyQ6M');

/*!40000 ALTER TABLE `im_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table im_user_meta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `im_user_meta`;

CREATE TABLE `im_user_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `meta_key` varchar(50) NOT NULL,
  `meta_value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `im_user_meta` WRITE;
/*!40000 ALTER TABLE `im_user_meta` DISABLE KEYS */;

INSERT INTO `im_user_meta` (`id`, `user_id`, `meta_key`, `meta_value`)
VALUES
	(1,1,'name','Kenneth Sungcaya'),
	(2,1,'photo','https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p100x100/10628138_10202092548154885_1159607508883373889_n.jpg?oh=7b549ef1503134ccbfc4d466969911de&oe=54FA0FAB&__gda__=1426135934_96f12047dc80284770b199b55e26010b');

/*!40000 ALTER TABLE `im_user_meta` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
