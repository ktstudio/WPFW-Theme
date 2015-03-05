<?php
$postModel = new KT_WP_Post_Base_Model($post);
$postTile = $postModel->getTitle();
$postTitleAttribute = $postModel->getTitleAttribute();
$postPermalink = $postModel->getPermalink();
$postExcerpt = $postModel->getExcerpt();
?>

<div>
    <div>
        <h3><a href="<?php echo $postPermalink; ?>" title="<?php echo $postTitleAttribute; ?>"><?php echo $postTile; ?></a></h3>
        <p><small>Publikováno: <?php echo $postModel->getPublishDate(); ?></small></p>
    </div>
    <p><?php echo $postExcerpt; ?></p>
</div>
