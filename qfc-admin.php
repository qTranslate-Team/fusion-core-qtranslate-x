<?php
if(!defined('ABSPATH'))exit;

//add_filter('qtranslate_load_admin_page_config','qfc_add_admin_page_config');//obsolete
add_filter('i18n_admin_config','qfc_add_admin_page_config');
function qfc_add_admin_page_config($page_configs)
{
	{
	$page_config = array();
	$page_config['pages'] = array( 'post.php' => '', 'post-new.php' => '' );
	//"anchors":{"post-body-content":{"where":"first"},"postdivrich":{"where":"after"}},

	$page_config['js-exec'] = array();
	$js = &$page_config['js-exec']; // shorthand

	$dir = qtranxf_dir_from_wp_content(__FILE__);
	$fn = $dir.'/qfc-admin-post';
	if(defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG){
		$fn .= '.js';
	}else{
		$fn .= '.min.js';
	}
	$js[] = array( 'handle' =>'qfc-js-exec', 'src' => $fn, 'ver' => QFC_VERSION );

	$page_configs[] = $page_config;
	}

	return $page_configs;
}

if(defined('DOING_AJAX')){

	function qfc_action_fusion_content_to_elements(){
		$lang = qtranxf_getLanguageEdit();
		$content = $_POST['content'];
		$_POST['content'] = qtranxf_use_language($lang, $content, false, true);
	}
	add_action( 'wp_ajax_fusion_content_to_elements', 'qfc_action_fusion_content_to_elements', 5);

}
