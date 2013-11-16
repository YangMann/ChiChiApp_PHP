<?php
//echo 'pages/blog<br>';
$count = count($blog['id']);
//echo $count;
?>
<?php
for ($i = 0; $i < $count; $i++) {
    ?>
    <div class="blogdiv">
        <?= anchor('/blog/'.$blog['id'][$i], $blog['title'][$i]) ?>
        <p><?= $blog['summary'][$i] ?></p>
    </div>
<?php
}
?>