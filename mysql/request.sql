-- SELECT --

--------------------------------------------------------
-- Les chaînes de caractères s'écrivent toujours entre quotes (simples '' ou doubles "")
--------------------------------------------------------

-- La requête SELECT permet de récupérer un jeu de résultats
-- Les requêtes SELECT commencent toujours par SELECT
-- Après SELECT on définit ce qu'on veut récupérer
-- Dans toutes les requêtes, on doit définir dans quelle table avec le terme FROM

-- Afficher les prénoms des employés
SELECT prenom FROM employes;

-- Afficher les prénoms et les salaires des employés
SELECT prenom, salaire FROM employes;
-- Affiche dans l'ordre des paramètres

-- DESC empmloyes (liste de la table)

-- Afficher toutes les infos des employés
SELECT id_employes, prenom, nom, sexe, service, date_embauche FROM employes;
SELECT * FROM employes;

--------------------------------------------------------
-- WHERE (précision dans la sélection => lorsque que) --
--------------------------------------------------------

-- Afficher le prénom et le nom de tous les employés
SELECT prenom, nom FROM employes;
-- Afficher le prénom et le nom des employés (les femmes seulement)
SELECT prenom, nom FROM employes WHERE sexe = 'f';

-- Comment s'appelle l'employé numéro 802
SELECT prenom, nom FROM employes WHERE id_employes = 802;

--------------------------------------------------------
-- DISTINCT => évite les doublons --
--------------------------------------------------------

-- Afficher le nom des services
SELECT service from employes;
-- Afficher le nom des services qu'une seule fois (on évite les doublons)
SELECT DISTINCT service from employes;

--------------------------------------------------------
-- BETWEEN ** AND ** --
--------------------------------------------------------

--Afficher toutes les infos des employés ayant un salaire entre 1800 et 2300
SELECT * FROM employes WHERE salaire BETWEEN 1800 and 2300;

--------------------------------------------------------
-- LIKE  => barre de recherche --
-- NOT LIKE => on sélectionne tous ceux qui n'ont pas la sélection
--------------------------------------------------------

-- Afficher les prénoms commençant par la lettre A
SELECT prenom FROM employes WHERE prenom LIKE 'a%';

-- Afficher les prénoms finissant par la lettre A
SELECT prenom FROM employes WHERE prenom LIKE '%a';

-- Afficher les prénoms contenant la lettre A
SELECT prenom FROM employes WHERE prenom LIKE '%a%';

-- Afficher les prénoms commençant par FA et finnissant par CE
SELECT prenom FROM employes WHERE prenom LIKE 'fa%ce';

-- Afficher les prénoms comportant le F_B (underscore remplacé par n'importe quel caractère)
SELECT prenom FROM employes WHERE prenom LIKE 'f_b';

--------------------------------------------------------
-- Les opérateurs --
--------------------------------------------------------

--   =         Affectation, égal à
--   !=        Différent de
--   <>        Différent de

--   IN()      Affectation, égal à (1 ou plusieurs valeurs)
--   NOT IN()  Différent de (1 ou plusieurs valeurs)

--   >         Strictement supérieur à
--   >=        Supérieur ou égal à
--   <         Strictement inférieur à
--   <=        Inférieur ou égal à

--   AND       Et
--   OR        Ou

--------------------------------------------------------

-- Afficher les commerciaux gagnant un salaire inférieur ou égal à 2000 euros
SELECT * FROM employes WHERE service = 'commercial' AND salaire <= 2000;

-- Afficher les employes qui sont soient commerciaux ou gagnant un salaire inférieur ou égal à 2000 euros
SELECT * FROM employes WHERE service = 'commercial' OR salaire <= 2000;

-- Afficher les commerciaux
SELECT * FROM employes WHERE service = 'commercial';

-- Afficher les employés qui ne sont pas des commerciaux
SELECT * FROM employes WHERE service != 'commercial';
SELECT * FROM employes WHERE service <> 'commercial';

-- Afficher les commerciaux et les informaticiens
SELECT * FROM employes WHERE service IN('commercial','informatique');

-- Afficher les employés qui ne sont pas des commerciaux ni des informaticiens
SELECT * FROM employes WHERE service NOT IN('commercial','informatique');

--------------------------------------------------------
-- ORDONNANCE => Order BY ** nom du champ ** sens ('ASC'-endant et 'DESC'-endant) ** --
--------------------------------------------------------

-- afficher les prénoms des employés par ordre alphabétique ascendant
SELECT prenom FROM  employes ORDER BY prenom ASC;
SELECT prenom FROM  employes ORDER BY prenom;

-- Si on utilise ORDER BY c'est que l'on souhaite trier dans un sens ou dans l'autre, par défaut si on ne définit pas le sens, la valeur est ASC

-- afficher les prénoms des employés par ordre alphabétique descendant
SELECT prenom FROM  employes ORDER BY prenom DESC;

-- Afficher les noms des employés par odre alphabétique descendant
SELECT nom FROM employes ORDER BY nom DESC;

-- Afficher les employés par ordre alphabétique des services
SELECT * FROM employes ORDER BY service;

-- Afficher les employés par ordre alphabétique des services, puis des noms
SELECT * FROM employes ORDER BY service, nom;

--------------------------------------------------------
-- LIMTATION => LIMIT ** position, quantité (integers) ** --
--------------------------------------------------------

--    ('fraise', 'pomme', 'kiwi', 'banane')
--        0         1        2        3
--       Dans un tableau la 1ère position est 0

-- Afficher l'employé qui gagne le moins
SELECT * FROM employes ORDER BY salaire LIMIT 0,1;
SELECT * FROM employes ORDER BY salaire LIMIT 1;
-- Si on ne met pas de position, la valeur par défaut est 0

-- Afficher les 5 employés qui gagne le plus
SELECT * FROM employes ORDER BY salaire DESC LIMIT 5;

-- Afficher les 2 commerciaux qui gagnent le moins
SELECT * FROM employes WHERE service = 'commercial' ORDER BY salaire LIMIT 2;

--------------------------------------------------------
-- REGROUPEMENT => GROUP BY --
--------------------------------------------------------

-- Afficher le nombre d'employés par service
SELECT service, COUNT(*) AS 'Nombre par service' FROM employes GROUP BY service;
-- +---------------+--------------------+
-- | service       | Nombre par service |
-- +---------------+--------------------+
-- | assistant     |                  1 |
-- | commercial    |                  6 |
-- | communication |                  1 |
-- | comptabilite  |                  1 |
-- | direction     |                  2 |
-- | informatique  |                  3 |
-- | juridique     |                  1 |
-- | production    |                  2 |
-- | secretariat   |                  3 |
-- +---------------+--------------------+

--------------------------------------------------------
-- TP --
--------------------------------------------------------

-- 1 -- Afficher la profession de l'employé 547
SELECT service FROM employes WHERE id_employes = 547;
-- +------------+
-- | service    |
-- +------------+
-- | commercial |
-- +------------+

-- 2 -- Afficher la date d'embauche de Amandine
SELECT date_embauche FROM employes WHERE prenom = "amandine";

-- +---------------+
-- | date_embauche |
-- +---------------+
-- | 2014-01-23    |
-- +---------------+


-- 3 -- Afficher le nom de famille de Guillaume
SELECT nom FROM employes WHERE prenom = "guillaume";

-- +--------+
-- | nom    |
-- +--------+
-- | Miller |
-- +--------+


-- 7 -- Afficher les 5 premiers employés aprés avoir classer leur nom de famille par ordre alphabétique
SELECT * FROM employes ORDER BY nom LIMIT 5;

SELECT * FROM employes ORDER BY nom ASC LIMIT 0,5;
-- +-------------+---------+----------+------+--------------+---------------+---------+
-- | id_employes | prenom  | nom      | sexe | service      | date_embauche | salaire |
-- +-------------+---------+----------+------+--------------+---------------+---------+
-- |         592 | Laura   | Blanchet | f    | direction    | 2012-05-09    |    4500 |
-- |         854 | Daniel  | Chevel   | m    | informatique | 2015-09-28    |    3100 |
-- |         547 | Melanie | Collier  | f    | commercial   | 2012-01-08    |    3100 |
-- |         699 | Julien  | Cottet   | m    | secretariat  | 2013-01-05    |    1390 |
-- |         739 | Thierry | Desprez  | m    | secretariat  | 2013-07-17    |    1500 |
-- +-------------+---------+----------+------+--------------+---------------+---------+


-- 13 -- Afficher tous les employés (sauf ceux du service production et secrétariat)
SELECT * FROM employes WHERE service NOT IN('production', 'secretariat');

-- +-------------+-------------+----------+------+---------------+---------------+---------+
-- | id_employes | prenom      | nom      | sexe | service       | date_embauche | salaire |
-- +-------------+-------------+----------+------+---------------+---------------+---------+
-- |         350 | Jean-pierre | Laborde  | m    | direction     | 2010-12-09    |    5000 |
-- |         388 | Clement     | Gallet   | m    | commercial    | 2010-12-15    |    2300 |
-- |         415 | Thomas      | Winter   | m    | commercial    | 2011-05-03    |    3550 |
-- |         509 | Fabrice     | Grand    | m    | comptabilite  | 2011-12-30    |    2900 |
-- |         547 | Melanie     | Collier  | f    | commercial    | 2012-01-08    |    3100 |
-- |         592 | Laura       | Blanchet | f    | direction     | 2012-05-09    |    4500 |
-- |         627 | Guillaume   | Miller   | m    | commercial    | 2012-07-02    |    1900 |
-- |         655 | Celine      | Perrin   | f    | commercial    | 2012-09-10    |    2700 |
-- |         701 | Mathieu     | Vignal   | m    | informatique  | 2013-04-03    |    2500 |
-- |         780 | Amandine    | Thoyer   | f    | communication | 2014-01-23    |    2100 |
-- |         802 | Damien      | Durand   | m    | informatique  | 2014-07-05    |    2250 |
-- |         854 | Daniel      | Chevel   | m    | informatique  | 2015-09-28    |    3100 |
-- |         876 | Nathalie    | Martin   | f    | juridique     | 2016-01-12    |    3550 |
-- |         933 | Emilie      | Sennard  | f    | commercial    | 2017-01-11    |    1800 |
-- |         990 | Stephanie   | Lafaye   | f    | assistant     | 2017-03-01    |    1775 |
-- +-------------+-------------+----------+------+---------------+---------------+---------+

-- 15 -- Afficher les commerciaux ayant été recruté avant 2012 de sexe masculin et gagnant un salaire supérieur à 2500€
-- service 
-- date_embauche
-- sexe 
-- salaire 

SELECT * FROM employes WHERE service = 'commercial' AND date_embauche < '2012-01-01' AND sexe = "m" AND salaire > 2500;
SELECT * FROM employes WHERE service = 'commercial' AND date_embauche < 20120101 AND sexe = "m" AND salaire > 2500;
-- +-------------+--------+--------+------+------------+---------------+---------+
-- | id_employes | prenom | nom    | sexe | service    | date_embauche | salaire |
-- +-------------+--------+--------+------+------------+---------------+---------+
-- |         415 | Thomas | Winter | m    | commercial | 2011-05-03    |    3550 |
-- +-------------+--------+--------+------+------------+---------------+---------+



-- 16 -- Qui a été embauché en dernier ?
SELECT * FROM employes ORDER BY date_embauche DESC LIMIT 1;

-- +-------------+-----------+--------+------+-----------+---------------+---------+
-- | id_employes | prenom    | nom    | sexe | service   | date_embauche | salaire |
-- +-------------+-----------+--------+------+-----------+---------------+---------+
-- |         990 | Stephanie | Lafaye | f    | assistant | 2017-03-01    |    1775 |
-- +-------------+-----------+--------+------+-----------+---------------+---------+



-- 17 -- Afficher les informations sur l'employé du service commercial gagnant le salaire le plus élevé
 SELECT * FROM employes WHERE service = 'commercial' ORDER BY salaire DESC LIMIT 1;
-- +-------------+--------+--------+------+------------+---------------+---------+
-- | id_employes | prenom | nom    | sexe | service    | date_embauche | salaire |
-- +-------------+--------+--------+------+------------+---------------+---------+
-- |         415 | Thomas | Winter | m    | commercial | 2011-05-03    |    3550 |
-- +-------------+--------+--------+------+------------+---------------+---------+



-- 18 -- Afficher le prénom du comptable gagnant le meilleur salaire
SELECT prenom FROM employes WHERE service = 'comptabilite' ORDER BY salaire DESC LIMIT 1;

-- +---------+
-- | prenom  |
-- +---------+
-- | Fabrice |
-- +---------+


-- 19 -- Afficher le prénom de l'informaticien ayant été recruté en premier 
SELECT prenom FROM employes WHERE service = 'informatique' ORDER BY date_embauche LIMIT 1;
-- +---------+
-- | prenom  |
-- +---------+
-- | Mathieu |
-- +---------+

--------------------------------------------------------
-- Compréhension des fonctions --
--------------------------------------------------------

-- Création de la fonction
-- function multiplication(number1, number2){
--    number1 * number2;
-- }

-- Appel de la fonction
-- multiplication(3,7) ==> 21
--------------------------------------------------------

-- Afficher le prénom et le salaire annuel des employés
SELECT prenom, salaire*12 AS 'Salaire Annuel' FROM employes;
-- Il est possible de faire subir des opérations mathématiques à des champs, mais biensûr s'il s'agit de type nombre
-- On peut renommer les champs si besoin avec un alias qui s'écrit 'AS'

-- En SQL , il existe des fonctions prédéfinies,

-- Afficher la masse salariale de l'entreprise
-- SUM() permet d'additionner
SELECT SUM(salaire*12) AS 'Masse Salariale' FROM employes;
-- +-----------------+
-- | Masse Salariale |
-- +-----------------+
-- |          623580 |
-- +-----------------+

-- Afficher le salaire moyen des employés
AVG() permet de calculer une moyenne
SELECT AVG(salaire) AS 'Salaire Moyen' FROM employes;
-- +---------------+
-- | Salaire Moyen |
-- +---------------+
-- |     2598.2500 |
-- +---------------+

-- ROUND() permet d'arrondir
-- Il a 2 arguments
-- 1er argument : le nombre à arrondir
-- 2ème argument : le nombre décimal (integer)
SELECT ROUND(AVG(salaire),2) AS 'Salaire Moyen' FROM employes;
-- +---------------+
-- | Salaire Moyen |
-- +---------------+
-- |       2598.25 |
-- +---------------+

-- Afficher le nombre de femmes dans l'entreprise
-- COUNT() permet de compter le nombre dans la sélection
SELECT COUNT(*) AS 'Nombre de femmes' FROM employes WHERE sexe = 'f';
SELECT COUNT(prenom) AS 'Nombre de femmes' FROM employes WHERE sexe = 'f';
-- +------------------+
-- | Nombre de femmes |
-- +------------------+
-- |                9 |
-- +------------------+

-- MIN() permet de retourner la plus petite valeur du champs
-- Afficher le plus bas salaire
SELECT MIN(salaire) FROM employes;
-- +--------------+
-- | MIN(salaire) |
-- +--------------+
-- |         1390 |
-- +--------------+

-- MAX() permet de retourner la plus haute valeur du champs
-- Afficher le plus haut salaire
SELECT MAX(salaire) FROM employes;
-- +--------------+
-- | MIN(salaire) |
-- +--------------+
-- |         1390 |
-- +--------------+

-- Afficher les informations de l'employés qui gagne le plus
SELECT * FROM employes WHERE salaire = 5000;
SELECT * FROM employes WHERE salaire =  (SELECT MAX(salaire) FROM employes);
-- +-------------+-------------+---------+------+-----------+---------------+---------+
-- | id_employes | prenom      | nom     | sexe | service   | date_embauche | salaire |
-- +-------------+-------------+---------+------+-----------+---------------+---------+
-- |         350 | Jean-pierre | Laborde | m    | direction | 2010-12-09    |    5000 |
-- +-------------+-------------+---------+------+-----------+---------------+---------+

--------------------------------------------------------
-- REQUEST INSERT INTO (Ajouter) --
--------------------------------------------------------

-- INSERT INTO ** nom de la table ** (tableau des champs) ** VALUES ** (tableau des valeurs) **
INSERT INTO employes (prenom, sexe, salaire, date_embauche, nom, service) VALUES ('Bart', 'm', 6000, CURDATE(), 'Lord', 'informatique');

-- La fonction CURDATE() permet de retournere la date du jour (Syntaxe : YYYY/MM/DD) --

-- Il y a autant de champs que de valeurs (dans les tableaux)
-- Les positions dans les tableaux doivent matcher (l'ordre des valeurs doit correspondrre à l'ordre des champs)
-- Les champs ne s'écrivent pas entre les quotes (seuls les valeurs de type string)
-- Si un champ n'a pas de valeur, il faut le définir NULL

--------------------------------------------------------
-- REQUEST UPDATE --
--------------------------------------------------------

-- UPDATE ** table ** SET ** champ =valeur **
UPDATE employes SET salaire = 100, prenom = 'Bart';
-- Modifier avec précision
UPDATE employes SET salaire = 10000, prenom = 'Hugo' WHERE id_employes = 991;
-- Attention!!! Pensez à préciser sinon toutes les lignes subissent le changement

--------------------------------------------------------
-- REQUEST DELETE --
--------------------------------------------------------

-- REQUEST DELETE
DELETE FROM employes; -- SUPPRIMER TOUTES LES DONNEES DE LA TABLE!!! --
-- Supprimer avec précision
DELETE FROM employes WHERE service = 'commercial';
DELETE FROM employes WHERE id_employes = 990;

--------------------------------------------------------
-- TP --
--------------------------------------------------------

-- 4 -- Afficher le nombre de personnes ayant un id_employe commençant par le chiffre 5
SELECT COUNT(*) FROM employes WHERE id_employes LIKE '5%';
-- +----------+
-- | COUNT(*) |
-- +----------+
-- |        3 |
-- +----------+

-- 5 -- Afficher le nombre de commerciaux
SELECT COUNT(*) FROM employes WHERE service = 'commercial';
-- +----------+
-- | COUNT(*) |
-- +----------+
-- |        6 |
-- +----------+

-- 6 -- Afficher le salaire moyen des informaticiens
SELECT ROUND(AVG(salaire),2) AS 'Salaire Moyen' FROM employes WHERE service = 'informatique';
-- +---------------+
-- | Salaire Moyen |
-- +---------------+
-- |          4270 |
-- +---------------+

-- 8 -- Afficher le coût de tous les employés du service commercial sur une année 
SELECT SUM(salaire*12) AS 'Salaire Annuel des Commerciaux' FROM employes WHERE service = 'commercial';
-- +--------------------------------+
-- | Salaire Annuel des Commerciaux |
-- +--------------------------------+
-- |                         184200 |
-- +--------------------------------+

-- 9 -- Afficher le salaire moyen par service
SELECT service, ROUND(AVG(salaire),2) FROM employes GROUP BY service;
-- +---------------+-----------------------+
-- | service       | ROUND(AVG(salaire),2) |
-- +---------------+-----------------------+
-- | assistant     |               1775.00 |
-- | commercial    |               2558.33 |
-- | communication |               2100.00 |
-- | comptabilite  |               2900.00 |
-- | direction     |               4750.00 |
-- | informatique  |               4270.00 |
-- | juridique     |               3550.00 |
-- | production    |               2225.00 |
-- | secretariat   |               1496.67 |
-- +---------------+-----------------------+

-- 10 -- Afficher le nombre de recrutement sur l'année 2010
SELECT COUNT(*) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';
SELECT COUNT(*) FROM employes WHERE date_embauche LIKE '2010%';
-- +----------+
-- | COUNT(*) |
-- +----------+
-- |        2 |
-- +----------+

-- 11 -- Afficher le salaire moyen appliqué lors des recrutements sur la période allant de 2011 à 2014 (inclus)
SELECT ROUND(AVG(salaire),2) FROM employes WHERE date_embauche BETWEEN '2011-01-01' AND '2014-12-31';
-- +-----------------------+
-- | ROUND(AVG(salaire),2) |
-- +-----------------------+
-- |               2453.08 |
-- +-----------------------+

-- 12 -- Afficher le nombre de service différent
SELECT COUNT(DISTINCT service) FROM employes;
-- +-------------------------+
-- | COUNT(DISTINCT service) |
-- +-------------------------+
-- |                       9 |
-- +-------------------------+

-- 14 -- Afficher conjoitement le nombre d'homme et de femme dans l'entreprise
SELECT sexe, COUNT(*) FROM employes GROUP BY sexe;
-- +------+----------+
-- | sexe | COUNT(*) |
-- +------+----------+
-- | m    |       13 |
-- | f    |        9 |
-- +------+----------+
SELECT SUM(sexe = 'm'), SUM(sexe = 'f') FROM employes;
-- +-----------------+-----------------+
-- | SUM(sexe = 'm') | SUM(sexe = 'f') |
-- +-----------------+-----------------+
-- |              13 |               9 |
-- +-----------------+-----------------+

-- 20 -- Augmenter chaque employé de 100€ 
UPDATE employes set salaire = salaire + 100;

-- 21 -- supprimer les employés du service secrétariat
DELETE FROM employes WHERE service = 'secretariat';
