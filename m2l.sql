-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 26 Janvier 2017 à 00:57
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_a` int(11) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `numero_rue` int(11) DEFAULT NULL,
  `code_postal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id_a`, `ville`, `rue`, `numero_rue`, `code_postal`) VALUES
(1, 'Paris', 'rue de Dunkerk', 2, '75002'),
(2, 'Lyon', 'rue de la lione', 4, '88888'),
(3, 'Sint-Joost-ten-Node', 'Appartement 923-9791 Enim. Rd.', 98, '64585'),
(4, 'Cedar Rapids', '3046 Nam Impasse', 39, '46863'),
(5, 'Toulouse', '1301 Lectus Chemin', 123, '30-339'),
(6, 'Whitehorse', '6581 Interdum. Route', 187, 'L9C 1E3'),
(7, 'Dietzenbach', '3057 Nullam Chemin', 64, '38674'),
(8, 'Kilwinning', '4924 Nec Impasse', 87, 'V0X 2X4'),
(9, 'Hoeilaart', 'CP 679, 5508 Facilisis, Chemin', 102, 'R6A 1X8'),
(10, 'Ciudad Real', '5325 Ut Chemin', 26, '88235'),
(11, 'Koolkerke', 'Appartement 762-7957 Nec, Route', 71, '50920'),
(12, 'Corral', '5381 Ipsum. Ave', 144, '69614'),
(13, 'Ayr', 'Appartement 511-2687 Ac, Av.', 139, '065094'),
(14, 'Cisano sul Neva', 'CP 759, 407 Dignissim. Rd.', 11, '08698'),
(15, 'Mezzana', '6810 Ornare Impasse', 47, 'K1E 9S1'),
(16, 'Chanco', 'CP 770, 8855 Elementum Av.', 16, '22754'),
(17, 'Hull', 'CP 137, 8800 Primis Route', 110, '6330'),
(18, 'Rebecq', '647-1014 Urna Rd.', 110, '8582'),
(19, 'Chiari', 'CP 719, 6303 Consectetuer Impasse', 115, '00522'),
(20, 'Yeotmal', '6699 Neque Impasse', 168, '0731QI'),
(21, 'Opwijk', 'CP 796, 7221 Eget Impasse', 166, '289718'),
(22, 'Seloignes', '3464 Varius Chemin', 67, '494775'),
(23, 'Hunstanton', 'CP 498, 1971 Dolor Impasse', 168, '82115-337'),
(24, 'Foligno', 'Appartement 823-7042 In Route', 16, '2224'),
(25, 'Ceppaloni', '274-9564 In Avenue', 83, '472523'),
(26, 'Hoshiarpur', 'CP 576, 4473 Et Rue', 56, '49777'),
(27, 'Lowell', 'Appartement 322-777 Ultrices, Route', 57, '39867'),
(28, 'Sambuca Pistoiese', 'CP 438, 3250 Nec Ave', 142, '05123'),
(29, 'Amaro', '3981 Lacus. Avenue', 77, '752926'),
(30, 'Carleton', '2660 Pede Rue', 97, '7157MI'),
(31, 'Abergavenny', '4796 Magnis Ave', 83, '180336'),
(32, 'Santa Juana', '7636 Ornare, Impasse', 121, '9507'),
(33, 'Afsin', '192-287 Ipsum Rd.', 192, 'B0Y 7R5'),
(34, 'Los Angeles', 'Appartement 488-8696 Curabitur Rd.', 46, '578483'),
(35, 'Bradford', '279-3277 Vitae Avenue', 46, '49256'),
(36, 'MŽlin', 'Appartement 802-977 Sed Rue', 169, '9473'),
(37, 'Rio Saliceto', '539-5640 Venenatis Ave', 50, '73618'),
(38, 'Tourcoing', 'CP 849, 1146 Egestas. Av.', 143, '5919'),
(39, 'Radicofani', 'CP 362, 3878 Cras Ave', 94, '5761'),
(40, 'Chattanooga', '9341 Nisl Route', 168, '61500'),
(41, 'Brechin', 'CP 158, 3282 Nulla. Avenue', 183, '285310'),
(42, 'Crieff', 'Appartement 252-5624 Dapibus Ave', 22, '09180'),
(43, 'Kawartha Lakes', '234-1739 Nonummy. Impasse', 10, '60689'),
(44, 'Saint-Lô', 'CP 702, 3800 Diam Impasse', 161, 'L2V 1L9'),
(45, 'Shivapuri', 'CP 755, 5044 Eu, Rue', 19, '0350'),
(46, 'Kamoke', 'CP 434, 940 Lorem Chemin', 7, '188049'),
(47, 'Nadrin', '4451 Cursus Route', 116, 'C5K 1Y3'),
(48, 'Torrevecchia Teatina', '8511 Quam Route', 139, '4803'),
(49, 'Zwettl-Niederösterreich', '9768 Libero Impasse', 64, 'MX4 7DX'),
(50, 'Saint John', '1174 Accumsan Rue', 59, 'L21 9UD'),
(51, 'Saint-Denis', '928-4751 Sapien Ave', 28, '8348'),
(52, 'Dawson Creek', 'Appartement 313-3174 Lobortis Rd.', 44, '37598'),
(53, 'Galashiels', '4742 Vel Avenue', 27, '66870-867'),
(54, 'Tobermory', 'CP 547, 8150 Placerat. Chemin', 88, '28686'),
(55, 'Salice Salentino', 'CP 485, 8382 Tristique Rd.', 10, '677851'),
(56, 'Levin', '6746 Facilisis, Chemin', 58, '82370'),
(57, 'Gagliano del Capo', '447-1891 Consequat Ave', 185, '74063'),
(58, 'Smoky Lake', '7207 Massa Chemin', 16, '51805'),
(59, 'Lowell', 'CP 249, 4599 Mauris Rue', 124, '49221'),
(60, 'Potsdam', '628-2749 Nunc Rue', 100, '8162'),
(61, 'Kapolei', 'CP 430, 3216 Cras Av.', 30, '7805'),
(62, 'Warrnambool', 'Appartement 820-6671 Ornare, Av.', 43, '6360'),
(63, 'Montemignaio', 'Appartement 968-2068 Vestibulum Chemin', 40, '92355'),
(64, 'Köthen', '3798 Non Rd.', 185, '2448HV'),
(65, 'Tiltil', 'Appartement 734-3390 Cursus Avenue', 36, '77359'),
(66, 'Oostmalle', 'CP 258, 5913 Lobortis Avenue', 130, 'E1X 7H2'),
(67, 'Esslingen', '172-5463 Vel Route', 198, '89855'),
(68, 'Glovertown', 'Appartement 478-6467 Ut, Rd.', 97, '01577'),
(69, 'l\'Escaillre', 'Appartement 636-7923 Donec Impasse', 150, '64443'),
(70, 'Nalinnes', 'Appartement 762-7249 Justo. Avenue', 99, '297574'),
(71, 'Boston', '916-8222 Pede. Ave', 44, 'IL5H 2FC'),
(72, 'Wismar', '316-1670 Massa Av.', 182, '20506'),
(73, 'Termoli', '234-9584 Vel Ave', 181, '21810'),
(74, 'Baranello', '553-5187 Nec Impasse', 108, '82241-181'),
(75, 'Salice Salentino', 'CP 872, 4458 Dolor, Ave', 173, '22940'),
(76, 'Bierk Bierghes', 'CP 105, 5992 Fermentum Ave', 50, '52683-535'),
(77, 'Geer', '880-5049 Habitant Chemin', 170, '6274'),
(78, 'Stonewall', '331-8945 Porttitor Rue', 128, '09625'),
(79, 'Greenwich', 'Appartement 581-3992 Pede. Av.', 82, '3147'),
(80, 'Rockingham', 'CP 580, 1059 Nonummy Route', 112, '208770'),
(81, 'Whittlesey', '508-591 Tortor, Ave', 2, '7103'),
(82, 'Santa Bárbara', '178-9176 Nullam Route', 92, '1843'),
(83, 'Terneuzen', 'Appartement 961-793 Proin Route', 59, '07679-839'),
(84, 'Couture-Saint-Germain', 'CP 694, 7537 Duis Rue', 185, '7037'),
(85, 'Duncan', 'CP 387, 6708 Torquent Av.', 158, '652829'),
(86, 'Pescantina', '5753 Odio. Rd.', 135, '31417'),
(87, 'Tubeke Tubize', '542-3238 Dictum Rd.', 95, '74499'),
(88, 'Nieuwkerken-Waas', '8563 Massa. Rd.', 130, '45611-833'),
(89, 'Covington', '407-8842 Luctus Rd.', 125, '8984TK'),
(90, 'Grezzana', '467-7369 Ac Ave', 111, '88011'),
(91, 'Knittelfeld', '797-7362 Ullamcorper, Av.', 130, '85129'),
(92, 'Rockingham', 'Appartement 245-8494 Rhoncus. Avenue', 102, '71247'),
(93, 'Schwedt', 'Appartement 316-9985 Metus Avenue', 61, '917814'),
(94, 'Alandur', '7960 Erat Rue', 93, '1929'),
(95, 'Turgutlu', '185-8324 Ultrices. Route', 186, '79873'),
(96, 'Orta San Giulio', '9858 Quis Avenue', 11, 'AS21 6QD'),
(97, 'Quillota', 'CP 531, 9080 Donec Impasse', 31, '28430'),
(98, 'Newbury', 'CP 968, 8539 Nullam Route', 180, '66611'),
(99, 'Niterói', '8152 Cursus Impasse', 150, '02506'),
(100, 'Warwick', 'CP 488, 3558 Erat Rd.', 165, '248624'),
(101, 'Kontich', '865-502 Sem Ave', 49, 'M6A 9H0'),
(102, 'Oosterhout', '970-8744 Ligula. Avenue', 84, '2329');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int(11) NOT NULL,
  `id_formation` int(11) DEFAULT NULL,
  `id_salarie` int(11) DEFAULT NULL,
  `content_com` varchar(10000) DEFAULT NULL,
  `date_com` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `id_formation`, `id_salarie`, `content_com`, `date_com`) VALUES
(1, 3, 30, 'scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis', '2016-03-04 20:47:47'),
(2, 28, 30, 'sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare,', '2017-04-14 14:56:21'),
(3, 58, 28, 'enim. Suspendisse aliquet, sem ut cursus luctus,', '2017-11-27 20:16:18'),
(4, 4, 7, 'mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum.', '2017-10-03 19:06:10'),
(5, 100, 22, 'tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus', '2016-05-10 02:37:43'),
(6, 57, 27, 'elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in', '2017-10-23 06:21:00'),
(7, 100, 17, 'in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis.', '2016-01-29 09:35:19'),
(8, 71, 31, 'ac orci. Ut semper', '2016-02-25 21:36:27'),
(9, 29, 25, 'vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum', '2016-07-13 16:04:09'),
(10, 16, 14, 'nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut', '2016-09-20 11:54:01'),
(11, 39, 11, 'malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus', '2017-05-10 04:05:27'),
(12, 36, 30, 'Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut', '2016-03-20 10:49:06'),
(13, 101, 17, 'adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', '2016-10-14 17:27:33'),
(14, 66, 18, 'risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas', '2017-05-25 05:56:18'),
(15, 26, 8, 'lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis', '2017-07-25 18:36:16'),
(16, 69, 38, 'purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet,', '2016-04-11 15:59:02'),
(17, 70, 1, 'nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna.', '2016-09-20 15:57:52'),
(18, 8, 19, 'turpis. Nulla aliquet. Proin velit.', '2017-01-14 08:32:32'),
(19, 4, 16, 'at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum', '2016-06-10 07:33:24'),
(20, 19, 32, 'blandit at,', '2016-06-12 12:07:58'),
(21, 72, 26, 'enim. Nunc ut erat. Sed', '2016-07-24 19:42:12'),
(22, 39, 44, 'metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula.', '2016-08-12 05:26:40'),
(23, 12, 37, 'Maecenas malesuada fringilla est. Mauris eu', '2017-11-19 03:51:03'),
(24, 36, 17, 'non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus', '2017-03-06 18:08:50'),
(25, 88, 24, 'mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo', '2016-07-21 06:16:17'),
(26, 64, 11, 'nisi', '2016-04-20 08:18:08'),
(27, 17, 45, 'orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante', '2017-01-06 13:48:09'),
(28, 47, 3, 'sagittis felis.', '2017-05-07 03:51:05'),
(29, 69, 10, 'Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque.', '2017-06-16 05:16:58'),
(30, 40, 11, 'a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc', '2016-08-23 11:05:53'),
(31, 94, 24, 'dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius.', '2017-02-01 15:32:41'),
(32, 3, 15, 'risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est', '2017-05-29 02:02:58'),
(33, 6, 36, 'arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu', '2016-07-25 03:43:11'),
(34, 103, 24, 'lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis', '2017-02-19 10:41:08'),
(35, 71, 8, 'cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus', '2016-05-24 23:00:42'),
(36, 104, 46, 'Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla', '2017-04-01 13:47:38'),
(37, 15, 47, 'vulputate', '2016-05-24 07:07:04'),
(38, 55, 3, 'justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a,', '2017-12-10 12:18:10'),
(39, 19, 21, 'lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie', '2016-09-22 08:26:20'),
(40, 68, 4, 'nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet', '2017-05-27 12:15:29'),
(41, 103, 33, 'massa lobortis ultrices.', '2016-03-02 16:38:02'),
(42, 7, 25, 'Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat', '2017-04-21 17:38:40'),
(43, 57, 19, 'quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam,', '2016-10-07 06:04:55'),
(44, 92, 6, 'et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis', '2016-02-08 21:14:27'),
(45, 53, 40, 'ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus', '2016-03-03 22:25:24'),
(46, 60, 42, 'lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet', '2017-11-04 06:36:24'),
(47, 1, 36, 'mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie.', '2017-05-01 03:38:08'),
(48, 64, 33, 'at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc', '2016-11-17 07:19:24'),
(49, 89, 10, 'pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique', '2016-12-18 02:48:18'),
(50, 31, 16, 'nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus', '2017-01-02 06:16:43'),
(51, 76, 21, 'vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate', '2017-09-05 04:23:14'),
(52, 67, 34, 'et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas', '2016-11-26 05:02:38'),
(53, 94, 19, 'hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec', '2017-10-21 14:17:12'),
(54, 44, 43, 'Mauris nulla. Integer urna. Vivamus molestie', '2017-09-10 01:19:16'),
(55, 60, 38, 'et, magna. Praesent interdum ligula', '2016-10-25 04:29:23'),
(56, 14, 15, 'felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc', '2016-01-31 11:32:20'),
(57, 58, 12, 'et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt', '2017-09-09 11:20:36'),
(58, 82, 41, 'diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus', '2016-05-11 03:59:16'),
(59, 25, 28, 'Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim', '2017-02-19 01:14:15'),
(60, 46, 47, 'a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula.', '2017-01-12 06:55:28'),
(61, 28, 6, 'Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum', '2017-10-29 12:15:35'),
(62, 29, 39, 'erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat', '2017-02-02 22:00:06'),
(63, 100, 24, 'placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit', '2016-04-09 07:34:38'),
(64, 22, 45, 'ac arcu.', '2017-10-22 11:25:44'),
(65, 63, 31, 'et magnis dis parturient montes,', '2017-05-06 19:53:03'),
(66, 55, 39, 'justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id', '2017-12-04 06:10:18'),
(67, 3, 32, 'libero est, congue a, aliquet vel, vulputate eu,', '2016-04-15 22:28:25'),
(68, 2, 31, 'ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', '2017-10-21 14:56:51'),
(69, 92, 44, 'quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod', '2017-11-09 16:20:34'),
(70, 58, 45, 'turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat', '2017-04-30 10:28:33'),
(71, 35, 6, 'velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac', '2016-02-28 03:23:00'),
(72, 82, 25, 'dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis', '2017-02-20 01:29:09'),
(73, 93, 18, 'sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque', '2017-02-19 22:01:29'),
(74, 15, 7, 'Suspendisse', '2017-08-29 01:15:10'),
(75, 99, 10, 'morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in,', '2016-06-22 06:00:34'),
(76, 87, 29, 'vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur', '2017-04-20 12:40:48'),
(77, 77, 24, 'libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus.', '2016-04-16 20:38:51'),
(78, 52, 48, 'velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta', '2016-03-31 16:54:30'),
(79, 63, 4, 'fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet', '2017-07-28 17:10:42'),
(80, 81, 12, 'fringilla. Donec feugiat metus sit', '2017-12-25 08:45:12'),
(81, 4, 18, 'vestibulum nec, euismod', '2016-12-26 04:15:33'),
(82, 45, 30, 'elit sed consequat auctor, nunc nulla vulputate dui, nec tempus', '2016-06-04 21:28:49'),
(83, 35, 7, 'scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan', '2017-01-13 20:12:34'),
(84, 6, 37, 'eu augue porttitor interdum. Sed auctor odio a purus. Duis', '2017-04-15 08:21:27'),
(85, 34, 12, 'neque. Morbi quis urna. Nunc quis arcu', '2016-04-21 12:57:18'),
(86, 61, 22, 'arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris', '2016-08-05 19:14:53'),
(87, 42, 43, 'ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis', '2017-05-28 05:41:16'),
(88, 94, 28, 'risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod', '2016-09-02 12:28:06'),
(89, 58, 27, 'metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis', '2016-06-25 05:22:59'),
(90, 90, 2, 'Duis cursus, diam at pretium aliquet, metus urna', '2016-11-11 02:23:15'),
(91, 52, 29, 'gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu', '2017-07-13 11:05:32'),
(92, 74, 37, 'luctus et', '2017-03-24 22:14:56'),
(93, 23, 47, 'gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue', '2016-08-14 02:55:39'),
(94, 57, 20, 'pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non', '2017-02-26 12:06:46'),
(95, 55, 18, 'amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas', '2017-11-29 03:53:22'),
(96, 85, 13, 'In mi pede, nonummy ut, molestie in, tempus eu, ligula.', '2016-08-19 05:19:41'),
(97, 88, 29, 'dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique', '2017-06-01 08:08:41'),
(98, 100, 16, 'vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat', '2016-03-17 10:00:52'),
(99, 12, 48, 'et tristique', '2016-10-04 04:21:48'),
(100, 21, 48, 'Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel', '2017-01-03 11:08:35');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_f` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `date_debut` datetime DEFAULT NULL,
  `nb_place` int(11) DEFAULT NULL,
  `contenu` text,
  `adresse_f` int(11) DEFAULT NULL,
  `prestataire_f` int(11) DEFAULT NULL,
  `type_f` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id_f`, `titre`, `image`, `duree`, `cout`, `date_debut`, `nb_place`, `contenu`, `adresse_f`, `prestataire_f`, `type_f`) VALUES
(1, 'Excel', 1, 2, 100, '2016-10-29 18:21:19', 20, '"contenu de la formation Excel"', 72, 45, 39),
(2, 'VBA', 2, 5, 1000, '2016-10-09 18:21:19', 5, '"contenu de la formation VBA"', 90, 36, 11),
(3, 'Word', 3, 9, 800, '2016-10-09 18:21:19', 7, '"contenu de la formation Word"', 52, 43, 11),
(4, 'Java', 4, 7, 1000, '2016-10-09 18:21:19', 5, '"contenu de la formation Java"', 53, 18, 34),
(5, 'Nullam lobortis', 5, 9, 1489, '2016-08-30 04:29:28', 16, 'luctus,', 61, 40, 23),
(6, 'Maecenas ornare', 6, 3, 1102, '2017-12-31 21:06:18', 31, 'tortor at risus. Nunc', 62, 17, 39),
(7, 'pellentesque. Sed', 7, 4, 689, '2017-07-14 09:55:38', 12, 'eget magna.', 87, 35, 43),
(8, 'magna. Cras', 8, 11, 1306, '2016-11-10 15:06:10', 17, 'dapibus', 49, 9, 12),
(9, 'aliquet libero.', 9, 2, 1053, '2017-01-28 15:10:07', 27, 'amet,', 86, 26, 9),
(10, 'Pellentesque habitant', 10, 9, 1484, '2016-09-24 13:52:21', 23, 'lacinia. Sed congue, elit sed', 81, 1, 17),
(11, 'et risus.', 11, 11, 1074, '2016-05-01 17:17:02', 27, 'dictum', 78, 12, 7),
(12, 'nec, mollis', 12, 7, 400, '2016-05-31 13:02:13', 18, 'In at', 53, 24, 4),
(13, 'pharetra sed,', 13, 6, 1478, '2016-09-08 18:11:48', 39, 'est.', 81, 19, 18),
(14, 'Nam porttitor', 14, 10, 1233, '2017-11-13 10:38:44', 26, 'congue a,', 69, 33, 10),
(15, 'tristique neque', 15, 8, 210, '2017-03-29 11:42:31', 37, 'eget metus eu erat semper', 89, 45, 44),
(16, 'purus, accumsan', 16, 11, 1124, '2017-07-29 05:30:35', 33, 'et, lacinia vitae, sodales', 97, 25, 25),
(17, 'suscipit, est', 17, 3, 944, '2017-11-25 00:03:11', 38, 'Vestibulum ante', 54, 14, 7),
(18, 'dolor quam,', 18, 8, 218, '2016-02-07 00:30:33', 23, 'odio sagittis', 97, 16, 15),
(19, 'Vivamus non', 19, 5, 1204, '2016-02-13 01:09:22', 9, 'Nullam scelerisque neque sed sem', 71, 10, 44),
(20, 'vestibulum, neque', 20, 3, 264, '2016-09-16 10:53:35', 6, 'scelerisque neque sed', 72, 19, 33),
(21, 'Morbi non', 21, 10, 304, '2016-03-31 08:29:53', 25, 'cursus', 96, 36, 50),
(22, 'Fusce feugiat.', 22, 5, 875, '2016-06-12 11:20:20', 35, 'Quisque ac', 78, 22, 48),
(23, 'faucibus leo,', 23, 4, 1101, '2016-08-30 22:59:20', 36, 'Mauris molestie pharetra nibh.', 60, 45, 14),
(24, 'gravida nunc', 24, 6, 1496, '2016-03-11 08:11:20', 3, 'aliquet libero.', 73, 26, 48),
(25, 'Donec est.', 25, 3, 219, '2016-08-09 12:04:38', 21, 'Vivamus', 75, 14, 23),
(26, 'Proin vel', 26, 9, 1269, '2017-08-06 05:40:06', 1, 'et, rutrum non, hendrerit id,', 99, 4, 22),
(27, 'volutpat. Nulla', 27, 12, 525, '2016-11-11 06:30:50', 26, 'ut ipsum ac mi eleifend', 76, 36, 29),
(28, 'ligula. Donec', 28, 4, 1069, '2016-05-04 09:21:53', 14, 'mi lacinia mattis.', 51, 24, 40),
(29, 'pede sagittis', 29, 7, 950, '2016-06-26 12:59:47', 6, 'lorem ipsum', 59, 30, 12),
(30, 'Quisque libero', 30, 3, 1496, '2016-08-06 21:02:41', 39, 'leo.', 51, 38, 27),
(31, 'neque non', 31, 9, 1251, '2016-11-06 20:48:01', 19, 'nulla ante, iaculis nec,', 57, 18, 10),
(32, 'elit, pretium', 32, 6, 949, '2017-02-08 11:22:22', 32, 'Donec', 95, 7, 22),
(33, 'nisi. Cum', 33, 2, 1196, '2016-12-05 01:10:33', 4, 'Fusce', 70, 38, 34),
(34, 'vel, venenatis', 34, 3, 710, '2017-08-25 18:51:38', 14, 'mattis', 53, 20, 34),
(35, 'Nullam scelerisque', 35, 6, 1017, '2017-12-15 13:08:33', 31, 'tellus lorem eu', 59, 29, 37),
(36, 'morbi tristique', 36, 4, 1402, '2017-06-17 08:32:20', 4, 'Nunc ac sem ut dolor', 98, 24, 30),
(37, 'sit amet,', 37, 2, 551, '2016-02-23 07:18:05', 32, 'luctus et ultrices posuere', 90, 18, 15),
(38, 'augue. Sed', 38, 6, 1393, '2017-01-25 09:44:38', 29, 'nibh lacinia orci,', 76, 9, 36),
(39, 'Fusce aliquet', 39, 12, 923, '2017-10-17 21:16:33', 12, 'mauris, rhoncus id,', 56, 28, 33),
(40, 'nunc sit', 40, 4, 1206, '2016-07-14 12:44:05', 18, 'ultricies ornare, elit', 59, 20, 41),
(41, 'netus et', 41, 2, 611, '2017-11-22 13:31:49', 34, 'purus.', 85, 29, 12),
(42, 'posuere, enim', 42, 8, 1415, '2016-03-03 21:49:36', 7, 'sed tortor. Integer aliquam', 78, 27, 2),
(43, 'mollis vitae,', 43, 6, 580, '2016-05-31 16:13:33', 8, 'nunc. In at', 96, 44, 17),
(44, 'penatibus et', 44, 10, 1420, '2017-05-29 02:43:05', 29, 'commodo hendrerit. Donec porttitor tellus', 64, 4, 40),
(45, 'dis parturient', 45, 3, 1172, '2017-05-25 05:28:26', 21, 'felis purus', 92, 41, 48),
(46, 'Vivamus molestie', 46, 3, 659, '2017-07-19 09:52:50', 12, 'Phasellus', 101, 10, 45),
(47, 'a, auctor', 47, 4, 226, '2017-06-29 07:01:19', 3, 'risus. Duis a mi fringilla', 86, 13, 30),
(48, 'sit amet,', 48, 6, 713, '2017-03-18 11:49:33', 5, 'Aenean sed pede', 88, 1, 26),
(49, 'Aliquam ultrices', 49, 10, 201, '2016-01-23 16:06:04', 8, 'pellentesque massa lobortis ultrices.', 59, 42, 2),
(50, 'nunc id', 50, 10, 1205, '2017-08-27 03:22:20', 13, 'Curabitur', 94, 34, 46),
(51, 'massa. Integer', 51, 4, 234, '2016-03-07 05:17:27', 18, 'Morbi metus.', 58, 1, 8),
(52, 'neque sed', 52, 8, 1480, '2017-02-17 12:40:45', 36, 'urna. Vivamus', 66, 41, 8),
(53, 'non, lacinia', 53, 8, 582, '2017-08-15 22:15:40', 12, 'Fusce mollis. Duis', 64, 40, 19),
(54, 'hendrerit. Donec', 54, 8, 1374, '2016-02-13 19:12:36', 11, 'lobortis ultrices. Vivamus', 62, 23, 9),
(55, 'sit amet,', 55, 9, 1042, '2017-05-01 17:37:26', 4, 'Vivamus non', 83, 26, 23),
(56, 'iaculis odio.', 56, 12, 758, '2017-10-21 01:49:43', 34, 'odio tristique', 69, 5, 25),
(57, 'felis ullamcorper', 57, 12, 627, '2017-05-23 02:04:35', 39, 'tristique pellentesque, tellus sem mollis', 74, 33, 38),
(58, 'Pellentesque habitant', 58, 8, 560, '2016-09-05 07:26:12', 15, 'Sed eu nibh', 74, 35, 18),
(59, 'eget, volutpat', 59, 4, 963, '2017-03-09 08:36:07', 31, 'eleifend nec, malesuada', 65, 45, 14),
(60, 'egestas. Sed', 60, 8, 201, '2017-11-15 08:44:29', 25, 'Aliquam fringilla cursus', 71, 39, 13),
(61, 'urna et', 61, 3, 517, '2017-02-13 19:58:02', 28, 'gravida', 72, 21, 19),
(62, 'purus. Duis', 62, 10, 1230, '2016-12-23 13:09:28', 21, 'elit, a feugiat tellus', 49, 17, 50),
(63, 'lorem semper', 63, 10, 1063, '2016-04-18 09:21:13', 32, 'ac,', 69, 10, 9),
(64, 'non, vestibulum', 64, 10, 1213, '2016-04-13 15:50:40', 35, 'nibh.', 77, 7, 45),
(65, 'amet, faucibus', 65, 11, 1110, '2016-01-28 05:11:39', 23, 'et risus. Quisque', 85, 10, 18),
(66, 'non enim', 66, 7, 845, '2017-08-18 23:38:18', 2, 'dictum sapien. Aenean massa. Integer', 90, 11, 10),
(67, 'odio. Phasellus', 67, 10, 489, '2016-12-26 10:01:04', 24, 'quis urna. Nunc quis arcu', 69, 37, 44),
(68, 'libero. Donec', 68, 4, 870, '2016-06-30 17:07:43', 19, 'Mauris magna.', 90, 9, 48),
(69, 'massa. Quisque', 69, 7, 829, '2017-08-15 00:00:44', 26, 'dictum eu, eleifend nec,', 70, 9, 18),
(70, 'nibh enim,', 70, 10, 746, '2017-01-03 06:53:57', 2, 'Donec', 54, 1, 3),
(71, 'mi tempor', 71, 11, 305, '2016-05-31 12:31:24', 24, 'Aenean eget metus. In nec', 78, 18, 21),
(72, 'a tortor.', 72, 9, 1418, '2016-10-26 17:09:20', 12, 'ullamcorper, velit in', 83, 35, 20),
(73, 'et, euismod', 73, 11, 626, '2017-10-05 17:22:43', 26, 'nibh sit amet orci.', 69, 25, 1),
(74, 'elit sed', 74, 3, 1216, '2017-11-23 22:08:47', 12, 'consequat dolor vitae', 88, 35, 7),
(75, 'mi enim,', 75, 8, 1287, '2017-08-08 17:59:56', 8, 'eget', 95, 36, 20),
(76, 'aliquet diam.', 76, 9, 842, '2016-01-30 10:53:52', 4, 'diam. Duis', 91, 1, 47),
(77, 'dis parturient', 77, 3, 574, '2016-09-15 05:48:41', 21, 'erat, eget tincidunt dui', 57, 33, 38),
(78, 'ac turpis', 78, 10, 464, '2017-08-27 04:43:57', 35, 'libero. Proin sed turpis', 50, 44, 7),
(79, 'sed pede.', 79, 4, 794, '2016-05-11 16:16:35', 39, 'mollis nec, cursus a,', 75, 5, 40),
(80, 'elit. Etiam', 80, 10, 1021, '2016-07-16 14:20:48', 17, 'Aliquam tincidunt, nunc ac', 69, 3, 33),
(81, 'Morbi non', 81, 6, 1211, '2016-01-31 17:33:26', 37, 'erat.', 95, 8, 42),
(82, 'scelerisque neque.', 82, 9, 815, '2017-05-18 13:19:06', 26, 'Donec', 85, 1, 17),
(83, 'est mauris,', 83, 4, 603, '2017-05-16 14:01:13', 13, 'neque et nunc. Quisque ornare', 58, 43, 45),
(84, 'in aliquet', 84, 5, 554, '2016-12-18 06:18:02', 24, 'arcu. Sed et libero.', 72, 43, 16),
(85, 'sapien. Cras', 85, 6, 360, '2017-07-05 09:00:47', 18, 'nascetur ridiculus mus.', 51, 38, 31),
(86, 'egestas, urna', 86, 11, 1379, '2017-11-19 02:09:28', 2, 'vitae semper egestas, urna justo', 97, 42, 25),
(87, 'Cras convallis', 87, 4, 1427, '2017-09-24 20:50:52', 16, 'ornare lectus justo eu', 94, 28, 19),
(88, 'pede, nonummy', 88, 2, 1211, '2016-01-30 19:31:13', 24, 'parturient', 56, 18, 50),
(89, 'a nunc.', 89, 5, 1290, '2016-08-04 11:47:41', 23, 'lacus pede sagittis augue, eu', 67, 25, 22),
(90, 'est. Mauris', 90, 3, 997, '2017-12-05 01:09:18', 34, 'libero lacus, varius et,', 62, 31, 9),
(91, 'Vestibulum ante', 91, 7, 536, '2017-04-12 00:29:23', 4, 'eu, odio. Phasellus at augue', 62, 30, 28),
(92, 'aliquet odio.', 92, 8, 454, '2017-04-19 05:59:08', 11, 'semper auctor.', 94, 11, 6),
(93, 'Quisque nonummy', 93, 9, 1039, '2016-12-09 16:46:11', 2, 'vulputate, posuere vulputate, lacus. Cras', 57, 22, 10),
(94, 'nunc sit', 94, 10, 671, '2017-01-24 23:22:08', 2, 'sodales nisi magna sed dui.', 61, 37, 24),
(95, 'magna. Ut', 95, 10, 296, '2016-06-17 15:37:01', 20, 'Donec vitae erat vel pede', 102, 28, 43),
(96, 'sapien molestie', 96, 4, 393, '2016-04-06 11:21:05', 14, 'dis parturient montes, nascetur', 85, 8, 31),
(97, 'lobortis mauris.', 97, 3, 934, '2016-02-16 13:58:32', 40, 'feugiat.', 63, 5, 49),
(98, 'bibendum sed,', 98, 8, 1062, '2016-09-25 01:49:30', 10, 'varius orci, in consequat enim', 73, 39, 1),
(99, 'arcu. Vestibulum', 99, 12, 483, '2016-12-10 08:15:25', 3, 'semper rutrum. Fusce', 102, 18, 43),
(100, 'quis urna.', 100, 5, 1050, '2016-02-17 01:27:20', 40, 'orci luctus et', 78, 6, 4),
(101, 'ullamcorper, velit', 101, 11, 729, '2016-03-26 15:11:03', 8, 'ullamcorper, nisl arcu iaculis', 63, 22, 38),
(102, 'faucibus orci', 102, 3, 645, '2016-10-04 15:43:15', 9, 'a mi fringilla', 74, 24, 1),
(103, 'varius et,', 103, 8, 901, '2016-10-20 10:49:46', 39, 'tellus, imperdiet', 77, 43, 14),
(104, 'orci quis', 104, 9, 976, '2016-11-13 06:15:28', 7, 'velit egestas lacinia.', 84, 7, 21);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_participation` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL DEFAULT '0',
  `id_salarie` int(11) NOT NULL DEFAULT '0',
  `state` int(11) DEFAULT NULL,
  `date_demande` datetime DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `date_participation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`id_participation`, `id_formation`, `id_salarie`, `state`, `date_demande`, `date_validation`, `date_participation`) VALUES
(1, 14, 33, 2, '2017-12-15 08:16:05', '2017-07-11 12:37:03', '2018-01-23 16:50:17'),
(2, 40, 1, 1, '2017-06-27 05:11:55', '2017-01-22 01:27:11', NULL),
(3, 17, 31, 1, '2017-05-23 06:36:36', '2016-11-03 16:31:24', NULL),
(4, 27, 24, 1, '2016-11-21 03:41:13', '2016-04-05 11:02:49', NULL),
(5, 52, 14, 0, '2017-12-18 00:21:22', NULL, NULL),
(6, 5, 12, 1, '2016-08-11 11:58:56', '2016-05-21 06:13:07', NULL),
(7, 52, 28, 1, '2016-04-08 09:58:40', '2016-04-17 05:59:50', NULL),
(8, 70, 31, 2, '2017-09-17 14:03:01', '2016-04-19 10:02:26', '2017-06-13 14:21:42'),
(9, 77, 16, 1, '2016-10-22 14:47:24', '2017-09-08 22:35:40', NULL),
(10, 49, 28, 0, '2016-07-29 00:06:42', NULL, NULL),
(11, 26, 40, 0, '2017-12-07 04:39:38', NULL, NULL),
(12, 13, 12, 1, '2016-03-09 03:57:24', '2016-12-25 10:17:43', NULL),
(13, 8, 2, 2, '2017-04-08 08:25:51', '2017-01-08 07:31:16', '2017-08-24 09:28:29'),
(14, 96, 15, 2, '2017-06-17 03:32:37', '2017-06-29 00:04:24', '2016-02-28 17:32:11'),
(15, 67, 43, 2, '2017-03-27 18:53:21', '2018-01-21 16:04:23', '2017-06-27 12:24:07'),
(16, 82, 47, 2, '2017-06-30 20:49:36', '2017-06-30 02:12:46', '2017-11-12 07:02:14'),
(17, 97, 13, 2, '2017-05-19 11:09:57', '2017-12-01 23:12:21', '2016-02-02 11:37:28'),
(18, 52, 43, 2, '2017-08-21 12:48:52', '2018-01-17 16:52:49', '2017-06-03 19:40:08'),
(19, 3, 26, 1, '2016-03-05 00:13:40', '2017-11-03 00:01:14', NULL),
(20, 12, 37, 1, '2017-09-15 12:40:06', '2016-10-04 10:43:12', NULL),
(21, 11, 6, 0, '2017-11-16 08:25:17', NULL, NULL),
(22, 86, 7, 1, '2017-09-14 01:55:45', '2017-10-26 08:03:24', NULL),
(23, 8, 16, 2, '2017-11-23 02:49:13', '2016-12-09 12:15:46', '2017-01-10 06:35:41'),
(24, 47, 27, 2, '2017-07-15 14:21:28', '2017-09-09 15:50:43', '2017-03-21 04:19:16'),
(25, 77, 42, 0, '2017-02-12 13:16:56', NULL, NULL),
(26, 20, 14, 0, '2017-12-06 08:24:44', NULL, NULL),
(27, 32, 29, 2, '2018-01-19 12:06:06', '2017-08-02 00:28:35', '2016-05-08 08:27:22'),
(28, 38, 10, 1, '2017-05-05 18:45:08', '2017-08-22 21:59:51', NULL),
(29, 70, 34, 2, '2017-11-22 09:27:22', '2017-06-10 00:57:58', '2016-12-26 09:57:34'),
(30, 9, 18, 0, '2016-12-04 19:54:37', NULL, NULL),
(31, 102, 37, 1, '2017-07-06 20:24:12', '2016-12-12 23:59:23', NULL),
(32, 93, 18, 2, '2017-03-18 00:47:34', '2016-06-05 05:31:12', '2017-01-01 13:01:45'),
(33, 84, 44, 2, '2016-02-04 21:15:28', '2017-08-31 10:29:34', '2017-06-07 10:57:20'),
(34, 73, 11, 1, '2016-06-06 22:05:23', '2017-09-08 22:39:48', NULL),
(35, 88, 9, 0, '2016-08-18 06:59:10', NULL, NULL),
(36, 75, 27, 0, '2017-10-26 03:38:41', NULL, NULL),
(37, 103, 42, 1, '2017-02-22 09:02:14', '2017-08-20 17:12:39', NULL),
(38, 47, 31, 2, '2016-07-26 05:14:59', '2017-08-30 08:50:08', '2016-04-14 20:05:36'),
(39, 51, 40, 2, '2016-04-24 10:23:36', '2017-08-17 13:58:03', '2016-06-18 12:05:51'),
(40, 70, 6, 2, '2017-11-25 21:10:22', '2018-01-16 14:15:18', '2017-03-01 13:49:26'),
(41, 11, 9, 2, '2017-12-01 02:23:58', '2017-07-10 20:35:22', '2016-03-08 21:32:13'),
(42, 104, 19, 2, '2016-12-07 09:41:21', '2017-07-30 03:54:23', '2016-04-05 04:24:24'),
(43, 42, 37, 2, '2017-11-30 03:43:08', '2016-10-29 21:55:26', '2016-05-19 02:37:54'),
(44, 20, 24, 0, '2016-02-10 20:56:36', NULL, NULL),
(45, 95, 8, 2, '2017-01-19 12:08:01', '2017-12-07 14:53:39', '2017-10-02 05:24:06'),
(46, 72, 28, 0, '2017-06-13 18:39:01', NULL, NULL),
(47, 99, 26, 0, '2016-09-10 10:52:36', NULL, NULL),
(48, 17, 30, 0, '2016-09-16 06:01:28', NULL, NULL),
(49, 62, 16, 2, '2016-10-15 07:04:02', '2017-06-26 11:07:38', '2017-02-16 11:32:11'),
(50, 34, 16, 2, '2017-10-09 22:16:52', '2018-01-02 15:35:44', '2017-10-24 11:39:52'),
(51, 44, 17, 1, '2016-10-30 20:22:20', '2017-02-10 11:50:23', NULL),
(52, 101, 23, 1, '2016-11-15 09:23:29', '2017-05-14 17:09:37', NULL),
(53, 92, 3, 1, '2017-11-15 04:14:36', '2017-12-02 15:13:14', NULL),
(54, 57, 10, 2, '2017-12-11 20:38:14', '2016-12-29 17:33:26', '2017-10-14 15:37:38'),
(55, 92, 44, 2, '2016-09-17 16:08:52', '2016-08-19 04:49:03', '2017-06-05 09:31:27'),
(56, 42, 33, 1, '2018-01-01 17:26:20', '2016-06-18 22:17:20', NULL),
(57, 55, 30, 2, '2016-08-08 21:45:52', '2016-09-03 18:22:40', '2017-07-05 16:25:46'),
(58, 70, 1, 2, '2017-03-24 12:55:37', '2017-12-23 01:21:24', '2017-02-21 21:52:03'),
(59, 59, 9, 0, '2016-08-04 19:10:47', NULL, NULL),
(60, 101, 7, 1, '2016-08-19 17:59:17', '2017-08-30 20:18:54', NULL),
(61, 6, 7, 0, '2017-09-14 23:27:11', NULL, NULL),
(62, 71, 18, 0, '2016-06-05 09:36:09', NULL, NULL),
(63, 13, 19, 1, '2017-08-11 03:39:15', '2017-03-16 01:03:02', NULL),
(64, 46, 16, 1, '2017-11-07 19:11:44', '2017-02-22 14:38:20', NULL),
(65, 45, 20, 2, '2016-07-20 12:36:37', '2016-05-31 04:50:22', '2017-02-16 19:44:46'),
(66, 59, 7, 1, '2017-08-25 09:10:20', '2016-04-16 15:36:56', NULL),
(67, 79, 6, 0, '2017-10-01 23:36:32', NULL, NULL),
(68, 104, 1, 2, '2017-07-26 19:46:19', '2016-07-02 14:29:49', '2017-03-13 13:47:36'),
(69, 58, 42, 2, '2016-05-15 05:08:39', '2016-09-03 00:21:06', '2016-05-02 01:41:04'),
(70, 86, 41, 1, '2016-07-04 13:07:48', '2017-07-31 04:36:31', NULL),
(71, 74, 21, 0, '2016-06-08 14:02:08', NULL, NULL),
(72, 2, 1, 1, '2016-02-21 18:16:31', '2016-10-23 07:09:58', NULL),
(73, 62, 43, 2, '2017-02-07 09:31:23', '2017-06-19 06:03:09', '2016-02-02 17:04:50'),
(74, 9, 2, 0, '2016-06-16 05:34:54', NULL, NULL),
(75, 71, 16, 0, '2016-03-27 23:16:53', NULL, NULL),
(76, 59, 12, 0, '2016-06-07 04:45:08', NULL, NULL),
(77, 18, 6, 2, '2017-03-16 13:06:51', '2016-10-06 02:01:12', '2016-03-31 17:05:40'),
(78, 52, 3, 0, '2017-07-09 09:26:18', NULL, NULL),
(79, 23, 9, 0, '2017-01-16 12:48:25', NULL, NULL),
(80, 82, 32, 0, '2016-06-30 23:22:09', NULL, NULL),
(81, 25, 12, 0, '2016-05-25 09:53:11', NULL, NULL),
(82, 7, 26, 0, '2017-09-20 00:56:57', NULL, NULL),
(83, 56, 40, 0, '2016-05-27 02:15:53', NULL, NULL),
(84, 44, 46, 0, '2017-02-15 20:33:31', NULL, NULL),
(85, 14, 33, 0, '2016-02-05 15:31:44', NULL, NULL),
(86, 49, 19, 0, '2016-08-29 13:02:42', NULL, NULL),
(87, 10, 11, 0, '2016-05-18 02:35:02', NULL, NULL),
(88, 61, 28, 2, '2017-09-08 11:13:05', '2016-06-19 01:15:31', '2017-06-11 02:00:54'),
(89, 5, 31, 0, '2017-03-03 10:22:44', NULL, NULL),
(90, 4, 38, 2, '2017-01-13 13:35:36', '2016-03-15 10:42:33', '2016-02-09 10:44:42'),
(91, 41, 13, 0, '2016-05-19 05:08:55', NULL, NULL),
(92, 3, 34, 1, '2016-11-08 09:26:41', '2016-05-27 21:11:02', NULL),
(93, 83, 12, 2, '2016-10-05 05:33:23', '2016-08-03 21:12:16', '2016-03-24 15:26:19'),
(94, 31, 1, 0, '2016-03-05 19:21:10', NULL, NULL),
(95, 16, 22, 2, '2017-06-09 08:06:49', '2017-09-25 20:07:45', '2017-07-22 01:22:02'),
(96, 21, 45, 1, '2017-06-05 04:15:07', '2017-02-13 12:17:17', NULL),
(97, 76, 14, 0, '2016-12-13 23:52:31', NULL, NULL),
(98, 101, 39, 0, '2017-09-12 13:45:10', NULL, NULL),
(99, 27, 47, 0, '2016-10-18 04:52:15', NULL, NULL),
(100, 89, 39, 2, '2017-12-27 19:23:13', '2017-06-20 22:32:48', '2016-11-21 11:22:43');

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE `prestataire` (
  `id_p` int(11) NOT NULL,
  `raison_sociale` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prestataire`
--

INSERT INTO `prestataire` (`id_p`, `raison_sociale`, `nom`) VALUES
(1, 'enseignant developpement', 'Brook'),
(2, 'enseignant management', 'Willis'),
(3, 'pede. Nunc', 'Gavin'),
(4, 'malesuada fames', 'Neve'),
(5, 'Donec at', 'Maile'),
(6, 'nulla. In', 'Rowan'),
(7, 'non enim.', 'Penelope'),
(8, 'aliquet odio.', 'Donna'),
(9, 'Donec felis', 'Carl'),
(10, 'Duis dignissim', 'Tyler'),
(11, 'sed, sapien.', 'Francis'),
(12, 'nunc nulla', 'Belle'),
(13, 'sociis natoque', 'Gannon'),
(14, 'Quisque nonummy', 'Fritz'),
(15, 'vel est', 'Fritz'),
(16, 'nec, imperdiet', 'Aidan'),
(17, 'facilisis lorem', 'Zoe'),
(18, 'nisi. Cum', 'Jael'),
(19, 'malesuada. Integer', 'Aubrey'),
(20, 'Aliquam ornare,', 'Dolan'),
(21, 'libero mauris,', 'Finn'),
(22, 'rhoncus. Donec', 'Curran'),
(23, 'tellus justo', 'Ahmed'),
(24, 'diam at', 'Kasimir'),
(25, 'auctor vitae,', 'Amelia'),
(26, 'Mauris eu', 'Calista'),
(27, 'mauris sapien,', 'Yetta'),
(28, 'volutpat. Nulla', 'Hasad'),
(29, 'Duis ac', 'Chaim'),
(30, 'posuere at,', 'Joseph'),
(31, 'eget tincidunt', 'Chastity'),
(32, 'Aenean euismod', 'Quamar'),
(33, 'augue, eu', 'Fay'),
(34, 'Aliquam erat', 'Linus'),
(35, 'Donec vitae', 'Hermione'),
(36, 'Proin vel', 'Clementine'),
(37, 'vitae, sodales', 'Grace'),
(38, 'convallis est,', 'Tana'),
(39, 'nascetur ridiculus', 'Amal'),
(40, 'est. Nunc', 'Phoebe'),
(41, 'sodales elit', 'Arthur'),
(42, 'sagittis lobortis', 'Blythe'),
(43, 'convallis erat,', 'Colin'),
(44, 'mus. Proin', 'Forrest'),
(45, 'leo, in', 'Taylor');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

CREATE TABLE `salarie` (
  `id_s` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `identifiant` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `nb_jour` int(11) DEFAULT NULL,
  `adresse_s` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salarie`
--

INSERT INTO `salarie` (`id_s`, `nom`, `prenom`, `email`, `identifiant`, `password`, `status`, `credit`, `nb_jour`, `adresse_s`) VALUES
(1, 'salarié', 'salarié', 'salarie@salarie.com', 'salarie', 'salarie', 1, 1000, 2, 47),
(2, 'chef', 'chef', 'chef@chef.com', 'chef', 'chef', 2, 10000, 10, 48),
(3, 'admin', 'admin', 'admin@admin.com', 'admin', 'admin', 0, 0, 0, 1),
(4, 'Harris', 'Hilda', 'Nulla@auctorquistristique.com', 'dolor', 'SHB97ENH1OP', 3, 1917, 11, 46),
(5, 'Patton', 'Aphrodite', 'sem.mollis@magnaUttincidunt.com', 'Mauris', 'HQO77ERG6UN', 4, 14962, 21, 2),
(6, 'Conway', 'Macon', 'tortor.nibh@nibh.com', 'laoreet,', 'VFZ86QCQ1HX', 2, 5606, 9, 3),
(7, 'Weiss', 'Beverly', 'Duis.at@Crasconvallis.co.uk', 'erat.', 'SPX52QLA1JO', 3, 10580, 18, 4),
(8, 'Ewing', 'Jesse', 'diam@sodalesat.ca', 'feugiat', 'DZA30MUF8DW', 4, 14776, 8, 5),
(9, 'Sullivan', 'Ivana', 'diam.at@magnaPraesentinterdum.co.uk', 'nascetur', 'QJU72HRT5XF', 3, 5641, 12, 6),
(10, 'Alvarado', 'Athena', 'fermentum.fermentum@ametultricies.com', 'magna', 'VCK39LMX4BW', 5, 5313, 11, 7),
(11, 'West', 'Shannon', 'ac@accumsanneque.edu', 'ligula', 'AWT25SKD6AD', 1, 449, 13, 8),
(12, 'Mcdaniel', 'Melanie', 'nunc.ac@commodoipsumSuspendisse.com', 'Cum', 'DMG50ZSG4EX', 6, 1345, 9, 9),
(13, 'Lynch', 'Rigel', 'blandit@quis.com', 'a', 'SPX06BOV0LA', 4, 9327, 2, 10),
(14, 'Hanson', 'Hasad', 'vel.sapien@massa.edu', 'ac', 'PTN96ZRN9BN', 3, 12809, 22, 11),
(15, 'Schmidt', 'Burke', 'semper.auctor.Mauris@rutrumeuultrices.co.uk', 'magna.', 'HHM78ATA9QE', 3, 5298, 29, 12),
(16, 'Stein', 'Raphael', 'vitae.velit.egestas@magnaSuspendissetristique.com', 'posuere', 'QZI57HCL9XI', 6, 11307, 2, 13),
(17, 'Velez', 'Charlotte', 'netus@acarcuNunc.edu', 'tincidunt', 'EOH13JUO8SW', 6, 14403, 28, 14),
(18, 'Douglas', 'Lacey', 'rutrum@dictum.ca', 'felis,', 'JCQ65RNC7QK', 1, 3166, 9, 15),
(19, 'Mcintosh', 'Nayda', 'tincidunt.dui@acarcuNunc.edu', 'Quisque', 'FEV73TAQ1RC', 4, 10330, 28, 16),
(20, 'Gould', 'Sarah', 'erat.in.consectetuer@turpis.net', 'mauris', 'UPL07YQB2RO', 1, 7341, 17, 17),
(21, 'Vance', 'Madeson', 'vitae@Inmi.org', 'magnis', 'DEM30KVY0GW', 6, 2680, 24, 18),
(22, 'Winters', 'Lani', 'ligula@cursus.ca', 'malesuada.', 'ECS60JVY6AJ', 3, 6741, 26, 19),
(23, 'Carter', 'Barry', 'fringilla@Incondimentum.ca', 'erat', 'ORL78AWO0VY', 6, 3377, 8, 20),
(24, 'Wells', 'Jillian', 'tempus.eu@volutpatNullafacilisis.org', 'sagittis.', 'ELR99SEA4ZR', 5, 10504, 11, 21),
(25, 'Sweet', 'Guy', 'erat@Inmipede.co.uk', 'Duis', 'TKB36LNL0JM', 1, 13452, 28, 22),
(26, 'Hyde', 'Clinton', 'elit@mollisnec.edu', 'molestie', 'PLQ09SGW9RN', 2, 9469, 23, 23),
(27, 'Franco', 'Garth', 'arcu@laciniaSed.com', 'Mauris', 'ANC94YJN5CG', 2, 2055, 21, 24),
(28, 'Newman', 'Blaze', 'Praesent.luctus@Etiam.org', 'ligula.', 'TUY68IED3XS', 2, 8192, 24, 25),
(29, 'Ross', 'Timothy', 'scelerisque.mollis.Phasellus@eleifend.com', 'nibh.', 'YEA84LRM0AM', 4, 5809, 10, 26),
(30, 'Mejia', 'Donovan', 'tellus.sem.mollis@eratvitaerisus.net', 'et,', 'JUC62YSW9EG', 1, 3845, 23, 27),
(31, 'Monroe', 'Byron', 'non.justo.Proin@felisorci.ca', 'egestas', 'GMU13ECV1DN', 1, 5366, 25, 28),
(32, 'Dejesus', 'Baker', 'pharetra@PhasellusnullaInteger.org', 'netus', 'UAJ38UNQ6XB', 2, 13300, 17, 29),
(33, 'Schroeder', 'Anika', 'augue.malesuada@amet.co.uk', 'molestie', 'IVJ90QCH1ML', 1, 5086, 5, 30),
(34, 'Reeves', 'Moana', 'adipiscing.enim@tortorInteger.ca', 'sed,', 'RVI30PYN9RS', 5, 9162, 21, 31),
(35, 'Owens', 'Uta', 'placerat.Cras@lorem.com', 'aliquam', 'CAJ30KAL3LH', 2, 13334, 7, 32),
(36, 'Gonzalez', 'Chadwick', 'adipiscing@semper.ca', 'ante', 'QEQ01WKC2MK', 5, 3234, 2, 33),
(37, 'Cruz', 'Mannix', 'Curae.Phasellus.ornare@elita.edu', 'massa.', 'JKE35ZMG5VB', 2, 5528, 27, 34),
(38, 'Mann', 'Kiara', 'per@velvulputateeu.co.uk', 'ultrices', 'DRG92PZE4ME', 1, 9374, 29, 35),
(39, 'Page', 'Kiayada', 'ullamcorper.nisl@Cumsociisnatoque.com', 'magnis', 'ICU63EYG9IV', 4, 14027, 24, 36),
(40, 'Ellison', 'Fuller', 'Sed.nunc.est@elit.com', 'sollicitudin', 'EOR20JDI7JL', 6, 10128, 4, 37),
(41, 'Mcguire', 'Amela', 'ligula.Aenean@Nullamvelitdui.org', 'et', 'MEK49QDW7JD', 2, 13296, 7, 38),
(42, 'Crosby', 'Noel', 'montes.nascetur.ridiculus@blanditmattisCras.org', 'dolor', 'YTF52ZCC8QD', 1, 7250, 24, 39),
(43, 'Jimenez', 'Quinlan', 'Nulla.eu.neque@Cras.edu', 'enim.', 'KXL02AVO6NZ', 1, 12798, 27, 40),
(44, 'Giles', 'Xerxes', 'ligula.Nullam.feugiat@dapibus.edu', 'tristique', 'DKE13MKM6ZA', 5, 3667, 26, 41),
(45, 'Hughes', 'Reese', 'a.dui.Cras@Ut.org', 'non,', 'HRT40YNW8MS', 6, 13056, 1, 42),
(46, 'Maxwell', 'Phoebe', 'amet.consectetuer@penatibusetmagnis.co.uk', 'ac,', 'YYJ38PVC6ES', 2, 5243, 19, 43),
(47, 'Colon', 'Adrian', 'libero.et.tristique@sodalesatvelit.net', 'Donec', 'JTY07FZD4CP', 6, 14225, 15, 44),
(48, 'Clay', 'Kirsten', 'semper.Nam@natoque.org', 'tristique', 'QDX81NNH2TR', 2, 13435, 18, 45);

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

CREATE TABLE `type_formation` (
  `id_t` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_formation`
--

INSERT INTO `type_formation` (`id_t`, `type`) VALUES
(1, 'Bureautique'),
(2, 'Développement'),
(3, 'adipiscing.'),
(4, 'nec'),
(5, 'ac,'),
(6, 'sed'),
(7, 'interdum'),
(8, 'gravida'),
(9, 'Cum'),
(10, 'dolor'),
(11, 'risus.'),
(12, 'dui.'),
(13, 'eu'),
(14, 'eros'),
(15, 'imperdiet'),
(16, 'Maecenas'),
(17, 'massa'),
(18, 'dictum.'),
(19, 'nunc'),
(20, 'malesuada'),
(21, 'a'),
(22, 'pulvinar'),
(23, 'felis.'),
(24, 'Nullam'),
(25, 'dolor,'),
(26, 'sem'),
(27, 'vestibulum'),
(28, 'eu,'),
(29, 'Nulla'),
(30, 'ipsum.'),
(31, 'non,'),
(32, 'quis'),
(33, 'auctor.'),
(34, 'fringilla'),
(35, 'eu'),
(36, 'Aenean'),
(37, 'semper'),
(38, 'malesuada'),
(39, 'in,'),
(40, 'mauris'),
(41, 'ultricies'),
(42, 'arcu.'),
(43, 'ipsum'),
(44, 'Integer'),
(45, 'lacinia'),
(46, 'nonummy'),
(47, 'justo.'),
(48, 'quis'),
(49, 'convallis'),
(50, 'ut');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_a`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_form` (`id_formation`),
  ADD KEY `id_sala` (`id_salarie`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_f`),
  ADD KEY `adress_f` (`adresse_f`),
  ADD KEY `presta_f` (`prestataire_f`),
  ADD KEY `typ_f` (`type_f`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_participation`),
  ADD KEY `fk_participer_salarie` (`id_salarie`),
  ADD KEY `fk_participer_formation` (`id_formation`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD PRIMARY KEY (`id_s`),
  ADD KEY `FK_salarie_adresse` (`adresse_s`);

--
-- Index pour la table `type_formation`
--
ALTER TABLE `type_formation`
  ADD PRIMARY KEY (`id_t`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT pour la table `participer`
--
ALTER TABLE `participer`
  MODIFY `id_participation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `salarie`
--
ALTER TABLE `salarie`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `type_formation`
--
ALTER TABLE `type_formation`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `id_form` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_f`),
  ADD CONSTRAINT `id_sala` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_s`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `adress_f` FOREIGN KEY (`adresse_f`) REFERENCES `adresse` (`id_a`),
  ADD CONSTRAINT `presta_f` FOREIGN KEY (`prestataire_f`) REFERENCES `prestataire` (`id_p`),
  ADD CONSTRAINT `typ_f` FOREIGN KEY (`type_f`) REFERENCES `type_formation` (`id_t`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `fk_participer_formation` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_f`),
  ADD CONSTRAINT `fk_participer_salarie` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_s`);

--
-- Contraintes pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD CONSTRAINT `FK_salarie_adresse` FOREIGN KEY (`adresse_s`) REFERENCES `adresse` (`id_a`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
