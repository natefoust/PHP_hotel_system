-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 20 2020 г., 04:03
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `adminship`
--

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `img` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`img`, `text`) VALUES
('2', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `ctext` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`id`, `title`, `ctext`, `img`) VALUES
(1, 'Марсианин', 'Марсианская миссия «Арес-3» в процессе работы была вынуждена...', 'mars.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
  `label` varchar(255) NOT NULL,
  `ttext` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carousel`
--

INSERT INTO `carousel` (`label`, `ttext`, `img`) VALUES
('JOKER', 'Джокер носит фиолетовый костюм и сражается при помощи предметов, которые стилизованы под реквизит клоуна и иллюзиониста.', 'c1.jpg'),
('Кирилл Мялик', 'Кирич', 'c1.jpg'),
('Побег из Шоушенка', 'Бухгалтер Энди Дюфрейн обвинён в убийстве собственной жены и её любовника. Оказавшись в тюрьме под названием Шоушенк, он сталкивается с жестокостью и беззаконием, царящими по обе стороны решётки', 'shoushenk.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `name`, `text`) VALUES
(1, 0, '', 'test'),
(2, 0, '', 'test'),
(3, 0, '', 'test'),
(4, 0, '', 'test'),
(5, 5, 'admin', 'sda'),
(6, 5, 'admin', 'sda'),
(7, 5, 'admin', 'sda'),
(8, 5, 'admin', 'sda'),
(9, 5, 'admin', 'sda'),
(10, 5, 'admin', 'sda'),
(11, 5, 'admin', 'sda'),
(12, 5, 'admin', 'sda'),
(13, 5, 'admin', 'sda'),
(14, 5, 'admin', 'sda'),
(15, 5, 'admin', 'sda'),
(16, 5, 'admin', 'sda'),
(17, 5, 'admin', 'sda'),
(18, 5, 'admin', 'sda'),
(19, 5, 'admin', 'sda'),
(20, 5, 'admin', 'sda'),
(21, 5, 'admin', 'Посмотрели семьей фильм Брат - супер, нынче такого не снмиают и никогда не будут!'),
(22, 5, 'admin', 'Посмотрели семьей фильм Брат - супер, нынче такого не снмиают и никогда не будут!');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `title` varchar(255) NOT NULL,
  `ctime` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `stop` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`title`, `ctime`, `cost`, `description`, `start`, `stop`, `img`) VALUES
('Сашкаc', 'ежедневно 18:30', '15', 'Бухгалтер Энди Дюфрейн обвинён в убийстве собственной жены и её любовника. Оказавшись в тюрьме под названием Шоушенк, он сталкивается с жестокостью и беззаконием, царящими по обе стороны решётки.', '23.10.2019', '21.11.2000', 'joker.jpg'),
('Сашкаdas', 'ежедневно 18:30', '15руб', 'Приключения сашки шляпика', '12.11.2000', '21.11.2000', 'joker.jpg'),
('фыв', 'ежедневно 18:30', '15руб', 'Приключения сашки шляпика', '12.11.2000', '21.11.2000', 'joker.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `permissions` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `login`, `password`, `permissions`) VALUES
(5, 'admin', 'admin', 'root', 'admin'),
(6, 'Eugene', 'natefoust', 'eugene555', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
