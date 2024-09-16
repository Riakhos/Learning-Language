<?php

class Voiture
{
    private static $marque = 'BMW';
    private $couleur = 'noir';
    public static $number = 0;
    
    public function __construct()
    {
        ++self::$number;
    }

    public static function getMarque() : string
    {
        return self::$marque;
    }
    
    public static function setMarque(string $marque) : void
    {
        self::$marque = $marque;
    }

    public function getCouleur() : string
    {
        return $this->couleur;
    }
    
    public function setCouleur(string $couleur) : void
    {
        $this->couleur = $couleur;
    }    
        
}
//-------------------------------------------------------------------------------------------
/**
 *todo Exercices *
 *todo  Créer un objet voiture1 *
    *todo  Afficher une phrase de type : La voiture1 est de marque ... et de couleur ... *
*todo  Créer un objet de voiture2 (modifier la couleur en rouge) *
    *todo  Afficher une phrase de type : La voiture2 est de marque ... et de couleur ... *
*todo  Créer un objet voiture3 *
    *todo  Afficher une phrase de type : La voiture3 est de marque ... et de couleur ... *
*todo  Créer un objet voiture4 (modifier la marque en 'Mercedes') *
    *todo  Afficher une phrase de type : La voiture4 est de marque ... et de couleur ... *
*todo  Créer un objet voiture5 *
    *todo  Afficher une phrase de type : La voiture5 est de marque ... et de couleur ... *
 *todo  Créer les get et set des 2 propriétés *
 **/
//-------------------------------------------------------------------------------------------
/** 
** Créer un objet voiture1 ** 
    ** Afficher une phrase de type : La voiture1 est de marque ... et de couleur ... **
**/
$Voiture1 = new Voiture();
echo '<p>La voiture ' . Voiture::$number . ' est de marque ' . Voiture::getMarque() . ' et de couleur ' . $Voiture1->getCouleur() . '.</p>';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
/** 
** Créer un objet de voiture2 (modifier la couleur en rouge) **
** Afficher une phrase de type : La voiture2 est de marque ... et de couleur ... **
* **/
$Voiture2 = new Voiture();
$Voiture2->setCouleur('rouge');
echo '<p>La voiture ' . Voiture::$number . ' est de marque ' . Voiture::getMarque() . ' et de couleur ' . $Voiture2->getCouleur() . '.</p>';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
/**
** Créer un objet voiture3 **
    ** Afficher une phrase de type : La voiture3 est de marque ... et de couleur ... **
**/
$Voiture3 = new Voiture();
echo '<p>La voiture ' . Voiture::$number . ' est de marque ' . Voiture::getMarque() . ' et de couleur ' . $Voiture3->getCouleur() . '.</p>';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
/**
** Créer un objet voiture4 (modifier la marque en 'Mercedes') ** 
    ** Afficher une phrase de type : La voiture4 est de marque ... et de couleur ... **
**/
$Voiture4 = new Voiture();
Voiture::setMarque('Mercedes');
echo '<p>La voiture ' . Voiture::$number . ' est de marque ' . Voiture::getMarque() . ' et de couleur ' . $Voiture4->getCouleur() . '.</p>';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
/** 
 ** Créer un objet voiture5 ** 
   ** Afficher une phrase de type : La voiture5 est de marque ... et de couleur ... **
**/
$Voiture5 = new Voiture();
Voiture::setMarque('BMW');
echo '<p>La voiture ' . Voiture::$number . ' est de marque ' . Voiture::getMarque() . ' et de couleur ' . $Voiture5->getCouleur() . '.</p>';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
/**
 ** Dans la class, il y a : public static $number = 0; **
 ** Dans les 5 phrases, remplacer les numéros par cette propriété **
 ** A l'instanciation d'un objet, il faudrait incrémenter de 1 cette propriété **
 **/
//-------------------------------------------------------------------------------------------
