<?php /* Template Name: Checkout Template */ ?>
<?php get_header(); ?>
<!-- Blog Full Width Container -->
<div class="container blog-fullwidth-container" style="padding-top: 150px;">
    <?php
        echo do_shortcode('[woocommerce_checkout]')
    ?>
</div> <!-- /.container -->
<!-- End Blog Full Width Container -->
<?php get_footer(); ?>
