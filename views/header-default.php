<nav class="tm-navbar-wrapper <?= $params['classes.header'] ?>" <?= $params['classes.sticky'] ?>>

     <div class="tm-navbar uk-navbar">

         <div class="uk-container uk-container-center tm-navbar-container">

            <?php if ($params['logo'] || $params['title']) : ?>
            <div class="tm-navbar-left uk-flex uk-flex-middle">
                <a class="tm-logo uk-navbar-brand uk-flex uk-flex-middle" href="<?= $view->url()->get() ?>">
                    <?php if ($params['logo']) : ?>
                        <img class="tm-logo uk-responsive-height" src="<?= $this->escape($params['logo']) ?>" alt="">
                        <img class="tm-logo-contrast uk-responsive-height" src="<?= ($params['logo_contrast']) ? $this->escape($params['logo_contrast']) : $this->escape($params['logo']) ?>" alt="">
                    <?php else : ?>
                        <?= $params['title'] ?>
                    <?php endif ?>
                </a>
            </div>
            <?php endif ?>

            <?php if ($view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
            <div class="tm-navbar-center uk-flex uk-flex-center uk-height-1-1 uk-position-relative uk-visible-large">
                <?= $view->menu('main', 'menu-navbar.php') ?>
                <?= $view->position('navbar', 'position-blank.php') ?>
            </div>
            <?php endif ?>

            <?php if ($view->position()->exists('header-social')  || $view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
            <div class="tm-navbar-right uk-flex uk-flex-middle">

                <?php if ($view->position()->exists('header_social')) : ?>
                <div class="tm-navbar-social uk-hidden-small">
                   <div data-uk-dropdown="{mode:'click', pos:'left-center'}">
                       <button class="tm-navbar-button tm-navbar-social-button"></button>
                       <div class="uk-dropdown-blank tm-navbar-dropdown">
                           <?= $view->position('header_social', 'position-blank.php') ?>
                       </div>
                   </div>
                </div>
                <?php endif ?>

                <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
                <div class="uk-flex uk-flex-center uk-flex-middle uk-hidden-large">
                    <a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
                </div>
                <?php endif ?>

            </div>
            <?php endif ?>

        </div>

    </div>

</nav>
