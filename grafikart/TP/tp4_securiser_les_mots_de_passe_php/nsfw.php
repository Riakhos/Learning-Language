<?php
$title = "Nsfw";

$age = null;

if (!empty($_POST['birthday'])) {
    // Récupérer la date d'anniversaire soumise via le formulaire
    $birthday = $_POST['birthday'];
    
    // Définir le cookie 'birthday' avec la valeur soumise
    setcookie('birthday', $birthday);
    
    // Mettre à jour immédiatement $_COOKIE pour cette session
    $_COOKIE['birthday'] = $birthday;
} elseif (!empty($_COOKIE['birthday'])) {
    // Si le cookie existe déjà, on récupère sa valeur
    $birthday = $_COOKIE['birthday'];
}

// Si on a bien une date d'anniversaire (via POST ou COOKIE), on peut calculer l'âge
if (!empty($birthday)) {
    // Si la date est une année (ex : "1990"), on la transforme en entier pour le calcul
    $birthday = (int)$birthday;
    $age = date('Y') - $birthday;
}

require_once 'elements/header.php';
?>

<div class="bg-body-tertiary p-5 m-3 rounded">

    <!-- Vérifie si l'utilisateur a 18 ans ou plus -->
    <?php if($age && $age >= 18): ?> 
        <h1>Du contenu réservé aux adultes</h1> 

    <!-- Vérifie si l'âge a été soumis mais qu'il est inférieur à 18 ans -->
    <?php elseif ($age !== null): ?> 
        <div class="alert alert-danger">Vous n'avez pas l'âge requis pour voir le contenu.</div>

    <!-- Si l'âge n'a pas encore été soumis -->
    <?php else: ?> 
        <form action="" method="post">
            <div class="form-group">
                <label for="birthday">Section réservée pour les adultes, entrez votre année de naissance :</label>
                <select name="birthday" id="birthday" class="form-control">

                    <!-- Boucle pour générer les options d'années de 2024 à 1920 -->
                    <?php for($i = 2024; $i > 1919; $i--): ?>
                    
                    <!-- Crée une option pour chaque année -->
                    <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary mt-2">Envoyer</button>
        </form>
    <?php endif; ?>
</div>


<?php require_once 'elements/footer.php'; ?>