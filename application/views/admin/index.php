<?php
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-15
 * Time: 下午7:20
 */
echo '<p>Welcome To The Admin Page ' . $username . '! All posts available for edit or deletion is listed below.</p><br/>';

echo anchor('admin/create', 'Create New Post');

$count = count($post['id']);
for ($i = 0; $i < $count; $i++) {
    echo '<div class="postDiv">';
    echo '<h4>' . $post['title'][$i];
    echo anchor('blog/view/' . $post['id'][$i], ' [view]');
    echo anchor('admin/edit/' . $post['id'][$i], ' [edit]');
    echo anchor('admin/delete/' . $post['id'][$i], ' [delete]</h4>');
    echo '<p>' . $post['summary'][$i] . '</p>';
    echo '</div>';
}