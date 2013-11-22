<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>
<div class="fm-wrapper">
    <?php echo form_open($this->uri->uri_string()); ?>
    <div>
        <div>
            <div><?php echo form_label('邮箱', $email['id']); ?></div>
            <div><?php echo form_input($email); ?></div>
            <div style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
        </div>
    </div>
</div>
<?php echo form_submit('send', '发送'); ?>
<?php echo form_close(); ?>