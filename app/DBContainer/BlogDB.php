<?php

namespace App\DBContainer;

use Illuminate\Support\Facades\DB;

class BlogDB extends StructDB
{
    public function getAll($tabelName)
    {
        $query = "SELECT * FROM `$tabelName`";
        $sth = $this->db->query($query);
        $sth->execute();
    
        return $sth->fetchALL(PDO::FETCH_CLASS);
    }

    public function removeAll($tabelName)
    {
        $query = "DELETE FROM `rates`";
        $sth = $this->db->prepare($query);
        $sth->execute();
    }

    public function getPost($tabelName, $id)
    {
        $query = "SELECT * FROM `$tabelName` WHERE id = :id";
        $sth = $this->db->prepare($query);
        $sth->execute([':id' => $id]);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->modelClass);

        return $sth->fetch(PDO::FETCH_CLASS);
    }

    public function getTopArtikels()
    {
        return DB::select("SELECT * FROM `$this->tabelArtikels` LIMIT 3");

        /*
        $query = "SELECT * FROM `$tabelName` LIMIT 3";
        $sth = $this->db->query($query);
        $sth->execute();
    
        return $sth->fetchALL(PDO::FETCH_CLASS);*/
    }

    public function insertComment($id, $comment)
    {
        $query = "INSERT INTO `$this->tabelComments` (`post_id`, `content`) VALUES (:post_id, :comment)";
        $sth = $this->db->prepare($query);        
        $sth->execute([
            ':post_id' => $id, 
            ':comment' => $comment
            ]);
    }

    public function commentsByPost($postID)
    {
        $query = "SELECT * FROM `$this->tabelComments` WHERE post_id = :id";
        $sth = $this->db->prepare($query);
        $sth->execute([':id' => $postID]);        

        return $sth->fetchALL(PDO::FETCH_CLASS);
    }

    public function commentByID($commentID)
    {
        $query = "SELECT * FROM `$this->tabelComments` WHERE id = :id";
        $sth = $this->db->prepare($query);
        $sth->execute([':id' => $commentID]);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->modelClass);

        $result = $sth->fetch(PDO::FETCH_CLASS);
        
        return $result == false ? "": $result->content;
    }        

    public function updateComment($id, $comment)
    {
        $query = "UPDATE `$this->tabelComments` SET `content` = :content WHERE id = :id";
        $sth = $this->db->prepare($query);        
        $sth->execute([
            ':content' => $comment, 
            ':id' => $id
            ]);     
    } 
}
