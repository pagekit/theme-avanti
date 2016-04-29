<div id="tm-footer" class="tm-block-footer tm-footer-centered <?= $params['footer_style'] ?>">
    <div class="uk-container uk-container-center uk-flex uk-flex-middle uk-flex-center uk-height-1-1 uk-width-1-1">

        <footer class="tm-footer uk-text-center">

            <?php if ($view->position()->exists('footer_left')) : ?>
                <?= $view->position('footer_left', 'position-panel.php') ?>
            <?php endif ?>

            <?php if ($params['totop_scroller']) : ?>
                <a id="tm-anchor-bottom" class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
            <?php endif ?>

            <?php if ($view->position()->exists('footer_right') || $view->menu()->exists('footer')) : ?>
                <?= $view->position('footer_right', 'position-panel.php') ?>
                <?php if ($view->menu()->exists('footer')) : ?>
                    <?= $view->menu('footer', 'menu-footer.php') ?>
                <?php endif ?>
            <?php endif ?>

        </footer>

    </div>
</div>
