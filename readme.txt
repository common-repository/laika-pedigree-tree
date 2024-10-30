=== Laika Pedigree Tree ===
Contributors: burria
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LWY5S5WDMGCGQ
Tags: pedigree, tree, family, pets, laika, dog, cat, chart,
Requires at least: 4.0
Tested up to: 4.7.2
License: GPLv2
Stable tag: 1.4

This plugin creates a custom post type for pets, connected to his parents and then automaticaly draws a pedigree tree. 





== Description ==

Creates a custom content type to upload pets, displays from 1 to 4 generations (parents are counted as first generation). 

When you create a new pet it lets you select the mother and father and then draws a pedigree 
tree when the user is viewing the post.



== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Laika_Configuration to configure the plugin
4. A new content type is Added, the pluggin works in this way:
	* The identifier is the most important part, it must be unique for every pet
	* The identifier of the mum and dad will be tied to them (by their identifier), if they exists,
	* then the plugin will know, and draw the tree properly.  
5. To view the page displaying all pets:
	* Create a new page and copy the page ID on settings (Laika Configuration), ID of the Archive 
	* When you link to this page you can add filters bya arguments for gender and tags (optional)
	* For example mysite.com/yourpage/?gender=male will filter only males 
	* mysite.com/yourpage/?gender=female&tags=germanshepherd+champion will filter only females with the tags 'germanshepherd' plus 'champion'

== Changelog ==
= 1.2 =
*Release Date - May 2016*
*Added custom fields (Beta)*

= 1.0.0 =

*Release Date - April 2017*
*First stable version*
*Minnor usability changes*

= 0.21 =

*Added horitzontal scrow*

= 0.20 =

*Redesign of the archive and added the possibility to filter by arguments*
*fixed uninstall bug*

= 0.19 =

*Cleaned up settings page and added descriptions*

= 0.18 =

*Added a new generation*

= 0.17 =

*Gives the possibility to show males first*

= 0.16 =

*Option for inverting tree direction*

= 0.14 =

*Release Date - 11 November 2016*

* Security update

= 0.12 =

*Release Date - 20 October 2016*

* Added Thumbnails on tree

= 0.11 =

*Release Date - 19 October 2016*

* Code rewritten for stability and bug fixing
* custom template eliminated


= 0.9.6 =

*Release Date - 15 October 2016*

* Added a setting to hide link on content type
* Fixed an important Bug
* Improved the CSS

= 0.8 =

*Release Date - 13 October 2016*

* Added slug option on settings
* Fixed small bugs
* Improved the CSS

== Screenshots ==

1. Pedigree tree on a laika post type
2. Forms on custom laika post type
