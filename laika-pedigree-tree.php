<?php
/*
* Plugin Name: Laika Pedigree Tree
* Description:  Draws a pedigree tree
* Version: 1.4
* Author: Burria
* Author URI: http://www.burria.com
* License: GPLv2
* Text Domain: laika-pedigree-tree
* Domain Path: /languages
*/

//languages
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LAIKA__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


function laika_pt_textdomain() {
	$laika_dir =   basename(dirname(__FILE__));
	load_plugin_textdomain( 'laika-pedigree-tree', false, $laika_dir.'/languages' );
}
 
 add_action('plugins_loaded', 'laika_pt_textdomain');






//contenttype
require_once( LAIKA__PLUGIN_DIR . 'laika-core/customtype.php' );
function laika_flush_rules()
{
    //defines the post type so the rules can be flushed.
    laika_content_type::laika_pt_create_post_type();
    //and flush the rules.
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'laika_flush_rules');
add_action('init', array('laika_content_type','laika_pt_create_post_type'));
add_action('admin-init', array('MetaBoxClass','add'));

function laika_start() {

	$plugin = new laika_Meta_Box();
	$plugin->init();
	

}
function laika_content_trigger() {
   
	
		add_action('the_content', 'laika_pt_after0');
        function laika_pt_after0($content)
        { 
			if (get_post_type() !== 'laika_pt_type'){
			
			return $content;
			
			}
			else{
				if ( is_single() )
				require_once( LAIKA__PLUGIN_DIR . 'laika-core/customtype-display.php' );
				require_once( LAIKA__PLUGIN_DIR . 'laika-core/customtype-display-fields.php' );
				return '<div id="laika-cont">'. $content .'</div>'.$laik_cont_fields . $laika_disp_ret;
				}}
	
	

}

function laika_settings(){
	$base_laika = plugin_basename( __FILE__ );
	require_once( LAIKA__PLUGIN_DIR . 'laika-core/settings.php' );
}

function laika_newpage(){
	require_once( LAIKA__PLUGIN_DIR . 'laika-core/showall.php' );
	
	$laika_show = new laika_showall();

$laika_show->laika_createpage();
}

laika_start();
laika_content_trigger();
laika_settings(); 
laika_newpage(); 

//This function should be somewhere else

function LaikaFieldsgetContents($str, $startDelimiter, $endDelimiter)
	{
	$contents = array();
	$startDelimiterLength = strlen($startDelimiter);
	$endDelimiterLength = strlen($endDelimiter);
	$startFrom = $contentStart = $contentEnd = 0;
	while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom)))
		{
		$contentStart+= $startDelimiterLength;
		$contentEnd = strpos($str, $endDelimiter, $contentStart);
		if (false === $contentEnd)
			{
			break;
			}

		$contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
		$startFrom = $contentEnd + $endDelimiterLength;
		}

	return $contents;
	}
