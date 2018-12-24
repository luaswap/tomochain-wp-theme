<?php
/**
 *
 * @package    Tomochain
 * @version    1.0.0
 * @author     Administrator
 * @copyright  Copyright (c) 2018, Tomochain
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://tomochain.com
 */
$on_front = get_option('show_on_front');
$page_title_image = $style = '';
$event_banner = get_field('blog_header_image','options'); 
$blog_banner = get_field('blog_header_image','options');

if (!have_posts()) {
    $page_title = esc_html__("Nothing Found", 'tomochain');
} elseif (is_home()) {
    if (($on_front == 'page' && get_queried_object_id() == get_post(get_option('page_for_posts'))->ID) || ($on_front == 'posts')) {
        $page_title = esc_html__('Blog', 'tomochain');
        $page_title_image = $blog_banner;
    }
} elseif ( is_tax('event_category') ) {
    $page_title = single_term_title('', false);
    $page_title_image = $event_banner;
} elseif ( is_post_type_archive ('event') || is_singular('event')) {
    $page_title = esc_html__('Event & Media','tomochain');
    $page_title_image = $event_banner;
} elseif ( is_singular('post') ) {
    $page_title = esc_html__('Blog','tomochain');
    $page_title_image = $blog_banner;
} elseif (is_category()) {
    $page_title = single_cat_title('', false);
    $page_title_image = $blog_banner;
} elseif (is_tag()) {
    $page_title = single_tag_title(esc_html__("Tags: ", 'yolo-finanzen'), false);
    $page_title_image = $blog_banner;
} elseif (is_search()) {
    $page_title = sprintf(esc_html__('Search Results for: %s', 'tomochain'), get_search_query());
    $page_title_image = $blog_banner;
} else{
    $page_title = esc_html__('Archive Page','tomochain');
    $page_title_image = $blog_banner;
}
if($page_title_image) $style = 'background-image:url('.$page_title_image.')';
?>
<div class="top-banner-tomo page-event" style="<?php echo esc_attr($style); ?>">
    <div class="container">
        <h2><?php echo $page_title;?></h2>
    </div>
</div>