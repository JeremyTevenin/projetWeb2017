-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Décembre 2016 à 12:32
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `menu`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `id_article` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL,
  `nom_fichier` varchar(50) NOT NULL,
  `titre_fichier` varchar(50) NOT NULL,
  `format_fichier` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categ` int(11) NOT NULL,
  `nom_categ` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categ`, `nom_categ`) VALUES
(1, 'Retouche'),
(2, 'Fabrication'),
(3, 'Transformation'),
(4, 'Création'),
(5, 'Collections été 2015');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_souscateg` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `nom_article` varchar(50) NOT NULL,
  `texte_page` text NOT NULL,
  `repertoire` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_souscateg`, `id_article`, `nom_article`, `texte_page`, `repertoire`, `url`) VALUES
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
(5, 14, 'Stage d\'observation en 3ème', '', 'stage_d_observation_en_3eme', 'stage_d_observation_en_3eme.php'),
(5, 15, 'L\'option latin', '', 'l_option_latin', 'l_option_latin.php'),
(6, 16, 'Références des oeuvres étudiées', '', 'r_ef_erences_des_oeuvres__etudi_ees', 'r_ef_erences_des_oeuvres__etudi_ees.php'),
(6, 17, 'Horaires histoire des arts', '', 'horaires_histoire_des_arts', 'horaires_histoire_des_arts.php'),
(7, 18, 'Les horaires', '', 'les_horaires', 'les_horaires.php'),
(7, 19, 'Le réglement', '', 'le_r_eglement', 'le_r_eglement.php');

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE `souscategorie` (
  `id_categ` int(11) NOT NULL,
  `id_souscateg` int(11) NOT NULL,
  `nom_souscateg` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `souscategorie`
--

INSERT INTO `souscategorie` (`id_categ`, `id_souscateg`, `nom_souscateg`) VALUES
(1, 1, 'Les équipes    '),
(1, 2, 'Les options et spécificités'),
(2, 3, 'Inscription 2014-2015'),
(3, 4, 'Après la 3ème'),
(3, 5, 'Pendant le collège'),
(4, 6, 'Histoire des arts 2013-2014'),
(5, 7, 'Le fonctionnement du CDI');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`id_fichier`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categ`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`,`nom_article`),
  ADD KEY `id_souscateg` (`id_souscateg`);

--
-- Index pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD PRIMARY KEY (`id_souscateg`),
  ADD KEY `id_categ` (`id_categ`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `id_fichier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `id_souscateg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE;

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_souscateg`) REFERENCES `souscategorie` (`id_souscateg`);

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `souscategorie_ibfk_1` FOREIGN KEY (`id_categ`) REFERENCES `categorie` (`id_categ`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
