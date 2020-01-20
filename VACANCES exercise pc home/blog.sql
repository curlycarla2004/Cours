-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le :  ven. 20 déc. 2019 à 16:07
-- Version du serveur :  5.7.28
-- Version de PHP :  7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `pseudo`, `mot_de_passe`) VALUES
(1, 'wf3', '$2y$10$QZ3Qs8aOBBKoTGBvmf8Iy.ULxsGjxD8UCUXKBzGoqASbLE9AUy2MG');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `corps` text,
  `auteur_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `corps`, `auteur_id`, `date`, `img_url`) VALUES
(1, 'Salut WF3 !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis, mi sed aliquet convallis, nisl eros tincidunt arcu, sit amet dapibus velit sapien eu velit. Curabitur tellus ex, suscipit sit amet maximus eu, semper a augue. Praesent a porttitor felis. Pellentesque eget nibh vel diam commodo tristique. Nam eleifend, diam nec viverra finibus, dolor dui dignissim tellus, vel finibus lacus sapien ac enim. Suspendisse potenti. Duis lacinia urna cursus, venenatis tellus non, tincidunt felis. Donec finibus fermentum quam ac blandit. In vehicula, metus quis cursus rhoncus, urna eros hendrerit dui, eu iaculis est orci at urna. Maecenas mollis in orci vel efficitur. Maecenas lobortis turpis lorem, in mattis augue congue id. Morbi at est molestie elit suscipit accumsan sed id elit. ', 2, '2019-12-01 00:00:00', 'images/santosh-verma-qtbCV80n1ts-unsplash.jpg'),
(2, 'Cours PDO', 'Proin id nisl viverra, faucibus tortor eget, vehicula urna. Etiam tempor rutrum dolor at posuere. Nullam sagittis pulvinar metus eget euismod. Pellentesque sed nisi massa. Curabitur semper nec neque in euismod. In libero metus, molestie sed fermentum ac, feugiat et libero. Nullam eu tempor orci. Duis vel tellus fermentum nisl interdum dictum vel eu purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum accumsan mi non arcu feugiat, non tincidunt augue pharetra. In pretium ex viverra tempor aliquam. Vestibulum bibendum imperdiet massa, maximus consequat neque eleifend at. Etiam a egestas tortor, ut interdum lorem. Vestibulum vel augue pulvinar dui rhoncus varius quis at velit. ', 2, '2019-12-03 00:00:00', 'images/cofee.jpg'),
(3, 'QUoi de neuf ?', 'Suspendisse ornare orci ac nulla molestie vulputate. Integer blandit dolor sed odio pellentesque, posuere tincidunt magna luctus. Donec risus velit, blandit id vulputate eget, molestie vel nibh. Nulla dapibus rutrum ante, et venenatis sem rutrum et. Sed a lacus at quam pellentesque vulputate. Pellentesque vel purus pulvinar, egestas ligula a, faucibus orci. Phasellus vehicula euismod enim eget scelerisque. In luctus congue nisi id commodo. Morbi eros nulla, malesuada non molestie ut, eleifend a odio. Duis maximus volutpat massa, efficitur vestibulum nibh aliquam in. Quisque finibus elit a ante aliquam, aliquet consequat arcu scelerisque. Donec tempor dolor nec massa rutrum ultrices. Aenean nec nulla turpis. Fusce porttitor imperdiet aliquam. Vivamus sed ante sit amet nunc laoreet euismod ut in arcu. Etiam accumsan risus a risus auctor vehicula. ', 1, '2019-12-15 00:00:00', NULL),
(4, 'PHP 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis, mi sed aliquet convallis, nisl eros tincidunt arcu, sit amet dapibus velit sapien eu velit. Curabitur tellus ex, suscipit sit amet maximus eu, semper a augue. Praesent a porttitor felis. Pellentesque eget nibh vel diam commodo tristique. Nam eleifend, diam nec viverra finibus, dolor dui dignissim tellus, vel finibus lacus sapien ac enim. Suspendisse potenti. Duis lacinia urna cursus, venenatis tellus non, tincidunt felis. Donec finibus fermentum quam ac blandit. In vehicula, metus quis cursus rhoncus, urna eros hendrerit dui, eu iaculis est orci at urna. Maecenas mollis in orci vel efficitur. Maecenas lobortis turpis lorem, in mattis augue congue id. Morbi at est molestie elit suscipit accumsan sed id elit. ', 2, '2019-12-01 10:25:47', NULL),
(5, 'MySQL', 'Proin id nisl viverra, faucibus tortor eget, vehicula urna. Etiam tempor rutrum dolor at posuere. Nullam sagittis pulvinar metus eget euismod. Pellentesque sed nisi massa. Curabitur semper nec neque in euismod. In libero metus, molestie sed fermentum ac, feugiat et libero. Nullam eu tempor orci. Duis vel tellus fermentum nisl interdum dictum vel eu purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum accumsan mi non arcu feugiat, non tincidunt augue pharetra. In pretium ex viverra tempor aliquam. Vestibulum bibendum imperdiet massa, maximus consequat neque eleifend at. Etiam a egestas tortor, ut interdum lorem. Vestibulum vel augue pulvinar dui rhoncus varius quis at velit. ', 2, '2019-12-03 10:25:47', NULL),
(6, 'Laravel', 'Suspendisse ornare orci ac nulla molestie vulputate. Integer blandit dolor sed odio pellentesque, posuere tincidunt magna luctus. Donec risus velit, blandit id vulputate eget, molestie vel nibh. Nulla dapibus rutrum ante, et venenatis sem rutrum et. Sed a lacus at quam pellentesque vulputate. Pellentesque vel purus pulvinar, egestas ligula a, faucibus orci. Phasellus vehicula euismod enim eget scelerisque. In luctus congue nisi id commodo. Morbi eros nulla, malesuada non molestie ut, eleifend a odio. Duis maximus volutpat massa, efficitur vestibulum nibh aliquam in. Quisque finibus elit a ante aliquam, aliquet consequat arcu scelerisque. Donec tempor dolor nec massa rutrum ultrices. Aenean nec nulla turpis. Fusce porttitor imperdiet aliquam. Vivamus sed ante sit amet nunc laoreet euismod ut in arcu. Etiam accumsan risus a risus auctor vehicula. ', 1, '2019-12-15 10:25:47', NULL),
(10, 'gfd', 'gfdgdfgdfgdfb', 1, '2019-12-17 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `article_has_tag`
--

CREATE TABLE `article_has_tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article_has_tag`
--

INSERT INTO `article_has_tag` (`article_id`, `tag_id`) VALUES
(2, 1),
(3, 2),
(1, 3),
(3, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`) VALUES
(1, 'MARTIN', 'Bob'),
(2, 'JEAN', 'Michel');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `nom`) VALUES
(1, 'sport'),
(2, 'politique'),
(3, 'economie'),
(4, 'loisirs');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ind_pseudo` (`pseudo`) USING BTREE;

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_article_auteur1_idx` (`auteur_id`),
  ADD KEY `ind_date` (`date`);

--
-- Index pour la table `article_has_tag`
--
ALTER TABLE `article_has_tag`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `fk_article_has_tag_tag1_idx` (`tag_id`),
  ADD KEY `fk_article_has_tag_article_idx` (`article_id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_auteur1` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `article_has_tag`
--
ALTER TABLE `article_has_tag`
  ADD CONSTRAINT `fk_article_has_tag_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_has_tag_tag1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
