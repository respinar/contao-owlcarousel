<?php

/**
 * Owlcarousel Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */


/**
 * Table tl_owlcarousel
 */
$GLOBALS['TL_DCA']['tl_owlcarousel'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'    => 'Table',
		'ctable'           => array('tl_owlcarousel_slide'),
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'         => 1,
			'fields'       => array('title'),
			'flag'         => 1
		),
		'label' => array
		(
			'fields'       => array('title'),
			'format'       => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'href'     => 'table=tl_owlcarousel_slide',
				'icon'     => 'edit.svg'
			),
			'editheader' => array
			(
				'href'     => 'act=edit',
				'icon'     => 'header.svg'
			),
			'copy' => array
			(
				'href'     => 'act=copy',
				'icon'     => 'copy.svg'
			),
			'delete' => array
			(
				'href'     => 'act=delete',
				'icon'     => 'delete.svg',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'href'     => 'act=show',
				'icon'     => 'show.svg'
			)
		)
	),

	// Select
	'select' => array
	(
		'buttons_callback' => array()
	),

	// Edit
	'edit' => array
	(
		'buttons_callback' => array()
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'     => array('protected','nav','dots','autoplay'),
		'default'          => '{title_legend},title;{options_legend},items,slideBy,margin,stagePadding,smartSpeed,loop,rewind,rtl,center,lazyLoad;{merge_legend},merge,mergeFit,autoWidth,autoHeight;{nav_legend},nav;{dots_legend},dots;{autoplay_legend},autoplay;{animate_legend:hide},animateIn,animateOut;{protected_legend:hide},protected;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'protected'        => 'groups',
		'nav'              => 'navText,navSpeed',
        'dots'             => 'dotsEach,dotsSpeed',
		'autoplay'         => 'autoplayHoverPause,autoplaySpeed,autoplayTimeout',
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'          => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'          => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('mandatory'=>true, 'maxlength'=>255),
			'sql'          => "varchar(255) NOT NULL default ''"
		),
		'items' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '3'"
		),

		'margin' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),
		'stagePadding' => array
		(
			'exclude'      => true,	
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),

		'loop' => array
		(
			'exclude'      => true,
			'default'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50 m12'),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'center' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50'),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'rtl' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50'),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'lazyLoad' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50'),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'merge' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50'),
			'sql'          => "char(1) NOT NULL default ''"
		),
		'mergeFit' => array
		(
			'exclude'      => true,
			'default'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50'),
			'sql'          => "char(1) NOT NULL default ''"
		),
		'autoWidth' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50'),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'autoHeight' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50'),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'nav' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('submitOnChange'=>true),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'rewind' => array
		(
			'exclude'      => true,
			'default'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50'),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'navText' => array
		(
			'exclude'      => true,
			'search'       => true,
			'default'      => array('prev','next'),
			'inputType'    => 'text',
			'eval'         => array('maxlength'=>64,'multiple'=>true,'size'=>2, 'tl_class'=>'w50 clr'),
			'sql'          => "varchar(64) NOT NULL default ''"
		),

		'navSpeed' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),

		'slideBy' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural','tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '1'"
		),

		'dots' => array
		(
			'exclude'      => true,
			'default'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('submitOnChange'=>true),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'dotsEach' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),

		'dotsSpeed' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),

		'autoplay' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('submitOnChange'=>true),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'autoplayHoverPause' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('tl_class'=>'w50 clr'),
			'sql'          => "char(1) NOT NULL default ''"
		),

		'autoplaySpeed' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50 clr'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),

		'autoplayTimeout' => array
		(
			'exclude'      => true,
			'default'      => 5000,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),

		'smartSpeed' => array
		(
			'exclude'      => true,
			'default'      => 250,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),

		'fluidSpeed' => array
		(
			'exclude'      => true,
			'inputType'    => 'text',
			'eval'         => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'          => "smallint(5) unsigned NOT NULL default '0'"
		),

		'animateIn' => array
		(
			'exclude'      => true,
			'search'       => true,
			'inputType'    => 'select',
			'options'      => array('bounce','flash','pulse','rubberBand','shake','headShake','swing','tada','wobble','jello','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig','flipInX','flipInY','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','hinge','rollIn','zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp','slideInDown','slideInLeft','slideInRight','slideInUp'),
			'eval'         => array('maxlength'=>64, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'          => "varchar(64) NOT NULL default ''"
		),

		'animateOut' => array
		(
			'exclude'      => true,
			'search'       => true,
			'inputType'    => 'select',
			'options'      => array('bounce','flash','pulse','rubberBand','shake','headShake','swing','tada','wobble','jello','bounceOut','bounceOutDown','bounceOutLeft','bounceOutRight','bounceOutUp','fadeOut','fadeOutDown','fadeOutDownBig','fadeOutLeft','fadeOutLeftBig','fadeOutRight','fadeOutRightBig','fadeOutUp','fadeOutUpBig','flipOutX','flipOutY','lightSpeedOut','rotateOut','rotateOutDownLeft','rotateOutDownRight','rotateOutUpLeft','rotateOutUpRight','hinge','rollOut','zoomOut','zoomOutDown','zoomOutLeft','zoomOutRight','zoomOutUp','slideOutDown','slideOutLeft','slideOutRight','slideOutUp'),
			'eval'         => array('maxlength'=>64, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'          => "varchar(64) NOT NULL default ''"
		),
		'protected' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'eval'         => array('submitOnChange'=>true),
			'sql'          => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'exclude'      => true,
			'inputType'    => 'checkbox',
			'foreignKey'   => 'tl_member_group.name',
			'eval'         => array('mandatory'=>true, 'multiple'=>true),
			'sql'          => "blob NULL",
			'relation'     => array('type'=>'hasMany', 'load'=>'lazy')
		)
	)
);
