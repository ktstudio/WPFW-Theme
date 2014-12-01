<?php

class KT_WP_FW_Sidebar_Presenter {

    private $currentSidebarName;

    public function __construct() {
        $this->initSidebar();
    }

    // --- gettery ---------

    /**
     * @return string
     */
    public function getCurrentSidebarName() {
        return $this->currentSidebarName;
    }

    // --- settery ---------

    public function setCurrentSidebarName($currentSidebarName) {
        $this->currentSidebarName = $currentSidebarName;
        return $this;
    }

    // --- veřejné funkce ---------

    public function render() {
        if (is_active_sidebar($this->getCurrentSidebarName())) {
            dynamic_sidebar($this->getCurrentSidebarName());
        }
    }

    // --- privátní funkce ---------

    private function initSidebar() {
        if (is_home() || is_search() || is_single() || is_category()) {
            $this->currentSidebarName = KT_WP_FW_SIDEBAR_INDEX;
        } else {
            $this->currentSidebarName = KT_WP_FW_SIDEBAR_DEFAULT;
        }
        return $this;
    }

}
