<?php $title="Login" ;
 require_once"includes/constants.php" ;
 require_once"includes/fonction.php" ;
 require_once"config/database.php" ;

   session_start();

  if(isset($_POST['envoyer'])){

    if(Fonction::not_empty(['peri_rdc','peri_etage','super_rdc','super_etage','nombre_o_rdc','nombre_o_etage','nombre_c_rdc','nombre_c_etage','hauteur_rdc','hauteur_etage','largeur_facade','hauteur_facade','largeur_arriere','hauteur_arriere','largeur_cote','hauteur_cote','budget_elect','budget_plomb','budget_armoire'])){

      extract($_POST);
      
      $errors=[];

      if(!is_numeric($peri_rdc) || !is_numeric($peri_etage) || !is_numeric($super_rdc) || !is_numeric($super_etage)){
        $errors[]="Veuillez verifier les données que vous avez saisir(Ils doivent etre forcement un nombre)";

      }
      //fonction permettant de verifier si c'est une @mail valide
      if(!is_numeric($nombre_c_etage) || !is_numeric($nombre_c_rdc) || !is_numeric($nombre_o_etage) || !is_numeric($nombre_o_rdc)){
        $errors[]="Veuillez verifier les données que vous avez saisir(Ils doivent etre forcement un nombre)";

      }
      if(!is_numeric($hauteur_facade) || !is_numeric($largeur_facade) || !is_numeric($hauteur_etage) || !is_numeric($hauteur_rdc)){
        $errors[]="Veuillez verifier les données que vous avez saisir(Ils doivent etre forcement un nombre)";

      }
      if(!is_numeric($hauteur_cote) || !is_numeric($largeur_cote) || !is_numeric($hauteur_arriere) || !is_numeric($largeur_arriere)){
        $errors[]="Veuillez verifier les données que vous avez saisir(Ils doivent etre forcement un nombre)";

      }
      if(!is_numeric($budget_elect) || !is_numeric($budget_plomb) || !is_numeric($budget_armoire)){
        $errors[]="Veuillez verifier les données que vous avez saisir(Les budgets doivent etre forcement un nombre)";

      }
     if(count($errors)==0){

         $req=Database::connect()->prepare("INSERT INTO description(peri_rdc,peri_etage,super_rdc,super_etage,nombre_o_rdc,nombre_o_etage,nombre_c_rdc,nombre_c_etage,hauteur_rdc,hauteur_etage,largeur_facade,hauteur_facade,largeur_arriere,hauteur_arriere,hauteur_cote,largeur_cote,budget_elect,budget_plomb,budget_armoire)
                                                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
         $req->execute([
                        $peri_rdc,
                        $peri_etage,
                        $super_rdc,
                        $super_etage,
                        $nombre_o_rdc,
                        $nombre_o_etage,
                        $nombre_c_rdc,
                        $nombre_c_etage,
                        $hauteur_rdc,
                        $hauteur_etage,
                        $largeur_facade,
                        $hauteur_facade,
                        $largeur_arriere,
                        $hauteur_arriere,
                        $hauteur_cote,
                        $largeur_cote,
                        $budget_elect,
                        $budget_plomb,
                        $budget_armoire
                       ]);                                                   
     }

     Fonction::set_flash("Insertion reuissi veuillez completer ses données afin que le projet soit complet",'info');

     Fonction::redirect("suite_description.php");
  
    }

  }

  require"views/description.view.php"?>
