<?php
//** Initialisation des variables pour stocker des messages d'erreur ou de succès **//
$error = null; // Variable pour stocker un message d'erreur (si l'email est invalide)
$success = null; // Variable pour stocker un message de succès (si l'email est enregistré correctement)
$email = null; // Variable pour stocker l'email soumis

//** Vérification si le formulaire a été soumis avec un email **//
if (!empty($_POST['email'])) {
    //** Récupère l'email soumis dans le formulaire **//
    $email = $_POST['email'];

    //** Validation de l'email avec un filtre de validation **//
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        /**
         ** Création du chemin vers le fichier pour stocker l'email **
            *? __DIR__ représente le répertoire du fichier PHP courant **
            *? DIRECTORY_SEPARATOR assure la compatibilité des chemins entre systèmes (Windows, Linux, etc.) **
            *? On crée un fichier avec le nom de la date du jour (ex: '2024-09-22.txt') dans le dossier 'emails' **
         **/
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';

        /**
         ** Enregistre l'email dans le fichier **
         *? PHP_EOL est utilisé pour ajouter un saut de ligne après l'email **
         *? FILE_APPEND permet d'ajouter à la fin du fichier sans l'écraser **
         **/
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);

        //** Message de succès si l'email a été enregistré correctement **//
        $success = 'Votre email a bien été enregistré';
    } else {

        //** Si l'email est invalide, un message d'erreur est généré **//
        $error = 'Email invalide';
    }
}

require_once 'elements/header.php';
?>

<div class="bg-body-tertiary p-5 rounded">
    <h1>S'inscrire à la newsletter</h1>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, doloremque harum, doloribus quam quae sit quis nostrum debitis nisi earum similique maxime dolore aliquid corrupti laboriosam eaque quisquam! Doloremque, corrupti!</p>
    
    <?php if($error): ?> 
    <!-- Vérifie s'il existe un message d'erreur -->
    <div class="alert alert-danger">
        <!-- Si $error n'est pas vide, affiche le message d'erreur dans une alerte de type "danger" (rouge) -->
        <?= $error ?> 
    </div>
    <?php endif; ?> 

    <?php if($success): ?>
        <!-- Vérifie s'il existe un message de succès -->
        <div class="alert alert-success">
            <!-- Si $success n'est pas vide, affiche le message de succès dans une alerte de type "success" (verte) -->
            <?= $success ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire pour s'inscrire à une newsletter -->
    <form action="/newsletter.php" method="post" class="form-inline">
        <!-- La méthode POST est utilisée pour envoyer les données de manière sécurisée -->
        <div class="form-group">
            <!-- Champ de saisie pour l'email avec validation du type email et rendu obligatoire -->
            <input type="email" name="email" placeholder="Entrer votre email" required class="form-control" 
            value="<?= htmlentities($email) ?>"> 
            <!-- Affiche la valeur précédente de l'email pour la pré-remplir en cas de soumission erronée -->
            <!-- htmlentities() protège contre les attaques XSS en échappant les caractères spéciaux -->
        </div>
        <!-- Bouton de soumission du formulaire -->
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>

</div>

<?php require_once 'elements/footer.php'; ?> 