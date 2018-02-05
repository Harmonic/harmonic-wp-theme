<?php

/**
 * Loads front end image url for easy template usage
 * @param img image name (with extention)
 * @return string
 */
function load_image($img,$return = false) {
	if ($return) {
		return get_stylesheet_directory_uri() . '/frontend/images/'.$img;
	}
	echo get_stylesheet_directory_uri() . '/frontend/images/'.$img;
}

/**
 * Loads front end url for easy template usage
 * @param url path to return relative to frontend/
 * @return string
 */
function frontend($url) {
	return get_stylesheet_directory_uri() . '/frontend/'.$url;
}

/**
 * Loads template file located in /templates/ with .tpl extension
 * @param name Give name of template file without extension
 */
function template($name,$vars = array()) {
	//parse the data and replace bad values with empty strings
	foreach ($vars as $i => $val) {
		$data[$i] = empty($val) ? '' : $val;
	}
	if (is_null($data)) {
		$data = array();
	}
  extract($data);
  include get_stylesheet_directory().'/frontend/templates/'.$name.'.tpl';
}

/**
 * Strips out multiple characters and white space from a string,
 * often used to get a slug worthy name from a Page title
 * @param s String "ugly" string to strip
 * @return String cleaned up version of input ready for use
 */
function strip($s) {
	$raw = $s;
	$remove = [' ',',','&','(',')','+'];
	$dirty = str_replace($remove,'',$raw);
	$clean = strtolower($dirty);
	return $clean;
}

function match_all($needles, $haystack)
{
    if(empty($needles)){
        return false;
    }

    foreach($needles as $needle) {
        if (stripos($haystack, $needle) === false) {
            return false;
        }
    }
    return true;
}

function harmonic_excerpt($string) {
	$return = [];
	if (strlen($string) > 500) {
		$return['more'] = true;
		$return['string'] = substr($string,0,500).'...';
	} else {
		$return['more'] = false;
		$return['string'] = $string;
	}
	return $return;
}
