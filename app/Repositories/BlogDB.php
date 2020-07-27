<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class BlogDB extends StructDB
{
    public function getAll($tabelName)
    {
        return DB::select("SELECT * FROM `$tabelName`");
    }

    public function removeAll($tabelName)
    {
        $query = "DELETE FROM `rates`";
        $sth = $this->db->prepare($query);
        $sth->execute();
    }

    public function getPost($tabelName, $id)
    {
        return DB::table($tabelName)->where('id', $id)->first();
    }

    public function getTopArtikels()
    {
        return DB::select("SELECT * FROM `$this->tabelArtikels` LIMIT 3");
    }

    public function insertComment($id, $comment)
    {
        DB::insert("INSERT INTO `$this->tabelComments` (`post_id`, `content`) VALUES (?, '?'", 
            [$id, $comment]);
        
        /* $query = "INSERT INTO `$this->tabelComments` (`post_id`, `content`) VALUES (:post_id, :comment)";
        $sth = $this->db->prepare($query);        
        $sth->execute([
            ':post_id' => $id, 
            ':comment' => $comment
            ]); */
    }

    public function commentsByPost($postID)
    {
        return DB::select("SELECT * FROM `$this->tabelComments` WHERE post_id = ?", [$postID]);
    }

    public function commentByID($commentID)
    {
        $result = DB::table($this->tabelComments)->where('id', $commentID)->get();
        
        return $result == false ? "": $result->first()->content;
    }        

    public function updateComment($id, $comment)
    {
      DB::update("UPDATE `$this->tabelComments` SET `content` = ? WHERE id = ?", [$comment, $id]);
        /*   $query = "UPDATE `$this->tabelComments` SET `content` = :content WHERE id = :id";
        $sth = $this->db->prepare($query);        
        $sth->execute([
            ':content' => $comment, 
            ':id' => $id
            ]);   */   
    } 
}
