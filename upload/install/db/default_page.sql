INSERT INTO `cat_pages` (`page_id`, `parent`, `root_parent`, `level`, `link`, `target`, `page_title`, `menu_title`, `description`, `keywords`, `page_trail`, `template`, `visibility`, `position`, `menu`, `language`, `searching`, `admin_groups`, `admin_users`, `viewing_groups`, `viewing_users`, `modified_when`, `modified_by`, `page_groups`) VALUES (1, 0, 0, 0, '/welcome', '', 'Welcome', 'Welcome', '', '', '1', '', 'public', 2, 1, 'EN', 1, '1', '', '1', '', 1355938106, 1, NULL);
INSERT INTO `cat_pages` (`page_id`, `parent`, `root_parent`, `level`, `link`, `target`, `page_title`, `menu_title`, `description`, `keywords`, `page_trail`, `template`, `visibility`, `position`, `menu`, `language`, `searching`, `admin_groups`, `admin_users`, `viewing_groups`, `viewing_users`, `modified_when`, `modified_by`, `page_groups`) VALUES (2, 0, 0, 0, '/willkommen', '', 'Willkommen', 'Willkommen', '', '', '2', '', 'public', 3, 1, 'DE', 1, '1', '', '1', '', 1355938336, 1, NULL);
INSERT INTO `cat_pages` (`page_id`, `parent`, `root_parent`, `level`, `link`, `target`, `page_title`, `menu_title`, `description`, `keywords`, `page_trail`, `template`, `visibility`, `position`, `menu`, `language`, `searching`, `admin_groups`, `admin_users`, `viewing_groups`, `viewing_users`, `modified_when`, `modified_by`, `page_groups`) VALUES (3, 0, 0, 0, '/maintenance', '', 'Maintenance', 'Maintenance', '', '', '3', 'mojito', 'hidden', 1, 1, 'DE', 1, '1', '', '1', '', 1366304012, 1, NULL);
INSERT INTO `cat_pages` (`page_id`, `parent`, `root_parent`, `level`, `link`, `target`, `page_title`, `menu_title`, `description`, `keywords`, `page_trail`, `template`, `visibility`, `position`, `menu`, `language`, `searching`, `admin_groups`, `admin_users`, `viewing_groups`, `viewing_users`, `modified_when`, `modified_by`, `page_groups`) VALUES (4, 0, 0, 0, '/404', '', '404 Not found', '404 Not found', '', '', '4', '', 'hidden', 4, 1, 'DE', 1, '1', '', '1', '', 1372154805, 1, NULL);

INSERT INTO `cat_sections` (`section_id`, `page_id`, `position`, `module`, `block`, `publ_start`, `publ_end`, `name`) VALUES (1, 1, 1, 'wysiwyg', '1', '0', '0', 'no name');
INSERT INTO `cat_sections` (`section_id`, `page_id`, `position`, `module`, `block`, `publ_start`, `publ_end`, `name`) VALUES (2, 2, 1, 'wysiwyg', '1', '0', '0', 'no name');
INSERT INTO `cat_sections` (`section_id`, `page_id`, `position`, `module`, `block`, `publ_start`, `publ_end`, `name`) VALUES (3, 3, 1, 'wysiwyg', '1', '0', '0', 'no name');
INSERT INTO `cat_sections` (`section_id`, `page_id`, `position`, `module`, `block`, `publ_start`, `publ_end`, `name`) VALUES (4, 4, 1, 'wysiwyg', '1', '0', '0', 'no name');

INSERT INTO `cat_mod_wysiwyg` (`section_id`, `page_id`, `content`, `text`) VALUES (1, 1, '<h1>Welcome to Black Cat CMS!</h1>\r\n\r\n<p>This is the Black Cat CMS default page for English language. Just edit the contents in the backend to fit your needs.</p>\r\n\r\n<p>If you don&#39;t need an English welcome page, you may <a href="#del">delete this page</a> in the backend or change it&#39;s language setting and link to the German page.</p>\r\n\r\n<h2>How do I edit a page?</h2>\r\n\r\n<p>In the page tree, just click on the page you wish to edit.</p>\r\n\r\n<h2><a name="#del">How do I delete a page?</a></h2>\r\n\r\n<p>In the page tree, hover the page you wish to delete to see the config icon.</p>\r\n\r\n<p><img alt="Hover page to see the icon" src="https://raw.github.com/webbird/LEPTON_2_BlackCat/master/screenshots/be_page_settings.png" style="height:263px; width:250px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Click on that icon to open the configuration dialog.</p>\r\n\r\n<p><img alt="" src="https://raw.github.com/webbird/LEPTON_2_BlackCat/master/screenshots/be_delete_page.png" style="height:494px; width:489px" /></p>\r\n\r\n<p>Click on [Remove page].</p>\r\n\r\n<h1><strong>Learn more</strong></h1>\r\n\r\n<ul>\r\n	<li><a href="http://blackcat-cms.org" target="_blank">Black Cat CMS Homepage</a> (german)</li>\r\n	<li><a href="http://docs.blackcat-cms.org">Dokumentation</a> (german)</li>\r\n	<li><a href="https://github.com/webbird/LEPTON_2_BlackCat">GitHub Repository</a> (english)</li>\r\n	<li><a href="http://forum.blackcat-cms.org">Support Forum</a></li>\r\n	<li><a href="http://blackcat-cms.org/page/add-ons.php">Addons Repository</a></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Welcome to Black Cat CMS!\r\n\r\nThis is the Black Cat CMS default page for English language. Just edit the contents in the backend to fit your needs.\r\n\r\nIf you don&#39;t need an English welcome page, you may delete this page in the backend or change it&#39;s language setting and link to the German page.\r\n\r\nHow do I edit a page?\r\n\r\nIn the page tree, just click on the page you wish to edit.\r\n\r\nHow do I delete a page?\r\n\r\nIn the page tree, hover the page you wish to delete to see the config icon.\r\n\r\n\r\n\r\n&nbsp;\r\n\r\nClick on that icon to open the configuration dialog.\r\n\r\n\r\n\r\nClick on [Remove page].\r\n\r\nLearn more\r\n\r\n\r\n	Black Cat CMS Homepage (german)\r\n	Dokumentation (german)\r\n	GitHub Repository (english)\r\n	Support Forum\r\n	Addons Repository\r\n\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n');
INSERT INTO `cat_mod_wysiwyg` (`section_id`, `page_id`, `content`, `text`) VALUES (2, 2, '<h1>Willkommen bei Black Cat CMS!</h1>\r\n\r\n<p>Dies ist die Black Cat CMS Standardseite f&uuml;r die Deutsche Sprache. Bearbeiten Sie einfach den Inhalt der Seite im Backend. Wenn Sie keine deutschsprachige Heimatseite ben&ouml;tigen, k&ouml;nnen Sie diese Seite auch l&ouml;schen oder die Spracheinstellungen und die Verkn&uuml;pfung zur englischsprachigen Seite &auml;ndern.</p>\r\n\r\n<h2>Wie bearbeite ich eine Seite?</h2>\r\n\r\n<p>Klicken Sie im Seitenbaum auf die Seite, die Sie bearbeiten m&ouml;chten.</p>\r\n\r\n<h2><a name="#del">Wie l&ouml;sche ich eine Seite?</a></h2>\r\n\r\n<p>&Uuml;berfahren Sie im Seitenbaum die Seite, die Sie l&ouml;schen m&ouml;chten. Neben der Seite erscheint ein Icon.</p>\r\n\r\n<p><img alt="Hover page to see the icon" src="https://raw.github.com/webbird/LEPTON_2_BlackCat/master/screenshots/be_page_settings.png" style="height:263px; width:250px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Klicken Sie auf das Icon, um die Seiteneigenschaften zu &ouml;ffnen.</p>\r\n\r\n<p><img alt="" src="https://raw.github.com/webbird/LEPTON_2_BlackCat/master/screenshots/be_delete_page.png" style="height:494px; width:489px" /></p>\r\n\r\n<p>Klicken Sie auf [Seite l&ouml;schen].</p>\r\n\r\n<p><strong>Weitere Informationen:</strong></p>\r\n\r\n<ul>\r\n	<li><a href="http://blackcat-cms.org" target="_blank">Black Cat CMS Homepage</a> (deutsch)</li>\r\n	<li><a href="http://docs.blackcat-cms.org">Dokumentation</a> (deutsch)</li>\r\n	<li><a href="https://github.com/webbird/LEPTON_2_BlackCat">GitHub Repository</a> (englisch)</li>\r\n	<li><a href="http://forum.blackcat-cms.org">Support Forum</a></li>\r\n	<li><a href="http://blackcat-cms.org/page/add-ons.php">Addons Verzeichnis</a></li>\r\n</ul>\r\n', 'Willkommen bei Black Cat CMS!\r\n\r\nDies ist die Black Cat CMS Standardseite f&uuml;r die Deutsche Sprache. Bearbeiten Sie einfach den Inhalt der Seite im Backend. Wenn Sie keine deutschsprachige Heimatseite ben&ouml;tigen, k&ouml;nnen Sie diese Seite auch l&ouml;schen oder die Spracheinstellungen und die Verkn&uuml;pfung zur englischsprachigen Seite &auml;ndern.\r\n\r\nWie bearbeite ich eine Seite?\r\n\r\nKlicken Sie im Seitenbaum auf die Seite, die Sie bearbeiten m&ouml;chten.\r\n\r\nWie l&ouml;sche ich eine Seite?\r\n\r\n&Uuml;berfahren Sie im Seitenbaum die Seite, die Sie l&ouml;schen m&ouml;chten. Neben der Seite erscheint ein Icon.\r\n\r\n\r\n\r\n&nbsp;\r\n\r\nKlicken Sie auf das Icon, um die Seiteneigenschaften zu &ouml;ffnen.\r\n\r\n\r\n\r\nKlicken Sie auf [Seite l&ouml;schen].\r\n\r\nWeitere Informationen:\r\n\r\n\r\n	Black Cat CMS Homepage (deutsch)\r\n	Dokumentation (deutsch)\r\n	GitHub Repository (englisch)\r\n	Support Forum\r\n	Addons Verzeichnis\r\n\r\n');
INSERT INTO `cat_mod_wysiwyg` (`section_id`, `page_id`, `content`, `text`) VALUES (3, 3, '<div class="ooo">\r\n<p>Sorry, this site is down for maintenance. Please check back later.</p>\r\n<p>Entschuldigung, diese Seite ist wegen Wartungsarbeiten derzeit nicht verf&uuml;gbar. Bitte besuchen Sie uns sp&auml;ter noch einmal.</p>\r\n</div>\r\n', '\r\nSorry, this site is down for maintenance. Please check back later.\r\nEntschuldigung, diese Seite ist wegen Wartungsarbeiten derzeit nicht verf&uuml;gbar. Bitte besuchen Sie uns sp&auml;ter noch einmal.\r\n\r\n');
INSERT INTO `cat_mod_wysiwyg` (`section_id`, `page_id`, `content`, `text`) VALUES (4, 4, '<h1>Oooops!</h1>\r\n\r\n<h2>This page seems to have been kidnapped by Aliens!</h2>\r\n', 'Oooops!\r\n\r\nThis page seems to have been kidnapped by Aliens!\r\n');

INSERT INTO `cat_page_langs` (`page_id`, `lang`, `link_page_id`) VALUES (1,'DE',2);
INSERT INTO `cat_page_langs` (`page_id`, `lang`, `link_page_id`) VALUES (2,'EN',1);

INSERT INTO `cat_settings` (name, value) VALUES ('err_page_404', '4');

INSERT INTO `cat_pages_settings` (`page_id`, `set_type`, `set_name`, `set_value`) VALUES (3, 'internal', 'template_variant', 'blank');
