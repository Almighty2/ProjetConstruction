<?php $title="Login" ;
 require_once"includes/constants.php" ;
 require_once"includes/fonction.php" ;
 require_once"config/database.php" ;

   session_start();
   if(isset($_POST['envoyer'])){

    if(Fonction::not_empty(['lieu_construction','budget_fenet_porte','nbre_fenetr_ext','nbre_fenetr_int','par_vapeur','isolation_exterieur'])){

        $errors=[];
        extract($_POST);
        //fonction permettant de retourner le nombre de caractère
        if(is_numeric($lieu_construction)){
            $errors[]="Le lieu de construction doit etre une chaine et non un nombre";

        }
        //fonction permettant de verifier si c'est une @mail valide
        if(!is_numeric($budget_fenet_porte)){
            $errors[]="Le budget de la fenetre et la porte doit etre un chiffre";
        }
        if(!is_numeric($nbre_fenetr_ext)){
          $errors[]="Le nombre de fenetre exterieur doit etre un nombre";
        }
        if(!is_numeric($nbre_fenetr_int)){
          $errors[]="Le nombre de fenetre interieur doit etre un nombre";
        }

        if(count($errors)==0){
         //var_dump($_POST);
         //die(); 
          $req=Database::connect()->prepare("UPDATE description SET lieu_construction=:lieu_construction,budget_fenet_porte=:budget_fenet_porte,nbre_fenetr_ext=:nbre_fenetr_ext,nbre_fenetr_int=:nbre_fenetr_int,par_vapeur=:par_vapeur,isolation_exterieur=:isolation_exterieur
                                                                      WHERE id=:id");
                    $req->execute([
                      "lieu_construction"=>$lieu_construction,
                      "budget_fenet_porte"=>$budget_fenet_porte,
                      "nbre_fenetr_ext"=>$nbre_fenetr_ext,
                      "nbre_fenetr_int"=>$nbre_fenetr_int,
                      "par_vapeur"=>$par_vapeur,
                      "isolation_exterieur"=>$isolation_exterieur,
                      "id"=>Fonction::get_session('user_id')
                     ]);

         Fonction::set_flash( "Maintenant tous vos données sont enregistrer",'success');


           //Fonction::redirect("index.php");
        }

    }
}
   require"views/suite_description.view.php"?>