<?= $this->extend("admin/app") ?>

<?= $this->section("body") ?>
<section id="maj">
    <h1>MAJ des plats</h1>
    
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success'); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($validation)): ?>
        <div class ="alert alert-danger" role="alert"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    
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
            <button type="submit" formaction="<?= base_url('zone51/dashboard/update') ?>" class="btn btn-success">Mettre à jour</button>
            <button type="submit" formaction="<?= base_url('zone51/dashboard/delete') ?>" class="btn btn-danger">Supprimer</button>
        </form>
    <?php }; ?>
</section>

<?= $this->endSection() ?>
