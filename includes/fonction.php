<?php

 class Fonction{


    public static function get_session($key)
    {
        if($key){
            return !empty($_SESSION[$key])
                ? ($_SESSION[$key])
                :null;
        }
    }

    public static function if_session()
    {
        if(isset($_SESSION['pseudo']) || isset($_SESSION['user_id'])){
            return true;
        }
    }
    
    public static function verification_de_l_unicite_des_donnees($field,$table,$value)
    {
        $req=Database::connect()->prepare("SELECT id FROM $table
                                                       WHERE $field=?");
        $req->execute([$value]);
        
        $count=$req->rowCount();

        $req->closeCursor();

        return $count;
    }
 
    public static function grav_url($email1)
    {
       $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email1 ) ) ) . "?d=" . urlencode( $default='https://www.somewhere.com/homestar.jpg' ) . "&s=" . 20;

       return $grav_url;
    }

    public static function not_empty($fields=[]):bool
    {

       if(count($fields)!=0){
            foreach($fields as $field){
                if(empty($field) || trim($field)==""){

                    return false;
                }
            }

            return true;
       }

    }

    public static function redirect($page)
    {
       if(!empty($page)){
           header('Location:'.$page);
           exit();
       }
    }

    
    public static function set_flash($message,$type='info')
    {
         $_SESSION['notification']['message']=$message;
         $_SESSION['notification']['type']=$type;   
    }



    public static function menu($lien,$menu,$class='null')
    {
 
 
                $pos=strrpos($_SERVER["SCRIPT_NAME"], "/");
 
                $chaine=trim(substr($_SERVER["SCRIPT_NAME"], $pos),'/');
                
                if($chaine==$lien){
 
                    $class="active";
                }
 
                return <<<HTML
                      <li class="nav-item $class">
                             <a class="nav-link" href="$lien">$menu</a>
                   </li>
HTML;
 
     }





}


