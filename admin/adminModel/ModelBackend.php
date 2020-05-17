<?php
class ModelBackend
{ 

//  CONNECTION A LA BDD //
private function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

public function counterPosts()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT COUNT(*) AS nbPosts FROM billets');
    $result = $req->fetch();
    return $result;
}

public function counterComments()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT COUNT(*) AS nbComments FROM comments');
    $result = $req->fetch();
    return $result;
}

public function counterForm()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT COUNT(*) AS nbForm FROM form');
    $result = $req->fetch();
    return $result;
}

// RECUPERE TOUS LES CHAPITRES //
public function getPosts()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y\') AS creation_date_fr FROM billets ORDER BY creation_date DESC');
    return $req;
}

// RECUPERE UN CHAPITRE //
public function getPost($postId)
{
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y\') AS creation_date_fr FROM billets WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

// ENREGISTRE LES MODIFICATIONS DANS LA BDD //
public function editPost($newtitle, $newcontent, $id)
{
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE billets SET title = :newtitle, content = :newcontent WHERE id = :id');
    $req->execute(array(
        'newtitle' => $newtitle,
        'newcontent' => $newcontent,
        'id' => $id
    ));
    return $req;
}

// ENREGISTRE LE NOUVEAU CHAPITRE DANS LA BDD //
public function createPost($title, $content)
{
    $db = $this->dbConnect();
	$req = $db->prepare('INSERT INTO billets (title, content, creation_date) VALUES(:title, :content, NOW())');
    $req->execute(array(
        'title' => $title, 
        'content' => $content
    ));
    return $req;
}

// SUPPRIME LE CHAPITRE DE LA BDD //
public function deletePost($id)
{
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM billets WHERE id= :idcomment');
    $req->execute(array(
        'idcomment' => $id
    ));
    return $req;
}

// RECUPERE LES COMMENTAIRES D'UN CHAPITRE //
public function getComments($postId)
{
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, pseudo, comment, post_id, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    return $comments;
}

// SUPPRIME LE COMMENTAIRE DE LA BDD //
public function deleteComment($id)
{
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE id= :idcomment');
    $req->execute(array(
        'idcomment' => $id
    ));
    return $req;
}

// RECUPERE LES MESSAGE DU FORMULAIRE DE CONTACT //
public function getForm()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, name, email, message, readmessage, DATE_FORMAT(date_message, \'Publié le %d/%m/%Y\') AS creation_date_fr FROM form ORDER BY date_message DESC');
    return $req;
}

// CHANGE LE MESSAGE EN 'VUE' //
public function editMessage($id)
{
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE form SET readmessage = TRUE WHERE id = :id');
    $req->execute(array(
        'id' => $id
    ));
    return $req;
}

// VALIDE UN COMENTAIRE //
public function validComment($id)
{
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE comments SET report = -1 WHERE id = :id');
    $req->execute(array(
        'id' => $id
    ));
    return $req;
}
}