<?php

/**
 * Jednoduchý výpis rodičovských stránek pro sidebar
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_FW_Parent_Children_Pages_Widget extends KT_FW_Pages_Widget_Base {

    public function __construct() {
        parent::__construct("KT_FW_Parent_Children_Pages_Widget", __("Dceřiné stránky rodiče", KT_DOMAIN), __("Dceřiné stránky rodiče do vlastních sidebarů.", KT_DOMAIN));
    }

    protected function getPages(WP_Post $page) {
        $pageId = $page->ID;
        $pageParent = $page->post_parent;
        if ($pageParent > 0) {
            $wpQuery = new WP_Query();
            $pages = $wpQuery->query(array(
                "post_type" => KT_WP_PAGE_KEY,
                "post_parent" => $pageParent,
                "orderby" => "title",
                "order" => "ASC",
                "post__not_in" => array($pageId),
            ));
            return $pages;
        }
        return null;
    }

}
