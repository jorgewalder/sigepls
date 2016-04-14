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
    <link type="text/css" rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/vendor/toastr/toastr.min.css">
    <link type="text/css" rel="stylesheet" href="/vendor/ionicons/css/ionicons.min.css">
    <link type="text/css" rel="stylesheet" href="/vendor/material-colors/dist/colors.css">
    <link type="text/css" rel="stylesheet" href="/vendor/select2/dist/css/select2.min.css">
    <link type="text/css" rel="stylesheet" href="/css/theme.css">
    <link type="text/css" rel="stylesheet" href="/css/app.css">
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
                <li><a href="/users/logout"><em class="ion-log-out icon-fw"></em>Sair</a></li>
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
    <script src="/vendor/angular/angular.min.js"></script>
    <script src="/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/vendor/toastr/toastr.min.js"></script>
    <script src="/vendor/select2/dist/js/select2.full.min.js"></script>
    <!-- App script-->
    <script src="/js/app.js"></script>

    <?= $this->Flash->render('auth') ?>
    <?= $this->Flash->render() ?>
</body>
</html>
