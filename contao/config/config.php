<?php

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid@respinar.com>
 *
 * @license MIT
 */

use Respinar\OwlCarouselBundle\Model\OwlCarouselModel;
use Respinar\OwlCarouselBundle\Model\OwlCarouselSlideModel;

$GLOBALS['BE_MOD']['content']['owlcarousel'] = array(
    'tables' => array('tl_owlcarousel', 'tl_owlcarousel_slide', 'tl_content')
);

/**
 * Register models
 */
$GLOBALS['TL_MODELS']['tl_owlcarousel']       = OwlCarouselModel::class;
$GLOBALS['TL_MODELS']['tl_owlcarousel_slide'] = OwlCarouselSlideModel::class;