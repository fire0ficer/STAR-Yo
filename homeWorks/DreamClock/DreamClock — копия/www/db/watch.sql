-- phpMyAdmin SQL Dump
-- version 4.1.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 30 2013 г., 05:00
-- Версия сервера: 5.1.39-community
-- Версия PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `watch`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catigoreis`
--

CREATE TABLE IF NOT EXISTS `catigoreis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `catigoreis`
--

INSERT INTO `catigoreis` (`id`, `name`) VALUES
(1, 'Настенные часы'),
(2, 'Напольные часы'),
(3, 'Наручные часы');

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id_zakaza` int(11) NOT NULL AUTO_INCREMENT,
  `id_tovara` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vremja` datetime NOT NULL,
  PRIMARY KEY (`id_zakaza`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id_zakaza`, `id_tovara`, `email`, `vremja`) VALUES
(1, 1, 'vasya@mail', '2013-12-29 11:26:23'),
(2, 1, 'vasya@mail', '2013-12-29 11:26:23'),
(3, 3, 'vasya@mail', '2013-12-29 11:26:23'),
(4, 1, 'vasya@mail', '2013-12-29 11:28:44'),
(5, 1, 'vasya@mail', '2013-12-29 11:28:44'),
(6, 3, 'vasya@mail', '2013-12-29 11:28:44'),
(7, 1, 'vasya@mail', '2013-12-29 11:30:20'),
(8, 1, 'vasya@mail', '2013-12-29 11:30:20'),
(9, 3, 'vasya@mail', '2013-12-29 11:30:20'),
(10, 1, 'vasya@mail', '2013-12-29 13:53:28'),
(11, 1, 'vasya@mail', '2013-12-29 13:53:28'),
(12, 1, 'admin@admin', '2013-12-29 18:00:06'),
(13, 6, 'test@test', '2013-12-29 23:09:10'),
(14, 1, 'test@test', '2013-12-29 23:09:10');

-- --------------------------------------------------------

--
-- Структура таблицы `korzina`
--

CREATE TABLE IF NOT EXISTS `korzina` (
  `id_zap` int(11) NOT NULL AUTO_INCREMENT,
  `id_tovara` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_zap`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `korzina`
--

INSERT INTO `korzina` (`id_zap`, `id_tovara`, `email`) VALUES
(10, 1, 'test@test'),
(11, 1, 'vasya@mail');

-- --------------------------------------------------------

--
-- Структура таблицы `proizvod`
--

CREATE TABLE IF NOT EXISTS `proizvod` (
  `id_prov` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `proizvod`
--

INSERT INTO `proizvod` (`id_prov`, `name`) VALUES
(1, 'Швейцарские часы'),
(2, 'Японские часы'),
(3, 'Европейские часы');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE IF NOT EXISTS `tovar` (
  `id_tov` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `model` varchar(50) COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `type` varchar(50) COLLATE utf8_bin NOT NULL,
  `korpus` varchar(50) COLLATE utf8_bin NOT NULL,
  `glass` varchar(50) COLLATE utf8_bin NOT NULL,
  `rozmer` varchar(50) COLLATE utf8_bin NOT NULL,
  `color` varchar(50) COLLATE utf8_bin NOT NULL,
  `proizv` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_tov`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id_tov`, `name`, `model`, `price`, `type`, `korpus`, `glass`, `rozmer`, `color`, `proizv`, `cat`, `img`) VALUES
(1, 'Guess', 'W0232L3', 1313, 'Кварцевые', 'Металический', 'Органическое', '39х39х15', 'Черный', 1, 3, '/Dreamclock/img/r1.jpg'),
(2, 'Guess', 'Super777', 2700, 'Механиеские', 'Металический', 'Минеральное', '39х39х15', 'Черный', 2, 3, '/Dreamclock/img/r2.jpg'),
(3, 'Fossil', 'CH2884', 1900, 'Кварцевые', 'Металический', 'Органическое', '39х39х15', 'Золотистый', 3, 3, '/Dreamclock/img/r3.jpg'),
(5, 'Bulova', 'C3732', 15325, 'Кварцевые', 'Деревянный', 'Минеральное', '500х500х30', 'Коричневый', 2, 1, '/Dreamclock/img/s1.jpg'),
(6, 'HERMLE', '30904-002100', 14, 'Кварцевые', 'Пластвасса', 'Минеральное', '550х650х70', 'Коричневый', 1, 1, '/Dreamclock/img/s2.jpg'),
(7, 'BULOVA', 'C3732', 9874, 'Кварцевые', 'Деревянный', 'Органическое', '450х450х20', 'Черный', 3, 1, '/Dreamclock/img/s3.jpg'),
(8, 'HERMLE', '01232-030271', 30549, 'Механические', 'Деревянный', 'Органическое', '1200х500х300', 'Коричневый', 1, 2, '/Dreamclock/img/p1.jpg'),
(9, 'POWER', '1503J1-2', 35549, 'Механические', 'Деревянный', 'Минеральное', '1200х500х300', 'Черный', 2, 2, '/Dreamclock/img/p2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `fam` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `otch` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `addres` varchar(100) DEFAULT NULL,
  `privilege` int(11) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`fam`, `name`, `otch`, `email`, `password`, `addres`, `privilege`, `tel`) VALUES
('Admin', 'Admin', 'Admin', 'admin@admin', 'admin', 'Admin street', 2, '77777777'),
('Месть', 'сладка,', NULL, 'god@mode', 'qazwsxedcrfvtgb', NULL, 1, NULL),
('test', '11', 'test', 'test@test', 'test', 'test', 3, '7777'),
('Пупкин', 'Вася', 'Николаевич', 'Vasya@mail', '1', 'Vasya streeet', 3, '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
