<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title"><?php echo $lang_global["Navegación"]; ?></div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a class="nav-link" href="<?php echo URL_CARPETA_ADMIN ?>/main">
                            <i class="fas fa-chart-bar" aria-hidden="true"></i>
                            <span><?php echo $lang_global["Panel de control"]; ?></span>
                        </a>
                    </li>
                <?php
                    //$_SESSION['id_role_dao']
                        // 1 = Súper Administrador
                        // 2 = Administrador
                        // 3 = Usuario
                        // 4 = Vendedora
                        // 5 = Diseñador
                        // 6 = Chef
                        // 7 = Editor

                    switch ($_SESSION['id_role_dao']) {
                        case 3:
                            break;
                        case 4:
                            break;
                        case 5:
                            break;
                        case 6:
                            break;
                        case 7:
                      echo('<li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-store" aria-hidden="true"></i>
                                    <span>'.$lang_global["Catálogo"].'</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="'.URL_CARPETA_ADMIN.'/catalogue-category">'.$lang_global["Categorías"].'</a>
                                    </li>
                                </ul>
                            </li>');
                            break;
                        default:
                      echo('<li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-desktop" aria-hidden="true"></i>
                                    <span>'.$lang_global["Diseño"].'</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="'.URL_CARPETA_ADMIN.'/design-slider">'.$lang_global["Slider"].'</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-store" aria-hidden="true"></i>
                                    <span>'.$lang_global["Catálogo"].'</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="'.URL_CARPETA_ADMIN.'/catalogue-category">'.$lang_global["Categorías"].'</a>
                                    </li>
                                    <li class="nav-parent">
                                        <a class="nav-link" href="#">'.$lang_global["Artículos"].'</a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="'.URL_CARPETA_ADMIN.'/catalogue-attribute">'.$lang_global["Atributos y características"].'</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="'.URL_CARPETA_ADMIN.'/catalogue-product">'.$lang_global["Productos"].'</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-users-cog" aria-hidden="true"></i>
                                    <span>'.$lang_global["Configurar"].'</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="'.URL_CARPETA_ADMIN.'/configurations-users">'.$lang_global["Usuarios"].'</a>
                                    </li>
                                </ul>
                            </li>');
                        break;
                    } ?>
                    <li>
                        <a class="nav-link" href="<?php echo URL_CARPETA_FRONT; ?>" target="_blank">
                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                            <span><?php echo $lang_global["Sitio web"]; ?></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>