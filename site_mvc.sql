-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 22 2021 г., 10:26
-- Версия сервера: 10.1.35-MariaDB
-- Версия PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site_mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `content`, `author_name`) VALUES
(1, 'Заголовок новость 1', '2021-08-31 21:00:00', 'Вулкан начал извергаться после того, как на острове почти неделю наблюдалась сейсмическая активность. Идет эвакуация', 'Иванов'),
(2, 'Шахтер - Динамо', '2021-09-07 21:00:00', 'Сегодня, 22 сентября,  состоится текстовая онлайн-трансляция Суперкубка Украины между донецким Шахтером и киевским Динамо.', 'Тяпкин'),
(3, 'Ученые нашли объяснение \"бесплодности\" Марса', '2021-09-07 21:00:00', 'В далеком прошлом на поверхности Марса были озера, реки, и, возможно, даже огромный океан, который занимал большую часть его северного полушария.', 'Ляпкин'),
(4, 'В украинских школах появятся воспитатели безопасности', '2021-09-07 21:00:00', 'Новшество внедряется в рамках проекта \"Безопасное детство\", направленное \"на создание безопасной среды для детей, защиты их прав и законных интересов\".', 'Егоров'),
(5, 'Бритни Спирс вернулась в Instagram \"диким\" танцем', '2021-09-07 21:00:00', 'Исполнительница на несколько дней удалила аккаунт в соцсети, чем вызвала волнение среди поклонников.', 'Сидоров');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
