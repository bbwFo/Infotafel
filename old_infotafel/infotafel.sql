-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Dez 2021 um 16:31
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
-- Tabellenstruktur für Tabelle `content`
--

CREATE TABLE `content` (
  `id` int(255) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `slider_id` int(1) NOT NULL,
  `style` int(1) NOT NULL,
  `link` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `badge` int(1) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL DEFAULT '.file/test.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `item`
--

INSERT INTO `item` (`id`, `slider_id`, `style`, `link`, `tag`, `titel`, `text`, `badge`, `img`) VALUES
(1, 1, 0, '', '2', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, <b>sed diam voluptua</b>. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(2, 1, 0, '', '2', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 1, '.files/test.png'),
(3, 1, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(4, 1, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(5, 2, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 1, '.files/test.png'),
(6, 2, 1, '', '4', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor. <br><li>Lorem ipsum dolor sit amet</li><br><li>Lorem ipsum dolor sit amet</li><br><li>Lorem ipsum dolor sit amet</li><br><li>Lorem ipsum dolor sit amet</li>', 1, '.files/test.png'),
(7, 2, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(8, 2, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(9, 3, 0, '', '5', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 1, '.files/test.png'),
(10, 3, 2, '', '3', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 1, '.files/test.png'),
(11, 3, 0, '', '2', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 1, '.files/test.png'),
(12, 3, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(13, 4, 0, '', '3', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(14, 4, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(15, 4, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png'),
(16, 4, 0, '', '1', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren', 0, '.files/test.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `slider`
--

CREATE TABLE `slider` (
  `id` int(255) NOT NULL,
  `row` int(1) NOT NULL,
  `size` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `slider`
--

INSERT INTO `slider` (`id`, `row`, `size`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tags`
--

INSERT INTO `tags` (`id`, `name`, `color`, `icon`) VALUES
(1, 'wichtig', '#F44336', 'icon-new_releases'),
(2, 'schule', '#1273EB', 'icon-school'),
(3, 'essen', '#FF851B', 'icon-fastfood'),
(4, 'termin', '#14c159', 'icon-calendar'),
(5, 'code', '#B10DC9', 'icon-embed');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `steam_id` varchar(255) NOT NULL,
  `steam_username` varchar(255) NOT NULL,
  `discord` varchar(255) NOT NULL,
  `xp` int(255) NOT NULL DEFAULT 0,
  `coins` int(255) NOT NULL DEFAULT 0,
  `diamonds` int(255) NOT NULL DEFAULT 0,
  `code` varchar(255) NOT NULL,
  `aktivierung` int(1) NOT NULL DEFAULT 0,
  `bann` int(1) NOT NULL DEFAULT 0,
  `role` int(1) NOT NULL DEFAULT 1,
  `ip` varchar(255) NOT NULL,
  `machine_id` varchar(255) NOT NULL,
  `last_change` datetime NOT NULL DEFAULT current_timestamp(),
  `erstellt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `user_image`, `password`, `email`, `steam_id`, `steam_username`, `discord`, `xp`, `coins`, `diamonds`, `code`, `aktivierung`, `bann`, `role`, `ip`, `machine_id`, `last_change`, `erstellt`) VALUES
(1, 'Askylan', '', '$2y$10$NGuWX/c82qhs6u08ThL9AuSEk3a4XQ2P/aMwGhVhx6sEgOTmmLUFq', 'askylan@gmail.com', '', '', '', 300, 100, 25, '1337-1337-1337', 1, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Josie', '', '$2y$10$JntWpZUO03jbEyq9lbVLM.CZ5iUq3cfaWpaRIDzTJXVKUSdK786g.', 'josie@gmail.com', '', '', '', 0, 0, 0, '3924-5386-7787', 1, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'alex', '', '$2y$10$KDj8GH2e27gB71EooPy2J.5gvyVsuYUwodQ5OlpW.OacJbPzJ0T8e', 'alex@gmail.com', '', '', '', 0, 0, 0, '3637-9607-5714', 1, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'alexi', '', '$2y$10$OQhZlR8lbs/6/Rd704SAbOfcSqRyPKrAT4s/tyKICFwrqXud0OA6i', 'alex@gmail.de', '', '', '', 0, 0, 0, '8146-1960-6993', 0, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '2rf23', '', '$2y$10$PAX4Q6JnVqDDd99cXQPS7OCss73cxfFl/tzgUZ6icG1pgtJSLp.22', '23r23r2', '', '', '', 0, 0, 0, '9249-0388-3287', 0, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'knödel', '', '$2y$10$4FZpvTe/YnIyu.wVZO6r6ueBcGnVxmP6GxTqpZBZgKnUaEDeddYnK', 'knödel@gmail.com', '', '', '', 0, 0, 0, '0668-7462-1081', 0, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Jake', '', '$2y$10$Avudd8ybXydwf6fztkMX.OHKHpQ/3T1K0BRhZnZnXmTU1yRatjDL2', 'jake@gmail.com', '102895612785123460187234', '0', 'jakw#1337', 0, 0, 0, '7965-9175-0100', 0, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'asrerer', '', '$2y$10$Nc2vCNFYpmi2wqvCLbQiWe3yHBCHB/XTMnH2Crfu.iVrRyeQ8wRk.', 'erferferferfer', 'erferfer', '0', 'ferferf', 0, 0, 0, '3211-9594-1291', 0, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'pskylan', '', '$2y$10$/ABsMAfYfe50giqAcD05XeEtqMvjHaH/CJJBDn/6K2i3ORx6Sx0m.', 'maxmerkl.drive@gmail.com', '2389745802', '0', '84567233426787654', 0, 0, 0, '9544-0032-8636', 0, 0, 1, '', '', '2021-12-13 16:29:46', '0000-00-00 00:00:00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT für Tabelle `content`
--
ALTER TABLE `content`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
