<?php

/**
 * Owlcarousel Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */

 array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'owlcarousel' => array
	(
		'tables' => array('tl_owlcarousel', 'tl_owlcarousel_slide', 'tl_content'),
		'icon'   => 'system/modules/owlcarousel/assets/icon.png'
	)
));

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['application']['owlcarousel']   = 'ModuleOwlCarousel';

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['miscellaneous']['owlcarousel'] = 'ContentOwlCarousel';