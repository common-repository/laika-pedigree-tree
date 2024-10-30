<?php	 
			 
		//Gets arguments from the url
		$laikagender = '';
		if ( isset ( $_GET["gender"] )){
		$laikagender = $_GET['gender'];	 
		$laikagender = sanitize_text_field($laikagender);
		 }
		
		$tagarglaik = '';
		if ( isset ( $_GET["tags"] )){
		$tagarglaik = $_GET["tags"];
		$tagarglaik = sanitize_text_field($tagarglaik);
		 }
			
			 
		if ( ! defined( 'ABSPATH' ) ) exit;	 
			 
			 $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			 $argsc      = array(
                'post_type' => 'laika_pt_type',
                'posts_per_page' => 12,
                'paged' => $paged,
                'meta_key' => 'laika_pt_archive',
                'meta_value' => 'yes',
                'meta_key' => 'laika_pt_sex',
                'meta_value' => $laikagender,
                'tag' => array($tagarglaik)
            );
            $showall ='';
            $your_query = new WP_Query($argsc);
            $showall .= '<ul class="laikgrid columns-3">';
            while ($your_query->have_posts()):
                $your_query->the_post();
			 $showall .= '<li>';
			
			
			 $showall .= '<a href='.get_permalink().'><h5>'.get_the_title().'</h5>';
			 $showall .= get_the_post_thumbnail().'</a>';
			
			 	$showall .= '</li>';
		
		
			 $i++;
			 
			 endwhile;
			 $showall .= '</ul>';
			 if ($your_query->max_num_pages > 1) {
			 $showall .= '<nav class="prev-next-posts">';
			 $showall .= '<div class="prev-posts-link">';
			 $oldent = __('Older Entries', 'laika-pedigree-tree');
			 $newent = __('Newer Entries', 'laika-pedigree-tree');
		$showall .= get_next_posts_link( $oldent, $your_query->max_num_pages );
		$showall .= '</div>';
		
		$showall .='<div class="next-posts-link">';
      $showall .= get_previous_posts_link( $newent );
   $showall .= '</div>';
     $showall .='</nav>';}
		
 wp_reset_postdata();

			 
			 
			
			 
			 
			 
			 
	
