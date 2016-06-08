-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2014 at 10:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(80) NOT NULL,
  `autor` varchar(40) NOT NULL,
  `corp` varchar(10) NOT NULL,
  `raft` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `titlu`, `autor`, `corp`, `raft`) VALUES
(1, 'Ion', 'Liviu Rebreanu', '2', 2),
(2, 'Moromoetii', 'Marin Preda', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'alex', 'vania', 'alex.paulescu@gmail,com'),
(2, 'Vania', 'furdi', 'vania_furdi@yahoo.com'),
(3, 'Anisoara', 'amarili', 'ani.paulescu@gmail.com'),
(4, 'doru', 'ani', 'doru@ani.com'),
(5, 'test', 'test', 'test@test.com'),
(6, 'ion', 'oin', 'ion@ionica.com'),
(7, 'paul', 'paul', 'paul@email.com'),
(8, 'aa', 'aa', 'aa'),
(9, 'bb', 'bb', 'bb');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
