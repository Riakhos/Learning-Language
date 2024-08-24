SQL (Structured Query Language)

Il existe 4 actions(= requêtes) en BDD
- AFFICHER (SELECT)
- AJOUTER (INSERT INTO)
- MODIFIER (UPDATE)
- SUPPRIMER (DELETE)

Dans le back office, on retrouve des CRUD
C => CREATE
R => READ
U => UPDATE
D => DELETE


https://sql.sh/

Installation d'un serveur 
-------------------------
XAMPP  (WINDOWS)
https://www.apachefriends.org/

WAMP   (WINDOWS)
https://wampserver.aviatechno.net/

MAMP   (MAC)
https://www.mamp.info/en/windows/


LAMP   (LINUX)

--------------------------------
Xampp est à la racine du disque dur C
Mamp est dans Applications

Un serveur s'allume

Dans le dossier htdocs, on place les projets PHP

Sur la pop up Control Panel, il faut allumer les modules Apache et Mysql
(sur Mamp il n'y a qu'un seul Start)

Pour accéder à l'interface PhpMyAdmin
- windows : il faut cliquer sur le bouton Admin du module MySql
- mamp : à côté du bouton start, il y a le bouton webStart qui ouvre un page sur le navigateur, dans la partie Sql, il y a un lien pour accéder à PhpMyAdmin





Une base de données (BDD/DB) est composée de tables


une table contient des champs / colonnes 

un champ a au minimum un nom, un type et s'il est null
les types :
	- VARCHAR    (limitation à 255 caractères) exemple : email, nom, prenom etc....
    - TEXT       exemple : description, un long texte
    - BOOLEAN    2 valeurs possibles : FALSE (0) et TRUE (1) Exemple : Activé Désactivé
    - INT (integer) nombre entier, exemple : stock
    - FLOAT/DOUBLE nombre décimal, exemple : prix
    - date (YYYY-mm-dd) exemple 1999-02-21
    - time (HH:ii:ss) 17:59:32
    - datetime (YYYY-mm-dd HH:ii:ss)
    - ENUM énumérer des valeurs, Exemple pour le sexe valeurs : 'homme' ou 'femme'
    

Chaque table doit avoir sa clé primaire (Primary Key : PK) 
on l'appelle généralement "id" de type INT
Il faut cocher la checkbox A_I (Auto_increment), automatiquement la clé primaire sera saisie


--------------------------
TERMINAL

XAMPP, accéder au Shell situé sur Control Panel
Vous êtes situés à la racine du dossier xampp
pour accéder à PhpMyAdmin saisir la ligne de commande suivante :
mysql -u root

MAMP, ouvrir le terminal 
/Applications/MAMP/Library/bin/mysql -u root -p


----------------------------------------------------------------
TP
Créer la BDD entreprise
Insérer le fichier contenant la table employes avec ses données








