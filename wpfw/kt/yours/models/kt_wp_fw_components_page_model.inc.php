<?php

class KT_WP_FW_Components_Page_Model extends KT_WP_Post_Base_Model {

    private $componentsCollection = array();

    public function __construct(WP_Post $post = null, $postId = null) {
        parent::__construct($post, $postId);
        $this->componentsCollectionInit();
    }

    // --- gettery ------------

    public function getComponentsCollection() {
        return $this->componentsCollection;
    }

    // --- settery ---------

    private function setComponentsCollection(array $componentsCollection) {
        $this->componentsCollection = $componentsCollection;
    }

    // --- veřejné funkce ---------

    public function hasComponents() {
        if (kt_isset_and_not_empty($this->getComponentsCollection())) {
            return true;
        }

        return false;
    }

    // --- privátní funkce ------------

    private function componentsCollectionInit() {

        $args = array(
            "post_type" => KT_WP_PAGE_KEY,
            "posts_per_page" => -1,
            "post_status" => "publish",
            "post_parent" => $this->getPostId(),
            "orderby" => "menu_order",
            "order" => "ASC"
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $this->setComponentsCollection($query->posts);
        }

        return $this;
    }

}
