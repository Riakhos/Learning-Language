<?php

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

function nav_menu(string $classe = ''): string
{
    return 
        nav_link('/index.php', 'Accueil', $classe) .
        nav_link('/contact.php', 'Contact', $classe);
}
?>