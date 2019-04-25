<?php $title="Inscription";
    session_start();

require_once"includes/constants.php" ;
require_once"includes/fonction.php" ;
require_once"config/database.php" ;

if(isset($_POST['envoyer'])){

    if(Fonction::not_empty(['name','pseudo','email','password','password_confirm'])){

        $errors=[];
        extract($_POST);
        //fonction permettant de retourner le nombre de caractère
        if(mb_strlen($pseudo) <3){
            $errors[]="Pseudo trop court !(Minimun 3 caractères)";

        }
        //fonction permettant de verifier si c'est une @mail valide
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[]="L'adresse email est Invalide";
        }
        if(mb_strlen($password) <6){
            $errors[]="Mot de pass trop court !(Minimun 6 caractères)";

        }else{
            if($password != $password_confirm){

                $errors[]="Le mot de pass et le mot de pass de confirmation sont différents!";
            }

        }
        //fonction permettant de verifier si @mail est déja utiliser
        if(Fonction::verification_de_l_unicite_des_donnees('pseudo','users',$pseudo)){

            $errors[]="Pseudo déja utilisé!";
        }

        if(Fonction::verification_de_l_unicite_des_donnees ('email','users',$email)){

            $errors[]="Adresse E-mail déja utilisé!";
        }

        if(count($errors)==0){
            $to=$email;
            $subject=WEBSITE_NAME." - ACTIVATION DE COMPTE";
            $password=password_hash($password,PASSWORD_DEFAULT);
            $token= sha1($pseudo.$email.$password) ;

            ob_start();
            require("templates/emails/activation.tmpl.php");

            $content=ob_get_clean();
            $headers='MIME-Version:1.0' ."\r\n";
            $headers .='Content-type: text/html; charset=iso-8859-1'."\r\n";
             //echo "to   ".$to."<br/>";
             //echo "subject  ".$subject."<br/>";
             //echo "token  ".$token."<br/>";
             //echo "content  ".$content."<br/>";
             //echo "header  ".$headers."<br/>";

            mail($to, $subject, $content, $headers);

           Fonction::set_flash( "Mail d'activation envoyer!",'success');
           $q=Database::connect()->prepare("INSERT INTO users(name,pseudo,email,password) VALUES(:name,:pseudo,:email,:password)");
           $q->execute([
               'name'      =>$name,
               'pseudo'    =>$pseudo,
               'email'     =>$email,
               'password'  =>$password
           ]);
           //Fonction::redirect("index.php");
        }

    }
}
require"views/register.view.php"?>