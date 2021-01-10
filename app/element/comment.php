<?php
use App\HTML\Form;

$errors = false;

// Si des données ont été postées
if (isset($_POST['action']) && $_POST['action'] == 'form-comment') {
    $save = $comments_cls->save('posts', $posts->id);
    if ($save) {
    } else {
        $errors = $comments_cls->errors;
    }
}
$comments_by_id[$comment->id] = $comment;
$form = new Form($posts, $errors);
?>

<?php if ($errors) : ?>
<div class="alert alert-danger">
        <strong>Impossible de poster votre commentaire</strong> pour les raison suivantes : 
        <ul>
            <?php foreach ($errors as $error) : ?>
            <li><?= $error; ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif;?>

<form action="#comment" role="form" id="form-comment" method="post">
    <h4>Poster un commentaire</h4>
    <div class="row">
        <div class="col-xs-6">
            <?= $form->input('username', 'Pseudo'); ?>
        </div>            
        <div class="col-xs-6">
            <?= $form->input('email', 'Email'); ?>
        </div>
        <div class="col-xs-12">
            <?= $form->textarea('content', 'Votre commentaire'); ?>
            <button type="submit" class="btn btn-primary">Commenter</button>
        </div>
        <?= $form->inputHidden('parent_id', '0'); ?>
    </div>
</form>

<div class="card card-body bg-dark" >
    <?php if (isset($comment->children)) : ?>
        <?php foreach ($comment->children as $comment) : ?>
        <div class="comment row" id="comment-<?= $comment->id; ?>">
            <div class="col-xs-2"  style="margin-left:18px;">
                <img src="http://www.gravatar.com/avatar/<?= md5($comment->email); ?>" alt="" class="" width="100%">
            </div>
            <div class="col-xs-10">
                <p>
                   <a href="mailto:<?= e($comment->email); ?>" target="_blank">&#128231;<?= e($comment->username);?></a>
                   <a href="<?= e($comment->url); ?>" target="_blank">&#127760;Son_site</a><br>
                   <em style="color:grey">Commentaire publié le <?= date('d-m-y', strtotime($comment->created));?> 
                   à <?= date('H:m:s', strtotime($comment->created));?></em>
                </p>
            </div>
            <div class="container card-body card" style="margin:16px;">
                <p><?= e($comment->content); ?></p>
            </div>
            <div class="container text-right">
                <button class="btn btn-info">Aime</button>
                <button class="btn btn-dark">Aime pas</button>
                <button class="btn btn-danger"><a href="<?= $router->url('comments.delete', ['id' => $comment->id]);
                ?>">Supprimer</a></button>
                <button class="btn btn-primary reply" data-id="<?= $comment->id; ?>">Répondre</button> 
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
