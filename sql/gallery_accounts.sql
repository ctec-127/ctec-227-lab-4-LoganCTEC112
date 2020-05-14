-- phpMyAdmin SQL Dump
-- Version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 @ 12:00 PM
-- Server Version: 10.4.11-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_accounts`
--
-- -----------------------------

-- Table Structure for table `user`

CREATE TABLE `user`
(
    `user_id` int
(11) NOT NULL,
    `email` varchar
(64) NOT NULL,
    `username` varchar
(40) NOT NULL,
    `first_name` varchar
(30) NOT NULL,
    `last_name` varchar
(30) NOT NULL,
    `password` varchar
(128) NOT NULL
)   ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping Data for table `user`

INSERT INTO `user`
    (`user_id`,`email`,`username`,`first_name`,`last_name`,`password`) VALUES
(1, 'l.duncan2@students.clark.edu', 'lduncan', 'Logan', 'Duncan', 'job1n@dmin'),
(2, 'test@example.com', 'testaccount1', 'Test', 'User', 'password');

-- Indexes for table `user`

ALTER TABLE `user`
ADD PRIMARY KEY
(`user_id`,`email`),
ADD UNIQUE KEY `email`
(`email`),
ADD UNIQUE KEY `username`
(`username`);

-- Auto Increment for table `user`

ALTER TABLE `user`
    MODIFY `user_id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;