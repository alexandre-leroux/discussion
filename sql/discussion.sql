-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 05 déc. 2020 à 21:38
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discussion`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(140) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES
(29, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sinc', 21, '2020-12-05'),
(30, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of us', 21, '2020-12-05'),
(31, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making ', 5, '2020-12-05'),
(32, 'oing to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsu', 5, '2020-12-05'),
(33, 'oing to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsu', 5, '2020-12-05'),
(34, 'not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s wit', 8, '2020-12-05');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(3, 'kirk', '$2y$10$m2Xxl2L2DESYhD4vnnnXzu44gUi5vVCItz0Yx6MxjDnnBRI5GWqN2'),
(4, 'james', '$2y$10$qqwkCG7pBGtQdM.88xmJieOetFkpYD8mpYHxmGnbkUmo9mN1oczqC'),
(5, 'henri', '$2y$10$d6bgWJDL8YTI6Y1Zxr7hEe7j402aeVcNmoQBXG9zifLF5Cy9qxdzO'),
(6, 'jean', '$2y$10$d8mGrYSXaZ5xhGWM7MU0l.BllMXgDSgdj8zHz6aVhtOYpRvle/bk6'),
(7, 'julien', '$2y$10$3zehLhgM8EI3G9R/I9S0Eelpvq0dChi8Lhu0eWg3BvrjhnvBJscDG'),
(8, 'john', '$2y$10$BvWiuR4vnRDPjkX5WI1pLualWVqScKLkGT7TcfPnJSD/4w16wmg9.'),
(9, 'barry', '$2y$10$DldyvmO3apQIeO5gr6exZuSIl5ARr3TDSdthnC0JOeXuD/wRsVmeu'),
(10, 'rené', '$2y$10$I.i/2AU9Cxtk7iunlWCqKep7BtCbepbCsjk7vN31kySy4D51KJSPW'),
(11, 'maelle', '$2y$10$RLahxy4OicaidmmJmlIv6uFttBUf/bphmQ6S.AhuYrnAzjbk2Mcqi'),
(12, 'claire', '$2y$10$WJW4BZwHLXXTcgoeLl/a9ejmO9f4Z/UklLJN7ZsdoYrM6XrQa0lQS'),
(13, 'stephane', '$2y$10$BMFhneZokJ6HvyBxIBrCr.uGkpYtX.Y5uK4cUfbj4.MakK43Khfnu'),
(14, 'Alex', '$2y$10$7zQQvp4zuQoXBlcGQDY.8OQgd/3ZRrPToGrjOjxqtxlly/TPN7Vp2'),
(15, 'alghaz', '$2y$10$DVUezdEn2H3Y2FZ0abR6wOonIBUdrkkKlS3f5tVTCpUsHdN5dLmNG'),
(21, 'Berret', '$2y$10$TlyxqmcLDsxVyMcnxG8y7ejhY8HvlyqT3dpgiZbBe1J640LdKQFiK'),
(22, 'Jean-jacques', '$2y$10$wceyplAqsHOXH5PHuKZhlu0MU0TeT4.MNamJF5JoksZJBvHP7vDO.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
