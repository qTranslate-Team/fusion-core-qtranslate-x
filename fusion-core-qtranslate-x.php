<?php
/**
 * Plugin Name: Fusion Core & qTranslate-X
 * Plugin URI: https://wordpress.org/plugins/fusion-core-qtranslate-x
 * Description: Enables multilingual framework for plugin "Fusion Core".
 * Version: 1.1
 * Author: qTranslate Team
 * Author URI: http://qtranslatexteam.wordpress.com/about
 * License: GPL2
 * Tags: multilingual, multi, language, translation, qTranslate-X, Fusion Core
 * Author e-mail: qTranslateTeam@gmail.com
 * GitHub Plugin URI: https://github.com/qTranslate-Team/fusion-core-qtranslate-x
 * GitHub Branch: master
 */
if(!defined('ABSPATH'))exit;

define('QFC_VERSION','1.1');

function qfc_init_language($url_info)
{
	if($url_info['doing_front_end']) {
		//nothing needed so far
		//require_once(dirname(__FILE__).'/qfc-front.php');
	}else{
		require_once(dirname(__FILE__).'/qfc-admin.php');
	}
}
add_action('qtranslate_init_language','qfc_init_language');
