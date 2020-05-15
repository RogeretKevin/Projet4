<?php
class ModelFrontend
{

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

    public function getSmallPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, IF(CHAR_LENGTH(content) > 200, CONCAT(LEFT(content, 200), "..."), content) AS preview, DATE_FORMAT(creation_date, \'Publié le %d/%m/%Y\') AS creation_date_fr FROM billets ORDER BY creation_date ASC');
        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y\') AS creation_date_fr FROM billets WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, pseudo, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    public function nbComment($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(*) AS nbcomment FROM comments WHERE post_id = ?');
        $req->execute(array($postId));
        $result = $req->fetch();
        return $result;
    }

    public function sendComment($pseudo, $commentaire, $postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments (pseudo, comment, post_id, report, comment_date) VALUES(:pseudo, :comment, :postid, 0, NOW())');
        $req->execute(array(
            'pseudo' => $pseudo, 
            'comment' => $commentaire, 
            'postid' => $postId
        ));
        return $req;
    }

    public function reportComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET report = report + 1 WHERE id = :id');
        $req->execute(array(
            'id' => $id,
        ));
        return $req;
    }

    public function sendForm($name, $email, $message)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO form (name, email, message, date_message) VALUES(:name, :email, :message, NOW())');
        $req->execute(array(
            'name' => $name, 
            'email' => $email, 
            'message' => $message
        ));
        return $req;
    }

    public function adminPost($pseudo, $pass)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();

        return $resultat;
    }

    // LOGIN //
    public function checkpseudo($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, passworld FROM users WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();
        return $resultat;
    }
}