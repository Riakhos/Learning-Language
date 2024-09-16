<?php
/**
 * L'autoload est un mécanisme qui détecte l'instanciation d'objet et intègre la class de l'objet.
 * La fonction prédéfinie php spl_autoload_register() permet d’exécuter une fonction (argument de la fonction spl_autoload_register())
 * Lorsque l'interpréteur va voir passer le terme.
 * 
 **/
function inclusionAutomatique($nomClass)
{
    require_once($nomClass .'.php');
    echo "<p> La class $nomClass a été intégrée.</p>";
}

spl_autoload_register('inclusionAutomatique');