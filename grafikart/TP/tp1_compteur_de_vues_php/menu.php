<?php
require_once 'fonctions.php';
$title = "Notre Menu";
require_once 'elements/header.php';
?>

<div class="bg-body-tertiary p-5 rounded">
    <h1>Menu</h1>

    <?php
    //** Chargement du fichier 'menu.tsv' dans un tableau **//   
    $lignes = file(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.tsv');

    //** Boucle pour traiter chaque ligne du fichier TSV **//
    foreach($lignes as $k =>$ligne) {
        /**
         *? Utilisation de `explode` pour diviser chaque ligne par le séparateur de tabulation ("\t") **
         *? `trim` est utilisé pour retirer les espaces ou caractères de fin de ligne**
         **/
        $lignes[$k] = (explode("\t", trim($ligne)));
    }
    ?>

    <!-- Boucle pour afficher chaque ligne traitée du tableau $lignes -->
    <?php foreach($lignes as $ligne): ?>
    
        <!-- Vérification du nombre d'éléments dans la ligne -->
        <?php if(count($ligne) === 1): ?>
            <!-- Si la ligne contient un seul élément, elle est affichée comme titre de section -->
            <h2><?= $ligne[0] ?></h2> <!-- Affichage du titre principal de la section -->
        
        <?php else: ?>
            <!-- Si la ligne contient plusieurs éléments, elle est affichée sous forme de description d'un plat -->
            <div class="row"> <!-- Structure en lignes et colonnes pour l'affichage -->
                
                <div class="col-sm-8"> <!-- Première colonne pour le nom et la description du plat -->
                    <p>
                        <strong><?= $ligne[0]; ?></strong><br> <!-- Nom du plat -->
                        <?= $ligne[1]; ?> <!-- Description du plat -->
                    </p>
                </div>
                
                <div class="col-sm-4"> <!-- Deuxième colonne pour le prix du plat -->
                    <!-- Affichage du prix avec deux décimales, formaté avec une virgule et des espaces pour les milliers -->
                    <strong><?= number_format($ligne[2], 2 , ',', ' '); ?> €</strong>
                </div>
            </div>
        
        <?php endif; ?>
    
    <?php endforeach; ?>
    
</div>


<?php require_once 'elements/footer.php'; ?> 