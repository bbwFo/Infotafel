-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Feb 2022 um 12:25
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
(277, 'V6aqlTcjngYKvsnl2PZsA4Qee7eU4Q', 'Neue Kachel 1337', 'egjkernkögerknerjfnejkrfkerferf', 2, '#ff6600', '', 2, 'V6aqlTcjngYKvsnl2PZsA4Qee7eU4Q.jpg', '2022-02-10 09:15:48', '2022-02-10 09:15:48', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `html` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `content`
--

INSERT INTO `content` (`id`, `uuid`, `pdf`, `url`, `html`) VALUES
(1, 'rmDtOKf7WPJfpXuJ9NU8TZW088TBHg', 'rmDtOKf7WPJfpXuJ9NU8TZW088TBHg.pdf', '', ''),
(2, 'x2qtS8BhXAn1vXmJTcg5v2Vwlq1hM3', '', '', ''),
(3, 'CCTczzNiu2wbuTJhgpOrCqARVMziMy', '', '', ''),
(4, 'Sxgefa5TyptsFaofcVvit4w2US6CCL', 'Sxgefa5TyptsFaofcVvit4w2US6CCL.pdf', '', ''),
(5, 'nNz19uIYkjPosiuvNAMqGVsEnF0q8U', 'nNz19uIYkjPosiuvNAMqGVsEnF0q8U.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(6, 'o58QWDx4IGEhjZ4Wkfu7vhHy2aDMZz', 'o58QWDx4IGEhjZ4Wkfu7vhHy2aDMZz.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(7, 'mfk2U0cUNoofBDfLIYkfVCNGKCexVK', 'mfk2U0cUNoofBDfLIYkfVCNGKCexVK.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(8, '1OtAPMcu8bs9iyVW6HK3aLleT7BjtK', '1OtAPMcu8bs9iyVW6HK3aLleT7BjtK.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(9, '23xw1yhbX2JRKg08PtdGykFV6rZM1d', '23xw1yhbX2JRKg08PtdGykFV6rZM1d.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(10, 'jOjKrBj2pCr8iutM0eLdFi19K09T7l', 'jOjKrBj2pCr8iutM0eLdFi19K09T7l.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(11, 'pjSzF1z4BwefdGqqfMa83JgpPKF0OB', 'pjSzF1z4BwefdGqqfMa83JgpPKF0OB.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(12, 'K2LL5tnz3RKP9Qn557yiNk298utGCN', 'K2LL5tnz3RKP9Qn557yiNk298utGCN.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(13, '5ExrNUWlG5vRMI8ZmUPKAffjKUg3MS', '5ExrNUWlG5vRMI8ZmUPKAffjKUg3MS.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(14, 'yoj5qQmNtBwU0fabuoXiwBuweFIjcg', 'yoj5qQmNtBwU0fabuoXiwBuweFIjcg.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(15, 'vmSHommRTSnkLabpjDwUforIFeeE1f', 'vmSHommRTSnkLabpjDwUforIFeeE1f.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(16, 'CIfP7yo6FWKFxRaPqM7KJGkbyMbPJF', 'CIfP7yo6FWKFxRaPqM7KJGkbyMbPJF.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(17, 'LJtq9rD6Q6oLYWlOzYeUS9psC1K1U6', 'LJtq9rD6Q6oLYWlOzYeUS9psC1K1U6.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(18, 'BFfMFIfrPKWd0nBM0Mr3d4qqSMjsvU', 'BFfMFIfrPKWd0nBM0Mr3d4qqSMjsvU.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(19, 'CkhwnmJSgkdwikzB43cKjWorLIifKT', 'CkhwnmJSgkdwikzB43cKjWorLIifKT.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(20, 'ZluSs95zA1uR89bqeG8MevJ2dq5dn1', 'ZluSs95zA1uR89bqeG8MevJ2dq5dn1.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(21, 'hYfoipniSJrjX8Yica9cAGSeZ58Kf6', 'hYfoipniSJrjX8Yica9cAGSeZ58Kf6.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(22, 'xQhcmqYJab8jxgdq21IGiTU0rIj89X', 'xQhcmqYJab8jxgdq21IGiTU0rIj89X.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(23, 'jy3LyX3A8vyKgSIXQSlB8ofFN2Fi9P', 'jy3LyX3A8vyKgSIXQSlB8ofFN2Fi9P.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(24, 'r37CrnGXZshybE2U2iKGPzPoOmkCm9', 'r37CrnGXZshybE2U2iKGPzPoOmkCm9.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(25, '1PrgQwmfZPvnxCoiGhnACPw09h84Ml', '1PrgQwmfZPvnxCoiGhnACPw09h84Ml.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(26, 'ukbrMSxkVkOY1trO9JOpgYrfU6WPaD', 'ukbrMSxkVkOY1trO9JOpgYrfU6WPaD.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(27, 'owbM2ltnXrBKXDghZF4qx0dArIyyAx', 'owbM2ltnXrBKXDghZF4qx0dArIyyAx.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(28, 'fX6QsoSIKFohz0VXlPBDytzqnyIBWv', 'fX6QsoSIKFohz0VXlPBDytzqnyIBWv.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(29, 'wzKruXjiWO4sfPGySwv0HLbLqOG7mH', 'wzKruXjiWO4sfPGySwv0HLbLqOG7mH.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(30, 'VzEEMBUadM5NfaVtNYe0SzOdWfk068', 'VzEEMBUadM5NfaVtNYe0SzOdWfk068.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(31, 'Nqw51uS1o18amswBvPcklFLNDVaQbz', 'Nqw51uS1o18amswBvPcklFLNDVaQbz.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(32, 'Du1XzsruUrK7ICbjahkMgo5uCiPmQm', 'Du1XzsruUrK7ICbjahkMgo5uCiPmQm.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(33, 'Fwl5f0rFYmeRc6zxwMb900hfR6eoad', 'Fwl5f0rFYmeRc6zxwMb900hfR6eoad.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(34, '8UmGF5Cl8cj4rtzI0j6EXj1YdFFQQn', '8UmGF5Cl8cj4rtzI0j6EXj1YdFFQQn.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(35, 'CN2PJshNZb3QHQ0IkgJ61xlz3FYBuy', 'CN2PJshNZb3QHQ0IkgJ61xlz3FYBuy.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(36, 'RQK0wnCVDdByNlqkWK82az6MNnxsfF', 'RQK0wnCVDdByNlqkWK82az6MNnxsfF.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(37, 'EJF1mCsKcXD1YplSNJiT7AWP1ACalx', 'EJF1mCsKcXD1YplSNJiT7AWP1ACalx.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(38, 'o2hwocYPEunGRIaJGmQ0gfQckmya7b', 'o2hwocYPEunGRIaJGmQ0gfQckmya7b.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(39, '3KR18Tw93YZQAqfsLxiXB7TxlwMU1S', '3KR18Tw93YZQAqfsLxiXB7TxlwMU1S.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(40, 'yQrHSBPrkkeMc91ViTDOwPwWSuHGLZ', 'yQrHSBPrkkeMc91ViTDOwPwWSuHGLZ.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(41, 'KCyga6MpBgF0zlFyi59SZ3aOprArQn', 'KCyga6MpBgF0zlFyi59SZ3aOprArQn.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(42, 'ZI5IdRPOPsQl9w0hw1vpQVcLr7uT8T', 'ZI5IdRPOPsQl9w0hw1vpQVcLr7uT8T.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(43, 'onaWV2oUKf4051l4vpDEKS59MsAHnQ', 'onaWV2oUKf4051l4vpDEKS59MsAHnQ.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(44, '4O2z3wCqJ7FbRWU281Sk2izt9A7yiW', '4O2z3wCqJ7FbRWU281Sk2izt9A7yiW.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(45, 'N6UNzzhGDhhUFwvEwgTmHxgAojqPDV', 'N6UNzzhGDhhUFwvEwgTmHxgAojqPDV.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(46, 'rRWUfhrUkElJccYusTknYapPgeiHy6', 'rRWUfhrUkElJccYusTknYapPgeiHy6.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(47, '6glaetOdxbjbemkRAKkPz8NShsolWn', '6glaetOdxbjbemkRAKkPz8NShsolWn.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(48, 'MxLuIVnErPa98hcycdqliQ7LCZ8NUI', 'MxLuIVnErPa98hcycdqliQ7LCZ8NUI.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(49, 'BJbZyLpMchodyZ3fPCyxSlBRchG5jP', 'BJbZyLpMchodyZ3fPCyxSlBRchG5jP.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(50, 'mr9GaN59quidoLY2yCoZmRAgZVmEqj', 'mr9GaN59quidoLY2yCoZmRAgZVmEqj.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(51, 'he4GznpHETFP1y91Tm58DaDGWAVHtg', 'he4GznpHETFP1y91Tm58DaDGWAVHtg.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(52, '6PSqtjEs7AZj7c41TLfscwmAAQZQbI', '6PSqtjEs7AZj7c41TLfscwmAAQZQbI.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(53, 'YJ0ddlDbQzniXQBGjSWBk1kTOKRvf0', 'YJ0ddlDbQzniXQBGjSWBk1kTOKRvf0.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(54, 'f2s32vItS6owS4W7pQxwVqRb8ulNTl', 'f2s32vItS6owS4W7pQxwVqRb8ulNTl.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(55, 'lARssocPY3nj2K9tknHXuYd0FtjpI2', 'lARssocPY3nj2K9tknHXuYd0FtjpI2.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(56, 'BvgYdenCfSrYetVsrNGdBGRGPA6sRf', 'BvgYdenCfSrYetVsrNGdBGRGPA6sRf.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(57, 'LQkcw0yd589YUiplDeTCNwaTqdvN3f', 'LQkcw0yd589YUiplDeTCNwaTqdvN3f.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(58, 'uJoy2aV5VM9lL3FMko2QhSrPDJgDFE', 'uJoy2aV5VM9lL3FMko2QhSrPDJgDFE.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(59, 'dAf36F5e2X5yVhyBHy2zuUn52mFuu4', 'dAf36F5e2X5yVhyBHy2zuUn52mFuu4.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(60, 'DuqxrgViw84VQ2F7pIV5oz6qyyusvW', 'DuqxrgViw84VQ2F7pIV5oz6qyyusvW.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(61, 'pXveHy1WVVgURF3k3FAm1BwcpnePBc', 'pXveHy1WVVgURF3k3FAm1BwcpnePBc.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(62, 'M1q7t224RpQm5VPmljmrRo0WykJ1Qm', 'M1q7t224RpQm5VPmljmrRo0WykJ1Qm.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(63, 'nq7J1TkNAHjfQELDmO7IVLAsRnpNeL', 'nq7J1TkNAHjfQELDmO7IVLAsRnpNeL.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(64, 'se2auSVRjoCQE3x7w2gwxoirfgeeIh', 'se2auSVRjoCQE3x7w2gwxoirfgeeIh.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(65, '2nSLOAspqA59FmZEVc3ggd2CIuZa9F', '2nSLOAspqA59FmZEVc3ggd2CIuZa9F.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(66, '3FETlRKI7Uj3jvFGcfJqHGvuaI8Prz', '3FETlRKI7Uj3jvFGcfJqHGvuaI8Prz.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(67, 'JhyepfPoOBXShLilDBxUt740njGqLD', 'JhyepfPoOBXShLilDBxUt740njGqLD.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(68, 'EcDYw1bRtRTNUhtbW6ucWmeKSw9m5R', 'EcDYw1bRtRTNUhtbW6ucWmeKSw9m5R.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(69, '3GNAZxyLI302WFvPkza8pNMYjeIpny', '3GNAZxyLI302WFvPkza8pNMYjeIpny.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(70, '2JwLe0AyXWGPkXWQiExWw5a0NvWxJi', '2JwLe0AyXWGPkXWQiExWw5a0NvWxJi.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(71, '5bZGrmzvStThGKYQWPtifa3rkiPKJc', '5bZGrmzvStThGKYQWPtifa3rkiPKJc.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(72, 'A0xc852La0JQiHOZ0pjDb0HCHA1Yi7', 'A0xc852La0JQiHOZ0pjDb0HCHA1Yi7.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(73, 'lnWft6Qj92dw4VE3AYLi2xjn5KGOW8', 'lnWft6Qj92dw4VE3AYLi2xjn5KGOW8.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(74, 'CHh9pNeNYLjYTelj5H8MtXFSvccNCy', 'CHh9pNeNYLjYTelj5H8MtXFSvccNCy.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(75, 'INPk5NZEat0Ua8SyIAMOxlxE747iBu', 'INPk5NZEat0Ua8SyIAMOxlxE747iBu.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(76, 'tBBjSlJluN6sfw4BHvLrfVprdLVOTv', 'tBBjSlJluN6sfw4BHvLrfVprdLVOTv.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(77, 'q5LwhE3RUXNB0EX7RFN6kwIwA3SzE8', 'q5LwhE3RUXNB0EX7RFN6kwIwA3SzE8.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(78, 'dpqVPTTOKuI5fisrYrPXmHYwul7uWF', 'dpqVPTTOKuI5fisrYrPXmHYwul7uWF.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(79, 'K2IMALGbBJkEurxtz2u7EZwlf3Ia5G', 'K2IMALGbBJkEurxtz2u7EZwlf3Ia5G.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(80, 'VCMXigSWx7aS04EfncLmhvQOUGIvvR', 'VCMXigSWx7aS04EfncLmhvQOUGIvvR.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(81, 'bVmsSbO3dALleczgzfk9Bg9kLW6w37', 'bVmsSbO3dALleczgzfk9Bg9kLW6w37.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(82, 'vvQpfnzRoy34yt7NHTWX2luP7md50Z', 'vvQpfnzRoy34yt7NHTWX2luP7md50Z.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(83, 'b84hBY6zSUvCgaNefkJcld8GMTQUlc', 'b84hBY6zSUvCgaNefkJcld8GMTQUlc.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(84, 'M5zI2X36GK6HHFj8AEStZLDtv7La2X', 'M5zI2X36GK6HHFj8AEStZLDtv7La2X.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(85, 'CKoyOQDZXt7278Q2XUh75vylXfNbBp', 'CKoyOQDZXt7278Q2XUh75vylXfNbBp.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(86, 'XSAuyLyd6h6euBSo47AyE8PioZLCqW', 'XSAuyLyd6h6euBSo47AyE8PioZLCqW.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(87, 'sEaeFaGijJ6Xpm3w3xkM0AVZOf0wcL', 'sEaeFaGijJ6Xpm3w3xkM0AVZOf0wcL.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(88, 'zAJVt9EnMTPYPrnaIjJHsCCXQ8e7nC', 'zAJVt9EnMTPYPrnaIjJHsCCXQ8e7nC.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(89, 'NK1GnjwmpXFhERDmXIMcaLwRNhIMf1', 'NK1GnjwmpXFhERDmXIMcaLwRNhIMf1.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(90, 'vVgX8Sla5mzGNZ3cXUz9t14QtXpWwk', 'vVgX8Sla5mzGNZ3cXUz9t14QtXpWwk.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(91, 'zewHMjXsbUn3ozk6T1R3D9hYIbrhXA', 'zewHMjXsbUn3ozk6T1R3D9hYIbrhXA.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(92, '20zsgFQQpY1Ofy39X59rkBpYVoowO6', '20zsgFQQpY1Ofy39X59rkBpYVoowO6.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(93, 'A5at4mvYU04m5yUIwYtYcj5ZVnAGlW', 'A5at4mvYU04m5yUIwYtYcj5ZVnAGlW.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(94, 'G60gL5v2OgcvwOMXXysUF7lcHCv9Ls', 'G60gL5v2OgcvwOMXXysUF7lcHCv9Ls.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(95, 'mWzVGazo52lDH16trNn3VrcUODO2RR', 'mWzVGazo52lDH16trNn3VrcUODO2RR.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(96, 'xjvf8jcoCRcEJYYBL0ike2RRcBn06e', 'xjvf8jcoCRcEJYYBL0ike2RRcBn06e.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(97, 'Up14kRCwol8MTpzbQhit1LuptJoGvG', 'Up14kRCwol8MTpzbQhit1LuptJoGvG.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(98, 'RlTfa6bjfPbHN4caV7edz73rtjfTgh', 'RlTfa6bjfPbHN4caV7edz73rtjfTgh.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(99, 'zmnIItuaVlcssFA2KFG7xCvuEGz6MN', 'zmnIItuaVlcssFA2KFG7xCvuEGz6MN.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(100, 'y7gQvHp0nfvpvJKBCk5dKFzCbdBlKY', 'y7gQvHp0nfvpvJKBCk5dKFzCbdBlKY.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(101, 'FyXa6KZHp06V9MCsiP0U8CSGSuPigq', 'FyXa6KZHp06V9MCsiP0U8CSGSuPigq.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(102, 'GMLbH8WdYrkSnJKtDVtVagvx8ZnmEU', 'GMLbH8WdYrkSnJKtDVtVagvx8ZnmEU.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(103, 'USKcQry4tFSOE62D8rr5HkonJqFw9I', 'USKcQry4tFSOE62D8rr5HkonJqFw9I.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(104, 'hKGaMNVj5fkI7GJ8sPdBZJLwMg7gMZ', 'hKGaMNVj5fkI7GJ8sPdBZJLwMg7gMZ.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(105, 'LVmaiAVUcLbn9MILUxz4NuhX3wnqVa', 'LVmaiAVUcLbn9MILUxz4NuhX3wnqVa.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(106, 'TeJ5KOTbA4YhjCFJbC1gLGM6Hjcytf', 'TeJ5KOTbA4YhjCFJbC1gLGM6Hjcytf.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(107, 'zlEmPm9mD2y8HxJLRCYyxMzvYfcB6O', 'zlEmPm9mD2y8HxJLRCYyxMzvYfcB6O.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(108, 'G943qS7aqZRjDa6C9u9rF3cn9DawAe', 'G943qS7aqZRjDa6C9u9rF3cn9DawAe.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(109, 'MI9zDC7LR8NpIuWlWfxbqABHZmGb3S', 'MI9zDC7LR8NpIuWlWfxbqABHZmGb3S.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(110, 'f8Q2jdyQXnXywJaREMgFdA2YwD5Zu0', 'f8Q2jdyQXnXywJaREMgFdA2YwD5Zu0.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(111, 'x6oHDVPoUbukWh4lKIUG8Oc3piFteQ', 'x6oHDVPoUbukWh4lKIUG8Oc3piFteQ.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(112, 'OOYJxN0iiUFbnfmnBJthOo6DTQhgyx', 'OOYJxN0iiUFbnfmnBJthOo6DTQhgyx.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(113, 'LkBks2e0cqjArKhI4O1utBF43nw2pI', 'LkBks2e0cqjArKhI4O1utBF43nw2pI.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(114, '4A52nk42zctgdHmFf2fuoqJvBf5CoX', '4A52nk42zctgdHmFf2fuoqJvBf5CoX.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(115, 'ngssSbWuHHuPbAUIRICkGVYCYTBbnK', 'ngssSbWuHHuPbAUIRICkGVYCYTBbnK.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(116, 'h2cVLFmcCWG3SHgXHHRSlPOeIKCP5e', 'h2cVLFmcCWG3SHgXHHRSlPOeIKCP5e.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(117, 'RsMGhnkFZOvUJmNc8lrLKl3K0DVmNm', 'RsMGhnkFZOvUJmNc8lrLKl3K0DVmNm.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(118, 'tx3H22JOh6pvdMxVEZh3RQEpKXNjE0', 'tx3H22JOh6pvdMxVEZh3RQEpKXNjE0.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(119, 'uwIa0y0NfKQZFNpOG7SYagum1xfj4F', 'uwIa0y0NfKQZFNpOG7SYagum1xfj4F.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(120, 'N1zNDgPOgU6LkBddAK3q29Qrta8iyN', 'N1zNDgPOgU6LkBddAK3q29Qrta8iyN.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(121, 'CFhya5EoQAe2T4NPh2rBUK9Zyv5YtP', 'CFhya5EoQAe2T4NPh2rBUK9Zyv5YtP.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(122, 'qmLAQIh09HhL9i1TnAth88AsvkCUwk', 'qmLAQIh09HhL9i1TnAth88AsvkCUwk.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(123, 'aExMG1H36URpXKFsQVoUIw5ex8irUz', 'aExMG1H36URpXKFsQVoUIw5ex8irUz.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(124, 'gkglNYPyBM7GsnbzvMHnV6xWJp5SAM', 'gkglNYPyBM7GsnbzvMHnV6xWJp5SAM.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(125, 'FJZexZdDArMVyEOph7MkFy5WxmUm8n', 'FJZexZdDArMVyEOph7MkFy5WxmUm8n.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(126, 'cmzjSZm6hUsRNoDRundB0hCuB0oS3X', 'cmzjSZm6hUsRNoDRundB0hCuB0oS3X.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(127, 'h7tOJjoOaNGckMDhfCkHeCy8Ty09oa', 'h7tOJjoOaNGckMDhfCkHeCy8Ty09oa.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(128, 'PC5ng7IheWAcZvpZrv1FuSUHQ8Grus', 'PC5ng7IheWAcZvpZrv1FuSUHQ8Grus.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(129, 'Jjchtqzkx2bTAcfYLPxFXDloD8w5Wf', 'Jjchtqzkx2bTAcfYLPxFXDloD8w5Wf.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(130, 'Tc2QVpWrrjT28yB1kN9OPUyv0dIWOq', 'Tc2QVpWrrjT28yB1kN9OPUyv0dIWOq.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(131, 'TGIjZjKkWRPz2M9FN27OkDhugeU2bc', 'TGIjZjKkWRPz2M9FN27OkDhugeU2bc.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(132, 'rft16CzuwF2Hwqxz0necVWwBl4ik0g', 'rft16CzuwF2Hwqxz0necVWwBl4ik0g.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(133, 'GEvr0MzqmYcRrIXPw0H86US7L8TXpb', 'GEvr0MzqmYcRrIXPw0H86US7L8TXpb.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(134, 'g32V6xmnYvctDXptHuHtFBlA8BMOR3', 'g32V6xmnYvctDXptHuHtFBlA8BMOR3.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(135, 'aWCq46A41qJqVaQUqBOWTWq0DfAFaS', 'aWCq46A41qJqVaQUqBOWTWq0DfAFaS.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(136, 'nnyMbSMaMp17hFvL8jKi6hHPOFbMxp', 'nnyMbSMaMp17hFvL8jKi6hHPOFbMxp.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(137, 'rXNoDU5WZMJT6f3HWKybCGhsoDF9GI', 'rXNoDU5WZMJT6f3HWKybCGhsoDF9GI.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(138, 'WScq4ZrqcDeVAMFT3rCnZmKOvkes0C', 'WScq4ZrqcDeVAMFT3rCnZmKOvkes0C.pdf', 'http://localhost/Infotafel/manager.php', 'wefwefwefwef'),
(139, 'dvlW6TxJc0ILVOdKEgvnCfz0i0CYco', 'dvlW6TxJc0ILVOdKEgvnCfz0i0CYco.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(140, 'XAe9s1IkuRRNLoLaZDq5iSivGKiaFG', 'XAe9s1IkuRRNLoLaZDq5iSivGKiaFG.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(141, 'dgQ2C19BYL402MEuejM6fTOCSQH9Uo', 'dgQ2C19BYL402MEuejM6fTOCSQH9Uo.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(142, '5wTUPzQ9ECpbgxfCYaaCyCaF83poek', '5wTUPzQ9ECpbgxfCYaaCyCaF83poek.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(143, 'LjHEltKBncdLhipiYLoctYpwkNEL35', 'LjHEltKBncdLhipiYLoctYpwkNEL35.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(144, 'Q0HurWe3IH4rWad80NJTGlLQoPCFm4', 'Q0HurWe3IH4rWad80NJTGlLQoPCFm4.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(145, 'c8WJUf49D0nl7vEH2N9EygeySuRP0i', 'c8WJUf49D0nl7vEH2N9EygeySuRP0i.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(146, 'NhJmoNMR1p5yf3Lz7WGxps66raOcGa', 'NhJmoNMR1p5yf3Lz7WGxps66raOcGa.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(147, '1vxrK8vRl4IxXjo9PSHYo8IjsXQgzO', '1vxrK8vRl4IxXjo9PSHYo8IjsXQgzO.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(148, '0V2UJmBSbXt4sMVIiKUAtYhwSyTjdK', '0V2UJmBSbXt4sMVIiKUAtYhwSyTjdK.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te'),
(149, 'chOdyru8OGZP1HtfWeWnYx8zg18mkg', 'chOdyru8OGZP1HtfWeWnYx8zg18mkg.pdf', 'http://localhost/Infotafel/manager.php', 'r5ze5tge54te');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT für Tabelle `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

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
