-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 30 2013 г., 18:22
-- Версия сервера: 5.5.20
-- Версия PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `text`) VALUES
(7, 'Ñ„Ñ‹Ð²Ñ„Ñ‹Ð°'),
(8, 'asf'),
(9, 'sag'),
(10, 'sagsa'),
(11, 'ssss'),
(12, 'ssss'),
(13, 'fgsd'),
(14, '45'),
(15, ''),
(16, ''),
(17, '55'),
(18, '55'),
(19, 'sfa'),
(20, 'asf'),
(21, 'sf'),
(22, 'ûôà'),
(23, 'ôàû'),
(24, 'afs'),
(25, 'sss'),
(40, ''),
(41, 'saf'),
(42, 'ssssssss'),
(43, ''),
(44, 'sssssaaaa'),
(45, 'j'),
(46, 'asf');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_who` int(11) NOT NULL,
  `id_whom` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `id_who`, `id_whom`, `text`, `date`) VALUES
(1, 96, 90, 'asgag', '2010-01-01'),
(2, 96, 90, 'asgasg', '2010-01-01'),
(3, 96, 90, 'gsagsag', '2010-01-01'),
(4, 96, 96, 'sss', '2010-01-01'),
(5, 90, 90, 'sfasf', '2010-01-01'),
(6, 90, 90, 'sdgsdg', '2010-01-01'),
(7, 90, 96, 'sfsfsf', '2010-01-01'),
(8, 90, 96, 'qwrwqr12', '2010-01-01');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `family` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `role` enum('default','admin','owner') NOT NULL DEFAULT 'default',
  `message` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `family`, `avatar`, `role`, `message`) VALUES
(90, 'Asfodel', '81dc9bdb52d04dc20036dbd8313ed055', 'Ð”Ð°Ð¼Ð¸Ñ€', 'ÐšÑƒÑÐ¾Ðº', '1603246351.jpg', 'default', 'sasf||sagasg||cscsc||fassag||12||FFFFF||QWERT||Dimidrol||safsaf||'),
(95, 'Corvus', '4c232163aae0cd0526720af3398142a6', 'ÐœÐ°ÐºÑÐ¸Ð¼Ð¸Ð»ÑŒÑÐ½', 'Ð’ÐµÐ»Ð¸ÐºÐ¸Ð¹', '1778193706.png', 'default', '0||sfsf||asdsaf||Ð¡ÑƒÑ‡ÐºÐ°||'),
(96, 'flik', '974a977ed8c481816eab7f4fdf6cfc2d', 'Ð’Ð»Ð°Ð´Ð¸Ð¼Ð¸Ñ€', 'Ð¡ÐµÑ€Ð³ÐµÐµÐ²', '1631993201.jpg', 'owner', 'sgaa||Ð¡Ð¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ Ð½Ð¾Ð¼ÐµÑ€||Ð´Ð²Ð°||Ñ„Ñ‹Ð¿Ñ‹Ñ„Ð¿||asgsag||Ð­Ñ‘ Ð¼ÐµÐ½||'),
(97, 'qqqq', '3bad6af0fa4b8b330d162e19938ee981', 'qqq', 'q', 'default.jpg', 'default', '0||Ñ‹Ñ‹Ñ‹Ñ‹||Ð°Ñ„Ñ‹Ð¿Ð°Ñ‹Ñ„Ð¿||');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
