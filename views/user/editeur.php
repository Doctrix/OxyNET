<?php
use App\Auth;

Auth::Verifier();
$titre_navBar = 'Choisissez la page à éditer';

if(isset($_POST["contenu"])){
    $fichier = BASE_URL.DS."profil/".$_POST["file"];
    $file = fopen($fichier,"w");
    fwrite($file,stripslashes($_POST["contenu"]));
    fclose($file);
}
?>
<space></space>
<div id="contenu">
<br><h3><b>Selectionner une page</b></h3>
<?php 
$dir_profil = opendir(BASE_URL.DS."profil/");
while($file = readdir($dir_profil)){
    if(!in_array($file,array(".",".."))){
    echo '<div style="float:left; margin:0 5px 10px;text-align:center;"><a href="?f='.$file.'"><h3>🗂️<br/><b>'."$file".'</b></h3></a></div>';
    }
}

echo '<br clear="all"/>';
echo '<hr/>';
if(isset($_GET["f"])){
    echo "<br/><h3>📃<strong>".$_GET["f"]."</strong></h3>";
    $fichier = BASE_URL.DS.'profil/'.$_GET["f"];
    $contenu = file_get_contents($fichier);
}
?>   
    <form method="POST" action="<?= $_POST["file"];?>">
        <textarea id="full-featured" name="contenu" class="formfull" placeholder="Votre texte" rows="15"><?= $contenu; ?></textarea>
        <input type="hidden" name="file" value="<?= $_GET["f"]; ?>">
        
        <input type="submit" value="Sauvegarder"/>
    </form>
</div>
<?php ob_start();?>
<script src="<?= INC.DS; ?>js/tinymce/tinymce.min.js"></script>
<script>
tinyMCE.init({
        // General options
        selector: 'textarea#full-featured',
        mode : "textareas",
        plugins : "safari,autolink,autosave,code,visualblocks,image,link,codesample,charmap,hr,anchor,toc,insertdatetime,lists,wordcount,imagetools,textpattern,help,quickbars,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,importcss",    
        imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  content_css: '//www.tiny.cloud/css/codepen.min.css',
  link_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  height: 400,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: 'sliding',
  contextmenu: "link image imagetools table",
 }); 
</script>
<?php $script = ob_get_clean(); ?>
