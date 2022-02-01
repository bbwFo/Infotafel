-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Feb 2022 um 16:17
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
-- Tabellenstruktur für Tabelle `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
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

INSERT INTO `cards` (`id`, `titel`, `description`, `style`, `color`, `icon`, `row`, `background`, `update_date`, `create_date`, `termin`) VALUES
(2, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 1, NULL, '2022-01-31 13:23:05', '2022-01-25 09:52:32', '2022-09-25'),
(3, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 1, NULL, '2022-01-31 13:23:03', '2022-01-25 09:52:34', '2022-09-25'),
(4, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 1, NULL, '2022-01-31 13:23:00', '2022-01-25 09:54:49', '2022-09-25'),
(5, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 5, 'rgba(18, 115, 235, 1)', '&#xedce', 2, NULL, '2022-01-31 13:22:58', '2022-01-25 09:55:07', '2022-12-03'),
(6, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xf069', 2, '', '2022-01-25 13:08:04', '2022-01-25 09:55:07', '2022-09-25'),
(7, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 2, '', '2022-01-25 10:25:22', '2022-01-25 09:55:21', '2022-09-25'),
(8, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 2, NULL, '2022-01-31 13:22:52', '2022-01-25 09:55:21', '2022-09-25'),
(9, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 4, 'rgba(18, 115, 235, 1)', '&#xedce', 3, NULL, '2022-01-31 13:22:50', '2022-01-25 09:56:36', '2022-09-25'),
(10, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 2, 'rgba(18, 115, 235, 1)', '&#xedce', 3, NULL, '2022-01-31 13:22:46', '2022-01-25 09:56:36', '2022-09-25'),
(11, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 3, 'rgba(20, 193, 89, 1)', '&#xedce', 3, NULL, '2022-01-31 13:22:43', '2022-01-25 09:56:36', '2022-09-25'),
(12, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 3, NULL, '2022-01-31 13:22:40', '2022-01-25 09:56:36', '2022-09-25'),
(13, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:35', '2022-01-25 09:56:36', '2022-09-25'),
(14, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:27', '2022-01-25 09:56:36', '2022-09-25'),
(15, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:19', '2022-01-25 09:56:36', '2022-09-25'),
(16, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:18', '2022-01-25 09:56:36', '2022-09-25'),
(17, 'Neuer Titel', 'Lorem ipsum dolor sit amet, rmod tempor invidunt ut labore et dolore mwshefbewzeduzeb wqwewefzb wefb zwebfuzwefn uowe fzewb ecubnw uecwu ecuiowec ws uzwb efzwbe ufzbw eufbw uefb wueagna aliquyam', 1, 'rgba(18, 115, 235, 1)', '&#xedce', 4, '', '2022-01-31 13:22:14', '2022-01-25 09:56:36', '2022-09-25'),
(55, 'jejejejejeje', 'aergaqrgargaerg', 3, '#ec6fdb', '', 4, 'thumb-1920-979683.jpg', '2022-01-31 15:03:16', '2022-01-31 15:03:16', ''),
(56, 'Geile kachel', 'Nice scheiß!', 5, '#ffffff', '', 2, 'thumb-1920-979683.jpg', '2022-01-31 15:07:00', '2022-01-31 15:07:00', '2022-02-06'),
(57, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:03:09', '2022-02-01 10:03:09', '2022-03-13'),
(58, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:17', '2022-02-01 10:05:17', '2022-03-13'),
(59, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:18', '2022-02-01 10:05:18', '2022-03-13'),
(60, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:19', '2022-02-01 10:05:19', '2022-03-13'),
(61, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:19', '2022-02-01 10:05:19', '2022-03-13'),
(62, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:19', '2022-02-01 10:05:19', '2022-03-13'),
(63, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:19', '2022-02-01 10:05:19', '2022-03-13'),
(64, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:19', '2022-02-01 10:05:19', '2022-03-13'),
(65, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:19', '2022-02-01 10:05:19', '2022-03-13'),
(66, 'knödel', 'knegge', 5, '#f31212', '', 2, '', '2022-02-01 10:05:19', '2022-02-01 10:05:19', '2022-03-13');

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
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'root', '1234');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
