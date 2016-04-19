<?php
$footer_style=th_theme_data('th_footer_style');
?>

<?php if($footer_style == 'style1'){ ?>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Footer Logo -->
                <div class="col-sm-6">

                    <?php
                    $footer_logo=th_theme_data('footer_logo');
                    if($footer_logo and isset($footer_logo['url']) and $footer_logo['url'] ){ ?>
                        <img src="<?php echo esc_url($footer_logo['url'], 'rook') ?>" alt="<?php bloginfo('name'); ?>" height="60">
                    <?php
                    }else {
                        echo get_bloginfo('name');
                    }?>

                </div>

                <?php $switch_footer_social = th_theme_data('switch_footer_social');
                if($switch_footer_social == 1){ ?>
                    <?php $th_footer_social_target = th_theme_data('th_footer_social_target'); ?>

                    <!-- Footer Social -->
                    <div class="col-sm-6">
                        <ul class="footer-social">
                            <?php if(th_theme_data('footer_facebook_url')): ?>
                                <li><a href="<?php echo esc_url(th_theme_data('footer_facebook_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">Facebook</a></li>
                            <?php endif;?>

                            <?php if(th_theme_data('footer_twitter_url')): ?>
                                <li><a href="<?php echo esc_url(th_theme_data('footer_twitter_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">Twitter</a></li>
                            <?php endif;?>

                            <?php if(th_theme_data('footer_pinterest_url')): ?>
                                <li><a href="<?php echo esc_url(th_theme_data('footer_pinterest_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">Pinterest</a></li>
                            <?php endif;?>

                            <?php if(th_theme_data('footer_skype_url')): ?>
                                <li><a href="<?php echo esc_url(th_theme_data('footer_skype_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">Skype</a></li>
                            <?php endif;?>

                            <?php if(th_theme_data('footer_linkedin_url')): ?>
                                <li><a href="<?php echo esc_url(th_theme_data('footer_linkedin_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">Linkedin</a></li>
                            <?php endif;?>

                            <?php echo wp_kses_post(th_theme_data('footer_custom_social')); ?>
                        </ul>
                    </div>

                <?php } ?>

                <div class="clearfix"></div>

                <div class="second-footer">
                    <!-- Copyright -->
                    <div class="col-sm-6 col-sm-offset-3 text-center footer-content">
                        <?php $footer_text = th_theme_data('footer_text');
                        if($footer_text != '') { ?>
                            <p><?php echo wp_kses_post(th_theme_data('footer_text')); ?></p>
                        <?php } else { ?>
                            <p><?php esc_html_e('&copy; 2015 ROOK Agency, Ltd.  |   Branding. Print. Web. Strategy.', 'rook'); ?></p>
                        <?php } ?>
                    </div>
                    <!-- Scroll Top Button -->
                    <div class="col-sm-3">
                        <div class="pull-right">
                            <a href="#header-section"><i class="fa fa-chevron-up fa-lg"></i></a>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </footer>
    <!-- End Footer -->
<?php } else{

    /* If none of the sidebars have widgets.*/
    if ( ! is_active_sidebar( 'footer_1st_col'  )
        && ! is_active_sidebar( 'footer_2nd_col' )
        && ! is_active_sidebar( 'footer_3rd_col'  )
        && ! is_active_sidebar( 'footer_4th_col' )
    ) : ?>

        <div class="footer-second-copyright">
            <div class="container">
                <!-- Copyright -->
                <div class="col-sm-6 col-sm-offset-3 text-center footer-content">
                    <?php $footer_text = th_theme_data('footer_text');
                    if($footer_text != '') { ?>
                        <p><?php echo wp_kses_post(th_theme_data('footer_text')); ?></p>
                    <?php } else { ?>
                        <p><?php esc_html_e('&copy; 2015 ROOK Agency, Ltd.  |   Branding. Print. Web. Strategy.', 'rook'); ?></p>
                    <?php } ?>
                </div>
                <!-- Scroll Top Button -->
                <div class="col-sm-3">
                    <div class="pull-right">
                        <a href="#page-top"><i class="fa fa-chevron-up fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer --> <?php

        //end of all sidebar checks.
    endif;

    /* If none of the sidebars have widgets.*/
    if  (  is_active_sidebar( 'footer_1st_col'  )
        && is_active_sidebar( 'footer_2nd_col' )
        && is_active_sidebar( 'footer_3rd_col'  )
        && is_active_sidebar( 'footer_4th_col' )
    ) : ?>

        <!-- Footer -->
        <footer class="footer footer-second">
            <div class="container">
                <div class="row">

                    <div class="col-sm-3">
                        <!-- Footer Logo -->
                        <div class="footer-second-logo">

                            <?php
                            $footer_logo=th_theme_data('footer_logo');
                            if($footer_logo and isset($footer_logo['url']) and $footer_logo['url'] ){ ?>
                                <img src="<?php echo esc_url($footer_logo['url'], 'rook') ?>" alt="<?php bloginfo('name'); ?>" height="60">
                            <?php
                            }else {
                                echo get_bloginfo('name');
                            }?>
                        </div>

                        <!-- Footer Description -->
                        <div class="footer-second-desc">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_1st_col") ) : ?>
                            <?php endif; ?>
                        </div>

                        <?php $switch_footer_social = th_theme_data('switch_footer_social');
						if($switch_footer_social == 1){ ?>
							<?php $th_footer_social_target = th_theme_data('th_footer_social_target'); ?>
							<!-- Footer Social -->
							<div class="footer-second-social">

								<?php if(th_theme_data('footer_facebook_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_facebook_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_twitter_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_twitter_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_pinterest_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_pinterest_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-pinterest fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_linkedin_url')): ?>
								<a href="<?php echo esc_url(th_theme_data('footer_linkedin_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
									<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x fa-inverse"></i></span>
								</a>
								<?php endif;?>
							</div>
						<?php } ?>
					</div>

                    <!-- Footer Newsletter -->
                    <div class="col-sm-3">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_2nd_col") ) : ?>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Recent Posts -->
                    <div class="col-sm-3">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_3rd_col") ) : ?>
                        <?php endif; ?>
                    </div>

                    <!-- From Instagram -->
                    <div class="col-sm-3">
                        <div class="footer-second-instagram">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_4th_col") ) : ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </footer>

        <div class="footer-second-copyright">
            <div class="container">
                <!-- Copyright -->
                <div class="col-sm-6 col-sm-offset-3 text-center footer-content">
                    <?php $footer_text = th_theme_data('footer_text');
                    if($footer_text != '') { ?>
                        <p><?php echo wp_kses_post(th_theme_data('footer_text')); ?></p>
                    <?php } else { ?>
                        <p><?php esc_html_e('&copy; 2015 ROOK Agency, Ltd.  |   Branding. Print. Web. Strategy.', 'rook'); ?></p>
                    <?php } ?>
                </div>
                <!-- Scroll Top Button -->
                <div class="col-sm-3">
                    <div class="pull-right">
                        <a href="#page-top"><i class="fa fa-chevron-up fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer --> <?php
    endif;

    if  (  is_active_sidebar( 'footer_1st_col'  )
        && is_active_sidebar( 'footer_2nd_col' )
        && is_active_sidebar( 'footer_3rd_col'  )
        && ! is_active_sidebar( 'footer_4th_col' )
    ) : ?>

        <!-- Footer -->
        <footer class="footer footer-second">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        <!-- Footer Logo -->
                        <div class="footer-second-logo">

                            <?php
                            $footer_logo=th_theme_data('footer_logo');
                            if($footer_logo and isset($footer_logo['url']) and $footer_logo['url'] ){ ?>
                                <img src="<?php echo esc_url($footer_logo['url'], 'rook') ?>" alt="<?php bloginfo('name'); ?>" height="60">
                            <?php
                            }else {
                                echo get_bloginfo('name');
                            }?>
                        </div>

                        <!-- Footer Description -->
                        <div class="footer-second-desc">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_1st_col") ) : ?>
                            <?php endif; ?>
                        </div>

                        <?php $switch_footer_social = th_theme_data('switch_footer_social');
                        if($switch_footer_social == 1){ ?>
							<?php $th_footer_social_target = th_theme_data('th_footer_social_target'); ?>
							<!-- Footer Social -->
							<div class="footer-second-social">

								<?php if(th_theme_data('footer_facebook_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_facebook_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_twitter_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_twitter_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_pinterest_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_pinterest_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-pinterest fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_linkedin_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_linkedin_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>
							</div>
						<?php } ?>
					</div>

                    <!-- Footer Newsletter -->
                    <div class="col-sm-4">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_2nd_col") ) : ?>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Recent Posts -->
                    <div class="col-sm-4">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_3rd_col") ) : ?>
                        <?php endif; ?>
                    </div>

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </footer>

        <div class="footer-second-copyright">
            <div class="container">
                <!-- Copyright -->
                <div class="col-sm-6 col-sm-offset-3 text-center footer-content">
                    <?php $footer_text = th_theme_data('footer_text');
                    if($footer_text != '') { ?>
                        <p><?php echo wp_kses_post(th_theme_data('footer_text')); ?></p>
                    <?php } else { ?>
                        <p><?php esc_html_e('&copy; 2015 ROOK Agency, Ltd.  |   Branding. Print. Web. Strategy.', 'rook'); ?></p>
                    <?php } ?>
                </div>
                <!-- Scroll Top Button -->
                <div class="col-sm-3">
                    <div class="pull-right">
                        <a href="#page-top"><i class="fa fa-chevron-up fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer --> <?php
    endif;

    if  (  is_active_sidebar( 'footer_1st_col'  )
    && is_active_sidebar( 'footer_2nd_col' )
    && ! is_active_sidebar( 'footer_3rd_col'  )
    && ! is_active_sidebar( 'footer_4th_col' )
    ) : ?>

        <!-- Footer -->
        <footer class="footer footer-second">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6">
                        <!-- Footer Logo -->
                        <div class="footer-second-logo">

                            <?php
                            $footer_logo=th_theme_data('footer_logo');
                            if($footer_logo and isset($footer_logo['url']) and $footer_logo['url'] ){ ?>
                                <img src="<?php echo esc_url($footer_logo['url'], 'rook') ?>" alt="<?php bloginfo('name'); ?>" height="60">
                            <?php
                            }else {
                                echo get_bloginfo('name');
                            }?>
                        </div>

                        <!-- Footer Description -->
                        <div class="footer-second-desc">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_1st_col") ) : ?>
                            <?php endif; ?>
                        </div>

                        <?php $switch_footer_social = th_theme_data('switch_footer_social');
                        if($switch_footer_social == 1){ ?>
							<?php $th_footer_social_target = th_theme_data('th_footer_social_target'); ?>
							<!-- Footer Social -->
							<div class="footer-second-social">

								<?php if(th_theme_data('footer_facebook_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_facebook_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_twitter_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_twitter_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_pinterest_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_pinterest_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-pinterest fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_linkedin_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_linkedin_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>
							</div>
						<?php } ?>
					</div>

                    <!-- Footer Newsletter -->
                    <div class="col-sm-6">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_2nd_col") ) : ?>
                        <?php endif; ?>
                    </div>

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </footer>

        <div class="footer-second-copyright">
            <div class="container">
                <!-- Copyright -->
                <div class="col-sm-6 col-sm-offset-3 text-center footer-content">
                    <?php $footer_text = th_theme_data('footer_text');
                    if($footer_text != '') { ?>
                        <p><?php echo wp_kses_post(th_theme_data('footer_text')); ?></p>
                    <?php } else { ?>
                        <p><?php esc_html_e('&copy; 2015 ROOK Agency, Ltd.  |   Branding. Print. Web. Strategy.', 'rook'); ?></p>
                    <?php } ?>
                </div>
                <!-- Scroll Top Button -->
                <div class="col-sm-3">
                    <div class="pull-right">
                        <a href="#page-top"><i class="fa fa-chevron-up fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer --> <?php
    endif;

    if  (  is_active_sidebar( 'footer_1st_col'  )
    && ! is_active_sidebar( 'footer_2nd_col' )
    && ! is_active_sidebar( 'footer_3rd_col'  )
    && ! is_active_sidebar( 'footer_4th_col' )
    ) : ?>

        <!-- Footer -->
        <footer class="footer footer-second">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <!-- Footer Logo -->
                        <div class="footer-second-logo">

                            <?php
                            $footer_logo=th_theme_data('footer_logo');
                            if($footer_logo and isset($footer_logo['url']) and $footer_logo['url'] ){ ?>
                                <img src="<?php echo esc_url($footer_logo['url'], 'rook') ?>" alt="<?php bloginfo('name'); ?>" height="60">
                            <?php
                            }else {
                                echo get_bloginfo('name');
                            }?>
                        </div>

                        <!-- Footer Description -->
                        <div class="footer-second-desc">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_1st_col") ) : ?>
                            <?php endif; ?>
                        </div>

                        <?php $switch_footer_social = th_theme_data('switch_footer_social');
                        if($switch_footer_social == 1){ ?>
							<?php $th_footer_social_target = th_theme_data('th_footer_social_target'); ?>
							<!-- Footer Social -->
							<div class="footer-second-social">

								<?php if(th_theme_data('footer_facebook_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_facebook_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_twitter_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_twitter_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_pinterest_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_pinterest_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-pinterest fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>

								<?php if(th_theme_data('footer_linkedin_url')): ?>
									<a href="<?php echo esc_url(th_theme_data('footer_linkedin_url')); ?>" target="<?php echo esc_attr($th_footer_social_target); ?>">
										<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x fa-inverse"></i></span>
									</a>
								<?php endif;?>
							</div>

						<?php } ?>
					</div>

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </footer>

        <div class="footer-second-copyright">
            <div class="container">
                <!-- Copyright -->
                <div class="col-sm-6 col-sm-offset-3 text-center footer-content">
                    <?php $footer_text = th_theme_data('footer_text');
                    if($footer_text != '') { ?>
                        <p><?php echo wp_kses_post(th_theme_data('footer_text')); ?></p>
                    <?php } else { ?>
                        <p><?php esc_html_e('&copy; 2015 ROOK Agency, Ltd.  |   Branding. Print. Web. Strategy.', 'rook'); ?></p>
                    <?php } ?>
                </div>
                <!-- Scroll Top Button -->
                <div class="col-sm-3">
                    <div class="pull-right">
                        <a href="#page-top"><i class="fa fa-chevron-up fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer --> <?php
    endif; ?>


<?php } ?>

        <?php wp_footer() ?>
    </body>
</html>