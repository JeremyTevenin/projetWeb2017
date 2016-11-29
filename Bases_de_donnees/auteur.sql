-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 31 Octobre 2016 à 12:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `compte`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `ville` varchar(15) CHARACTER SET utf32 NOT NULL,
  `dateN` date NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `mdp` (`mdp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `ville`, `dateN`, `mail`, `mdp`) VALUES
(1, 'JÃ©rÃ©my', 'TÃ©venin', 'Rouen', '1994-04-16', 'jeremy_tevenin@hotmail.fr', '111111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
