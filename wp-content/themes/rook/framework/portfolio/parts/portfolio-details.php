<?php
$project_client=get_post_meta(get_the_ID(),'project_client',true);
$project_website=get_post_meta(get_the_ID(),'project_website',true);
$project_desc=get_post_meta(get_the_ID(),'project_desc',true);
$project_description=get_post_meta(get_the_ID(),'_thcmb_projects-custom-fields',true);

$switch_project_client = 1;
$switch_project_website = 1;
$switch_project_website = th_theme_data('switch_project_website');
$switch_project_client = th_theme_data('switch_project_client');

$portfolio_categories = wp_get_post_terms(get_the_ID(),'project-type');
?>

<div class="project-single-details">

	<!-- Left Column -->
	<div class="col-sm-4">
		<h2><?php esc_html_e('Project Details', 'rook'); ?></h2>
		<ul class="list-group project-list-group">

            <?php if ( $project_client !== ''  && $switch_project_client == 1 ){ ?>
                <li class="list-group-item project-list-group-item">
                    <span class="badge"><?php echo esc_html($project_client); ?></span>
                    <?php esc_html_e("Client", 'rook'); ?>
                </li>
            <?php } ?>

            <?php if ( $project_website !== '' && $switch_project_website == 1 ){ ?>
                <li class="list-group-item project-list-group-item">
                    <span class="badge"><a href="<?php echo esc_url($project_website); ?>"><?php echo esc_html($project_website); ?></a></span>
                    <?php esc_html_e("Website:", 'rook'); ?>
                </li>
            <?php } ?>

            <?php if ( $project_desc !== '' ){ ?>
                <li class="list-group-item project-list-group-item">
                    <span class="badge"><?php echo esc_html($project_desc); ?></span>
                    <?php esc_html_e("Date:", 'rook'); ?>
                </li>
            <?php }

            // Portfolio categories
            if(is_array($portfolio_categories) && count($portfolio_categories)){

                $portfolio_categories_array = array();
                foreach($portfolio_categories as $portfolio_category) {
                    $portfolio_categories_array[] = $portfolio_category->name;
                }
                ?>

                <li class="list-group-item project-list-group-item">
                    <span class="badge"><?php echo mb_strtolower( implode(', ', $portfolio_categories_array) ); ?></span>
                    <?php esc_html_e('Category:', 'rook'); ?>
                </li>

            <?php }

            //Project Custom Fields
            if( $project_description !== ''){

                foreach ( (array) $project_description as $key => $entry ) {

                    $title = $desc = '';

                    if ( isset( $entry['title'] ) )
                        $title =  $entry['title'];

                    if ( isset( $entry['description'] ) )
                        $desc =  $entry['description']; ?>
                    <li class="list-group-item project-list-group-item">
                        <span class="badge"><?php echo esc_html($desc); ?></span>
                        <?php echo esc_html($title); ?>
                    </li>

                <?php
                }

            } ?>

		</ul>
	</div>

	<!-- Right Column -->
	<div class="col-sm-8">
        <?php
        if ( function_exists( 'the_content_part' ) ) {
            the_content_part( 2 );
        } else {
            the_content();
        }
        ?>
	</div>
</div>