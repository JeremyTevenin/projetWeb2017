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
  `id_sousmenu` int(11) NOT NULL,
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `nom_page` varchar(50) NOT NULL,
  `texte_page` text NOT NULL,
  `repertoire` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  PRIMARY KEY (`id_page`,`nom_page`),
  KEY `id_sousmenu` (`id_sousmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id_sousmenu`, `id_page`, `nom_page`, `texte_page`, `repertoire`, `url`) VALUES
(1, 1, 'Structure administrative', '', 'structure_administrative', 'structure_administrative.php'),
(1, 2, 'Structure pédagogique', '', 'structure_p_edagogique', 'structure_p_edagogique.php'),
(1, 3, 'Vie scolaire', '', 'vie_scolaire', 'vie_scolaire.php'),
(2, 4, 'Le choix des options', '', 'le_choix_des_options', 'le_choix_des_options.php'),
(2, 6, 'Section européenne allemand', '', 'section_europ_eenne_allemand', 'section_europ_eenne_allemand.php'),
(3, 7, 'Liste des fournitures', '', 'liste_des_fournitures', 'liste_des_fournitures.php'),
(3, 8, 'Inscription 5e, 4e et 3e ', '', 'inscription_5e_4e_et_3e_', 'inscription_5e_4e_et_3e_.php'),
(3, 9, 'Inscription 6e', '', 'inscription_6e', 'inscription_6e.php'),
(3, 10, 'Modalités de réinscription', '', 'modalit_es_de_r_einscription', 'modalit_es_de_r_einscription.php'),
(3, 11, 'Inscription en section bilangue', '', 'inscription_en_section_bilangue', 'inscription_en_section_bilangue.php'),
(4, 13, 'Les nouvelles classes de seconde', '', 'les_nouvelles_classes_de_seconde', 'les_nouvelles_classes_de_seconde.php'),
(5, 14, 'Stage d''observation en 3ème', '', 'stage_d_observation_en_3eme', 'stage_d_observation_en_3eme.php'),
(5, 15, 'L''option latin', '', 'l_option_latin', 'l_option_latin.php'),
(6, 16, 'Références des oeuvres étudiées', '', 'r_ef_erences_des_oeuvres__etudi_ees', 'r_ef_erences_des_oeuvres__etudi_ees.php'),
(6, 17, 'Horaires histoire des arts', '', 'horaires_histoire_des_arts', 'horaires_histoire_des_arts.php'),
(7, 18, 'Les horaires', '', 'les_horaires', 'les_horaires.php'),
(7, 19, 'Le réglement', '', 'le_r_eglement', 'le_r_eglement.php');

-- --------------------------------------------------------

--
-- Structure de la table `sousmenu`
--

CREATE TABLE IF NOT EXISTS `sousmenu` (
  `id_menu` int(11) NOT NULL,
  `id_sousmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_sousmenu` varchar(35) NOT NULL,
  PRIMARY KEY (`id_sousmenu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8;

--
-- Contenu de la table `sousmenu`
--

INSERT INTO `sousmenu` (`id_menu`, `id_sousmenu`, `nom_sousmenu`) VALUES
(1, 1, 'Les équipes    '),
(1, 2, 'Les options et spécificités'),
(2, 3, 'Inscription 2014-2015'),
(3, 4, 'Après la 3ème'),
(3, 5, 'Pendant le collège'),
(4, 6, 'Histoire des arts 2013-2014'),
(5, 7, 'Le fonctionnement du CDI');

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
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`id_sousmenu`) REFERENCES `sousmenu` (`id_sousmenu`);

--
-- Contraintes pour la table `sousmenu`
--
ALTER TABLE `sousmenu`
  ADD CONSTRAINT `sousmenu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
