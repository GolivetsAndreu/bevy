-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 19 2018 г., 13:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `bevy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dialogs`
--

CREATE TABLE IF NOT EXISTS `dialogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `dialogs`
--

INSERT INTO `dialogs` (`id`, `users`, `active`) VALUES
(12, '32|33|', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idFriend` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id`, `idUser`, `idFriend`) VALUES
(15, 33, 32);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_photo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `user_photo`) VALUES
(23, 32, '4591c9f977d9475373f378c0e5620752.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `massageFoto` varchar(255) DEFAULT NULL,
  `userFrom` int(11) NOT NULL,
  `idDialog` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userTo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `message`, `massageFoto`, `userFrom`, `idDialog`, `time`, `userTo`) VALUES
(55, 'Привет', NULL, 32, 12, '2018-11-19 07:53:49', 33),
(56, 'Привет', NULL, 33, 12, '2018-11-19 08:00:24', 32),
(57, 'круто', NULL, 33, 12, '2018-11-19 08:07:17', 32),
(58, 'Проврка', NULL, 33, 12, '2018-11-19 08:33:49', 32),
(59, 'ага', NULL, 32, 12, '2018-11-19 08:35:23', 33),
(60, 'ajax', NULL, 33, 12, '2018-11-19 08:39:40', 32),
(61, 'Проверка ajax', NULL, 32, 12, '2018-11-19 09:44:11', 33),
(62, 'Работает', NULL, 33, 12, '2018-11-19 09:46:19', 32),
(63, 'Я вижу', NULL, 32, 12, '2018-11-19 09:46:48', 33),
(64, 'про', NULL, 32, 12, '2018-11-19 09:58:22', 33),
(65, 'спив', NULL, 33, 12, '2018-11-19 09:58:22', 32),
(66, 'выпыв', NULL, 33, 12, '2018-11-19 09:58:53', 32),
(67, 'ыва', NULL, 32, 12, '2018-11-19 09:58:53', 33),
(68, 'пора', NULL, 33, 12, '2018-11-19 09:59:48', 32),
(69, 'пра', NULL, 32, 12, '2018-11-19 09:59:48', 33),
(70, 'аоларо', NULL, 32, 12, '2018-11-19 10:00:23', 33),
(71, 'ывпывп', NULL, 33, 12, '2018-11-19 10:00:23', 32),
(72, 'варыв', NULL, 33, 12, '2018-11-19 10:01:01', 32),
(73, 'вапва', NULL, 32, 12, '2018-11-19 10:01:01', 33),
(74, 'рр', NULL, 33, 12, '2018-11-19 10:01:27', 32),
(75, 'ррр', NULL, 32, 12, '2018-11-19 10:01:27', 33),
(92, 'Проверка', NULL, 33, 12, '2018-11-19 11:17:29', 32),
(93, 'Вроде работает', NULL, 33, 12, '2018-11-19 11:17:57', 32),
(94, 'Только долго', NULL, 33, 12, '2018-11-19 11:18:46', 32),
(95, 'Очень долго', NULL, 33, 12, '2018-11-19 11:20:19', 32),
(96, 'Подозреваю что виновен интернет', NULL, 33, 12, '2018-11-19 11:21:40', 32),
(97, 'Скорее всего', NULL, 32, 12, '2018-11-19 11:21:49', 33),
(98, 'Снова проверка', NULL, 33, 12, '2018-11-19 11:24:17', 32),
(99, 'Привет', NULL, 33, 12, '2018-11-19 11:27:41', 32),
(100, 'Проверка', NULL, 33, 12, '2018-11-19 11:30:53', 32),
(101, 'Привет', NULL, 33, 12, '2018-11-19 11:40:36', 32);

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `rout` text CHARACTER SET utf8 NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `author` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `surname` text,
  `email` text,
  `password` text,
  `profile_pic` varchar(255) DEFAULT NULL,
  `prev_profile_pic` varchar(255) DEFAULT NULL,
  `birth_day` text,
  `birth_month` text,
  `birth_year` text,
  `country` text,
  `city` text,
  `adress` text,
  `web_site` text,
  `phone` text,
  `public_phone` tinyint(1) NOT NULL DEFAULT '0',
  `public_email` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `user_folder` text,
  `remember_token` text,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `profile_pic`, `prev_profile_pic`, `birth_day`, `birth_month`, `birth_year`, `country`, `city`, `adress`, `web_site`, `phone`, `public_phone`, `public_email`, `email_verified`, `user_folder`, `remember_token`, `created_at`) VALUES
(32, 'Игорь', 'Завирюха', 'zaviryukha.igor99@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '0ea1865442e7fe1574b025e589548577.jpg', '', '', '', '', NULL, NULL, NULL, '', '', 0, 1, 0, 'user_d8a0d80675fc760b3c1c0b61a15a8757', NULL, '2018-11-19'),
(33, 'Андрей', 'Голивец', 'golivets18042001@ukr.net', '857891dca3b665c05f14d640ce1963d6', '3e516007ebed07f5b9c5c53b834fc176.jpg', '', '', '', '', NULL, NULL, NULL, '', '', 0, 0, 0, 'user_6fbd9530f400b852424eac77e52cca01', NULL, '2018-11-19');

-- --------------------------------------------------------

--
-- Структура таблицы `user_posts`
--

CREATE TABLE IF NOT EXISTS `user_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `post_text` text,
  `post_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=417 ;

--
-- Дамп данных таблицы `user_posts`
--

INSERT INTO `user_posts` (`id`, `user_id`, `post_text`, `post_date`) VALUES
(416, 32, 'hi', '19/11/2018 12:11 AM');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_video` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
