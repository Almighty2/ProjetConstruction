<?php $title="Reinitialisation";
    session_start();

require_once"includes/constants.php" ;
require_once"includes/fonction.php" ;
require_once"config/database.php" ;

if(isset($_POST['reinitialiser'])){

    if(Fonction::not_empty(['email'])){

        $errors=[];
        extract($_POST);

        //fonction permettant de verifier si c'est une @mail valide
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[]="L'adresse email est Invalide";
        }

        if(!Fonction::verification_de_l_unicite_des_donnees('email','users',$email)){

            $errors[]="Adresse E-mail Introuvable!";
        }

        if(count($errors)==0){
            $to=$email;
            $subject=WEBSITE_NAME." - REINITIA DE COMPTE";
            //$password=password_hash($password,PASSWORD_DEFAULT);
            $token= sha1($email) ;

            ob_start();
            require("templates/emails/activation.tmpl1.php");

            $content=ob_get_clean();
            $headers='MIME-Version:1.0' ."\r\n";
            $headers .='Content-type: text/html; charset=iso-8859-1'."\r\n";
             //echo "to   ".$to."<br/>";
             //echo "subject  ".$subject."<br/>";
             //echo "token  ".$token."<br/>";
             //echo "content  ".$content."<br/>";
             //echo "header  ".$headers."<br/>";

            mail($to, $subject, $content, $headers);


           Fonction::set_flash( "Consulter votre mail afin de reinitialiser votre compte!",'success');
           //Fonction::redirect("index.php");
        }

    }
}
require"views/login.view.php"?>