<?php

/**
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 3 of the License, or (at
 *   your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful, but
 *   WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 *   General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program; if not, see <http://www.gnu.org/licenses/>.
 *
 *   @author          Black Cat Development
 *   @copyright       2015, Black Cat Development
 *   @link            http://blackcat-cms.org
 *   @license         http://www.gnu.org/licenses/gpl.html
 *   @category        CAT_Modules
 *   @package         bc_wrapper
 *
 */

if (defined('CAT_PATH')) {
	include(CAT_PATH.'/framework/class.secure.php');
} else {
	$root = "../";
	$level = 1;
	while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
		$root .= "../";
		$level += 1;
	}
	if (file_exists($root.'/framework/class.secure.php')) {
		include($root.'/framework/class.secure.php');
	} else {
		trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
	}
}

$autoplay_map = array('video');

// Get current settings
$query        = "SELECT * FROM `:prefix:mod_bc_wrapper` WHERE `section_id` = :section";
$get_settings = CAT_Object::db()->query($query,array('section'=>$section_id));
$settings     = $get_settings->fetchAll(PDO::FETCH_ASSOC);

foreach(array_values($settings) as $s)
{
    $data[$s['set_name']] = $s['set_value'];
    if($s['set_name'] == 'ratio')
    {
        $data[$s['set_name']] = str_replace(':','-',$s['set_value']);
    }
}

if(in_array($data['content_type'],$autoplay_map) && $data['autoplay']=='y')
{
    $data['url'] .= '?autoplay=1';
}

$parser->setPath( CAT_PATH.'/modules/wrapper/templates/default' );
$parser->output( $data['wrapper_type'].'.tpl', $data );
