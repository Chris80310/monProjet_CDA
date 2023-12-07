-- categorie : CPU / GPU / ...
-- sous-cat : 1080p / 1440p / 4k
-- sous-cat2 : gaming / professionnel

INSERT INTO distributeurs (nom_dis) VALUES ('AMD');
INSERT INTO distributeurs (nom_dis) VALUES ('NVIDIA');
INSERT INTO distributeurs (nom_dis) VALUES ('INTEL');

INSERT INTO categorie (libelle_cat) VALUES ('cartes graphiques'); --1
INSERT INTO categorie (libelle_cat) VALUES ('processeurs'); --2
INSERT INTO categorie (libelle_cat) VALUES ('refroidissement processeur'); --3
INSERT INTO categorie (libelle_cat) VALUES ('cartes mères'); --4
INSERT INTO categorie (libelle_cat) VALUES ('mémoire vive'); --5
INSERT INTO categorie (libelle_cat) VALUES ('mémoire de stockage'); --6
INSERT INTO categorie (libelle_cat) VALUES ('alimentations'); --7
INSERT INTO categorie (libelle_cat) VALUES ('boitiers'); --8
INSERT INTO categorie (libelle_cat) VALUES ('cablage'); --9
INSERT INTO categorie (libelle_cat) VALUES ('ventilateurs boitier'); --10

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES
('RX 6700XT', 235, 290,'AMD RX 6700XT 12GO pour le gaming en 1080/1440p', 1),
('RX 6800XT', 380, 450, 'AMD RX 6800XT 16GO pour le gaming en 1440p et 4k', 1),
('RX 7900XTX', 750, 900, 'AMD RX 7900XTX 20GO pour le gaming jusqu''en 4k sans compromis sur la fréquence d''image', 1);
INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('RTX 3060Ti', 250, 330, 'NVIDIA RTX 3060Ti 8GO pour le gaming en 1080p avec une grande fluidité', 1),
('RTX 3080', 450, 580, 'NVIDIA RTX 3080 12GO pour le gaming en 1440p et 4k', 1),
('RTX 4090', 1400, 1600,'NVIDIA RTX 4090 24GO pour les taches professionnelles lourdes et le gaming en 4k sans compromis sur la fréquence d''image', 1);
INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('ARC 770', 250, 330, 'INTEL ARC 770 16GO pour le gaming en 1080/1440p et streaming avec le décodeur AV1', 1);
INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('RYZEN 7600X', 200, 250, 'AMD RYZEN 7600X Processeur 6 coeurs, 4.70 GHz, 32 Mo, AMD Zen 4, TDP 105 Watts, socket AM5, version boîte sans ventilateur', 2),
('RYZEN 7950X', 400, 550,'Processeur 16 coeurs, 4.50 GHz, 64 Mo, AMD Zen 4, TDP 170 Watts, socket AM5, version boîte sans ventilateur', 2),
('RYZEN 5800X3D', 200, 250,'8 coeurs, 16 threads, 3.40 GHz, 96 Mo, AMD Zen 3, 105 Watts', 2),
('I5 13600k', 250, 330,'14 coeurs, 20 threads, 3.50 GHz, 24 Mo, Raptor Lake, TDP 125 Watts, socket 1700, version boîte sans ventilateur', 2),
('I5 14900k', 600, 750,'Processeur 24 coeurs, 3.20 GHz, 36 Mo, Intel Raptor Lake Refresh, TDP 125 Watts, socket 1700, version boîte sans ventilateur', 2);

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('Artic liquid freezer II', 80, 100,'Kit Watercooling AIO 2x120mm', 3),
('Noctua NH-D15 chromax', 80, 100,'Ventirad double tour aluminium et cuivre pour socket Intel 1150, 1151, 1155, 1156, 1366, 2011, 2011-V3, 2066, AMD AM2, AM3, AM3+, AM4, FM1, FM2, FM2+', 3),
('Thermalright Assassin X 120', 10, 15,'Ventirad Thermalright Assassin X 120mm pour socket AMD AM4 AM5/Intel LGA 1150/1151/1200/1700 ', 3);

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('Asus TUF B660-Plus Wifi', 80, 150,'Intel B660 - Socket LGA1700 - ATX - Wi-Fi 6ax - Alder Lake S - DDR5', 4),
('MSI MAG B650 Tomahawk WiFi', 80, 150,'AMD B650 - Socket AM5 - ATX - Raphael - Wi-Fi 6E - Compatible processeurs AMD Ryzen 7000 - DDR5', 4),
('Gigabyte B550 Aorus Elite V2', 90, 130, 'Socket AM4, AMD B550, 1 port PCI-Express 16x, 3200 MHz (DDR4), 2 port M.2, 4 ports USB 3.2 Gen 1, ATX');

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('Corsair Vengeance LPX Kit 32 Go DDR4-3200 CL16', 45, 60,'a', 5),
('G.Skill Ripjaws S5 32 Go Kit DDR5-6000 CL30', 80, 120,'a', 5);

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES ('Samsung 980 Pro M.2 2 To', 80, 100,'a', 6);

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('MSI MAG GL A750GL 750W', 70, 90,'a', 7),
('Seasonic Focus GX-1000W ATX 3.0', 100, 130,'a', 7);

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('Phanteks Eclipse G360A Black', 50, 80,'a', 8),
('Lian Li O11 Dynamic EVO White', 90, 120,'a', 8);

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES ('Corsair Premium Individually Sleeved PSU Cables Pro Kit Type 4 Gen 4 - White/Black', 50, 80,'a', 9);

INSERT INTO produit (libelle_prod, prix_achat_fourn, prix_vente_ht, description, id_cat) VALUES 
('Arctic P12 PWM PST black Value Pack 120mm', 15, 25,'a', 10),
('Corsair iCUE Link QX120 RGB 120mm', 90, 120,'abc', 10);