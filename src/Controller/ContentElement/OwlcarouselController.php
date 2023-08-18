<?php

declare(strict_types=1);

/*
 * This file is part of Contao Owl Carousel Bundle.
 *
 * (c) Hamid Abbaszadeh 2023 <abbaszadeh.h@gmail.com>
 * 
 * @license MIT
 */

namespace Respinar\OwlcarouselBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Respinar\OwlcarouselBundle\Helper\Owlcarousel;
use Respinar\OwlcarouselBundle\Model\OwlcarouselModel;
use Respinar\OwlcarouselBundle\Model\OwlcarouselSlideModel;

#[AsContentElement(category: 'media')]
class OwlcarouselController extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        
        $intTotal = OwlcarouselSlideModel::countPublishedByPid($model->owl_carousel);

		if ($intTotal < 1)
		{
			$template->empty = $GLOBALS['TL_LANG']['MSC']['owlcarousel_noSlide'];

			return $template->getResponse();
		}

		$objOwlCarousel = OwlcarouselModel::findBy('id',$model->owl_carousel);
		$template->setData($objOwlCarousel->row());


		$objSlides = OwlcarouselSlideModel::findPublishedByPid($model->owl_carousel);

		// Items found
		if ($objSlides !== null)
		{

			$model->imgSize = $model->size;

			$template->slides = Owlcarousel::parseSlides($objSlides, $model);
		}

		$GLOBALS['TL_BODY'][] = Template::generateScriptTag('bundles/respinarowlcarousel/OwlCarousel2/owl.carousel.min.js', false, null);
        $GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/OwlCarousel2/assets/owl.carousel.min.css', false, null);
        $GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/OwlCarousel2/assets/owl.theme.default.min.css', false, null);

		if ($objOwlCarousel->owl_animateIn || $objOwlCarousel->owl_animateOut) {
			$GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/OwlCarousel2/animate/animate.min.css', false, null);
		}

        return $template->getResponse();
    }
}