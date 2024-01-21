<?php
  use Libs\Database\PostTable;
  
  include("../../../vendor/autoload.php");
  include("../../../function.php");
  use Libs\Database\MySQL;
 
  use Helpers\HTTP;
  
  $table = new PostTable(new MySQL());
  $postId=checkParam("id");
  

  if($table){
    $result=$table->deletePost($postId);
    if($result){
        HTTP::redirect('admin/post/index.php', "Post delected successfully!");
    }else{
        HTTP::redirect('admin/post/index.php', "Post delected successfully!");

    }

  }  

?>