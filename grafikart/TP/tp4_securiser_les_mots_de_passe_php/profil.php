<?php
$title = "Profil";

$nom = null;

/** --------------------------------------------------Etape-1--------------------------------------------------**
 ** ---------------------------------------------------------------------------------------------------------- **
 *? Si l'action est définie et que l'action est 'deconnecter' **
        ** if(!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {**
            *? Supprimer le cookie 'utilisateur' **
            ** unset($_COOKIE['utilisateur']); **
            *? Réinitialiser le cookie en le définissant avec une date d'expiration passée **
            ** setcookie('utilisateur', '', time() - 10); **
        ** } **
 ** ---------------------------------------------------------------------------------------------------------- **
    *? Ternaire pour affecter la valeur du cookie 'utilisateur' à $nom si le cookie existe **
        ** $nom = !empty($_COOKIE['utilisateur']) ? $_COOKIE['utilisateur'] : $nom; **
        *? Si le cookie 'utilisateur' existe et n'est pas vide **
        ** if(!empty($_COOKIE['utilisateur'])) { **
            *? Affecter la valeur du cookie à la variable $nom **
            ** $nom = $_COOKIE['utilisateur']; **
        ** } **
 ** ---------------------------------------------------------------------------------------------------------- **
    *?  Ternaire pour mettre à jour le cookie et la variable $nom si un nom est soumis en POST **
        ** $nom = !empty($_POST['nom']) ? (setcookie('utilisateur', $_POST['nom']) ? $_POST['nom'] : $nom) : $nom; **
            *? Si un nom a été soumis via un formulaire (méthode POST) **
            ** if(!empty($_POST['nom'])) { **
                *? Créer/mettre à jour le cookie avec le nom soumis **
                ** setcookie('utilisateur', $_POST['nom']); **
                *? Affecter ce nom à la variable $nom **
                ** $nom = $_POST['nom']; **
        ** }**
 ** ---------------------------------------------------------------------------------------------------------- **
 **/

/** --------------------------------------------------Etape-2--------------------------------------------------**
 ** ---------------------------------------------------------------------------------------------------------- **
 *? Le but principal de ce code est de stocker un tableau associatif représentant les informations d'un utilisateur dans un cookie sous forme sérialisée. Cela permet de récupérer ces données lors de requêtes ultérieures en désérialisant le cookie. Le processus de sérialisation permet de stocker des structures de données complexes comme des tableaux dans des cookies ou d'autres supports qui ne peuvent nativement gérer que des chaînes de caractères. **
 ** ---------------------------------------------------------------------------------------------------------- **
    *? Création du tableau associatif $user : Ce tableau contient trois éléments représentant les informations d'un utilisateur, avec des clés pour le prénom (prenom), le nom (nom), et l'âge (age). **
        **  $user = [ **
        **      'prenom' => 'John', **
        **      'nom' => 'Doe', **
        **      'age' => 18 **
        **  ]; **
 ** ---------------------------------------------------------------------------------------------------------- **  
    *? Sérialisation et stockage dans un cookie : La fonction serialize() convertit le tableau PHP $user en une chaîne de caractères. Cela permet de stocker des structures de données complexes comme des tableaux dans des cookies, car les cookies ne peuvent stocker que des chaînes de caractères. Stockage dans le cookie : La chaîne de caractères obtenue est stockée dans un cookie appelé utilisateur. Cette information pourra ensuite être récupérée et "désérialisée" plus tard. **
        ** setcookie('utilisateur', serialize($user)); **
 ** ---------------------------------------------------------------------------------------------------------- ** 
    *?  Débogage de la sérialisation : Cette ligne, si elle était décommentée, afficherait la version sérialisée du tableau $user. Cela est utile pour voir comment les données sont converties en chaîne de caractères. **
        **   var_dump(serialize($user)); **
 ** ---------------------------------------------------------------------------------------------------------- **
    *? Désérialisation et affichage : Cette ligne désérialise la chaîne donnée en entrée (qui correspond à la version sérialisée de $user) et la convertit de nouveau en un tableau PHP. var_dump() affiche le contenu du tableau désérialisé pour débogage. die() stoppe l'exécution du script après l'affichage, ce qui est utile pour visualiser directement ce qui se passe sans exécuter la suite du code.**
        ** var_dump(unserialize('a:3:{s:6:"prenom";s:4:"John";s:3:"nom";s:3:"Doe";s:3:"age";i:18;}')); die; **
 ** ---------------------------------------------------------------------------------------------------------- **
    *? Création d'un autre cookie pour le nom de famille : Cette ligne, si elle était active, créerait un cookie séparé appelé nom, contenant uniquement la valeur du nom de famille (Doe). Cependant, cela peut être redondant puisqu'on stocke déjà l'ensemble des données de l'utilisateur dans le cookie utilisateur (sérialisé). Ce cookie ne serait utile que si vous voulez accéder directement à la valeur du nom de famille sans devoir désérialiser le tableau. **
        ** setcookie('nom', $user['nom']); **
 ** ---------------------------------------------------------------------------------------------------------- **
 **/

/** --------------------------------------------------Etape-3--------------------------------------------------**
 ** ---------------------------------------------------------------------------------------------------------- **
    *? Récupération du cookie utilisateur : **
        ** Cette ligne récupère le contenu du cookie nommé utilisateur et le stocke dans la variable $utilisateur. **
        ** Le cookie utilisateur contient une version sérialisée d'un tableau associatif représentant les informations de l'utilisateur (comme vu dans l'exemple précédent, ce cookie a été créé avec serialize($user)). **
        ** La valeur récupérée est donc une chaîne de caractères sérialisée. **
            *todo $utilisateur = $_COOKIE['utilisateur']; **
 ** ---------------------------------------------------------------------------------------------------------- **
    *? Désérialisation du cookie : **
        ** unserialize($utilisateur) : Cette fonction PHP convertit la chaîne sérialisée stockée dans $utilisateur (le cookie) en un tableau PHP. Cela permet de récupérer les données stockées sous leur forme d'origine. **
        ** var_dump() : Cette fonction permet d'afficher la structure et le contenu de la variable désérialisée, qui sera un tableau associatif représentant les informations de l'utilisateur. **
        ** die() : Cette fonction stoppe l'exécution du script immédiatement après l'affichage, ce qui est utile pour déboguer et vérifier le contenu du tableau désérialisé sans que le reste du script ne soit exécuté. **
           *todo var_dump(unserialize($utilisateur)); die(); **
 ** ---------------------------------------------------------------------------------------------------------- **
    *? Commentaire de création de cookie pour le nom : **
        ** Cette ligne, si elle était décommentée, créerait un cookie distinct appelé nom contenant uniquement le nom de famille de l'utilisateur (par exemple, 'Doe'). **
        ** Cependant, elle est commentée et donc ne sera pas exécutée dans l'état actuel du script. De plus, comme le cookie utilisateur contient déjà toutes les informations sous forme sérialisée, ce cookie supplémentaire serait redondant. **
            *todo setcookie('nom', $user['nom']); **
 **/

if(!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() - 10);
}
$nom = !empty($_COOKIE['utilisateur']) ? $_COOKIE['utilisateur'] : $nom;
$nom = !empty($_POST['nom']) ? (setcookie('utilisateur', $_POST['nom']) ? $_POST['nom'] : $nom) : $nom;
require_once 'elements/header.php';
?>

<div class="bg-body-tertiary p-5 m-3 rounded">

    <!-- Si la variable $nom contient une valeur (donc l'utilisateur est connecté) -->
    <?php if($nom): ?> 
        
        <!-- Affichage d'un message de bienvenue avec le nom de l'utilisateur en toute sécurité (protection contre les attaques XSS avec htmlentities()) -->
        <h1>Bonjour <?= htmlentities($nom) ?></h1>
        <a href="profil.php?action=deconnecter" class="btn btn-secondary">Se déconnecter</a>
        
    <?php else: ?>
        <!-- Sinon (si la variable $nom est vide ou nulle, donc l'utilisateur n'est pas connecté) -->
        
        <form action="" method="post">            
            <div class="form-group">
                <input class="form-control" name="nom" placeholder="Entrer votre nom">
            </div>            
            <button class="btn btn-primary">Se connecter</button>
        </form>
    <?php endif; ?>
</div>

<?php require_once 'elements/footer.php'; ?>