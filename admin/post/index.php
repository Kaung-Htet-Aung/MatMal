<?php

include("../../vendor/autoload.php");
include('../includes/header.php') ;
use Libs\Database\MySQL;
use Libs\Database\PostTable;


$table = new PostTable(new MySQL());

$posts = $table->getPosts();

?>



<div class="container-fluid  mt-4 shadow-sm">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Posts
                <a href="post-create.php" class="btn btn-primary float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
           <?php alertMessage() ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($posts) > 0) {

                            ?>
                            <?php foreach($posts as $post): ?>
                            <tr>
                                <td><?=$post->id?></td>
                                <td><?=$post->title?></td>
                                
                                <td><?=$post->author?></td>
                                <td>
                                    <a href="post-edit.php?id=<?= $post->id?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="./action/delete.php?id=<?=$post->id?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php
                        } else {
                            ?>
                            <tr>
                                <td colspan="4" class="text-center">Record Not found</td>
                            </tr>
                            <?php
                        }
                        ?>

                </table>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>