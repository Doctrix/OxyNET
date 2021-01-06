<?php
function resizedName($file, $width, $height){
    $info = pathinfo($file);
    $return = '';
    if($info['dirname'] != '.'){
        $return .= $info['dirname'] . '/';
    }
    $return .= $info['filename'] . "_$width". "x$height." . $info['extension'];
    return $return;
}
?>