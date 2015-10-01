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

$FORMS = array(
    'settings' => array(
        'action' => CAT_URL.'/modules/wrapper/modify.php',
        array('type'=>'hidden','name'=>'section_id','value'=>0),
        array('type'=>'text','name'=>'url','label'=>'Source URL','value'=>'http://','required'=>true),
        array('type'=>'select','name'=>'wrapper_type','label'=>'Markup type','class'=>'fbleave','options'=>array('iframe','object'),'selected'=>'iframe'),
        array('type'=>'select','name'=>'content_type','label'=>'Content type','class'=>'fbleave','options'=>array('generic'=>'Generic','video'=>'Video'),'selected'=>'generic','title'=>'If you choose [video] you can enable [Autoplay], but this may not work with the URL you added. It will work for YouTube and Vimeo, for example.'),
        array('type'=>'select','name'=>'ratio','label'=>'Aspect ratio','options'=>array('4:3','16:9'),'class'=>'fbleave'),
        array('type'=>'checkbox','name'=>'autoplay','label'=>'Autoplay','title'=>'This will add [autoplay=1] to the given URL; this may not work on every video URL, so you will have to check it.'),
    ),
);