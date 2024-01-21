<?php
  namespace Libs\Database;
  
  use PDOException;
  class UserTable{
    private $db=null;
    public function __construct(MySQL $db){
    $this->db=$db->connect();
  }
  public function insert($data){
     try{
      
        $query="
        INSERT INTO user(
            name,email,password
        )VALUES(
            :name,:email,:password
        )
        ";
        $statement = $this->db->prepare($query);
        $statement->execute([
         ':name' => $data['name'],
         ':email' => $data['email'],
         ':password' => $data['password']
         
     ]);
        return $this->db->lastInsertId();
     }catch(PDOException $e){
        echo $e->getMessage();
     }
     
  }
  public function checkUser($email)
  {
    try {
      $query = "SELECT * FROM user WHERE email=:email";
      $statement = $this->db->prepare($query);
      $statement->execute([":email"=> $email]);
      return $statement->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }


  public function getAll(){
    $query="SELECT * FROM users";
        $statement=$this->db->$query($query);
        return $statement->fetchAll();
  }
}
