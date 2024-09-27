<?php
function compteurDeVues(): void  {    
    // Définir le chemin vers le fichier qui contiendra le compteur
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur'; // Chemin complet vers le fichier compteur
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    incrementerCompteur($fichier);
    incrementerCompteur($fichier_journalier);
}

function incrementerCompteur(string $fichier): void {
    $compteur = 1; // Initialiser le compteur à 1 par défaut

    // Vérifier si le fichier compteur existe
    if(file_exists($fichier)) {
        // Si le fichier existe, on lit la valeur actuelle du compteur
        $compteur = (int)file_get_contents($fichier); // Lire le contenu du fichier et le convertir en entier
        $compteur++; // Incrémenter le compteur
        // Écrire la nouvelle valeur du compteur dans le fichier
        file_put_contents($fichier, $compteur); // Mettre à jour le fichier avec la nouvelle valeur du compteur
    }
}

function nombreDeVues(): string {
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}