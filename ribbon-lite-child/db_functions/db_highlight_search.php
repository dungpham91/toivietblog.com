<?php

/*********************************************************************
 * Function to highlight search term in title & excerpt post
 *********************************************************************/
function db_highlight_results($text){
     if(is_search()){
     $sr = get_query_var('s');
     $keys = explode(" ",$sr);
     $text = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">'.$sr.'</strong>', $text);
     }
     return $text;
}
add_filter('the_excerpt', 'db_highlight_results');
add_filter('the_title', 'db_highlight_results');
