<?php $title="Liste Des Demande" ;
 require_once"includes/constants.php" ;
 require_once"includes/fonction.php" ;
 require_once"config/database.php" ;

   session_start();
        $q=Database::connect()->query("select id from description");

        $nbre_total_classe=$q->rowCount();
         $users=$q->fetchAll(PDO::FETCH_OBJ);
        //echo die($users->nom_el);
        $pagination='';
if ($nbre_total_classe>=1) {
    $nbre_classe_par_page = 5;
    $nbre_pages_max_gauche_et_droite = 4;
    $last_page = ceil($nbre_total_classe / $nbre_classe_par_page);

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page_num = $_GET['page'];
    } else {
        $page_num = 1;
    }

    if ($page_num < 1) {
        $page_num = 1;
    } elseif ($page_num > $last_page) {
        $page_num = $last_page;
    }

    $limit = 'LIMIT ' . ($page_num - 1) * $nbre_classe_par_page . ',' . $nbre_classe_par_page;

        $q=Database::connect()->query("SELECT * from description ORDER BY id $limit");
        
        $nbre_total_eleve=$q->rowCount();
         $users=$q->fetchAll(PDO::FETCH_OBJ);

    $pagination = '<nav class="text-center centrer"><ul class="pagination">';

	    if ($last_page != 1) {
	        if ($page_num > 1) {
	            $previous = $page_num - 1;
	            $pagination .= '<li><a href="list_construction.php?page=' . $previous . '"aria-label="Precedent"><span aria-hidden="true">&laquo;</span></a></li>';
	            for ($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++) {
	                if ($i > 0) {
	                    $pagination .= '<li><a href="list_construction.php?page=' . $i . '">' . $i . '</a></li>';
	                }

	            }

	        }
	        $pagination .= '<li class="active"><a href="#">' . $page_num . '</a></li>';

	        for ($i = $page_num + 1; $i <= $last_page; $i++) {

	            $pagination .= '<li><a href="list_construction.php?page=' . $i . '">' . $i . '</a></li>';
	            if ($i >= $page_num + $nbre_pages_max_gauche_et_droite) {
	                break;
	            }

	        }

	        if ($page_num != $last_page) {
	            $next = $page_num + 1;
	            $pagination .= '<li><a href="list_construction.php?page=' . $next . '"aria-label="Suivant"><span aria-hidden="true">&raquo;</span></li>';
	        }
	    }
    $pagination .= '</ul></nav>';
}
include"views/list_construction.view.php";