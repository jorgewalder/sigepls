<!-- sidebar-->
<aside class="sidebar-container">
  <div class="sidebar-header">
    <div class="pull-right pt-lg text-muted hidden"><em class="ion-close-round"></em></div><a href="/dashboard" class="sidebar-header-logo"><span class="sidebar-header-logo-text"><em class="ion-leaf" style="color: #1DBD41;margin-left: -5px;}"></em> UFMS Sustentável</span></a>
  </div>
  <div class="sidebar-content">
    <div class="sidebar-toolbar text-center"><a href=""><img src="/img/default_user.png" alt="Profile" class="img-circle thumb64"></a>
      <div class="mt">Olá, <?= $this->request->session()->read('Auth.User.username'); ?></div>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="<?= ($active == 'dashboard') ? 'active' : null; ?>">
          <a href="/dashboard" class="ripple"><span class="nav-icon">
              <em class="ion-speedometer icon-fw"></em>
              </span><span>Início</span>
          </a>
        </li>

        <li class="<?= ($active == 'indicators') ? 'active' : null; ?>">
          <a href="/indicators" class="ripple"><span class="nav-icon">
              <em class="ion-pricetags icon-fw"></em>
              </span><span>Indicadores</span>
          </a>
        </li>

        <li class="<?= ($active == 'relatories') ? 'active' : null; ?>">
          <a href="/dashboard" class="ripple"><span class="nav-icon">
              <em class="ion-clipboard icon-fw"></em>
              </span><span>Relatórios</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<div class="sidebar-layout-obfuscator"></div>
