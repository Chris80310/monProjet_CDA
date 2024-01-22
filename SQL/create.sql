CREATE DATABASE monProjet_CDA;
USE monProjet_CDA;

CREATE TABLE fabricant(
   id INT AUTO_INCREMENT,
   logo VARCHAR(50) ,
   nom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE cat(
   id INT AUTO_INCREMENT,
   img VARCHAR(50),
   libelle VARCHAR(50) ,
   PRIMARY KEY(id)
);

CREATE TABLE scat(
   id INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   img VARCHAR(50),
   cat_id INT,
   PRIMARY KEY(id),
   FOREIGN KEY(cat_id) REFERENCES cat(id)
);

CREATE TABLE produit(
   id INT AUTO_INCREMENT,
   img VARCHAR(50),
   libelle VARCHAR(100) NOT NULL,
   prix_achat_fourn DECIMAL(10,2) NOT NULL,
   prix_vente_ht DECIMAL(10,2) NOT NULL,
   description VARCHAR(200),
   fab_id INT,
   scat_id INT,
   PRIMARY KEY(id),
   FOREIGN KEY(fab_id) REFERENCES fabricant(id),
   FOREIGN KEY(scat_id) REFERENCES scat(id)
);

CREATE TABLE commande(
   id INT AUTO_INCREMENT,
   date DATE NOT NULL,
   total DECIMAL(7,2) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE utilisateurs(
   id INT AUTO_INCREMENT,
   nom_entr VARCHAR(100) ,
   prenom VARCHAR(100) NOT NULL,
   nom VARCHAR(100) NOT NULL,
   email VARCHAR(100),
   tel VARCHAR(100),
   coef DECIMAL(2,2) NOT NULL,
   role VARCHAR(1) NOT NULL,
   mdp VARCHAR(50) NOT NULL,
   com_assignee BOOLEAN,
   responsable_id INT,
   com_id INT,
   PRIMARY KEY(id),
   FOREIGN KEY(responsable_id) REFERENCES utilisateurs(id),
   FOREIGN KEY(com_id) REFERENCES commande(id)
);

CREATE TABLE adresse(
   id INT AUTO_INCREMENT,
   adr VARCHAR(255),
   adr_livr VARCHAR(255) NOT NULL,
   adr_fact VARCHAR(255) NOT NULL,
   util_id INT,
   PRIMARY KEY(id),
   FOREIGN KEY(util_id) REFERENCES utilisateurs(id)
);

CREATE TABLE bon_livr(
   id INT AUTO_INCREMENT,
   date_livr DATE NOT NULL,
   com_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(com_id) REFERENCES commande(id)
);

CREATE TABLE facture(
   id INT AUTO_INCREMENT,
   mode_paie VARCHAR(1) NOT NULL,
   prix_ht DECIMAL(6,2) NOT NULL,
   date_emi DATE NOT NULL,
   taux_tva DECIMAL(2,2) NOT NULL,
   prix_tot DECIMAL(6,2) NOT NULL,
   com_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(com_id) REFERENCES commande(id)
);

CREATE TABLE details_bl(
   prod_id INT,
   bl_id INT,
   qte DECIMAL(5,0) NOT NULL,
   PRIMARY KEY(prod_id, bl_id),
   FOREIGN KEY(prod_id) REFERENCES produit(id),
   FOREIGN KEY(bl_id) REFERENCES bon_livr(id)
);

CREATE TABLE details_com(
   prod_id INT,
   com_id INT,
   qte DECIMAL(5,0) NOT NULL,
   prix DECIMAL(6,2) NOT NULL,
   PRIMARY KEY(prod_id, com_id),
   FOREIGN KEY(prod_id) REFERENCES produit(id),
   FOREIGN KEY(com_id) REFERENCES commande(id)
);