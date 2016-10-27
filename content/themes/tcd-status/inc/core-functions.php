<?php
/**
 * Core theme functions
 *
 * @package _s
 */

/**
 * Flush rewrite rules on theme activation
 */
function _s_flush_rewrite_rules() {
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', '_s_flush_rewrite_rules' );

/**
 * Add and update image sizes
 */
function _s_custom_image_sizes() {
  update_option( 'medium_size_w', 600 );
  update_option( 'medium_size_h', 600 );
  update_option( 'medium_crop', 0 );
}
add_action( 'init', '_s_custom_image_sizes' );

/**
 * Remove dashboard widgets
 */
function _s_remove_dash_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
}
add_action( 'wp_dashboard_setup', '_s_remove_dash_widgets' );

/**
 * Custom welcome panel
 */
function _s_custom_welcome_panel() {
  $html =  '<div class="welcome-panel-content" style="padding-bottom: 23px;">';
  $html .= '<h2 style="margin-bottom: 5px;">Welcome to your site!</h2>';
  $html .= '<p style="font-size: 16px; margin: 0;">Click anywhere on the left-hand side to get started. Just for reference, your IP address is <code>' . $_SERVER['SERVER_ADDR'] . '</code>. Good luck!</p>';
  $html .= '</div>';
  echo $html;
}
remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_action( 'welcome_panel', '_s_custom_welcome_panel' );

/**
 * Strip &nbsp; from end of posts
 */
function _s_trim_trailing_whitespace( $content ) {
  $content = preg_replace( "/&nbsp;/", "☺", $content );
  $content = rtrim( $content, "☺" . " \t\n\r\0\x0B" );
  $content = preg_replace( "/☺/", "&nbsp;", $content );
  return $content;
}
add_filter( 'the_content', '_s_trim_trailing_whitespace', 0 );

/**
 * Remove double space after period
 */
function _s_remove_double_space( $data ) {
  $data['post_content'] = preg_replace(
    "~( \x{C2}\x{A0}|\x{C2}\x{A0} )~m", " ", $data['post_content']
  );
  return $data;
}
add_filter( 'wp_insert_post_data', '_s_remove_double_space', 20 );

/**
 * Allow SVG upload through media library
 */
function _s_allow_svg_upload( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', '_s_allow_svg_upload' );

/**
 * Get featured image URL
 */
function _s_get_feat_img_url( $size ) {
  // hat tip: http://goo.gl/fzHOaB
  $img_id = get_post_thumbnail_id();
  $img_array = wp_get_attachment_image_src( $img_id, $size );
  $img_url = $img_array[0];
  return $img_url;
}

/**
 * Remove category and tag from admin menu
 */
function _s_remove_cat_tag_admin() {
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
}
add_action( 'admin_menu', '_s_remove_cat_tag_admin' );

/**
 * Remove category and tag meta boxes
 */

function _s_remove_cat_tag_meta() {
  remove_meta_box( 'categorydiv','post','normal' );
  remove_meta_box( 'tagsdiv-post_tag','post','normal' );
}
add_action('admin_menu','_s_remove_cat_tag_meta');

/**
 * Add checkmark shortcode
 */
function _s_check_shortcode() {
  return '<span class="checkmark">&#10004;</span>';
}
add_shortcode( 'check', '_s_check_shortcode' );
