<?php
namespace Libs\Database;

use PDOException;

class CategoryTable
{
    private $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function insert($data)
    {
        try {

            $query = "
        INSERT INTO posts(
            title,description,author,category,favourite,finished,pin,created_at
        )VALUES(
            :title,:description,:author,:category,:favourite,:finished,:pin,NOW()
        )
        ";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':author' => $data['author'],
                ':category' => $data['category'],
                ':favourite' => $data['favourite'],
                ':finished' => $data['finished'],
                ':pin' => $data['pin'],
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public function getPostById($id)
    {
        try {
            $query = "SELECT * FROM posts WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([":id" => $id]);
            $data= $statement->fetchAll();
            if($data){
                $response =[
                  'status'=>200,
                  'data'=>$data,
                  'message'=>'Record found'
                ];
                return $response;
              }else{
                $response =[
                  'status'=>404,
                  'message'=>'Record not found'
                ];
                return $response;
              }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function getCategories()
    {
        try {
            $query = "SELECT * FROM categories";
            $statement = $this->db->query($query);
            return $statement->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getCategoryById($id)
    {
        try {
            $query = "SELECT name FROM categories WHERE cid=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([":id" => $id]);
            return $statement->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updatePost($data)
    {
        try {
            $query = "
      UPDATE posts SET title=:title,description=:description,author=:author,
      category=:category,favourite=:favourite,finished=:finished,pin=:pin
       WHERE id=:id
       ";

            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deletePost($id){
        try{
          $query= "DELETE FROM posts WHERE id=?";
          $statement= $this->db->prepare($query);
          $statement->execute([$id]);
          return $statement->rowCount();
        }catch(PDOException $e){
          return $e->getMessage();
        }
      }
}
