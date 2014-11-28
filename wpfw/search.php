<?php
global $ktWpFwThemeModel;

get_header();
?>
<div id="searchLayout" class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="entryContent">
                <h1><?php _e("Výsledky vyhledávání", KT_DOMAIN); ?></h1>
                <div class="serachingText"><?php _e("pro:", KT_DOMAIN); ?> <?php echo get_search_query(); ?></div>
                <hr />
                <?php
                while (have_posts()) : the_post();
                    get_template_part("loops/loop", "search");
                endwhile;
                ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
