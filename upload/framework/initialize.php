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
 *   @license         http://www.gnu.org/licenses/gpl.html
 *   @category        CAT_Core
 *   @package         CAT_Core
 *   @reviewed        17.07.2014 14:32:39
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

ini_set('default_charset','UTF-8');

//**************************************************************************
// add framework subdir to include path
//**************************************************************************
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(dirname(__FILE__) . '/framework'),
    get_include_path()
)));
//**************************************************************************
// register autoloader
//**************************************************************************
spl_autoload_register(function($class)
{
    if (defined('CAT_PATH'))
    {
        $file = str_replace('_', '/', $class);
        if (file_exists(CAT_PATH . '/framework/' . $file . '.php'))
        {
            @require CAT_PATH . '/framework/' . $file . '.php';
        }
    }
    // next in stack
});

CAT_Registry::register('CAT_CORE', 'Black Cat CMS', true);
CAT_Registry::register('URL_HELP', 'http://blackcat-cms.org/', true);
CAT_Registry::register('IS_WIN'  , (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? true : false, true);

// Create database class
// note: we still use the old class here, because there are still some core files
// that use methods like get_one()
require CAT_PATH.'/framework/class.database.php';
$database = new database();

//**************************************************************************
// Get website settings (title, keywords, description, header, and footer)
//**************************************************************************
$sql = 'SELECT `name`, `value` FROM `:prefix:settings` ORDER BY `name`';
if (($result = $database->query($sql)) && ($result->rowCount() > 0))
{
    while (false != ($row = $result->fetch()))
    {
        if (preg_match('/^[0-7]{1,4}$/', $row['value']) == true)
            $value = $row['value'];
        elseif (preg_match('/^[0-9]+$/S', $row['value']) == true)
            $value = intval($row['value']);
        elseif ($row['value'] == 'false')
            $value = false;
        elseif ($row['value'] == 'true')
            $value = true;
        else
            $value = $row['value'];
        $temp_name = strtoupper($row['name']);
        CAT_Registry::register($temp_name, $value, true, true);
    }
    unset($row);
}
else
{
    CAT_Object::printFatalError("No settings found in the database, please check your installation!");
}
    
//**************************************************************************
// moved from ./backend/interface/er_levels.php
//**************************************************************************
CAT_Registry::register('ER_LEVELS', array(
    'System Default',
    '6135' => 'E_ALL^E_NOTICE', // standard: E_ALL without E_NOTICE
    '0'    => 'E_NONE',
    '6143' => 'E_ALL',
    '8191' => htmlentities('E_ALL&E_STRICT'), // for programmers
));

//**************************************************************************
//**************************************************************************
$string_file_mode = STRING_FILE_MODE;
CAT_Registry::register('OCTAL_FILE_MODE', (int) octdec($string_file_mode), true);
$string_dir_mode = STRING_DIR_MODE;
CAT_Registry::register('OCTAL_DIR_MODE', (int) octdec($string_dir_mode), true);

//**************************************************************************
// get CAPTCHA and ASP settings
//**************************************************************************
if (!defined('CAT_INSTALL_PROCESS'))
{
    $sql = 'SELECT * FROM `' . CAT_TABLE_PREFIX . 'mod_captcha_control` LIMIT 1';
    if (false !== ($get_settings = $database->query($sql)))
    {
        if ($get_settings->numRows() == 0)
        {
            die("CAPTCHA-Settings not found");
        }
        $setting = $get_settings->fetch(PDO::FETCH_ASSOC);
        CAT_Registry::register('ENABLED_CAPTCHA'    , (($setting['enabled_captcha'] == '1') ? true : false), true);
        CAT_Registry::register('ENABLED_ASP'        , (($setting['enabled_asp'] == '1')     ? true : false), true);
        CAT_Registry::register('CAPTCHA_TYPE'       , $setting['captcha_type']                             , true);
        CAT_Registry::register('ASP_SESSION_MIN_AGE', (int) $setting['asp_session_min_age']                , true);
        CAT_Registry::register('ASP_VIEW_MIN_AGE'   , (int) $setting['asp_view_min_age']                   , true);
        CAT_Registry::register('ASP_INPUT_MIN_AGE'  , (int) $setting['asp_input_min_age']                  , true);
        unset($setting);
    }
}

//**************************************************************************
// Start a session
//**************************************************************************
if (!defined('SESSION_STARTED'))
{
    session_name(APP_NAME.'sessionid');
	$cookie_settings = session_get_cookie_params();
	session_start();
    // extend the session lifetime on each action
    setcookie(
        session_name(),
        session_id(),
        time()+ini_get('session.gc_maxlifetime'),
        $cookie_settings["path"],
        $cookie_settings["domain"],
        (strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) === 'https'),
        true
    );
    CAT_Registry::register('SESSION_STARTED', true, true);
}
if (defined('ENABLED_ASP') && ENABLED_ASP && !isset($_SESSION['session_started']))
    $_SESSION['session_started'] = time();
    
//**************************************************************************
// frontend only
//**************************************************************************
if (!CAT_Backend::isBackend() && !defined('CAT_AJAX_CALL') && !defined('CAT_LOGIN_PHASE') && defined('ENABLE_CSRFMAGIC') && true === ENABLE_CSRFMAGIC )
{
    CAT_Helper_Protect::getInstance()->enableCSRFMagic();
}

//**************************************************************************
// Get users language
//**************************************************************************
$val = CAT_Helper_Validate::getInstance();
if($val->get('_REQUEST','lang'))
{
    $language = strtoupper($val->get('_REQUEST','lang'));
    $language = $val->lang()->checkLang($language)
              ? $language
              : CAT_Registry::get('DEFAULT_LANGUAGE');
    $_SESSION['lang'] = $language;
    CAT_Registry::register('LANGUAGE', strtoupper($language), true);
}
if ( ! CAT_Registry::exists('LANGUAGE') )
    CAT_Registry::register('LANGUAGE',DEFAULT_LANGUAGE,true);

// Load Language file
if (!defined('LANGUAGE_LOADED'))
    if (!file_exists(CAT_PATH . '/languages/' . LANGUAGE . '.php'))
        exit('Error loading language file ' . LANGUAGE . ', please check configuration');
    else
        require_once(CAT_PATH . '/languages/' . LANGUAGE . '.php');
    
//**************************************************************************
// set timezone and date/time formats
//**************************************************************************
$timezone_string = (isset($_SESSION['TIMEZONE_STRING']) ? $_SESSION['TIMEZONE_STRING'] : DEFAULT_TIMEZONE_STRING);
date_default_timezone_set($timezone_string);
CAT_Registry::register('CAT_TIME_FORMAT', CAT_Helper_DateTime::getDefaultTimeFormat(), true);
CAT_Registry::register('CAT_DATE_FORMAT', CAT_Helper_DateTime::getDefaultDateFormatShort(), true);
    
//**************************************************************************
// Disable magic_quotes_runtime
//**************************************************************************
if (version_compare(PHP_VERSION, '5.3.0', '<'))
    set_magic_quotes_runtime(0);
	
//**************************************************************************
// Set theme
//**************************************************************************
CAT_Registry::register('CAT_THEME_URL' , CAT_URL  . '/templates/' . DEFAULT_THEME, true);
CAT_Registry::register('CAT_THEME_PATH', CAT_PATH . '/templates/' . DEFAULT_THEME, true);
    
//**************************************************************************
// set the search library
//**************************************************************************
if (!defined('CAT_INSTALL_PROCESS'))
{
    if (false !== ($query = $database->query("SELECT value FROM `:prefix:search` WHERE name='cfg_search_library' LIMIT 1")))
    {
        ($query->rowCount() > 0) ? $res = $query->fetch() : $res['value'] = 'lib_search';
        CAT_Registry::register('SEARCH_LIBRARY', $res['value'], true);
    }
    else
    {
        CAT_Registry::register('SEARCH_LIBRARY', 'lib_search', true);
    }
}
else
{
    CAT_Registry::register('SEARCH_LIBRARY', 'lib_search', true);
}        

//**************************************************************************
// get template engine
//**************************************************************************
global $parser;
$parser = CAT_Helper_Template::getInstance('Dwoo');

//**************************************************************************
// wblib2 autoloader
//**************************************************************************
spl_autoload_register(function($class) {
    if(substr_count($class,'wbForms') && !class_exists('\wblib\wbForms'))
    {
        @require CAT_Helper_Directory::sanitizePath(CAT_PATH.'/modules/lib_wblib/wblib/wbForms.php');
    }
    else
    {
        $file = str_replace('\\','/',CAT_Helper_Directory::sanitizePath(CAT_PATH.'/modules/lib_wblib/'.str_replace(array('\\','_'), array('/','/'), $class).'.php'));
        if (file_exists($file)) {
            @require $file;
        }
    }
});

CAT_Registry::register('CAT_INITIALIZED', true, true);
