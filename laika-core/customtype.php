<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class laika_content_type
{
    public static function laika_pt_create_post_type()
    {
        register_post_type('laika_pt_type', array(
            'labels' => array(
                'name' => 'Laika',
                'singular_name' => 'Laika',
                'add_new' => __('Add New', 'laika-pedigree-tree'),
                'add_new_item' => __('Add New Pet', 'laika-pedigree-tree'),
                'edit' => __('Edit', 'laika-pedigree-tree'),
                'edit_item' => __('Edit Pet', 'laika-pedigree-tree'),
                'new_item' => __('New Pet', 'laika-pedigree-tree'),
                'view' => __('View', 'laika-pedigree-tree'),
                'view_item' => __('View Pet', 'laika-pedigree-tree'),
                'search_items' => __('Search Pets', 'laika-pedigree-tree'),
                'not_found' => __('No Pets Found', 'laika-pedigree-tree'),
                'not_found_in_trash' => __('No Pets found in Trash', 'laika-pedigree-tree'),
                'parent' => __('Parent Pet', 'laika-pedigree-tree'),
                
            ),
            'rewrite' => array(
                'slug' => get_option('laika_pt_slug', 'pet')
            ),
            'public' => true,
            'menu_position' => 20,
            'supports' => array(
                'title',
                'editor',
                'thumbnail'
            ),
           'taxonomies' => array('tags', 'post_tag'), 
            'menu_icon' => plugins_url('../images/icon.png', __FILE__),
            'has_archive' => true
        ));
    }
}
class laika_Meta_Box
{
    public function init()
    {
        add_action('add_meta_boxes', array(
            $this,
            'add'
        ));
        add_action('save_post', array(
            $this,
            'save'
        ), 10, 3);
    }
    public function add()
    {
        add_meta_box('pet_meta_box', __('Pet Information', 'laika-pedigree-tree'), array(
            $this,
            'display'
        ), 'laika_pt_type');
    }
    public function display($pets_type)
    {
       require_once( LAIKA__PLUGIN_DIR . 'laika-core/customtype-fields.php' );
    }
    public function save($pets_type)
    {
		//delete all post meta from this plugin starting by laiktagdb, so if tags
		//change we clean the post of trash
		if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
	
		$key_laika_values = get_post_meta( $pets_type ); 
					foreach ($key_laika_values as $keys=>$val){
					if (substr( $keys, 0, 9 ) === "laiktagdb"){
						delete_post_meta($pets_type, $keys);
					}
				}}
	
	
		
		
		
		$i = 0;
		$id_block = 0;
		//makes sure no same Identifier exist on the DB
         $args       = array(
        'post_type' => 'laika_pt_type',
        'posts_per_page' => -1
    );
    $your_query = new WP_Query($args);
    while ($your_query->have_posts()):
        $your_query->the_post();
        $laika_id_loop[$i] = esc_html(trim(get_post_meta(get_the_ID(), 'laika_pt_code', true)));
        $i++;
    endwhile;
     wp_reset_postdata();
    for ($b = 0; $b < sizeof($laika_id_loop); $b++) {
        if (isset($_POST['laika_pt_code'])) {
            if ($laika_id_loop[$b] == trim(strip_tags($_POST['laika_pt_code'])) && trim(strip_tags($_POST['laika_pt_code'])) != $pets_codeb) {
                $id_block = 1;
            }
        }
    }
    if ($id_block == 0) {
        if (isset($_POST['laika_pt_code'])) {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_code', sanitize_text_field($_POST['laika_pt_code']));
        }}
    }
        if (isset($_POST['laika_pt_description'])) {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_description', sanitize_text_field($_POST['laika_pt_description']));
        }}
        if (isset($_POST['laika_pt_sex'])) {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_sex', sanitize_text_field($_POST['laika_pt_sex']));
        }}
        if (isset($_POST['laika_pt_links'])) {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_links', sanitize_text_field($_POST['laika_pt_links']));
        }}
        if (isset($_POST['laika_pt_archive'])) {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_archive', sanitize_text_field($_POST['laika_pt_archive']));
        }}
        if (isset($_POST['laika_pt_mum'])) {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_mum', sanitize_text_field($_POST['laika_pt_mum']));
        }}
        if (isset($_POST['laika_pt_mumb']) && $_POST['laika_pt_mumb'] != 'null_option') {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_mum', sanitize_text_field($_POST['laika_pt_mumb']));
        }}
        if (isset($_POST['laika_pt_dad'])) {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_dad', sanitize_text_field($_POST['laika_pt_dad']));
        }}
        if (isset($_POST['laika_pt_dadb']) && $_POST['laika_pt_dadb'] != 'null_option') {
			if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
            update_post_meta($pets_type, 'laika_pt_dad', sanitize_text_field($_POST['laika_pt_dadb']));
        }}
        if ( wp_verify_nonce( $_POST['FIELD_NONB'], 'FEL_NONB' ) ) {
        $fields_laika     = get_option('laikafdrag_inputs', '');
			  $fields_laikar = LaikaFieldsgetContents($fields_laika, '@matag@-', '@tag');
			  
			
			  
			foreach ($fields_laikar as $fields_laikas){
				 if (isset($_POST['laiktag'.$fields_laikas])){
			 update_post_meta($pets_type, 'laiktagdb'.$fields_laikas, sanitize_text_field($_POST['laiktag'.$fields_laikas]));	
			
		}}
		
		}
        
        
    }
}
//loads the CSS's
add_action('wp_head', 'laika_pt_head_scriptb');
    function laika_pt_head_scriptb($file)
    {
		if (get_post_type() == 'laika_pt_type'){
         if (get_option('laika_pt_default', 1) != 0){
     echo "<link rel='stylesheet' href='" . plugin_dir_url($file)  . "laika-pedigree-tree/css/laika.css' type='text/css' media='all' /> ";
	}
    }
    if (get_option('laika_pt_archive', '') != '' && get_option('laika_pt_archive', '') != 0 && get_option('laika_pt_archive', '') == get_the_ID() ){
    if (get_option('laika_pt_default', 1) != 0){
     echo "<link rel='stylesheet' href='" . plugin_dir_url($file)  . "laika-pedigree-tree/css/laikaarch.css' type='text/css' media='all' /> ";
        
    }}
}
	
