<?= $this->extend("admin/app") ?>

<?= $this->section("body") ?>

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
  <form class="" action="<?= base_url('zone51/dashboard/update') ?>" method="post">
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
        <button type="submit" class="btn btn-success">Valider</button>
    </form>
<?php }; ?>

<?= $this->endSection() ?>
