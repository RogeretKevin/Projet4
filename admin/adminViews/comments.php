<?php session_start();

if(isset($_SESSION['admin']) AND !empty($_SESSION['admin']))
{

  include('includes/header.php');
  include('includes/navbar.php'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Commentaires</h1>
      <p class="mb-4">Retrouver ici les commentaires chapitres par chapitres</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Liste des chapitres</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titre</th>
                  <th>Date de puplication</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Titre</th>
                  <th>Date de puplication</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php while ($donnees = $post->fetch()){?>
                <tr>
                  <td><?= $donnees['id'] ?></td>
                  <td><?= $donnees['title'] ?></td>
                  <td><?= $donnees['creation_date_fr'] ?></td>
                  <td>
                    <a href="adminIndex.php?p=comment&amp;id=<?= $donnees['id'] ?>" title="Commentaires" class="btn btn-warning btn-circle btn-sm">
                    <i class="far fa-comments"></i>
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