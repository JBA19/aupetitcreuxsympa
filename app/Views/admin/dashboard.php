<?= $this->extend("admin/app") ?>

<?= $this->section("body") ?>

<section id="dashboard" class="container" style="margin-top:20px;">
    <div class="row">
        <div class="panel panel-primary">
            <h1 class="panel-heading">Tableau de bord</h1>
            <div class="panel-body">
                <h1>Bonjour, <?= session()->get('name') ?></h1>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>