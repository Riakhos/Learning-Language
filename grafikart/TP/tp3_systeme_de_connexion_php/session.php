<?php
// Création d'une session
session_start();
$_SESSION['role'] = 'administrateur';

$_SESSION['user'] = [
    'username' => 'John',
    'password' => '0000'
];

$title = "Page d'accueil session";

require_once 'elements/header.php';
?>

<div class="bg-body-tertiary p-5 rounded">
    
</div>

<?php require_once 'elements/footer.php'; ?>