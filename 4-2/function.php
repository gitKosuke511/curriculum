<?php
    
function login_check(){

    session_start();
    
    if(empty($_SESSION['user_id'])){
        header('Location:login.php');
        exit;
    }
}
?>