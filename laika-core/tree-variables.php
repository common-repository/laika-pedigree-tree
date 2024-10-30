<?php

if ( ! defined( 'ABSPATH' ) ) exit;
$laika_gen = get_option('laika_pt_generations', 3);
$i =0;
$laika_vars = '';
$argsb      = array(
                'post_type' => 'laika_pt_type',
                'posts_per_page' => -1
            );
            $your_query = new WP_Query($argsb);
            while ($your_query->have_posts()):
                $your_query->the_post();

		//$laika_title[$i] = isset( $post->post_title ) ? $post->post_title : '';
		$laika_id[$i] = $post->ID ;
     // $laika_link[$i] = get_permalink();
      $laika_ident[$i] = get_post_meta(	$laika_id[$i],'laika_pt_code', true);
      //$laika_show_link[$i] = get_post_meta(	$laika_id[$i],'laika_pt_links', true);
      //$laika_description[$i] = get_post_meta($laika_id[$i], 'laika_pt_description', true);
      $laika_mum_ident[$i] = get_post_meta($laika_id[$i], 'laika_pt_mum', true);
      $laika_dad_ident[$i] = get_post_meta($laika_id[$i], 'laika_pt_dad', true);



$i++;
endwhile;
 wp_reset_postdata();
 
 //variables of this post

		
	  //$laika_title_this =$post->post_title;
	  $laika_id_this = $post->ID ;
      //$laika_link_this = get_permalink();
      $laika_ident_this = get_post_meta($laika_id_this,'laika_pt_code', true);
      //$laika_show__this = get_post_meta($laika_id_this,'laika_pt_links', true);
      //$laika_description_this = get_post_meta($laika_id_this, 'laika_pt_description', true);
      $laika_mum_ident_this = get_post_meta($laika_id_this, 'laika_pt_mum', true);
      $laika_dad_ident_this = get_post_meta($laika_id_this, 'laika_pt_dad', true);

//Detects the post ident code of mum and dad
for ($j=0; $j<sizeof($laika_id); $j++){
	
	if ($laika_ident[$j] == $laika_mum_ident_this ){
		$laika_gen_id[0] = $laika_id[$j]; //mum
		if (get_post_meta($laika_gen_id[0],'laika_pt_code', true) != ''){
		$laika_gen_ident[0] = get_post_meta($laika_gen_id[0],'laika_pt_code', true); //ident mum
	}
	}
	if ($laika_ident[$j] == $laika_dad_ident_this){
		$laika_gen_id[1] = $laika_id[$j]; //dad
		if (get_post_meta($laika_gen_id[1],'laika_pt_code', true) != ''){
		$laika_gen_ident[1] = get_post_meta($laika_gen_id[1],'laika_pt_code', true);} //ident dad
		
	}
}

//Detect the post id of mum and dad from mum and dad  (granparents)

	if (isset($laika_gen_id[0])){
$laika_gen_ident[2] = get_post_meta($laika_gen_id[0], 'laika_pt_mum', true); //ident mum of mum
$laika_gen_ident[3] = get_post_meta($laika_gen_id[0], 'laika_pt_dad', true); //ident dad of mum
}	if (isset($laika_gen_id[1])){
$laika_gen_ident[4] = get_post_meta($laika_gen_id[1], 'laika_pt_mum', true); //ident mum of dad
$laika_gen_ident[5] = get_post_meta($laika_gen_id[1], 'laika_pt_dad', true); //ident dad of dad
}
for ($j=0; $j<sizeof($laika_id); $j++){
	
	if (isset($laika_gen_ident[2]) && $laika_gen_ident[2] != ''){
	if ($laika_ident[$j] == $laika_gen_ident[2]){
		$laika_gen_id[2] = $laika_id[$j];}} //id mum of mum
	if (isset($laika_gen_ident[3]) && $laika_gen_ident[3] != ''){
	if ($laika_ident[$j] == $laika_gen_ident[3]){
		$laika_gen_id[3] = $laika_id[$j];}} //id mum of mum
	if (isset($laika_gen_ident[4]) && $laika_gen_ident[4] != ''){
	if ($laika_ident[$j] == $laika_gen_ident[4]){
		$laika_gen_id[4] = $laika_id[$j];}} //id mum of mum
	if (isset($laika_gen_ident[5]) && $laika_gen_ident[5] != ''){
	if ($laika_ident[$j] == $laika_gen_ident[5]){
		$laika_gen_id[5] = $laika_id[$j];}} //id mum of mum	
				
		}

//Does the same for a bigger generation
if (isset($laika_gen_id[2])){
$laika_gen_ident[6] = get_post_meta($laika_gen_id[2], 'laika_pt_mum', true); }
if (isset($laika_gen_id[2])){
$laika_gen_ident[7] = get_post_meta($laika_gen_id[2], 'laika_pt_dad', true); }
if (isset($laika_gen_id[3])){
$laika_gen_ident[8] = get_post_meta($laika_gen_id[3], 'laika_pt_mum', true); }
if (isset($laika_gen_id[3])){
$laika_gen_ident[9] = get_post_meta($laika_gen_id[3], 'laika_pt_dad', true); }
if (isset($laika_gen_id[4])){
$laika_gen_ident[10] = get_post_meta($laika_gen_id[4], 'laika_pt_mum', true);}
if (isset($laika_gen_id[4])){ 
$laika_gen_ident[11] = get_post_meta($laika_gen_id[4], 'laika_pt_dad', true);}
if (isset($laika_gen_id[5])){ 
$laika_gen_ident[12] = get_post_meta($laika_gen_id[5], 'laika_pt_mum', true);} 
if (isset($laika_gen_id[5])){
$laika_gen_ident[13] = get_post_meta($laika_gen_id[5], 'laika_pt_dad', true); 
}
for ($j=0; $j<sizeof($laika_id); $j++){
	
	if (isset($laika_gen_ident[6])){
	if ($laika_ident[$j] == $laika_gen_ident[6]){
		$laika_gen_id[6] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[7])){
	if ($laika_ident[$j] == $laika_gen_ident[7]){
		$laika_gen_id[7] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[8])){
	if ($laika_ident[$j] == $laika_gen_ident[8]){
		$laika_gen_id[8] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[9])){
	if ($laika_ident[$j] == $laika_gen_ident[9]){
		$laika_gen_id[9] = $laika_id[$j];} 	} 
		if (isset($laika_gen_ident[10])){
	if ($laika_ident[$j] == $laika_gen_ident[10]){
		$laika_gen_id[10] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[11])){
	if ($laika_ident[$j] == $laika_gen_ident[11]){
		$laika_gen_id[11] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[12])){
	if ($laika_ident[$j] == $laika_gen_ident[12]){
		$laika_gen_id[12] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[13])){
	if ($laika_ident[$j] == $laika_gen_ident[13]){
		$laika_gen_id[13] = $laika_id[$j];} } 				
		}

//Does the same for an even bigger generation
if ($laika_gen==4){
if (isset($laika_gen_id[6])){
$laika_gen_ident[14] = get_post_meta($laika_gen_id[6], 'laika_pt_mum', true); }
if (isset($laika_gen_id[6])){
$laika_gen_ident[15] = get_post_meta($laika_gen_id[6], 'laika_pt_dad', true); }
if (isset($laika_gen_id[7])){
$laika_gen_ident[16] = get_post_meta($laika_gen_id[7], 'laika_pt_mum', true); }
if (isset($laika_gen_id[7])){
$laika_gen_ident[17] = get_post_meta($laika_gen_id[7], 'laika_pt_dad', true); }
if (isset($laika_gen_id[8])){
$laika_gen_ident[18] = get_post_meta($laika_gen_id[8], 'laika_pt_mum', true);}
if (isset($laika_gen_id[8])){ 
$laika_gen_ident[19] = get_post_meta($laika_gen_id[8], 'laika_pt_dad', true);}
if (isset($laika_gen_id[9])){ 
$laika_gen_ident[20] = get_post_meta($laika_gen_id[9], 'laika_pt_mum', true);} 
if (isset($laika_gen_id[9])){
$laika_gen_ident[21] = get_post_meta($laika_gen_id[9], 'laika_pt_dad', true);}
if (isset($laika_gen_id[10])){
$laika_gen_ident[22] = get_post_meta($laika_gen_id[10], 'laika_pt_mum', true); }
if (isset($laika_gen_id[10])){
$laika_gen_ident[23] = get_post_meta($laika_gen_id[10], 'laika_pt_dad', true); }
if (isset($laika_gen_id[11])){
$laika_gen_ident[24] = get_post_meta($laika_gen_id[11], 'laika_pt_mum', true); }
if (isset($laika_gen_id[11])){
$laika_gen_ident[25] = get_post_meta($laika_gen_id[11], 'laika_pt_dad', true); }
if (isset($laika_gen_id[12])){
$laika_gen_ident[26] = get_post_meta($laika_gen_id[12], 'laika_pt_mum', true);}
if (isset($laika_gen_id[12])){ 
$laika_gen_ident[27] = get_post_meta($laika_gen_id[12], 'laika_pt_dad', true);}
if (isset($laika_gen_id[13])){ 
$laika_gen_ident[28] = get_post_meta($laika_gen_id[13], 'laika_pt_mum', true);} 
if (isset($laika_gen_id[13])){
$laika_gen_ident[29] = get_post_meta($laika_gen_id[13], 'laika_pt_dad', true); 
}


for ($j=0; $j<sizeof($laika_id); $j++){
	
	if (isset($laika_gen_ident[14])){
	if ($laika_ident[$j] == $laika_gen_ident[14]){
		$laika_gen_id[14] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[15])){
	if ($laika_ident[$j] == $laika_gen_ident[15]){
		$laika_gen_id[15] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[16])){
	if ($laika_ident[$j] == $laika_gen_ident[16]){
		$laika_gen_id[16] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[17])){
	if ($laika_ident[$j] == $laika_gen_ident[17]){
		$laika_gen_id[17] = $laika_id[$j];} 	} 
		if (isset($laika_gen_ident[18])){
	if ($laika_ident[$j] == $laika_gen_ident[18]){
		$laika_gen_id[18] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[19])){
	if ($laika_ident[$j] == $laika_gen_ident[19]){
		$laika_gen_id[19] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[20])){
	if ($laika_ident[$j] == $laika_gen_ident[20]){
		$laika_gen_id[20] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[21])){
	if ($laika_ident[$j] == $laika_gen_ident[21]){
		$laika_gen_id[21] = $laika_id[$j];} } 				
		
	if (isset($laika_gen_ident[22])){
	if ($laika_ident[$j] == $laika_gen_ident[22]){
		$laika_gen_id[22] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[23])){
	if ($laika_ident[$j] == $laika_gen_ident[23]){
		$laika_gen_id[23] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[24])){
	if ($laika_ident[$j] == $laika_gen_ident[24]){
		$laika_gen_id[24] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[25])){
	if ($laika_ident[$j] == $laika_gen_ident[25]){
		$laika_gen_id[25] = $laika_id[$j];} 	} 
		if (isset($laika_gen_ident[26])){
	if ($laika_ident[$j] == $laika_gen_ident[26]){
		$laika_gen_id[26] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[27])){
	if ($laika_ident[$j] == $laika_gen_ident[27]){
		$laika_gen_id[27] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[28])){
	if ($laika_ident[$j] == $laika_gen_ident[28]){
		$laika_gen_id[28] = $laika_id[$j];} } 
		if (isset($laika_gen_ident[29])){
	if ($laika_ident[$j] == $laika_gen_ident[29]){
		$laika_gen_id[29] = $laika_id[$j];} } 	
		
		
		
		
		
		
		}}

   $totalpets = 14;
if ($laika_gen==4){
	$totalpets = 30;
}

for ($m=0;$m<$totalpets;$m++){
	if (isset($laika_gen_id[$m]) && get_post_meta(	$laika_gen_id[$m],'laika_pt_code', true) !=''){
		$laika_idb[$m] = $laika_gen_id[$m] ;
		$laika_titleb[$m] = get_the_title( $laika_gen_id[$m]);
      $laika_linkb[$m] = get_permalink($laika_gen_id[$m]);
      
      $laika_img[$m] = get_the_post_thumbnail($laika_gen_id[$m], array( 50, 50));
      if ($laika_img[$m]==''){
		  $laika_img[$m]= "&nbsp;";
	  }
      
      $laika_identb[$m] = get_post_meta(	$laika_gen_id[$m],'laika_pt_code', true);
      
      $laika_show_linkb[$m] = get_post_meta(	$laika_gen_id[$m],'laika_pt_links', true);
     
      $laika_descriptionb[$m] = get_post_meta($laika_gen_id[$m], 'laika_pt_description', true);
      $laika_descriptionb[$m] = bbcodeconv($laika_descriptionb[$m]);
      $laika_mum_identb[$m] = get_post_meta($laika_gen_id[$m], 'laika_pt_mum', true);
      $laika_dad_identb[$m] = get_post_meta($laika_gen_id[$m], 'laika_pt_dad', true);
	
}
if (!isset( $laika_show_linkb[$m])){
		  $laika_show_linkb[$m] = "yes";
	 }
}
return  '';

function bbcodeconv($transfbbc){
		if (strrpos($transfbbc, "[b]")){
			if (!strrpos($transfbbc, "[/b]")){
				return $transfbbc;
				exit;
			}
			
			if (strripos($transfbbc, '[b]') > strripos($transfbbc, '[/b]')){
				return $transfbbc;
				exit;
		}}
		if (substr_count($transfbbc, '[b]') == substr_count($transfbbc, '[/b]')){
	    $transfbbc=str_ireplace('[b]','<strong>',$transfbbc);
		$transfbbc=str_ireplace('[/b]','</strong>',$transfbbc);}
		$transfbbc=str_ireplace('[n]','</br>',$transfbbc);
		return $transfbbc;
		
	}
