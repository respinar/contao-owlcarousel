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
$GLOBALS['TL_DCA']['tl_content']['palettes']['owlcarousel']   = '{title_legend},name,headline,type;{owlcarousel_legend},owl_carousel;{template_legend},owl_slide_template,customTpl,size;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['owl_carousel'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['owl_carousel'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_owlcarousel.title',
	'eval'                 => array('multiple'=>false, 'mandatory'=>true),
	'sql'				   => "int(10) unsigned NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['owl_slide_template'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['owl_slide_template'],
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => array('tl_content_owlcarousel', 'getSlideTemplates'),
	'eval'				   => array('tl_class'=>'w50 clr'),
	'sql'				   => "varchar(64) NOT NULL default ''",
);

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
