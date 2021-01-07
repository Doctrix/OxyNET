<?php
$comments = $pdo->query('SELECT * FROM comments')->fetchAll();
$comments_by_id = [];
foreach($comments as $comment){
    $comments_by_id[$comment->id] = $comment;
}
foreach($comments as $c => $comment){
    if($comment->parent_id != 0){
        $comments_by_id[$comment->parent_id]->children[] = $comment;
        unset($comments[$c]);
    }
}
