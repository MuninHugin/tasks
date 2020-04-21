-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2020 г., 14:07
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `osk_market`
--

-- --------------------------------------------------------

--
-- Структура таблицы `City`
--

CREATE TABLE `City` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `City`
--

INSERT INTO `City` (`id`, `name`) VALUES
(29, 'Архангельск'),
(33, 'Владимир'),
(47, 'Ленинград'),
(62, 'Рязань');

-- --------------------------------------------------------

--
-- Структура таблицы `Skills`
--

CREATE TABLE `Skills` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Skills`
--

INSERT INTO `Skills` (`id`, `name`) VALUES
(1, 'html'),
(2, 'css'),
(3, 'javascript'),
(4, 'php'),
(5, 'jQuery'),
(6, 'MySQL'),
(7, 'photoshop'),
(8, 'Krita');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `city_id` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `name`, `city_id`) VALUES
(1, 'Вася', 29),
(6, 'Ваня', 33),
(55, 'Dow', 62),
(59, 'John', 29),
(61, 'Dow', 47),
(64, 'Dow', 47),
(65, 'Dow', 62);

-- --------------------------------------------------------

--
-- Структура таблицы `user_skills`
--

CREATE TABLE `user_skills` (
  `id` smallint(6) NOT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `skill_id` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_skills`
--

INSERT INTO `user_skills` (`id`, `user_id`, `skill_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(533, 55, 2),
(534, 55, 3),
(535, 55, 4),
(536, 55, 6),
(546, 59, 4),
(552, 61, 1),
(553, 61, 2),
(554, 61, 3),
(555, 61, 4),
(556, 61, 5),
(557, 61, 6),
(558, 61, 8),
(571, 64, 2),
(572, 64, 3),
(573, 64, 4),
(574, 64, 5),
(575, 64, 6),
(576, 64, 7),
(577, 64, 8),
(578, 65, 2),
(579, 65, 3),
(580, 65, 5),
(581, 65, 6),
(582, 65, 7),
(583, 65, 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `City`
--
ALTER TABLE `City`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Skills`
--
ALTER TABLE `Skills`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Skills`
--
ALTER TABLE `Skills`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=584;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
