<?php
$title = "Page d'accueil";
$aDeviner = 150;
$erreur = null;
$success = null;
$value = null;
if (isset($_POST['chiffre'])) {
    if ($_POST['chiffre'] > $aDeviner) {
        $erreur = "Votre chiffre est trop grand.";
    } elseif ($_POST['chiffre'] < $aDeviner) {
        $erreur = "Votre chiffre est trop petit.";
    } else {
        $success = "Bravo ! Vous avez deviner le chiffre. <strong>$aDeviner</strong>";
    }
    $value = (int)$_POST['chiffre'];
}

require 'header.php';
?>

    <div class="bg-body-tertiary p-5 rounded">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser’s viewport.</p>
        <a class="btn btn-lg btn-primary" href="/docs/5.3/components/navbar/" role="button">View navbar docs &raquo;</a>
    </div>

    <?php if($erreur): ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
    <?php elseif ($success): ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif ?>
        
    <form action="index.php" method="POST">
        <input type="number" name="chiffre" placeholder="entre 0 et 1000" value="<?= $value ?>">
        <input type="text" name="demo" value="text">
        <button type="submit">Deviner</button>
    </form>

    <pre>
        <?php // print_r($_SERVER); ?>
        <?php // print_r($_POST); ?>
    </pre>

  <?php require 'footer.php'; ?>
