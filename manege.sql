-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 jun 2020 om 13:04
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manege`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `horses`
--

CREATE TABLE `horses` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `race` varchar(32) NOT NULL,
  `age` int(11) NOT NULL,
  `wither_height` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `horses`
--

INSERT INTO `horses` (`id`, `name`, `race`, `age`, `wither_height`, `type`, `image`) VALUES
(1, 'Bert', 'Cool', 13, 230, 'paard', 'haha_funny_horse.jpg'),
(2, 'Coole paard', 'Bruin', 200, 170, 'paard', NULL),
(3, 'Bruh', 'Bruin', 12, 200, 'paard', NULL),
(4, 'Bruh', 'Bruin', 12, 200, 'paard', NULL),
(5, 'Bruh', 'Bruin', 12, 200, 'paard', 'haha_funny_horse.jpg'),
(6, 'NAAM', 'Wit', 12, 2147483647, 'pony', '399.jpg'),
(7, 'Paard', 'Blauw', 235, 242, 'paard', 'haha_funny_horse.jpg'),
(8, 'Pony', 'X Æ A-Xii', 2147483647, 23523523, 'pony', '307.jpg'),
(9, '122123', '32424', 23242, 242424, 'paard', NULL),
(10, '1313', '1313', 1313, 1313, 'paard', NULL),
(11, 'Bob', '13231', 2412412, 12324, 'paard', NULL),
(14, '242424242424', '2424', 2424, 24244, 'paard', 'haha_funny_horse.jpg'),
(15, 'test', 'test', 101, 101, 'paard', 'haha_funny_horse.jpg'),
(16, 'test', 'test', 1010, 1010, 'paard', 'haha_funny_horse.jpg'),
(17, 'test', 'test', 987987, 987987, 'paard', 'haha_funny_horse.jpg'),
(19, 'test', 'test', 987987, 987987, 'paard', 'haha_funny_horse.jpg'),
(20, '', '', 0, 0, '', 'F38n11g.gif'),
(21, 'test', 'test', 987987, 987987, 'paard', 'haha_funny_horse.jpg'),
(22, 'test', 'test', 987987, 987987, 'paard', 'haha_funny_horse.jpg'),
(23, 'test', 'test', 987987, 987987, 'paard', 'haha_funny_horse.jpg'),
(24, 'Woopity scoop', 'Toegevoegd via mijn telefoon', 83598, 455468, 'paard', 'aed408b.jpg'),
(25, 'Pipo', 'White power', 2147483647, 205273057, 'paard', 'F38n11g.gif'),
(26, '12312323213123', '131311313', 2147483647, 2147483647, 'paard', NULL),
(27, 'new', 'cool', 113, 131313, 'paard', NULL),
(28, 'new new', 'very cool', 131313, 13133, 'paard', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`id`, `name`, `address`, `phone`) VALUES
(1, 'NAAAAAM', '21 JumpStreet', 21),
(2, 'Giovanni', '420 Devil\'s Lettuce Street', 420691337),
(4, 'Jaap', 'Je Moeder Straat 69', 2147483647),
(6, 'CEO Raisins', 'Area 51', 4444);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`id`, `member_id`, `horse_id`, `start_time`, `duration`) VALUES
(1, 2, 3, '2020-06-12 18:00:00', 60),
(4, 1, 1, '2020-06-09 11:11:00', 180),
(5, 1, 1, '2020-06-09 11:00:00', 180),
(6, 4, 1, '2020-06-09 10:00:00', 60),
(7, 2, 1, '2020-06-09 23:00:00', 120),
(8, 2, 1, '2020-06-10 10:00:00', 60),
(9, 2, 1, '2020-06-10 11:59:00', 180),
(10, 2, 2, '2020-06-10 15:00:00', 60),
(12, 2, 2, '2020-06-10 13:00:00', 60),
(13, 1, 2, '2020-06-10 16:30:00', 180),
(14, 1, 2, '2020-06-10 19:30:00', 180),
(15, 2, 8, '2020-06-10 13:00:00', 180),
(16, 2, 1, '2020-06-10 23:00:00', 60),
(17, 2, 7, '2020-06-11 16:30:00', 60),
(18, 4, 1, '2020-06-11 19:00:00', 120),
(19, 2, 1, '2020-06-11 21:30:00', 120),
(20, 2, 14, '2020-06-12 13:07:00', 120);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `horses`
--
ALTER TABLE `horses`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `horses`
--
ALTER TABLE `horses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
