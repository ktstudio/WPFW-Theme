<?php

/**
 * Jednoduchý výpis cesty stránek pro sidebar
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_FW_Breadcrumb_Pages_Widget extends KT_FW_Title_Widget_Base {

    public function __construct() {
        parent::__construct("KT_FW_Breadcrumb_Pages_Widget", __("Breadcrumb stránek", KT_DOMAIN), __("Breadcrumb stránek do vlastních sidebarů.", KT_DOMAIN));
    }

    public function widget($args, $instance) {
        extract($args);
        $post = get_post();
        if (kt_not_isset_or_empty($post) || $post->post_type !== KT_WP_PAGE_KEY) {
            return;
        }
        $title = trim($instance[self::TITLE]);
        kt_the_tabs_indent(0, "<div class=\"widget widget_nav_menu\">");
        if (kt_isset_and_not_empty($title)) {
            kt_the_tabs_indent(1, "<div class=\"title\">$title</div>");
        }
        kt_the_tabs_indent(1, "<div class=\"menu-dokumentace-container\">");
        kt_the_tabs_indent(2, "<ul class=\"menu\">");

        $pageTitle = __("Home", KT_DOMAIN);
        $pagePermalink = get_home_url();
        kt_the_tabs_indent(3, "<li class=\"menu-item menu-item-type-post_type menu-item-object-page\" title=\"$pageTitle\">");
        kt_the_tabs_indent(4, "<a href=\"$pagePermalink\">");
        kt_the_tabs_indent(5, "$pageTitle");
        kt_the_tabs_indent(4, "</a>");
        if (!is_home()) {
            $treeBranch = $this->getTreeBranch(array(), $post);
            $this->printTreeBranch(array_reverse($treeBranch), 5);
        }
        kt_the_tabs_indent(3, "</li>");

        kt_the_tabs_indent(2, "</ul>");
        kt_the_tabs_indent(1, "</div>");
        kt_the_tabs_indent(0, "</div>");
    }

    private function getTreeBranch(array $treeBranch, WP_Post $currentPage) {
        array_push($treeBranch, $currentPage);
        $currentPageParentId = $currentPage->post_parent;
        if ($currentPageParentId > 0) {
            return $this->getTreeBranch($treeBranch, get_post($currentPageParentId));
        }
        return $treeBranch;
    }

    private function printTreeBranch(array $treeBranch, $tabsCount) {
        if (count($treeBranch) > 0) {
            $page = $treeBranch[0];
            $pageTitle = get_the_title($page);
            $pagePermalink = get_the_permalink($page);
            kt_the_tabs_indent($tabsCount + 0, "<ul class=\"menu\">");
            kt_the_tabs_indent($tabsCount + 1, "<li class=\"menu-item menu-item-type-post_type menu-item-object-page\" title=\"$pageTitle\">");
            kt_the_tabs_indent($tabsCount + 2, "<a href=\"$pagePermalink\">");
            kt_the_tabs_indent($tabsCount + 3, "$pageTitle");
            kt_the_tabs_indent($tabsCount + 2, "</a>");
            $treeBranch = kt_array_remove($treeBranch, $page);
            $this->printTreeBranch($treeBranch, $tabsCount + 3);
            kt_the_tabs_indent($tabsCount + 1, "</li>");
            kt_the_tabs_indent($tabsCount + 0, "</ul>");
        }
    }

}
