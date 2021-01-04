<?php
/* $comm = Model::load("commentaire"); 

if(!empty($_POST)){ 
    $akismet = new Akismet();
    $akismet->setCommentAuthor($_POST['username']);
    $akismet->setCommentAuthorEmail($_POST['email']);
    $akismet->setCommentAuthorURL($_POST['lien']);
    $akismet->setCommentContent($_POST['commentaire']);
    $akismet->setPermalink('https://serveur.oxygames.fr/');
    
    if($akismet->isCommentSpam()){
        $_POST['spam']=1;
    }else{
        $_POST['spam']=0;
    }
     $comm->save($_POST);
    $_GET['id'] = $comm->id; 
}  */