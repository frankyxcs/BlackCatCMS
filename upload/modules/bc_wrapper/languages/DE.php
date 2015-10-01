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

// Deutsche Modulbeschreibung
$module_description = 'Dieses Modul erlaubt das Einbinden fremder Inhalte auf Ihrer Seite mit Hilfe von Inline Frames (iframe)';

$LANG = array(
    'Your browser does not support inline frames.<br />Click on the link below to visit the website that was meant to be shown here...<br />'
        => 'Ihr Browser unterst&uuml;tzt keine Inline Frames.<br />Bitte klicken Sie auf nachfolgenden Link, um den Seiteninhalt der externen Seite zu betrachten ...<br />',
    'Markup type' => 'Elementtyp',
    'Content type' => 'Inhaltstyp',
    'Autoplay' => 'Automatisch abspielen',
    'Source URL' => 'URL',
    'Aspect ratio' => 'Seitenverhältnis',
    'Please note: The aspect ratio will always be 16:9 on videos.' => 'Hinweis: Das Seitenverhältnis ist bei Videos immer 16:9.',
);