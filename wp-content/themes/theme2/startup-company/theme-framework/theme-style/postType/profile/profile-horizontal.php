<?php
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version		1.0.5
 * 
 * Profile Horizontal Template
 * Created by CMSMasters
 * 
 */


$columns_num = '';

if ($profile_columns == 1) {
	$columns_num = 'one_first';
} elseif ($profile_columns == 2) {
	$columns_num = 'one_half';
} elseif ($profile_columns == 3) {
	$columns_num = 'one_third';
} elseif ($profile_columns == 4) {
	$columns_num = 'one_fourth';
}


$cmsmasters_profile_social = get_post_meta(get_the_ID(), 'cmsmasters_profile_social', true);

$cmsmasters_profile_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_profile_subtitle', true);

?>
<!-- Start Profile Horizontal Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_profile_horizontal ' . $columns_num); ?>>
	<div class="profile_outer">
	<?php 
	echo '<div class="cmsmasters_img_social_wrap' . (has_post_thumbnail() ? '' : ' no_image') . '">' . 
		'<div class="cmsmasters_img_social_inner">';
		
			if (has_post_thumbnail()) {
				startup_company_thumb(get_the_ID(), 'cmsmasters-square-thumb', true, false, false, false, false);
			} else {
				echo '<div class="cmsmasters_img_wrap no_image">' . 
					'<span class="cmsmasters_theme_icon_image"></span>' . 
				'</div>';
			}
			
			startup_company_profile_social_icons($cmsmasters_profile_social, $profile_id);
			
		echo '</div>' . 
	'</div>';
	
	
	echo '<div class="profile_inner">';
		
		startup_company_profile_heading(get_the_ID(), 'h2', $cmsmasters_profile_subtitle, 'h6');
		
		startup_company_profile_exc_cont();
		
		startup_company_profile_social_icons($cmsmasters_profile_social, $profile_id);
		
	echo '</div>';
	?>
	</div>
</article>
<!-- Finish Profile Horizontal Article -->

