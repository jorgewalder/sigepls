<!-- sidebar-->
<aside class="sidebar-container">
  <div class="sidebar-header">
    <div class="pull-right pt-lg text-muted hidden"><em class="ion-close-round"></em></div>
    <?= $this->Html->link('<span class="sidebar-header-logo-text"><em class="ion-leaf" style="color: #1DBD41;margin-left: -5px;}"></em> PLS - UFMS</span>',['controller' => 'users', 'action' => 'dashboard'],['class'=>'sidebar-header-logo','escape'=>false]) ?>
  </div>
  <div class="sidebar-content">
    <div class="sidebar-toolbar text-center"><a href="">
    <?= $this->Html->image('default_user.png',['alt'=>'Profile', 'class'=>'img-circle thumb64']) ?>
    </a>
      <div class="mt">Olá, <?= $this->request->session()->read('Auth.User.username'); ?></div>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="<?= ($active == 'dashboard') ? 'active' : null; ?>">
          <?= $this->Html->link(
            '<span class="nav-icon"><em class="ion-speedometer icon-fw"></em></span><span>Início</span>',
            ['controller' => 'users', 'action' => 'dashboard'],
            ['class'=>'ripple','escape'=>false]
          ) ?>
        </li>

        <li class="<?= ($active == 'register') ? 'active' : null; ?>">
        <?= $this->Html->link(
            '<span class="nav-icon"> <em class="ion-pricetags icon-fw"></em></span><span>Indicadores</span>',
            ['controller' => 'indicators', 'action' => 'register'],
            ['class'=>'ripple','escape'=>false]
          ) ?>
        </li>

        <li class="<?= ($active == 'relatories') ? 'active' : null; ?>">
        <?= $this->Html->link(
            '<span class="nav-icon"><em class="ion-clipboard icon-fw"></em></span><span>Relatórios</span>',
            ['controller' => 'indicators', 'action' => 'relatories'],
            ['class'=>'ripple','escape'=>false]
          ) ?>
        </li>

        <?php if($this->request->session()->read('Auth.User.role') == 'admin'): ?>

        <li class="<?= (in_array($active,['set_indicators','set_settings'])) ? 'active' : null; ?>">
          <a href="#" class="ripple">
            <span class="pull-right nav-caret"><em class="ion-ios-arrow-right"></em></span>
            <span class="pull-right nav-label"></span><span class="nav-icon"><em class="ion-gear-a"></em></span><span>Configurações</span><span class="md-ripple" style="width: 0px; height: 0px; margin-top: -95px; margin-left: -95px;"></span>
          </a>
          <ul class="sidebar-subnav">
            <li class="<?= ($active === 'set_indicators') ? 'active' : null; ?>">
              <?= $this->Html->link(
                '<span class="pull-right nav-label"></span><span>Indicadores</span><span class="md-ripple"></span>',
                ['controller' => 'indicators', 'action' => 'index'],
                ['class'=>'ripple','escape'=>false]
              ) ?>

            </li class="<?= ($active === 'set_categories') ? 'active' : null; ?>">
            <li>
              <?= $this->Html->link(
                '<span class="pull-right nav-label"></span><span>Categorias</span><span class="md-ripple"></span>',
                ['controller' => 'categories', 'action' => 'index'],
                ['class'=>'ripple','escape'=>false]
              ) ?>

            </li>
            <li class="<?= ($active === 'set_settings') ? 'active' : null; ?>">
              <?= $this->Html->link(
                '<span class="pull-right nav-label"></span><span>Parâmetros</span><span class="md-ripple"></span>',
                ['controller' => 'settings', 'action' => 'index'],
                ['class'=>'ripple','escape'=>false]
              ) ?>

            </li>
          </ul>
        </li>
      <?php endif; ?>
    </nav>
  </div>
</aside>
<div class="sidebar-layout-obfuscator"></div>
