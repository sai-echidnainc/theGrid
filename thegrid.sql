/*
SQLyog Community v8.4 
MySQL - 5.6.20 : Database - thegrid
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cards` */

DROP TABLE IF EXISTS `cards`;

CREATE TABLE `cards` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `grid_id` int(11) NOT NULL,
  `card_type` varchar(20) DEFAULT NULL,
  `card_size` varchar(20) DEFAULT NULL,
  `card_url` text,
  `card_name` varchar(255) NOT NULL,
  `card_description` text,
  `overlay_color` varchar(20) DEFAULT NULL,
  `text_color` varchar(20) DEFAULT NULL,
  `is_active` char(1) NOT NULL DEFAULT 'N',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `card_image` text,
  `card_slug` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`card_id`),
  KEY `cards_id_di` (`grid_id`),
  CONSTRAINT `cards_id_di` FOREIGN KEY (`grid_id`) REFERENCES `grids` (`grid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cards` */

insert  into `cards`(`card_id`,`grid_id`,`card_type`,`card_size`,`card_url`,`card_name`,`card_description`,`overlay_color`,`text_color`,`is_active`,`created_time`,`card_image`,`card_slug`) values (2,2,'image','big','sdfsdfsdfas','safasdfa','sdfasdfsadfsadfsdfa','#ffffff','#bbbbbb','N','2015-04-27 12:29:35',NULL,'card_slug'),(3,2,'text','hifhajkhsd','jkhgjkfkfdjgjklhsdj\r\n','dfgbsd','fdgsdfgsdfgsd','#hjgjsb','#hjbhjb','N','2015-04-27 12:33:22',NULL,'bnvgfd');

/*Table structure for table `grids` */

DROP TABLE IF EXISTS `grids`;

CREATE TABLE `grids` (
  `grid_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `grid_name` varchar(300) NOT NULL,
  `grid_arrangement` varchar(20) DEFAULT NULL,
  `grid_color` varchar(20) DEFAULT NULL,
  `grid_font` varchar(20) DEFAULT NULL,
  `grid_image` text,
  `is_published` char(1) NOT NULL DEFAULT 'N',
  `grid_creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `grid_slug` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`grid_id`),
  KEY `grids_id_di` (`user_id`),
  CONSTRAINT `grids_id_di` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `grids` */

insert  into `grids`(`grid_id`,`user_id`,`grid_name`,`grid_arrangement`,`grid_color`,`grid_font`,`grid_image`,`is_published`,`grid_creation_time`,`grid_slug`) values (2,1,'The Example Grid 2','seqential','$bababa','roboto',NULL,'N','2015-04-27 12:22:52','the-grid-2');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` char(50) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`password`,`user_name`,`first_name`,`last_name`,`create_time`,`email_id`) values (1,'sai','csaicharan','sai charan','ch','2015-04-24 15:50:34','csaicharan@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
