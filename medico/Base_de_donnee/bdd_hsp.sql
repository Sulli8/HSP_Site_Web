-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 nov. 2020 à 16:22
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

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
  `creneau_5` int(11) NOT NULL,
  `date` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prise_rdv`
--

INSERT INTO `prise_rdv` (`id`, `nom_medecin`, `creneau_1`, `creneau_2`, `creneau_3`, `creneau_4`, `creneau_5`, `date`) VALUES
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
  KEY `has_medecin` (`id_medecin`),
  KEY `has_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `mutuelle`, `admin`, `mdp`, `adresse`, `image_profil`) VALUES
(1, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(3, 'sextius', 'az', 'sullivan.sextius@gmail.com', '456UI', NULL, 'testnouveaupassword', '2 avenue du jean ', ''),
(4, 'Admin', 'null', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(6, 'sullivan.sextius@gmail.com', 'admin', 'admin.sextius@gmail.com', '0', NULL, '1234', '19 avenue jean jaurès', ''),
(7, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(8, 'sullivan.sextius@gmail.com', 'Sullivan', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(9, 'sullivan.sextius@gmail.com', 'root', 'root.root@gmail.com', '0', NULL, 'root', 'root', ''),
(10, 'root', 'root', 'root.root@gmail.com', '0', NULL, 'root', 'foqdff', ''),
(11, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(15, 'root', '', '', '0', 1, 'root', 'NULL', ''),
(16, 'root', 'antouane', 'antouane.vasone@gmail.com', '0', 1, 'root', 'NULL', 'admin.jpg'),
(17, 'root', 'Sullivan', 'sullivan.sextius@gmail.com', '0', 1, 'testnouveaupassword', 'NULL', ''),
(21, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '123456710', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(22, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '209384', NULL, 'testnouveaupassword', '19 avenue jean jaures ', ''),
(23, 'SextiusImage', 'Sullivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'azertyuiop', '19 avenue jean jaurès, studio', '118466283_316173416309038_851904084212286248_n.jpg'),
(24, 'Sextius', 'Sullivantest', 'sullivan.sextius@gmail.com', '12345679', NULL, 'azertyuiop', '19 avenue jean jaurès, studio', 'doctor_1.png'),
(25, 'Sextius', 'Sullivanimage', 'sullivan.sextius@gmail.com', '12345679', NULL, 'azertyuiopqsdfgh', '19 avenue jean jaurès, studio', 'IMG_20190618_091820.jpg'),
(26, 'azert', 'Sullivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'azertyuiopqsdcvb', '19 avenue jean jaurès, studio', 'Capture d’écran 2020-10-15 à 16.37.17.png'),
(27, 'Sextiusmodification', 'Sullivan', 'sullivan.sextius@gmail.com', '12345679', NULL, 'hhhhhhhhhh', '19 avenue jean jaurès, studio', 'cabane.jpg'),
(28, 'test', 'matteÏ', 'sullivan.sextius@gmail.com', '1234567', NULL, 'oooooooooo', '19 allée des autistes', 'aliunix-0S1XOkS3Yig-unsplash.jpg'),
(30, 'root', 'delia', 'delia.sextius@gmail.com', '0', 1, 'root', 'NULL', 'invader2.jpg'),
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

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message_medecin`
--
ALTER TABLE `message_medecin`
  ADD CONSTRAINT `id_medecin` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id`);

--
-- Contraintes pour la table `message_user`
--
ALTER TABLE `message_user`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `has_medecin` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id`),
  ADD CONSTRAINT `has_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
