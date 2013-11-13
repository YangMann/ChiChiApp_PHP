<?php
//echo 'pages/blog<br>';
$count = count($blog['id']);
//echo $count;
for ($i = 0; $i < $count; $i++) {
    ?>
    <div class="blogdiv">
        <?= anchor('/blog/view/'.$blog['id'][$i], $blog['title'][$i]) ?>
        <p><?= $blog['summary'][$i] ?></p>
    </div>
<?php
}