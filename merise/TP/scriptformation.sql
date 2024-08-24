CREATE DATABASE IF NOT EXISTS db_formation
USE db_formation

DROP TABLE IF EXISTS T_ctrFormation ;
CREATE TABLE T_ctrFormation (Id_ctrFormation_T_ctrFormation INT(4) AUTO_INCREMENT NOT NULL,
Nom_ctrFormation_T_ctrFormation BIGINT(50),
Adr_ctrFormation_T_ctrFormation VARCHAR(255),
tel_ctrFormation_T_ctrFormation VARCHAR(14),
Email_ctrFormation_T_ctrFormation VARCHAR(255),
Id_Ville_T_Ville **NOT FOUND**(4),
PRIMARY KEY (Id_ctrFormation_T_ctrFormation)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_CodesPostaux ;
CREATE TABLE T_CodesPostaux (Id_CP_T_CodesPostaux INT(5) AUTO_INCREMENT NOT NULL,
CP_T_CodesPostaux INTEGER(5),
PRIMARY KEY (Id_CP_T_CodesPostaux)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Ville ;
CREATE TABLE T_Ville (Id_Ville_T_Ville INT(5) AUTO_INCREMENT NOT NULL,
Lib_Ville_T_Ville VARCHAR(70),
PRIMARY KEY (Id_Ville_T_Ville)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Titre ;
CREATE TABLE T_Titre (Id_Titre_T_Titre INT(5) AUTO_INCREMENT NOT NULL,
Lib_Titre_T_Titre VARCHAR(70),
Id_Niveau_T_Niveau **NOT FOUND**(5),
PRIMARY KEY (Id_Titre_T_Titre)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Niveau ;
CREATE TABLE T_Niveau (Id_Niveau_T_Niveau INT(5) AUTO_INCREMENT NOT NULL,
Lib_Niveau_T_Niveau VARCHAR(9),
PRIMARY KEY (Id_Niveau_T_Niveau)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Stagiaire ;
CREATE TABLE T_Stagiaire (Id_Stag_T_Stagiaire INT(6) AUTO_INCREMENT NOT NULL,
Nom_stag_T_Stagiaire VARCHAR(50),
Prenom_stag_T_Stagiaire VARCHAR(50),
Dt_naiss_stag_T_Stagiaire VARCHAR(10),
Adr_stag_T_Stagiaire VARCHAR(150),
Tel_stag_T_Stagiaire VARCHAR(14),
Email_stag_T_Stagiaire VARCHAR2(255),
Id_Ville_T_Ville **NOT FOUND**(6),
Id_Titre_T_Titre **NOT FOUND**(6),
PRIMARY KEY (Id_Stag_T_Stagiaire)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_OPCA ;
CREATE TABLE T_OPCA (Id_opca_T_OPCA INT(5) AUTO_INCREMENT NOT NULL,
Lib_opca_T_OPCA VARCHAR(70),
PRIMARY KEY (Id_opca_T_OPCA)) ENGINE=InnoDB;

DROP TABLE IF EXISTS proposer ;
CREATE TABLE proposer (Id_ctrFormation_T_ctrFormation **NOT FOUND**(4) AUTO_INCREMENT NOT NULL,
Id_Titre_T_Titre **NOT FOUND**(4) NOT NULL,
PRIMARY KEY (Id_ctrFormation_T_ctrFormation,
 Id_Titre_T_Titre)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Avoir ;
CREATE TABLE Avoir (Id_CP_T_CodesPostaux INTEGER(5) AUTO_INCREMENT NOT NULL,
Id_Ville_T_Ville **NOT FOUND**(5) NOT NULL,
PRIMARY KEY (Id_CP_T_CodesPostaux,
 Id_Ville_T_Ville)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Financer ;
CREATE TABLE Financer (Id_Stag_T_Stagiaire **NOT FOUND**(6) AUTO_INCREMENT NOT NULL,
Id_opca_T_OPCA **NOT FOUND**(6) NOT NULL,
PRIMARY KEY (Id_Stag_T_Stagiaire,
 Id_opca_T_OPCA)) ENGINE=InnoDB;

ALTER TABLE T_ctrFormation ADD CONSTRAINT FK_T_ctrFormation_Id_Ville_T_Ville FOREIGN KEY (Id_Ville_T_Ville) REFERENCES T_Ville (Id_Ville_T_Ville);

ALTER TABLE T_Titre ADD CONSTRAINT FK_T_Titre_Id_Niveau_T_Niveau FOREIGN KEY (Id_Niveau_T_Niveau) REFERENCES T_Niveau (Id_Niveau_T_Niveau);
ALTER TABLE T_Stagiaire ADD CONSTRAINT FK_T_Stagiaire_Id_Ville_T_Ville FOREIGN KEY (Id_Ville_T_Ville) REFERENCES T_Ville (Id_Ville_T_Ville);
ALTER TABLE T_Stagiaire ADD CONSTRAINT FK_T_Stagiaire_Id_Titre_T_Titre FOREIGN KEY (Id_Titre_T_Titre) REFERENCES T_Titre (Id_Titre_T_Titre);
ALTER TABLE proposer ADD CONSTRAINT FK_proposer_Id_ctrFormation_T_ctrFormation FOREIGN KEY (Id_ctrFormation_T_ctrFormation) REFERENCES T_ctrFormation (Id_ctrFormation_T_ctrFormation);
ALTER TABLE proposer ADD CONSTRAINT FK_proposer_Id_Titre_T_Titre FOREIGN KEY (Id_Titre_T_Titre) REFERENCES T_Titre (Id_Titre_T_Titre);
ALTER TABLE Avoir ADD CONSTRAINT FK_Avoir_Id_CP_T_CodesPostaux FOREIGN KEY (Id_CP_T_CodesPostaux) REFERENCES T_CodesPostaux (Id_CP_T_CodesPostaux);
ALTER TABLE Avoir ADD CONSTRAINT FK_Avoir_Id_Ville_T_Ville FOREIGN KEY (Id_Ville_T_Ville) REFERENCES T_Ville (Id_Ville_T_Ville);
ALTER TABLE Financer ADD CONSTRAINT FK_Financer_Id_Stag_T_Stagiaire FOREIGN KEY (Id_Stag_T_Stagiaire) REFERENCES T_Stagiaire (Id_Stag_T_Stagiaire);
ALTER TABLE Financer ADD CONSTRAINT FK_Financer_Id_opca_T_OPCA FOREIGN KEY (Id_opca_T_OPCA) REFERENCES T_OPCA (Id_opca_T_OPCA);
