<?php 

namespace Libs\Database;
use PDOException;

class FinishedTable{
    private $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function addToFinished($data)
    {
        try {

            $query = "
        INSERT INTO finished(
            post_id
        )VALUES(
            :post_id
        )
        ";
            $statement = $this->db->prepare($query);
            $statement->execute([
                
                ':post_id' => $data['postId'],
               
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public function checkPost($id)
    {
      try {
        $query = "SELECT * FROM finished WHERE post_id=:id";
        $statement = $this->db->prepare($query);
        $statement->execute([":id"=> $id]);
        return $statement->rowCount();
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }
    public function removeFinished($id)
    {
      try {
        $query = "DELETE FROM finished WHERE post_id=:id";
        $statement = $this->db->prepare($query);
        $statement->execute([":id"=> $id]);
        return $statement->rowCount();
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }
}