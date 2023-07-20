-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 17 juil. 2023 à 10:38
-- Version du serveur : 8.0.32
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `oc-david-p5.sql`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `id_parent` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created`, `id_user`, `id_parent`) VALUES
(18, 'un titre', 'lorem ipsum lorem ipsum ', '2023-03-20 12:49:26', 21, NULL),
(24, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(25, 'Amet consectetur', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(26, 'Adipisicing dolor ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.consectetur. ', '2023-03-20 01:20:10', 21, 18),
(27, 'Ipsum dolor amet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum.', '2023-03-20 01:20:10', 21, 18),
(28, 'Lorem econsectetur ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.dolor sit.', '2023-03-20 01:20:10', 21, 18),
(29, 'elit amet ', 'Amet consectetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(30, 'forte titrum ', 'Adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(31, 'consectetur - elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(69, 'Dormeur du val', 'd\'argent,\r\nOù le soleil de la montagne luit,\r\nC\'est un petit val qui mousse de rayon.\r\nUn soldat jeune, bouche ouverte, tête nue ...', NULL, NULL, NULL),
(70, 'Dormeur du val2', 'd\'argent,\r\nOù le soleil de la montagne luit,\r\nC\'est un petit val qui mousse de rayon.\r\nUn soldat jeune, bouche ouverte, tête nue ...', NULL, 34, 27),
(71, 'Dormeur du val', 'd\'argent,\r\nOù le soleil de la montagne luit,\r\nC\'est un petit val qui mousse de rayon.\r\nUn soldat jeune, bouche ouverte, tête nue ...', NULL, NULL, NULL),
(72, 'Dormeur du val2', 'd\'argent,\r\nOù le soleil de la montagne luit,\r\nC\'est un petit val qui mousse de rayon.\r\nUn soldat jeune, bouche ouverte, tête nue ...', NULL, 34, 27),
(73, 'title', 'content', NULL, NULL, NULL),
(74, 'title', 'content', NULL, NULL, NULL),
(75, 'title', 'content', NULL, NULL, NULL),
(76, 'title', 'content', NULL, NULL, NULL),
(77, 'title', 'content', NULL, NULL, NULL),
(78, NULL, 'Commentaire de Laure Legrand ...', NULL, NULL, 31),
(79, NULL, 'Un commentaire de Louis Jouvet ...', NULL, NULL, 27),
(81, NULL, 'Un commentaire de Louis Jouvet ...', NULL, NULL, 27),
(84, NULL, 'Un commentaire de Jeanne Baptiste ..*.', NULL, NULL, 27),
(85, NULL, 'Un commentaire de Jeanne Baptiste 2', NULL, NULL, 27),
(86, NULL, 'Un commentaire de Jeanne Baptiste 3', NULL, NULL, 27),
(87, NULL, 'un commentaire de takeo Jeanne1', NULL, NULL, NULL),
(88, NULL, 'un commentaire de takeo Jeanne2', NULL, NULL, 72),
(89, NULL, 'un commentaire de takeo Jeanne2', NULL, NULL, 72),
(90, NULL, 'un commentaire de takeo Jeanne2', NULL, NULL, 72),
(91, NULL, 'Un commentaire de davidOC', NULL, NULL, 30),
(92, NULL, 'Un commentaire de davidOC', NULL, NULL, 30),
(93, NULL, 'Un commentaire de davidOC', NULL, NULL, 30),
(94, NULL, 'Un commentaire de davidOC', NULL, NULL, 30),
(95, NULL, 'Un commentaire de davidOC', NULL, NULL, 30),
(96, NULL, 'un commentaire de louis Jouvet', NULL, NULL, 26),
(97, NULL, 'un commentaire de louis Jouvet', NULL, NULL, NULL),
(98, NULL, 'bj@gmail.com', NULL, NULL, NULL),
(99, NULL, 'bj@gmail.com', NULL, NULL, 69),
(101, NULL, 'bj@gmail.com', NULL, NULL, 69),
(102, NULL, 'bj@gmail.com', NULL, NULL, 69),
(103, NULL, 'bj@gmail.com', NULL, NULL, 69),
(104, NULL, 'bj@gmail.com', NULL, NULL, 69),
(105, NULL, 'bj@gmail.com', NULL, NULL, 69),
(106, NULL, 'bj@gmail.com', NULL, NULL, 69),
(107, NULL, 'bj@gmail.com', NULL, NULL, 69),
(108, NULL, 'UN COMMENTAIRE DE RENE LACANNE', NULL, NULL, 24),
(109, NULL, 'UN COMMENTAIRE DE RENE LACANNE', NULL, NULL, 24),
(110, NULL, 'UN COMMENTAIRE DE RENE LACANNE', NULL, NULL, 24),
(113, NULL, 'UN COMMENTAIRE DE RENE LACANNE', NULL, NULL, 24),
(116, NULL, 'UN COMMENTAIRE DE RENE LACANNE', NULL, NULL, 24),
(117, NULL, 'COMMENTAIRE RENE LACANNE', NULL, NULL, 69),
(118, NULL, '*$^poij', NULL, NULL, 24),
(120, 'insertion', 'insertion avec phpMyAdmin', NULL, 41, 104),
(121, 'insertion', 'insertion avec phpMyAdmin', NULL, 41, 104),
(122, '', 'COMMENTAIRE PHPMYADMIN', NULL, NULL, 86),
(123, '', 'COMMENTAIRE PHPMYADMIN', NULL, NULL, 86),
(124, NULL, 'un commentaire de takeo Jeanne1', NULL, NULL, NULL),
(125, NULL, 'un commentaire de takeo Jeanne1', NULL, NULL, NULL),
(126, NULL, 'Commentaire de Laure Legrand ...', NULL, NULL, 31),
(129, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(141, NULL, 'commentaire erreur', NULL, 21, 24),
(142, NULL, 'un commentaire erreur', NULL, 21, 24),
(143, NULL, 'un commentaire erreur', NULL, 21, 24),
(144, NULL, 'Erreur commentaire', NULL, 21, 69),
(145, 'Erreur commentaire', 'COMMENTAIRE Erreur', '2023-05-07 18:40:35', 213, 104),
(146, 'Erreur commentaire', 'COMMENTAIRE Erreur', '2023-05-07 18:40:35', 213, 104),
(147, NULL, 'Erreur commentaire', NULL, 21, 69),
(148, NULL, '5\r\n;,', NULL, 21, 26),
(149, NULL, '654\r\nùm, :;, bnj,lmù*\r\n4', NULL, 21, 26),
(150, NULL, 'COMMENTAIRE LE 07/05/23 A 18h53', NULL, 21, 18),
(151, NULL, 'UN AUTRE COMMENTAIRE', NULL, 21, 24),
(152, NULL, 'UN AUTRE COMMENTAIRE DE RENE', NULL, 21, 24),
(153, NULL, 'commentaire pour id_parent', NULL, 21, 24),
(154, NULL, 'Un commentaire de Louis JOuvet.\r\nA afficher ', NULL, 21, 69),
(155, NULL, 'UN nouveau commentaire de Jeanne Baptiste ce Mercredi', NULL, 21, 69),
(156, NULL, 'Un nveau commentaire de laure Legrand now', NULL, 21, 26),
(157, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(158, NULL, 'Commentaire laure legrand id_parent : 30', NULL, 21, 30),
(159, NULL, 'un commentaire de laure legrand id_parent : 30', NULL, 21, 30),
(160, NULL, 'commentaire laure legrand id_parent : 69', NULL, 21, 69),
(161, NULL, 'nvo commentaire laure legrand id_parent : 27 avec son id : 27', NULL, 21, 27),
(162, NULL, 'Nvo com. jeanne baptiste id_parent : 31', NULL, 21, 31),
(163, NULL, 'commentaire rené lacanne sur l\'article 25', NULL, 21, 25),
(164, NULL, 'Un second commentaire de l\'article 25 par Jeanne Baptiste !!', NULL, 21, 25),
(165, NULL, 'commentaire EN PLUS DE rené lacanne sur l\'article 25', NULL, 21, 25),
(166, NULL, 'uN POST de JEANNE Baptise sur l\'id 18', NULL, 21, 18),
(167, NULL, 'Un cOmMeNtairE de JEanne BapTiste POUR l\'ID 69', NULL, 21, 69),
(168, NULL, 'TEST UN treizième commentaire !!!!!!!!!!', NULL, 21, 18),
(169, NULL, 'TEST UN treizième commentaire !!!!!!!!!!', NULL, 21, 18),
(170, NULL, 'VéRiFICAtion DE LA validité du commentaire de Laure Legrand article : 24', NULL, 21, 24),
(171, NULL, 'jhgfrdesdf(-xfh ', NULL, 21, 18),
(172, NULL, 'jhgfrdesdf(-xfh ', NULL, 21, 18),
(173, NULL, 'jhgfrdesdf(-xfh ', NULL, 21, 18),
(174, 'Via phpMyadmin', 'texte de l\'article !', '2023-06-07 20:34:20', NULL, NULL),
(175, 'Via phpMyadmin', 'texte de l\'article !', '2023-06-07 20:34:20', NULL, NULL),
(176, NULL, '\r\nùmlj', NULL, 21, 30),
(177, NULL, 'Un commentaire le 12 06 23', NULL, 21, 18),
(178, NULL, 'commentaire sur premier titre', NULL, 21, 24),
(179, NULL, 'commentaire sur l\'article numéro 25 Amet consectetur', NULL, 21, 25),
(180, NULL, 'commentaire sur l\'article numéro 25 Amet consectetur', NULL, 21, 25),
(181, NULL, 'commentaire sur l\'article numéro 25 Amet consectetur', NULL, 21, 25),
(182, NULL, 'commentaire sur l\'article numéro 25 Amet consectetur', NULL, 21, 25),
(183, NULL, 'commentaire sur l\'article numéro 25 Amet consectetur', NULL, 21, 25),
(184, NULL, 'Un commentario de màs..', NULL, 21, 25),
(185, 'titre 1', 'Mon premier article', NULL, 21, NULL),
(186, NULL, NULL, NULL, 21, NULL),
(187, 'titre 1', 'poj', NULL, 21, NULL),
(188, 'nouveazu titre', 'content !!!!!', NULL, 21, NULL),
(189, 'Titre 2', 'Voici le contenu de mon second article !', NULL, 21, NULL),
(190, 'Titre 3', 'Mon troisième article !', NULL, 21, NULL),
(191, 'titre ', '', NULL, 21, NULL),
(192, 'titre III', 'Où est cet article ??', NULL, 21, NULL),
(193, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(194, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(195, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(196, NULL, 'Commentaire d\'HUgo : date ??', NULL, 21, 174),
(197, NULL, 'Commentaire d\'HUgo : date ??', NULL, 21, 174),
(198, 'titre 4', 'Article d\'Ugo Gim', NULL, 21, NULL),
(199, 'titre 4', 'Encore un article de l\'administrateur', '2023-06-26 10:59:32', 21, NULL),
(200, 'titre 5', 'article sur le titre 5 d\'Ugo', '2023-06-26 11:02:32', 21, NULL),
(201, 'titre 6 d\'Ugo', 'Le Sixième article d\'Ugo !!', '2023-06-27 10:00:50', 21, NULL),
(202, 'titre 7 d\'Uog', 'Nouvel article 7 ', '2023-06-27 10:06:19', 21, NULL),
(203, 'titre 8', ' Qu\'en est-il du POST ?', '2023-06-27 10:11:31', 21, NULL),
(204, 'titre 9', 'Et maintenant ????', '2023-06-27 10:14:16', 21, NULL),
(205, 'titre 9', 'Et maintenant ????', '2023-06-27 10:16:00', 21, NULL),
(207, 'titre 10 d\'Ugo', 'encore un test', '2023-06-27 13:18:36', 21, NULL),
(208, 'titre 11 d\'Ugo', 'Un article sans le header blogMvc', '2023-06-27 13:42:37', 21, NULL),
(209, 'titre 12', 'Header vers blogMvc/posts', '2023-06-27 13:44:18', 21, NULL),
(210, 'titre 13', 'un nouvel article d\'Ugo', '2023-06-27 14:34:35', 21, NULL),
(211, 'titre 14 d\'ugo', 'Nouvelle tentative', '2023-06-27 14:35:57', 21, NULL),
(212, 'titre 15 Ugo', 'article sans \'render\"', '2023-06-27 14:36:42', 21, NULL),
(213, 'titre 15 Ugo', 'article sans \'render\"', '2023-06-27 14:37:53', 21, NULL),
(214, 'titre XVI', 'Dernier essai ??', '2023-06-27 14:39:34', 21, NULL),
(216, 'titre 17', 'Et cette fois ci !!', '2023-06-27 14:40:43', 21, NULL),
(217, 'titre 18 c\'est Remodifié', 'Et ici c\'est Remodifié...', '2023-06-27 14:41:37', 21, NULL),
(219, 'titre19 modifié', 'avec $article Modifié !', '2023-06-27 14:43:07', 21, NULL),
(234, 'titre 20 MODIF', 'un article d\'Ugo avec $articleId MDI', '2023-06-27 14:51:48', 21, NULL),
(240, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(241, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(242, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(243, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(244, 'Premier titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2023-03-20 01:20:10', 21, 18),
(253, 'Titre Ajouté à ce commentaire', 'Un commentaire sur titre 20 modif id: 234\r\n', '2023-07-15 21:00:54', 21, 234);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(70) DEFAULT NULL,
  `lastname` varchar(70) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(21, 'louis', 'jouvet', 'louisjouvet@gmail.com', NULL, NULL),
(22, 'louis', 'jouvet', 'louisjouvet@gmail.com', NULL, NULL),
(28, 'louis', 'jouvet', 'louisjouvet@gmail.com', NULL, NULL),
(34, 'rene', 'lacanne', 'rl@gmail.com', NULL, NULL),
(36, 'jeanne', 'Baptiste', 'bj@gmail.com', NULL, NULL),
(37, 'jeanne', 'Baptiste', 'bj@gmail.com', NULL, NULL),
(38, 'rene', 'lacanne', 'rl@gmail.com', NULL, NULL),
(39, 'jeanne', 'Baptiste', 'bj@gmail.com', NULL, NULL),
(40, 'jeanne', 'Baptiste', 'bj@gmail.com', NULL, NULL),
(41, 'jeanne', 'Baptiste', 'bj@gmail.com', NULL, NULL),
(126, 'jeanne', 'Baptiste', 'bj@gmail.com', NULL, NULL),
(213, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(214, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(215, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(225, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(226, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(227, NULL, NULL, NULL, NULL, NULL),
(228, NULL, NULL, NULL, NULL, NULL),
(229, NULL, NULL, NULL, NULL, NULL),
(230, NULL, NULL, NULL, NULL, NULL),
(231, NULL, NULL, NULL, NULL, NULL),
(232, NULL, NULL, NULL, NULL, NULL),
(233, NULL, NULL, NULL, NULL, NULL),
(234, NULL, NULL, NULL, NULL, NULL),
(235, NULL, NULL, NULL, NULL, NULL),
(236, NULL, 'lastname', 'email', 'password', NULL),
(237, NULL, 'lastname', 'email', 'password', NULL),
(238, NULL, NULL, NULL, NULL, NULL),
(239, NULL, NULL, NULL, NULL, NULL),
(240, NULL, NULL, NULL, NULL, NULL),
(241, NULL, NULL, NULL, NULL, NULL),
(242, NULL, '0', '0', '0', NULL),
(243, NULL, NULL, NULL, NULL, NULL),
(244, NULL, NULL, NULL, NULL, NULL),
(245, NULL, NULL, NULL, NULL, NULL),
(246, NULL, NULL, NULL, NULL, NULL),
(247, NULL, NULL, NULL, NULL, NULL),
(248, NULL, NULL, NULL, NULL, NULL),
(249, NULL, NULL, NULL, NULL, NULL),
(250, NULL, NULL, NULL, NULL, NULL),
(251, NULL, NULL, NULL, NULL, NULL),
(252, NULL, NULL, NULL, NULL, NULL),
(253, NULL, NULL, NULL, NULL, NULL),
(254, NULL, NULL, NULL, NULL, NULL),
(255, NULL, NULL, NULL, NULL, NULL),
(256, NULL, 'lastname', 'email', 'password', NULL),
(257, NULL, NULL, 'email', 'password', NULL),
(258, NULL, 'lastname', 'email', 'password', NULL),
(259, NULL, 'lastname', 'email', 'password', NULL),
(260, NULL, 'lastname', 'email', 'password', NULL),
(261, NULL, 'lastname', 'email', 'password', NULL),
(262, NULL, 'lastname', 'email', 'password', NULL),
(263, NULL, 'lastname', 'email', 'password', NULL),
(264, NULL, 'lastname', 'email', 'password', NULL),
(265, NULL, 'lastname', 'email', 'password', NULL),
(266, NULL, 'lastname', 'email', 'password', NULL),
(267, NULL, NULL, NULL, NULL, NULL),
(268, NULL, 'John', 'jd@gmail.com', 'pwd', NULL),
(269, NULL, 'Jeann', 'jj@gmail.com', 'mdp', NULL),
(270, NULL, 'Jeann', 'jj@gmail.com', 'mdp', NULL),
(271, NULL, 'Jeann', 'jj@gmail.com', 'mdp2', NULL),
(272, NULL, 'Jeann', 'jj@gmail.com', 'mdp2', NULL),
(273, NULL, 'Jeann', 'jj@gmail.com', 'mdp2', NULL),
(274, NULL, 'Jeann', 'jj@gmail.com', 'mdp2', NULL),
(275, NULL, 'Jeann', 'jj@gmail.com', 'mdp2', NULL),
(276, NULL, 'Jeann', 'jj@gmail.com', 'mdp2', NULL),
(277, NULL, 'Jeann', 'jj@gmail.com', 'mdp2', NULL),
(278, NULL, 'lastname', 'email', 'password', NULL),
(279, NULL, NULL, NULL, NULL, NULL),
(280, NULL, NULL, NULL, NULL, NULL),
(281, NULL, NULL, NULL, NULL, NULL),
(282, NULL, NULL, NULL, NULL, NULL),
(283, NULL, NULL, NULL, NULL, NULL),
(284, NULL, NULL, NULL, NULL, NULL),
(285, NULL, NULL, NULL, NULL, NULL),
(286, NULL, NULL, NULL, NULL, NULL),
(287, NULL, NULL, NULL, NULL, NULL),
(288, NULL, NULL, NULL, NULL, NULL),
(289, NULL, NULL, NULL, NULL, NULL),
(290, NULL, NULL, NULL, NULL, NULL),
(291, NULL, NULL, NULL, NULL, NULL),
(292, NULL, NULL, NULL, NULL, NULL),
(293, NULL, NULL, NULL, NULL, NULL),
(294, NULL, NULL, NULL, NULL, NULL),
(295, NULL, 'Openclass', 'ex@exemple.com', '<lk;jnhbfv', NULL),
(296, NULL, 'Cramon', 'exemple@gmail.com', '$2y$10$gaijppinDB3bVthGkynauOqudjwyYtGMX1Vji8DWBdCVxkFnSYvD2', NULL),
(297, NULL, 'elis', 'elis@gmail.com', '$2y$10$zDOQnFYBmzYi635mwq/6h.In3tU0MKyG1BgVCMBrpyZBcK9UNSXzi', NULL),
(298, NULL, 'elis', 'elis@gmail.com', '$2y$10$LT8omG6gnviA4fouxaUT5uva7JvPEHaOX44Q3MXqZJXSY0iaqRsRq', NULL),
(299, NULL, 'Openclass', 'ex@exemple.com', '$2y$10$uDNZi/W1JcfzIuElpOL4VuvKs/phuYzYREUzt94WnKE6kwX7EQ0C2', NULL),
(300, NULL, 'jon', 'jon@gmail.com', '$2y$10$sGKr9dt5WUjW3zYIoE67N.Lfnn6uSD2Xfui07s9lCtqoVEfzAnAXq', NULL),
(301, NULL, 'lance', 'la@gmail.com', '$2y$10$aM9gAjelJvTOb/ca3LW7e.fquBD/xrhfjSXxiiZbeW.KmjV9QlZGS', NULL),
(302, NULL, 'capet', 'capet@gmail.com', '$2y$10$ahOpjfEkypGSMpw42mNJ5ebxSzAoyiK4gBApkWPy20nZ9JvA0RXs.', NULL),
(303, NULL, 'alice', 'al@gmail.com', '$2y$10$4WsTDOSyDv2Hy8xdcwqZ5uYhQp.EwUo4RlpD.xmqk/js2BM24vdDW', NULL),
(304, NULL, 'ugo', 'ugo@gmail.com', '$2y$10$bJBITAhKFJdd8BBSdu.oNORgHV.NTO6gzd.YLU5oAkxwBrd11.mhq', NULL),
(305, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(306, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(307, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(308, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(309, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(310, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(311, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(312, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(313, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL),
(314, 'laure', 'Legrand', 'll@gmail.com', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `posts_ibfk_4` (`id_parent`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`id_parent`) REFERENCES `posts` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `posts_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
