<?php

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid@respinar.com>
 *
 * @license MIT
 */

use Respinar\OwlcarouselBundle\Model\OwlcarouselModel;
use Respinar\OwlcarouselBundle\Model\OwlcarouselSlideModel;

 array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'owlcarousel' => array
	(
		'tables' => array('tl_owlcarousel', 'tl_content')
	)
));

/**
 * Register models
 */
 $GLOBALS['TL_MODELS']['tl_owlcarousel']       = OwlcarouselModel::class;
 $GLOBALS['TL_MODELS']['tl_owlcarousel_slide'] = OwlcarouselSlideModel::class;

/**
 * Front end modules
 */
//$GLOBALS['FE_MOD']['application']['owlcarousel']   = 'Respinar\OwlCarousel\Frontend\Module\ModuleOwlCarousel';

/**
 * Content elements
 */
//$GLOBALS['TL_CTE']['miscellaneous']['owlcarousel'] = 'Respinar\OwlCarousel\Frontend\Element\ContentOwlCarousel';