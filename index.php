<?php $title="Accueil"; session_start();?>
<?php require_once"includes/constants.php"?>
<?php require_once"includes/fonction.php"?>
<?php require_once"partials/_header.php"?>
    <main role="main" class="container">

        <div class="jumbotron">
            <h1><?= WEBSITE_NAME ?></h1>
            <p class="lead"><h3><?= WEBSITE_NAME ?></h3> est une plate form qui permet au Etudiant programmeur de mieux se partager les codes </p>
        </div>

    </main><!-- /.container -->
<?php require_once"partials/_footer.php" ?>
