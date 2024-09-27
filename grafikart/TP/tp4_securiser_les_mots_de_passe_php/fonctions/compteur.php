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
    // Définir le chemin vers le fichier contenant le compteur de visites
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    
    // Retourner le contenu du fichier, qui correspond au nombre de visites
    return file_get_contents($fichier);
}


function nombreVueMois(int $annee, int $mois): int {
    // Formater le mois avec deux chiffres (par exemple, 01 pour janvier)
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    
    // Construire le chemin pour cibler les fichiers correspondant aux jours du mois spécifié
    // Exemple : 'data/compteur-2024-01-*' pour janvier 2024
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    
    // Utiliser la fonction glob() pour obtenir tous les fichiers qui correspondent à ce modèle
    $fichiers = glob($fichier);
    
    // Initialiser le total des visites à 0
    $total = 0;
    
    // Parcourir chaque fichier trouvé et ajouter son contenu (le nombre de visites) au total
    foreach($fichiers as $fichier) {
        // Lire le contenu du fichier (nombre de visites pour un jour spécifique) et l'ajouter au total
        $total += (int)file_get_contents($fichier);
    }
    
    // Retourner le nombre total de visites pour le mois
    return $total;
        
    // var_dump(glob($fichier));
    // exit();
}


function nombreVueDetailMois(int $annee, int $mois): array {
    // Formater le mois avec deux chiffres (par exemple, 01 pour janvier)
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    
    // Construire le chemin pour cibler les fichiers de visites journalières pour le mois spécifié
    // Exemple : 'data/compteur-2024-01-*' pour janvier 2024
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    
    // Utiliser la fonction glob() pour obtenir tous les fichiers correspondant à ce modèle
    $fichiers = glob($fichier);
    
    // Initialiser un tableau vide pour stocker les visites journalières
    $visites = [];
    
    // Parcourir chaque fichier trouvé
    foreach($fichiers as $fichier) {
        // Extraire le nom du fichier (sans le chemin complet)
        $parties = explode('-', basename($fichier));
        
        // Ajouter un tableau contenant les détails (année, mois, jour, nombre de visites) pour chaque fichier
        $visites[] = [
            'annee' => $parties[1], // Année extraite du nom du fichier
            'mois' => $parties[2],  // Mois extrait du nom du fichier
            'jour' => $parties[3],  // Jour extrait du nom du fichier
            'visites' => file_get_contents($fichier) // Nombre de visites pour ce jour
        ];
        
        // var_dump(basename($fichier));
        // die();
    }
    
    // Retourner le tableau des visites journalières
    return $visites;
}
?>