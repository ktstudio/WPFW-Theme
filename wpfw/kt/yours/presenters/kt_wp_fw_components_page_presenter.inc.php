<?php

class KT_WP_FW_Components_Page_Presenter extends KT_WP_Post_Base_Presenter {

    public function __construct($post) {
        $model = new KT_WP_FW_Components_Page_Model($post);
        $this->setModel($model);
    }

    // --- gettery ------------

    /**
     * @return \KT_WP_FW_Components_Page_Model
     */
    public function getModel() {
        return parent::getModel();
    }

    // --- veřejné funkce ------------

    public function renderComponents() {
        $components = $this->getModel()->getComponentsCollection();

        if ($this->getModel()->hasComponents()) {
            foreach ($components as $component) {
                include(locate_template("loops/loop-page-component.php"));
            }
        }
    }

}
