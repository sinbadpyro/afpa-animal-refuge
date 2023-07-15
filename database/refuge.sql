-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 10 juil. 2023 à 15:01
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `refuge`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id` int NOT NULL,
  `date_of_birth` date NOT NULL,
  `tatoo` tinyint(1) NOT NULL,
  `chip` tinyint(1) NOT NULL,
  `sex` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(25) NOT NULL,
  `weight` varchar(25) NOT NULL,
  `arrival_date` date NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `adoption_date` date NOT NULL,
  `id_Specie` int NOT NULL,
  `id_Color` int NOT NULL,
  `id_Breed` int NOT NULL,
  `img` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `date_of_birth`, `tatoo`, `chip`, `sex`, `name`, `weight`, `arrival_date`, `reserved`, `adoption_date`, `id_Specie`, `id_Color`, `id_Breed`, `img`, `description`) VALUES
(8, '1985-08-30', 1, 1, 'female', 'intrue', '7kg', '1996-01-01', 1, '1996-02-01', 1, 1, 9, NULL, NULL),
(9, '2023-01-01', 1, 0, 'female', 'Syrac', '2kg', '2023-07-06', 1, '2023-07-09', 1, 8, 9, NULL, NULL),
(10, '2023-06-27', 1, 1, 'male', 'gogo', '1kg', '2023-07-05', 0, '2023-07-08', 1, 1, 12, NULL, NULL),
(11, '2023-06-27', 1, 0, 'male', 'bol', '1kg', '2023-07-06', 0, '2023-07-07', 1, 7, 10, NULL, NULL),
(12, '2023-06-28', 0, 0, 'male', 'menu', '1kg', '2023-07-04', 0, '2023-07-07', 1, 1, 7, NULL, NULL),
(13, '2023-06-28', 0, 1, 'male', 'djk', '1kg', '2023-06-29', 0, '2023-07-09', 1, 1, 7, NULL, NULL),
(17, '2023-05-01', 0, 0, 'female', 'SnowShoe', '4kg', '2023-07-09', 1, '2023-07-10', 1, 4, 7, 'https://images.pexels.com/photos/1828875/pexels-photo-1828875.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', NULL),
(18, '2023-05-01', 0, 0, 'female', 'SnowShoe', '4kg', '2023-07-09', 1, '2023-07-10', 1, 4, 9, 'https://www.pexels.com/fr-fr/photo/chat-blanc-sur-chaise-384555/', NULL),
(19, '2023-05-01', 0, 0, 'female', 'SnowShoe', '4kg', '2023-07-09', 1, '2023-07-10', 1, 4, 10, 'https://images.pexels.com/photos/57416/cat-sweet-kitty-animals-57416.jpeg?auto=compress&cs=tinysrgb&w=1600', NULL),
(20, '2023-05-01', 0, 0, 'female', 'SnowShoe', '4kg', '2023-07-09', 1, '2023-07-10', 1, 4, 10, 'https://www.pexels.com/fr-fr/photo/chat-blanc-sur-chaise-384555/', 'Ce chaton marron de 15 jours est un amour ! Il est câlin, joueur et en pleine forme. Il cherche une famille qui lui donnera tout son cœur. Venez le voir à la spa, il vous attend !');

-- --------------------------------------------------------

--
-- Structure de la table `breed`
--

CREATE TABLE `breed` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_Specie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `breed`
--

INSERT INTO `breed` (`id`, `name`, `id_Specie`) VALUES
(7, 'Sacré de Birmanie', 1),
(8, 'Nu de Chine', 1),
(9, 'Norvégien', 1),
(10, 'SnowShoe', 1),
(12, 'Chat du Bengale', 1),
(13, 'Sphinx Canadien', 1),
(14, 'American Stafford Terrier', 2),
(15, 'Dogue de Bordeaux', 2),
(16, 'Rottweiler', 2),
(17, 'Mâtin de Naples', 2),
(18, 'Doberman', 2),
(19, 'Dogue Argentin', 2);

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'marron clair'),
(2, 'marron'),
(3, 'beige'),
(4, 'blanc'),
(5, 'feu'),
(6, 'rose'),
(7, 'marron fonce'),
(8, 'roux'),
(9, 'noir'),
(10, 'bleu'),
(11, 'noir'),
(12, 'blanc');

-- --------------------------------------------------------

--
-- Structure de la table `specie`
--

CREATE TABLE `specie` (
  `id` int NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `specie`
--

INSERT INTO `specie` (`id`, `name`) VALUES
(1, 'chat'),
(2, 'chien');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_Specie_FK` (`id_Specie`),
  ADD KEY `animal_Breed1_FK` (`id_Breed`),
  ADD KEY `animal_Color1_FK` (`id_Color`) USING BTREE;

--
-- Index pour la table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Breed_Specie_FK` (`id_Specie`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specie`
--
ALTER TABLE `specie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `specie`
--
ALTER TABLE `specie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_Breed1_FK` FOREIGN KEY (`id_Breed`) REFERENCES `breed` (`id`),
  ADD CONSTRAINT `animal_Color0_FK` FOREIGN KEY (`id_Color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `animal_Specie_FK` FOREIGN KEY (`id_Specie`) REFERENCES `specie` (`id`);

--
-- Contraintes pour la table `breed`
--
ALTER TABLE `breed`
  ADD CONSTRAINT `Breed_Specie_FK` FOREIGN KEY (`id_Specie`) REFERENCES `specie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
