<!-- ON INDIQUE QUEL TEMPLATE S'APPLIQUE -->
<?= $this->extend("templates/app") ?>
<!-- DEBUT DE LA SECTION DANS LAQUELLE LE CONTENU VA S'INSERER -->
<?= $this->section("body") ?>
<!-- PARTIE CAROUSEL 
A REMPLACER PAR UNE PHOTO, PAS ENCORE DEFINIE-->
<section class="slider">
  <div id="carouselCaption" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
    <div class="carousel-indicators align-items-center gap-2">
    <div class="pause-cycle-button  d-none d-md-block">
      <button type="button" class="btn btn-warning btn-customized">
        <i class="fas fa-pause"></i>
      </button>
    </div>
      <button class="carouselButton active d-none d-md-block" type="button" data-bs-target="#carouselCaption" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
      <button class="carouselButton d-none d-md-block" type="button" data-bs-target="#carouselCaption" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button class="carouselButton d-none d-md-block" type="button" data-bs-target="#carouselCaption" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="<?php echo base_url(); ?>/images/background.jpg" class="d-block w-100" alt="photo d'un plateau repas avec viande et légumes">
        <div class="carousel-caption">
          <h1>
            <?= esc($titres['titre1']) ?>
          </h1>
          <p>
            <?= esc($titres['titre2']) ?>
          </p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="<?php echo base_url(); ?>/images/background.jpg" class="d-block w-100" alt="photo d'un plateau repas avec viande et légumes">
        <div class="carousel-caption">
          <h4>
            <?= esc($titres['titre1']) ?>
          </h4>
          <p>
            <?= esc($titres['titre2']) ?>
          </p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="<?php echo base_url(); ?>/images/background.jpg" class="d-block w-100" alt="photo d'un plateau repas avec viande et légumes">
        <div class="carousel-caption">
          <h4>
            <?= esc($titres['titre1']) ?>
          </h4>
          <p>
            <?= esc($titres['titre2']) ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- PARTIE PRESENTATION DES CUISINIERS
CONTENU NON DEFINI -->
<section class="col" id="presentation">
  <h3>
    <?= esc($titres['titre3']) ?>
  </h3>
  <article class="row row-cols-2">
    <img class="col-2 d-none d-md-block" src="<?php echo base_url(); ?>/images/chef.png" alt="chef cuistot"
      />
    <div class="col-10">
      <h4>
        <?= esc($titres['titre4']) ?>
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
        erat risus, ornare eu pulvinar quis, dapibus ut orci. Vestibulum eget
        velit ac dolor finibus condimentum a nec quam. Etiam sed erat
        suscipit, pulvinar ipsum in, malesuada neque. Nullam et volutpat
        turpis, ut pharetra nunc. Etiam posuere mollis ornare. Proin id quam
        vel lorem ultrices tempor sed sit amet neque. Donec sed ultrices sem.
        Cras egestas purus non turpis congue tincidunt a id erat. Cras mi
        eros, interdum ut ipsum a, congue consectetur neque. Nunc feugiat,
        ante in vestibulum posuere, urna nunc ullamcorper risus, id faucibus
        enim ligula ut ex. Vestibulum non facilisis lectus. Quisque ac
        elementum ante. Aliquam pellentesque ipsum non sem consectetur
        porttitor. Nulla id feugiat arcu.
      </p>
    </div>
  </article>
  <article class="row row-cols-2">
    <div class="col-10">
      <h4>
        <?= esc($titres['titre5']) ?>
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
        erat risus, ornare eu pulvinar quis, dapibus ut orci. Vestibulum eget
        velit ac dolor finibus condimentum a nec quam. Etiam sed erat
        suscipit, pulvinar ipsum in, malesuada neque. Nullam et volutpat
        turpis, ut pharetra nunc. Etiam posuere mollis ornare. Proin id quam
        vel lorem ultrices tempor sed sit amet neque. Donec sed ultrices sem.
        Cras egestas purus non turpis congue tincidunt a id erat. Cras mi
        eros, interdum ut ipsum a, congue consectetur neque. Nunc feugiat,
        ante in vestibulum posuere, urna nunc ullamcorper risus, id faucibus
        enim ligula ut ex. Vestibulum non facilisis lectus. Quisque ac
        elementum ante. Aliquam pellentesque ipsum non sem consectetur
        porttitor. Nulla id feugiat arcu.
      </p>
    </div>
    <img class="col-2 d-none d-md-block" src="<?php echo base_url(); ?>/images/cheffe.png" alt="cheffe cuistot"
      />
  </article>
  <div class="text-center">
    <h2>Où nous trouver :</h2>
    <p>Du jeudi au dimanche</p>
    <p>de 12h à 14h et de 18h30 à 22h</p>
  </div>
<!-- PARTIE MAP -->
  <div id="macarte"></div>
</section>

<?= $this->endSection() ?>