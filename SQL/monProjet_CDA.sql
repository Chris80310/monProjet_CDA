-- --------------------------------------------------------
-- Hôte:                         localhost
-- Version du serveur:           10.6.16-MariaDB-0ubuntu0.22.04.1 - Ubuntu 22.04
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour monProjet_CDA
CREATE DATABASE IF NOT EXISTS `monProjet_CDA` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `monProjet_CDA`;

-- Listage de la structure de table monProjet_CDA. adresse
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateurs_id` int(11) DEFAULT NULL,
  `util_id` int(11) DEFAULT NULL,
  `adr` varchar(255) DEFAULT NULL,
  `adr_livr` varchar(255) DEFAULT NULL,
  `adr_fact` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C35F08161E969C5` (`utilisateurs_id`),
  CONSTRAINT `FK_C35F08161E969C5` FOREIGN KEY (`utilisateurs_id`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.adresse : ~2 rows (environ)
DELETE FROM `adresse`;
INSERT INTO `adresse` (`id`, `utilisateurs_id`, `util_id`, `adr`, `adr_livr`, `adr_fact`) VALUES
	(5, NULL, 1, '25 rue des bleuets 80000 amiens', NULL, NULL),
	(6, NULL, 2, '33 rue des rosiers 80000 amiens', NULL, NULL);

-- Listage de la structure de table monProjet_CDA. bon_livraison
CREATE TABLE IF NOT EXISTS `bon_livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commande_id` int(11) DEFAULT NULL,
  `date_livr` date NOT NULL,
  `com_id` int(11) NOT NULL,
  `adr_livr` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_31A531A482EA2E54` (`commande_id`),
  CONSTRAINT `FK_31A531A482EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.bon_livraison : ~0 rows (environ)
DELETE FROM `bon_livraison`;

-- Listage de la structure de table monProjet_CDA. cat
CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.cat : ~3 rows (environ)
DELETE FROM `cat`;
INSERT INTO `cat` (`id`, `img`, `libelle`) VALUES
	(1, 'home-lineup--desktops.webp', 'Ordinateurs'),
	(2, 'image_guide.jpg', 'Composants'),
	(3, '619f90472cd9fe16f23a6b4b.webp', 'Périphériques');

-- Listage de la structure de table monProjet_CDA. commande
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateurs_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67D1E969C5` (`utilisateurs_id`),
  CONSTRAINT `FK_6EEAA67D1E969C5` FOREIGN KEY (`utilisateurs_id`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.commande : ~0 rows (environ)
DELETE FROM `commande`;

-- Listage de la structure de table monProjet_CDA. details_com
CREATE TABLE IF NOT EXISTS `details_com` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `commande_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `qte` decimal(5,0) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DAB9F59682EA2E54` (`commande_id`),
  KEY `IDX_DAB9F596F347EFB` (`produit_id`),
  CONSTRAINT `FK_DAB9F59682EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  CONSTRAINT `FK_DAB9F596F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.details_com : ~0 rows (environ)
DELETE FROM `details_com`;

-- Listage de la structure de table monProjet_CDA. fabricant
CREATE TABLE IF NOT EXISTS `fabricant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.fabricant : ~3 rows (environ)
DELETE FROM `fabricant`;
INSERT INTO `fabricant` (`id`, `logo`, `nom`) VALUES
	(1, NULL, 'AMD'),
	(2, NULL, 'NVIDIA'),
	(3, NULL, 'INTEL');

-- Listage de la structure de table monProjet_CDA. facture
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commande_id` int(11) DEFAULT NULL,
  `mode_paie` varchar(1) NOT NULL,
  `prix_ht` decimal(6,2) NOT NULL,
  `date_emi` date NOT NULL,
  `taux_tva` decimal(2,2) NOT NULL,
  `prix_tot` decimal(6,2) NOT NULL,
  `com_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FE86641082EA2E54` (`commande_id`),
  CONSTRAINT `FK_FE86641082EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.facture : ~0 rows (environ)
DELETE FROM `facture`;

-- Listage de la structure de table monProjet_CDA. messenger_messages
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.messenger_messages : ~0 rows (environ)
DELETE FROM `messenger_messages`;

-- Listage de la structure de table monProjet_CDA. produit
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scat_id` int(11) NOT NULL,
  `fabricant_id` int(11) INT NULL,
  `img` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix_ach_fourn` decimal(10,2) NOT NULL,
  `prix_vente_ht` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fab_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC2717831D28` (`scat_id`),
  KEY `IDX_29A5EC27CBAAAAB3` (`fabricant_id`),
  CONSTRAINT `FK_29A5EC2717831D28` FOREIGN KEY (`scat_id`) REFERENCES `scat` (`id`),
  CONSTRAINT `FK_29A5EC27CBAAAAB3` FOREIGN KEY (`fabricant_id`) REFERENCES `fabricant` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.produit : ~33 rows (environ)
DELETE FROM `produit`;
INSERT INTO `produit` (`id`, `scat_id`, `fabricant_id`, `img`, `libelle`, `prix_ach_fourn`, `prix_vente_ht`, `description`, `fab_id`) VALUES
	(1, 1, NULL, 'pc-gamer-shiny-aquarius.jpg', 'Le vortex', 800.00, 1000.00, 'PC AMD Gamer ultime 1440p : CPU Ryzen 5800X3D, GPU AMD 6800XT, 16Go ddr4 Ram 3600cl36, SSD 1To Samsung', NULL),
	(2, 2, NULL, 'hunter-rgb_main_galerie_4.png', 'Orion', 3800.00, 4200.00, 'PC Intel/Nvidia spécial montage 3D : I5 14900k, NVIDIA RTX 4090 24GO, 64Go Ram, SSD 2To Nvme + 8To sata', NULL),
	(3, 3, NULL, 'powercolor-radeon-rx-6700-xt-fighter-12gb-gddr6.jpg', 'RX 6700XT', 235.00, 290.00, 'AMD RX 6700XT 12GO pour le gaming en 1080/1440p', 1),
	(4, 3, NULL, '81-70VBUexL._AC_SL1500_.jpg', 'RX 6800XT', 380.00, 450.00, 'AMD RX 6800XT 16GO pour le gaming en 1440p et 4k', 1),
	(5, 3, NULL, 'sapphire-radeon-rx-7900-xtx-nitro-vapor-x-24gb.jpg', 'RX 7900XTX', 750.00, 900.00, 'AMD RX 7900XTX 20GO pour le gaming jusqu\'en 4k sans compromis sur la fréquence d\'image', 1),
	(6, 3, NULL, 'asus-dual-rtx3060ti-o8gd6x.jpg', 'RTX 3060Ti', 250.00, 330.00, 'NVIDIA RTX 3060Ti 8GO pour le gaming en 1080p avec une grande fluidité', 2),
	(7, 3, NULL, 'asus-rog-strix-rtx3080-10g-gaming.jpg', 'RTX 3080', 450.00, 580.00, 'NVIDIA RTX 3080 12GO pour le gaming en 1440p et 4k', 2),
	(8, 3, NULL, 'msi-geforce-rtx-4090-suprim-x-24g.jpg', 'RTX 4090', 1400.00, 1600.00, 'NVIDIA RTX 4090 24GO pour les taches professionnelles lourdes et le gaming en 4k sans compromis sur la fréquence d\'image', 2),
	(9, 3, NULL, 'intel-arc-a770-16-go.jpg', 'ARC 770', 250.00, 330.00, 'INTEL ARC 770 16GO pour le gaming en 1080/1440p et streaming avec le décodeur AV1', 3),
	(10, 4, NULL, 'amd-ryzen-5-7600x-boxed.jpg', 'RYZEN 7600X', 200.00, 250.00, 'AMD RYZEN 7600X Processeur 6 coeurs, 4.70 GHz, 32 Mo, AMD Zen 4, TDP 105 Watts, socket AM5, version boîte sans ventilateur', 1),
	(11, 4, NULL, 'amd-ryzen-9-7950x-boxed.jpg', 'RYZEN 7950X', 400.00, 550.00, 'Processeur 16 coeurs, 4.50 GHz, 64 Mo, AMD Zen 4, TDP 170 Watts, socket AM5, version boîte sans ventilateur', 1),
	(12, 4, NULL, 'amd-ryzen-7-5800x3d.jpg', 'RYZEN 5800X3D', 200.00, 250.00, '8 coeurs, 16 threads, 3.40 GHz, 96 Mo, AMD Zen 3, 105 Watts', 1),
	(13, 4, NULL, 'intel-core-i5-13600k-boxed.jpg', 'I5 13600k', 250.00, 330.00, '14 coeurs, 20 threads, 3.50 GHz, 24 Mo, Raptor Lake, TDP 125 Watts, socket 1700, version boîte sans ventilateur', 3),
	(14, 4, NULL, 'intel-core-i9-14900k-boxed.jpg', 'I5 14900k', 600.00, 750.00, 'Processeur 24 coeurs, 3.20 GHz, 36 Mo, Intel Raptor Lake Refresh, TDP 125 Watts, socket 1700, version boîte sans ventilateur', 3),
	(15, 5, NULL, NULL, 'Artic liquid freezer II', 80.00, 100.00, 'Kit Watercooling AIO 2x120mm', NULL),
	(16, 5, NULL, 'nh_d15_chromax_black_5_1.jpg', 'Noctua NH-D15 chromax', 80.00, 100.00, 'Ventirad double tour aluminium et cuivre pour socket Intel 1150, 1151, 1155, 1156, 1366, 2011, 2011-V3, 2066, AMD AM2, AM3, AM3+, AM4, FM1, FM2, FM2+', NULL),
	(17, 5, NULL, NULL, 'Thermalright Assassin X 120', 10.00, 15.00, 'Ventirad Thermalright Assassin X 120mm pour socket AMD AM4 AM5/Intel LGA 1150/1151/1200/1700 ', NULL),
	(18, 6, NULL, 'asus-tuf-gaming-b660-plus-wifi-d4.jpg', 'Asus TUF B660-Plus Wifi', 80.00, 150.00, 'Intel B660 - Socket LGA1700 - ATX - Wi-Fi 6ax - Alder Lake S - DDR5', NULL),
	(19, 6, NULL, 'msi-mag-b650-tomahawk-wifi.jpg', 'MSI MAG B650 Tomahawk WiFi', 80.00, 150.00, 'AMD B650 - Socket AM5 - ATX - Raphael - Wi-Fi 6E - Compatible processeurs AMD Ryzen 7000 - DDR5', NULL),
	(20, 6, NULL, NULL, 'Gigabyte B550 Aorus Elite V2', 90.00, 130.00, 'Socket AM4, AMD B550, 1 port PCI-Express 16x, 3200 MHz (DDR4), 2 port M.2, 4 ports USB 3.2 Gen 1, ATX', NULL),
	(21, 7, NULL, 'corsair-vengeance-lpx-kit-32-go-ddr4-3200-cl16-cmk32gx4m2e3200c16.jpg', 'Corsair Vengeance LPX Kit 32 Go DDR4-3200 CL16', 45.00, 60.00, 'Kit 32 Go DDR4-3200 CL16', NULL),
	(22, 7, NULL, 'g-skill-ripjaws-s5-32gb-kit-ddr5-6000-cl30-f5-6000j3040f16gx2-rs5k.jpg', 'G.Skill Ripjaws S5 32 Go Kit DDR5-6000 CL30', 80.00, 120.00, 'Kit 32 Go DDR5-6000 CL30', NULL),
	(23, 8, NULL, 'samsung-980-pro-2-to-m-2.jpg', 'Samsung 980 Pro M.2 2 To', 80.00, 100.00, 'SSD Mvme gen4 2To', NULL),
	(24, 9, NULL, 'msi-mag-a750gl-750w.jpg', 'MSI MAG GL A750GL 750W', 70.00, 90.00, 'Alimentation modulaire 750w rendement gold', NULL),
	(25, 9, NULL, 'seasonic-focus-gx-1000w-atx-3-0.jpg', 'Seasonic Focus GX-1000W ATX 3.0', 100.00, 130.00, 'Alimentation modulaire 1000w, Atx 3.0, rendement gold', NULL),
	(26, 10, NULL, 'phanteks-eclipse-g360a-black.jpg', 'Phanteks Eclipse G360A Black', 50.00, 80.00, 'boitier Phanteks Eclipse G360A noir', NULL),
	(27, 10, NULL, 'lian-li-o11-dynamic-evo-white.jpg', 'Lian Li O11 Dynamic EVO White', 90.00, 120.00, 'boitier Lian Li O11 Dynamic EVO blanc', NULL),
	(28, 11, NULL, 'corsair-premium-individually-sleeved-psu-cables-pro-kit-type-4-gen-4-white-black.jpg', 'Corsair PSU Cables Pro Kit Type 4 Gen 4 - White/Black', 50.00, 80.00, 'Cables d\'alimentation tréssés Corsair Type 4 Gen 4 blanc/noir', NULL),
	(29, 12, NULL, 'arctic-p12-pwm-pst-black-value-pack-120mm.jpg', 'Arctic P12 PWM PST black Value Pack 120mm', 15.00, 25.00, 'Lot 3 ventilateurs noirs Arctic P12 PWM PST', NULL),
	(30, 12, NULL, 'corsair-icue-link-qx120-rgb-120mm-white-3-pack.jpg', 'Corsair iCUE Link QX120 RGB 120mm', 90.00, 120.00, 'ventilateur Corsair iCUE Link QX120 RGB 120mm', NULL),
	(31, 13, NULL, '619f90472cd9fe16f23a6b4b.webp', 'Gigabyte G27Q', 200.00, 230.00, 'Moniteur 27" IPS 144 Hz - 2560 x 1440 px (QHD)', NULL),
	(32, 14, NULL, 'raw.jpeg', 'Corsair K55 RGB PRO (AZERTY)', 25.00, 35.00, 'Clavier Gamer - Rétroéclairage 16.8M de couleurs - Anti-ghosting', NULL),
	(33, 15, NULL, 'souris-gaming-logitech-g-g402-hyperion-fury-fp.webp', 'Logitech G502 Lightspeed', 50.00, 75.00, 'Souris Gamer optique - Résolution ajustable jusqu\'à 16 000 dpi - 11 boutons programmables - Sans fil', NULL);

-- Listage de la structure de table monProjet_CDA. scat
CREATE TABLE IF NOT EXISTS `scat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_39D14AD4E6ADA943` (`cat_id`),
  CONSTRAINT `FK_39D14AD4E6ADA943` FOREIGN KEY (`cat_id`) REFERENCES `cat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.scat : ~15 rows (environ)
DELETE FROM `scat`;
INSERT INTO `scat` (`id`, `cat_id`, `libelle`, `img`) VALUES
	(1, 1, 'Gaming', 'pc-gamer-shiny-aquarius.jpg'),
	(2, 1, 'Professionnel', 'home-lineup--desktops.webp'),
	(3, 2, 'Cartes graphiques', 'sapphire-radeon-rx-7900-xtx-nitro-vapor-x-24gb.jpg'),
	(4, 2, 'Processeurs', 'intel-core-i9-14900k-boxed.jpg'),
	(5, 2, 'Refroidisseurs', 'nh_d15_chromax_black_1_4.jpg'),
	(6, 2, 'Cartes mères', 'asus-tuf-gaming-b660-plus-wifi-d4.jpg'),
	(7, 2, 'Ram', 'g-skill-ripjaws-s5-32gb-kit-ddr5-6000-cl30-f5-6000j3040f16gx2-rs5k.jpg'),
	(8, 2, 'SSD', 'samsung-980-pro-2-to-m-2.jpg'),
	(9, 2, 'Alimentations', 'seasonic-focus-gx-1000w-atx-3-0.jpg'),
	(10, 2, 'Boitiers', 'phanteks-eclipse-g360a-black.jpg'),
	(11, 2, 'Cablage', 'corsair-premium-individually-sleeved-psu-cables-pro-kit-type-4-gen-4-white-black.jpg'),
	(12, 2, 'Ventilateurs boitier', 'corsair-icue-link-qx120-rgb-120mm-white-3-pack.jpg'),
	(13, 3, 'Ecrans', '619f90472cd9fe16f23a6b4b.webp'),
	(14, 3, 'Claviers', 'raw.jpeg'),
	(15, 3, 'Souris', 'souris-gaming-logitech-g-g402-hyperion-fury-fp.webp');

-- Listage de la structure de table monProjet_CDA. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resp_id` int(11) DEFAULT NULL,
  `nom_entr` varchar(100) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(180) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `coef` decimal(2,2) DEFAULT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT '(DC2Type:json)',
  `mdp` varchar(50) DEFAULT NULL,
  `com_assignee` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_497B315EE7927C74` (`email`),
  UNIQUE KEY `UNIQ_497B315EF037AB0F` (`tel`),
  KEY `IDX_497B315EF2EFA634` (`resp_id`),
  CONSTRAINT `FK_497B315EF2EFA634` FOREIGN KEY (`resp_id`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table monProjet_CDA.utilisateurs : ~2 rows (environ)
DELETE FROM `utilisateurs`;
INSERT INTO `utilisateurs` (`id`, `resp_id`, `nom_entr`, `nom`, `prenom`, `email`, `tel`, `coef`, `roles`, `mdp`, `com_assignee`) VALUES
	(1, NULL, NULL, 'client-nom', 'client-prenom', NULL, NULL, NULL, '1', '1234', NULL),
	(2, NULL, NULL, 'empl-nom', 'empl-prenom', NULL, NULL, NULL, '2', '4321', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
