<ul class="nav nav-pills justify-content-center">
    <?php
        echo(!empty(URL_FACEBOOK) ? '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.URL_FACEBOOK.'" target="_blank" rel="noopener" role="button"><i class="fa-brands fa-facebook fa-2x"></i></a></li>' : '');
        echo(!empty(URL_INSTAGRAM) ? '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.URL_INSTAGRAM.'" target="_blank" rel="noopener" role="button"><i class="fa-brands fa-instagram fa-2x"></i></a></li>' : '');
        echo(!empty(URL_TIKTOK) ? '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.URL_TIKTOK.'" target="_blank" rel="noopener" role="button"><i class="fa-brands fa-tiktok fa-2x"></i></a></li>' : '');
        echo(!empty(URL_LINKEDIN) ? '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.URL_LINKEDIN.'" target="_blank" rel="noopener" role="button"><i class="fa-brands fa-linkedin fa-2x"></i></a></li>' : '');
        echo(!empty(URL_PINTERES) ? '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.URL_PINTERES.'" target="_blank" rel="noopener" role="button"><i class="fa-brands fa-pinterest fa-2x"></i></a></li>' : '');
        echo(!empty(URL_VIMEO) ? '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.URL_VIMEO.'" target="_blank" rel="noopener" role="button"><i class="fa-brands fa-vimeo fa-2x"></i></a></li>' : '');
        echo(!empty(URL_YOUTUBE) ? '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.URL_YOUTUBE.'" target="_blank" rel="noopener" role="button"><i class="fa-brands fa-youtube fa-2x"></i></a></li>' : ''); ?>
</ul>