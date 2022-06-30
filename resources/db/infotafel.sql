-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Jun 2022 um 13:04
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `infotafel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `areas`
--

CREATE TABLE `areas` (
  `row` int(10) NOT NULL,
  `items` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `areas`
--

INSERT INTO `areas` (`row`, `items`, `name`) VALUES
(1, 1, 'drfgdrgdrg'),
(2, 2, 'wergwergwerg'),
(3, 3, 'awergwergerg'),
(4, 2, 'srgdrgdrtgdrgdr');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `cuid` varchar(20) NOT NULL,
  `titel` varchar(255) NOT NULL DEFAULT 'Neuer Titel',
  `description` varchar(255) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam',
  `style` int(1) NOT NULL DEFAULT 1,
  `color` varchar(255) NOT NULL DEFAULT 'rgba(18, 115, 235, 1)',
  `icon` varchar(8) NOT NULL DEFAULT '&#xedce',
  `row` int(1) NOT NULL DEFAULT 1,
  `background` varchar(255) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `termin` varchar(10) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `html` varchar(4000) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cards`
--

INSERT INTO `cards` (`id`, `cuid`, `titel`, `description`, `style`, `color`, `icon`, `row`, `background`, `update_date`, `create_date`, `termin`, `pdf`, `html`, `url`) VALUES
(20, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, '#8300b3', '', 1, '2.jpg', '2022-06-01 14:00:14', '2022-05-24 12:50:18', '', 'doku.pdf', 'ergerg', ''),
(21, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 2, '#f2ce1c', '', 2, '1.jpg', '2022-06-01 10:20:19', '2022-05-24 12:50:46', '2022-06-01', '', 'tkzjserjsrj', ''),
(22, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 3, '#ff3838', '', 2, '3.jpg', '2022-06-01 09:30:26', '2022-05-24 12:50:46', '', 'doku.pdf', NULL, ''),
(27, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 4, '#0084ff', '', 3, '4.jpg', '2022-06-01 14:06:18', '2022-05-24 12:51:17', '', '', 'Lorem ipsum dolor sit amet, rmod tempor invidu', ''),
(28, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, '#b700fa', '', 3, '5.jpg', '2022-06-02 13:44:20', '2022-05-24 12:51:17', '', 'doku.pdf', 'egtetgawerg', ''),
(29, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 3, '#ff9500', '', 3, '6.jpg', '2022-06-02 14:11:41', '2022-05-24 12:51:17', '', '', 'wergawergwergerg', 'https://www.sternfreunde-kelheim.de/'),
(30, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 3, '#71e561', '', 4, '7.jpg', '2022-06-20 12:08:51', '2022-05-24 12:51:34', '', '', 'aekhrgaerghaerthaeth', 'resources/airband/index.php'),
(31, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 5, '#0080ff', '', 4, '8.jpg', '2022-06-01 07:53:18', '2022-05-24 12:51:34', '2022-05-30', '', 'Na was schaust du?', ''),
(704279109, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, '#000000', '', 2, '8.jpg', '2022-06-01 14:01:38', '2022-06-01 07:13:50', '', '', 'fgbwh', ''),
(1822480021, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, '#000000', '', 4, '8.jpg', '2022-06-01 14:01:41', '2022-06-01 07:14:46', '', '', 'Hello', ''),
(1984394540, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, '#000000', '', 3, '8.jpg', '2022-06-01 14:01:44', '2022-06-01 07:14:22', '', '', 'Hallo', ''),
(2147483647, '', 'Hier könnte ihre Werbung stehen!', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, '#000000', '', 1, '8.jpg', '2022-06-01 14:01:50', '2022-06-01 07:13:22', '', '', 'hallo', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `icons`
--

CREATE TABLE `icons` (
  `name` varchar(255) NOT NULL,
  `unicode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `icons`
--

INSERT INTO `icons` (`name`, `unicode`) VALUES
('Special', '&#xedce'),
('Schule', '&#xf069'),
('Kalender', '&#xeb7f'),
('Bilder', '&#xebc2'),
('Labor', '&#xebc9'),
('Info', '&#xebc6'),
('Wegpunkt', '&#xebd8'),
('Forum', '&#xee1d'),
('Wegpunkt-Pin', '&#xee22'),
('Flage', '&#xeba9'),
('Herz', '&#xe9f5'),
('Herzen', '&#xedb2'),
('Zeitung', '&#xe91f'),
('Bücher', '&#xe93b'),
('Stern', '&#xe9f4'),
('Archiv', '&#xeb6a'),
('Gaming', '&#xebb3'),
('Megaphone', '&#xebe5'),
('Pin', '&#xebfc'),
('Papierflieger', '&#xebf8'),
('Rakete', '&#xec0d'),
('Laden', '&#xec16'),
('Email', '&#xee3e');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `position` int(1) NOT NULL,
  `size` int(1) NOT NULL DEFAULT 1,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `style` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `style`
--

INSERT INTO `style` (`id`, `style`, `name`, `description`) VALUES
(1, 1, 'Default Typ1', 'Akzent unten & Icon im Textfeld.'),
(2, 2, 'Default Typ2', 'Akzent unten & Icon in Ecke ober links.'),
(3, 3, 'Everyone', 'Akzent auf allen Seiten & Icon in ecke oben links.'),
(4, 4, 'Alert', 'Blinkender Akzent auf allen Seiten.'),
(5, 5, 'Kalender', 'Akzent unten & Kalender');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `nachname` varchar(150) NOT NULL,
  `vorname` varchar(150) NOT NULL,
  `akuerzel` varchar(2) NOT NULL,
  `strasse` varchar(150) DEFAULT NULL,
  `plz` int(5) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `test`
--

INSERT INTO `test` (`id`, `nachname`, `vorname`, `akuerzel`, `strasse`, `plz`, `telefon`) VALUES
(1, 'ergerg', 'argargargerg', 'rr', 'adthathaeth', 23444, '5472345134'),
(2, 'ergerg', 'adfv<sv<c', 'rr', 'adthathaeth', 23444, '5472345134'),
(3, 'ergerg', 'adfv<sv<c', 'rr', 'adthathaeth', 23444, '5472345134'),
(4, 'ergerg', 'adfv<sv<c', 'rr', 'adthathaeth', 23444, '5472345134'),
(5, 'ergerg', 'adfv<sv<c', 'rr', 'adthathaeth', 23444, '5472345134'),
(6, 'ergerg', 'adfv<sv<c', 'rr', 'adthathaeth', 23444, '5472345134'),
(7, 'ergerg', 'adfv<sv<c', 'rr', 'adthathaeth', 23444, '5472345134'),
(8, 'ergerg', 'adfv<sv<c', 'rr', 'adthathaeth', 23444, '5472345134');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `uuid`, `username`, `password`, `update_date`, `create_date`) VALUES
(1, '00', 'root', '1234', '2022-02-25 06:31:25', '2022-02-24 07:13:45'),
(25, '10', 'Bong Lanz', '$2y$10$YYXBKRKDEX8RajUuIUFHWuje41UofEIkchjFpdrOnYk2puXNwtFTq', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(32, 'O2DkYodajfL8UEORNhp5', 'Diego Grisby', '$2y$10$eU2EA4MorRoEInE0VkJu6ugVdVaFQayPC9eLyWmIlMpGzbm8OecM2', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(33, 'I$UZ7323scwqpD3IF8pi', 'Elroy Pepper', '$2y$10$lTd1IO/bkhCYKEQbsJ5JO.uYTYTJMpwFh3mxaehoA8KyviUqWcc8u', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(34, 'Tutk3:gNQEpeYe3aXGC8', 'Johnathon Center', '$2y$10$7DYt7Ib6BxMRxy7.DbLb2uIAlAhpxtGAHbHQCbQ.NsrgcasT12A1q', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(35, 'V4PBJA7f6jh?L3xufini', 'Rubi Volkman', '$2y$10$MVqHVBIIY7FcubRMziAnXerebILEgO4kA.mhnPR5KsLOYSmciwKMq', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(36, '&sznLq3dYwvM?UDC0EF6', 'Samatha Block', '$2y$10$ZCyMbWKgFArjTIpWEvP2gemEX.XYl.eG2KKtq5ptNisXb1BW25pYe', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(37, 'ThA#?0EQRWV0b1b:4foJ', 'Tama Block', '$2y$10$pwMRLjmlvjQo95oITMUGWOKWXuwbimQkWNtT/IPBEykvn157tKkxS', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(38, 'Ka8ZnsgMEcE2#D7NOmYV', 'Yuri Menjivar', '$2y$10$Fz52Fm0fhl2cIM1fPv14peooZohPyWKLe34jpZTa5bm4wE6bzPbBq', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(39, 'K4F?g#N&RK38Pd$:?xqb', 'Camellia Latson', '$2y$10$bFLNAlyWjyDywvBJNdct7OCYBmy2pPcrkV88YOpg256InDUKq8My.', '2022-02-24 07:13:45', '2022-02-24 07:13:45'),
(40, '?MNlAtLBJ#vGU92Ezty2', 'Lloyd Michaud', '$2y$10$F98817Ie0XW2shAHWJOQi.TKQnVDPoZOlREIJ.HnwLzXs8BxUiY1q', '2022-02-24 07:13:45', '2022-02-24 07:13:45');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT für Tabelle `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
