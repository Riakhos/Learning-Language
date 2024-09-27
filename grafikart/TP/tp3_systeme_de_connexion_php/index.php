<?php
$title = "Page d'accueil";
$aDeviner = 150;
$erreur = null;
$success = null;
$value = null;
if (isset($_POST['chiffre'])) {
    // Vérifie si le champ 'chiffre' a été soumis via un formulaire

    if ($_POST['chiffre'] > $aDeviner) {
        // Si le chiffre soumis est supérieur à celui à deviner, on génère un message d'erreur
        $erreur = "Votre chiffre est trop grand.";
    } elseif ($_POST['chiffre'] < $aDeviner) {
        // Si le chiffre soumis est inférieur, on génère un autre message d'erreur
        $erreur = "Votre chiffre est trop petit.";
    } else {
        // Si le chiffre soumis est égal à celui à deviner, on génère un message de succès
        $success = "Bravo ! Vous avez deviné le chiffre. <strong>$aDeviner</strong>";
    }

    // Stocke la valeur soumise, convertie en entier, dans la variable $value
    $value = (int)$_POST['chiffre'];
}


require_once 'elements/header.php';
?>

<div class="bg-body-tertiary p-5 rounded">
    <h1>Navbar example</h1>
    <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser’s viewport.</p>
    <a class="btn btn-lg btn-primary" href="/docs/5.3/components/navbar/" role="button">View navbar docs &raquo;</a>

    <?php if ($erreur): ?>
        <!-- Si la variable $erreur contient un message, affiche une alerte Bootstrap en rouge -->
        <div class="alert alert-danger">
            <?= $erreur ?>
        </div>
    <?php elseif ($success): ?>
        <!-- Si la variable $success contient un message (et que $erreur est vide), affiche une alerte Bootstrap en vert -->
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif ?>

    <form action="index.php" method="POST">
        <div class="form-group">
            <input type="number" class="form-control" name="chiffre" placeholder="entre 0 et 1000" value="<?= $value ?>">
            <input type="text" class="form-control" name="demo" value="text">
        </div>
        <button type="submit" class="btn btn-primary">Deviner</button>
    </form>

    <form action="index.php" method="POST">
        <div class="form-group">
            <input type="checkbox" name="parfum[]" value="fraise"> Fraise<br>
            <input type="checkbox" name="parfum[]" value="vanille"> Vanille<br>
            <input type="checkbox" name="parfum[]" value="chocolat"> Chocolat<br>
        </div>
        <input type="text" name="demo[]">
        <input type="text" name="demo[]">
        <button type="submit" class="btn btn-primary">Deviner</button>
    </form>
</div>

<?php require_once 'elements/footer.php'; ?>

<h2>$_GET</h2>
<pre>
    <?php print_r($_GET); ?>
</pre>

<br><hr><br>
<h2>$_POST</h2>
<pre>
    <?php print_r($_POST); ?>
</pre>

<br><hr><br>
<h2>$_SERVER</h2>
<pre>
    <?php print_r($_SERVER); ?>        
</pre>