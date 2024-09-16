<?php
//--------------------------------------------------------------------------------
/** 
 ** Une class peut hériter d'une autre class **
    ** On peu les différencier en  les appelant class mère et class fille **
    ** Pour ça on utilise le terme extends **
 ** Dans une class héritière (fille), on peut accéder aux informations (mère) qui ont la vivsibilité public ou protected **
 ** Si le nom d'une méthode existe dans la class mère et dans la class fille alors c'est celle de la class fille qui sera prise en compte **
 ** Une class peut hériter d'une autre class qui hérite également d'une autre class **
    ** Exemple : **
    ** Class A ** 
    ** Class B extends A **
    ** Class C extends B **
 **/
class Animal
{
    private $propertyPrivate = 'Property Private';
    protected $propertyProtected = 'Property Protected';
    public $propertyPublic = 'Property Public';

    public function manger()
    {
        return 'Je mange ';
    }
    
    public function dormir()
    {
        return 'zzzzzzzzz';
    }
}
//--------------------------------------------------------------------------------
//** La class Chien (fille) hérite de tout ce qui se trouve dans la class Animal (mère) **//
class Chien extends Animal
{

    public function aboyer()
    {

    }
   
    public function manger()
    {
        return parent::manger() . 'un os.';
    }
    
    public function getPropertyProtected()
    {
        return $this->propertyProtected;
    }
        
}
//--------------------------------------------------------------------------------
//** La class Chiot (fille) hérite de tout ce qui se trouve dans la class Chien (mère) **//
class Chiot extends Chien
{

}
//--------------------------------------------------------------------------------
//** La class Chat (fille) hérite de tout ce qui se trouve dans la class Animal (mère) **//
class Chat extends Animal
{
    public function miauler()
    {
        return 'Miaou';
    }

    public function manger()
    {
        return parent::manger() . 'une souris.';
    }
}
//--------------------------------------------------------------------------------
$chien1 = new Chien();
echo $chien1->propertyPublic;
//--------------------------------------------------------------------------------
?>

<?php
//--------------------------------------------------------------------------------
echo $chien1->getPropertyProtected();
//--------------------------------------------------------------------------------
?>

<?php
//--------------------------------------------------------------------------------
echo $chien1->manger();
//--------------------------------------------------------------------------------
?>

<?php
//--------------------------------------------------------------------------------
$chat1 = new Chat();
echo $chat1->manger();
//--------------------------------------------------------------------------------
?>

<?php
//--------------------------------------------------------------------------------
$chiot1 = new Chiot();
echo $chiot1->manger();
//--------------------------------------------------------------------------------
?>

<?php

/** 
 ** --------------------------------------------------------------------------------
 ** Héritage sans extends
 ** --------------------------------------------------------------------------------
 **/

class A
{
    public function bonjour() : string
    {
        return "Bonjour";
    }
}

class B 
{
    public $a;

    public function __construct()
    {
        $this->a = new A();
    }

    public function recuperation()
    {
        return $this->a->bonjour();
    }
}

$b = new B();
echo $b->recuperation();
//--------------------------------------------------------------------------------
?>