<?php

use Controller\Auth;
use Server\Connection;

Auth::check();

$pdo = Connection::getPDO();

$req = $app->pdo->prepare('SELECT * FROM comments WHERE id = ?');
$req->execute([$id]);
$comment = $req->fetch();

$app->pdo->prepare('DELETE FROM comments WHERE id = ?')->execute([$id]);
$app->pdo->prepare('UPDATE comments SET parent_id = ? WHERE parent_id = ?')->execute([$comment->parent_id, $comment->id]);

$app->setSuccess('Le commentaire a bien été supprimé');
$app->response->redirect($app->url('home'));
