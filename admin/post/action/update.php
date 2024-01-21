<?php
use Libs\Database\PostTable;
include("../../../vendor/autoload.php");
use Libs\Database\MySQL;
use Helpers\HTTP;

$table = new PostTable(new MySQL());

if ($table && isset($_POST['updatePost'])) {
    $title = $_POST['title'];
    $id = $_POST['postId'];
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
        "favourite"=>$favourite,
        "finished"=>$finished,
        "pin"=>$pin,
        "id"=>$id
    ];
    $result = $table->updatePost($data);
    if ($result) {
        // User already exists, redirect to admin-create.php
        HTTP::redirect('admin/post/post-edit.php?id=' . $id, "Post Updated Successfully!");
        exit(); // Make sure to exit after the redirect
    } else {
        HTTP::redirect('admin/post/post-edit.php?id=' . $id, "Something went wrong!");
        exit();
    }


}

