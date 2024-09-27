<?php
require_once  './fonctions/fonctions.php';
$title = "Composer votre glace";
// Checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
// Radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
// Checkbox
$supplements = [
    'Pépite de chocolat' => 2,
    'Chantilly' => 0.5
];

$title = "Composer votre Glace";
$ingredients = [];
$total = 0;

foreach (['parfum', 'supplement', 'cornet'] as $name) {
    // Vérifie si le paramètre GET correspondant au nom actuel existe
    if (isset($_GET[$name])) {
        $liste = $name . 's'; // Définit le nom de la liste en ajoutant 's' au nom

        // Vérifie si le paramètre GET est un tableau (multi-sélection)
        if (is_array($_GET[$name])) {
            foreach ($_GET[$name] as $value) {
                // Vérifie si la variable dynamique correspondant à la liste contient l'index
                if (isset($$liste[$value])) {
                    // Ajoute l'ingrédient à la liste et met à jour le total
                    $ingredients[] = $value;
                    $total += $$liste[$value];
                }
            }
        } else {
            // Si ce n'est pas un tableau, vérifie si l'index existe dans la liste
            if (isset($$liste[$_GET[$name]])) {
                $ingredients[] = $_GET[$name]; // Ajoute l'ingrédient
                $total += $$liste[$_GET[$name]]; // Met à jour le total
            }
        }
    }
}


require_once 'elements/header.php';
?>

    <div class="bg-body-tertiary p-5 rounded">
        <h1>Composer votre glace</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5  class="card-title">Votre glace</h5>
                        <ul>
                            <?php foreach($ingredients as $ingredient): ?>
                                <li><?= $ingredient ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p>
                            <strong>Prix : </strong> <?= $total ?> €
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <form action="parfum.php" method="GET">
                <h2>Choisissez vos parfums</h2>
                <?php foreach($parfums as $parfum => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('parfum', $parfum, $_GET) ?>
                            <?= $parfum ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach; ?>
                    
                <h2>Choisissez votre cornet</h2>
                <?php foreach($cornets as $cornet => $prix): ?>
                    <div class="radio">
                        <label>
                            <?= radio('cornet', $cornet, $_GET) ?>
                            <?= $cornet ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach; ?>
                        
                <h2>Choisissez vos suppléments</h2>
                <?php foreach($supplements as $supplement => $prix): ?>
                        <div class="checkbox">
                    <label>
                    <?= checkbox('supplement', $supplement, $_GET) ?>
                        <?= $supplement ?> - <?= $prix ?> €
                    </label>
                </div>
                <?php endforeach; ?>

                <button type="submit"  class="btn btn-primary">Composer ma glace</button>
            </form>
        </div>
    </div>    

    <?php require_once 'elements/footer.php'; ?>
