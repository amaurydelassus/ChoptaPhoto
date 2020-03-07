-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 07 mars 2020 à 10:51
-- Version du serveur :  10.3.15-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `choptaphoto`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_Article` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_Article`, `nom`, `prix`, `description`, `stock`) VALUES
(1, 'Cartouche Delux', 20, 'Cette Cartouche d\'encre multi pack compatible avec toute nos borne, est fabriquée selon la norme ISO 9001/ ISO 14001, utilisant les formulations d\'encre spécifiques répondant aux caractéristiques de nos borne, permettant avoir ainsi une qualité optimal', 200),
(2, 'Cartouche Standart', 15, 'Cette Cartouche d\'encre multi pack compatible avec toute nos borne, est fabriquée selon la norme ISO 9001/ ISO 14001, pour des photos de bonne qualit.', 500),
(3, 'Cartouche Discount', 10, 'Cette Cartouche d\'encre multi pack compatible avec toute nos borne, est fabriquée selon la norme ISO 9001/ ISO 14001, pour des photos discount.', 500),
(4, '100-PapierPhoto', 20, 'Pour imprimer vos photos', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `borne`
--

CREATE TABLE `borne` (
  `id_Borne` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `URL` varchar(50) DEFAULT '1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `borne`
--

INSERT INTO `borne` (`id_Borne`, `nom`, `prix`, `description`, `URL`) VALUES
(1, 'Flash 2000++', 199, 'Notre meilleur borne', '1.png'),
(2, 'Flash 1200', 99, 'Notre Borne Standart', '1.png'),
(3, 'Flash Discount', 69, 'Notre Borne Discount', '1.png');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_Commande` int(50) NOT NULL,
  `date_de_commande` date NOT NULL,
  `date_d_expedition` date NOT NULL,
  `id_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_Commande`, `date_de_commande`, `date_d_expedition`, `id_User`) VALUES
(1, '2020-03-04', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `consulte`
--

CREATE TABLE `consulte` (
  `id_User` int(11) NOT NULL,
  `id_Photo` int(11) NOT NULL,
  `Aimer` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `id_Commande` int(50) NOT NULL,
  `id_Article` int(11) NOT NULL,
  `quantiteCommande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`id_Commande`, `id_Article`, `quantiteCommande`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `Id_Event` int(11) NOT NULL,
  `Titre` varchar(50) DEFAULT NULL,
  `CodeEvent` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`Id_Event`, `Titre`, `CodeEvent`) VALUES
(1, 'coucou', 'COUC12020-03-05');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_Image` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_Article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `id_User` int(11) NOT NULL,
  `Id_Event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participe`
--

INSERT INTO `participe` (`id_User`, `Id_Event`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_Photo` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `Id_Event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `Id_Event` int(11) NOT NULL,
  `id_Reservation` int(11) NOT NULL,
  `dateDebut` varchar(50) DEFAULT NULL,
  `dateFin` varchar(50) DEFAULT NULL,
  `id_Borne` int(11) NOT NULL,
  `id_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Id_Event`, `id_Reservation`, `dateDebut`, `dateFin`, `id_Borne`, `id_User`) VALUES
(1, 3, '2020-03-11', '2020-03-18', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_user`
--

CREATE TABLE `type_user` (
  `id_Type` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_user`
--

INSERT INTO `type_user` (`id_Type`, `type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_User` int(11) NOT NULL,
  `login` varchar(150) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `id_Type` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_User`, `login`, `nom`, `pwd`, `prenom`, `id_Type`) VALUES
(1, 'ama', 'ama', 'e292b1d68c8b480c49074ff1b6e266b8', 'ama', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_Article`);

--
-- Index pour la table `borne`
--
ALTER TABLE `borne`
  ADD PRIMARY KEY (`id_Borne`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_Commande`),
  ADD KEY `id_User` (`id_User`);

--
-- Index pour la table `consulte`
--
ALTER TABLE `consulte`
  ADD PRIMARY KEY (`id_User`,`id_Photo`),
  ADD KEY `id_Photo` (`id_Photo`);

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`id_Commande`,`id_Article`),
  ADD KEY `id_Article` (`id_Article`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Id_Event`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_Image`),
  ADD KEY `id_Article` (`id_Article`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`id_User`,`Id_Event`),
  ADD KEY `Id_Event` (`Id_Event`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_Photo`),
  ADD KEY `Id_Event` (`Id_Event`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Id_Event`,`id_Reservation`),
  ADD KEY `id_Reservation` (`id_Reservation`),
  ADD KEY `id_Borne` (`id_Borne`),
  ADD KEY `id_User` (`id_User`);

--
-- Index pour la table `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id_Type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_User`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `id_Type` (`id_Type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_Article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `borne`
--
ALTER TABLE `borne`
  MODIFY `id_Borne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_Commande` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `Id_Event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_Photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_Reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_user`
--
ALTER TABLE `type_user`
  MODIFY `id_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `users` (`id_User`);

--
-- Contraintes pour la table `consulte`
--
ALTER TABLE `consulte`
  ADD CONSTRAINT `consulte_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `users` (`id_User`),
  ADD CONSTRAINT `consulte_ibfk_2` FOREIGN KEY (`id_Photo`) REFERENCES `photo` (`id_Photo`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`id_Commande`) REFERENCES `commande` (`id_Commande`),
  ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`id_Article`) REFERENCES `article` (`id_Article`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_Article`) REFERENCES `article` (`id_Article`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_ibfk_1` FOREIGN KEY (`Id_Event`) REFERENCES `event` (`Id_Event`),
  ADD CONSTRAINT `participe_ibfk_2` FOREIGN KEY (`id_User`) REFERENCES `users` (`id_User`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`Id_Event`) REFERENCES `event` (`Id_Event`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Id_Event`) REFERENCES `event` (`Id_Event`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_Borne`) REFERENCES `borne` (`id_Borne`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_User`) REFERENCES `users` (`id_User`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_Type`) REFERENCES `type_user` (`id_Type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
