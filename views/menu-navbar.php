<?php if ($root->getDepth() === 0) : ?>
<ul class="uk-navbar-nav">
<?php endif ?>

    <?php foreach ($root->getChildren() as $node) : ?>

    <?php

        $dropdown = ($root->getDepth() === 0 && $node->hasChildren());

        if ($dropdown) {
            $settings = [];
            $settings['pos'] = $params['header_layout'] !== 'default' ? "bottom-center" : '';
            $dropdown = 'data-uk-dropdown=\''.json_encode($settings).'\'';
        }

    ?>

    <li class="<?= $node->hasChildren() ? 'uk-parent' : '' ?><?= $node->get('active') ? ' uk-active' : '' ?>" <?= $dropdown ?>>
        <a href="<?= $node->getUrl() ?>"><?= $node->title ?></a>

        <?php if ($node->hasChildren()) : ?>

            <?php if ($root->getDepth() === 0) : ?>
            <div class="uk-dropdown uk-dropdown-navbar">
            <?php endif ?>

                <?php if ($root->getDepth() === 0) : ?>
                <ul class="uk-nav uk-nav-navbar">
                <?php elseif ($root->getDepth() === 1) : ?>
                <ul class="uk-nav-sub">
                <?php else : ?>
                <ul>
                <?php endif ?>
                    <?= $view->render('menu-navbar.php', ['root' => $node]) ?>
                </ul>

            <?php if ($root->getDepth() === 0) : ?>
            </div>
            <?php endif ?>

        <?php endif ?>

    </li>
    <?php endforeach ?>

<?php if ($root->getDepth() === 0) : ?>
</ul>
<?php endif ?>
