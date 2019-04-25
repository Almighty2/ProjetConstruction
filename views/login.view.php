<?php include"partials/_header.php"?>
    <div class="container mb-4">

        <form action="" method="POST" class="well col-md-6" id="connexion">
        <?php if(isset($errors) && count($errors)!=0){ ?>
                <div class="label label-danger" style="font-size:16px;" id="error">
                  Email ou mot de passe erronné; veuillez recommencer
                </div>
              <?php } ?>  
        <h1 class="lead">Page de connexion</h1>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="pseudo" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
                <input type="submit" value="Envoyer" name="envoyer" class="btn btn-success">
                <input type="button" value="mot de passe oublié" class="btn btn-primary pull-right" id="mdp">
            <div class="form-group">
                <label>
                     <input type="checkbox" name="garder" id="">
                     Garder ma session
                </label>
            </div>         
        </form>
        <div id="reinitialiser" style="display:none">
            <form action="" method="POST" class="well col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="reinitialiser" value="Reinitialiser" class="btn btn-success">
                    <input type="submit" name="soumettre" value="se connecter" class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $('#mdp').click(function(){
            $('#connexion').hide();
            $('#reinitialiser').fadeIn();
        });
        $('#cnx').click(function(){
            $('#reinitialiser').hide();
            $('#connexion').fadeIn();
        })

    });
</script>
</body>
</html>