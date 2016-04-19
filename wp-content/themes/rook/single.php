<?php

global $post;
$post_format = get_post_format($post->ID);
$video = esc_html( get_post_meta(get_the_ID(), '_thcmb_video_post_format', true) );
$gallery = get_post_meta(get_the_ID(), '_thcmb_gallery_post_format', true);
$audio = esc_html( get_post_meta(get_the_ID(), '_thcmb_audio_post_format', true) );


$alternate_title=get_post_meta(get_the_ID(), '_thcmb_post_alternate_title', true);
if($alternate_title ==''){$alternate_title = $post->post_title;}
$post_subtitle = get_post_meta(get_the_ID(), '_thcmb_post_subtitle', true);
$alternate_background=get_post_meta(get_the_ID(), '_thcmb_post_alternate_background', true);
if($alternate_background !==''){
    $th_alternate_background = 'style="background:url(\''.esc_url($alternate_background).'\') 50% 0 no-repeat fixed;background-size:cover;" ';
}else{
    $th_alternate_background ='';
}

$post_sidebar_layout=get_post_meta(get_the_ID(), '_thcmb_post_sidebar_layout', true);
$sidebar_position = "right";
$content_class = "col-sm-12";
if($post_sidebar_layout == 'default'){
    $sidebar_position=th_theme_data('home_sidebar_position','right');
}elseif($post_sidebar_layout == 'fullwidth'){
    $sidebar_position = 'no';
}elseif($post_sidebar_layout == 'sidebar_left'){
    $sidebar_position = 'left';
}elseif($post_sidebar_layout == 'sidebar_right'){
    $sidebar_position = 'right';
}
if($sidebar_position == "no"){
    $page_class="col-lg-12 col-md-12"; $content_class = '';
}else{
    $page_class="col-sm-9 blog-left-side";
}
if($sidebar_position == "left"){
    $page_class .=' pull-right';
}
?>

<?php get_header(); ?>

    <!-- Blog Full Width Header -->
    <div <?php echo $th_alternate_background; ?> class="jumbotron blog-fullwidth-header">
        <div class="container">
            <div class="row">
                <!-- Title and Description -->
                <div class="elements-title text-center">
                    <h1><?php echo esc_html($alternate_title); ?></h1>
                    <p><?php echo esc_html($post_subtitle); ?></p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
    <!-- End Blog Full Width Header -->

    <!-- Blog Full Width Container -->
    <div class="container blog-fullwidth-container">

        <!-- Blog Side -->
        <div class="<?php echo esc_attr($page_class); ?>">

            <!-- Blog Item Image -->
            <div class="<?php echo esc_attr($content_class); ?>">
                <div class="blog-item">

                    <?php if($post_format == '' || $post_format == 'link'){ ?>
                        <!-- Blog Image -->
                        <div class="blog-image">
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </div>
                    <?php } ?>

                    <?php if($post_format == 'video' && $video !== ''){ ?>
                            <!-- Blog Video -->
                            <div class="blog-video">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <!-- Video Link -->
                                    <?php echo wp_oembed_get(esc_url($video)); ?>
                                </div>
                            </div>
                    <?php } ?>

                    <?php if($post_format == 'audio' && $audio !== ''){ ?>
                        <!-- Blog Video -->
                        <div class="blog-video">
                            <div class="embed-responsive embed-responsive-16by9">
                                <!-- Video Link -->
                                <?php echo wp_oembed_get(esc_url($audio)); ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($post_format == 'gallery' && $gallery !== ''){ ?>
                        <div class="blog-image">
                            <div id="blog-slider" class="owl-carousel owl-theme">
                            <?php
                                foreach($gallery as $gallery_img){ ?>
                                    <!-- Slider Item -->
                                    <div class="item">
                                        <img src="<?php echo esc_url($gallery_img); ?>" alt="<?php the_title()?>">
                                    </div> <?php
                                }
                            ?>
                            </div>
		                </div>
                    <?php } ?>

                    <!-- Blog Date -->
                    <div class="blog-date">
                        <span><?php echo get_the_date( 'F d, Y') ?></span>
                    </div>

                    <!-- Blog Title -->
                    <div class="blog-title-single">
                        <h3><?php the_title()?></h3>
                    </div>


                    <?php while(have_posts()) : the_post(); ?>

                        <?php get_template_part( 'content', get_post_format() ); ?>

                        <!-- Blog Content -->
                        <div class="blog-content-single">

                            <?php the_content(); ?>

                            <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>

                            <?php if (th_theme_data('switch_social_share') == 1){ ?>
                                <!-- Social Share -->
                                <div class="clearfix share-widget">
                                    <h4><?php esc_html_e('Share This:','rook') ?></h4>
                                    <a href="" class="facebook-sharer" onClick="<?php echo esc_js('facebookSharer()'); ?>">
                                        <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span>
                                    </a>
                                    <a href="" class="twitter-sharer" onClick="<?php echo esc_js('twitterSharer()'); ?>">
                                        <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span>
                                    </a>
                                    <a href="" class="pinterest-sharer" onClick="<?php echo esc_js('pinterestSharer()'); ?>">
                                        <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-pinterest fa-stack-1x fa-inverse"></i></span>
                                    </a>
                                    <a href="" class="google-sharer" onClick="<?php echo esc_js('googleSharer()'); ?>">
                                        <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x fa-inverse"></i></span>
                                    </a>
                                    <a href="" class="delicious-sharer" onClick="<?php echo esc_js('deliciousSharer()'); ?>">
                                        <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-share fa-stack-1x fa-inverse"></i></span>
                                    </a>
                                    <a href="" class="linkedin-sharer" onClick="<?php echo esc_js('linkedinSharer()'); ?>">
                                        <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x fa-inverse"></i></span>
                                    </a>
                                </div>
                            <?php } ?>

                            <!-- Tags -->
                            <?php th_blog_post_tags(); ?>

                            <?php if (th_theme_data('switch_next_prev') == 1){ ?>
                                <hr>
                                <div class="next-prev-posts">
                                    <div class="previous-post what-post"><?php previous_post_link(); ?></div>
                                    <div class="next-post what-post"><?php next_post_link(); ?> </div>
                                </div>
                                <div class="clearfix"></div>
                            <?php } ?>

                            <?php if (th_theme_data('switch_about_author') == 1){ ?>
                                <div class="author-bio">                                    
                                    <?php echo get_avatar( get_the_author_meta('user_email'), '70', '' ); ?>
                                    <div class="authorp">
                                        <h3><?php esc_html_e('Author: ', 'rook'); ?><?php the_author_link(); ?></h3>
                                        <p><?php the_author_meta('description'); ?></p>
                                    </div>                                    
                                </div>
                            <?php } ?>

                            <?php comments_template(); ?>

                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

        </div>
        <!-- End Blog Side -->

        <?php if($sidebar_position!="no"){ ?>
            <!-- Blog Sidebar -->
            <div id="sidebar" class="col-sm-3">
                <?php get_sidebar(); ?>
            </div>
            <!-- End Blog Sidebar-->
        <?php } ?>

    </div> <!-- /.container -->
    <!-- End Blog Full Width Container -->
<?php get_footer(); ?>