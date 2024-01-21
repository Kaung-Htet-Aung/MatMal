<?php

include '../includes/header.php';
include("../..//vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\PostTable;
use Libs\Database\CategoryTable;

$cateTable = new CategoryTable(new MySQL());

$category = $cateTable->getCategories();
?>

<div class="container-fluid px-4 mt-4 shadow-sm">

    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Posts
                <a href="index.php" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>
            <form action="action/update.php" method="POST">
                <?php
                if (isset($_GET['id'])) {
                    $postId = $_GET['id'];

                } else {
                    echo '<h5>No id found in parmas</h5>';
                }
                $table = new PostTable(new MySQL);

                $postData = $table->getPostById($postId);

                if ($postData) {
                    ?>
                    <input type="hidden" value="<?= $postId ?>" name="postId" class="form-control" />

                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="">Title *</label>
                            <input type="text" name="title" class="form-control"
                                value="<?= $postData['data'][0]->title ?> " />
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Description *</label>
                            <textarea rows="3" name="description" cols=""
                                class="form-control"><?= $postData['data'][0]->description ?> </textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Author *</label>
                            <input type="text" name="author" class="form-control"
                                value="<?= $postData['data'][0]->author ?>" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Post Link *</label>
                            <input type="text" name="link" value="<?= $postData['data'][0]->link ?>" class="form-control" />
                        </div>

                        <div class="col-md-12 mb-3">
                            
                        <?php foreach($category as $cate):?>
                              <input type="radio" name="category" <?= $postData['data'][0]->category == $cate->cid ? 'checked' : ''; ?>  id="" value="<?=$cate->cid?>"/><?=$cate->name?>
                              <?php endforeach; ?>
                         </div>

                        <div class="col-md-12 mb-3 text-end">

                            <button type="submit" name="updatePost" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <?php

                } else {
                    echo "<h5>" . $postData['message'] . "</h5>";
                }

                ?>

            </form>
        </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>