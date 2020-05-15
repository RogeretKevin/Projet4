<?php include('includes/header.php'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Billet simple pour l'Alaska</h1>
          <span class="subheading">par Jean Forteroche</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <?php while ($data = $smallPost->fetch()){ ?>
        <div class="post-preview">
          <a href="index.php?p=post&amp;id=<?= $data['id'] ?>"> <!-- LIEN VERS L'ARTICLE -->
            <h2 class="post-title"><?= $data['title']; ?></h2> <!-- TITRE -->
            <h3 class="post-subtitle"><?= $data['preview']; ?></h3> <!-- APERCUE -->          
          </a>
          <p class="post-meta"><?= $data['creation_date_fr']; ?></p> <!-- DATE DE CEATION -->
        </div>
        <hr>
      <?php } ?>

    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>