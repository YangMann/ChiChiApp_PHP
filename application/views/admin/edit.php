<?php
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-15
 * Time: 下午7:22
 */
echo validation_errors();
?>
<h4>Edit "<?php echo $post['title']; ?>" Below</h4>
<form action="" method="post">
    <p>Title:</p>
    <input type="text" name="title" size="50" value="<?php echo $post['title']; ?>"/><br/>

    <p>Summary:</p>
    <textarea name="summary" rows="2" cols="50"><?php echo $post['summary']; ?>
    </textarea><br/>

    <p>Post Content:</p>
    <textarea name="content" rows="6" cols="50"><?php echo $post['content']; ?>
    </textarea><br/>
    <input type="submit" value="Save"/>
    <?php
    echo anchor('admin', 'Cancel');
    ?>
</form>
