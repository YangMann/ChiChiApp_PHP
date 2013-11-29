<div class="g-r fw-wrapper">
    <?php include 'application/views/templates/cover.php' ?>
    <section class="u-2-3 wd-wrapper" tabindex="-1">
        <div class="wd-main" id="wd-main">
            <h1>吃吃督察留言板</h1>
            <h4>你可以在这里写下对食堂的意见或建议，吃吃会在第一时间向学校后保处进行反映并处理~</h4>
            <?=form_open('/message/result');?>
            <textarea class="msg-comment" name="message_content" rows="10" ></textarea><br>
            <input class="msg-button" type="submit" value="提交"/>
            <?=form_close();?>
        </div>
    </section>
</div>