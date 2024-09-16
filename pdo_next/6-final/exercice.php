<?php
/**
 **-----------------------------------------------------------------------------------------**
 ** Créez une class parent VehiculeFr qui ne peut pas être instanciée, elle a les propriétés suivantes : **
    ** carburant (string) **
    ** nombreDeTestObligatoire (int) **
**-----------------------------------------------------------------------------------------**
**/
abstract class VehiculeFr
{
    const CARBURANT_ESSENCE = 'essence';
    const CARBURANT_DIESEL = 'diesel';  

    /**
     **-----------------------------------------------------------------------------------------**
    ** Créez une méthode public demarrer() qui retournera 'démarrage', cette méthode ne pourra pas être modifiable : **
        ** demarre() **
    **-----------------------------------------------------------------------------------------**
    **/
    final public function demarrer()
    {
        return "Démarrage";
    }

    /**
     **-----------------------------------------------------------------------------------------**
    ** Créez une méthode public carburant() qui devra obligatoirement être déclarée dans les class enfant : **
        ** carburant() **
    **-----------------------------------------------------------------------------------------**
    **/
    abstract public function carburant();

    /**
     **-----------------------------------------------------------------------------------------**
    ** Créez une méthode public nombreDeTestObligatoire() qui retournera 100 (integer) : **
        ** nombreDeTestObligatoire() int **
    **-----------------------------------------------------------------------------------------**
    **/
    public function nombreDeTestObligatoire() : int
    {
        return 100;
    }

    abstract public function afficherDetail() : string;
}

/**
 **-----------------------------------------------------------------------------------------**
 ** Créez une class enfant Peugeot qui va héritér de VehiculeFr mais qui ne pourra pas être parent et elle a les propriétés suivantes : **
    ** Le carburant de Peugeot est de l'essence (string) **
    ** Le nombre de test obligatoire chez peugeot est de 170 (int) **
**-----------------------------------------------------------------------------------------**
**/
final class Peugeot extends VehiculeFr
{  
    const MARQUE = 'Peugeot';

    public function carburant() : string
    {
        return parent::CARBURANT_ESSENCE;
    }
    
    public function afficherDetail() : string
    {
        return "<p>{$this->demarrer()}</p>
                <p>{$this->carburant()}</p>
                <p>{$this->nombreDeTestObligatoire()}</p>";
    }

    public function nombreDeTestObligatoire() : int
    {
        return parent::nombreDeTestObligatoire() + 70;
    }
}

/**
 **-----------------------------------------------------------------------------------------**
 ** Créez une class enfant Renault qui va héritér de VehiculeFr mais qui ne pourra pas être parent et elle a les propriétés suivantes : **
    ** Le carburant de Renault est de le diesel (string) **
    ** Le nombre de test obligatoire chez peugeot est de 130 (int) **
**-----------------------------------------------------------------------------------------**
**/
final class Renault extends VehiculeFr
{       
    const MARQUE = 'Renault';
    public function carburant() : string
    {
        return parent::CARBURANT_DIESEL;
    }

    public function afficherDetail() : string
    {
        return "<p>{$this->demarrer()}</p>
                <p>{$this->carburant()}</p>
                <p>{$this->nombreDeTestObligatoire()}</p>";
    }

    public function nombreDeTestObligatoire() : int
    {
        return parent::nombreDeTestObligatoire() + 30;
    }
   
}

/**
 **-----------------------------------------------------------------------------------------**
 ** Créez un objet Peugeot : **
    ** Afficher le démarrage de Peugeot **
    ** Afficher carburant de Peugeot **
    ** Afficher Le nombre de test obligatoire de Peugeot **
**-----------------------------------------------------------------------------------------**
**/
$peugeot = new Peugeot();
echo $peugeot->afficherDetail();
?>

<?php
/**
 **-----------------------------------------------------------------------------------------**
 ** Créez un objet Renault : **
 ** Afficher le démarrage de Renault **
 ** Afficher carburant de Renault **
 ** Afficher Le nombre de test obligatoire de Renault **
 **-----------------------------------------------------------------------------------------**
 **/
$renault = new Renault();
echo $renault->afficherDetail();
?>