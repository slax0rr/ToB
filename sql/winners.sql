-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 27. Apr 2017 um 20:54
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
-- Tabellenstruktur für Tabelle `winners`
--

CREATE TABLE `winners` (
  `id` int(11) NOT NULL,
  `sortorder` int(5) NOT NULL,
  `Clan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Galaxy` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MechWarrior` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bloodright` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sponsor` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourneyHost` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourneyStartTime` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Details` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WitnessList` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RulesVersion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChallongeTourneyLink` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChallongeResultScreenshotLink` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
