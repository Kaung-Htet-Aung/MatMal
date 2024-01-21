<?php
use Libs\Database\FavouriteTable;
use Libs\Database\FinishedTable;

include 'includes/header.php';
include("vendor/autoload.php");
include("function.php");

use Libs\Database\PostTable;
use Libs\Database\MySQL;

$table = new PostTable(new MySQL());
$favtable = new FavouriteTable(new MySQL());
$finishedTable = new FinishedTable(new MySQL());
$postId = checkParam("pid");
$post = $table->getPostById($postId);
$favouritePost = $favtable->checkPost($postId);
$finished= $finishedTable->checkPost($postId);

function isMobileDevice()
{
    return preg_match("/(android|webos|iphone|ipad|ipod|blackberry|windows phone)/i", $_SERVER['HTTP_USER_AGENT']);
}

$facebookPostLink = $post['data'][0]->link;
$redirectUrl = isMobileDevice() ? "fb://facewebmodal/f?href=" . urlencode($facebookPostLink) : $facebookPostLink;
?>

<div class="mt-5 container ">
    <?php alertMessage() ?>
    <a href="<?= $redirectUrl ?>" class="btn btn-primary">Open in facebook</a>
    <br><br>
    <p style="line-height:2rem;font-weight:bold" class="px-2 py-2">
        <?php echo $post['data'][0]->description ?>
    </p>
    <div class="d-flex justify-content-between ">
        <?php
        echo $favouritePost
            ? "<form action='actions/favourite.php?pid={$post['data'][0]->id}' method='post'>
                <input type='submit' name='delFav' value='Del from Fav' class='btn btn-sm btn-danger'>
            </form>"
            : "<form action='actions/favourite.php?pid={$post['data'][0]->id}' method='post'>
               <input type='submit' name='addFav' value='Add to Fav' class='btn btn-sm btn-primary'>
               </form>";
        ?>

        <?php
        echo $finished
            ? "<form action='actions/finished.php?pid={$post['data'][0]->id}' method='post'>
            <input type='submit' name='delFinished' value='Del from Done' class='btn btn-sm btn-danger'>
        </form>"
            : "<form action='actions/finished.php?pid={$post['data'][0]->id}' method='post'>
            <input type='submit' name='addFinished' value='done' class='btn btn-sm btn-success'>
        </form>";
        ?>

    </div>

</div>
<?php include("includes/footer.php") ?>