<?= $this->extend("templates/app") ?>
<title>Page introuvable !</title>

<?= $this->section("body") ?>

<section id="notfound" class="container-fluid">
    <article class="col-3">
        <h1>Erreur 404</h1>
        <p>La page que vous recherchez n'a pas été trouvée</p>
    </article>
</section>

<?= $this->endSection() ?>