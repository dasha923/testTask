<?php 
session_start();

unset($_SESSION['user']);
if(!$_SESSION['user']){
    header('Location: ../authorization.php');
    exit;
}

?>