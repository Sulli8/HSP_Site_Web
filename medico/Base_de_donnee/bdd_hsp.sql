-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 nov. 2020 à 16:13
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
-- Structure de la table `creneau`
--

DROP TABLE IF EXISTS `creneau`;
CREATE TABLE IF NOT EXISTS `creneau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creneau_1` varchar(40) NOT NULL,
  `creneau_2` varchar(40) NOT NULL,
  `creneau_3` varchar(40) NOT NULL,
  `creneau_4` varchar(40) NOT NULL,
  `creneau_5` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id`, `creneau_1`, `creneau_2`, `creneau_3`, `creneau_4`, `creneau_5`) VALUES
(1, '9h00-10h00', '10h00-11h00', '11h00-12h00', '14h00-15h00', '15h00-16h00');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `departement`, `specialite`, `mail`, `mdp`, `image_profil`) VALUES
(2, 'Dr.Vasone', 'Antoine', '933770', 'Othopédie', 'a.vasone@lprs.fr', '', ''),
(4, 'Dr.Sextius', 'Sullivan', '75', 'Orthophonie', 'sullivan.sextius@gmail.com', '', 'docteur_sextius.jpg'),
(12, 'Dr.Mattei', 'Sulli', '65', 'Pathos', 'sullivan.mattei@gmail.com', 'azertyuiop', 'aliunix-0S1XOkS3Yig-unsplash.jpg'),
(6, 'Dr.Serva', 'theo', '78', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'jjjjjjjjjj', ''),
(7, 'Dr.Serva', 'theo', '78', 'Ophtalmologue', 'sullivan.sextius@gmail.com', 'eeeeeeeeee', ''),
(8, 'Dr.Serva', 'theo', '79', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'ssssssssss', 'psychiatrist.png'),
(9, 'Dr.Serva', 'theo', '79', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'qqqqqqqqqqqq', ''),
(10, 'Sextius', 'Sullivan', '70', 'Ophtalmologue', 'sullivan.sextius@gmail.com', 'testincriptionmedecin', 'invader.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message_medecin`
--

DROP TABLE IF EXISTS `message_medecin`;
CREATE TABLE IF NOT EXISTS `message_medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_envoye` varchar(1000) NOT NULL,
  `objet` varchar(1000) NOT NULL,
  `mail_user` varchar(1000) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `message_recu` varchar(1000) NOT NULL,
  `heure` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message_medecin`
--

INSERT INTO `message_medecin` (`id`, `message_envoye`, `objet`, `mail_user`, `id_medecin`, `message_recu`, `heure`) VALUES
(1, 'message4', 'traitement test message', 'sullivan.sextius@gmail.com', 3, 'test2', ''),
(3, 'Test message ', 'traitement test message', 'sullivan.sextius@gmail.com', 3, 'test envoi au medecin sullivan.sextius@gmail.com', ''),
(4, 'Message 3', 'traitement test message', 'sullivan.sextius@gmail.com', 3, 'nouveau test de message', ''),
(6, 'zrfrgt', 'traitement test message', 'sullivan.sextius@gmail.com', 5, 'NULL', '19:54'),
(14, 'NULL', 'envoie message marc', 'sullivan.sextius@gmail.com', 1, 'marc', '13:00'),
(15, 'NULL', 'envoie message fadi', 'sullivan.sextius@gmail.com', 1, 'fadiiiiiiiiiiii', '13:34'),
(16, 'NULL', 'envoie message matteÏ et lemoine', 'sullivan.sextius@gmail.com', 1, 'test', '14:14'),
(17, 'NULL', 'sdf', 'sullivan.sextius@gmail.com', 1, 'testmattei', '15:52');

-- --------------------------------------------------------

--
-- Structure de la table `message_user`
--

DROP TABLE IF EXISTS `message_user`;
CREATE TABLE IF NOT EXISTS `message_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_envoye` varchar(1000) NOT NULL,
  `objet` text NOT NULL,
  `mail_medecin` varchar(40) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message_recu` varchar(1000) NOT NULL,
  `heure` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message_user`
--

INSERT INTO `message_user` (`id`, `message_envoye`, `objet`, `mail_medecin`, `id_user`, `message_recu`, `heure`) VALUES
(17, 'eeee', 'traitement test message', 'sullivan.sextius@gmail.com', 27, 'message dessai', ''),
(39, 'salut message de dédé', 'traitement test message', 'sullivan.sextius@gmail.com', 1, 'NULL', '20:06'),
(37, 'test envoi au medecin sullivan.sextius@gmail.com', 'traitement test message', 'sullivan.sextius@gmail.com', 1, 'nouveau test message messagerie #3', '19:59'),
(40, 'ok', 'envoie message dede', 'sullivan.sextius@gmail.com', 30, 'NULL', '12:42'),
(41, 'test envoie message antouane ', 'envoie message dede', 'a.vasone@lprs.fr', 1, 'NULL', '12:58'),
(42, 'marc', 'envoie message marc', 'a.vasone@lprs.fr', 1, 'NULL', '13:00'),
(43, 'fadiiiiiiiiiiii', 'envoie message fadi', 'a.vasone@lprs.fr', 1, 'NULL', '13:34'),
(45, 'testmattei', 'sdf', 'a.vasone@lprs.fr', 1, 'NULL', '15:52');

-- --------------------------------------------------------

--
-- Structure de la table `prise_rdv`
--

DROP TABLE IF EXISTS `prise_rdv`;
CREATE TABLE IF NOT EXISTS `prise_rdv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_medecin` varchar(100) NOT NULL,
  `creneau_1` int(100) NOT NULL,
  `creneau_2` int(100) NOT NULL,
  `creneau_3` int(11) NOT NULL,
  `creneau_4` int(11) NOT NULL,
  `creaneau_5` int(11) NOT NULL,
  `date` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prise_rdv`
--

INSERT INTO `prise_rdv` (`id`, `nom_medecin`, `creneau_1`, `creneau_2`, `creneau_3`, `creneau_4`, `creaneau_5`, `date`) VALUES
(1, 'Sullivan', 0, 1, 1, 0, 0, '04-04-2020'),
(2, 'Sullivan', 0, 1, 1, 0, 0, '04-04-2020'),
(4, 'Sullivan', 1, 0, 1, 0, 0, '04-04-2020'),
(3, 'Sullivan', 1, 0, 1, 0, 0, '04-04-2020'),
(5, 'Sullivan', 1, 0, 0, 0, 0, '04-04-2020');

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
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `id_medecin`, `id_user`, `date`, `heure`, `nom_medecin`, `nom_patient`) VALUES
(55, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(56, 5, 1, '2020-10-20', '11:10:00', 'Dr.Serva', 'sextius'),
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
(86, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(87, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(88, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(89, 4, 6, '2020-11-25', '12:20:00', 'Dr.Sextius', 'sullivan.sextius@gmail.com'),
(90, 1, 1, '0000-01-01', '12:20:00', 'Dr.Vasone', 'sextius');

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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `mutuelle`, `admin`, `mdp`, `adresse`, `image_profil`) VALUES
(1, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(4, 'Admin', 'null', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(3, 'sextius', 'az', 'sullivan.sextius@gmail.com', '456UI', NULL, 'testnouveaupassword', '2 avenue du jean ', ''),
(6, 'sullivan.sextius@gmail.com', 'admin', 'admin.sextius@gmail.com', '0', NULL, '1234', '19 avenue jean jaurès', ''),
(7, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(8, 'sullivan.sextius@gmail.com', 'Sullivan', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(9, 'sullivan.sextius@gmail.com', 'root', 'root.root@gmail.com', '0', NULL, 'root', 'root', ''),
(10, 'root', 'root', 'root.root@gmail.com', '0', NULL, 'root', 'foqdff', ''),
(11, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(15, 'root', '', '', '0', 1, 'root', 'NULL', ''),
(16, 'root', 'antouane', 'antouane.vasone@gmail.com', '0', 1, 'root', 'NULL', 'admin.jpg'),
(17, 'root', 'Sullivan', 'sullivan.sextius@gmail.com', '0', 1, 'testnouveaupassword', 'NULL', ''),
(30, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(21, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '123456710', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(22, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '209384', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(23, 'SextiusImage', 'Sullivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'azertyuiop', '19 avenue jean jaurès, studio', '118466283_316173416309038_851904084212286248_n.jpg'),
(24, 'Sextius', 'Sullivantest', 'sullivan.sextius@gmail.com', '12345679', NULL, 'azertyuiop', '19 avenue jean jaurès, studio', 'doctor_1.png'),
(25, 'Sextius', 'Sullivanimage', 'sullivan.sextius@gmail.com', '12345679', NULL, 'azertyuiopqsdfgh', '19 avenue jean jaurès, studio', 'IMG_20190618_091820.jpg'),
(26, 'azert', 'Sullivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'azertyuiopqsdcvb', '19 avenue jean jaurès, studio', 'Capture d’écran 2020-10-15 à 16.37.17.png'),
(27, 'Sextiusmodification', 'Sullivan', 'sullivan.sextius@gmail.com', '12345679', NULL, 'hhhhhhhhhh', '19 avenue jean jaurès, studio', 'cabane.jpg'),
(28, 'test', 'matteÏ', 'sullivan.sextius@gmail.com', '1234567', NULL, 'oooooooooo', '19 allée des autistes', 'aliunix-0S1XOkS3Yig-unsplash.jpg'),
(31, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(32, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(33, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(34, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(35, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(36, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(37, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(38, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(39, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(40, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(41, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(42, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
(43, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
