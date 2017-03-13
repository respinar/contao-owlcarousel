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
 * Dynamically add the permission check and parent table
 */
if (Input::get('do') == 'owlcarousel')
{
	$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_owlcarousel_slide';
	$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['headerFields'] = array('title', 'published');

}

/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['owlcarousel']   = '{title_legend},name,headline,type;{owlcarousel_legend},owl_carousel;{template_legend},owl_slide_template,customTpl,imgSize;{owl_options_legend},owl_items,owl_slideBy,owl_margin,owl_stagePadding,owl_smartSpeed,owl_loop,owl_rewind,owl_rtl,owl_center,owl_lazyLoad;{owl_merge_legend},owl_merge,owl_mergeFit,owl_autoWidth,owl_autoHeight;{owl_nav_legend},owl_nav;{owl_dots_legend},owl_dots;{owl_autoplay_legend},owl_autoplay;{owl_animate_legend:hide},owl_animateIn,owl_animateOut;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'owl_nav';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['owl_nav'] = 'owl_navText,owl_navSpeed';

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'owl_dots';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['owl_dots'] = 'owl_dotsEach,owl_dotsSpeed';

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'owl_autoplay';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['owl_autoplay'] = 'owl_autoplayHoverPause,owl_autoplaySpeed,owl_autoplayTimeout';


/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['owl_carousel'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['owl_carousel'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_owlcarousel.title',
	'eval'                 => array('multiple'=>false, 'mandatory'=>true),
	'sql'				   => "int(10) unsigned NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_slide_template'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['owl_slide_template'],
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => array('tl_content_owlcarousel', 'getSlideTemplates'),
	'eval'				   => array('tl_class'=>'w50 clr'),
	'sql'				   => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_items'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_items'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '3'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_margin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_margin'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['owl_stagePadding'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_stagePadding'],
	'exclude'                 => true,	
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_loop'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_loop'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_center'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_center'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_rtl'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_rtl'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_lazyLoad'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_lazyLoad'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_merge'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_merge'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['owl_mergeFit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_mergeFit'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['owl_autoWidth'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_autoWidth'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_autoHeight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_autoHeight'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_nav'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_nav'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_rewind'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_rewind'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_navText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_navText'],
	'exclude'                 => true,
	'search'                  => true,
	'default'                 => array('prev','next'),
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64,'multiple'=>true,'size'=>2, 'tl_class'=>'w50 clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_navSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_navSpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_slideBy'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_slideBy'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural','tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_dots'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_dots'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_dotsEach'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_dotsEach'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_dotsSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_dotsSpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_autoplay'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_autoplay'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_autoplayHoverPause'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_autoplayHoverPause'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_autoplaySpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_autoplaySpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50 clr'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_autoplayTimeout'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_autoplayTimeout'],
	'exclude'                 => true,
	'default'                  => 5000,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_smartSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_smartSpeed'],
	'exclude'                 => true,
	'default'                  => 250,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_fluidSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_fluidSpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_animateIn'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_animateIn'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'select',
	'options'                 => array('bounce','flash','pulse','rubberBand','shake','headShake','swing','tada','wobble','jello','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig','flipInX','flipInY','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','hinge','rollIn','zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp','slideInDown','slideInLeft','slideInRight','slideInUp'),
	'eval'                    => array('maxlength'=>64, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_animateOut'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['owl_animateOut'],
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
class tl_content_owlcarousel extends Backend
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
