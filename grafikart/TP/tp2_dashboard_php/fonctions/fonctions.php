<?php

/**
 *? Cette fonction appelée nav_link qui génère des liens de navigation (balise <a>) avec une structure spécifique en HTML, et qui peut marquer le lien correspondant à la page courante comme "actif" *
 * nav_link *
    * @param  mixed $lien lien (URL) que la balise <a> va utiliser *
    * @param  mixed $titre texte qui sera affiché dans le lien *
    * @param  mixed $classe classe CSS additionnelle pour le lien. Par défaut, c'est une chaîne vide *
    * @return string fonction renvoie une chaîne de caractères en HTML *
**/

function nav_link(string $lien, string $titre, string $classe = ''): string
{
    //** Initialisation de la variable **//
    $classe = "nav-link ";

    /**
        *todo Vérification si la page actuelle (via $_SERVER['SCRIPT_NAME']) correspond au lien fourni ($lien) **
        *todo Si c'est le cas, on ajoute la classe 'active' à $classe pour marquer ce lien comme actif **
     **/
    if($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe .= 'active'; // On concatène 'active' à la classe CSS existante
    }

    /** 
     ** Utilisation de la syntaxe heredoc pour générer le code HTML **
        *todo On retourne un élément <li> avec un lien <a> à l'intérieur **
        *todo La balise <a> inclut les classes CSS spécifiées dans $classe et pointe vers l'URL $lien **
        *todo Le texte du lien est celui contenu dans $titre **
     **/
    return <<<HTML
    <li class="nav-item">
        <a class="$classe" aria-current="page" href="$lien">$titre</a>
    </li>
HTML;
}


/**
 *? Cette fonction génère un menu de navigation composé de plusieurs liens *
 * nav_menu *
 *
 * @param  mixed $classe : Ce paramètre peut contenir une ou plusieurs classes CSS qui seront appliquées à chaque lien du menu *
 * @return string fonction renvoie une chaîne de caractères en HTML *
 **/

function nav_menu(string $classe = ''): string // Par défaut, c'est une chaîne vide
{
    return
        //** Appel à la fonction nav_link pour le lien du Menu **//
        nav_link('/menu.php', 'Menu', $classe) .

        //** Appel à la fonction nav_link pour le lien du Parfum **//
        nav_link('/parfum.php', 'Parfum', $classe) . 
        
        //** Appel à la fonction nav_link pour le lien du Contact **//
        nav_link('/contact.php', 'Contact', $classe) .
        
        //** Appel à la fonction nav_link pour le lien du Newsletter **//
        nav_link('/newsletter.php', 'Newsletter', $classe) .

        //** Appel à la fonction nav_link pour le lien du Profil **//
        nav_link('/profil.php', 'Profil', $classe) .

        //** Appel à la fonction nav_link pour le lien du Nsfw **//
        nav_link('/nsfw.php', 'Nsfw', $classe) .

        //** Appel à la fonction nav_link pour le lien du Session **//
        nav_link('/session.php', 'Session', $classe) .

        //** Appel à la fonction nav_link pour le lien du Compteur de vues **//
        nav_link('/compteur_de_vues.php', 'Compteur de vues', $classe) .
        
        //** Appel à la fonction nav_link pour le lien du Dashboard **//
        nav_link('/dashboard.php', 'Dashboard', $classe) ;
        
}


/**
 *? Cette fonction génère un élément HTML <input> de type "checkbox", avec une logique pour vérifier si la case à cocher doit être sélectionnée (c'est-à-dire cochée *
 * checkbox *
 *
 * @param  mixed $name : le nom de la case à cocher (utilisé dans l'attribut "name" du champ input) *
 * @param  mixed $value : la valeur de la case à cocher (utilisé dans l'attribut "value" du champ input) *
 * @param  mixed $data : un tableau contenant les données qui pourraient indiquer si cette case doit être cochée ou non *
 * @return string fonction renvoie une chaîne de caractères en HTML *
 **/

function checkbox(string $name, string $value, array $data): string
{
    //** Initialisation d'une chaîne vide pour les attributs supplémentaires (comme 'checked') **//
    $attributes = '';
    
    //** Vérification si une donnée pour $name existe dans le tableau $data et si la valeur $value est présente dans ce tableau **//
    if(isset($data[$name]) && in_array($value, $data[$name])) {
        
        //** Si c'est le cas, cela signifie que cette case doit être cochée, donc on ajoute l'attribut 'checked' **//
        $attributes .= 'checked'; // Ajout de l'attribut 'checked' à $attributes
    }

    /**
     ** Utilisation de la syntaxe heredoc pour générer le code HTML **
        *todo L'attribut "name" du champ input est formé avec "[]", ce qui permet de soumettre plusieurs valeurs avec le même nom **
        *todo Si la case doit être cochée, l'attribut 'checked' sera ajouté au champ input **
     **/
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes>

HTML;
}


/**
 *? Cette fonction génère un élément HTML <input> de type "radio" et vérifie si l'option donnée doit être cochée (via l'attribut checked) *
 * radio *
 *
 * @param  mixed $name : le nom du bouton radio (utilisé dans l'attribut "name" du champ input) *
 * @param  mixed $value : la valeur du bouton radio (utilisée dans l'attribut "value" du champ input) *
 * @param  mixed $data : un tableau contenant les données du formulaire ou d'une source externe (ex: POST) pour vérifier quelle option est sélectionnée *
 * @return string fonction renvoie une chaîne de caractères contenant l'élément HTML <input> de type radio *
 **/

function radio(string $name, string $value, array $data): string
{
        
    //** Initialisation d'une chaîne vide pour les attributs supplémentaires (comme 'checked') **//
    $attributes = '';    
    
    /**
     *todo Vérification si une donnée pour $name existe dans le tableau $data et si $value correspond à la valeur actuelle **
     *todo Si c'est le cas, cela signifie que ce bouton radio doit être sélectionné, donc on ajoute l'attribut 'checked' **
     **/
    if(isset($data[$name]) && $value === $data[$name]) {
        $attributes .= 'checked'; // Ajout de l'attribut 'checked' à $attributes
    }    
    
    /** 
     ** Utilisation de la syntaxe heredoc pour générer le code HTML **
        *todo Si la case doit être cochée, l'attribut 'checked' sera ajouté à l'élément <input> ** 
     **/
    return <<<HTML
    <input type="radio" name="{$name}" value="$value" $attributes>
HTML;
}


/**
 *? Cette fonction select génère un élément HTML <select> (menu déroulant) avec plusieurs options, en marquant automatiquement la valeur sélectionnée en fonction des données fournies *
 * select *
 *
 * @param  mixed $name : le nom de l'élément <select>, utilisé dans l'attribut "name" du champ input **
 * @param  mixed $value : la valeur actuellement sélectionnée dans le menu déroulant (si applicable) **
 * @param  mixed $options : un tableau contenant les différentes options à afficher dans le menu **
 * @return string La fonction renvoie une chaîne de caractères contenant l'élément HTML <select> avec ses options **
 */

function select(string $name, $value,array $options): string { // Parcours de chaque option du tableau $options
    //** $k représente la clé (valeur de l'option), et $option représente le libellé de l'option affiché dans le menu **//
    foreach($options as $k => $option) {
        /** 
             *todo Vérifie si la clé $k correspond à la valeur sélectionnée $value **
             *todo Si oui, l'attribut 'selected' est ajouté, sinon $attributes est une chaîne vide **
         **/
        $attributes = $k == $value ? ' selected' : '';
        
        /** 
             *todo Ajoute l'élément <option> avec la clé $k comme valeur et le texte $option comme contenu **
             *todo Si $k est égal à $value, l'attribut 'selected' sera ajouté à l'option **
         **/
        $html_options[] = "<option value='$k' $attributes>$option</option>";
    }
    
    /** 
         *todo Génère l'élément <select> avec la classe 'form-control' et le nom $name **
         *todo Les options générées précédemment sont concaténées grâce à implode() **
     **/
    return "<select class='form-control' name='$name'>" . implode($html_options) . '</select>';
}


/**
 *? Cette fonction est une simple fonction utilitaire qui permet d'afficher proprement le contenu d'une variable en utilisant la fonction PHP intégrée var_dump **
 * dump *
 *
 * @param  mixed $variable **
 * @return void **
 */

function dump($variable) { // Cette fonction est utilisée pour afficher la structure et le contenu d'une variable (tableaux, objets, etc.)

    echo'<pre>'; // La balise HTML <pre> est utilisée pour afficher le texte en respectant les sauts de ligne et les espaces, cela rend la sortie plus lisible dans un navigateur.
    
    /** 
         *todo Appel à la fonction PHP 'var_dump' qui affiche des informations détaillées sur la variable **
         *todo 'var_dump' donne des détails sur le type et la valeur de la variable **
     **/
        var_dump($variable);
    echo'</pre>'; // Fermeture de la balise <pre>
}


function creneaux_html (array $creneaux) {
    // Si le tableau est vide, cela signifie que le magasin est fermé
    if(empty($creneaux)) {
        return 'Fermé';
    }
    // Construire le tableau intermédiaire
    $phrases = [];
    // de xh à yh
    foreach($creneaux as $creneau) {
        // Formater chaque créneau dans une phrase du type "de 9h à 12h"
        $phrases[] = " <strong>{$creneau[0]}h</strong> / <strong>{$creneau[1]}h</strong>";
    }
    // Implode pour construire la phrase finale    
    return 'Ouvert de ' . implode(' & ', $phrases);
}


/**
 * in_creneaux() *
 *? L'objectif de cette fonction est de vérifier si l'heure spécifiée ($heure) se situe dans l'un des créneaux horaires donnés *
    *
    * @param  mixed $heure un entier représentant l'heure à tester *
    * @param  mixed $creneaux un tableau contenant des sous-tableaux : $debut et $fin *
    * @return bool *
    *
**/
function in_creneaux(int $heure, array $creneaux): bool {

    //** Chaque créneau dans le tableau $creneaux, chaque créneau est un tableau contenant deux éléments **/
    foreach ($creneaux as $creneau) {

            //** On extrait la valeur $debut de chaque créneau **//
            $debut = $creneau[0];

            //** On extrait la valeur $fin de chaque créneau **//
            $fin = $creneau[1];

            //** On vérifie si $heure est comprise entre $debut et $fin **//
            if ($heure >= $debut && $heure <= $fin) {

            //** Si l'heure est comprise dans le créneau actuel, la fonction retourne immédiatement true **//
            return true;
        }
    }
    
    //** Si aucun des créneaux ne contient l'heure donnée, la fonction retourne false **//
    return false;
}
?>