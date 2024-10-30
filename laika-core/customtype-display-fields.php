<?php
//$laik_post_id = $post->ID;
$laik_cont_fields = '';
	$key_laika_values = get_post_meta( $post->ID ); 
	$fields_laika     = get_option('laikafdrag_inputs', '');
			  $fields_laikar = LaikaFieldsgetContents($fields_laika, '@tag@-', '@matag'); //tag saved in settings
			  $fields_laikar_ma = LaikaFieldsgetContents($fields_laika, '@matag@-', '@tag'); //machine tag saved in settings
			  $i=0;
			 $laik_field_array = [];
			 $laik_field_array_tag= [];
			 if (is_array($key_laika_values)){
					foreach ($key_laika_values as $keys=>$val){
						if (substr( $keys, 0, 9 ) === "laiktagdb"){
						
						$laik_field_array[$i] = $val[0]; //value saved in db of this post
						$laik_field_array_tag[$i] = $keys; //machine tag saved in db of this post
						$i++;
					}}}




$i = 0;
$n = 0;
		
	while (  sizeof ($fields_laikar_ma) > $i){
$z = 0;		
$m = false;
		while (sizeof($laik_field_array) > $z){
			
			if ($laik_field_array_tag[$z] == 'laiktagdb'.$fields_laikar_ma[$i]){
		$laik_fields_displ [$n]='<strong>'. $fields_laikar[$i] .': </strong>'.$laik_field_array[$z].'</br>';
		$n++;
		$m = true;
		}
		$z++;
	}
	
	if (sizeof($laik_field_array) == $z){
		if (!$m){
			//lets show anyway the tag if is empty
			
			$laik_fields_displ [$n] = '<strong>'. $fields_laikar[$i] .': </strong></br>';
			$n++;
			
		}}
	
	$i++;}
	
	$x = 0;
	$laik_cont_fields .= '<div id="laika-fields">';
	$laik_cont_fields .= '<div id="laika-leftie-fields">';
	while ($x<$n){
	//leftie
	$laik_cont_fields .= $laik_fields_displ [$x];
	$x= $x+2;}
	$x = 1;
	$laik_cont_fields .= '</div><div id="laika-alt-right-fields">';
	while ($x<$n){
	//alt-right
	$laik_cont_fields .= $laik_fields_displ [$x];
	$x= $x+2;}
	$laik_cont_fields .= '</div></div>';
