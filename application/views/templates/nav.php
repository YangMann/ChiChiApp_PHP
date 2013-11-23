<ul id="nv-menu" class="nv-menu-main">
    <li class="nv-trigger">
        <a class="nv-icon nv-icon-menu"><span>菜单</span></a>
        <nav class="nv-menu-wrapper">
            <div class="nv-scroller">
                <ul class="nv-menu">
                    <li class="nv-search-item">
                        <input placeholder="Search" type="search" class="nv-search">
                        <a class="nv-icon nv-icon-search"><span>搜索</span></a>
                    </li>
                    <!--<li>
                        <a class="nv-icon nv-icon-earth">jAccount登陆</a>
                    </li>-->
                    <?php
                    if ($is_logged_in) {
                        ?>
                        <li>
                            <a class="nv-icon nv-icon-earth"><?= $username ?></a>
                        </li><?php
                    }
                    ?>
                    <li>
                        <a class="nv-icon nv-icon-article" data-redir="home" data-redir-target="wd-main"
                           href="/home">主页</a>
                    </li>
                    <li>
                        <a class="nv-icon nv-icon-archive" data-redir="blog" data-redir-target="wd-main" href="/blog">吃货日志</a>
                    </li>
                    <?php
                    if ($is_logged_in) {
                    ?>
                    <li>
                        <a class="nv-icon nv-icon-earth" data-redir="adventure/questions/1" data-redir-target="wd-main"
                           href="/adventure/questions/1">吃吃的大冒险</a>
                    </li>
                    <?php
                    }
                    ?>
                    <!--<li>
                        <a class="nv-icon nv-icon-download">包含二级菜单</a>
                        <ul class="nv-sub-menu">
                            <li><a class="nv-icon nv-icon-illustrator">二级菜单</a></li>
                            <li><a class="nv-icon nv-icon-photoshop">二级菜单</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nv-icon nv-icon-cog">设置</a>
                    </li>
                    <li>
                        <a class="nv-icon nv-icon-help">帮助</a>
                    </li>-->
                    <?php
                    if ($is_logged_in) {
                        ?>
                        <li>
                        <a class="nv-icon nv-icon-earth" data-redir="auth/logout" data-redir-target="wd-main" href="/auth/logout">登出</a>
                        </li><?php
                    } ?>
                </ul>
            </div>
        </nav>
    </li>
</ul>
<!-- end of ul.nv-menu-main -->