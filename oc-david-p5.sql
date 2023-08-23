# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 8.0.33)
# Database: oc-david-p5
# Generation Time: 2023-08-23 06:53:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `chapeau` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `status` enum('-1','0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_parent` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`id_user`),
  KEY `posts_ibfk_4` (`id_parent`),
  CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`id_parent`) REFERENCES `posts` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `posts_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `chapeau`, `content`, `created`, `status`, `id_user`, `id_parent`)
VALUES
	(312,'Les capétiens directs',NULL,'Article - 312  -  Le nom de Capétiens directs désigne les monarques capétiens qui régnèrent de père en fils sur le royaume de France, d\'Hugues Capet en 987, jusqu\'à Charles IV le Bel en 1328. Les Capétiens directs ont eu pendant plus de trois siècles la chance d\'avoir toujours un fils pour leur succéder, ce que les historiens appellent le « miracle capétien ». Cette pérennité exceptionnelle de la dynastie prend fin dans les quatorze années suivant la mort de Philippe IV le Bel en 1314 : son premier fils Louis X le Hutin meurt en laissant un fils posthume qui meurt lui-même au bout de cinq jours, puis les deux autres fils de Philippe le Bel, Philippe V le Long et Charles IV le Bel, meurent à leur tour sans laisser d\'héritiers mâles. Cette série de déboires entraîne l\'extinction de la maison.','2023-08-09 11:38:28','0',329,NULL),
	(313,'Maison de Valois (de lacanne)','Chapeau lacanne','Article 313 - La maison de Valois est la branche cadette de la dynastie capétienne qui régna sur le royaume de France de 1328 à 1589. Elle succède aux Capétiens directs et précède les Bourbons.\r\n\r\nElle tire son nom du comté de Valois, apanage donné à Charles, fils de Philippe III le Hardi et père du roi Philippe VI. La branche aînée s\'est éteinte en 1498, mais elle compte plusieurs rameaux cadets.\r\n\r\nAprès avoir conservé le trône pendant plusieurs siècles, la lignée masculine de la Maison de Valois finit par s\'éteindre, et le trône du royaume de France revint à la plus ancienne branche survivante de la dynastie capétienne, la maison de Bourbon.','2023-08-09 11:57:11','0',324,NULL),
	(314,'',NULL,'Commentaire de Capet sur article 312 : Les capétiens directs','2023-08-09 19:09:55','0',324,312),
	(315,'Procès de Pierre Laval','Resume du proces de Pierre Laval','Après un mois de procédure menée par Pierre Bouchardon, le procès débute le 4 octobre 1945 par une audience préliminaire151. Laval comparait devant la Haute Cour de justice, présidée par Paul Mongibeaux152 et avec André Mornet, comme procureur général153, le 5 octobre 1945154. Inconscient de la gravité des actes qui lui sont reprochés, Laval parle fréquemment à ses proches du jour où il reprendra sa carrière politique. Il semble sincèrement persuadé de pouvoir encore convaincre ses juges du bien-fondé et de la nécessité de sa politique155. La haine générale accumulée contre lui pendant l’Occupation éclate au grand jour à son entrée dans le box des accusés : très vite, Laval est hué et insulté par les jurés tirés au sort (36 membres : 24 jurés et 12 suppléants156) parmi des parlementaires (dont plusieurs sont d’anciens collègues au Parlement, qu’il s’est pris inconsidérément à tutoyer familièrement) et des résistants156, il est de fait empêché de parler et de se défendre157. Devant la partialité du jury qui le menace, par exemple, de « douze balles dans la peau », il refuse de continuer à assister à son procès et la défense refuse de plaider en signe de protestation157. La presse résistante elle-même condamne le naufrage pénible du procès158. Le général de Gaulle reçoit la visite des avocats de Laval, Jacques Baraduc, Albert Naud et Yves-Frédéric Jaffré159. Il sollicite l\'avis de son ministre de la Justice, puis se refuse à ordonner un second procès159,160. Laval est condamné à mort le 9 octobre 1945 pour haute trahison et complot contre la sûreté intérieure de l\'État ; de surcroît, la cour le déclare convaincu d\'indignité nationale et prononce la confiscation de ses biens161 . Il avait refusé que ses avocats demandent sa grâce162.','2023-08-10 20:47:25','1',330,NULL),
	(316,'',NULL,'Commentaire d\'Alphonse Boudard\r\narticle 315 sur Pierre Laval','2023-08-11 17:43:14','-1',324,315),
	(317,'',NULL,'Commentaire de jeannieLO\r\narticle 315 sur pierre Laval','2023-08-11 17:47:22','-1',329,315),
	(322,'',NULL,'commentaire Borniche article 315 sur Pierre laval','2023-08-22 16:50:04','1',330,315);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`)
VALUES
	(323,'borniche','rb@gmail.com','$2y$10$02scXeJFbkkY/.cvKsWWYuqjmLN1cghhkv/dmWW/kB/fx9KMiRmBy',NULL),
	(324,'Lacanne','rl@gmail.com','$2y$10$vzHA.zu/uubo4uWxCYtCXuSuIsSyPnJr8oadgJRMZ94uPbRjbhp/y',NULL),
	(329,'Lenu','lg@gmail.com','$2y$10$F5lfvw4a091U8C/A7/VnqeiaMKjkz6TyvHAlb1oaPZ2uKiiJhcFji','user'),
	(330,'Pierre','pl@gmail.com','$2y$10$8g4H78FjQWWUozrxrLKIW.Ii6iUBjrTJ6PK/pTxRdaGHAZcu3.gXG','user');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
