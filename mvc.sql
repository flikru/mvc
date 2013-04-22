-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 22 2013 г., 07:37
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

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
(26, 'qwe'),
(27, 'qwe'),
(28, 'qwe'),
(29, 'qwe'),
(30, 'qwe'),
(31, 'qwe');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('default','admin','owner') NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(36, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'owner'),
(46, 'asf', '7b064dad507c266a161ffc73c53dcdc5', 'default');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
