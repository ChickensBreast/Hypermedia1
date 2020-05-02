-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 02 Mai 2020 à 00:41
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
  `idImage` int(10) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `demandeami`
--

CREATE TABLE IF NOT EXISTS `demandeami` (
  `idUtilisateur` int(10) NOT NULL,
  `idAmi` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`idImage` int(10) NOT NULL,
  `nomImage` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL,
  `acces` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `motDePasse`, `nom`, `prenom`, `courriel`) VALUES
(1, 'user', 'user', 'user', 'user', 'user@user.com');

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
 ADD PRIMARY KEY (`idCommentaire`), ADD KEY `FK_idImage` (`idImage`);

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
MODIFY `idCommentaire` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
MODIFY `idImage` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `idUtilisateur` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
