<?php include"partials/_header.php"?>

  <div class="container">
      <div class="box box-primary">
           <div class="box-body">
                    <?php include"partials/_error.php" ?>
                    
                         <form data-parsley-validate action="#"method="POST">
                             <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Périmetre exterieur RDC:</label>
                                    <input type="text" name="peri_rdc" class="form-control" placeholder="en m²" value="<?= $_SESSION['user_id'] ?>" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Périmetre exterieur Etage:</label>
                                    <input type="text" name="peri_etage" class="form-control" placeholder="en m²" required="required">
                                </div>
                             </div>  
                             <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Superficie exterieur RDC:</label>
                                    <input type="text" name="super_rdc" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Superficie exterieur Etage:</label>
                                    <input type="text" name="super_etage" class="form-control" placeholder="en m²" required="required">
                                </div>
                             </div>
                             <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nombre d'ouverture RDC:</label>
                                    <input type="text" name="nombre_o_rdc" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nombre d'ouverture Etage:</label>
                                    <input type="text" name="nombre_o_etage" class="form-control" placeholder="en m²" required="required">
                                </div>
                             </div>  
                             <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nombre de coin sur mur RDC:</label>
                                    <input type="text" name="nombre_c_rdc" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nombre de coin sur mur Etage:</label>
                                    <input type="text" name="nombre_c_etage" class="form-control" placeholder="en m²" required="required">
                                </div>
                             </div>
                             <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Hauteur mur RDC:</label>
                                    <input type="text" name="hauteur_rdc" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Hauteur mur Etage:</label>
                                    <input type="text" name="hauteur_etage" class="form-control" placeholder="en m²" required="required">
                                </div>
                             </div>
                             <div class="row">
                               <div class="form-group col-md-3">
                                    <label for="">Largeur de la Facade:</label>
                                    <input type="text" name="largeur_facade" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Hauteur de la Facade:</label>
                                    <input type="text" name="hauteur_facade" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Largeur de l'Arrière:</label>
                                    <input type="text" name="largeur_arriere" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Hauteur de l'Arrière:</label>
                                    <input type="text" name="hauteur_arriere" class="form-control" placeholder="en m²" required="required">
                                </div>
                             </div>
                             <div class="row">
                               <div class="form-group col-md-3">
                                    <label for="">Largeur du Coté:</label>
                                    <input type="text" name="largeur_cote" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Hauteur du Coté:</label>
                                    <input type="text" name="hauteur_cote" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Budget Electricité:</label>
                                    <input type="text" name="budget_elect" class="form-control" placeholder="en m²" required="required">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Budget Plomberie:</label>
                                    <input type="text" name="budget_plomb" class="form-control" placeholder="en m²" required="required">
                                </div>
                             </div>
                             <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Budget Armoire:</label>
                                    <input type="text" name="budget_armoire" class="form-control" placeholder="en m²" required="required">
                                </div>
                             </div>   
                             <div class="form-group">
                                 <input type="submit" name="envoyer" value="Envoyer" class="btn btn-primary">
                             </div>
                         </form>           
           </div>

      </div>
  </div>

<?php include"partials/_footer.php"?>