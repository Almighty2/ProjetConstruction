<?php $title="Login" ;
 require_once"includes/constants.php" ;
 require_once"functions/compteur.php" ;
 require_once"includes/fonction.php" ;
 require_once"config/database.php" ;

   session_start();
 
   $annee=(int)date('Y');
   $selection_annee=empty($_GET['annee']) ? null : (int)$_GET['annee'];
   $selection_mois=empty($_GET['mois']) ? null : (int)$_GET['mois'];

   $mois=[
      '01'=>'Janvier',
      '02'=>'Février',
      '03'=>'Mars',
      '04'=>'Avril',
      '05'=>'Mai',
      '06'=>'Juin',
      '07'=>'Juilet',
      '08'=>'Aout',
      '09'=>'Septembre',
      '10'=>'Octobre',
      '11'=>'Novembre',
      '12'=>'Decembre'
   ];

   if($selection_annee && $selection_mois){
       $total=nombre_vue_mois($selection_annee,$selection_mois);
       $details=nombre_vue_detail_mois($selection_annee,$selection_mois);
    }else{
        $total=nombre_vue();
    }

    $q=Database::connect()->prepare("SELECT id from users");
    $q->execute();
    $nbre_inscrip=$q->rowCount();
    $users=$q->fetchAll(PDO::FETCH_OBJ);

require"views/dashboard.view.php" ?>