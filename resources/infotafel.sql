-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Feb 2022 um 16:24
-- Server-Version: 10.4.20-MariaDB
-- PHP-Version: 8.0.8

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
  `uuid` varchar(255) NOT NULL,
  `titel` varchar(255) NOT NULL DEFAULT 'Neuer Titel',
  `description` varchar(255) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam',
  `style` int(1) NOT NULL DEFAULT 1,
  `color` varchar(255) NOT NULL DEFAULT 'rgba(18, 115, 235, 1)',
  `icon` varchar(8) NOT NULL DEFAULT '&#xedce',
  `row` int(1) NOT NULL DEFAULT 1,
  `background` varchar(255) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `termin` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cards`
--

INSERT INTO `cards` (`id`, `uuid`, `titel`, `description`, `style`, `color`, `icon`, `row`, `background`, `update_date`, `create_date`, `termin`) VALUES
(2, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 1, NULL, '2022-01-31 13:23:05', '2022-01-25 09:52:32', '2022-09-25'),
(3, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 1, NULL, '2022-01-31 13:23:03', '2022-01-25 09:52:34', '2022-09-25'),
(4, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 1, NULL, '2022-01-31 13:23:00', '2022-01-25 09:54:49', '2022-09-25'),
(5, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 5, 'rgba(18, 115, 235, 1)', '&#xedce', 2, NULL, '2022-01-31 13:22:58', '2022-01-25 09:55:07', '2022-12-03'),
(6, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xf069', 2, '', '2022-01-25 13:08:04', '2022-01-25 09:55:07', '2022-09-25'),
(7, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 2, '', '2022-01-25 10:25:22', '2022-01-25 09:55:21', '2022-09-25'),
(8, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 2, NULL, '2022-01-31 13:22:52', '2022-01-25 09:55:21', '2022-09-25'),
(9, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 4, 'rgba(18, 115, 235, 1)', '&#xedce', 3, NULL, '2022-01-31 13:22:50', '2022-01-25 09:56:36', '2022-09-25'),
(10, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 2, 'rgba(18, 115, 235, 1)', '&#xedce', 3, NULL, '2022-01-31 13:22:46', '2022-01-25 09:56:36', '2022-09-25'),
(11, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 3, 'rgba(20, 193, 89, 1)', '&#xedce', 3, NULL, '2022-01-31 13:22:43', '2022-01-25 09:56:36', '2022-09-25'),
(12, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 3, NULL, '2022-01-31 13:22:40', '2022-01-25 09:56:36', '2022-09-25'),
(13, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:35', '2022-01-25 09:56:36', '2022-09-25'),
(14, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:27', '2022-01-25 09:56:36', '2022-09-25'),
(15, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:19', '2022-01-25 09:56:36', '2022-09-25'),
(16, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:18', '2022-01-25 09:56:36', '2022-09-25'),
(17, '', 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:14', '2022-01-25 09:56:36', '2022-09-25'),
(114, 'Yuk7rcRwbf54qQywEQljYeEUSNT2aI', 'php', 'rg', 4, '#ffffff', '', 1, 'Yuk7rcRwbf54qQywEQljYeEUSNT2aI.jpg', '2022-02-07 08:39:43', '2022-02-07 08:39:43', ''),
(115, 'y6xxdjTvrW3W3f7S0N4nEQ3FTKa5Pd', 'php', 'rg', 4, '#ffffff', '', 1, 'y6xxdjTvrW3W3f7S0N4nEQ3FTKa5Pd.jpg', '2022-02-07 08:43:43', '2022-02-07 08:43:43', ''),
(116, 't8JHCCyLkD5RBNELGLFqGEML27wBTN', 'php', 'rg', 4, '#ffffff', '', 1, 't8JHCCyLkD5RBNELGLFqGEML27wBTN.jpg', '2022-02-07 08:43:50', '2022-02-07 08:43:50', ''),
(117, 'g6HqzCLtFq6kV0vFgTUoDunYcYLJof', 'php', 'rg', 4, '#ffffff', '', 1, 'g6HqzCLtFq6kV0vFgTUoDunYcYLJof.jpg', '2022-02-07 09:58:40', '2022-02-07 09:58:40', ''),
(118, 'ImSRNmyllEqKvrsHdffHYxtUfDbn0D', 'php', 'rg', 4, '#ffffff', '', 1, 'ImSRNmyllEqKvrsHdffHYxtUfDbn0D.jpg', '2022-02-07 10:09:33', '2022-02-07 10:09:33', ''),
(119, 'hVfNmzn2gWt7d6FRZFzwEXRaOkM7Dy', 'Neu Card', 'wsrrwervbwevwervwervwerv', 1, '#ffffff', '', 2, 'hVfNmzn2gWt7d6FRZFzwEXRaOkM7Dy.png', '2022-02-07 13:37:28', '2022-02-07 13:37:28', ''),
(120, 'ccfht2P0wVlvLTyYZ1A6nbpMyB0gR9', 'Neue Kachel', 'edghertherthrthrth', 2, '#ff7300', '', 2, 'ccfht2P0wVlvLTyYZ1A6nbpMyB0gR9.jpg', '2022-02-07 14:58:57', '2022-02-07 14:58:57', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `img` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `icon` int(11) NOT NULL,
  `Titel` int(11) NOT NULL,
  `Text` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('Wegpunkt', '&#xebd8');

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
  `style` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `style`
--

INSERT INTO `style` (`style`, `name`, `description`) VALUES
(1, 'Default', 'gergerg'),
(2, 'ergergerg', ''),
(3, 'rfgedrg', 'ergerg'),
(4, 'wsewefwf', ''),
(5, 'Kalender', 'Kalender style');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `uuid`, `username`, `password`) VALUES
(1, '00', 'root', '1234'),
(25, '10', 'Bong Lanz', '$2y$10$YYXBKRKDEX8RajUuIUFHWuje41UofEIkchjFpdrOnYk2puXNwtFTq'),
(32, 'O2DkYodajfL8UEORNhp5', 'Diego Grisby', '$2y$10$eU2EA4MorRoEInE0VkJu6ugVdVaFQayPC9eLyWmIlMpGzbm8OecM2'),
(33, 'I$UZ7323scwqpD3IF8pi', 'Elroy Pepper', '$2y$10$lTd1IO/bkhCYKEQbsJ5JO.uYTYTJMpwFh3mxaehoA8KyviUqWcc8u'),
(34, 'Tutk3:gNQEpeYe3aXGC8', 'Johnathon Center', '$2y$10$7DYt7Ib6BxMRxy7.DbLb2uIAlAhpxtGAHbHQCbQ.NsrgcasT12A1q'),
(35, 'V4PBJA7f6jh?L3xufini', 'Rubi Volkman', '$2y$10$MVqHVBIIY7FcubRMziAnXerebILEgO4kA.mhnPR5KsLOYSmciwKMq'),
(36, '&sznLq3dYwvM?UDC0EF6', 'Samatha Block', '$2y$10$ZCyMbWKgFArjTIpWEvP2gemEX.XYl.eG2KKtq5ptNisXb1BW25pYe'),
(37, 'ThA#?0EQRWV0b1b:4foJ', 'Tama Block', '$2y$10$pwMRLjmlvjQo95oITMUGWOKWXuwbimQkWNtT/IPBEykvn157tKkxS'),
(38, 'Ka8ZnsgMEcE2#D7NOmYV', 'Yuri Menjivar', '$2y$10$Fz52Fm0fhl2cIM1fPv14peooZohPyWKLe34jpZTa5bm4wE6bzPbBq'),
(39, 'K4F?g#N&RK38Pd$:?xqb', 'Camellia Latson', '$2y$10$bFLNAlyWjyDywvBJNdct7OCYBmy2pPcrkV88YOpg256InDUKq8My.'),
(40, '?MNlAtLBJ#vGU92Ezty2', 'Lloyd Michaud', '$2y$10$F98817Ie0XW2shAHWJOQi.TKQnVDPoZOlREIJ.HnwLzXs8BxUiY1q');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `slider`
--
ALTER TABLE `slider`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT für Tabelle `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
