-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 22 nov. 2022 à 17:34
-- Version du serveur :  5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rivierebaptiste_concerthall`
--

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE `place` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `location_x` int(3) NOT NULL,
  `location_y` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`id`, `category`, `price`, `location_x`, `location_y`) VALUES
(1, 'VIP', 40, 9, 1),
(2, 'VIP', 40, 9, 2),
(3, 'VIP', 40, 9, 3),
(4, 'VIP', 40, 9, 4),
(5, 'VIP', 40, 9, 5),
(6, 'VIP', 40, 9, 6),
(7, 'VIP', 40, 9, 7),
(8, 'VIP', 40, 9, 8),
(9, 'VIP', 40, 9, 9),
(10,'VIP', 40, 9, 10),
(11,'VIP', 40, 8, 1),
(12,'VIP', 40, 8, 2),
(13,'VIP', 40, 8, 3),
(14,'VIP', 40, 8, 4),
(15,'VIP', 40, 8, 5),
(16,'VIP', 40, 8, 6),
(17,'VIP', 40, 8, 7),
(18,'VIP', 40, 8, 8),
(19,'VIP', 40, 8, 9),
(20,'VIP', 40, 8, 9),
(21,'VIP', 40, 7, 1),
(22,'VIP', 40, 7, 2),
(23,'VIP', 40, 7, 3),
(24,'VIP', 40, 7, 4),
(25,'VIP', 40, 7, 5),
(26,'VIP', 40, 7, 6),
(27,'VIP', 40, 7, 7),
(28,'VIP', 40, 7, 8),
(29,'VIP', 40, 7, 9),
(30,'VIP', 40, 7, 10),
(31,'VIP', 40, 6, 1),
(32,'VIP', 40, 6, 2),
(33,'VIP', 40, 6, 3),
(34,'VIP', 40, 6, 4),
(35,'VIP', 40, 6, 5),
(36,'VIP', 40, 6, 6),
(37,'VIP', 40, 6, 7),
(38,'VIP', 40, 6, 8),
(39,'VIP', 40, 6, 9),
(30,'VIP', 40, 6, 10),
(41,'VIP', 40, 4, 1),
(42,'VIP', 40, 4, 2),
(43,'VIP', 40, 4, 3),
(44,'VIP', 40, 4, 4),
(45,'VIP', 40, 4, 5),
(46,'VIP', 40, 4, 6),
(47,'VIP', 40, 4, 7),
(48,'VIP', 40, 4, 8),
(49,'VIP', 40, 4, 9),
(40,'VIP', 40, 4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `showdate`
--

CREATE TABLE `showdate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_spectacle` bigint(20) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `spectacle`
--

CREATE TABLE `spectacle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `id_artist` bigint(20) UNSIGNED NOT NULL,
  `price` float NOT NULL DEFAULT '15',
  `image_path` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `spectacle`
--

INSERT INTO `spectacle` (`id`, `name`, `description`, `id_artist`, `price`, `image_path`) VALUES
(13, 'patinage semi artistique', 'Le ptit Rex vous propose un événement de danse incroyable mellant patinage et chants, Soso lagirafe vous fera vibrer par sa grace et son interprétation de Et si tu n existais pas', 2, 20, 'patin.jpg'),
(14, 'Que ça swing', 'Comment peut-on concevoir un spectacle aussi surprenant ? Bixente nous fait voyager dans le temps pour revenir sur l histoire du golf avec un humour époustouflant ! Du club de golf à la voiturette (bien utile dans certains contextes), Bixente vous fera hurler de rire', 3, 20, 'swing.jpg'),
(15, 'spectacle test', 'juste un test pour voir si la salle est bien', 2, 5, NULL),
(16, 'One girl show', 'A base d humour fondé sur les blagues à toto, Soso lagirafe vous fera mourir de rire pendant plus de 2h de show intense', 2, 15, 'ogs.jpg'),
(17, 'spectacle test 2', 'encore un test ? Cest un chantier cette salle', 3, 15, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_showDate` bigint(20) UNSIGNED NOT NULL,
  `id_spectator` bigint(20) UNSIGNED DEFAULT NULL,
  `id_place` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT 'SPECTA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `mail`, `address`, `birthdate`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', 'admin streets, admin city', '2000-01-01', 'admin', 'ADMIN'),
(2, 'sosolagirafe', 'soso', 'lagirafe', 'soso@lagirafe.com', '44 rue de la savane', '2022-10-11', 'sop', 'ARTIST'),
(3, 'BixenteHoet', 'Bixente', 'Hoet', 'bixente@hoet.com', '58 rue du terrain de golf', '2022-10-11', 'vin', 'ARTIST'),
(4, 'steph', 'Etienne', 'River', 'etienne@river.com', '56 rue de la chaudronnerie', '2022-10-11', '1234', 'SPECTA');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `place`
--
ALTER TABLE `place`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `showdate`
--
ALTER TABLE `showdate`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `spectacle_FK` (`id_spectacle`);

--
-- Index pour la table `spectacle`
--
ALTER TABLE `spectacle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_spectacle` (`id`),
  ADD KEY `artist_FK` (`id_artist`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `showdate_FK` (`id_showDate`),
  ADD KEY `place_FK` (`id_place`),
  ADD KEY `spectator_FK` (`id_spectator`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `place`
--
ALTER TABLE `place`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `showdate`
--
ALTER TABLE `showdate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `spectacle`
--
ALTER TABLE `spectacle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `showdate`
--
ALTER TABLE `showdate`
  ADD CONSTRAINT `spectacle_FK` FOREIGN KEY (`id_spectacle`) REFERENCES `spectacle` (`id`);

--
-- Contraintes pour la table `spectacle`
--
ALTER TABLE `spectacle`
  ADD CONSTRAINT `artist_FK` FOREIGN KEY (`id_artist`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `place_FK` FOREIGN KEY (`id_place`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `showdate_FK` FOREIGN KEY (`id_showDate`) REFERENCES `showdate` (`id`),
  ADD CONSTRAINT `spectator_FK` FOREIGN KEY (`id_spectator`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
