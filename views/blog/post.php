<?php $view->script('post', 'blog:app/bundle/post.js', 'vue') ?>

<article class="uk-article tm-article-blog">

    <p class="uk-article-meta tm-article-meta uk-text-center">
        <?= __('Written by %name% on %date%', ['%name%' => $post->user->name, '%date%' => '<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time>' ]) ?>
    </p>

    <h1 class="uk-article-title tm-article-title uk-text-center">
        <?= $post->title ?>
    </h1>

    <?php if ($image = $post->get('image.src')): ?>
    <div class="tm-article-image tm-article-image-large uk-position-relative" style="background: url('<?= $view->url($image) ?>') #FFF 50% 50% no-repeat; background-size: cover;">
        <a class="uk-position-cover" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>">
            <img class="uk-invisible" src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>">
        </a>
    </div>
    <?php endif ?>

    <div class="tm-article-content uk-margin">
        <?= $post->content ?>
    </div>
    <div class="tm-article-content">
        <?= $view->render('blog/comments.php') ?>
    </div>

</article>
