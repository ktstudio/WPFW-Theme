<?php global $ktWpFwThemeModel; ?>

<div id="headerBanner">
    <div class="container">
        <h1><?php echo $ktWpFwThemeModel->getHomeTitle(); ?></h1>
        <p><?php echo $ktWpFwThemeModel->getHomeContent(); ?></p>
        <a href="<?php echo $ktWpFwThemeModel->getHomePagePermalink(); ?>" title="<?php _e("Začněte nyní!", KT_DOMAIN); ?>"><?php _e("Začněte nyní!", KT_DOMAIN); ?></a>
    </div>
</div>
