<?php include('includes/header.php'); ?>

<!-- Page Header -->
<header class="masthead" id="bgnImage">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-heading">
          <h1><?= $post['title']; ?></h1> <!-- TITRE -->
          <h2 class="subheading">par Jean Forteroche</h2>
          <span class="meta"><?= $post['creation_date_fr']; ?></span> <!-- DATE -->
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<article>
  <div class="container">
    <div class="row">
      <div class="text-justify col-lg-8 col-md-10 mx-auto">
        <?= $post['content']; ?> <!-- ARTICLE -->
      </div>
    </div>
  </div>
</article>

<hr>

<!-- PARTIE COMMENTAIRES -->
<div class="container" id="comment">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h3 class="subheading">Commentaires (<?= $result['nbcomment']; ?>)</h3><br> <!-- NOMBRE DE COMMENTAIRES -->
      <form action='index.php?p=comment&amp;id=<?= $post['id']; ?>' method='post'>
        <div class="row col-lg-12 col-md-12 mx-auto">
          <div class="col">
            <input type="text" name='pseudo' class="form-control" placeholder="Votre Pseudo" required>
          </div>
          <div class="col">
            <input type="text" name='commentaire' class="form-control" placeholder="Votre Commentaire" required>
          </div>
          <button type="submit" class="btn-sm">Publier</button>
        </div>
      </form>
      <hr>
    </div>

    <?php if($result['nbcomment'] == 0){ ?> <!-- SI PAS ENCORE DE COMMENTAIRES -->
      <div class="col-lg-8 col-md-10 mx-auto">Soyez le premier à commenter...</div>
    <?php }else{ ?>
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php while ($data = $comments->fetch()){
          if($data['report'] < 10){ ?>
            <!-- AFFICHE LE COMMENTAIRE SI MOINS DE 10 REPORT -->
            <div class="alert alert-secondary" id="comment">
              <p><strong><?= $data['pseudo']; ?></strong> le <span><?= $data['comment_date_fr']; ?> </span> - <!-- PSEUDO + DATE -->
                <!-- LIEN REPORT DISPO SI PAS ENCORE VALIDE PAR L'ADMIN -->
                <?php if($data['report'] >= 0){?>
                 <a href="index.php?p=report&amp;id=<?= $post['id'];?>&amp;idcomment=<?= $data['id'];?>"><i
                    class="fas fa-flag"></i> Signalé</a> <?php }else{?>
                     <i class="fas fa-check-circle"></i> <?php } ?></p>
              <p><?= $data['comment']; ?></p> <!-- COMMENTAIRE -->
            </div>
            <hr>
    <?php }}} ?>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>