DROP TABLE IF EXISTS T_athletes ;
CREATE TABLE T_athletes (Id_Athltete INT(25) AUTO_INCREMENT NOT NULL,
Nom_Athletes VARCHAR(25),
Prenom_Atheltes VARCHAR(25),
Adr_Athletes VARCHAR(25),
Birthday_Athletes DATETIME,
Id_Country **NOT FOUND**(25),
Id_Sport **NOT FOUND**(25),
PRIMARY KEY (Id_Athltete)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Site ;
CREATE TABLE T_Site (Id_Site INT(25) AUTO_INCREMENT NOT NULL,
Name_Site VARCHAR(25),
PRIMARY KEY (Id_Site)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Country ;
CREATE TABLE T_Country (Id_Country INT(25) AUTO_INCREMENT NOT NULL,
_Name_Country VARCHAR(25),
PRIMARY KEY (Id_Country)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Competition ;
CREATE TABLE T_Competition (Id_Competition INT(25) AUTO_INCREMENT NOT NULL,
Name_Competition VARCHAR(25),
PRIMARY KEY (Id_Competition)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Discipline ;
CREATE TABLE T_Discipline (Id_Discipline INT(25) AUTO_INCREMENT NOT NULL,
Name_Discipline VARCHAR(25),
PRIMARY KEY (Id_Discipline)) ENGINE=InnoDB;

DROP TABLE IF EXISTS T_Sport ;
CREATE TABLE T_Sport (Id_Sport INT(25) AUTO_INCREMENT NOT NULL,
Name_Sport VARCHAR(25),
Id_Discipline **NOT FOUND**(25),
PRIMARY KEY (Id_Sport)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Participe ;
CREATE TABLE Participe (Id_Competition **NOT FOUND**(25) AUTO_INCREMENT NOT NULL,
Id_Athltete **NOT FOUND**(25) NOT NULL,
PRIMARY KEY (Id_Competition,
 Id_Athltete)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Date ;
CREATE TABLE Date (Id_Competition **NOT FOUND**(25) AUTO_INCREMENT NOT NULL,
Id_Site **NOT FOUND**(25) NOT NULL,
Begin_Date DATE,
Finish_Date DATE,
PRIMARY KEY (Id_Competition,
 Id_Site)) ENGINE=InnoDB;

ALTER TABLE T_athletes ADD CONSTRAINT FK_T_athletes_Id_Country FOREIGN KEY (Id_Country) REFERENCES T_Country (Id_Country);

ALTER TABLE T_athletes ADD CONSTRAINT FK_T_athletes_Id_Sport FOREIGN KEY (Id_Sport) REFERENCES T_Sport (Id_Sport);
ALTER TABLE T_Sport ADD CONSTRAINT FK_T_Sport_Id_Discipline FOREIGN KEY (Id_Discipline) REFERENCES T_Discipline (Id_Discipline);
ALTER TABLE Participe ADD CONSTRAINT FK_Participe_Id_Competition FOREIGN KEY (Id_Competition) REFERENCES T_Competition (Id_Competition);
ALTER TABLE Participe ADD CONSTRAINT FK_Participe_Id_Athltete FOREIGN KEY (Id_Athltete) REFERENCES T_athletes (Id_Athltete);
ALTER TABLE Date ADD CONSTRAINT FK_Date_Id_Competition FOREIGN KEY (Id_Competition) REFERENCES T_Competition (Id_Competition);
ALTER TABLE Date ADD CONSTRAINT FK_Date_Id_Site FOREIGN KEY (Id_Site) REFERENCES T_Site (Id_Site);
