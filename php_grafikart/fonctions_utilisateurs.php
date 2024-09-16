<?php
/**
 * ----------------------------------------------------------------------- *
 * Function bonjour() qui dit Bonjour est affiché le nom s'il n'est pas null *
 * propriété nom (peut être null)
 * @param  mixed $nom
 * @return string
 * ----------------------------------------------------------------------- *
 **/
function bonjour($nom = null) : string
{
    if($nom === null)
    {
        return "Bonjour\n";
    }
    return "Bonjour $nom \n";
}
$salutation = bonjour('Jean');
$salutation = bonjour('Marion');
echo bonjour();
echo bonjour('Jean');

//Création d'une variable
$nom ="Doe";
/**
 * ----------------------------------------------------------------------- *
 * Function bonjour1() qui dit Bonjour est affiché le nom s'il n'est pas null *
 * propriété prenom (peut être null)
 * propriété nom (peut être null)
 * @param  mixed $prenom
 * @param  mixed $nom
 * @return string
 * ----------------------------------------------------------------------- *
 **/
function bonjour1($prenom = null, $nom = null) : string
{
    if($prenom === null) 
    {
        return "Bonjour\n";
    }
    return "Bonjour $prenom $nom \n";
}    
echo bonjour1('Jean',$nom);

$nom ="Doe";

/**
 * ----------------------------------------------------------------------- *
 * Function bonjour2() qui dit Bonjour est affiché le nom s'il n'est pas null *
 * propriété prenom (peut être null) * 
 * @param  mixed $prenom
 * @param  mixed $nom
 * @return string
 * ----------------------------------------------------------------------- *
 **/
function bonjour2($prenom = null) :string
{
    global $nom;
    if($prenom === null)
    {
        return "Bonjour\n";
    }
    return "Bonjour $prenom $nom \n";
}    
echo bonjour2('Jean');


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
// $resultat = repondre_oui_non('Voulez-vous continuer?');

/**
 * ----------------------------------------------------------------------- *
 * function demander_creneau()
 * @param  mixed $phrase
 * @return mixed
 * ----------------------------------------------------------------------- *
 **/
function demander_creneau(string $phrase = 'Veuillez entrer un créneau') :array {
    echo $phrase . "\n";
    while (true) {
        $ouverture = readline('Heure d\'ouverture : ');
        if ($ouverture >= 0 && $ouverture <= 23)
        {
            break;
        }
    }
    while (true) {
        $fermeture = readline('Heure de fermeture : ');
        if ($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture)
        {
            break;
        }
    }
    return [$ouverture, $fermeture];
}
$creneau = demander_creneau();
$creneau1 = demander_creneau('Veuillez entre votre créneau');
var_dump($creneau, $creneau1);

/**
 * ----------------------------------------------------------------------- *
 * [
 * [0,19],
 * [2,18]
 * ]
 * ----------------------------------------------------------------------- *
 **/
function demander_creneaux(string $phrase = "Veuillez entrer vos créneaux") : array{
    $creneaux = [];
    $continuer = true;
    while ($continuer) {
        $creneaux[] = demander_creneau();
        $continuer = repondre_oui_non('Voulez-vous continuer?');
    } return $creneaux;
}
$creneaux =  demander_creneaux('Entrez vos créneaux');
var_dump($creneaux);

function demo(string $param) {
    var_dump($param);
}
demo(1.2);
// Ne fait plus de conversion automatique (à mettre en haut du fichier)
// declare(strict_type=1);
?>