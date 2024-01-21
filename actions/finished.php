<?php

use Libs\Database\FinishedTable;

include("../vendor/autoload.php");
include '../function.php';
use Helpers\HTTP;
use Libs\Database\MySQL;

$postId = checkParam("pid");
$table = new FinishedTable(new MySQL());
if (isset($_POST["addFinished"]) && $table) {
    $finished = null;
    $data = [
        "postId" => $postId
    ];
    $favouritePost = $table->checkPost($postId);
    if ($favouritePost) {
        HTTP::redirect("view.php", "That post is already in favourite!", "pid=$postId");
    }else{
        $result = $table->addToFinished($data);
        if ($result) {
            HTTP::redirect("view.php", "That post have been added to the favourite successfully!", "pid=$postId");
        }else{
            
        }
    }
   
}
if (isset($_POST["delFinished"]) && $table) {
   
    $favouritePost = $table->removeFinished($postId);
    if ($favouritePost) {
        HTTP::redirect("view.php", "That post is already in finished!", "pid=$postId");
    }else{
        $result = $table->addToFinished($data);
        if ($result) {
            HTTP::redirect("view.php", "That post have been added to the finished successfully!", "pid=$postId");
        }else{
            
        }
    }
   
}

