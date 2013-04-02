<?php
/*
Plugin Name: Simple Text Replace
Plugin URI: http://wordpress.org/extend/plugins/simple-text-replace/
Description: Applies regular expressions to text and/or title of posts and pages to dinamically replace text before saving to DB. Useful for blacklist management and sites with auto generated content. Works fine with autoblog pugins.
Version: 1.4
Author: dBen
Author URI: 
Licence: Licence GPL2
Text Domain: simple-text-replace
*/
/*  Copyright 2013 dBen (email : dben@gmx.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


include_once('simple-text-replace_functions.php');

include_once('simple-text-replace_hooks.php');

include_once('simple-text-replace_options.php');

?>