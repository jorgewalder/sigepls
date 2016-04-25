<!DOCTYPE html>
<html lang="pt-br" ng-app="sustentavel">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Layout level -->
    <?= $this->Html->css('/vendor/bootstrap/dist/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/vendor/toastr/toastr.min.css') ?>
    <?= $this->Html->css('/vendor/Ionicons/css/ionicons.min.css') ?>
    <?= $this->Html->css('/vendor/material-colors/dist/colors.css') ?>
    <?= $this->Html->css('/vendor/angular-xeditable/dist/css/xeditable.css') ?>
    <?= $this->Html->css('/vendor/select2/dist/css/select2.min.css') ?>
    <?= $this->Html->css('/css/theme.css') ?>
    <?= $this->Html->css('/css/app.css') ?>
    <!-- /Layout level -->

    <!-- Page level -->
    <?= $this->fetch('pageCss') ?>
    <!-- /Page level -->
</head>
<body class="theme-5">
    <div class="layout-container">
      <!-- top navbar-->
      <header class="header-container">
        <nav>
            <ul class="visible-xs">
                <li><a id="sidebar-toggler" href="#" class="menu-link menu-link-slide"><span><em></em></span></a></li>
            </ul>
            <h2 class="header-title"><?= $this->fetch('title') ?></h2>
            <ul class="pull-right">
            <li><?= $this->Html->link('<em class="ion-log-out icon-fw"></em>Sair</a>',['controller' => 'users', 'action' => 'logout'],['escape'=>false]) ?></li>
            </ul>
        </nav>
      </header>

      <?= $this->element('tpls/sidebar') ?>

      <!-- Main section-->
      <main class="main-container">
        <!-- Page content-->
        <section>

            <?= $this->fetch('content') ?>
        </section>
        <!-- Page footer-->
        <footer><span>2016 - UFMS Sustentável.</span></footer>
      </main>
    </div>

    <!-- VENDOR -->
    <?= $this->Html->script('/vendor/angular/angular.min.js') ?>
    <?= $this->Html->script('/vendor/jquery/dist/jquery.min.js') ?>
    <?= $this->Html->script('/vendor/bootstrap/dist/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/vendor/toastr/toastr.min.js') ?>
    <?= $this->Html->script('/vendor/select2/dist/js/select2.full.min.js') ?>
    <?= $this->Html->script('/vendor/angular-xeditable/dist/js/xeditable.js') ?>
    <?= $this->Html->script('/vendor/angular-bootstrap/ui-bootstrap.min.js') ?>
    <?= $this->Html->script('/vendor/angular-bootstrap/ui-bootstrap-tpls.min.js') ?>
    <?= $this->Html->script('/js/app.js') ?>
    <?= $this->Html->script('/js/config.js') ?>

    <?= $this->Flash->render('auth') ?>
    <?= $this->Flash->render() ?>
</body>
</html>
