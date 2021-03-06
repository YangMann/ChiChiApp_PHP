<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<div class="fm-wrapper fm-register g-r">
    <?php echo form_open($this->uri->uri_string()); ?>
    <div class="u-1">
        <legend>注册</legend>
        <?php if ($use_username) { ?>
        <div class="fm-group g-r">
            <div class="u-1-4"><?php echo form_label('用户名', $username['id']); ?></div>
            <div class="u-3-4"><?php echo form_input($username); ?></div>
            <div style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></div>
        </div>
        <?php } ?>
        <div class="fm-group g-r">
            <div class="u-1-4"><?php echo form_label('邮箱', $email['id']); ?></div>
            <div class="u-3-4"><?php echo form_input($email); ?></div>
            <div style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
        </div>
        <div class="fm-group g-r">
            <div class="u-1-4"><?php echo form_label('密码', $password['id']); ?></div>
            <div class="u-3-4"><?php echo form_password($password); ?></div>
            <div style="color: red;"><?php echo form_error($password['name']); ?></div>
        </div>
        <div class="fm-group g-r">
            <div class="u-1-4"><?php echo form_label('确认密码', $confirm_password['id']); ?></div>
            <div class="u-3-4"><?php echo form_password($confirm_password); ?></div>
            <div style="color: red;"><?php echo form_error($confirm_password['name']); ?></div>
        </div>

        <?php if ($captcha_registration) {
            if ($use_recaptcha) { ?>
        <div>
            <div>
                <div id="recaptcha_image"></div>
            </div>
            <div>
                <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
                <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
                <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
            </div>
        </div>
        <div>
            <div>
                <div class="recaptcha_only_if_image">Enter the words above</div>
                <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
            </div>
            <div><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></div>
            <div style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></div>
            <?php echo $recaptcha_html; ?>
        </div>
        <?php } else { ?>
        <div class="fm-group g-r">
            <div class="u-1-4">
                <label>输入图中文字</label>
            </div>
            <div class="u-3-4">
                <?php echo $captcha_html; ?>
            </div>
        </div>
        <div>
            <div><?php echo form_label('验证码', $captcha['id']); ?></div>
            <div><?php echo form_input($captcha); ?></div>
            <div style="color: red;"><?php echo form_error($captcha['name']); ?></div>
        </div>
        <?php }
        } ?>
    </div>
    <div class="g-r">
        <div class="u-1-4"></div>
        <div class="u-1-2">
            <button type="submit" name="register" class="bt bt-block bt-primary">注册</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
