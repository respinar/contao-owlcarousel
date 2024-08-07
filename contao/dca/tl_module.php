<?php

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

use Contao\Backend;

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['owlcarousel']   = '{title_legend},name,headline,type;{owlcarousel_legend},owl_carousel;{template_legend},owl_slide_template,customTpl,imgSize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['owl_carousel'] = [
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['owl_carousel'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_owlcarousel.title',
	'eval'                 => ['multiple' => false, 'mandatory' => true],
	'sql'				   => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['owl_slide_template'] = [
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['owl_slide_template'],
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => ['tl_module_owlcarousel', 'getSlideTemplates'],
	'eval'				   => ['tl_class' => 'w50 clr'],
	'sql'				   => "varchar(64) NOT NULL default ''",
];


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
	 *
	 * @return array
	 */
	public function getSlideTemplates()
	{
		return $this->getTemplateGroup('owlcarousel_');
	}
}
