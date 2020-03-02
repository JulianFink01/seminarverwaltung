-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 02. Mrz 2020 um 14:17
-- Server-Version: 8.0.13-4
-- PHP-Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `LFMy3l1Qfg`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `f_fortbildung`
--

CREATE TABLE `f_fortbildung` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `f_fortbildung`
--

INSERT INTO `f_fortbildung` (`id`, `name`, `status`) VALUES
(2, 'Pädagogischer Tag 2020', 1),
(55, 'test', 1),
(58, 'Rocca Testet', 1),
(59, 'Fink testet hinterher', 1),
(60, '165464', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `f_kurs`
--

CREATE TABLE `f_kurs` (
  `id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `titel` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `maxTeilnehmer` int(11) DEFAULT NULL,
  `referent` varchar(100) DEFAULT NULL,
  `beschreibung` text,
  `ort_raum` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
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
-- Daten für Tabelle `f_kurs`
--

INSERT INTO `f_kurs` (`id`, `datum`, `titel`, `maxTeilnehmer`, `referent`, `beschreibung`, `ort_raum`, `kontakt`, `von`, `bis`, `unterschriftsliste_zweispaltig`, `koordination`, `anmeldeschluss`, `fortbildung_id`, `dauer`) VALUES
(3, '2020-03-30', 'Krisenintervention', 15, 'Mag. Dr. Ruth Warger', 'Wie gehe ich mit Jugendlichen nach einem Todesfall oder anderen Verlusterlebnissen um? \r\nDie Trauer von Jugendlichen stellt für das Lehrpersonal eine besondere Herausforderung dar.\r\n In der Fortbildung wird anhand von Fallbeispielen praxisnah auf die Komplexität solcher Situationen aus der Perspektive der Schule eingegangen.\r\n Das Ziel liegt einerseits im Erlernen Psychischer Ersten Hilfe-Maßnahmen, um für Krisensituationen bestmöglich gerüstet zu sein und anderseits kann sich eventuell bei Interesse einzelner TeilnehmerInnen daraus für die Zukunft ein „careteam“ entwickeln.\r\n', 'A1.12', NULL, NULL, NULL, NULL, NULL, '2020-03-29', 2, NULL),
(4, '2020-03-30', 'Kultur am Berg - Klettersteig im Sarca Tal: Via ferrata delle Niere mit 30 modernen Kunstwerken', 18, 'Helmuth Kritzinger', 'Die Teilnehmer/innen brauchen gutes Schuhwerk und angemessene Bergbekleidung ( Trekkinghose, T-Shirt, Fleece Jacke, Regenschutz, Rucksack mit Snack und Getränk) Mittagessen nicht vorgesehen.\r\n\r\nVoraussetzungen: Trittsicherheit, schwindelfrei und sportliche Kondition \r\nGeführter Klettersteig B, eine Stelle C und Gehgelände mit 2 Bergführern\r\nKlettersteigset kann ausgeliehen werden (Selbstkostenpreis 15,00 €)\r\nTransfer ab/bis Bozen im 20-Sitzer Bus \r\nBergführer-Haftpflichtversicherung \r\nRückkehr zwischen16:30 – 17:30– abhängig von der Gruppe und vom Wetter\r\nBei schlechtem Wetter: Salewa Cube Kletterhalle', 'LBS Bozen', 'Mair Brigitte', '08:00:00', '17:30:00', NULL, 'Mair Brigette', '2020-03-29', 2, 9),
(5, '2020-03-30', 'Lehrfahrt nach Innsbruck', 7, 'Roland Marini', 'Zielgruppe: Fachgruppe Informatik\r\n  Besuch der höheren technische Lehranstalt HTL Innsbruck\r\nSchwerpunkte im Rahmen einer Schulführung bzw. eines Klassenbesuchs behandelt:\r\n- „Kompetenz Technik“ –\r\n „Praxisbezug der Ausbildung“ \r\nVorstellung verschiedener Ausbildungszweige wie:\r\n- Elektronik und Technische Informatik mit Betriebspraxis (ein besonderes Augenmerk gilt dabei dem Hardwaredesign, der Softwareentwicklung sowie dem Netzwerkmanagement)\r\n- Wirtschaftsingenieure - Betriebsinformatik (Softwareentwicklung, Datenbanken, Softwareanbindungen, Netzwerktechnik, Webtechnologien)\r\n- Elektrotechnik & Maschinenbau (Industrie 4.0)', 'LBS Bozen', 'Roland Marini', NULL, NULL, NULL, NULL, NULL, 2, NULL),
(6, '2020-03-30', 'Herstellen von Lippbalsam, Cremen und Kerzen aus Bienenwachs', 15, 'Valentin Habicher, Othmar Telfser', 'Zielgruppe: Fachgruppe Schönheitspflege und interessierte \r\nMittagessen vorgemerkt im Restaurant Schlossbar in Burgeis\r\nBitte Fahrgemeinschaften bilden (Anreise ca. 1.30)\r\n\r\nAlles über Außendienst verrechnen!!\r\n\r\nPause von 12:30- 13:30', 'Fachschule für Landwirtschaft, Fürstenburg, Burgeis', NULL, '09:00:00', '16:00:00', NULL, NULL, NULL, 2, 6),
(7, '2020-03-30', 'artesella: the contemporary mountain', NULL, NULL, 'Transfer mit Bus bis Malga Costa, Borgo Val Sugana \r\nItalienische Führung um 10.00 Uhr\r\nRückkehr ca. 16.30\r\nKosten, die über Außendienst abzurechnen sind:\r\n7,00 € + 4,00 € Eintritt und Führung \r\n18,00 € Bus\r\nMittagessen um 12.30 im Restaurant Dall‘Ersilia vorgemerkt. Fixes Menü: 20,00\r\nAlles über Außendienst verrechnen!!\r\n', 'LBS Bozen', NULL, '08:30:00', '16:30:00', NULL, NULL, '2020-03-29', 2, 9),
(8, '2020-03-30', 'Prävention und Schutz von Minderjährigen und Laufseminar', 15, 'Ugolini Gottfried, Werner Überbacher', 'Missbrauch, Misshandlung oder Vernachlässigung verletzen zutiefst. Sie zerstören das Leben und belasten die Zukunft. Prävention ist deshalb dringend notwendig, um vorbeugend aktiv zu werden . Im Wesentlichen geht es um drei Grundwerte: Beziehung, Respekt und Verantwortung. Die Veranstaltung bietet Grundinformationen über die Missbrauchdynamik sowie über die persönlichen, sozialen und spirituellen Folgen im Leben von Betroffenen. Auf diesen Hintergrund werden Impulse für die Prävention und für den Schutz von Minderjährigen vorgestellt und auf den schulischen Alltag hin reflektiert.\r\nPause von 12:30-13:30', 'A2.11 Nachmittag: Turnhalle', NULL, '08:30:00', '16:30:00', NULL, 'Werner Überbacher, Ugolini Gottfried', '2020-03-29', 2, 7),
(9, '2020-03-30', 'Neue elektrische Normen, Kraftwerk Lana und Iprona', NULL, 'Klaus Abler', '08:00-10:00    Vortrag Klaus Abler (Neue elektrische Normen) A2.13\r\n11:00-12:30    Kraftwerk Lana mit spezieller Führung\r\n12:30-13:40    Mittagessen in Lana (von Fachgruppe organisiert)\r\n14:00-16:00    Unternehmensbesichtigung Iprona in Lana (Global führendes Unternehmen im Bereich Fruchtkonzentrat)\r\n', 'A2.13', NULL, '08:00:00', '16:00:00', NULL, NULL, '2020-03-29', 2, 8),
(21, '2020-02-19', 'star wars lore', 1, 'sdfgsdfg', '<p>Eine Sehfart die ist lustig eine seefart die ist schön ja da gibt es&nbsp;</p>', 'ssdfgdsfg', 'sdafsdafsdafad', '10:00:00', '11:00:00', 0, 'Kurt', '2020-02-19', 55, 5),
(22, '2020-02-19', 'asdfsadf', 3, 'sdfgsdfg', '<p>asdfasdfasdfasdfsd</p>', 'ssdfgdsfg', 'sdafsdafsdafad', '10:00:00', '11:00:00', 0, 'Kurt', '2020-02-19', 55, 5),
(30, '2000-03-12', 'Test der dreite', 3, 'TEst', 'Never gona give you up never gona let you down never gona turn around and hurt you', 'A.43.8', 'der da', '10:00:00', '00:14:11', 0, 'Kurt', '2020-03-22', 55, 5),
(41, '2020-03-13', 'Star wars Lore better ', 666, 'TEst', '<p>This is lorem ipsum butt better</p>', 'A.403.8', '11', '09:10:00', '09:11:00', 0, 'Kurt', '2020-03-27', 55, 666),
(46, '2020-04-03', 'sdf', 5, 'sdfgsdfg', 'This shouldnt aperar', 'dddd', '420', '10:00:00', '11:00:00', 0, 'Kurt', '2020-03-04', 55, 6),
(47, '2020-04-03', 'sdf', 5, 'sdfgsdfg', '', 'dddd', '420', '10:00:00', '11:00:00', 0, 'Kurt', '2020-03-04', 55, 6),
(48, '2020-03-12', 'Catch Me', 0, 'If you can', '<p>allgemeiner</p>', 'M13', 'If you can', '07:00:00', '17:00:00', 0, '/', '2020-03-02', 55, 3),
(49, '2020-03-12', 'Catch Me', 2, 'If you can', '<p>klöäkököl</p>', 'M13', 'If you can', '07:00:00', '17:00:00', 0, '/', '2020-03-02', 55, 3),
(50, '2020-04-03', 'sdf', 5, 'sdfgsdfg', '<p><br></p>', 'dddd', '420', '10:00:00', '11:00:00', 0, 'Kurt', '2020-03-04', 55, 6),
(51, '2020-03-13', 'Ein Berg, zwei Berge', 10, 'Rocco Salvo', '<p>Jahui</p>', 'AV3', 'Salva Rocca', '10:00:00', '12:00:00', 0, 'Rocca Salva il Mondo', '2020-03-13', 58, 10),
(52, '2020-03-05', 'sfgdg', 4, 'asdf', '<p>df</p>', 'fdea', 'asdf', '00:00:12', '00:00:01', 0, 'sfg', '2020-03-25', 2, 34),
(54, '2001-12-31', 'i want die', 6665, 'gadafi', '<p>fsdfsdsdfadfsafdsa</p>', 'A.43.8', 'CARin', '10:00:00', '11:00:00', 0, 'Kurt', '2001-09-11', 55, 6),
(55, '2020-03-19', 'I want have die ', 666, 'asad', '<p>dfsafdsfsdafdssdfasdasdfasd#</p><p>dsafsd</p><p>fsad</p><p>afds</p><p>f</p><p>dsf</p><p>f</p><p>sdafdsf</p>', 'Terrorherschaft 3', 'Asad', '15:00:00', '11:00:00', 0, 'asad', '2020-03-06', 55, 666),
(56, '2020-03-24', 'ölaköldakdfslöksdfalj', 666, 'asad', '<p>asad</p>', 'A.43.8', 'asad', '10:00:00', '11:00:00', 0, 'asad', '2020-03-12', 55, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `f_nimmt_teil`
--

CREATE TABLE `f_nimmt_teil` (
  `fortbildung_id` int(11) NOT NULL,
  `teilnehmer_id` int(11) NOT NULL,
  `kurs_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `f_nimmt_teil`
--

INSERT INTO `f_nimmt_teil` (`fortbildung_id`, `teilnehmer_id`, `kurs_id`) VALUES
(2, 21, NULL),
(2, 22, NULL),
(2, 42, NULL),
(55, 20, NULL),
(55, 21, NULL),
(55, 22, NULL),
(55, 35, NULL),
(55, 36, NULL),
(55, 42, NULL),
(55, 44, NULL),
(60, 44, NULL),
(2, 23, 3),
(2, 20, 5),
(55, 23, 21);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `f_teilnehmer`
--

CREATE TABLE `f_teilnehmer` (
  `id` int(11) NOT NULL,
  `vorname` varchar(45) DEFAULT NULL,
  `nachname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `token` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `f_teilnehmer`
--

INSERT INTO `f_teilnehmer` (`id`, `vorname`, `nachname`, `email`, `token`) VALUES
(19, 'vorname', 'nachname', 'email', 'benjo'),
(20, 'Lukas', 'Roccasalvo', 'roccasalvo.lukas@gmail.com', 'rocca'),
(21, 'Simon', 'Mairhofer', 'simon321mairhofer@gmail.com', 'eGXv8qRVAd84f4a1oAanDpQBqd7LKu'),
(22, 'Wilhelm', 'Lanz', 'wilhelm.lanz@berufsschule.bz', 'xRcFJ3Hz4ny7Tm96dXVSocVMD85RLy'),
(23, 'Julian', 'Fink', 'finkjulian01@gmail.com', 'ytxd7gzEJpbCSqyhzxgO1mVvh0XUbV'),
(31, 'Julian', 'Fink', 'julianfink01@gmail.com', '744YA7hgXOyXLYQxN8brDOcNaotBIP'),
(32, 'asdfasdf', 'asdfasdf', 'reichstag.evaBraun@ss.com', 'DpOj16a4ASmrGYT5LsaNQ7yvfnvPVn'),
(33, 'simon', 'Schmitt', 'simon@mail.com', 'BhJsJ9qsrwIagHPyPeNXImZHSO7T0S'),
(34, 'simon', 'Schmitt', 'simon@mail.com', '7h1XxVC48PfRatv3tkwnPfWLdOfmLO'),
(35, 'lukas', 'roccasalvo', 'roccasalvo.lukas@gmail.com', 'a4KVKIzoPOxsciBxMjWhiNLExd5Jl4'),
(36, 'robert', 'matha', 'matharobert1@gmail.com', 'Xj6BukElyzkO5Y7rJIVtbvXlqk3jcf'),
(37, 'matha', 'robert', 'robert-matha@hotmail.de', 'X4xUvFbbS9BXPar8h25DlAGmSYBjiY'),
(38, 'simon', 'Schmitt', 'simon@mail.com', 'wtGsjwoMC24CDYoRTlkupxahtTbY2o'),
(39, 'Hitler', 'Schmitt', 'reichstag.evaBraun@ss.com', '0786a4JAMy3V8uDQanJTRUtwI9x1E1'),
(41, 'Hitlerj', 'Schmittj', 'reichstag.evaBraun@ss.comj', 'wiEZGoJtHRsj6pNbzdjxiV9TCLObIw'),
(42, 'Julian', 'Hofer', 'julianhofer2712@gmail.com', 'HVQC5BKcZaBclo1qaFZGGfi4tj8DRI'),
(43, 'Neurerer', 'Benutzer', 'neu@neu.com', '560ioduvptubwALx5erlKMUMvglAKv'),
(44, 'Test', 'Nachnahme', 'nimanjebemail@gmail.com', 'R09CGcyNaNjOEgdkC73r7cDugsJ1kK');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `f_fortbildung`
--
ALTER TABLE `f_fortbildung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `f_kurs`
--
ALTER TABLE `f_kurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kurs_fortbildung1_idx` (`fortbildung_id`);

--
-- Indizes für die Tabelle `f_nimmt_teil`
--
ALTER TABLE `f_nimmt_teil`
  ADD PRIMARY KEY (`fortbildung_id`,`teilnehmer_id`),
  ADD KEY `fk_fortbildung_has_teilnehmer_teilnehmer1_idx` (`teilnehmer_id`),
  ADD KEY `fk_fortbildung_has_teilnehmer_fortbildung_idx` (`fortbildung_id`),
  ADD KEY `fk_fortbildung_has_teilnehmer_kurs1_idx` (`kurs_id`);

--
-- Indizes für die Tabelle `f_teilnehmer`
--
ALTER TABLE `f_teilnehmer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `f_fortbildung`
--
ALTER TABLE `f_fortbildung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT für Tabelle `f_kurs`
--
ALTER TABLE `f_kurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT für Tabelle `f_teilnehmer`
--
ALTER TABLE `f_teilnehmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `f_kurs`
--
ALTER TABLE `f_kurs`
  ADD CONSTRAINT `fk_kurs_fortbildung1` FOREIGN KEY (`fortbildung_id`) REFERENCES `f_fortbildung` (`id`);

--
-- Constraints der Tabelle `f_nimmt_teil`
--
ALTER TABLE `f_nimmt_teil`
  ADD CONSTRAINT `fk_fortbildung_has_teilnehmer_fortbildung` FOREIGN KEY (`fortbildung_id`) REFERENCES `f_fortbildung` (`id`),
  ADD CONSTRAINT `fk_fortbildung_has_teilnehmer_kurs1` FOREIGN KEY (`kurs_id`) REFERENCES `f_kurs` (`id`),
  ADD CONSTRAINT `fk_fortbildung_has_teilnehmer_teilnehmer1` FOREIGN KEY (`teilnehmer_id`) REFERENCES `f_teilnehmer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
