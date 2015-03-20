<?php $postModel = new KT_WP_Post_Base_Model($post); ?>

<div>
    <div>
        <h3><a href="<?php echo $postModel->getPermalink(); ?>" title="<?php echo $postModel->getTitleAttribute(); ?>"><?php echo $postModel->getTitle(); ?></a></h3>
        <p><small><?php echo sprintf(__("Publikováno: %s", KT_DOMAIN), $postModel->getPublishDate()); ?></small></p>
    </div>
    <p><?php echo $postModel->getExcerpt(); ?></p>
</div>
