<?php

function e(string $string) {
    return htmlentities($string);
}

function br_e(string $string) {
    return nl2br(e($string));
}
?>