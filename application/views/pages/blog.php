<div class="g-r fw-wrapper">
    <?php include 'application/views/templates/cover.php' ?>
    <section class="u-2-3 wd-wrapper" tabindex="-1">
        <div class="wd-main" id="wd-main">
            <?php
            if($blogId!==null) { ?>
            <?php    include 'application/views/pages/blog_collections.php'?>
       <?php     }else{
    ?><?php include 'application/views/pages/blog_content.php'  ?>
            <?php
            }
            ?>
        </div>
    </section>
</div>