<?php $title="Login" ;
session_start();
 require_once"includes/constants.php" ;
 require_once"includes/fonction.php" ;
 require_once"config/database.php" ;

if(!empty($_GET['p']) && !empty($_GET['token'])){

        $pseudo=$_GET['p'];
        $token=$_GET['token'];
        //Le pseudonyme et le token sont ils valides ?
        $q=Database::connect()->prepare("SELECT email,id,password from users where pseudo=?");
        // $parametr=array($pseudo);
        $q->execute([$pseudo]);
        $data=$q->fetch(PDO::FETCH_OBJ);
        $token_verf=sha1($pseudo.$data->email.$data->password);
       //die($data->email);
    if($token==$token_verf) {
        $q=Database::connect()->prepare("update users set active='1' where pseudo=?");
        $q->execute([$pseudo]);


       Fonction::set_flash("Votre compte a été bel et bien activé!");
       Fonction::redirect("login.php");
    } else{
        Fonction::set_flash("Jeton de securité invalide",'danger');
        Fonction::redirect("index.php");
    }


}else{

    redirect("index.php");

}