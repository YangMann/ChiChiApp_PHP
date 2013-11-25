<?php
//echo 'pages/blog<br>';
$count = count($blog['id']);
///echo $count;
?>
<div class="wd-inner">
    <div class="bl-list">
    <div class="bl-list-header">
        <nav class="bl-sort">
            <h5 class="bl-sort-header bl-sort-header-active">
                <a href="/" data-redir="blog" title="博客列表">
                    <span class="bl-sort-title">博客列表</span>
                </a>
            </h5>
            <h5 class="bl-sort-header">
                <a href="/" data-redir="blog/c" title="分类">
                    <span class="bl-sort-title">分类</span>
                </a>
            </h5>
        </nav>
    </div>
<?php
for ($i = $count-1; $i >=0 ; $i--) {
    ?>
    <article class="bl-item">
        <h3 class="bl-item-title">
            <a href="" title="<?= $blog['title'][$i] ?>"
               data-redir="<?= 'blog/' . $blog['id'][$i] ?>" data-redir-target="wd-fullscreen"><?= $blog['title'][$i] ?></a>
        </h3>
         <a class="bl-item-time" href=""   title="<?= $blog['title'][$i] ?>"
            data-redir="<?= 'blog/' . $blog['id'][$i] ?>" data-redir-target="wd-fullscreen"><?= $blog['time'][$i] ?></a>
        <a class="bl-item-summary" href="" title="<?= $blog['title'][$i] ?> "
           data-redir="<?= 'blog/' . $blog['id'][$i] ?>" data-redir-target="wd-fullscreen">
            <p><?= $blog['summary'][$i] ?></p>
        </a>
    </article>

<?php
}
?>
    </div>
</div>