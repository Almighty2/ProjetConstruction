<?php include"partials/_header.php"?>
<div class="container">
    <div class="box box-primary">
        <div class="box box-body">
                <form action="" method="POST" class="well col-md-6" id="connexion">
                      <h1 class="lead">Page de connexion</h1>
                      <?php
                        include("partials/_error.php");
                       ?>
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Password de Confirmation</label>
                        <input type="password" name="password_confirm" class="form-control">
                    </div>
                        <input type="submit" value="Envoyer" name="envoyer" class="btn btn-success">
      
                </form>
        </div>
    </div>
</div>
<?php include"partials/_footer.php"?>