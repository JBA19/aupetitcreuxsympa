<!-- 
    TEMPLATE COTE CLIENT : HEAD, HEADER, FOOTER
    UTILISATION DES META NECESSAIRES AU REFERENCEMENT NATUREL
    IMPORT DE BOOTSTRAP, FONTAWESOME, LEAFLET, JQUERY, CSS ET JS PERSONNALISES
 -->


<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Restauration rapide à base de produit locaux situé à CHAMBERET en Corrèze. Ouvert le midi et le soir du jeudi au dimanche. Commande par téléphone.">
        <title>Au petit creux sympa</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    </head>

    <body>
        <header id="header">
            <nav class="navbar navbar-expand-md flex-nowrap">
                <div class="container-fluid row justify-content-between text-center">
                    <div class="col-md-4 col-8">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/images/logo.png" alt="logo"></a>
                    </div>
                    <div class="col-md-6 col-4">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarToggler">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>"><span class="d-none d-md-block"><img src="<?php echo base_url(); ?>/images/home.svg" alt=""></span><br> Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>/menu"><span class="d-none d-md-block"><img src="<?php echo base_url(); ?>/images/plat.svg" alt=""></span><br>Nos plats</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>/contact"><span class="d-none d-md-block"><img src="<?php echo base_url(); ?>/images/email.svg" alt=""></span><br>Contact</a>
                                </li>
                            </ul>
                            <a href="https://www.facebook.com/aupetitcreuxsympa/" target="_blank" rel="noopener noreferrer" class="col"><i class="fab fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
<!-- ON INSERE ICI LE CONTENU SPECIFIQUE DE CHAQUE PAGE -->
        <?= $this->renderSection("body") ?>

        <div id="scroll_to_top">
			<img src="<?php echo base_url(); ?>/images/scrolltop.png" alt="Retourner en haut">
		</div>
		
        <footer class="container-fluid">
            <h5>Au petit creux sympa</h5>
            <address>
                <p>4 Place du Monument</p>
                <p>19370 CHAMBERET</p>
                <p><a href="tel:+33768001562">+33(0)7 68 00 15 62</a></p>
                <p><a href="mailto:aupetitcreuxsympa@gmail.com">aupetitcreuxsympa@gmail.com</a></p>
            </address>
            <p><a id="z51" href="<?= base_url('zone51/login') ?>">&copy;</a> 2021 - Tous droits réservés</p>
            <p><a href="<?= base_url('legals') ?>">Mentions légales</a> - <a href="<?= base_url('sitemap') ?>">Plan du site</a></p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/ad6fd6db77.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>/js/script.js"></script>
    </body>
</html>