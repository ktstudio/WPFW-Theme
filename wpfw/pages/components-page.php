<?php
/**
 * Template name: Komponenty
 */
get_header();

if (have_posts()) {
    while (have_posts()) : the_post();
        get_template_part("contents/content-page-components");
    endwhile;
} else {
    get_template_part("contents/content", "error");
}

get_footer();
