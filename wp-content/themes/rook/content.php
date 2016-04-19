<!-- Blog Category -->
<div class="blog-category">
    <ul class="clearfix">
        <li>
            <i class="fa fa-user"></i>
            <a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                <?php echo get_the_author(); ?>
            </a>
        </li>
        <li>
            <i class="fa fa-folder-open"></i> <?php the_category(', '); ?>
        </li>
        <li>
            <i class="fa fa-comments"></i> <?php comments_popup_link(__('No Comments', 'rook'), __('1 Comment', 'rook'), __('% Comments', 'rook')); ?>
        </li>
    </ul>
</div>