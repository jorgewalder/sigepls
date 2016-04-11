<html lang="pt-br" ng-app="sustentavel">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Sistema UFMS Sustentável">
    <title>Login</title>

    <!-- Application styles-->
    <link type="text/css" rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="vendor/toastr/toastr.min.css">
    <link type="text/css" rel="stylesheet" href="vendor/ionicons/css/ionicons.min.css">
    <link type="text/css" rel="stylesheet" href="vendor/material-colors/dist/colors.css">
    <link type="text/css" rel="stylesheet" href="css/theme.css">
    <link type="text/css" rel="stylesheet" href="css/app.css">
</head>
<body>
    <div class="page-container bg-blue-grey-900">
        <div class="container container-xs">
            <img src="img/ufms_logo_72.png" class="mv-lg block-center img-responsive">
            <?= $this->Form->create(false,['class' => 'card b0 form-validate ng-pristine ng-invalid ng-invalid-required']) ?>

            <div class="card-heading">
                <div class="card-title text-center">UFMS Sustentável - Login</div>
            </div>
            <div class="card-body">
                <div class="mda-form-group float-label mda-input-group">
                    <div class="mda-form-control">
                        <input type="text" name="username" ng-model="account.name" required="" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">
                        <div class="mda-form-control-line"></div>
                        <label>Usuário</label>
                    </div>
                    <span class="mda-input-group-addon"><em class="ion-android-person icon-lg"></em></span>
                </div>
                <div class="mda-form-group float-label mda-input-group">
                    <div class="mda-form-control">
                        <input type="password" name="password" ng-model="account.password" required="" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">
                        <div class="mda-form-control-line"></div>
                        <label>Senha</label>
                    </div>
                    <span class="mda-input-group-addon"><em class="ion-ios-locked-outline icon-lg"></em></span>
                </div>
            </div>

            <button type="submit" ng-disabled="loginForm.$invalid || loginForm.$pristine" class="btn btn-primary btn-flat" disabled="disabled">Entrar</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- VENDOR -->
<script src="vendor/angular/angular.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/toastr/toastr.min.js"></script>
<!-- App script-->
<script src="js/app.js"></script>

<?= $this->Flash->render('auth') ?>
<?= $this->Flash->render() ?>

</body>
</html>
