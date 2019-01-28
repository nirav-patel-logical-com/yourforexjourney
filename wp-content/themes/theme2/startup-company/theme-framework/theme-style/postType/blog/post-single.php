<?php
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version		1.0.6
 * 
 * Post Single Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = startup_company_get_global_options();

$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);


list($cmsmasters_layout) = startup_company_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-masonry-thumb';
} else {
	$cmsmasters_image_thumb_size = 'post-thumbnail';
}


$cmsmasters_post_format = get_post_format();


$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

$cmsmasters_post_author_box = get_post_meta(get_the_ID(), 'cmsmasters_post_author_box', true);

$cmsmasters_post_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_post_more_posts', true);

?>
<!-- Start Post Single Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_post'); ?>>
	<?php 
	if ($cmsmasters_option['startup-company' . '_blog_post_cat']) {
		startup_company_get_post_category(get_the_ID(), 'category', 'post');
	}
	
	
	if ($cmsmasters_post_title == 'true') {
		startup_company_post_title_nolink(get_the_ID(), 'h2');
	}
	
	
	if (
		$cmsmasters_option['startup-company' . '_blog_post_date'] || 
		$cmsmasters_option['startup-company' . '_blog_post_author'] 
	) {
		echo '<div class="cmsmasters_post_cont_info entry-meta">';
			
			startup_company_get_post_date('post');
			
			startup_company_get_post_author('post');
			
		echo '</div>';
	}
	
	
	if ($cmsmasters_post_format == 'image') {
		$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);
		
		startup_company_post_type_image(get_the_ID(), $cmsmasters_post_image_link, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == 'gallery') {
		$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));
		
		startup_company_post_type_slider(get_the_ID(), $cmsmasters_post_images, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == 'video') {
		$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);
		$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);
		$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);
		
		startup_company_post_type_video(get_the_ID(), $cmsmasters_post_video_type, $cmsmasters_post_video_link, $cmsmasters_post_video_links, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail()) {
		$cmsmasters_post_image_show = get_post_meta(get_the_ID(), 'cmsmasters_post_image_show', true);
		
		if ($cmsmasters_post_image_show != 'true') {
			startup_company_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'cmsmasters_open_post_img', false, false, false, true, false);
		}
	} elseif ($cmsmasters_post_format == 'audio') {
		$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);
		
		startup_company_post_type_audio($cmsmasters_post_audio_links);
	}
	
	
	if (get_the_content() != '') {
		echo '<div class="cmsmasters_post_content entry-content">';
			
			the_content();
			
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'startup-company') . ':</strong>', 
				'after' => '</div>', 
				'link_before' => ' [ ', 
				'link_after' => ' ] ' 
			));
			
		echo '</div>';
	}
	
	
	if (
		$cmsmasters_option['startup-company' . '_blog_post_tag'] || 
		$cmsmasters_option['startup-company' . '_blog_post_like'] || 
		$cmsmasters_option['startup-company' . '_blog_post_comment'] 
	) {
		echo '<footer class="cmsmasters_post_footer entry-meta">';
			
			startup_company_get_post_tags();
			
			
			if (
				$cmsmasters_option['startup-company' . '_blog_post_date'] || 
				$cmsmasters_option['startup-company' . '_blog_post_author'] 
			) {
				echo '<div class="cmsmasters_post_meta_info entry-meta">';
					
					startup_company_get_post_likes('post');
					
					startup_company_get_post_comments('post');
					
				echo '</div>';
			}
			
		echo '</footer>';
	}
	?>
</article>
<!-- Finish Post Single Article -->
<?php 

if ($cmsmasters_option['startup-company' . '_blog_post_nav_box']) {
	$order_cat = (isset($cmsmasters_option['startup-company' . '_blog_post_nav_order_cat']) ? $cmsmasters_option['startup-company' . '_blog_post_nav_order_cat'] : false);
	
	startup_company_prev_next_posts($order_cat, 'category');
}


if ($cmsmasters_post_sharing_box == 'true') {
	startup_company_sharing_box(esc_html__('Like this post?', 'startup-company'), 'h3');
}


if ($cmsmasters_post_author_box == 'true') {
	startup_company_author_box(esc_html__('About author', 'startup-company'), 'h3', 'h4');
}


if (get_the_tags()) {
	$tgsarray = array();
	
	foreach (get_the_tags() as $tagone) {
		$tgsarray[] = $tagone->term_id;
	}
} else {
	$tgsarray = '';
}


if ($cmsmasters_post_more_posts != 'hide') {
	startup_company_related( 
		'h3', 
		esc_html__('More posts', 'startup-company'), 
		esc_html__('No posts found', 'startup-company'), 
		$cmsmasters_post_more_posts, 
		$tgsarray, 
		$cmsmasters_option['startup-company' . '_blog_more_posts_count'], 
		$cmsmasters_option['startup-company' . '_blog_more_posts_pause'], 
		'post' 
	);
}


echo startup_company_get_pings(get_the_ID(), 'h3');


comments_template();

