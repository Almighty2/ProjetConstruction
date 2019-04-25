<?php
 require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'functions'.DIRECTORY_SEPARATOR.'compteur.php';
  ajouter_vue();

?>
 Il ya <?= nombre_vue()?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/js/parsley.min.js"></script>
<script src="assets/js/i18n/fr.js"></script>
<script src="assets/js/jquery.selectBoxIt.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    <script>
           $('#form').parsley();
    </script>
</script>
</body>
</html>
