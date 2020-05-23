-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 13 Mai 2020 à 19:58
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `photo`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`idCommentaire` int(10) NOT NULL,
  `idImage` int(10) NOT NULL,
  `idUtilisateur` int(10) NOT NULL,
  `commentaire` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=113 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `idImage`, `idUtilisateur`, `commentaire`) VALUES
(112, 41, 1, 'ra'),
(111, 41, 1, 'solo'),
(110, 41, 1, 'cxz'),
(109, 41, 1, ''),
(107, 45, 1, 'h'),
(108, 44, 1, 'f'),
(106, 44, 1, 'y'),
(105, 45, 1, 'c'),
(104, 44, 1, 'z'),
(103, 43, 1, 'cxz'),
(102, 43, 1, 'cxz'),
(101, 41, 1, 'z'),
(100, 41, 1, 'z'),
(99, 41, 1, 'z');

-- --------------------------------------------------------

--
-- Structure de la table `demandeami`
--

CREATE TABLE IF NOT EXISTS `demandeami` (
  `idUtilisateur` int(10) NOT NULL,
  `idAmi` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demandeami`
--

INSERT INTO `demandeami` (`idUtilisateur`, `idAmi`) VALUES
(1, 6),
(1, 8),
(1, 9),
(6, 1),
(6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`idImage` int(10) NOT NULL,
  `nomImage` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `acces` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`idImage`, `nomImage`, `url`, `acces`) VALUES
(33, 'joji8', 'uploads/5eaf1e5d3ad9f4.36348463.jpg', 1),
(32, 'joji8', 'uploads/5eaf1e17338037.78799643.jpg', 1),
(31, 'joji8', 'uploads/5eaf1df32d43a4.31759744.jpg', 1),
(30, 'joji8', 'uploads/5eaf1d8bb49e30.64288845.jpg', 1),
(29, 'joji8', 'uploads/5eaf1d736bc415.65009240.jpg', 1),
(28, 'joji8', 'uploads/5eaf1d11016690.28439774.jpg', 1),
(27, 'joji8', 'uploads/5eaf1b4087b4f5.09820743.jpg', 1),
(26, 'joji8', 'uploads/5eaf1ae9d7f678.49487379.jpg', 1),
(25, 'joji8', 'uploads/5eaf1ac4a6af37.86425973.jpg', 1),
(24, 'joji8', 'uploads/5eaf1a6d425746.91407923.jpg', 1),
(23, 'joji8', 'uploads/5eaf1a6111e9b2.95647507.jpg', 1),
(22, 'joji8', 'uploads/5eaf1a4d9b1a22.50926671.jpg', 1),
(21, 'joji8', 'uploads/5eaf1a30c6fc61.59386303.jpg', 1),
(20, 'joji8', 'uploads/5eaf19fb812382.76655417.jpg', 1),
(19, 'joji8', 'uploads/5eaf19dd9e9903.73695346.jpg', 1),
(18, 'joji8', 'uploads/5eaf199a343033.78889504.jpg', 1),
(34, 'joji8', 'uploads/5eaf1e7205d0d9.42874706.jpg', 1),
(35, 'joji8', 'uploads/5eaf1e98d71675.37724165.jpg', 1),
(36, 'joji8', 'uploads/5eaf1eacbbcd73.66736775.jpg', 1),
(37, 'joji8', 'uploads/5eaf1eda07b464.43773895.jpg', 1),
(38, 'joji8', 'uploads/5eaf1efc8c11d2.71538530.jpg', 1),
(39, 'joji8', 'uploads/5eaf39d8a606a9.50619445.jpg', 1),
(40, 'joji8', 'uploads/5eaf3fbf3f5701.86664187.jpg', 1),
(41, 'joji8', 'uploads/5eb43986187af6.04499549.jpg', 0),
(42, 'joji8', 'uploads/5eb43ab218d534.30290068.jpg', 1),
(43, 'joji8', 'uploads/5eb43aef8de1a0.55291699.jpg', 0),
(44, 'joji8', 'uploads/5eb4a37206c970.96929669.jpg', 0),
(45, 'joji8', 'uploads/5eb994816d42b7.43542808.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`idUtilisateur` int(10) NOT NULL,
  `nomUtilisateur` varchar(30) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `courriel` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `motDePasse`, `nom`, `prenom`, `courriel`) VALUES
(1, 'user', 'user', 'user', 'user', 'user@user.com'),
(6, 'a', 'a', 'a', 'a', 'a'),
(7, 'x', 'x', 'x', 'x', 'x'),
(8, 'q', 'q', 'q', 'q', 'q'),
(9, 'w', 'w', 'w', 'w', 'w'),
(10, '5', '5', '5', '5', '5'),
(11, '4', '4', '4', '4', '4'),
(12, 'Cheun', 'Cheun', 'Cheun', 'Roselyn', 'r@user.com'),
(13, 'louise', 'louise', 'Louis', 'Charles', 'lc@user.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurami`
--

CREATE TABLE IF NOT EXISTS `utilisateurami` (
  `idUtilisateur` int(10) NOT NULL,
  `idAmi` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurimage`
--

CREATE TABLE IF NOT EXISTS `utilisateurimage` (
  `idUtilisateur` int(10) NOT NULL,
  `idImage` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurimage`
--

INSERT INTO `utilisateurimage` (`idUtilisateur`, `idImage`) VALUES
(1, 38),
(1, 39),
(1, 40),
(1, 45),
(6, 41),
(6, 42),
(6, 43),
(8, 44);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE IF NOT EXISTS `visiteur` (
  `idVisiteur` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
 ADD PRIMARY KEY (`idCommentaire`), ADD KEY `FK_idImage` (`idImage`), ADD KEY `FK_idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `demandeami`
--
ALTER TABLE `demandeami`
 ADD PRIMARY KEY (`idUtilisateur`,`idAmi`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`idImage`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`idUtilisateur`), ADD UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`), ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Index pour la table `utilisateurami`
--
ALTER TABLE `utilisateurami`
 ADD PRIMARY KEY (`idUtilisateur`,`idAmi`), ADD KEY `FK_UA_idAmi` (`idAmi`);

--
-- Index pour la table `utilisateurimage`
--
ALTER TABLE `utilisateurimage`
 ADD PRIMARY KEY (`idUtilisateur`,`idImage`), ADD KEY `idImage` (`idImage`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
 ADD PRIMARY KEY (`idVisiteur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `idCommentaire` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
MODIFY `idImage` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `idUtilisateur` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
