
<div id="fullWidthLine" class="container-fluid">
    <div class="row">
        <div id="mailchimp" class="col-lg-6 col-md-6 col-sm-12">
            <div class="clearfix">
                <p><?php _e("Odebírejte novinky z FW", KT_DOMAIN); ?></p>
                <form action="//ktstudio.us9.list-manage.com/subscribe/post?u=51fa687b489f0073589594015&amp;id=10a69ba6c5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>
                    <div style="position: absolute; left: -5000px;">
                        <input type="text" name="b_51fa687b489f0073589594015_10a69ba6c5" tabindex="-1" value="">
                    </div>
                    <input type="submit" value="Sign up" name="subscribe" id="mc-embedded-subscribe" class="button">
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
            <div class="col-lg-7 col-md-6 col-sm-12">
                <a href="<?php bloginfo("url"); ?>" title="<?php _e("KT Wordpress Framework", KT_DOMAIN); ?>"><?php _e("KT Wordpress Framework", KT_DOMAIN); ?></a>
                <ul>
                    <?php kt_the_wp_nav_menu(KT_WP_FW_NAVIGATION_MAIN_MENU, 1); ?>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <p>
                    Copyright &copy; 2010-<?php echo date("Y"); ?> <a href="http://www.ktstudio.cz/" title="KTStudio - tvorba www stránek" target="_blank">KTStudio</a>, 
                    design by <a href="http://www.pixon.cz" title="PiXON Creative studio" target="_blank">PiXON creative studio</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-21258534-55', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>
