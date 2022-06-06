-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 07 juin 2022 à 00:28
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SAE23`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administration`
--

CREATE TABLE `Administration` (
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Administration`
--

INSERT INTO `Administration` (`login`, `password`) VALUES
('admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `Batiment`
--

CREATE TABLE `Batiment` (
  `name` varchar(4) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Batiment`
--

INSERT INTO `Batiment` (`name`, `login`, `password`) VALUES
('INFO', 'info@gmail.com', '190ad117728105eef8bbe1b3c67030bdb688b7e8'),
('RT', 'rt@gmail.com', '80e2bec6b49972be3128492b425caee9d73aebb3');

-- --------------------------------------------------------

--
-- Structure de la table `Capteur`
--

CREATE TABLE `Capteur` (
  `bate` varchar(4) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `room` varchar(4) NOT NULL,
  `idcapt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Capteur`
--

INSERT INTO `Capteur` (`bate`, `type`, `room`, `idcapt`) VALUES
('RT', 'temperature', 'E208', 1),
('RT', 'co2', 'E208', 2),
('RT', 'luminosite', 'E208', 3),
('RT', 'temperature', 'E207', 4),
('RT', 'co2', 'E207', 5),
('RT', 'luminosite', 'E207', 6),
('INFO', 'temperature', 'B208', 7),
('INFO', 'co2', 'B208', 8),
('INFO', 'luminosite', 'B208', 9),
('INFO', 'temperature', 'B207', 10),
('INFO', 'co2', 'B207', 11),
('INFO', 'luminosite', 'B207', 12);

-- --------------------------------------------------------

--
-- Structure de la table `Mesure`
--

CREATE TABLE `Mesure` (
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `idmesu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Mesure`
--

INSERT INTO `Mesure` (`date`, `hours`, `idmesu`) VALUES
('2022-06-06', '18:40:27', 1),
('2022-06-06', '18:40:28', 2),
('2022-06-06', '18:40:29', 3),
('2022-06-06', '18:40:30', 4),
('2022-06-06', '18:40:31', 5),
('2022-06-06', '18:40:32', 6),
('2022-06-06', '18:40:33', 7),
('2022-06-06', '18:40:34', 8),
('2022-06-06', '18:40:35', 9),
('2022-06-06', '18:40:36', 10),
('2022-06-06', '18:40:37', 11),
('2022-06-06', '18:40:39', 12),
('2022-06-06', '18:40:55', 13),
('2022-06-06', '18:40:56', 14),
('2022-06-06', '18:40:57', 15),
('2022-06-06', '18:40:58', 16),
('2022-06-06', '18:40:59', 17),
('2022-06-06', '18:41:00', 18),
('2022-06-06', '18:41:01', 19),
('2022-06-06', '18:41:02', 20),
('2022-06-06', '18:41:03', 21),
('2022-06-06', '18:41:04', 22),
('2022-06-06', '18:41:05', 23),
('2022-06-06', '18:41:06', 24),
('2022-06-06', '19:02:02', 25),
('2022-06-06', '19:02:03', 26),
('2022-06-06', '19:02:04', 27),
('2022-06-06', '19:02:05', 28),
('2022-06-06', '19:02:06', 29),
('2022-06-06', '19:02:07', 30),
('2022-06-06', '19:02:08', 31),
('2022-06-06', '19:02:09', 32),
('2022-06-06', '19:02:10', 33),
('2022-06-06', '19:02:11', 34),
('2022-06-06', '19:02:12', 35),
('2022-06-06', '19:02:13', 36),
('2022-06-06', '20:02:02', 37),
('2022-06-06', '20:02:03', 38),
('2022-06-06', '20:02:04', 39),
('2022-06-06', '20:02:05', 40),
('2022-06-06', '20:02:06', 41),
('2022-06-06', '20:02:07', 42),
('2022-06-06', '20:02:08', 43),
('2022-06-06', '20:02:09', 44),
('2022-06-06', '20:02:10', 45),
('2022-06-06', '20:02:11', 46),
('2022-06-06', '20:02:12', 47),
('2022-06-06', '20:02:13', 48),
('2022-06-06', '21:02:02', 49),
('2022-06-06', '21:02:03', 50),
('2022-06-06', '21:02:04', 51),
('2022-06-06', '21:02:05', 52),
('2022-06-06', '21:02:06', 53),
('2022-06-06', '21:02:07', 54),
('2022-06-06', '21:02:08', 55),
('2022-06-06', '21:02:09', 56),
('2022-06-06', '21:02:10', 57),
('2022-06-06', '21:02:11', 58),
('2022-06-06', '21:02:12', 59),
('2022-06-06', '21:02:13', 60),
('2022-06-06', '23:02:02', 61),
('2022-06-06', '23:02:03', 62),
('2022-06-06', '23:02:04', 63),
('2022-06-06', '23:02:05', 64),
('2022-06-06', '23:02:06', 65),
('2022-06-06', '23:02:07', 66),
('2022-06-06', '23:02:08', 67),
('2022-06-06', '23:02:09', 68),
('2022-06-06', '23:02:10', 69),
('2022-06-06', '23:02:11', 70),
('2022-06-06', '23:02:12', 71),
('2022-06-06', '23:02:13', 72),
('2022-06-07', '00:02:02', 73),
('2022-06-07', '00:02:03', 74),
('2022-06-07', '00:02:04', 75),
('2022-06-07', '00:02:05', 76),
('2022-06-07', '00:02:06', 77),
('2022-06-07', '00:02:07', 78),
('2022-06-07', '00:02:08', 79),
('2022-06-07', '00:02:09', 80),
('2022-06-07', '00:02:10', 81),
('2022-06-07', '00:02:11', 82),
('2022-06-07', '00:02:12', 83),
('2022-06-07', '00:02:13', 84);

-- --------------------------------------------------------

--
-- Structure de la table `Valeur`
--

CREATE TABLE `Valeur` (
  `idmesu` int(11) NOT NULL,
  `idcap` int(11) NOT NULL,
  `value` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Valeur`
--

INSERT INTO `Valeur` (`idmesu`, `idcap`, `value`) VALUES
(1, 1, 26),
(2, 2, 55),
(3, 3, 780),
(4, 4, 21),
(5, 5, 56),
(6, 6, 709),
(7, 7, 24),
(8, 8, 76),
(9, 9, 634),
(10, 10, 22),
(11, 11, 74),
(12, 12, 794),
(13, 1, 25),
(14, 2, 77),
(15, 3, 716),
(16, 4, 22),
(17, 5, 84),
(18, 6, 610),
(19, 7, 23),
(20, 8, 81),
(21, 9, 613),
(22, 10, 25),
(23, 11, 73),
(24, 12, 655),
(25, 1, 24),
(26, 2, 62),
(27, 3, 714),
(28, 4, 28),
(29, 5, 70),
(30, 6, 718),
(31, 7, 22),
(32, 8, 68),
(33, 9, 770),
(34, 10, 23),
(35, 11, 76),
(36, 12, 694),
(37, 1, 25),
(38, 2, 55),
(39, 3, 672),
(40, 4, 22),
(41, 5, 63),
(42, 6, 621),
(43, 7, 23),
(44, 8, 84),
(45, 9, 676),
(46, 10, 19),
(47, 11, 55),
(48, 12, 736),
(49, 1, 22),
(50, 2, 58),
(51, 3, 728),
(52, 4, 29),
(53, 5, 70),
(54, 6, 754),
(55, 7, 24),
(56, 8, 73),
(57, 9, 746),
(58, 10, 26),
(59, 11, 70),
(60, 12, 609),
(61, 1, 23),
(62, 2, 67),
(63, 3, 737),
(64, 4, 26),
(65, 5, 73),
(66, 6, 679),
(67, 7, 20),
(68, 8, 59),
(69, 9, 779),
(70, 10, 24),
(71, 11, 63),
(72, 12, 712),
(73, 1, 27),
(74, 2, 64),
(75, 3, 703),
(76, 4, 26),
(77, 5, 73),
(78, 6, 747),
(79, 7, 19),
(80, 8, 61),
(81, 9, 747),
(82, 10, 29),
(83, 11, 55),
(84, 12, 607);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Administration`
--
ALTER TABLE `Administration`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `Batiment`
--
ALTER TABLE `Batiment`
  ADD PRIMARY KEY (`name`);

--
-- Index pour la table `Capteur`
--
ALTER TABLE `Capteur`
  ADD PRIMARY KEY (`idcapt`),
  ADD KEY `bate` (`bate`);

--
-- Index pour la table `Mesure`
--
ALTER TABLE `Mesure`
  ADD PRIMARY KEY (`idmesu`);

--
-- Index pour la table `Valeur`
--
ALTER TABLE `Valeur`
  ADD KEY `idmesu` (`idmesu`),
  ADD KEY `idcap` (`idcap`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Capteur`
--
ALTER TABLE `Capteur`
  MODIFY `idcapt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `Mesure`
--
ALTER TABLE `Mesure`
  MODIFY `idmesu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Capteur`
--
ALTER TABLE `Capteur`
  ADD CONSTRAINT `Capteur_ibfk_1` FOREIGN KEY (`bate`) REFERENCES `Batiment` (`name`);

--
-- Contraintes pour la table `Valeur`
--
ALTER TABLE `Valeur`
  ADD CONSTRAINT `Valeur_ibfk_1` FOREIGN KEY (`idcap`) REFERENCES `Capteur` (`idcapt`),
  ADD CONSTRAINT `Valeur_ibfk_2` FOREIGN KEY (`idmesu`) REFERENCES `Mesure` (`idmesu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
