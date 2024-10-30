 <?php
 if ( ! defined( 'ABSPATH' ) ) exit;
		//variables from DB
		
		$fields_laika     = get_option('laikafdrag_inputs', '');
        $pets_code        = esc_html(trim(get_post_meta($pets_type->ID, 'laika_pt_code', true)));
        $pets_description = esc_html(trim(get_post_meta($pets_type->ID, 'laika_pt_description', true)));
        $pets_sex         = esc_html(trim(get_post_meta($pets_type->ID, 'laika_pt_sex', true)));
        $pets_links       = esc_html(trim(get_post_meta($pets_type->ID, 'laika_pt_links', true)));
        $pets_archive     = esc_html(trim(get_post_meta($pets_type->ID, 'laika_pt_archive', true)));
        $pets_mum         = esc_html(trim(get_post_meta($pets_type->ID, 'laika_pt_mum', true)));
        $pets_dad         = esc_html(trim(get_post_meta($pets_type->ID, 'laika_pt_dad', true)));
        $checked_m        = '';
        $checked_f        = 'checked';
        $checked_link     = 'checked';
        $checked_archive  = 'checked';
        $checked_no_link  = '';
        $checked_no_archive  = '';
        if ($pets_sex == 'male'){
			$checked_f  = '';
			$checked_m  = 'checked';
		}
		 if ($pets_links == 'no'){
			$checked_link  = '';
			$checked_no_link  = 'checked';
		}
		 if ($pets_archive == 'no'){
			$checked_archive  = '';
			$checked_no_archive  = 'checked';
		}
		//gets mums and dads
		
		   $l                = 0;
    $k                = 0;
    $i                = 0;
    $args             = array(
        'post_type' => 'laika_pt_type',
        'posts_per_page' => -1
    );
    $your_query       = new WP_Query($args);
    while ($your_query->have_posts()):
        $your_query->the_post();
        //$post_id[$i]=get_the_ID();
        if ($post_mum_ident_meta[$i] = esc_html(trim(get_post_meta(get_the_ID(), 'laika_pt_sex', true))) == 'female') {
            $laika_id_loop_f[$k] = esc_html(trim(get_post_meta(get_the_ID(), 'laika_pt_code', true)));
            $laika_id_loop_namef[$k] = get_the_title();
            $k++;
        }
        if ($post_mum_ident_meta[$i] = esc_html(trim(get_post_meta(get_the_ID(), 'laika_pt_sex', true))) == 'male') {
            $laika_id_loop_m[$l] = esc_html(trim(get_post_meta(get_the_ID(), 'laika_pt_code', true)));
            $laika_id_loop_namem[$l] = get_the_title();
            $l++;
        }
        $laika_id_loop_a[$i] = esc_html(trim(get_post_meta(get_the_ID(), 'laika_pt_code', true)));
        $i++;
    endwhile;
    wp_reset_postdata();
    
    //visuaally blocks update same identifier
    ?>
   <!-- THE SCRIPT HAS BEEN DELETED BECAUSE INCOMPABILITY, it will be upload soon and in the right way -->
			<?php
			
			
        //strings into variables
        $male_tr          = __('Male', 'laika-pedigree-tree');
        $female_tr        = __('Female', 'laika-pedigree-tree');
        $tags_tr          = __('Tags', 'laika-pedigree-tree');
        $bold_tr          = __('Bold', 'laika-pedigree-tree');
        $clbold_tr        = __('Close Bold', 'laika-pedigree-tree');
        $newl_tr          = __('New Line', 'laika-pedigree-tree');
        $show_link        = __('Show', 'laika-pedigree-tree');
        $hide_link        = __('Hide', 'laika-pedigree-tree');
        
        _e('Give a unique identifier to this pet', 'laika-pedigree-tree');
?>
			<p> ID: <input type='text' id= 'laika_pt_code' name='laika_pt_code' value='<?php
        echo esc_attr($pets_code);
?> '/> </p><hr><?php
        _e('Description (this will only be displayed on the tree)', 'laika-pedigree-tree');
?><p><textarea rows="4" cols="50" name='laika_pt_description'/> <?php
        if (isset($pets_description)) {
            echo esc_attr($pets_description);
        }
?> </textarea> </p><?php
        echo $tags_tr . ': <strong>[b]</strong> -> ' . $bold_tr . ', <strong>[/b]</strong> -> ' . $clbold_tr . ', <strong>[n]</strong> -> ' . $newl_tr;
        echo '<p></p><hr>';
        _e('Gender of this pet', 'laika-pedigree-tree');
       
            echo '<p><input type="radio" name="laika_pt_sex" value="female"'.$checked_f.'  > ' . $female_tr . '<br>
			  <input type="radio" name="laika_pt_sex" value="male" '.$checked_m.'> ' . $male_tr . '</p><hr>';
        
        _e('Identifier of the mum', 'laika-pedigree-tree');
?>

		   <p> ID: <input type='text' name='laika_pt_mum' value='<?php
        echo esc_attr($pets_mum);
?> '/> </p>
		   <?php
        _e('Or select from the list', 'laika-pedigree-tree');
?>
			  <select name='laika_pt_mumb'>
			   <option value='null_option'>-</option>;
			  <?php
        for ($k = 0; $k < sizeof($laika_id_loop_f); $k++) {
            if ($pets_code != $laika_id_loop_f[$k]) {
                echo '<option value="' . $laika_id_loop_f[$k] . '">' . $laika_id_loop_f[$k] . ' ('.$laika_id_loop_namef[$k].')</option>';
            }
        }
?> </select> 
			
			   <hr>
			   <?php
        _e('Identifier of the dad', 'laika-pedigree-tree');
?>
			   <p> ID: <input type='text' name='laika_pt_dad' value='<?php
        echo esc_attr($pets_dad);
?> '/> </p> 
			   <?php
        _e('Or select from the list', 'laika-pedigree-tree');
?>
				  <select name='laika_pt_dadb'>
				   <option value='null_option'>-</option>;
				  <?php
        for ($l = 0; $l < sizeof($laika_id_loop_m); $l++) {
            if ($pets_code != $laika_id_loop_m[$l]) {
                echo '<option value="' . $laika_id_loop_m[$l] . '">' . $laika_id_loop_m[$l] . ' ('.$laika_id_loop_namem[$l].')</option>';
            }
        }
?>
			</select>
			   <?php
        echo '<hr>';
        _e('Show link to this pet on the tree', 'laika-pedigree-tree');
        
            echo '<p><input type="radio" name="laika_pt_links" value="yes" '.$checked_link.' > ' . $show_link . '<br>
					  <input type="radio" name="laika_pt_links" value="no" '.$checked_no_link.' > ' . $hide_link . '</p><hr>';
					  
					
       
        _e('Show this pet on archive', 'laika-pedigree-tree');
        
            echo '<p><input type="radio" name="laika_pt_archive" value="yes" '.$checked_archive.' > ' . $show_link . '<br>
					  <input type="radio" name="laika_pt_archive" value="no" '.$checked_no_archive.' > ' . $hide_link . '</p>';
					  
					  
					  //custom fields
					 
					  $fields_laikar = LaikaFieldsgetContents($fields_laika, '@tag@-', '@matag@');
					  $fields_laikarmat = LaikaFieldsgetContents($fields_laika, '@matag@-', '@tag');
					  $i = 0;
					  foreach ($fields_laikar as $fields_laikas){
						  echo  "<p>".$fields_laikas.": <input type='text' name='laiktag".$fields_laikarmat[$i]."' value='".esc_html(trim(get_post_meta($pets_type->ID, 'laiktagdb'.$fields_laikarmat[$i], true)))."'/> </p>";
						  $i++;
						 
					  }
				
					    
					  ?>
					  
					 <input type="hidden" name="FIELD_NONB" value="<?php echo wp_create_nonce('FEL_NONB'); ?>"/> <?php
       
