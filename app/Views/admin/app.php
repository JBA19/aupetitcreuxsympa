<!-- 
    TEMPLATE DE L'ESPACE ADMIN
    IMPORT DE BOOTSTRAP ET D'UN CSS PERSONNALISE
 -->

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin - Au petit creux sympa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    </head>

    <body>
        <header>
<!-- MENU REPONSIVE VIA CLASS BOOTSTRAP -->
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
                                    <a class="nav-link" href="<?= base_url('zone51/dashboard') ?>">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('zone51/dashboard/insert') ?>">Ajouter un plat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('zone51/dashboard/update') ?>">Mettre à jour ou supprimer un plat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('logout') ?>">Déconnexion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
<!-- FONCTION INDIQUANT OU DOIT S'INSERER LE CONTENU DE LA PAGE SELON CELLE QUI A ETE DEMANDEE -->
        <?= $this->renderSection("body") ?>
    </body>
</html>