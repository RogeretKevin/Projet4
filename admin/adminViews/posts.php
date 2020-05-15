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
      <h1 class="h3 mb-2 text-gray-800">Chapitres</h1>
      <p class="mb-4">Retrouver ici la liste de tous les articles de votre site.</p>
      <a class="btn btn-primary" href="adminIndex.php?p=newcreate">
        <span>Créer</span>
        <i class="fas fa-plus"></i>
      </a></br></br>

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
          <?php while ($donnees = $post->fetch()){ ?>
                <tr>
                  <td><?= $donnees['id'] ?></td>
                  <td><?= $donnees['title'] ?></td>
                  <td><?= $donnees['creation_date_fr'] ?></td>
                  <td>
                    <a href="../index.php?p=post&amp;id=<?= $donnees['id'] ?>" title="Lire"
                      class="btn btn-primary btn-circle btn-sm">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="adminIndex.php?p=beforeEdit&amp;id=<?= $donnees['id'] ?>" title="Modifier"
                      class="btn btn-warning btn-circle btn-sm">
                      <i class="fas fa-pen"></i>
                    </a>
                    <a href="adminIndex.php?p=deletePost&amp;id=<?= $donnees['id'] ?>"
                      class="btn btn-danger btn-circle btn-sm" title="Supprimer" onclick="return confirmation()">
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

  <?php 
  if(isset($_GET["a"]) && $_GET["a"] == "edit"){
    echo "<script>success('Chapitre modifier');</script>";
   } 
   if(isset($_GET["a"]) && $_GET["a"] == "delete"){
    echo "<script>success('Chapitre supprimer');</script>";
   }
   ?>

  <?php 
      include('includes/footer.php');?>

  <?php 
    }else
    {
      header('location:../login.php');
    }