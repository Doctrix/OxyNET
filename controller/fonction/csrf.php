<?php
function csrf(){
    return 'csrf=' . $_SESSION['csrf'];
}

function csrfInput(){
    return '<input type="hidden" value="' . $_SESSION['csrf'] . '" name="csrf">';
}

function checkCsrf(){
    if(
        (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) ||
        (isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf'])

    ){
        return true;
    }
        header('Location:' . POST.DS . 'csrf.php');
        die(); 
}