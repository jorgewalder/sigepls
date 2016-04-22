<html lang="pt-br" ng-app="sustentavel">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Sistema UFMS Sustentável">
    <title>Login</title>

    <!-- Application styles-->
    <?= $this->Html->css('/vendor/bootstrap/dist/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/vendor/toastr/toastr.min.css') ?>
    <?= $this->Html->css('/vendor/Ionicons/css/ionicons.min.css') ?>
    <?= $this->Html->css('/vendor/material-colors/dist/colors.css') ?>
    <?= $this->Html->css('/vendor/angular-xeditable/dist/css/xeditable.css') ?>
    <?= $this->Html->css('/css/theme.css') ?>
    <?= $this->Html->css('/css/app.css') ?>
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
<?= $this->Html->script('/vendor/angular/angular.min.js') ?>
<?= $this->Html->script('/vendor/jquery/dist/jquery.min.js') ?>
<?= $this->Html->script('/vendor/bootstrap/dist/js/bootstrap.min.js') ?>
<?= $this->Html->script('/vendor/toastr/toastr.min.js') ?>
<?= $this->Html->script('/vendor/angular-xeditable/dist/js/xeditable.js') ?>
<?= $this->Html->script('/js/app.js') ?>
<?= $this->Html->script('/js/config.js') ?>

<?= $this->Flash->render('auth') ?>
<?= $this->Flash->render() ?>

</body>
</html>
