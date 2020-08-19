-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 30. Apr 2020 um 11:20
-- Server-Version: 8.0.13-4
-- PHP-Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `UsNSSxycdr`
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
(54, 'Elternabend', 1);

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
  `dauer` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `f_kurs`
--

INSERT INTO `f_kurs` (`id`, `datum`, `titel`, `maxTeilnehmer`, `referent`, `beschreibung`, `ort_raum`, `kontakt`, `von`, `bis`, `unterschriftsliste_zweispaltig`, `koordination`, `anmeldeschluss`, `fortbildung_id`, `dauer`) VALUES
(3, '2020-03-30', 'Krisenintervation', 15, 'Mag. Dr. Ruth Warger', 'Wie gehe ich mit Jugendlichen nach einem Todesfall oder anderen Verlusterlebnissen um? \r\nDie Trauer von Jugendlichen stellt für das Lehrpersonal eine besondere Herausforderung dar.\r\n In der Fortbildung wird anhand von Fallbeispielen praxisnah auf die Komplexität solcher Situationen aus der Perspektive der Schule eingegangen.\r\n Das Ziel liegt einerseits im Erlernen Psychischer Ersten Hilfe-Maßnahmen, um für Krisensituationen bestmöglich gerüstet zu sein und anderseits kann sich eventuell bei Interesse einzelner TeilnehmerInnen daraus für die Zukunft ein „careteam“ entwickeln.\r\n', 'A1.12', NULL, NULL, NULL, NULL, NULL, '2020-03-29', 2, NULL),
(4, '2020-03-30', 'Kultur am Berg - Klettersteig im Sarca Tal: Via ferrata delle Niere mit 30 modernen Kunstwerken', 18, 'Helmuth Kritzinger', 'Die Teilnehmer/innen brauchen gutes Schuhwerk und angemessene Bergbekleidung ( Trekkinghose, T-Shirt, Fleece Jacke, Regenschutz, Rucksack mit Snack und Getränk) Mittagessen nicht vorgesehen.\r\n\r\nVoraussetzungen: Trittsicherheit, schwindelfrei und sportliche Kondition \r\nGeführter Klettersteig B, eine Stelle C und Gehgelände mit 2 Bergführern\r\nKlettersteigset kann ausgeliehen werden (Selbstkostenpreis 15,00 €)\r\nTransfer ab/bis Bozen im 20-Sitzer Bus \r\nBergführer-Haftpflichtversicherung \r\nRückkehr zwischen16:30 – 17:30– abhängig von der Gruppe und vom Wetter\r\nBei schlechtem Wetter: Salewa Cube Kletterhalle', 'LBS Bozen', 'Mair Brigitte', '08:00:00', '17:30:00', NULL, 'Mair Brigette', '2020-03-29', 2, 9),
(5, '2020-03-30', 'Lehrfahrt nach Innsbruck', 7, 'Roland Marini', 'Zielgruppe: Fachgruppe Informatik\r\n  Besuch der höheren technische Lehranstalt HTL Innsbruck\r\nSchwerpunkte im Rahmen einer Schulführung bzw. eines Klassenbesuchs behandelt:\r\n- „Kompetenz Technik“ –\r\n „Praxisbezug der Ausbildung“ \r\nVorstellung verschiedener Ausbildungszweige wie:\r\n- Elektronik und Technische Informatik mit Betriebspraxis (ein besonderes Augenmerk gilt dabei dem Hardwaredesign, der Softwareentwicklung sowie dem Netzwerkmanagement)\r\n- Wirtschaftsingenieure - Betriebsinformatik (Softwareentwicklung, Datenbanken, Softwareanbindungen, Netzwerktechnik, Webtechnologien)\r\n- Elektrotechnik & Maschinenbau (Industrie 4.0)', 'LBS Bozen', 'Roland Marini', NULL, NULL, NULL, NULL, NULL, 2, NULL),
(6, '2020-03-30', 'Herstellen von Lippbalsam, Cremen und Kerzen aus Bienenwachs', 15, 'Valentin Habicher, Othmar Telfser', 'Zielgruppe: Fachgruppe Schönheitspflege und interessierte \r\nMittagessen vorgemerkt im Restaurant Schlossbar in Burgeis\r\nBitte Fahrgemeinschaften bilden (Anreise ca. 1.30)\r\n\r\nAlles über Außendienst verrechnen!!\r\n\r\nPause von 12:30- 13:30', 'Fachschule für Landwirtschaft, Fürstenburg, Burgeis', NULL, '09:00:00', '16:00:00', NULL, NULL, NULL, 2, 6),
(7, '2020-03-30', 'artesella: the contemporary mountain', NULL, NULL, 'Transfer mit Bus bis Malga Costa, Borgo Val Sugana \r\nItalienische Führung um 10.00 Uhr\r\nRückkehr ca. 16.30\r\nKosten, die über Außendienst abzurechnen sind:\r\n7,00 € + 4,00 € Eintritt und Führung \r\n18,00 € Bus\r\nMittagessen um 12.30 im Restaurant Dall‘Ersilia vorgemerkt. Fixes Menü: 20,00\r\nAlles über Außendienst verrechnen!!\r\n', 'LBS Bozen', NULL, '08:30:00', '16:30:00', NULL, NULL, '2020-03-29', 2, 9),
(8, '2020-03-30', 'Prävention und Schutz von Minderjährigen und Laufseminar', 15, 'Ugolini Gottfried, Werner Überbacher', 'Missbrauch, Misshandlung oder Vernachlässigung verletzen zutiefst. Sie zerstören das Leben und belasten die Zukunft. Prävention ist deshalb dringend notwendig, um vorbeugend aktiv zu werden . Im Wesentlichen geht es um drei Grundwerte: Beziehung, Respekt und Verantwortung. Die Veranstaltung bietet Grundinformationen über die Missbrauchdynamik sowie über die persönlichen, sozialen und spirituellen Folgen im Leben von Betroffenen. Auf diesen Hintergrund werden Impulse für die Prävention und für den Schutz von Minderjährigen vorgestellt und auf den schulischen Alltag hin reflektiert.\r\nPause von 12:30-13:30', 'A2.11 Nachmittag: Turnhalle', NULL, '08:30:00', '16:30:00', NULL, 'Werner Überbacher, Ugolini Gottfried', '2020-03-29', 2, 7),
(9, '2020-03-30', 'Neue elektrische Normen, Kraftwerk Lana und Iprona', NULL, 'Klaus Abler', '08:00-10:00    Vortrag Klaus Abler (Neue elektrische Normen) A2.13\r\n11:00-12:30    Kraftwerk Lana mit spezieller Führung\r\n12:30-13:40    Mittagessen in Lana (von Fachgruppe organisiert)\r\n14:00-16:00    Unternehmensbesichtigung Iprona in Lana (Global führendes Unternehmen im Bereich Fruchtkonzentrat)\r\n', 'A2.13', NULL, '08:00:00', '16:00:00', NULL, NULL, '2020-03-29', 2, 8),
(10, '2020-09-20', 'BGS Metall + Elektro A', NULL, 'Hassl Margit', 'Elektro Mi / Metall Di', 'A4.12', 'Hassl Margit', '18:00:00', '19:15:00', NULL, 'Hassl Margit', NULL, 54, 1),
(11, '2020-09-20', 'BGS Metall + Elektro B', NULL, 'Pimpl Walter', 'Elektro:Fr /Metall MI', 'C3.08', 'Pimpl Walter', '18:00:00', '19:15:00', NULL, 'Pimpl Walter', NULL, 54, 1),
(12, '2020-09-20', 'BGS Metall + Elektro C', NULL, 'Egger Walter', 'Elektro Mo / Metall DO', 'A3.12', 'Egger Walter', '18:00:00', '19:15:00', NULL, 'Egger Walter', NULL, 54, 1),
(13, '2020-09-20', 'BGS Metall + Elektro D', NULL, 'Wasserer Kurt', 'Elektro Do/Metall Fr', 'C4.03', 'Wasserer Kurt', '18:00:00', '19:15:00', NULL, 'Wasserer Kurt', NULL, 54, 1),
(14, '2020-09-20', 'BGS Elektro + Info E', NULL, 'Marini Roland', 'Elektro Di', 'C4.04', 'Marini Roland', '18:00:00', '19:15:00', NULL, 'Marini Roland', NULL, 54, 1),
(15, '2020-09-20', 'BGS Elektro + Info F', NULL, 'Marchetto Lidiana', 'Elektro Do', 'C4.05', 'Marchetto Lidiana', '18:00:00', '19:15:00', NULL, 'Marchetto Lidiana', NULL, 54, 1),
(16, '2020-09-20', 'BGS Holz + Bau G', NULL, 'Wegmann Marialuise', 'Holz Fr / Bau Do', 'C4.06', 'Wegmann Marialuise', '18:00:00', '19:15:00', NULL, 'Wegmann Marialuise', NULL, 54, 1),
(17, '2020-09-20', 'BGS Holz + Bau H', NULL, 'Saurer Saskia', 'Holz Do / Bau Fr', 'A4.09', 'Saurer Saskia', '18:00:00', '19:15:00', NULL, 'Saurer Saskia', NULL, 54, 1),
(18, '2020-09-20', 'BGS Friseur + Schön I', NULL, 'Matscher Marion', NULL, 'C4.12', 'Matscher Marion', '18:00:00', '19:15:00', NULL, 'Matscher Marion', NULL, 54, 1),
(19, '2020-09-20', 'BGS Friseur + Schön K', NULL, 'Profanter Nathalie', NULL, 'C4.13', 'Profanter Nathalie', '18:00:00', '19:15:00', NULL, 'Profanter Nathalie', NULL, 54, 1),
(20, '2020-09-20', 'Projekt-Klasse', NULL, 'Mair Brigitte', NULL, 'A3.11', 'Mair Brigitte', '18:00:00', '19:15:00', NULL, 'Mair Brigitte', NULL, 54, 1),
(21, '2020-09-20', 'DAZ', NULL, 'Mair Brigitte', NULL, 'C3.20', 'Mair Brigitte', '18:00:00', '19:15:00', NULL, 'Mair Brigitte', NULL, 54, 1),
(22, '2020-09-20', 'BGS Neumarkt', NULL, 'Mössler Hildegard', NULL, '', 'Mössler Hildegard', '18:00:00', '19:15:00', NULL, 'Mössler Hildegard', NULL, 54, 1),
(23, '2020-09-20', 'BGS Sarnthein', NULL, 'Hofer Andreas', NULL, NULL, 'Hofer Andreas', '18:00:00', '19:15:00', NULL, 'Hofer Andreas', NULL, 54, 1),
(24, '2020-09-20', 'Anlehre', NULL, 'Agostini Irene', NULL, 'C4.11', 'Agostini Irene', '18:00:00', '19:15:00', NULL, 'Agostini Irene', NULL, 54, 1),
(25, '2020-09-20', 'Mechatronik 2A', NULL, 'Spechtenhauser Kurt', 'Met Mo', 'A3.10', 'Spechtenhauser Kurt', '18:00:00', '19:15:00', NULL, 'Spechtenhauser Kurt', NULL, 54, 1),
(26, '2020-09-20', 'Mechatronik 2B', NULL, 'Reider Christof', 'Met Mi', 'A2.13', 'Reider Christof', '18:00:00', '19:15:00', NULL, 'Reider Christof', NULL, 54, 1),
(27, '2020-09-20', 'Mechatronik 3A', NULL, 'Gschnell Robert', 'Met Di', 'C2.13', 'Gschnell Robert', '18:00:00', '19:15:00', NULL, 'Gschnell Robert', NULL, 54, 1),
(28, '2020-09-20', 'Mechatronik 3B', NULL, 'Holzmann Günther', 'Met Fr', 'C3.19', 'Holzmann Günther', '18:00:00', '19:15:00', NULL, 'Holzmann Günther', NULL, 54, 1),
(29, '2020-09-20', 'Mechatronik 4', NULL, 'Pernstich Andreas', 'Met Mo', 'A4.14', 'Pernstich Andreas', '18:00:00', '19:15:00', NULL, 'Pernstich Andreas', NULL, 54, 1),
(30, '2020-09-20', 'Informatik 2A', NULL, 'Reinstadler Martin', NULL, 'C4.18', 'Reinstadler Martin', '18:00:00', '19:15:00', NULL, 'Reinstadler Martin', NULL, 54, 1),
(31, '2020-09-20', 'Informatik 2B', NULL, 'Kuen Thomas', NULL, 'C4.14', 'Kuen Thomas', '18:00:00', '19:15:00', NULL, 'Kuen Thomas', NULL, 54, 1),
(32, '2020-09-20', 'Info 3 - Geb 3', NULL, 'Gerstgrasser Manfred/\r\nVieider Jürgen', NULL, 'C4.15/C3.11', 'Gerstgrasser Manfred/ Vieider Jürgen', '18:00:00', '19:15:00', NULL, 'Gerstgrasser Manfred/ Vieider Jürgen', NULL, 54, 1),
(33, '2020-09-20', 'Informatik 4', NULL, 'Lanz Wilhelm', NULL, 'C4.19', 'Lanz Wilhelm', '18:00:00', '19:15:00', NULL, 'Lanz Wilhelm', NULL, 54, 1),
(34, '2020-09-20', 'Geb.Infrastruktur 2', NULL, 'Pircher Daniel', NULL, 'A4.08', 'Pircher Daniel', '18:00:00', '19:15:00', NULL, 'Pircher Daniel', NULL, 54, 1),
(35, '2020-09-20', 'Geb.Infrastruktur 4', NULL, 'Ortler Stefan', NULL, 'A4.15', 'Ortler Stefan', '18:00:00', '19:15:00', NULL, 'Ortler Stefan', NULL, 54, 1),
(36, '2020-09-20', 'Matura-Klasse 5A', NULL, 'Tiziani Silvia', 'INFO-GEB-MTR', 'A1.10', 'Tiziani Silvia', '18:00:00', '19:15:00', NULL, 'Tiziani Silvia', NULL, 54, 1);

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
(2, 1, NULL),
(2, 4, NULL),
(2, 5, NULL),
(2, 6, NULL),
(2, 7, NULL),
(54, 8, NULL),
(2, 2, 3);

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
(1, 'Julian', 'Fink', 'jf@gmail.com', 'jf1234'),
(2, 'Julian', 'hofer', 'jh@gmail.com', 'jh1234'),
(3, 'Miriam', 'Crouch', 'myemddail@email.email', 'hhh44'),
(4, 'vorname', 'nachname', 'email', ''),
(5, 'Lukas', 'Roccasalvo', 'roccasalvo.lukas@gmail.com', ''),
(6, 'Simon', 'Mairhofer', 'simon321mairhofer@gmail.com', ''),
(7, 'Wilhelm', 'Lanz', 'wilhelm.lanz@berufsschule.bz', ''),
(8, 'Julian', 'Fink', 'julianfink01@gmail.com', 'Qb9sV9j6uFnVUmpHOpnZt9Nc713XW6');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT für Tabelle `f_kurs`
--
ALTER TABLE `f_kurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT für Tabelle `f_teilnehmer`
--
ALTER TABLE `f_teilnehmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
