<?php
include './includes/header.php';
include("../vendor/autoload.php");
include("../function.php");

use Libs\Database\Pagination;
use Libs\Database\MySQL;
use Libs\Database\CategoryTable;

$table = new Pagination(new MySQL);
$catetable = new CategoryTable(new MySQL());

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$total_rows = $table->getPostsNum('posts');
$no_of_records_per_page = 6;
$offset = ($pageno - 1) * $no_of_records_per_page;
$total_pages = ceil($total_rows / $no_of_records_per_page);
$posts = $table->getPosts('posts',$offset, $no_of_records_per_page);

?>

<div class="container mt-5 marketing">

    <!-- Three columns of text below the carousel -->
    <div class="title mt-5 d-flex justify-content-center">
        <h2>All Posts </h2>
    </div>
    <div class="row mt-5">
        <?php
        if (count($posts) > 0) {
            ?>
            <?php foreach ($posts as $post): ?>
                <div class="col-lg-4 ">
                    <a href="../view.php?pid=<?= $post->id ?>">
                        <div class="card m-auto rounded-top" style="width: 18rem;">
                            <img src="../assets/images/infologo.jpg" height="200px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $post->title ?>
                                </h5> <br>
                                <div class="justify-content-between d-flex">

                                    <div class="">#
                                        <?php
                                        $categoryName = $catetable->getCategoryById($post->category);
                                        echo $categoryName[0]->name;
                                        ?>
                                    </div>
                                    <div class="">
                                        <!--  -->
                                    </div>


                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-between">

                                <small>
                                    <?= $post->author ?>
                                </small>
                                <small>
                                    <?= $post->created_at ?>
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <?php
        }

        ?>
    </div>
</div>
<ul class="pagination mt-5 justify-content-center">
    <li>
        <a href="?pageno=1">First</a>
    </li>
    <li class="<?php if ($pageno <= 1) {
        echo 'disable';
    } ?>">
        <a href="<?php if ($pageno <= 1) {
            echo '#';
        } else {
            echo "?pageno=" . ($pageno - 1);
        } ?>">Prev</a>
    </li>
    <li class="<?php if ($pageno >= $total_pages) {
        echo 'disable';
    } ?>">
        <a href="<?php if ($pageno >= $total_pages) {
            echo '#';
        } else {
            echo "?pageno=" . ($pageno + 1);
        } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>

<?php include './includes/footer.php';?>