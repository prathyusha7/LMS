CREATE DATABASE  IF NOT EXISTS `test` ;
USE `test`;


DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL DEFAULT '0',
  `password` varchar(30) DEFAULT NULL,
  `aname` varchar(30) CHARACTER SET gbk DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
;






DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `bid` int(11) NOT NULL DEFAULT '0',
  `btype` varchar(20) CHARACTER SET gbk DEFAULT NULL,
  `bname` varchar(30) CHARACTER SET gbk DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `author` varchar(30) CHARACTER SET gbk DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `cards`;

CREATE TABLE `cards` (
  `cid` int(11) NOT NULL DEFAULT '0',
  `cname` varchar(30) CHARACTER SET gbk DEFAULT NULL,
  `cpass` varchar(20) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


LOCK TABLES `cards` WRITE;

INSERT INTO `cards` VALUES (1,'pinky','pinky'),(2,'mouni','mouni'),(3,'minnu','minnu');

UNLOCK TABLES;



DROP TABLE IF EXISTS `record`;

CREATE TABLE `record` (
  `bid` int(11) ,
  `cid` int(11) ,
    PRIMARY KEY (`cid`,`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


