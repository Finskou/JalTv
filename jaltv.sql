-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 14 fév. 2020 à 15:02
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jaltv`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `idCategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `image`, `created_at`, `idCategory`) VALUES
(41, 'Titre de l\'article 1', 'Contenu de l\'article n 1', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(42, 'Titre de l\'article 2', 'Contenu de l\'article n 2', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(43, 'Titre de l\'article 3', 'Contenu de l\'article n 3', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(44, 'Titre de l\'article 4', 'Contenu de l\'article n 4', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(45, 'Titre de l\'article 5', 'Contenu de l\'article n 5', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(46, 'Titre de l\'article 6', 'Contenu de l\'article n 6', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(47, 'Titre de l\'article 7', 'Contenu de l\'article n 7', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(48, 'Titre de l\'article 8', 'Contenu de l\'article n 8', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(49, 'Titre de l\'article 9', 'Contenu de l\'article n 9', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL),
(50, 'Titre de l\'article 10', 'Contenu de l\'article n 10', 'https://via.placeholder.com/150', '2020-02-14 14:13:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200206145710', '2020-02-06 15:00:03'),
('20200210180927', '2020-02-10 18:37:45'),
('20200210183728', '2020-02-10 19:55:09');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`) VALUES
(3, 'admin@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$NFZkOUdoTVoucmttL2swZQ$QVEBWz7u/Sx71m/5pGS0AzeTOE654xbdZf8W4dCeCvY', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idCategory` (`idCategory`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
