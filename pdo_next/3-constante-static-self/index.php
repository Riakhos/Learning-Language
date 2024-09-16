<?php
//-------------------------------------------------------------------------------------------
/**
 ** Maison **
 ** Depuis l'objet on accède **
    *? public -> Aux informations publics *
    *? this -> Aux propriétés *
 ** Depuis la classe on accède **
    *? static ou const :: Aux informations statiques et aux constantes *
    *? self :: Aux propriétés *
 **/
//-------------------------------------------------------------------------------------------
class Maison
{
    private static $nbPiece = 7;
    public static $espaceTerrain = 500;
    public $couleur = 'blanc';
    const HAUTEUR = 10;
    private $nbPorte = 10;

    public static function getNbPiece() : int
    {
        return self::$nbPiece;
    }

    public function getNbporte() : int
    {
        return $this->nbPorte;
    }
}
//-------------------------------------------------------------------------------------------
$maison = new Maison();
echo 'La couleur de la maison est ' . $maison->couleur . '.';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
echo 'Le nombre de portes dans la maison est de ' . $maison->getNbPorte() . ' portes.';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
echo 'L\'espace du terrain de la maison est de ' . Maison::$espaceTerrain . 'm² et la hauteur de la maison est de ' . Maison::HAUTEUR . '².';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
echo 'Le nombre de pièce dans la maison est de ' . Maison::getNbPiece() . 'pièces.';
//-------------------------------------------------------------------------------------------
?>

<?php
//-------------------------------------------------------------------------------------------
