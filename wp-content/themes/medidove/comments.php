<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package medidove
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if( get_comments_number() >= 1 ): ?>
<div class="post-comments mt-50">
    <div class="blog-coment-title mb-30">

        <?php
            $comment_no = number_format_i18n(get_comments_number());
        	$comment_text = (!empty($comment_no) AND ( $comment_no > 1 ) )  ?  esc_html__( ' Comments', 'medidove' ) : esc_html__( ' Comment ', 'medidove' );
            $comment_no = (!empty($comment_no) AND ( $comment_no > 0 ) )  ? '<h2>' . esc_html($comment_no . $comment_text) .'</h2>' : ' ';
            print sprintf("%s", $comment_no);
        ?>

    </div>
    <div class="latest-comments">
    	<ul>
            <?php 
                wp_list_comments( array(
                  'style'             => 'ul',
                  'callback'          => 'medidove_comment',
                  'avatar_size'       => 90,
                  'short_ping'        => true, 
                ) ); 
            ?>
        </ul>
    </div>
</div>
<?php endif; ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="comment-pagination mb-50">
        <nav id="comment-nav-below" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'medidove' ); ?></h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="nav-previous "><?php previous_comments_link( esc_html__( '&larr; Older ', 'medidove' ) ); ?></div>
                </div>
                <div class="col-md-6">
                    <div class="nav-next "><?php next_comments_link( esc_html__( 'Newer &rarr;', 'medidove' ) ); ?></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </nav><!-- #comment-nav-below -->
    </div>
<?php endif; // check for comment navigation ?>


<div class="post-comments-form mt-45 mb-30">
    <?php comment_form(); ?>
</div>
        
