<div class="g-r fw-wrapper">
    <section class="u-1-5">
    </section>
    <section class="u-3-5" tabindex="-1">

        <div class="bl-view-wrapper">
            <?php include 'application/views/templates/blog_single_content.php' ?>
        </div>
    </section>

    <?php include 'application/views/templates/author_left.php' ?>
</div>

<footer class="bl-footer">
    <div class="bl-preview">
        <a href="/blog/<?= $blog_next['id']?>" class="bl-background-size-cover">
            <div class="bl-preview-content">
                <div class="bl-preview-description">
                    Read next
                </div>
                <h3 class="bl-preview-title">
                    <?=$blog_next['title']?>
                </h3>
            </div>
            <img class="bl-header-image-cover" src=<?= $blog_next['feature_img']?>>
        </a>
    </div>
</footer>
