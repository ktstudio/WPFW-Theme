<?php
$presenter = new KT_WP_Term_Base_Presenter(get_queried_object());
get_header();
?>
<div id="searchLayout" class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="entryContent">
                <h1><?php echo $presenter->getModel()->getName(); ?></h1>
                <p><?php echo $presenter->getModel()->getDescription(); ?></p>
                <hr />
                <?php
                while (have_posts()) : the_post();
                    get_template_part("loops/loop", "post");
                endwhile;
                ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
