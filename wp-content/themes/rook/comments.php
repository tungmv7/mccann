<?php/** * The template for displaying Comments. * * The area of the page that contains comments and the comment form./* * If the current post is protected by a password and the visitor has not yet * entered the password we will return early without loading the comments. */if ( post_password_required() )    return;?><?php $th_comments_count = $post->comment_count;if( $th_comments_count > 0){ ?>    <div class="blog-comments" id="comments">            <div class="blog-comments-title">                <h2><?php esc_html_e( 'Comments' , 'rook' ); ?></h2>                <hr>            </div>        <ol class="comment-list">            <?php            wp_list_comments( array(                'callback' => 'mytheme_comment',                'style'       => 'ol',                'short_ping'  => true,                'avatar_size' => 80,            ) );            ?>        </ol><!-- .comment-list -->        <?php             // Are there comments to navigate through?            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>                <nav class="navigation comment-navigation" role="navigation">                    <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'rook' ) ); ?></div>                    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'rook' ) ); ?></div>                </nav><!-- .comment-navigation -->            <?php endif; // Check for comment navigation ?>            <?php if ( ! comments_open() && get_comments_number() ) : ?>                <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'rook' ); ?></p>            <?php endif; ?>    </div><?php } ?><div class="blog-leave-comment"><?php$aria_req = ( $req ? " aria-required='true'" : '' );$comment_args = array(	'title_reply'=> __('<div class="blog-comments-title">'.esc_attr_x('LEAVE A COMMENT', 'LEAVE A COMMENT', 'rook').'<hr></div>', 'rook'),	'fields' => apply_filters( 'comment_form_default_fields', array(		'author' => '			<div class="row">				<div class="col-sm-6">					<input type="text" name="author" placeholder="'.esc_attr( 'Name (required)', 'rook' ).'" class="input-md form-control" maxlength="100" id="name" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />				</div>		',		'email' => '				<div class="col-sm-6">					<input id="mail" name="email" placeholder="'.esc_attr( 'Email (required)', 'rook' ).'" class="form-control" maxlength="100" type="text" value="' . sanitize_email(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />				</div>			</div>					',		'url' => '				<div class="rk-mtop30">					<input id="url" name="url"  placeholder="'.esc_attr( 'Website', 'rook' ).'" class="form-control" maxlength="100" type="text" value="' . esc_url( $commenter['comment_author_url'] ) . '"  />				</div>		'	)),	'comment_field' => '<div class="rk-mtop30">							<textarea cols="58" rows="10" id="comment" tabindex="4" placeholder="'.esc_attr( 'Your Message (required)', 'rook' ).'"  name="comment"'.esc_attr($aria_req).'></textarea>						</div>',			'comment_notes_before' => '',	'comment_notes_after' => '',);?><?php global $post; ?><?php if('open' == $post->comment_status){ ?>	<?php comment_form($comment_args); ?><?php } ?></div>