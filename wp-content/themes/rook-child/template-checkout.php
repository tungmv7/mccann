<?php /* Template Name: Checkout Template */ ?>
<?php get_header(); ?>
<!-- Blog Full Width Container -->
<div class="container blog-fullwidth-container" style="padding-top: 150px;">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div> <!-- /.container -->
<!-- End Blog Full Width Container -->
<?php get_footer(); ?>
