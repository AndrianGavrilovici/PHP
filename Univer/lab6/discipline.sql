-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 28 2019 г., 13:00
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
-- Структура таблицы `discipline`
--

CREATE TABLE `discipline` (
  `DisciplineID` int(11) NOT NULL,
  `Disciplina` text NOT NULL,
  `Testare1` int(11) NOT NULL,
  `Testare2` int(11) NOT NULL,
  `Examen` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `discipline`
--

INSERT INTO `discipline` (`DisciplineID`, `Disciplina`, `Testare1`, `Testare2`, `Examen`, `StudentID`) VALUES
(1, 'Sisteme electronice de calcul', 9, 10, 10, 1),
(2, 'Programare JAVA', 10, 10, 10, 1),
(3, 'PACS', 10, 10, 10, 1),
(4, 'Baze de date', 9, 10, 10, 1),
(5, 'Bazele comunicarii', 9, 9, 9, 1),
(6, 'Sisteme electronice de calcul', 9, 10, 10, 2),
(7, 'Programare JAVA', 8, 8, 9, 2),
(8, 'PACS', 10, 10, 10, 2),
(9, 'Baze de date', 7, 9, 8, 2),
(10, 'Bazele comunicarii', 9, 8, 8, 2),
(11, 'Sisteme electronice de calcul\r\n', 6, 7, 6, 3),
(12, 'Programare JAVA', 7, 7, 6, 3),
(13, 'PACS', 7, 8, 7, 3),
(14, 'Baze de date', 6, 5, 7, 3),
(15, 'Bazele comunicarii', 8, 9, 9, 3),
(16, 'Sisteme electronice de calcul\r\n', 7, 7, 8, 4),
(17, 'Programare JAVA', 7, 7, 6, 4),
(18, 'PACS', 8, 8, 9, 4),
(19, 'Baze de date', 6, 7, 7, 4),
(20, 'Bazele comunicarii', 8, 9, 9, 4),
(21, 'Sisteme electronice de calcul\r\n', 10, 10, 10, 5),
(22, 'Programare JAVA', 9, 10, 8, 5),
(23, 'PACS', 10, 8, 9, 5),
(24, 'Baze de date', 8, 9, 9, 5),
(25, 'Bazele comunicarii', 10, 10, 10, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`DisciplineID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `discipline`
--
ALTER TABLE `discipline`
  MODIFY `DisciplineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
