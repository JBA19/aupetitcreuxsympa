<?= $this->extend("admin/app") ?>

<?= $this->section("body") ?>

<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                <h1>Hello, <?= session()->get('name') ?></h1>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>