<?php
    session_start();

    require_once"includes/constants.php" ;
    require_once"includes/fonction.php" ;
    require_once"config/database.php" ;
// require("config/database.php");  //ILS SONT TOUS INCLUS DANS "includes/init.php"
// require("includes/function.php");
// require("includes/constants.php");
// require("bootstrap/locale.php");

//echo $_POST['test_robot'];
//echo $_POST['code'];


if(isset($_POST['change_password'])) {
    $errors = [];

    //Si tous les champs ont été remplies
    if (Fonction::not_empty(['email', 'new_password', 'new_password_confirmation'])) {

        extract($_POST);
        if(mb_strlen($new_password) <6){
            $errors[]="Mot de pass trop court !(Minimun 6 caractères)";

        }else{
            if($new_password != $new_password_confirmation){

                $errors[]="Le mot de pass et le mot de pass de confirmation sont différents!";
            }

        }

        if(count($errors)==0){
            //$q=$db->prepare("SELECT password FROM users WHERE (id=:id) AND active='1' ");
             $q=Database::connect()->prepare("SELECT id FROM users WHERE (email=:email) AND active='1' ");        
        /* AND password= :password AND active='1' ;*/
              

                $q->execute([
                    'email'    =>$email
                ]);

                $user=$q->fetch(PDO::FETCH_OBJ);

                if($user){

                    $q =Database::connect()->prepare("UPDATE users SET password=:password WHERE email=:email");
                    /* AND password= :password AND active='1' ;*/

                    $q->execute([
                        'password' =>password_hash($new_password,PASSWORD_DEFAULT),
                        'email'       =>$email
                    ]);


                    Fonction::set_flash("Félicitation votre mot de passe a été mis à jour!", "danger");
                    //Fonction::redirect('profile.php?id=' . get_session('user_id'));
                }else{
                   // save_input_data();
                    $errors[]="Le mot de passe actuel est incorret ";
                }
        }
     }else{
        //save_input_data();
        $errors[]="Veuillez remplir tous les champs marqués d'un (*)";
    }
}else{
    //clear_input_data();
}

require("views/change_password.view.php");
