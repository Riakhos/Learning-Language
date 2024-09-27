</main>

<div class="bg-body-tertiary p-5 rounded">
    <div class="row">
        <div class="col-md-1">
            <?php 
                // Inclut le fichier contenant la définition de la fonction compteurDeVues
                require_once  dirname(__DIR__) . DIRECTORY_SEPARATOR . 'fonctions' . DIRECTORY_SEPARATOR . 'compteur.php';
                // Appelle la fonction compteurDeVues pour incrémenter le compteur de vues
                compteurDeVues();
                $vues = nombreDeVues() ;
            ?>
            Il y a <?= $vues ?> visite<?php if($vues > 1):?>s<?php endif;?> sur le site.
        </div>
        <div class="col-md-4">
            <footer>
                <h4>Suivez nos actualités en vous inscrivant à notre newsletter :</h4>
                <form action="newsletter.php" method="post" class="form-inline">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Entrer votre email" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2"> S'inscrire</button>
                </form>
            </footer>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <h5>Navigation</h5>
            <ul class="list-unstyled text-small">
                <?= nav_menu(''); ?>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>