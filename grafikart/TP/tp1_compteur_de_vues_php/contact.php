<?php
$title = "Nous contacter";
require_once  'data/config.php';
require_once  'fonctions.php';
require_once 'elements/header.php';
date_default_timezone_set('Europe/Paris');
// Récupérer l'heure d'aujourd'hui $heure
$heure = (int)($_GET['heure'] ?? date('G'));
// Récupère le jour d'aujourd'hui $jour
$jour = (int)($_GET['jour'] ?? date('N') - 1);
// Récupérer les créneaux d-aujourd'hui $creneaux
$creneaux = CRENEAUX[$jour];
// Récupérer l'état d'ouverture du magasin
$ouvert = in_creneaux($heure, $creneaux);

//** Termaire **//
$color = $ouvert ? 'green' : 'red';
//** if() sur une seule ligne **//
//** if($ouvert) { $color = 'green'; } else { $color = 'red'; } **//
//*? $color = 'green'; *//
//*? if(!$ouvert) { *//
//*?   $color ='red'; *//
//*? } *//

?>

<div class="bg-body-tertiary p-5 rounded">
  <div class="row">
    <div class="col-md-8">
      <h1>Debug</h1>
      <pre>
        <?= dump($_SESSION); ?>
      </pre>
      <h1>Nous contacter</h1>
      <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam in perferendis, omnis repellat exercitationem corrupti est facere voluptatum dolores error fuga recusandae eveniet officiis sit accusantium praesentium corporis voluptatem totam?</p>
    </div>
    <div class="col-md-4">
      <h2>Horaires d'ouvertures</h2>

      <?php if ($ouvert): ?>
        <!-- Si la variable $ouvert est vraie (le magasin est ouvert), affiche une alerte Bootstrap en vert -->
        <div class="alert alert-success">
          Le magasin sera ouvert
        </div>
      <?php else: ?>
        <!-- Si la variable $ouvert est fausse (le magasin est fermé), affiche une alerte Bootstrap en rouge -->
        <div class="alert alert-danger">
          Le magasin sera fermé
        </div>
      <?php endif ?>

      <form action="contact.php" method="GET">
        <!-- Début du formulaire. Il enverra les données à la page 'contact.php' avec la méthode GET. Cela signifie que les données seront ajoutées à l'URL sous forme de paramètres. -->

        <div class="form-group">
          <!-- Premier champ du formulaire : un menu déroulant pour sélectionner un jour. -->
          <!-- Utilise la fonction 'select', probablement définie ailleurs dans votre code, pour générer le champ <select>. On passe le nom 'jour', la variable '$jour' pour la sélection actuelle et une constante ou tableau 'JOURS' pour les options disponibles. -->
          <?= select('jour', $jour, JOURS) ?>
        </div>

        <div class="form-group">
          <!-- Deuxième champ : un champ de saisie pour entrer une heure. -->
          <!-- Le type est 'number', donc l'utilisateur ne peut entrer que des valeurs numériques. -->
          <!-- Le nom du champ est 'heure', et la valeur par défaut est remplie par la variable PHP '$heure'. -->
          <input class="form-control" type="number" name="heure" value="<?= $heure ?>">
        </div>

        <!-- Bouton pour soumettre le formulaire. Utilise les classes Bootstrap pour le style. -->
        <button class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
      </form>

      <ul>
        <!-- Boucle à travers les jours de la semaine stockés dans la constante JOURS -->
        <?php foreach (JOURS as $k => $jour): ?>
          <!-- Vérifie si le jour actuel ($k + 1) correspond au jour actuel du système (date('N') renvoie un nombre entre 1 et 7) -->
          <!-- Si c'est le jour actuel, applique le style inline pour changer la couleur du texte -->
          <li <?php if ($k + 1 === (int)date('N')): ?> style="color:<?= $color; ?>" <?php endif; ?>>
            <!-- Affiche le nom du jour en gras -->
            <strong><?= $jour ?></strong> :
            <!-- Affiche les créneaux horaires pour ce jour à l'aide de la fonction 'creneaux_html' et la constante 'CRENEAUX' -->
            <?= creneaux_html(CRENEAUX[$k]); ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<pre>
  <?php // print_r($_SERVER); 
  // dump($heure);
  // dump($creneaux);
  // dump(date('e'));
  // exit(); ?>
</pre>

<?php require_once 'elements/footer.php'; ?>