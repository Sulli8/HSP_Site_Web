-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 29 nov. 2020 à 22:22
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

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
  `pass` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `departement`, `specialite`, `mail`, `pass`) VALUES
(1, 'SEXTIUS', 'Sullivan', 'Nutrition', 'Nutritionniste', 'nutrition@monhopital.fr', 'motdepassenondefinipourlinstant'),
(2, 'YALAPOLICE', 'Thomas', 'Optique', 'Ophtalmologue', 'optique@monhopital.fr', 'motdepassenondefinipourlinstant'),
(3, 'FONTAINUS', 'Ryan', 'Psychiatrie', 'Psychiatre', 'psychiatre@monhopital.fr', 'motdepassenondefinipourlinstant'),
(4, 'Héééé', 'YANISHHHH', 'Dermathologie', 'Dermathologue', 'dermathologie@monhopital.fr', 'motdepassenondefinipourlinstant');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_medecin` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `date_rdv` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `creneau_rdv` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nom_patient` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `nom_medecin`, `id_user`, `id_medecin`, `date_rdv`, `creneau_rdv`, `nom_patient`) VALUES
(6, 'YALAPOLICE', 1, 2, '01-01-2021', '09h00 - 10h00', 'VASONE');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `adresse` varchar(115) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ville` varchar(45) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mutuelle` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `vkey` varchar(75) NOT NULL,
  `medecin` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `adresse`, `ville`, `mail`, `pass`, `mutuelle`, `verified`, `vkey`, `medecin`, `admin`) VALUES
(1, 'VASONE', 'Antoine', '21 quai de l\'ourcq', 'Pantin', 'antoinevasone@outlook.com', 'a3aca2964e72000eea4c56cb341002a4', 'MutuelleClioAMG', 1, '3fb52a55c807929fa97ac018c807fc50', 0, 0);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
