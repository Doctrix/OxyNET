<?php
use Controller\{Auth, Picture};

$title = "Média";
$titre_navBar = $titre_header = $title;

if(Auth::$session['auth']) {
    Auth::check();
    exit();
}

if(!empty($_FILES)) {
    $img = $_FILES['img'];
    $ext = strtolower(substr($img['name'], -3));
    $allow_ext = array('jpg','png','gif');
    if(in_array($ext,$allow_ext)) {
        move_uploaded_file($img['tmp_name'], IMAGES  .DS . $img['name']);
        Picture::creerMin(IMAGES.DS.$img['name'], IMAGES . DS . 'thumbnail', $img['name'], 215, 112);
        Picture::ConvertirJPG(IMAGES.DS.$img['name'], IMAGES . DS . 'thumbnail', $img['name'], 215, 112);
    }
    else {
        setErreur("Votre fichier n'est pas une image");
    }
}
echo getFlash();
?>

<form action="#" method="post" enctype="multipart/form-data">
<input type="file" name="img" id="image">
<input type="submit" value="Envoyer le fichier">
</form>

<?php
$imageThumb = IMAGES.DS.'thumbnail';
$dir = opendir($imageThumb);
$images = readdir($dir);
while ($file = readdir($dir)) {
$allow_ext = array('jpg','png','gif');
$ext = strtolower(substr($file, -3));
if(in_array($ext, $allow_ext)) {
?>
<div class="card card-body card-title">
    <a href="<?= 'inc/img' . DS . $file; ?>" rel="zoombox[galerie]"><img src="<?= 'inc/img/thumbnail'. DS. $file; ?>" width="100%" height="auto"/></a>
    <h3 style="display:inline"><?= $file; ?></h3>
    <a href="" class="btn btn-primary">Modifier</a>
    <form action="" method="POST" onsubmit="return confirm('Voulez vous vraiment effectuer cette action ?')" style="display:inline">
    <button type="submit"  class="btn btn-danger">Supprimer</button>
    </form>
</div>
<br/>
<?php
    }
}
