<?php $main_nav = get_menu(array('keyword' => 'menu-footer', 'language' => $language, 'output' => 'array')); ?>
<footer>
    <div class="container">
        <div class="footer-box center">
            <div class="footer-brand">
                <a href="index.htm"><span class="icon icon-md-reminder6"></span><em><?php echo !empty($general['homepage_company']) ? $general['homepage_company'] : ''; ?></em> Hotel</a>
            </div>
            <div class="address"><?php echo !empty($general['contact_address']) ? $general['contact_address'] : ''; ?></div>
            <div class="phone">
                <div><span class="icon icon-md-phone370"></span><?php echo !empty($general['contact_hotline']) ? $general['contact_hotline'] : ''; ?></div>
            </div>
            <div class="socials">
                <ul>
                    <li><a href="<?php echo !empty($general['social_facebook']) ? $general['social_facebook'] : ''; ?>" class="fa fa-facebook"></a></li>
                    <li><a href="<?php echo !empty($general['social_twitter']) ? $general['social_twitter'] : ''; ?>" class="fa fa-twitter"></a></li>
                    <li><a href="<?php echo !empty($general['social_google']) ? $general['social_google'] : ''; ?>" class="fa fa-google-plus"></a></li>
                </ul>
            </div>
            <div class="copyright">
                <?php echo !empty($general['homepage_copyright']) ? $general['homepage_copyright'] : ''; ?> © <span id="copyright-year"></span>
                <!-- {%FOOTER_LINK} -->
            </div>
        </div>
    </div>
    <section class="map">
        <?php echo !empty($general['contact_map']) ? $general['contact_map'] : ''; ?>
    </section>
</footer>