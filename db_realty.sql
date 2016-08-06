-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 30 2016 г., 13:08
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_realty`
--

-- --------------------------------------------------------

--
-- Структура таблицы `realty`
--

CREATE TABLE IF NOT EXISTS `realty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `title` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1023) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Дамп данных таблицы `realty`
--

INSERT INTO `realty` (`id`, `type_id`, `title`, `address`, `price`) VALUES
(34, 3, '3-комнаты', 'Средний пр. 45', 7500000),
(50, 2, '2-этажный дом', 'Село Крайнее Новая ул 20', 3000000),
(51, 3, 'Комната в коммунальной квартире', 'Средняя 60', 700000),
(58, 1, '3-комнатная квартира', 'Столичная ул 9', 7000000),
(62, 2, 'с домом впридачу', 'Село Васюки 4', 50),
(63, 6, 'Суперсарай', 'Супердеревня', 300000),
(64, 3, 'комната', 'старая улица', 1000000),
(66, 3, 'в коммунальной квартире', 'старая ул 5', 3000000);

-- --------------------------------------------------------

--
-- Структура таблицы `realty_type`
--

CREATE TABLE IF NOT EXISTS `realty_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_id_3` (`id`),
  KEY `type_id` (`id`),
  KEY `type_id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `realty_type`
--

INSERT INTO `realty_type` (`id`, `title`) VALUES
(1, 'Квартира'),
(2, 'Загородный дом'),
(3, 'Комната'),
(6, 'Суперсарай');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` tinyint(3) unsigned NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `salt`) VALUES
(14, 10, '123', '155b6f99707f6aaf9ebe92f4c5d1b0ee', 'syepP6s2G69onZqHJLQF7Sxxni40Qvxj'),
(15, 1, '12345', '1bf630649b8c397940cae190e6bc3e6d', 'myO0wKZyY49vWoeq83IpMTA3BfisOYNc'),
(19, 10, '1', 'a351503e908df6876087b14959f0b57c', 'Y8zYnut4ZkXPVSRdMPyGDqQd5n7gfUaP');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `realty`
--
ALTER TABLE `realty`
  ADD CONSTRAINT `realty_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `realty_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
