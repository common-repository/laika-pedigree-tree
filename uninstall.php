<?php
 // Check that code was called from WordPress with
 // uninstallation constant declared
 if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
 exit;
 // Check if options exist and delete them if present
 if ( get_option( 'laika_pt_generations' ) != false ) {
 delete_option( 'laika_pt_generations' );
 }
 if ( get_option( 'laika_pt_empty' ) != false ) {
 delete_option( 'laika_pt_empty' );
 }
 
 
 //This was only available on the firsts versions
 if ( get_option( 'laika_pt_default' ) != false ) {
 delete_option( 'laika_pt_default' );
 }
 
 
 if ( get_option( 'laika_pt_theme' ) != false ) {
 delete_option( 'laika_pt_theme' );
}
  if ( get_option( 'laika_pt_slug' ) != false ) {
 delete_option( 'laika_pt_slug' );
 }
  if ( get_option( 'laika_pt_archive' ) != false ) {
 delete_option( 'laika_pt_archive' );
 }
   if ( get_option( 'laika_pt_direc' ) != false ) {
 delete_option( 'laika_pt_direc' );
 }
   if ( get_option( 'laika_pt_gendfirst' ) != false ) {
 delete_option( 'laika_pt_gendfirst' );
 }
   if ( get_option( 'laika_pt_gendfirst' ) != false ) {
 delete_option( 'laika_pt_gendfirst' );
 }
    if ( get_option( 'laikafdrag_inputs' ) != false ) {
 delete_option( 'laikafdrag_inputs' );
 }
?>
