<h1>2. Les tableaux</h1>
<?php
//* Création d'un tableau dans une variable
$notes = [10, 20, 10, 9, 'élève'];
//* Affichage d'un seul paramètre du tableau
echo $notes[4];
?>

<?php
//* Création d'un deuxième tableau dans un premier tableau dans une variable
$eleve = ['Marc', 'Doe', [10, 20, 40]];
//* Affichage d'un seul paramètre du tableau
echo $eleve[2][1];
?>

<?php
//* Meilleure présentation
$eleve = [
    'nom' => 'Doe',
    'prenom' => 'Marc',
    'notes' => [10, 20, 15]
];
echo $eleve['prenom'] . ' ' . $eleve['nom'];
?>

<?php
$eleve = [
    'nom' => 'Doe',
    'prenom' => 'Marc',
    'notes' => [10, 20, 15]
];
//* Changement de paramètre dans le tableau
$eleve['prenom'] = 'Jean';
//* Ajout d'un paramètre dans le tableau
$eleve['notes'][3] = 16;
//* Affichage des nouveaux paramètres
echo $eleve['prenom'] . ' ' . $eleve['nom'] . ' ' . $eleve['notes'][3];
//* Affichage de tableau de note
print_r($eleve['notes']);
//* Affichage de tous les tableaux
print_r($eleve);
?>

<?php
//* Tableau représentant les élèves d'une classe
$classe = [
    [
        'nom' => 'Doe',
        'prenom' => 'Jean',
        'notes' => [16, 16, 16]
    ],
    [
        'nom' => 'Doe',
        'prenom' => 'Jane',
        'notes' => [12, 15, 17]
    ]
];
//* Affichage d'un élément de l'un des tableaux
echo $classe[1]['notes'][1];
?>
