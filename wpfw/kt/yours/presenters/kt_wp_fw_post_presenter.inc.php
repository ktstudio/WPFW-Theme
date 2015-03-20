<?php

/**
 * Základní presenter pro výpis obsahu pro detail článku WP FW
 * 
 * @author Martin Hlaváč, Tomáš Kocifaj
 * @link http://www.ktstudio.cz
 */
class KT_WP_FW_Post_Presenter extends KT_WP_Post_Base_Presenter {

    private $similarPosts;

    public function __construct(WP_Post $post) {
        parent::__construct($post);
    }

    // --- getry & setry ---------------------------

    /**
     * Vrátí WP_Query s podobnými příspěvky pokud jsou k dispizici
     * 
     * @author Martin Hlaváč
     * @link http://www.ktstudio.cz
     * 
     * @return WP_Query
     */
    public function getSimilarPosts() {
        $similarPosts = $this->similarPosts;
        if (KT::issetAndNotEmpty($similarPosts)) {
            return $similarPosts;
        }
        return $this->initSimilarPosts();
    }

    // --- veřejné funkce ---------------------------

    /**
     * Ověření, zda jsou podobné příspěvky k dispizici
     * 
     * @author Martin Hlaváč
     * @link http://www.ktstudio.cz
     * 
     * @return bool
     */
    public function isSimilarPosts() {
        $similarPosts = $this->getSimilarPosts();
        return KT::issetAndNotEmpty($similarPosts) && $similarPosts->have_posts();
    }

    /**
     * Vrátí podobné příspěvky pokud jsou k dispizici
     * 
     * @author Martin Hlaváč
     * @link http://www.ktstudio.cz
     * 
     * @param type $withTitle
     */
    public function theSimilarPosts($withTitle = true) {
        if ($this->isSimilarPosts()) {
            if ($withTitle) {
                $title = __("Podobné články", KT_DOMAIN);
                echo "<h2 id=\"similar-posts\">$title</h2>";
            }
            $similarPosts = $this->getSimilarPosts();
            while ($similarPosts->have_posts()) : $similarPosts->the_post();
                get_template_part("loops/loop", KT_WP_POST_KEY . "-similar");
            endwhile;
            wp_reset_postdata();
        }
    }

    /**
     * Vrátí galleri všech obrázků, které jsou u příspěvku nahrané a zhotoví z nich
     * html s celou galerií.
     * 
     * @author Tomáš Kocifaj
     * @link http://www.ktstudio.cz 
     * 
     * @return string
     */
    public function getGallery() {
        $html = "";

        if (!$this->getModel()->getGallery()->hasFiles()) {
            return $html;
        }

        $html .= "<div id=\"postGallery\" class=\"clearfix imageBox gallery\">";
        foreach ($this->getModel()->getGallery()->getFiles() as $attachment) {
            $imageDataLarge = wp_get_attachment_image_src($attachment->ID, KT_WP_IMAGE_SIZE_LARGE);
            $imageDataThumbnail = wp_get_attachment_image_src($attachment->ID);
            $html .= "<a href=\"{$imageDataLarge[0]}\" title=\"{$attachment->post_title}\" class=\"fbx-link\">";
            $html .= "<img src=\"{$imageDataThumbnail[0]}\" alt=\"{$attachment->post_title}\" class=\"img-responsive\"><span></span>";
            $html .= "</a>";
        }
        $html .= "</div>";

        return $html;
    }

    // --- privátní funkce ---------------------------

    /**
     * Inicializace podobných příspěvků (dle požadovaných parametrů)
     * 
     * @author Martin Hlaváč
     * @link http://www.ktstudio.cz
     * 
     * @return WP_Query
     */
    private function initSimilarPosts() {
        return $this->similarPosts = new WP_Query(array(
            "post_type" => KT_WP_POST_KEY,
            "post_status" => "publish",
            "post_parent" => 0,
            "post__not_in" => array($this->getModel()->getPostId()),
            "category__in" => $this->getModel()->getTerms(KT_WP_CATEGORY_KEY, array("fields" => "ids")),
            "posts_per_page" => 4,
            "orderby" => "rand",
        ));
    }

}
