<?php 

namespace Libs\Database;

use PDOException;

class Pagination{
    private $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
  
    public function getRowNumber($table1,$table2)
    {
      try {
        $query = "SELECT COUNT(*) FROM $table1,$table2 WHERE $table1.id=$table2.post_id";
        $statement = $this->db->query($query);
        return $statement->fetchColumn();
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }
    public function getPostsNum($table)
    {
      try {
        $query = "SELECT COUNT(*) FROM $table";
        $statement = $this->db->query($query);
        return $statement->fetchColumn();
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }
    public function getFavPosts($table1,$table2,$offset,$row_no)
    {
      try {
        $query = "SELECT * FROM $table1,$table2 WHERE $table1.id=$table2.post_id LIMIT $offset,$row_no";
        $statement = $this->db->query($query);
        return $statement->fetchAll();
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }
    public function getPosts($table,$offset,$row_no)
    {
      try {
        $query = "SELECT * FROM $table LIMIT $offset,$row_no";
        $statement = $this->db->query($query);
        return $statement->fetchAll();
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }
   
   
}