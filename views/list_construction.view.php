<?php include"partials/_header.php" ?>
<div class="content" >
    <section class="content-header"><br>
        <h1 class="pull-left">Listes de tous les projets de Construction</h1>
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-responsive" id="societes-table">
                    <thead>
                        <th>Périmetre rdc</th>
                        <th>Périmetre Etage</th>
                        <th>Superficie Rdc</th>
                        <th>Superficie Etage</th>
                        <th>Nombre d'Etage</th>
                        <th>Lieu Construction </th>
                        <th>Budget Fen & Port</th>
                        <th>Nbre fenetr</th>
                        <th>Isolation</th>
                        <th>Par Vapeur</th>
                        <?php if($_SESSION['pseudo']=='admin'):?>
                               <th colspan="3">Action</th>
                        <?php endif;?>
                    </thead>
                    <tbody>

                      <?php foreach($users as $user){?> 
                        <tr>

                            <td><?php echo $user->peri_rdc; ?></td>
                            <td><?php echo $user->peri_etage; ?></td>
                            <td><?php echo $user->super_rdc; ?></td>
                            <td><?php echo $user->super_etage; ?></td>
                            <td><?php echo $user->nombre_o_etage; ?></td>
                            <td><?php echo $user->lieu_construction	; ?></td>
                            <td><?php echo $user->budget_fenet_porte; ?></td>
                            <td><?php echo $user->nbre_fenetr_ext; ?></td>
                            <td><?php echo $user->isolation_exterieur; ?></td>
                            <td><?php echo $user->par_vapeur; ?></td>
                                    <!-- <td></td> -->
                                    <!-- <td></td> -->
                            <td>
                                <form method="POST" action=" accept-charset="UTF-8">
  
                                    <div class='btn-group'>
                                       <?php if($_SESSION['pseudo']=='admin'):?>
                                           <a href="" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>  
                                           <a href="" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                           <a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                       <?php endif;?>
                                    </div>
                                </form>
                            </td>
                        </tr>    
                      <?php } ?>  
                    </tbody>
                </table>  
                     <div class="pagination"><?php echo $pagination; ?></div>
            </div>
        </div>
    </div>
</div>
<?php include"partials/_footer.php" ?>