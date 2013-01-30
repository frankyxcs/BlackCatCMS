<?php

/**
 * This file is part of LEPTON Core, released under the GNU GPL
 * Please see LICENSE and COPYING files in your package for details, specially for terms and warranties.
 * 
 * NOTICE:LEPTON CMS Package has several different licenses.
 * Please see the individual license in the header of each single file or info.php of modules and templates.
 *
 * @author          Website Baker Project, LEPTON Project
 * @copyright       2004-2010, Website Baker Project
 * @copyright       2010-2011, LEPTON Project
 * @link            http://www.LEPTON-cms.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @license_terms   please see LICENSE and COPYING files in your package
 *
 *
 */


// include class.secure.php to protect this file and the whole CMS!
if (defined('WB_PATH')) {
	include(WB_PATH.'/framework/class.secure.php');
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

// Define that this file is loaded
if(!defined('LANGUAGE_LOADED')) {
	define('LANGUAGE_LOADED', true);
}

// Set the language information
$language_code = 'EN';
$language_name = 'English';
$language_version = '1.0';
$language_platform = '1.0.x';
$language_author = 'Ryan Djurovich, Christian Sommer';
$language_license = 'GNU General Public License';
$language_guid = '1412c11c-378f-44ea-9a0e-a9223a2027ef';

$MENU = array(
	'ACCESS' 				=> 'Access',
	'ADDON' 				=> 'Add-on',
	'ADDONS' 				=> 'Add-ons',
	'ADMINTOOLS' 			=> 'Admin-Tools',
	'BREADCRUMB' 			=> 'You are here: ',
	'FORGOT' 				=> 'Retrieve Login Details',
	'GROUP' 				=> 'Group',
	'GROUPS' 				=> 'Groups',
	'HELP' 					=> 'Help',
	'LANGUAGES' 			=> 'Languages',
	'LOGIN' 				=> 'Login',
	'LOGOUT' 				=> 'Log-out',
	'MEDIA' 				=> 'Media',
	'MODULES' 				=> 'Modules',
	'PAGES' 				=> 'Pages',
	'PREFERENCES' 			=> 'Preferences',
	'SETTINGS' 				=> 'Settings',
	'START' 				=> 'Start',
	'TEMPLATES' 			=> 'Templates',
	'USERS' 				=> 'Users',
	'VIEW' 					=> 'View',
	'SERVICE'				=> 'Service'
); // $MENU

$TEXT = array(
	'ACCOUNT_SIGNUP' 		=> 'Account Sign-Up',
	'ACTION_NOT_SUPPORTED'	=> 'Action not supported',
	'ACTIONS' 				=> 'Actions',
	'ACTIVE' 				=> 'Active',
	'ADD' 					=> 'Add',
	'ADDON' 				=> 'Add-On',
	'ADD_SECTION' 			=> 'Add Section',
	'ADMIN' 				=> 'Admin',
	'ADMINISTRATION' 		=> 'Administration',
	'ADMINISTRATION_TOOL' 	=> 'Administration tool',
	'ADMINISTRATOR' 		=> 'Administrator',
	'ADMINISTRATORS' 		=> 'Administrators',
	'ADVANCED' 				=> 'Advanced',
	'ALLOWED_FILETYPES_ON_UPLOAD' => 'Allowed filetypes on upload',
	'ALLOWED_VIEWERS' 		=> 'Allowed Viewers',
	'ALLOW_MULTIPLE_SELECTIONS' => 'Allow Multiple Selections',
	'ALL_WORDS' 			=> 'All Words',
	'ANCHOR' 				=> 'Anchor',
	'ANONYMOUS' 			=> 'Anonymous',
	'ANY_WORDS' 			=> 'Any Words',
	'APP_NAME' 				=> 'Application Name',
	'ARE_YOU_SURE' 			=> 'Are you sure?',
	'AT' 					=> 'at',
	'AUTHOR' 				=> 'Author',
	'BACK' 					=> 'Back',
	'BACKUP' 				=> 'Backup',
	'BACKUP_ALL_TABLES' 	=> 'Backup all tables in database',
	'BACKUP_DATABASE' 		=> 'Backup Database',
	'BACKUP_MEDIA' 			=> 'Backup Media',
	'BACKUP_WB_SPECIFIC' 	=> 'Backup only WB-specific tables',
	'BASIC' 				=> 'Basic',
	'BLOCK' 				=> 'Block',
	'CALENDAR' 				=> 'Calendar',
	'CANCEL' 				=> 'Cancel',
	'CAN_DELETE_HIMSELF' 	=> 'Can delete himself',
	'CAPTCHA_VERIFICATION' 	=> 'Captcha Verification',
	'CAP_EDIT_CSS' 			=> 'Edit CSS',
	'CHANGE' 				=> 'Change',
	'CHANGES' 				=> 'Changes',
	'CHANGE_SETTINGS' 		=> 'Change Settings',
	'CHARSET' 				=> 'Charset',
	'CHECKBOX_GROUP' 		=> 'Checkbox Group',
	'CLOSE' 				=> 'Close',
	'CODE' 					=> 'Code',
	'CODE_SNIPPET' 			=> 'Code-snippet',
	'COLLAPSE' 				=> 'Collapse',
	'COMMENT' 				=> 'Comment',
	'COMMENTING' 			=> 'Commenting',
	'COMMENTS' 				=> 'Comments',
	'CREATED' 				=> 'Created',
	'CURRENT' 				=> 'Current',
	'CURRENT_FOLDER' 		=> 'Current Folder',
	'CURRENT_PAGE' 			=> 'Current Page',
	'CURRENT_PASSWORD' 		=> 'Current Password',
	'CUSTOM' 				=> 'Custom',
	'DATABASE' 				=> 'Database',
	'DATE' 					=> 'Date',
	'DATE_FORMAT' 			=> 'Date Format',
	'DEFAULT' 				=> 'Default',
	'DEFAULT_CHARSET' 		=> 'Default Charset',
	'DEFAULT_TEXT' 			=> 'Default Text',
	'DEFAULT_TEMPLATE'		=> 'Default Template',
	'DEFAULT_WYSIWYG' 		=> 'Default WYSIWYG',
	'DELETE' 				=> 'Delete',
	'DELETED' 				=> 'Deleted',
	'DELETE_USER' 			=> 'Delete user',
	'DELETE_GROUP' 			=> 'Delete group',
	'DELETE_DATE' 			=> 'Delete date',
	'DELETE_ZIP' 			=> 'Delete zip archive after unpacking',
	'DESCRIPTION' 			=> 'Description',
	'DESIGNED_FOR' 			=> 'Designed For',
	'DIRECTORIES' 			=> 'Directories',
	'DIRECTORY_MODE' 		=> 'Directory Mode',
	'DISABLED' 				=> 'Disabled',
	'DISPLAY_NAME' 			=> 'Display Name',
	'EMAIL' 				=> 'Email',
	'EMAIL_ADDRESS' 		=> 'Email Address',
	'EMPTY_TRASH' 			=> 'Empty Trash',
	'ENABLE_JAVASCRIPT'		=> "Please enable your JavaScript to use this form.",
	'ENABLED' 				=> 'Enabled',
	'END' 					=> 'End',
	'ERROR' 				=> 'Error',
	'EXACT_MATCH' 			=> 'Exact Match',
	'EXECUTE' 				=> 'Execute',
	'EXPAND' 				=> 'Expand',
	'EXTENSION' 			=> 'Extension',
	'FIELD' 				=> 'Field',
	'FILE' 					=> 'File',
	'FILES' 				=> 'Files',
	'FILETYPE'				=> 'Type',
	'FILESIZE'				=> 'Size',
	'FILESYSTEM_PERMISSIONS' => 'Filesystem Permissions',
	'FILE_MODE' 			=> 'File Mode',
	'FINISH_PUBLISHING' 	=> 'Finish Publishing',
	'FIRST'                 => 'First',
	'FOLDER' 				=> 'Folder',
	'FOLDERS' 				=> 'Folders',
	'FOOTER' 				=> 'Footer',
	'FORGOTTEN_DETAILS' 	=> 'Forgotten your details?',
	'FORGOT_DETAILS' 		=> 'Forgot Details?',
	'FROM' 					=> 'From',
	'FRONTEND' 				=> 'Front-end',
	'FULL_NAME' 			=> 'Full Name',
	'FUNCTION' 				=> 'Function',
	'GROUP' 				=> 'Group',
	'HEADER' 				=> 'Header',
	'HEADING' 				=> 'Heading',
	'HEADING_CSS_FILE' 		=> 'Actual module file: ',
	'HEIGHT' 				=> 'Height',
	'HELP_LEPTOKEN_LIFETIME'		=> 'in seconds, 0 means no CSRF protection!',
	'HELP_MAX_ATTEMPTS'		=> 'When reaching this number, more login attempts are not possible for this session.',
	'HIDDEN' 				=> 'Hidden',
	'HIDE' 					=> 'Hide',
	'HIDE_ADVANCED' 		=> 'Hide Advanced Options',
	'HOME' 					=> 'Home',
	'HOMEPAGE_REDIRECTION' 	=> 'Homepage Redirection',
	'HOME_FOLDER' 			=> 'Personal Folder',
	'HOME_FOLDERS' 			=> 'Personal Folders',
	'HOST' 					=> 'Host',
	'ICON' 					=> 'Icon',
	'IMAGE' 				=> 'Image',
	'INLINE' 				=> 'In-line',
	'INSTALL' 				=> 'Install',
	'INSTALLATION' 			=> 'Installation',
	'INSTALLATION_PATH' 	=> 'Installation Path',
	'INSTALLATION_URL' 		=> 'Installation URL',
	'INSTALLED' 			=> 'installed',
	'INTRO' 				=> 'Intro',
	'INTRO_PAGE' 			=> 'Intro Page',
	'INVALID_SIGNS' 		=> 'must begin with a letter or has invalid signs',
	'KEYWORDS' 				=> 'Keywords',
	'LANGUAGE' 				=> 'Language',
    'LAST'                  => 'Last',
	'LAST_UPDATED_BY' 		=> 'Last Updated By',
	'LENGTH' 				=> 'Length',
	'LEPTOKEN_LIFETIME'		=> 'Leptoken Lifetime',
	'LEVEL' 				=> 'Level',
	'LIBRARY'				=> 'Library',
	'LICENSE'				=> 'License',
	'LINK' 					=> 'Link',
	'LINUX_UNIX_BASED' 		=> 'Linux/Unix based',
	'LIST_OPTIONS' 			=> 'List Options',
	'LOGGED_IN' 			=> 'Logged-In',
	'LOGIN' 				=> 'Login',
	'LONG' 					=> 'Long',
	'LONG_TEXT' 			=> 'Long Text',
	'LOOP' 					=> 'Loop',
	'MAIN' 					=> 'Main',
	'MANAGE' 				=> 'Manage',
	'MANAGE_GROUPS' 		=> 'Manage Groups',
	'MANAGE_USERS' 			=> 'Manage Users',
	'MATCH' 				=> 'Match',
	'MATCHING' 				=> 'Matching',
	'MAX_ATTEMPTS'		=> 'Allowed wrong login attempts',
	'MAX_EXCERPT' 			=> 'Max lines of excerpt',
	'MAX_SUBMISSIONS_PER_HOUR' => 'Max. Submissions Per Hour',
	'MEDIA_DIRECTORY' 		=> 'Media Directory',
	'MENU' 					=> 'Menu',
	'MENU_TITLE' 			=> 'Menu Title',
	'MESSAGE' 				=> 'Message',
	'DEFAULT_MESSAGE_TITLE'	=> 'System notification',
	'MODIFY' 				=> 'Modify',
	'MODIFY_CONTENT' 		=> 'Modify Content',
	'MODIFY_SETTINGS' 		=> 'Modify Settings',
	'MODULE_ORDER' 			=> 'Module-order for searching',
	'MODULE_PERMISSIONS' 	=> 'Module Permissions',
	'MORE' 					=> 'More',
	'MOVE_DOWN' 			=> 'Move Down',
	'MOVE_UP' 				=> 'Move Up',
	'MULTIPLE_MENUS' 		=> 'Multiple Menus',
	'MULTISELECT' 			=> 'Multi-select',
	'NAME' 					=> 'Name',
	'NEED_CURRENT_PASSWORD' => 'confirm with current password',
	'NEED_PASSWORD_TO_CONFIRM' => 'Please confirm the changes with your current password',
	'NEED_TO_LOGIN' 		=> 'Need to log-in?',
	'NEW_FOLDER' 			=> 'new folder',
	'NEW_PASSWORD' 			=> 'New Password',
	'NEW_USER_HINT'			=> 'Minimum length for user name: %d chars, Minimum length for Password: %d chars!',
	'NEW_WINDOW' 			=> 'New Window',
	'NEXT' 					=> 'Next',
	'NEXT_PAGE' 			=> 'Next Page',
	'NO' 					=> 'No',
	'NO_LEPTON_ADDON'		=> 'This addon cannot be used with LEPTON',
	'NO_PREVIEW'			=> 'No preview available',
	'NONE' 					=> 'None',
	'NONE_FOUND' 			=> 'None Found',
	'NOT_FOUND' 			=> 'Not Found',
	'NOT_INSTALLED' 		=> 'not installed',
	'NO_RESULTS' 			=> 'No Results',
	'OF' 					=> 'Of',
	'ON' 					=> 'On',
	'OPEN' 					=> 'Open',
	'OPTION' 				=> 'Option',
	'OTHERS' 				=> 'Others',
	'OUT_OF' 				=> 'Out Of',
	'OVERWRITE_EXISTING' 	=> 'Overwrite existing',
	'PAGE' 					=> 'Page',
	'PAGES_DIRECTORY' 		=> 'Pages Directory',
	'PAGES_PERMISSION' 		=> 'Pages Permission',
	'PAGES_PERMISSIONS' 	=> 'Pages Permissions',
	'PAGE_EXTENSION' 		=> 'Page Extension',
	'PAGE_ID'				=> 'Page ID',
	'PAGE_LANGUAGES' 		=> 'Page Languages',
	'PAGE_LEVEL_LIMIT' 		=> 'Page Level Limit',
	'PAGE_SPACER' 			=> 'Page Spacer',
	'PAGE_TITLE' 			=> 'Page Title',
	'PAGE_TRASH' 			=> 'Page Trash',
	'PARENT' 				=> 'Parent',
	'PASSWORD' 				=> 'Password',
	'PATH' 					=> 'Path',
	'PHP_ERROR_LEVEL' 		=> 'PHP Error Reporting Level',
	'PLEASE_LOGIN' 			=> 'Please login',
	'PLEASE_SELECT' 		=> 'Please select',
	'POST' 					=> 'Post',
	'POSTS_PER_PAGE' 		=> 'Posts Per Page',
	'POST_FOOTER' 			=> 'Post Footer',
	'POST_HEADER' 			=> 'Post Header',
	'PREVIOUS' 				=> 'Previous',
	'PREVIOUS_PAGE' 		=> 'Previous Page',
	'PRIVATE' 				=> 'Private',
	'PRIVATE_VIEWERS' 		=> 'Private Viewers',
	'PROFILES_EDIT' 		=> 'Change the profile',
	'PUBLIC' 				=> 'Public',
	'PUBL_END_DATE' 		=> 'End date',
	'PUBL_START_DATE' 		=> 'Start date',
	'RADIO_BUTTON_GROUP' 	=> 'Radio Button Group',
	'RANDOM'                => 'Random',
	'READ' 					=> 'Read',
	'READ_MORE' 			=> 'Read More',
	'REDIRECT_AFTER' 		=> 'Redirect after',
	'REGISTERED' 			=> 'Registered',
	'REGISTERED_VIEWERS' 	=> 'Registered Viewers',
	'REGISTERED_CONTENT'	=> 'Only registered visitors of this website have access to this content',
	'RELOAD' 				=> 'Reload',
	'REMEMBER_ME' 			=> 'Remember Me',
	'RENAME' 				=> 'Rename',
	'DUPLICATE' 			=> 'Duplicate',
	'RENAME_FILES_ON_UPLOAD' => 'Rename Files On Upload',
	'REQUIRED' 				=> 'Required',
	'REQUIREMENT' 			=> 'Requirement',
	'RESET' 				=> 'Reset',
	'RESIZE' 				=> 'Re-size',
	'RESIZE_IMAGE_TO' 		=> 'Resize Image To',
	'RESTORE' 				=> 'Restore',
	'RESTORE_DATABASE' 		=> 'Restore Database',
	'RESTORE_MEDIA' 		=> 'Restore Media',
	'RESULTS' 				=> 'Results',
	'RESULTS_FOOTER' 		=> 'Results Footer',
	'RESULTS_FOR' 			=> 'Results For',
	'RESULTS_HEADER' 		=> 'Results Header',
	'RESULTS_LOOP' 			=> 'Results Loop',
	'RETYPE_NEW_PASSWORD' 	=> 'Re-type New Password',
	'RETYPE_PASSWORD' 		=> 'Re-type Password',
	'SAME_WINDOW' 			=> 'Same Window',
	'SAVE' 					=> 'Save',
	'SEARCH' 				=> 'Search',
	'SEARCH_CONTENT_IMAGE'  => 'use image from content page in search result',
    'SEARCH_DESCRIPTION'    => 'Search for page descriptions',
    'SEARCH_DROPLEP'        => 'Individual page: DropLEP for search result',
	'SEARCH_FOR'			=> 'Search by',
    'SEARCH_KEYWORDS'       => 'Search for page keywords',
    'SEARCH_LIBRARY'        => 'Active LEPTON Search library',
    'SEARCH_LINK_NON_PUBLIC' => 'Redirect link (URL) for non-public content',
    'SEARCH_NON_PUBLIC_CONTENT' => 'Search in non-public content',
    'SEARCH_IMAGES'         => 'Search for images',
    'SEARCH_PAGE_ID'        => 'Individual page: PAGE_ID for search result',
    'SEARCH_SHOW_DESCRIPTION' => 'show page description in search result',
    'SEARCH_THUMBS_WIDTH'   => 'max. width/height of images in search result',
    'SEARCH_TEMPLATE'       => 'Standard page: Template for search result',
	'SEARCHING' 			=> 'Searching',
	'SECTION' 				=> 'Section',
	'SECTION_BLOCKS' 		=> 'Section Blocks',
	'SECTION_DELETE'		=> 'Delete section',
	'SECTION_ID'			=> 'Sektion ID',
	'SEC_ANCHOR' 			=> 'Section-Anchor text',
	'SELECT_BOX' 			=> 'Select Box',
	'SEND_DETAILS' 			=> 'Send Details',
	'SEPARATE' 				=> 'Separate',
	'SEPERATOR' 			=> 'Separator',
	'SERVER_EMAIL' 			=> 'Server Email',
	'SERVER_OPERATING_SYSTEM' => 'Server Operating System',
	'SESSION_IDENTIFIER' 	=> 'Session Identifier',
	'SETTINGS' 				=> 'Settings',
	'SHORT' 				=> 'Short',
	'SHORT_TEXT' 			=> 'Short Text',
	'SHOW' 					=> 'Show',
	'SHOW_ADVANCED' 		=> 'Show Advanced Options',
	'SIGNUP' 				=> 'Sign-up',
	'SIZE' 					=> 'Size',
	'SMART_LOGIN' 			=> 'Smart Login',
	'START' 				=> 'Start',
	'START_PUBLISHING' 		=> 'Start Publishing',
	'SUBJECT' 				=> 'Subject',
	'SUBMISSIONS' 			=> 'Submissions',
	'SUBMISSIONS_STORED_IN_DATABASE' => 'Submissions Stored In Database',
	'SUBMISSION_ID' 		=> 'Submission ID',
	'SUBMITTED' 			=> 'Submitted',
	'SUCCESS' 				=> 'Success',
	'SYSTEM_DEFAULT' 		=> 'System Default',
	'SYSTEM_PERMISSIONS' 	=> 'System Permissions',
	'TABLE_PREFIX' 			=> 'Table Prefix',
	'TARGET' 				=> 'Target',
	'TARGET_FOLDER' 		=> 'Target folder',
	'TEMPLATE' 				=> 'Template',
	'TEMPLATE_PERMISSIONS' 	=> 'Template Permissions',
	'TEXT' 					=> 'Text',
	'TEXTAREA' 				=> 'Textarea',
	'TEXTFIELD' 			=> 'Textfield',
	'THEME' 				=> 'Backend-Theme',
	'TIME' 					=> 'Time',
	'TIMEZONE' 				=> 'Timezone',
	'TIME_FORMAT' 			=> 'Time Format',
	'TIME_LIMIT' 			=> 'Max time to gather excerpts per module',
	'TITLE' 				=> 'Title',
	'TO' 					=> 'To',
	'TOP_FRAME' 			=> 'Top Frame',
	'TRASH_EMPTIED' 		=> 'Trash Emptied',
	'TXT_EDIT_CSS_FILE' 	=> 'Edit the CSS definitions in the textarea below.',
	'TYPE' 					=> 'Type',
	'UNDER_CONSTRUCTION' 	=> 'Under Construction',
	'UNINSTALL' 			=> 'Uninstall',
	'UNKNOWN' 				=> 'Unknown',
	'UNLIMITED' 			=> 'Unlimited',
	'UNZIP_FILE' 			=> 'Upload and unpack a zip archive',
	'UP' 					=> 'Up',
	'UPGRADE' 				=> 'Upgrade',
	'UPLOAD_FILES' 			=> 'Upload File(s)',
	'URL' 					=> 'URL',
	'USER' 					=> 'User',
	'USERNAME' 				=> 'Username',
	'USERS_ACTIVE' 			=> 'User is set active',
	'USERS_CAN_SELFDELETE' 	=> 'User can delete himself',
	'USERS_CHANGE_SETTINGS' => 'User can change his own settings',
	'USERS_DELETED' 		=> 'User is marked as deleted',
	'USERS_FLAGS' 			=> 'User-Flags',
	'USERS_PROFILE_ALLOWED' => 'User can create extended profile',
	'VERIFICATION' 			=> 'Verification',
	'VERSION' 				=> 'Version',
	'VIEW' 					=> 'View',
	'VIEW_DELETED_PAGES' 	=> 'View Deleted Pages',
	'VIEW_DETAILS' 			=> 'View Details',
	'VISIBILITY' 			=> 'Visibility',
	'WBMAILER_DEFAULT_SENDER_MAIL' => 'Default From Mail',
	'WBMAILER_DEFAULT_SENDER_NAME' => 'Default Sender Name',
	'WBMAILER_DEFAULT_SETTINGS_NOTICE' => 'Please specify a default "FROM" address and "SENDER" name below. It is recommended to use a FROM address like: <strong>admin@yourdomain.com</strong>. Some mail provider (e.g. <em>mail.com</em>) may reject mails with a FROM: address like <em>name@mail.com</em> sent via a foreign relay to avoid spam.<br /><br />The default values are only used if no other values are specified by LEPTON. If your server supports <acronym title="Simple mail transfer protocol">SMTP</acronym>, you may want use this option for outgoing mails.',
	'WBMAILER_FUNCTION' 	=> 'Mail Routine',
	'WBMAILER_NOTICE' 		=> '<strong>SMTP Mailer Settings:</strong><br />The settings below are only required if you want to send mails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. If you do not know your SMTP host or you are not sure about the required settings, simply stay with the default mail routine: PHP MAIL.',
	'WBMAILER_PHP' 			=> 'PHP MAIL',
	'WBMAILER_SEND_TESTMAIL' => 'Send test eMail',
	'WBMAILER_SMTP' 		=> 'SMTP',
	'WBMAILER_SMTP_AUTH' 	=> 'SMTP Authentification',
	'WBMAILER_SMTP_AUTH_NOTICE' => 'only activate if your SMTP host requires authentification',
	'WBMAILER_SMTP_HOST' 	=> 'SMTP Host',
	'WBMAILER_SMTP_PASSWORD' => 'SMTP Password',
	'WBMAILER_SMTP_USERNAME' => 'SMTP Username',
  'WBMAILER_TESTMAIL_FAILED' => 'The test eMail could not be sent! Please check your settings!',
	'WBMAILER_TESTMAIL_SUCCESS' => 'The test eMail was sent successfully. Please check your inbox.',
  'WBMAILER_TESTMAIL_TEXT' => 'This is the required test mail: php mailer is working',
	'WEBSITE' 				=> 'Website',
	'WEBSITE_DESCRIPTION' 	=> 'Website Description',
	'WEBSITE_FOOTER' 		=> 'Website Footer',
	'WEBSITE_HEADER' 		=> 'Website Header',
	'WEBSITE_KEYWORDS' 		=> 'Website Keywords',
	'WEBSITE_TITLE' 		=> 'Website Title',
	'WELCOME_BACK' 			=> 'Welcome back',
	'WIDTH' 				=> 'Width',
	'WINDOW' 				=> 'Window',
	'WINDOWS' 				=> 'Windows',
	'WORLD_WRITEABLE_FILE_PERMISSIONS' => 'World-writeable file permissions',
	'WRITE' 				=> 'Write',
	'WYSIWYG_EDITOR' 		=> 'WYSIWYG Editor',
	'WYSIWYG_STYLE'	 		=> 'WYSIWYG Style',
	'YES' 					=> 'Yes',
	'BASICS'	=> array(
		'day'		=> "day",		# day, singular
		'day_pl'	=> "days",		# day, plural
		'hour'		=> "hour", 		# hour, singular
		'hour_pl'	=> "hours",		# hour, plural
		'minute'	=> "minute",	# minute, singular
		'minute_pl'	=> "minutes",	# minute, plural
	)
); // $TEXT

$HEADING = array(
	'FRONTEND_SETTINGS' 	=> 'Frontend Settings',
	'INSTALL_LANGUAGE' 		=> 'Install Language',
	'INSTALL_MODULE' 		=> 'Install Module',
	'INSTALL_TEMPLATE' 		=> 'Install Template',
	'INVOKE_MODULE_FILES' 	=> 'Execute module files manually',
	'LANGUAGE_DETAILS' 		=> 'Language Details',
	'LANGUAGE_TIME_SETTINGS' => 'Language & Time',
	'MANAGE_SECTIONS' 		=> 'Manage Sections',
	'MODIFY_ADVANCED_PAGE_SETTINGS' => 'Modify Advanced Page Settings',
	'MODIFY_DELETE_GROUP' 	=> 'Modify/Delete Group',
	'MODIFY_DELETE_PAGE' 	=> 'Modify/Delete Page',
	'MODIFY_DELETE_USER' 	=> 'Modify/Delete User',
	'MODIFY_GROUP' 			=> 'Modify Group',
	'MODIFY_GROUPS' 		=> 'Modify Groups',
	'MODIFY_INTRO_PAGE' 	=> 'Modify Intro Page',
	'MODIFY_PAGE' 			=> 'Modify Page',
	'MODIFY_PAGE_SETTINGS' 	=> 'Modify Page Settings',
	'MODIFY_USER' 			=> 'Modify User',
	'MODULE_DETAILS' 		=> 'Module Details',
	'MY_EMAIL' 				=> 'My Email',
	'MY_PASSWORD' 			=> 'My Password',
	'MY_SETTINGS' 			=> 'My Settings',
	'SEARCH_SETTINGS' 		=> 'Search Settings',
	'SECURITY_SETTINGS'		=> 'Security Setting',
	'SEO_SETTINGS'			=> 'SEO Setting',
	'SERVER_SETTINGS' 		=> 'Server Settings',
	'SYSTEM_SETTINGS'		=> 'System Setting',
	'TEMPLATE_DETAILS' 		=> 'Template Details',
	'UNINSTALL_LANGUAGE' 	=> 'Uninstall Language',
	'UNINSTALL_MODULE' 		=> 'Uninstall Module',
	'UNINSTALL_TEMPLATE' 	=> 'Uninstall Template',
	'UPGRADE_LANGUAGE' 		=> 'Language register/updating',
	'UPGRADE_MODULE' 		=> 'Module updating',
	'UPLOAD_FILES' 			=> 'Upload File(s)',
	'USER_SETTINGS' 		=> 'User Settings',
	'VISIBILITY' 			=> 'Visibility',
	'WBMAILER_SETTINGS' 	=> 'Mailer Settings'
); // $HEADING

$MESSAGE = array(
	'ADDON_ERROR_RELOAD' 	=> 'Error while updating the Add-On information.',
	'ADDON_GROUPS_MARKALL' => 'Mark/ unmark all',
	'ADDON_LANGUAGES_RELOADED' => 'Languages reloaded successfully',
	'ADDON_MANUAL_FTP_LANGUAGE' => '<strong>ATTENTION!</strong> For safety reasons uploading languages files in the folder/languages/ only by FTP and use the Upgrade function for registering or updating.',
	'ADDON_MANUAL_FTP_WARNING' => 'Warning: Existing module database entries will get lost. ',
	'ADDON_MANUAL_INSTALLATION' => 'When modules are uploaded via FTP (not recommended), the module installation functions <tt>install</tt>, <tt>upgrade</tt> or <tt>uninstall</tt> will not be executed automatically. Those modules may not work correct or do not uninstall properly.<br /><br />You can execute the module functions manually for modules uploaded via FTP below.',
	'ADDON_MANUAL_INSTALLATION_WARNING' => 'Warning: Existing module database entries will get lost. Only use this option if you experience problems with modules uploaded via FTP.',
	'ADDON_MANUAL_RELOAD_WARNING' => 'Warning: Existing module database entries will get lost. ',
	'ADDON_MODULES_RELOADED' => 'Modules reloaded successfully',
	'ADDON_PRECHECK_FAILED' => 'Add-on installation failed. Your system does not fulfill the requirements of this Add-on. To make this Add-on working on your system, please fix the issues summarized below.',
	'ADDON_RELOAD' 			=> 'Update database with information from Add-on files (e.g. after FTP upload).',
	'ADDON_TEMPLATES_RELOADED' => 'Templates reloaded successfully',
	'ADMIN_INSUFFICIENT_PRIVILEGES' => 'Insufficient privelliges to be here',
	'CUSTOMIZE_PERMISSIONS_LATER'		=> 'You can customize permissions later on group administration.',
	'FORGOT_PASS_ALREADY_RESET' => 'Password cannot be reset more than once per hour, sorry',
	'FORGOT_PASS_CANNOT_EMAIL' => 'Unable to email password, please contact system administrator',
	'FORGOT_PASS_EMAIL_NOT_FOUND' => 'The email that you entered cannot be found in the database',
	'FORGOT_PASS_NO_DATA' 	=> 'Please enter your email address below',
	'FORGOT_PASS_PASSWORD_RESET' => 'Your username and password have been sent to your email address',
	'GENERIC_BAD_PERMISSIONS' => 'Unable to write to the target directory',
	'GENERIC_CANNOT_UNINSTALL'						=> 'Cannot uninstall',
	'GENERIC_CANNOT_UNINSTALL_IN_USE'				=> 'Cannot Uninstall: the selected file is in use',
	'GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'			=> '{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}',
	'GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'	=> 'this page;these pages',
	'GENERIC_CANNOT_UNINSTALL_IS_DEFAULT'			=> 'Can\'t uninstall the {{type}} <b>{{name}}</b>, because it is the {{standard}}!',
	'GENERIC_CANNOT_UNZIP' 	=> 'Cannot unzip file',
	'GENERIC_CANNOT_UPLOAD' => 'Cannot upload file',
	'GENERIC_COMPARE' 		=> ' successfully',
	'GENERIC_ERROR_OPENING_FILE' => 'Error opening file.',
	'GENERIC_FAILED_COMPARE' => ' failed',
	'GENERIC_FILE_TYPE' 	=> 'Please note that the file you upload must be of the following format:',
	'GENERIC_FILE_TYPES' 	=> 'Please note that the file you upload must be in one of the following formats:',
	'GENERIC_FILL_IN_ALL' 	=> 'Please go back and fill-in all fields',
	'GENERIC_INSTALLED' 	=> 'Installed successfully',
	'GENERIC_INVALID' 		=> 'The file you uploaded is invalid',
	'GENERIC_INVALID_MODULE' => 'Invalid module! No info.php or missing version number.',
	'GENERIC_INVALID_LANGUAGE_FILE' => 'Invalid LEPTON language file. Please check the text file.',
	'GENERIC_MODULE_VERSION_ERROR' => 'The module is not installed properly!',
	'GENERIC_NOT_COMPARE' 	=> ' not possibly',
	'GENERIC_NOT_INSTALLED' => 'Not installed',
	'GENERIC_NOT_UPGRADED' 	=> 'Actualization not possibly',
	'GENERIC_PLEASE_BE_PATIENT' => 'Please be patient, this might take a while.',
	'GENERIC_PLEASE_CHECK_BACK_SOON' => 'Please check back soon...',
	'GENERIC_PLEASE_CHOOSE' => 'Please choose something...',
	'GENERIC_UNINSTALLED' 	=> 'Uninstalled successfully',
	'GENERIC_UPGRADED' 		=> 'Upgraded successfully',
	'GENERIC_VERSION_COMPARE' => 'Version comparison',
	'GENERIC_VERSION_GT' 	=> 'Upgrade necessary!',
	'GENERIC_VERSION_LT' 	=> 'Downgrade',
	'GENERIC_WEBSITE_UNDER_CONSTRUCTION' => 'Website Under Construction',
	'GROUPS_ADDED' 			=> 'Group added successfully',
	'GROUPS_CONFIRM_DELETE' => 'Are you sure you want to delete the selected group (and any users that belong to it)?',
	'GROUPS_DELETED' => 'Group deleted successfully',
	'GROUPS_GROUP_NAME_BLANK' => 'Group name is blank',
	'GROUPS_GROUP_NAME_EXISTS' => 'Group name already exists',
	'GROUPS_NO_GROUPS_FOUND' => 'No groups found',
	'GROUPS_SAVED' 			=> 'Group saved successfully',
	'LANG_MISSING_PARTS_NOTICE' => 'Language installation failed, one (or more) of the following variables is missing:<br />language_code<br />language_name<br />language_version<br />language_license',
	'LOGIN_AUTHENTICATION_FAILED' => 'Username or password incorrect',
	'LOGIN_BOTH_BLANK' 		=> 'Please enter your username and password below',
	'LOGIN_PASSWORD_BLANK' 	=> 'Please enter a password',
	'LOGIN_PASSWORD_TOO_LONG' => 'Supplied password to long',
	'LOGIN_PASSWORD_TOO_SHORT' => 'Supplied password to short',
	'LOGIN_USERNAME_BLANK' 	=> 'Please enter a username',
	'LOGIN_USERNAME_TOO_LONG' => 'Supplied username to long',
	'LOGIN_USERNAME_TOO_SHORT' => 'Supplied username to short',
	'MEDIA_BLANK_EXTENSION' => 'You did not enter a file extension',
	'MEDIA_BLANK_NAME' 		=> 'You did not enter a new name',
	'MEDIA_CANNOT_DELETE_DIR' => 'Cannot delete the selected folder',
	'MEDIA_CANNOT_DELETE_FILE' => 'Cannot delete the selected file',
	'MEDIA_CANNOT_RENAME' 	=> 'Rename unsuccessful',
	'MEDIA_CONFIRM_DELETE' 	=> 'Are you sure you want to delete the following file or folder?',
	'MEDIA_CONFIRM_DELETE_FILE'	=> 'Are you sure you want to delete file {name}?',
	'MEDIA_CONFIRM_DELETE_DIR'	=> 'Are you sure you want to delete the directory {name}?',
	'MEDIA_DELETED_DIR' 	=> 'Folder deleted successfully',
	'MEDIA_DELETED_FILE' 	=> 'File deleted successfully',
	'MEDIA_DIR_ACCESS_DENIED' => 'Specified directory does not exist or is not allowed.',
	'MEDIA_DIR_DOES_NOT_EXIST' => 'Directory does not exist',
	'MEDIA_DIR_DOT_DOT_SLASH' => 'Cannot include ../ in the folder name',
	'MEDIA_DIR_EXISTS' 		=> 'A folder matching the name you entered already exists',
	'MEDIA_DIR_MADE' 		=> 'Folder created successfully',
	'MEDIA_DIR_NOT_MADE' 	=> 'Unable to create folder',
	'MEDIA_FILE_EXISTS' 	=> 'A file matching the name you entered already exists',
	'MEDIA_FILE_NOT_FOUND' 	=> 'File not found',
	'MEDIA_NAME_DOT_DOT_SLASH' => 'Cannot include ../ in the name',
	'MEDIA_NAME_INDEX_PHP' 	=> 'Cannot use index.php as the name',
	'MEDIA_NONE_FOUND' 		=> 'No media found in the current folder',
	'MEDIA_RENAMED' 		=> 'Rename successful',
	'MEDIA_SINGLE_UPLOADED' => ' file was successfully uploaded',
	'MEDIA_TARGET_DOT_DOT_SLASH' => 'Cannot have ../ in the folder target',
	'MEDIA_UPLOADED' 		=> ' files were successfully uploaded',
	'MOD_MISSING_PARTS_NOTICE' => 'The installation of module "%s" failed, one (or more) of the following variables is missing:<br />module_directory<br />module_name<br />module_version<br />module_author<br />module_license<br />module_guid<br />module_function',
	'MOD_FORM_EXCESS_SUBMISSIONS' => 'Sorry, this form has been submitted too many times so far this hour. Please retry in the next hour.',
	'MOD_FORM_INCORRECT_CAPTCHA' => 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: <a href="mailto:'.SERVER_EMAIL.'">'.SERVER_EMAIL.'</a>',
	'MOD_FORM_REQUIRED_FIELDS' => 'You must enter details for the following fields',
	'PAGES_ADDED' 			=> 'Page added successfully',
	'PAGES_ADDED_HEADING' 	=> 'Page heading added successfully',
	'PAGES_BLANK_MENU_TITLE' => 'Please enter a menu title',
	'PAGES_BLANK_PAGE_TITLE' => 'Please enter a page title',
	'PAGES_CANNOT_CREATE_ACCESS_FILE' => 'Error creating access file in the pages directory(page), (insufficient privileges)',
	'PAGES_CANNOT_DELETE_ACCESS_FILE' => 'Error deleting access file in the pages directory(page), (insufficient privileges)',
	'PAGES_CANNOT_REORDER' 	=> 'Error re-ordering page',
	'PAGES_DELETED' 		=> 'Page deleted successfully',
	'PAGES_DELETE_CONFIRM' 	=> 'Are you sure you want to delete the selected page &laquo;%s&raquo; (and all of its sub-pages)',
	'PAGES_INSUFFICIENT_PERMISSIONS' => 'You do not have permissions to modify this page',
	'PAGES_INTRO_EMPTY' 		=> 'Please insert content, an empty intro page cannot be saved.',    
	'PAGES_INTRO_LINK' 		=> 'Click HERE to modify the intro page',
	'PAGES_INTRO_NOT_WRITABLE' => 'Cannot write to file page-directory/intro.php, (insufficient privileges)',
	'PAGES_INTRO_SAVED' 	=> 'Intro page saved successfully',
	'PAGES_LAST_MODIFIED' 	=> 'Last modification by',
	'PAGES_NOT_FOUND' 		=> 'Page not found',
	'PAGES_NOT_SAVED' 		=> 'Error saving page',
	'PAGES_PAGE_EXISTS' 	=> 'A page with the same or similar title exists',
	'PAGES_REORDERED' 		=> 'Page re-ordered successfully',
	'PAGES_RESTORED' 		=> 'Page restored successfully',
	'PAGES_RETURN_TO_PAGES' => 'Return to pages',
	'PAGES_SAVED' 			=> 'Page saved successfully',
	'PAGES_SAVED_SETTINGS' 	=> 'Page settings saved successfully',
	'PAGES_SECTIONS_PROPERTIES_SAVED' => 'Section properties saved successfully',
	'PREFERENCES_CURRENT_PASSWORD_INCORRECT' => 'The (current) password you entered is incorrect',
	'PREFERENCES_DETAILS_SAVED' => 'Details saved successfully',
	'PREFERENCES_EMAIL_UPDATED' => 'Email updated successfully',
	'PREFERENCES_INVALID_CHARS' => 'Invalid password chars used, vailid chars are: a-z\A-Z\0-9\_\-\!\#\*\+',
	'PREFERENCES_PASSWORD_CHANGED' => 'Password changed successfully',
	'RECORD_MODIFIED_FAILED' => 'The change of the record has missed.',
	'RECORD_MODIFIED_SAVED' => 'The changed record was updated successfully.',
	'RECORD_NEW_FAILED' 	=> 'Adding a new record has missed.',
	'RECORD_NEW_SAVED' 		=> 'New record was added successfully.',
	'SECTION_CONFIRM_DELETE'			=> 'Are you sure you want to delete this section?',
	'SET_PERMISSION_FOR_MODULES'		=> 'You can set permissions for each group to use this template.',
	'SET_PERMISSION_FOR_TEMPLATES'		=> 'You can set permissions for each group to use this module.',
	'SETTINGS_MODE_SWITCH_WARNING'		=> 'Please Note: Pressing this button resets all unsaved changes',
	'SETTINGS_SAVED' 		=> 'Settings saved successfully',
	'SETTINGS_UNABLE_OPEN_CONFIG' => 'Unable to open the configuration file',
	'SETTINGS_UNABLE_WRITE_CONFIG' => 'Cannot write to configuration file',
	'SETTINGS_WORLD_WRITEABLE_WARNING' => 'Please note: this is only recommended for testing environments',
	'SIGNUP2_ADMIN_INFO' 	=> '
A new user was registered.

Username: {LOGIN_NAME}
UserId: {LOGIN_ID}
E-Mail: {LOGIN_EMAIL}
IP-Adress: {LOGIN_IP}
Registration date: {SIGNUP_DATE}
----------------------------------------
This message was automatic generated!

',
	'SIGNUP2_BODY_LOGIN_FORGOT' => '
Hello {LOGIN_DISPLAY_NAME},

This mail was sent because the \'forgot password\' function has been applied to your account.

Your new \'{LOGIN_WEBSITE_TITLE}\' login details are:

Username: {LOGIN_NAME}
Password: {LOGIN_PASSWORD}

Your password has been reset to the one above.
This means that your old password will no longer work anymore!
If you\'ve got any questions or problems within the new login-data
you should contact the website-team or the admin of \'{LOGIN_WEBSITE_TITLE}\'.
Please remember to clean you browser-cache before using the new one to avoid unexpected fails.

Regards
------------------------------------
This message was automatic generated

',
	'SIGNUP2_BODY_LOGIN_INFO' => '
Hello {LOGIN_DISPLAY_NAME},

Welcome to our \'{LOGIN_WEBSITE_TITLE}\'.

Your \'{LOGIN_WEBSITE_TITLE}\' login details are:
Username: {LOGIN_NAME}
Password: {LOGIN_PASSWORD}

Regards

Please:
if you have received this message by an error, please delete it immediately!
-------------------------------------
This message was automatic generated!
',
	'SIGNUP2_SUBJECT_LOGIN_INFO'			=> 'Your LEPTON login details...',
	'SIGNUP_NO_EMAIL'						=> 'You must enter an email address',
	'START_CURRENT_USER'					=> 'You are currently logged in as:',
	'START_INSTALL_DIR_EXISTS'				=> 'Warning, Installation Directory Still Exists!',
	'START_WELCOME_MESSAGE'					=> 'Welcome to LEPTON Administration',
	'SYSTEM_FUNCTION_DEPRECATED'			=> 'The function <b>%s</b> is deprecated, use the function <b>%s</b> instead!',
	'SYSTEM_FUNCTION_NO_LONGER_SUPPORTED'	=> 'The function <b>%s</b> is out of date and no longer supported!',
	'SYSTEM_SETTING_NO_LONGER_SUPPORTED'	=> 'The setting <b>%s</b> is no longer supported and will be ignored!',
	'TEMPLATES_CHANGE_TEMPLATE_NOTICE'		=> 'Please note: to change the template you must go to the Settings section',
	'TEMPLATES_MISSING_PARTS_NOTICE'		=> 'Template installation failed, one (or more) of the following variables is missing:<br />template_directory<br />template_name<br />template_version<br />template_author<br />template_license<br />template_function ("theme" oder "template")',
	'USERS_ADDED'							=> 'User added successfully',
	'USERS_CANT_SELFDELETE'					=> 'Function rejected, You can not delete yourself!',
	'USERS_CHANGING_PASSWORD'				=> 'Please note: You should only enter values in those fields if you wish to change this users password',
	'USERS_CHOOSE_GROUP'					=> 'You need to choose even one group',  
	'USERS_CONFIRM_DELETE'					=> 'Are you sure you want to delete the selected user?',
	'USERS_DELETED'							=> 'User deleted successfully',
	'USERS_EMAIL_TAKEN'						=> 'The email you entered is already in use',
	'USERS_INVALID_EMAIL'					=> 'The email address you entered is invalid',
	'USERS_NAME_INVALID_CHARS'				=> 'Invalid chars for username found',
	'USERS_NO_GROUP'						=> 'No group was selected',
	'USERS_PASSWORD_MISMATCH'				=> 'The passwords you entered do not match',
	'USERS_PASSWORD_TOO_SHORT'				=> 'The password you entered was too short',
	'USERS_SAVED'							=> 'User saved successfully',
	'USERS_USERNAME_TAKEN'					=> 'The username you entered is already taken',
	'USERS_USERNAME_TOO_SHORT'				=> 'The username you entered was too short'
); // $MESSAGE

$OVERVIEW = array(
	'ADMINTOOLS' 			=> 'Access the LEPTON administration tools...',
	'GROUPS' 				=> 'Manage user groups and their system permissions...',
	'HELP' 					=> 'Got a questions? Find your answer...',
	'LANGUAGES' 			=> 'Manage LEPTON languages...',
	'MEDIA' 				=> 'Manage files stored in the media folder...',
	'MODULES' 				=> 'Manage LEPTON modules...',
	'PAGES' 				=> 'Manage your websites pages...',
	'PREFERENCES' 			=> 'Change preferences such as email address, password, etc... ',
	'SETTINGS' 				=> 'Changes settings for LEPTON...',
	'START' 				=> 'Administration overview',
	'TEMPLATES' 			=> 'Change the look and feel of your website with templates...',
	'USERS' 				=> 'Manage users who can log-in to LEPTON...',
	'VIEW' 					=> 'Quickly view and browse your website in a new window...'
);

/* 
 * Create the old languages definitions only if specified in settings 
 */ 
if (ENABLE_OLD_LANGUAGE_DEFINITIONS) {
	foreach ($MESSAGE as $key => $value) {
		$x = strpos($key, '_');
		$MESSAGE[substr($key, 0, $x)][substr($key, $x+1)] = $value;
	}
}
?>