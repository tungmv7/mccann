<?php

$alternate_title=get_post_meta(get_the_ID(), '_thcmb_page_alternate_title', true);
if($alternate_title ==''){$alternate_title = $post->post_title;}
$page_subtitle = get_post_meta(get_the_ID(), '_thcmb_page_subtitle', true);
$alternate_background=get_post_meta(get_the_ID(), '_thcmb_page_alternate_background', true);
if($alternate_background !==''){
    $th_alternate_background = 'style="background:url(\''.esc_url($alternate_background).'\') 50% 0 no-repeat fixed;background-size:cover;" ';
}else{
    $th_alternate_background ='';
}

$page_sidebar_layout=get_post_meta(get_the_ID(), '_thcmb_page_sidebar_layout', true);
$sidebar_position = "right";
$content_class = "col-sm-12";
if($page_sidebar_layout == 'default'){
    $sidebar_position=th_theme_data('home_sidebar_position','right');
}elseif($page_sidebar_layout == 'fullwidth'){
    $sidebar_position = 'no';
}elseif($page_sidebar_layout == 'sidebar_left'){
    $sidebar_position = 'left';
}elseif($page_sidebar_layout == 'sidebar_right'){
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
    <div style="display: none;" <?php echo $th_alternate_background; ?> class="jumbotron blog-fullwidth-header">
        <div class="container">
            <div class="row">
                <!-- Title and Description -->
                <div class="elements-title text-center">
                    <h1><?php echo esc_html($alternate_title); ?></h1>
                    <p><?php echo esc_attr($page_subtitle); ?></p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
    <!-- End Blog Full Width Header -->

    <!-- Blog Full Width Container -->
    <div class="container blog-fullwidth-container" style="padding-top: 150px;">

        <div class="<?php echo esc_attr($page_class); ?>">
            <?php
            if ( have_posts() ) : ?>
                    <!-- Blog Item Image -->
                    <div class="<?php echo esc_attr($content_class); ?>">
                        <?php woocommerce_content(); ?>
                    </div> <?php
            else : echo esc_html_e('No posts found', 'rook' );
            endif;
            ?>
        </div>

        <?php if($sidebar_position!="no"){ ?>
            <!-- Blog Sidebar -->
            <div id="sidebar" class="col-sm-3" style="display: none">
                <?php dynamic_sidebar( 'ecommerce' );//get_sidebar(); ?>
            </div>
            <!-- End Blog Sidebar-->
        <?php } ?>
    </div> <!-- /.container -->
    <!-- End Blog Full Width Container -->

<?php get_footer(); ?>