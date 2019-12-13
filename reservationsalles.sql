-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 déc. 2019 à 20:36
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservationsalles`
--
CREATE DATABASE IF NOT EXISTS `reservationsalles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reservationsalles`;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(1, 'Test', 'Coucou le test', '2019-12-04 10:00:00', '2019-12-05 12:00:00', 1),
(2, 'coucou', 'coucou c\'est le test', '2019-12-04 08:00:00', '2019-12-04 09:00:00', 1),
(4, 'Test', 'test lol c\'est moi', '2019-12-11 17:00:00', '2019-12-11 18:00:00', 1),
(5, 'Test', 'test2 c\'est moi', '2019-12-12 10:00:00', '2019-12-12 12:00:00', 1),
(6, 'nico', 'test salut je suis ici !', '2019-12-10 10:00:00', '2019-12-10 12:00:00', 1),
(7, 'salut', 'aaaaaaaaaaaa', '2019-12-09 10:00:00', '2019-12-09 12:00:00', 1),
(8, 'ezmofjzeofjzmm', 'fzemlfje,Ã¹mf,ef,Ã¹e,', '2019-12-12 09:00:00', '2019-12-12 10:00:00', 1),
(10, 'kmfjzesl', 'lmjc,msl', '2019-12-12 11:00:00', '2019-12-12 12:00:00', 1),
(11, 'aze', 'azeazeazeaze', '2019-12-13 09:00:00', '2019-12-13 10:00:00', 1),
(12, 'test nico', 'aqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsxaqwzsx', '2019-12-12 18:00:00', '2019-12-12 19:00:00', 3),
(14, 'daztafdtya', 'saztdszdfcgs', '2019-12-13 16:00:00', '2019-12-13 19:00:00', 3),
(15, 'elsdmk', 'dkmjlz,qc;:', '2019-12-11 09:00:00', '2019-12-11 16:00:00', 1),
(16, 'ezkfmleks', 'eyzadguzydyzgdyfyq', '2019-12-16 10:00:00', '2019-12-16 14:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$12$YhKvC5.Iiga75VqyPmx1bOy0wWOmiiAv/iDUo/.MtUtlrpxUnMEvW'),
(2, 'deku', '$2y$12$NfpJ.ld9sBsvcXdd8WGkauDiE8C9lI2RoHzxQOl1aUhqDnbZEkvC.'),
(3, 'nico', '$2y$12$ZO7cHh2BdRR.f/rGMf11t.hiJWOwnv2.8F0sTNSLW3ZDSpVV4opxa'),
(4, 'pol', '$2y$12$p9oL1TuRMh94MCfMpIi5beeR2X50EgkTSxdfuVH03iB.ZqSg.AkeC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
