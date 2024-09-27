<?php
$title = "Dashboard";
require_once 'fonctions/compteur.php';

//** Obtenir l'année actuelle **//
$annee = (int)date('Y'); // Convertit l'année actuelle en entier

//** Vérifier si une année est passée dans l'URL via GET, sinon assigner null **//
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee']; // Si 'annee' est vide dans $_GET, on assigne null, sinon on la convertit en entier

//** Vérifier si un mois est passé dans l'URL via GET, sinon assigner null **//
$mois_selection = empty($_GET['mois']) ? null : (int)$_GET['mois']; // Si 'mois' est vide dans $_GET, on assigne null, sinon on la convertit en entier

//** Si l'utilisateur a sélectionné une année et un mois **//
if($annee_selection && $mois_selection) {
    //** Appeler la fonction pour obtenir le nombre total de vues pour le mois sélectionné **//
    $total = nombreVueMois($annee_selection, $mois_selection);
    
    //** Appeler une autre fonction pour obtenir le détail des vues par jour pour le mois sélectionné **//
    $detail = nombreVueDetailMois($annee_selection, $mois_selection);
} else {
    //**Si aucune année ni mois n'est sélectionné, obtenir le nombre total de vues global **//
    $total = nombreDeVues();
}

$mois = [
    '1' => 'Janvier',
    '2' => 'Février',
    '3' => 'Mars',
    '4' => 'Avril',
    '5' => 'Mai',
    '6' => 'Juin',
    '7' => 'Juillet',
    '8' => 'Août',
    '9' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];
require_once 'elements/header.php';
?>

<div class="bg-body-tertiary p-5 rounded">
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <?php for ($i = 0; $i < 5; $i++): ?>                    
                    <!-- Générer un lien pour chaque année (5 dernières années, y compris l'année actuelle), si l'année courante moins $i correspond à l'année sélectionnée, ajouter la classe 'active' -->
                    <a class="list-group-item <?= $annee - $i === $annee_selection ? 'active' : ''; ?>" 
                    href="dashboard.php?annee=<?= $annee - $i ?>">
                        <?= $annee - $i ?>
                    </a>                    
                    <?php if($annee - $i === $annee_selection):  ?>
                    <!-- Si l'année en cours du lien est l'année sélectionnée, afficher la liste des mois -->                    
                        <div class="list-group">
                            <?php foreach($mois as $numero => $nom): ?>
                                <!-- Parcourir tous les mois dans la variable $mois, on génère un lien pour chaque mois de l'année sélectionnée, si le numéro du mois correspond au mois sélectionné, ajouter la classe 'active' -->
                                <a class="list-group-item <?= $numero === $mois_selection ? 'active' : ''; ?>" 
                                href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $numero ?>">
                                    <?= $nom ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endfor ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <strong style="font-size:3em"><?= $total ?></strong>
                    Visite<?php $total > 1 ? 's' : '' ?> total
                </div>
            </div>
            <?php if(isset($detail)): ?>
                <!-- Si la variable $detail existe, afficher le tableau des détails des visites -->
                <h2>Détails des visites pour le mois :</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>                            
                            <th>Jour</th>
                            <th>Nombre de visite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Parcourir les détails des visites ($detail) avec une boucle foreach -->
                        <?php foreach($detail as $ligne): ?>
                        <tr>
                            <!-- Afficher le jour (selon les données contenues dans $ligne) -->
                            <td><?= $ligne['jour'] ?></td>                            
                            <!-- Afficher le nombre de visites -->
                            <td><?= $ligne['visites'] ?>visite<?= $ligne['visites'] > 1 ? 's' : ''; ?></td>
                            <!-- Ajouter un 's' si le nombre de visites est supérieur à 1 -->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php require_once 'elements/footer.php'; ?>