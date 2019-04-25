<?php $title="Changement de mot de passe"; ?>
<?php include("partials/_header.php"); ?>
<div class="main-container">
    <div class="container">
        <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong class="panel-title">Changer Mon mot de password</strong>
                        </div>
                        <div class="panel-body">
                            <?php include("partials/_error.php"); ?>
                            <form data-parsley-validate method="post" autocomplete="off">
                                        <div class="form-group">
                                            <label for="current_password">Mot de passe actuel<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="current_password"  required="required" data-parsley-minlength="6" class="form-group"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password">Nouveau mot de passe<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="new_password" id="new_password"  required="required" data-parsley-minlength="6" class="form-group"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password_confirmation">Confirmer votre mot de passe<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation"  required="required" data-parsley-equalto="#new_password" class="form-group"/>
                                        </div>
                                    <input type="submit" class="btn btn-primary" value="Valider" name="change_password"/>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php
    include("partials/_footer.php"); ?>

