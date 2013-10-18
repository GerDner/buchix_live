<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Ajax',
	'ajax'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'bucher');

t3lib_extMgm::addLLrefForTCAdescr('tx_bucher_domain_model_buchung', 'EXT:bucher/Resources/Private/Language/locallang_csh_tx_bucher_domain_model_buchung.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_bucher_domain_model_buchung');
$TCA['tx_bucher_domain_model_buchung'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,datum,uhrzeit,email,telefon,personen,unterschrift,notiz,schicht,tisch,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Buchung.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_bucher_domain_model_buchung.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_bucher_domain_model_tisch', 'EXT:bucher/Resources/Private/Language/locallang_csh_tx_bucher_domain_model_tisch.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_bucher_domain_model_tisch');
$TCA['tx_bucher_domain_model_tisch'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_tisch',
		'label' => 'number',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'number,xpos,ypos,type,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Tisch.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_bucher_domain_model_tisch.gif'
	),
);

?>