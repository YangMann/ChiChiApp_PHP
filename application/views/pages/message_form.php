<div class="g-r fw-wrapper">
    <?php include 'application/views/templates/cover.php' ?>
    <section class="u-2-3 wd-wrapper" tabindex="-1">
        <div class="wd-main" id="wd-main">
            <h1>吃吃督察留言板</h1>
            <h4>你可以在这里写下对食堂的意见或建议，吃吃会在第一时间向学校后保处进行反映并处理~</h4>
            <!--留言板-->
            <?=form_open('/message/result');?>
            <textarea class="msg-comment" name="message_content" rows="10" ></textarea><br>
            <input class="msg-button" type="submit" value="提交"/>
            <?=form_close();?>

            <!--处理情况-->
            <div class="msg-decoration"></div>
            <div >
            <?php
            $all_messages = $this->message_model->get_all_messages();
           for($i=sizeof($all_messages)-1;$i>=0;$i--){
               ?>
            <div class="msg-container">
                <div class="msg-container-user"><?php
                    $query = $this->db->query('SELECT * FROM users WHERE id='.$all_messages[$i]['user']);
                    //echo $query->num_rows();
                    foreach($query->result() as $row){
                        echo $row->username;
                    }
                    ?></div>
                <div class="msg-container-time"><?=$all_messages[$i]['time']  ?></div>
                <div class="msg-container-number">#<?=($i+1) ?></div>
                <div class="msg-container-content"><?=$all_messages[$i]['content']  ?></div>
                <?php
                if($all_messages[$i]['feedback']!==null && $all_messages[$i]['feedback']!=="" ){
                ?>
                <div class="msg-container-feedback">吃吃：<?=$all_messages[$i]['feedback'] ?></div>
                <?php
                }
                ?>
            </div>
               <div class="msg-decoration"></div>
           <?php
                }
            ?>
            </div>
        </div>
    </section>
</div>