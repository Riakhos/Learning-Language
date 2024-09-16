<?php

/** ----------------------------------------------------------------------------------------------------------- 
 * Créer une class véhicule qui contiendra une propriété privée litre (elle aura son get et  son set) 
 * Créer également une méthode public info qui affichera une phrase de type : le véhicule a ... litres d'essences. 
 * Créer un objet de la class véhicule et vous lui attribuerait 5 litres d'essence (vous pouvez par le setteur ou pourquoi pas le construct) 
 * Afficher la phrase
 **/

/**
 ** Création d'un classe nommé vehicle
 *  
    ** Création de la propiété privée litle
    * @var mixed
    * 
        ** Afficher la propriété litle getLitle()
        * @return int
        ** Attribuer la valeur à la propriété litle setLitle()
        * @param  mixed $litle
        * @return void
        *
    ** On crée une fonction info() qui récapitule les informations de la propriété litle
    * @return string
    * 
    ** Méthode pour faire le plein à partir d'une pompe transfert
        * @param  mixed $pump
        * @return void
 **/

class vehicle 
{        
    private $litle;
    //** Capacité maximale pour le réservoir **/
    private const LITLE_CAPACITY = 40;   
    
    public function __construct(int $litle = null)
    {
        $this->litle = $litle;
    }
    
    public function getLitle() :int
    {
        return $this->litle;
    }
    
    public function setLitle(int $litle) :void
    {
        $this->litle = $litle;
    }
    
    public function info() :string
    {
        return 'Le véhicule a ' . $this->litle . ' litres d\'essences.';
    }
    
    public function transfert(pump $pump) :void
    {
        $filling_quantity = self::LITLE_CAPACITY - $this->litle;
        
        if ($filling_quantity > 0) {
            //** Demande la quantité nécessaire à la pompe **/
            $petrol_distributed = $pump->petrol_distribut($filling_quantity);
            //** Ajoute l'essence reçue au réservoir de la voiture **/
            $this->litle += $petrol_distributed;
            echo 'La voiture a fait le plein de ' . $petrol_distributed . ' litres';
        } else {
            echo 'Le réservoir de la voiture est déjà plein';
        }
    }

}

//** On crée un objet de la classe vehicle qui aura 5 comme valuer **/
$vehicle = new vehicle(5);

//** On affiche les valeurs de l'objet $vehicle **/
echo $vehicle->info();
?>

<?php
/**------------------------------------------------------------------------------------------------------------
 *Créer une class Pompe qui contiendra une propriété privée réservoir (elle aura son get et son set)
 * Créer la méthode info qui affichera le réservoir de la pompe : La pompe à essence a ... litres d'essence
 * Créer un objet de la class Pompe et vous lui affecterait une quantité de 800 litres
 * Afficher la phrase
 * 
 **/

/**
 ** Création d'un classe nommé pump
 *  
    ** Création de la propiété privée litle
    * @var mixed 
        ** Afficher la propriété litle getlitle()
        * @return int
        ** Attribuer la valeur à la propriété litle setlitle()
        * @param  mixed $
        * @return void
        *  
    ** On crée une fonction info() qui récapitule les informations de la propriété litle
        * @return string
        * 
    ** Méthode pour distribuer l'essence à une voiture petrol_distribut
        * @param  mixed $quantity_request
        * @return void
 **/

class pump 
{        
    private $litle;    
    
    public function __construct(int $litle = null)
    {
        $this->litle = $litle;
    }
    
    public function getlitle() :int
    {
        return $this->litle;
    }
    
    public function setlitle(int $litle) :void
    {
        $this->litle = $litle;
    }
    
    public function info() :string
    {
        return 'La pompe à essence contient ' . $this->litle . ' litres d\'essences.';
    }
    
     //** Méthode pour distribuer l'essence à une voiture **/     
    public function petrol_distribut($quantity_request) :mixed
    {
        if ($this->litle >= $quantity_request) {
            $this->litle -= $quantity_request;
            return $quantity_request;
        } else {
            $petrol_distributed = $this->litle;
            $this->litle = 0; //** La pompe est vide après la distribution **/
            return $petrol_distributed;
        }
    }    

}

//** On crée un objet de la classe pump qui aura 800 comme valuer **/
$pump = new pump(800);

//** On affiche les valeurs de l'objet $vehicle **/
echo $pump->info();
?>

<?php
/**------------------------------------------------------------------------------------------------------------
 * Créer une méthode public 'transfert'
 * On dira que toutes les voitures ont une capacité de 40 litres
 * Le but est que les véhicules viennent à la pompe à essence faire le plein (40 - la quantité d'essence dans le véhicule)
 * Cette quantité est à extraire de la quantité de la pompe
 * 
 **/
//** La voiture vient faire le plein **/
$vehicle->transfert($pump);

//** Affichage de la quantité d'essence restante dans la pompe **/
echo ' et la quantité d\'essence restante dans la pompe est de ' . $pump->getlitle() . ' litres.';
?>

<?php
//**? Tests **/
$vehicle1 = new vehicle(40);
$pump1 = new pump(765);
$vehicle1->transfert($pump1);
echo ' et la quantité d\'essence restante dans la pompe est de ' . $pump1->getlitle() . ' litres.';
?>

<?php
//**? Tests **/
$vehicle2 = new vehicle(25);
$pump2 = new pump(765);
$vehicle2->transfert($pump2);
echo ' et la quantité d\'essence restante dans la pompe est de ' . $pump2->getlitle() . ' litres.';
?>

<?php
//**? Tests **/
$vehicle3 = new vehicle(2);
$pump3 = new pump(740);
$vehicle3->transfert($pump3);
echo ' et la quantité d\'essence restante dans la pompe est de ' . $pump3->getlitle() . ' litres.';
?>