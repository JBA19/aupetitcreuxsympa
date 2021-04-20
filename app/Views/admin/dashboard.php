<!-- ON INDIQUE QUEL TEMPLATE S'APPLIQUE -->
<?= $this->extend("admin/app") ?>
<!-- DEBUT DE LA SECTION DANS LAQUELLE LE CONTENU VA S'INSERER -->
<?= $this->section("body") ?>

<section id="dashboard" class="container-fluid">
    <div class="row">
        <div class="panel panel-primary">
            <h1 class="panel-heading">Tableau de bord</h1>
            <div class="panel-body">
<!-- ON RECUPERE LE NOM DE LA PERSONNE QUI S'EST CONNECTEE POUR AFFICHER UN MESSAGE D'ACCUEIL PERSONNALISE -->
                <h2>Bonjour, <?= session()->get('name') ?></h1>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>