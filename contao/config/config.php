<?php

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

use Respinar\OwlCarouselBundle\Model\OwlCarouselModel;
use Respinar\OwlCarouselBundle\Model\OwlCarouselSlideModel;

$GLOBALS['BE_MOD']['content']['owlcarousel'] = ['tables' => ['tl_owlcarousel', 'tl_owlcarousel_slide', 'tl_content']];

/**
 * Register models
 */
$GLOBALS['TL_MODELS']['tl_owlcarousel']       = OwlCarouselModel::class;
$GLOBALS['TL_MODELS']['tl_owlcarousel_slide'] = OwlCarouselSlideModel::class;
