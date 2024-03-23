-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Mrz 2024 um 15:18
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `php2_pruefung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fluege`
--

CREATE TABLE `fluege` (
  `id` int(10) UNSIGNED NOT NULL,
  `flugnr` varchar(20) DEFAULT NULL,
  `abflug` datetime DEFAULT NULL,
  `ankunft` datetime DEFAULT NULL,
  `start_flgh` varchar(50) DEFAULT NULL,
  `ziel_flgh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `fluege`
--

INSERT INTO `fluege` (`id`, `flugnr`, `abflug`, `ankunft`, `start_flgh`, `ziel_flgh`) VALUES
(1, 'OS 920', '2024-03-23 08:10:00', '2024-03-23 09:00:00', 'Salzburg SZG', 'Wien VIE'),
(2, 'EW 8141', '2024-03-23 08:15:00', '2024-03-23 09:05:00', 'Salzburg SZG', 'Berlin TXL'),
(3, 'EW 9393', '2024-03-23 08:40:00', '2024-03-23 09:35:00', 'Salzburg SZG', 'Düsseldorf DUS'),
(4, 'EW 8140', '2024-03-23 07:35:00', '2024-03-23 08:25:00', 'Berlin TXL', 'Salzburg SZG'),
(5, 'EW 9392', '2024-03-23 08:05:00', '2024-03-23 08:55:00', 'Düsseldorf DUS', 'Salzburg SZG'),
(6, 'TOM2670F', '2024-03-23 09:10:00', '2024-03-23 10:35:00', 'Manchester MAN', 'Salzburg SZG'),
(7, 'TF 9012', '2024-03-23 10:15:00', '2024-03-23 12:00:00', 'Göteborg GOT', 'Salzburg SZG'),
(8, 'LS 1655', '2024-03-23 11:00:00', '2024-03-23 12:25:00', 'London STN', 'Salzburg SZG'),
(9, 'HV 5407', '2024-03-23 13:30:00', '2024-03-23 14:25:00', 'Rotterdam RTM', 'Salzburg SZG'),
(10, 'S7 791', '2024-03-23 15:05:00', '2024-03-23 17:30:00', 'Moskau DME', 'Salzburg SZG'),
(11, 'OS 263', '2024-03-23 10:45:00', '2024-03-23 11:30:00', 'Salzburg SZG', 'Frankfurt FRA'),
(12, 'DY 4474', '2024-03-23 11:40:00', '2024-03-23 13:00:00', 'Salzburg SZG', 'Stockholm ARN'),
(13, 'SK 2620', '2024-03-23 12:55:00', '2024-03-23 14:25:00', 'Salzburg SZG', 'Kopenhagen CPH'),
(14, 'EZY2116', '2024-03-23 15:55:00', '2024-03-23 18:40:00', 'Salzburg SZG', 'Luton LTN');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `passagiere`
--

CREATE TABLE `passagiere` (
  `id` int(10) UNSIGNED NOT NULL,
  `vorname` varchar(100) NOT NULL,
  `nachname` varchar(100) NOT NULL,
  `geburtsdatum` date DEFAULT NULL,
  `flugangst` tinyint(1) NOT NULL DEFAULT 0,
  `flug_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `passagiere`
--

INSERT INTO `passagiere` (`id`, `vorname`, `nachname`, `geburtsdatum`, `flugangst`, `flug_id`) VALUES
(25, 'stanley', 'st', '1980-11-01', 0, 14),
(26, 'mr', 'banning', '1992-03-06', 0, 10),
(27, 'foo', 'bar', '1992-03-07', 1, 10),
(28, 'felix', 'stellar', '1990-03-01', 1, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `passagiere_zu_fluege`
--

CREATE TABLE `passagiere_zu_fluege` (
  `id` int(10) NOT NULL,
  `flug_id` int(10) UNSIGNED DEFAULT NULL,
  `passagier_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fluege`
--
ALTER TABLE `fluege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flugnr` (`flugnr`);

--
-- Indizes für die Tabelle `passagiere`
--
ALTER TABLE `passagiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flug_id` (`flug_id`);

--
-- Indizes für die Tabelle `passagiere_zu_fluege`
--
ALTER TABLE `passagiere_zu_fluege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flug_id` (`flug_id`),
  ADD KEY `passagier_id` (`passagier_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fluege`
--
ALTER TABLE `fluege`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `passagiere`
--
ALTER TABLE `passagiere`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `passagiere_zu_fluege`
--
ALTER TABLE `passagiere_zu_fluege`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `passagiere`
--
ALTER TABLE `passagiere`
  ADD CONSTRAINT `passagiere_ibfk_1` FOREIGN KEY (`flug_id`) REFERENCES `fluege` (`id`);

--
-- Constraints der Tabelle `passagiere_zu_fluege`
--
ALTER TABLE `passagiere_zu_fluege`
  ADD CONSTRAINT `passagiere_zu_fluege_ibfk_1` FOREIGN KEY (`flug_id`) REFERENCES `fluege` (`id`),
  ADD CONSTRAINT `passagiere_zu_fluege_ibfk_2` FOREIGN KEY (`passagier_id`) REFERENCES `passagiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
