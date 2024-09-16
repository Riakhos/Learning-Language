<?php
/**
 **--------------------------------------------------------------** 
 ** Créer une interface EtreVivant qui contiendra les méthodes : **
    ** respirer **
    ** dormir ** 
    ** manger **
    ** boire **
**--------------------------------------------------------------**
**/
interface EtreVivant
{
    public function respirer(): string;
    public function dormir(): string;
    public function manger(): string;
    public function boire(): string;
}

/**
 **--------------------------------------------------------------**
 ** Créer une interface Renseignement qui contiendra les méthodes : **
    ** espèce **
    ** sexe **
    ** âge **
**--------------------------------------------------------------**
 **/
interface Renseignement
{
    public function espece(): string;
    public function sexe(): string;
    public function age(): int;
}

/**
 **--------------------------------------------------------------**
 ** Créer le trait Voler qui contiendra une méthode voler() qui retournera 'Cet animal peut voler' **
 **--------------------------------------------------------------**
**/
trait Voler
{
    public function voler() : string
    {
        return ' Cet animal peut voler. ';
    }
}
/** 
 **--------------------------------------------------------------**
 ** Créer un trait Pondre qui contiendra une méthode pondre() qui retournera 'Cet animal peut pondre' **
 **--------------------------------------------------------------**
 **/
trait Pondre
{
    public function pondre() : string
    {
        return 'Cet animal peut pondre. ';
    }
}
/**
 **--------------------------------------------------------------**
 ** Créer un trait Vivipare qui contiendra une méthode vivipare() qui retournera 'Cet animal ne pond pas d'oeufs' **
 **--------------------------------------------------------------**
 **/
trait Vivipare
{
    public function vivipare() : string
    {
        return 'Cet animal ne peut pas pondre. ';
    }
}
/**
 **--------------------------------------------------------------**
 ** Créer un trait Ramper qui contiendra une méthode ramper() qui retournera 'Cet animal peut ramper' **
 **--------------------------------------------------------------**
 **/
trait Ramper
{
    public function ramper() : string
    {
        return 'Cet animal peut ramper. ';
    }
}
/**
 **--------------------------------------------------------------**
 ** Créer un trait Quadrupede qui contiendra une méthode quadrupede() qui retournera 'Cet animal a 4 pattes' **
 **--------------------------------------------------------------**
 **/
trait Quadrupede
{
    public function quadrupede() : string
    {
        return 'Cet animal a 4 pattes. ';
    }
}
/**
 **--------------------------------------------------------------**
 ** Créer un trait Nager qui contiendra une méthode nager() qui retournera 'Cet animal peut nager' **
 **--------------------------------------------------------------**
 **/
trait Nager
{
    public function nager() : string
    {
        return 'Cet animal peut nager. ';
    }
}
/**
 **--------------------------------------------------------------**
 ** Créer un trait Marcher qui contiendra une méthode marcher() qui retournera 'Cet animal peut marcher' **
 **--------------------------------------------------------------**
 **/
trait Marcher
{
    public function marcher() : string
    {
        return 'Cet animal peut marcher. ';
    }
}

/**
 **--------------------------------------------------------------**
 ** Créer des class : PoissonRouge, Baleine, Boa, Chien, **
 ** Ces class doivent implémenter les 2 interfaces (à vous de remplir les méthodes) **
 ** Importer les traits en fonction de l'animal **
 ** Créer un objet pour chaque class et afficher les différents méthodes soit les unes après les autres sinon créer une méthode afficherDetails() **
 **--------------------------------------------------------------**
 **/
class PoissonRouge implements EtreVivant, Renseignement
{
    const POISSON_ROUGE = 'poisson rouge';

    use Pondre, Nager;

    public function respirer() : string
    {
        return 'respire';
    }
    public function dormir() : string
    {
        return 'dort';
    }
    public function manger() : string
    {
        return 'mange';
    }
    public function boire() : string
    {
        return 'boit';
    }
    public function espece() : string
    {
        return 'poisson';
    }
    public function sexe() : string
    {
        return 'masculin';
    }
    public function age() : int
    {
        return 3;
    }
    public function afficherDetail() : string
    {
        return '<p>Le ' . Poissonrouge::POISSON_ROUGE . " est un animal qui :</p>
                <p>{$this->respirer()}</p>
                <p>{$this->dormir()}</p>
                <p>{$this->manger()}</p>
                <p>{$this->boire()}</p>
                <p>Il s'agit d'un {$this->espece()} {$this->sexe()} et il est agé de {$this->age()} ans.</p>
                <p>{$this->pondre()}</p>
                <p>{$this->nager()}</p>";
    }
}
//**--------------------------------------------------------------**
$poissonRouge = new PoissonRouge();
echo $poissonRouge->afficherDetail();
?>
<hr>
<?php
//**--------------------------------------------------------------**
class Baleine implements EtreVivant, Renseignement
{
    const BALEINE = 'baleine';

    use Pondre, Nager;

    public function respirer() : string
    {
        return 'respire';
    }
    public function dormir() : string
    {
        return 'dort';
    }
    public function manger() : string
    {
        return 'mange';
    }
    public function boire() : string
    {
        return 'boit';
    }
    public function espece() : string
    {
        return 'poisson';
    }
    public function sexe() : string
    {
        return 'féminin';
    }
    public function age() : int
    {
        return 20;
    }
    public function afficherDetail() : string
    {
        return '<p>La ' . Baleine::BALEINE . " est un animal qui :</p>
                <p>{$this->respirer()}</p>
                <p>{$this->dormir()}</p>
                <p>{$this->manger()}</p>
                <p>{$this->boire()}</p>
                <p>Il s'agit d'un {$this->espece()} {$this->sexe()} et il est agé de {$this->age()} ans.</p>
                <p>{$this->pondre()}</p>
                <p>{$this->nager()}</p>";
    }
}
//**--------------------------------------------------------------**
$baleine = new baleine();
echo $baleine->afficherDetail();
?>
<hr>
<?php
//**--------------------------------------------------------------**
class Boa implements EtreVivant, Renseignement
{
    const BOA ='boa';

    use Vivipare, Ramper, Nager;

    public function respirer() : string
    {
        return 'respire';
    }
    public function dormir() : string
    {
        return 'dort';
    }
    public function manger() : string
    {
        return 'mange';
    }
    public function boire() : string
    {
        return 'boit';
    }
    public function espece() : string
    {
        return 'serpent';
    }
    public function sexe() : string
    {
        return 'masculin';
    }
    public function age() : int
    {
        return 30;
    }
    public function afficherDetail() : string
    {
        return '<p>Le ' . Boa::BOA . " est un animal qui :</p>
                <p>{$this->respirer()}</p>
                <p>{$this->dormir()}</p>
                <p>{$this->manger()}</p>
                <p>{$this->boire()}</p>
                <p>Il s'agit d'un {$this->espece()} {$this->sexe()} et il est agé de {$this->age()} ans.</p>
                <p>{$this->vivipare()}</p>
                <p>{$this->ramper()}</p>
                <p>{$this->nager()}</p>";
    }
}
//**--------------------------------------------------------------**
$boa = new boa();
echo $boa->afficherDetail();
?>
<hr>
<?php
//**--------------------------------------------------------------**
class Chien implements EtreVivant, Renseignement
{
    const CHIEN = 'chien';
    use Vivipare, Ramper, Quadrupede, Marcher, Nager;
    public function respirer() : string
    {
        return 'respire';
    }
    public function dormir() : string
    {
        return 'dort';
    }
    public function manger() : string
    {
        return 'mange';
    }
    public function boire() : string
    {
        return 'boit';
    }
    public function espece() : string
    {
        return 'mammifère';
    }
    public function sexe() : string
    {
        return 'masculin';
    }
    public function age() : int
    {
        return '8';
    }
    public function afficherDetail() : string
    {
        return '<p>Le ' . Chien::CHIEN . " est un animal qui :</p>
                <p>{$this->respirer()}</p>
                <p>{$this->dormir()}</p>
                <p>{$this->manger()}</p>
                <p>{$this->boire()}</p>
                <p>Il s'agit d'un {$this->espece()} {$this->sexe()} et il est agé de {$this->age()} ans.</p>
                <p>{$this->vivipare()}</p>
                <p>{$this->ramper()}</p>
                <p>{$this->quadrupede()}</p>
                <p>{$this->marcher()}</p>
                <p>{$this->nager()}</p>";
    }
}
//**--------------------------------------------------------------**
$chien = new chien();
echo $chien->afficherDetail();
?>
//**--------------------------------------------------------------**
<hr>