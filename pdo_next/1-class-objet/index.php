<?php
/* 
    Une classe est un regroupement d'information :
        -propriétés (variables)
        -méthodes (fonctions)
        -constantes

    Le contenu de la class aborde le même sujet :
        -la class PDO aborde le sujet d ela base de données
        -la class DateTime aborde le sujet de la date et le temps

    On utilise pas directement la class, celle-ci est un modèle qui génère une instance/objet de la class (un exemplaire)
    On peut créer autant d'objets qu'on veut
    Un objet hérite de toutes les infos de la class

    Pour générer la syntaxe est avec le mot-clé 'new' :
        -$objet = new Class
    
    Les informations (propriétés/méthodes/constantes) ont une visibilité
    -private (non-visible par le public)
    -protected (héritage)
    -public (visible pour tous)

        On distingue trois 'localisations' :
            -dans la class
            -dans la class héritière
            -dans l'objet
            
    La visibilité private est accessaible que depuis la class
    La visivité protected est accessible dans la class et les class héritères
    La visivbilité public est accessible dans la class, les class héritières et les objets
*/

class Voiture
{    
    public $marque;
    private $carburant ='Diesel';

    public function demarrage() {
        return 'voiture allumée';
    }

    private function turbo() {
        return 'turbo';
    }

    public function info() {
        return 'La marque du véhicule est ' . $this->marque . ', avec un moteur ' . $this->carburant . '.';
    }
}

//** On crée une propriété et on la définit dans une classe **/
$voiture1 = new Voiture();

//** On affiche l'objet de la propriété **/
// echo $voiture1; //! On ne peut pas afficher un objet sur le navigateur

//** On définit une valeur à la propriété marque **/
$voiture1->marque = 'Audi';

//** On affiche la valeur de la propriété marque **/
echo 'La voiture 1 est de la marque ' . $voiture1->marque . '.';
?>

<?php
// echo 'La voiture 1 utilise du ' . $voiture1->$carburant . '.';//! On ne peut pas accéder à un epropirété privée depuis l'objet

echo $voiture1->info();
?>