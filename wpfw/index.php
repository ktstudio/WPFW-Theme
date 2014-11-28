<?php

global $ktWpFwThemeModel;

get_header();

if (have_posts()) {
    get_template_part("contents/content", "index");
} else {
    get_template_part("contents/content", "error");
}

get_footer();
