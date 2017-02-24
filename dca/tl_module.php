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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['owlcarousel']   = '{title_legend},name,headline,type;{owlcarousel_legend},owlcarousel;{template_legend},slide_template,customTpl;{options_legend},items,smartSpeed,margin,stagePadding,infinityLoop,rewind,rtl,center,lazyLoad;{merge_legend},merge,mergeFit,autoWidth,autoHeight;{nav_legend},nav;{dots_legend},dots;{autoplay_legend},autoplay;{animate_legend:hide},animateIn,animateOut;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'nav';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['nav'] = 'navText_prev,navText_next,navSpeed,slideBy';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'dots';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['dots'] = 'dotsEach,dotsSpeed';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'autoplay';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['autoplay'] = 'autoplayHoverPause,autoplaySpeed,autoplayTimeout';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['owlcarousel'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['owlcarousel'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_owlcarousel.title',
	'eval'                 => array('multiple'=>false, 'mandatory'=>true),
	'sql'				   => "int(10) unsigned NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['slide_template'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['slide_template'],
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => array('tl_module_owlcarousel', 'getSlideTemplates'),
	'eval'				   => array('tl_class'=>'w50 clr'),
	'sql'				   => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['items'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['items'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '3'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['margin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['margin'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['stagePadding'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['stagePadding'],
	'exclude'                 => true,	
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['infinityLoop'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['infinityLoop'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['center'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['center'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['rtl'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['rtl'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['lazyLoad'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['lazyLoad'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['merge'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['merge'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['mergeFit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mergeFit'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['autoWidth'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['autoWidth'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['autoHeight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['autoHeight'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['nav'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nav'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true,),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['rewind'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['rewind'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['navText_prev'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['navText_prev'],
	'exclude'                 => true,
	'search'                  => true,
	'default'                 => 'prev',
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['navText_next'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['navText_next'],
	'exclude'                 => true,
	'search'                  => true,
	'default'                 => 'next',
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['navSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['navSpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['slideBy'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['slideBy'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural','tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dots'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['dots'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'','submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dotsEach'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['dotsEach'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dotsSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['dotsSpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['autoplay'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['autoplay'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w','submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['autoplayHoverPause'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['autoplayHoverPause'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['autoplaySpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['autoplaySpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50 clr'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['autoplayTimeout'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['autoplayTimeout'],
	'exclude'                 => true,
	'default'                  => 5000,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['smartSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['smartSpeed'],
	'exclude'                 => true,
	'default'                  => 250,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fluidSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['fluidSpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['animateIn'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['animateIn'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'select',
	'options'                 => array('bounce','flash','pulse','rubberBand','shake','headShake','swing','tada','wobble','jello','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig','flipInX','flipInY','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','hinge','rollIn','zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp','slideInDown','slideInLeft','slideInRight','slideInUp'),
	'eval'                    => array('maxlength'=>64, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['animateOut'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['animateOut'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'select',
	'options'                 => array('bounce','flash','pulse','rubberBand','shake','headShake','swing','tada','wobble','jello','bounceOut','bounceOutDown','bounceOutLeft','bounceOutRight','bounceOutUp','fadeOut','fadeOutDown','fadeOutDownBig','fadeOutLeft','fadeOutLeftBig','fadeOutRight','fadeOutRightBig','fadeOutUp','fadeOutUpBig','flipOutX','flipOutY','lightSpeedOut','rotateOut','rotateOutDownLeft','rotateOutDownRight','rotateOutUpLeft','rotateOutUpRight','hinge','rollOut','zoomOut','zoomOutDown','zoomOutLeft','zoomOutRight','zoomOutUp','slideOutDown','slideOutLeft','slideOutRight','slideOutUp'),
	'eval'                    => array('maxlength'=>64, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

/**
 * Class tl_
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Hamid Abbaszadeh 2014
 * @author     Hamid Abbaszadeh <http://respinar.com>
 * @package    Owlcarousel
 */
class tl_module_owlcarousel extends Backend
{
	/**
	 * Return all links templates as array
	 * @param object
	 * @return array
	 */
	public function getSlideTemplates(DataContainer $dc)
	{
		return $this->getTemplateGroup('owlcarousel_', $dc->activeRecord->pid);
	}
}
