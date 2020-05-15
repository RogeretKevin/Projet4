<?php

require_once('model/ModelFrontend.php');

function home()
{
    $modelManager = new ModelFrontend();
    $smallPost = $modelManager->getSmallPost();
    require('views/home.php');
}

function post()
{
    $modelManager = new ModelFrontend();
    $post = $modelManager->getPost($_GET['id']);
    $comments = $modelManager->getComments($_GET['id']);
    $result = $modelManager->nbComment($_GET['id']);
    require('views/post.php');
}

function comment()
{
    $modelManager = new ModelFrontend();
    $modelManager->sendComment(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['commentaire']), $_GET['id']);
    $post = $modelManager->getPost($_GET['id']);
    header('location:index.php?p=post&id=' . $post['id'] .'#comment');
}

function report()
{
    $modelManager = new ModelFrontend();
    $modelManager->reportComment($_GET['idcomment']);
    $post = $modelManager->getPost($_GET['id']);
    header('location:index.php?p=post&id=' . $post['id'] .'#comment');
}

function form()
{
    $modelManager = new ModelFrontend();
    $modelManager->sendForm(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['message']));
    $valid = true;
    header('location:index.php?p=contact&a=true');
}

// LOGIN //
function login()
{
    $modelManager = new ModelFrontend();
    $login = $modelManager->checkpseudo($_POST['pseudo']);
    $isPasswordCorrect = password_verify($_POST['pass'], $login['passworld']);

    if (!$login)
    {
        header('location:login.php?error=true');
    }
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['admin'] = $_POST['pseudo'];
        header('location:admin/adminIndex.php');
    }
    else {
        header('location:login.php?error=true');
    }
}
}