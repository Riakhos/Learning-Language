<?php
/**
 **-----------------------------------------------------------------------------------------**
 ** Créez une classe abstract Individu qui a les propriétés suivantes : **
    ** manger (string) **
    ** boire (string) **
    ** dormir (int) **
    ** prenom (string) **
**-----------------------------------------------------------------------------------------**
*todo Une class abstract ne peut pas être instanciée (on ne peut pas créer d'objet issu de cette class) *
*todo  Une class abastract peut contenir des méthodes abstract cependant elles sont déclarées sans contenu (c'est à dire sans accolades : "abstract public function nomFunction();") *
*todo L'interêt est que les class enfants ont l'obligation de déclarer cette méthode abstract (Attention une méthode abstract ne peut être que dans une class abstract) *
*todo Une class abstract peut contenir des méthodes normales *
**-----------------------------------------------------------------------------------------**
**/
abstract class Individu
{
    public function manger()
    {

    }

    public function boire()
    {
        
    }
    
    public function dormir()
    {

    }

    abstract public function prenom();
}

class Homme extends Individu
{
    public function prenom()
    {
    }
}

class Femme extends Individu
{
    public function prenom()
    {
    }
}
?>