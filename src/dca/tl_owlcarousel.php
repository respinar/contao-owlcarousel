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
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_owlcarousel_slide'),
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
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_owlcarousel']['edit'],
				'href'                => 'table=tl_owlcarousel_slide',
				'icon'                => 'edit.gif'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_owlcarousel']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_owlcarousel']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_owlcarousel']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_owlcarousel']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
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
		'__selector__'                => array('protected','owl_nav','owl_dots','owl_autoplay'),
		'default'                     => '{title_legend},title;{owl_options_legend},owl_items,owl_slideBy,owl_margin,owl_stagePadding,owl_smartSpeed,owl_loop,owl_rewind,owl_rtl,owl_center,owl_lazyLoad;{owl_merge_legend},owl_merge,owl_mergeFit,owl_autoWidth,owl_autoHeight;{owl_nav_legend},owl_nav;{owl_dots_legend},owl_dots;{owl_autoplay_legend},owl_autoplay;{owl_animate_legend:hide},owl_animateIn,owl_animateOut;{protected_legend:hide},protected;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'protected'                   => 'groups',
		'owl_nav'                     => 'owl_navText,owl_navSpeed',
        'owl_dots'                    => 'owl_dotsEach,owl_dotsSpeed',
		'owl_autoplay'                => 'owl_autoplayHoverPause,owl_autoplaySpeed,owl_autoplayTimeout',
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'owl_items' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_items'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '3'"
		),

		'owl_margin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_margin'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),
		'owl_stagePadding' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_stagePadding'],
			'exclude'                 => true,	
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'owl_loop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_loop'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_center' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_center'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_rtl' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_rtl'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_lazyLoad' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_lazyLoad'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_merge' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_merge'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'owl_mergeFit' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_mergeFit'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'owl_autoWidth' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_autoWidth'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_autoHeight' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_autoHeight'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_nav' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_nav'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_rewind' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_rewind'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_navText' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_navText'],
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => array('prev','next'),
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64,'multiple'=>true,'size'=>2, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'owl_navSpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_navSpeed'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'owl_slideBy' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_slideBy'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural','tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '1'"
		),

		'owl_dots' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_dots'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_dotsEach' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_dotsEach'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'owl_dotsSpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_dotsSpeed'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'owl_autoplay' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_autoplay'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_autoplayHoverPause' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_autoplayHoverPause'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'owl_autoplaySpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_autoplaySpeed'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50 clr'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'owl_autoplayTimeout' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_autoplayTimeout'],
			'exclude'                 => true,
			'default'                  => 5000,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'owl_smartSpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_smartSpeed'],
			'exclude'                 => true,
			'default'                  => 250,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'owl_fluidSpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_fluidSpeed'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'owl_animateIn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_animateIn'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
			'options'                 => array('bounce','flash','pulse','rubberBand','shake','headShake','swing','tada','wobble','jello','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig','flipInX','flipInY','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','hinge','rollIn','zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp','slideInDown','slideInLeft','slideInRight','slideInUp'),
			'eval'                    => array('maxlength'=>64, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'owl_animateOut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['owl_animateOut'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
			'options'                 => array('bounce','flash','pulse','rubberBand','shake','headShake','swing','tada','wobble','jello','bounceOut','bounceOutDown','bounceOutLeft','bounceOutRight','bounceOutUp','fadeOut','fadeOutDown','fadeOutDownBig','fadeOutLeft','fadeOutLeftBig','fadeOutRight','fadeOutRightBig','fadeOutUp','fadeOutUpBig','flipOutX','flipOutY','lightSpeedOut','rotateOut','rotateOutDownLeft','rotateOutDownRight','rotateOutUpLeft','rotateOutUpRight','hinge','rollOut','zoomOut','zoomOutDown','zoomOutLeft','zoomOutRight','zoomOutUp','slideOutDown','slideOutLeft','slideOutRight','slideOutUp'),
			'eval'                    => array('maxlength'=>64, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'protected' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['protected'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_owlcarousel']['groups'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'eval'                    => array('mandatory'=>true, 'multiple'=>true),
			'sql'                     => "blob NULL",
			'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
		)
	)
);
