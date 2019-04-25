<?php
  function ajouter_vue()
  {
      $ficher=dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'compteur';
      $ficher_journalier=$ficher. '-' .date('Y-m-d');  
      incrementer_compteur($ficher);
      incrementer_compteur($ficher_journalier);
  }

  function incrementer_compteur(String $ficher)
  {
         $compteur=1;
        if(file_exists($ficher)){
            $compteur=(int)file_get_contents($ficher); 
            $compteur++;

    }
        file_put_contents($ficher,$compteur);
  }
  function nombre_vue_mois(int $annee,int $mois)
  {
     $mois=str_pad($mois,2,'0',STR_PAD_LEFT);
     $ficher=dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'compteur-'.$annee.'-'.$mois.'-'.'*';
     $fichers=glob($ficher);
     $total=0;

     foreach($fichers as $ficher){
        $total+=(int)file_get_contents($ficher);
     }
     return $total;
  }

  function nombre_vue()
  {
      $ficher=dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'compteur';
      
      return file_get_contents($ficher);
  }

  function nombre_vue_detail_mois(int $annee,int $mois):array
  {
     $mois=str_pad($mois,2,'0',STR_PAD_LEFT);
     $ficher=dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'compteur-'.$annee.'-'.$mois.'-'.'*';
     $fichers=glob($ficher);
     $visites=[];

     foreach($fichers as $ficher){
        $parties=explode('-',basename($ficher));
        $visites[]=[
                'annee'=>$parties[1],
                'mois'=>$parties[2],
                'jour'=>$parties[3],
                'visites'=>file_get_contents($ficher)
        ];
     }
     return $visites;
  }