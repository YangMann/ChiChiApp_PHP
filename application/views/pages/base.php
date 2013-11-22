<div class="g-r fw-wrapper">
    <?php include 'application/views/templates/cover.php' ?>
    <section class="u-2-3 wd-wrapper" tabindex="-1">
        <div class="wd-main" id="wd-main">
        </div>
    </section>
</div>
<script>
    //$(document).ready()
    $.get("<?php echo $page ?>", function(result){
        $(".wd-main").html(result);
    });
</script>