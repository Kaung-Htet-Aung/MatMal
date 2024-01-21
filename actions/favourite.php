<?php
use Libs\Database\FavouriteTable;

include("../vendor/autoload.php");
include '../function.php';
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\PostTable;

$postId = checkParam("pid");
$table = new FavouriteTable(new MySQL());
if (isset($_POST["addFav"]) && $table) {
    
    $data = [
        "postId" => $postId
    ];
    $favouritePost = $table->checkPost($postId);
    if ($favouritePost) {
        HTTP::redirect("view.php", "That post is already in favourite!", "pid=$postId");
    }else{
        $result = $table->addToFavourite($data);
        if ($result) {
            HTTP::redirect("view.php", "That post have been added to the favourite successfully!", "pid=$postId");
        }else{
            
        }
    }
   
}
if (isset($_POST["delFav"]) && $table) {
   
    $favouritePost = $table->removeFav($postId);
    if ($favouritePost) {
        HTTP::redirect("view.php", "That post is already in favourite!", "pid=$postId");
    }else{
        $result = $table->addToFavourite($data);
        if ($result) {
            HTTP::redirect("view.php", "That post have been added to the favourite successfully!", "pid=$postId");
        }else{
            
        }
    }
   
}

