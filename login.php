 <?php $title="Login" ;
 require_once"includes/constants.php" ;
 require_once"includes/fonction.php" ;
 require_once"config/database.php" ;

   session_start();

  if(isset($_POST['envoyer'])){

    if(Fonction::not_empty(['pseudo','password'])){

      extract($_POST);
      
      $errors=[];

      if(!Fonction::verification_de_l_unicite_des_donnees('pseudo','users',$pseudo)){

        $errors[]="Pseudo déja utilisé!";
    }

    if(mb_strlen($password)<8){
      $errors[]="Password Erronné veuillez saisie un password >=8";
   }

      $req=Database::connect()->prepare("SELECT * FROM users
                          WHERE(pseudo=:identifiant OR email=:identifiant) AND active='1'");
        $req->execute([
                    "identifiant"=>$pseudo
                ]);

      $users=$req->fetch(PDO::FETCH_OBJ); 
  
      if($users && password_verify ($password ,$users->password)){
         
        $_SESSION['user_id']=$users->id;
        $_SESSION['pseudo']=$users->pseudo;

        Fonction::set_flash("Bienvenu sur la plate forme de Gestion de Construction Remplissez vos besions  ",'success');
        Fonction::redirect('description.php');
      }
       
  
    }

  }

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










require"views/login.view.php" ?>