<?php
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
?>
<div class="fm-wrapper">
    <?php echo form_open($this->uri->uri_string()); ?>
    <div>
        <div>
            <div><?php echo form_label('密码', $password['id']); ?></div>
            <div><?php echo form_password($password); ?></div>
            <div style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>
        </div>
    </div>
</div>
<?php echo form_submit('cancel', '删除账户'); ?>
<?php echo form_close(); ?>