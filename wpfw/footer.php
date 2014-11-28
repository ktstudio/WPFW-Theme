<?php global $ktWpFwThemeModel; ?>

<div id="fullWidthLine" class="container-fluid">
    <div class="row">
        <div id="mailchimp" class="col-lg-6 col-md-6 col-sm-12">
            <div class="clearfix">
                <p><?php _e("Odebírejte novinky z FW", KT_DOMAIN); ?></p>
                <form method="post" action="http://www.refreshcar.kocifaj.cz/" id="mc4wp-form-1" class="form mc4wp-form">
                    <input type="email" id="mc4wp_email" name="EMAIL" value="@">
                    <input type="submit" value="Sing up">
                    <textarea name="_mc4wp_required_but_not_really" style="display: none !important;"></textarea>
                    <input type="hidden" name="_mc4wp_form_submit" value="1">
                    <input type="hidden" name="_mc4wp_form_instance" value="1">
                    <input type="hidden" name="_mc4wp_form_nonce" value="02c1def20f">
                </form>
            </div>
        </div>
        <div id="twitter" class="col-lg-6 col-md-6 col-sm-12">
            <div>
                <p><span><?php _e("Sledujte nás!", KT_DOMAIN); ?></span></p>
                <span><a href="https://twitter.com/ktstudiocz" class="twitter-follow-button" data-show-count="false" data-size="large"><?php _e("Follow @ktstudiocz!", KT_DOMAIN); ?></a></span>
                <script>!function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + '://platform.twitter.com/widgets.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'twitter-wjs');</script>
            </div>
        </div>
    </div>
</div>

<div id="footerWrap">
    <div class="container">
        <div id="footer" class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a href="<?php bloginfo("url"); ?>" title="<?php _e("KT Wordpress Framework", KT_DOMAIN); ?>"><?php _e("KT Wordpress Framework", KT_DOMAIN); ?></a>
                <ul>
                    <?php kt_the_wp_nav_menu(KT_WP_FW_NAVIGATION_MAIN_MENU, 1); ?>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <p>
                    Copyright &copy; 2010-<?php echo date("Y"); ?> <a href="http://www.ktstudio.cz/" title="KTStudio - tvorba www stránek" target="_blank">KTStudio</a>, 
                    design by <a href="http://www.pixon.cz" title="PiXON Creative studio" target="_blank">PiXON creative studio</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
