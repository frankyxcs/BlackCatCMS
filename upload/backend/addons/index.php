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
 *   @copyright       2013, Black Cat Development
 *   @link            http://blackcat-cms.org
 * @license			http://www.gnu.org/licenses/gpl.html
 *   @category        CAT_Core
 *   @package         CAT_Core
 *
 */

if (defined('CAT_PATH')) {
	if (defined('CAT_VERSION')) include(CAT_PATH.'/framework/class.secure.php');
} elseif (file_exists($_SERVER['DOCUMENT_ROOT'].'/framework/class.secure.php')) {
	include($_SERVER['DOCUMENT_ROOT'].'/framework/class.secure.php');
} else {
	$subs = explode('/', dirname($_SERVER['SCRIPT_NAME']));	$dir = $_SERVER['DOCUMENT_ROOT'];
	$inc = false;
	foreach ($subs as $sub) {
		if (empty($sub)) continue; $dir .= '/'.$sub;
		if (file_exists($dir.'/framework/class.secure.php')) {
			include($dir.'/framework/class.secure.php'); $inc = true;	break;
	}
	}
	if (!$inc) trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
}

$backend = CAT_Backend::getInstance('Addons', 'addons');
$users    = CAT_Users::getInstance();
$date  = CAT_Helper_DateTime::getInstance();

global $parser;
$tpl_data = array();

$tpl_data['URL'] = array(
	'addons'		=> CAT_ADMIN_URL . '/modules/index.php',
    'TEMPLATES'    => $users->checkPermission('addons', 'templates') ? CAT_ADMIN_URL . '/templates/index.php' : false,
    'LANGUAGES'    => $users->checkPermission('addons', 'languages') ? CAT_ADMIN_URL . '/languages/index.php' : false,
);

// Insert permissions values
$tpl_data['permissions']['ADVANCED']          = $users->checkPermission('addons', 'admintools')        ? true : false;
$tpl_data['permissions']['MODULES_VIEW']      = $users->checkPermission('addons', 'modules_view')      ? true : false;
$tpl_data['permissions']['MODULES_INSTALL']   = $users->checkPermission('addons', 'modules_install')   ? true : false;
$tpl_data['permissions']['MODULES_UNINSTALL'] = $users->checkPermission('addons', 'modules_uninstall') ? true : false;

$counter	= 0;
$seen_dirs  = array();
$tpl_data['addons'] = array();
$tpl_data['not_installed_addons'] = array();

$addons = CAT_Helper_Addons::get_addons();

foreach( $addons as $addon )
{

    // check if the user is allowed to see this item
    if(!$users->get_permission($addon['directory'],$addon['type']))
    {
        $seen_dirs[] = $addon['directory'];
        continue;
    }

		// check if a module description exists for the displayed backend language
		$tool_description	= false;
    $langfile            = false;
		switch ($addon['type'])
		{
			case 'module':
				$type	= 'modules';
            $seen_dirs[] = $addon['directory']; // for later use
				break;
			case 'language':
				$type				= 'languages';
				// Clear all variables
                $vars = get_defined_vars();
                foreach( array_keys($vars) as $var )
                {
                    if ( preg_match( '~^language_~i', $var ) )
                    {
                        ${$var} = '';
                    }
                }
            // for language files, the column 'directory' contains the lang code
            $langfile = CAT_Helper_Directory::sanitizePath(CAT_PATH.'/languages/'.$addon['directory'].'.php');
            if ( file_exists($langfile))
				{
                // use require as we just need the info vars, not the lang strings
                require $langfile;
					$addon['name']			= $language_name;
					$addon['author']		= $addon['author'] != '' ? $addon['author'] : $language_author;
					$addon['version']		= $language_version;
					$addon['platform']		= $language_platform;
					$addon['license']		= $language_license;
				}
				break;
			case 'template':
				$type	= 'templates';
				break;
			default:
				$type	= 'modules';
		}

    // for modules, look for a language file for current language
    $langfile = CAT_Helper_Directory::sanitizePath(CAT_PATH.'/'.$type.'/'.$addon['directory'].'/languages/'.LANGUAGE.'.php');
		if ( $type != 'languages' && ( function_exists('file_get_contents') && file_exists($langfile) ) )
		{
			// read contents of the module language file into string
			$description			= @file_get_contents($langfile);
			// use regular expressions to fetch the content of the variable from the string
			$tool_description		= get_variable_content('module_description', $description, false, false);
			// replace optional placeholder {CAT_URL} with value stored in config.php
			if ($tool_description !== false && strlen(trim($tool_description)) != 0)
				$tool_description	= str_replace('{CAT_URL}', CAT_URL, $tool_description);
			else
				$tool_description = false;
			}

		// Set a number to dimension $addon[directory] to see
		$modules_count[$addon['directory']] = $addon['directory'];
		
		$tpl_data['addons'][$counter] = array(
			'name'			=> $addon['name'],
			'author'		=> $addon['author'],
			'description'	=> $addon['description'],
			'version'		=> $addon['version'],
			'platform'		=> $addon['platform'],
			'license'		=> $addon['license'],
			'directory'		=> $addon['directory'],
			'function'		=> $addon['function'],
            'installed'     => ( ($addon['installed']!='') ? $date->getDate($addon['installed']) : NULL ),
            'upgraded'      => ( ($addon['upgraded']!='') ? $date->getDate($addon['upgraded']) : NULL ),
            'is_installed'  => true,
            'is_removable' => ( ($addon['removable']=='N') ? false : true ),
			'type'			=> $type
		);

		if ($tool_description !== false)
		{
			// Override the module-description with correct desription in users language
			$tpl_data['addons'][$counter]['description']	= $tool_description;
		}

		// ================================================== 
		// ! Check whether icon is available for the module   
		// ================================================== 
        $icon = CAT_Helper_Directory::getInstance()->sanitizePath(CAT_PATH . '/' . $type . '/' . $addon['directory'] . '/icon.png');
		if(file_exists($icon)){
			list($width, $height, $type_of, $attr) = getimagesize($icon);
			// Check whether file is 32*32 pixel and is an PNG-Image
			$tpl_data['addons'][$counter]['icon']
                = ($width == 32 && $height == 32 && $type_of == 3)
                ? CAT_URL . '/' . $type . '/' . $addon['directory'] . '/icon.png'
                : false;
		}

		switch ($addon['function'])
		{
			case NULL:
            $type_name    = $backend->lang()->translate( 'Unknown' );
				break;
			case 'page':
            $type_name    = $backend->lang()->translate( 'Page' );
				break;
			case 'wysiwyg':
            $type_name    = $backend->lang()->translate( 'WYSIWYG Editor' );
				break;
			case 'tool':
            $type_name    = $backend->lang()->translate( 'Administration tool' );
				break;
			case 'admin':
            $type_name    = $backend->lang()->translate( 'Admin' );
				break;
			case 'administration':
            $type_name    = $backend->lang()->translate( 'Administration' );
				break;
			case 'snippet':
            $type_name    = $backend->lang()->translate( 'Code-Snippet' );
				break;
			case 'library':
            $type_name    = $backend->lang()->translate( 'Library' );
				break;
			default:
            $type_name    = $backend->lang()->translate( 'Unknown' );
		}

		$tpl_data['addons'][$counter]['function'] = $type_name;

		// Check if the module is installable or upgradeable
		$tpl_data['addons'][$counter]['INSTALL'] = file_exists(CAT_PATH . '/' . $type . '/' . $addon['directory'] . '/install.php') ? true : false;
		$tpl_data['addons'][$counter]['UPGRADE'] = file_exists(CAT_PATH . '/' . $type . '/' . $addon['directory'] . '/upgrade.php') ? true : false;

		$counter++;
}


$tpl_data['groups']    = $users->get_groups('' , '', false);

// scan modules path for modules not seen yet
if( $users->checkPermission('addons','modules_install') )
{
    $new = CAT_Helper_Directory::getInstance()
           ->maxRecursionDepth(0)
           ->setSkipDirs($seen_dirs)
           ->getDirectories( CAT_PATH.'/modules', CAT_PATH.'/modules/' );

    if ( count($new) )
    {
    $addon = CAT_Helper_Addons::getInstance();
    foreach( $new as $dir )
    {
        $info = $addon->checkInfo(CAT_PATH.'/modules/'.$dir);
        if ( $info )
	{
                $tpl_data['not_installed_addons'][$counter] = array(
                'is_installed'  => false,
    			'type'			=> 'modules',
                'INSTALL'       => file_exists(CAT_PATH.'/modules/'.$dir.'/install.php') ? true : false
            );
            foreach( $info as $key => $value )
		{
                    $tpl_data['not_installed_addons'][$counter][str_ireplace('module_','',$key)] = $value;
		}
		$counter++;
            }
	}
        $tpl_data['not_installed_addons'] = CAT_Helper_Array::ArraySort($tpl_data['not_installed_addons'],'name','asc',true);
	}
}

// print page
$parser->output( 'backend_addons_index', $tpl_data );

// Print admin footer
$backend->print_footer();
