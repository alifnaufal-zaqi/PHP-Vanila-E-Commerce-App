<?php 
 function checkRole(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    if($_SESSION['user']['role'] !== 'ADMIN'){
        header('Location: /403');
        exit;
    }
 }


?>