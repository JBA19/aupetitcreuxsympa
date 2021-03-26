<?= $this->extend("templates/app") ?>
<?= $this->section("body") ?>

<section id="sitemap">
    <ul>
        <li>
            <a href="<?php echo base_url(); ?>">Accueil</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>/menu">Les plats</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>/contact">Contact</a>
        </li>
        <li>
        <a href="<?= base_url('legals') ?>">Mentions légales</a>
        </li>
    </ul>
</section>

<?= $this->endSection() ?>