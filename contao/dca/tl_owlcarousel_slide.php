<?php

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

use Contao\System;
use Contao\Backend;
use Contao\BackendUser;
use Contao\FilesModel;
use Contao\Image;
use Contao\DataContainer;
use Contao\DC_Table;
use Contao\Input;
use Contao\StringUtil;

/**
 * Load tl_content language file
 */
System::loadLanguageFile('tl_content');


/**
 * Table tl_owlcarousel_slide
 */
$GLOBALS['TL_DCA']['tl_owlcarousel_slide'] = [

	// Config
	'config' => [
		'dataContainer' => DC_Table::class,
		'ptable' => 'tl_owlcarousel',
		'ctable' => ['tl_content'],
		'enableVersioning' => true,
		'sql' => [
			'keys' => [
				'id' => 'primary'
			]
		]
	],

	// List
	'list' => [
		'sorting' => [
			'mode' => 4,
			'fields' => ['sorting'],
			'headerFields' => ['title'],
			'panelLayout' => 'search,limit',
			'child_record_callback' => ['tl_owlcarousel_slide', 'generateElementRow']
		],
		'global_operations' => [
			'all' => [
				'href' => 'act=select',
				'class' => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			]
		],
		'operations' => [
			'edit' => [
				'href' => 'table=tl_content',
				'icon' => 'edit.svg'
			],
			'editheader' => [
				'href' => 'act=edit',
				'icon' => 'header.svg'
			],
			'copy' => [
				'href' => 'act=copy',
				'icon' => 'copy.svg'
			],
			'delete' => [
				'href' => 'act=delete',
				'icon' => 'delete.svg',
				'attributes' => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? null) . '\'))return false;Backend.getScrollOffset()"'
			],
			'toggle' => [
				'href' => 'act=toggle&amp;field=published',
				'icon' => 'visible.svg',
			],
			'show' => [
				'href' => 'act=show',
				'icon' => 'show.svg'
			]
		]
	],

	// Select
	'select' => [
		'buttons_callback' => []
	],

	// Edit
	'edit' => [
		'buttons_callback' => []
	],

	// Palettes
	'palettes' => [
		'default' => '{title_legend},title;{image_legend},singleSRC,alt,size,imageUrl;{description_legend},description;{option_legend},style,data_merge;{publish_legend},published'
	],

	// Subpalettes
	'subpalettes' => [],

	// Fields
	'fields' => [
		'id' => [
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		],
		'pid' => [
			'sql' => "int(10) unsigned NOT NULL default '0'"
		],
		'sorting' => [
			'sql' => "int(10) unsigned NOT NULL default '0'"
		],
		'tstamp' => [
			'sql' => "int(10) unsigned NOT NULL default '0'"
		],
		'title' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['mandatory' => true, 'maxlength' => 255],
			'sql' => "varchar(255) NOT NULL default ''"
		],
		'description' => [
			'exclude' => true,
			'search' => true,
			'inputType' => 'textarea',
			'eval' => ['rte' => 'tinyMCE'],
			'sql' => "text NULL"
		],
		'singleSRC' => [
			'exclude' => true,
			'inputType' => 'fileTree',
			'eval' => ['mandatory' => true,'fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'extensions' => '%contao.image.valid_extensions%'],
			'sql' => "binary(16) NULL"
		],
		'alt' => [
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength' =>255, 'tl_class' => 'long clr'],
			'sql' => "varchar(255) NOT NULL default ''"
		],
		'size' => [
			'exclude' => true,
			'inputType' => 'imageSize',
			'reference' => &$GLOBALS['TL_LANG']['MSC'],
			'options_callback' => function () {
				return System::getContainer()->get('contao.image.image_sizes')->getOptionsForUser(BackendUser::getInstance());
			},
			'reference' => &$GLOBALS['TL_LANG']['MSC'],
			'eval' => ['rgxp' => 'natural', 'includeBlankOption' => true, 'nospace' => true, 'helpwizard' => true, 'tl_class' => 'w50'],
			'sql' => "varchar(64) NOT NULL default ''"
		],
		'imageUrl' => [
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 255, 'fieldType' => 'radio', 'filesOnly' => true, 'tl_class' => 'w50 wizard'],
			'wizard' => [
				['tl_owlcarousel_slide', 'pagePicker']
			],
			'sql' => "varchar(255) NOT NULL default ''"
		],
		'style' => [
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
			'sql' => "varchar(255) NOT NULL default ''"
		],
		'data_merge' => [
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
			'sql' => "varchar(255) NOT NULL default ''"
		],
		'published' => [
			'exclude' => true,
			'toggle' => true,
			'filter' => true,
			'flag' => 1,
			'inputType' => 'checkbox',
			'eval' => ['doNotCopy' => true],
			'sql' => "char(1) NOT NULL default ''"
		],
		'start' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'],
			'sql' => "varchar(10) NOT NULL default ''"
		],
		'stop' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'],
			'sql' => "varchar(10) NOT NULL default ''"
		]
	]
];


/**
 * Provide miscellaneous methods that are used by the data configuration array
 */
class tl_owlcarousel_slide extends Backend
{

	/**
	 * Generate a song row and return it as HTML string
	 * @param array
	 * @return string
	 */
	public function generateElementRow($arrRow)
	{
		$objImage = FilesModel::findByPk($arrRow['singleSRC']);

		if ($objImage !== null)
		{
			// $strImage = Image::getHtml(Image::get($objImage->path, '100', '50', 'center_center'));
			$strImage = '';
		}

		return '<div><div style="float:left; margin-right:10px;">'.$strImage.'</div>'.$arrRow['title'] . '</div>';
	}

	/**
	 * Return the link picker wizard
	 *
	 * @param DataContainer $dc
	 *
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		return ' <a href="' . (($dc->value == '' || strpos($dc->value, '{{link_url::') !== false) ? 'contao/page.php' : 'contao/file.php') . '?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . rawurlencode(str_replace(['{{link_url::', '}}'], '', $dc->value)) . '&amp;switch=1' . '" title="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':768,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['label'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.svg', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}

}
