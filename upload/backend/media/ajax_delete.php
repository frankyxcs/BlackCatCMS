<?php
/**
 * This file is part of LEPTON2 Core, released under the GNU GPL
 * Please see LICENSE and COPYING files in your package for details, specially for terms and warranties.
 * 
 * NOTICE:LEPTON CMS Package has several different licenses.
 * Please see the individual license in the header of each single file or info.php of modules and templates.
 *
 * @author			LEPTON2 Project
 * @copyright		2012, LEPTON2 Project
 * @link			http://lepton2.org
 * @license			http://www.gnu.org/licenses/gpl.html
 * @license_terms	please see LICENSE and COPYING files in your package
 * @version         $Id$
 *
 */
 

// include class.secure.php to protect this file and the whole CMS!
if (defined('CAT_PATH')) {
	include(CAT_PATH . '/framework/class.secure.php');
} else {
	$oneback = "../";
	$root = $oneback;
	$level = 1;
	while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
		$root .= $oneback;
		$level += 1;
	}
	if (file_exists($root.'/framework/class.secure.php')) {
		include($root.'/framework/class.secure.php');
	} else {
		trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
	}
}
// end include class.secure.php

// ================================= 
// ! Include the WB functions file   
// ================================= 
include_once(CAT_PATH . '/framework/functions.php');

require_once(CAT_PATH . '/framework/class.admin.php');
$admin			= new admin('Media', 'media', false);

header('Content-type: application/json');

$ajax['file']			= $admin->get_post('file');
$ajax['file_path']		= $admin->get_post('file_path');


if (  $ajax['file'] == '' ||  $ajax['file_path'] == '' || $admin->get_permission('media_delete') !== true )
{
	$ajax	= array(
		'message'	=> 'You don\'t have the permission to delete this file. Check your system settings.',
		'success'	=> false
	);
	//header( 'Location: ' . CAT_ADMIN_URL );
	print json_encode( $ajax );
	exit();
}

else {
	// ============================ 
	// ! Try to delete file/folder
	// ============================ 
	$link	= CAT_PATH .  $ajax['file_path'] . '/' .  $ajax['file'];
	if ( file_exists($link) )
	{
		$kind	= is_dir($link) ? 'dir' : 'file';
		if ( rm_full_dir( $link ) )
		{
			$ajax['message']		= $kind == 'dir' ? $admin->lang->translate( 'Folder deleted successfully' ) : $admin->lang->translate( 'File deleted successfully' );
			$ajax['success']		= true;
		}
		else
		{
			$ajax['message']		= $kind == 'dir' ? $admin->lang->translate( 'Can not delete the selected directory' ) : $admin->lang->translate( 'Can not delete the selected file' );
			$ajax['success']		= false;
		}
	}
	else
	{
		$ajax['message']	= $admin->lang->translate( 'Couldn\'t find the folder or file' );
		$ajax['success']	= false;
	}
	print json_encode( $ajax );
}

?>