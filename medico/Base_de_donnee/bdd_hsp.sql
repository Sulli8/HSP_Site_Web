-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 01 nov. 2020 à 20:10
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
(4, 'Dr.Sextius', 'Sullivan', '75', 'Orthophonie', 'sullivan.sextius@gmail.com', '', 'docteur_sextius.jpg'),
(5, 'Dr.Serva', 'theo', '78', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'hhhhhhh', 'mii_theo.jpg'),
(6, 'Dr.Serva', 'theo', '78', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'jjjjjjjjjj', ''),
(7, 'Dr.Serva', 'theo', '78', 'Ophtalmologue', 'sullivan.sextius@gmail.com', 'eeeeeeeeee', ''),
(8, 'Dr.Serva', 'theo', '79', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'ssssssssss', 'psychiatrist.png'),
(9, 'Dr.Serva', 'theo', '79', 'Orthodoncie', 'sullivan.sextius@gmail.com', 'qqqqqqqqqqqq', ''),
(10, 'Sextius', 'Sullivan', '70', 'Ophtalmologue', 'sullivan.sextius@gmail.com', 'testincriptionmedecin', 'invader.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message_medecin`
--

CREATE TABLE `message_medecin` (
  `id` int(11) NOT NULL,
  `message_envoye` varchar(1000) NOT NULL,
  `objet` varchar(1000) NOT NULL,
  `mail_user` varchar(1000) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `message_recu` varchar(1000) NOT NULL,
  `heure` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message_medecin`
--

INSERT INTO `message_medecin` (`id`, `message_envoye`, `objet`, `mail_user`, `id_medecin`, `message_recu`, `heure`) VALUES
(1, 'message4', 'traitement test message', 'sullivan.sextius@gmail.com', 3, 'test2', ''),
(3, 'Test message ', 'traitement test message', 'sullivan.sextius@gmail.com', 3, 'test envoi au medecin sullivan.sextius@gmail.com', ''),
(4, 'Message 3', 'traitement test message', 'sullivan.sextius@gmail.com', 3, 'nouveau test de message', ''),
(6, 'zrfrgt', 'traitement test message', 'sullivan.sextius@gmail.com', 5, 'NULL', '19:54'),
(7, 'NULL', 'envoie discussion', 'sullivan.sextius@gmail.com', 4, 'salut Mr serva Theo', '20:03'),
(8, 'NULL', 'traitement test message', 'sullivan.sextius@gmail.com', 4, 'salut message de dédé', '20:06');

-- --------------------------------------------------------

--
-- Structure de la table `message_user`
--

CREATE TABLE `message_user` (
  `id` int(11) NOT NULL,
  `message_envoye` varchar(1000) NOT NULL,
  `objet` text NOT NULL,
  `mail_medecin` varchar(40) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message_recu` varchar(1000) NOT NULL,
  `heure` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message_user`
--

INSERT INTO `message_user` (`id`, `message_envoye`, `objet`, `mail_medecin`, `id_user`, `message_recu`, `heure`) VALUES
(17, 'eeee', 'traitement test message', 'sullivan.sextius@gmail.com', 27, 'message dessai', ''),
(38, 'salut Mr serva Theo', 'envoie discussion', 'sullivan.sextius@gmail.com', 1, 'NULL', '20:03'),
(39, 'salut message de dédé', 'traitement test message', 'sullivan.sextius@gmail.com', 1, 'NULL', '20:06'),
(37, 'test envoi au medecin sullivan.sextius@gmail.com', 'traitement test message', 'sullivan.sextius@gmail.com', 1, 'nouveau test message messagerie #3', '19:59');

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
(29, 1, 1, '2020-10-05', '11:10:00', 'Dr.Vasone', 'sextius'),
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
(86, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(87, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius'),
(88, 1, 1, '0000-01-01', '11:10:00', 'Dr.Vasone', 'sextius');

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
  `adresse` varchar(60) NOT NULL,
  `image_profil` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `mutuelle`, `admin`, `mdp`, `adresse`, `image_profil`) VALUES
(1, 'sextius', 'sulllivan', 'sullivan.sextius@gmail.com', '1234567', NULL, 'testnouveaupassword', '19 avenue jean jaures ', 'mii.jpg'),
(4, 'Admin', 'null', 'sullivan.sextius@gmail.com', '0', NULL, 'testnouveaupassword', '19 avenue jean jaurès', ''),
(3, 'sextius', 'az', 'sullivan.sextius@gmail.com', '456UI', NULL, 'testnouveaupassword', '2 avenue du jean ', ''),
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
-- Index pour la table `message_medecin`
--
ALTER TABLE `message_medecin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message_user`
--
ALTER TABLE `message_user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `message_medecin`
--
ALTER TABLE `message_medecin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `message_user`
--
ALTER TABLE `message_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
