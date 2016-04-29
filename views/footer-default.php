<div id="tm-footer" class="tm-block-footer <?= $params['footer_style'] ?>">
    <div class="uk-container uk-container-center uk-flex uk-flex-middle uk-height-1-1 uk-width-1-1">

        <footer class="tm-footer uk-flex uk-flex-middle uk-width-1-1">

            <?php if ($view->position()->exists('footer_left')) : ?>
            <div class="tm-footer-left uk-flex uk-flex-middle">
                <?= $view->position('footer_left', 'position-panel.php') ?>
            </div>
            <?php endif ?>

            <?php if ($params['totop_scroller']) : ?>
            <div class="tm-footer-center uk-flex uk-flex-middle uk-flex-center uk-width-1-1">
                <a id="tm-anchor-bottom" class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
            </div>
            <?php endif ?>

            <?php if ($view->position()->exists('footer_right') || $view->menu()->exists('footer')) : ?>
            <div class="tm-footer-right uk-flex uk-flex-middle">
                <?= $view->position('footer_right', 'position-panel.php') ?>
                <?php if ($view->menu()->exists('footer')) : ?>
                    <?= $view->menu('footer', 'menu-footer.php') ?>
                <?php endif ?>
            </div>
            <?php endif ?>

        </footer>

    </div>
</div>
