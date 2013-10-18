<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Ajax',
	array(
		'Buchung' => 'list, new, create, edit, update, delete, ajaxlist, sendTemplateEmail ',
		'Tisch' => 'list, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Buchung' => 'create, update, delete, ajaxlist, sendTemplateEmail',
		'Tisch' => 'create, update, delete',
		
	)
);

?>