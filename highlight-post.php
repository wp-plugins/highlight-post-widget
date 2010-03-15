<?php
/*
Plugin Name: Highlight Post Widget
Plugin URI: http://blog.lokamaya.net/code-php/highlight-post-widget-plugin
Description: A widget for displaying highlighted post by adding custom field to the post. You can specify the name of custom field from Widget setting. 
Author: Zaenal/Lokamaya
Version: 1.0.2
Author URI: http://blog.lokamaya.net

Copyright 2010  http://www.lokamaya.net

Released under GNU General Public License (any version).
*/

function widget_highlight_post_init() {
    global $wpdb;
    
    if ( !function_exists('register_sidebar_widget') )
        return;
    //if (!is_user_logged_in()) return;

    function widget_highlight_post($args) {
        global $wpdb;
        extract($args);

        $options = get_option('widget_highlight_post');
        $title = trim($options['title']);
        if (empty($title)) $title = 'Highlight Post';
        
        $metafield = preg_replace("@[^0-9a-z\-_]+@i", "", strip_tags($options['metafield']));
        if (empty($metafield)) $metafield = 'highlight';
        
        $number = (int)$options['number'];
        if ($number > 5) $number = 5;
        elseif ($number < 1) $number = 1;
        
        $separator = empty($options['separator']) ? "&raquo;" : $options['separator']; //trim($options['separator']);

        $querystr = "SELECT wposts.*, wpostmeta.meta_value FROM " . $wpdb->posts ." wposts, " . $wpdb->postmeta . " wpostmeta 
          WHERE wpostmeta.meta_key = '$metafield' AND wposts.ID = wpostmeta.post_id AND wpostmeta.meta_value <> '' AND wpostmeta.meta_value IS NOT NULL AND wposts.post_status = 'publish' AND wposts.post_type = 'post' ORDER BY wposts.post_modified DESC 
          LIMIT $number";
          
        $pagepost = $wpdb->get_results($querystr, OBJECT);
        if ($pagepost) {
            global $post;
            echo $before_widget;
            echo $before_title . $title . $after_title;
            echo "<ul>\n";
            foreach($pagepost as $post) {
                setup_postdata($post);
                $postlink = apply_filters('the_permalink', get_permalink());
                $posttitle = apply_filters('the_title', get_the_title());
                if ($postlink && !empty($postlink) && $posttitle && !empty($posttitle)) {
                    echo '    <li><a href="'.$postlink.'" title="'.esc_attr($posttitle).'">'.$posttitle.' <span class="highlight_separator">' . $separator . '</span> <span class="highlight_note">'.$post->meta_value.'</span></a></li>'."\n";
                }
            }
            echo "</ul>\n";
            echo $after_widget;
            wp_reset_query();
        }
    }

    function widget_highlight_post_control() {
        $options = get_option('widget_highlight_post');
        if ( !is_array($options) )
            $options = array('title'=>'Highlight', 'metafield'=>'highlight', 'number'=>2);
        if ( $_POST['highlight-post-submit'] ) {
            $options['title'] = trim(strip_tags(stripslashes($_POST['highlight-post-title'])));
            $options['metafield'] = preg_replace("@[^0-9a-z\-_]+@i", "", trim(strip_tags(stripslashes($_POST['highlight-post-field']))));
            $options['number'] = (int)$_POST['highlight-post-number'];
            $options['separator'] = strip_tags(stripslashes($_POST['highlight-post-separator']));
            update_option('widget_highlight_post', $options);
        }

        $title = htmlspecialchars($options['title'], ENT_QUOTES);
        $metafield = $options['metafield'];
        $number = $options['number'];
        $separator = $options['separator'];
        $separator = str_replace('&', '&amp;', $separator);
        if ($number > 5) $number = 5;
        elseif ($number < 1) $number = 1;
        
        echo '<p style="text-align:right;"><label for="highlight-post-title">' . __('Title:') . '<br /> <input style="width: 200px;" id="highlight-post-title" name="highlight-post-title" type="text" value="'.$title.'" /></label></p>' . "\n";
        echo '<p style="text-align:right;"><label for="highlight-post-field">' . __('Meta Field:') . '<br /> <input style="width: 200px;" id="highlight-post-title" name="highlight-post-field" type="text" value="'.$metafield.'" /></label></p>' . "\n";
        echo '<p style="text-align:right;"><label for="highlight-post-number">' . __('Number of Post: (max 5)') . '<br /> <input size="3" style="width: 50px;" id="highlight-post-number" name="highlight-post-number" type="text" value="'.$number.'" /></label></p>' . "\n";
        echo '<p style="text-align:right;"><label for="highlight-post-separator">' . __('Separator: (default &amp;raquo;)') . '<br /> <input style="width: 200px;" id="highlight-post-separator" name="highlight-post-separator" type="text" value="'.$separator.'" /></label></p>' . "\n";
        echo '<dl>' . "\n";
        echo '<dt><b>Sorting the Post</b></dt>' . "\n";
        echo '<dd>This widget using "post_modified" to sort the list. Just update your post to make it on top.</dd>' . "\n";
        echo '<dt><b>Customize CSS</b></dt>' . "\n";
        echo '<dd>Add the code below to the style (CSS) of your theme to change the appearance:</dd>' . "\n";
        echo '<dd>#sidebar li.widget_highlight_post {<em>your css here</em>}</dd>' . "\n";
        echo '<dd>#sidebar li.widget_highlight_post span.highlight_separator {<em>your css here</em>}</dd>' . "\n";
        echo '<dd>#sidebar li.widget_highlight_post span.highlight_note {<em>your css here</em>}</dd>' . "\n";
        echo '</dl>' . "\n";
        echo '<input type="hidden" id="highlight-post-submit" name="highlight-post-submit" value="1" />';
    }
    
    register_sidebar_widget(array('Highlight Post', 'widgets'), 'widget_highlight_post');
    register_widget_control(array('Highlight Post', 'widgets'), 'widget_highlight_post_control');
}

add_action('widgets_init', 'widget_highlight_post_init');
?>