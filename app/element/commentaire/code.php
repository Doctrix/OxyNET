<?php
/* require_once 'lib/fonctions/comments_controller.php'; */
extract($_POST);
$comm = $db->query("SELECT * FROM comments");
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['url']) && isset($_POST['comment'])){
$db->query("INSERT INTO comments (id, username, url, email, comment, post_id) VALUES ('$username','$url','$email','$comment','$post_id')");
setFlash('Le commentaire bien été envoyé');
header("Location: post.php?id=$post_id");
}
/* var_dump($_POST); */
?>