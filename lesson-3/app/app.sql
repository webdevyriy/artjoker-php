-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 23 2021 г., 08:55
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `app`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authorizations`
--

CREATE TABLE IF NOT EXISTS `authorizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Очистить таблицу перед добавлением данных `authorizations`
--

TRUNCATE TABLE `authorizations`;
--
-- Дамп данных таблицы `authorizations`
--

INSERT INTO `authorizations` (`id`, `data`, `user_id`) VALUES
(1, '2020-09-14 20:30:00', 1),
(2, '2021-09-12 20:30:00', 2),
(3, '2021-09-13 20:30:00', 3),
(4, '2021-09-11 20:30:00', 4),
(5, '2021-09-10 20:30:00', 5),
(6, '2021-09-09 20:30:00', 10),
(7, '2021-09-08 20:30:00', 9),
(8, '2021-09-13 20:30:00', 8),
(9, '2020-09-01 20:30:00', 7),
(10, '2021-09-12 20:30:00', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Очистить таблицу перед добавлением данных `cities`
--

TRUNCATE TABLE `cities`;
--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
(1, 'Kharkiv', 1),
(2, 'Lviv', 1),
(3, 'New-York', 2),
(4, 'Ottawa', 4),
(5, 'Berlin', 5),
(6, 'London', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Очистить таблицу перед добавлением данных `countries`
--

TRUNCATE TABLE `countries`;
--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Ukraine'),
(2, 'USA'),
(3, 'United Kingdom'),
(4, 'Canada'),
(5, 'Germany');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Очистить таблицу перед добавлением данных `roles`
--

TRUNCATE TABLE `roles`;
--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'editor'),
(3, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Очистить таблицу перед добавлением данных `roles_users`
--

TRUNCATE TABLE `roles_users`;
--
-- Дамп данных таблицы `roles_users`
--

INSERT INTO `roles_users` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 3, 3),
(6, 6, 3),
(7, 7, 2),
(8, 8, 1),
(9, 8, 2),
(10, 9, 3),
(11, 10, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iduser_UNIQUE` (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Очистить таблицу перед добавлением данных `users`
--

TRUNCATE TABLE `users`;
--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `city_id`) VALUES
(1, 'admin', '12345', 'admin@gmail.com', 1),
(2, 'iva', '54321', 'iva@gmail.com', 2),
(3, 'den', '11111', 'den@gmail.com', 3),
(4, 'piter', '11111', 'piter@gmail.com', 4),
(5, 'john', '11111', 'john@gmail.com', 5),
(6, 'mike', '11111', 'mike@gmail.com', 6),
(7, 'nilan', '11111', 'nilan@gmail.com', 5),
(8, 'ivan', '11111', 'ivan@gmail.com', 4),
(9, 'jzeka', '11111', 'jzeka@gmail.com', 3),
(10, 'kolya', '11111', 'kolya@gmail.com', 2),
(11, 'Vasa', '56561', 'vasa@gmail.com', 3);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
