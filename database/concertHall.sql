-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 04 nov. 2022 à 14:34
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
-- Base de données : `concerthall`
--

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE `place` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(3) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`id`, `location`, `category`) VALUES
(1, 'A1', 'VIP'),
(2, 'A2', 'VIP'),
(3, 'A3', 'VIP'),
(4, 'MOP', 'MOP'),
(5, 'MOP', 'MOP'),
(6, 'MOP', 'MOP'),
(7, 'B1', 'GRS'),
(8, 'B2', 'GRS'),
(9, 'B3', 'GRS'),
(10, 'B4', 'GRS');

-- --------------------------------------------------------

--
-- Structure de la table `showdate`
--

CREATE TABLE `showdate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_spectacle` bigint(20) UNSIGNED NOT NULL,
  `halfless` tinyint(1) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `showdate`
--

INSERT INTO `showdate` (`id`, `id_spectacle`, `halfless`, `datetime`) VALUES
(1, 13, 0, '2022-11-17 06:54:00'),
(2, 13, 1, '2022-11-18 05:04:00'),
(3, 13, 0, '2022-11-19 16:16:00'),
(4, 14, 0, '2022-11-19 19:00:00'),
(5, 13, 0, '2022-11-16 19:00:00'),
(6, 15, 1, '2022-11-24 18:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `spectacle`
--

CREATE TABLE `spectacle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `id_artist` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `spectacle`
--

INSERT INTO `spectacle` (`id`, `name`, `description`, `id_artist`) VALUES
(13, 'patinage semi artistique', 'Le ptit Rex vous propose un événement de danse incroyable mellant patinage et chants, Soso lagirafe vous fera vibrer par sa grace et son interprétation de Et si tu n existais pas', 2),
(14, 'Que ça swing', 'Comment peut-on concevoir un spectacle aussi surprenant ? Bixente nous fait voyager dans le temps pour revenir sur l histoire du golf avec un humour époustouflant ! Du club de golf à la voiturette (bien utile dans certains contextes), Bixente vous fera hurler de rire', 3),
(15, 'spectacle test', 'juste un test pour voir si la salle est bien', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_showDate` bigint(20) UNSIGNED NOT NULL,
  `id_spectator` bigint(20) UNSIGNED NOT NULL,
  `id_place` bigint(20) UNSIGNED NOT NULL,
  `price` float NOT NULL
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `showdate`
--
ALTER TABLE `showdate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `spectacle`
--
ALTER TABLE `spectacle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
