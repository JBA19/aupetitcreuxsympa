<?= $this->extend("admin/app") ?>

<?= $this->section("body") ?>
<section id="insertion" class="container-fluid">
    <?php if (session()->get('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success'); ?>
    </div>
    <?php endif; ?>
    <?php if (isset($validation)): ?>
        <div class ="alert alert-danger" role="alert"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <h1>Ajouter un plat</h1>
    <form class="" action="<?= base_url('zone51/dashboard/insert') ?>" method="post">
        <div class="form-floating">
            <?= form_input('nom', set_value('nom') , ['placeholder' => 'Nom du plat', 'id' => 'nom', 'class' => 'form-control'], 'text'); ?>
            <?= form_label('Nom du plat :', 'nom', ['for' => 'nom']); ?>
        </div>
        <div class="form-floating">
            <?= form_input('description', set_value('description') , ['placeholder' => 'Description', 'id' => 'description', 'class' => 'form-control'], 'text'); ?>
            <?= form_label('Description :', 'description', ['for' => 'description']); ?>
        </div>
        <div class="form-floating">
            <?= form_input('prix', set_value('prix') , ['placeholder' => 'Prix', 'id' => 'prix', 'class' => 'form-control'], ''); ?>
            <?= form_label('Prix :', 'prix', ['for' => 'prix']); ?>
        </div>
        <div class="form-floating">
            <?= form_input('menu', set_value('menu') , ['placeholder' => 'Prix du menu', 'id' => 'menu', 'class' => 'form-control'], ''); ?>
            <?= form_label('Prix du menu :', 'menu', ['for' => 'menu']); ?>
        </div>
        <div class="input-group row">
            <h5>Sur commande ?</h5>
        </div>
        <div class="input-group col gap-1">
            <input class="form-check-input" type="radio" id="oui" name="commande" value="1">
            <label class="form-label" for="oui"> oui</label>
        </div>
        <div class="input-group col gap-1">
            <input class="form-check-input" type="radio" id="non" name="commande" value="0">
            <label class="form-label" for="non"> non</label>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-block">Valider</button>
        </div>
    </form>
</section>

<?= $this->endSection() ?>
