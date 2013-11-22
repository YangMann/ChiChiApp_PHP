<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = '邮箱或用户名';
} else {
	$login_label = '邮箱';
}
?>
<div class="fm-wrapper">
    <?php echo form_open($this->uri->uri_sdiving()); ?>
    <div>
        <div>
            <div><?php echo form_label($login_label, $login['id']); ?></div>
            <div><?php echo form_input($login); ?></div>
            <div style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></div>
        </div>
    </div>
</div>
<?php echo form_submit('reset', '重置密码'); ?>
<?php echo form_close(); ?>