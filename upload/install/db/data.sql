-- --------------------------------------------------------
-- Please note:
-- The table prefix (cat_) will be replaced by the
-- installer! Do NOT use this file to create the tables
-- manually! (Or patch it to fit your needs first.)
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

INSERT INTO `cat_settings` (name, value) VALUES
    ('auto_disable_users', 'true' ),
    ('catmailer_default_sendername', 'Black Cat CMS Mailer'),
    ('catmailer_routine', 'phpmail'),
    ('catmailer_smtp_auth', ''),
    ('catmailer_smtp_host', ''),
    ('catmailer_smtp_password', ''),
    ('catmailer_smtp_username', ''),
    ('default_charset', 'utf-8'),
    ('default_date_format', 'M d Y'),
    ('default_template', 'lepton'),
    ('default_theme', 'freshcat'),
    ('default_time_format', 'g:i A'),
    ('er_level', ''),
    ('frontend_login', 'false'),
    ('frontend_signup', 'false'),
    ('home_folders', 'true'),
    ('homepage_redirection', 'false'),
    ('intro_page', 'false'),
    ('manage_sections', 'true'),
    ('max_attempts', '9'),
    ('media_directory', '/media'),
    ('mediasettings', ''),
    ('multiple_menus', 'true'),
    ('page_extension', '.php'),
    ('page_languages', 'true'),
    ('page_level_limit', '4'),
    ('page_spacer', '-'),
    ('page_trash', 'inline'),
    ('pages_directory', '/page'),
    ('prompt_mysql_errors', 'true'),
    ('redirect_timer', '1500'),
    ('rename_files_on_upload', 'jpg,jpeg,gif,gz,png,pdf,tif,zip'),
    ('search', 'public'),
    ('sec_anchor', 'cat_'),
    ('section_blocks', 'true'),
    ('server_email', 'admin@yourdomain.tld'),
    ('token_lifetime', '1800'),
    ('website_description', ''),
    ('website_footer', 'settings/website footer'),
    ('website_header', 'Black Cat CMS'),
    ('website_keywords', '')
;

INSERT INTO `cat_class_secure` ( `module`, `filepath`) VALUES
    ( 0, '/account/forgot.php' ),
    ( 0, '/account/login.php' ),
    ( 0, '/account/logout.php' ),
    ( 0, '/account/preferences.php' ),
    ( 0, '/account/signup.php' ),
    ( 0, '/backend/addons/index.php' ),
    ( 0, '/backend/addons/install.php' ),
    ( 0, '/backend/addons/manual_install.php' ),
    ( 0, '/backend/addons/reload.php' ),
    ( 0, '/backend/addons/uninstall.php' ),
    ( 0, '/backend/admintools/index.php' ),
    ( 0, '/backend/admintools/tool.php' ),
    ( 0, '/backend/groups/ajax_delete_group.php' ),
    ( 0, '/backend/groups/ajax_get_group.php' ),
    ( 0, '/backend/groups/ajax_save_group.php' ),
    ( 0, '/backend/groups/index.php' ),
    ( 0, '/backend/login/ajax_index.php' ),
    ( 0, '/backend/login/forgot/index.php' ),
    ( 0, '/backend/login/index.php' ),
    ( 0, '/backend/logout/index.php' ),
    ( 0, '/backend/media/ajax_create_folder.php' ),
    ( 0, '/backend/media/ajax_delete.php' ),
    ( 0, '/backend/media/ajax_get_contents.php' ),
    ( 0, '/backend/media/ajax_rename.php' ),
    ( 0, '/backend/media/create_folder.php' ),
    ( 0, '/backend/media/delete.php' ),
    ( 0, '/backend/media/get_contents.php' ),
    ( 0, '/backend/media/rename.php' ),
    ( 0, '/backend/media/upload.php' ),
    ( 0, '/backend/pages/ajax_add_page.php' ),
    ( 0, '/backend/pages/ajax_delete_page.php' ),
    ( 0, '/backend/pages/ajax_get_dropdown.php' ),
    ( 0, '/backend/pages/ajax_page_settings.php' ),
    ( 0, '/backend/pages/ajax_reorder.php' ),
    ( 0, '/backend/pages/ajax_restore_page.php' ),
    ( 0, '/backend/pages/ajax_sections_save.php' ),
    ( 0, '/backend/pages/ajax_settings_save.php' ),
    ( 0, '/backend/pages/empty_trash.php' ),
    ( 0, '/backend/pages/get_page_tree.php' ),
    ( 0, '/backend/pages/index.php' ),
    ( 0, '/backend/pages/intro.php' ),
    ( 0, '/backend/pages/intro_save.php' ),
    ( 0, '/backend/pages/intro2.php' ),
    ( 0, '/backend/pages/lang_settings.php' ),
    ( 0, '/backend/pages/lang_settings_save.php' ),
    ( 0, '/backend/pages/modify.php' ),
    ( 0, '/backend/pages/move_down.php' ),
    ( 0, '/backend/pages/move_up.php' ),
    ( 0, '/backend/pages/restore.php' ),
    ( 0, '/backend/pages/save.php' ),
    ( 0, '/backend/pages/sections.php' ),
    ( 0, '/backend/pages/sections_save.php' ),
    ( 0, '/backend/pages/settings_save.php' ),
    ( 0, '/backend/pages/trash.php' ),
    ( 0, '/backend/preferences/save.php' ),
    ( 0, '/backend/profiles/index.php' ),
    ( 0, '/backend/settings/ajax_guid.php' ),
    ( 0, '/backend/settings/ajax_testmail.php' ),
    ( 0, '/backend/settings/index.php' ),
    ( 0, '/backend/settings/save.php' ),
    ( 0, '/backend/start/index.php' ),
    ( 0, '/backend/users/ajax_delete_user.php' ),
    ( 0, '/backend/users/ajax_get_user.php' ),
    ( 0, '/backend/users/ajax_save_user.php' ),
    ( 0, '/backend/users/index.php' ),
    ( 0, '/include/captcha/captcha.php' ),
    ( 0, '/include/captcha/captchas/calc_image.php' ),
    ( 0, '/include/captcha/captchas/calc_ttf_image.php' ),
    ( 0, '/include/captcha/captchas/old_image.php' ),
    ( 0, '/include/captcha/captchas/ttf_image.php' ),
    ( 0, '/page/index.php' ),
    ( 0, '/search/index.php' ),
    ( 0, '/modules/edit_module_files.php' ),
    ( 0, '/modules/edit_modules_files.php' )
;

/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;