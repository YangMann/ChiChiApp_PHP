<?php
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>
<div class="fm-wrapper">
    <?php echo form_open($this->uri->uri_sdiving()); ?>
    <div>
        <div>
            <div><?php echo form_label('密码', $password['id']); ?></div>
            <div><?php echo form_password($password); ?></div>
            <div style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>
        </div>
        <div>
            <div><?php echo form_label('新邮箱地址', $email['id']); ?></div>
            <div><?php echo form_input($email); ?></div>
            <div style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
        </div>
    </div>
</div>
<?php echo form_submit('change', '发送确认邮件'); ?>
<?php echo form_close(); ?>