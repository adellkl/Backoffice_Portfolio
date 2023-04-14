-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 14 avr. 2023 à 07:53
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nom_etudiant_portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `About`
--

CREATE TABLE `About` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `fonction` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `About`
--

INSERT INTO `About` (`id`, `nom`, `prenom`, `fonction`, `description`) VALUES
(1, 'loukal', 'adel', 'etudiant', 'je m\'appele Adel Loukal, je suis actuellement étudiant en BUT MMI à l’iut de Cergy pantoise et en parcours développement web et dispositifs interactifs dans lequel je m’épanouie. Je suis un grand sportif, je pratique plusieurs sports notamment la boxe thaï et la musculation, pratiquer du sport me permets de toujours garder mon calme face à toutes les situations. Passionné d’informatique et de nouvelles technologies, j’espère pourvoir faire carrières dans le métier de mes rêve qui est développeur web. \r\n');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `categories`) VALUES
(1, 'front-end'),
(2, 'back-end'),
(3, 'design');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `nom` varchar(90) NOT NULL,
  `email` varchar(75) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`nom`, `email`, `sujet`, `mess`, `id`) VALUES
('etmidi', 'aetmidi@gmail.com', 'superbe site', 'adel a réalisé un formidable travail dans la réalisation de ce site remplis de projet plus palpitant les uns des autres ', 38),
('petit ', 'test@gmail.com', 'premier test ', 'Bonjours je vous contact pour prendre rendez-vous, pour discuter de mon site ', 40);

-- --------------------------------------------------------

--
-- Structure de la table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `portfolio`
--

INSERT INTO `portfolio` (`id`, `titre`, `image`, `description`, `categorie`) VALUES
(75, 'Site pour une agence de communication digitale', 'cabin.png', 'site internet que j’ai réalisé pour une agence de communication digitale spécialisée dans l’E-sport.  Step-up est le nom de cette agence. Dans le cadre d’un projet universitaire, en groupe de 4, nous devions créer une agence de communication, chaque membre du groupe avait une tâche à réaliser, la mienne était de crée le site sur WordPress, de mettre du contenu et surtout l’héberger pour qu’il soit accessible par tous. Ce projet m’a pris 1 mois, j’ai pris énormément de plaisir à concevoir ce site.', 'design'),
(76, 'logo agence de communication', 'cake.png', 'Ce logo que j’ai réalisé dans le cadre d’un projet universitaire est mon premier logo réalisé grâce à illustrator, avec ce logo, nous avons réalisés une charte graphique pour notre agence. Cette réalisation m’a permise de me rendre compte à quel point le fait de créer des logo est satisfaisant lorsque le résultat est sous nos yeux.', 'design'),
(77, 'Machine imaginaire.', 'circus.png', 'A l’aide des outils Adobe photoshop et illustrator, j’ai conçu une machine qui sort tout droit de mon imagination. J’ai passé 1 semaine sur ce projet et c’était un projet que j’ai vraiment bien aimer car j’aime créer des choses et j’aime mettre en images mes idées et mon imagination. J’ai mener un long travail de réflexion pour pouvoir trouver des couleurs cohérentes et qui rendent bien. J’ai utiliser l’outil pathfinder et l’outil biseautage pour mettre en relief machine et lui donner un effet sympa.', 'design'),
(78, 'Réalisation d\'un backoffice', 'game.png', 'L’une de mes meilleures réalisations et celles dont je suis le plus fier, en groupe de 5 nous avons réalisées un tutoriel vidéos sur la prise en main du matériel audiovisuel. Nous avons écrit le scénario, fait le storyboard, la traduction anglaise du scripte, le tournage de la vidéo, le dérochage, le montage et la mise en ligne de la vidéo sur la plateforme YouTube, j’étais chef de groupe durant cette SAE et mon rôle était très important car j’étais l’intermédiaire entre les professeurs et les membres de mon groupe. La vidéo est disponible ci-dessou, et ma chaîne YouTube en cliquant sur le bouton.', 'front-end'),
(79, 'Data infographie en js ', 'submarine.png', 'J’ai réalisé cette data infographie suite au visionnage de la vidéo de la chaîne YouTube de Data gueule nommé  » La transition électrique : les doigts dans l’emprise « . J’ai regardé l’entièreté de la vidéo, j’ai pris des notes et j’ai retenu les chiffres importants qui résument la vidéo. J’ai utilisé le logiciel Adobe illustrator pour réaliser cette data infographie.', 'back-end'),
(80, 'Premier site développé entièrement.', 'safe.png', 'Dans le cadre d’une SAE, en groupe nous avons créer un site avec 5 pages. En temps que chef de groupe, j’ai eu la responsabilité de repartir les tâches pour le bon déroulement de la SAE, j’ai également regroupé toutes les pages pour créer une liaison entre elles. Nous avons eu pour mission de faire un formulaire interactif qui a la validation de celui-ci renvoie un message soit  » message envoyer  » soit  » message invalide « . J’ai pris beaucoup de plaisir a faire cette SAE car mon groupe était motivé a travailler et l’ambiance dans le groupe était excellente, tout ça m’a donner l’envie de travailler plus souvent en groupe . Durant cette SAE nous n’avions pas encore appris a faire un site responsive donc malheureusement sur téléphone le site est illisible je vous conseille donc de le visiter sur un ordinateur.', 'back-end');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mdp`) VALUES
(1, 'adel', '$2y$10$izm1ij4YugWvJCG0XZFwEehwIqzX0lsgMJQBuGwZeRk3jVf0mKE6i');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `About`
--
ALTER TABLE `About`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `About`
--
ALTER TABLE `About`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
