-- COURS MYSQL

-- Dans le terminal, nous sommes situés à la racine des bases de données
------------------------------------------------------------------------------
-- Les élements dans un tableau () sont séparés par une VIRGULE, autrement dit après le dernier élément d'un tableau, il n'y a pas de virgule 
-- toutes les lignes de commande se terminent obligatoirement par un POINT VIRGULE
------------------------------------------------------------------------------


SHOW DATABASES;
-- Afficher toutes les bases de données


CREATE DATABASE vitrine;
-- Créer une base de données 


USE vitrine;
-- Accéder à la BDD vitrine



CREATE TABLE user(
    email VARCHAR(255) NOT NULL, 
    nom VARCHAR(255) NOT NULL
);
-- Créer une table
--


DESC user;
-- Description (détails) de la table user



------------------------------
-- CHANGEMENT (ALTER)

ALTER TABLE user ADD prenom VARCHAR(255) NOT NULL;

ALTER TABLE user DROP email;

ALTER TABLE user CHANGE nom age INT NOT NULL;

ALTER TABLE user MODIFY prenom INT NOT NULL;



TRUNCATE user;
-- Vider


DROP TABLE user;
-- Supprimer la table user


DROP DATABASE vitrine;
-- Supprimer la bdd vitrine



-----------------------------------------------------------------------------------------------

-- REQUETES 
-- 4 requètes :
-- SELECT 
-- INSERT INTO
-- UPDATE
-- DELETE

-- LA REQUETE SELECT 

-- SELECT      ** nom(s) des champs qu'on souhaite récupérer **    FROM     ** nom de la table **

-- Afficher le prénom de tous les employés
SELECT prenom FROM employes;

SELECT prenom, nom FROM employes;

SELECT id_employes, prenom, nom, salaire, service, sexe, date_embauche FROM employes;
SELECT * FROM employes;






