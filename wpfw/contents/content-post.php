<?php $presenter = new KT_WP_FW_Post_Presenter($post); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="entryContent">
                <h1 id="postTitle"><?php echo $presenter->getModel()->getTitle(); ?></h1>
                <div class="entryContent">
                    <p>
                        <span><?php echo $presenter->getModel()->getPublishDate(); ?> | <?php echo $presenter->getModel()->getAuthor()->getDisplayName(); ?></span>
                    </p>    
                    <?php echo $presenter->getExcerpt(); ?>
                    <?php echo $presenter->getModel()->getContent(); ?>
                </div>
            </div>
            <div id="nextPostNavigation" class="entryContent clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <small>Předchozí článek</small>
                    <?php $presenter->getPreviousPostLink(true); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <small>Další článek</small>
                    <?php $presenter->getNextPostLink(true); ?>
                </div>
            </div>
            <div class="entryContent">
                <?php $presenter->theSimilarPosts(); ?>
            </div>
            <div id="authorBio" class="entryContent">
                <?php echo $presenter->getAuthorBio(true); ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>