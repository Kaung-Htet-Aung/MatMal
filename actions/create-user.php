<?php
include("../vendor/autoload.php");
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UserTable;

$table = new UserTable(new MySQL());
if (isset($_POST["registerBtn"])&& $table) {
     $name =$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
     $data = [
        "name" => $name ?? "Unknown",
        "email" => $email ?? "Unknown",
        "password" => $bcrypt_password ?? "Unknown",
       

    ];

    $user =$table->checkUser($email);
    if($user){
       HTTP::redirect('login.php',"user already exit!");
    }else{
        $result=$table->insert($data);
        if($result){
            HTTP::redirect("login.php","Register Successfully!");
        }
    }
}
