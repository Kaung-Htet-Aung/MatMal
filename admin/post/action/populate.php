<?php

include("../../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\PostTable;
use Helpers\HTTP;

$table = new PostTable(new MySQL());

if (isset($_POST['createPost'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_POST['author'];
    $link = $_POST['link'];
    $category =$_POST['category'];
    $favourite=null;
    $pin=0;
    $finished=null;
    $data = [
        "title" => $title ?? "Unknown",
        "description" => $description ?? "Unknown",
        "author" => $author ?? "Unknown",
        "link" => $link ?? "",
        "category" => $category,
        "pin"=>$pin 
    ];
    if ($table) {
         

        $result=$table->insert($data);
        if ($result) {
            // Data inserted successfully, redirect with success message
            HTTP::redirect('admin/post/post-create.php', "Post created successfully!");
        } else {
            // Handle insertion failure, redirect to an error page or handle it accordingly
            HTTP::redirect('admin/post/post-create.php', "Failed to create post!");
            exit();
        }
    }
}  



/* if(isset($_POST['createCategory'])){
    $name = $_POST['name'];
    $decription=$_POST['description'];
    $status = isset($_POST['status'])==true?1:0;
    $data=[
        "name"=> $name?? "unknown",
        "description"=>$decription?? "unknown",
        "status"=> $status?? 0

    ];
    if($table){
        $result =$table->insertCategory("categories", $data);
        
        if($result){
            HTTP::redirect("admin/categories.php", "Category created successfully!");
        }else{
            HTTP::redirect("admin/categories-create.php","Cannot create category");
        }
    }
} */