<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>
            <?=
                  isset($title) ? $title." -".WEBSITE_NAME : WEBSITE_NAME." Efficace"; 
            ?>
    </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/jquery.selectBoxIt.css">
    <link rel="stylesheet" href="assets/css/main.css">   
</head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php if($_SESSION['pseudo']=='admin'):?>
                <?=
                  Fonction::menu("dashboard.php","Dashboard"); 
                ?> 
            <?php endif;?> 
        </ul>
        <ul class="navbar_nav navbar-right">
          <?php if(Fonction::if_session()): ?> 
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=Fonction::grav_url('oumssekabore2@gmail.com') ?>" alt="avattar" class="avatar-xs"></a>
            <ul class="dropdown-menu" role="menu">
                <?=
                    Fonction::menu("list_construction.php","Liste Const"); 
                ?>
                <?=
                    Fonction::menu("description.php","Description"); 
                ?> 
                <?=
                    Fonction::menu("logout.php","Deconnetion"); 
                ?> 
              </ul>
            </li>
          <?php else: ?>  
          <li>
            <?=
                Fonction::menu("login.php","Connexion"); 
            ?>
            <?=
                Fonction::menu("register.php","Inscrition"); 
            ?>
          </li>
          <?php endif; ?>
        </ul>
    </div>
    </nav>
    <?php include"partials/_flash.php" ?>