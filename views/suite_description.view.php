<?php include"partials/_header.php";?>
   <div class="container">
        <div class="box box-primary">
            <div class="box-body">
            <?php include"partials/_error.php" ?>
                    
                    <form data-parsley-validate action="#"method="POST">
                        <div class="row">
                           <div class="form-group col-md-6">
                               <label for="">Lieu de la construction:</label>
                               <input type="text" name="lieu_construction" class="form-control" placeholder="lieu de la construction" required="required">
                           </div>
                           <div class="form-group col-md-6">
                               <label for="">Budget fenetre et porte</label>
                               <input type="text" name="budget_fenet_porte" class="form-control" placeholder="en fcfa" required="required">
                           </div>
                        </div>  
                        <div class="row">
                           <div class="form-group col-md-6">
                               <label for="">Nombre de fenetre Interieur:</label>
                               <input type="text" name="nbre_fenetr_ext" class="form-control" placeholder="Nombre de fenetre Interieur" required="required">
                           </div>
                           <div class="form-group col-md-6">
                               <label for="">Nombre de fenetre Exterieur:</label>
                               <input type="text" name="nbre_fenetr_int" class="form-control" placeholder="Nombre de fenetre Exterieur" required="required">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label for="" class="control-label">Par vapeur</label>
                              <select name="par_vapeur" id="">
                                 <option value="0">...</option>
                                 <option value="energieMax">EnergiMax</option>
                                 <option value="polyethyienefort">Polyéthyiène fort</option>
                              </select>
                           </div>
                            <div class="form-group col-md-6">
                            <label for="" class="control-label">Isolation Exterieur</label>
                              <select name="isolation_exterieur" id="">
                                 <option value="0">...</option>
                                 <option value="oui">Oui</option>
                                 <option value="non">Non</option>
                              </select>
                            </div>  
                        </div>
                        <div class="form-group">
                            <input type="submit" name="envoyer" value="Envoyer" class="btn btn-primary">
                        </div>
                    </form>  
            </div>
        </div>
   </div>
<?php include"partials/_footer.php";?>