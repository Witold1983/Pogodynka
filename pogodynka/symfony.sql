-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2016 at 02:27 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `symfony`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

DROP TABLE IF EXISTS `app_users`;
CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `added_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C2502824F85E0677` (`username`),
  UNIQUE KEY `UNIQ_C2502824E7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `username`, `password`, `email`, `is_active`, `added_at`) VALUES
(1, 'Witold', '$2y$13$SFC.MuhO9o.ubp3yXmkKbOoAweCwcCcB/kwTfwKOjR0.ayUp3tFra', 'witold.byrtek@gmail.com', 1, '2016-12-01 18:31:05'),
(2, 'Maniek', '$2y$13$zUhXIWBi8u0wRtMt768QiOSVcwWFPgWL1udZYuJBxOVEAOmYcKi1C', 'witek_byrtek@interia.pl', 1, '2016-12-16 19:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_code` int(11) NOT NULL,
  `city_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coord_lon` decimal(10,6) NOT NULL,
  `coord_lat` decimal(10,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_code`, `city_name`, `coord_lon`, `coord_lat`) VALUES
(1, 3096472, 'Katowice', 19.027540, 50.258419),
(2, 0, 'Kraków', 19.932400, 50.060500),
(3, 0, 'Mikołów', 18.905800, 50.169300);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp` decimal(10,2) NOT NULL,
  `temp_min` decimal(10,2) NOT NULL,
  `temp_max` decimal(10,2) DEFAULT NULL,
  `pressure` decimal(10,2) DEFAULT NULL,
  `humidity` int(11) NOT NULL,
  `posted_at` datetime NOT NULL,
  `iconurl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `city_name`, `icon`, `temp`, `temp_min`, `temp_max`, `pressure`, `humidity`, `posted_at`, `iconurl`) VALUES
(30, 'Katowice', '01d', -2.00, -2.00, -2.00, 1026.00, 63, '2016-12-14 20:57:03', 'http://openweathermap.org/img/w/%s.png'),
(45, 'Katowice', '10d', 0.54, 0.00, 1.00, 1030.00, 98, '2016-12-15 13:57:36', 'http://openweathermap.org/img/w/%s.png'),
(53, 'Katowice', '50n', -1.45, -2.00, -1.00, 1034.00, 92, '2016-12-16 17:16:08', 'http://openweathermap.org/img/w/%s.png'),
(59, 'Katowice', 'http://l.yimg.com/a/i/us/we/52/14.gif', 0.00, 0.00, 0.00, NULL, 0, '2016-12-18 15:31:26', 'http://weather.yahoo.com'),
(60, 'Katowice', '50d', -3.30, -5.00, -2.00, 1031.00, 92, '2016-12-20 10:20:51', 'http://openweathermap.org/img/w/%s.png'),
(61, 'Mikołów', '50d', -0.41, -2.00, 1.00, 1030.00, 92, '2016-12-20 12:41:48', 'http://openweathermap.org/img/w/%s.png'),
(62, 'Kraków', '50d', -1.00, -1.00, -1.00, 1032.00, 100, '2016-12-20 12:43:30', 'http://openweathermap.org/img/w/%s.png');

-- --------------------------------------------------------

--
-- Table structure for table `uslugi`
--

DROP TABLE IF EXISTS `uslugi`;
CREATE TABLE IF NOT EXISTS `uslugi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `mapping` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iconurl` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validate` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_694761529060CAEA` (`service_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uslugi`
--

INSERT INTO `uslugi` (`id`, `service_name`, `url`, `post`, `is_active`, `mapping`, `iconurl`, `validate`) VALUES
(1, 'openweathermap.org', 'http://api.openweathermap.org/data/2.5/find?q=%s&lang=pl&units=metric&mode=json&APPID=4a9afcc281cc3c2f51e50761a0a83e48', '', 1, 'icon=$data->{''list''}[0]->{''weather''}[0]->{''icon''}\nlongitude=$data->{''list''}[0]->{''coord''}->{''lon''}\nlatitude=$data->{''list''}[0]->{''coord''}->{''lat''}\ntemp=$data->{''list''}[0]->{''main''}->{''temp''}\ntemp_min=$data->{''list''}[0]->{''main''}->{''temp_min''}\ntemp_max=$data->{''list''}[0]->{''main''}->{''temp_max''}\npressure=$data->{''list''}[0]->{''main''}->{''pressure''}\nhumidity=$data->{''list''}[0]->{''main''}->{''humidity''}', 'http://openweathermap.org/img/w/%s.png', 'is_object($data->{''list''}[0])'),
(2, 'Yahoo', 'http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+weather.forecast+where+woeid+in+%28select+woeid+from+geo.places%281%29+where+text%3D%22Katowice%22%29+and+u%3D%22c%22&format=json', '', 0, 'icon=substr($link=$data->{''query''}->{''results''}->{''channel''}->{''item''}->{''description''},$pos=strpos($link,''http://''),strpos($link,''.gif'',$pos)+4-$pos)\ntemp=$data->{''query''}->{''results''}->{''channel''}->{''item''}->{''condition''}->{''temp''}\nlongitude=$data->{''query''}->{''results''}->{''channel''}->{''item''}->{''long''}\nlatitude=$data->{''query''}->{''results''}->{''channel''}->{''item''}->{''lat''}', 'http://weather.yahoo.com', 'isset($data->{''query''}->{''results''}->{''channel''}->{''item''}->{''description''})');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
