<?php

/**
 * Základ pro jednoduché widgety, kde se zadává pouze titulek
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
abstract class KT_FW_Title_Widget_Base extends KT_Widget_Base {

    const TITLE = "title";

    public function __construct($name, $title, $description) {
        parent::__construct($name, $title, $description);
    }

    public function update($newInstance, $oldInstance) {
        $instance = array();
        $instance[self::TITLE] = strip_tags($newInstance[self::TITLE]);
        return $instance;
    }

    public function form($instance) {
        $titleFieldId = $this->get_field_id(self::TITLE);
        $titleFieldName = $this->get_field_name(self::TITLE);
        ?>
        <p>
            <label for="<?php echo $titleFieldId; ?>"><?php _e("Titulek", KT_DOMAIN); ?>:</label>
            <input type="text" id="<?php echo $titleFieldId; ?>" name="<?php echo $titleFieldName; ?>" value="<?php echo $instance[self::TITLE]; ?>">
        </p>
        <?php
    }

}
