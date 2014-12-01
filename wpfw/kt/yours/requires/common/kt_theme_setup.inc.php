<?php

$config = new KT_WP_Configurator();

$config->addThemeSupport("post-thumbnails", array("post"));

$config->setExcerptLength(20)->setExcerptText("...");

$config->pageRemover()
        ->removeTools()
        ->removeComments()
        ->removeSubPage("themes.php", "theme-editor.php");

// --- sidebars ---------------------------

$config->addSidebar(KT_WP_FW_SIDEBAR_DEFAULT)
        ->setName(__("Default", KT_DOMAIN))
        ->setDescription(__("Výchozí sidebar.", KT_DOMAIN))
        ->setBeforeWidget('<div id="%1$s" class="widget %2$s">')
        ->setAfterWidget("</div>")
        ->setBeforeTitle("<div class=\"title\">")
        ->setAfterTitle("</div>");
$config->addSidebar(KT_WP_FW_SIDEBAR_INDEX)
        ->setName(__("Index", KT_DOMAIN))
        ->setDescription(__("Sidebar na úvodní stránce.", KT_DOMAIN))
        ->setBeforeWidget('<div id="%1$s" class="widget %2$s">')
        ->setAfterWidget("</div>")
        ->setBeforeTitle("<div class=\"title\">")
        ->setAfterTitle("</div>");

// --- styly ---------------------------

$config->assetsConfigurator()->addStyle(KT_JQUERY_UI_STYLE)->setEnqueue();
$config->assetsConfigurator()->addStyle("kt-rc-bootstrap-style", KT_WP_FW_CSS_URL . "/bootstrap.min.css")->setEnqueue();
$config->assetsConfigurator()->addStyle("kt-rc-style", get_template_directory_uri() . "/style.css")->setEnqueue();

// --- scripty ---------------------------

$config->assetsConfigurator()
        ->addScript(KT_WP_JQUERY_SCRIPT)
        ->setEnqueue();
$config->assetsConfigurator()
        ->addScript("kt-rc-bootstrap-script", KT_WP_FW_JS_URL . "/bootstrap.min.js", array(KT_WP_JQUERY_SCRIPT))
        ->setEnqueue();

// --- fonty ---------------------------

$config->assetsConfigurator()->addStyle("kt-rc-jockeone-font", "http://fonts.googleapis.com/css?family=Jockey+One&subset=latin,latin-ext")->setEnqueue();
$config->assetsConfigurator()->addStyle("kt-rc-opensans-font", "http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300&subset=latin,cyrillic-ext,latin-ext")->setEnqueue();

// --- menu ---------------------------

$config->addWpMenu(KT_WP_FW_NAVIGATION_MAIN_MENU, __("Hlavní menu", KT_DOMAIN));


// --- widgety ---------------------------

$config->widgetRemover()->removeArchivesWidget()
        ->removeCalendarWidget()
        ->removeRecentCommentsWidget()
        ->removeRssWidget()
        ->removeMetaWidget()
        ->removeSearchWidget();
$config->addWidget("KT_FW_Children_Pages_Widget")
        ->addWidget("KT_FW_Parent_Children_Pages_Widget");

// --- incializace ---------------------------

$config->initialize();
