<?php $singlePresenter = new KT_WP_FW_Post_Presenter($post); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="entryContent">
                <h1 id="postTitle"><?php echo $singlePresenter->getModel()->getTitle(); ?></h1>
                <div class="entryContent">
                    <p>
                        <span><?php echo $singlePresenter->getModel()->getPublishDate(); ?> | <?php echo $singlePresenter->getModel()->getAuthor()->getDisplayName(); ?></span>
                    </p>    
                    <?php echo $singlePresenter->getExcerpt(); ?>
                    <?php echo $singlePresenter->getModel()->getContent(); ?>
                </div>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>