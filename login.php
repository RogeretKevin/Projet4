<?php session_start();

// SI DEJA UNE SESSION REDIRIGE VERS LA PAGE ADMIN //
if(isset($_SESSION['admin']) && !empty($_SESSION['admin']))
{
  header('location:admin/adminIndex.php');
}else{
?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style-login.css">

</head>

<body>

  <div class="login-page">
    <div class="form">
      <h3>Connection Admin</h3>
      <form class="login-form" method="post" action="index.php?p=login">
        <input type="text" name="pseudo" placeholder="Pseudo" />
        <input type="password" name="pass" placeholder="Mot de Passe" />
        <button type="submit">Connection</button>
        <p class="message"><a class="nav-link" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> retour au site</a></p>    
      </form>
    </div>

  <?php if(isset($_GET['error'])){ ?>
    <p class="form" class="alert alert-danger col-sm-6 col-sm-offset-3 form-box">Mauvais identifiant ou mot de passe !</p>
  <?php } ?>
  </div>

  <!-- SCRIPTS -->
  <script src="https://kit.fontawesome.com/900200da29.js" crossorigin="anonymous"></script>

</body>

</html>

<?php } ?>