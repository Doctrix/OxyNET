<h2><?= e(count($comments)) ?> Commentaires</h2>
<div class="card card-body bg-dark">
    <div class="card card-title bg-light">
        <p><?= e($comment->content); ?></p>
    </div>
</div>
<div style="margin-left: 25px;">
<?php if(isset($comment->children)): ?>
    <?php foreach($comment->children as $comment): ?>
        <?php require('comment.php'); ?>
    <?php endforeach; ?>
<?php endif; ?>
</div>