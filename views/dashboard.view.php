<?php include"partials/_header.php"?>
<div class="container">
    <div class="row">
        <div class="col-md-2">
                <div class="list-group">
                   <?php for($i=0;$i<5;$i++): ?>
                       <a href="dashboard.php?annee=<?= $annee - $i ?>" class="list-group-item <?= ($annee - $i)==$selection_annee ? 'active' : '' ?>" active><?= $annee - $i ?></a>
                       <?php if(($annee - $i)==$selection_annee): ?>
                           <div class="list-group">
                                <?php foreach($mois as $j=>$nom):?>
                                <a class="list-group-item <?= $j==$selection_mois ? 'active':''?>" href="dashboard.php?annee=<?= $selection_annee ?>&mois=<?= $j ?>">
                                   <?= $nom ?>
                                </a>
                                <?php endforeach;?>
                            </div>
                       <?php endif;?>
                    <?php endfor;?>
                </div>
        </div>
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                  <strong class="text-center" style="font-size:3em; margin-left:400px;">
                         <?= $total=nombre_vue() ?><br>
                         <h1>Visite<?= $total>1 ? 's' : ''?>Total</h1>
                  </strong>
                  <div class="row">
                       <div class="col-md-5 col-md-offset-1">
                            <div class="panel btn-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user-plus fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $total=nombre_vue() ?></div>
                                            <div>Nbre Total Des Garcon!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">Voir Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $nbre_inscrip ?></div>
                                            <div>Nbre Total Elèves!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="liste.eleve.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Voir Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                  </div> 
                </div>
            </div>
            <?php if(isset($details)):?>
                <h1 class="text-center">Details des isiteurs Journaliers</h1>
               <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>Année</th>
                           <th>Mois</th>
                           <th>Jour</th>
                           <th>Nombre de visite</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php foreach($details as $detail):?>
                            <tr>
                                <td><?= $detail['annee']?></td>
                                <td><?= $detail['mois']?></td>
                                <td><?= $detail['jour']?></td>
                                <td><?= $detail['visites']?> Visite<?= $detail['visites'] >1 ?'s' : '' ?></td>
                            </tr>
                       <?php endforeach;?>
                   </tbody>
               </table>
            <?php endif;?>
        </div>
    </div>
</div>
 <?php include"partials/_footer.php"?>