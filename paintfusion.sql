-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Juin 2015 à 17:51
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `paintfusion`
--

-- --------------------------------------------------------

--
-- Structure de la table `arbre_t`
--

CREATE TABLE IF NOT EXISTS `arbre_t` (
  `IDarbre_t` int(11) NOT NULL,
  `id_team` int(11) DEFAULT '0',
  `round` int(11) DEFAULT '0',
  `ligne` int(11) DEFAULT '0',
  `IDtournoi` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `arbre_t`
--

INSERT INTO `arbre_t` (`IDarbre_t`, `id_team`, `round`, `ligne`, `IDtournoi`) VALUES
(100, 3, 1, 1, 2),
(101, 2, 1, 2, 2),
(102, 1, 1, 3, 2),
(103, 4, 1, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `chatmessge`
--

CREATE TABLE IF NOT EXISTS `chatmessge` (
  `IDChatMessge` int(11) NOT NULL,
  `ChatUser` int(11) DEFAULT '0',
  `ChatMsg` varchar(100) DEFAULT NULL,
  `IDTblChat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `connexions`
--

CREATE TABLE IF NOT EXISTS `connexions` (
  `pseudo` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscrit_t`
--

CREATE TABLE IF NOT EXISTS `inscrit_t` (
  `id_inscrit_t` int(11) NOT NULL,
  `poste` varchar(10) DEFAULT 'OSEF',
  `niveau` int(11) DEFAULT '42',
  `id_team` int(11) DEFAULT NULL,
  `id_tournoi` int(11) DEFAULT '0',
  `id_joueur` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrit_t`
--

INSERT INTO `inscrit_t` (`id_inscrit_t`, `poste`, `niveau`, `id_team`, `id_tournoi`, `id_joueur`) VALUES
(92, 'OSEF', 42, NULL, 0, 1),
(93, 'OSEF', 42, 1, 2, 2),
(94, 'OSEF', 42, 2, 2, 3),
(95, 'OSEF', 42, 1, 2, 4),
(96, 'OSEF', 42, 1, 2, 5),
(97, 'OSEF', 42, 2, 2, 6),
(98, 'OSEF', 42, 3, 2, 7),
(99, 'OSEF', 42, 3, 2, 8),
(100, 'OSEF', 42, 2, 2, 9),
(101, 'OSEF', 42, 1, 2, 10),
(102, 'OSEF', 42, 1, 2, 11),
(103, 'OSEF', 42, 2, 2, 12),
(104, 'OSEF', 42, 3, 2, 13),
(105, 'OSEF', 42, 3, 2, 1),
(106, 'OSEF', 42, 2, 2, 15),
(107, 'OSEF', 42, 3, 2, 16),
(108, 'Top', 42, NULL, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `IDjoueur` int(11) NOT NULL,
  `pseudoJoueur` varchar(50) NOT NULL,
  `igPseudoJoueur` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `banned` tinyint(4) DEFAULT '0',
  `admin` tinyint(4) DEFAULT '0',
  `connected` tinyint(4) DEFAULT '0',
  `NomPremade` varchar(50) DEFAULT NULL,
  `postePrefere` smallint(6) DEFAULT '0',
  `IDteam` int(11) DEFAULT NULL,
  `IDpremade` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `champ1` varchar(20) NOT NULL DEFAULT 'Unknown',
  `champ2` varchar(20) NOT NULL DEFAULT 'Unknown',
  `champ3` varchar(20) NOT NULL DEFAULT 'Unknown'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`IDjoueur`, `pseudoJoueur`, `igPseudoJoueur`, `pass`, `banned`, `admin`, `connected`, `NomPremade`, `postePrefere`, `IDteam`, `IDpremade`, `description`, `champ1`, `champ2`, `champ3`) VALUES
(1, 'geekgame', 'preaestiva', 'mATT1524', 0, 1, 0, NULL, 0, NULL, NULL, 'bonjour je suis une description', 'Vayne', 'Jinx', 'Kalista'),
(2, 'user2', 'FNC xPeke', '1234', 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(3, 'technet', 'technet', 'azerty', 0, 1, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(4, '3', 'EC Skyyart', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(5, '4', 'Feb1ven', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(6, '5', 'MattProg', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(7, '6', 'technet1', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(8, '7', 'wolfgune', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(9, '8', 'kakarlsen', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(10, '9', 'héron76', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(11, '10', 'Accel Turn', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(12, '11', 'Mousticke', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(13, '12', 'Louffie', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(14, '13', 'supernounou', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(15, '14', 'theyellowcheese', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(16, '15', 'tsubasa15', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(17, '16', 'kirito400', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(18, '17', 'digua2a', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(19, '18', 'pitch2a', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(20, '19', 'quika2a', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(21, '20', 'elrico2a', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(22, '21', 'serras b sher', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown'),
(23, '22', 'maxwars07', NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL, 'Unknown', 'Unknown', 'Unknown');

-- --------------------------------------------------------

--
-- Structure de la table `match_t`
--

CREATE TABLE IF NOT EXISTS `match_t` (
  `IDTournoi` int(11) NOT NULL,
  `nomTeam1` char(50) NOT NULL,
  `nomTeam2` char(50) NOT NULL,
  `codeMatch` text NOT NULL,
  `IDMatch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `match_t`
--

INSERT INTO `match_t` (`IDTournoi`, `nomTeam1`, `nomTeam2`, `codeMatch`, `IDMatch`) VALUES
(2, 'equipe_3', 'equipe_2', 'pvpnet://lol/customgame/joinorcreate/map1/pick6/team3/specALL/eyJuYW1lIjoiZXF1aXBlXzMgdnMgZXF1aXBlXzIiLCJleHRyYSI6IntcImdhbWVcIjozMTUzMH0iLCJwYXNzd29yZCI6ImVrdmJsa2V2bGV2aTVlcmI1cjZndDViIiwicmVwb3J0Ijoibm9uZSJ9', 4),
(0, '', '', 'pvpnet://lol/customgame/joinorcreate/map1/pick6/team3/specALL/eyJuYW1lIjoiIHZzICIsImV4dHJhIjoie1wiZ2FtZVwiOjU2NjV9IiwicGFzc3dvcmQiOiJla3ZibGtldmxldmk1ZXJiNXI2Z3Q1YiIsInJlcG9ydCI6Im5vbmUifQ==', 5);

-- --------------------------------------------------------

--
-- Structure de la table `premade`
--

CREATE TABLE IF NOT EXISTS `premade` (
  `IDpremade` int(11) NOT NULL,
  `NomPremade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblchat`
--

CREATE TABLE IF NOT EXISTS `tblchat` (
  `IDTblChat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `team_t`
--

CREATE TABLE IF NOT EXISTS `team_t` (
  `IDteam_t` int(11) NOT NULL,
  `nom_team` varchar(32) NOT NULL DEFAULT 'Sans_nom',
  `Top` tinyint(4) DEFAULT NULL,
  `Jungle` tinyint(4) DEFAULT NULL,
  `Mid` tinyint(4) DEFAULT NULL,
  `ADC` tinyint(4) DEFAULT NULL,
  `Supp` tinyint(4) DEFAULT NULL,
  `jgl` tinyint(4) DEFAULT '0',
  `sup` tinyint(4) DEFAULT '0',
  `id_tournoi` int(11) DEFAULT '0',
  `id_team` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `team_t`
--

INSERT INTO `team_t` (`IDteam_t`, `nom_team`, `Top`, `Jungle`, `Mid`, `ADC`, `Supp`, `jgl`, `sup`, `id_tournoi`, `id_team`) VALUES
(4, 'equipe_3', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0),
(5, 'equipe_2', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0),
(6, 'equipe_1', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0),
(72, 'equipe_3', NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 3),
(73, 'equipe_2', NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 2),
(74, 'equipe_1', NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 1),
(75, 'FAKE', NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE IF NOT EXISTS `tournoi` (
  `IDTournoi` int(11) NOT NULL,
  `NomTournoi` varchar(50) DEFAULT NULL,
  `PrizePoolTournoi` varchar(100) DEFAULT NULL,
  `DateTournoi` varchar(50) DEFAULT NULL,
  `etatTournoi` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tournoi`
--

INSERT INTO `tournoi` (`IDTournoi`, `NomTournoi`, `PrizePoolTournoi`, `DateTournoi`, `etatTournoi`) VALUES
(1, 'tournoi1', 'cadeaux de rito', NULL, 3),
(2, 'Tournoi IG2I n.2', '000000000000000', NULL, 2),
(3, '3', '33333333333', NULL, 2),
(4, '4', '44444444444', NULL, 1),
(5, 'tournoi', 'rien', 'demain', 1),
(6, 'test', 'rien', 'demain', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tournoip`
--

CREATE TABLE IF NOT EXISTS `tournoip` (
  `IDTournoi` int(11) NOT NULL,
  `NomTournoi` varchar(50) DEFAULT NULL,
  `PrizePoolTournoi` varchar(100) DEFAULT NULL,
  `DateTournoi` varchar(50) DEFAULT NULL,
  `FinishedTournoi` tinyint(4) DEFAULT '1',
  `IDTeamsInscrites` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tournoip_premade`
--

CREATE TABLE IF NOT EXISTS `tournoip_premade` (
  `IDpremade` int(11) DEFAULT NULL,
  `IDTournoi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `arbre_t`
--
ALTER TABLE `arbre_t`
  ADD PRIMARY KEY (`IDarbre_t`), ADD UNIQUE KEY `IDarbre_t` (`IDarbre_t`), ADD KEY `WDIDX_arbre_t_id_team` (`id_team`);

--
-- Index pour la table `chatmessge`
--
ALTER TABLE `chatmessge`
  ADD PRIMARY KEY (`IDChatMessge`), ADD KEY `WDIDX_ChatMessge_ChatUser` (`ChatUser`), ADD KEY `WDIDX_ChatMessge_IDTblChat` (`IDTblChat`);

--
-- Index pour la table `inscrit_t`
--
ALTER TABLE `inscrit_t`
  ADD UNIQUE KEY `id_inscrit_t` (`id_inscrit_t`), ADD KEY `WDIDX_inscrit_t_id_team` (`id_team`), ADD KEY `WDIDX_inscrit_t_id_tournoi` (`id_tournoi`), ADD KEY `WDIDX_inscrit_t_id_joueur` (`id_joueur`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD UNIQUE KEY `IDjoueur` (`IDjoueur`), ADD UNIQUE KEY `pseudoJoueur` (`pseudoJoueur`), ADD KEY `WDIDX_joueur_banned` (`banned`), ADD KEY `WDIDX_joueur_admin` (`admin`), ADD KEY `WDIDX_joueur_connected` (`connected`), ADD KEY `WDIDX_joueur_NomPremade` (`NomPremade`), ADD KEY `WDIDX_joueur_IDteam` (`IDteam`), ADD KEY `WDIDX_joueur_IDpremade` (`IDpremade`);

--
-- Index pour la table `match_t`
--
ALTER TABLE `match_t`
  ADD PRIMARY KEY (`IDMatch`);

--
-- Index pour la table `premade`
--
ALTER TABLE `premade`
  ADD UNIQUE KEY `IDpremade` (`IDpremade`), ADD UNIQUE KEY `NomPremade` (`NomPremade`);

--
-- Index pour la table `tblchat`
--
ALTER TABLE `tblchat`
  ADD PRIMARY KEY (`IDTblChat`);

--
-- Index pour la table `team_t`
--
ALTER TABLE `team_t`
  ADD PRIMARY KEY (`IDteam_t`), ADD KEY `WDIDX_team_t_id_tournoi` (`id_tournoi`);

--
-- Index pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD UNIQUE KEY `IDTournoi` (`IDTournoi`);

--
-- Index pour la table `tournoip`
--
ALTER TABLE `tournoip`
  ADD UNIQUE KEY `IDTournoi` (`IDTournoi`);

--
-- Index pour la table `tournoip_premade`
--
ALTER TABLE `tournoip_premade`
  ADD KEY `WDIDX_tournoiP_premade_IDpremade` (`IDpremade`), ADD KEY `WDIDX_tournoiP_premade_IDTournoi` (`IDTournoi`), ADD KEY `WDIDX_tournoiP_premade_IDtournoiP_premade` (`IDTournoi`,`IDpremade`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `arbre_t`
--
ALTER TABLE `arbre_t`
  MODIFY `IDarbre_t` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT pour la table `chatmessge`
--
ALTER TABLE `chatmessge`
  MODIFY `IDChatMessge` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `inscrit_t`
--
ALTER TABLE `inscrit_t`
  MODIFY `id_inscrit_t` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `IDjoueur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `match_t`
--
ALTER TABLE `match_t`
  MODIFY `IDMatch` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `premade`
--
ALTER TABLE `premade`
  MODIFY `IDpremade` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tblchat`
--
ALTER TABLE `tblchat`
  MODIFY `IDTblChat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `team_t`
--
ALTER TABLE `team_t`
  MODIFY `IDteam_t` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT pour la table `tournoi`
--
ALTER TABLE `tournoi`
  MODIFY `IDTournoi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tournoip`
--
ALTER TABLE `tournoip`
  MODIFY `IDTournoi` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chatmessge`
--
ALTER TABLE `chatmessge`
ADD CONSTRAINT `chatmessge_ibfk_1` FOREIGN KEY (`ChatUser`) REFERENCES `joueur` (`IDjoueur`),
ADD CONSTRAINT `chatmessge_ibfk_2` FOREIGN KEY (`IDTblChat`) REFERENCES `tblchat` (`IDTblChat`);

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`IDpremade`) REFERENCES `premade` (`IDpremade`);

--
-- Contraintes pour la table `team_t`
--
ALTER TABLE `team_t`
ADD CONSTRAINT `team_t_ibfk_1` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`IDTournoi`);

--
-- Contraintes pour la table `tournoip_premade`
--
ALTER TABLE `tournoip_premade`
ADD CONSTRAINT `tournoip_premade_ibfk_1` FOREIGN KEY (`IDTournoi`) REFERENCES `tournoip` (`IDTournoi`),
ADD CONSTRAINT `tournoip_premade_ibfk_2` FOREIGN KEY (`IDpremade`) REFERENCES `premade` (`IDpremade`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
