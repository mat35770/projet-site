-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Juin 2015 à 23:02
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_lo07`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
`id` int(11) NOT NULL,
  `avis` longtext NOT NULL,
  `note` int(5) NOT NULL,
  `membres_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
`id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `annee_naissance` year(4) NOT NULL,
  `password` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `argent` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `annee_naissance`, `password`, `login`, `argent`) VALUES
(1, 'del', 'mathieu', 1995, '0', 'mat', 70),
(2, 'delalande', 'mathieu', 1995, 'f', 'mathieu', -20),
(3, 'Delalande', 'Mathieu', 1995, 'admin', 'admin', 0),
(4, 'Lemercier', 'Marc', 1970, 'lo07', 'marc10', 0),
(5, 'Sarant', 'Clementin', 1995, 'ppp', 'Clemouuche', 642),
(6, 'WehrlÃ©', 'Maud', 1995, 'ppp', 'maudwehrle', 308);

-- --------------------------------------------------------

--
-- Structure de la table `membres_has_commentaires`
--

CREATE TABLE IF NOT EXISTS `membres_has_commentaires` (
  `membres_id` int(11) NOT NULL,
  `commentaires_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres_has_trajets`
--

CREATE TABLE IF NOT EXISTS `membres_has_trajets` (
  `membres_id` int(11) NOT NULL,
  `trajets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres_has_trajets_effectues`
--

CREATE TABLE IF NOT EXISTS `membres_has_trajets_effectues` (
  `membres_id` int(11) NOT NULL,
  `trajets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `date` datetime NOT NULL,
  `membres_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `trajets`
--

CREATE TABLE IF NOT EXISTS `trajets` (
`id` int(11) NOT NULL,
  `ville_depart_id` int(11) NOT NULL,
  `ville_arrivee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(2) NOT NULL,
  `nbr_places_disponibles` int(11) NOT NULL,
  `nbr_places_reservees` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `membres_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `trajets`
--

INSERT INTO `trajets` (`id`, `ville_depart_id`, `ville_arrivee_id`, `date`, `heure`, `nbr_places_disponibles`, `nbr_places_reservees`, `prix`, `membres_id`) VALUES
(6, 5, 6, '2015-05-23', '16', 2, 0, 30, 1),
(8, 6, 3, '2015-05-13', '0', 1, 0, 54, 1),
(9, 11, 2, '2015-05-30', '8', 4, 0, 40, 1),
(10, 10, 2, '2015-05-15', '0', 1, 0, 5, 1),
(11, 3, 5, '2015-05-15', '0', 1, 0, 5, 1),
(12, 7, 10, '2015-05-29', '7', 3, 0, 41, 1),
(13, 9, 2, '2015-05-13', '0', 1, 0, 4, 1),
(29, 3, 1, '2015-06-07', '6', 3, 0, 25, 5),
(31, 7, 2, '2015-06-30', '0', 1, 0, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `trajets_effectues`
--

CREATE TABLE IF NOT EXISTS `trajets_effectues` (
`id` int(11) NOT NULL,
  `ville_depart_id` int(11) NOT NULL,
  `ville_arrivee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(2) NOT NULL,
  `nbr_places_disponibles` int(11) NOT NULL,
  `nbr_places_reservees` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `membres_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE IF NOT EXISTS `vehicules` (
`id` int(11) NOT NULL,
  `marque` varchar(45) NOT NULL,
  `couleur` varchar(45) NOT NULL,
  `modele` varchar(45) NOT NULL,
  `annee_mise_en_circulation` year(4) NOT NULL,
  `membres_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `marque`, `couleur`, `modele`, `annee_mise_en_circulation`, `membres_id`) VALUES
(1, 'renault', 'noir', 'scenic', 2006, 1),
(2, 'Audi', 'Noir', 'R8', 2014, 5),
(3, 'Ferrarri', 'Rose', '8', 2014, 6),
(4, 'peugeot', 'verte', '206', 2006, 2);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE IF NOT EXISTS `villes` (
`id` int(11) NOT NULL,
  `nom` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`id`, `nom`) VALUES
(1, 'Troyes'),
(2, 'Rennes'),
(3, 'Tours'),
(4, 'Paris'),
(5, 'Lille'),
(6, 'Lyon'),
(7, 'Nantes'),
(8, 'Toulouse'),
(9, 'Brest'),
(10, 'Bordeaux'),
(11, 'Sallanches'),
(12, 'Marseilles');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
 ADD PRIMARY KEY (`id`,`membres_id`), ADD KEY `fk_commentaires_membres1_idx` (`membres_id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres_has_commentaires`
--
ALTER TABLE `membres_has_commentaires`
 ADD PRIMARY KEY (`membres_id`,`commentaires_id`), ADD KEY `fk_membres_has_commentaires_commentaires1_idx` (`commentaires_id`), ADD KEY `fk_membres_has_commentaires_membres1_idx` (`membres_id`);

--
-- Index pour la table `membres_has_trajets`
--
ALTER TABLE `membres_has_trajets`
 ADD PRIMARY KEY (`membres_id`,`trajets_id`), ADD KEY `fk_membres_has_trajets_trajets1_idx` (`trajets_id`), ADD KEY `fk_membres_has_trajets_membres_idx` (`membres_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`,`membres_id`), ADD KEY `fk_messages_membres1_idx` (`membres_id`);

--
-- Index pour la table `trajets`
--
ALTER TABLE `trajets`
 ADD PRIMARY KEY (`id`,`membres_id`), ADD KEY `fk_trajets_membres1_idx` (`membres_id`);

--
-- Index pour la table `trajets_effectues`
--
ALTER TABLE `trajets_effectues`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
 ADD PRIMARY KEY (`id`,`membres_id`), ADD KEY `fk_vehicules_membres1_idx` (`membres_id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `trajets`
--
ALTER TABLE `trajets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `trajets_effectues`
--
ALTER TABLE `trajets_effectues`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
ADD CONSTRAINT `fk_commentaires_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membres_has_commentaires`
--
ALTER TABLE `membres_has_commentaires`
ADD CONSTRAINT `fk_membres_has_commentaires_commentaires1` FOREIGN KEY (`commentaires_id`) REFERENCES `commentaires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_membres_has_commentaires_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membres_has_trajets`
--
ALTER TABLE `membres_has_trajets`
ADD CONSTRAINT `fk_membres_has_trajets_membres` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_membres_has_trajets_trajets1` FOREIGN KEY (`trajets_id`) REFERENCES `trajets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `fk_messages_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `trajets`
--
ALTER TABLE `trajets`
ADD CONSTRAINT `fk_trajets_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
ADD CONSTRAINT `fk_vehicules_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
