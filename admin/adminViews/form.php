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
      <h1 class="h3 mb-2 text-gray-800">Messages</h1>
      <p class="mb-4">Retrouver ici les messages envoyer par les lecteurs</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Liste des messages</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date de puplication</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Date de puplication</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php while ($donnees = $messages->fetch()){?>
                <tr <?php if($donnees['readmessage'] == "0"){?> id="form" <?php }?>>
                  <td><?= $donnees['creation_date_fr'] ?></td>
                  <td><?= $donnees['name'] ?></td>
                  <td><?= $donnees['email'] ?></td>
                  <td><?= $donnees['message'] ?></td>
                  <td><?php if($donnees['readmessage'] == "0"){?><a href="adminIndex.php?p=vue&amp;id=<?= $donnees['id'] ?>" title="Marquer comme vue"
                      class="btn btn-primary btn-circle btn-sm">
                      <i class="fas fa-eye"></i>
                    </a><?php }?>
                    <a href="mailto:<?= $donnees['email'] ?>" title="Répondre"
                      class="btn btn-primary btn-circle btn-sm">
                      <i class="fas fa-envelope-open"></i>
                    </a> </td>
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
      include('includes/footer.php');?>

  <?php 
    }else
    {
      header('location:../login.php');
    }