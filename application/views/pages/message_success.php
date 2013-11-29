<div class="g-r fw-wrapper">
    <?php include 'application/views/templates/cover.php' ?>
    <section class="u-2-3 wd-wrapper" tabindex="-1">
        <div class="wd-main" id="wd-main">
            <h1>吃吃督察留言板</h1>
            <?php
            if(!$is_logged_in){
              ?>
                <p>请先进行登录。</p>
           <?php
            }
            else{
            ?>
        <?php
            if($message == "true"){
        ?>
           <p>提交留言成功！</p>
            <a clas="bt bt-default" href="http://chichi.sjtu1896.com">返回主页</a>
            <?php
            }else{
            ?>
            <p>请不要提交空内容！</p>
            <a clas="bt bt-default" href="javascript:history.go(-1);">返回</a>
            <?php
            }}
            ?>
        </div>
    </section>
</div>