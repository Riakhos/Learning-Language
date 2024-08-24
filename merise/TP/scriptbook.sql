DROP TABLE IF EXISTS T_Auteur ;
CREATE TABLE T_Auteur (Id_Auteur_T_Auteur INT(25) AUTO_INCREMENT NOT NULL,
Prenom_Auteur_T_Auteur VARCHAR(25),
Nom_Auteur_T_Auteur VARCHAR(25),
Birthday_Auteur_T_Auteur DATE,
Id_City_T_City **NOT FOUND**(25),
PRIMARY KEY (Id_Auteur_T_Auteur)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Livre ;
CREATE TABLE T_Livre (Id_Livre_T_Livre INT(25) AUTO_INCREMENT NOT NULL,
Title_Livre_T_Livre VARCHAR(25),
Genre_Livre_T_Livre VARCHAR(25),
Descriptif_Livre_T_Livre VARCHAR(255),
Id_Auteur_T_Auteur **NOT FOUND**(25),
Id_Edition_T_Edition **NOT FOUND**(25),
Id_Genre_Genre **NOT FOUND**(25),
PRIMARY KEY (Id_Livre_T_Livre)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Edition ;
CREATE TABLE T_Edition (Id_Edition_T_Edition INT(25) AUTO_INCREMENT NOT NULL,
Name_Edition_T_Edition VARCHAR(25),
Adr_Edition_T_Edition VARCHAR(25),
Tel_Edition_T_Edition INTEGER(14),
PRIMARY KEY (Id_Edition_T_Edition)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Magasin ;
CREATE TABLE T_Magasin (Id_Magasin_T_Magasin INT(25) AUTO_INCREMENT NOT NULL,
Name_Magasin_T_Magasin VARCHAR(25),
Adr_Magasin_T_Magasin VARCHAR(25),
Tel_Magasin_T_Magasin INTEGER(14),
Id_City_T_City **NOT FOUND**(25),
PRIMARY KEY (Id_Magasin_T_Magasin)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_City ;
CREATE TABLE T_City (Id_City_T_City INT(25) AUTO_INCREMENT NOT NULL,
Name_City_T_City VARCHAR(25),
PRIMARY KEY (Id_City_T_City)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_CP ;
CREATE TABLE T_CP (CP_T_CP INT(25) AUTO_INCREMENT NOT NULL,
PRIMARY KEY (CP_T_CP)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Genre ;
CREATE TABLE Genre (Id_Genre_Genre INT(25) AUTO_INCREMENT NOT NULL,
Name_Genre_Genre VARCHAR(25),
PRIMARY KEY (Id_Genre_Genre)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Code_Postal ;
CREATE TABLE Code_Postal (Id_City_T_City **NOT FOUND**(25) AUTO_INCREMENT NOT NULL,
CP_T_CP **NOT FOUND**(25) NOT NULL,
PRIMARY KEY (Id_City_T_City,
 CP_T_CP)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Vendre ;
CREATE TABLE Vendre (Id_Magasin_T_Magasin **NOT FOUND**(25) AUTO_INCREMENT NOT NULL,
Id_Livre_T_Livre **NOT FOUND**(25) NOT NULL,
Sell_Price_Vendre FLOAT(3),
PRIMARY KEY (Id_Magasin_T_Magasin,
 Id_Livre_T_Livre)) ENGINE=InnoDB;

ALTER TABLE T_Auteur ADD CONSTRAINT FK_T_Auteur_Id_City_T_City FOREIGN KEY (Id_City_T_City) REFERENCES T_City (Id_City_T_City);

ALTER TABLE T_Livre ADD CONSTRAINT FK_T_Livre_Id_Auteur_T_Auteur FOREIGN KEY (Id_Auteur_T_Auteur) REFERENCES T_Auteur (Id_Auteur_T_Auteur);
ALTER TABLE T_Livre ADD CONSTRAINT FK_T_Livre_Id_Edition_T_Edition FOREIGN KEY (Id_Edition_T_Edition) REFERENCES T_Edition (Id_Edition_T_Edition);
ALTER TABLE T_Livre ADD CONSTRAINT FK_T_Livre_Id_Genre_Genre FOREIGN KEY (Id_Genre_Genre) REFERENCES Genre (Id_Genre_Genre);
ALTER TABLE T_Magasin ADD CONSTRAINT FK_T_Magasin_Id_City_T_City FOREIGN KEY (Id_City_T_City) REFERENCES T_City (Id_City_T_City);
ALTER TABLE Code_Postal ADD CONSTRAINT FK_Code_Postal_Id_City_T_City FOREIGN KEY (Id_City_T_City) REFERENCES T_City (Id_City_T_City);
ALTER TABLE Code_Postal ADD CONSTRAINT FK_Code_Postal_CP_T_CP FOREIGN KEY (CP_T_CP) REFERENCES T_CP (CP_T_CP);
ALTER TABLE Vendre ADD CONSTRAINT FK_Vendre_Id_Magasin_T_Magasin FOREIGN KEY (Id_Magasin_T_Magasin) REFERENCES T_Magasin (Id_Magasin_T_Magasin);
ALTER TABLE Vendre ADD CONSTRAINT FK_Vendre_Id_Livre_T_Livre FOREIGN KEY (Id_Livre_T_Livre) REFERENCES T_Livre (Id_Livre_T_Livre);
