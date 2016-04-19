<?php

// Theme Options page data helper function
if(!function_exists('th_theme_data'))
{
    function th_theme_data($key,$default=false)
    {
        global $th_theme_data;
        if(isset($th_theme_data[$key]))
        {
            return $th_theme_data[$key];
        }else{
            return $default;
        }
    }
}

if(!function_exists('th_theme_data_media')){
    function th_theme_data_media($key,$default=false)
    {
        global $th_theme_data;
        if(isset($th_theme_data[$key]['url']))
        {
            return $th_theme_data[$key]['url'];
        }else{
            return $default;
        }
    }
}

//Custom post tags
function th_blog_post_tags(){
    if(has_tag()){ ?>
        <div class="clearfix tag-widget"><?php the_tags('<h4>'.'Tags:'.'</h4>', ' ', '<br />'); ?></div>
    <?php
    }
}

//Custom wp_list_comments function
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class('media blog-comments-item'); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard media-left">			
                <?php echo get_avatar($comment, 75); ?>                
            </div>
            <div class="comment-text media-body blog-comments-body">
			
				<h4 class="comment-name media-heading clearfix">
					<?php printf(__('<cite class="fn">%s</cite>', 'rook'), get_comment_author_link()) ?>
				</h4>
				
				<div class="comment-date blog-comment-date clearfix">
					<small>
						<?php printf(__('%1$s at %2$s', "rook"), get_comment_date(),  get_comment_time()) ?>
					</small>
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</span>
				</div>

    			<?php if ($comment->comment_approved == '0') : ?>
    			<em><?php esc_html_e('Your comment is awaiting moderation.', "rook") ?></em>
    			<br />
    			<?php endif; ?>

    			<div class="comment-meta commentmetadata">							  	            
    			  <?php edit_comment_link(__('(Edit)', "rook"),'  ','') ?>
    			</div>

    			<?php comment_text() ?>		
            </div>         	
		</div>
<?php
}

// Pagination
function th_pagination($pages = '', $range = 2){

    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<nav><ul class=\"pagination\">";
		echo '<li>'; previous_posts_link(); echo '</li>';
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo; ".__('First', 'rook')."</a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; ".__('Previous', 'rook')."</a></li>";

		
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class=\"active\"><a href=\"#x\">".$i."<span class=\"sr-only\"></span></a></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
            }
        }
		
        if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">".__('Next', 'rook')." &rsaquo;</a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>".__('Last', 'rook')." &raquo;</a></li>";
		echo '<li>'; next_posts_link(); echo '</li>';
        echo "</ul></nav>\n";
    }

}

//Custom function to limit the content
if ( !function_exists( 'content' ) ) {
    function content($contenttype,$limit) {
        global $post;

        if ($contenttype == 'content') { $content = get_the_content(); }
        if ($contenttype == 'excerpt') { $content = get_the_excerpt(); }
        $content = preg_replace('/<img[^>]+./','', $content);
        $content = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $content );

        $content = explode(' ', $content, $limit);
        if (count($content)>=$limit) {
            array_pop($content);
            $content = implode(" ",$content).'... ';
        } else {
            $content = implode(" ",$content);
        }
        $content = preg_replace('/\[.+\]/','', $content);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);

        return $content;
    }
}

// Custom Wordpress Login Logo
if( !function_exists( 'th_custom_login_logo' ) ) {
    function th_custom_login_logo() {
        $login_logo=th_theme_data('login_logo');
        if($login_logo and isset($login_logo['url']) and $login_logo['url'] ){
            echo '<style type="text/css">
			h1 a {
				background-image: url('.esc_url($login_logo['url']).') !important;
				background-position: center center !important;
			}
		</style>';
        }
    }
}
add_action('login_head', 'th_custom_login_logo');

//Tracking code from THEME OPTIONS page
if ( function_exists('th_footer_tracking_code') ) {
    add_action('wp_footer', 'th_footer_tracking_code');
}

function th_footer_tracking_code() {
    $footer_tracking_code=th_theme_data('footer_tracking_code');
    if($footer_tracking_code) {
        echo $footer_tracking_code;
    }
}
?>