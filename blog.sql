-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 24 août 2023 à 14:59
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
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `chapeau` tinyint NOT NULL,
  `created` datetime DEFAULT NULL,
  `status` enum('-1','0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_parent` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `chapeau`, `created`, `status`, `id_user`, `id_parent`) VALUES
(18, '! Premier titre article 18 id_user21', 'Article - 18\r\nlorem ipsum lorem ipsum ', 0, '2023-03-20 12:49:26', '0', 21, NULL),
(260, 'Titre I de jeannieLO', 'Article - 260 -  c\'est mon premier article', 0, '2023-07-25 21:07:23', '0', 317, NULL),
(261, NULL, 'Un commentaire sur l\'article 260 de JeannieLO\r\n', 0, '2023-07-25 21:10:41', '0', 21, 260),
(262, NULL, 'un commentaire au 26/07 art 260 en test à 11H42', 0, '2023-07-26 11:42:42', '0', 21, 260),
(265, 'Mourir d\'enfance  d\'Alphonse Bourdard', 'Article - 265  -  A l\'heure du bilan, c\'est l\'enfance, toujours, qui donne la clef d\'une existence. Où chercher le secret de ce mauvais garçon devenu un écrivain comblé ? Chez les paysans qui l\'élèvent dans une ferme du Loiret ? \r\nDans la rue, sa \"forêt vierge\", à l\'âge des grandes espérances et des petits trafics, des 400 coups et de la Résistance ? Dans un mitard de Fresnes où il touche le fond, avant de retrouver l\'héritier de Villon, Carco et Simonin qui dormait en lui ?\r\nLe secret d\'Alphonse Boudard est ailleurs et ne mourra qu\'avec lui. Il se dévoile peu à peu dans ces pages magnifiques d\'émotion, de verve et d\'alacrité. C\'est l\'image presque effacée d\'une torpédo qui s\'arrête, d\'une jolie dame coiffée à la garçonne et parfumée qui en descend, le souvenir d\'une mère qu\'il n\'aura jamais vraiment connue et qui le poursuit encore.', 0, '2023-07-26 15:54:35', '1', 318, NULL),
(266, 'titre de la lance', 'Article - 266 -  post : Les données ne transiteront pas par l\'URL, l\'utilisateur ne les verra donc pas passer dans la barre d\'adresse. Cette méthode permet d\'envoyer autant de données que l\'on veut, ce qui fait qu\'on la privilégie le plus souvent. Néanmoins, les données ne sont pas plus sécurisées qu\'avec la méthode GET, et il faudra toujours vérifier si tous les paramètres sont bien présents et valides, comme on l\'a fait dans le chapitre précédent. On ne doit pas plus faire confiance aux formulaires qu\'aux URL.', 0, '2023-07-27 15:46:43', '1', 301, NULL),
(267, 'titre d\'ugo', 'Article - 267 -  get : Les données transiteront par l\'URL, comme on l\'a appris précédemment. On pourra les récupérer grâce au tableau (array) $_GET  . Cette méthode est assez peu utilisée car on ne peut pas envoyer beaucoup d\'informations dans l\'URL (je vous disais dans le chapitre précédent qu\'il était préférable de ne pas dépasser 256 caractères).', 0, '2023-07-27 15:48:22', '1', 21, NULL),
(270, 'Citation d\'Alphonse', 'Article - 270 :  N\'avouez jamais! L\'adage du louchebem guillotiné au siècle dernier. Ce qu\'il a gueulé sur la bascule: N\'avouez jamais! Son cri, d\'écho en écho, dans les taules, nous parvient toujours.', 0, '2023-07-27 15:54:54', '0', 318, NULL),
(271, 'L\'indic', 'Article - 271 -  Gestapistes en perdition, faux résistants et vrais truands, aventuriers et indics : à la libération, le Milieu ne dépose pas les armes. A sa tête, Ange Malaggione, dit l\'Archange, séminariste devenu tueur.\r\nFace à Malaggione, à quelques bandits de grande envergures et à la troublante Sylvia de Neyrac, l\'inspecteur Roger Borniche - six best-sellers en six ans - apprend son métier de flic.\r\nUne haletante chasse à l\'homme, une histoire d\'amour, de trahison et de sang dans la meilleur tradition de Flic-story.', 0, '2023-07-27 16:13:09', '0', 271, NULL),
(272, 'La môme moineau', 'Article - 272 -  Dans les années noires de l\'après guerre, la France est à feu et à sang. Ennemis publics en cavale, tueurs dévorés par la folie, anciens de la Gestapo française perpétuent meurtres, hold-up, agressions et cambriolages. La pittoresque Môme Moineau, concurrente d\'Édith Piaf devenue milliardaire, se voit ainsi dévalisée de ses fabuleux bijoux...', 0, '2023-07-27 16:20:59', '0', 323, NULL),
(273, NULL, 'un commentaire sur la môme moineau\r\n', 0, '2023-07-27 19:30:30', '0', 21, 272),
(290, NULL, 'Un commentaire d\'Alphonse sur la môme moineau en tant qu\'admin \r\n', 0, '2023-08-03 15:42:47', '0', 21, 272),
(291, NULL, 'Un commentaire de Lenu sur la môme moineau en tant que \'user\'', 0, '2023-08-04 09:42:08', '0', 21, 272),
(295, NULL, 'commentaire à 10H58 ce 04/08 sur l\'indic Borniche', 0, '2023-08-04 10:58:40', '0', 21, 271),
(297, NULL, 'Un commentaire d\'un visiteur inscrit sur la môme moineau : jeannieLO', 0, '2023-08-04 17:58:23', '0', 21, 272),
(298, NULL, 'Un autre commentaire\r\nà la vue', 0, '2023-08-04 18:01:16', '-1', 21, 272),
(300, NULL, 'Alphonse en commentaire\r\n', 0, '2023-08-05 06:17:51', '0', 21, 272),
(302, '', 'Commentaire de René avant pushup de la gestion des commentaires', 0, '2023-08-07 17:14:56', '1', 21, 272),
(303, 'Les capétiens directs', 'Article -   303  : Le nom de Capétiens directs désigne les monarques capétiens qui régnèrent de père en fils sur le royaume de France, d\'Hugues Capet en 987, jusqu\'à Charles IV le Bel en 1328.\r\n\r\nLes Capétiens directs ont eu pendant plus de trois siècles la chance d\'avoir toujours un fils pour leur succéder, ce que les historiens appellent le « miracle capétien ». Cette pérennité exceptionnelle de la dynastie prend fin dans les quatorze années suivant la mort de Philippe IV le Bel en 1314 : son premier fils Louis X le Hutin meurt en laissant un fils posthume qui meurt lui-même au bout de cinq jours, puis les deux autres fils de Philippe le Bel, Philippe V le Long et Charles IV le Bel, meurent à leur tour sans laisser d\'héritiers mâles. Cette série de déboires entraîne l\'extinction de la maison.', 0, '2023-08-07 17:46:32', '0', 38, NULL),
(304, '', 'Jeannie sur Capétiens le 07/08 sur article 303', 0, '2023-08-07 17:49:19', '1', 21, 303),
(307, NULL, 'Commentaire Lacanne sur article N° 303', 0, '2023-08-08 16:01:24', '0', 21, 303),
(308, NULL, 'Commentaire id : 308? de  Lenu sur article N° 303', 0, '2023-08-08 16:37:40', '-1', 21, 303),
(309, '', 'commentaire de lenu sur article N° 303', 0, '2023-08-08 16:43:49', '1', 21, 303),
(310, '', 'commentaire BOrniche sur article 303', 0, '2023-08-08 16:57:27', '1', 21, 303),
(311, '', 'Commentaire de Jeannie sur article 272 \'Môme MOineau\'', 0, '2023-08-08 17:51:00', '1', 21, 272),
(312, 'Les capétiens directs', 'Article - 312  -  Le nom de Capétiens directs désigne les monarques capétiens qui régnèrent de père en fils sur le royaume de France, d\'Hugues Capet en 987, jusqu\'à Charles IV le Bel en 1328. Les Capétiens directs ont eu pendant plus de trois siècles la chance d\'avoir toujours un fils pour leur succéder, ce que les historiens appellent le « miracle capétien ». Cette pérennité exceptionnelle de la dynastie prend fin dans les quatorze années suivant la mort de Philippe IV le Bel en 1314 : son premier fils Louis X le Hutin meurt en laissant un fils posthume qui meurt lui-même au bout de cinq jours, puis les deux autres fils de Philippe le Bel, Philippe V le Long et Charles IV le Bel, meurent à leur tour sans laisser d\'héritiers mâles. Cette série de déboires entraîne l\'extinction de la maison.', 0, '2023-08-09 11:38:28', '0', 329, NULL),
(313, 'Maison de Valois', 'Article 313 - La maison de Valois est la branche cadette de la dynastie capétienne qui régna sur le royaume de France de 1328 à 1589. Elle succède aux Capétiens directs et précède les Bourbons.\r\n\r\nElle tire son nom du comté de Valois, apanage donné à Charles, fils de Philippe III le Hardi et père du roi Philippe VI. La branche aînée s\'est éteinte en 1498, mais elle compte plusieurs rameaux cadets.\r\n\r\nAprès avoir conservé le trône pendant plusieurs siècles, la lignée masculine de la Maison de Valois finit par s\'éteindre, et le trône du royaume de France revint à la plus ancienne branche survivante de la dynastie capétienne, la maison de Bourbon.', 0, '2023-08-09 11:57:11', '0', 318, NULL),
(314, '', 'Commentaire de Capet sur article 312 : Les capétiens directs', 0, '2023-08-09 19:09:55', '-1', 21, 312),
(315, 'Procès de Pierre Laval', 'Après un mois de procédure menée par Pierre Bouchardon, le procès débute le 4 octobre 1945 par une audience préliminaire151. Laval comparait devant la Haute Cour de justice, présidée par Paul Mongibeaux152 et avec André Mornet, comme procureur général153, le 5 octobre 1945154. Inconscient de la gravité des actes qui lui sont reprochés, Laval parle fréquemment à ses proches du jour où il reprendra sa carrière politique. Il semble sincèrement persuadé de pouvoir encore convaincre ses juges du bien-fondé et de la nécessité de sa politique155. La haine générale accumulée contre lui pendant l’Occupation éclate au grand jour à son entrée dans le box des accusés : très vite, Laval est hué et insulté par les jurés tirés au sort (36 membres : 24 jurés et 12 suppléants156) parmi des parlementaires (dont plusieurs sont d’anciens collègues au Parlement, qu’il s’est pris inconsidérément à tutoyer familièrement) et des résistants156, il est de fait empêché de parler et de se défendre157. Devant la partialité du jury qui le menace, par exemple, de « douze balles dans la peau », il refuse de continuer à assister à son procès et la défense refuse de plaider en signe de protestation157. La presse résistante elle-même condamne le naufrage pénible du procès158. Le général de Gaulle reçoit la visite des avocats de Laval, Jacques Baraduc, Albert Naud et Yves-Frédéric Jaffré159. Il sollicite l\'avis de son ministre de la Justice, puis se refuse à ordonner un second procès159,160. Laval est condamné à mort le 9 octobre 1945 pour haute trahison et complot contre la sûreté intérieure de l\'État ; de surcroît, la cour le déclare convaincu d\'indignité nationale et prononce la confiscation de ses biens161 . Il avait refusé que ses avocats demandent sa grâce162.', 0, '2023-08-10 20:47:25', '0', NULL, NULL),
(316, '', 'Commentaire d\'Alphonse Boudard\r\narticle 315 sur Pierre Laval', 0, '2023-08-11 17:43:14', '-1', 21, 315),
(317, '', 'Commentaire de jeannieLO\r\narticle 315 sur pierre Laval', 0, '2023-08-11 17:47:22', '-1', 21, 315),
(322, '', 'commentaire Borniche article 315 sur Pierre laval', 0, '2023-08-22 16:50:04', '1', 21, 315);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(21, 'louis', 'louisjouvet@gmail.com', NULL, NULL),
(22, 'louis', 'louisjouvet@gmail.com', NULL, NULL),
(28, 'louis', 'louisjouvet@gmail.com', NULL, NULL),
(34, 'rene', 'rl@gmail.com', NULL, NULL),
(36, 'jeanne', 'bj@gmail.com', NULL, NULL),
(37, 'jeanne', 'bj@gmail.com', NULL, NULL),
(38, 'rene', 'rl@gmail.com', NULL, NULL),
(39, 'jeanne', 'bj@gmail.com', NULL, NULL),
(40, 'jeanne', 'bj@gmail.com', NULL, NULL),
(41, 'jeanne', 'bj@gmail.com', NULL, NULL),
(126, 'jeanne', 'bj@gmail.com', NULL, NULL),
(213, 'laure', 'll@gmail.com', NULL, NULL),
(214, 'laure', 'll@gmail.com', NULL, NULL),
(215, 'laure', 'll@gmail.com', NULL, NULL),
(225, 'laure', 'll@gmail.com', NULL, NULL),
(226, 'laure', 'll@gmail.com', NULL, NULL),
(268, NULL, 'jd@gmail.com', 'pwd', NULL),
(269, NULL, 'jj@gmail.com', 'mdp', NULL),
(270, NULL, 'jj@gmail.com', 'mdp', NULL),
(271, 'borniche', 'jj@gmail.com', 'mdp2', NULL),
(272, NULL, 'jj@gmail.com', 'mdp2', NULL),
(273, NULL, 'jj@gmail.com', 'mdp2', NULL),
(274, NULL, 'jj@gmail.com', 'mdp2', NULL),
(275, NULL, 'jj@gmail.com', 'mdp2', NULL),
(276, NULL, 'jj@gmail.com', 'mdp2', NULL),
(277, NULL, 'jj@gmail.com', 'mdp2', NULL),
(296, NULL, 'exemple@gmail.com', '$2y$10$gaijppinDB3bVthGkynauOqudjwyYtGMX1Vji8DWBdCVxkFnSYvD2', NULL),
(297, NULL, 'elis@gmail.com', '$2y$10$zDOQnFYBmzYi635mwq/6h.In3tU0MKyG1BgVCMBrpyZBcK9UNSXzi', NULL),
(298, NULL, 'elis@gmail.com', '$2y$10$LT8omG6gnviA4fouxaUT5uva7JvPEHaOX44Q3MXqZJXSY0iaqRsRq', NULL),
(299, NULL, 'ex@exemple.com', '$2y$10$uDNZi/W1JcfzIuElpOL4VuvKs/phuYzYREUzt94WnKE6kwX7EQ0C2', NULL),
(300, NULL, 'jon@gmail.com', '$2y$10$sGKr9dt5WUjW3zYIoE67N.Lfnn6uSD2Xfui07s9lCtqoVEfzAnAXq', NULL),
(301, NULL, 'la@gmail.com', '$2y$10$aM9gAjelJvTOb/ca3LW7e.fquBD/xrhfjSXxiiZbeW.KmjV9QlZGS', NULL),
(302, '', 'capet@gmail.com', '$2y$10$ahOpjfEkypGSMpw42mNJ5ebxSzAoyiK4gBApkWPy20nZ9JvA0RXs.', NULL),
(303, NULL, 'al@gmail.com', '$2y$10$4WsTDOSyDv2Hy8xdcwqZ5uYhQp.EwUo4RlpD.xmqk/js2BM24vdDW', NULL),
(304, '', 'ugo@gmail.com', '$2y$10$bJBITAhKFJdd8BBSdu.oNORgHV.NTO6gzd.YLU5oAkxwBrd11.mhq', NULL),
(317, '', 'jl@gmail.com', '$2y$10$74eBvymmtidDZFs4G.A3g.4a2UDh/MehenEJ18xBPIt.ePcGrX02u', NULL),
(318, 'alphonse', 'ab@gmail.com', '$2y$10$TRZdCS6JnztELhfiTWmfh.XO5XLj/Moik4g4NDgDku.pbxVVS30pG', NULL),
(319, 'jeannieLO', 'jl@gmail.com', '$2y$10$fV0fJBrHWFlEAHrmI1VDnuGvm5KfShRFokh/VhyU8ZIZNLSTskOpK', NULL),
(320, 'alphonse', 'ab@gmail.com', '$2y$10$RmSsIF7UIkQLMfAWk6BFfevcu8jSy7TWZkJGYQXvlkdRcokjC0cOO', NULL),
(321, '', 'rl@gmail.com', '$2y$10$3KBmEKG1Y.K1Jl3yNhT0GOvBgPCa0b0pV.9BNgZd9TfnTn8T3NMy.', NULL),
(322, '', 'ab@gmail.com', '$2y$10$wL3e58FIhkU4ieQFNcr6C.CHU1knXNWtTXVM3Vu5vMwAjLIuLATkS', NULL),
(323, 'borniche', 'rb@gmail.com', '$2y$10$02scXeJFbkkY/.cvKsWWYuqjmLN1cghhkv/dmWW/kB/fx9KMiRmBy', NULL),
(324, 'Lacanne', 'rl@gmail.com', '$2y$10$vzHA.zu/uubo4uWxCYtCXuSuIsSyPnJr8oadgJRMZ94uPbRjbhp/y', NULL),
(329, 'Lenu', 'lg@gmail.com', '$2y$10$F5lfvw4a091U8C/A7/VnqeiaMKjkz6TyvHAlb1oaPZ2uKiiJhcFji', 'user'),
(330, 'Pierre', 'pl@gmail.com', '$2y$10$8g4H78FjQWWUozrxrLKIW.Ii6iUBjrTJ6PK/pTxRdaGHAZcu3.gXG', 'user');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

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
