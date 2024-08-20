-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 déc. 2023 à 05:45
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `amelioration_stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `entre`
--

DROP TABLE IF EXISTS `entre`;
CREATE TABLE IF NOT EXISTS `entre` (
  `id_entre` int NOT NULL AUTO_INCREMENT,
  `numero_personnel` int NOT NULL,
  `date_entre` date DEFAULT NULL,
  `heure_entre` time DEFAULT NULL,
  `materiel_apporter` varchar(255) DEFAULT NULL,
  `date_creation` date NOT NULL,
  `heure_creaction` time NOT NULL,
  PRIMARY KEY (`id_entre`,`numero_personnel`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `entre`
--

INSERT INTO `entre` (`id_entre`, `numero_personnel`, `date_entre`, `heure_entre`, `materiel_apporter`, `date_creation`, `heure_creaction`) VALUES
(32, 2, '2023-12-06', '08:42:07', '', '2023-12-06', '08:42:07'),
(29, 1, '2023-11-28', '09:36:43', '', '2023-11-28', '09:36:43'),
(31, 1, '2023-12-06', '08:35:22', '', '2023-12-06', '08:35:22');

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id_permission` int NOT NULL AUTO_INCREMENT,
  `numero_personnel` int NOT NULL,
  `date_permission` date NOT NULL,
  `heure_sortie` time DEFAULT NULL,
  `heure_retour` time DEFAULT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `date_creation` date NOT NULL,
  `heure_creaction` time NOT NULL,
  PRIMARY KEY (`id_permission`,`numero_personnel`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `permission`
--

INSERT INTO `permission` (`id_permission`, `numero_personnel`, `date_permission`, `heure_sortie`, `heure_retour`, `motif`, `date_creation`, `heure_creaction`) VALUES
(104, 1, '2023-12-06', '08:33:48', '08:34:11', 'gouter', '2023-12-06', '08:33:48'),
(105, 2, '2023-12-06', '08:34:08', '00:00:00', 'pichoir', '2023-12-06', '08:34:08'),
(102, 1, '2023-11-28', '09:38:25', '11:59:39', 'aucun', '2023-11-28', '09:38:25'),
(103, 2, '2023-11-28', '11:59:48', '11:59:51', 'eee', '2023-11-28', '11:59:48');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `numero_personnel` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `poste` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `numero_telephone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `age` int NOT NULL,
  `numero_cin` varchar(12) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `langue` varchar(20) NOT NULL,
  `date_creation` date NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`numero_personnel`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`numero_personnel`, `nom`, `prenom`, `poste`, `numero_telephone`, `email`, `age`, `numero_cin`, `adresse`, `langue`, `date_creation`, `image`) VALUES
(1, 'Computer', 'Store', 'Magasin', '0340629175', 'computerstore.net1@gmail.com', 4, '000000000000', 'Ampasambazaha', 'Malagasy', '2023-11-28', 'logo computer store.jpg'),
(2, 'Computer', 'STORE', 'fianaratsoa', '034444444', 'comuter@gmail.com', 111, '22222', 'fianarantsoa', 'malagasy', '2023-11-28', 'IMG_20230621_174846.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
CREATE TABLE IF NOT EXISTS `sortie` (
  `id_sortie` int NOT NULL AUTO_INCREMENT,
  `numero_personnel` int NOT NULL,
  `date_sortie` date DEFAULT NULL,
  `heure_sortie` time DEFAULT NULL,
  `date_creation` date NOT NULL,
  `heure_creaction` time NOT NULL,
  PRIMARY KEY (`id_sortie`,`numero_personnel`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`id_sortie`, `numero_personnel`, `date_sortie`, `heure_sortie`, `date_creation`, `heure_creaction`) VALUES
(83, 2, '2023-12-06', '08:42:12', '2023-12-06', '08:42:12'),
(80, 1, '2023-11-28', '11:58:58', '2023-11-28', '11:58:58');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mot_de_passe` varchar(8) NOT NULL,
  `nom_utilisateur` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mot_de_passe`, `nom_utilisateur`) VALUES
(1, 'admin', 'admin'),
(2, 'autre', 'autre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
