-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 30 août 2020 à 20:53
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `filrouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `img` varchar(255) NOT NULL,
  `interresting` int(11) NOT NULL,
  `ninterresting` int(11) NOT NULL,
  `date` date NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `report` int(11) NOT NULL,
  `vuecounter` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `content`, `img`, `interresting`, `ninterresting`, `date`, `localisation`, `report`, `vuecounter`, `user_id`, `dom_id`) VALUES
(1, 'Appartement à louer', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.\r\n\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.', 'No_image_3x4.svg.png', 1, 0, '2020-08-26', 'Mohammedia', 0, 4, 11, 1),
(2, 'Recrutement d\'un comptable', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.', 'No_image_3x4.svg.png', 0, 0, '2020-08-27', 'Agadir', 0, 0, 11, 3),
(3, 'Iphone 11 Pro MAX à vendre', '\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.', 'iphone-11-pro-max-gold-select-2019_GEO_EMEA.png', 0, 0, '2020-08-26', 'Agadir', 0, 7, 11, 2),
(4, 'Maison à vendre', '\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.', '114-modele-maison-individuelle-a-etage-1.jpg', 0, 0, '2020-08-26', 'Tanger', 0, 12, 12, 1),
(5, 'Recrutement dev Front End', '\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.', 'icon.png', 0, 0, '2020-08-28', 'Marrakech', 0, 5, 13, 3),
(6, 'Voiture à vendre', '\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Enim beatae veritatis debitis, laboriosam atque neque, earum fugiat vel, quibusdam saepe dolore? Ipsum neque accusamus ullam vitae iure, magni quasi tempore.', 'images.jfif', 0, 0, '2020-08-29', 'Meknès', 0, 5, 13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `domain`
--

CREATE TABLE `domain` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `domain`
--

INSERT INTO `domain` (`id`, `img`, `name`) VALUES
(1, 'immobilier.png', 'Immobilier'),
(2, 'tech.png', 'Technologie'),
(3, 'emploi.png', 'Emlpoi'),
(4, 'auto.png', 'Auto-moto'),
(5, 'brico.png', 'Bricolage'),
(6, 'sport.png', 'Sport-Loisirs'),
(7, 'beaute.png', 'Beauté');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `role`) VALUES
(11, 'sketch', '$2y$10$Rm.XyrJpOR1GgAUjxO18yOGGtdsC37iKl57UGfesErNQ1Ym3pkR0m', 'sketchdotnet@gmail.com', 'Abdellah', 'Daif', 632056086, 'admin'),
(12, 'zniti', '$2y$10$H59VZikd.CRKMeI.TANWUOUQmT4lLEbSN1LSkqLCiQyhPHAk/F8eS', 'Zniti@gmail.com', 'Anas', 'Benziti', 633333333, 'user'),
(13, 'Sami', '$2y$10$uUP24Uvhj.8GjQ2uIk/E2uXT7kFQaEZRzTFILkGm/zIJbQgDoYfri', 'sami@mail.com', 'Sami', 'Benhababa', 600000000, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `voted`
--

CREATE TABLE `voted` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `up` tinyint(1) NOT NULL,
  `down` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voted`
--

INSERT INTO `voted` (`id`, `post_id`, `user_id`, `up`, `down`) VALUES
(1, 1, 11, 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `dom_id` (`dom_id`);

--
-- Index pour la table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `voted`
--
ALTER TABLE `voted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `announcement_ibfk_2` FOREIGN KEY (`dom_id`) REFERENCES `domain` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
