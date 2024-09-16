<?php
/**
 * ----------------------------------------------------------------------- *
 * function repondre_oui_non() pour continuer à saisir
 * @param  mixed $phrase
 * @return mixed
 * ----------------------------------------------------------------------- *
 **/
function repondre_oui_non(string $phrase) : bool
{
    while (true)
    {
        $response = readline($phrase . "(o)ui/(n)on : ");
        if ($response === "o")
        // Si l'utilisateur tape "o" => true
        {
            return true;
        } elseif ($response === "n")
        // Si l'utilisateur tape "n" => false
        {
            return false;
        }
    }
}
require_once 'fonctions_creneaux.php';
?>