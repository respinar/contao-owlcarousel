<?php

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */


/**
 * Table tl_owlcarousel
 */

use Contao\DC_Table;

$GLOBALS['TL_DCA']['tl_owlcarousel'] = [

	// Config
	'config' => [
		'dataContainer' => DC_Table::class,
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
			'mode' => 1,
			'fields' => ['title'],
			'flag' => 1
		],
		'label' => [
			'fields' => ['title'],
			'format' => '%s'
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
		'__selector__' => ['protected', 'nav', 'dots', 'autoplay'],
		'default' => '{title_legend},title;{options_legend},items,slideBy,margin,stagePadding,smartSpeed,loop,rewind,rtl,center,lazyLoad;{merge_legend},merge,mergeFit,autoWidth,autoHeight;{nav_legend},nav;{dots_legend},dots;{autoplay_legend},autoplay;{animate_legend:hide},animateIn,animateOut;{protected_legend:hide},protected;'
	],

	// Subpalettes
	'subpalettes' => [
		'protected' => 'groups',
		'nav' => 'navText,navSpeed',
        'dots' => 'dotsEach,dotsSpeed',
		'autoplay' => 'autoplayHoverPause,autoplaySpeed,autoplayTimeout',
	],

	// Fields
	'fields' => [
		'id' => [
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		],
		'tstamp' => [
			'sql' => "int(10) unsigned NOT NULL default 0"
		],
		'title' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['mandatory' => true, 'maxlength' => 255],
			'sql' => "varchar(255) NOT NULL default ''"
		],
		'items' => [
			'exclude' => true,
			'default' => 3,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 3"
		],
		'margin' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 0"
		],
		'stagePadding' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 0"
		],

		'loop' => [
			'exclude' => true,
			'default' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50 m12'],
			'sql' => ['type' => 'boolean', 'default' => true]
		],

		'center' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50'],
			'sql' => ['type' => 'boolean', 'default' => false]
		],

		'rtl' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50'],
			'sql' => ['type' => 'boolean', 'default' => false]
		],

		'lazyLoad' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50'],
			'sql' => ['type' => 'boolean', 'default' => false]
		],

		'merge' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50'],
			'sql' => ['type' => 'boolean', 'default' => false]
		],
		'mergeFit' => [
			'exclude' => true,
			'default' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50'],
			'sql' => ['type' => 'boolean', 'default' => true]
		],
		'autoWidth' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50'],
			'sql' => ['type' => 'boolean', 'default' => false]
		],

		'autoHeight' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50'],
			'sql' => ['type' => 'boolean', 'default' => false]
		],

		'nav' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['submitOnChange' => true],
			'sql' => ['type' => 'boolean', 'default' => false]
		],

		'rewind' => [
			'exclude' => true,
			'default' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50'],
			'sql' => ['type' => 'boolean', 'default' => true]
		],

		'navText' => [
			'exclude' => true,
			'default' => ['prev', 'next'],
			'inputType' => 'text',
			'eval' => ['maxlength' => 64,'multiple' => true,'size' => 2, 'tl_class' => 'w50 clr'],
			'sql' => "varchar(64) NOT NULL default ''"
		],

		'navSpeed' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 0"
		],

		'slideBy' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 1"
		],

		'dots' => [
			'exclude' => true,
			'default' => true,
			'inputType' => 'checkbox',
			'eval' => ['submitOnChange' => true],
			'sql' => ['type' => 'boolean', 'default' => true]
		],

		'dotsEach' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 0"
		],

		'dotsSpeed' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 0"
		],

		'autoplay' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['submitOnChange' => true],
			'sql' => ['type' => 'boolean', 'default' => false]
		],

		'autoplayHoverPause' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class' => 'w50 clr'],
			'sql' => ['type' => 'boolean', 'default' => false]
		],

		'autoplaySpeed' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50 clr'],
			'sql' => "smallint(5) unsigned NOT NULL default 0"
		],

		'autoplayTimeout' => [
			'exclude' => true,
			'default' => 5000,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 5000"
		],

		'smartSpeed' => [
			'exclude' => true,
			'default' => 250,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 250"
		],

		'fluidSpeed' => [
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
			'sql' => "smallint(5) unsigned NOT NULL default 0"
		],

		'animateIn' => [
			'exclude' => true,
			'inputType' => 'select',
			'options' => ['bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'headShake', 'swing', 'tada', 'wobble', 'jello', 'bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp', 'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig', 'flipInX', 'flipInY', 'lightSpeedIn', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'hinge', 'rollIn', 'zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideInUp'],
			'eval' => ['maxlength' => 64, 'chosen' => true, 'includeBlankOption' => true, 'tl_class' => 'w50'],
			'sql' => "varchar(64) NOT NULL default ''"
		],

		'animateOut' => [
			'exclude' => true,
			'inputType' => 'select',
			'options' => ['bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'headShake', 'swing', 'tada', 'wobble', 'jello', 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutLeftBig', 'fadeOutRight', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig', 'flipOutX', 'flipOutY', 'lightSpeedOut', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'hinge', 'rollOut', 'zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp', 'slideOutDown', 'slideOutLeft', 'slideOutRight', 'slideOutUp'],
			'eval' => ['maxlength' => 64, 'chosen' => true, 'includeBlankOption' => true, 'tl_class' => 'w50'],
			'sql' => "varchar(64) NOT NULL default ''"
		],
		'protected' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['submitOnChange' => true],
			'sql' => ['type' => 'boolean', 'default' => false]
		],
		'groups' => [
			'exclude' => true,
			'inputType' => 'checkbox',
			'foreignKey' => 'tl_member_group.name',
			'eval' => ['mandatory' => true, 'multiple' => true],
			'sql' => "blob NULL",
			'relation' => ['type' => 'hasMany', 'load' => 'lazy']
		]
	]
];