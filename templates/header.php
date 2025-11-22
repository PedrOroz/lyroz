<?php
  //$_SESSION['id_role_dao']
    // 1 = Súper Administrador
    // 2 = Administrador
    // 3 = Usuario
    // 4 = Vendedor
    // 5 = Diseñador
    // 6 = Chef ?>
<nav class="navbar nav-underline fixed-top navbar-expand-lg navbar-light bg-white border border-secondary">
  <div class="container-fluid container-xl">
    <a rel="noopener" class="navbar-brand" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT) ?>">
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
          <a rel="noopener" class="nav-link<?php echo ($id == 1 ? ' active' : '') ?>" aria-current="page" href="<?php if($type_of_href_nav == 1){ echo "#main_banner";}else{ echo(defined('URL') ? URL : URL_CARPETA_FRONT); } ?>"><?php echo LANG_INICIO; ?></a>
        </li>
        <li class="nav-item">
          <a rel="noopener" class="nav-link<?php echo ($id == 5 ? ' active' : '') ?>" href="<?php echo($type_of_href_nav == 1 ? '#contactanos' : (defined('URL') ? URL : URL_CARPETA_FRONT).'contactanos'); ?>"><?php echo LANG_CONTACTANOS; ?></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo LANG_IDIOMA; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo (defined('URL_SIN_DIAGONAL') ? URL_SIN_DIAGONAL : URL_CARPETA_FRONT_SIN_DIAGONAL).($id > 1 ? '/' : '').$url.'/'.$idioma; ?>"><?php echo $txt_seleccionado; ?></a></li>
          </ul>
        </li>
      </ul>
    </div>
    <?php
      if(isset($_SESSION['id_user_dao']) && !empty($_SESSION['id_user_dao'])){
        //$view
          //1 = Header general
          //2 = Header dashboard

                                                            //$id_user,$view
        userController::showInformationSesionTopHeaderFront(intval(trim($_SESSION['id_user_dao'])),1);
      }else{
        echo('<button type="button" class="btn btn-success text-white ms-md-3" data-bs-toggle="modal" data-bs-target="#logInModal" data-bs-whatever="@getbootstrap">'.LANG_ACCEDER.'</button>');
           } ?>
  </div>
</nav>
<!-- Modals -->
<div id="logInModal" class="modal fade" tabindex="-1" aria-labelledby="logInModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 id="logInModalLabel" class="modal-title fs-5"><?php echo LANG_LOGIN; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-2 pb-4 px-4">
        <form id="logIn" class="needs-validation" novalidate>
          <div class="mb-3 email">
            <input type="text" name="email_usuario" id="email_usuario" class="form-control" placeholder="E-mail o Usuario" value="" maxlength="50" autocomplete="off" required="">
            <div class="invalid-feedback"></div>
          </div>
          <div class="mb-3 password">
            <div class="input-group js-show">
              <input type="password" name="password" id="pwd" class="form-control js-pass" placeholder="Contraseña" value="" minlength="8" maxlength="16" autocomplete="off" required="">
              <button type="button" class="btn btn-dark js-check"><i class="fas fa-eye"></i></button>
            </div>
            <div class="invalid-feedback"></div>
          </div>
          <hr>
          <div class="text-center">
            <button type="submit" class="btn btn-primary w-100"><?php echo LANG_INICIAR_SESION; ?></button>
          </div>
        </form>
        <span class="my-2 line-thru text-center text-uppercase d-block"><span>o</span></span>
        <p class="text-center mb-4">
          <a href="<?php echo (defined('URL_SIN_DIAGONAL') ? URL : URL_CARPETA_FRONT); ?>registrate" class="text-decoration-none" rel="noopener" role="button"><?php echo LANG_CREAR_CUENTA; ?></a>
        </p>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="graciasModal" class="modal fade" tabindex="-1" aria-labelledby="graciasModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h2 class="fw-bold my-3"><?php echo LANG_TITLE_HEAD_GRACIAS; ?></h2>
        <p><?php echo LANG_PAG_GRACIAS; ?></p>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?php echo LANG_REGRESAR; ?></button>
      </div>
    </div>
  </div>
</div>