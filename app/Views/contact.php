<?= $this->extend("templates/app") ?>

<?= $this->section("body") ?>


<section id="contact" class="container-fluid">
    <div class="alert alert-danger text-center" role="alert">
        <i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i><h2>PAGE EN CONSTRUCTION / ENVOI INDISPONIBLE</h2>
    </div>
    <h1 class='text-center'>Contact</h1>
        <?= form_open('ContactController'); ?>
        <div class="input-group">
            <?= form_label('Civilité :', 'civ', ['class' => 'input-group-text', 'for' => 'civ']); ?>
            <?= form_dropdown('civ', ['empty' => '','madame' => 'Madame', 'monsieur' => 'Monsieur'], [], ['id' => 'civ']); ?>
        </div>
        <div class="form-floating">
            <?= form_input('name', set_value('name') , ['placeholder' => 'Votre nom', 'id' => 'name', 'class' => 'form-control'], 'text'); ?>
            <?= form_label('Nom :', 'name', ['for' => 'name']); ?>
            <?php if(isset($validation)) : ?>
                <div class="text-danger">
                    <?= $validation->getError('name'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-floating">
            <?= form_input('tel', set_value('tel') , ['placeholder' => 'Votre numéro', 'id' => 'tel', 'class' => 'form-control'], 'tel'); ?>
            <?= form_label('Téléphone :', 'tel', ['for' => 'tel']); ?>
            <?php if(isset($validation)) : ?>
                <div class="text-danger">
                    <?= $validation->getError('tel'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-floating">
            <?= form_input('email', set_value('email') , ['placeholder' => 'Votre email', 'id' => 'email', 'class' => 'form-control'], 'email'); ?>
            <?= form_label('Email :', 'email', ['for' => 'email']); ?>
            <?php if(isset($validation)) : ?>
                <div class="text-danger">
                    <?= $validation->getError('email'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-floating">
            <?= form_input('object', set_value('object') , ['placeholder' => 'Sujet', 'id' => 'object', 'class' => 'form-control'], 'text'); ?>
            <?= form_label('Objet de votre demande :', 'object', ['for' => 'object']); ?>
            <?php if(isset($validation)) : ?>
                <div class="text-danger">
                    <?= $validation->getError('object'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-floating">
            <?= form_textarea('message', set_value('message') , ['placeholder' => 'Votre message', 'id' => 'message', 'class' => 'form-control'], 'text'); ?>
            <?= form_label('Message :', 'message', ['for' => 'message']); ?>
            <?php if(isset($validation)) : ?>
                <div class="text-danger">
                    <?= $validation->getError('message'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-block" disabled>Indisponible</button>
        </div>
        <?= form_close(); ?>
</section>

<?= $this->endSection() ?>