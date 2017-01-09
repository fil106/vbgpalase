-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 09 2017 г., 20:49
-- Версия сервера: 5.7.13
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vbgpalas`
--

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL COMMENT 'Название фильма',
  `genre` text NOT NULL COMMENT 'Жанр',
  `duration` int(11) NOT NULL COMMENT 'Продолжительность фильма',
  `raiting` int(11) NOT NULL COMMENT 'Рэйтинг фильма 0-5',
  `description` longtext NOT NULL COMMENT 'Описание фильма',
  `trailer` mediumtext COMMENT 'Ссылка на трейлер фильма, если есть',
  `age` int(11) NOT NULL COMMENT 'Возрастные ограничения',
  `picture` text NOT NULL COMMENT 'Постер'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`id`, `title`, `genre`, `duration`, `raiting`, `description`, `trailer`, `age`, `picture`) VALUES
(1, 'Дэдпул', 'фантастика', 108, 4, 'Уэйд Уилсон — наёмник. Будучи побочным продуктом программы вооружённых сил под названием «Оружие X», Уилсон приобрёл невероятную силу, проворство и способность к исцелению. Но страшной ценой: его клеточная структура постоянно меняется, а здравомыслие сомнительно. Всё, чего Уилсон хочет, — это держаться на плаву в социальной выгребной яме. Но течение в ней слишком быстрое.', 'https://www.youtube.com/embed/6dr-eeegw4g', 18, 'https://www.kinopoisk.ru/images/film_big/462360.jpg'),
(2, 'Кредо Убийцы', 'фантастика, боевик', 115, 4, 'Благодаря революционным технологиям, позволяющим вызвать в памяти воспоминания прежних поколений, Каллум Линч проживает приключения своего предка Агилара в Испании 15-го века. Каллум узнает, что является потомком членов загадочного тайного общества ассасинов. Накопив невероятные знания и навыки, он вступает в противостояние с могущественной и жестокой организацией тамплиеров в наши дни.', 'https://www.kinopoisk.ru/gettrailer.php?from_src=html5&turl=690615/kinopoisk.ru-Assassin_s-Creed-307855.mp4', 16, 'https://www.kinopoisk.ru/images/film_big/690615.jpg'),
(3, 'Три икса', 'боевик, триллер', 110, 5, 'Ксандер Кейдж спустя годы возвращается из добровольного изгнания и попадает в безумный водоворот событий. Он собирает команду безбашенных экстремалов, вместе с которыми ему предстоит найти мощнейшее секретное оружие — «Ящик Пандоры». Действовать нужно быстро: за разработкой охотятся опасные головорезы. Ставки в смертельной игре повышаются, когда выясняется, что мировые правительства вовлечены в кровавый заговор, а на кону — судьба мира.', 'https://www.kinopoisk.ru/gettrailer.php?from_src=html5&turl=428709/kinopoisk.ru-xXx_-Return-of-Xander-Cage-321574.mp4', 16, 'http://www.kino.ru/photos/originals/52/72.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL COMMENT 'Связываем по id фильма',
  `vip` smallint(6) DEFAULT NULL COMMENT 'Цена на vip',
  `3d` smallint(6) DEFAULT NULL COMMENT 'Цена на 2d',
  `2d` smallint(6) DEFAULT NULL COMMENT 'Цена на 3d'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `idFilm`, `vip`, `3d`, `2d`) VALUES
(1, 1, 1150, 250, 200);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `idFilm`, `date`, `time`) VALUES
(29, 1, '2017-01-09', '05:00:00'),
(30, 2, '2017-01-10', '07:00:00'),
(31, 3, '2017-01-11', '12:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
