<?php 

class Vehicule 
{
    private $litre;
    private $capacity;

    public function __construct(int $capacity,int $litre = null)
    {
        $this->capacity = $capacity;
        $this->litre = $litre;
    }

    public function getLitre(): int
    {
        return $this->litre;
    }

    public function setLitre(int $litre): void
    {
        $this->litre = $litre;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    public function info(): string
    {
        return 'Le véhicule a ' . $this->litre . ' litres d\'essence, sur un réservoir de ' . $this->capacity . 'L d\'essence.';  
    }
}


$vehicule1 = new Vehicule(40);
$vehicule1->setLitre(5);
echo $vehicule1->info();
?>

<?php
class Pompe 
{
    private $reservoir;

    public function __construct(int $reservoir = null){
        $this->reservoir = $reservoir;
    }

    public function getReservoir(): int
    {
        return $this->reservoir;
    }

    public function setReservoir(int $reservoir): void
    {
        $this->reservoir = $reservoir;
    }

    public function info(): string
    {
       /* if($this->reservoir) {
            return 'La pompe à essence contient ' . $this->reservoir . ' litres';
        } else {
            return 'La pompe est vide.';
        }*/
        if ($this->reservoir) {
            if ($this->reservoir == 1) {
                $result = '1 Litre';
            } else {
                $result = $this->reservoir . ' Litres';
            }
            
        } else {
            $result = '0 Litre';
        }             
        return 'La pompe à essence contient ' . $result;
    }

    //**! ajouter des conditions , vérifier s'il reste assez d'essence

    public function transfert(Vehicule $vehicule)
    {
        /*
        voiture 5L sur 40L, 40 - 5 = 35L
        pompe 800L - 35L
        voiture  5 + 35L 
        */

        //** Si la pompe contient de l'essence **//
        if($this->reservoir > 0) 
        {
            // Calculer la quantité d'essence à transférer
            $quantiteTransfert = $vehicule->getCapacity() - $vehicule->getLitre();
            //                   40 - 5
            var_dump($quantiteTransfert);

            //** Si la quantité à transférer est supérieur à zéro **//
            if($quantiteTransfert)
            {
                //** Si le réservoir de la pompe contient plus d'essence ou autant que la quantité à transférer dans le véhicule **//
                if($this->reservoir >= $quantiteTransfert)
                {
                    //**? Rajouter la quantité dans la voiture **//
                    $newQuantiteVoiture = $vehicule->getLitre() + $quantiteTransfert;
                    //                           5            +      35
                    $vehicule->setLitre($newQuantiteVoiture);
                    
                    //**? */ Soustraire la quantité de la pompe **//
                    $newQuantitePompe = $this->reservoir - $quantiteTransfert;
                    //                     800           -      35
                    $this->reservoir =  $newQuantitePompe;
                    var_dump($this->reservoir);        
                } else {
                    //**?  S'il n'y a pas assez d'essence **//
                    $newQuantiteVoiture = $vehicule->getLitre() + $this->reservoir;
                    $vehicule->setLitre($newQuantiteVoiture);
                    $this->reservoir = 0;
                    return '';
                }
            } else {
                //**? $quantiteTransfert est vide **//
                return 'Le véhicule a déjà le plein.';
            }
        } else {
            //**? Si la pompe est vide **//
            return 'La pompe est vide.';
        }
    }

 /*       if($newQuantitePompe >= $quantiteTransfert) {
            //     800   supérieur ou égal   35
            $newQuantitePompe -= $quantiteTransfert;
            //    800    soustrait      35
            // Rajouter la quantité dans la voiture
            $newQuantiteVoiture = $vehicule->getLitre() + $quantiteTransfert;
            return $newQuantiteVoiture;
        } else if($quantiteTransfert === 0) {
            //Si la voiture est pleine
            return 'La voiture à déjà fait le plein d\'essence.';
        } else if($newQuantitePompe == $newQuantiteVoiture) {            
            // Si la pompe est vide après la distribution
            return 'La pompe à essence est vide et ne peut plus servire de carburant.';
            // Si la pompe est vide avant la distribution
        } else {
            $newQuantitePompe === 0;
            return 'La pompe à essence est vide et ne peut plus servire de carburant.';
        }
    }*/
}
?>

<?php
echo '<br>';
?>

<?php
$pompe1 = new Pompe(800);
// $pompe1->setReservoir(800);
echo $pompe1->info();
?>

<?php
$pompe1->transfert($vehicule1);

echo $vehicule1->info();
?>

<?php
echo $pompe1->info();
?>

<?php
$vehicule2 = new Vehicule(40,14);
echo $vehicule2->info();
$pompe1->transfert($vehicule2);
?>
<?php
echo $vehicule2->info();
?>
<?php
echo $pompe1->info();
/*
    Créer une class Vehicule qui contiendra une propriété privée litre (elle aura son get et son set)
    créer également une méthode public info qui affichera une phrase de type : le véhicule a ... litres d'essence

    Créer un objet de la class Véhicule et vous lui attribuerait 5 litres d'essence (vous pouvez par le setteur ou pourquoi pas le construct)

    afficher la phrase 




    Créer une class Pompe qui contiendra une propriété privée reservoir (elle aura son get et son set)
    créer la méthode public info qui affichera le reservoir de la pompe : la pompe à essence à ... litres d'essence

    Créer un objet de la class Pompe et vous lui affecterait une quantité de 800 litres 

    afficher la phrase


    -----------------------------------------------
    créer une méthode public 'transfert' dans Pompe

    On dira que toutes les voitures ont une capacité de 40 litres

    le but est que les véhicules viennent à la pompe à essence faire le plein 
    (40 - la quantité d'essence dans le véhicule) cette quantité est à extraire de la quantité de la pompe

    ajouter dans la class véhicule la propriété privée capacity avec son get et set
    dans la méthode transfert remplacer 40 par la capacité du véhicule
    ajouter des conditions , vérifier s'il reste assez d'essence

*/
?>