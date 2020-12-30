<?php
use App\Auth;
use App\Images;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

if(!empty($_FILES)) {
    $img = $_FILES['img'];
    $ext = strtolower(substr($img['name'], -3));
    $allow_ext = array('jpg','png','gif');
    if(in_array($ext,$allow_ext)) {
        move_uploaded_file($img['tmp_name'],IMAGES.DS.$img['name']);
        Images::creerMin(IMAGES.DS.$img['name'],IMAGES.DS.'thumbnail',$img['name'],215,112);
        Images::ConvertirJPG(IMAGES.DS.$img['name'],IMAGES.DS.'thumbnail',$img['name'],215,112);
    }
    else {
        setErreur("Votre fichier n'est pas une image");
    }
}
echo getFlash();
?>

<form action="#" method="post" enctype="multipart/form-data">
<input type="file" name="img" id="image">
<input type="submit" value="Envoyer">
</form>

<?php

$image = IMAGES.DS;
$imageThumb = IMAGES.DS.'thumbnail';
$imagePost = IMAGES.DS.'posts';

$dir = opendir($imageThumb);
$dir2 = opendir($imagePost);
$dir3 = opendir($image);
$images = readdir($dir3);

while ($file = readdir($dir)) {
$allow_ext = array('jpg','png','gif');
$ext = strtolower(substr($file, -3));
if(in_array($ext, $allow_ext)) {

while ($files = readdir($dir2)) {
$allow_ext2 = array('jpg','png','gif');
$ext2 = strtolower(substr($files, -3));
if(in_array($ext2, $allow_ext2)) {

?>

<br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Image</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>
        #<?= $images ?>
        </td>
        <td>
        <a href="<?= IMAGES.DS.$file ?>" rel="zoombox[galerie]" ><?= $file ?></a>
        </td>
        <td>
        <a href="<?= IMAGES.DS.$file ?>" rel="zoombox[galerie]">
            <img src="<?= IMAGES.DS.'thumbnail'.DS.$file ?>"/>
        </a>
        </td>
        <td>
        <a href="" class="btn btn-primary">
            Modifier
            </a>
            <form action=""
            method="POST" onsubmit="return confirm('Voulez vous vraiment effectuer cette action ?')" style="display:inline">
            <button type="submit"  class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
</tbody>
</table>

<br clear="all">
<?php
}
}
}
}
