pp<?php
/** **-----------------------------------------------------------------------------------------**
 ** Créez une classe Vehicle qui a les propriétés suivantes : **
    ** marque (string) **
    ** modele (string) **
    ** vitesseMax (int) **
**-----------------------------------------------------------------------------------------**
**/
class Vehicle
{
    protected $marque;
    protected $modele;
    protected $vitesseMax;
    protected $vitesse;

    /**
    **-----------------------------------------------------------------------------------------**
    ** Créez un constructeur qui initialise ces propriétés lors de l'instanciation. **
    **-----------------------------------------------------------------------------------------**
    **/
    public function __construct(string $marque, string $modele, int $vitesseMax)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->vitesseMax = $vitesseMax;
    }

    public function getMarque() :string
    {
        return $this->marque;
    }
    
    public function setMarque(string $marque) :void
    {
        $this->marque = $marque;
    }

    public function getModele() :string
    {
        return $this->modele;
    }
    
    public function setModele(string $modele) :void
    {
        $this->modele = $modele;
    }

    public function getVitesseMax() :int
    {
        return $this->vitesseMax;
    }
    
    public function setVitesseMax(int $vitesseMax) :void
    {
        $this->vitesseMax = $vitesseMax;
    }       
    
    /**
    **-----------------------------------------------------------------------------------------**
    ** Ajoutez une méthode afficherDetails() qui affiche les détails du véhicule (marque, modèle et vitesse maximale). **
    **-----------------------------------------------------------------------------------------**
    **/
    public function afficherDetails() :string
    {
        return "<p>Le véhicule est le modèle  $this->modele  de la marque  $this->marque  et il peut aller jusqu\'à  $this->vitesseMax km/h.</p>";
    }

    /**
    **-----------------------------------------------------------------------------------------**
    ** Ajoutez une méthode rouler($vitesse) qui retourne un message indiquant que le véhicule roule à une certaine vitesse. **
    **-----------------------------------------------------------------------------------------**
    **/
    public function rouler(int $vitesse) : string
    {
        /**
        **-----------------------------------------------------------------------------------------**
        ** Bonus : mettre une vérification dans rouler() si la vitesse est supérieure à vitesseMax c'est impossible  **
        **/
        if($vitesse > $this->vitesseMax)
        {
            return "<p>Impossible : la vitesse de  $vitesse km/h dépasse la vitesse maximale autorisée de  $this->vitesseMax km/h.</p>";
        } else {
            $this->vitesse = $vitesse;
            return "<p>Le véhicule roule à  $this->vitesse km/h.</p>";
        }
    }
    
}
/**
**-----------------------------------------------------------------------------------------**
** Créez une classe Voiture qui hérite de Vehicle. **
**-----------------------------------------------------------------------------------------**
**/
class Voiture extends Vehicle
{

    /**
    **-----------------------------------------------------------------------------------------**
    ** Ajoutez une propriété spécifique nombreDePortes (int) pour indiquer combien de portes la voiture a. **
    **-----------------------------------------------------------------------------------------**
    **/
    private  $nombreDePortes;

    public function __construct(string $marque, string $modele, int $vitesseMax, int $nombreDePortes)
    {
        parent::__construct($marque, $modele,$vitesseMax);
        $this->nombreDePortes = $nombreDePortes;
    }

    public function getNombreDePortes() :int
    {
        return $this->nombreDePortes;
    }
    
    public function setNombreDePortes(int $nombreDePortes) :void
    {
        $this->nombreDePortes = $nombreDePortes;
    }

    /**
    **-----------------------------------------------------------------------------------------**
    ** Surchargez la méthode afficherDetails() pour inclure également le nombre de portes dans l'affichage. **
    **-----------------------------------------------------------------------------------------**
    **/
    public function afficherDetails() :string
    {
        return parent::afficherDetails() . "<p> Elle possède  $this->nombreDePortes  portes. </p>";
    }
}

/**
**-----------------------------------------------------------------------------------------**
** Créez une classe Moto qui hérite de Vehicle. **
**-----------------------------------------------------------------------------------------**
**/
class Moto extends Vehicle
{
    /**
    **-----------------------------------------------------------------------------------------**
    ** Ajoutez une propriété spécifique typeMoto (string) pour indiquer le type de moto (ex. : "Sport", "Cruiser"). **
    **-----------------------------------------------------------------------------------------**
    **/
    private $typeMoto;

    public function __construct(string $marque, string $modele, int $vitesseMax, string $typeMoto)
    {
        parent::__construct($marque, $modele,$vitesseMax);
        $this->typeMoto = $typeMoto;
    }

    public function getTypeMoto() :string
    {
        return $this->typeMoto;
    }
    
    public function setTypeMoto(string $typeMoto) :void
    {
        $this->typeMoto = $typeMoto;
    }

    /**
    ** Surchargez la méthode afficherDetails() pour inclure le type de moto dans l'affichage. **
    **-----------------------------------------------------------------------------------------**
    **/
    public function afficherDetails() :string
    {
        return parent::afficherDetails() . "<p> Il s\'agit d\'une moto de type </p> $this->typeMoto . ";
    }
}

/**
**-----------------------------------------------------------------------------------------**
** Instanciez une voiture et une moto, puis appelez leurs méthodes afficherDetails() et rouler() pour vérifier que tout fonctionne correctement. **
**-----------------------------------------------------------------------------------------**
**/
$voiture = new Voiture('Audi', 'A5', 180, 5);
echo $voiture->afficherDetails();
echo $voiture->rouler(200);
//**-----------------------------------------------------------------------------------------**//
?>

<?php
//**-----------------------------------------------------------------------------------------**//
$moto = new Moto('Ducati', 'SuperSport 950 S', 220, 'Sportive');
echo $moto->afficherDetails();
echo $moto->rouler(180);
//**-----------------------------------------------------------------------------------------**//
