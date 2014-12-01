<?php

class KT_WP_FW_Theme_Config {

    const FORM_PREFIX = "kt-wp-fw-theme";
    const WELCOME_PREFIX = "kt-wp-fw-theme-welcome";
    const HOME_PREFIX = "kt-wp-fw-theme-home";
    const OFFER_PREFIX = "kt-wp-fw-theme-offer";
    const TEST_PREFIX = "kt-wp-fw-theme-test";
    const INDEX_PAGE = "kt-wp-fw-theme-welcome-index-page";
    const HOME_TITLE = "kt-wp-fw-theme-home-title";
    const HOME_CONTENT = "kt-wp-fw-theme-home-content";
    const HOME_PAGE = "kt-wp-fw-theme-home-page";
    const OFFER_BOX_1_TITLE = "kt-wp-fw-theme-offer-box-1-title";
    const OFFER_BOX_1_CONTENT = "kt-wp-fw-theme-offer-box-1-content";
    const OFFER_BOX_1_PAGE = "kt-wp-fw-theme-offer-box-1-page";
    const OFFER_BOX_2_TITLE = "kt-wp-fw-theme-offer-box-2-title";
    const OFFER_BOX_2_CONTENT = "kt-wp-fw-theme-offer-box-2-content";
    const OFFER_BOX_2_PAGE = "kt-wp-fw-theme-offer-box-2-page";
    const OFFER_BOX_3_TITLE = "kt-wp-fw-theme-offer-box-3-title";
    const OFFER_BOX_3_CONTENT = "kt-wp-fw-theme-offer-box-3-content";
    const OFFER_BOX_3_PAGE = "kt-wp-fw-theme-offer-box-3-page";
    const OFFER_BOX_4_TITLE = "kt-wp-fw-theme-offer-box-4-title";
    const OFFER_BOX_4_CONTENT = "kt-wp-fw-theme-offer-box-4-content";
    const OFFER_BOX_4_PAGE = "kt-wp-fw-theme-offer-box-4-page";
    const OFFER_MORE_TEXT = "kt-wp-fw-theme-offer-more-text";
    const DOCUMENTATION_PAGE = "kt-wp-fw-theme-offer-documentation-page";
    const TEST_TEXT = "kt-wp-fw-theme-test-text";
    const TEST_TEXT_NUMBER = "kt-wp-fw-theme-test-text-number";
    const TEST_TEXT_DATE = "kt-wp-fw-theme-test-text-date";
    const TEST_TEXT_PASSWORD = "kt-wp-fw-theme-test-text-password";
    const TEST_TEXT_EMAIL = "kt-wp-fw-theme-test-text-email";
    const TEST_TEXT_URL = "kt-wp-fw-theme-test-text-url";
    const TEST_TEXTAREA = "kt-wp-fw-theme-test-textarea";
    const TEST_MEDIA = "kt-wp-fw-theme-test-media";
    const TEST_CHECKBOX = "kt-wp-fw-theme-test-checkbox";
    const TEST_RADIO = "kt-wp-fw-theme-test-radio";
    const TEST_SELECT = "kt-wp-fw-theme-test-select";
    const TEST_SWITCH = "kt-wp-fw-theme-test-switch";
    const TEST_WP_PAGE = "kt-wp-fw-theme-test-wp-page";
    const TEST_WP_CATEGORY = "kt-wp-fw-theme-test-wp-category";
    const TEST_WP_USER = "kt-wp-fw-theme-test-wp-user";

    // --- fieldsets ---------------------------

    public static function getAllConfigFieldsets() {
        return array(
            self::WELCOME_PREFIX => self::getWelcomeConfigFieldset(),
            self::HOME_PREFIX => self::getHomeConfigFieldset(),
            self::OFFER_PREFIX => self::getOfferConfigFieldset(),
            self::TEST_PREFIX => self::getTestConfigFieldset(),
        );
    }

    public static function getWelcomeConfigFieldset() {
        $fieldset = new KT_Form_Fieldset(self::WELCOME_PREFIX, __("Úvod", KT_DOMAIN));
        $fieldset->setPostPrefix(self::WELCOME_PREFIX);

        // WELCOME
        $fieldset->addWpPage(self::INDEX_PAGE, __("Úvodní stránka:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Úvodní text- stránka je povinná položka."));

        return $fieldset;
    }

    public static function getHomeConfigFieldset() {
        $fieldset = new KT_Form_Fieldset(self::HOME_PREFIX, __("Home", KT_DOMAIN));
        $fieldset->setPostPrefix(self::HOME_PREFIX);

        // HOME BANNER
        $fieldset->addText(self::HOME_TITLE, __("Home - titulek:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Home - titulek je povinná položka.", KT_DOMAIN));
        $fieldset->addTextarea(self::HOME_CONTENT, __("Home - obsah:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Home - obsah je povinná položka.", KT_DOMAIN));
        $fieldset->addWpPage(self::HOME_PAGE, __("Home - stránka:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Home - stránka je povinná položka.", KT_DOMAIN));

        return $fieldset;
    }

    public static function getOfferConfigFieldset() {
        $fieldset = new KT_Form_Fieldset(self::OFFER_PREFIX, __("Offer", KT_DOMAIN));
        $fieldset->setPostPrefix(self::OFFER_PREFIX);

        // OFFER MENU      
        $fieldset->addText(self::OFFER_BOX_1_TITLE, __("Nabídka - box 1 - titulek:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - box 1 - titulek je povinná položka.", KT_DOMAIN));
        $fieldset->addTextarea(self::OFFER_BOX_1_CONTENT, __("Nabídka - box 1 - obsah:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - box 1 - obsah je povinná položka.", KT_DOMAIN));
        $fieldset->addWpPage(self::OFFER_BOX_1_PAGE, __("Nabídka - box 1 - stránka:", KT_DOMAIN));
        $fieldset->addText(self::OFFER_BOX_2_TITLE, __("Nabídka - box 2 - titulek:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - box 2 - titulek je povinná položka.", KT_DOMAIN));
        $fieldset->addTextarea(self::OFFER_BOX_2_CONTENT, __("Nabídka - box 2 - obsah:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - box 2 - obsah je povinná položka.", KT_DOMAIN));
        $fieldset->addWpPage(self::OFFER_BOX_2_PAGE, __("Nabídka - box 2 - stránka:", KT_DOMAIN));
        $fieldset->addText(self::OFFER_BOX_3_TITLE, __("Nabídka - box 3 - titulek:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - box 3 - titulek je povinná položka.", KT_DOMAIN));
        $fieldset->addTextarea(self::OFFER_BOX_3_CONTENT, __("Nabídka - box 3 - obsah:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - box 3 - obsah je povinná položka.", KT_DOMAIN));
        $fieldset->addWpPage(self::OFFER_BOX_3_PAGE, __("Nabídka - box 3 - stránka:", KT_DOMAIN));
        $fieldset->addText(self::OFFER_BOX_4_TITLE, __("Nabídka - box 4 - titulek:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - box 4 - titulek je povinná položka.", KT_DOMAIN));
        $fieldset->addTextarea(self::OFFER_BOX_4_CONTENT, __("Nabídka - box 4 - obsah:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - box 4 - obsah je povinná položka.", KT_DOMAIN));
        $fieldset->addWpPage(self::OFFER_BOX_4_PAGE, __("Nabídka - box 4 - stránka:", KT_DOMAIN));
        $fieldset->addTextarea(self::OFFER_MORE_TEXT, __("Nabídka - více:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Nabídka - více je povinná položka.", KT_DOMAIN));
        $fieldset->addWpPage(self::DOCUMENTATION_PAGE, __("Dokumentace - stránka:", KT_DOMAIN))
                ->addRule(KT_Field_Validator::REQUIRED, __("Dokumentace - stránka je povinná položka.", KT_DOMAIN));

        return $fieldset;
    }

    public static function getTestConfigFieldset() {
        $fieldset = new KT_Form_Fieldset(self::TEST_PREFIX, __("Test", KT_DOMAIN));
        $fieldset->setPostPrefix(self::TEST_PREFIX);

        // TEST
        $fieldset->addText(self::TEST_TEXT, __("Text:", KT_DOMAIN))
                ->setValue("test");
        $fieldset->addText(self::TEST_TEXT_NUMBER, __("Text - number:", KT_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_NUMBER)
                ->setValue(1234);
        $fieldset->addText(self::TEST_TEXT_DATE, __("Text - date:", KT_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_DATE)
                ->setValue("29.11.2014");
        $fieldset->addText(self::TEST_TEXT_PASSWORD, __("Text - password:", KT_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_PASSWORD)
                ->setValue("1234");
        $fieldset->addText(self::TEST_TEXT_EMAIL, __("Text - email:", KT_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_EMAIL)
                ->setValue("info@ktstudio.cz");
        $fieldset->addText(self::TEST_TEXT_URL, __("Text - URL:", KT_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_URL)
                ->setValue("http://www.kstudio.cz/");
        $fieldset->addTextarea(self::TEST_TEXTAREA, __("Textarea:", KT_DOMAIN))
                ->setValue("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer laoreet auctor diam eu molestie.");
        $fieldset->addMedia(self::TEST_MEDIA, __("Media:", KT_DOMAIN));
        $fieldset->addCheckbox(self::TEST_CHECKBOX, __("Checkbox:", KT_DOMAIN))
                ->setOptionsData(array(
                    true => "Ano",
                    false => "Ne",
        ));
        $fieldset->addRadio(self::TEST_RADIO, __("Radio:", KT_DOMAIN))
                ->setOptionsData(array(
                    true => "Ano",
                    false => "Ne",
        ));
        $simpleDataManager = new KT_Simple_Data_Manager();
        $simpleDataManager->setData(array(
            true => "Ano",
            false => "Ne",
        ));
        $fieldset->addSelect(self::TEST_SELECT, __("Select:", KT_DOMAIN))
                ->setDataManager($simpleDataManager);
        $fieldset->addSwitch(self::TEST_SWITCH, __("Switch:", KT_DOMAIN));
        $fieldset->addWpPage(self::TEST_WP_PAGE, __("WP Page:", KT_DOMAIN));
        $fieldset->addWpCategory(self::TEST_WP_CATEGORY, __("WP Category:", KT_DOMAIN));
        $fieldset->addWpUsers(self::TEST_WP_USER, __("WP User:", KT_DOMAIN));

        return $fieldset;
    }

}
