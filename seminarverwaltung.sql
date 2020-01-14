-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 14. Jan 2020 um 14:29
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `seminarverwaltung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fortbildung`
--

CREATE TABLE `fortbildung` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fortbildung`
--

INSERT INTO `fortbildung` (`id`, `name`, `status`) VALUES
(1, 'Fortbildung 1', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs`
--

CREATE TABLE `kurs` (
  `id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `titel` varchar(45) DEFAULT NULL,
  `maxTeilnehmer` int(11) DEFAULT NULL,
  `referent` varchar(100) DEFAULT NULL,
  `beschreibung` text DEFAULT NULL,
  `ort_raum` varchar(50) DEFAULT NULL,
  `kontakt` varchar(45) DEFAULT NULL,
  `von` time DEFAULT NULL,
  `bis` time DEFAULT NULL,
  `unterschriftsliste_zweispaltig` tinyint(4) DEFAULT NULL,
  `koordination` varchar(45) DEFAULT NULL,
  `anmeldeschluss` date DEFAULT NULL,
  `fortbildung_id` int(11) NOT NULL,
  `dauer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kurs`
--

INSERT INTO `kurs` (`id`, `datum`, `titel`, `maxTeilnehmer`, `referent`, `beschreibung`, `ort_raum`, `kontakt`, `von`, `bis`, `unterschriftsliste_zweispaltig`, `koordination`, `anmeldeschluss`, `fortbildung_id`, `dauer`) VALUES
(1, '2019-12-13', 'Kurs1', 10, 'Hallo', 'klajfkldjlkdjfajflköajlkaj', 'c21', 'Fink', '25:00:00', '63:00:00', 1, 'ok', '2019-12-25', 1, 2),
(2, '2019-12-11', 'asdf', 10, 'Hallo2', 'asdfasdfasdfsdafaf', 'c22', 'Fink2', '73:00:00', '99:00:00', 0, 'TExt', '2019-12-24', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nimmt_teil`
--

CREATE TABLE `nimmt_teil` (
  `fortbildung_id` int(11) NOT NULL,
  `teilnehmer_id` int(11) NOT NULL,
  `kurs_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nimmt_teil`
--

INSERT INTO `nimmt_teil` (`fortbildung_id`, `teilnehmer_id`, `kurs_id`) VALUES
(1, 1, NULL),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teilnehmer`
--

CREATE TABLE `teilnehmer` (
  `id` int(11) NOT NULL,
  `vorname` varchar(45) DEFAULT NULL,
  `nachname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `token` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `teilnehmer`
--

INSERT INTO `teilnehmer` (`id`, `vorname`, `nachname`, `email`, `token`) VALUES
(1, 'Julian', 'Fink', 'jf@gmail.com', 'jf1234'),
(2, 'Julian', 'hofer', 'jh@gmail.com', 'jh1234');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fortbildung`
--
ALTER TABLE `fortbildung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kurs_fortbildung1_idx` (`fortbildung_id`);

--
-- Indizes für die Tabelle `nimmt_teil`
--
ALTER TABLE `nimmt_teil`
  ADD PRIMARY KEY (`fortbildung_id`,`teilnehmer_id`),
  ADD KEY `fk_fortbildung_has_teilnehmer_teilnehmer1_idx` (`teilnehmer_id`),
  ADD KEY `fk_fortbildung_has_teilnehmer_fortbildung_idx` (`fortbildung_id`),
  ADD KEY `fk_fortbildung_has_teilnehmer_kurs1_idx` (`kurs_id`);

--
-- Indizes für die Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fortbildung`
--
ALTER TABLE `fortbildung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `fk_kurs_fortbildung1` FOREIGN KEY (`fortbildung_id`) REFERENCES `fortbildung` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `nimmt_teil`
--
ALTER TABLE `nimmt_teil`
  ADD CONSTRAINT `fk_fortbildung_has_teilnehmer_fortbildung` FOREIGN KEY (`fortbildung_id`) REFERENCES `fortbildung` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fortbildung_has_teilnehmer_kurs1` FOREIGN KEY (`kurs_id`) REFERENCES `kurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fortbildung_has_teilnehmer_teilnehmer1` FOREIGN KEY (`teilnehmer_id`) REFERENCES `teilnehmer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
