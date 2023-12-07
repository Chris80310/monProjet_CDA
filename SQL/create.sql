CREATE DATABASE hardware_shop;
USE hardware_shop;

CREATE TABLE commande (
   id_com INT AUTO_INCREMENT,
   date_com DATE NOT NULL,
   total_com DECIMAL(7,2) NOT NULL,
   PRIMARY KEY(id_com)
);

CREATE TABLE distributeurs(
   id_dis INT AUTO_INCREMENT,
   logo_dis VARCHAR(50) ,
   nom_dis VARCHAR(50) NOT NULL,
   adr_dis VARCHAR(100) NOT NULL,
   tel_dis VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_dis)
);


CREATE TABLE bon_livraison(
   id_bl INT AUTO_INCREMENT,
   date_livr DATE NOT NULL,
   id_com INT NOT NULL,
   PRIMARY KEY(id_bl),
   FOREIGN KEY(id_com) REFERENCES commande (id_com)
);

CREATE TABLE categorie(
   id_cat INT AUTO_INCREMENT,
   img_cat VARCHAR(50) ,
   libelle_cat VARCHAR(50) ,
   PRIMARY KEY(id_cat)
);

CREATE TABLE produit(
   id_prod INT AUTO_INCREMENT,
   img_prod VARCHAR(50),
   libelle_prod VARCHAR(50) NOT NULL,
   prix_achat_fourn DECIMAL(10,2) NOT NULL,
   prix_vente_ht DECIMAL(10,2) NOT NULL,
   description VARCHAR(200),
   id_cat INT,
   id_dis INT,
   PRIMARY KEY(id_prod),
   FOREIGN KEY(id_dis) REFERENCES distributeurs(id_dis),
   FOREIGN KEY(id_cat) REFERENCES categorie(id_cat)
);

CREATE TABLE utilisateurs(
   id_util INT AUTO_INCREMENT,
   nom_entr VARCHAR(50) ,
   cli_nom VARCHAR(50) NOT NULL,
   cli_prenom VARCHAR(50) NOT NULL,
   coef DECIMAL(2,2) NOT NULL,
   role VARCHAR(1) NOT NULL,
   cli_adr_livr VARCHAR(100) NOT NULL,
   cli_adr_livr_2 VARCHAR(100) NOT NULL,
   cli_adr_fact VARCHAR(100) NOT NULL,
   cli_adr_fact_2 VARCHAR(100) NOT NULL,
   util_mdp VARCHAR(50) NOT NULL,
   com_assignee BOOLEAN,
   id_util_1 INT,
   id_com INT,
   PRIMARY KEY(id_util),
   FOREIGN KEY(id_util_1) REFERENCES utilisateurs(id_util),
   FOREIGN KEY(id_com) REFERENCES commande(id_com)
);

CREATE TABLE facture(
   id_fact INT AUTO_INCREMENT,
   mode_paie VARCHAR(1) NOT NULL,
   prix_ht DECIMAL(6,2) NOT NULL,
   date_emi DATE NOT NULL,
   taux_tva DECIMAL(2,2) NOT NULL,
   prix_total DECIMAL(6,2) NOT NULL,
   id_com INT NOT NULL,
   PRIMARY KEY(id_fact),
   FOREIGN KEY(id_com) REFERENCES commande(id_com)
);

CREATE TABLE ss_cat(
   id_ss_cat INT AUTO_INCREMENT,
   id_cat INT NOT NULL,
   PRIMARY KEY(id_ss_cat),
   FOREIGN KEY(id_cat) REFERENCES categorie(id_cat)
);

CREATE TABLE details_bl(
   id_prod INT,
   id_bl INT,
   qte DECIMAL(5,0) NOT NULL,
   PRIMARY KEY(id_prod, id_bl),
   FOREIGN KEY(id_prod) REFERENCES produit(id_prod),
   FOREIGN KEY (id_bl) REFERENCES bon_livraison(id_bl)
);

CREATE TABLE details_commande(
   id_prod INT,
   id_com INT,
   qte DECIMAL(5,0) NOT NULL,
   prix DECIMAL(6,2) NOT NULL,
   PRIMARY KEY(id_prod, id_com),
   FOREIGN KEY(id_prod) REFERENCES produit(id_prod),
   FOREIGN KEY(id_com) REFERENCES commande(id_com)
);