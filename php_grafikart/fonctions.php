<?php
$variable = readline();
var_dump(1234);

//** Inverser le string **//
$mot = readline('Veuillez rentrer un mot : ');
$reverse = strrev($mot);
if($mot === $reverse) {
    echo 'Ce mot est un palindrome.';
} else {
    echo 'Ce mot n\'est pas un palindrome.';
}

//** Met le texte en minuscule **//
$mot = readline('Veuillez rentrer un mot : ');
$textMinuscule = strtolower(strrev($mot));
if(strtolower($mot) === $reverse) {
    echo 'Ce mot est un palindrome.'; 
} else {
    echo 'Ce mot n\'est pas un palindrome.';
}

//** On crée un tableau **//
$notes = [10, 20, 13];
array_push($notes, 16, 17);
$notes = $notes;
$notes2[] = 10;
var_dump($notes, $notes2);

//** On crée une variable pour connaître la somme du tableau **//
$sum = array_sum($notes);


//** On crée une variable pour connaître le nombre des éléments du tableau **//
$count = count($notes);

echo 'Vous avez ' . round($sum / $count, 2) . ' de moyenne.';
print_r($notes);
?>

<?php
$insultes = ['merde', 'con'];
$asterisque = [];
foreach($insultes as $insulte) 
{
    //** Trouver la première lettre du mot **//
    //** Trouver la taille du mot (-1) **//
    //** Concaténer la première lettre avec le str_repeat **//
    $asterisque[] = substr($insulte, 0 , 1) . str_repeat('#', strlen($insulte) - 1);
}
$phrase = readline('Veuillez entrer une phrase : ');
$phrase = str_replace($insultes, $asterisque, $phrase);
/*
foreach($insultes as $insulte) 
{
    $replace = str_repeat('#', strlen($insulte));
    $phrase = str_replace($insulte, $replace, $phrase);
}
*/
echo $phrase;