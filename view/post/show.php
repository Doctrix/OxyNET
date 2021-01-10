<?php
use Server\Connection;
use Table\{PostTable, CategoryTable};
use Plugins\Comments;

$id = (int)$params['id'];
$slug = $params['slug'];
$titre_navBar = 'Article';
$background = 'bg-dark';

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);


$titre_header = "{$post->getTitle()}";

if ($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$comments = (new Comments($pdo))->findAll('posts', $posts->id);
?>

<header class="card-body card-title">
    <h2><b>Article : </b><?= e($post->getTitle()) ?></h2>
</header>

<section class="bg-dark card card-body">
    <img src="<?= $post->getPictureID() ?>" height="200px" class="card card-body" alt="">
    <p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <b>
                    <?php foreach ($post->getCategories() as $k => $category) :
                        if ($k > 0) :
                            echo ' - ';
                        endif;
                        $category_url = $router->url('category', [
                            'id' => $category->getID(),
                            'slug' => $category->getSlug()]);
                        ?>
                        <a href="<?= $category_url ?>"><?= e($category->getName()); ?></a>
                    <?php endforeach; ?>
                    </b>
                </li>
            </ol>
        </nav>
        <div class="card">
            <?= $post->getContent() ?>
            <p><a href="<?= e($post->getUrl()) ?>" class="btn btn-info" target="_blank">En savoir plus ...</a></p>
        </div>
</section>
<?php
if ($_SESSION['auth']['admin'] === true) {
    echo <<<HTML
<a href="{$router->url('admin_post_edit', ['id' => $post->getID()])}" class="btn btn-info" target="_blank">Modifier</a>
HTML;
}
?>
<br>
<footer class="card container bg-dark">
<?php
if (count($comments) > 1) {
        $s = "s";
} else {
    $s = "";
}
echo "<h2>";
echo e(count($comments));
echo " Commentaire$s</h2>";

foreach ($comments as $comment) :
     require ELEM . 'comment.php';
endforeach;
?>
</footer>
