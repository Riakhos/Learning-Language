<h1>1. Les variables</h1>
Salut les gens,
<?php
//* Je crée une variable
$nom = 'Doe';
//* J'affiche une variable
echo 'Je m\'appelle, ' . $nom . '.';
?>

Comment ça va?
<?php
$note = 10;
$note2 = 20;
//* J'affiche une opération entre deux variables
echo ($note + $note2) /2;
?>

<?php
$prenom = 'Marc';
//* J'affiche deux variables en même temps
echo "$prenom $nom";
?>

<?php
//* Afficher la phrase "Bonjour Marc Doe, vous avez eu 15 de moyenne."
echo 'Bonjour ' . "$prenom $nom" . ', vous avez eu ' . (($note + $note2) /2) . ' de moyenne.';
$moyenne = (($note + $note2) /2);
echo "Bonjour $prenom $nom, vous avez eu $moyenne de moyenne.";
?>
