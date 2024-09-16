<?php 


 //**----------------------------------------------------------------------------------**//
 //********************************** TP bibliothèque ***********************************//
 //**----------------------------------------------------------------------------------**//
 
/**
 **----------------------------------------------------------------------------------**
 *? Création de l'interface Publieur **
    ** > Cette interface va définir une méthode publier() que toutes les entités capables de publier (livres, articles) devront implémenter. **
 **----------------------------------------------------------------------------------**
 **/
interface Publieur
{
   public function publier() : string;
}
 
 /** 
 **----------------------------------------------------------------------------------**
 *? Création d'une classe abstraite Document **
    ** > Cette classe abstraite sera la base des classes qui représenteront différents types de documents. **
        ** Elle contiendra des propriétés communes comme le titre et l'auteur, **
        ** ainsi qu'une constante (MIN_PAGES) pour le nombre minimum de pages. **
    ** > Implémentez un constructeur pour cette classe, et des méthodes getter et setter pour les propriétés. **
    ** > Créer une méthode afficherInfos() qui sera obligatoirement déclarée dans les class enfants **
 **----------------------------------------------------------------------------------**
 **/
abstract class Document
{
   //** constante (MIN_PAGES) **//
   const MIN_PAGES = 150;

   //** propriétés communes titre et auteur **//
   protected string $titre;
   protected string $auteur;

   //** Implémentez constructeur **//
   public function __construct(string $titre, string $auteur)
   {
      $this->titre = $titre;
      $this->auteur = $auteur;      
   }

   //** Méthode getter **//
   public function getTitre() :string
    {
        return $this->titre;
    }
    //** Méthode setter **//
    public function setTitre(string $titre) :void
    {
        $this->titre = $titre;
    }

   //** Méthode getter **//
   public function getAuteur() :string
    {
        return $this->auteur;
    }
    //** Méthode setter **//
    public function setAuteur(string $auteur) :void
    {
        $this->auteur = $auteur;
    }
  
    //** Méthode afficherInfos() obligatoire dans les class enfants **//
    abstract public function afficherInfos();
}

/**
 **----------------------------------------------------------------------------------**
 *? Création de la classe Livre qui étend Document **
    ** > Cette classe représente un livre. Elle ajoute des propriétés spécifiques comme le nombre de pages et implémente la méthode publier() de l'interface Publieur. **
    ** > Pour information, dans la méthode publier on retourne une phrase de type : le livre **titre du livre** de **auteur** est publié avec un nombre de **nombre de pages** pages **
    ** et pour la méthode afficherInfos on s'attend plutôt à une association : **
        ** livre : #### **
        ** auteur : #### **
        ** nombre de pages : #### **
    **  > Utilisez la constante MIN_PAGES pour valider le nombre de pages. **
    **  Si l'argument du nombre de pages est inférieur à la constante vous devez définir la constante comme valeur à la propriété sinon c'est l'argument à insérer **
**----------------------------------------------------------------------------------**  
**/
class Livre extends Document implements Publieur
{
   use FormateurTitre;

   //** propriété nombre de pages **//
   protected int $nombrePages;  
   
   //** Constructeur pour initialiser le livre avec validation du nombre de pages **//
   public function __construct(string $titre, string $auteur, int $nombrePages)
   {
      $this->nombrePages = $nombrePages;
      //**Appel du constructeur parent **//
      parent::__construct($titre, $auteur, $nombrePages);

      //** Validation du nombre de pages avec MIN_PAGES **//
      $this->nombrePages = ($nombrePages >= self::MIN_PAGES) ? $nombrePages : self::MIN_PAGES;
   }

   //** Méthode getter **//
   public function getNombrePages() :int
    {
        return $this->nombrePages;
    }
    //** Méthode setter **//
    public function setNombrePages(int $nombrePages) :void
    {
        $this->nombrePages = $nombrePages;
    }

   //** Implémentation la méthode publier() **//
   public function publier() : string
   {
      return "<p>Le livre {$this->titre} de {$this->auteur} est publié avec un nombre de {$this->nombrePages}</p>";
   }
   
   //** Méthode pour afficher les informations du livre **//
   public function afficherInfos() : string
   {
      return "<h2> -livre : {$this->titre}</h2>
              <h2> -auteur : {$this->auteur}</h2>
              <p> -nombre de pages : {$this->nombrePages}</p>";
   }   
} 

/**
 **----------------------------------------------------------------------------------** 
 *? Création d'un Trait pour l'édition **
    ** > Créer un trait FormateurTitre qui va contenir une méthode formaterTitreMajuscule() permettant de formater le titre d'un document en majuscules. **
 **----------------------------------------------------------------------------------**
 **/
trait FormateurTitre
{
   public function formaterTitreMajuscule()
   {
      return $this->titre = mb_strtoupper($this->titre);
   }
}

/**
  **----------------------------------------------------------------------------------**
 *? Utilisation du Trait dans la classe Article **
 ** > Créer une classe Article qui hérite de Document et implémente l'interface Publieur. Elle doit utiliser le trait FormateurTitre **
 ** > Elle contient une propriété contenu **
 ** > Pour information, dans la méthode publier on retourne une phrase de type : l'article ** titre en MAJUSCULE ** de **auteur** est publié avec pour contenu **contenu** **
 ** et pour la méthode afficherInfos on s'attend plutôt à une association :  **
    ** article : #### **
    ** auteur : #### **
    ** contenu : #### **
 **----------------------------------------------------------------------------------** 
 **/
class Article extends Document implements Publieur
{
   use FormateurTitre;

   //** propriété contenu **//
   protected string $contenu;  
   
   //** Constructeur pour initialiser l'article **//
   public function __construct(string $titre, string $auteur, string $contenu)
   {
      $this->contenu = $contenu;
      //**Appel du constructeur parent **//
      parent::__construct($titre, $auteur, $contenu);

   }

   //** Méthode getter **//
   public function getContenu() :string
    {
        return $this->contenu;
    }
    //** Méthode setter **//
    public function setContenu(string $contenu) :void
    {
        $this->contenu = $contenu;
    }

   //** Implémentation la méthode publier() **//
   public function publier() : string
   {
      return "<p>L'article {$this->formaterTitreMajuscule($this->titre)} de {$this->auteur} est publié avec pour contenu {$this->contenu}</p>";
   }
   
   //** Méthode pour afficher les informations de l'article **//
   public function afficherInfos() : string
   {
      return "<h2> -article : {$this->titre}</h2>
              <h2> -auteur : {$this->auteur}</h2>
              <p> -contenu : {$this->contenu}</p>";
   } 

   //** Méthode pour afficher le nombre de caractères du titre **//
   public function afficherNbCaracteresTitre() : string
   {
      $nbCaracteres = Bibliotheque::compterCaracteres($this->titre);
      return "<p>Le titre de l'article contient $nbCaracteres caractères.</p>";
   }
}

/**
 **----------------------------------------------------------------------------------** 
 *? Ajout d'une méthode static dans une classe Bibliotheque **
 ** > Créer une classe Bibliotheque qui contient une méthode static compterCaracteres() permettant de compter le nombre de caractères d'un contenu donné. **
 **----------------------------------------------------------------------------------** 
 **/
class Bibliotheque
{
   public static function compterCaracteres(string $contenu) : int
   {
      return mb_strlen($contenu);
   }
}

/**
 **----------------------------------------------------------------------------------** 
 *? Création d'une classe finale Encyclopedie **
    ** > Créer une classe Encyclopedie qui hérite de Document et implémente Publieur. Cette classe ne doit pas pouvoir être étendue. **
    ** Elle contient une propriété edition **
    ** > Pour information, dans la méthode publier on retourne une phrase de type : l'encyclopédie **encyclopedie**, édition **edition** de **auteur** est publié **
    ** et pour la méthode afficherInfos on s'attend plutôt à une association : **
        ** Encyclopédie : #### **
        ** auteur : #### **
        ** édition : #### **
 **----------------------------------------------------------------------------------** 
 **/
final class Encyclopedie extends Document implements Publieur
{
   //** propriété edition et encyclopédie **//
   protected string $encyclopedie;
   protected string $edition;
   
   //** Constructeur pour initialiser l'article **//
   public function __construct(string $encyclopedie, string $edition, string $auteur)
   {
      $this->encyclopedie = $encyclopedie;
      $this->edition = $edition;
      //**Appel du constructeur parent **//
      parent::__construct($encyclopedie, $edition, $auteur);

   }

   //** Méthode getter **//
   public function getEdition() :string
    {
        return $this->edition;
    }
    //** Méthode setter **//
    public function setEdition(string $edition) :void
    {
        $this->edition = $edition;
    }

   //** Méthode getter **//
   public function getEncyclopedie() :string
    {
        return $this->encyclopedie;
    }
    //** Méthode setter **//
    public function setEncyclopedie(string $encyclopedie) :void
    {
        $this->encyclopedie = $encyclopedie;
    }

    //** Implémentation la méthode publier() **//
   public function publier() : string
   {
      return "<p>L'encyclopédie {$this->encyclopedie}, {$this->edition} de {$this->auteur} est publié</p>";
   }
   
   //** Méthode pour afficher les informations de l'article **//
   public function afficherInfos() : string
   {
      return "<h2> -encyclopédie : {$this->encyclopedie}</h2>
              <h2> -auteur : {$this->auteur}</h2>
              <p> -edition : {$this->edition}</p>";
   }
}

/**
 **----------------------------------------------------------------------------------** 
 *? Créer un objet livre et afficher les méthodes publier() et afficherInfos() **
 **----------------------------------------------------------------------------------** 
 **/
$livre = new Livre('Les Misérables', 'Victor Hugo', 2598);
echo "{$livre->publier()}<br> {$livre->afficherInfos()}";

/**
 **----------------------------------------------------------------------------------** 
 *? Créer un objet article et afficher les méthodes publier() et afficherInfos() **
 **----------------------------------------------------------------------------------** 
 **/
$article = new Article('Une épopée romanesque', 'Jean-François PÉPIN', "L'évêque de Digne, Mgr Myriel, accueille le forçat évadé Jean Valjean, et guide sa rédemption en l'innocentant d'un vol qu'il a pourtant commis : « Jean Valjean, mon frère, vous n'appartenez plus au mal, mais au bien. C'est votre âme que je vous achète ; je la retire aux pensées noires et à l'esprit de perdition, et je la donne à Dieu. » Devenu M. Madeleine, Jean Valjean s'installe dans une petite ville, Montreuil-sur-Mer, dont il devient le maire respecté. Pour éviter qu'un innocent soit condamné à sa place, il avoue sa véritable identité. On le renvoie aux galères.

Évadé du bagne, il vit à Paris, adopte une enfant, Cosette qu'il arrache aux griffes des Thénardier, aubergistes louches et cruels. Il échappe pendant de nombreuses années à la traque du policier Javert, et goûte les joies de l'amour paternel. Cosette s'éprend d'un jeune homme, Marius. Lié à des étudiants républicains, celui-ci participe à l'insurrection de 1832, se bat sur la barricade de la rue de la Chanvrerie, où Jean Valjean lui sauve la vie. Il en fait autant avec le policier Javert qui avait repris sa traque. Décontenancé, Javert se suicide. Jean Valjean n'a plus à redouter la police. Toutefois, son honnêteté le conduit à révéler à Marius ce qu'il fut. Ignorant qu'il lui doit la vie, Marius éloigne Cosette de son père adoptif. Mais lorsqu'il apprend toute la vérité sur Jean Valgean, il retourne chez lui en compagnie de Cosette. L'ancien bagnard meurt dans leurs bras, après avoir enfin trouvé la paix.");
echo "{$article->publier()}<br> {$article->afficherInfos()}";

/**
 **----------------------------------------------------------------------------------** 
 *? Créer un objet Encyclopedie et afficher les méthodes publier() et afficherInfos() **
 **----------------------------------------------------------------------------------** 
 **/
$encyclopedie = new Encyclopedie('Gallica', 'Bibliothèque nationale de France','Albert Lacroix et Cie');
echo "{$encyclopedie->publier()}<br> {$encyclopedie->afficherInfos()}";

/**
 **----------------------------------------------------------------------------------** 
 *? Afficher le nombre de caractères dans le contenu du titre de l'article **
 **----------------------------------------------------------------------------------** 
 **/
echo $article->afficherNbCaracteresTitre();
