<?php
	function efis_plugin_activation() {
		// Khai báo plugin cần cài đặt
		$plugins = array(
			array(
					'name' => 'Redux Framework',
					'slug' => 'redux-framework',
					'required' => true
				)
			);
		// Thiết lập TGM
		$configs = array(
				'menu' => 'tp_plugin_install',
				'has_notice' => true,
				'dismissable' => false,
				'is_automatic' => true
			);
		tgmpa( $plugins, $configs );
	}
	add_action('tgmpa_register', 'efis_plugin_activation');

?>