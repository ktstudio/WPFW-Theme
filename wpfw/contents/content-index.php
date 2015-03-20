<?php
get_template_part("partials/headerbanner");
get_template_part("partials/offermenu");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="entryContent">
                <?php
                $indexPage = KT_WP_FW::getThemeModel()->getIndexPage();
                if (kt_isset_and_not_empty($indexPage)) {
                    echo $indexPage->getContent();
                }
                ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
