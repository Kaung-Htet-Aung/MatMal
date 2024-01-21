<?php

use Libs\Database\CategoryTable;

include("../../vendor/autoload.php");
use Libs\Database\MySQL;

include '../includes/header.php';

$cateTable = new CategoryTable(new MySQL());

$category = $cateTable->getCategories();
?>

<div class="container-fluid px-4 mt-4 shadow-sm">

     <div class="card">
          <div class="card-header">
               <h4 class="mb-0">Posts
                    <a href="index.php" class="btn btn-primary float-end"> Back</a>
               </h4>
          </div>
          <div class="card-body">
               <?php alertMessage(); ?>
               <form action="./action/populate.php" method="POST">
                    <div class="row">
                         <div class="col-md-6 mb-3">
                              <label for="">Title *</label>
                              <input type="text" name="title" class="form-control" />
                         </div>
                         <div class="col-md-6 mb-3">
                              <label for="">Author *</label>
                              <input type="text" name="author" class="form-control" />
                         </div>
                         <div class="col-md-12 mb-3">
                              <label for="">Description *</label>
                              <textarea rows="3" name="description" cols="" class="form-control"></textarea>
                         </div>
                        
                         <div class="col-md-12 mb-3">
                              <label for="">Post Link *</label>
                              <input type="text" name="link" class="form-control" />
                         </div>
                         <div class="col-md-12 mb-3">

                         <?php foreach($category as $cate):?>
                              <input type="radio" name="category" id="" value="<?=$cate->cid?>"><?=$cate->name?>
                              <?php endforeach; ?>
                         </div>
                         <div class="col-md-12 mb-3 text-end">

                              <button type="submit" name="createPost" class="btn btn-primary">Save</button>
                         </div>
                    </div>
               </form>
          </div>
     </div>
</div>

<?php include('../includes/footer.php') ?>