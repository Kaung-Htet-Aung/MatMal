<?php
session_start();
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UserTable;

include("../vendor/autoload.php");

$table = new UserTable(new MySQL());

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    if ($email != '' && $password != '') {
        $result = $table->checkUser($email);
       
        if ($result) {
            $data=$result[0];
             
        }else{
            HTTP::redirect('login.php','invalid email address !');
            exit();
        }
        if(!password_verify($password,$data->password)){
             HTTP::redirect('login.php','Password does not match!');
             exit();
        }
      
        $_SESSION['loggedin']=true;
        $_SESSION['loggedInUser']=[
            'id'=>$data->id,
            'name'=>$data->name,
            'email'=>$data->email,
            
        ];
       
        HTTP::redirect('./index.php','Login Successfully');
    } else {
        HTTP::redirect('login.php','email and password cannot be null !');
    }
    exit();
}
?>