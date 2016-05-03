<!DOCTYPE html>
<html class="<?= $params['html_class'] ?>" lang="<?= $intl->getLocaleTag() ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $view->render('head') ?>
        <?php $view->style('theme', $params['style'] ? 'theme:css/styles/'.$params['style'].'/theme.css' : 'theme:css/theme.css') ?>
        <?php $view->script('animatedtext', 'theme:js/animated-text.js', ['uikit']) ?>
        <?php $view->script('theme', 'theme:js/theme.js', ['uikit-sticky',  'uikit-lightbox',  'uikit-parallax', 'uikit-slider', 'uikit-grid', 'uikit-accordion', 'animtedtext']) ?>
    </head>

    <body <?= $params['classes.body'] ?>>

        <?php if ($view->position()->exists('hero') || $params['logo'] || $view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
        <div id="tm-header" class="tm-block-header">

            <?php if ($params['logo'] || $view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
                <?= $view->position('navbar', 'header-'.$params['header_layout'].'.php') ?>
            <?php endif ?>

            <?php if ($view->position()->exists('hero')) : ?>
            <div id="tm-hero" class="tm-hero tm-header-container uk-block uk-block-large uk-cover-background uk-flex uk-flex-middle <?= $params['classes.hero'] ?>" <?= $params['hero_image'] ? "style=\"background-image: url('{$view->url($params['hero_image'])}');\"" : '' ?> <?= $params['classes.parallax'] ?>>
                <div class="uk-container uk-container-center<?= $params['hero_width'] ? ' uk-width-1-1' : '' ?>">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('hero', 'position-grid.php') ?>
                    </section>

                </div>
            </div>
            <?php endif ?>

        </div>
        <?php endif ?>

        <?php if ($view->position()->exists('top')) : ?>
        <div id="tm-top" class="tm-top uk-block <?= $params['top_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('top', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif ?>

        <?php if ($view->position()->exists('top_b')) : ?>
        <div id="tm-top-b" class="tm-top-b uk-block <?= $params['top_b_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('top_b', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif ?>

        <?php if ($view->position()->exists('top_c')) : ?>
        <div id="tm-top-c" class="tm-top-c uk-block <?= $params['top_c_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('top_c', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif ?>

        <div id="tm-main" class="tm-main uk-block <?= $params['main_style'] ?>">
            <div class="uk-container uk-container-center">

                <div class="uk-grid" data-uk-grid-match data-uk-grid-margin>

                    <main class="<?= $view->position()->exists('sidebar') ? 'uk-width-medium-3-4' : 'uk-width-1-1'; ?>">
                        <?= $view->render('content') ?>
                    </main>

                    <?php if ($view->position()->exists('sidebar')) : ?>
                    <aside class="uk-width-medium-1-4 <?= $params['sidebar_first'] ? 'uk-flex-order-first-medium' : ''; ?>">
                        <?= $view->position('sidebar', 'position-panel.php') ?>
                    </aside>
                    <?php endif ?>

                </div>

            </div>
        </div>

        <?php if ($view->position()->exists('bottom')) : ?>
        <div id="tm-bottom" class="tm-bottom uk-block <?= $params['bottom_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('bottom', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif ?>

        <?php if ($view->position()->exists('bottom_b')) : ?>
        <div id="tm-bottom-b" class="tm-bottom-b uk-block <?= $params['bottom_b_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('bottom_b', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif ?>

        <?php if ($view->position()->exists('bottom_c')) : ?>
        <div id="tm-bottom-c" class="tm-bottom-c uk-block <?= $params['bottom_c_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('bottom_c', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif ?>

        <?php if ($view->position()->exists('bottom_d')) : ?>
        <div id="tm-bottom-d" class="tm-bottom-d uk-block <?= $params['bottom_d_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('bottom_d', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif ?>

        <?php if ($view->position()->exists('footer_left')  || $view->position()->exists('footer_right') || $params['totop_scroller']) : ?>
            <?= $view->position('footer_left', 'footer-'.$params['footer_layout'].'.php') ?>
        <?php endif ?>

        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">

                <?php if ($params['logo_offcanvas']) : ?>
                <div class="uk-panel uk-text-center">
                    <a href="<?= $view->url()->get() ?>">
                        <img src="<?= $this->escape($params['logo_offcanvas']) ?>" alt="">
                    </a>
                </div>
                <?php endif ?>

                <?php if ($view->menu()->exists('offcanvas')) : ?>
                    <?= $view->menu('offcanvas', ['class' => 'uk-nav-offcanvas']) ?>
                <?php endif ?>

                <?php if ($view->position()->exists('offcanvas')) : ?>
                    <?= $view->position('offcanvas', 'position-panel.php') ?>
                <?php endif ?>

            </div>
        </div>
        <?php endif ?>

        <?= $view->render('footer') ?>

    </body>
</html>
