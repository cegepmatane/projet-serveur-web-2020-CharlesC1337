-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 fév. 2021 à 06:19
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `pseudonyme` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudonyme`, `motDePasse`) VALUES
(1, 'Charles', '12345'),
(2, 'Antoine', '1234'),
(3, 'test', '123'),
(4, 'test420', '1');

-- --------------------------------------------------------

--
-- Structure de la table `rallye`
--

CREATE TABLE `rallye` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `annee` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `groupe` varchar(255) NOT NULL,
  `nombreProduit` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `miniature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rallye`
--

INSERT INTO `rallye` (`id`, `marque`, `modele`, `annee`, `description`, `groupe`, `nombreProduit`, `image`, `miniature`) VALUES
(1, 'Audi', 'Quattro', 1984, 'Le quattro d\'origine a ï¿½tï¿½ conï¿½u pour le rallye du groupe 4, mais est devenu la force la plus puissante de l\'ï¿½re du groupe B dans ses premiï¿½res annï¿½es en raison de sa premiï¿½re voiture de rallye ï¿½ quatre roues motrices. Cependant, avec l\'arrivï¿½e de voitures spï¿½cialement conï¿½ues (comme la Peugeot 205 T16), elle a ï¿½tï¿½ raccourcie pour devenir la Sport quattro (en version routiï¿½re) et S1 (sur les scï¿½nes). Dï¿½veloppï¿½e en 1984, l\'Audi Sport Quattro S1 avait un moteur tout en alliage d\'aluminium de 2,1 L lï¿½gï¿½rement plus petit que l\'Audi Quattro. Le Sport Quattro S1 E2 ï¿½tait une mise ï¿½ jour du S1 et comportait un moteur 5 cylindres en ligne.\r\n\r\n- Spï¿½cifications Groub B (sous forme S1) -\r\n\r\nMoteur: 2,1 L turbocompressï¿½ DACT 20V Inline-5, dï¿½veloppant entre 450-590 ch et 405 - 435 lb-pi.\r\n\r\nConfiguration: moteur avant, quatre roues motrices.\r\n\r\nPoids: 1100kg.\r\n\r\nMeilleure arrivï¿½e: 1981, Michï¿½le Mouton: premiï¿½re victoire pour une femme pilote en Rallye.\r\n\r\n- Spï¿½cifications des voitures de route (sous forme Sport Quattro) -\r\n\r\nMoteur: 2,1 L turbocompressï¿½ DACT 20V Inline-5, dï¿½veloppant 302 ch et 243 lb-pi.\r\n\r\nPoids: 1270 kg.', 'B', 224, 'audiquattro.jpg', 'mini/audiquattro.jpg'),
(2, 'Lancia', 'Delta S4', 1985, 'Vous devez aimer toute voiture ï¿½quipï¿½e ï¿½ la fois d\'un compresseur et de turbocompresseurs - c\'est dommage qu\'il n\'y en ait pas plus. La Lancia Delta S4 ï¿½tait l\'une de ces voitures et s\'est rï¿½vï¿½lï¿½e ï¿½tre une arme de rallye encore plus farfelue que la 037 qui la prï¿½cï¿½dait. Encore une fois, une trï¿½s bonne idï¿½e, qui s\'est vue refuser les meilleures journï¿½es de compï¿½tition grï¿½ce ï¿½ l\'abandon du groupe B fin 1986.\r\n\r\n- Spï¿½cifications Groub B -\r\n\r\nMoteur: 4 cylindres en ligne Abarth DACT de 1,8 L ï¿½ DACT, dï¿½veloppant 480 ch et 360 lb-pi.\r\n\r\nConfiguration: Moteur central, Quatre roues motrices.\r\n\r\nPoids: 950kg\r\n\r\nMeilleur rï¿½sultat: 5 victoires en WRC.\r\n\r\n- Spï¿½cifications des voitures de route -\r\n\r\nMoteur: 1,8 litre Abarth DACT ï¿½ double charge de 1,8 L, dï¿½veloppant environ 250 ch et 215 lb-pi.\r\n\r\nPoids: 1200kg.', 'B', 45, 'deltas4.jpg', 'mini/deltas4.jpg'),
(3, 'Ford', 'RS200', 1984, 'Dï¿½veloppï¿½ sous les auspices du brillant patron du sport automobile de Ford, Stuart Turner, le RS200 ï¿½tait un challenger pur du groupe B qui a remplacï¿½ le mort-nï¿½ Escort RS1700T. Cosworth a dï¿½veloppï¿½ le moteur turbocompressï¿½ et Reliant a fini par assembler les voitures dans son usine de Tamworth. Un design brillant qui aurait dominï¿½ le rallye du groupe B si les ï¿½vï¿½nements n\'avaient pas gï¿½nï¿½.\r\n\r\n- Spï¿½cifications Groub B -\r\n\r\nMoteur: 4 cylindres en ligne turbo de 1,8 litre ï¿½ DACT, dï¿½veloppant 444 ch et 360 lb-pi. Plus tard, les voitures ï¿½ moteur Evolution font 650 ch.\r\n\r\nConfiguration: Moteur central, Quatre roues motrices.\r\n\r\nPoids: 1050 kg.\r\n\r\nMeilleure arrivï¿½e: jamais participï¿½ en raison de l\'annulation du groupe B. Une version modifiï¿½e avec 840ch a ï¿½tï¿½ conduite ï¿½ la victoire ï¿½ Pikes Peak en 2004 par Stig Blomqvist.\r\n\r\n- Spï¿½cifications des voitures de route -\r\n\r\nMoteur: 4 cylindres en ligne turbo de 1,8 litre ï¿½ DACT, dï¿½veloppant 240 chevaux et 207 livres-pied. Plus tard, les voitures ï¿½ moteur Evolution font 650 ch.\r\n\r\nPoids: 1180 kg.', 'B', 200, 'rs200.jpg', 'mini/rs200.jpg'),
(4, 'Peugot', '205 T16', 1983, 'The 205 T16 was the most successful Group B car, establishing the formula for all challengers to follow ï¿½ mid-engine, turbo, four-wheel drive and a spaceframe chassis. Jean Todt, who masterminded the programme, went on to greater things at Ferrari and the FIA.\r\n\r\nThe T16 shares a general look with the regular 205 road car, such as the front grille and light arrangement. The iconic Pepperpot alloys actually preceded the GTI too. In reality very little was shared with the production car, but the extremely successful rallying exploits ultimately helped to transform Peugeot and the 205\'s image through the 1980s.\r\n\r\n- Groub B specs -\r\n\r\nEngine: 1.8L Turbocharged DOHC Inline 4, making between 460 and 550hp and 361 lb-ft.\r\n\r\nConfiguration : Mid-engine, Four-wheel drive.\r\n\r\nWeight: 910kg.\r\n\r\nBest finish: 16 First place finishes between 1984 and 1986.\r\n\r\n- Road car specs -\r\n\r\nEngine: 1.8L Turbocharged DOHC Inline 4, making 197 hp and 188 lb-ft.\r\n\r\nWeight: 1145kg.', 'B', 200, '205t16.jpg', 'mini/205t16.jpg'),
(5, 'MG', 'Metro 6R4', 1985, 'Austin Rover Motorsport se dirigeait vers une pï¿½riode extrï¿½mement rï¿½ussie dans les voitures de tourisme, et on espï¿½rait que le Metro ferait de mï¿½me dans les forï¿½ts, et a finalement uni ses forces avec Williams Grand Prix Engineering pour produire la merveilleuse petite trame spatiale Metro 6R4 pour le groupe B. Contrairement ï¿½ ses rivales, la voiture ne possï¿½dait aucune forme d\'induction forcï¿½e et son moteur V624V semblable ï¿½ un bijou - contrairement ï¿½ l\'opinion populaire - n\'ï¿½tait pas basï¿½ sur le Rover V8 ou le Honda V6. Il a continuï¿½ ï¿½ gagner quelques turbos et ï¿½ propulser la Jaguar XJ220, bien que ...\r\n\r\n- Spï¿½cifications Groub B -\r\n\r\nMoteur: V6 de 3,0 L ï¿½ DACT et 24 V ï¿½ aspiration naturelle, dï¿½veloppant 410 ch ï¿½ 9 000 tr / min! et 270 lb-pi.\r\n\r\nConfiguration: Moteur central, Quatre roues motrices.\r\n\r\nPoids: 1040kg\r\n\r\nMeilleure finition: 3ï¿½me, 1985 Lombard RAC.\r\n\r\n- Spï¿½cifications des voitures de route -\r\n\r\nMoteur: V6 de 3,0 L ï¿½ DACT et 24 V ï¿½ aspiration naturelle, dï¿½veloppant 240 ch et 225 lb-pi.\r\n\r\nPoids: 1000kg.', 'B', 220, 'mgmetro.jpg', 'mini/mgmetro.jpg'),
(6, 'Subaru', 'WRC Impreza GC', 1997, 'Pour 1997, la FIA a remplacé la formule du Groupe A par une nouvelle formule appelée World Rally Car. Cela a donné aux équipes une plus grande latitude dans la conception et les matériaux, y compris la largeur du véhicule, la géométrie de la suspension, l\'aérodynamique, la capacité du refroidisseur intermédiaire et les modifications du moteur. Cela a conduit à une voiture totalement repensée, la WRC97, avec des arbres à cames, des orifices de cylindre et des chambres de combustion modifiés. Le nouveau corps avait deux portes. La largeur de la voiture est passée à 1 770 mm (69,9 pouces) avec une géométrie de suspension révisée. La puissance est passée à 300 ch à 5500 tr / min, et le couple était désormais de 347 lb-pi .', 'A', 1000, 'subaruWRC97.jpg', 'mini/subaruWRC97.jpg'),
(7, 'Mitsubishi', 'Lancer Evo IV', 1997, 'La Lancer Evolution WRC est équipée du moteur 4G63 1 996 cm3 utilisé par Mitsubishi dans ses sports et de rallye depuis les années 1980. Dans cette version WRC, il développe 300 ch (221 kW) à 5500 tr/min et 540 Nm à 3500 tr/min. Malgré l\'appelation \" Lancer,\" elle était en fait fondée sur sa belle-sœur, la \"Cedia\". Les règles du WRC permettent plus de liberté pour le développement de la voiture. Les ingénieurs ont réussi à développer les WRC de façon plus approfondies que les versions Groupe A. Ces développements concernent principalement le moteur sur lequel des évolutions profondes sont effectuées et son positionnement revu. Un nouveau turbo et un nouveau système d\'échappement sont également adoptés. Le changement le plus important concerne les suspensions qui sont remplacées par des MacPherson. Les passages de roue sont également plus imposants que sur les Groupes A. La transmission est quant à elle restée la même.', 'A', 2500, 'lanceeEvo4.jpg', 'mini/lanceeEvo4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `parametre` varchar(255) NOT NULL,
  `langue` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rallye`
--
ALTER TABLE `rallye`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rallye`
--
ALTER TABLE `rallye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
