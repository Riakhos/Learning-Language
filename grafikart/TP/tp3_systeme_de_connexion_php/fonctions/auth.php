<?php
/**
 **--------------------------------------------------------------------------------------------------------** 
    ** Vérifie si l'utilisateur est connecté. **
        **-------------------------------------------------------------------------------------------------** 
            ** Cette fonction vérifie l'état de la session PHP **
            ** Et retourne true si la variable de session 'connecte' est définie et non vide, sinon false. **
            **---------------------------------------------------------------------------------------------** 
            * @return bool true si l'utilisateur est connecté, false sinon. *        
 **--------------------------------------------------------------------------------------------------------** 
 **/
function estConnecte(): bool {
    // Si aucune session n'est active, démarrer une nouvelle session
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // Retourner true si 'connecte' est défini dans la session et non vide
    return !empty($_SESSION['connecte']);
}



/**
 **--------------------------------------------------------------------------------------------------------** 
    ** Force la redirection d'un utilisateur non connecté vers la page de connexion. **
    **-----------------------------------------------------------------------------------------------------**
        ** Cette fonction vérifie si l'utilisateur est connecté en appelant la fonction estConnecte(). **
        ** Si l'utilisateur n'est pas connecté, il est redirigé vers la page /login.php et l'exécution du script est arrêtée. **
    **------------------------------------------------------------------------------------------------------**
 **/
function forcerUtilisateurConnecte(): void {
    // Si l'utilisateur n'est pas connecté
    if(!estConnecte()) {
        // Rediriger vers la page de connexion
        header('Location: /login.php');
        // Arrêter l'exécution du script
        exit();
    }
}
?>