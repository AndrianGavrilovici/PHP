-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 28 2019 г., 13:01
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php`
--

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Prenume` varchar(255) NOT NULL,
  `Data_Inmatricularii` year(4) NOT NULL,
  `Facultatea` varchar(255) NOT NULL,
  `Specialitatea` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`StudentID`, `Nume`, `Prenume`, `Data_Inmatricularii`, `Facultatea`, `Specialitatea`) VALUES
(1, 'Gavrilovici', 'Andrian', 2017, 'FMTI', 'Informatica'),
(2, 'Rugaliov', 'Dumitru', 2017, 'FMTI', 'Informatica'),
(3, 'Bascaneanu', 'Valeriu', 2017, 'FMTI', 'Informatica'),
(4, 'Caus', 'Vlad', 2017, 'FMTI', 'Informatica'),
(5, 'Pislaru', 'Alecandru', 2017, 'FMTI', 'Informatica-Matematica'),
(6, 'Vlas', 'Mihail', 2017, 'FMTI', 'Fizica-Informatica'),
(7, 'Cucos', 'Veceslav', 2017, 'FMTI', 'Fizica-Informatica');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
