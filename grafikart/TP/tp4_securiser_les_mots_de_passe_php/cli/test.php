<?php
// ------------------------------------------------------------------------------- //
$fichier = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'demo.txt';
$size = @file_put_contents($fichier, 'Salut les gens', FILE_APPEND);

echo $size === false ? 'Impossible d\'écrire dans le fichier' : 'Écriture réussie';
// if($size === false) {
//     echo 'Impossible d\'écrire dans le fichier';
// } else {
//     echo 'Écriture réussie';
// }

// ------------------------------------------------------------------------------- //
$fichier = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'demo.txt';
echo file_get_contents($fichier);

// ------------------------------------------------------------------------------- //
$fichier = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'demo.txt';
$lignes = file($fichier);
echo $lignes[0];

// ------------------------------------------------------------------------------- //
$fichier = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'demo.txt';
$ressource = fopen($fichier, 'r');
echo fread($ressource, 2);

// ------------------------------------------------------------------------------- //
$fichier = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'demo.txt';
$ressource = fopen($fichier, 'r');
var_dump(fstat($ressource));

// ------------------------------------------------------------------------------- //
$fichier = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'demo.txt';
$ressource = fopen($fichier, 'r');
$k = 0;
while($line = fgets($ressource)) {
    $k++;
    if($k == 1) {
        echo $line;
        break;
    }
}
fclose($ressource);

// ------------------------------------------------------------------------------- //
$fichier = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'demo.txt';
$ressource = fopen($fichier, 'r+');
$k = 0;
while($line = fgets($ressource)) {
    $k++;
    if($k == 1) {
        fwrite($ressource, 'Bonjour tous le monde') ;
        break;
    }
}
fclose($ressource);
?>