<?php
  //$_SESSION['id_role_dao']
    // 1 = Súper Administrador
    // 2 = Administrador
    // 3 = Usuario
    // 4 = Vendedor
    // 5 = Diseñador
    // 6 = Chef ?>
<nav class="navbar nav-underline fixed-top navbar-expand-lg navbar-light bg-white border border-secondary">
  <div class="container">
    <a rel="noopener" class="navbar-brand" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>dashboard">
      <img
        src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/logo-header.jpg"
        data-src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/logo-header.jpg"
        width="100"
        height="100"
        alt="Logo header <?php echo (defined('WEBSITE') ? WEBSITE : WEBSITE_CMS); ?>"
        class="img-fluid lazyload">
    </a>
    <button class="nav-trigger navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a rel="noopener" class="nav-link<?php echo ($id == 9 ? ' active' : '') ?>" aria-current="page" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>dashboard"><?php echo LANG_INICIO; ?></a>
        </li>
      </ul>
    </div>
    <div id="dropdown-notificaciones" class="dropdown d-flex align-items-center ps-md-3 pe-0">
      <a href="#" class="link-body-emphasis text-decoration-none dropdown-toggle notification-icon" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-regular fa-envelope"></i>
        <span class="badge bg-danger position-relative"></span>
      </a>
      <ul class="dropdown-menu notification-menu p-0 text-small" style="right: 0;left: auto;">
        <div class="notification-title"><?php echo LANG_MENSAJES; ?></div>
        <div class="content">
          <ul></ul>
        </div>
      </ul>
    </div>
    <?php
      if(isset($_SESSION['id_user_dao']) && !empty($_SESSION['id_user_dao'])){
        //$view
          //1 = Header general
          //2 = Header dashboard

                                                            //$id_user,$view
        userController::showInformationSesionTopHeaderFront(intval(trim($_SESSION['id_user_dao'])),2);
      }else{
        echo('<button type="button" class="btn btn-primary ms-md-3" data-bs-toggle="modal" data-bs-target="#logInModal" data-bs-whatever="@getbootstrap">'.LANG_ACCEDER.'</button>');
           } ?>
  </div>
</nav>
<!-- Modals -->