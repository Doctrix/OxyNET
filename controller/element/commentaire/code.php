<?php
/* require_once 'lib/fonctions/comments_controller.php'; */
extract($_POST);
$comm = $db->query("SELECT * FROM commentaires");
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['lien']) && isset($_POST['commentaire'])){
$db->query("INSERT INTO commentaires (id, username, lien, email, commentaire, post_id) VALUES ('$username','$lien','$email','$commentaire','$post_id')");
setFlash('Le commentaire bien été envoyé');
header("Location: post.php?id=$post_id");
}
/* var_dump($_POST); */
?>