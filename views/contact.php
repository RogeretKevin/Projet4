<?php include('includes/header.php'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/contact-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="page-heading">
          <h1>Contactez Moi</h1>
          <span class="subheading">Vous avez une question?</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Vous souhaitez me contacter? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vous répondrai
        dans les plus brefs délais!</p>
      <form action='index.php?p=form' method='post'>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Nom</label>
            <input type="text" class="form-control" placeholder="Nom" name="name" required
              data-validation-required-message="Entrez votre nom.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" required
              data-validation-required-message="Entrez votre Email.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Message</label>
            <textarea rows="5" class="form-control" placeholder="Message" name="message" required
              data-validation-required-message="Entrez votre message."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<hr>

<!-- MESSAGE DE CONFIRMATION -->
<?php 
if(isset($_GET["a"])){
    echo "<script>success('Votre message a été envoyé');</script>";
}

include('includes/footer.php'); ?>