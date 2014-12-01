<?php

if (is_admin()) {
    $themeSettings = new KT_Custom_Metaboxes_Subpage("themes.php", __("Nastavení šablony", KT_DOMAIN), __("Nastavení šablony", KT_DOMAIN), "update_core", KT_WP_Configurator::THEME_SETTING_PAGE_SLUG);
    $themeSettings->setRenderSaveButton()->register();

    KT_MetaBox::createMultiple(KT_WP_FW_Theme_Config::getAllConfigFieldsets(), KT_WP_Configurator::getThemeSettingSlug(), KT_MetaBox_Data_Types::OPTIONS);
}
