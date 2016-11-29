-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 11 Août 2015 à 09:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `menu`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE IF NOT EXISTS `fichier` (
  `id_page` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fichier` varchar(50) NOT NULL,
  `titre_fichier` varchar(50) NOT NULL,
  `format_fichier` varchar(5) NOT NULL,
  PRIMARY KEY (`id_fichier`),
  KEY `id_page` (`id_page`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_menu` varchar(40) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `nom_menu`) VALUES
(1, 'Retouche'),
(2, 'Fabrication'),
(3, 'Transformation'),
(4, 'Création'),
(5, 'Collections été 2015');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id_menu` int(11) NOT NULL,
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `nom_page` varchar(50) NOT NULL,
  `texte_page` text NOT NULL,
  `repertoire` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  PRIMARY KEY (`id_page`,`nom_page`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20;

-- --------------------------------------------------------

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`id_page`) REFERENCES `page` (`id_page`) ON DELETE CASCADE;

--
-- Contraintes pour la table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
