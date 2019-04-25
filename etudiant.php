<?php $title="Etudiant";
    session_start();

    require_once"includes/constants.php" ;
    require_once"includes/fonction.php" ;
    require_once"config/database.php" ;

   
   if(isset($_POST['envoyer'])){

        if(Fonction::not_empty(['name','pseudo','age','sex','lieu_habitation','email','tel','activite'])){
              
             extract($_POST);

             $errors=[];

             if(strlen($name)<2){
                $errors[]="Nom trop court veuillez saisie un nom valide";
             }
             if(strlen($pseudo)<3){
                $errors[]="Pseudo invalide minimun 3 caractères";
             }
             if(!is_numeric($age)){
                $errors[]="Votre age est invalide veuillez saisie un nombre";
             }
             if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors[]="Adresse email invalide";
             }
             if(strlen($tel)<8){
                $errors[]="Numéro de téléphone invalide";
             }
             if(Fonction::verification_de_l_unicite_des_donnees('email','users',$email)){
                $errors[]="Cet Etudiant existe déja dans la base de NaN";
             }
             if(strlen($activite)<2){
               $errors[]="Activité invalide";
            }
             if(count($errors)==0){

                $req=Database::connect()->prepare("INSERT INTO users(name,pseudo,age,sex,lieu_habitation,email,tel,activite)
                                                                 VALUES(:name,:pseudo,:age,:sex,:lieu_habitation,:email,:tel,:activite)");
                $req->execute([
                    'name'=>$name,
                    'pseudo'=>$pseudo,
                    'age'=>$age,
                    'sex'=>$sex,
                    'lieu_habitation'=>$lieu_habitation,
                    'email'=>$email,
                    'tel'=>$tel,
                    'activite'=>$activite
                ]); 
                
                Fonction::set_flash("Etudiant ajouter avec succèss","success");
             }
             
        }
   }



require"views/etudiant.view.php"?>