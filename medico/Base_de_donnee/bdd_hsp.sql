-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 22 oct. 2020 à 15:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bdd_hsp`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id` int(11) NOT NULL,
  `heure` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `medecin` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `departement` varchar(40) NOT NULL,
  `specialite` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `image_profil` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(8, 'Dr.Serva', 'theo', '79', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'ssssssssss', 'doctor_2.png'),
(9, 'Dr.Serva', 'theo', '79', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'qqqqqqqqqqqq', '');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `nom_medecin` varchar(40) NOT NULL,
  `nom_patient` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `id_medecin`, `id_user`, `date`, `heure`, `nom_medecin`, `nom_patient`) VALUES
(13, 1, 1, '2020-10-05', '11:10:00', 'Dr.Vasone', 'sextius'),
(23, 1, 1, '2020-10-05', '11:10:00', 'Dr.Vasone', 'sextius'),
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
(60, 5, 4, '2020-10-20', '11:10:00', 'Dr.Serva', 'Admin'),
(62, 7, 1, '2020-10-24', '12:20:00', 'Dr.Serva', 'sextius'),
(63, 7, 4, '2020-10-21', '11:20:00', 'Dr.Serva', 'Admin'),
(65, 8, 5, '2020-10-24', '12:20:00', 'Dr.Serva', 'sullivan.sextius@gmail.com'),
(67, 8, 4, '2020-10-30', '11:10:00', 'Dr.Serva', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mutuelle` varchar(40) DEFAULT NULL,
  `admin` int(4) DEFAULT NULL,
  `mdp` varchar(60) NOT NULL,
  `adresse` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `mutuelle`, `admin`, `mdp`, `adresse`) VALUES
(1, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'mmmmmmmm', '19 avenue jean jaures '),
(4, 'Admin', 'null', 'sullivan.sextius@gmail.com', '0', NULL, 'root', '19 avenue jean jaurès'),
(3, 'sextius', 'az', 'sullivan.sextius@gmail.com', '456UI', NULL, 'lkjlmkjsfdùljzkf', '2 avenue du jean '),
(5, 'sullivan.sextius@gmail.com', 'Sullivan', 'sullivan.sextius@gmail.com', '0', NULL, '1234', '19 avenue jean jaurès'),
(6, 'sullivan.sextius@gmail.com', 'admin', 'admin.sextius@gmail.com', '0', NULL, '1234', '19 avenue jean jaurès'),
(7, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', NULL, '1234', '19 avenue jean jaurès'),
(8, 'sullivan.sextius@gmail.com', 'Sullivan', 'sullivan.sextius@gmail.com', '0', NULL, '8888', '19 avenue jean jaurès'),
(9, 'sullivan.sextius@gmail.com', 'root', 'root.root@gmail.com', '0', NULL, 'root', 'root'),
(10, 'root', 'root', 'root.root@gmail.com', '0', NULL, 'root', 'foqdff'),
(11, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'root', '19 avenue jean jaurès'),
(12, 'sullivan.sextius@gmail.com', 'root', 'sullivan.sextius@gmail.com', '0', 1, 'root', '19 avenue jean jaurès'),
(13, 'root', 'root', 'sullivan.sextius@gmail.com', '0', NULL, 'root', '19 avenue jean jaurès'),
(14, 'root', 'root', 'sullivan.sextius@gmail.com', '0', 1, 'root', '19 avenue jean jaurès'),
(15, 'root', '', '', '0', 1, 'root', 'NULL'),
(16, 'root', 'antouane', 'antouane.vasone@gmail.com', '0', 1, 'root', 'NULL'),
(17, 'root', 'Sullivan', 'sullivan.sextius@gmail.com', '0', 1, 'root', 'NULL'),
(18, 'Sextius', 'Sullivan9', 'sullivan.sextius@gmail.com', '1234567', NULL, 'dddddddd', '19 avenue jean jaurès'),
(19, 'nex', 'Sullivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'dddddddd', '19 avenue jean jaurès');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medecin` (`id_medecin`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
