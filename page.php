<?php 
	global $index,$sections;
		while(have_posts()): the_post();
			$sections=get_field('modules'); 
			for($index=0;$index<count($sections);$index++){
				if($sections[$index]['acf_fc_layout']=='home_hero'){
					get_template_part('templates/home/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='partners_logos'){
					get_template_part('templates/home/section','logos');
				}else if($sections[$index]['acf_fc_layout']=='latest_resources'){
					get_template_part('templates/home/section','resources');
				}else if($sections[$index]['acf_fc_layout']=='upcoming_webinar'){
					get_template_part('templates/home/section','wibenar');
				}else if($sections[$index]['acf_fc_layout']=='features'){
					get_template_part('templates/home/section','features');
				}else if($sections[$index]['acf_fc_layout']=='reviews'){
					get_template_part('templates/home/section','reviews');
				}else if($sections[$index]['acf_fc_layout']=='lets_talk'){
					get_template_part('templates/home/section','lets-talk');
				}else if($sections[$index]['acf_fc_layout']=='contact_us_hero'){
					get_template_part('templates/contact/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='contact_form'){
					get_template_part('templates/contact/section','form');
				}else if($sections[$index]['acf_fc_layout']=='contact_info'){
					get_template_part('templates/contact/section','info');
				}else if($sections[$index]['acf_fc_layout']=='about_hero'){
					get_template_part('templates/about/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='about_details'){
					get_template_part('templates/about/section','details');
				}else if($sections[$index]['acf_fc_layout']=='about_logos'){
					get_template_part('templates/about/section','logos');
				}else if($sections[$index]['acf_fc_layout']=='about_newsletter'){
					get_template_part('templates/about/section','newsletter');
				}else if($sections[$index]['acf_fc_layout']=='about_details_with_list'){
					get_template_part('templates/about/section','details-with-list');
				}else if($sections[$index]['acf_fc_layout']=='about_team'){
					get_template_part('templates/about/section','team');
				}else if($sections[$index]['acf_fc_layout']=='about_duel_post_cta'){
					get_template_part('templates/about/section','doule-posts');
				}else if($sections[$index]['acf_fc_layout']=='features_archive_hero'){
					get_template_part('templates/features/section','archive-hero');
				}else if($sections[$index]['acf_fc_layout']=='features_lists'){
					get_template_part('templates/features/section','lists');
				}else if($sections[$index]['acf_fc_layout']=='feature_review'){
					get_template_part('templates/features/section','stars-review');
				}else if($sections[$index]['acf_fc_layout']=='features_details_hero'){
					get_template_part('templates/feature-single/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='feature_split_content'){
					get_template_part('templates/feature-single/section','information');
				}else if($sections[$index]['acf_fc_layout']=='three_column_section'){
					get_template_part('templates/feature-single/section','three-column-grid');
				}else if($sections[$index]['acf_fc_layout']=='single_review_no_background'){
					get_template_part('templates/feature-single/section','review');
				}else if($sections[$index]['acf_fc_layout']=='related_features'){
					get_template_part('templates/feature-single/section','related-features');
				}else if($sections[$index]['acf_fc_layout']=='resources_hero'){
					get_template_part('templates/resources/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='resources_intro'){
					get_template_part('templates/resources/section','info');
				}else if($sections[$index]['acf_fc_layout']=='resources_list'){
					get_template_part('templates/resources/section','list');
				}else if($sections[$index]['acf_fc_layout']=='why_hero'){
					get_template_part('templates/why/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='two_colum_information'){
					get_template_part('templates/why/section','2-column-info');
				}else if($sections[$index]['acf_fc_layout']=='four_column_image_with_title'){
					get_template_part('templates/why/section','4-column-list');
				}else if($sections[$index]['acf_fc_layout']=='video_infromation'){
					get_template_part('templates/why/section','video');
				}else if($sections[$index]['acf_fc_layout']=='customers_archive_hero'){
					get_template_part('templates/customers-archive/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='after_hero_intro'){
					get_template_part('templates/customers-archive/section','after-hero-intro');
				}else if($sections[$index]['acf_fc_layout']=='customers_list'){
					get_template_part('templates/customers-archive/section','customers-list');
				}else if($sections[$index]['acf_fc_layout']=='customers_details_hero'){
					get_template_part('templates/customers-single/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='centered_content'){
					get_template_part('templates/customers-single/section','centered-content');
				}else if($sections[$index]['acf_fc_layout']=='blockquote'){
					get_template_part('templates/customers-single/section','quate');
				}else if($sections[$index]['acf_fc_layout']=='partners_hero'){
					get_template_part('templates/partners/section','hero');
				}else if($sections[$index]['acf_fc_layout']=='partners_list'){
					get_template_part('templates/partners/section','list');
				}else if($sections[$index]['acf_fc_layout']=='partners_webinar'){
					get_template_part('templates/partners/section','webinar');
				}

			}
		endwhile
	?>
	
 