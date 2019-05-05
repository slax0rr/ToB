-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 06. Mai 2017 um 00:55
-- Server-Version: 5.5.54
-- PHP-Version: 5.6.30

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
-- Tabellenstruktur für Tabelle `fights`
--

CREATE TABLE `fights` (
  `id` int(11) NOT NULL,
  `tournamentid` int(11) NOT NULL,
  `fightnumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitchstream` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oathmaster` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW1_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW1_age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW1_sponsor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW1_rank` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW1_house` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW1_unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW2_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW2_age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW2_sponsor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW2_rank` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW2_house` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW2_unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tonnagerange` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW1_config` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MW2_config` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `winner` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `fights`
--

INSERT INTO `fights` (`id`, `tournamentid`, `fightnumber`, `twitchstream`, `oathmaster`, `MW1_name`, `MW1_age`, `MW1_sponsor`, `MW1_rank`, `MW1_house`, `MW1_unit`, `MW2_name`, `MW2_age`, `MW2_sponsor`, `MW2_rank`, `MW2_house`, `MW2_unit`, `tonnagerange`, `map`, `appointment`, `MW1_config`, `MW2_config`, `winner`, `video`) VALUES
(1, 1, '1', 'https://www.twitch.tv/donfalcone97', 'Meldric Ward', 'Wolfengel', '47', 'Bronze Keshik', 'MW', 'Murphy - CW / ? (div)', 'CWG 7th BC', 'Idee', '35', '(Grand Melee)', 'MW', 'Fetladral - CW / ALL (exl)', 'RCW', '25-35t: MLX ACH KFX ', 'Frozen City', 'immediately', 'http://mwo.smurfy-net.de/mechlab#i=291&l=11fcd078c7b6b6b2a0bb4b73f4bdc82c2e72e0da', 'http://mwo.smurfy-net.de/mechlab#i=351&l=b91ea4e7d7af15513fa6f4e2a0a1ca08352020fa', 'MW Idee', ''),
(2, 1, '8', 'https://www.twitch.tv/femukki', 'Meldric Ward', 'Yushi', '33', 'Demiurge Kerensky', 'SCpt', 'Winson - CBS / ? (div)', 'RCW', 'DerJester71', '23', 'Affinity Ward', 'MW', 'Carns - CW / MW (exl)', 'CWI', '70-80t: SMN TBR ON1 ', 'Viridian Bog', 'immediately', 'http://mwo.smurfy-net.de/mechlab#i=165&l=3f3b322771cbf6d46493d8e900d3bae83350a814', 'http://mwo.smurfy-net.de/mechlab#i=165&l=66eee416a4e55705886a71ab3f712ed2efd310c7', 'SCpt Yushi', ''),
(5, 1, '2', 'https://www.twitch.tv/alex_nieves', 'Ulysses Jacobi', 'Rhodance', '24', 'Cobaltgreen Fetladral', 'SCol', 'Fetladral - CW / ALL (exl)', 'Alpha Galaxy Golden Keshik', 'Dragonling', '30', 'Clan Council', 'MW', 'Radick - CW / MW (exl)', 'Beta Galaxy', '45-55t: IFR SHC NVA ', 'The Mining Collective', 'immediately', 'http://mwo.smurfy-net.de/mechlab#i=185&l=80767cea7ed46a4e4fd1bd9b981a2707611f8660', 'http://mwo.smurfy-net.de/mechlab#i=268&l=28fb96c833a94017433dfd7d07c6fb3a40f08d5d', 'MW Dragonling', 'https://www.twitch.tv/alex_nieves'),
(9, 1, '9', 'https://www.twitch.tv/femukki', 'Ulysses Jacobi', 'Idee', '35', 'Grand Melee', 'MW', 'Fetladral - CW / ALL (exl)', 'Beta Galaxy', 'Dragonling', '30', 'Clan Council', 'MW', 'Radick - CW / MW (exl)', 'Beta Galaxy', '85-95t: MAD WHK HGN ', 'Tourmaline Desert', 'немедленно', 'http://mwo.smurfy-net.de/mechlab#i=493&l=0e0e2da34caca84328ce8f5039f0387874c730de', 'http://mwo.smurfy-net.de/mechlab#i=497&l=777e25e0cae291cd52f5be2a53890d42c79708b2', 'MW Idee', 'https://www.twitch.tv/videos/139617481'),
(10, 1, '5', 'https://www.twitch.tv/femukki', 'Ulysses Jacobi', 'Liam Wolf', '20', 'Bronze Keshik', 'MW', 'Showers - CSJ / MW (ann)', 'CWG', 'DarkCat', '31', 'Asatur Ward', 'MW', 'Radick - CW / MW (exl)', 'RCW', '60-70t: MDD EBJ HBR ', 'Crimson Strait', 'immediately', 'http://mwo.smurfy-net.de/mechlab#i=280&l=859bf7e6d0d967cc0a309af87d4f605f686fbc7d', 'http://mwo.smurfy-net.de/mechlab#i=269&l=c4e93d2e1f26d92614887ae7e22a2e2d264eb73a', 'MW DarkCat', ''),
(11, 1, '3', 'https://www.twitch.tv/femukki', 'Meldric Ward', 'XFirestorm', '30', 'Meldric Ward', 'SCpt', 'Ward - CW / MW (exl)', 'CWG', 'Alexander Grim', '23', 'Blood Council', 'MW', 'Carns - CW / MW (exl)', 'CWI', '75-85t: TBR ON1 NGT ', 'Crimson Strait', 'immediately', 'http://mwo.smurfy-net.de/mechlab#i=164&l=24a5e12e72f5da94dd26b9ddde64a13c486b1d38', 'http://mwo.smurfy-net.de/mechlab#i=498&l=af3dd4c81ea0521b2aa1afc457367d0b00b4515c', 'MW Alexander Grim', ''),
(12, 1, '7', 'https://www.twitch.tv/femukki', 'Ulysses Jacobi', 'Praetor Andreas', '35', 'Keshik', 'SCpt', 'Lynn - CFM / PLT (exl)', 'CWG', 'Krizalius', '31', 'Loader Ward', 'MW', 'Carns - CW / MW (exl)', 'RCW', '70-80t: SMN TBR ON1 ', 'Viridian Bog', 'immediately', 'http://mwo.smurfy-net.de/mechlab#i=164&l=ae7425b2098acb82ab08ebef77ef4db64786392c', 'http://mwo.smurfy-net.de/mechlab#i=163&l=c8cc02720246097fc9f66664c3eafad6fbcdb22c', 'MW Krizalius', 'https://steamuserimages-a.akamaihd.net/ugc/834699937919433819/9305F7C5CDD84C60B599BBFB99DF3C60743031'),
(14, 1, '6', 'https://www.twitch.tv/femukki', 'Ulysses Jacobi', 'Cypher', '32', 'Clan Council', 'SCpt', 'Radick - CW / MW (exl)', 'CWI', 'MadnessHero86', '30', 'Clan Council', 'MW', 'Sradac - CW / ELE (exl)', 'CWI', '65-75t: EBJ HBR LBK ', 'River City', 'immediately', 'http://mwo.smurfy-net.de/mechlab#i=165&l=56854f836e05258f39c3d6b12fdca0ccca995a28', 'http://mwo.smurfy-net.de/mechlab#i=374&l=22ef5c1378d430d8fa46e090eb6d635fdba28315', 'MW MadnessHero86', 'https://www.twitch.tv/videos/139967031'),
(15, 1, '12', 'https://www.twitch.tv/femukki', 'Ulysses Jacobi', 'Yushi', '33', 'Demiurg Kerensky', 'SCpt', 'Winson - CBS / ? (div)', 'RCW', 'Krysalius', '31', 'Loader Ward', 'MW', 'Carns - CW / MW (exl)', 'RCW', '70-80t: SMN TBR ON1 ', 'Grim Plexus', 'немедленно', 'http://mwo.smurfy-net.de/mechlab#i=236&l=ac541f2beaec6eb0e62882727d80b5fde168c01e', 'http://mwo.smurfy-net.de/mechlab#i=164&l=87435359a2697aecd26d7e616c549dd2bb307f58', 'SCpt Yushi', 'https://www.twitch.tv/videos/140324990');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fights`
--
ALTER TABLE `fights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fights`
--
ALTER TABLE `fights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
