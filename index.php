<?php
/**
 * @version $Header$
 * @package bitweaver
 */
require_once( 'kernel/setup_inc.php' );

// $gBitSystem->loadLayout() needs ACTIVE_PACKAGE
if( !$gBitSystem->isDatabaseValid() ) {
	install_error();
} elseif( !defined( 'ACTIVE_PACKAGE' )) {
	$bit_index = $gBitSystem->getConfig( 'bit_index' );
	if( in_array( $bit_index, array_keys( $gBitSystem->mPackages )) && defined( strtoupper( $bit_index ).'_PKG_PATH' )) {
		define( 'ACTIVE_PACKAGE', constant( strtoupper( $bit_index ).'_PKG_NAME' ));
		$gBitSystem->mActivePackage = $bit_index;
	} else {
		define( 'ACTIVE_PACKAGE', KERNEL_PKG_NAME );
		unset( $bit_index );
	}
}

if( !empty( $_REQUEST['content_id'] )) {
	if( $obj = LibertyBase::getLibertyObject( $_REQUEST['content_id'] )) {
		$url = $obj->getDisplayUrl();
		if( !empty($_REQUEST['highlight'] )) {
			if( preg_match( '/\?/', $url )) {
				$url .= '&';
			} else {
				$url .= '?';
			}
			$url .= 'highlight='.$_REQUEST['highlight'];
		}
		bit_redirect( $url );
	}
} elseif( !empty( $_REQUEST['structure_id'] )) {
	include( LIBERTY_PKG_PATH.'display_structure_inc.php' );
	die;
}

$gBitThemes->loadLayout();
// Redirectless home for packages
if( !empty( $bit_index )) {
	chdir( $gBitSystem->mPackages[$bit_index]['path'] );
	include_once( './index.php' );
die;
}

bit_redirect( $gBitSystem->getDefaultPage() );
