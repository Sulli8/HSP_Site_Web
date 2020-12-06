-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 06 déc. 2020 à 17:03
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bdd_hsp`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(11) NOT NULL,
  `metier` varchar(40) COLLATE utf8_bin NOT NULL,
  `candidat` varchar(40) COLLATE utf8_bin NOT NULL,
  `contrat` varchar(40) COLLATE utf8_bin NOT NULL,
  `nom_entreprise` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`id`, `metier`, `candidat`, `contrat`, `nom_entreprise`) VALUES
(1, 'Orthodoncie', 'VASONE', 'CDD', 'SFR'),
(2, 'Orthodoncie', 'VASONE', 'CDD', 'SFR'),
(3, 'Orthodoncie', 'VASONE', 'CDD', 'SFR'),
(4, 'Orthodoncie', 'az', 'CDD', 'SFR'),
(5, 'Orthodoncie', 'az', 'CDD', 'SFR'),
(6, 'Orthodoncie', 'Vasone ', 'CDD', 'SFR'),
(7, 'Orthodoncie', 'Vasone ', 'CDD', 'SFR'),
(8, 'Orthodoncie', 'Antoine2', 'CDD', 'SFR');

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id` int(11) NOT NULL,
  `creneau_1` varchar(40) NOT NULL,
  `creneau_2` varchar(40) NOT NULL,
  `creneau_3` varchar(40) NOT NULL,
  `creneau_4` varchar(40) NOT NULL,
  `creneau_5` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id`, `creneau_1`, `creneau_2`, `creneau_3`, `creneau_4`, `creneau_5`) VALUES
(1, '9h00-10h00', '10h00-11h00', '11h00-12h00', '14h00-15h00', '15h00-16h00');

-- --------------------------------------------------------

--
-- Structure de la table `emploies`
--

CREATE TABLE `emploies` (
  `id` int(11) NOT NULL,
  `metier` varchar(40) COLLATE utf8_bin NOT NULL,
  `contrat` varchar(40) COLLATE utf8_bin NOT NULL,
  `nom_entreprise` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `emploies`
--

INSERT INTO `emploies` (`id`, `metier`, `contrat`, `nom_entreprise`) VALUES
(1, 'Ophtalmologue', 'CDI', 'Free'),
(2, 'Orthodoncie', 'CDD', 'SFR'),
(4, 'Ophtalmologue', 'CDI', 'Free'),
(5, 'Orthodoncie', 'CDD', 'SFR'),
(6, 'Orthodoncie', 'CDD', 'SFR');

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
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `departement`, `specialite`, `mail`, `pass`) VALUES
(5, 'marc', 'qqqqqq', '93', 'Ophto', 'fadi.sextius@gmail.com', '5bc0b19b709c7a262ab56021b980d2bd'),
(6, 'marc', 'qqqqqq', '93', 'Ophto', 'fadi.sextius@gmail.com', '2b1397d6d0b32b032842118cbf8cd44d'),
(8, 'az', 'az', 'az', 'az', 'az', '9d4f9907c9e7c67b9d3935005cd23f15'),
(9, 'az', 'az', 'az', 'az', 'az', '2c531b0f8bbdea00a347932b199f0e17'),
(10, '', '', '', '', 'az', '6565c811f17ad6273b8961275cb1b584');

-- --------------------------------------------------------

--
-- Structure de la table `prise_rdv`
--

CREATE TABLE `prise_rdv` (
  `id` int(11) NOT NULL,
  `nom_medecin` varchar(100) NOT NULL,
  `creneau_1` int(100) NOT NULL,
  `creneau_2` int(100) NOT NULL,
  `creneau_3` int(11) NOT NULL,
  `creneau_4` int(11) NOT NULL,
  `creneau_5` int(11) NOT NULL,
  `date` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id` int(11) NOT NULL,
  `nom_medecin` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `date_rdv` varchar(255) NOT NULL,
  `creneau_rdv` varchar(255) NOT NULL,
  `nom_patient` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `nom_medecin`, `id_user`, `id_medecin`, `date_rdv`, `creneau_rdv`, `nom_patient`) VALUES
(5, 'Vasone', 2, 1, '1-01-2021', '10h00-11h00', 'Sextius'),
(9, 'SEXTIUS', 1, 1, '2020-11-19', '10h00-11h00', 'VASON'),
(15, 'marc', 1, 5, '01-01-2021', '09h00 - 10h00', 'Antoine2'),
(16, 'marc', 1, 6, '01-01-2021', '10h00 - 11h00', 'Antoine2');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `adresse` varchar(115) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mutuelle` varchar(60) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `vkey` varchar(75) NOT NULL,
  `medecin` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `adresse`, `ville`, `mail`, `pass`, `mutuelle`, `verified`, `vkey`, `medecin`, `admin`) VALUES
(1, 'Antoine2', 'Antoinetest', '21 quai de l\'ourcq', 'Pantin', 'antoinevasone@outlook.com', 'a3aca2964e72000eea4c56cb341002a4', 'MutuelleClioAMG', 1, '3fb52a55c807929fa97ac018c807fc50', 0, 0),
(2, 'root', 'az', 'aucune', 'aucune', 'az.az@gmail.com', '6a97d7999cdd427ce03656d0e2468526', 'aucune', 0, '672aaec62f8c32176612c25e1ff82762', 0, 1),
(3, 'azdv', 'azds', 'azcv', 'azcv', 'az@az.fr', 'cc8c0a97c2dfcd73caff160b65aa39e2', 'azxcv', 1, '32bea98584c58a97d8a530e948b4407d', 0, 0),
(4, '444', 'qs', 'qs', 'qs', 'qs@qs.fr', '304854e2e79de0f96dc5477fef38a18f', 'qs', 1, '94cd524c9ef3d1f0915135a16a84c29a', 0, 1),
(5, 'root', 'aa', 'aucune', 'aucune', 'aa@aa.fr', 'a4b2677c04756fd917bcd038c79fe79c', 'aucune', 0, '4e12eb98d17f87a0d3ef424d2421a2de', 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emploies`
--
ALTER TABLE `emploies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prise_rdv`
--
ALTER TABLE `prise_rdv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `emploies`
--
ALTER TABLE `emploies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `prise_rdv`
--
ALTER TABLE `prise_rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
