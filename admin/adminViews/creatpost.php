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

                  <form method="post" action="adminIndex?p=create">
                        <label for="titre">Titre: </label>
                        <input type="text" name="titre" value="Chapitre ">
                        <textarea name="contenu" cols="40" rows="20" placeholder="Votre contenu."></textarea></br>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Créer</button>
                  </form>

            </div>
            <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php if(isset($_GET["a"])){
      echo "<script>success('Chapitre ajouter');</script>";
}
      
include('includes/footer.php');

}else
{
  header('location:../login.php');
}