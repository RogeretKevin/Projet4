<?php

require_once('adminModel/ModelBackend.php');

function counter()
{
    $modelManager = new ModelBackend();
    $nbPosts = $modelManager->getCounter('billets');
    $nbComments = $modelManager->getCounter('comments');
    $nbForms = $modelManager->getCounter('form');
    require('adminViews/dashboard.php');
}

// RECUPERE LES CHAPITRES //
function posts()
{
    $modelManager = new ModelBackend();
    $post = $modelManager->getPosts();
    require('adminViews/posts.php');
}

// RENVOIE SUR LA PAGE DU CHAPITRE //
function read()
{
    $modelManager = new ModelBackend();
    $post = $modelManager->getPost($_GET['id']);
    require('adminViews/read.php');
}

// PAGE D'EDITION //
function beforeEdit()
{
    $modelManager = new ModelBackend();
    $post = $modelManager->getPost($_GET['id']);
    require('adminViews/edit.php');
}

// ENREGISTRE LES MODIFICATIONS DANS LA BDD //
function edit()
{
    $modelManager = new ModelBackend();
    $modelManager->editPost(htmlspecialchars($_POST['newtitle']), strip_tags($_POST['newtext']), strip_tags($_POST['id']));
    header('location:adminIndex.php?p=posts&a=edit');
}

// ENREGISTRE LE NOUVEAU CHAPITRE DANS LA BDD //
function create()
{
    $modelManager = new ModelBackend();
    $modelManager->createPost(strip_tags($_POST['titre']), strip_tags($_POST['contenu']));
    header('location:adminIndex.php?p=newcreate&a=create');
}

// SUPPRIME LE CHAPITRE DE LA BDD //
function deletePosts()
{
    $modelManager = new ModelBackend();
    $modelManager->deletePost($_GET['id']);
    header('location:adminIndex.php?p=posts&a=delete');
}

// SUPPRIME LES COMMENTAIRES DU CHAPITRE //
function deleteComments()
{
    $modelManager = new ModelBackend();
    $modelManager->deleteComment($_GET['id']);
    header('location:adminIndex.php?p=comment&id=' . $_GET['post'] .'');
}

// CHARGE LES CHAPITRES SUR LA PAGE COMMENT //
function comments()
{
    $modelManager = new ModelBackend();
    $post = $modelManager->getPosts();
    require('adminViews/comments.php');
}

// AFFICHE LES COMMENTAIRE DU CHAPITRE //
function comment()
{
    $modelManager = new ModelBackend();
    $comment = $modelManager->getComments($_GET['id']);
    $post = $modelManager->getPost($_GET['id']);
    require('adminViews/comment.php');
}

// RECUPERE LES MESSAGES DU FORMULAIRE DE CONTACT //
function form()
{
    $modelManager = new ModelBackend();
    $messages = $modelManager->getForm();
    require('adminViews/form.php');
}

// CHANGE LE MESSAGE EN 'VUE' //
function vue()
{
    $modelManager = new ModelBackend();
    $modelManager->editMessage($_GET['id']);
    $messages = $modelManager->getForm();
    require('adminViews/form.php');
}

// VALIDE UN COMMENTAIRE //
function valid()
{
    $modelManager = new ModelBackend();
    $modelManager->validComment($_GET['id']);
    header('location:adminIndex.php?p=comment&id=' . $_GET['post'] .'');
}