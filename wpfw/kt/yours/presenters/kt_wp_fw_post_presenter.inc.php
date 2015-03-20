<?php

class KT_WP_FW_Post_Presenter extends KT_WP_Post_Base_Presenter {

    /**
     * Základní presenter pro výpis obsahu pro detail článku WP FW
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.c>
     * @link http://www.ktstudio.cz
     * 
     * @param WP_Post $post
     */
    public function __construct(WP_Post $post) {
        parent::__construct($post);
    }

    // --- veřejné funkce ------------

    /**
     * Vrátí odkaz a image tag na náhledový obrázek v Large velikosti.
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.c>
     * @link http://www.ktstudio.cz 
     * 
     * @return string
     */
    public function getThumbnailWithSelfLink() {

        $html = "";

        if (!$this->getModel()->hasThumbnail()) {
            return $html;
        }

        $image = $this->getThumbnailImage(KT_WP_IMAGE_SIZE_LARGE, array("class" => "img-responsive", "alt" => $this->getModel()->getTitleAttribute()));
        $linkImage = wp_get_attachment_image_src($this->getModel()->getThumbnailId(), KT_WP_IMAGE_SIZE_LARGE);

        $html .= "<a href=\"{$linkImage[0]}\" class=\"fbx-link\" title=\"{$this->getModel()->getTitleAttribute()}\">";
        $html .= $image;
        $html .= "</a>";

        return $html;
    }

    /**
     * Vrátí galleri všech obrázků, které jsou u příspěvku nahrané a zhotoví z nich
     * html s celou galerií.
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.c>
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

    // --- privátní funkce ------------
}
