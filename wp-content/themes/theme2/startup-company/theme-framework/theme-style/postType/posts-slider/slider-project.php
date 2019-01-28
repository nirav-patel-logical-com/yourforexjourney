<?php
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version		1.0.5
 * 
 * Posts Slider Project Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_metadata = explode(',', $cmsmasters_project_metadata);


$title = in_array('title', $cmsmasters_metadata) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && in_array('categories', $cmsmasters_metadata)) ? true : false;
$comments = (comments_open() && in_array('comments', $cmsmasters_metadata)) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;


$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);
$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);
$cmsmasters_project_link_target = get_post_meta(get_the_ID(), 'cmsmasters_project_link_target', true);


$cmsmasters_post_format = get_post_format();

?>
<!-- Start Posts Slider Project Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_project'); ?>>
	<div class="cmsmasters_slider_project_outer">
	<?php 
		$title ? startup_company_slider_post_heading(get_the_ID(), 'project', 'h3', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url, true, $cmsmasters_project_link_target) : '';
		
		echo '<div class="cmsmasters_slider_project_inner">';
			startup_company_thumb_rollover(get_the_ID(), 'cmsmasters-project-thumb', false, false, false, false, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
			
			
			if ($categories || $comments || $likes) {
				echo '<div class="cmsmasters_slider_project_cont_wrap">' . 
					'<div class="cmsmasters_slider_project_cont_wrap_inner">';
						
						
						if ($categories) {
							echo '<div class="cmsmasters_slider_project_cont_info entry-meta">';
								
								startup_company_get_slider_post_category(get_the_ID(), 'pj-categs', 'project');
								
							echo '</div>';
						}
						
						
						if ($comments || $likes) {
							echo '<footer class="cmsmasters_slider_project_footer entry-meta">';
								
								($comments) ? startup_company_get_slider_post_comments('project') : '';
								
								($likes) ? startup_company_slider_post_like('project') : '';
								
							echo '</footer>';
						}
						
						
					echo '</div>' . 
				'</div>';
			}
			
		echo '</div>';
	?>
	</div>
</article>
<!-- Finish Posts Slider Project Article -->

