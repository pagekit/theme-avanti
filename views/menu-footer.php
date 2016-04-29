<?php if ($root->getDepth() === 0) : ?>
<ul class="uk-subnav uk-subnav-line">
<?php endif ?>

    <?php foreach ($root->getChildren() as $node) : ?>
    <li class="<?= $node->get('active') ? ' uk-active' : '' ?>">
        <a href="<?= $node->getUrl() ?>"><?= $node->title ?></a>
    </li>
    <?php endforeach ?>

<?php if ($root->getDepth() === 0) : ?>
</ul>
<?php endif ?>
