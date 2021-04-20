<!-- ON INDIQUE QUEL TEMPLATE S'APPLIQUE -->
<?= $this->extend("admin/app") ?>
<!-- DEBUT DE LA SECTION DANS LAQUELLE LE CONTENU VA S'INSERER -->
<?= $this->section("body") ?>
<!-- LISTING COMPLET DES PLATS VIA UNE BOUCLE -->
<section id="maj" class="container-fluid">
<!-- BLOC QUI APPARAIT UNIQUEMENT APRES VALIDATION DU FORMULAIRE, SOIT POUR AFFICHER LE MESSAGE DE SUCCES... -->
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success'); ?>
        </div>
    <?php endif; ?>
<!--... SOIT LES MESSAGES D'ERREUR -->
    <?php if (isset($validation)): ?>
        <div class ="alert alert-danger" role="alert"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
        
    <h1>Mettre à jour / supprimer les plats</h1>
    <?php foreach ($plats as $plat) { ?>
        <form class="" action="" method="post">
            <div class="form-group">
                <label for="nom">Nom du plat :</label>
                <input type="nom" class="form-control" name="nom" id="nom" value='<?= esc($plat['nom'])?>'>
            </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="description" class="form-control" name="description" id="description" value='<?= esc($plat['description'])?>'>
                </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="prix" class="form-control" name="prix" id="prix" value='<?= esc($plat['prix'])?>'>
            </div>
            <div class="form-group">
                <label for="menu">Prix du menu :</label>
                <input type="menu" class="form-control" name="menu" id="menu" value='<?= esc($plat['menu'])?>'>
            </div>
            <div class="form-group">
                <input id="plat-id" name="plat-id" type="hidden" value="<?= esc($plat['id'])?>">
            </div>
            <br>
            <div class="form-group text-center">
                <button type="submit" formaction="<?= base_url('zone51/dashboard/update') ?>" class="btn btn-success">Mettre à jour</button>
                <button type="submit" formaction="<?= base_url('zone51/dashboard/confirm') ?>" class="btn btn-danger">Supprimer</button>
            </div>
        </form>
    <?php }; ?>
</section>

<?= $this->endSection() ?>
