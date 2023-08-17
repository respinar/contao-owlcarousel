<?php

/**
 * Owlcarousel Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2023, Respinar
 * 
 * @author     Hamid Peywasti <hamid@respinar.com>
 * 
 * @license    MIT 
 */

use Respinar\OwlCarouselBundle\Model\OwlCarouselModel;
use Respinar\OwlCarouselBundle\Model\OwlCarouselSlideModel;

 array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'owlcarousel' => array
	(
		'tables' => array('tl_owlcarousel', 'tl_owlcarousel_slide', 'tl_content')
	)
));

/**
 * Register models
 */
 $GLOBALS['TL_MODELS']['tl_owlcarousel']       = OwlCarouselModel::class;
 $GLOBALS['TL_MODELS']['tl_owlcarousel_slide'] = OwlCarouselSlideModel::class; 

/**
 * Front end modules
 */
//$GLOBALS['FE_MOD']['application']['owlcarousel']   = 'Respinar\OwlCarousel\Frontend\Module\ModuleOwlCarousel';

/**
 * Content elements
 */
//$GLOBALS['TL_CTE']['miscellaneous']['owlcarousel'] = 'Respinar\OwlCarousel\Frontend\Element\ContentOwlCarousel';