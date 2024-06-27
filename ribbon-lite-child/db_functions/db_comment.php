<?php

/*********************************************************************
 * Function setup comment form, exclude 's' character of parent function
 *********************************************************************/
if ( ! function_exists( 'ribbon_lite_comment' ) ) :
    function ribbon_lite_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="https://schema.org/Comment">
            <div id="comment-<?php comment_ID(); ?>" style="position:relative;">
                <div class="comment-author vcard" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <?php echo get_avatar( $comment->comment_author_email, 50 ); ?>
                    <div class="comment-metadata">
                        <?php printf('<span class="fn" itemprop="name">%s</span>', get_comment_author_link()) ?>
                        <span class="says">commented:</span>
                        <span class="comment-meta">
                            <?php edit_comment_link(__('(Edit)', 'ribbon-lite'),'  ','') ?>
                        </span>
                    </div>
                </div>

                <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.', 'ribbon-lite') ?></em>
                <br />
                <?php endif; ?>
                <div class="commentmetadata">
                    <span itemprop="text"><?php comment_text() ?></span>
                    <time itemprop="datePublished"><?php comment_date(get_option( 'date_format' )); ?></time>
                    <span class="reply">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </span>
                </div>
            </div>
    <?php }
endif;


/*********************************************************************
 * Function add target blank to link of all comments
 *********************************************************************/
add_filter( "comment_text", "db_filter_comment_content" );
if ( ! function_exists( 'db_filter_comment_content' ) ) :
    function db_filter_comment_content( $comment_content ){
        return str_replace( "<a ", "<a target='_blank' ", $comment_content );
    }
endif;


/*********************************************************************
 * Function add target blank to comment author link
 *********************************************************************/
add_filter( "get_comment_author_link", "db_change_comment_author_link" );
if ( ! function_exists( 'db_change_comment_author_link' ) ) :
    function db_change_comment_author_link( $author_link ){
        return str_replace( "<a ", "<a target='_blank' ", $author_link );
    }
endif;


/*********************************************************************
 * Function add privacy notitce above comment form
 *********************************************************************/
if ( ! function_exists( 'db_comment_notice' ) ) :
    function db_comment_notice ($fields) {
        $fields['comment_notes_before'] = '<p class="comment-notes">Please keep in mind that all comments are subject to our <a href="'. get_theme_mod('current_privacy_page_url') . '">Comment Policy</a>. Your email address will not be published.<br>This site uses Akismet to reduce spam. <a href="' . get_theme_mod('akismet_page_url') . '" target="_blank" rel="external nofollow noopener">Learn how your comment data is processed</a>.</p>';
        return $fields;
    }
    add_filter('comment_form_defaults','db_comment_notice');
endif;