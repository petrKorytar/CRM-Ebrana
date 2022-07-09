-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 09. čec 2022, 15:06
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `users`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `my_users`
--

CREATE TABLE `my_users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(40) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `lastName` varchar(40) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `job` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `my_users`
--

INSERT INTO `my_users` (`id`, `firstName`, `lastName`, `job`) VALUES
(75, 'Petr', 'Korytář', 1),
(80, 'Petr', 'Korytář', 2),
(81, 'Václav', 'Malina', 6),
(82, 'Tonda', 'Malina', 3),
(83, 'Jarmil', 'Sušenka', 6),
(84, 'Eda', 'Novák', 7),
(85, 'Eda', 'Novák', 7),
(86, 'Pepa', 'Sušenka', 3),
(92, 'Klára', 'Malá', 2),
(93, 'Klára', 'Malá', 2),
(94, 'Klára', 'Malá', 2),
(95, 'Jarmil', 'Guláš', 4),
(96, 'Antonín', 'Smetana', 9),
(97, 'Antonín', 'Smetana', 9),
(98, 'Amádeus', 'Tron', 7),
(99, 'btrbrb', 'trtbr', 6),
(100, 'scac', 'cdcdcdc', 6),
(101, 'Jarmila', 'Nováková', 1),
(102, 'cscsc', 'csscscscsc', 1),
(103, 'etger', 'gergegergerg', 2),
(104, ' vdvfd', 'dfvdvdvfdv', 0),
(105, 'rzujtdhsgdfs', 'izouimzjthzbgrvfcd', 8),
(106, 'dcsc', 'cdscsdcd', 6),
(107, 'rtgr', 'trgrgrgt', 3),
(108, 'rtgr', 'trgrgrgt', 3),
(109, 'Dežo', 'Lakatoš', 9),
(110, 'nhgnn', 'ghnggngn', 1),
(111, 'Václav', 'Vosika', 4),
(112, 'Adolf', 'Novák', 5),
(113, 'cdcsd', 'cdsdcsdcsd', 1),
(114, 'dsfvdfv', 'dvfvdvdfvd', 2),
(115, 'dfvdfv', 'dfvdfvfvfd', 2),
(116, 'dfvdfv', 'dfvdfvfvfd', 2),
(120, 'Petr', 'Korytář', 1),
(121, 'Javol', 'Radegast', 3),
(122, 'fvdf', 'fdvfdvfvdfv', 0),
(123, 'gfb', 'fgbfbgfgb', 1),
(124, 'rgfb', 'gfb', 2),
(125, 'dfvd', 'fvdfvdfvdfv', 0),
(126, 'fgf', 'gfbfbbfg', 3),
(128, 'dvsvs', 'sdvsvvd', 2),
(129, 'dfv', 'dfvdvdfvdf', 2),
(130, 'refer', 'erfeferferf', 2),
(132, 'ddvf', 'svdfdfvdfv', 1),
(133, 'Alena', 'Pecháčková', 1),
(140, 'Tonda', 'Vomáčka', 2),
(141, 'Vlastimil', 'Fišer', 1),
(142, 'Tereza', 'Nevečeřalová', 1),
(143, 'Barbora', 'Včerejší', 8),
(144, 'Jarmil', 'Dobrovolný', 6),
(145, 'Petr', 'Korytář', 9),
(146, 'Jan', 'Žiškáč', 5),
(147, 'Václav', 'Vlaštovka', 5),
(148, 'Jarmil', 'Vomáčka', 6),
(149, 'Anna', 'Nová', 2),
(150, 'Jan', 'Janák', 8);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `my_users`
--
ALTER TABLE `my_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `my_users`
--
ALTER TABLE `my_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
