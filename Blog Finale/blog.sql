-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le :  mar. 07 jan. 2020 à 09:35
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
(1, 'Salut WF3 !', 'Lorem ipsum dolor https://cours.wf3.fr/\r\nsit amet, [b]consectetur[/b] adipiscing elit. [b]Nam[/b] quis commodo ipsum, finibus tincidunt metus. Etiam ut viverra magna, id venenatis risus. Nam quis nibh accumsan, tempus nisl non, mollis odio. Maecenas a nisi eu quam pellentesque ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam eget rhoncus urna. Nulla facilisi. Nunc eu felis a orci pretium fermentum. Phasellus hendrerit aliquam libero, at porttitor justo bibendum vitae.\r\n\r\nEtiam ut accumsan odio, laoreet dapibus ipsum. Vestibulum tincidunt vel mi eu varius. Quisque ac pellentesque est. Aliquam eget vulputate velit, at vestibulum eros. Cras leo eros, molestie ut risus at, faucibus tempus sapien. Suspendisse luctus augue lorem, sit amet faucibus mi ornare non. Nulla pharetra ipsum et rutrum pulvinar. Sed nec consectetur nibh, in venenatis ante. Cras neque lacus, vulputate ac leo sit amet, tempus volutpat eros. Nullam ullamcorper justo quis nulla consequat sollicitudin non ut ante. Phasellus lectus arcu, tempor bibendum condimentum vel, vulputate et quam. Vivamus eleifend imperdiet dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\nDonec elementum nisl scelerisque, vulputate metus sed, fermentum est. Praesent consequat dapibus nunc vitae facilisis. Duis in fringilla elit. Ut hendrerit euismod libero sit amet scelerisque. Vestibulum dignissim vestibulum lorem, quis venenatis augue rutrum tempus. Duis sit amet ornare tortor. Sed sollicitudin scelerisque egestas.\r\n\r\nSuspendisse vel risus tempor, finibus mi id, fringilla lectus. Nulla et diam mattis, tristique risus ut, efficitur risus. Donec leo dui, gravida vel auctor id, interdum vel elit. Ut vel ligula neque. Phasellus fermentum, est in ultricies consequat, massa dolor tempus ante, sit amet tempor erat diam a urna. Pellentesque sit amet elementum ligula, ut sagittis erat. Sed iaculis libero sed dolor blandit mattis. Aliquam erat volutpat. Donec sem eros, fermentum vel urna vel, hendrerit blandit purus.\r\n\r\nUt varius est eget condimentum facilisis. Vestibulum sem eros, cursus in molestie tristique, condimentum eget risus. Fusce pellentesque, leo sed molestie interdum, turpis nunc egestas nisi, sed auctor nisi ante eu ex. Duis suscipit pellentesque hendrerit. Proin eu fringilla lorem. Nam vulputate blandit vehicula. Sed eu quam et purus volutpat vulputate. Sed mattis aliquam dolor, vitae viverra diam iaculis eget. Suspendisse venenatis interdum lacinia. Pellentesque porta nibh et accumsan consequat. ', 2, '2019-12-01 00:00:00', 'Strasbourg.jpg'),
(2, 'Cours PDO', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae nisi sit amet ex malesuada ullamcorper sed at mauris. Sed sed porttitor nunc. Morbi quis sollicitudin urna. Morbi nec mauris varius, blandit nibh id, ullamcorper dui. Proin non velit molestie, elementum ante ac, semper magna. Aliquam porta condimentum lacus, id pulvinar odio malesuada tempus. Cras tortor dui, tempor id lobortis venenatis, vehicula et tortor. Quisque sit amet lorem sit amet ipsum feugiat fringilla. Nullam vel egestas augue, in hendrerit nisl. Etiam scelerisque condimentum cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis finibus efficitur felis, quis dictum mi fringilla ac. Nam ac massa eu turpis rhoncus auctor. Aliquam eros leo, mollis vitae lorem non, malesuada aliquet mi.\r\n\r\nSed bibendum vestibulum dolor, eu dapibus neque vestibulum ac. Phasellus cursus iaculis laoreet. In eleifend tincidunt augue, non vehicula elit fermentum vel. Donec dignissim aliquam tellus, sed consequat nisl lacinia eu. Nullam vel condimentum lorem. Vivamus tristique finibus risus et venenatis. Duis mattis, erat ut dignissim vulputate, eros purus dapibus lectus, eu malesuada purus nisi vel quam. Curabitur eros tortor, faucibus sit amet leo in, vehicula consequat arcu. Aenean consectetur lorem aliquet, porttitor lorem eu, vulputate erat.\r\n\r\nNullam facilisis sollicitudin turpis ut egestas. Curabitur tempor eros nunc, non efficitur metus pretium eget. Suspendisse augue est, molestie vel porta varius, ornare eu metus. Sed fermentum arcu eget mauris euismod, vitae tincidunt nisl pellentesque. Nunc imperdiet ultrices felis, porta consectetur purus faucibus ac. In velit mi, rutrum sit amet nisi nec, vehicula elementum nulla. Integer sollicitudin tempus enim id euismod.\r\n\r\nSuspendisse dignissim malesuada nulla, convallis condimentum arcu auctor sodales. In ullamcorper vehicula velit, non tincidunt mi dignissim in. In vitae pharetra nunc. Fusce feugiat neque dolor, ut ornare risus vestibulum eget. Aenean sed suscipit nisl. Morbi cursus nulla vitae lorem pellentesque, a porta nisl tempus. Nam et nisl a turpis lacinia imperdiet ac non odio. Aliquam vel cursus nisi. Nulla at varius elit, eu tristique neque. Quisque ornare ultricies lacus id elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin a massa sit amet leo imperdiet pharetra. Phasellus finibus dolor eu hendrerit ultricies. Sed ut aliquet urna. Aliquam tempus ante vitae ante aliquet eleifend. Proin rutrum posuere fermentum. Nulla sollicitudin, dolor sit amet commodo posuere, nunc ante molestie justo, nec sagittis augue tellus sed lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elit arcu, cursus ac bibendum in, consectetur posuere tortor. In ac volutpat lacus. Ut nec eleifend orci, eget gravida orci. Nullam nibh ipsum, tempus eu porttitor sit amet, ullamcorper id sapien. Sed vitae facilisis sem. Mauris venenatis eget libero at semper. Proin sit amet lectus pellentesque justo elementum viverra vel vel quam. Integer quis nibh mi. ', 2, '2019-12-03 00:00:00', 'Strasbourg.jpg'),
(3, 'QUoi de neuf ?', 'Suspendisse ornare orci ac nulla molestie vulputate. Integer blandit dolor sed odio pellentesque, posuere tincidunt magna luctus. Donec risus velit, blandit id vulputate eget, molestie vel nibh. Nulla dapibus rutrum ante, et venenatis sem rutrum et. Sed a lacus at quam pellentesque vulputate. Pellentesque vel purus pulvinar, egestas ligula a, faucibus orci. Phasellus vehicula euismod enim eget scelerisque. In luctus congue nisi id commodo. Morbi eros nulla, malesuada non molestie ut, eleifend a odio. Duis maximus volutpat massa, efficitur vestibulum nibh aliquam in. Quisque finibus elit a ante aliquam, aliquet consequat arcu scelerisque. Donec tempor dolor nec massa rutrum ultrices. Aenean nec nulla turpis. Fusce porttitor imperdiet aliquam. Vivamus sed ante sit amet nunc laoreet euismod ut in arcu. Etiam accumsan risus a risus auctor vehicula. ', 1, '2019-12-15 00:00:00', 'Strasbourg.jpg'),
(4, 'PHP 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis, mi sed aliquet convallis, nisl eros tincidunt arcu, sit amet dapibus velit sapien eu velit. Curabitur tellus ex, suscipit sit amet maximus eu, semper a augue. Praesent a porttitor felis. Pellentesque eget nibh vel diam commodo tristique. Nam eleifend, diam nec viverra finibus, dolor dui dignissim tellus, vel finibus lacus sapien ac enim. Suspendisse potenti. Duis lacinia urna cursus, venenatis tellus non, tincidunt felis. Donec finibus fermentum quam ac blandit. In vehicula, metus quis cursus rhoncus, urna eros hendrerit dui, eu iaculis est orci at urna. Maecenas mollis in orci vel efficitur. Maecenas lobortis turpis lorem, in mattis augue congue id. Morbi at est molestie elit suscipit accumsan sed id elit. ', 2, '2019-12-01 00:00:00', 'sea.jpg'),
(5, 'MySQL', 'Proin id nisl viverra, faucibus tortor eget, vehicula urna. Etiam tempor rutrum dolor at posuere. Nullam sagittis pulvinar metus eget euismod. Pellentesque sed nisi massa. Curabitur semper nec neque in euismod. In libero metus, molestie sed fermentum ac, feugiat et libero. Nullam eu tempor orci. Duis vel tellus fermentum nisl interdum dictum vel eu purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum accumsan mi non arcu feugiat, non tincidunt augue pharetra. In pretium ex viverra tempor aliquam. Vestibulum bibendum imperdiet massa, maximus consequat neque eleifend at. Etiam a egestas tortor, ut interdum lorem. Vestibulum vel augue pulvinar dui rhoncus varius quis at velit. ', 2, '2019-12-03 00:00:00', 'sea.jpg'),
(6, 'Laravel', 'Suspendisse ornare orci ac nulla molestie vulputate. Integer blandit dolor sed odio pellentesque, posuere tincidunt magna luctus. Donec risus velit, blandit id vulputate eget, molestie vel nibh. Nulla dapibus rutrum ante, et venenatis sem rutrum et. Sed a lacus at quam pellentesque vulputate. Pellentesque vel purus pulvinar, egestas ligula a, faucibus orci. Phasellus vehicula euismod enim eget scelerisque. In luctus congue nisi id commodo. Morbi eros nulla, malesuada non molestie ut, eleifend a odio. Duis maximus volutpat massa, efficitur vestibulum nibh aliquam in. Quisque finibus elit a ante aliquam, aliquet consequat arcu scelerisque. Donec tempor dolor nec massa rutrum ultrices. Aenean nec nulla turpis. Fusce porttitor imperdiet aliquam. Vivamus sed ante sit amet nunc laoreet euismod ut in arcu. Etiam accumsan risus a risus auctor vehicula. ', 1, '2019-12-15 00:00:00', 'sea.jpg'),
(10, 'gfd', 'gfdgdfgdfgdfb', 1, '2019-12-17 00:00:00', 'Strasbourg.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
