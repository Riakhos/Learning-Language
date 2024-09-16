<?php
// Include le code s'exécute si le fichier n'est pas nécessaire alors qu'avec un require le code se stoppe
require_once 'fonctions.php';
require 'separateur.php';

// Include_once et require_once si le fichier figure dans plusieurs fichiers
require_once 'fonctions_creneaux.php';

require 'separateur.php';
var_dump(repondre_oui_non('Test'));
require 'separateur.php';
?>