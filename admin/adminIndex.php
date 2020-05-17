<?php
require('adminController/adminController.php');

// PAGE D'ACCEUIL //
if (!isset($_GET['p'])) {
    counter();
}

// PAGE DE CREATION DE BILLETS //
else if ($_GET['p'] == 'newcreate') {
    require('adminViews/creatpost.php');
}

// RECUPERE LES CHAPITRES //
else if ($_GET['p'] == 'posts') {
    posts();
}

// RENVOIE SUR LA PAGE DU CHAPITRE //
else if ($_GET['p'] == 'read' && isset($_GET['id']) && $_GET['id'] > 0) {
    read();
}

// PAGE D'EDITION //
else if ($_GET['p'] == 'beforeEdit' && isset($_GET['id']) && $_GET['id'] > 0) {
    beforeEdit();
}

// ENREGISTRE LES MODIFICATIONS DANS LA BDD //
else if ($_GET['p'] == 'edit' && isset($_POST['id']) && $_POST['id'] > 0) {
    edit();
}

// ENREGISTRE LE NOUVEAU CHAPITRE DANS LA BDD //
else if ($_GET['p'] == 'create') {
    create();
}

// SUPPRIME LE CHAPITRE DE LA BDD //
else if ($_GET['p'] == 'deletePost' && isset($_GET['id']) && $_GET['id'] > 0) {
    deletePosts();
}

// LOGOUT //
else if ($_GET['p'] == 'logout') {
    session_start();
    session_destroy();
    header('location:../index.php');
}

// CHARGE LES CHAPITRES SUR LA PAGE COMMENT //
else if ($_GET['p'] == 'comments') {
    comments();
}

// AFFICHE LES COMMENTAIRE DU CHAPITRE //
else if ($_GET['p'] == 'comment') {
    comment();
}

// RECUPERE LES MESSAGE DU FORMULAIRE DE CONTACT //
else if ($_GET['p'] == 'form') {
    form();
}

// CHANGE LE MESSAGE EN 'VUE' //
else if ($_GET['p'] == 'vue') {
    vue();
}

// VALIDE UN COMMENTAIRE //
else if ($_GET['p'] == 'valid') {
    valid();
}

// SUPPRIME UN COMMENTAIRE //
else if ($_GET['p'] == 'delete') {
    deleteComments();
}