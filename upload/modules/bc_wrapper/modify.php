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

// Get current settings
$query        = "SELECT * FROM `:prefix:mod_bc_wrapper` WHERE `section_id` = :section";
$get_settings = CAT_Object::db()->query($query,array('section'=>$section_id));
$settings     = $get_settings->fetchAll(PDO::FETCH_ASSOC);

foreach(array_values($settings) as $s)
{
    $data[$s['set_name']] = $s['set_value'];
}

\wblib\wbFormsJQuery::set('load_ui_theme',false);
\wblib\wbFormsJQuery::set('disable_tooltips',true);
\wblib\wbFormsElement::setIDPrefix('sec'.$section_id.'_');
\wblib\wbFormsElementForm::set('action',CAT_URL.'/modules/wrapper/save.php');
\wblib\wbFormsElementLabel::setClass('fc_label_200');

\wblib\wbFormsElementCheckbox::setTemplate('
<div class="fc_settings_max settings_label">
    <div class="fc_settings_label"%title%>
       %is_required%<input%type%%name%%id%%class%%style%%value%%required%%checked%%tabindex%%accesskey%%disabled%%readonly%%onblur%%onchange%%onclick%%onfocus%%onselect% />
       %label%<br />
    </div>
</div><div class="clear_sp"></div>
'
);

\wblib\wbFormsElementSelect::setTemplate('
<div class="mod_bc_wrapper_select">
    %label%%is_required%
    <select%name%%id%%class%%style%%title%%multiple%%tabindex%%accesskey%%disabled%%readonly%%required%%onblur%%onchange%%onclick%%onfocus%%onselect%>
        %options%
    </select> %after%
</div>
');

$form = \wblib\wbForms::getInstanceFromFile('inc.forms.php',CAT_PATH.'/modules/wrapper/forms');
$form->set('wblib_url',CAT_URL.'/modules/lib_wblib/wblib');
$form->set('lang_path',CAT_PATH.'/modules/wrapper/languages');
$form->setForm('settings');
$form->setAttr('action',CAT_URL.'/modules/wrapper/save.php');
$form->getElement('section_id')->setValue($section_id);
$form->setData($data);

$parser->setPath(CAT_PATH.'/modules/wrapper/templates/default');
$parser->output('modify.tpl',array('form'=>$form->getForm()));

$form->destroy();
