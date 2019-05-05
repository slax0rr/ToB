-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 17. Apr 2017 um 00:43
-- Server-Version: 5.5.54
-- PHP-Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `clanwolf_tob`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `Name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Details` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournament_link` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` TIMESTAMP NOT NULL,
  `end_date` TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `tournaments`
--

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
