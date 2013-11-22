<aside class="u-1-3 as-cover" data-cover-display="show">
    <div class="as-cover-img"></div>
    <div class="as-cover-img as-cover-img-b transparent"></div>
    <div class="as-cover-body-wrapper">
        <div class="as-cover-body">
            <h1 class="as-cover-title">交大吃吃</h1>

            <p class="as-cover-description">两岸猿声啼不住，轻舟已过万重山</p>

            <?php
            if (!$is_logged_in) {
                ?>

                <div class="as-cover-actions">
                    <a class="bt bt-default" data-redir="auth/login" data-redir-target="wd-main"
                       href="/auth/login">帐号登陆</a>
                    <?php
                    // <a class="bt bt-primary" href="/auth/connect/session/renren">人人登陆</a>
                    ?>
                </div>
            <?php
            } else {
                ?>
                <div class="as-cover-actions">
                    <a class="bt bt-success bt-block" data-redir="adventure/questions/1" data-redir-target="wd-main"
                       href="/adventure/questions/1">吃吃的大冒险</a>
                </div>
            <?php
            }
            ?>

            <footer class="as-cover-annotations">
                <a class="as-cover-name" href="#">韩式石锅拌饭</a>
                <a class="as-cover-building">五餐</a>
                <a class="as-cover-restaurant">韩国餐厅</a>
                <a class="as-cover-copyright">交大吃吃，SJTU</a>
            </footer>
        </div>
    </div>
</aside>
