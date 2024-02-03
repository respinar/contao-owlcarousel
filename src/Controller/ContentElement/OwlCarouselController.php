<?php

declare(strict_types=1);

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\OwlCarouselBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\StringUtil;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Respinar\OwlCarouselBundle\OwlCarousel;
use Respinar\OwlCarouselBundle\Model\OwlCarouselModel;
use Respinar\OwlCarouselBundle\Model\OwlCarouselSlideModel;

#[AsContentElement(category: 'media', template: 'ce_owlcarousel')]
class OwlCarouselController extends AbstractContentElementController
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

		$template->navText = json_encode(StringUtil::deserialize($objOwlCarousel->navText));

		$objSlides = OwlcarouselSlideModel::findPublishedByPid($model->owl_carousel);

		// Items found
		if ($objSlides !== null)
		{

			$model->imgSize = $model->size;

			$template->slides = Owlcarousel::parseSlides($objSlides, $model);
		}

		$GLOBALS['TL_BODY'][] = Template::generateScriptTag('bundles/respinarowlcarousel/owl.carousel.min.js', false, null);
        $GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/assets/owl.carousel.min.css', false, null);
        $GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/assets/owl.theme.default.min.css', false, null);

		if ($objOwlCarousel->animateIn || $objOwlCarousel->animateOut) {
			$GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/animate/animate.min.css', false, null);
		}

        return $template->getResponse();
    }
}