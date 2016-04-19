<?php
$project_subtitle=get_post_meta(get_the_ID(),'_thcmb_project_subtitle',true);

$project_alter_bg=get_post_meta(get_the_ID(), '_thcmb_project_alter_bg', true);
if($project_alter_bg !==''){
    $th_project_alter_bg = 'style="background:url(\''.esc_url($project_alter_bg).'\') 50% 0 no-repeat fixed;background-size:cover;" ';
}else{
    $th_project_alter_bg = '';
}
$project_overlay=get_post_meta(get_the_ID(), '_thcmb_project_overlay', true);
if($project_overlay == 'on' && $project_overlay !== '') {
    $project_overlay = '<div class="parallax-overlay" style="opacity: 0.6; background-color: rgb(17, 17, 17);"></div>';
}
else{
	$project_overlay = '';
}

get_header(); ?>

    <!-- Project Single Header -->
    <div class="jumbotron project-single-header" <?php echo $th_project_alter_bg; ?>>
	<?php echo $project_overlay; ?>
        <div class="container">
            <div class="row">
                <!-- Title and Description -->
                <div class="elements-title text-center">
                    <h1><?php the_title() ?></h1>
                    <p><?php echo esc_attr($project_subtitle); ?></p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
    <!-- End Project Single Header -->

    <!-- Project Single Container -->
    <div class="container project-single-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- Project Single Information -->
        <div class="project-single-info">
            <?php
            if ( function_exists( 'the_content_part' ) ) {
                the_content_part( 1 );
            } else {
                the_content();
            }
            ?>
        </div>
  <?php endwhile; endif; ?>
        <div class="clearfix"></div>

        <!-- Project Single Images -->
        <?php get_template_part('framework/portfolio/parts/portfolio-media'); ?>

        <div class="clearfix"></div>

        <!-- Project Single Details -->
        <?php get_template_part('framework/portfolio/parts/portfolio-details'); ?>

    </div> <!-- /.container -->

    <?php
    if ( function_exists( 'the_content_part' ) ) {
        the_content_part( 3 );
    } else {
        the_content();
    }
    ?>

<?php get_footer(); ?>