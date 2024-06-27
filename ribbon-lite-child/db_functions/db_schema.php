<?php

/*********************************************************************
 * Function add schema itemprop to menu item link
 *********************************************************************/
add_filter( 'nav_menu_link_attributes', 'db_add_attribute_nav', 10, 3 );
function db_add_attribute_nav( $atts, $item, $args ) {
  $atts['itemprop'] = 'url';
  return $atts;
}


/*********************************************************************
 * Function define schema for the type of pages
 *********************************************************************/
if ( ! function_exists( 'db_html_tag_schema' ) ) :
    function db_html_tag_schema () {
        $schema = 'http://schema.org/';
        if (is_single()) { $type = "Article"; }
        elseif (is_author()) { $type = "ProfilePage"; }
        elseif (is_search()) { $type = "SearchResultsPage"; }
        elseif (is_archive()) { $type = "CollectionPage"; }
        elseif (is_page('contact')) { $type = "ContactPage"; }
        elseif (is_page('comments')) { $type = "discussionUrl"; }
        elseif (is_page('about')) { $type = "AboutPage"; }
        else { $type = "WebPage";}
        echo 'itemscope itemtype="' . $schema . $type . '"';
    }
endif;


/*********************************************************************
 * Function define schema Page or BlogPost
 *********************************************************************/
if ( ! function_exists( 'db_article_tag_schema' ) ) :
    function db_article_tag_schema() {
        if (is_page()) {
            echo 'itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement"';
        } else {
            echo 'itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting"';
        }
    }
endif;


/*********************************************************************
 * Function define schema publisher for BlogPosting
 *********************************************************************/
if ( ! function_exists( 'db_publisher_schema' ) ) :
    function db_publisher_schema() {
        ?>
        <div class="publisher-img" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
            <div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
                <meta itemprop="url" content="https://www.writebash.com/wp-content/uploads/2017/12/logo.png">
                <meta itemprop="width" content="152">
                <meta itemprop="height" content="60">
            </div>
            <meta itemprop="name" content="Danie Pham">
        </div>
        <?php
    }
endif;


/*********************************************************************
 * Function add schema for tags in the single post
 *********************************************************************/
if ( ! function_exists( 'db_add_class_the_tags' ) ) :
    function db_add_class_the_tags ($html) {
        $postid = get_the_ID();
        $html = str_replace('<a','<a itemprop="keywords"',$html);
        return $html;
    }
    add_filter('the_tags','db_add_class_the_tags');
endif;



/*********************************************************************
 * Function add schema for image in the single post
 *********************************************************************/
if ( ! function_exists( 'db_add_class_img' ) ) :
    function db_add_class_img($content) {
        return str_replace('<img class="','<img itemprop="image" class="img-responsive ',$content);
    }
    add_filter('the_content','db_add_class_img');
endif;