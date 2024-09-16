<?php
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
?>