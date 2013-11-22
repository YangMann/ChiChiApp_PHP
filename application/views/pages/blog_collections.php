<?php
//echo 'pages/blog<br>';
$count = count($blog['id']);
//echo $count;
$cArray=array();
$length=0;
for ($i = 0; $i < $count; $i++) {
    if(!array_key_exists($blog['genre'][$i], $cArray)){
        array_push($cArray,$blog['genre'][$i]);
    }
}
?>
<div class="wd-inner">
    <div class="bl-list">
        <div class="bl-list-header">
            <nav class="bl-sort">
                <h5 class="bl-sort-header">
                    <a href="/" data-redir="blog" title="博客列表">
                        <span class="bl-sort-title">博客列表</span>
                    </a>
                </h5>
                <h5 class="bl-sort-header bl-sort-header-active">
                    <a href="/" data-redir="blog/c" title="分类">
                        <span class="bl-sort-title">分类</span>
                    </a>
                </h5>
            </nav>
        </div>
        <div class="bl-genre-content">

            <ul class="bl-genre-list">
                <?php
                 foreach($cArray as $genre) { ?>
                <li>
                    <h4>
                        <a class="bt bt-default" href="<?='#bl-genre-'.$genre?>">
                            <?=$genre?>
                        </a>
                    </h4>
                </li>
                <?php
                 }
                ?>
            </ul>
        <?php
        foreach ($cArray as $genre) { ?>
            <div class="bl-genre" id="<?='bl-genre-'. $genre?>">
                <h1 class="bl-genre-name">
                    <?=$genre?>
                </h1>

        <?php
            for ($i = 0; $i < $count; $i++) {
                if($genre == $blog['genre'][$i]) {
                ?>
                    <article class="bl-item">
                        <h3 class="bl-item-title">
                            <a href="<?= '/blog/' . $blog['id'][$i] ?>" title="<?= $blog['title'][$i] ?>"
                               data-redir="<?= 'blog/' . $blog['id'][$i] ?>" data-redir-target="wd-fullscreen"><?= $blog['title'][$i] ?></a>
                        </h3>
                        <a class="bl-item-summary" href="<?= '/blog/' . $blog['id'][$i] ?>" title="<?= $blog['title'][$i] ?> "
                           data-redir="<?= 'blog/' . $blog['id'][$i] ?>" data-redir-target="wd-fullscreen">
                            <p><?= $blog['summary'][$i] ?></p>
                        </a>
                    </article>
                <?php
            }
        }
        ?>
            </div>
                <?php
        }
        ?>
        </div>
    </div>

</div>
