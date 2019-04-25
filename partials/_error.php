<?php
    if(isset($errors) && !empty($errors)){
       echo "<div class='container'>";
              echo '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                       foreach($errors as $error){
                           echo $error."<br>";
                       }
              echo  "</div>";
       echo "</div>";
    }