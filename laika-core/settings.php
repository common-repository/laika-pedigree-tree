<?php

if (!defined('ABSPATH')) exit;
add_action('admin_menu', 'laika_pt_menu');
add_action('admin_menu', 'laika_pt_menu_field');

function laika_pt_menu()
	{
	add_options_page('Laika Configuration', __('Laika Configuration', 'laika-pedigree-tree') , 'manage_options', 'laika-options', 'laika_pt_config_page');
	}

function laika_pt_menu_field()
	{
	add_options_page('Laika Fields Configuration', __('Laika Fields Configuration', 'laika-pedigree-tree') , 'manage_options', 'laika-fields', 'laika_pt_config_fields_page');
	}

function laika_pt_config_page()
	{
	if (current_user_can('manage_options'))
		{
		$gen_laik = get_option('laika_pt_generations', 3);
		$slug_laik = get_option('laika_pt_slug', 'pet');
		$empty_laik = get_option('laika_pt_empty', '-');
		$def_laik = get_option('laika_pt_default', 1);
		$arc_laik = get_option('laika_pt_archive', '');
		$direc_laik = get_option('laika_pt_direc', '0');
		$genderfirst_laik = get_option('laika_pt_gendfirst', 'f');
		laika_settings_save($gen_laik, $direc_laik, $slug_laik, $empty_laik, $def_laik, $arc_laik, $genderfirst_laik);
		}
	}

function laika_settings_fields($gen_laik, $direc_laik, $slug_laik, $empty_laik, $def_laik, $arc_laik, $genderfirst_laik)
	{
	$value_select1 = '';
	$value_select2 = '';
	$value_select3 = '';
	$value_select4 = '';
	if ($gen_laik == 1)
		{
		$value_select1 = 'selected';
		}
	  else
	if ($gen_laik == 2)
		{
		$value_select2 = 'selected';
		}
	  else
	if ($gen_laik == 3)
		{
		$value_select3 = 'selected';
		}
	  else
		{
		$value_select4 = 'selected';
		}

	$def_laik_check = '';
	if ($def_laik == 1)
		{
		$def_laik_check = 'checked';
		}

	$def_laik_l = '';
	if ($direc_laik == 1)
		{
		$def_laik_l = 'checked';
		}

	$def_laik_fem = '';
	if ($genderfirst_laik == 'm')
		{
		$def_laik_fem = 'checked';
		}

?>
   <style>
.laikacursive {font-style: italic; font-size:90%;}
</style>

        
        

   <h2 class="nav-tab-wrapper">  
            <a href="?page=laika-options" class="nav-tab nav-tab-active"> <?php
	_e('Laika Settings');
?></a>  
            <a href="?page=laika-fields" class="nav-tab "> <?php
	_e('Laika Fields');
?></a>  
        </h2>  
        
        

    </br>
<form method="POST">
    
    <select name="generations">
    <option  <?php
	echo $value_select1;
?> value=1 >1</option>
    <option  <?php
	echo $value_select2;
?> value=2>2</option>
    <option <?php
	echo $value_select3;
?> value=3>3</option>
    <option <?php
	echo $value_select4;
?> value=4>4</option>

  </select><label for="laika_pt_generations"><?php
	_e(' Number of generations', 'laika-pedigree-tree');
?> </label>
  <div class="laikacursive">
<?php
	_e('The number of generations, starting by the parents, that will show on every single pet post.', 'laika-pedigree-tree');
?></div>
  </br></br>

<input type="text" name="empty" value="<?php
	echo $empty_laik;
?>"><label for="laika_pt_empty"><?php
	_e(' Empty text', 'laika-pedigree-tree');
?> </label>
 <div class="laikacursive">
<?php
	_e('Text that will appear when there is no data of certain parent, you can leave it blank or a dash.', 'laika-pedigree-tree');
?></div>
</br></br>


<input type="text" name="slug" value="<?php
	echo $slug_laik;
?>">
<label for="laika_pt_slug"><?php
	_e(' Slug', 'laika-pedigree-tree');
?> </label>
 <div class="laikacursive">
<?php
	_e('The slug is the name on the url for this content type. If you change it, remember to flush the rules at Settings > Permalinks and "Save" or else you won\'t be able to see them.', 'laika-pedigree-tree');
?></div>
</br></br>
  
 <input type="hidden" name="default" value="0" />
<input type="checkbox" name="default" value="1" <?php
	echo $def_laik_check;
?>>
<label for="laika_pt_empty"><?php
	_e('Use default CSS', 'laika-pedigree-tree');
?></label>
 <div class="laikacursive">
<?php
	_e('If you need to modify the css of the tree, for example the colors, you can just copy the css on this plugin folder inside your theme CSS and change it, in that case you can opt out of loading the native CSS.', 'laika-pedigree-tree');
?></div>
</br></br>

<input type="hidden" name="direction" value="0" />
<input type="checkbox" name="direction" value="1" <?php
	echo $def_laik_l;
?>>
<label for="laika_pt_empty"><?php
	_e('Invert tree direction', 'laika-pedigree-tree');
?></label>
 <div class="laikacursive">
<?php
	_e('The tree will be drawn from right (first generation) to left in case you check this box.', 'laika-pedigree-tree');
?></div>
</br></br>
<input type="hidden" name="genderfirst" value="f" />
<input type="checkbox" name="genderfirst" value="m" <?php
	echo $def_laik_fem;
?>>
<label for="laika_pt_empty"><?php
	_e('Show males first', 'laika-pedigree-tree');
?></label>
 <div class="laikacursive">
<?php
	_e('By default females are drawn first on the top, you can change it to males checking this box.', 'laika-pedigree-tree');
?></div>
</br></br>

<input type="number" name="archive" value="<?php
	echo $arc_laik;
?>">
<label for="laika_pt_archive"><?php
	_e('ID of the archive', 'laika-pedigree-tree');
?></label>
 <div class="laikacursive">
<?php
	_e('If you want to display all pets in one page, create one and past the ID here, leave it blank or 0 if you don\'t need it, on the wordpress page of this plugin under installation you can find more info on how to filter it with arguments', 'laika-pedigree-tree');
?></div>
</br></br>

  

</label>
</br>
  <input type="submit" value="<?php
	_e('Save', 'laika-pedigree-tree');
?>" class="button button-primary button-large">
<input type="hidden" name="FIELD_NON" value="<?php
	echo wp_create_nonce('FEL_NON');
?>"/>
</form>
  
    <br /> <br /> <br />

  
<p>Do you need help developing your site? Contact hola@burria.com</p>
<p>Burria, European quality, Spanish prices.</p>
   <br /> 
   
<p>This plugin is compatible with <a href="https://wordpress.org/plugins/felicette-pedigree-litters/">Felicette Pedigree Litters</a></p>

  
  
 
  
    <?php
	}

function laika_settings_save($gen_laik, $direc_laik, $slug_laik, $empty_laik, $def_laik, $arc_laik, $genderfirst_laik)
	{
	if (isset($_POST['generations']))
		{
		$gen_laik = sanitize_text_field($_POST['generations']);
		if (wp_verify_nonce($_POST['FIELD_NON'], 'FEL_NON'))
			{
			update_option('laika_pt_generations', $gen_laik);
			}
		}

	if (isset($_POST['direction']))
		{
		$direc_laik = sanitize_text_field($_POST['direction']);
		if (wp_verify_nonce($_POST['FIELD_NON'], 'FEL_NON'))
			{
			update_option('laika_pt_direc', $direc_laik);
			}
		}

	if (isset($_POST['genderfirst']))
		{
		$genderfirst_laik = sanitize_text_field($_POST['genderfirst']);
		if (wp_verify_nonce($_POST['FIELD_NON'], 'FEL_NON'))
			{
			update_option('laika_pt_gendfirst', $genderfirst_laik);
			}
		}

	if (isset($_POST['empty']))
		{
		$empty_laik = sanitize_text_field($_POST['empty']);
		if (wp_verify_nonce($_POST['FIELD_NON'], 'FEL_NON'))
			{
			update_option('laika_pt_empty', $empty_laik);
			}
		}

	if (isset($_POST['default']))
		{
		$def_laik = sanitize_text_field($_POST['default']);
		if (wp_verify_nonce($_POST['FIELD_NON'], 'FEL_NON'))
			{
			update_option('laika_pt_default', $def_laik);
			}
		}

	if (isset($_POST['slug']))
		{
		$slug_laik = sanitize_text_field($_POST['slug']);
		if (wp_verify_nonce($_POST['FIELD_NON'], 'FEL_NON'))
			{
			update_option('laika_pt_slug', $slug_laik);
			}
		}

	if (isset($_POST['archive']))
		{
		$arc_laik = sanitize_text_field($_POST['archive']);
		if (wp_verify_nonce($_POST['FIELD_NON'], 'FEL_NON'))
			{
			update_option('laika_pt_archive', $arc_laik);
			}
		}

	laika_settings_fields($gen_laik, $direc_laik, $slug_laik, $empty_laik, $def_laik, $arc_laik, $genderfirst_laik);
	}

// Fields tab
// call to JS

add_action('admin_enqueue_scripts', 'laika_fields_script_js');

function laika_fields_script_js()
	{
		//
		
	wp_register_script('laikaf_handle', plugin_dir_url(dirname(__FILE__)) . 'js/asortable.js', array(
		'jquery',
		'jquery-ui-sortable'
	) , '1.0.0', true);

	// Localize the script with new data

	$translation_array = array(
		'laikaftag' => __('Tag: ', 'laika-pedigree-tree') ,
		'laikaftagma' => __('Machine tag: ', 'laika-pedigree-tree')
	);
	wp_localize_script('laikaf_handle', 'object_name', $translation_array);
	}

function laika_pt_config_fields_page()
	{

	// tabs

	if (current_user_can('manage_options'))
		{
?>
       
         <h2 class="nav-tab-wrapper">  
            <a href="?page=laika-options" class="nav-tab "> <?php
		_e('Laika Settings');
?></a>  
            <a href="?page=laika-fields" class="nav-tab nav-tab-active"> <?php
		_e('Laika Fields');
?></a>  
        </h2>  
        
            <h2>This is a Beta feature</h2><h4>Be very carefull when using it on productive servers and please post on the board of this plugin any bug you find.</h4>
            <p>Oficial documentation will be available soon, refer to this plugin board on Wordpress repository for a quick rundown</p>       
        <?php

		// Enqueued script only if we're on the right page.

		wp_enqueue_script('laikaf_handle');

		//

		$arc_laik = get_option('laikaf_inputs', 'laikafieldsorder[]=0');
		$arch_inputs = get_option('laikafdrag_inputs', '');
		laikafab_settings_save($arc_laik, $arch_inputs);
		}
	}

function laikafab_settings_save($arc_laik, $arch_inputs)
	{
	if (isset($_POST['orderlaikaf']))
		{
		$arc_laik = sanitize_text_field($_POST['orderlaikaf']);
		if (wp_verify_nonce($_POST['FIELD_NON'], 'FEL_NON'))
			{

			// for ($i=0;$i++;$i<5){

			$arc_laik = $_POST['orderlaikaf'];

			// /function transform all inputs into a nice array///

			$arc_laikb = LaikaFieldsgetContents($arc_laik, 'laikafieldsorder[]=', '@tag@');
			$arc_laik_def = $arc_laik;

			// /

			$i = 0;
			$j = $_POST['numlaikaf'];
			$arc_laik = '';
			while ($i < $j)
				{
				$arc_laik.= $arc_laikb[$i];
				$i++;
				}

			update_option('laikaf_inputs', $arc_laik);
			$i = 0;
			$m = 0;
			$n = 0; //number of the div
			$arc_inputs = '';

			
			//+40 is an ugly hack, I'm gonna fix this someday, I know exactly how it works, I'm just tired of logic to find a fix now
			while (sizeof($arc_laikb)+40 > $i)
				{
				if (isset($arc_laikb[$m]) && $i == $arc_laikb[$m])
					{
						
					
					if (isset($_POST['laikafdrag' . $i]) && isset($_POST['laikafdragtag' . $i]))
					
						{
						$laikasan = sanitize_text_field($_POST['laikafdrag' . $i]);
						$laikasanb = sanitize_text_field($_POST['laikafdragtag' . $i]);
						
						if ($laikasan != '' && $laikasanb != ''){
						$arc_inputs.= "@tag@";
						$arc_inputs.= '-' . $laikasan;
						$arc_inputs.= "@matag@";
						$laikasanb = str_replace(' ', '_', $laikasanb);				
						$arc_inputs.= '-' . $laikasanb;
						}}

					$m++;
					$n++;
					$i = - 1;
					}

				$i++;
				}

			$arc_inputs.= "@tag";
			update_option('laikafdrag_inputs', $arc_inputs);
			$arch_inputs = $arc_inputs;
			}
		}

	laikafab_settings_fields($arc_laik, $arch_inputs);
	}

function laikafab_settings_fields($arc_laik, $arch_inputs)
	{
	$arc_inputarrma = LaikaFieldsgetContents($arch_inputs, '@matag@', '@tag');
	$arc_inputarr = LaikaFieldsgetContents($arch_inputs, '@tag@', '@matag@');
	$laikaftag = __('Tag: ', 'laika-pedigree-tree');
	$laikaftagma = __('Machine tag: ', 'laika-pedigree-tree');
	echo '<style>
.laikafsortable{padding:10px;width:50%;font-weight:bold;cursor:move;border:1px solid #ddd;background:#f5f5f5;background:-webkit-gradient(linear, left bottom, left top, color-stop(0, #eeeeee), color-stop(1, #ffffff));background:-ms-linear-gradient(bottom, #eeeeee, #ffffff);background:-moz-linear-gradient(center bottom, #eeeeee 0%, #ffffff 100%);-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-background-clip:padding;-webkit-background-clip:padding-box;background-clip:padding-box;}
</style>
    
    
    
    <form method="POST"> <div id="input_fields_wrap"></br></br>';
	if (isset($arc_inputarr[0]))
		{
		$i = 0;
		while (sizeof($arc_inputarr) > $i)
			{
			echo '<div id="laikafieldsorder-' . $i . '" class="laikafsortable">' . $laikaftag . '<input type="text" name="laikafdrag' . $i . '" value="' . substr($arc_inputarr[$i], 1) . '"/>&nbsp;' . $laikaftagma . '<input type="text" name="laikafdragtag' . $i . '" value="' . substr($arc_inputarrma[$i], 1) . '"/><a href="#" class="remove_field">X</a></div>';
			$i++;
			}
		}
	  else
		{
		echo '<div id="laikafieldsorder-0" class="laikafsortable">' . $laikaftag . '<input type="text" name="laikafdrag0" value=""/>&nbsp;' . $laikaftagma . '<input type="text" name="laikafdragtag0" value=""/><a href="#" class="remove_field">X</a></div>';
		}

	// ok, here we tell to the system the number of variables so It will writte the orderlaikaf field on loading.

	$i = 1;
	$loadingnumbinputs = 'laikafieldsorder[]=0@tag@';
	while (sizeof($arc_inputarrma) > $i)
		{
			
		$loadingnumbinputs.= 'laikafieldsorder[]=' . $i . '@tag@';
		$i++;
		}

	echo '</div>
</br></br><button class="add_field_button">Add More Fields</button>
</br></br></br>

<input type="hidden" id="orderlaikaf" value="' . $loadingnumbinputs . '" name="orderlaikaf" size=300 />

<input type="hidden" id="orderlaikafb" value="1" name="numlaikaf" size=300 />

<input type="hidden" id="orderlaikafbc" value="' . $arch_inputs . '" name="numlaikafb" size=300 />';
?>

<input type="submit" value="<?php
	_e('Save', 'baker-and-able-pedigree-fields');
?>" class="button button-primary button-large">
<input type="hidden" name="FIELD_NON" value="<?php
	echo wp_create_nonce('FEL_NON');
?>"/>

</form>
<?php
	}



// settings link into plugin page

function laika_pt_action_links($links)
	{
	$links = array_merge(array(
		'<a href="' . esc_url(admin_url('/options-general.php?page=laika-options')) . '">' . __('Settings', 'textdomain') . '</a>'
	) , $links);
	return $links;
	}

add_action('plugin_action_links_' . $base_laika, 'laika_pt_action_links');
