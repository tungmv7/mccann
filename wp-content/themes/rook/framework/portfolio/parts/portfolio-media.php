<?php
$post_type = get_post_meta($post->ID, 'link_type', true);
$video=get_post_meta(get_the_ID(),'name',true);
$project_gallery_images = get_post_meta(get_the_ID(), '_thcmb_project_gallery_images', true);
$project_is_slider = get_post_meta(get_the_ID(), '_thcmb_project_is_slider', true);
$project_is_thumb_include = get_post_meta(get_the_ID(), '_thcmb_project_is_thumb_include', true);


if($post_type == 'single_page' && !empty($video) ) { ?>
    <!-- Project Single Video -->
    <div class="project-single-video">
        <div class="col-sm-12">
            <!-- Video -->
            <div class="embed-responsive embed-responsive-16by9">
                <!-- Video Link -->
                <?php echo wp_oembed_get( esc_url($video)); ?>
            </div>
        </div>
    </div>
<?php
}elseif( $post_type == 'single_page' && empty($project_gallery_images) && empty($video ) ) {

    $thumbnail_url = $thumbnail = '';
    $thumbnail_url .= wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
    $thumbnail .= '<img src="'. esc_url($thumbnail_url).'" alt="'.get_the_title().'">';
    ?>

    <!-- Project Single Images -->
    <div class="project-single-images">
        <div class="col-sm-12">
            <!-- Image -->
            <?php echo wp_kses( $thumbnail, array( 
					'img'=>array(
						'src'=>array(),
						'alt'=>array()
				))); ?>
        </div>
    </div>

<?php
}elseif( $post_type == 'single_page' && !empty($project_gallery_images) && $project_is_slider == '' ) {

    $images_output = $thumbnail_url = $thumbnail = '';
    $thumbnail_url .= wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	$project_img_layout = get_post_meta(get_the_ID(), '_thcmb_project_img_layout', true);

    if( $thumbnail_url != '' && $project_is_thumb_include == 'on'){

        $images_output .= "\n\t" . '<div class="project-single-images">';
        $images_output .= "\n\t\t" . '<div class="col-sm-12">';
        $images_output .= "\n\t\t\t" . '<img src="'.esc_url($thumbnail_url).'" alt="'.get_the_title().'">';
        $images_output .= "\n\t\t" . '</div>';
        $images_output .= "\n\t" . '</div>';

    }

    foreach ($project_gallery_images as $img){

        $images_output .= "\n\t" .'<div class="project-single-images">';
        $images_output .= "\n\t\t" .'<div class="col-sm-'.$project_img_layout.'">';
        $images_output .= "\n\t\t\t" .'<img src="'.esc_url($img).'" alt="">';
        $images_output .= "\n\t\t" .'</div>';
        $images_output .= "\n\t" .'</div>';

    }

	echo wp_kses( $images_output, array( 
			'img'=>array(
				'src'=>array(),
				'alt'=>array()
			),
			'div' => array 
                (
                    "class" => array(),
                ),
		));

}elseif( $post_type == 'single_page' && !empty($project_gallery_images) && $project_is_slider == 'on' ){

    $thumbnail_url = $slider_after = $slider_before = $slider_item = '';
    $thumbnail_url .= wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );

    $slider_after .= "\n\t" . '<div class="project-single-slider">';
    $slider_after .= "\n\t\t" . '<div class="col-sm-12">';
    $slider_after .= "\n\t\t\t" . '<div id="fullwidth-slider" class="owl-carousel owl-theme">';

    $count = 0;

    foreach ($project_gallery_images as $img){
        $count++;

        if( $thumbnail_url != '' && $project_is_thumb_include == 'on' && $count == 1){
            $slider_item .= "\n\t" . '<div class="item">';
            $slider_item .= "\n\t\t\t" . '<img src="'.esc_url($thumbnail_url).'" alt="'.get_the_title().'">';
            $slider_item .= "\n\t\t" . '</div>';
        }

        $slider_item .= "\n\t\t\t\t" .'<div class="item">';
        $slider_item .= "\n\t\t\t\t\t" .'<img src="'.esc_url($img).'" alt="">';
        $slider_item .= "\n\t\t\t\t" .'</div>';

    }

    $slider_before .= "\n\t\t\t" . '</div>';
    $slider_before .= "\n\t\t" . '</div>';
    $slider_before .= "\n\t" . '</div>';


	
	$output = $slider_after . $slider_item . $slider_before;
	echo wp_kses( $output, array( 
			'img'=>array(
				'src'=>array(),
				'alt'=>array()
			),
			'div' => array 
                (
                    "class" => array(),
					"id" => array(),
                ),
		));
	
}
?>