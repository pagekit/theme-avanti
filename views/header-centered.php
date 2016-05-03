<div class="tm-navbar-wrapper <?= $params['classes.header'] ?>" <?= $params['classes.sticky'] ?>>
    <div class="tm-navbar tm-navbar-centered uk-navbar">

        <div class="uk-container uk-container-center tm-navbar-container uk-flex uk-flex-center uk-flex-column">

            <?php if ($params['logo'] || $params['title']) : ?>
            <div class="tm-navbar-center uk-flex uk-flex-middle uk-flex-center">
                <a class="tm-logo uk-flex uk-flex-middle uk-navbar-brand" href="<?= $view->url()->get() ?>">
                <?php if ($params['logo']) : ?>
                    <img class="tm-logo uk-responsive-height" src="<?= $this->escape($params['logo']) ?>" alt="">
                <?php else : ?>
                    <?= $params['title'] ?>
                <?php endif ?>
                </a>
            </div>
            <?php endif ?>

            <?php if ($view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
            <div class="tm-navbar-center uk-flex uk-flex-middle uk-flex-center uk-hidden-small">
                <?= $view->menu('main', 'menu-navbar.php') ?>
                <?= $view->position('navbar', 'position-blank.php') ?>
            </div>
            <?php endif ?>

            <?php if ($view->position()->exists('header_info')) : ?>
            <div class="tm-navbar-left uk-flex uk-flex-middle uk-hidden-small">
                <?= $view->position('header_info', 'position-blank.php') ?>
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
                <div class="uk-flex uk-flex-center uk-flex-middle uk-visible-small">
                    <a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
                </div>
                <?php endif ?>
            </div>
            <?php endif ?>

        </div>

    </div>

</div>
