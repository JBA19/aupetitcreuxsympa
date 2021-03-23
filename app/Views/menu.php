<?= $this->extend("templates/app") ?>

<?= $this->section("body") ?>
<section id="plats">
  <div class="row justify-content-center text-center">
    <h1><?= esc($titres['titre1']) ?></h1>
    <div class="table-responsive-md col-lg-8 col-xs-12">
      <table class="table table-sm table-bordered table-striped">
        <thead class="table-dark align-middle">
          <tr>
            <th scope="col"><h3><?= esc($titres['titre2']) ?></h3></th>
            <th scope="col"><h3><?= esc($titres['titre3']) ?></h3></th>
            <th scope="col"><h3><?= esc($titres['titre4']) ?></h3><p><?= esc($titres['titre5']) ?></p></th>
          </tr>
        </thead>
        <tbody class="align-middle">
        <!-- PLATS PERMANENTS -->
          <?php foreach ($plats as $plat) { 
            if (!empty($plat['prix']) && $plat['commande'] == 0) 
              {?>
                <tr>
                <td scope="row"><h4><?= esc($plat['nom']) ?></h4><p><?= esc($plat['description']) ?></p></td>
                <td><p><?= esc($plat['prix']) ?> €</p></td>
                <td>
                  <?php if (!empty($plat['menu'])) {?>
                  <p><?= esc($plat['menu']) ?> €</p>
                  <?php }?>
                </td>
                </tr>
              <?php }
              unset($plat);
            }; ?>
            <tr>
                <td class="table-dark" colspan="3"><h3><?= esc($titres['titre6']) ?></h3></td>
            </tr>
        <!-- PLATS SUR COMMANDE -->
            <?php foreach ($plats as $plat) { 
            if (!empty($plat['prix']) && $plat['commande'] == 1) 
              {?>
                <tr>
                <td scope="row"><h4><?= esc($plat['nom']) ?></h4><p><?= esc($plat['description']) ?></p></td>
                <td><p><?= esc($plat['prix']) ?> €</p></td>
                <td>
                  <?php if (!empty($plat['menu'])) {?>
                  <p><?= esc($plat['menu']) ?> €</p>
                  <?php }?>
                </td>
                </tr>
              <?php }
              unset($plat);
            }; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
