<?php

/**
 * Základ pro jednoduché výpisy stránek pro sidebar
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
abstract class KT_FW_Pages_Widget_Base extends KT_Widget_Base {

    const TITLE = "title";

    public function __construct($name, $title, $description) {
        parent::__construct($name, $title, $description);
    }

    public function widget($args, $instance) {
        extract($args);
        $post = get_post();
        if (kt_not_isset_or_empty($post) || $post->post_type !== KT_WP_PAGE_KEY) {
            return;
        }
        $pages = $this->getPages($post);
        if (count($pages) > 0) {
            $title = trim($instance[self::TITLE]) ? : get_the_title($post);
            kt_the_tabs_indent(0, "<div class=\"widget widget_nav_menu\">");
            kt_the_tabs_indent(1, "<div class=\"title\">$title</div>");
            kt_the_tabs_indent(1, "<div class=\"menu-dokumentace-container\">");
            kt_the_tabs_indent(2, "<ul class=\"menu\">");
            foreach ($pages as $page) {
                $pageTitle = get_the_title($page);
                $pagePermalink = get_the_permalink($page);
                kt_the_tabs_indent(3, "<li class=\"menu-item menu-item-type-post_type menu-item-object-page\" title=\"$pageTitle\"><a href=\"$pagePermalink\">$pageTitle</a></li>");
            }
            kt_the_tabs_indent(2, "</ul>");
            kt_the_tabs_indent(1, "</div>");
            kt_the_tabs_indent(0, "</div>");
        }
    }

    public function update($newInstance, $oldInstance) {
        $instance = array();
        $instance[self::TITLE] = strip_tags($newInstance[self::TITLE]);
        return $instance;
    }

    public function form($instance) {
        $titleFieldId = $this->get_field_id(self::TITLE);
        $titleFieldName = $this->get_field_name(self::TITLE);
        ?>
        <p>
            <label for="<?php echo $titleFieldId; ?>"><?php _e("Titulek", KT_DOMAIN); ?>:</label>
            <input type="text" id="<?php echo $titleFieldId; ?>" name="<?php echo $titleFieldName; ?>" value="<?php echo $instance[self::TITLE]; ?>">
        </p>
        <?php
    }

    /**
     * @return array
     */
    protected abstract function getPages(WP_Post $page);
}
