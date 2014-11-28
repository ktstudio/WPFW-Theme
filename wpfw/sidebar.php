<?php $sidebarPresenter = new KT_WP_FW_Sidebar_Presenter(); ?>

<div class="col-lg-3 col-lg-offset-1 col-md-4">
    <div id="sidebar">
        <?php
        get_search_form(true);
        $sidebarPresenter->render();
        ?>
    </div>
</div>
