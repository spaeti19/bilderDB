-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Mrz 2018 um 11:06
-- Server-Version: 10.1.22-MariaDB
-- PHP-Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bilderdatenbank`
--
CREATE DATABASE IF NOT EXISTS `bilderdatenbank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bilderdatenbank`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

DROP TABLE IF EXISTS `benutzer`;
CREATE TABLE `benutzer` (
  `id_benutzer` int(11) NOT NULL,
  `vorname` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nachname` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(40) NOT NULL,
  `passwort` varchar(35) NOT NULL,
  `sessionid` int(11) NOT NULL,
  `last_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzergallerie`
--

DROP TABLE IF EXISTS `benutzergallerie`;
CREATE TABLE `benutzergallerie` (
  `id_benutzergallerie` int(11) NOT NULL,
  `gallerie_id` int(11) NOT NULL,
  `benutzer_id` int(11) NOT NULL,
  `last_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

DROP TABLE IF EXISTS `bilder`;
CREATE TABLE `bilder` (
  `id_bild` int(11) NOT NULL,
  `gallerie_id` int(11) NOT NULL,
  `datentyp` varchar(5) NOT NULL,
  `bilder_beschreibung` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gallerie`
--

DROP TABLE IF EXISTS `gallerie`;
CREATE TABLE `gallerie` (
  `id_gallerie` int(11) NOT NULL,
  `gallerie_name` varchar(50) NOT NULL,
  `gallerie_beschreibung` varchar(2000) NOT NULL,
  `last_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id_benutzer`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `benutzergallerie`
--
ALTER TABLE `benutzergallerie`
  ADD PRIMARY KEY (`id_benutzergallerie`),
  ADD KEY `benutzer_id` (`benutzer_id`),
  ADD KEY `gallerie_id` (`gallerie_id`);

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`id_bild`),
  ADD KEY `gallerie_id` (`gallerie_id`);

--
-- Indizes für die Tabelle `gallerie`
--
ALTER TABLE `gallerie`
  ADD PRIMARY KEY (`id_gallerie`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id_benutzer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `benutzergallerie`
--
ALTER TABLE `benutzergallerie`
  MODIFY `id_benutzergallerie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `id_bild` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `gallerie`
--
ALTER TABLE `gallerie`
  MODIFY `id_gallerie` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `benutzergallerie`
--
ALTER TABLE `benutzergallerie`
  ADD CONSTRAINT `benutzergallerie_ibfk_1` FOREIGN KEY (`benutzer_id`) REFERENCES `benutzer` (`id_benutzer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `benutzergallerie_ibfk_2` FOREIGN KEY (`gallerie_id`) REFERENCES `gallerie` (`id_gallerie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD CONSTRAINT `bilder_ibfk_1` FOREIGN KEY (`gallerie_id`) REFERENCES `gallerie` (`id_gallerie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
