<?php
//*Création d'une variable
$chiffre = null;

//** Boucle avec création d'une condition **/
while ($chiffre !== 10) {
    $chiffre = (int)readline('Entrez une valeur : ');
    break;    
}
echo 'Bravo vous avez gagné!';
?>
---------------------------------------------------------------------------------------------------------------
<?php
/** Création d'une boucle for ($i = valeur de la variable; condition de la boucle; incrémenter la boucle) **/
for ($i = 0; $i < 10; $i++) {
    echo "- $i \n";
}
?>
---------------------------------------------------------------------------------------------------------------
<?php
//*Création d'une variable
$notes = [10, 15, 16];
$eleves = [
    'cm2' => 'Jean',
    'cm1' => 'Marc'
];

/** Création d'une boucle for pour afficher les notes **/
for ($i = 0; $i < 3; $i++) {
    echo  '- ' . $notes[1] . "\n";
}
?>
---------------------------------------------------------------------------------------------------------------
<?php
//** Création d'une boucle foreach pour afficher les notes pour la rendre plus lisible (sans la clé uniquement la valeur) **/
foreach ($notes as $note) {
    echo  '- ' . $note . "\n";
}
?>
---------------------------------------------------------------------------------------------------------------
<?php
foreach ($eleves as $classe => $eleve) {
    //** On commence par la classe 'as' puis la clé => et la valeur **/
    echo "$eleve est dans la classe $classe \n";
}
?>
---------------------------------------------------------------------------------------------------------------
<?php
$eleves = [
    'cm2' => ['Jean', 'Marc', 'Marion'],
    'cm1' => ['Emilie', 'Marcelin', ]
];

/*
* //** La classe CM2 : **
*  -Jean
*  -Marc
*  -Marion
*
*   ** La classe CM1 : **
*  -Emilie
*  -Marcelin
*/

foreach ($eleves as $classe => $listEleves) {
    //** On commence par la classe 'as' puis la clé => nouvelle variable **/
    echo "La classe $classe: \n";
    //** On peut créer une boucle dans une boucle **/
    foreach ($listEleves as $eleve) {
         echo "- $eleve \n";     
    }
    echo "\n";
}
?>
---------------------------------------------------------------------------------------------------------------
<?php
/**
 *todo Demande à l'utilisateur de rentrer une note ou de taper "fin" *
 *todo Chaque note est sauvegardée dans un tableau $notes (pensez $notes[]) *
 *todo A la fin on affiche le tableau de note sous forme de liste *
 **/

//** On crée un array pour les notes et une variable d'action **/
$notes = [];
$action = null;

//** Tant que l'utilisateur ne tape pas 'fin' **/
while (true) {
    $action = readline('Entrez une nouvelle note ou \'fin\' pour terminer la saisie : ');
    //** On ajoute la note tapée au tableau notes **//
    if ($action === 'fin') {
        break;
    } else {
        $notes[] = (int)$action;
    }
}

//** Pour chaque note dans notes **//
foreach($notes as $note) {
    //** On affiche '- note' **//
    echo "- $note \n";
}
?>
---------------------------------------------------------------------------------------------------------------
<?php
/**
 *todo On veut demander à l'utilisateur de rentrer les horaires d'ouverture d'un magasin *
 *todo On demande à l'utilisateur de rentrer une heure et on lui dira si le magasin est ouvert *
 **/

 //** On crée des variables pour le créneau et l'heure **//
$debut = null;
$fin = null;
$creneaux = [];
 
//** On demande à l'utilisateur de rentrer un créneau **//
while(true) {

    //** On demande l'heure de début **//
    $debut = (int)readline('Entrez l\'heure d\'ouverture du magasin : ');

    //** On demande l'heure de fin **//
    $fin = (int)readline('Entrez l\'heure de fermeture du magasin : ');

    //** On vérifie que l'heure de début est inférieur à l'heure de fin **//
    if($debut >= $fin) {
        echo 'Le créneau ne peut pas être enregistré car l\'heure d\'ouverture du magasin ($debut) est supérieur à l\'heure de fermeture du magasin ($fin).';

    //** On demande si on veut rajouter un nouveau créneau (o/n) **//
    } else {
        $creneaux[] = [$debut, $fin];
        $action = readline('Voulez-vous entrer un nouveau créneau (o/n) : ');

        //** On crée une boucle d'action **//
        if($action === 'n') {
            break;
        }
    }
}

//** On demande à l'utilisateur de rentrer une heure **//
/*$heure = (int)readline('A qu\'elle heure voulez-vous visiter le magasin ? ');
$creneauTrouve = false;*/

//** On affiche l'état d'ouverture du magasin **//
/*foreach($creneaux as $creneau) {
    if($heure >= $creneau[0] && $heure <= $creneau[1]) {
        $creneauTrouve = true;
        break;
    }
}

if ($creneauTrouve) {
    echo 'Le magasin sera ouvert.';
} else {
    echo 'Désolé, le magasin sera fermé.';
}*/

//** Le magasin est ouvert de 14h à 18h et de 9h à 12h **//
echo 'Le magasin est ouvert de ';
foreach($creneaux as $k =>$creneau) {
    if ($k > 0) {
        echo' et de ';
    }
    echo "{$creneau[0]}h à {$creneau[1]}h";
}
?>
