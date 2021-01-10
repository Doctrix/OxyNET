<?php
if (isset($_POST['content']) && !empty($_POST['content'])) {
    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;

    if ($parent_id != 0){
        $req = $router->pdo->prepare('SELECT id FROM comments WHERE id = ?');
        $req->execute([$parent_id]);
        $comment = $req->fetch();
        if ($comment == false) {
            throw new Exception('Ce parent n\'existe pas');
        }
    }

    $req = $router->pdo->prepare('INSERT INTO comments SET content = ?, parent_id = ?');
    $req->execute([$_POST['content'], $parent_id]);
    $router->setSuccess('Merci pour votre commentaire :)');
} else {
    $router->setErreur('Vous n\'avez rien posté :(');
}
$router->url('post', ['id'=>$post->getID()]);

//$router->redirect('home');
