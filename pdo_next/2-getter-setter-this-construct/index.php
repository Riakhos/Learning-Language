<?php

//** Création de la class **/
class Etudiant
{
    public $prenom;
    public $nom;    
}

//** Création d'un objet définit dans une classe **/
$etudiant1 = new Etudiant();

//** On définit une valeur à la propiété étudiant **/
$etudiant1->prenom = 'jean';
$etudiant1->nom = 'bal';

//** On affiche la valeur de la propriété **/
echo '1\'étudiant 1 s\'appelle ' . $etudiant1->prenom . ' ' . $etudiant1->nom;

?>

<?php

//** Création de la class **/
class Etudiantpr
{
    private $prenom;
    private $nom;

    //** Afficher la propriété prénom **/
    public function getPrenom() :string
    {
        return $this->prenom;
    }
    //**  Attribuer une valeur à la propriété prénom **/
    public function setPrenom(string $argumentPrenom) :void
    {
        $this->prenom = $argumentPrenom;
    }
}

/** 
    * $objet->propriété
    * $objet->méthode

    * Les propriétés prénom et nom sont de visibilité privée, autrement dit, elles ne sont qu'accessible que depuis la class elle-même

    * Pour pouvoir afficher ou attribuer des valeurs à ses propriétés depuis l'objet, on utilisera des getters et des setteurs
        -getteur : afficher
        -setteur : attribuer

    * Le terme $this fait office de la class elle-même
    
    * Comment bien écrire une méthode
        -commenter
        -nom explicite (de préférence en anglais)
        -typer
        -indenter
**/

//** On crée une propriété **/
$etudiantpr1 = new Etudiantpr();

//**  On la définit dans une classe **/
$etudiantpr1->setPrenom('Jean');

//** On affiche la valeur de la propriété **/
echo $etudiantpr1->getPrenom();
?>

<?php
//**todo créer le getter et le setter de la propriété nom **//

/**
 * Création d'un classe nommé studiant

    ** Afficher la propriété prénom getFirstname()
        * @return string
    ** Attribuer la valeur à la propriété setFirstname()
        * @param  mixed $prename
        * @return void

    ** Afficher la propriété nom getLastname()
        * @return string
    ** Attribuer la valeur à la propriété setLastname()
        * @param  mixed $name
        * @return void 

    ** On crée une fonction info() qui récapitule les informations de l'étudiant
        * @return string
 **/

class studiant
{        
    private $firstname;
    private $lastname;    
    
    public function getFirstname() :string
        {
            return $this->firstname;
        }

    public function setFirstname(string $prename) :void
        {
            $this->firstname = $prename;
        }

    public function getLastname() :string
        {
            return $this->lastname;
        }

    public function setLastname(string $name) :void
        {
            $this->lastname = $name;
        }
    
    public function info() :string
        {
            return 'L\'étudiant s\'appelle ' . $this->firstname . ' ' . $this->lastname . '.';
        }

}

//**todo dans l'objet 1 définir un nom et un prénom l'afficher **//

//** On crée la propriété $studiant1 et on la définit dans la classe studiant **/
$studiant1 = new studiant();

//** On définit une valeur lastname à la propriété $studiant1 **/
$studiant1->setLastname('Bon');

//** On définit une valeur firstanme à la propriété $studiant1 **/
$studiant1->setFirstname('Ric');

//**todo écrire une phrase sur l'etudiant 1 **//
echo 'L\'étudiant 1 s\'appelle ' . $studiant1->getFirstname() . ' ' . $studiant1->getLastname() . '.';
?>

<?php
//**todo créer un nouvel objet etudiant2, définir nom et prénom et afficher la phrase **//

//** On crée la propriété $studiant2 et on la définit dans la classe studiant **/
$studiant2 = new studiant();

//** On définit une valeur lastname à la propriété $studiant2 **
$studiant2->setLastname('Nom');

//** On définit une valeur firstanme à la propriété $studiant2 **/
$studiant2->setFirstname('Prénom');

//** On affiche les valeurs de la propriété $studiant2 **/
echo 'L\'étudiant 2 s\'appelle ' . $studiant2->getFirstname() . ' ' . $studiant2->getLastname() . '.';
?>

<?php
//**todo créer une méthode info() qui retounre la phrase : l'étudiant s'appelle ..... **/
echo $studiant1->info();
?>

<?php
/**
 * Création d'un classe nommé studiant

    ** Afficher la propriété prénom getFirstname()
        * @return string
    ** Attribuer la valeur à la propriété setFirstname()
        * @param  mixed $prename
        * @return void

    ** Afficher la propriété nom getLastname()
        * @return string
    ** Attribuer la valeur à la propriété setLastname()
        * @param  mixed $name
        * @return void 

    ** On crée une fonction info() qui récapitule les informations de l'étudiant
        * @return string
 **/

 class studiant1
 {        
     private $firstname;
     private $lastname;
     
     /** Il existe des méthodes magiques, elles sont reconnaissables par la syntaxe 
      * __nomMethodes  elles commencent par 2 underscores.
      * La méthode __construct est exécutée lors de la création des objets elle n'est pas obligatoire et il ne peut y en avoir qu'une
    **/
     public function __construct(string $firstname, string $lastname)
     {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
     }
     
     public function getFirstname() :string
         {
             return $this->firstname;
         }
 
     public function setFirstname(string $prename) :void
         {
             $this->firstname = $prename;
         }
 
     public function getLastname() :string
         {
             return $this->lastname;
         }
 
     public function setLastname(string $name) :void
         {
             $this->lastname = $name;
         }
     
     public function info() :string
         {
             return 'L\'étudiant s\'appelle ' . $this->firstname . ' ' . $this->lastname . '.';
         }
 
 }

 //** On crée la propriété $studiant1, on la définit dans la classe studiant1 et on  lui donne une valeur **/
$studiant1 = new studiant1('Ric', 'Bon');

//** On affiche les valeurs de la propriété $studiant1 **/
echo $studiant1->info();

echo '<br>';

//** On crée la propriété $studiant2, on la définit dans la classe studiant1 et on  lui donne une valeur **/
$studiant2 = new studiant1('Prénom', 'Nom');

//** On affiche les valeurs de la propriété $studiant2 **/
echo $studiant2->info();

echo '<br>';

//** On crée la propriété $studiant3, on la définit dans la classe studiant1 et on  lui donne une valeur **/
$studiant3 = new studiant1('Paul', 'Icier');

//** On affiche les valeurs de la propriété $studiant3 **/
echo $studiant3->info();
?>