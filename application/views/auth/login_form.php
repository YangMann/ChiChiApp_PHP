<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'value' => set_value('login'),
    'maxlength' => 80,
    'size' => 30,
);
if ($login_by_username AND $login_by_email) {
    $login_label = '邮箱或用户名';
} else if ($login_by_username) {
    $login_label = '用户名';
} else {
    $login_label = '邮箱';
}
$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 30,
);
$remember = array(
    'name' => 'remember',
    'id' => 'remember',
    'value' => 1,
    'checked' => set_value('remember'),
    'style' => 'margin:0;padding:0',
);
$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'maxlength' => 8,
);
?>
<div class="fm-wrapper fm-login g-r">
    <?php echo form_open($this->uri->uri_string()); ?>
    <div class="u-1">
        <legend>登陆交大吃吃</legend>
    </div>
    <div class="fm-group g-r">

        <div class="u-1-4">
            <?php echo form_label($login_label, $login['id']); ?>
        </div>
        <div class="u-3-4">
            <?php echo form_input($login); ?>
        </div>
        <span
            style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?></span>
    </div>
    <div class="fm-group g-r">
        <div class="u-1-4">
            <?php echo form_label('密码', $password['id']); ?>
        </div>
        <div class="u-3-4">
            <?php echo form_password($password); ?>
        </div>
        <span
            style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></span>
    </div>

    <?php if ($show_captcha) {
        if ($use_recaptcha) {
            ?>
            <div>
                <div>
                    <div id="recaptcha_image"></div>
                </div>
                <div>
                    <a href="javascript:Recaptcha.reload()">刷新验证码</a>

                    <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">音频验证码</a>
                    </div>
                    <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">图片验证码</a>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div class="recaptcha_only_if_image">输入看到的单词</div>
                    <div class="recaptcha_only_if_audio">输入听到的数字</div>
                </div>
                <div><input type="text" id="recaptcha_response_field" name="recaptcha_response_field"/></div>
                <div style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></div>
                <?php echo $recaptcha_html; ?>
            </div>
        <?php } else { ?>
            <div class="fm-group g-r">
                <div class="u-1-4">
                    <label>验证码</label>
                </div>
                <div class="u-3-4">
                    <?php echo $captcha_html; ?>
                </div>
            </div>
            <div class="fm-group g-r">
                <div class="u-1-4"><?php echo form_label('输入图中文字', $captcha['id']); ?></div>
                <div class="u-3-4"><?php echo form_input($captcha); ?></div>
                <div style="color: red;"><?php echo form_error($captcha['name']); ?></div>
            </div>
        <?php
        }
    } ?>

    <div class="fm-group g-r">
        <div class="u-1-4">
            <?php echo form_label('记住登陆', $remember['id']); ?>
        </div>
        <div class="u-1-4">
            <?php echo form_checkbox($remember); ?>
        </div>
        <div class="u-1-4">
            <a href="/auth/forgot_password/" data-redir="auth/forgot_password" data-redir-target="wd-main"
               class="fm-label">忘记密码</a>
        </div>
        <?php if ($this->config->item('allow_registration', 'tank_auth')) {
            ?>
            <div class="u-1-4"><a href="/auth/register" data-redir="auth/register" data-redir-target="wd-main"
                                  class="fm-label">注册</a>
            </div>
        <?php
        } ?>
    </div>
    <div class="g-r">
        <div class="u-1-4"></div>
        <div class="u-1-2">
            <button type="submit" name="submit" class="bt bt-block bt-success">登陆</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>