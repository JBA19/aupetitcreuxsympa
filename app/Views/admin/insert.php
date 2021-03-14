<?= $this->extend("admin/app") ?>

<?= $this->section("body") ?>

    <?php if (session()->get('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success'); ?>
    </div>
    <?php endif; ?>

    <?= form_open('AdminController/insert'); ?>
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
        <!-- <div>
            <?= form_label('Sur commande ?', 'commande', ['for' => 'commande']); ?>
            <?= form_checkbox('commande', TRUE , FALSE); ?>
        </div> -->
        <?php if (isset($validation)): ?>
            <div class ="alert-danger" role="alert"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-block">Valider</button>
        </div>
    <?= form_close(); ?>

<?= $this->endSection() ?>
