<?php $presenter = new KT_WP_Post_Base_Presenter($component); ?>

<div class="col-log-4 col-md-4 col-sm-6">
    <div>
        <h2>
            <a href="<?php echo $presenter->getModel()->getPermalink(); ?>" title="<?php echo $presenter->getModel()->getPermalink(); ?>">
                <?php echo $presenter->getModel()->getTitle(); ?>
            </a>
        </h2>
        <?php echo $presenter->getModel()->getExcerpt(); ?>
    </div>
</div>