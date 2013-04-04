<?php
global $gBitSystem;

$registerHash = array(
	'package_name' => 'config',
	'package_path' => dirname( __FILE__ ).'/',
	'required_package'=> TRUE,
);
$gBitSystem->registerPackage( $registerHash );

define( 'THEMES_PATH', CONFIG_PKG_PATH.'themes/' );
define( 'THEMES_URL', CONFIG_PKG_URL.'themes/' );
define( 'THEMES_URI', CONFIG_PKG_URI.'themes/' );

define( 'ICONSETS_PATH', CONFIG_PKG_PATH.'iconsets/' );
define( 'ICONSETS_URL', CONFIG_PKG_URL.'iconsets/' );
define( 'ICONSETS_URI', CONFIG_PKG_URI.'iconsets/' );

set_error_handler( 'bit_error_handler' );
