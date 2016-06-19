<?php
if(!defined('ABSPATH'))exit;

function qfc_add_filters_front() {
	$use_filters = array(
	);

	foreach ( $use_filters as $name => $priority ) {
		add_filter( $name, 'qtranxf_useCurrentLanguageIfNotFoundUseDefaultLanguage', $priority );
	}
}
qfc_add_filters_front();
