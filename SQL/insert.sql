-- cat : Composants / périphériques / ordinateurs
-- scat 1 : Cartes graphiques / cartes mères / processeurs / etc ...

INSERT INTO utilisateurs (id, nom, prenom, roles, mdp) 
VALUES (1, 'client-nom', 'client-prenom', 1, '1234'), (2, 'empl-nom', 'empl-prenom', 2, '4321'); 

INSERT INTO adresse (adr, util_id) VALUES ('25 rue des bleuets 80000 amiens', 1), ('33 rue des rosiers 80000 amiens', 2); 

INSERT INTO fabricant (id, nom) VALUES (1, 'AMD'); 
INSERT INTO fabricant (id, nom) VALUES (2, 'NVIDIA'); 
INSERT INTO fabricant (id, nom) VALUES (3, 'INTEL'); 
INSERT INTO fabricant (id, nom) VALUES (4, ''); 

INSERT INTO cat (id, libelle) VALUES (1, 'Ordinateurs'); 
INSERT INTO cat (id, libelle) VALUES (2, 'Composants'); 
INSERT INTO cat (id, libelle) VALUES (3, 'Périphériques');

INSERT INTO scat (id, libelle, cat_id) VALUES (1, 'Gaming', 1);
INSERT INTO scat (id, libelle, cat_id) VALUES (2, 'Professionnel', 1); 

INSERT INTO scat (id, libelle, cat_id) VALUES (3, 'Cartes graphiques', 2);
INSERT INTO scat (id, libelle, cat_id) VALUES (4, 'Processeurs', 2); 
INSERT INTO scat (id, libelle, cat_id) VALUES (5, 'Refroidisseurs', 2); 
INSERT INTO scat (id, libelle, cat_id) VALUES (6, 'Cartes mères', 2);
INSERT INTO scat (id, libelle, cat_id) VALUES (7, 'Ram', 2);
INSERT INTO scat (id, libelle, cat_id) VALUES (8, 'SSD', 2); 
INSERT INTO scat (id, libelle, cat_id) VALUES (9, 'Alimentations', 2); 
INSERT INTO scat (id, libelle, cat_id) VALUES (10, 'Boitiers', 2); 
INSERT INTO scat (id, libelle, cat_id) VALUES (11, 'Cablage', 2);
INSERT INTO scat (id, libelle, cat_id) VALUES (12, 'Ventilateurs boitier', 2); 

INSERT INTO scat (id, libelle, cat_id) VALUES (13, 'Ecrans', 3); 
INSERT INTO scat (id, libelle, cat_id) VALUES (14, 'Claviers', 3); 
INSERT INTO scat (id, libelle, cat_id) VALUES (15, 'Souris', 3); 

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES
('Le vortex', 800, 1000, 'PC AMD Gamer ultime 1440p : CPU Ryzen 5800X3D, GPU AMD 6800XT, 16Go ddr4 Ram 3600cl36, SSD 1To Samsung', 1);
INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES
('Orion', 3800, 4200, 'PC Intel/Nvidia spécial montage 3D : I5 14900k, NVIDIA RTX 4090 24GO, 64Go Ram, SSD 2To Nvme + 8To sata', 2);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, fab_id, scat_id) VALUES
('RX 6700XT', 235, 290,'AMD RX 6700XT 12GO pour le gaming en 1080/1440p', 1, 3),
('RX 6800XT', 380, 450, 'AMD RX 6800XT 16GO pour le gaming en 1440p et 4k', 1, 3),
('RX 7900XTX', 750, 900, 'AMD RX 7900XTX 20GO pour le gaming jusqu''en 4k sans compromis sur la fréquence d''image', 1, 3);
INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, fab_id, scat_id) VALUES 
('RTX 3060Ti', 250, 330, 'NVIDIA RTX 3060Ti 8GO pour le gaming en 1080p avec une grande fluidité', 2, 3),
('RTX 3080', 450, 580, 'NVIDIA RTX 3080 12GO pour le gaming en 1440p et 4k', 2, 3),
('RTX 4090', 1400, 1600,'NVIDIA RTX 4090 24GO pour les taches professionnelles lourdes et le gaming en 4k sans compromis sur la fréquence d''image', 2, 3);
INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, fab_id, scat_id) VALUES 
('ARC 770', 250, 330, 'INTEL ARC 770 16GO pour le gaming en 1080/1440p et streaming avec le décodeur AV1', 3, 3);
INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, fab_id, scat_id) VALUES 
('RYZEN 7600X', 200, 250, 'AMD RYZEN 7600X Processeur 6 coeurs, 4.70 GHz, 32 Mo, AMD Zen 4, TDP 105 Watts, socket AM5, version boîte sans ventilateur', 1, 4),
('RYZEN 7950X', 400, 550,'Processeur 16 coeurs, 4.50 GHz, 64 Mo, AMD Zen 4, TDP 170 Watts, socket AM5, version boîte sans ventilateur', 1, 4),
('RYZEN 5800X3D', 200, 250,'8 coeurs, 16 threads, 3.40 GHz, 96 Mo, AMD Zen 3, 105 Watts', 1, 4),
('I5 13600k', 250, 330,'14 coeurs, 20 threads, 3.50 GHz, 24 Mo, Raptor Lake, TDP 125 Watts, socket 1700, version boîte sans ventilateur', 3, 4),
('I5 14900k', 600, 750,'Processeur 24 coeurs, 3.20 GHz, 36 Mo, Intel Raptor Lake Refresh, TDP 125 Watts, socket 1700, version boîte sans ventilateur', 3, 4);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Artic liquid freezer II', 80, 100,'Kit Watercooling AIO 2x120mm', 5),
('Noctua NH-D15 chromax', 80, 100,'Ventirad double tour aluminium et cuivre pour socket Intel 1150, 1151, 1155, 1156, 1366, 2011, 2011-V3, 2066, AMD AM2, AM3, AM3+, AM4, FM1, FM2, FM2+', 5),
('Thermalright Assassin X 120', 10, 15,'Ventirad Thermalright Assassin X 120mm pour socket AMD AM4 AM5/Intel LGA 1150/1151/1200/1700 ', 5);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Asus TUF B660-Plus Wifi', 80, 150,'Intel B660 - Socket LGA1700 - ATX - Wi-Fi 6ax - Alder Lake S - DDR5', 6),
('MSI MAG B650 Tomahawk WiFi', 80, 150,'AMD B650 - Socket AM5 - ATX - Raphael - Wi-Fi 6E - Compatible processeurs AMD Ryzen 7000 - DDR5', 6),
('Gigabyte B550 Aorus Elite V2', 90, 130, 'Socket AM4, AMD B550, 1 port PCI-Express 16x, 3200 MHz (DDR4), 2 port M.2, 4 ports USB 3.2 Gen 1, ATX', 6);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Corsair Vengeance LPX Kit 32 Go DDR4-3200 CL16', 45, 60,'Kit 32 Go DDR4-3200 CL16', 7),
('G.Skill Ripjaws S5 32 Go Kit DDR5-6000 CL30', 80, 120,'Kit 32 Go DDR5-6000 CL30', 7);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES ('Samsung 980 Pro M.2 2 To', 80, 100,'SSD Mvme gen4 2To', 8);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('MSI MAG GL A750GL 750W', 70, 90,'Alimentation modulaire 750w rendement gold', 9),
('Seasonic Focus GX-1000W ATX 3.0', 100, 130,'Alimentation modulaire 1000w, Atx 3.0, rendement gold', 9);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Phanteks Eclipse G360A Black', 50, 80,'boitier Phanteks Eclipse G360A noir', 10),
('Lian Li O11 Dynamic EVO White', 90, 120,'boitier Lian Li O11 Dynamic EVO blanc', 10);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Corsair PSU Cables Pro Kit Type 4 Gen 4 - White/Black', 50, 80,'Cables d''alimentation tréssés Corsair Type 4 Gen 4 blanc/noir', 11);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Arctic P12 PWM PST black Value Pack 120mm', 15, 25,'Lot 3 ventilateurs noirs Arctic P12 PWM PST', 12),
('Corsair iCUE Link QX120 RGB 120mm', 90, 120,'ventilateur Corsair iCUE Link QX120 RGB 120mm', 12);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Gigabyte G27Q', 200, 230, 'Moniteur 27" IPS 144 Hz - 2560 x 1440 px (QHD)', 13);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Corsair K55 RGB PRO (AZERTY)', 25, 35, 'Clavier Gamer - Rétroéclairage 16.8M de couleurs - Anti-ghosting', 14);

INSERT INTO produit (libelle, prix_ach_fourn, prix_vente_ht, description, scat_id) VALUES 
('Logitech G502 Lightspeed', 50, 75, 'Souris Gamer optique - Résolution ajustable jusqu''à 16 000 dpi - 11 boutons programmables - Sans fil', 15);
