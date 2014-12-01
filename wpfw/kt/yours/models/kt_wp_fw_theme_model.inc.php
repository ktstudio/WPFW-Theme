<?php

class KT_WP_FW_Theme_Model extends KT_WP_Options_Base_Model {

    function __construct() {
        parent::__construct(KT_WP_FW_Theme_Config::FORM_PREFIX);
    }

    // --- home banner ---------------------------

    public function getHomeTitle() {
        return $this->getOption(KT_WP_FW_Theme_Config::HOME_TITLE);
    }

    public function getHomeContent() {
        return $this->getOption(KT_WP_FW_Theme_Config::HOME_CONTENT);
    }

    public function getHomePageId() {
        return $this->getOption(KT_WP_FW_Theme_Config::HOME_PAGE);
    }

    public function getHomePagePermalink() {
        $id = kt_try_get_int($this->getHomePageId());
        if (kt_is_id_format($id)) {
            return get_permalink($id);
        }
        return null;
    }

    // --- offer menu ---------------------------

    public function getOfferBox1Title() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_1_TITLE);
    }

    public function getOfferBox1Content() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_1_CONTENT);
    }

    public function getOfferBox1PageId() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_1_PAGE);
    }

    public function getOfferBox1PagePermalink() {
        $id = kt_try_get_int($this->getOfferBox1PageId());
        if (kt_is_id_format($id)) {
            return get_permalink($id);
        }
        return null;
    }

    public function theOfferBox1Header() {
        self::theHeaderLink($this->getOfferBox1Title(), $this->getOfferBox1PagePermalink());
    }

    public function getOfferBox2Title() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_2_TITLE);
    }

    public function getOfferBox2Content() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_2_CONTENT);
    }

    public function getOfferBox2PageId() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_2_PAGE);
    }

    public function getOfferBox2PagePermalink() {
        $id = kt_try_get_int($this->getOfferBox2PageId());
        if (kt_is_id_format($id)) {
            return get_permalink($id);
        }
        return null;
    }

    public function theOfferBox2Header() {
        self::theHeaderLink($this->getOfferBox2Title(), $this->getOfferBox2PagePermalink());
    }

    public function getOfferBox3Title() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_3_TITLE);
    }

    public function getOfferBox3Content() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_3_CONTENT);
    }

    public function getOfferBox3PageId() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_3_PAGE);
    }

    public function getOfferBox3PagePermalink() {
        $id = kt_try_get_int($this->getOfferBox3PageId());
        if (kt_is_id_format($id)) {
            return get_permalink($id);
        }
        return null;
    }

    public function theOfferBox3Header() {
        self::theHeaderLink($this->getOfferBox3Title(), $this->getOfferBox3PagePermalink());
    }

    public function getOfferBox4Title() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_4_TITLE);
    }

    public function getOfferBox4Content() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_4_CONTENT);
    }

    public function getOfferBox4PageId() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_BOX_4_PAGE);
    }

    public function getOfferBox4PagePermalink() {
        $id = kt_try_get_int($this->getOfferBox4PageId());
        if (kt_is_id_format($id)) {
            return get_permalink($id);
        }
        return null;
    }

    public function theOfferBox4Header() {
        self::theHeaderLink($this->getOfferBox4Title(), $this->getOfferBox4PagePermalink());
    }

    public function getOfferMoreText() {
        return $this->getOption(KT_WP_FW_Theme_Config::OFFER_MORE_TEXT);
    }

    public function getDocumentationPageId() {
        return $this->getOption(KT_WP_FW_Theme_Config::DOCUMENTATION_PAGE);
    }

    public function getDocumentationPagePermalink() {
        $id = kt_try_get_int($this->getDocumentationPageId());
        if (kt_is_id_format($id)) {
            return get_permalink($id);
        }
        return null;
    }

    public function getIndexPageId() {
        return $this->getOption(KT_WP_FW_Theme_Config::INDEX_PAGE);
    }

    public function getIndexPage() {
        $id = kt_try_get_int($this->getIndexPageId());
        if (kt_is_id_format($id)) {
            $page = get_post($id);
            return new KT_WP_Post_Base_Model($page);
        }
        return null;
    }

    // --- helpers ---------------------------

    public static function theHeaderLink($title, $url = null) {
        if (kt_isset_and_not_empty($url)) {
            echo "<h3><a href=\"$url\" title=\"$title\">$title</a></h3>";
        } else {
            echo "<h3>$title</h3>";
        }
    }

}
