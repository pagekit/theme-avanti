<?php $view->script('posts', 'blog:app/bundle/posts.js', 'vue') ?>

    <?php foreach ($posts as $post) : ?>
    <article class="uk-article tm-article-blog">

        <p class="uk-article-meta tm-article-meta uk-text-center">
            <?= __('Written by %name% on %date%', ['%name%' => $post->user->name, '%date%' => '<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time>' ]) ?>
        </p>

        <h1 class="uk-article-title tm-article-title uk-text-center">
            <a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>">
                <?= $post->title ?>
            </a>
        </h1>

        <?php if ($image = $post->get('image.src')): ?>
        <div class="tm-article-image tm-article-image-large uk-position-relative" style="background: url('<?= $view->url($image) ?>') #FFF 50% 50% no-repeat; background-size: cover;">
            <a class="uk-position-cover" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>">
                <img class="uk-invisible" src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>">
            </a>
        </div>
        <?php endif ?>

        <div class="tm-article-content uk-margin">
            <?= $post->excerpt ?: $post->content ?>
        </div>

        <p class="uk-margin-large-top uk-text-center" data-uk-margin>
            <?php if (isset($post->readmore) && $post->readmore || $post->excerpt) : ?>
            <a class="uk-button uk-button-link" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><?= __('Read more') ?></a>
            <?php endif ?>

            <?php if ($post->isCommentable() || $post->comment_count) : ?>
            <a class="uk-button uk-button-link tm-button-comment" href="<?= $view->url('@blog/id#comments', ['id' => $post->id]) ?>"><?= _c('{0} No comments|{1} %num% Comment|]1,Inf[ %num% Comments', $post->comment_count, ['%num%' => $post->comment_count]) ?></a>
            <?php endif ?>
        </p>

    </article>
    <?php endforeach ?>

    <?php

        $range     = 3;
        $total     = intval($total);
        $page      = intval($page);
        $pageIndex = $page - 1;

    ?>

    <?php if ($total > 1) : ?>
    <ul class="uk-pagination">

        <?php for($i=1;$i<=$total;$i++): ?>
            <?php if ($i <= ($pageIndex+$range) && $i >= ($pageIndex-$range)): ?>

                <?php if ($i == $page): ?>
                <li class="uk-active"><span><?=$i?></span></li>
                <?php else: ?>
                <li>
                    <a href="<?= $view->url('@blog/page', ['page' => $i]) ?>"><?=$i?></a>
                <li>
                <?php endif; ?>

            <?php elseif($i==1): ?>

                <li>
                    <a href="<?= $view->url('@blog/page', ['page' => 1]) ?>">1</a>
                </li>
                <li><span>...</span></li>

            <?php elseif($i==$total): ?>

                <li><span>...</span></li>
                <li>
                    <a href="<?= $view->url('@blog/page', ['page' => $total]) ?>"><?=$total?></a>
                </li>

            <?php endif; ?>
        <?php endfor; ?>

    </ul>
    <?php endif ?>
