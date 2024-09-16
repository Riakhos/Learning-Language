<?php
//* On crée une variable
$note = 12;

//* On crée une condition
if($note >= 10) {
    //* On affiche si la condition est réussi
    echo 'Bravo, vous avez la moyenne!';
} else {
    //* On affiche si la condition est échoué
    echo 'Dommage, vous n\'avez pas la moyenne!';
}

?>

<?php

//* On crée une variable, où l'on remplie directement la valeur
$note = readline('Entrez votre note : ');

//* On crée une condition
if($note >= 10) {
    //* On crée une deuxième condition
    if($note == 10) {
        //* On affiche si la condition est réussi
        echo 'Vous avez juste la moyenne.';
    } else {
        //* On affiche si la condition est réussi
        echo 'Bravo, vous avez la moyenne!';
    }
} else {
    //* On affiche si la condition est échoué
    echo 'Dommage, vous n\'avez pas la moyenne!';
}
?>

<?php

//* On crée une variable, où l'on remplie directement la valeur mais on la simplifie
$note = (int)readline('Entrez votre note : '); //! On rajoute le (int) pour préciser que c'est un chiffre la valeur attendu(pour le triple égal)

//* On crée une condition
if($note > 10) {
    //* On affiche si la condition est réussi
    echo 'Bravo, vous avez la moyenne!';
//* On crée une deuxième condition
} else if($note === 10) {
    //* On affiche si la condition est réussi
    echo 'Vous avez juste la moyenne.';
} else {
    //* On affiche si la condition est échoué
    echo 'Dommage, vous n\'avez pas la moyenne!';
}

?>

<?php

//* On crée une variable, où l'on indique directement un choix de la valeur
$action = (int)readline('Entrez votre ACTION : (1: attaquer, 2:défendre, 3; passer mon tour)');//! On rajoute le (int) pour préciser que c'est un chiffre la valeur attendu(pour le triple égal)

//* On crée une condition
if($action === 1) {
    //* On affiche si la condition est réussi
    echo 'J\'attaque!';
//* On crée une deuxième condition
} else if($action === 2) {
    //* On affiche si la condition est réussi
    echo 'Je défends!';
} else if($action === 3) {
    //* On affiche si la condition est réussi
    echo 'Je fais rien tour!';
} else {
    //* On affiche si la condition est échoué
    echo 'Commande inconnue';
}

?>

<?php

//* On crée une variable comme ci-dessus et on la simplifie avec une boucle
$action = (int)readline('Entrez votre ACTION : (1: attaquer, 2:défendre, 3; passer mon tour)');//! On rajoute le (int) pour préciser que c'est un chiffre la valeur attendu(pour le triple égal)

//* On crée une boucle
switch($action) {
    //* On crée le premier cas
    case 1:
        //* On affiche si le cas est réussi
        echo 'J\'attaque!';
        break;
    case 2:
        //* On affiche si le cas est réussi
        echo 'Je défends!';
        break;
    case 3:
        //* On affiche si le cas est réussi
        echo 'Je fais rien tour!';
        break;
    default:
        //* On affiche si le cas par default
        echo 'Commande inconnue';
}

?>

<?php

//* On crée une variable pour savoir si le magasin est ouvert
$heure = (int)readline('Entrez une heure :');//! On rajoute le (int) pour préciser que la valeur attendu est un chiffre 

//* On crée une condition
if((9 > $heure || $heure > 12 ) && (14 > $heure || $heure > 17)) {
    //* On affiche si la condition est réussi
    echo 'Le magasin est fermé!';
} else {
    //* On affiche si la condition est échoué
    echo 'Le magasin est ouvert!';
}

?>