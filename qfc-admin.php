<?php
if(!defined('ABSPATH'))exit;

add_filter('i18n_admin_config','qfc_add_admin_page_config');
function qfc_add_admin_page_config($page_configs)
{
	$page_config = array();
	$page_config['pages'] = array( 'post.php' => '', 'post-new.php' => '' );

	$page_config['forms'] = array( 'post' => array( 'fields' => array() ) );
	$fields = &$page_config['forms']['post']['fields'];
	$fields['pyre_heading'] = array();
	$fields['pyre_caption'] = array();

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

	$page_configs['fusion-core'] = $page_config;

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
