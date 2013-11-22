<?php
include_once 'Michelf/Markdown.php';
use Michelf\Markdown;

$text = $blog['body'];
$html = Markdown::defaultTransform($text);
?>


<div class="g-r fw-wrapper">
    <section class="u-1-5">
    </section>
    <section class="u-3-5" tabindex="-1">

        <div class="bl-view-wrapper">
            <div class="bl-header-image-wrap">
                <img class="bl-header-image-contain" src=<?=$blog['feature_img']?> alt width="800" height="450">
            </div>
            <header class="bl-header bl-header-top">
                <ul class="bl-meta">
                    <li class="bl-meta-item">
                        <span class="bl-divider-word">in</span>
                        <a><?=$blog['genre'] ?></a>
                    </li>
                </ul>
            </header>
            <div class="bl-content">
                <div class="bl-content-inner">
                    <header class="bl-header bl-header-headline">
                        <h1 class="bl-title">
                            <?=$blog['title'] ?>
                        </h1>
                    </header>
                    <div class="bl-field">
                        <?= $html ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'application/views/templates/author_left.php' ?>
</div>

<footer class="bl-footer">
    <div class="bl-preview">
        <a href="/blog/<?= $blog_next['id']?>" data-redir="blog/<?= $blog_next['id']?>" data-redir-target="wd-fullscreen" class="bl-background-size-cover">
            <div class="bl-preview-content">
                <div class="bl-preview-description">
                    Read next
                </div>
                <h3 class="bl-preview-title">
                    <?=$blog_next['title']?>
                </h3>
            </div>
            <img class="bl-header-image-cover" src=<?= $blog_next['feature_img']?>>
        </a>
    </div>
</footer>
