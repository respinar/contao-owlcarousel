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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'OwlCarousel'
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'OwlCarousel\ModuleOwlCarousel'     => 'system/modules/owlcarousel/modules/ModuleOwlCarousel.php',

	// Models
	'OwlCarousel\OwlCarouselModel'      => 'system/modules/owlcarousel/models/OwlCarouselModel.php',
	'OwlCarousel\OwlCarouselSlideModel' => 'system/modules/owlcarousel/models/OwlCarouselSlideModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_owlcarousel'   => 'system/modules/owlcarousel/templates/module',
	'owlcarousel_slide' => 'system/modules/owlcarousel/templates/slides',
));
