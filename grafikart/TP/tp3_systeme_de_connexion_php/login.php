<?php
$title = "Login";

//** Initialisation de la variable d'erreur à null **//
$erreur = null;

//** Vérification si les champs pseudo et mot de passe sont remplis **//
if(!empty($_POST['pseudo']) && !empty($_POST['motDePasse'])) {

    //** Vérification des identifiants **//
    if($_POST['pseudo'] === 'John' && $_POST['motDePasse'] === 'Doe') {
        
        //** Si les identifiants sont corrects, démarrer une session **//
        session_start();
        
        //** Marquer l'utilisateur comme connecté **//
        $_SESSION['connecte'] = 1;
        
        //** Redirection vers la page login.php **//
        header('Location: /login.php');
    } else {
        //** Si les identifiants sont incorrects, afficher un message d'erreur **//
        $erreur = "Identifiants incorrects";
    }
}


require_once 'fonctions/auth.php';
if(estConnecte()) {
    header('Location: /dashboard.php');
    exit;
}

require_once 'elements/header.php';
?>

<div class="bg-body-tertiary p-5 rounded m-2">
    <?php if($erreur): ?>
        <div class="alert alert-danger">
            <?= $erreur ?>
        </div>
    <?php endif; ?>
    <form action="" method="post">
        <div class="form-group m-2">
            <input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">            
        </div>
        <div class="form-group m-2">
            <input class="form-control" type="password" name="motDePasse" placeholder="Votre mot de passe">            
        </div>
        <button class="btn btn-primary m-2" type="submit">Se connecter</button>
    </form>
</div>

<?php require_once 'elements/footer.php'; ?>