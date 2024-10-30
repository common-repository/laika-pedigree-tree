<?php

if ( ! defined( 'ABSPATH' ) ) exit;



	
	


$firstgend = get_option('laika_pt_gendfirst', 'f');
$laika_disp_ret ='';
global $post;
$laik_post_id = $post->ID;

require_once('tree-variables.php');
$laikaempty = get_option('laika_pt_empty', '---');
$laikadirecti = get_option('laika_pt_direc', '0');
$laika_disp_ret .= '<div id="laikascrow"><div id="laikacont"> ';
$laika_gen = get_option('laika_pt_generations', 3);
if ($laika_gen == 1){
	$petsdispl =  2;
}
if ($laika_gen == 2){
	$petsdispl =  6;
}
if ($laika_gen == 3){
	$petsdispl =  14;
}

if ($laika_gen == 4){
	$petsdispl =  30;
}

for ($mn = 0; $mn < $petsdispl; $mn++) {
	
	// $mn and $ are the same but different variables help us to draw the tree with males first, so it doesn't need to repeat code. It's a bit confusing but works. 
	
	$m = $mn;
	
	// Changing values if males go first
if ($firstgend == 'm'){
	
	switch ($mn) {
     case 0:
        $m =1;
        break;
     case 1:
       $m =0;
        break;
     case 2:
       $m =5;
        break;
     case 3:
       $m =4;
       break;
     case 4:
       $m =3;
       break;
     case 5:
       $m =2;
       break;      
     case 6:
        $m =13;
        break;
    case 7:
       $m =12;
        break;
     case 8:
       $m =11;
        break;
     case 9:
       $m =10;
       break;
     case 10:
       $m =9;
       break;
     case 11:
       $m =8;
       break;      
     case 12:
       $m =7;
       break;    
     case 13:
       $m =6;
       break;     
     case 14:
       $m =29;
       break;   
     case 15:
       $m =28;
       break;   
     case 16:
       $m =27;
        break;
     case 17:
       $m =26;
        break;
     case 18:
       $m =25;
       break;
     case 19:
       $m =24;
       break;
     case 20:
       $m =23;
       break;      
     case 21:
        $m =22;
        break;
    case 22:
       $m =21;
        break;
     case 23:
       $m =20;
        break;
     case 24:
       $m =19;
       break;
     case 25:
       $m =18;
       break;
     case 26:
       $m =17;
       break;      
     case 27:
       $m =16;
       break;    
     case 28:
       $m =15;
       break;     
     case 29:
       $m =14;
       break;   
           
            
}
}
	if ( $m == 0){
   
   $gendergenclass = 'laikagen1f';
   if ($laika_gen == 4){ $gendergenclass = 'laikagen1fg4';}
   
   }
    else if ($m == 1 ){
   $gendergenclass = 'laikagen1m';
   if ($laika_gen == 4){$gendergenclass = 'laikagen1mg4';}
   }
    else if( $m%2 == 0 && $m<6){
   $gendergenclass = 'laikagen2f';
   if ($laika_gen == 4){$gendergenclass = 'laikagen2fg4';}
   }
    else if( $m%2 !== 0 && $m<6){
   $gendergenclass = 'laikagen2m';
   if ($laika_gen == 4){ $gendergenclass = 'laikagen2mg4';}
   }
    else if( $m%2 == 0 && $m<14){
   $gendergenclass = 'laikagen3f';
   if ($laika_gen == 4){ $gendergenclass = 'laikagen3fg4';}
  }
     else if( $m%2 !== 0 && $m<14){
   $gendergenclass = 'laikagen3m';
   if ($laika_gen == 4){$gendergenclass = 'laikagen3mg4';}
   }
     else if( $m%2 == 0 ){
   $gendergenclass = 'laikagen4fg4';
  }
     else if( $m%2 !== 0 ){
   $gendergenclass = 'laikagen4mg4';
   }

   
   
if ($laikadirecti==0){
if ($mn == 0){
	if ($laika_gen < 4){
	$laika_disp_ret .= '<div id="laikagen1">';
    } else{ 
	$laika_disp_ret .= '<div id="laikagen1g4">';   }
}
if ($mn == 2){
	if ($laika_gen < 4){
	$laika_disp_ret .= '<div id="laikagen2"><div id="spacelaik1"></div>';}
	else{
	$laika_disp_ret .= '<div id="laikagen2g4"><div id="spacelaik1g4"></div>';}	
	}

if ($mn == 6){
	if ($laika_gen < 4){
	$laika_disp_ret .= '<div id="laikagen3"><div id="spacelaik2"></div>';}
	else{ 
    $laika_disp_ret .= '<div id="laikagen3g4"><div id="spacelaik2g4"></div>';}
}

if ($mn == 14){
	$laika_disp_ret .= '<div id="laikagen4g4"><div id="spacelaik2g4"></div>';}
}

else if ($laikadirecti==1){
	if ($mn == 0){
	if ($laika_gen < 4){	
	$laika_disp_ret .= '<div id="laikagen1l">';}
	else{
	$laika_disp_ret .= '<div id="laikagen1lg4">';}	
	}

if ($mn == 2){
    if ($laika_gen < 4){
	$laika_disp_ret .= '<div id="laikagen2l"><div id="spacelaik1"></div>';}
	else{
	$laika_disp_ret .= '<div id="laikagen2lg4"><div id="spacelaik1g4"></div>';}	
	
}
if ($mn == 6){
	if ($laika_gen < 4){
	$laika_disp_ret .= '<div id="laikagen3l"><div id="spacelaik2"></div>';}
	else{
	$laika_disp_ret .= '<div id="laikagen3lg4"><div id="spacelaik2g4"></div>';}	
	}

if ($mn == 14){
	$laika_disp_ret .= '<div id="laikagen4lg4"><div id="spacelaik2g4"></div>';}
}
   


    if ($laika_show_linkb[$m] != 'no') {
        if (isset($laika_linkb[$m]) && isset($laika_descriptionb[$m]) && $laika_descriptionb[$m] != '' ) {
            $laika_disp_ret .= '<div class="'.$gendergenclass.'"><div class="laika_thumbnail">'.$laika_img[$m].'</div><div class="infoparent_pt"><div class="infoson_pt">' . $laika_descriptionb[$m] .
             '</div></div><div class="laika_name"><a href="' . $laika_linkb[$m] . '">' . $laika_titleb[$m] . '</a></div><br/></div>';
        } else if (isset($laika_titleb[$m])) {
            $laika_disp_ret .= '<div class="'.$gendergenclass.'"><div class="laika_thumbnail">'.$laika_img[$m].'</div><div class="laika_name"><a href="' . $laika_linkb[$m] . '">' . $laika_titleb[$m] . '</a></div><br/></div>';
        } else {
            $laika_disp_ret .= '<div class="'.$gendergenclass.'"><div class="laika_thumbnail"></div><div class="laika_name">' . $laikaempty . '</div></br></div>';
        }
        
    }

else {
    if (isset($laika_linkb[$m]) && isset($laika_descriptionb[$m]) && $laika_descriptionb[$m] != '') {
  $laika_disp_ret .= '<div class="'.$gendergenclass.'"><div class="laika_thumbnail">'.$laika_img[$m].'</div><div class="infoparent_pt"><div class="infoson_pt">' .$laika_descriptionb[$m] . '</div></div><div class="laika_name">' .  $laika_titleb[$m] . '</div><br/></div>';
} else if (isset( $laika_titleb[$m])) {
    $laika_disp_ret .= '<div class="'.$gendergenclass.'"><div class="laika_thumbnail">'.$laika_img[$m].'</div><div class="laika_name">' .  $laika_titleb[$m] . '</div><br/></div>';
      } else {
     $laika_disp_ret .= '<div class="'.$gendergenclass.'"><div class="laika_thumbnail"></div><div class="laika_name">' . $laikaempty . '</div></br></div>';
    }
      }
if ($mn == 1 || $mn == 5 || $mn == 13 || $mn == 29 ){
	$laika_disp_ret .= '</div>';
}

	}
$laika_disp_ret .= '</div></div></br>';



