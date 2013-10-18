<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_bucher_domain_model_buchung'] = array(
	'ctrl' => $TCA['tx_bucher_domain_model_buchung']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, datum, uhrzeit, email, telefon, personen, unterschrift, notiz, schicht, tisch',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, datum, uhrzeit, email, telefon, personen, unterschrift, notiz, schicht, tisch,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_bucher_domain_model_buchung',
				'foreign_table_where' => 'AND tx_bucher_domain_model_buchung.pid=###CURRENT_PID### AND tx_bucher_domain_model_buchung.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'datum' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.datum',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'uhrzeit' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.uhrzeit',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'telefon' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.telefon',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'personen' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.personen',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			),
		),
		'unterschrift' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.unterschrift',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'notiz' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.notiz',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'password' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.notiz',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'schicht' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.schicht',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'tisch' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bucher/Resources/Private/Language/locallang_db.xml:tx_bucher_domain_model_buchung.tisch',
			'config' => array(
				'type' => 'select',
                                                                                     'internal_type' => 'db',
				'foreign_table' => 'tx_bucher_domain_model_tisch',
//                                                                                      'mm_match_field'=>array('tablenames' => 'tt_news'),
				'MM' => 'tx_bucher_buchung_tisch_mm',
				'size' => 10,
				'autoSizeMax' => 30,
                                                                                      'minitems' => 1,
				'maxitems' => 9999,
				'multiple' => 1,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_bucher_domain_model_tisch',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
	),
);

?>