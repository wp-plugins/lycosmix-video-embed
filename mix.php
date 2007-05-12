<?php
/*
Plugin Name: Lycos Mix Plugin
Plugin URI: http://www.christineandmike.net/mix/
Description: A Plugin to enable Lycos Mixes to be embedded into Wordpress 2.X
Version: 1.0
Author: Mike Jandreau
Author URI: http://www.moviesnobs.net/

*/


// Lycos Mix Code

define("MIX_WIDTH", 425);
define("MIX_HEIGHT", 350);
define("MIX_REGEXP", "/\[mix ([[:print:]]+)\]/");
define("MIX_TARGET", "<script type=\"text/javascript\">mix = \"###URL###\"; textcolor = \"fff\"; linkcolor = \"0af\"; s = \"http://mix.lycos.com\";</script><script src=\"http://mix.lycos.com/js/minimix.js\" type=\"text/javascript\"></script>");

function MIX_plugin_callback($match) {
	$output = MIX_TARGET;
	$output = str_replace("###URL###", $match[1], $output);
	return ($output);
}

function mix_plugin($content) {
	return preg_replace_callback(MIX_REGEXP, 'MIX_plugin_callback', $content);
}

add_filter('the_content', 'mix_plugin');
add_filter('comment_text', 'mix_plugin');


?>
