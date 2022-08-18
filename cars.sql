-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cars
CREATE DATABASE IF NOT EXISTS `cars` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cars`;

-- Dumping structure for table cars.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` bigint(20) NOT NULL DEFAULT '1000',
  `description` varchar(500) DEFAULT NULL,
  `year_manufactured` bigint(20) NOT NULL DEFAULT '1955',
  `color_id` bigint(20) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`),
  KEY `color_id` (`color_id`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

-- Dumping data for table cars.cars: ~4 rows (approximately)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` (`id`, `name`, `price`, `description`, `year_manufactured`, `color_id`, `image`) VALUES
	(58, 'Jaguar E-Type', 60000, 'Jaguar E-type, well preserved', 1967, 10, 'vintage-car-1660612413_jag.jpg'),
	(59, 'Chevrolet Corvette', 75000, 'One of the most classic cars out there', 1959, 12, 'vintage-car-1660612521_chevy.jpg'),
	(60, 'Lamborghini Miura', 175000, 'One of the most beautiful lambo\'s out there', 1970, 1, 'vintage-car-1660612608_lambo.jpg'),
	(61, 'Mercedes SL 300 Gullwing', 260000, 'A classic, black Mercedes Gullwing', 1955, 10, 'vintage-car-1660612714_mecka.jpg');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Dumping structure for table cars.colors
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table cars.colors: ~8 rows (approximately)
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` (`id`, `color_name`) VALUES
	(1, 'red'),
	(2, 'blue'),
	(8, 'yellow'),
	(10, 'black'),
	(12, 'silver'),
	(14, 'gold'),
	(16, 'white'),
	(18, 'orange');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;

-- Dumping structure for table cars.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL DEFAULT 'N-N',
  `password` varchar(45) NOT NULL DEFAULT 'N-N',
  `email` varchar(45) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table cars.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`) VALUES
	(18, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'admin'),
	(22, 'veljko', '21232f297a57a5a743894a0e4a801fc3', 'veljko@gmail.com', 'Veljko Kovinic');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
