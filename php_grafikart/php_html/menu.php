<?php
if(!function_exists('nav_link')) {
    function nav_link(string $lien, string $titre, string $classe = ''): string
    {
        $classe = "nav-link ";
        if($_SERVER['SCRIPT_NAME'] === $lien) {
            $classe .= 'active';
        }         
        return <<<HTML
        <li class="nav-item">
            <a class="$classe" aria-current="page" href="$lien">$titre</a>
        </li>
HTML;
    }
}
?>

<?= nav_link('/index.php', 'Accueil', $class); ?>
<?= nav_link('/contact.php', 'Contact', $class); ?>