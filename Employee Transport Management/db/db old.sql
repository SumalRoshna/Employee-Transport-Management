/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - employee_transport
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`employee_transport` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `employee_transport`;

/*Table structure for table `driver_points` */

DROP TABLE IF EXISTS `driver_points`;

CREATE TABLE `driver_points` (
  `dp_id` int(11) NOT NULL AUTO_INCREMENT,
  `driv_id` int(11) NOT NULL,
  `pp_id` int(11) NOT NULL,
  `rate` bigint(20) NOT NULL,
  PRIMARY KEY (`dp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `driver_points` */

insert  into `driver_points`(`dp_id`,`driv_id`,`pp_id`,`rate`) values 
(1,2,1,200),
(2,1,2,250),
(3,1,1,175),
(4,1,3,155),
(5,1,0,200),
(6,2,6,225),
(7,1,6,200);

/*Table structure for table `drivers` */

DROP TABLE IF EXISTS `drivers`;

CREATE TABLE `drivers` (
  `driv_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `adrs` varchar(50) DEFAULT NULL,
  `car` varchar(50) DEFAULT NULL,
  `reg_num` varchar(50) DEFAULT NULL,
  `lice_num` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`driv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `drivers` */

insert  into `drivers`(`driv_id`,`name`,`email`,`contact`,`adrs`,`car`,`reg_num`,`lice_num`) values 
(1,'Akhil','akhil@mail.com','9999999999','Akhil\r\nAdrs','Swift ZXI+','kL-00 AA-0007','786876786786876876'),
(2,'Abi','abi@mail.com','9898989898','Abi\r\nAdrs','POLO','kL-77 AA-7777','DOC-2-1002007');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `adrs` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `employees` */

insert  into `employees`(`emp_id`,`name`,`email`,`phone`,`adrs`) values 
(1,'VIS','vis@gmail.com','9090909090','vis\r\nAdrs'),
(2,'Aji','aji@mail.com','9090909090','Aji\r\nAdrs'),
(3,'AKK','akk@mail.com','8989898989','akk\r\nadrs');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `fbid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `feedack` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`fbid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `feedback` */

insert  into `feedback`(`fbid`,`eid`,`did`,`feedack`) values 
(4,2,1,'hjvh');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`log_id`,`user_id`,`user_name`,`password`,`user_type`,`status`) values 
(1,1,'akhil@mail.com','12345','driver','1'),
(2,1,'vis@gmail.com','12345','customer','1'),
(3,0,'admin@gmail.com','admin','admin','1'),
(4,2,'aji@mail.com','1234','customer','1'),
(5,2,'abi@mail.com','1234','driver','1'),
(6,3,'akk@mail.com','1234','customer','0');

/*Table structure for table `pickup_points` */

DROP TABLE IF EXISTS `pickup_points`;

CREATE TABLE `pickup_points` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppoints` varchar(50) NOT NULL,
  PRIMARY KEY (`pp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pickup_points` */

insert  into `pickup_points`(`pp_id`,`ppoints`) values 
(1,'Edappally'),
(2,'Kaloor'),
(3,'Pathadipalam'),
(6,'Palarivattom');

/*Table structure for table `vehicle_request` */

DROP TABLE IF EXISTS `vehicle_request`;

CREATE TABLE `vehicle_request` (
  `vr_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `pp_id` int(11) NOT NULL,
  `driv_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `details` varchar(100) NOT NULL,
  `dp_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`vr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `vehicle_request` */

insert  into `vehicle_request`(`vr_id`,`emp_id`,`pp_id`,`driv_id`,`time`,`start_date`,`details`,`dp_id`,`status`) values 
(1,1,2,1,'23:30','0000-00-00','nn',3,'Approved'),
(2,3,6,1,'19:17','0000-00-00','jk',3,'Requested'),
(3,3,2,1,'15:27','0000-00-00','jj',3,'Rejected'),
(4,2,1,1,'09:01','2022-02-22','ghvfcfg',3,'Approved');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
