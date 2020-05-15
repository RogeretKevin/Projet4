<?php session_start();

if(isset($_SESSION['admin']) AND !empty($_SESSION['admin']))
{ ?>

<?php  include('includes/header.php');
      include('includes/navbar.php');
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Commentaires</h1>
      <p class="mb-4">Retrouver ici les commentaires du <?= $post['title'] ?></p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Liste des commentaires</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date de puplication</th>
                  <th>Pseudo</th>
                  <th>Commentaire</th>
                  <th>Nombres de signalement</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Date de puplication</th>
                  <th>Pseudo</th>
                  <th>Commentaire</th>
                  <th>Nombres de signalement</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php while ($donnees = $comment->fetch()){?>
                <tr>
                  <td><?= $donnees['comment_date_fr'] ?></td>
                  <td><?= $donnees['pseudo'] ?></td>
                  <td><?= $donnees['comment'] ?></td>
                  <td><?php if($donnees['report'] >= 0){?><?= $donnees['report'] ?> <?php }else{
                    ?> <i class="fas fa-check-circle"></i> <?php }?> </td>
                  <td>
                  <?php if($donnees['report'] >= 0){?><a href="adminIndex.php?p=valid&amp;id=<?=$donnees['id'];?>&amp;post=<?=$donnees['post_id'];?>" title="Valider" class="btn btn-warning btn-circle btn-sm">
                  <i class="fas fa-check-circle"></i> <?php } ?>
                  </a>
                  <a href="adminIndex.php?p=delete&amp;id=<?= $donnees['id'] ?>&amp;post=<?=$donnees['post_id'];?>" class="btn btn-danger btn-circle btn-sm" title="Supprimer" onclick="return confirmation()">
                    <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php include('includes/footer.php');
      
}else
  {
    header('location:../login.php');
  }