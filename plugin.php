<?php
/**
 * Plugin Name: Larotisserie API
 */
add_action( 'plugins_loaded', function() {
	spl_autoload_register( function ( $class ) {
		$prefix = 'larotis\\larotis_api\\';
		$base_dir = dirname( __FILE__ ) . '/src/' ;
		$len = strlen($prefix);
		if (strncmp($prefix, $class, $len) !== 0) {

			return;
		}
		$relative_class = substr($class, $len);
		$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

		if ( file_exists( $file )) {
			require $file;
		}
	});


	$api_namespace = 'larotis_api';
	$version = 'v2';
	new \larotis\larotis_api\boot( $api_namespace, $version );


});


