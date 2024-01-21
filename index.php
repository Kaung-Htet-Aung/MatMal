<?php


include 'includes/header.php';
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\PostTable;
use Libs\Database\CategoryTable;


$table = new PostTable(new MySQL());
$catetable = new CategoryTable(new MySQL());

$posts = $table->getRecentPost();


?>

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="./assets/images/use2.jpg" alt="">

        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>

          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./assets/images/use2.jpg" alt="">

        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>

          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./assets/images/use2.jpg" alt="">

        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>

          </div>
        </div>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container mt-5 marketing">

    <!-- Three columns of text below the carousel -->
    <div class="title mt-5 d-flex justify-content-center">
      <h2>Recent Blogs </h2>
    </div>
    <div class="row mt-5">
      <?php
      if (count($posts) > 0) {
        ?>
        <?php foreach ($posts as $post): ?>
          <div class="col-lg-4 ">
            <a href="view.php?pid=<?= $post->id ?>">
              <div class="card m-auto rounded-top" style="width: 18rem;">
                <img src="./assets/images/infologo.jpg" height="200px" class="card-img-top" alt="...">
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


      <!-- /.col-lg-4 -->
      <!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->


    <!--  <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span>
        </h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.
        </p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
          height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
          preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
        </svg>

      </div>
    </div> -->

    <!--  <hr class="featurette-divider">
 -->
    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

  <div class="container mt-5">

    <!-- Three columns of text below the carousel -->
    <div class="title mt-5 d-flex justify-content-center">
      <h2>Recent Blogs </h2>
    </div>
    <div class="row mt-5">
      <div class="col-lg-3 item bg-light p-2 mt-3 text-center border m-auto" style="width:17rem;">
      <a href="views/savings.php">
        <img src="assets/images/all.png" width="100" height="100" />
        <h2 class="pt-2">savings</h2>
      </a>
      </div><!-- /.col-lg-3 -->

      <div class="col-lg-3 p-2 text-center mt-3 bg-light border m-auto" style="width: 17rem;">
        <a href="views/favourite.php">
          <img src="assets/images/bookmark.png" width="100" height="100" />
          <h2 class="pt-2">fvourite</h2>
        </a>
      </div>

      <!-- /.col-lg-3 -->
      <div class="col-lg-3 p-2 text-center mt-3 bg-light border m-auto" style="width: 17rem;">
      <a href="views/finished.php">
        <img src="assets/images/done.png" width="100" height="100" />
        <h2 class="pt-2">finished</h2>
      </a>
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-3 p-2 text-center mt-3 bg-light border m-auto" style="width: 17rem;">
        <img src="assets/images/blog.png" width="100" height="100" />
        <h2 class="pt-2">Heading</h2>
      </div>
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->
    <!--  <div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span>
    </h2>
    <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.
    </p>
  </div>
  <div class="col-md-5">
    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
      height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
      preserveAspectRatio="xMidYMid slice" focusable="false">
      <title>Placeholder</title>
      <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
    </svg>

  </div>
</div> -->

    <!--  <hr class="featurette-divider">
-->
    <!-- /END THE FEATURETTES -->

  </div>
  <!-- FOOTER -->

  <?php include("includes/footer.php") ?>