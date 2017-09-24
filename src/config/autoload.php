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
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_owlcarousel'     => 'system/modules/owlcarousel/templates/module',
	'ce_owlcarousel'      => 'system/modules/owlcarousel/templates/content',
	'owlcarousel_slide'   => 'system/modules/owlcarousel/templates/slides',
	'owlcarousel_content' => 'system/modules/owlcarousel/templates/slides',
));
