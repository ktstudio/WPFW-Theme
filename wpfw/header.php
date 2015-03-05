<?php
global $ktWpFwThemeModel;
$ktWpFwThemeModel = new KT_WP_FW_Theme_Model();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo("charset"); ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="ktstudio.cz">
        <meta name="robots" content="index,follow" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php bloginfo("name"); ?><?php wp_title("|"); ?></title>
        <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>" />
        <?php wp_head(); ?>
    </head>
    <body>

        <div id="upperMenuWrap">
            <div class="container">
                <div id="upperMenu" class="row">
                    <a href="<?php bloginfo("url"); ?>" title="<?php _e("Wordpress Framework - KTStudio", KT_DOMAIN); ?>"><?php _e("Wordpress Framework - KTStudio", KT_DOMAIN); ?></a>
                    <div class="clearfix">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav"><span><?php _e("Menu", KT_DOMAIN); ?></span></button>
                        <ul id="mainNav" class="navbar-collapse collapse">
                            <?php kt_the_wp_nav_menu(KT_WP_FW_NAVIGATION_MAIN_MENU, 1); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php if( ! is_home()) : ?>
            <div class="container">
                <div class="breadcrumbs">
                    <?php if(function_exists('bcn_display')) { bcn_display(); }?>
                </div>
            </div>
        <?php endif; ?>
