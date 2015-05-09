<?php
spl_autoload_register('testeleven_positioned_autoloader');

function testeleven_positioned_autoloader($class) {
	$class = strtolower( str_replace( '_', '-', $class ) );

	if ( file_exists( plugin_dir_path( __FILE__ ) .'lib/class-' . $class . '.php' ) ) {
		include( plugin_dir_path( __FILE__ ) . 'lib/class-' . $class . '.php' );
	}
}