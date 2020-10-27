-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 27 oct. 2020 à 16:23
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
-- Base de données :  `bdd_hsp`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(40) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

DROP TABLE IF EXISTS `horaire`;
CREATE TABLE IF NOT EXISTS `horaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heure` time NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id`, `heure`, `date`) VALUES
(1, '11:10:00', '2020-10-05'),
(2, '11:10:00', '2020-10-05'),
(4, '12:20:00', '2020-10-08'),
(5, '11:20:00', '2020-10-06');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `departement` varchar(40) NOT NULL,
  `specialite` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `image_profil` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `departement`, `specialite`, `mail`, `mdp`, `image_profil`) VALUES
(1, 'Dr.Vasone', 'Antoine', '933770', 'Othopédie', 'a.vasone@lprs.fr', '', ''),
(2, 'Dr.Vasone', 'Antoine', '933770', 'Othopédie', 'a.vasone@lprs.fr', '', ''),
(3, 'Dr.Sextius', 'Sullivan', '75', 'Orthophonie', 'sullivan.sextius@gmail.com', '', ''),
(4, 'Dr.Sextius', 'Sullivan', '75', 'Orthophonie', 'sullivan.sextius@gmail.com', '', ''),
(5, 'Dr.Serva', 'theo', '78', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'hhhhhhh', ''),
(6, 'Dr.Serva', 'theo', '78', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'jjjjjjjjjj', ''),
(7, 'Dr.Serva', 'theo', '78', 'Ophtalmologue', 'sullivan.sextius@gmail.com', 'eeeeeeeeee', ''),
(8, 'Dr.Serva', 'theo', '79', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'ssssssssss', 'psychiatrist.png'),
(9, 'Dr.Serva', 'theo', '79', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'qqqqqqqqqqqq', '');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1000) NOT NULL,
  `mail_medecin` varchar(40) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medecin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `nom_medecin` varchar(40) NOT NULL,
  `nom_patient` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_medecin` (`id_medecin`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `id_medecin`, `id_user`, `date`, `heure`, `nom_medecin`, `nom_patient`) VALUES
(29, 1, 1, '2020-10-05', '11:10:00', 'Dr.Vasone', 'sextius'),
(30, 1, 1, '2020-10-05', '11:10:00', 'Dr.Vasone', 'sextius'),
(31, 1, 1, '2020-10-05', '11:10:00', 'Dr.Vasone', 'sextius'),
(32, 1, 1, '2020-10-05', '11:10:00', 'Dr.Vasone', 'sextius'),
(52, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(53, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(54, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(55, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(56, 5, 1, '2020-10-20', '11:10:00', 'Dr.Serva', 'sextius'),
(57, 5, 1, '2020-10-20', '11:10:00', 'Dr.Serva', 'sextius'),
(58, 5, 1, '2020-10-20', '11:10:00', 'Dr.Serva', 'sextius'),
(59, 5, 4, '2020-10-20', '11:10:00', 'Dr.Serva', 'Admin'),
(62, 7, 1, '2020-10-24', '12:20:00', 'Dr.Serva', 'sextius'),
(69, 1, 4, '0000-01-01', '11:10:00', 'Dr.Vasone', 'Admin'),
(71, 3, 4, '0000-01-01', '11:10:00', 'Dr.Sextius', 'Admin'),
(78, 8, 4, '2020-10-31', '11:10:00', 'Dr.Serva', 'Admin'),
(79, 8, 4, '2020-10-20', '12:20:00', 'Dr.Serva', 'Admin'),
(80, 8, 4, '2020-10-29', '12:20:00', 'Dr.Serva', 'Admin'),
(81, 8, 4, '2020-10-21', '12:20:00', 'Dr.Serva', 'Admin'),
(83, 8, 1, '2020-10-28', '11:10:00', 'Dr.Serva', 'sextius'),
(84, 1, 27, '0000-01-01', '11:10:00', 'Dr.Vasone', 'Sextiusmodification'),
(85, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(86, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mutuelle` varchar(40) DEFAULT NULL,
  `admin` int(4) DEFAULT NULL,
  `mdp` varchar(60) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `image_profil` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `mutuelle`, `admin`, `mdp`, `adresse`, `image_profil`) VALUES
(1, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'testnouveaupassword', '19 avenue jean jaures ', 'mii.jpg'),
(4, 'Admin', 'null', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(3, 'sextius', 'az', 'sullivan.sextius@gmail.com', '456UI', NULL, 'testnouveaupassword', '2 avenue du jean ', ''),
(5, 'sullivan.sextius@gmail.com', 'Sullivan', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(6, 'sullivan.sextius@gmail.com', 'admin', 'admin.sextius@gmail.com', '0', NULL, '1234', '19 avenue jean jaurès', ''),
(7, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(8, 'sullivan.sextius@gmail.com', 'Sullivan', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(9, 'sullivan.sextius@gmail.com', 'root', 'root.root@gmail.com', '0', NULL, 'root', 'root', ''),
(10, 'root', 'root', 'root.root@gmail.com', '0', NULL, 'root', 'foqdff', ''),
(11, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(12, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', 1, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(13, 'root', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(14, 'root', 'root', 'sullivan.sextius@gmail.com', '0', 1, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(15, 'root', '', '', '0', 1, 'root', 'NULL', ''),
(16, 'root', 'antouane', 'antouane.vasone@gmail.com', '0', 1, 'root', 'NULL', ''),
(17, 'root', 'Sullivan', 'sullivan.sextius@gmail.com', '0', 1, 'testnouveaupassword', 'NULL', ''),
(18, 'Sextius', 'Sullivan9', 'sullivan.sextius@gmail.com', '1234567', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(20, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '12345679', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(21, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '123456710', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(22, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '209384', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(23, 'SextiusImage', 'Sullivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'azertyuiop', '19 avenue jean jaurès, studio', '118466283_316173416309038_851904084212286248_n.jpg'),
(24, 'Sextius', 'Sullivantest', 'sullivan.sextius@gmail.com', '12345679', NULL, 'azertyuiop', '19 avenue jean jaurès, studio', 'doctor_1.png'),
(25, 'Sextius', 'Sullivanimage', 'sullivan.sextius@gmail.com', '12345679', NULL, 'azertyuiopqsdfgh', '19 avenue jean jaurès, studio', 'IMG_20190618_091820.jpg'),
(26, 'azert', 'Sullivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'azertyuiopqsdcvb', '19 avenue jean jaurès, studio', 'Capture d’écran 2020-10-15 à 16.37.17.png'),
(27, 'Sextiusmodification', 'Sullivan', 'sullivan.sextius@gmail.com', '12345679', NULL, 'hhhhhhhhhh', '19 avenue jean jaurès, studio', 'miboin'),
(28, 'test', 'matteÏ', 'sullivan.sextius@gmail.com', '1234567', NULL, 'oooooooooo', '19 allée des autistes', 'aliunix-0S1XOkS3Yig-unsplash.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
