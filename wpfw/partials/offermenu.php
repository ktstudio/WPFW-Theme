<?php global $ktWpFwThemeModel; ?>

<div id="offerMenu" class="container">
    <h2><?php _e("Postupy a návyky, které už nedáte z ruky!", KT_DOMAIN); ?></h2>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="gray">
                <?php $ktWpFwThemeModel->theOfferBox1Header(); ?>
                <p><?php echo $ktWpFwThemeModel->getOfferBox1Content(); ?></p>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6">
            <div>
                <?php $ktWpFwThemeModel->theOfferBox2Header(); ?>
                <p><?php echo $ktWpFwThemeModel->getOfferBox2Content(); ?></p>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="gray">
                <?php $ktWpFwThemeModel->theOfferBox3Header(); ?>
                <p><?php echo $ktWpFwThemeModel->getOfferBox3Content(); ?></p>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6">
            <div>
                <?php $ktWpFwThemeModel->theOfferBox4Header(); ?>
                <p><?php echo $ktWpFwThemeModel->getOfferBox4Content(); ?></p>
            </div>
        </div>
    </div>

    <div id="offerAdditionalText">
        <div><?php _e("a mnohem více...", KT_DOMAIN); ?></div>
        <p><?php echo $ktWpFwThemeModel->getOfferMoreText(); ?></p>
        <a href="<?php echo $ktWpFwThemeModel->getDocumentationPagePermalink(); ?>" title="<?php _e("Dokumentace", KT_DOMAIN); ?>"><?php _e("Dokumentace", KT_DOMAIN); ?></a>
    </div>

</div>
