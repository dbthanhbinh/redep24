<?php
// applied when calling get_tag_link()
add_filter('tag_link', 'my_tag_link', 10, 2);

/**
 * Returns a link to a tag. Instead of /tag/tag-name/ returns /tag-name.html
 */
function my_tag_link($tag_link, $tag_id) {
    $tag_base = get_option('tag_base');
    if ($tag_base) {
        $tag_link = preg_replace('@^' . preg_quote($tag_base, '@') . '@', '', $tag_link); 
    }
    return '/' . trim($tag_link, '/') . '.html';
}
