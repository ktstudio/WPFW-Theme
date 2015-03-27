<?php

/**
 * Jednoduchý výpis dceřiných stránek pro sidebar
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_WP_FW_Children_Pages_Widget extends KT_WP_FW_Pages_Widget_Base {

    public function __construct() {
        parent::__construct("KT_FW_Children_Pages_Widget", __("Dceřiné stránky", KT_DOMAIN), __("Dceřiné stránky do vlastních sidebarů.", KT_DOMAIN));
    }

    protected function getPages(WP_Post $page) {
        $pageId = $page->ID;
        $wpQuery = new WP_Query();
        $pages = $wpQuery->query(array(
            "post_type" => KT_WP_PAGE_KEY,
            "post_parent" => $pageId,
            "orderby" => "title",
            "order" => "ASC",
        ));
        return $pages;
    }

}
