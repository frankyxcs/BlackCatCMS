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

// Create table
$mod_bc_wrapper = 'CREATE TABLE IF NOT EXISTS `:prefix:mod_bc_wrapper` ('
    . '`section_id` INT(11) NOT NULL DEFAULT \'0\', '
    . '`set_name` VARCHAR(50) NOT NULL DEFAULT \'0\', '
    . '`set_value` VARCHAR(50) NOT NULL DEFAULT \'0\', '
    . 'UNIQUE INDEX `section_id_set_name` (`section_id`, `set_name`) '
	. ' )';
$database->query($mod_bc_wrapper);

// add files to class_secure
$addons_helper = new CAT_Helper_Addons();
foreach(
    array( 'save.php' )
    as $file
) {
    if ( false === $addons_helper->sec_register_file( 'bc_wrapper', $file ) )
    {
         error_log( "Unable to register file -$file-!" );
    }
}