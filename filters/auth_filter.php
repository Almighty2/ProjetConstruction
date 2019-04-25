<?php
   
   if(!isset($_SESSION['user_id']) && !isset($_SESSION['pseuo'])){
        header('Location:index.php');
        exit();
   }
   ?>