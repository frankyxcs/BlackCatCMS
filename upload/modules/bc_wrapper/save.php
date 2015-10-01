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

$backend      = CAT_Backend::getInstance('Pages', 'pages_modify');
$section_id   = CAT_Helper_Validate::get('_REQUEST', 'section_id', 'numeric');
$page_id      = CAT_Sections::getPageForSection($section_id);

if ( CAT_Helper_Page::getPagePermission($page_id,'admin') !== true )
{
	$backend->print_error( 'You do not have permissions to modify this page!' );
}

// Get current settings
$query        = "SELECT * FROM `:prefix:mod_bc_wrapper` WHERE `section_id` = :section";
$get_settings = CAT_Object::db()->query($query,array('section'=>$section_id));
$settings     = $get_settings->fetchAll(PDO::FETCH_ASSOC);

foreach(array_values($settings) as $s)
{
    $data[$s['set_name']] = $s['set_value'];
}

$form = \wblib\wbForms::getInstanceFromFile('inc.forms.php',CAT_PATH.'/modules/wrapper/forms');
$form->set('wblib_url',CAT_URL.'/modules/lib_wblib/wblib');
$form->set('lang_path',CAT_PATH.'/modules/wrapper/languages');
$form->setForm('settings');
$form->setAttr('action',CAT_URL.'/modules/wrapper/save.php');
$form->getElement('section_id')->setValue($section_id);

if($form->isSent())
{
    if($form->isValid())
    {
        $new_data = $form->getData();
        if(!isset($new_data['autoplay']))
        {
            $new_data['autoplay'] = 'n';
        }
        foreach($data as $key => $value)
        {
            if(isset($new_data[$key]))
            {
                CAT_Object::db()->query('UPDATE `:prefix:mod_bc_wrapper` SET `set_value`=:val WHERE `set_name`=:key AND `section_id` = :section',array('val'=>$new_data[$key],'key'=>$key,'section'=>$section_id));
                $data[$key] = $new_data[$key];
            }
        }
    }
    else
    {
        $form->setError('Unable to save the settings.'.$form->getErrors());
        echo $form->getForm($new_data);
        exit;
    }
}

$backend->print_success('Seite erfolgreich gespeichert', CAT_ADMIN_URL . '/pages/modify.php?page_id=' . $page_id);
