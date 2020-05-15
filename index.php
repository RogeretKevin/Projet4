<?php
require('controller/controllerFrontend.php');

if (!isset($_GET['p'])) {
    home();
}

// AFFICHE LE CHAPITRE //
else if ($_GET['p'] == 'post') {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        post();
    }
    else {
        header('location:index.php?p=post&id=1');
    }
}

// PAGE A PROPOS DE L'AUTEUR //
else if ($_GET['p'] == 'about') {
    require('views/about.php');
}

// PAGE DU FORMULAIRE DE CONTACT //
else if ($_GET['p'] == 'contact') {
    require('views/contact.php');
}

// ENVOIE LE COMMENTAIRE //
else if($_GET['p'] == 'comment' && isset($_GET['id'])) {
    comment();
}

// REPORT UN COMMENTAIRE //
else if($_GET['p'] == 'report' && isset($_GET['id'])) {
    report();
}

// ENVOIE UN MESSAGE //
else if ($_GET['p'] == 'form' && isset($_POST['name']) && isset($_POST['email'])) {
    form();
}

// LOGIN //
else if ($_GET['p'] == 'login' && isset($_POST['pseudo'])) {
    login();
}

else {
    home();
}