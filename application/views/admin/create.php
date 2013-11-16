<?php
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-15
 * Time: 下午7:21
 */
echo validation_errors();
?>
<h4>Create A New Post Below</h4>
<form action="" method="post">
    <p>Title:</p>
    <input type="text" name="title" size="50"/><br/>

    <p>Summary:</p>
    <textarea name="summary" rows="2" cols="50"></textarea><br/>

    <p>Post Content:</p>
    <textarea name="content" rows="6" cols="50"></textarea><br/>
    <input type="submit" value="Save"/>
    <?php
    echo anchor('admin', 'Cancel');
    ?>
</form>