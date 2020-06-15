<?php

use App\Images;

if(!empty($_FILES)) {

    $img = $_FILES['img'];
    $ext = strtolower(substr($img['name'], -3));
    $allow_ext = array('jpg', 'png', 'gif');
    if(in_array($ext, $allow_ext)) {
        move_uploaded_file($img['tmp_name'], IMAGES . DS . $img['name']);
        Images::creerMin(IMAGES . DS . $img['name'], IMAGES . DS . 'thumbnail', $img['name'],215,112);
        Images::ConvertirJPG(IMAGES . DS . $img['name'], IMAGES . DS . 'thumbnail', $img['name'],215,112);
    }
    else {
        setErreur("Votre fichier n'est pas une image");
    }
}
?>
<?= getFlash() ?>
<form action="#" method="post" enctype="multipart/form-data">
<input type="file" name="img" id="image">
<input type="submit" value="Envoyer">
</form>

<?php
$dos = IMAGES . DS . 'thumbnail';
$dir = opendir($dos);
while ($file = readdir($dir)) {
    $allow_ext = array('jpg', 'png', 'gif');
    $ext = strtolower(substr($file, -3));
    if(in_array($ext, $allow_ext)) {
    ?>
    <div class="min">
        <a href="<?= IMAGES . DS . $file ?>" rel="zoombox[galerie]">
            <img src="<?= IMAGES . DS . 'thumbnail' . DS . $file ?>"/>
            <h3><?= $file; ?></h3>
        </a>
    </div>
    <?php
    } 
}
