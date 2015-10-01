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
$LANG = array(
    'Your browser does not support inline frames.<br />Click on the link below to visit the website that was meant to be shown here...<br />'
        => '&#1042;&#1072;&#1096; browser &#1085;&#1077; &#1087;&#1086;&#1076;&#1076;&#1077;&#1088;&#1078;&#1080;&#1074;&#1072;&#1077;&#1090; inline-&#1092;&#1088;&#1077;&#1081;&#1084;&#1099;.<br />&#1053;&#1072;&#1078;&#1084;&#1080;&#1090;&#1077; &#1085;&#1072; &#1089;&#1089;&#1099;&#1083;&#1082;&#1091; &#1085;&#1080;&#1078;&#1077;, &#1095;&#1090;&#1086;&#1073;&#1099; &#1087;&#1077;&#1088;&#1077;&#1081;&#1090;&#1080; &#1082; &#1080;&#1084;&#1087;&#1086;&#1088;&#1090;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1085;&#1086;&#1084;&#1091; &#1089;&#1102;&#1076;&#1072; &#1089;&#1072;&#1081;&#1090;&#1091;...<br />',
);