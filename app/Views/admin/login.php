<!-- ON INDIQUE QUEL TEMPLATE S'APPLIQUE -->
<?= $this->extend("admin/app") ?>
<!-- DEBUT DE LA SECTION DANS LAQUELLE LE CONTENU VA S'INSERER -->
<?= $this->section("body") ?>

<section id="login" class="container-fluid">
    <div class="row">
        <div class="panel panel-primary">
            <h1 class="panel-heading">Connexion</h1>
            <div class="panel-body">
<!-- BLOC QUI APPARAIT UNIQUEMENT APRES VALIDATION DU FORMULAIRE POUR AFFICHER LES MESSAGES D'ERREUR... -->
                <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
<!-- AFFICHAGE DU FORMULAIRE DE CONNEXION -->
                <form action="<?= base_url('zone51/login') ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-block">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>