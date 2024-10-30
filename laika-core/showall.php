<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class laika_showall{
	 public function laika_createpage(){
		
		
		add_action( 'init', array($this,'register_newpage'));
 

		
	}
	
	function register_newpage(){
    if (get_option('laika_pt_archive', '') != '' && get_option('laika_pt_archive', '') != 0){
		add_action('the_content',  array($this,'laika_pt_after1'));
	}
}

function laika_pt_after1($content){
	$i = 0;
	
			if (get_the_id()==get_option('laika_pt_archive')){
			 
			 
			require_once('showall-fields.php');
				$content .= $showall;
				
		
		 return $content;
		
		
		
		
		
		
		
		
		
		
		
		}else{
			return $content;
		}
			
		
		
	}
}
