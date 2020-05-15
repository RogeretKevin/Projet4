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
                  <form method="post" action="adminIndex?p=edit">
                        <label for="newtitle">Titre: </label>
                        <input type="text" name="newtitle" value="<?= $post['title'] ?>">
                        <textarea name="newtext" cols="40" rows="20"><?= $post['content'] ?></textarea></br>
                        <input type="hidden" name="id" value="<?= $post['id'] ?>">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Modifier</button>
                  </form>
            </div>

      </div> <!-- End of Main Content -->

<?php  include('includes/footer.php');

}else
{
  header('location:../login.php');
}