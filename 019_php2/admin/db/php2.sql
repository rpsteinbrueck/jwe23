-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mrz 2024 um 15:16
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
-- Datenbank: `php2`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` float DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `kcal/100g` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `amount`, `unit`, `kcal/100g`) VALUES
(1, 'egg', 1, 'egg', 150),
(2, 'milk', 1, 'cup', 0),
(3, 'flour', 1000, 'gram\r\n                                            ', 0),
(4, 'onions', 1, 'onion', 0),
(5, 'paprika', 1, 'paprika', 0),
(6, 'water', 1, 'cup', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredients_for_recipes`
--

CREATE TABLE `ingredients_for_recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `ingredients_id` int(10) UNSIGNED DEFAULT NULL,
  `recipes_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `ingredients_for_recipes`
--

INSERT INTO `ingredients_for_recipes` (`id`, `ingredients_id`, `recipes_id`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 1, 2),
(4, 2, 2),
(5, 3, 2),
(6, 4, 3),
(7, 5, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `description`, `user_id`) VALUES
(2, 'pancakes', 'bla', 1),
(3, 'omelette', 'bla', 1),
(4, 'cheese cake', 'some cheese cake recipe', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'test1', 'test@wifi.local', 'test1234!!'),
(3, 'User2', 'user2@wifi.local', 'test1234!!'),
(4, 'User3', 'user3@wifi.local', 'test1234!!'),
(6, 'User22', 'user22@wifi.local', 'somerandomlongpassword');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ingredients_for_recipes`
--
ALTER TABLE `ingredients_for_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_id` (`ingredients_id`),
  ADD KEY `recipes_id` (`recipes_id`);

--
-- Indizes für die Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `ingredients_for_recipes`
--
ALTER TABLE `ingredients_for_recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ingredients_for_recipes`
--
ALTER TABLE `ingredients_for_recipes`
  ADD CONSTRAINT `ingredients_for_recipes_ibfk_1` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `ingredients_for_recipes_ibfk_2` FOREIGN KEY (`recipes_id`) REFERENCES `recipes` (`id`);

--
-- Constraints der Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
