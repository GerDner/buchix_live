<?php
return array(
	'BE' => array(
		'installToolPassword' => '701384fe6361e05ea75773c686f2b03c',
		'loginSecurityLevel' => 'rsa',
	),
	'DB' => array(
		'database' => 'buchix',
		'extTablesDefinitionScript' => 'extTables.php',
		'host' => 'localhost',
		'password' => 'root',
		'username' => 'root',
	),
	'EXT' => array(
		'extConf' => array(
			'bucher' => 'a:0:{}',
			'phpmyadmin' => 'a:4:{s:12:"hideOtherDBs";s:1:"1";s:9:"uploadDir";s:21:"uploads/tx_phpmyadmin";s:10:"allowedIps";s:0:"";s:12:"useDevIpMask";s:1:"0";}',
			'phpunit' => 'a:6:{s:17:"excludeextensions";s:8:"lib, div";s:12:"composerpath";s:0:"";s:13:"selenium_host";s:9:"localhost";s:13:"selenium_port";s:4:"4444";s:16:"selenium_browser";s:8:"*firefox";s:19:"selenium_browserurl";s:0:"";}',
			'saltedpasswords' => 'a:2:{s:3:"FE.";a:2:{s:7:"enabled";s:1:"1";s:21:"saltedPWHashingMethod";s:28:"tx_saltedpasswords_salts_md5";}s:3:"BE.";a:2:{s:7:"enabled";s:1:"1";s:21:"saltedPWHashingMethod";s:28:"tx_saltedpasswords_salts_md5";}}',
		),
		'extListArray' => array(
			'info',
			'perm',
			'func',
			'filelist',
			'extbase',
			'fluid',
			'about',
			'version',
			'tsconfig_help',
			'context_help',
			'extra_page_cm_options',
			'impexp',
			'sys_note',
			'tstemplate',
			'tstemplate_ceditor',
			'tstemplate_info',
			'tstemplate_objbrowser',
			'tstemplate_analyzer',
			'func_wizards',
			'wizard_crpages',
			'wizard_sortpages',
			'lowlevel',
			'install',
			'belog',
			'beuser',
			'aboutmodules',
			'setup',
			'taskcenter',
			'info_pagetsconfig',
			'viewpage',
			'rtehtmlarea',
			'css_styled_content',
			't3skin',
			't3editor',
			'reports',
			'felogin',
			'form',
			'rsaauth',
			'saltedpasswords',
			'bucher',
			'phpmyadmin',
			'phpunit',
		),
	),
	'EXTCONF' => array(
		'lang' => array(
			'availableLanguages' => array(),
		),
	),
	'FE' => array(
		'loginSecurityLevel' => 'rsa',
	),
	'SYS' => array(
		'compat_version' => '6.0',
		'encryptionKey' => '03d0be30d3b5f69752d5c1d783cb62ac10cf26210c472d0a0a5ca3fd74d2900288338dc2be675db68ea291ff80c71ca3',
		'sitename' => 'New TYPO3 site',
	),
);
?>