<?php

/**
 * This file is part of an ADDON for use with Black Cat CMS Core.
 * This ADDON is released under the GNU GPL.
 * Additional license terms can be seen in the info.php of this module.
 *
 * @module          wrapper
 * @author          WebsiteBaker Project
 * @author          LEPTON Project
 * @copyright       2004-2010, WebsiteBaker Project
 * @copyright       2010-2011, LEPTON Project
 * @link            http://www.LEPTON-cms.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @license_terms   please see info.php of this module
 *
 * @reformatted     2011-09-28
 *
 */

// include class.secure.php to protect this file and the whole CMS!
if ( defined( 'CAT_PATH' ) )
{
	include( CAT_PATH . '/framework/class.secure.php' );
}
elseif ( file_exists( $_SERVER[ 'DOCUMENT_ROOT' ] . '/framework/class.secure.php' ) )
{
	include( $_SERVER[ 'DOCUMENT_ROOT' ] . '/framework/class.secure.php' );
}
else
{
	$subs = explode( '/', dirname( $_SERVER[ 'SCRIPT_NAME' ] ) );
	$dir  = $_SERVER[ 'DOCUMENT_ROOT' ];
	$inc  = false;
	foreach ( $subs as $sub )
	{
		if ( empty( $sub ) )
			continue;
		$dir .= '/' . $sub;
		if ( file_exists( $dir . '/framework/class.secure.php' ) )
		{
			include( $dir . '/framework/class.secure.php' );
			$inc = true;
			break;
		}
	}
	if ( !$inc )
		trigger_error( sprintf( "[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER[ 'SCRIPT_NAME' ] ), E_USER_ERROR );
}
// end include class.secure.php

// Get page content
$query        = "SELECT url,height,width,wtype FROM " . CAT_TABLE_PREFIX . "mod_wrapper WHERE section_id = '$section_id'";
$get_settings = $database->query( $query );
$settings     = $get_settings->fetchRow( MYSQL_ASSOC );
$url          = ( $settings[ 'url' ] );

// Insert vars
$data = array(
	'PAGE_ID' => $page_id,
	'SECTION_ID' => $section_id,
	'CAT_URL' => CAT_URL,
	'URL' => $url,
	'settings' => $settings,
);

$parser->setPath( CAT_PATH.'/modules/wrapper/htt' );
$parser->output( 'modify.lte', $data );

?>