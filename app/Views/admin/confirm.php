<!-- ON INDIQUE QUEL TEMPLATE S'APPLIQUE -->
<?= $this->extend("admin/app") ?>
<!-- DEBUT DE LA SECTION DANS LAQUELLE LE CONTENU VA S'INSERER -->
<?= $this->section("body") ?>

<section id="confirm" class="container-fluid">
    <h1>Confirmer la suppression</h1>
    <p>Voulez-vous réellement supprimer le plat suivant :</p>
    <p><?= esc($nom) ?></p>
    <p>Cette action est irréversible.</p>
    <form method='post'>
    <div class="form-group">
<!-- INPUT CACHE AVEC L'ID DU PLAT QUI SERA UTILISE POUR TROUVER LE PLAT CORRESPONDANT DANS LA BDD -->
        <input id="plat-id" name="plat-id" type="hidden" value="<?= esc($numero)?>">
    </div>
    <button type="submit" formaction="<?= base_url('zone51/dashboard/update') ?>" class="btn btn-success">Retour</button>
    <button type="submit" formaction="<?= base_url('zone51/dashboard/delete') ?>" class="btn btn-danger">Supprimer</button>
    </form>
</section>

<?= $this->endSection() ?>