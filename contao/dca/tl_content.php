<?php

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

 /**
 * Dynamically add the permission check and parent table
 */

use Contao\Backend;
use Contao\Input;

if (Input::get('do') == 'owlcarousel')
{
	$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_owlcarousel_slide';
	$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['headerFields'] = array('title', 'published');

}

/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['owlcarousel']   = '{title_legend},type,headline;{owlcarousel_legend},owl_carousel;{template_legend},owl_slide_template,customTpl,size;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['owl_carousel'] = [
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['owl_carousel'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_owlcarousel.title',
	'eval'                 => ['multiple' => false, 'mandatory' => true],
	'sql'                  => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_slide_template'] = [
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['owl_slide_template'],
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => ['tl_content_owlcarousel', 'getSlideTemplates'],
	'eval'                 => ['tl_class' => 'w50 clr'],
	'sql'                  => "varchar(64) NOT NULL default ''",
];

/**
 * Class tl_content_owlcarousel
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
	 *
	 * @return array
	 */
	public function getSlideTemplates()
	{
		return $this->getTemplateGroup('owlcarousel_');
	}
}
