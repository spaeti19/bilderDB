-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Feb 2017 um 09:22
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kontakte`
--
DROP DATABASE IF EXISTS `kontakte`;
CREATE DATABASE IF NOT EXISTS `kontakte` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE `kontakte`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontakte`
--

CREATE TABLE `kontakte` (
  `kid` int(11) NOT NULL,
  `nachname` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `vorname` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `strasse` varchar(100) COLLATE utf8_german2_ci DEFAULT NULL,
  `oid` smallint(6) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `kontakte`
--

INSERT INTO `kontakte` (`kid`, `nachname`, `vorname`, `strasse`, `oid`, `email`, `tel`) VALUES
(1, 'Ritter', 'Krysten', 'Jonesweg 88', 1, 'jessica@kr.ch', '777 777 777'),
(2, 'Thurman', 'Uma', 'Killbillstr. 99', 3, 'uma@bill.ch', '444 444 444'),
(3, 'Jackson', 'Samuel', 'Pulpfictionweg 22', 2, 'sam@tarantel.ch', '666 666 666'),
(4, 'McKenzie', 'Ben', 'Gordonweg 55', 1, 'ben@gotham.ch', '555 555 555');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orte`
--

CREATE TABLE `orte` (
  `oid` int(11) NOT NULL,
  `plz` smallint(6) NOT NULL,
  `ort` varchar(50) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `orte`
--

INSERT INTO `orte` (`oid`, `plz`, `ort`) VALUES
(1, 3000, 'Bern'),
(2, 2500, 'Biel'),
(3, 3400, 'Burgdorf'),
(4, 3600, 'Thun');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kontakte`
--
ALTER TABLE `kontakte`
  ADD PRIMARY KEY (`kid`);

--
-- Indizes für die Tabelle `orte`
--
ALTER TABLE `orte`
  ADD PRIMARY KEY (`oid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kontakte`
--
ALTER TABLE `kontakte`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `orte`
--
ALTER TABLE `orte`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
