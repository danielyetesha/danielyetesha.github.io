<?php
session_start();
        if (isset( $_SESSION['username']) && $_SESSION['is_log']){
           include 'after_login.php';
        }else{
           include 'before_login.php';
        }  
       
?>