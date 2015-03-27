<?php $presenter = new KT_WP_FW_Components_Page_Presenter($post); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="entryContent">
                <h1 id="postTitle"><?php echo $presenter->getModel()->getTitle(); ?></h1>
                <?php
                echo $presenter->getExcerpt();
                echo $presenter->getModel()->getContent();
                ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
