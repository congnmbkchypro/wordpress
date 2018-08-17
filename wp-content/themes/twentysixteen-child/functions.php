<?php
function add_metabox_search_user()
{
    add_meta_box('user', 'Search User', 'show_metabox_search_user', 'post', 'advanced', 'high', array(1, 2, 'hello'));
}
 
function show_metabox_search_user($post, $metabox)
{
    // echo "Nội dung của metabox2 ";
    echo "<input type = 'text' name = 'user'>";
}
 
add_action('add_meta_boxes', 'add_metabox_search_user');
