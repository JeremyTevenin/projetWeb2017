-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Décembre 2016 à 10:26
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `auteur`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `ville` varchar(15) CHARACTER SET utf32 NOT NULL,
  `dateN` date NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `ville`, `dateN`, `mail`, `password`) VALUES
(7, 'admin', 'admin', 'admin', '0001-01-01', 'admin@admin.fr', 'Admin0'),
(8, 'test', 'test', 'test', '1996-04-12', 'test@test.fr', 'Test12'),
(9, 'ear', 'ert', 'erty', '5585-05-14', 'jced@hy.fr', 'Admin12');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `auteur` ADD FULLTEXT KEY `mdp` (`password`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
