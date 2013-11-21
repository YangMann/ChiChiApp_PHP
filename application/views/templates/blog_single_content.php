<?php
include_once '/Michelf/Markdown.php';
use Michelf\Markdown;

$text = $blog['body'];
$html = Markdown::defaultTransform($text);
?>

<div class="bl-header-image-wrap">
    <img class="bl-header-image-contain" src=<?=$blog['feature_img']?> alt width="800" height="450">
</div>
<header class="bl-header bl-header-top">
    <ul class="bl-meta">
        <li class="bl-meta-item">
            <span class="bl-divider-word">in</span>
            <a href="/"><?=$blog['genre'] ?></a>
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










