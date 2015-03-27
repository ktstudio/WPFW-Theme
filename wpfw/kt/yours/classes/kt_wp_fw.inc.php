<?php

class KT_WP_FW { 

    const CACHE_THEME_MODEL_KEY = "kt-wpfw-cache-theme-model-key";

    private static $themeModel = null;
    
    /**
     * Vrátí model šablony s nastavením
     * 
     * @return \KT_WP_FW_Theme_Model
     */
    public static function getThemeModel() {
        if (KT::issetAndNotEmpty(self::$themeModel)) {
            return self::$themeModel;
        }
        //$cachedModel = wp_cache_get(self::CACHE_THEME_MODEL_KEY, KT_DOMAIN);
        //if (KT::issetAndNotEmpty($cachedModel)) {
        //    return self::$themeModel = $cachedModel;
        //}
        $themeModel = new KT_WP_FW_Theme_Model();
        //$themeModel->getOptions();
        //wp_cache_set(self::CACHE_THEME_MODEL_KEY, $themeModel, KT_DOMAIN, (3600 * 24));
        return self::$themeModel = $themeModel;
    }

}
