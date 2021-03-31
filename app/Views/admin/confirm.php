<?= $this->extend("admin/app") ?>

<?= $this->section("body") ?>

<section id="confirm" class="container-fluid">
    <h1>Confirmation</h1>
    <p>Voulez-vous réellement supprimer le plat suivant :</p>
    <p><?= $nom ?></p>
    <p>Cette action est irréversible.</p>
    <form method='post'>
    <div class="form-group">
        <input id="plat-id" name="plat-id" type="hidden" value="<?= esc($numero)?>">
    </div>
    <button type="submit" formaction="<?= base_url('zone51/dashboard/update') ?>" class="btn btn-success">Retour</button>
    <button type="submit" formaction="<?= base_url('zone51/dashboard/delete') ?>" class="btn btn-danger">Supprimer</button>
    </form>
</section>

<?= $this->endSection() ?>